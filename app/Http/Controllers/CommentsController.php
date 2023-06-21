<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Blog;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Blog $blog)
    {

        $attributes = request()->validate([
            'readerName' => 'required',
            'commentContent' => 'required', 
        ]);

        $comment = new Comment();
        $comment->blog_id = $blog->id;
        $comment->readerName = $attributes['readerName'];
        $comment->commentContent = $attributes['commentContent'];
        $comment->save();

        return back();
    }
}
