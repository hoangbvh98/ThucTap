<?php

use Illuminate\Support\Facades\Auth;
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



// topic 1 - demo middleware
Route::get('/error',  'ApiController@showError')->name('error');
Route::get('/demo-middleware', 'ApiController@getData')->middleware('Authen');

//end topic 1 - demo middleware

// topic 2 component - blade template
Route::get('/demo-blade-template','DemoBladeTemplateController@index');
// end topic 2 component - blade template

// topic 3: Database query-builder

Route::get('/','PostsController@index');
Route::get('/posts','PostsController@index')->name('listPost');
Route::get('/posts/{id}/detail','PostsController@getDetailPost')->name('getDetailPost');
Route::get('/posts/{id}/edit','PostsController@getEditPost')->name('getEditPost');
Route::get('/posts-by-me','PostsController@getPostsByMe');
Route::post('/posts','PostsController@createPost');
Route::put('/posts','PostsController@editPost');
Route::delete('/posts/{id}','PostsController@deletePost')->name('deletePost');
// comment
Route::post('/comments','CommentsController@createComment');
Route::delete('/comments','CommentsController@deleteComment');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// end topic 3: Database query-builder


// topic 4 : Eloquent ORM
Route::get('/users','UsersController@getUsers');
//end topic 4 : Eloquent ORM
