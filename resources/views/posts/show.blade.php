@extends('layouts.master')

@section('content') 
    <h1>Post Info</h1>
    <h3>{{ $post->title }}</h3> 
    <p>{{ $post->content }}</p>
    <a href="{{ $post->url }}">{{ $post->url }}</a>
    <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</p>
	<button>Edit</button>
	<button>Delete</button>
@stop