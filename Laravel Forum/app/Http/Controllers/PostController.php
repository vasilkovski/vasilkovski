<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        $timeDb = Comment::select('time')->get();
        $com = Comment::all();

        return view('welcome', compact('data', 'com'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('post.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $user = Auth::user();
        $post = new Post;

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->categories_id = $request->input('category');
        $post->aproved = 0;
        $post->user_id = $user->id;

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/posts/', $filename);
        $post->image = $filename;
        $post->save();

        session()->flash('addedPost', 'Post is added, awaitng for approval');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = Post::all();
        $com = Comment::all();

        return view('post.show', compact('post', 'data', 'com'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::all();

        return view('post.update', compact('post', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $user = Auth::user();

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->categories_id = $request->input('category');
        $post->aproved = 1;
        $post->user_id = $user->id;
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/posts/', $filename);
        $post->image = $filename;
        $post->save();

        return redirect('home')->with(['user', 'post']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/home');
    }

    public function aprove()
    {

        $posts = Post::all();
        foreach ($posts as $post) {
            if ($post->aproved === 0) {
                $post->aproved = 1;
                $post->save();
            }
        }

        session()->flash('aproved', 'Posts are aproved');
        return redirect('/home');
    }
}
