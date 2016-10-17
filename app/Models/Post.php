<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 


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
}
