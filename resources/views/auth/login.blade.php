<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{asset('frontend/images/fav.png')}}" type="image/png" sizes="16x16">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'ControlPanda') }} - Login</title>

        <!-- CSS Files -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link href="{{asset('frontend/css/login.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('frontend/css/form-elements.css')}}" rel="stylesheet" media="screen">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="{{asset('js/plugins/validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/plugins/validation/additional-methods.min.js') }}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/eakroko.min.js') }}"></script>

    </head>
    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <a href="{{url('/')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-sm-offset-3 text">
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Sign in now</h3>
                                    <p>Enter your login details to get instant access:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>

                            <div class="form-bottom">
                                @if ($errors->has('email'))
                                <div class="alert alert-danger" style="margin-bottom: 0px">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                                @if ($errors->has('password'))
                                <div class="alert alert-danger" style="margin-bottom: 0px">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                                @endif
                                @if(Session::has('error'))
                                <div class="alert alert-danger" style="margin-bottom: 0px">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>{{Session::get('error')}}</strong>
                                </div>
                                @endif
                                <form role="form" action="{{ route('login') }}" method='POST' id="login-form" class="registration-form form-validate">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="email">Email</label>
                                        <input id="email" type="email" name="email" type="text" placeholder="Email..." class="form-user-name form-control" data-rule-required="true" data-rule-email="true"/>
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="password">Password</label>
                                        <input id="password" type="password" name="password" placeholder="Password..." class="form-password form-control" data-rule-required="true"/>
                                    </div>
                                    <div class="remember">
                                        <input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember" {{ old('remember') ? 'checked' : '' }}> <label for="remember">Remember me</label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn">Sign me in!</button>
                                    </div>
                                    <div class="social-logins LoginPage_Social">
                                        <a href="https://controlpanda.com/auth/signup/facebook" class="btn btn-primary"><span><i class="fa fa-facebook"></i> Login with Facebook</span></a>
                                        <a href="https://controlpanda.com/auth/signup/google" class="btn btn-danger"><span><i class="fa fa-google-plus"></i> Login with Google</span></a>
                                        <a href="https://controlpanda.com/auth/signup/linkedin" class="btn btn-info"><span><i class="fa fa-linkedin"></i> Login with LinkedIn</span></a> 
                                    </div>
                                    <p>Didn't have control panda account? <a href="{{ url('/signup/1/free') }}">Get Registered!</a></p>
                                    <p>Did you forget your password? <a href="{{ route('password.request') }}">Reset now</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('frontend/js/jquery.backstretch.min.js')}}"></script>
        <script>
jQuery(document).ready(function () {
    $.backstretch("frontend/images/top-back.jpg");
});
        </script>
    </body>
</html>
