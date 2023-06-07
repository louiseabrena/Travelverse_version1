<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Blog;
use App\Models\User;
use App\Http\BlogsController;

use Auth;

class UsersController extends Controller
{
    public function registerForm()
    {
        return view('console.register');
    }

    public function register()
    {

        $attributes = request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->firstName = $attributes['firstName'];
        $user->lastName = $attributes['lastName'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->save();

        return redirect('/console/login')
            ->with('message', 'Account creation successful!');
    }

    public function list()
    {
        $user = Auth::user();
        $blogs = Blog::all();
        return view('blogs.list', compact('user', 'blogs'));
    }

}
