<?php

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
});
Route::get('/addPost', function () {
    return view('post.add');
})->name('add_post');

Route::post('/insertPost','PostController@add');

Route::get('/addComment', function (){
    return view('comment.add');
})->name('add_comment');

Route::post('/insertComment','CommentController@add');

Route::get('gitTest',function(){
    return "Montazeri";
});
/*
Route::get('/test',function (){
    $comment = App\Post::find(1)->comments()->first();
    return $comment;
});*/
Route::get();
