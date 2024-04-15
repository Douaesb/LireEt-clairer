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
        'date_creation',
        'categorie_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
}
