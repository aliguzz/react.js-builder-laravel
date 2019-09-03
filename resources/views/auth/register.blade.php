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
        <title>{{ config('app.name', 'ControlPanda') }} - Register</title>

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
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>


    </head>

    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">                	
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text">
                            <a href="{{url('/')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1 text">
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Register Now</h3>
                                    <p>Enter your details to get instant access:</p>
                                </div>
                                <div class="form-top-right">
                                        <i class="fa fa-pencil"></i>
                                </div>
                                <div class="form-top-right-wrap">
                                    <h3> {{$package_name}} Package </h3>
                                </div>
                                
                            </div>
                            <div class="form-bottom">
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>{{Session::get('success')}}</strong>
                                </div>
                                @endif

                                @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>{{Session::get('error')}}</strong>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 social-logins">
                                        <a href="{!!url('auth/signup/facebook')!!}" class="btn btn-primary"><span><i class="fa fa-facebook"></i> Signup with Facebook</span></a>
                                        <a href="{!!url('auth/signup/google')!!}" class="btn btn-danger"><span><i class="fa fa-google-plus"></i> Signup with Google</span></a>
                                        <a href="{!!url('auth/signup/linkedin')!!}" class="btn btn-info"><span><i class="fa fa-linkedin"></i> Signup with LinkedIn</span></a> 
                                    </div>
                                    <div class="col-md-6">
                                        <form role="form" action="{{ URL::to('register') }}" method='POST' class="form-validate registration-form" id="register-form">
                                            {{ csrf_field() }}
                                            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label class="sr-only" for="first_name">First name</label>
                                                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}"  placeholder="First name..." class="form-first-name form-control" data-rule-required="true">
                                            </div>
                                            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label class="sr-only" for="last_name">Last name</label>
                                                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last name..." class="form-last-name form-control" data-rule-required="true">
                                            </div>
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="sr-only" for="email">Email</label>
                                                <input type="text" type="email" name="email" value="{{ old('email') }}" placeholder="Email..." class="form-email form-control" id="email" data-rule-required="true" data-rule-email="true">
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Create Password</label>
                                                <input type="password" name="password" placeholder="Create Password..." class="form-pass form-control" id="password" data-rule-required="true" data-rule-minlength="6">
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password_c">Confirm Password</label>
                                                <input type="password" name="password_c" placeholder="Confirm Password..." class="form-conf-pass form-control" id="password_c" data-rule-required="true" data-rule-minlength="6" data-rule-equalto="#password">
                                            </div>
                                            @if($package_id ==1)
                                            <input type="hidden" name="package_name"   value="{!! $package_name !!}">
                                            <input type="hidden" name="package_id"   value="{!! $package_id !!}">
                                            @endif
                                            <div class="form-group">
                                                <button @if($package_id !=1) onclick="return(false)" id="buy_btn1" data-toggle="modal" data-target="#buy_modal"  @endif data-email="" data-password="" data-firstname="" data-lastname=""  class="btn buy_btn1">Sign up</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <p>Already have control panda account? <a href="{{ url('/login') }}">Login</a></p>
                                <p>Did you forget your password? <a href="{{ route('password.request') }}">Reset now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <style>
            input[type="text"]{
                border-top-color: rgb(204, 204, 204);
                border-right-color: rgb(204, 204, 204);
                border-bottom-color: rgb(204, 204, 204);
                border-left-color: rgb(204, 204, 204);
            }
        </style>
        <div id="buy_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <ul class="tabs tabs-inline tabs-top">
                            <li class="active">
                                <a href="#strip" data-toggle="tab">Stripe</a>
                            </li>
                            <li class="">
                                <a href="#paypal" data-toggle="tab">Paypal</a>
                            </li>
                        </ul>
                        <div class="clear20"></div>
                        <div class="tab-content modal_tb_content">
                            <div class="tab-pane active" id="strip">
                                <div class="credits_img text-center">
                                    <img width="150" src="{{asset('frontend/images/cclogo.png')}}" alt="">
                                </div>
                                <div class="clear20"></div>
                                <div class="hide" id="loaderdiv">
                                    <img src="{{asset('frontend/images/loader.svg')}}" id="loadersvgimage" class="center" style="display: inline-block !important; margin-top: 50px; margin-left: 200px; text-align: center;">
                                </div>

                                <form role="form" action="{{ URL::to('register') }}" method='POST' class="form-validate registration-form" id="register-form1">

                                    {{ csrf_field() }}


                                    <input type="hidden" name="formtype"   value="stripe">
                                    <input type="hidden" name="package_name"   value="{!! $package_name !!}">
                                    <input type="hidden" name="package_id"   value="{!! $package_id !!}">
                                    <input type="hidden" name="first_name" class="first_name"  value="">
                                    <input type="hidden" name="last_name" class="last_name"  value="">
                                    <input type="hidden" name="email" class="email"  value="">
                                    <input type="hidden" name="password" class="password"  value="">

                                    <div class="form-group clearfix">
                                        <label for="cc_number" class="col-sm-4 control-label">Credit Card No</label>
                                        <div class="col-sm-8">



                                            <input type="text" id="cc_number" name="cc_number" data-rule-required="true" data-rule-minlength="16" data-rule-maxlength="16" maxlength="16" minlength="16" aria-required="true" aria-describedby="cc_number-error" aria-invalid="true"  class='form-control' value=""/>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-4 control-label" for="number">Expiry month/year</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <select class="form-control" data-rule-required="true" id="cc_exp_month" name="cc_exp_month" class="text-field" required>
                                                        <option value="">Month</option>
                                                        @for($i = 1; $i <= 12; $i++)

                                                        <option  value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                                                        @endfor 
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select class="form-control" data-rule-required="true"  id="cc_exp_year" name="cc_exp_year" class="text-field" required>
                                                        <option value="">Year</option>

                                                        @for($i = date('Y'); $i <= date('Y') + 50; $i++)


                                                        <option  value="<?= $i; ?>"><?= $i; ?></option>
                                                        @endfor 
                                                    </select>
                                                </div>    
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-4 control-label" for="number">Credit Card CVV code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="cc_cvv" data-rule-required="true" data-rule-minlength="3" data-rule-maxlength="3" minlength="3" maxlength="3" aria-required="true" aria-describedby="cc_number-error" aria-invalid="true" name="cc_cvv" required />
                                            <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                        </div>
                                    </div>

                                    <div class="form-actions text-right">
                                        <button type="submit" class='btn btn-primary'>Register</button>
                                        <input type="reset" class='btn' value="Discard changes">
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="paypal">
                                <div class="credits_img text-center">
                                    <img width="130" src="{{asset('frontend/images/ppexchlogo.png')}}" alt="">
                                </div>
                                <div class="clear20"></div>

                                <div id="" style="display: none;" class="alert-form alert-box stripformerrorcontainer">
                                    <ul class="stripformerrors"></ul>
                                </div>

                                <div class="hide" id="loaderdivpp">
                                    <img src="{{asset('frontend/images/loader.svg')}}" class="center" style="display: inline-block !important; margin-top: 50px; margin-left: 200px; text-align: center;">
                                </div>


                                <form role="form" action="{{ URL::to('register') }}" method='POST' class="form-validate registration-form" id="register-form2">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="formtype"   value="paypal">
                                    <input type="hidden" name="package_name"   value="{!! $package_name !!}">
                                    <input type="hidden" name="package_id"   value="{!! $package_id !!}">
                                    <input type="hidden" name="first_name" class="first_name"  value="">
                                    <input type="hidden" name="last_name" class="last_name"  value="">
                                    <input type="hidden" name="email" class="email"  value="">
                                    <input type="hidden" name="password" class="password"  value=""> 


                                    <div class="form-group clearfix">
                                        <label for="paypal_email" class="col-sm-4 control-label">Paypal Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="paypal_email" name="paypal_email" class="form-email form-control" id="email" data-rule-required="true" data-rule-email="true"  placeholder="" value=""/>
                                        </div>
                                    </div>

                                    <div class="form-actions text-right">
                                        <input type="submit" class='btn btn-primary' value="Register">
                                        <input type="reset" class='btn' value="Discard changes">
                                    </div>
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
                $.backstretch("../../frontend/images/top-back.jpg");
            });
        </script>
        <script>
            $(document).on("click", "#buy_btn1", function (e) {

                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var password_c = $('#password_c').val();
                //alert(first_name);
                if (!first_name || !last_name || !email || !password || !password_c) {
                    $('#buy_modal').modal('hide');
                    $('#first_name').blur();
                    $('#last_name').blur();
                    $('#email').blur();
                    $('#password').blur();
                    $('#password_c').blur();
                    //e.preventDefault();

                } else {
                    e.preventDefault();
                    $(".modal-body .first_name").val(first_name);
                    $(".modal-body .last_name").val(last_name);
                    $(".modal-body .email").val(email);
                    $(".modal-body .password").val(password);
                }

            });

        </script>
    </body>
</html>