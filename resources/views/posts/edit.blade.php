@extends('layout')

@section('content')
<form method="POST"
      action="{{ route('posts.update', ['post' => $post->id]) }}">
@method('PUT')
@csrf

@include('posts._form')

<button type="submit">Update!</button>
</form>
@endsection('content')
