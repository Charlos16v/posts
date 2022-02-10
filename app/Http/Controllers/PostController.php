<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
        // return view(RouteServiceProvider::HOME);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        if (! Gate::allows('create', $post)) {
            abort(403);
        }
        return view('posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Modo eloquent
        $post = (new Post)->fill($request->all() );
        //$car->avatar = $request->file('avatar')->store('public');

        $post->save();
        return redirect()->route('posts.index', app()->getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Post $post)
    {
        //$car = Car::find($carId);
        if (! Gate::allows('show', $post)) {
            abort(403);
        }
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Post $post)
    {
        //$post = Post::find($carId);
        if (! Gate::allows('edit', $post)) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (! Gate::allows('update', $post)) {
            abort(403);
        }
        $post->fill($request->all());

        /*if($car->hasFile('avatar')){
            $centro->avatar = $request->file('avatar')->store('public');
        }*/

        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Post $post)
    {
        if (! Gate::allows('delete', $post)) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('posts.index', $locale);
    }
}
