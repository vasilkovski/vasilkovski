<?php

namespace App;

use App\User;
use App\Comment;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'description', 'user_id', 'categories_id', 'aproved'];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories(){
        return $this->belongsTo(Category::class, );
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
