<?php

namespace App\Repositories;

use App\Models\Categorie;
use Illuminate\Support\Collection;

interface CategorieRepositoryInterface
{

    public function getAllCategories(): Collection;

    public function store(array $data): Categorie;

    public function update(int $id, array $data): Categorie;

    public function delete(int $id): void;
}
