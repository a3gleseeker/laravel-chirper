<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        $posts = post::with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('home', ['posts' => $posts]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'title' => "required|string|max:64",
            'desc' => "required|string|max:256",
        ], 
            [
                'message.required' => "Please write something",
                'message.max' => 'post lenght can be only below 257',
            ]);

        \App\Models\Post::create([
            'title'  => $validated['title'],
            'description' => $validated['desc'],
            'user_id' => 1,
        ]);

        return redirect('/')->with('success', 'post created!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {   

        #$this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:64',
            'description' => 'required|string|max:256',
        ]);

        $post->update($validated);

        return redirect('/')->with('success', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/')->with('success', 'Post Deleted');
    }
}
