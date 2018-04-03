<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $table = 'meets';
    protected $fillable = [
        'user_id',
        'post_id',
        'owner_id',
        'name',
        'email',
        'phone'
    ];

    public function posts(){
        return $this->hasOne('App\Post');
    }
}
