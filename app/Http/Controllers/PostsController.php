<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log; // Required for the log class
use App\Models\Post;
use App\Models\Vote;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'showWelcome']]);
    }

    public function showWelcome()
    {
        $data['posts'] = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.welcome')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data['posts'] = Post::search($request->search)->orderBy('created_at', 'asc')->paginate(10);
        } else {
            $data['posts'] = Post::orderBy('created_at', 'asc')->paginate(10);
        }
        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'title' => 'required',
            'url'   => 'required',
            'content' => 'required',
        );


        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved. Please see messages under inputs');
        $this->validate($request, $rules);
        $request->session()->forget('ERROR_MESSAGE');

        $post = new Post();
        $post->created_by = $request->user()->id;
        $post->title = $request->title;
        $post->url= $request->url;
        $post->content = $request->content;
        $post->save();
        // $request->session()->forget('SUCCESS_MESSAGE');
        // $request->session()->put('SUCCESS_MESSAGE', 'Post was saved successfully');

        // The code below... flash() will have a message that exists until one page load

        // Can also flash error
        // Need to have an if statement in the view for both the success and failure message
        // $request->session()->flash('ERROR_MESSAGE', 'Post was not saved.')
        // $this->validate($request, $rules);
        // $request->session()->forget('ERROR_MESSAGE');
        
        Log::info($post);
        $request->session()->flash('SUCCESS_MESSAGE', 'Post was saved successfully');
        return redirect()->action('PostsController@show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // Solution from https://github.com/cameronholland90/reddit.dev/blob/master/app/Http/Controllers/PostsController.php
        $post = Post::with('user')->findOrFail($id);
        if ($request->user()) {
            $user_vote = $post->userVote($request->user());
        } else {
            $user_vote = null;
        }
        $data = compact('post', 'user_vote');
        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('posts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $rules = array(
            'title' => 'required',
            'url'   => 'required',
            'content' => 'required',
        );

        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved. Please see messages under inputs');
        $this->validate($request, $rules);
        $request->session()->forget('ERROR_MESSAGE');

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->url= $request->url;
        $post->content = $request->content;
        $post->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'Post was updated successfully');
        return redirect()->action('PostsController@show', $post->id);
    }

    // Solution from https://github.com/cameronholland90/reddit.dev/blob/master/app/Http/Controllers/PostsController.php
    public function addVote(Request $request)
    {
        $vote = Vote::with('post')->firstOrCreate([
            'post_id' => $request->input('post_id'),
            'user_id' => $request->user()->id
        ]);
        $vote->vote = $request->input('vote');
        $vote->save();
        $post = $vote->post;
        $post->vote_score = $post->voteScore();
        $post->save();
        $data = [
            'vote_score' => $post->vote_score,
            'vote' => $vote->vote
        ];
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->action('PostsController@index');
    }
}
