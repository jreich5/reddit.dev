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

// Route::get('/uppercase/{word}', function($word) {
//     $data['word'] = $word;
//     $data['upperWord'] = strtoupper($word);
//     return view('my-first-view')->with($data);
// });

Route::get('/increment/{number}', function($number) {
    $data['number'] = $number;
    $data['increment'] = $number + 1;
    return view('my-first-view')->with($data);
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


// Dice route
Route::get('/rolldice/{guess}', function($guess) {
    $data['random'] = rand(1,6);
    $data['guess'] = $guess;
    return view('roll-dice')->with($data);
});
