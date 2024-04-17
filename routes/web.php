<?php

use App\Http\Controllers\AccessoireController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/books', function () {
    return view('books');
});

// Route::get('/accessoires', function () {
//     return view('accessoires');
// });

Route::get('/oneBook', function () {
    return view('oneBook');
});

Route::get('/oneAccessoire', function () {
    return view('oneAccessoire');
});

// Route::get('/login', function () {
//     return view('auth/login')->name('login');
// });

Route::get('/login',[UserController::class, 'loginV'])->name('login');
Route::get('/register',[UserController::class, 'registerV'])->name('register');

Route::post('/login',[UserController::class, 'login'])->name('loginP');
Route::post('/register',[UserController::class, 'register'])->name('registerP');
Route::post('/logout',[UserController::class, 'logout'])->name('logout');


Route::get('/dashboard',[UserController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/categories',[CategorieController::class, 'categories'])->name('admin.categories');
Route::get('/users',[UserController::class, 'users'])->name('admin.users');

Route::get('/home',[UserController::class, 'home'])->name('client.home');


Route::post('/categorie',[CategorieController::class, 'store'])->name('categorie.store');
Route::put('/categorie/update',[CategorieController::class, 'update'])->name('categorie.update');
Route::delete('/categorie/{id}',[CategorieController::class, 'destroy'])->name('categorie.destroy');

Route::put('/user/ban/{id}', [UserController::class, 'banUser'])->name('ban.user');
Route::put('/user/unban/{id}', [UserController::class, 'unbanUser'])->name('unban.user');

Route::get('/books',[BookController::class, 'displayBooks'])->name('books');
Route::get('/accessoires',[AccessoireController::class, 'displayAccessories'])->name('accessoires');

Route::get('/books/{id}',[BookController::class, 'show'])->name('books.show');
Route::get('/accessoires/{id}',[AccessoireController::class, 'show'])->name('accessoires.show');

Route::post('/books/add',[BookController::class, 'store'])->name('books.store');
Route::put('/books/update',[BookController::class, 'update'])->name('books.update');
Route::delete('/books/delete/{id}',[BookController::class, 'destroy'])->name('books.delete');

Route::post('/accessoires/add',[AccessoireController::class, 'store'])->name('accessoires.store');
Route::put('/accessoires/update',[AccessoireController::class, 'update'])->name('accessoires.update');
Route::delete('/accessoires/delete/{id}',[AccessoireController::class, 'destroy'])->name('accessoires.delete');


Route::post('/search/accessories', [AccessoireController::class, 'search'])->name('accessoires.search');

