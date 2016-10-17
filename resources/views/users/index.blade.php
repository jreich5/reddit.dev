@extends('layouts.master')

@section('content')
    <h1>List of Users</h1>
    <form method="GET" action="{{ action('UsersController@index') }}">
        <input type="text" placeholder="Search by name" name="search">    
        <button  type="submit">Go!</button>
    </form>
    {!! $users->render() !!}
    <br>
    @foreach ($users as $user)
        <a href="{{ action('UsersController@show', $user->id) }}">{{ $user->name }}</a>
        <p>{{ $user->email }}</p>
        <p>Member since {{ $user->created_at}}</p>
        <hr>
    @endforeach
@stop