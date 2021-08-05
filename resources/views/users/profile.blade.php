@extends('layouts.app')


@section('content')
    <div class="card-card-defualt">
        <div class="card-header">
            profile
        </div>
        <div class="card-body">
            <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
    <div class="form-group">
        <label for="category">Name:</label>
        <input type="text" name="name" class="
         form-control" value="{{ $user->name}}">
    </div>
    <div class="form-group">
        <label for="category">Email:</label>
        <input type="text" name="email" class="
         form-control" value="{{ $user->email}}">
    </div>
    <div class="form-group">
        <label for="about">About:</label>
        <textarea name="about"  class="form-control" cols="60" rows="2" placeholder="tell us about you">
            {{ $profile->about}}
        </textarea>
    </div>
    <div class="form-group">
        <label for="facebook">Facebook:</label>
        <input type="text" name="facebook" class="
         form-control" value="{{ $profile->facebook}}">
    </div>
    <div class="form-group">
        <label for="tiwtter">Tiwtter:</label>
        <input type="text" name="tiwtter" class="
         form-control" value="{{ $profile->tiwtter}}">
    </div>
    <div class="form-group">
        <label for="picture">Picture:</label><br/>
        <img src="{{ $user->hasPicture() ? asset('storage/'. $user->getPicture()):$user->getGravatar()}}"  
        style="border-radius" width="100px" height="50px">
        {{-- <img src="{{$user->getGravatar()}}"> --}}
        <input type="file" name="picture" class ="form-control">
        {{-- <textarea name="" class="form-control" id="" cols="30" rows="2">

        </textarea> --}}
        
        
    </div>
    <div class="form-group">
        <button class="btn btn-success">update profile</button>
    </div>
</div>
            </form>
        </div>
    </div>
@endsection