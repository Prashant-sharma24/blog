@extends('users.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Blog post Crud opertions</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Product</a>
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
        {{-- <th>Category</th> --}}
        <th width="280px">Action</th>
    </tr>
    @foreach ($categories as $categorie)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $categorie->name }}</td>
        <td>{{ $categorie->slug }}</td>
        {{-- <td>{{ $categorie->category_id }}</td> --}}
        <td>
            <form action="{{ route('category.destroy', $categorie->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('category.show',$categorie->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('category.edit', ['category' => $categorie->id])  }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $categories->links() !!}


@endsection
