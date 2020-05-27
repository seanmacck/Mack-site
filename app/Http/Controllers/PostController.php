<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;

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
        //$request->session()->reFlash();               // To display a message, if something was created or not!
       return view('posts.create');
    }

    public function store(StorePost $request)
    {
      //dd($request->all());

      $validatedData = $request->validated();                             // validates data
      $blogPost = BlogPost::create($validatedData);
      $request->session()->flash('status', 'Blog Post was created!');
       //dd('ok');
       //dd($title, $content);
       return redirect()->route('posts.show', ['post' => $blogPost->id]);

    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('posts.edit', ['post' => $post]);                      //returns view of blogpost in database
    }

    public function update(StorePost $request, $id)
    {
        $post = BlogPost::find($id);
        $validatedData = $request->validated();

        $post->fill($validatedData);
        $post->save();
        $request->session()->flash('status', 'Blog post was updated!');

        return redirect()->route('posts.show', ['post' => $post->id]);


    }

    public function destroy(Request $request, $id)
    {
       $post = BlogPost::findOrFail($id);
       $post->delete();

       $request->session()->flash('status', 'Blog post was deleted');

       return redirect()->route('posts.index', ['post' => $post->id]);

    }
}
