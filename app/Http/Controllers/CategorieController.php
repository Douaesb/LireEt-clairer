<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Repositories\CategorieRepositoryInterface;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    protected $categorieRepository;

    public function __construct(CategorieRepositoryInterface $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }

    public function categories()
    {
        $categories = $this->categorieRepository->getAllCategories();
        return view('admin.categories', compact('categories'));
    }

    public function store(CategorieRequest $request)
    {
        $this->categorieRepository->store($request->validated());
        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]); 
        $this->categorieRepository->update($request->CategoryId, [
            'name' => $request->name,
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    public function destroy(int $id)
    {
        $this->categorieRepository->delete($id);
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
}
