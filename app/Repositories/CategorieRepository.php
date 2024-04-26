<?php

namespace App\Repositories;

use App\Models\Categorie;
use Illuminate\Support\Collection;

class CategorieRepository implements CategorieRepositoryInterface
{

    public function getAllCategories(): Collection
    {
        return Categorie::orderBy('created_at', 'desc')->get();
    }

    public function store(array $data): Categorie
    {
        return Categorie::create($data);
    }

    public function update(int $id, array $data): Categorie
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->update($data);
        return $categorie;
    }

    public function delete(int $id): void
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
    }
}
