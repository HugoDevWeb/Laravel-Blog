<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['title', 'description', 'image', 'author_id'];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function getComment()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
