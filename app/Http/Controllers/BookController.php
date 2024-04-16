<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Categorie;
use App\Services\GoogleBooksService;
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
                $category = Categorie::where('name','<>', 'accessoire')->first();
            if ($category) {
                $books = Article::where('categorie_id', $category->id)->paginate(6);
                // dd($products);
                return view('books', ['bookData' => $books]);
            } else {
                return view('books')->with('error', 'Category "book" not found.');
            }

        }

        public function show($id)
    {
        $book = Article::findOrFail($id);
        return view('oneBook', ['book' => $book]);
    }


    // public function search(Request $request, GoogleBooksService $googleBooksService = null)
    // {


    //     $query = $request->get('query');

    //     if (!$query) {
    //         return response()->json(['message' => 'Please provide a search query'], 400);
    //     }

    //     if ($googleBooksService) {
    //         $books = $googleBooksService->searchBooks($query);
    //     } else {
    //         $apiKey = env('GOOGLE_BOOKS_API_KEY');
    //         $client = new Client();
    //         $search = 'lang=fr'; 
    //         $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($search) . "&orderBy=relevance&maxResults=10&key=" . env('GOOGLE_BOOKS_API_KEY');

    //         $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query) . "&key=" . $apiKey;

    //         $response = $client->request('GET', $url);

    //         if ($response->getStatusCode() === 200) {
    //             $data = json_decode($response->getBody(), true);
    //             $books = isset($data['items']) ? $data['items'] : [];
    //                         return view('books', compact('books'));

    //         } else {
    //             throw new \Exception("Error fetching books: " . $response->getStatusCode());
    //         }
    //     }

    //     return response()->json($books);
    // }




    // public function fetchBooks(Request $request)
    // {
    //     $searchTerm = $request->query('searchTerm');
    //     if (empty($searchTerm)) {
    //         $searchTerm = 'rings';
    //     }

    //     $client = new Client();
    //     $url = "https://openlibrary.org/search.json?q={$searchTerm}&limit=10";
    //     $response = $client->get($url);

    //     if ($response->getStatusCode() === 200) {
    //         $data = json_decode($response->getBody(), true);

    //         $books = [];
    //         foreach ($data['docs'] as $book) {
    //             $bookDetails = [
    //                 'title' => $book['title'],
    //                 'authors' => (isset($book['author_name']) ? implode(', ', $book['author_name']) : 'Author Not Available'),
    //                 'description' => (isset($book['description']) ? $book['description']['value'][0] : 'No description available'),
    //             ];

    //             $books[] = $bookDetails;
    //         }

    //         return view('books', compact('books'));
    //     } else {
    //         return abort(500, 'Failed to fetch books');
    //     }
    // }
}
