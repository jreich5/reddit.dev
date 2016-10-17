@extends('layouts.master')

@section('content') 
    <h1>Post Info</h1>
    <h3>{{ $post->title }}</h3>
    <p>By {{ $post->user->name }}</p>
    <p>{{ $post->content }}</p>
    <a href="{{ $post->url }}">{{ $post->url }}</a>
    <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</p>
    <br>
    @if(Auth::id() == $post->created_by)
        <form method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </form>
        <form method="POST" action="{{ action('PostsController@edit', $post->id) }}">
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        </form>
    @endif

@stop