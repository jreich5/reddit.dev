@extends('layouts.master')

@section('content') 
    <h1>Posts</h1>
    {!! $posts->render() !!}
    @foreach ($posts as $post)
        <h3>{{ $post->title }}</h3> 
        <p>By {{ $post->user->name }}</p>
        <p>{{ $post->content }}</p>
        <a href="{{ $post->url }}">{{ $post->url }}</a>
        <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</p>
    	<a href="{{ action('PostsController@show', $post->id) }}" class="btn btn-primary">Details</a>
    @endforeach
@stop