@extends('layouts.master')

@section('content') 
    <h1>Post Info</h1>
    <div class="row">
        {{-- Voting view solution based on https://github.com/cameronholland90/reddit.dev --}}
        <div class="col-xs-1 scoreArrow">
            <img src="/img/arrowUp.png" data-vote="1" data-post-id="{{ $post->id }}" class="vote img-responsive center-block {{ (!is_null($user_vote) && $user_vote->vote) ? 'active' : '' }}">
            <p class="vote-score text-center" id="vote-score">{{ $post->voteScore() }}</p>
            <img src="/img/arrowDown.png" data-vote="0" data-post-id="{{ $post->id }}" class="vote img-responsive center-block {{ (!is_null($user_vote) && !$user_vote->vote) ? 'active' : '' }}">
        </div>
        <div class="col-xs-6">
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
                    <button type="submit" name="delete" class="btn btn-danger pull-right">Delete</button>
                </form>
                <a href="{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
            @endif
            <input type="hidden" id="is-logged-in" value="{{ Auth::check() }}">
            <input type="hidden" id="csrf-token" value="{{ Session::token() }}">
            <input type="hidden" id="vote-url" value="{{ action('PostsController@addVote') }}">
        </div>
    </div>
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
