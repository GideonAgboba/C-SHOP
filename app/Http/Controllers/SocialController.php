<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class SocialController extends Controller
{
    public function like(Request $request){
        if($request->like_posts){
            $post = $request->like_posts;
            $userid = $request->userid;
            $selectedpost = Post::find($post);
            $selectedpost->likes()->create(['user_id'=>$userid, 'post_id'=>$post, 'owner_id'=>$request->ownerid]);
            // return $request->like_posts ." " .$userid;
            
            return redirect()->back();
        }
    }

    public function meet(Request $request){
        if($request->meet_posts){
            $post = $request->meet_posts;
            $userid = $request->userid;
            $selectedpost = Post::find($post);
            $selectedpost->meets()->create(['user_id'=>$userid, 'post_id'=>$post, 'owner_id'=>$request->ownerid, 'name'=>$request->name, 'email'=>$request->email, 'phone'=>$request->phone]);
            return redirect()->back();
        }
        
    }

    public function fav(Request $request){
        if($request->fav_posts){
            $post = $request->fav_posts;
            $userid = $request->userid;
            $selectedpost = Post::find($post);
            $selectedpost->favs()->create(['user_id'=>$userid, 'post_id'=>$post, 'owner_id'=>$request->ownerid]);
            // return $selectedpost;
            
            return redirect()->back();
        }
    }
}
