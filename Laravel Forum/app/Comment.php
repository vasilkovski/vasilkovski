<?php

namespace App;

use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'comment', 'post_id', 'user_id', 'time' ];

    public function posts(){
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
} 
