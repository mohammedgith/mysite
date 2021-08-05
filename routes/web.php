<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', 'WelcomeController@index');
    

// Auth::routes();
Auth::routes(['register' => false]);

Route::resource('/tags','TagController');
Route::resource('/posts','PostsController');
Route::resource('/categories','CategoryController');
Route::resource('comments', 'CommentsController');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Route::group(['middleware' =>'auth'], function(){
    // Route::get('/destroy/{id}','PostsController@restore')->name('posts.destroy');
    Route::get('/home', 'HomeController@index')->name('home');
// Route::get('categories', 'CategoryController@index');
// 
Route::get('/trashed-posts','PostsController@trashed')->name('trashed.index');
Route::get('/trashed-posts/{id}','PostsController@restore')->name('trashed.restore');
Route::delete('/posts/force-delete/{id}','PostsController@forceDelete')->name('posts.force-delete');

});
Route::middleware(['auth','admin'])->group(function(){
    
Route::get('/users/create','UserController@create')->name('users.create');
Route::get('/users','UserController@index')->name('users.index');
Route::POST('/users/{user}/make-admin','UserController@makeadmin')->name('users.make-admin');
Route::POST('/users/{user}/make-writer','UserController@makewriter')->name('users.make-writer');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/users/{user}/profile','UserController@edit')->name('users.edit');
    Route::post('/users/{user}/profile','UserController@update')->name('users.update');
    
    });