<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'panier_id',
        'article_id',
        'quantity',
        'etat',
    ];

    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
