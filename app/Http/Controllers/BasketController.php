<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    // Display the basket contents
    public function index()
    {
        // Get the user's basket
        $user = auth()->user();
        $basket = $user->panier;

        // Get the articles in the basket with quantities
        $articles = $basket->articles()->get();

        // Return the view with the basket contents
        return view('basket.index', ['basket' => $basket, 'articles' => $articles]);
    }

    // Add an item to the basket
    public function add(Request $request)
    {
        // Ensure the user is authenticated
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to the basket.');
        }

        // Retrieve the user's panier (basket)
        $basket = $user->panier;
        if (!$basket) {
            $basket = new Panier();
            $basket->user_id = $user->id;
            $basket->date_creation = Carbon::now();
            $basket->save();
        }

        // Retrieve article ID and quantity from the request
        $articleId = $request->input('article_id');
        $quantity = $request->input('quantity', 1);

        // Check if the article is already in the basket
        $commande = $basket->articles()->where('article_id', $articleId)->first();
        if ($commande) {
            // Update the quantity if the article is already in the basket
            $commande->pivot->quantity += $quantity;
            $commande->pivot->save();
        } else {
            // Add a new article to the basket
            $basket->articles()->attach($articleId, ['quantity' => $quantity]);
        }

        // Redirect to the basket page with a success message
        return redirect()->route('basket.index')->with('success', 'Item added to the basket.');
    }

    // Update item quantity in the basket
    public function update(Request $request)
    {
        $user = auth()->user();
        $basket = $user->panier;

        // Get the article and new quantity from the request
        $articleId = $request->input('article_id');
        $newQuantity = $request->input('quantity');

        // Update the quantity of the article in the basket
        $commande = $basket->articles()->where('article_id', $articleId)->first();
        if ($commande) {
            $commande->pivot->quantity = $newQuantity;
            $commande->pivot->save();
        }

        // Redirect back to the basket page
        return redirect()->route('basket.index');
    }

    // Remove an item from the basket
    public function remove(Request $request)
    {
        $user = auth()->user();
        $basket = $user->panier;

        // Get the article ID from the request
        $articleId = $request->input('article_id');

        // Remove the article from the basket
        $basket->articles()->detach($articleId);

        // Redirect back to the basket page
        return redirect()->route('basket.index');
    }
}
