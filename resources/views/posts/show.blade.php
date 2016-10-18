@extends('layouts.master')

@section('content') 
    <h1>Post Info</h1>
    <h3>{{ $post->title }}</h3>
    <p>By <a href="{{ action('UsersController@show', $post->created_by) }}">{{ $post->user->name }}</a></p>
    
    <p>{{ $post->content }}</p>
    <a href="{{ $post->url }}">{{ $post->url }}</a>
    <p>Posted <em>{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ g:i A') }}</em></p>
    <br>
    @if(Auth::id() == $post->created_by)
        <form id="delete" method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
    @endif
@stop

@section('bottom-script')
    <script>
        $("document").ready(function() {
            $("#delete").on("submit", function(){
                return confirm("Do you want to delete this item?");
            });
        });
    </script>
@stop
