<?php

use Illuminate\Support\Facades\Route;
use App\Event;

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

Route::get('/', function () {
    $events = Event::all();
    return view('home', ['events' => $events]);
});

Route::get('login/github', 'Auth\LoginController@github');
Route::get('login/google', 'Auth\LoginController@google');

Route::get('login/github/redirect', 'Auth\LoginController@githubRedirect');
Route::get('login/google/redirect', 'Auth\LoginController@googleRedirect');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.edit');

Route::get('/event/new/create', 'EventsController@create');
Route::post('/event', 'EventsController@store');
Route::get('/event/{id}', 'EventsController@index');

Route::post('comment/store', 'CommentController@store')->name('comment.add');

Route::get('/profile/{user}/registered/event', 'ProfilesController@showProfilesRegisteredEvents'); //return view to show user which events he will attend
Route::get('/profile/{user}/created/event', 'ProfilesController@showProfilesCreatedEvents'); //return view to show organizer which events he created
Route::get('profile/{user}/unregister/{event}', 'ProfilesController@unregisterUserFromEvent');

Route::get('/event/{event}/edit', 'EventsController@edit');
Route::get('/event/{event}/delete', 'EventsController@delete');
Route::patch('event/{event}', 'EventsController@update');
Route::post('event/register', 'EventsController@registerForEvent');
Route::post('event/unregister', 'EventsController@unregisterFromEvent');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@showFilteredEvents');
