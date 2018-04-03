<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.reboot.min.css">
    <link rel="stylesheet" href="../../vendor/css/main.css">
    <link rel="stylesheet" href="../../vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../../vendor/jquery/jquery.min.js"></script> 
    <script src="../../vendor/popper/popper.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/parallax/jarallax.min.js"></script>

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
        }

    </style>
</head>
<body id="app-layout" class="">

    @if(Auth::guest())
        <div class="alert alert-danger">
            <p class="text-center pt-4">Please login to view your profile</p>
        </div>
    @else
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
                        @if(App\User::where('id', Auth::user()->id)->first()->firstname !== '')
                            <li>
                            <a class="nav-link text-white" href="{{ route('home.create') }}"><i class="fa fa-edit"></i> Create post</a>
                            </li>

                            <li>
                            <a class="nav-link text-white" href="{{ route('king.show', Auth::user()->id) }}"><i class="fa fa-eye"></i> View store</a>
                            </li>

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

    <div class="main-panel mt-5 pt-3 mb-3">
		<!--  -->


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card p-3">
                            @if(App\User::where('id', Auth::user()->id)->first()->firstname == '')
                            <div class="header">
                                <h4 class="title">Update Profile</h4>
                            </div>
                            <div class="content">
                                <form action="/profile" enctype="multipart/form-data" method="post">

                                    <!-- <input type="hidden" name="_method" value="PUT" > -->
                                    <input type="hidden" value="{{Auth::user()->id}}" name="id">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Profile image (upload)</label>
                                                <input type="file" class="form-control" name="path" required />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="{{Auth::user()->name}}" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="Firstname" name="firstname" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Lastname" name="lastname" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Address" name="address" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Phone" name="phone" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" name="city" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" name="country" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code" name="zip" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" name="bio" required /></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @else
                                <div class="alert alert-success">
                                    <p class="text-center">Profile Updated <i class="fa fa-check-circle"></i></p>
                                </div>
                                <!--  -->
                                <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form action="/profile" enctype="multipart/form-data" method="post">
                                    <?php $user = App\User::where('id', Auth::user()->id)->first(); ?>
                                    <input type="hidden" value="{{Auth::user()->id}}" name="id">
                                    <input type="hidden" name="path" value="{{ $user->path }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="{{Auth::user()->name}}" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" value="{{Auth::user()->email}}" disabled  name="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="Firstname" name="firstname" value="{{ $user->firstname }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Lastname" name="lastname" value="{{ $user->lastname }}" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $user->address }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ $user->phone }}" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" name="city" value="{{ $user->city }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" name="country" value="{{ $user->country }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code" name="zip" value="{{ $user->zip }}" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" name="bio" required />{{ $user->bio }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                    @if(App\User::where('id', Auth::user()->id)->first()->firstname == '')
                        <div class="card card-user">
                            <div class="image justify-content-center my-auto d-flex">
                                <img src="../../uploads/user.png" class="rounded-circle justify-content-center my-auto d-flex" width="250px" height="250px" alt="profile image"/>
                            </div>
                            <div class="container pt-2 content">
                                
                                <div class="alert alert-danger">
                                    <p class="text-center">Please update profile</p>
                                </div>     
                                
                            </div>
                        </div>

                        <a href="{{ url('/userstore', Auth::user()->id) }}" class="btn bg-dark text-white p-5 mt-2 justify-content-circle">PROFILE STATISTICS <i class="fa fa-line-chart text-white"></i></a>
                    @else
                        <div class="card card-user">
                            <div class="image justify-content-center my-auto d-flex">
                                <img src="../../uploads/{{ $user->path }}" class="rounded-circle justify-content-center my-auto d-flex" width="250px" height="250px" alt="profile image"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a class="text-dark text-center" href="#">

                                      <h4 class="title pt-2">{{ strtoupper($user->firstname) }} {{ strtoupper($user->lastname) }}<br />
                                         <small>{{Auth::user()->name}}</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="container text-center">{{ $user->bio }}<br><a href="#" target="_blank">{{ $user->email }}</a></p>
                                
                            </div>
                                <form action="/profile/{{ Auth::user()->id }}" method="post">
                                <input type="hidden" name="_method" value="PATCH" >
                                    <input type="hidden" value="{{Auth::user()->id}}" name="id">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                        <div>
                                            <div class="form-group container text-center">
                                                <label class="text-center">Profile image (update) <i class="fa fa-camera"></i></label>
                                                <input type="file" class="form-control" name="path" value="{{ $user->path }}" >
                                                <input type="submit" class="form-control btn bg-dark text-white" value="Upload Photo">
                                            </div>
                                        </div>
                                </form>
                        </div>

                        <a href="{{ url('/userstore', Auth::user()->id) }}" class="btn bg-dark text-white p-5 mt-2 justify-content-circle">PROFILE STATISTICS <i class="fa fa-line-chart text-white"></i></a>
                    @endif
                    </div>

                </div>
            </div>
        </div>
    @endif
</body>
</html>