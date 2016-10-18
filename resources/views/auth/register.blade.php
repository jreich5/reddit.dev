
@extends('layouts.master')

@section('content')
    <h1>Register</h1>
    <form class="form" method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
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
        <input class="form-control" type="text" name="name" placeholder="Enter name" value ="{{ (old('name') == null) ? null : old('name') }}">
        <br>
        <input class="form-control" name="email" rows="5" cols="40" placeholder="Enter email" value ="{{ (old('email') == null) ? null : old('email') }}">
        <br>
        <input class="form-control" type="password" name="password" placeholder="Enter password">
        <br>
        <input class="form-control" type="password" name="password_confirmation" placeholder="Enter password">
        <br>
        <input class="btn-success btn" type="submit">
    </form>
@stop

