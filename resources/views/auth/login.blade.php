@extends('layouts.master')

@section('content')
    <h1>Login</h1>
    <form class="form" method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
        {!! csrf_field() !!}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input class="form-control" type="text" name="email" placeholder="Enter email">
        <br>
        <input class="form-control" type="password" name="password" placeholder="Enter password">
        <br>
        <input class="btn-success btn" type="submit">
    </form>
@stop

