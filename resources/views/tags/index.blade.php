@extends('layouts.app')


@section('content')
@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>

@endif
<div class="clearfix">
    <a href="{{route('tags.create')}}" class="btn float-right btn-success" style="margin-bottom: 10px">Add tag</a>
</div>
    <div class="card card-defualt">
        <div class="card-header">
    All tags 
    <table class="table">
       
        <table class="table">
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>
                        {{$tag->name}}
                    </td>
                    <td>
                        <form class=" float-right" action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ml-3" >delete</button>
                        </form>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary float-right btn-sm ml-3">edit</a>
                        <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-success float-right btn-sm">show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </table>
@endsection