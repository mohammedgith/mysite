@extends('layouts.app')



@section('content')

         <div class="card-body"> --}}
      {{-- tadle for showing data --}}
       <div class="clearfix">
   
    </div>
        <div class="card card-defualt  offset-ml-4">
            <div class="card-header">All posts</div> 
        <table class="card-body">
            <table class="table "  style=" offset-md-4 ">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>title</th>
                        <th>content</th>
                        <th>action</th>
                    </tr>
                
            </thead>
            <tbody>
                  
                
                  <tr>
                      <td>
                         <img src="{{ asset('storage/'.$post->image)}}" alt="" width="100px" height="50px">
                         {{-- {{$post->image}} --}}
                      </td>
                      <td>
                          {{$post->title}}
                      </td>
                      <td>
                        {{$post->content}}
                    </td>
                 @if(!auth::guest())
                 @if(auth::user()->id == $post->user_id)
                        <td>
                            <form class=" float-right" action="{{ route('posts.destroy', $post->id) }}" method="POST">
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
                        </td>
                        @endif
                    </tr>
                   
                </tbody>
            </table>
           @endif
           @endif
        </table>
         </div>
    
       {{-- form for comment --}}
       <form action="{{ route('comment.add') }}" method="POST">
        @csrf
       
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Add your comment</label>
          <textarea class="form-control" name="comment" rows="6"></textarea>
        </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
@endsection   --}}