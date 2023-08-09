@extends('users.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="text-right">
            <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('blogs.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        {{-- <div class="mb-6 ">
            <label class="block">
                <span class="text-gray-700">Select Category</span>
                <select name="category_id" class="block w-full mt-1 rounded-md">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </label>
            @error('category_id')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="mb-6 ">
            <label class="block">
                <span class="text-gray-700">Select Category</span>

                @foreach ($categories as $category)
                <div>
                <input type="checkbox"  name="category_id[]" value="{{ $category->id }}">
                <label for="{{ $category->id }}">{{ $category->name }}</label>
                </div>
                @endforeach
            </label>
            @error('category')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

          {{-- @foreach ($categories as $category)
          <div>
          <input type="checkbox" id="{{ $category->id }}" name="category_id" value="{{ $category->id }}">
          <label for="{{ $category->id }}">{{ $category->name }}</label>
          </div>
         @endforeach --}}

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <script>
        const allCategoriesCheckbox = document.querySelector('#all-categories');
        const categoryCheckboxes = document.querySelectorAll('input[type="checkbox"]:not(#all-categories)');

        allCategoriesCheckbox.addEventListener('change', () => {
          categoryCheckboxes.forEach(checkbox => {
            checkbox.checked = allCategoriesCheckbox.checked;
          });
        });
      </script>
@endsection
