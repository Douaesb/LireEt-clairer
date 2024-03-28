<?php

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

Route::get('/accessoires', function () {
    return view('accessoires');
});

Route::get('/oneBook', function () {
    return view('oneBook');
});

Route::get('/oneAccessoire', function () {
    return view('oneAccessoire');
});