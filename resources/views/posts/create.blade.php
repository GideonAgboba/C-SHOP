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
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <a class="navbar-brand text-white" href="{{ route('home.index') }}">C-SHOP <i class="fa fa-shopping-cart"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home.index') }}">Home</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>
      </div>
    </nav>



    <form action="/home" enctype="multipart/form-data" class="m-5 p-5 container" method="post" >
      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" value="{{Auth::user()->id}}" name="id">
        <input type="text" name="title" class="form-control" placeholder="Enter title here" >
        <textarea name="body" type="text" class="form-control" placeholder="Enter content/body here"  cols="31" rows="5"></textarea>
        <div class="form-group form-control bg-white p-2">
          <label for="upload">Upload Photo:</label><br>
          <input id="upload" type="file" name="file">
        </div>
        <input type="submit" name="submit" class="form-control bg-dark text-white" value="Submit" >
    </form>

    
</body>
</html>