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

// AUTH ROUTES
Auth::routes();

Route::middleware(['auth', 'admin'])->group(function() {
  Route::get('/users', 'usersController@index')->name('users.home');
  Route::get('/users/create', 'usersController@create')->name('users.create');
  Route::post('/users/{user}/make-admin', 'usersController@makeAdmin')->name('users.make-admin');
});

Route::middleware(['auth'])->group(function() {
  Route::get('/users/{user}/edit', 'usersController@edit')->name('users.edit');
  Route::post('/users/{user}/update', 'usersController@update')->name('users.update');
  Route::post('/users/{user}/delete', 'usersController@delete')->name('users.delete');
  Route::post('/posts/{post}/store', 'commentsController@commentNew')->name('comments.store');
});
Route::get('/users/{user}/profile', 'usersController@profile')->name('users.profile');

// FRONT END ROUTES
Route::get('/', 'frontController@homepage');
Route::get('/allposts', 'frontController@allPosts')->name('posts.allposts');
Route::get('/allposts', 'frontController@allPosts')->name('posts.allposts');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/categories', 'categoriesController');
Route::resource('/posts', 'postsController');
Route::resource('/tags', 'tagsController');
Route::get('/trashed/{post}', 'postsController@trashed')->name('posts.trashed');
