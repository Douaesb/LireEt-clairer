<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Categorie;
use App\Services\GoogleBooksService;
use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{


    // public function getBookData($categories, $languages, $maxResults)
    // {
    //     $categoryQuery = implode('+', $categories);
    //     $languageQuery = implode('+', $languages);

    //     $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($categoryQuery) . "&langRestrict=" . urlencode($languageQuery) . "&maxResults=" . $maxResults;

    //     $response = Http::get($url);

    //     if ($response->successful()) {
    //         $data = $response->json();

    //         if (isset($data['items'])) {
    //             $books = $data['items'];

    //             $bookData = [];

    //             // dd($books);

    //             foreach ($books as $book) {
    //                 $bookInfo = [
    //                     'category' => isset($book['volumeInfo']['categories'][0]) ? $book['volumeInfo']['categories'][0] : 'book',
    //                     'title' => $book['volumeInfo']['title'],
    //                     'authors' => isset($book['volumeInfo']['authors']) ? implode(", ", $book['volumeInfo']['authors']) : 'Unknown Author',
    //                     'description' => $book['volumeInfo']['description'] ?? 'No description available',
    //                     'thumbnail' => $book['volumeInfo']['imageLinks']['thumbnail'] ?? 'No thumbnail available',
    //                     'pageCount' => $book['volumeInfo']['pageCount'] ?? 'N/A',
    //                     'language' => $book['volumeInfo']['language'] ?? 'N/A',

    //                 ];

    //                 $bookData[] = $bookInfo;
    //             }


    //             return $bookData;
    //         } else {
    //             return null;
    //         }
    //     } else {
    //         return null;
    //     }
    // }


    // public function createBooks($bookData)
    // {
    //     foreach ($bookData as $book) {
    //         $pageCount = is_numeric($book['pageCount']) ? $book['pageCount'] : null;
    //         Article::create([
    //             'category' => $book['category'],
    //             'titre' => $book['title'],
    //             'auteur' => $book['authors'],
    //             'description' => $book['description'],
    //             'photo' => $book['thumbnail'],
    //             'page_count' => $pageCount,
    //             'langues' => $book['language'],
    //             'categorie_id' => 2,
    //         ]);
    //     }
    // }


    // public function index()
    // {
    //     $categories = ["science fiction", "history", "biography", "literature", "psychology", "fantasie", "Adventure"];
    //     $languages = ["en", "fr", "ar"];
    //     $maxResults = 40;
    //     $bookData = $this->getBookData($categories, $languages, $maxResults);
    //     // dd($bookData);
    //     $this->createBooks($bookData);

    //     $booksWithImages = array_filter($bookData, function ($book) {
    //         return isset($book['thumbnail']) && $book['thumbnail'] != '';
    //     });

    //     return view('books', ['bookData' => $booksWithImages]);
    // }

    public function displayBooks()
    {
        $categories = Categorie::where('name','<>','accessoire')->get();
        $category = Categorie::where('name', '<>', 'accessoire')->first();
        if ($category) {
            $books = Article::orderBy('created_at', 'desc')->paginate(6);
            // dd($products);
            return view('books', ['bookData' => $books, 'categories' => $categories]);
        } else {
            return view('books')->with('error', 'Category "book" not found.');
        }
    }

    public function show($articleId)
    {
        try {
            $book = Article::findOrFail($articleId);
            $comments = $book->comments()->with('user')->get();
            return view('oneBook', compact('book','comments'));
        } catch (Exception $e) {
            return  $e->getMessage();
        }
    }

    // public function show($id)
    // {
    //     $book = Article::findOrFail($id);
    //     return view('oneBook', ['book' => $book]);
    // }

    public function store(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'titre' => 'required|string',
                'description' => 'required|string',
                'photo' => 'nullable|image|max:2048',
                'langues' => 'nullable|string',
                'categorie_id' => 'required|exists:categories,id',
                'auteur' => 'nullable|string',
                'page_count' => 'nullable|integer',
                'category' => 'nullable|string',
                'price' => 'nullable|numeric',
                'pdf_url' => 'nullable|string',
            ]);
            if ($request->hasFile('photo')) {
                $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
            }

            Article::create($validatedData);
            // return redirect()->route('books')->with('success', 'book created successfully.');
            return redirect()->back();

        } catch (\Exception $e) {
            return ('Error creating book: ' . $e->getMessage());
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
                'page_count' => 'nullable|integer',
                'auteur' => 'nullable|string',
                'langues' => 'nullable|string',
                'pdf_url' => 'nullable|string',
            ]);
            $id = $request->id;
            // dd($id);
            $book = Article::FindOrFail($id);
            if ($request->hasFile('photo')) {
                $book->photo = $request->file('photo')->store('photos', 'public');
            }
            // dd($request->all());
            $book->update([
                'titre' => $request->titre,
                'description' => $request->description,
                'photo' => $book->photo,
                'langues' => $request->langues,
                'categorie_id' => $request->categorie_id,
                'auteur' => $request->auteur,
                'page_count' => $request->page_count,
                'price' => $request->price,
                'pdf_url' => $request->pdf_url,
            ]);
            // return redirect()->route('books')->with('success', 'book modified successfully.');
            return redirect()->back();

        } catch (\Exception $e) {
            return ('Error updating book: ' . $e->getMessage());
        }
    }

    public function destroy($id){
        $book = Article::FindOrFail($id);
        $book->delete();
        return redirect()->back();

    }

    public function filterBooks($categoryId)
    {
        $booksPerPage = 6; 
        $query = Article::query();
            if ($categoryId === 'all') {
            $query->whereHas('categorie', function ($query) {
                $query->where('name', '!=', 'accessoire');
            });
        } else {
            $query->where('categorie_id', $categoryId);
        }
    
        $books = $query->paginate($booksPerPage);
                return response()->json(['books' => $books]);
    }
    
}
