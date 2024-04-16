<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'titre',
        'description',
        'photo',
        'langues',
        'categorie_id',
        'auteur',
        'page_count',
        'category',
        'price',
        'pdf_url'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
