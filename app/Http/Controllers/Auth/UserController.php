<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\Article;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Newsletter\Facades\Newsletter;

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
        $user = $this->create($data);
        Auth::login($user);
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
            'role' => $data['role'],

            // 'role' => 'client',
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
        $user = Auth::user();
        // dd($user);
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('welcome');
        }
    }

    public function dashboard()
{
    $numberOfUsers = User::where('role', '!=', 'admin')->count();

    $numberOfBooks = Article::whereHas('categorie', function ($query) {
        $query->where('name', '!=', 'accessoire');
    })->count();

    $numberOfAccessoires = Article::whereHas('categorie', function ($query) {
        $query->where('name', '=', 'accessoire');
    })->count();

    $numberOfSuccessfulCommands = Commande::where('etat', 'Finalized')->count();

        $mostPopularBook = Commande::join('articles', 'commandes.article_id', '=', 'articles.id')
        ->whereHas('article', function ($query) {
            $query->whereHas('categorie', function ($query) {
                $query->where('name', '!=', 'accessoire');
            });
        })
        ->select('articles.titre', DB::raw('count(*) as total'))
        ->groupBy('articles.titre')
        ->orderBy('total', 'desc')
        ->value('articles.titre');

$mostPopularAccessoire = Commande::join('articles', 'commandes.article_id', '=', 'articles.id')
    ->whereHas('article', function ($query) {
        $query->whereHas('categorie', function ($query) {
            $query->where('name', '=', 'accessoire');
        });
    })
    ->select('articles.titre', DB::raw('count(*) as total'))
    ->groupBy('articles.titre')
    ->orderBy('total', 'desc')
    ->value('articles.titre');

    $articleWithBestRating = Article::whereHas('comments')
        ->select('id', 'titre')
        ->withAvg('comments', 'rating')
        ->orderByDesc('comments_avg_rating')
        ->value('titre');

        $topUser = Commande::join('paniers', 'commandes.panier_id', '=', 'paniers.id')
        ->join('users', 'paniers.user_id', '=', 'users.id')
        ->select('users.id', 'users.name', DB::raw('COUNT(commandes.id) as total_commands'))
        ->groupBy('users.id', 'users.name') 
        ->orderBy('total_commands', 'desc')
        ->value('users.name');

        return view('admin.dashboard',compact('numberOfUsers','numberOfBooks','numberOfAccessoires','numberOfSuccessfulCommands','mostPopularBook'
    ,'mostPopularAccessoire','articleWithBestRating','topUser'));
}

    public function users()
    {
        $users = User::where('role', '<>', 'admin')->orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    public function home()
    {
        return view('welcome');
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

    public function subscribe(Request $request)
   {

       if(!Newsletter::isSubscribed($request->email)){
        Newsletter::subscribe($request->email);
    }
    return redirect()->back();
   }
   
   public function sendMessage(Request $request)
    {
try{
        $data = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|min:5, max:200',
        ]);

        Mail::to('douae.sb411@gmail.com')->send(new ContactFormMail($data));
        return redirect()->back()->with('success', 'Message sent successfully!');
    }catch(\Exception $e){
return $e->getMessage();
    }
    }


}
