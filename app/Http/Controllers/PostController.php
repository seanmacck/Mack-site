<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;
use App\Http\Requests;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('posts.index', ['posts' => BlogPost::all()]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', ['posts' => BlogPost::findOrFail($id)]);
    }

    public function create()
    {
       return view('posts.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
       //$blogPost = new BlogPost();
       //$title = $request->input('title');
       //$content = $request->input('content');
       //$blogPost->save();

       //$request->session()->flash('status', 'Blog Post was created!');
       dd('ok');
       //dd($title, $content);
       //return redirect()->route('posts.show', ['post' => $blogPost->id]);

    }

    //public function edit($id)
    //{
        //$post = BlogPost::find($id);
        //find the article associated with the id.
        //return view('posts.edit', compact('post'));                      //returns view of blogpost in database
    //}

    //public function update($id)
    //{
        //$post = BlogPost::find($id);

       //$blogPost = new BlogPost();
       //$title = $request->input('title');
       //$content = $request->input('content');
       //$blogPost->save();

       //return redirect('/posts/' . $post->id);                             //changes 'POST' request to 'PUT', look at edit.blade.php
    //}
}
