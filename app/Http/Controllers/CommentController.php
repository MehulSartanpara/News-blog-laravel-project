<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function Store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'comment' => 'required',
        ]);
        Comment::create([
            'user_name' => $request->user_name,
            'comment' => $request->comment,
            'post_id' => $request->post_id,
        ]);
        return redirect()->back()->with('success', 'Commented Successfully');
    }
}
