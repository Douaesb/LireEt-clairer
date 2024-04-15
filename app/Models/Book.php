<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category',
        'title',
        'authors',
        'description',
        'image_url',
        'average_rating',
        'page_count',
        'language',
        'pdf_url',
    ];
    
}
