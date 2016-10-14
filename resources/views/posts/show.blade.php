@extends('layouts.master')

@section('content') 
    <h1>Post Info</h1>
    <h3>{{ $post->title }}</h3> 
    <p>{{ $post->content }}</p>
    <a href="{{ $post->url }}">{{ $post->url }}</a>
    <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</p>
    <br>
    <form></form>
    <form></form>
	<a href="{{ action('PostsController@update', $post->id) }}" class="btn btn-primary">Edit</a>
	<a href="{{ action('PostsController@destroy', $post->id) }}" class="btn btn-danger">Delete</a>
@stop
