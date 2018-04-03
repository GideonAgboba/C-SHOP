@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class=''>
        <div class="row">
        <div class="col-lg-3 text-center">
            <div class="">
                <h3>REGISTER <i class="fa fa-sign-in"></i><hr></h3>
                <p>
                    <i class="fa fa-quote-left fa-3x"></i><br>Please make sure all input fields are filled with valid information and and passwords are securly created to prevent scam.
                </p>
            </div>
        </div>
        <div class="col-lg-9 justify-content-center my-auto d-flex">
        <form class="form-horizontal card" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-12 control-label">Userame</label>

                    <div class="col-lg-12">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-12 control-label">E-Mail Address</label>

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
                    <label for="password" class="col-md-12 control-label">Password</label>

                    <div class="col-lg-12">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>

                    <div class="col-lg-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-md-offset-4">
                        <button type="submit" class="btn text-white bg-dark">
                            <i class="fa fa-btn fa-user"></i> Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
