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

Route::get('/', 'PostsController@showWelcome');


Route::get('/uppercase/{word}', 'HomeController@uppercase');
Route::get('/increment/{number}', 'HomeController@increment');
    

Route::get('/add/{number1}/{number2}', function($number1, $number2) {
    return $number1 + $number2;
});


// How to pass data to the view
// Route::get('/', function() {
//     $name = 'Cameron';
//     $data['name'] = $name;
//     return view('my-first-view')->with($data);
// });


// Dice route
Route::get('/rolldice/{guess}', function($guess) {
    $data['random'] = rand(1,6);
    $data['guess'] = $guess;
    return view('roll-dice')->with($data);
});

// Used to point to resource controller class
Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');

Route::get('orm-test', function ()
{
    echo 'test';
    $post1 = new \App\Models\Post();
    $post1->title = 'Eloquent is awesome!';
    $post1->url='https://laravel.com/docs/5.1/eloquent';
    $post1->content  = 'It is super easy to create a new post.';
    $post1->created_by = 1;
    $post1->save();

    $post2 = new \App\Models\Post();
    $post2->title = 'Eloquent is really easy!';
    $post2->url='https://laravel.com/docs/5.1/eloquent';
    $post2->content = 'It is super easy to create a new post.';
    $post2->created_by = 1;
    $post2->save();'some content stuff';
});

Route::post('/posts/add-vote', 'PostsController@addVote');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// CRUD routes...
Route::post('posts/{id}', function($id) {
    PostsController::destroy($id);
});

Route::get('delete-user/{id}', function ($id) {
    App\User::destroy($id);
    return 'User '.$id.' deleted';
});
