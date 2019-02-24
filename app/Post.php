<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['title', 'description', 'image', 'author_id'];

    protected $appends = ['validated_com', 'validate_com'];


    public function getValidatedComAttribute()
    {
        $this->load('getComments');
        $col = collect();
        foreach ($this->getComments as $getComment){
            if ($getComment->validated === 1)
                $col->push($getComment);
        }
        return $col;
    }

    public function getValidateComAttribute()
    {
        $this->load('getComments');
        $col = collect();
        foreach ($this->getComments as $getComment){
            if ($getComment->validated === 0)
                $col->push($getComment);
        }
        return $col;
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function getComments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
