@extends('layouts.master')

@section('content') 
    <h1>Profile Update Form</h1>
    <form class="form" method="POST" action="{{ action('UsersController@update', $post->id) }}">
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
        Title: <input class="form-control" type="text" name="title" ">
        Content: <textarea class="form-control" name="content" rows="5" cols="40">{{ old('content') }}</textarea>
        URL: <input class="form-control" type="text" name="url" value="{{ old('url') }}">
        <input class="btn-success btn" type="submit">


        <input class="form-control" type="text" name="name" placeholder="Enter name" value="{{ (old('name') == null) ? $user->name : old('name') }}">
        <br>
        <input class="form-control" name="email" rows="5" cols="40" placeholder="Enter email" value=""></input>
        <br>
        <input class="form-control" type="password" name="password" placeholder="Enter password">
        <br>
        <input class="form-control" type="password" name="password_confirmation" placeholder="Enter password">
        <br>
        <input class="btn-success btn" type="submit">
    </form>
@stop