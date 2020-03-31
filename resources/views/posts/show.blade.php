@extends('layout')

@section('content')
<h1>{{ $posts->title }}</h1>
<p>{{ $posts->content }}</p>

<p>Added {{$posts->created_at }}</p>
@endsection('content')
