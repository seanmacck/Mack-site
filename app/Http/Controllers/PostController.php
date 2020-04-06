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
       $blogPost = new BlogPost();
       $title = $request->input('title');
       $content = $request->input('content');
       $blogPost->save();

       //dd($title, $content);
       return redirect()->route('posts.show', ['post' => $blogPost->id]);

    }

}
