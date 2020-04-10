@extends('layout')

@section('content')
<form method="POST" action="{{ route('posts.store') }}">
<input type="hidden" name="_method" value="PUT">
@csrf

<p>

<label>Title</label>
<input type="text" name="title" value="{{$post->title}}">

</p>

<p>
<label>Content</label>
<input type="text" name="content" value="{{$post->content}}">
</p>

<button type="submit">Create!</button>
</form>
@endsection('content')
