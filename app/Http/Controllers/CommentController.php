<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store()
    {
        $comment = \App\Comment::create([
            'message' => request('message'),
            'user_id' => request('user_id'),
            'article_id' => request('article_id'),
        ]);

        return redirect()->route('comments.show', [$comment]);
    }
}
