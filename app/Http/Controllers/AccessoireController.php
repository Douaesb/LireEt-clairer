<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use App\Models\Article;
use App\Models\Categorie;
use Carbon\Carbon;
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
        $category = Categorie::where('name', 'accessoire')->first();
        if ($category) {
            $products = Article::where('categorie_id', $category->id)->paginate(6);
            // dd($products);
            return view('accessoires', ['products' => $products]);
        } else {
            return view('accessoires')->with('error', 'Category "accessoire" not found.');
        }
    }

    public function show($id)
    {
        $accessoire = Article::findOrFail($id);
        return view('oneAccessoire', ['accessoire' => $accessoire]);
    }
    
}
