<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            return redirect()->route('client.home');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::where('role', '<>', 'admin')->orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    public function home()
    {
        return view('client.home');
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
