@extends('layouts.master')

@section('content') 
    <h1>Post Update Form</h1>
    <form class="form" method="POST" action="{{ action('PostsController@update', $post->id) }}">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        Title: <input class="form-control" type="text" name="title" value="{{ (old('title') == null) ? $post->title : old('title') }}">
        Content: <textarea class="form-control" name="content" rows="5" cols="40">{{ (old('content') == null) ? $post->content : old('content') }}</textarea>
        URL: <input class="form-control" type="text" name="url" value="{{ (old('url') == null) ? $post->url : old('url') }}">
        <input class="btn-success btn" type="submit">
    </form>
@stop