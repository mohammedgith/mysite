@extends('layouts.app')
@section('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card-card-defualt offset-md-3" style="width: 800px">
        <div class="card-header">
            {{isset($posts) ? "Update post" : "Add a new post"}}
        </div>
        <div class="card-body">
            <form action="{{isset($posts) ? route('posts.update', $posts->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
@csrf
@if (isset($posts))
    @method('PUT')
@endif
<div class="form-group">
    <div class="form-group">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <label for="post">post title:</label>
        <input type="text"  class="form-control" name="title" placeholder="Add a new post"
        value="{{ isset($posts) ? $posts->title :'' }}"
        >
    </div>
    <div class="form-group">
        <div class="form-group">
            <label for="post description">post Description:</label>
            <input type="text"  class="form-control" name = "description" 
            value="{{ isset($posts) ? $posts->description :'' }}"
            placeholder="Add a new post description">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="post content">post Content:</label>
               {{-- <textarea name="content"  class="form-control" cols="60" rows="2"></textarea> --}}
               <input id="x" type="hidden" name="content" value="{{ isset($posts) ? $posts->content :'' }}">
               <trix-editor input="x"></trix-editor>
            </div>
            @if (isset($posts))
            <div class="form-group">
                <img src="{{asset('storage/'. $posts->image)}}" alt="" style="width: 100%">
            </div>
            @endif
    <div class="form-group">
        <div class="form-group">
            <label for="post image">post Image:</label>
            <input type="file" class="form-control" name="image">
        </div>
       <div class="form-group">
        <label for="selectCategory">select category</label>
        <select name="categoryID" class="form-control"  id="selectCategory">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option> 
            @endforeach
        </select>
      </div>
    </div>
      {{-- <input type="hidden" name="user_id" value="{{auth::user()->id}}"> --}}
      @if (!$tags->count() <= 0)
      <div class="form-group">
        <label for="selectTag">select a tag</label>
        <select name="tags[]" class="form-control tags" id="selectTag" multiple>
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}" 
                @if ($posts->hasTag($tag->id))
                    selected
                @endif 0925311185
                > 
                {{$tag->name}}</option> 
            @endforeach
        </select>
      </div>
      @endif
   <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success">{{isset($posts) ? 'update post' : 'add post'}}<button>
       </div>
</div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script> $(document).ready(function() {
    $('.tags').select2();
});</script>
@endsection