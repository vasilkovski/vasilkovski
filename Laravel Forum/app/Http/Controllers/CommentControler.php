<?php

namespace App\Http\Controllers;

use App\Post;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use Carbon\Carbon;

class CommentControler extends Controller
{
    public function comment(CommentRequest $request, Post $post){
            $user = Auth::user()->id;
            $time = \Carbon\Carbon::now();
        Comment::create([
            'comment' => $request->input('comment'),
            'post_id' => $post->id,
            'user_id' => $user,
            'time' => $time
        ]) ;

       
     return view('post.show', compact('post', 'time'));
 }
}
