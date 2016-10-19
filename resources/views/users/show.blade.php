@extends('layouts.master')

@section('content') 
    <div class="row jumbotron">
        <div class="col-md-4 col-md-offset-4 text-center">
            <h1>{{ $user->name }}</h1> 
            <p>Member since {{ $user->created_at->setTimezone('America/Chicago')->format('l, F jS Y') }}</p>
            <p>{{ $user->email }}</p>

            @if(Auth::id() == $user->id)
                <a href="{{ $user->id }}/edit" class="btn btn-primary  pull-left">Edit Profile</a>
                <form id="delete" method="POST" action="{{ action('UsersController@destroy', $user->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" name="delete" class="btn btn-danger pull-right">Delete Profile</button>
                </form>
            @endif
        </div>
    </div>
    
    <div class="row">
        @if (isset($posts[0]))
            <h2>Previous Posts</h2>
            @foreach ($posts as $post)
                <h3>{{ $post->title }}</h3>
                <a href="{{ $post->url }}">{{ $post->url }}</a>
                <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ g:i A') }}</p>
                <br>
                <a href="{{ action('PostsController@show', $post->id) }}" class="btn btn-primary">Details</a>
                <hr>
            @endforeach
        @endif
    </div>
    

@stop
