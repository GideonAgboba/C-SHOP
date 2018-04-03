<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.reboot.min.css">
    <link rel="stylesheet" href="vendor/css/main.css">
    <link rel="stylesheet" href="vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/parallax/jarallax.min.js"></script>

    <!-- Styles -->

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

   
<script>
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    document.body.style.background = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.background = "white";
} 
</script>
</head>
<body id="app-layout" class="pt-5">
    <!-- My side nav -->
    <div id="mySidenav" class="sidenav bg-dark text-white">
        <a href="javascript:void(0)" class="closebtn text-white" onclick="closeNav()">&times;</a>
        <h4 class="text-center">CATEGORIES</h4>
        <div class="container">
        <hr class="bg-white">
        <button class="bg-white mt-2 text-dark form-control" role="button" data-toggle="collapse" data-target="#top-post" ariel-expanded="fale" ariel-controls="top-post">Top Posts <i class="fa fa-envelope"></i></button>
            <div class="collapse" id="top-post">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam reiciendis, laboriosam quam suscipit sapiente aut amet vel harum recusandae aperiam magni error qui ratione cupiditate a dolor temporibus libero incidunt.
            </div>
        <button class="bg-white mt-2 text-dark form-control" role="button" data-toggle="collapse" data-target="#favourites" ariel-expanded="fale" ariel-controls="favourites">Favourites <i class="fa fa-star"></i></button>
            <div class="collapse" id="favourites">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
            </div>
        <button class="bg-white mt-2 text-dark form-control" role="button" data-toggle="collapse" data-target="#most-liked" ariel-expanded="fale" ariel-controls="most-liked">Most Liked <i class="fa fa-heart"></i></button>
            <div class="collapse" id="most-liked">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
            </div>
        <button class="bg-white mt-2 text-dark form-control" role="button" data-toggle="collapse" data-target="#users" ariel-expanded="fale" ariel-controls="users">Profiles <i class="fa fa-user-circle"></i></button>
            <div class="collapse" id="users">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque totam, officiis doloribus exercitationem obcaecati amet officia natus eligendi recusandae nostrum in aliquam eos deserunt ullam asperiores dignissimos, ab nihil ad!
            </div>
        </div>
    </div>
    <!-- End for my side nav -->
    <nav class="navbar navbar-expand-md bg-dark navbar-static-top fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggler bg-null text-dark collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="navbar-toggler text-white fa fa-bars"></span>
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a class="text-dark btn form-control nav-link-btn" href="{{ url('/users', Auth::user()->id) }}"><i class="fa fa-btn text-dark p-2 fa-user"></i>Profile</a></li>
                                <li><a class="text-dark btn form-control nav-link-btn" href="{{ url('/logout') }}"><i class="fa fa-btn text-dark p-2 fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>

        <ul class="nav navbar-nav nav-item mt-3 ml-5">
                <li>
                    <form class="" method="post" action="/search">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <input class="form-control col-lg-10 m-0" name="item" type="text" placeholder="Search items..." required />
                        <button class="form-control col-lg-2 m-0"><i class="fa fa-search"></i></button></div>
                    </form>
                </li>
        </ul>
            </div>
            
        </div>
        
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
