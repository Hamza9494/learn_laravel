<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        request()->validate(['content' => 'min:4']);
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->content;
        $comment->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'comment posted successfully');
    }
}
