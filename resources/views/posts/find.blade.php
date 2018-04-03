<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Search</title>
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
<style>
    body{
        margin-top: 0em !important;
    }
</style>
@extends('layouts.app')
@section('content')
<div class="container-fluid pt-5">
        <div class="row container-fluid">
        <div class="col-lg-12 card ">
                <span class="bg-dark p-1 container-fluid text-white text-center">SEARCH RESULT <i class="fa fa-search"></i></span>

                      <div class="container">
                        <div class="row">
                @if($post_result->all())
                      @foreach($post_result as $posts)
                          <div class="col-lg-3 p-0 card text-dark mt-2 mb-2" style="width:100%;height100%;border: 1px solid lightgrey; border-radius: 4px;">
                            <img src="uploads/{{ $posts->path }}" alt="posts" class="img-responsive container-f" style="widht:100%;height:200px;border:1px solid grey;">
                                <small class="text-danger text-center">"{{ $item }}" was found in this search result</small>
                              <strong class="text-center">{{ $posts->title }}<hr width="100"></strong>
                              <small class="container text-center mt-0 mb-2">{{ $posts->body }}</small>
                          </div> 
                      @endforeach
                  @else
                      <p class="text-danger text-center mt-5">No search result found for "{{$item}}"</p>
                  @endif
                        </div>
                      </div> 
            </div>
        </div>
    </div>

@endsection
</body>
</html>