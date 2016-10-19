@extends('layouts.master')

@section('content')
    <div class="welcome">
        <div class="content">
            <h1 class="jumbotron title">A Reddit Clone Using Laravel</h1 class="jumbotron center">
        </div>
        <h1>Most Recent Posts</h1>
        <div class="in-line">{!! $posts->render() !!}</div>
        <div class="row">
            <ol class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item col-md-6">
                        <p class="score pull-right panel">{{ $post->voteScore() }} Votes</p>
                        <h3>{{ $post->title }}</h3> 
                        <p>By {{ $post->user->name }}</p>
                        <p>{{  substr($post->content, 0, 140) . '...' }}</p>
                        <a href="{{ $post->url }}">{{ $post->url }}</a>
                        <p>Posted on {{ $post->created_at->setTimezone('America/Chicago')->diffForHumans() }}</p>
                        <a href="{{ action('PostsController@show', $post->id) }}" class="btn btn-primary">View Post</a>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
@stop