<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use App\Models\Blog;
use App\Models\User;
use App\Models\Topic;


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

Route::get('/',  function () {
    return view('welcome', [
        'blogs' => Blog::all(),
        'users' => User::all(),
    ]);
});

Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');


Route::get('/console/register', [UsersController::class, 'registerForm'])->middleware('guest');
Route::post('/console/register', [UsersController::class, 'register'])->middleware('guest');

Route::get('/console/blogs/homepage', [BlogsController::class, 'homepage'])->middleware('auth');
Route::get('/console/blogs/list', [BlogsController::class, 'list'])->middleware('auth');
Route::get('/console/blogs/add', [BlogsController::class, 'addForm'])->middleware('auth');
Route::post('/console/blogs/add', [BlogsController::class, 'add'])->middleware('auth');
Route::get('/console/blogs/edit/{blog:id}', [BlogsController::class, 'editForm'])->where('blog', '[0-9]+')->middleware('auth');
Route::post('/console/blogs/edit/{blog:id}', [BlogsController::class, 'edit'])->where('blog', '[0-9]+')->middleware('auth');
Route::get('/console/blogs/delete/{blog:id}', [BlogsController::class, 'delete'])->where('blog', '[0-9]+')->middleware('auth');


