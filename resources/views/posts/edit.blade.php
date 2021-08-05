@extends('layouts.app')


@section('content')
    <div class="card-card-defualt">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update' , $category->id)}}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
    <div class="form-group">
        <label for="category">category Name:</label>
        <input type="text" name="name" value="{{ $category->name }}" class="@error('name')is-invalid @enderror
         form-control" placeholder="Add a new category">
         @error('name')
           <div class="alert alert-danger">
               {{ $message }}
        </div>   
         @enderror
    </div>
    <div class="form-group">
         <button class="btn btn-success">update<button>
    </div>
</div>
            </form>
        </div>
    </div>
@endsection