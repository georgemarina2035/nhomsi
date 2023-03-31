@extends('layout')
@section('title','Show Computer')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center">
        <h1>Computers</h1>
    </div>
    <div>
        <p>{{$computer->name}} ( {{$computer->origin}} ) - <strong>{{$computer->price}}$</strong></p>
    </div>

    <a class="edit-btn" href="{{route('computers.edit', $computer->id)}}">Edit</a>

    <form action="{{route('computers.destroy', $computer->id)}}" method="post">
        @csrf
        @method('delete')
        <input class="delete-btn" type="submit" value="Delete">
    </form>
    
</div>
@endsection