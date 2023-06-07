<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Blog;
use App\Models\User;
use App\Models\Topic;

class BlogsController extends Controller
{
     public function list()
    {
        return view('blogs.list', [
            'blog' => Blog::all()
        ]);
    }

    public function homepage()
    {
        return view('blogs.homepage', [
            'blog' => Blog::all()
        ]);
    }

    public function addForm()
    {
        return view('blogs.add', [
            'topic' => Topic::all(),
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

        return redirect('/console/blogs/list')
            ->with('message', 'Blog has been added!');
    }

    public function editForm(Blog $blog)
    {
        return view('blogs.edit', [
            'blog' => $blog,
            'topic' => Topic::all(),
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

        return redirect('/console/blogs/list')
            ->with('message', 'Blog has been edited!');
    }

    public function delete(Blog $blog)
    {
        if($blog->image)
        {
            Storage::delete($blog->image);
        }

        $blog->delete();
        
        return redirect('/console/blogs/list')
            ->with('message', 'Blog has been deleted!');        
    }

}
