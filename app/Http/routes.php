<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/uppercase/{word}', function($word) {
    return strtoupper($word);
});

Route::get('/increment/{number}', function($number) {
    return $number + 1;
});

Route::get('/add/{number1}/{number2}', function($number1, $number2) {
    return $number1 + $number2;
});


// How to pass data to the view
Route::get('/', function() {
    $name = 'Cameron';
    $data['name'] = $name;
    return view('my-first-view')->with($data);
});