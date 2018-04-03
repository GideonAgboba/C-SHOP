<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Index</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.reboot.min.css">
    <link rel="stylesheet" href="vendor/css/main.css">
    <link rel="stylesheet" href="vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/parallax/jarallax.min.js"></script>
</head>

<body class="bg-light pt-5"> -->
@extends('layouts.app')
@section('content')

    <div class="container-fluid mt-5 pt-3">
        <div class="row container-fluid">
            <div class="col-lg-9 card ">
                <span class="bg-dark p-1 container-fluid text-white text-center">ACTIVE POSTS <i class="fa fa-book"></i></span>

                      <div class="container">
                        <div class="row">
                @if($post->all())
                      @foreach($post as $posts)
                          <div class="col-lg-4 p-0 card text-dark mt-2 mb-2" style="width:100%;height100%;border: 1px solid lightgrey; border-radius: 4px;">
                            <img src="uploads/{{ $posts->path }}" alt="posts" class="img-responsive container-f" style="widht:100%;height:200px;border:1px solid grey;">
                            
                              <strong class="text-center">{{ $posts->title }}<hr width="100"></strong>
                              <small class="text-center mt-0 mb-2">{{ $posts->body }}</small>
                          </div> 
                      @endforeach
                  @else
                      <p class="text-muted text-center mt-2">No active post</p>
                  @endif
                        </div>
                      </div> 
            </div>
            @if(Auth::guest())
            <div class="col-lg-3 card">
                <span class="bg-dark p-1 container-fluid text-white text-center">LATEST POSTS <i class="fa fa-edit"></i></span>
                @if($post->all())
                <div class="p-0 card" style="width:100%;height100%;border: 1px solid lightgrey; border-radius: 4px;">
                            <img src="uploads/{{ $posts->path }}" alt="posts" class="img-responsive container-f" style="widht:100%;height:200px;border:1px solid grey;">
                            
                              <strong class="text-center">{{ $posts->title }}<hr width="100"></strong>
                              <small class="text-center mt-0 mb-2">{{ $posts->body }}</small>
                          </div> 
                @else
                      <p class="text-muted text-center mt-2">No available post</p>
                @endif
            </div>
            @else

            
            @endif
        </div>
    </div>

@endsection
</body>
</html>