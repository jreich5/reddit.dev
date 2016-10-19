<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

// Vote logic from https://github.com/cameronholland90/reddit.dev
class Post extends BaseModel
{
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public static function search($term)
    {
        return self::where('title', 'LIKE', '%' . $term .'%');
    }

    public static function renderBody() 
    {

    }

    public static function calculateVoteScore()
    {
        $posts = self::all();
        foreach ($posts as $post) {
            $post->vote_score = $post->voteScore();
            $post->save();
        }
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    public function upvotes()
    {
        return $this->votes()->where('vote', '=', 1);
    }
    public function downvotes()
    {
        return $this->votes()->where('vote', '=', 0);
    }
    public function voteScore()
    {
        // find total upvotes
        $upvotes = $this->upvotes()->count();
        // find total downvotes
        $downvotes = $this->downvotes()->count();
        // return upvotes - downvotes
        return $upvotes - $downvotes;
    }
    public function userVote(User $user)
    {
        return $this->votes()->where('user_id', '=', $user->id)->first();
    }
}
