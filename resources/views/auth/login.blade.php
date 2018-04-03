@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class=''>
        <div class="row">
        <div class="col-lg-3 text-center">
            <div class="">
                <h3>LOGIN <i class="fa fa-sign-in"></i><hr></h3>
                <p>
                    <i class="fa fa-quote-left fa-3x"></i><br>Please make sure all passwords are securly inputed into the password field to prevent scam.
                </p>
            </div>
        </div>
        <div class="col-lg-9 justify-content-center my-auto d-flex">
            <form class="form-horizontal card" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-lg-12 control-label">E-Mail Address</label>

                    <div class="col-lg-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-lg-12">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-md-offset-4">
                        <button type="submit" class="btn text-white bg-dark">
                            <i class="fa fa-btn fa-sign-in"></i> Login
                        </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
