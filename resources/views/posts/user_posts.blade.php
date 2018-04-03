<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Create</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.reboot.min.css">
    <link rel="stylesheet" href="../vendor/css/main.css">
    <link rel="stylesheet" href="../vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/parallax/jarallax.min.js"></script>
</head>
<body class="bg-light pt-5">
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
                        @if(App\User::where('id', Auth::user()->id)->first()->firstname !== '')

                            <li>
                            <a class="nav-link text-white" href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>Logout</a></li>
                            </li>
                        @else

                            <li>
                            <a class="nav-link text-white" href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>Logout</a></li>
                            </li>

                        @endif
                        
                    @endif
                </ul>
                
            </div>
            
        </div>
        
    </nav>
    @if(Auth::guest())

        <div class="mt-1 alert alert-danger">
            <p class="text-center pt-4">Please login to view your posts</p>
        </div>

    @else
        @if(App\Post::where('user_id', Auth::user()->id)->first() !== NULL)
            <div class="container card mt-5 ">
                <div class="header pt-2">
                    <h4 class="title">Edit Store <i class="fa fa-shopping-cart"></i></h4>
                </div>
                <div class="row p-3">
                @foreach($users_posts as $post)
                    <div class="col-lg-3 p-0 card text-center text-dark mt-2 mb-2" style="width:100%;height100%;border: 1px solid lightgrey; border-radius: 4px;">
                    <img src="../uploads/{{ $post->path }}" alt="posts" class="img-responsive container-f" style="widht:100%;height:200px;border:1px solid grey;">
                    
                        <strong class="text-center">{{ strtoupper($post->title) }} <br></strong><small>{{ $post->body }}</small>
                            <form class="justify-content-center my-auto d-flex" action="/home/{{$post->id}}" method="post">
                                <input type="hidden" name="_method" value="DELETE" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- <input type="submit" class="btn btn-danger form-control" value="DELETE" > -->
                            <a class="text-white m-2 btn bg-dark" href="{{ route('home.update', $post->id) }}">EDIT <i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn m-2 btn-danger">DELETE <i class="fa fa-trash"></i></button>
                            </form>
                    </div> 
                @endforeach
                </div> 
            </div>
        @else
            <div class="mt-1 alert alert-danger">
                <p class="text-center pt-4">No posts made</p>
            </div>
        @endif
    @endif
  

</body>
</html>