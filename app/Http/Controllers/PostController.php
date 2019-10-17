<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()
            ->pluck('name', 'id')
            ->toArray();

        return view('posts.create', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     * @return void
     */
    public function store(PostStoreRequest $request)
    {
        $name        = $request->get('name');
        $content     = $request->get('content');
        $category_id = $request->get('category_id');

        $file = '';

        if($request->has('file')) {
           $file = $request->file->store('public');
        }

        $post = new Post([
            'name'        => $name,
            'content'     => $content,
            'category_id' => $category_id,
            'file'        => $file
        ]);

        $post->save();

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = $post->comments;

        return view('posts.show', [
            'comments' => $comments,
            'post'     => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::query()
            ->pluck('name', 'id')
            ->toArray();

        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param \App\Post $post
     * @return void
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $name        = $request->get('name');
        $content     = $request->get('content');
        $category_id = $request->get('category_id');

        $file = $post->getFile();

        if($request->has('file')) {
            $file = $request->file->store('public');
        }

        $post->update([
            'name'        => $name,
            'content'     => $content,
            'category_id' => $category_id,
            'file'        => $file,
        ]);



        return view('posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function downloadFile(Post $post)
    {
        return Storage::download($post->getFile());
    }
}
