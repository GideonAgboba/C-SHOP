<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class UserStore extends Controller
{
    public function index($id){
        $user = User::where('id', $id)->first();
        return view('posts.userstore', compact('id', 'user'));
    }
}
