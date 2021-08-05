@extends('layouts.app')



@section('content')
<a href="{{route('users.create')}}" class="btn btn-success mlr">Create User</a><br/>
    <div class="card card-defualt">
        <div class="card-header">All users</div> 
    @if ( $users->count() > 0)
    <table class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>image</th>
                    <th>title</th>
                    <th>action</th>
                </tr>
            
        </thead>
        <tbody>
              
              @foreach ($users as $user)
              <tr>
                  <td>
                     {{-- <img src="{{asset('storage/'.$user->getPicture()) $user->getGravatar()}}" style="border-radius" width="100px" height="50px"> --}}
                     
                     <img src="{{ $user->hasPicture() ? asset('storage/'. $user->getPicture()):$user->getGravatar()}}"  
                     style="border-radius" width="100px" height="50px">
                    
                  </td>
                  <td>
                    {{$user->name}}
                  </td>
                  <td>
                    @if (!$user->isAdmin())
                       <form action="{{ route('users.make-admin',$user->id) }}" method="POST">
                        <button class="btn btn-success" type="submit">make-admin</button>
                    @csrf
                    </form>
                    @else
                    {{$user->role}}
                    @endif
                </td>
                <td>
                    @if ($user->isAdmin())
                       <form action="{{ route('users.make-writer',$user->id) }}" method="POST">
                        <button class="btn btn-success" type="submit">make-writer</button>
                    @csrf
                    </form>
                    @else
                    {{$user->role}}
                    @endif
                </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
         <div class="card-body">
             <h1 class="text-center">NO users yet.</h1>
         </div>
    @endif
      </table>
@endsection