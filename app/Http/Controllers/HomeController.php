<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return view('welcome');
    }

    public function uppercase($word)
    {
        $data['word'] = $word;
        $data['upperWord'] = strtoupper($word);
        return view('my-first-view')->with($data);
    }

    public function increment($number)
    {
        $data['number'] = $number;
        $data['increment'] = $number + 1;
        return view('my-first-view')->with($data);

    }
}