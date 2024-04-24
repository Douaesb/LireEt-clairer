<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function showUserFinalizedCommands()
    {
        $user = auth()->user();
        $panier = $user->panier;
    
        $finalizedCommands = collect();
    
        if ($panier) {
            $finalizedCommands = Commande::where('panier_id', $panier->id)
                ->where('etat', 'Finalized')
                ->with([
                    'article' => function($query) use ($user) {
                        $query->with([
                            'comments' => function($query) use ($user) {
                                $query->where('user_id', $user->id);
                            }
                        ]);
                    }
                ])
                ->get();
        }
            return view('client.commands', [
            'commands' => $finalizedCommands,
        ]);
    }
    
    
}
