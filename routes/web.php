<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home page (on the starting page) redirection
Route::get('/home', function () {
    return view('welcome');
});

// Events page (on the starting page) redirection
Route::get('/events', function () {
    return view('events');
});
