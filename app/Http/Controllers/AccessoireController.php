<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use App\Models\Article;
use App\Models\Categorie;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AccessoireController extends Controller
{
    // public function getAccessories()
    // {
    //     $client = new Client();

    //     try {
    //         $response = $client->request('GET', 'https://axesso-walmart-data-service.p.rapidapi.com/wlm/walmart-search-by-keyword?keyword=Accessories%20of%20reading&page=1&sortBy=best_match', [
    //             'headers' => [
    //                 'X-RapidAPI-Host' => 'axesso-walmart-data-service.p.rapidapi.com',
    //                 'X-RapidAPI-Key' => '7d4c47cdb2msh0f04d630ac459e3p16ff9ejsn42f7490992a1',
    //             ],
    //         ]);

    //         $data = json_decode($response->getBody()->getContents(), true);
    //         // dd($data);
    //         $products = [];
    //         // Accessing itemStacks directly from the $data array
    //         $itemStacks = $data['item']['props']['pageProps']['initialData']['searchResult']['itemStacks'];
    //         foreach ($itemStacks as $itemStack) {
    //             $items = $itemStack['items'];
    //             // dd($items);
    //             foreach ($items as $item) {
    //                 // Check if the "name" key exists before accessing it
    //                 if (isset($item['name'])) {
    //                     // Creating product array
    //                     $accessoire = Article::updateOrCreate(
    //                         ['id' => $item['usItemId']], // Use the name as the unique identifier
    //                         [
    //                             'titre' => $item['name'],
    //                             'photo' => $item['image'],
    //                             'description' => isset($item['description']) ? $item['description'] : '',
    //                             'date_creation' => Carbon::now(),
    //                             'categorie_id' => 1,
    //                         ]
    //                     );


    //                     $product = [
    //                         'name' => $item['name'],
    //                         'image' => $item['image'],
    //                         'description' => isset($item['description']) ? $item['description'] : '', // Check if description exists
    //                         'price' => isset($item['price']) ? $item['price'] : '', // Check if price exists
    //                         // Extracting color from the first variant if available
    //                         // 'color' => isset($item['variantList'][0]['name']) ? $item['variantList'][0]['name'] : '',
    //                     ];
    //                     // Adding product to products array
    //                     $products[] = $accessoire;
    //                 }
    //             }
    //         }

    //         return view('accessoires', ['products' => $products]);
    //     } catch (\Exception $e) {
    //         return ['message' => $e->getMessage()];
    //     }
    // }
    public function displayAccessories()
    {
        $user = auth()->user();
        $basket = null; // Initialize the basket to null
        
        // Check if the user is authenticated
        if ($user) {
            // If the user is authenticated, retrieve their basket
            $basket = $user->panier;
        }
        
        $totalCost = 0;
        $numProductsInBasket = 0;
        $articles = collect(); // Initialize an empty collection
        
        if ($basket) {
            $numProductsInBasket = $basket->articles->count();
            $articles = $basket->articles;
            
            if ($articles !== null) {
                foreach ($articles as $article) {
                    $articleCost = $article->pivot->quantity * $article->price;
                    $totalCost += $articleCost;
                }
            }
        }
        
        $categories = Categorie::all();
        $category = Categorie::where('name', 'accessoire')->first();
        
        if ($category) {
            $products = Article::where('categorie_id', $category->id)->paginate(6);
            return view('accessoires', [
                'products' => $products,
                'categories' => $categories,
                'basket' => $basket,
                'articles' => $articles,
                'totalCost' => $totalCost,
                'numProductsInBasket' => $numProductsInBasket,
            ]);
        } else {
            return view('accessoires')->with('error', 'Category "accessoire" not found.');
        }
    }
    

    
    public function show($id)
    {
        try {
            $accessoire = Article::findOrFail($id);
            $comments = $accessoire->comments()->with('user')->get();
            return view('oneAccessoire', compact('accessoire','comments'));
        } catch (Exception $e) {
            return  $e->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'titre' => 'required|string',
                'description' => 'required|string',
                'photo' => 'nullable|image|max:2048',
                'categorie_id' => 'required|exists:categories,id',
                'price' => 'nullable|numeric',
            ]);
            if ($request->hasFile('photo')) {
                $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
            }

            Article::create($validatedData);
            // return redirect()->route('accessoires')->with('success', 'accessoire created successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            return ('Error creating accessoire: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        // dd($request);
        try {
            $request->validate([
                'photo' => 'nullable|image|max:2048',
                'categorie_id' => 'required|exists:categories,id',
                'titre' => 'required|string',
                'description' => 'required|string',
                'price' => 'nullable|numeric',
            ]);
            $id = $request->id;
            // dd($id);
            $accessoire = Article::FindOrFail($id);
            if ($request->hasFile('photo')) {
                $accessoire->photo = $request->file('photo')->store('photos', 'public');
            }
            // dd($request->all());
            $accessoire->update([
                'titre' => $request->titre,
                'description' => $request->description,
                'photo' => $accessoire->photo,
                'categorie_id' => $request->categorie_id,
                'price' => $request->price,
            ]);
            return redirect()->back();
        } catch (\Exception $e) {
            return ('Error updating accessoire: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $accessoire = Article::FindOrFail($id);
        $accessoire->delete();
        return redirect()->back();
    }


    // public function search(Request $request)
    // {
    //     try {
    //         $searchTerm = $request->query('titre');
    //         $accessories = Accessoire::where('titre', 'like', '%' . $searchTerm . '%')
    //             ->join('categories', 'accessoires.categorie_id', '=', 'categories.id')
    //             ->where('categories.name', 'accessoirre')
    //             ->get();
    //         return response()->json($accessories);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'An error occurred while searching for accessories.'], 500);
    //     }
    // }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $filteredBooks = Article::where('titre', 'like', '%' . $query . '%')
            ->whereHas('categorie', function ($query) {
                $query->where('name', 'accessoire');
            });

        if ($query) {
            $filteredBooks->orWhere('auteur', 'like', "%$query%");
        }

        $filteredBooks = $filteredBooks->paginate(8);

        return response()->json($filteredBooks);
    }
}
