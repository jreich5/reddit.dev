@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">A Reddit Clone</div>
        </div>
        <h1>Most Recent Posts</h1>
    </div>
    <ol>
        {!! $posts->render() !!}
        @foreach ($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3> 
                <p>By {{ $post->user->name }}</p>
                <p>{{ $post->content }}</p>
                <a href="{{ $post->url }}">{{ $post->url }}</a>
                <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->diffForHumans() }}</p>
                <a href="{{ action('PostsController@show', $post->id) }}" class="btn btn-primary">View Post</a>
            </li>
        @endforeach
    </ol>
@stop