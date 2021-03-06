@extends('layout')

@section('content')
@forelse ($posts as $post)
<p>
    <h3>

    <a href=" {{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}>
    </h3>

    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">
        edit
    </a>

    <form method="POST" class="fm-inline"
      action="{{ route('posts.destroy', ['post' => $post->id]) }}">
@method('DELETE')

<input type="submit" value="Delete!" class="btn btn-primary">

</p>
@empty
<p>No Blog posts yet!</p>

@endforelse
@endsection('content')
