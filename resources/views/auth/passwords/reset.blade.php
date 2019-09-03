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
        <title>{{ config('app.name', 'ControlPanda') }} - Reset Password</title>

        <!-- CSS Files -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link href="{{asset('frontend/css/login.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('frontend/css/form-elements.css')}}" rel="stylesheet" media="screen">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="{{asset('js/plugins/validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/plugins/validation/additional-methods.min.js') }}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
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
                                    <h3>Reset Password</h3>
                                    <p>Enter your new password:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>

                            <div class="form-bottom">
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
                                <form role="form"  action="{{ route('password.request') }}" method='POST' id="login-form" class="registration-form form-validate">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" placeholder="Create Password..." class="form-pass form-control" id="password" data-rule-required="true" data-rule-minlength="6">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password_confirmation">Confirm Password</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password..." class="form-conf-pass form-control" id="password_confirmation" data-rule-required="true" data-rule-minlength="6" data-rule-equalto="#password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn">Reset Password</button>
                                    </div>
                                    <a class="btn btn-primary" href="{{ url('/pricing') }}">Get Registered!</a>
                                    <a class="btn btn-primary" href="{{ route('password.request') }}" style="float:right;">Forgot Password</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>        

        <script src="{{asset('/frontend/js/jquery.backstretch.min.js')}}"></script>
        <script>
            jQuery(document).ready(function () {
                $.backstretch("/frontend/images/top-back.jpg");
            });
        </script>
    </body>
</html>