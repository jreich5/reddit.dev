@extends('layouts.master')

@section('content') 
    <h1>{{ $user->name }}</h1> 
    <p>Joined {{ $user->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</p>
    <p>Email: {{ $user->email }}</p>

    @if(Auth::id() == $user->id)
        <a href="{{ $user->id }}/edit" class="btn btn-primary">Edit Profile</a>
    @endif
    
    
    @if (isset($posts[0]))
        <h3>Previous Posts</h3>
        @foreach ($posts as $post)
            <h3>{{ $post->title }}</h3>
            <a href="{{ $post->url }}">{{ $post->url }}</a>
            <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</p>
            <br>
            <a href="{{ action('PostsController@show', $post->id) }}" class="btn btn-primary">Details</a>
        @endforeach
    @endif
    

@stop
