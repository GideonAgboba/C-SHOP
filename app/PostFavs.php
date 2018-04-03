<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostFavs extends Model
{
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $table = 'post_favs';

    public function posts(){
        return $this->hasOne('App\Post');
    }
}
