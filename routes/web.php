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

Route::get('/','PostsController@index');                        // trang chủ, hiển thị danh sách post
Route::get('/posts','PostsController@index')->name('listPost'); // trang chủ, hiển thị danh sách post


Route::get('/posts/{id}/detail','PostsController@getDetailPost')->name('getDetailPost');    // hiển thị chi tiết 1 post
Route::get('/posts/{id}/edit','PostsController@getEditPost')->name('getEditPost');          // gọi view edit 1 post
Route::get('/posts-by-me','PostsController@getPostsByMe');                                  // gọi view hiển thị danh sách post của user đang đăng nhập, các chức năng sửa xóa nằm trong view này
Route::post('/posts','PostsController@createPost');                                         // Insert Post
Route::put('/posts','PostsController@editPost');                                            // Update Post
Route::delete('/posts/{id}','PostsController@deletePost')->name('deletePost');              // Delete Post
// comment
Route::post('/comments','CommentsController@createComment');                                // Add Comment
Route::delete('/comments','CommentsController@deleteComment');                              // Delete Comment
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// end topic 3: Database query-builder


// topic 4 : Eloquent ORM
Route::get('/users','UsersController@getUsers');
Route::get('/users-part2','UsersController@getUsersPart2');
//end topic 4 : Eloquent ORM
