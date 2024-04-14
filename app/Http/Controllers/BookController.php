<?php

namespace App\Http\Controllers;

use App\Services\GoogleBooksService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{


    public function getBookData($categories, $languages, $maxResults)
    {
        $categoryQuery = implode('+', $categories);
        $languageQuery = implode('+', $languages);
    
        $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($categoryQuery) . "&langRestrict=" . urlencode($languageQuery) . "&maxResults=" . $maxResults;
    
        $response = Http::get($url);
    
        if ($response->successful()) {
            $data = $response->json();
    
            if (isset($data['items'])) {
                $books = $data['items'];
    
                $bookData = [];
    
                foreach ($books as $book) {
                    $bookInfo = [];
    
                    $bookInfo['title'] = $book['volumeInfo']['title'];
    
                    if (isset($book['volumeInfo']['authors'])) {
                        $bookInfo['authors'] = implode(", ", $book['volumeInfo']['authors']);
                    } else {
                        $bookInfo['authors'] = "Auteur inconnu";
                    }
    
                    if (isset($book['volumeInfo']['description'])) {
                        $bookInfo['description'] = $book['volumeInfo']['description'];
                    } else {
                        $bookInfo['description'] = "Pas de description disponible";
                    }
    
                    if (isset($book['volumeInfo']['imageLinks']['thumbnail'])) {
                        $bookInfo['thumbnail'] = $book['volumeInfo']['imageLinks']['thumbnail'];
                    } else {
                        $bookInfo['thumbnail'] = "Pas d'image de couverture disponible";
                    }
    
                    $bookData[] = $bookInfo;
                }
    
                return $bookData;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    
 
    public function index()
    {
        $categories = ["science fiction", "history", "biography"]; // Example categories
        $languages = ["en", "fr", "ar"]; // Example languages (English, French, Arabic)
        $maxResults = 20; // Example maximum number of books
        $bookData = $this->getBookData($categories, $languages, $maxResults);
      
        $booksWithImages = array_filter($bookData, function ($book) {
            return isset($book['thumbnail']) && $book['thumbnail'] != '';
        });
    
        return view('books', ['bookData' => $booksWithImages]);
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
