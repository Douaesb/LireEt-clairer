<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function loginV()
    {
        return view('auth/login');
    }

    public function registerV()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $this->create($data);
        return $this->redirectBasedOnRole();
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        $check = $request->only('email', 'password');
        if (Auth::attempt($check)) {
            return $this->redirectBasedOnRole();
        }
        return redirect('login')->withSuccess('incorrect credentials');
    }

    public function create(array $data)
    {
        return User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'client',

        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function redirectBasedOnRole()
    {
        $user = auth()->user();
        // dd($user);
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('client.home');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::where('role','<>','admin')->orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }



    public function home()
    {
        // Get the authenticated user
        $user = auth()->user();
    
        // Get the user's basket (panier)
        $basket = $user->panier;
        
        // Calculate the total cost of all articles in the basket
        $totalCost = 0;
        $numProductsInBasket = 0;

        if ($basket) {
            $numProductsInBasket = $basket->articles->count();

            foreach ($basket->articles as $article) {
                // Calculate the cost for each article (quantity * price)
                $articleCost = $article->pivot->quantity * $article->price;
                // Add the article cost to the total cost
                $totalCost += $articleCost;
            }
        }
    
        // Get the list of categories
        $categories = Categorie::all();
    
        // Get the category "accessoire"
        $category = Categorie::where('name', 'accessoire')->first();
    
        // Get products based on the category
        if ($category) {
            $products = Article::where('categorie_id', $category->id)->paginate(6);
    
            // Pass the total cost along with other data to the view
            return view('client.home', [
                'products' => $products,
                'categories' => $categories,
                'basket' => $basket,
                'articles' => $basket->articles,
                'totalCost' => $totalCost, 
                'numProductsInBasket' => $numProductsInBasket, 
            ]);
        } else {
            return view('client.home')->with('error', 'Category "accessoire" not found.');
        }
    }
    

    public function banUser($id)
    {
        $user = User::find($id);
        if ($user) {
            // die('here');
            $user->update(['ban' => true]);
            // dd($user->ban);
            if (auth()->check() && auth()->user()->id == $id) {
                auth()->logout();
                return redirect()->route('login')->with('banned_message', 'You are banned from logging in.');
            }

            return redirect()->route('admin.users')->with('success', 'User has been banned.');
        }

        return redirect()->route('admin.users')->with('error', 'User not found.');
    }

    public function unbanUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update(['ban' => false]);
            return redirect()->route('admin.users')->with('success', 'User unbanned successfully.');
        }
        return redirect()->route('admin.users')->with('error', 'User not found.');
    }
}
