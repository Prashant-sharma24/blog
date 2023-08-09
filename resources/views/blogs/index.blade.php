@extends('users.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Blog post Crud opertions</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Details</th>
        <th>Category</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($blogs as $blog)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $blog->name }}</td>
        <td>{{ $blog->detail }}</td>
        <td>{{ $blog->category_id }}</td>
        <td>
            <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('blogs.show',$blog->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('blogs.edit', ['blog' => $blog->id])  }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $blogs->links() !!}


@endsection
