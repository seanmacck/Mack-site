@extends('layout')

@section('content')
@forelse ($posts as $post)
<p>
    <h3>
        <a href=" {{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}
    </h3>

</p>
@empty
<p>No Blog posts yet!</p>

@endforelse
@endsection('content')
