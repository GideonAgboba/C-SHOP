<?php
    if(Auth::user()){
        $userlikecount = App\PostLikes::where('owner_id', Auth::user()->id)->count();
    $userfavcount = App\PostFavs::where('owner_id', Auth::user()->id)->count();  
    $userpostcount = App\Post::where('user_id', Auth::user()->id)->count();
    $usermeetscount = App\Meet::where('user_id', Auth::user()->id)->count() * 5;
    $sum = $userfavcount + $userlikecount + $userpostcount + $usermeetscount;
    $total =  $sum / 5;
    }
?>
    <link rel="stylesheet" href="vendor/css/main.css">
@extends('layouts.app')
@section('content')

    <!-- ###################################################################### -->
            <!-- HOME MAIN CONTAINER  start-->
    <!-- ###################################################################### -->
    <div class="container-fluid pt-3">

        <span class="bg-dark hidesidecat p-3 btn text-white text-center" style="cursor:pointer" onclick="openNav()">CATEGORIES <i class="fa fa-bars"></i></span>
        <div class="row mt-5">
            <!-- ###################################################################### -->
                    <!-- HOME SIDE BAR  start-->
            <!-- ###################################################################### -->
            <div class="col-lg-2 card p-0  hidemaincat">
                <span class="bg-dark  p-2 container-fluid text-white text-center">CATEGORIES <i class="fa fa-cog"></i></span>
                <div class="pt-2 container">
                    @if(Auth::user())
                        @if(App\User::where('id', Auth::user()->id)->first()->firstname !== '')
                        <?php $user = App\Post::find(Auth::user()->id)->first(); ?>
                            <button class="bg-dark text-white form-control" role="button" data-toggle="collapse" data-target="#activity-log" ariel-expanded="fale" ariel-controls="activity-log">Activity Log <i class="fa fa-bell"></i></button>
                            <div class="collapse container" id="activity-log">
                                <div class="container">
                                    <a href="{{url('/userstore', $user->id)}}"><img src="uploads/{{ App\User::where('id', Auth::user()->id)->first()->path }}" alt="profile..." width="150px" height="150px" class="rounded-circle mt-1" style="outline: none; position:relative;left:50%;transform: translate(-50%);"></a>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-user-circle"> User</i>
                                            <span >{{Auth::user()->name}}</span>
                                        </li>
                                    </ul>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-envelope"> Posts</i>
                                            <span >{{ App\Post::where('user_id', Auth::user()->id)->count() }}</span>
                                        </li>
                                    </ul>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-heart"> Likes</i>
                                            <span >{{ App\PostLikes::where('owner_id', $user->id)->count() }}</span>
                                        </li>
                                    </ul>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-handshake-o"> Meets</i>
                                            <span >{{ App\Meet::where('owner_id', $user->id)->count() }}</span>
                                        </li>
                                    </ul>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-line-chart"> Stats</i>
                                            <span >{{number_format($total, 1)}}<small><i class="{{ session()->get(Auth::user()->name) }}"></i></small></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="alert alert-success">
                                <p class="text-center">Profile updated <i class="fa fa-check-circle"></i></p>
                                <a class="form-control btn bg-dark text-white" href="{{ route('home.create') }}">CREATE POST</a>
                                <a class="form-control btn bg-dark text-white" href="{{ route('king.show', Auth::user()->id) }}">MODIFY POST</a>
                            </div>
                            <!--  -->
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#top-post" ariel-expanded="fale" ariel-controls="top-post">Top Posts <i class="fa fa-envelope"></i></button>
                                <div class="collapse" id="top-post">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam reiciendis, laboriosam quam suscipit sapiente aut amet vel harum recusandae aperiam magni error qui ratione cupiditate a dolor temporibus libero incidunt.
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#favourites" ariel-expanded="fale" ariel-controls="favourites">Favourites <i class="fa fa-star"></i></button>
                                <div class="collapse" id="favourites">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#most-liked" ariel-expanded="fale" ariel-controls="most-liked">Most Liked <i class="fa fa-heart"></i></button>
                                <div class="collapse" id="most-liked">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#users" ariel-expanded="fale" ariel-controls="users">Profiles <i class="fa fa-user-circle"></i></button>
                                <div class="collapse" id="users">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>
                            @else
                            <?php $user = App\Post::where('user_id', Auth::user()->id)->first(); ?>
                            <button class="bg-dark text-white form-control" role="button" data-toggle="collapse" data-target="#activity-log" ariel-expanded="fale" ariel-controls="activity-log">Activity Log <i class="fa fa-bell"></i></button>
                            <div class="collapse container" id="activity-log">
                                <div class="container">
                                    <a href="{{url('/userstore', Auth::user()->id)}}"><img src="uploads/user.png" alt="profile..." width="150px" height="150px" class="rounded-circle mt-1" style="outline: none; position:relative;left:50%;transform: translate(-50%);"></a>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-user-circle"> User</i>
                                            <span >{{Auth::user()->name}}</span>
                                        </li>
                                    </ul>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-envelope"> Posts</i>
                                            <span >{{ App\Post::where('user_id', Auth::user()->id)->count() }}</span>
                                        </li>
                                    </ul>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-heart"> Likes</i>
                                            <span >{{ App\PostLikes::where('owner_id', Auth::user()->id)->count() }}</span>
                                        </li>
                                    </ul>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-handshake-o"> Meets</i>
                                            <span >{{ App\Meet::where('owner_id', Auth::user()->id)->count() }}</span>
                                        </li>
                                    </ul>
                                    <ul class="list-group" style="width: 100%;">
                                        <li class="p-1 d-flex justify-content-between row align-items-center">
                                            <i class="fa fa-line-chart"> Stats</i>
                                            <span >{{number_format($total, 1)}}<small><i class="{{ session()->get(Auth::user()->name) }}"></i></small></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="alert alert-danger">
                                <p class="text-center">Please update profile to make more than 5 posts</p>
                                @if(App\Post::where('user_id', Auth::user()->id)->count() < 5)
                                    <a class="form-control btn bg-dark text-white" href="{{ route('home.create') }}">CREATE POST</a>
                                    <a class="form-control btn bg-dark text-white" href="{{ route('king.show', Auth::user()->id) }}">MODIFY POST</a>
                                @else
                                    <a class="form-control btn bg-danger text-white" href="{{ url('/users', Auth::user()->id) }}">Update profile</a>
                                @endif
                            </div>

                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#top-post" ariel-expanded="fale" ariel-controls="top-post">Top Posts <i class="fa fa-envelope"></i></button>
                                <div class="collapse" id="top-post">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam reiciendis, laboriosam quam suscipit sapiente aut amet vel harum recusandae aperiam magni error qui ratione cupiditate a dolor temporibus libero incidunt.
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#favourites" ariel-expanded="fale" ariel-controls="favourites">Favourites <i class="fa fa-star"></i></button>
                                <div class="collapse" id="favourites">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#most-liked" ariel-expanded="fale" ariel-controls="most-liked">Most Liked <i class="fa fa-heart"></i></button>
                                <div class="collapse" id="most-liked">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#users" ariel-expanded="fale" ariel-controls="users">Profiles <i class="fa fa-user-circle"></i></button>
                                <div class="collapse" id="users">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>

                        @endif
                    @else
                    


                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#top-post" ariel-expanded="fale" ariel-controls="top-post">Top Posts <i class="fa fa-envelope"></i></button>
                                <div class="collapse" id="top-post">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam reiciendis, laboriosam quam suscipit sapiente aut amet vel harum recusandae aperiam magni error qui ratione cupiditate a dolor temporibus libero incidunt.
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#favourites" ariel-expanded="fale" ariel-controls="favourites">Favourites <i class="fa fa-star"></i></button>
                                <div class="collapse" id="favourites">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#most-liked" ariel-expanded="fale" ariel-controls="most-liked">Most Liked <i class="fa fa-heart"></i></button>
                                <div class="collapse" id="most-liked">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>
                            <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#users" ariel-expanded="fale" ariel-controls="users">Profiles <i class="fa fa-user-circle"></i></button>
                                <div class="collapse" id="users">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
                                </div>









                    @endif
                </div>
            </div>
    <!-- ############################################################### -->
    <!-- HOME MAIN CONTAINER end -->
    <!-- ############################################################### -->


            <!-- ###################################################################### -->
                    <!-- HOME CONTENT CONTAINER  start-->
            <!-- ###################################################################### -->
            <div class="col-lg-10 card ">
                <div class="">
                    <div class="bg-dark text-center container-fluid text-white p-2">CURRENT POSTS <i class="fa fa-send"></i></div>
                    <div class="container">
                    <!-- <div class="row">
                    @if($post->all())
                    @foreach($post as $posts)
                    <?php $user = App\User::where('id', $posts->user_id)->first(); ?>
                        <div class="col-lg-3 p-0 card text-dark mt-2 mb-2" style="width:100%;height100%;border: 1px solid lightgrey; border-radius: 4px;">
                        <img src="uploads/{{ $posts->path }}" alt="posts" class="img-responsive container-f" style="widht:100%;height:200px;border:1px solid grey;">
                        <a href="{{ url('/userstore', $user->id) }}" class="text-center text-dark">{{ $user->name }}<i class="fa fa-user"></i></a>
                        <small class="text-center">"{{ $posts->created_at->diffForHumans() }}"</small>
                            <div class="container text-center" style="height: 15vh;">
                            <strong class="text-center">{{ $posts->title }}</strong>
                            <hr width="100" class="mt-0 mb-0">
                            <div class="text-center mt-0 mb-2"><small>{{ $posts->body }}</small></div>
                            </div>
                            <div class="row justify-content-center my-auto d-flex">
                                <h2 class="text-center m-2">{{ $count = App\PostLikes::where('post_id', $posts->id)->count() }}<i style="font-size: 14px !important;" class="fa text-danger  fa-heart"></i></h2>
                                <h2 class="text-center m-2 ">{{ $count = App\Meet::where('post_id', $posts->id)->count() }}<i style="font-size: 14px !important;" class="fa text-success fa-handshake-o"></i></h2>
                                <h2 class="text-center m-2">{{ $count = App\PostFavs::where('post_id', $posts->id)->count() }}<i style="font-size: 14px !important;" class="fa text-warning fa-star"></i></h2>
                            </div>
                            <div class="row justify-content-center my-auto d-flex">
                            @if(Auth::user())

                                @if(App\PostLikes::where(['post_id'=>$posts->id, 'user_id'=>Auth::user()->id])->first())
                                <form method="POST" class="clearfix form-group" action="/like">
                                        <button type="submit" disabled class="text-white btn bg-dark m-1 like-btn"><i class="fa fa-heart"></i></button>
                                </form>
                                @else
                                    <form method="POST" class="clearfix form-group" action="/like">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="ownerid" value="{{ $user->id }}">
                                        <input type="hidden" name="like_posts" value="{{ $posts->id }}">
                                        <button type="submit" class="text-white btn bg-dark m-1 like-btn"><i class="fa fa-heart"></i></button>
                                    </form>
                                @endif
                                @if(App\Meet::where(['post_id'=>$posts->id, 'user_id'=>Auth::user()->id])->first())
                                    <form method="POST" class="clearfix form-group" action="">
                                        <button type="submit" disabled class="text-white btn bg-dark m-1 meet-btn"><i class="fa fa-handshake-o"></i></button>
                                    </form>
                                @else
                                <form method="POST" class="clearfix form-group" action="/meet">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="ownerid" value="{{ $user->id }}">
                                    <input type="hidden" name="meet_posts" value="{{ $posts->id }}">
                                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                                    <button type="submit" class="text-white btn bg-dark m-1 meet-btn"><i class="fa fa-handshake-o"></i></button>
                                </form>
                                @endif
                                @if(App\PostFavs::where(['post_id'=>$posts->id, 'user_id'=>Auth::user()->id])->first())
                                    <form method="POST" class="clearfix form-group" action="/fav">
                                        <button type="submit" disabled class="text-white btn bg-dark m-1 fav-btn"><i class="fa fa-star"></i></button>
                                    </form>
                                @else
                                    <form method="POST" class="clearfix form-group" action="/fav">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="ownerid" value="{{ $user->id }}">
                                        <input type="hidden" name="fav_posts" value="{{ $posts->id }}">
                                        <button type="submit" class="text-white btn bg-dark m-1 fav-btn"><i class="fa fa-star"></i></button>
                                    </form>
                                @endif
                            @else
                                <section class="clearfix form-group">
                                    <button class="text-white btn bg-dark m-1 like-btn" data-toggle="modal" data-target="#details-1"><i class="fa fa-heart"></i></button>
                                </section>
                                <section class="clearfix form-group">
                                    <button class="text-white btn bg-dark m-1 meet-btn" data-toggle="modal" data-target="#details-2"><i class="fa fa-handshake-o"></i></button>
                                </section>
                                <section class="clearfix form-group">
                                    <button class="text-white btn bg-dark m-1 fav-btn" data-toggle="modal" data-target="#details-3"><i class="fa fa-star"></i></button>
                                </section>
                            @endif
                            </div>
                        </div> 
                    @endforeach
                    @else
                    <p class="text-muted text-center mt-2">No active post</p>
                    @endif
                    </div> -->
                    <div class="row">
                    @if($post->all())
                    @foreach($post as $posts)
                    <?php $user = App\User::where('id', $posts->user_id)->first(); ?>
                        <div class="col-lg-3 p-0 card text-dark mt-2 mb-2" style="width:100%;height100%;border: 1px solid lightgrey; border-radius: 4px;">
                        <img src="../uploads/{{ $posts->path }}" alt="posts" class="img-responsive container-f" style="widht:100%;height:200px;border:1px solid grey;">
                        <a href="{{ url('/userstore', $user->id) }}" class="text-center text-dark">{{ $user->name }}<i class="fa fa-user"></i></a>
                        @if(App\User::where('id', $user->id)->first()->firstname == '')
                            <small class="text-center ml-5 mr-5 alert-danger" style="border-radius: 5px">Unverified <i class="fa fa-times-circle"></i></small>
                        @else
                            <small class="text-center ml-5 mr-5 alert-success" style="border-radius: 5px">Verified <i class="fa fa-check-circle"></i></small>
                        @endif
                        <small class="text-center">"{{ $posts->created_at->diffForHumans() }}"</small>
                            <div class="container text-center" style="height: 15vh;">
                            <strong class="text-center">{{ $posts->title }}</strong>
                            <hr width="100" class="mt-0 mb-0">
                            <div class="text-center mt-0 mb-2"><small>{{ $posts->body }}</small></div>
                            </div>
                            <div class="row justify-content-center my-auto d-flex">
                                <h2 class="text-center m-2">{{ $count = App\PostLikes::where('post_id', $posts->id)->count() }}<i style="font-size: 14px !important;" class="fa text-danger  fa-heart"></i></h2>
                                <h2 class="text-center m-2 ">{{ $count = App\Meet::where('post_id', $posts->id)->count() }}<i style="font-size: 14px !important;" class="fa text-success fa-handshake-o"></i></h2>
                                <h2 class="text-center m-2">{{ $count = App\PostFavs::where('post_id', $posts->id)->count() }}<i style="font-size: 14px !important;" class="fa text-warning fa-star"></i></h2>
                            </div>
                            <div class="row justify-content-center my-auto d-flex">
                            @if(Auth::user())

                                @if(App\PostLikes::where(['post_id'=>$posts->id, 'user_id'=>Auth::user()->id])->first())
                                <form method="POST" class="clearfix form-group" action="/like">
                                        <button type="submit" disabled class="text-white btn bg-dark m-1 like-btn"><i class="fa fa-heart"></i></button>
                                </form>
                                @else
                                    <form method="POST" class="clearfix form-group" action="/like">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="ownerid" value="{{ $user->id }}">
                                        <input type="hidden" name="like_posts" value="{{ $posts->id }}">
                                        <button type="submit" class="text-white btn bg-dark m-1 like-btn"><i class="fa fa-heart"></i></button>
                                    </form>
                                @endif
                                @if(Auth::user()->id == $user->id)
                                    <form method="POST" class="clearfix form-group" action="">
                                        <button type="submit" disabled class="text-white btn bg-dark m-1 meet-btn"><i class="fa fa-handshake-o"></i></button>
                                    </form>
                                @elseif(App\Meet::where(['post_id'=>$posts->id, 'user_id'=>Auth::user()->id])->first())
                                    <form method="POST" class="clearfix form-group" action="">
                                        <button type="submit" disabled class="text-white btn bg-dark m-1 meet-btn"><i class="fa fa-handshake-o"></i></button>
                                    </form>
                                @else
                                <form method="POST" class="clearfix form-group" action="/meet">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="ownerid" value="{{ $user->id }}">
                                    <input type="hidden" name="meet_posts" value="{{ $posts->id }}">
                                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <input type="hidden" name="phone" value="<?php 
                                        if(App\User::where('id', Auth::user()->id)->first()->firstname !== ''){
                                            $user = App\User::where('id', Auth::user()->id)->first(); echo $user->phone;
                                        }else{
                                            echo "NULL";
                                        }
                                    ?>">
                                    <button type="submit" class="text-white btn bg-dark m-1 meet-btn"><i class="fa fa-handshake-o"></i></button>
                                </form>
                                @endif
                                @if(App\PostFavs::where(['post_id'=>$posts->id, 'user_id'=>Auth::user()->id])->first())
                                    <form method="POST" class="clearfix form-group" action="/fav">
                                        <button type="submit" disabled class="text-white btn bg-dark m-1 fav-btn"><i class="fa fa-star"></i></button>
                                    </form>
                                @else
                                    <form method="POST" class="clearfix form-group" action="/fav">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="ownerid" value="{{ $user->id }}">
                                        <input type="hidden" name="fav_posts" value="{{ $posts->id }}">
                                        <button type="submit" class="text-white btn bg-dark m-1 fav-btn"><i class="fa fa-star"></i></button>
                                    </form>
                                @endif
                            @else
                            
                                <section class="clearfix form-group">
                                    <button class="text-white btn bg-dark m-1 like-btn" data-toggle="modal" data-target="#details-1"><i class="fa fa-heart"></i></button>
                                </section>
                                <section class="clearfix form-group">
                                    <button class="text-white btn bg-dark m-1 meet-btn" data-toggle="modal" data-target="#details-2"><i class="fa fa-handshake-o"></i></button>
                                </section>
                                <section class="clearfix form-group">
                                    <button class="text-white btn bg-dark m-1 fav-btn" data-toggle="modal" data-target="#details-3"><i class="fa fa-star"></i></button>
                                </section>
                            @endif
                            </div>
                        </div> 
                    @endforeach
                @else
                    <div class="alert alert-danger justify-content-center mt-2 container-fluid">
                        <p class="text-center mt-2">No active post</p>
                    </div>
                @endif
                    </div>
                    </div> 
                </div>
            </div>
            <!-- ###################################################################### -->
                    <!-- HOME CONTENT CONTAINER  end-->
            <!-- ###################################################################### -->



















    
    <!-- ###################################################################### -->
            <!-- HOME MODALS  start-->
    <!-- ###################################################################### -->
    <div class="modal fade details-1" id="details-1" tabindex="-1" role="dialog" aria-labelledby="details-1">
        <div class="modal-content like-modal">
            <div class="modal-header">
                <button class="btn-null rounded-circle rounded-circle" type="" data-dismiss="modal" aria-label="close">
                    <span>
                        <i class="btn-close fa fa-close"></i>
                        <input type="hidden" class="modal-dialog">
                    </span>
                </button>
                <h5>Like item <i class="fa fa-heart"></i></h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <p class="text-center">Please login to like items <i class="fa fa-times-circle"></i><br>Or register if you dont have an account <br>
                        <a href="{{ url('/register') }}">Click here to register</a><br>
                        <a href="{{ url('/login') }}">Click here to login</a>

                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade details-2" id="details-2" tabindex="-1" role="dialog" aria-labelledby="details-1">
        <div class="modal-content meet-modal">
            <div class="modal-header">
                <button class="btn-null rounded-circle" type="" data-dismiss="modal" aria-label="close">
                    <span>
                        <i class="btn-close fa fa-close"></i>
                        <input type="hidden" class="modal-dialog">
                    </span>
                </button>
                <h5>Meet Owner <i class="fa fa-handshake-o"></i></h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <p class="text-center">Please login to meet item owner <i class="fa fa-times-circle"></i><br>Or register if you dont have an account <br>
                        <a href="{{ url('/register') }}">Click here to register</a><br>
                        <a href="{{ url('/login') }}">Click here to login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade details-3" id="details-3" tabindex="-1" role="dialog" aria-labelledby="details-1">
        <div class="modal-content comment-modal">
            <div class="modal-header">
                <h5>Favourite item <i class="fa fa-star"></i></h5>
                <button class="btn-null rounded-circle" type="" data-dismiss="modal" aria-label="close">
                    <span>
                        <i class="btn-close fa fa-close"></i>
                        <input type="hidden" class="modal-dialog">
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <p class="text-center">Please login to mark favourite item <i class="fa fa-times-circle"></i><br>Or register if you dont have an account <br>
                        <a href="{{ url('/register') }}">Click here to register</a><br>
                        <a href="{{ url('/login') }}">Click here to login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ###################################################################### -->
            <!-- HOME SIDE BAR  end-->
    <!-- ###################################################################### -->


@endsection
</body>
</html>