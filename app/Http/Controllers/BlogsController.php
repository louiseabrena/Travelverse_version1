<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Blog;
use App\Models\User;
use App\Models\Topic;
use App\Models\Comment;


class BlogsController extends Controller
{
     public function list(User $user, Blog $blog)
    {
        return view('blogs.list', [
        'user' => auth()->user(),
        'blog' => $blog,
        'blogs' => Blog::where('user_id', '=', $user->id)->get(),
        'comments' => Comment::all(),
    ]);
    }
    public function page(User $user, Blog $blog)
    {
        return view('blogs.page', [
        'user' => auth()->user(),
        'blog' => $blog,
        'blogs' => Blog::where('user_id', '=', $user->id)->get(),
        'comments' => Comment::all(),
    ]);
    }

    public function addForm()
    {
        return view('blogs.add', [
            'topic' => Topic::all(),
            'user' => auth()->user(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'topic_id' => 'required',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $attributes['title'];
        $blog->content = $attributes['content'];
        $blog->topic_id = $attributes['topic_id'];
        $blog->user_id = Auth::user()->id;
        $blog->save();

        return back()
            ->with('message', 'Blog has been added!');
    }

    public function editForm(Blog $blog)
    {
        return view('blogs.edit', [
            'blog' => $blog,
            'topic' => Topic::all(),
            'user' => auth()->user(),
        ]);
    }

    public function edit(Blog $blog)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'topic_id' => 'required',
            'content' => 'required', 
        ]);

        $blog->title = $attributes['title'];
        $blog->content = $attributes['content'];
        $blog->topic_id = $attributes['topic_id'];
        $blog->save();

        return back()
            ->with('message', 'Blog has been edited!');
    }

    public function delete(Blog $blog)
    {
        if($blog->image)
        {
            Storage::delete($blog->image);
        }

        $blog->delete();
        
        return back()
            ->with('message', 'Blog has been deleted!');        
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $blogs = Blog::where('title', 'LIKE', '%'.$search_text.'%')->with('topic')->get();
        $users = Blog::where('user_id', 'LIKE', '%'.$search_text.'%')->with('user')->get();


        return view('blogs.search', compact('blogs'));
    }

    public function userBlogs(User $user, Blog $blog)
    {
        return view('blogs.homepage', [
            'user' => $user,
            'blog' => $blog,
            'blogs' => Blog::where('user_id', '=', $user->id)->get(),
            'comments' => Comment::all(),
        ]);

    }

    public function imageForm(User $user, Blog $blog)
    {
        return view('blogs.image', [
            'blog' => $blog,
            'user' => auth()->user(),
        ]);
    }

    public function image(User $user, Blog $blog)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($blog->image)
        {
            Storage::delete($blog->image);
        }
        
        $path = request()->file('image')->store('blogs');

        $blog->image = $path;
        $blog->save();
        
        return back()
            ->with('message', 'Blog image has been added!');
    }

}
