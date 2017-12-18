<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */

    public function index(Post $post)
    {
        $posts = $post->orderBy('id', 'asc')->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Post $post
     * @param PostRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, PostRequest $request)
    {
        $post->create($request->all());
        return redirect()->route('post.index');
    }


    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Post $post
     * @param PostRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
