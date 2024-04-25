<?php

use App\Http\Controllers\AccessoireController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\CommentController;
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
})->name('welcome');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

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

// Route::get('/home',[UserController::class, 'home'])->name('client.home');


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


// Les routes de gestion du panier
Route::post('basket/add',[BasketController::class, 'add'])->name('basket.add');
Route::post('/basket/update', [BasketController::class, 'update'])->name('basket.update');
Route::post('basket/remove',[BasketController::class, 'remove'])->name('basket.remove');
Route::get('/basket/checkout', [BasketController::class, 'checkout'])->name('basket.checkout');
// Route::post('/basket/empty', [BasketController::class, 'emptyBasket'])->name('basket.empty');



Route::get('/filter-books/{categoryId}', [BookController::class, 'filterBooks']);

Route::post('/payment/initialize', [BasketController::class, 'initializePayment'])->name('payment.initialize');
Route::get('/payment/response', [BasketController::class, 'handlePaymentResponse'])->name('payment.response');
Route::get('/payment/cancel', [BasketController::class, 'paymentCancel'])->name('payment.cancel');


Route::get('/order/success', function () {
    return view('order');
})->name('order.success');


Route::get('/mes-commandes', [CommandController::class, 'showUserFinalizedCommands'])->name('client.commands');

Route::get('/article/{articleId}/comments', [CommentController::class, 'showComments'])->name('article.comments');
Route::post('/article/{id}/comment', [CommentController::class, 'addComment'])->name('article.addComment');
Route::put('/comment/{commentId}/update', [CommentController::class, 'updateComment'])->name('comment.update');
Route::delete('/comment/{commentId}/delete', [CommentController::class, 'deleteComment'])->name('comment.delete');

Route::delete('/comments/{commentId}/archive', [CommentController::class, 'archiveComment'])->name('comments.archive');


Route::post('/article/newsletter', [UserController::class, 'subscribe'])->name('subscribe');
Route::post('/article/contact-us', [UserController::class, 'sendMessage'])->name('sendMessage');