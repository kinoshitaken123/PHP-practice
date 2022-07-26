<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageListController;

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
    return view('welcome');
    return view('top');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::resource('users','UsersController')->only(['index','create','store']);

Route::resource('posts', 'App\Http\Controllers\ImageListController')
    ->except(['create', 'destroy']);

Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('search.index');

