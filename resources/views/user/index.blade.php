@extends('layouts.navbar')

@section('content')
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>URL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogPosts as $blogPost)
            <tr>
                <td>{{ $blogPost->title }}</td>
                <td>{{ $blogPost->description }}</td>
                <td>
                    @if ($blogPost->image)
                        <img src="{{ asset('images/' . $blogPost->image) }}" alt="Image">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $blogPost->url }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
