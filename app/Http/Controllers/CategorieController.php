<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function categories(){
        $categories = Categorie::all();
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        Categorie::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]); 
        $id = $request->CategoryId;
        $categorie = Categorie::findOrFail($id);
        $categorie->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function destroy($id){
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }

}
