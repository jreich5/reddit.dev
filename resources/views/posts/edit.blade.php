@extends('layouts.master')

@section('content') 
    <h1>Udpate Form</h1>
    <form class="form" method="POST" action="{{ action('PostsController@update', 1) }}">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        Title: <input class="form-control" type="text" name="title" value="{{ old('title') }}">
        Content: <textarea class="form-control" name="content" rows="5" cols="40" value="{{ old('content') }}"></textarea>
        URL: <input class="form-control" type="text" name="url" value="{{ old('url') }}">
        <input class="btn-success btn" type="submit">
    </form>
@stop