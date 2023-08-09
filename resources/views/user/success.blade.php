@extends('layouts.navbar')

@section('content')
    <div class="container" style="margin-top: 150px;">
        <h1>Blog Post Successfully Created!</h1>
        <a href="{{ url($url) }}">View Blog Post</a>

        <h2>{{ $blogPost->title }}</h2>
        <p>{{ $blogPost->description }}</p>
        @if ($blogPost->image)
            <img src="{{ asset('images/' . $blogPost->image) }}" alt="Blog Post Image">
        @else
            No Image
        @endif

        <a href="{{ $blogPost->url }}">Visit Website</a>
    </div>
@endsection
