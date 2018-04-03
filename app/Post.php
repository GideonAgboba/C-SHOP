<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'path'
    ];

    public function likes(){
        return $this->hasOne('App\PostLikes');
    }
    public function favs(){
        return $this->hasMany('App\PostFavs');
    }
    public function meets(){
        return $this->hasMany('App\Meet');
    }

}
