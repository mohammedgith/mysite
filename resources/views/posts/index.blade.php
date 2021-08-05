@extends('layouts.app')

@section('content')
{{-- <span>{{$post->comments->count()}} {{ str_plural('comment', $post->comments->count()) }}</span> --}}
<div class="clearfix">
    <a href="{{route('posts.create')}}" class="btn float-right btn-success" style="margin-bottom: 10px">Add post</a>
</div>
    <div class="card card-defualt">
        <div class="card-header">All posts</div> 
    @if ( $posts->count() > 0)
    <table class="card-body">
        <table class="table "  style=" offset-md-4 ">
            <thead>
                <tr>
                    <th>image</th>
                    <th>title</th>
                    <th>action</th>
                </tr>
            
        </thead>
        <tbody>
              
              @foreach ($posts as $post)
              <tr>
                  <td>
                     <img src="{{ asset('storage/'.$post->image)}}" alt="" width="100px" height="50px">
                     {{-- {{$post->image}} --}}
                  </td>
                  <td>
                      {{$post->title}}
                  </td>
             
                    <td>
                        <form class=" float-right" action="{{ $post->trashed() ?  route('posts.force-delete', $post->id) :  route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ml-3" >
                            {{ $post->trashed() ? 'delete' : 'trash'}}
                        </button>
                        </form>
                        @if (!$post->trashed())
                        <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-success float-right btn-sm ml-3">edit</a>
                        <a href="{{ route('posts.show', $post->id)}}" class="btn btn-primary float-right btn-sm">show</a>
                        @else
                        <a href="{{ route('trashed.restore', $post->id)}}" class="btn btn-primary float-right btn-sm">restore</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
         <div class="card-body">
             <h1 class="text-center">NO posts yet.</h1>
         </div>
    @endif
      </table>
@endsection