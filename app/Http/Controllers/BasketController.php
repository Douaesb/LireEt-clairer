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
    

    public function add(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to the basket.');
        }
        $basket = $user->panier;
        if (!$basket) {
            $basket = new Panier();
            $basket->user_id = $user->id;
            $basket->date_creation = Carbon::now();
            $basket->save();
        }
        $articleId = $request->input('article_id');
        $quantity = $request->input('quantity', 1);
        $commande = $basket->articles()->where('article_id', $articleId)->first();
        if ($commande) {
            $commande->pivot->quantity += $quantity;
            $commande->pivot->save();
        } else {
            $basket->articles()->attach($articleId, ['quantity' => $quantity]);
        }
        return redirect()->back()->with('success','added to card successfully');
    }

    public function update(Request $request)
    {
        // Ensure the user is authenticated
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to update the basket.'], 401);
        }
    
        // Retrieve the user's basket
        $basket = $user->panier;
        if (!$basket) {
            return response()->json(['error' => 'Basket not found.'], 404);
        }
    
        // Retrieve article ID and new quantity from the request
        $articleId = $request->input('article_id');
        // dd($articleId);
        $newQuantity = $request->input('quantity');
    
        // Validate the new quantity
        if (!is_numeric($newQuantity) || $newQuantity < 0 || $newQuantity > 10) {
            return response()->json(['error' => 'Invalid quantity.'], 400);
        }
    
        // Find the article in the basket
        $articleInBasket = $basket->articles()->where('article_id', $articleId)->first();
    
        if (!$articleInBasket) {
            return response()->json(['error' => 'Article not found in basket.'], 404);
        }
    
        // Update the quantity or remove the article if the new quantity is zero
        if ($newQuantity == 0) {
            $basket->articles()->detach($articleId);
        } else {
            // Update the quantity using the pivot table
            $basket->articles()->updateExistingPivot($articleId, ['quantity' => $newQuantity]);
        }
    
        // Return a success response with updated information
        return response()->json(['success' => true, 'new_quantity' => $newQuantity, 'article_id' => $articleId]);
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
