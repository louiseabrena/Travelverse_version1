<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\TopicsController;
use App\Models\Blog;
use App\Models\User;
use App\Models\Topic;
use App\Models\Comment;


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

Route::get('/',  function (Blog $blog, Comment $comment) {
    return view('welcome', [
        'blogs' => Blog::all(),
        'users' => User::all(),
        'topics' => Topic::all(),
        'comments' => Comment::all(),
        'blog' => $blog,
    ]);
});

Route::get('/blogs/page/{blog:id}', [BlogsController::class, 'page'])->where('blog', '[0-9]+');

Route::get('/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/login', [ConsoleController::class, 'login'])->middleware('guest');


Route::get('/register', [UsersController::class, 'registerForm'])->middleware('guest');
Route::post('/register', [UsersController::class, 'register'])->middleware('guest');

Route::get('/blogs/{user:id}/profile', [BlogsController::class, 'list'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/blogs/{user:id}', [BlogsController::class, 'userBlogs'])->where('user', '[0-9]+');
Route::get('/blogs/tag', [TopicsController::class, 'tagForm'])->middleware('auth');
Route::post('/blogs/tag', [TopicsController::class, 'tag'])->middleware('auth');

Route::get('/blogs/add', [BlogsController::class, 'addForm'])->middleware('auth');
Route::post('/blogs/add', [BlogsController::class, 'add'])->middleware('auth');
Route::get('/blogs/image/{blog:id}', [BlogsController::class, 'imageForm'])->where('blog', '[0-9]+')->middleware('auth');
Route::post('/blogs/image/{blog:id}', [BlogsController::class, 'image'])->where('blog', '[0-9]+')->middleware('auth');
Route::get('/blogs/edit/{blog:id}', [BlogsController::class, 'editForm'])->where('blog', '[0-9]+')->middleware('auth');
Route::post('/blogs/edit/{blog:id}', [BlogsController::class, 'edit'])->where('blog', '[0-9]+')->middleware('auth');
Route::get('/blogs/delete/{blog:id}', [BlogsController::class, 'delete'])->where('blog', '[0-9]+')->middleware('auth');
Route::get('/blogs/search', [BlogsController::class, 'search']);
Route::get('/blogs/filter/{topic:id}', [BlogsController::class, 'filter']);

Route::post('/blogs/{blog:id}', [CommentsController::class, 'store'])->where('blog', '[0-9]+');