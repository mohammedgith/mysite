@extends('layouts.app')


@section('content')
    <div class="card-card-defualt">
        <div class="card-header">
            {{isset($tag) ? "Update tag" : "Add a new tag"}}
        </div>
        <div class="card-body">
            <form action="{{isset($tag) ? route('tags.update',$tag->id): route('tags.store')
             }}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
    <div class="form-group">
        <label for="tag">tag Name:</label>
        <input type="text" name="name" class="
         form-control" placeholder="Add a new tag" value="{{isset($tag) ? $tag->name:""}}">
         @error('name')
           <div class="alert alert-danger">
               {{ $message }}
        </div>   
         @enderror
    </div>
    <div class="form-group">
         <button class="btn btn-success">{{isset($tag) ? "Update" : "Add"}}<button>
    </div>
</div>
            </form>
        </div>
    </div>
@endsection