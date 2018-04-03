<?php
    $userlikecount = App\PostLikes::where('owner_id', $user->id)->count();
    $userfavcount = App\PostFavs::where('owner_id', $user->id)->count();  
    $userpostcount = App\Post::where('user_id', $user->id)->count();
    $usermeetscount = App\Meet::where('user_id', $user->id)->count() * 5;
    $sum = $userfavcount + $userlikecount + $userpostcount + $usermeetscount;
    $total =  $sum / 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.reboot.min.css">
    <link rel="stylesheet" href="../vendor/css/main.css">
    <link rel="stylesheet" href="../vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../vendor/jquery/jquery.min.js"></script> 
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/parallax/jarallax.min.js"></script>

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout" class="">
<nav class="navbar navbar-expand-md bg-dark navbar-static-top fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggler bg-white text-dark collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="navbar-toggler fa fa-bars"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand text-white" href="{{ route('home.index') }}">C-SHOP <i class="fa fa-shopping-cart"></i></a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav nav-item">
                    <li><a class="nav-link text-white" href="{{ url('/home') }}">Home</a></li>
                </ul>
    
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav nav-item navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a class="nav-link text-white" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="nav-link text-white" href="{{ url('/register') }}">Register</a></li>
                    @else

                          <li class="dropdown nav-link text-white">
                              <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-expanded="false">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                  <li><a class="text-dark btn form-control nav-link-btn" href="{{ url('/users', Auth::user()->id) }}"><i class="fa fa-btn text-dark p-2 fa-user"></i>Profile</a></li>
                                  <li><a class="text-dark btn form-control nav-link-btn" href="{{ url('/logout') }}"><i class="fa fa-btn text-dark p-2 fa-sign-out"></i>Logout</a></li>
                              </ul>
                          </li>
                            <li>
                            <a class="nav-link text-white" href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>Logout</a></li>
                            </li>
                        
                    @endif
                </ul>
                
            </div>
            
        </div>
        
    </nav>
    <div class="container-fluid mt-5">
        <div class="row pt-3">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="rounded-circle">
                                <div class="row p-3 text-center">
                                    @if(Auth::user())
                                        @if($user->path !== '')
                                        <img class="col-lg-4 rounded-circle" src="../uploads/{{ $user->path }}" alt="user-image.." width="200px" height="180px">
                                        @else
                                        <img class="col-lg-4 rounded-circle" src="../uploads/user.png" alt="user-image.." width="250px" height="250px">
                                        @endif
                                        <div class="col-lg-8">
                                        <h3>{{strtoupper($user->firstname)}} {{strtoupper($user->lastname)}}</h3>
                                        @if(App\User::where('id', $user->id)->first()->firstname !== '')
                                          <p><small>{{$user->phone}}</small>
                                          <br><small>{{ $user->email }}</small>
                                          <br><small><i class="fa fa-map-marker"></i> {{$user->address}}</small>
                                          <br><small>{{$user->city}}, {{ucfirst($user->country)}}</small>
                                          <br><i class="fa fa-quote-left fa-1x"></i>
                                          <br><small>{{ $user->bio }}..</small></p>
                                        @else
                                          <h3>{{strtoupper($user->name)}}</h3>
                                        @endif
                                        
                                        
                                        @if(App\User::where('id', $user->id)->first()->firstname !== '')
                                        <div class="alert alert-success">
                                            <small>Verified account <i class="fa fa-check-circle"></i></small>
                                        </div>
                                        @else
                                        <div class="alert alert-danger">
                                            <small>User Unverified <i class="fa fa-times-circle"></i></small>
                                        </div>
                                        @endif
                                        </div>
                                      @else
                                        @if($user->path !== '')
                                        <img class="col-lg-4 rounded-circle" src="../uploads/{{ $user->path }}" alt="user-image.." width="200px" height="180px">
                                        @else
                                        <img class="col-lg-4 rounded-circle" src="../uploads/user.png" alt="user-image.." width="250px" height="250px">
                                        @endif
                                        <div class="col-lg-8">
                                        <h3>{{strtoupper($user->firstname)}} {{strtoupper($user->lastname)}}</h3>
                                        @if(App\User::where('id', $user->id)->first()->firstname !== '')
                                          <p><small>{{$user->phone}}</small>
                                          <br><small>{{ $user->email }}</small>
                                          <br><small><i class="fa fa-map-marker"></i> {{$user->address}}</small>
                                          <br><small>{{$user->city}}, {{ucfirst($user->country)}}</small>
                                          <br><i class="fa fa-quote-left fa-1x"></i>
                                          <br><small>{{ $user->bio }}..</small></p>
                                        @else
                                          <h3>{{strtoupper($user->name)}}</h3>
                                        @endif
                                        
                                        
                                        @if(App\User::where('id', $user->id)->first()->firstname !== '')
                                        <div class="alert alert-success">
                                            <small>Verified account <i class="fa fa-check-circle"></i></small>
                                        </div>
                                        @else
                                        <div class="alert alert-danger">
                                            <small>User Unverified <i class="fa fa-times-circle"></i></small>
                                        </div>
                                        @endif
                                        </div>
                                    @endif
                                </div>
                                <div class="row justify-content-center my-auto text-center p-3 d-flex">
                                        <div class="p-4" style="border-right: 1px solid lightgrey">
                                            <h6>Posts <i class="fa fa-envelope"></i></h6>
                                            <h1>{{ $post = App\Post::where('user_id', $user->id)->count() }}</h1>
                                        </div>
                                        <div class="p-4" style="border-right: 1px solid lightgrey">
                                            <h6>Likes <i class="fa fa-heart"></i></h6>
                                            <!-- <h1>{{ App\PostLikes::where('user_id', 6)->count() }}</h1> -->
                                            <h1>{{ App\PostLikes::where('owner_id', $user->id)->count() }}</h1>
                                        </div>
                                        <div class="p-4" style="border-right: 1px solid lightgrey">
                                            <h6>Meets <i class="fa fa-handshake-o"></i></h6>
                                            <h1>{{ App\Meet::where('owner_id', $user->id)->count() }}</h1>
                                        </div>
                                        <div class="p-4" style="border-right: 1px solid lightgrey">
                                            <h6>Favourites <i class="fa fa-star"></i></h6>
                                            <h1>{{ App\PostFavs::where('owner_id', $user->id)->count() }}</h1>
                                        </div>
                                        <div class="p-4">
                                            <h6>Stats <i class="fa fa-line-chart"></i></h6>
                                            <h1>{{number_format($total, 1)}}</h1>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 text-center justify-content-center my-auto d-flex">
                        
                        <div class="card p-0 justify-content-center my-auto d-flex clearfix text-center">
                            <div class="p-0 m-0 mb-3 bg-dark text-white">
                                <p class="mt-3">PROFILE STATISTICS</p>
                            </div>
                           @if(Auth::user())
                                @if($total < 10)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-magic fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                            @if(Auth::user()->id == $id)
                                                <div class="alert m-3 p-0 alert-success">
                                                    <p class="mt-3">Congrates you have recieved a<br>Bronze <i class="fa fa-magic"></i></p>
                                                        {{ session()->put([Auth::user()->name=>'fa fa-magic']) }}
                                                </div>
                                            @endif
                                    @elseif($total < 30)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-star fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                            @if(Auth::user()->id == $id)
                                                <div class="alert m-3 p-0 alert-success">
                                                    <p class="mt-3">Congrates you have recieved a<br>Star <i class="fa fa-star"></i></p>
                                                </div>
                                                {{ session()->put([Auth::user()->name=>'fa fa-star']) }}
                                            @endif
                                    @elseif($total < 60)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-star fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                            @if(Auth::user()->id == $id)
                                                <div class="alert m-3 p-0 alert-success">
                                                    <p class="mt-3">Congrates you have recieved three<br>Stars <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                                </div>
                                                {{ session()->put([Auth::user()->name=>'fa fa-star']) }}
                                            @endif
                                    @elseif($total < 100)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-cubes fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                            @if(Auth::user()->id == $id)
                                                <div class="alert m-3 p-0 alert-success">
                                                    <p class="mt-3">Congrates you have recieved <br>Golds <i class="fa fa-cubes"></i></p>
                                                </div>
                                                {{ session()->put([Auth::user()->name=>'fa fa-cubes']) }}
                                            @endif
                                    @elseif($total = 100)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-diamond fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                            @if(Auth::user()->id == $id)
                                                <div class="alert m-3 p-0 alert-success">
                                                    <p class="mt-3">Congrates you have recieved a<br>DiAMOND <i class="fa fa-diamond"></i></p>
                                                </div>
                                                {{ session()->put([Auth::user()->name=>'fa fa-diamond']) }}
                                            @endif
                                    @endif
                           @else
                                    @if($total < 10)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-magic fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    @elseif($total < 30)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-star fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    @elseif($total < 60)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-star fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    @elseif($total < 100)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-cubes fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    @elseif($total = 100)
                                        <div class="c100 text-center <?php echo "p" .number_format($total, 0); ?> wrap big orange bg-white">
                                            <span><i class="fa fa-diamond fa-lg fa-2x" aria-hidden="true"></i></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    @endif

                            @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-2 p-2">
                <div class="header pt-2">
                    <h4 class="title">{{ ucfirst($user->name) }}'s Store <i class="fa fa-shopping-cart"></i></h4>
                </div>
                <div class="container">
                    <div class="row">
                    @if($post = App\Post::where('user_id', $id)->get())
                    @foreach($post as $posts)
                    <?php $user = App\User::where('id', $posts->user_id)->first(); ?>
                        <div class="col-lg-3 p-0 card text-dark mt-2 mb-2" style="width:100%;height100%;border: 1px solid lightgrey; border-radius: 4px;">
                        <img src="../uploads/{{ $posts->path }}" alt="posts" class="img-responsive container-f" style="widht:100%;height:200px;border:1px solid grey;">
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
                                @if(Auth::user()->id == $id)
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
                    <p class="text-muted text-center mt-2">No active post</p>
                @endif
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-2 card">
            @if(Auth::user())
                @if(Auth::user()->id == $id)
                    <span class="bg-dark text-center mb-2 form-control text-white p-2">MEETS <i class="fa fa-handshake-o"></i> </span>
                    <div class="">
                        <?php $meets = App\Meet::where('owner_id', $id)->get() ?>
                        @if($meets->first())
                            @foreach($meets as $meet)
                                <?php $post = App\Post::where('id', $meet->post_id)->first(); ?>
                                <button class="bg-dark mt-2 text-white form-control" role="button" data-toggle="collapse" data-target="#{{ $meet->name }}{{$meet->id}}" ariel-expanded="fale" ariel-controls="{{ $meet->name }}{{$meet->id}}">{{ $meet->name}} <i class="fa fa-user-circle"></i></button>
                                <div class="collapse" id="{{ $meet->name }}{{$meet->id}}">
                                    <div class="col-lg-12 p-0 card text-dark mt-2 mb-2" style="width:100%;height100%;border: 1px solid lightgrey; border-radius: 4px;">
                                        <img src="../uploads/{{ $post->path }}" alt="posts" class="img-responsive container-f" height="150px" style="border:1px solid grey;">
                                        <small class="text-center">"{{ $meet->created_at->diffForHumans() }}"</small>
                                        <strong class="text-center">{{ $post->title }}</strong>
                                        <hr width="100" class="mt-0 mb-0">
                                        <div class="text-center mt-0 mb-2"><small>{{ $post->body }}</small></div>
                                        <div class="row text-center justify-content-center my-auto d-flexs">
                                            <form action="/usermeets">
                                            <button style="font-size: 12px !important;" class="btn m-2 alert-success">Reply <i class="fa fa-comment"></i></button>
                                            </form>
                                            <form method="post" action="/usermeets/{{ $meet->id }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button style="font-size: 12px !important;" class="btn m-2 alert-danger">Delete <i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">
                                <p class="text-center">No meets available</p>
                            </div>
                        @endif
                @else
                        <span class="bg-dark text-center form-control text-white p-2 mb-2">MESSAGE ME </span>
                            
                            <form action="">
                                <input type="text" class="form-control" placeholder="Full name...">
                                <textarea name="body" type="text" class="form-control" placeholder="Write message here..." cols="31" rows="10"></textarea>
                                <button type="submit" class="form-control bg-dark text-white">SEND MESSAGE</button>
                            </form>
                    </div>
                @endif
            @else
                <span class="bg-dark text-center form-control text-white p-2 mb-2">MESSAGE ME </span>                            
                    <form action="">
                        <input type="text" class="form-control" placeholder="Full name...">
                        <textarea name="body" type="text" class="form-control" placeholder="Write message here..." cols="31" rows="10"></textarea>
                        <button type="submit" class="form-control bg-dark text-white">SEND MESSAGE</button>
                    </form>
            @endif
            </div>
        </div>
    </div>

    <style>
      .profile-rating{
        position: absolute;
        top: -50px;
      }
    </style>