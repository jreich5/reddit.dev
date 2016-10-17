@extends('layouts.master')

@section('content') 
    <h1>{{ $user->name }}</h1> 
    <p>Joined {{ $user->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</p>
    <p>Email {{ $user->email }}</p>
    <h3>Previous Posts</h3>
    @foreach ($posts as $post)
        <h3>{{ $post->title }}</h3>
        <a href="{{ $post->url }}">{{ $post->url }}</a>
        <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</p>
        <br>
        <a href="{{ action('PostsController@show', $post->id) }}" class="btn btn-primary">Details</a>
        @if(Auth::id() == $user->id)
            <a href="{{ action('PostsController@update', $post->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ action('PostsController@destroy', $post->id) }}" class="btn btn-danger">Delete</a>
        @endif
    @endforeach
@stop
