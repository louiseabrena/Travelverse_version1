<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function tagForm()
    {
        return view('blogs.tag', [
            'topic' => Topic::all(),
        ]);
    }
    
    public function tag()
    {

        $attributes = request()->validate([
            'tag' => 'required',
        ]);

        $topic = new Topic();
        $topic->tag = $attributes['tag'];
        $topic->save();

        return back()
            ->with('message', 'Tag has been added!');
    }
}
