<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLikes extends Model
{
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $table = 'post_likes';

    public function posts(){
        return $this->hasOne('App\Post');
    }
}
