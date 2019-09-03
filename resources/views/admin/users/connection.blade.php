@extends('admin.layouts.app')

@section('content')

@include('admin.users.subheader')  

@php 
    $urisegment = @$_GET['ref'];
@endphp

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="{{ asset('css/plugins/datepicker/datepicker.css')}}" rel="stylesheet">
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.css') }}">
<script src="{{ asset('plugins/select2/select2.min.js')}}"></script>
<link href="{{asset('frontend/css/integration.css')}}" rel="stylesheet" media="screen">
 <style type="text/css">
                    .copyright { padding:0}
                    .btn-flow { background:#F00;}
                    .panda-flow-pricing .pricing-div ul {min-height: 200px;}
                </style>


<div class="container-fluid">
    <section class="inner-full-width-panel pr-30">

        <div class="tab-content">
            <div style="display:none;" id="loaderdiv">
                <img src="{{asset('frontend/images/loader.svg')}}" id="loadersvgimage" class="center" style="display: inline-block !important;margin-top: 0%;margin-left: 42%;position: absolute;z-index: 99999;">
            </div>

            <div class="tab-content">



                <style>

                    .invioce_popup .row div:nth-child(even){
                        background-color: #dddada;
                    }
                    .invioce_popup .row div:nth-child(odd){
                        background-color: #dddada;
                    }

                </style>

                <style type="text/css">
                    @media print
                    {
                        body * { visibility: hidden; }
                        .firsttd { display: none; }
                        .img-rounded { background:#8750b4 !important; }
                        .copyright { display: none; }
                        #sutmib { visibility: hidden; }
                        .invoice_popups * { visibility: visible; }
                        .invoice_popups { position: absolute; margin-top: -200px; top:0px; left: 0px; }

                    }
                </style>
                <link href="{{asset('frontend/css/smart_wizard.css')}}" rel="stylesheet">
                <script src="{{ asset('js/plugins/validation/additional-methods.min.js')}}"></script>

                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="left-menu">
                            <ul class="nav nav-tabs left-panel-menu">
                                <li><a data-toggle="tab" href="#subscription" @if($urisegment == '' || $urisegment == 'subscription') class="active" @endif>Subscription Plan</a></li>
                                <li><a data-toggle="tab" href="#payment" @if($urisegment == 'payment') class="active" @endif>Payment Information</a></li>
                                <li><a data-toggle="tab" href="#invoice" @if($urisegment == 'invoice') class="active" @endif>Invoice History</a></li>
                                <li><a data-toggle="tab" href="#account-details" @if($urisegment == 'account-details' || $urisegment == 'controlpandasubdomain' || $urisegment == 'TimezoneandLanguageSettings' || $urisegment == 'wordpressapikey') class="active" @endif>Account Details</a></li>
                               
                                <li><a data-toggle="tab" href="#profile" @if($urisegment == 'profile') class="active" @endif>Profile</a></li>
                                <li><a data-toggle="tab" href="#password" @if($urisegment == 'password') class="active" @endif>Password</a></li>
                                <li><a data-toggle="tab" href="#socialmedialinks" @if($urisegment == 'socialmedialinks') class="active" @endif>Social Media Links</a></li>
                                <li><a data-toggle="tab" href="#fbmessengersetup" @if($urisegment == 'fbmessengersetup') class="active" @endif>Facebook Messenger Setup</a></li>
                                <li><a data-toggle="tab" href="#mypackages" @if($urisegment == 'mypackages') class="active" @endif>My Packages</a></li>
                                  <li><a data-toggle="tab" href="#premiumbuildrequests" @if($urisegment == 'premiumbuildrequests') class="active" @endif>Premium Build Requests</a></li>
                                 @if(@Auth::User()->id != 1)
                                  <li><a data-toggle="tab" href="#cancel_account" @if($urisegment == 'cancel_account') class="active" @endif>Cancel Account</a></li>
                                  @endif
                                  
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8">
                        <div class="Inner_Content">
                            
                            <div class="">
                                <div class="clear20"></div>
                                <div class="tab-content">
                                    
                                    <div class="tab-pane @if($urisegment == 'premiumbuildrequests') active @endif" id="premiumbuildrequests">
                                        <h2 class="email-setting-head">Premium Build Requests</h2>
                                        <div class="table-responsive">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Company Services</th>
                                    <th>Website Address</th>
                                    <th>Phone Number</th>
                                    <th>Logo</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demos as $demo) 
                                <tr>
                                    <td>{!!$demo->company_name!!}</td>
                                    <td>{!!$demo->company_service!!}</td>
                                    <td>{!!$demo->website_address!!}</td>
                                    <td>{!!$demo->phone_number!!}</td>
                                    <td>
                                    @if($demo->logo)
                                    <img width="100px" alt="no logo" src="{!!url('uploads/premium/'.$demo->logo)!!}">
                                    @else
                                    N/A
                                    @endif
                                    </td>
                                    <td>{!!date('M d, Y', strtotime($demo->created_at))!!}</td>
                                    <td>
                                    @if($demo->status==0)
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif($demo->status==1)
                                    <label class="badge badge-info">In Process</label>
                                    @elseif($demo->status==2)
                                    <label class="badge badge-success">Completed</label>
                                    @else
                                    <label class="badge badge-danger">Rejected</label>
                                    @endif
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lmyModal{{$demo->id}}"><i class="fa fa-eye fa-fw"></i></button>
                                    
                                    <div class="modal" id="lmyModal{{$demo->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <div class="popup-top-two"></div>
                                                            <div class="clear20"></div>
                                                            <div class="table-box" style="width:100%">
                                                                <table class="table table-striped table-nomargin no-margin">
                                                                    
                                                                    <tbody>
                                @foreach($demo as $key=>$d) 
                                @if($key != 'user_id' && $key != 'id') 
                                @if($key == 'logo')
                                @if($d !='')
                                @php $d = '<img alt="no logo" width="100px" src="'.url('uploads/premium/'.$d).'">'; @endphp
                                @else
                                @php $d = 'N/A';  @endphp
                                @endif
                                @elseif($key == 'created_at' || $key == 'updated_at')
                                @php $d = date('M d, Y', strtotime($d)); @endphp
                                @endif
                                <tr>
                                    <th>{!!ucfirst(str_replace("_"," ",$key))!!}</th>
                                    <td>
                                    @if($key == 'status')
                                        @if($d==0)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($d==1)
                                            <label class="badge badge-info">In Process</label>
                                        @elseif($d==2)
                                           <label class="badge badge-success">Completed</label>
                                        @else
                                            <label class="badge badge-danger">Rejected</label>
                                        @endif
                                    @else
                                    {!!$d!!}
                                    @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <nav class="pull-right">{!! $demos->render() !!}</nav>
                                        
                                    </div>
                                    
                                    
                                    
                                    <div class="tab-pane @if($urisegment == '') active @endif" id="subscription">
                                        <h2 class="email-setting-head">Account Billing & Subscription</h2>
                                        <table>
                                            <tr>
                                                <td>Current Plan:</td>
                                                <td> Control Panda <span class="comfort">{{@$package->title}} </span></td>
                                            </tr>
                                            <tr>
                                                <td>Monthly Subscription:</td>
                                                <td> ${{@number_format($package->price, 2)}} USD <span class="interval"> /month </span></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Next Payment Date:</td>
                                                <td> <span class="amount"> <b>@if(Auth::User()->pkg_renew_date <> '') {{date('M d, Y', strtotime(Auth::User()->pkg_renew_date))}} @else {{'No date available'}} @endif</b></span></td>
                                            </tr>
                                        </table>
                                        @if(have_premission(array(104,105,106,107)))
                                        <a class="btn btn-default" style='color:#fff' href="{{url('admin/upgrade-account')}}" title="">Upgrade</a>
                                        @endif
                                        
                                    </div>

                                    <div class="tab-pane row seprate-btn" id="payment">

                                        <h2 class="email-setting-head">Payment Information</h2>
                                                             
                                        <div class="row">
                                            
                                            <div class="col-lg-4">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#strip-one" data-toggle="tab"><button>Stripe</button></a>
                                                </li>
                                                <li class="">
                                                    <a href="#paypal-one" data-toggle="tab"><button>PayPal</button></a>
                                                </li>
                                            </ul>
                                            </div>
                                            
                                            <div class="col-lg-8">
                                            <div class="tab-content modal_tb_content">
                                                <div class="tab-pane active" id="strip-one">
                                                    <form id="stripe-form" name="stripe-form" class="form-horizontal form-validate" action="{{url('/admin/update-card-info')}}" method="POST">
                                                        <div class="credits_img text-center">
                                                            <img width="150" src="{{asset('frontend/images/cclogo.png')}}" alt="">
                                                        </div>
                                                        <div class="clear20"></div>

                                                        {{ csrf_field() }}
                                                        
                                                        <div class="form-group clearfix">
                                                            <div class="col-sm-12">
                                                                <label for="name_on_card" class="control-label">Name on Card</label>
                                                                <input type="text" id="cc_name" name="cc_name" required class='form-control' placeholder="" value="{{@$user_info->first_name.' '. @$user_info->last_name}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <div class="col-sm-12">
                                                                <label for="" class="control-label">Credit Card No</label>
                                                                <input type="text" id="cc_number" name="cc_number" minlength="16" maxlength="16" required class='form-control' placeholder="" value="{{@$user_info->cc_number}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">

                                                            <div class="col-sm-12">
                                                                <label class="control-label" for="number">Credit Card Expiration month/year</label>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <select class="form-control" id="cc_exp_month" name="cc_exp_month" class="text-field" required>
                                                                            <option value="">Month</option>
                                                                            @for($i = 1; $i <= 12; $i++)

                                                                            <option  value="<?= sprintf('%02u', $i); ?>" @if(@$user_info->cc_exp_month == $i) selected @endif><?= sprintf('%02u', $i); ?></option>
                                                                            @endfor 
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <select class="form-control" id="cc_exp_year" name="cc_exp_year" class="text-field" required>
                                                                            <option value="">Year</option>

                                                                            @for($i = date('Y'); $i <= date('Y') + 50; $i++)


                                                                            <option  value="<?= $i; ?>" @if(@$user_info->cc_exp_year == $i) selected @endif ><?= $i; ?></option>
                                                                            @endfor 
                                                                        </select>
                                                                    </div>    
                                                                </div>    
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">

                                                            <div class="col-sm-12">
                                                                <label class="control-label" for="number">Credit Card CVV code</label>
                                                                <input type="number" class="form-control" id="cc_cvv" minlength="3" maxlength="3" name="cc_cvv" min="1" max="9999" required  value="{{@$user_info->cc_cvv}}"/>
                                                                <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions form-group text-center">
                                                            <button type="submit" class='btn btn-primary paystripe'>Save</button>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane" id="paypal-one">
                                                    <form id="stripe-form" name="stripe-form" class="form-horizontal form-validate" action="{{url('/admin/update-paypal-details')}}" method="POST">

                                                        {{ csrf_field() }}

                                                        <label class="control-label" for="number">Enter Paypal Email</label>
                                                        <input type="text" name="paypal_email" class="form-control" placeholder="example@paypal.com" value="{{@$user_info->paypal_email}}">                           

                                                        <div class="form-actions text-center mt-40">
                                                            
                                                            <input type="submit" class='btn btn-primary' value="Link Paypal Account">                                                                
                                                        </div>
                                                    </form>
                                                </div>

</div>
                                            </div>
                                            
                                        </div>
                                            

                                           
                                    </div>

                                    <div class="tab-pane @if($urisegment == 'invoice') active show @endif" id="invoice">
                                        <h2 class="email-setting-head">Invoice History</h2>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr # </th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($invoices as $key=>$item)
                                                    <tr>
                                                        <td class="firsttd">{{($key+1)}}</td>
                                                        <td class="firsttd">{{time_ago($item->payment_datetime)}}<br />
                                                        </td>
                                                        <td class="firsttd">${{number_format($item->amount_paid, 2)}}</td>
                                                        <td class="firsttd"><a href="#" data-toggle="modal" data-target="#invoice_popup{{$item->id}}">{{$item->payment_status}} </a> <i class="fa fa-info-circle" data-toggle="tooltip" title="Your card payment is {{$item->payment_status}}"></i></td>

                                                        <td class="secondtd"><a href="#" data-toggle="modal" data-target="#invoice_popup{{$item->id}}" title="Print invoice"><i class="fa fa-file-pdf-o"></i></a>




                                                            <div id="invoice_popup{{$item->id}}" class="modal fade invoice_popups" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">Account Billing Invoice # {{$item->id}} </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <center><img src="{{url('frontend/images/logo.png')}}" class="img-rounded logo" style="background:#8750b4;" ></center>
                                                                            <div class="row">
                                                                                <div class="clear20"></div>
                                                                                <div class="col col-md-2"></div>
                                                                                <div class="col col-md-10">

                                                                                    <address>
                                                                                        <h4><b>Development Center</b></h4>
                                                                                        <p>Office # 17 / California, Santa Cruz 1156 High Street Santa Cruz, CA 95064</p>

                                                                                        <h4><b>Office</b></h4>
                                                                                        <p>Santa Cruz 1156 High Street Santa Cruz, CA 95064</p>
                                                                                    </address>
                                                                                </div>
                                                                                <div class="clear20"></div>
                                                                                <div class="col col-md-2"></div>
                                                                                <div class="col col-md-8">

                                                                                    <div class="table invioce_popup">

                                                                                        <div class="row">
                                                                                            <div class="col col-md-6"><strong>Invoice #</strong></div>
                                                                                            <div class="col col-md-6">{{$item->id}}</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col col-md-6"><strong>Date</strong></div>
                                                                                            <div class="col col-md-6">{{$item->payment_datetime}}</div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col col-md-6"><strong>Amount</strong></div>
                                                                                            <div class="col col-md-6">${{number_format($item->amount_paid, 2)}}</div>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                                <div class="clear5"></div>
                                                                                <center>
                                                                                    <button id="sutmib" class="btn btn-primary" onclick="window.print();">Print Invoice</button>
                                                                                </center>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <!-- invoice for  -->



                                                        </td>       

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="upperpagination" data-id="invoice">
                                            <nav class="pull-right">{!! $invoices->render() !!}</nav>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="cancel_account">
                                        <h2 class="email-setting-head">Cancel Account</h2>
                                        
                                        
                                        <div id="cancel_account_popup" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cancel or pauses account</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/admin/delete-account')}}"  method="POST" id="Form">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="step1" id="hidden1" value=""/>
                                    <input type="hidden" name="step2" id="hidden2" value=""/>
                                    <input type="hidden" name="step3" id="hidden3" value=""/>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label " for="is_active"> Please choose action:</label>
                                        <div class="col-sm-8">
                                            <input type="radio" name="action" class="action" value="pause" required  /> Pause Account &nbsp;&nbsp; <input type="radio" name="action" class="action" value="cancel" required /> Cancel Account
                                        </div>
                                    </div>
                                    <div class="clear20"></div>

                                    <div class="col-sm-12">
                                        ** If you Cancel your account you'll lose your subdomain, all your customers, all your leads, all your pages, and all your websites... If you pause, your pages will not display live, you won't be able to use the ControlPanda App... but we'll keep your subdomain reserved and all your pages and funnels waiting so you can resume your account anytime.
                                    </div>

                                    <div class="clear5"></div>
                                    <button type="submit" id="submit" class="btn btn-primary pull-right">Submit</button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                    <div class="clear5"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                                        
                                        
                                        
                                        
                                        <div id="smartwizard">
                                            <ul style="border:none;">
                                                                                      <li class="stepone"><a href="#step-1">Step 1 <!--<small>This is step description</small>--></a>
                                                    <div class="step-box">
                                                        <textarea style="line-height:25px;" placeholder="why do you want cancel control panda subscription"></textarea>
                                                    </div>
                                                    <div class="center-btn"><button type="button" id='first-next' class="btn btn-default">Next</button></div>
                                                </li>
                                                <li class="steptwo"><a href="#step-2">Step 2<!--<small>This is step description</small>--></a>
                                                    <div class="step-box">
                                                        <textarea disabled style="line-height:25px;" placeholder="By canceling your subscription and deleting your account. All your web-sites, and customer data will be permanently deleted from our system. Do you wish to proceed?"></textarea>
                                                        
                                                    </div>
                                                    <div class="center-btn"><button disabled type="button" id='second-next' class="btn btn-default">Yes Proceed</button></div>
                                                </li>
                                                <li  class="stepthree"><a href="#step-3">Step 3<!--<small>This is step description</small>--></a>
                                                    <div class="step-box">
                                                        <span style="font-size:14px;">confirm your request to delete your account by typing DELETE ACCOUNT here.</span>
                                                        <input type="text" class="form-control" name="step3" value=""/>
                                                    </div>
                                                    <div class="center-btn"><button disabled type="button" id='lastcancel' class="btn btn-danger" style="border-radius:20px;">Permanently Delete Account</button></div>
                                                </li>
                                            </ul>
                                            
                                            <script>
                                            
                                            $(document).ready(function(){
                                               $('#first-next').click(function(){
                                                   if($('.stepone textarea').val() === ''){
                                                    swal({
                                                    title: "Please write something in Step1",
                                                    type: "error"
                                                    });
                                                   }else{
                                                       $('#hidden1').val($('.stepone textarea').val());
                                                        $('.stepone').removeClass('active');
                                                        $('.steptwo').addClass('active');
                                                        $('.steptwo .step-box textarea').attr('disabled',true);
                                                        $('#second-next').attr('disabled',false);
                                                    }
                                               });
                                               
                                               $('#second-next').click(function(){
                                                    
                                                        //$('#hidden2').val($('.steptwo textarea').val());
                                                        $('.steptwo').removeClass('active');
                                                        $('.stepthree').addClass('active');
                                                        $('.stepthree .step-box textarea').attr('disabled',false);
                                                        $('#lastcancel').attr('disabled',false);
                                               });
                                               
                                               $('#lastcancel').click(function(){
                                                   $('#hidden3').val($('.stepthree input[type="text"]').val());
                                                    if($('.stepone textarea').val() === '' ){
                                                        swal({
                                                        title: "Please write something in Step1",
                                                        type: "error"
                                                    });
                                                    }else if($('.stepthree input[type="text"]').val() === 'DELETE ACCOUNT'){
                                                        $("#cancel_account_popup").modal('show');
                                                    }else{
                                                        swal({
                                                        title: "Write DELETE ACCOUNT to delete your account permanently",
                                                        type: "error"
                                                        });
                                                    }
                                               });
                                               
                                               
                                               
                                            });
                                            
                                            </script>

<!--                                            <div>
                                                <div id="step-1" class="">
                                                    
                                                </div>
                                                <div id="step-2" class="">
                                                    
                                                </div>
                                                <div id="step-3" class="">
                                                     
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>


                                    <div class="tab-pane @if($urisegment == 'account-details' || $urisegment == 'controlpandasubdomain' || $urisegment == 'TimezoneandLanguageSettings' || $urisegment == 'wordpressapikey') active @endif" id="account-details">
                                        <h1>My Account Details
                                            <div class="clearfix"></div>
                                        </h1>
                                        <div class="">
                                            <div class="clear20"></div>
                                            <div class="my-account-detail">
                                                <ul class="nav nav-tabs">
                                                    <li class="@if((isset($urisegment) && $urisegment == 'controlpandasubdomain') || (!isset($urisegment))) active @endif">
                                                        <a href="#ControlPandaSubdomain" data-toggle='tab'><i class="icon-user"></i>  Subdomain</a>
                                                    </li>
                                                    <li class="@if(isset($urisegment) && $urisegment == 'TimezoneandLanguageSettings') active @endif">
                                                        <a href="#TimezoneandLanguageSettings" data-toggle='tab'><i class="icon-lock"></i> Timezone and Language Settings</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="tab-content padding tab-content-inline tab-content-bottom my-account-detail-tab">
                                                <div class="tab-pane fade in @if(isset($urisegment) && $urisegment == 'controlpandasubdomain' || $urisegment == 'account-details' || $urisegment != 'wordpressapikey' || $urisegment != 'TimezoneandLanguageSettings') active show @endif" id="ControlPandaSubdomain">
                                                    <form id="profile-form" method="POST" action="{{url("/admin/update-clickfunneldomain")}}" class="form-horizontal form-validate" novalidate="novalidate" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div style="clear: both; height:15px;"></div>
                                                                <div class="form-group">
                                                                    <label for="email" class="col-sm-4 control-label">Edit subdomain</label>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group">
                                                                            <input type="text" class='form-control domain-name nvcbb' name="user_sub_domain" id="user_sub_domain" data-rule-required="true" aria-required="true"  onkeyup="validSubdomain()" value="{!!@$user_sub_domain!!}"><span class="input-group-addon">.controlpanda.com</span></div>
                                                                    </div>
                                                                </div>


                                                                <div class="form-actions text-right" style="padding: 0 0 20px;">
                                                                    <input type="submit" class='btn btn-primary' value="Save">
                                                                    <input type="reset" class='btn' value="Discard changes">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade in @if(isset($urisegment) && $urisegment == 'TimezoneandLanguageSettings') active show @endif" id="TimezoneandLanguageSettings">
                                                    <form id="password-form" method="POST" action="{{url("/admin/update-timezonelocale")}}" class="form-horizontal form-validate" novalidate="novalidate">
                                                        {{ csrf_field() }}

                                                        <div class="form-group col-md-6"  style="float: left;">
                                                            <div style="clear: both; height:15px;"></div>
                                                            <label for="user_time_zone" class="col-sm-4 control-label">Time Zone</label>
                                                            <div class="">
                                                                <select name="user_time_zone" id="user_time_zone" required="" class='select2-me form-control' style="width:450px;">
                                                                    <option value="American Samoa">(GMT-11:00) American Samoa</option>
                                                                    <option value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                                                    <option value="Midway Island">(GMT-11:00) Midway Island</option>
                                                                    <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                                                    <option value="Alaska">(GMT-09:00) Alaska</option>
                                                                    <option value="America/Los_Angeles">(GMT-08:00) America/Los_Angeles</option>
                                                                    <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                                    <option value="Tijuana">(GMT-08:00) Tijuana</option>
                                                                    <option value="America/Boise">(GMT-07:00) America/Boise</option>
                                                                    <option value="America/Denver">(GMT-07:00) America/Denver</option>
                                                                    <option value="Arizona">(GMT-07:00) Arizona</option>
                                                                    <option value="Chihuahua">(GMT-07:00) Chihuahua</option>
                                                                    <option value="Mazatlan">(GMT-07:00) Mazatlan</option>
                                                                    <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                                    <option value="America/Chicago">(GMT-06:00) America/Chicago</option>
                                                                    <option value="Central America">(GMT-06:00) Central America</option>
                                                                    <option value="Central Time (US &amp; Canada)">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                                    <option value="Guadalajara">(GMT-06:00) Guadalajara</option>
                                                                    <option value="Mexico City">(GMT-06:00) Mexico City</option>
                                                                    <option value="Monterrey">(GMT-06:00) Monterrey</option>
                                                                    <option value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                                                    <option value="America/Detroit">(GMT-05:00) America/Detroit</option>
                                                                    <option value="America/New_York">(GMT-05:00) America/New_York</option>
                                                                    <option value="Bogota">(GMT-05:00) Bogota</option>
                                                                    <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                                    <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                                                    <option value="Lima">(GMT-05:00) Lima</option>
                                                                    <option value="Quito">(GMT-05:00) Quito</option>
                                                                    <option value="Atlantic Time (Canada)">(GMT-04:00) Atlantic Time (Canada)</option>
                                                                    <option value="Caracas">(GMT-04:00) Caracas</option>
                                                                    <option value="Georgetown">(GMT-04:00) Georgetown</option>
                                                                    <option value="La Paz">(GMT-04:00) La Paz</option>
                                                                    <option value="Santiago">(GMT-04:00) Santiago</option>
                                                                    <option value="Newfoundland">(GMT-03:30) Newfoundland</option>
                                                                    <option value="Brasilia">(GMT-03:00) Brasilia</option>
                                                                    <option value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                                                                    <option value="Greenland">(GMT-03:00) Greenland</option>
                                                                    <option value="Montevideo">(GMT-03:00) Montevideo</option>
                                                                    <option value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                                                                    <option value="Azores">(GMT-01:00) Azores</option>
                                                                    <option value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                                                                    <option value="Casablanca">(GMT+00:00) Casablanca</option>
                                                                    <option value="Dublin">(GMT+00:00) Dublin</option>
                                                                    <option value="Edinburgh">(GMT+00:00) Edinburgh</option>
                                                                    <option value="Lisbon">(GMT+00:00) Lisbon</option>
                                                                    <option value="London">(GMT+00:00) London</option>
                                                                    <option value="Monrovia">(GMT+00:00) Monrovia</option>
                                                                    <option value="UTC">(GMT+00:00) UTC</option>
                                                                    <option value="Amsterdam">(GMT+01:00) Amsterdam</option>
                                                                    <option value="Belgrade">(GMT+01:00) Belgrade</option>
                                                                    <option value="Berlin">(GMT+01:00) Berlin</option>
                                                                    <option value="Bern">(GMT+01:00) Bern</option>
                                                                    <option value="Bratislava">(GMT+01:00) Bratislava</option>
                                                                    <option value="Brussels">(GMT+01:00) Brussels</option>
                                                                    <option value="Budapest">(GMT+01:00) Budapest</option>
                                                                    <option value="Copenhagen">(GMT+01:00) Copenhagen</option>
                                                                    <option value="Ljubljana">(GMT+01:00) Ljubljana</option>
                                                                    <option value="Madrid">(GMT+01:00) Madrid</option>
                                                                    <option value="Paris">(GMT+01:00) Paris</option>
                                                                    <option value="Prague">(GMT+01:00) Prague</option>
                                                                    <option value="Rome">(GMT+01:00) Rome</option>
                                                                    <option value="Sarajevo">(GMT+01:00) Sarajevo</option>
                                                                    <option value="Skopje">(GMT+01:00) Skopje</option>
                                                                    <option value="Stockholm">(GMT+01:00) Stockholm</option>
                                                                    <option value="Vienna">(GMT+01:00) Vienna</option>
                                                                    <option value="Warsaw">(GMT+01:00) Warsaw</option>
                                                                    <option value="West Central Africa">(GMT+01:00) West Central Africa</option>
                                                                    <option value="Zagreb">(GMT+01:00) Zagreb</option>
                                                                    <option value="Athens">(GMT+02:00) Athens</option>
                                                                    <option value="Bucharest">(GMT+02:00) Bucharest</option>
                                                                    <option value="Cairo">(GMT+02:00) Cairo</option>
                                                                    <option value="Harare">(GMT+02:00) Harare</option>
                                                                    <option value="Helsinki">(GMT+02:00) Helsinki</option>
                                                                    <option value="Jerusalem">(GMT+02:00) Jerusalem</option>
                                                                    <option value="Kaliningrad">(GMT+02:00) Kaliningrad</option>
                                                                    <option value="Kyiv">(GMT+02:00) Kyiv</option>
                                                                    <option value="Pretoria">(GMT+02:00) Pretoria</option>
                                                                    <option value="Riga">(GMT+02:00) Riga</option>
                                                                    <option value="Sofia">(GMT+02:00) Sofia</option>
                                                                    <option value="Tallinn">(GMT+02:00) Tallinn</option>
                                                                    <option value="Vilnius">(GMT+02:00) Vilnius</option>
                                                                    <option value="Baghdad">(GMT+03:00) Baghdad</option>
                                                                    <option value="Istanbul">(GMT+03:00) Istanbul</option>
                                                                    <option value="Kuwait">(GMT+03:00) Kuwait</option>
                                                                    <option value="Minsk">(GMT+03:00) Minsk</option>
                                                                    <option value="Moscow">(GMT+03:00) Moscow</option>
                                                                    <option value="Nairobi">(GMT+03:00) Nairobi</option>
                                                                    <option value="Riyadh">(GMT+03:00) Riyadh</option>
                                                                    <option value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                                                                    <option value="Volgograd">(GMT+03:00) Volgograd</option>
                                                                    <option value="Tehran">(GMT+03:30) Tehran</option>
                                                                    <option value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                                                                    <option value="Baku">(GMT+04:00) Baku</option>
                                                                    <option value="Muscat">(GMT+04:00) Muscat</option>
                                                                    <option value="Samara">(GMT+04:00) Samara</option>
                                                                    <option value="Tbilisi">(GMT+04:00) Tbilisi</option>
                                                                    <option value="Yerevan">(GMT+04:00) Yerevan</option>
                                                                    <option value="Kabul">(GMT+04:30) Kabul</option>
                                                                    <option value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                                    <option value="Islamabad">(GMT+05:00) Islamabad</option>
                                                                    <option value="Karachi">(GMT+05:00) Karachi</option>
                                                                    <option value="Tashkent">(GMT+05:00) Tashkent</option>
                                                                    <option value="Chennai">(GMT+05:30) Chennai</option>
                                                                    <option value="Kolkata">(GMT+05:30) Kolkata</option>
                                                                    <option value="Mumbai">(GMT+05:30) Mumbai</option>
                                                                    <option value="New Delhi">(GMT+05:30) New Delhi</option>
                                                                    <option value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                                                                    <option value="Kathmandu">(GMT+05:45) Kathmandu</option>
                                                                    <option value="Almaty">(GMT+06:00) Almaty</option>
                                                                    <option value="Astana">(GMT+06:00) Astana</option>
                                                                    <option value="Dhaka">(GMT+06:00) Dhaka</option>
                                                                    <option value="Urumqi">(GMT+06:00) Urumqi</option>
                                                                    <option value="Rangoon">(GMT+06:30) Rangoon</option>
                                                                    <option value="Bangkok">(GMT+07:00) Bangkok</option>
                                                                    <option value="Hanoi">(GMT+07:00) Hanoi</option>
                                                                    <option value="Jakarta">(GMT+07:00) Jakarta</option>
                                                                    <option value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                                    <option value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                                                                    <option value="Beijing">(GMT+08:00) Beijing</option>
                                                                    <option value="Chongqing">(GMT+08:00) Chongqing</option>
                                                                    <option value="Hong Kong">(GMT+08:00) Hong Kong</option>
                                                                    <option value="Irkutsk">(GMT+08:00) Irkutsk</option>
                                                                    <option value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                                                    <option value="Perth">(GMT+08:00) Perth</option>
                                                                    <option value="Singapore">(GMT+08:00) Singapore</option>
                                                                    <option value="Taipei">(GMT+08:00) Taipei</option>
                                                                    <option value="Ulaanbaatar">(GMT+08:00) Ulaanbaatar</option>
                                                                    <option value="Osaka">(GMT+09:00) Osaka</option>
                                                                    <option value="Sapporo">(GMT+09:00) Sapporo</option>
                                                                    <option value="Seoul">(GMT+09:00) Seoul</option>
                                                                    <option value="Tokyo">(GMT+09:00) Tokyo</option>
                                                                    <option value="Yakutsk">(GMT+09:00) Yakutsk</option>
                                                                    <option value="Adelaide">(GMT+09:30) Adelaide</option>
                                                                    <option value="Darwin">(GMT+09:30) Darwin</option>
                                                                    <option value="Brisbane">(GMT+10:00) Brisbane</option>
                                                                    <option value="Canberra">(GMT+10:00) Canberra</option>
                                                                    <option value="Guam">(GMT+10:00) Guam</option>
                                                                    <option value="Hobart">(GMT+10:00) Hobart</option>
                                                                    <option value="Melbourne">(GMT+10:00) Melbourne</option>
                                                                    <option value="Port Moresby">(GMT+10:00) Port Moresby</option>
                                                                    <option value="Sydney">(GMT+10:00) Sydney</option>
                                                                    <option value="Vladivostok">(GMT+10:00) Vladivostok</option>
                                                                    <option value="Magadan">(GMT+11:00) Magadan</option>
                                                                    <option value="New Caledonia">(GMT+11:00) New Caledonia</option>
                                                                    <option value="Solomon Is.">(GMT+11:00) Solomon Is.</option>
                                                                    <option value="Srednekolymsk">(GMT+11:00) Srednekolymsk</option>
                                                                    <option value="Auckland">(GMT+12:00) Auckland</option>
                                                                    <option value="Fiji">(GMT+12:00) Fiji</option>
                                                                    <option value="Kamchatka">(GMT+12:00) Kamchatka</option>
                                                                    <option value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                                                                    <option value="Wellington">(GMT+12:00) Wellington</option>
                                                                    <option value="Chatham Is.">(GMT+12:45) Chatham Is.</option>
                                                                    <option value="Nuku&#39;alofa">(GMT+13:00) Nuku&#39;alofa</option>
                                                                    <option value="Samoa">(GMT+13:00) Samoa</option>
                                                                    <option value="Tokelau Is.">(GMT+13:00) Tokelau Is.</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $('#user_time_zone').val('{!! @$user_time_zone; !!}');
                                                        </script>


                                                        <div class="form-group col-md-6" style="float: left;">
                                                            <div style="clear: both; height:15px;"></div>
                                                            <label for="user_locale" class="col-sm-4 control-label">User Locale</label>
                                                            <div class="">
                                                                <select name="user_locale" id="user_locale" required="" class='select2-me form-control' style="width:450px;">

                                                                    <option value="en">en</option>
                                                                    <option value="de">de</option>
                                                                    <option value="nl">nl</option>
                                                                    <option value="es">es</option>
                                                                    <option value="zh">zh</option>
                                                                    <option value="fr">fr</option>
                                                                    <option value="ro">ro</option>
                                                                    <option value="hu">hu</option>
                                                                    <option value="cs">cs</option>
                                                                    <option value="tr">tr</option>
                                                                    <option value="ja">ja</option>
                                                                    <option value="lo">lo</option>
                                                                    <option value="es-AR">es-AR</option>
                                                                    <option value="pt">pt</option>
                                                                    <option value="hr">hr</option>
                                                                    <option value="es-EC">es-EC</option>
                                                                    <option value="hi">hi</option>
                                                                    <option value="tl">tl</option>
                                                                    <option value="ug">ug</option>
                                                                    <option value="da">da</option>
                                                                    <option value="uz">uz</option>
                                                                    <option value="es-MX">es-MX</option>
                                                                    <option value="mk">mk</option>
                                                                    <option value="ca">ca</option>
                                                                    <option value="eo">eo</option>
                                                                    <option value="sr">sr</option>
                                                                    <option value="th">th</option>
                                                                    <option value="pa">pa</option>
                                                                    <option value="ne">ne</option>
                                                                    <option value="uk">uk</option>
                                                                    <option value="af">af</option>
                                                                    <option value="es-PE">es-PE</option>
                                                                    <option value="es-CO">es-CO</option>
                                                                    <option value="de-CH">de-CH</option>
                                                                    <option value="it">it</option>
                                                                    <option value="sw">sw</option>
                                                                    <option value="is">is</option>
                                                                    <option value="zh-CN">zh-CN</option>
                                                                    <option value="es-419">es-419</option>
                                                                    <option value="gl">gl</option>
                                                                    <option value="et">et</option>
                                                                    <option value="fr-CA">fr-CA</option>
                                                                    <option value="pl">pl</option>
                                                                    <option value="de-AT">de-AT</option>
                                                                    <option value="es-CR">es-CR</option>
                                                                    <option value="sv">sv</option>
                                                                    <option value="or">or</option>
                                                                    <option value="fr-CH">fr-CH</option>
                                                                    <option value="eu">eu</option>
                                                                    <option value="tt">tt</option>
                                                                    <option value="mr-IN">mr-IN</option>
                                                                    <option value="lt">lt</option>
                                                                    <option value="en-CA">en-CA</option>
                                                                    <option value="sk">sk</option>
                                                                    <option value="rm">rm</option>
                                                                    <option value="lb">lb</option>
                                                                    <option value="en-GB">en-GB</option>
                                                                    <option value="en-AU">en-AU</option>
                                                                    <option value="nn">nn</option>
                                                                    <option value="fa">fa</option>
                                                                    <option value="ar">ar</option>
                                                                    <option value="es-VE">es-VE</option>
                                                                    <option value="pt-BR">pt-BR</option>
                                                                    <option value="ur">ur</option>
                                                                    <option value="it-CH">it-CH</option>
                                                                    <option value="be">be</option>
                                                                    <option value="en-IN">en-IN</option>
                                                                    <option value="ms">ms</option>
                                                                    <option value="bg">bg</option>
                                                                    <option value="nb">nb</option>
                                                                    <option value="ko">ko</option>
                                                                    <option value="bn">bn</option>
                                                                    <option value="es-US">es-US</option>
                                                                    <option value="ru">ru</option>
                                                                    <option value="en-ZA">en-ZA</option>
                                                                    <option value="hi-IN">hi-IN</option>
                                                                    <option value="bs">bs</option>
                                                                    <option value="fi">fi</option>
                                                                    <option value="kn">kn</option>
                                                                    <option value="vi">vi</option>
                                                                    <option value="en-NZ">en-NZ</option>
                                                                    <option value="sl">sl</option>
                                                                    <option value="zh-TW">zh-TW</option>
                                                                    <option value="id">id</option>
                                                                    <option value="zh-YUE">zh-YUE</option>
                                                                    <option value="en-IE">en-IE</option>
                                                                    <option value="es-PA">es-PA</option>
                                                                    <option value="cy">cy</option>
                                                                    <option value="km">km</option>
                                                                    <option value="el">el</option>
                                                                    <option value="wo">wo</option>
                                                                    <option value="es-CL">es-CL</option>
                                                                    <option value="mn">mn</option>
                                                                    <option value="lv">lv</option>
                                                                    <option value="he">he</option>
                                                                    <option value="en-US">en-US</option>
                                                                    <option value="ta">ta</option>
                                                                    <option value="az">az</option>
                                                                    <option value="zh-HK">zh-HK</option>
                                                                    <option value="pt-PT">pt-PT</option>
                                                                    <option value="sv-SE">sv-SE</option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $('#user_locale').val('{!! @$user_locale !!}');
                                                        </script>

                                                        <div class="form-actions text-right" style="padding: 0 0 20px;">
                                                            <input type="submit" class='btn btn-primary' value="Save">
                                                            <input type="reset" class='btn' value="Discard changes">
                                                        </div>
                                                    </form>
                                                </div>



                                                <div class="tab-pane fade in @if(isset($urisegment) && $urisegment == 'wordpressapikey') active @endif" id="wordpressapikey-tab">
                                                    <form id="auth-form" method="POST" action="{{url("/admin/update-wordpressapikey")}}" class="form-horizontal form-validate" novalidate="novalidate">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <div style="clear: both; height:15px;"></div>
                                                            <label for="unique_code" class="col-sm-3 control-label">WordPress API key</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" id="wordpress_api_key" name="wordpress_api_key" class='form-control' placeholder="Please enter wordpress API key" data-rule-minlength="20" data-rule-required="true" aria-required="true" value="{!!@$user_wordpress_api_key!!}"/>
                                                            </div>

                                                        </div>
                                                        <div class="form-actions text-right" style="padding: 0 0 20px;">
                                                            <input type="submit" class='btn btn-primary' value="Save">
                                                            <input type="reset" class='btn' value="Discard changes">
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>   
                                    </div> 

                                    
                                    <div class="tab-pane @if($urisegment == 'profile') active show @endif" id="profile">
                                        <h2 class="email-setting-head">Profile Settings</h2>
                                        <form id="profile-form" method="POST" action="{{url('/admin/update-profile')}}" class="form-horizontal form-validate profile_form" novalidate="novalidate" enctype="multipart/form-data">
                                            <input type="hidden" name="return_url" value="{{url('/admin/account-details?ref=profile')}}"/>
                                            {{ csrf_field() }}
                                            <div class="offset-sm-4 col-sm-4">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail">
                                                        <?php if ($user['profile_image']) { ?> 
                                                            <img style="width:  200px !important;max-width:  200px !important;" class="image-display" src="{{ checkImage('users/'.$user['profile_image']) }}" />
                                                        <?php } else { ?>
                                                            <img style="width:  200px !important;max-width:  200px !important;" class="image-display" src="https://forum.vietnam-expat.com/styles/BBOOTS/theme/images/no_avatar.gif" />
                                                        <?php } ?>
                                                    </div>
                                                    <div>
                                                        <input accept="image/*" class="image-input" type="file" name='profile_image'/>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="clear20"></div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="first_name" class="control-label">First Name</label>
                                                            </div>    
                                                            <div class="col-sm-9">
                                                                <input type="text" id="first_name" name="first_name" class='form-control' placeholder="Enter First Name" data-rule-required="true" aria-required="true" value="{!!@$user['first_name']!!}"/>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="last_name" class="control-label">Last Name</label>
                                                            </div>    
                                                            <div class="col-sm-9">
                                                                <input type="text" id="last_name" name="last_name" class='form-control' placeholder="Enter First Name" data-rule-required="true" aria-required="true" value="{!!@$user['last_name']!!}">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="email" class="control-label">Email</label>
                                                            </div>    
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly class='form-control' value="{!!@$user['email']!!}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="phone" class="control-label">Phone</label>
                                                            </div>    
                                                            <div class="col-sm-9">
                                                                <input type="text" id="phone" name="phone" class='form-control' placeholder="Enter Phone" data-rule-required="true" data-rule-minlength="10" aria-required="true" value="{!!@$user['phone']!!}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="address" class="control-label">Address</label>
                                                            </div>    
                                                            <div class="col-sm-9">
                                                                <input type="text" id="address" name="address" class='form-control' placeholder="Enter Address" data-rule-required="true" data-rule-minlength="5" aria-required="true" value="{!!@$user['address']!!}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="zipcode" class="control-label">Zip</label>
                                                            </div>    
                                                            <div class="col-sm-9">
                                                                <input type="text" id="address" name="zipcode" class='form-control' placeholder="Enter Zip" data-rule-required="true" data-rule-minlength="5" aria-required="true" value="{!!@$user['zipcode']!!}"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="country" class="control-label">Country</label>
                                                            </div>    
                                                            <div class="col-sm-9">
                                                                <select name="country" id="country" class='select2-me'>
                                                                    @foreach($countries as $country)
                                                                    <option @if($country->ccode == $user['country']) selected @endif value="{!!$country->ccode!!}">{!!$country->country!!}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="city" class="control-label">City</label>
                                                            </div>    
                                                            <div class="col-sm-9">
                                                                <input type="text" id="city" name="city" class='form-control' placeholder="Enter City" data-rule-required="true" aria-required="true" value="{!!@$user['city']!!}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions text-right" style="padding: 0 0 20px;">
                                                        <input type="submit" class='btn btn-primary' value="Save">
                                                        <input type="reset" class='btn' value="Discard changes">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    
                                    <div class="tab-pane @if($urisegment == 'password') active show @endif" id="password">
                                        <h2 class="email-setting-head">Password Settings</h2>
                                        <form id="password-form" method="POST" action="{{url('/admin/update-password')}}" class="form-horizontal form-validate profile_form" novalidate="novalidate">
                                            <input type="hidden" name="return_url" value="{{url('/admin/account-details?ref=password')}}"/>
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="current_password" class="control-label">Current Password</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="password" id="current_password" name="current_password" class='form-control' placeholder="Enter current password" data-rule-minlength="6" data-rule-required="true" aria-required="true" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="new_password" class="control-label">New Password</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="password" id="new_password" name="new_password" class='form-control' placeholder="Enter new password" data-rule-required="true" data-rule-minlength="6" aria-required="true" value=""/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="confirm_password" class="control-label">Confirm Password</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="password" id="confirm_password" name="confirm_password" class='form-control' placeholder="Retype new password" data-rule-equalto="#new_password" data-rule-minlength="6" data-rule-required="true" aria-required="true" value=""/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions text-right" style="padding: 0 0 20px;">
                                                <input type="submit" class='btn btn-primary' value="Save">
                                                <input type="reset" class='btn' value="Discard changes">
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="tab-pane @if($urisegment == 'socialmedialinks') active show @endif" id="socialmedialinks">
                                        <h2 class="email-setting-head">Social Media Settings</h2>
                                        <p>Your social media icons on your website will link to the account url's entered in the fields below</p>
                                        <form id="socialmedia" method="POST" action="{{url('/admin/update-profile')}}" class="form-horizontal form-validate profile_form" novalidate="novalidate">
                                            <input type="hidden" name="return_url" value="{{url('/admin/account-details?ref=socialmedialinks')}}"/>
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="facebook" class="control-label">Facebook</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" data-rule-url=�?true�? name="facebook" class='form-control' value="{!!@$user['facebook']!!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="twitter" class="control-label">Twitter</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" data-rule-url=�?true�? name="twitter" class='form-control' value="{!!@$user['twitter']!!}">    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="linkedin" class="control-label">Linkedin</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" data-rule-url=�?true�? name="linkedin" class='form-control' value="{!!@$user['linkedin']!!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="googleplus" class="control-label">Google Plus</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" data-rule-url=�?true�? name="googleplus" class='form-control' value="{!!@$user['googleplus']!!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="youtube" class="control-label">You Tube</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="youtube" data-rule-url=�?true�? class='form-control' value="{!!@$user['youtube']!!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="pinterest" class="control-label">Pinterest</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="pinterest" data-rule-url=�?true�? class='form-control' value="{!!@$user['pinterest']!!}">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-actions text-right" style="padding: 0 0 20px;">
                                                <input type="submit" class='btn btn-primary' value="Save">
                                                <input type="reset" class='btn' value="Discard changes">
                                            </div>
                                        </form>   

                                    </div>
                                    
                                    <div class="tab-pane @if($urisegment == 'fbmessengersetup') active show @endif" id="fbmessengersetup">
                                        <h2 class="email-setting-head">Facebook Messenger Setup</h2>
                                        <form id="fbmessenger" method="POST" action="{{url('/admin/update-profile')}}" class="form-horizontal form-validate profile_form" novalidate="novalidate">
                                            <input type="hidden" name="return_url" value="{{url('/admin/account-details?ref=fbmessengersetup')}}"/>
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label class="control-label">Facebook page ID</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" data-rule-url="true" name="facebook_page_id" class='form-control' value="{!!@$user['facebook_page_id']!!}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-info">Please provide the facebook page id to enable facebook messaging on your website. This will automatically link your facebook page to any Facebook Messenger button you place on your website in the drag and drop builder.</div>

                                            <div class="form-actions text-right" style="padding: 0 0 20px;">
                                                <input type="submit" class='btn btn-primary' value="Save">
                                                <input type="reset" class='btn' value="Discard changes">
                                            </div>
                                        </form> 

                                    </div>
                                    
                                    <div class="tab-pane" id="mypackages">


                                        @if(!is_object($dial_package) && !is_object($crm_package) && !is_object($flow_package) && !is_object($sms_package))
                                        <h2 align="center">You have not subscribe any package yet.</h2>
                                        @endif
                                        <div class="row">
                                            @if(is_object($dial_package))

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="pricing-div">
                                                    <h2>Panda Dial Package</h2>
                                                    <h2 class="price">@if($dial_package->price > 0) £ {!!$dial_package->price!!} @else {{'Free'}}  @endif</h2>
                                                    <p>Per Month/Per User</p>
                                                    <b>{!!$dial_package->segment_title!!}</b>
                                                    <ul>
                                                        @if($dial_package->instant_deployment_24h == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Instant Deployment-24/7 Support</li> @endif
                                                        @if($dial_package->auto_attend == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Auto Attend<br></li>@endif
                                                        @if($dial_package->call_queues == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Call Queues<br></li>@endif
                                                        @if($dial_package->call_recording == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Call Recording<br></li>@endif
                                                        @if($dial_package->fully_integrated_with_control_panda == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Fully Integrated with Control Panda<br></li>@endif
                                                        @if($dial_package->virtual_business_number == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Virtual Business number<br></li>@endif

                                                        @if($dial_package->pay_as_you_go_features == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;All pay as you go features +</li> @endif

                                                        @if($dial_package->per_user_for_one_country == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;2000 Minute free outbound call package per user for one country<br></li> @endif

                                                        @if($dial_package->per_user_to_listed_countries == 1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;2000 Minute free outbound call package per user to all listed countries plus mobile phone numbers in these countries.<br></li> @endif

                                                        @if($dial_package->geographical_number == 1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;Inclusive geographical number for each user<br></li> @endif

                                                    </ul>
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0);" class="">Renew Date: {{date('d-M-Y', strtotime($dial_package->renew_date))}}</a>
                                                        <a href="{{url('/admin/payment-history/panda-dials')}}" class="Renew-btn">Transactions History</a>
                                                    </div>
                                                </div>
                                            </div>

                                            @endif 


                                            @if(is_object($flow_package))

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="pricing-div">
                                                    <h2>Panda Flow Package</h2>
                                                    <h2 class="price">@if($flow_package->price > 0) £ {!!$flow_package->price!!} @else {{'Free'}}  @endif</h2>
                                                    <p>Per Month</p>
                                                    <!--<b>{!!$flow_package->page_views_per_m!!} page views p/m</b>-->
                                                    @if($flow_package->page_views_per_m >= 1) <b>{!!$flow_package->page_views_per_m!!} page views p/m</b> @elseif ($flow_package->page_views_per_m == -1) <b>Unlimited page views p/m</b>  @endif

                                                    <ul>
                                                        @if($flow_package->snap_shots >= 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$flow_package->snap_shots!!} Snap shots</li> @elseif ($flow_package->snap_shots == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited Snap shots</li> @endif
                                                        @if($flow_package->screen_recordings >= 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$flow_package->screen_recordings!!} Screen recordings<br></li> @elseif ($flow_package->screen_recordings == -1)  <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited Screen recordings<br></li> @endif

                                                        @if($flow_package->months_of_recording ==1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$flow_package->months_of_recording!!} Month of recording storage data<br></li> @elseif($flow_package->months_of_recording >1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$flow_package->months_of_recording!!} Months of recording storage data<br></li> @endif

                                                        @if($flow_package->split_tests == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited split tests <br></li>@elseif($flow_package->split_tests >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp; {!!$flow_package->split_tests!!} split tests <br></li>  @endif
                                                        @if($flow_package->panda_sites == -1)<li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited panda sites <br></li> @elseif($flow_package->panda_sites >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp; {!!$flow_package->panda_sites!!} panda sites <br></li> @endif
                                                    </ul>
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0);" class="">Renew Date: {{date('d-M-Y', strtotime($flow_package->renew_date))}}</a>
                                                        <a href="{{url('/admin/payment-history/panda-flows')}}" class="Renew-btn">Transactions History</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if(is_object($sms_package))
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="pricing-div">
                                                        <h2>Panda Sms Package</h2>
                                                        <h2 class="price">@if($sms_package->price > 0) £ {!!$sms_package->price!!} @else {{'Free'}}  @endif</h2>
                                                        <p>Per Month</p>
                                                        @if($sms_package->messages_per_m >= 1)<b>{!!$sms_package->messages_per_m!!} SMS messages p/m</b> @elseif ($sms_package->messages_per_m == -1)<b> Unlimited SMS messages p/m</b>@endif
                                                        <ul>
                                                            @if($sms_package->messages_per_m >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$sms_package->messages_per_m!!} SMS messages</li> @elseif ($sms_package->messages_per_m == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited SMS messages</li> @endif
                                                            @if($sms_package->custom_link_integration == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Custom link integration<br></li> @endif
                                                            @if($sms_package->custom_sms_reporting == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Custom SMS reporting<br></li>@endif
                                                            @if($sms_package->individual_business_number == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Individual business number<br></li>@endif
                                                            @if($sms_package->panda_sites == -1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited panda sites<br></li> @elseif($sms_package->panda_sites >= 1)   <li><i class="fa fa-fw fa-check"></i>&nbsp;  {!!$sms_package->panda_sites!!} panda sites<br></li> @endif
                                                        </ul>
                                                        <div class="btn-group">
                                                            <a href="javascript:void(0);" class="">Renew Date: {{date('d-M-Y', strtotime($sms_package->renew_date))}}</a>
                                                            <a href="{{url('/admin/payment-history/panda-sms')}}" class="Renew-btn">Transactions History</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif 


                                            @if(is_object($crm_package))

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="pricing-div">
                                                    <h2>Panda Crm Package</h2>
                                                    <h2 class="price">@if($crm_package->price > 0) £ {!!$crm_package->price!!} @else {{'Free'}}  @endif</h2>
                                                    <p>Per Month</p>
                                                    <b>{!!$crm_package->segment_title!!}</b>
                                                    <ul>
                                                        @if($crm_package->instant_deployment_24h == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Instant Deployment-24/7 Support</li> @endif
                                                        @if($crm_package->auto_attend == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Auto Attend<br></li>@endif
                                                        @if($crm_package->call_queues == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Call Queues<br></li>@endif
                                                        @if($crm_package->call_recording == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Call Recording<br></li>@endif
                                                        @if($crm_package->fully_integrated_with_control_panda == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Fully Integrated with Control Panda<br></li>@endif
                                                        @if($crm_package->virtual_business_number == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Virtual Business number<br></li>@endif

                                                        @if($crm_package->pay_as_you_go_features == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;All pay as you go features +</li> @endif

                                                        @if($crm_package->per_user_for_one_country == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;2000 Minute free outbound call package per user for one country<br></li> @endif

                                                        @if($crm_package->per_user_to_listed_countries == 1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;2000 Minute free outbound call package per user to all listed countries plus mobile phone numbers in these countries.<br></li> @endif

                                                        @if($crm_package->geographical_number == 1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;Inclusive geographical number for each user<br></li> @endif


                                                    </ul>
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0);" class="">Renew Date: {{date('d-M-Y', strtotime($crm_package->renew_date))}}</a>
                                                        <a href="{{url('/admin/payment-history/panda-crms')}}" class="Renew-btn">Transactions History</a>
                                                    </div>
                                                </div>
                                            </div>

                                            @endif    
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <script type="text/javascript" src="{{asset('frontend/js/jquery.smartWizard.min.js')}}"></script>
                <script>
                $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
                </script>

                <script type="text/javascript">
                    $(document).ready(function () {

                        $("#submit").click(function () {

                            if (!$('.action').is(":checked"))
                            {
                                alert('Please choose action to confirm');
                                return false;
                            }

                            if (!confirm('Are you sure to perform this action ?'))
                                return false;

                        });



<?php if (isset($_GET['page'])) { ?>
                            $('li a#history').click();
<?php } ?>

                        // Step show event 
                        $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
                            $('.sw-toolbar #cancel_account').addClass('disabled');

                            //alert("You are on step "+stepNumber+" now");
                            if (stepPosition === 'first') {
                                $("#prev-btn").addClass('disabled');
                            } else if (stepPosition === 'final') {
                                $("#next-btn").addClass('disabled');
                                $('.sw-toolbar #cancel_account').removeClass('disabled');
                            } else {
                                $("#prev-btn").removeClass('disabled');
                                $("#next-btn").removeClass('disabled');
                            }
                        });

                        // Toolbar extra buttons
                        var btnFinish = $('<a id="cancel_account" data-toggle="modal" data-target="#cancel_account_popup"></a>').text('Finish')
                                .addClass('btn btn-info ')
                                .on('click', function () {




                                });
                        var btnCancel = $('<button></button>').text('Cancel')
                                .addClass('btn btn-danger')
                                .on('click', function () {
                                    $('#smartwizard').smartWizard("reset");
                                });


                        // Smart Wizard
                        $('#smartwizard').smartWizard({
                            selected: 0,
                            theme: 'default',
                            transitionEffect: 'fade',
                            showStepURLhash: false,
                            toolbarSettings: {toolbarPosition: 'both',
                                toolbarExtraButtons: [btnFinish, btnCancel]
                            }
                        });


                        // External Button Events
                        $("#reset-btn").on("click", function () {
                            // Reset wizard
                            $('#smartwizard').smartWizard("reset");
                            return true;
                        });

                        $("#prev-btn").on("click", function () {
                            // Navigate previous
                            $('#smartwizard').smartWizard("prev");
                            return true;
                        });

                        $("#next-btn").on("click", function () {
                            // Navigate next
                            $('#smartwizard').smartWizard("next");
                            return true;
                        });

                        $("#theme_selector").on("change", function () {
                            // Change theme
                            $('#smartwizard').smartWizard("theme", $(this).val());
                            return true;
                        });

                        // Set selected theme on page refresh
                        $("#theme_selector").change();
                    });
                </script>  




            </div>

        </div>

    </section>
</div>

                                        
<script>
$(document).ready(function(){
    var string = '&ref=invoice';
    var final;
    var above;
    $('.upperpagination ul.pagination li a').each(function(index){
        final = $(this).attr('href');
        above = $(this).attr('href',final+string);
    });
});
</script>

<script>
    $(document).ready(function(){
        var str = $("#cc_number").val(); 
        str = str.replace(/\d(?=\d{4})/g, "*");
        $("#cc_number").val(str);
    });
</script>


<script type="text/javascript">
$(document).ready(function () {
    $('.remove_btn').click(function () {

        $("#image-upload").val('');

    });

});
</script>
     
<script type="text/javascript">
    $(document).ready(function () {

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose Logo", // Default: Choose File
            label_selected: "Change Logo", // Default: Change File
            no_label: false                 // Default: false
        });



    });
</script>

@endsection