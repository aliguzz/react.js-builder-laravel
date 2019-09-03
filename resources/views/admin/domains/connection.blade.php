@extends('admin.layouts.app')

@section('content')

@include('admin.domains.subheader')  

@php 
    $urisegment = @$_GET['ref'];
@endphp

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="{{ asset('css/plugins/datepicker/datepicker.css')}}" rel="stylesheet">
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.css') }}">
<script src="{{ asset('plugins/select2/select2.min.js')}}"></script>
<style>
    .my_d_box{
        background-color: #7ab428;
        padding: 20px;
        color: #fff;
        border-radius: 8px;
    }
    .my_d_box input[type="search"]{
        padding:10px 15px 10px 50px;
        font-size:25px;
        color:#1f5350;
        /*removing boder from search box*/
        border:none;
        
        -webkit-background-size:25px 25px;
        -moz-background-size:25px 25px;
        -o-background-size:25px 25px;
        background-position: 8px 8px;
        height: 40px;
    }
    .my_d_box a {
        display: block;
        text-decoration: none;
        color: #1f5350;
        font-size: 18px;
        background-color: #f0f0f0;
        padding: 2px 8px;
    }
    .my_d_box ul{
        list-style:none;
        padding:0;
        width:100%;
    }
    .my_d_box ul li{
        margin-bottom:5px;
    }
    .my_d_box ul li a:hover{
        color: #fff;
        background: #000;
    }
    .my_d_box ul li:hover{
        -webkit-transform:translateX(20px);
        -moz-transform:translateX(20px);
        -ms-transform:translateX(20px);
        -o-transform:translateX(20px);
        transform:translateX(20px);
    }
    .my_d_box input[type="search"]:focus + .suggestions li{
        height:63px;
    }
    .suggestions span {
        float: right;
        font-size: 15px;
        border: 1px solid;
        padding: 1px 8px;
    }
    .price-panel {
        color: #000;
        text-align: center;
    }
    .sw-toolbar-top{
        display:none;
    }
    .price-panel .header{
        font-size: 50px !important;
    }
</style>

<div class="container-fluid">
    <section class="inner-full-width-panel pr-30">



        <div class="tab-content">
<div style="display:none;" id="loaderdiv">
                                                                                                                                                <img src="{{asset('frontend/images/loader.svg')}}" id="loadersvgimage" class="center" style="display: inline-block !important;margin-top: 0%;margin-left: 42%;position: absolute;z-index: 99999;">
                                                                                                                                            </div>
            <div id="menu4" class="tab-pane">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="Inner_Content">
                            <h2 class="ui header pull-left">Manage Digital Assets</h2>
                            <a class="cf-add-new-button" data-toggle="tooltip" title="New Asset" href="{{url('/admin/assets/create')}}">
                                <i class="fa fa-plus"></i>
                            </a>


                            <div class="clear20"></div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>Sent From</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($digitalassets as $da)
                                        <tr>
                                            <td>{!!$da->name!!}<br><a title="Edit" href="{{url('/admin/assets/'.$da->id.'/edit')}}">{!!$da->file!!}</a></td>
                                            <td>{!!$da->from_name!!}<br>{!!$da->from_email!!}</td>
                                            <td><a title="Copy path" href="{!!url('uploads/digital_assets/'.$da->file)!!}" class="copytoclipboard"><i class="fa fa-link fa-fw"></i></a><a href="{!!url('uploads/digital_assets/'.$da->file)!!}" class="downloadtomachine" title="Download" target="_blank"><i class="fa fa-download fa-fw"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         


            <div id="menu9" class="tab-pane">
                <div class="right-content right-content-space fixed-width">
                    <div class="header-title">
                        <h3 class="warning left-part">Contacts</h3>
                        <div class="right-part">
                            <span>Export Contacts</span>
                            <a href="#" id="export_leads" style="cursor:pointer;" class="icon-green" title="Export Contacts CSV">
                                <img src="{{asset('frontend/images/print.svg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="editor-dashboard-container">
                        <div class="dashboard-Contact-box">
                            <div class="table-responsive">

                            </div>
                        </div>
                    </div>
                    <nav class="pull-right">{!! $digitalassets->render() !!}</nav>
                </div>
            </div>
            <div id="menu1" class="tab-pane @if($urisegment == 'domains' || $urisegment == '') active @endif">
                <div class="right-content-space fix-width">
                    <div class="editor-domain-container-heading')}}">
                        <h3 class="Duplicate">Domains</h3>
                    </div>
                    


                    <div class="editor-domain-container">
                        <div class="domain-box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Renew Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($domains as $domain) 
                                        <tr>
                                            <td>{!!$domain->name!!}</td>
                                            <td>{!!display_date($domain->renew_date)!!}</td>
                                            <td>@if($domain->status == 1) <label class="label label-success">Verified</label> @else <label class="label label-danger">Unverified</label> @endif</td>
                                            <td>
    <!--                                            <a href="{{ url('/admin/domains/'.$domain->id.'/edit')}}"><i class="fa fa-edit fa-fw" style="font-size:30px"></i></a>-->
                                                @if($domain->ssl_enabled == 0 && $domain->price > 0 && $domain->payment_gateway <> '' )
                                                <span title="Purchase SSL" class="buy_btn1" data-toggle="modal" data-target="#buy_modal{{ $domain->id }}"><img style="width: 30px;height: 30px;margin-top: -15px; cursor: pointer; " src="{!!asset('frontend/images/ssl-img.png')!!}"/></span>


<!--                                            <a id="purchase_ssl" title="Purchase SSL" href="{{ url('/admin/domains/'.$domain->id.'/ssl-purchase')}}"><img style="width: 30px;height: 30px;margin-top: -15px;" src="{!!asset('frontend/images/ssl-img.png')!!}"/></a>-->
                                                @elseif($domain->price <= 0 && $domain->payment_gateway == '' )
                                                <span title="ssl can not be enabled"></span>
                                                @else
                                                <img style="width: 30px;height: 30px;margin-top: -15px;" src="{!!asset('frontend/images/ssl-on-img.ico')!!}"/>
                                                @endif

                                                <!--  modal code for SSL certificate payment  -->

                                                <div id="buy_modal{{ $domain->id }}" class="modal fade buy" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <div class="popup-top-buy">Buy SSL</div>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>


                                                            <div class="modal-body">
                                                                <ul class="tabs tabs-inline tabs-top">
                                                                    <li class="active">
                                                                        <a href="https://knowledge.symantec.com/support/ssl-certificates-support/index?page=content&actp=CROSSLINK&id=INFO198" target="_blank">CSR Instructions here</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://csrgenerator.com/" target="_blank">Generate Online CSR here</a>
                                                                    </li>

                                                                </ul>
                                                                <div class="clear20"></div>
                                                                <div class="tab-content modal_tb_content">

                                                                    <div class="tab-pane active" id="strip{{ $domain->id }}">

                                                                        <div class="clear20"></div>
                                                                                                                                            

                                                                        <form id="stripe-form" name="stripe-form" class="form-horizontal form-validate" action="{{ url('/admin/domains/ssl-purchase')}}" method="POST">

                                                                            {{ csrf_field() }}


                                                                            <input type="hidden" name="domain_id" value="{{ $domain->id }}">
                                                                            <input type="hidden" name="domain_name" value="{{ $domain->name }}">

                                                                            <div class="form-group clearfix">
                                                                                <label for="csr_code" class="col-sm-4 control-label">Paste CSR Code</label>
                                                                                <div class="offset-2 col-sm-8">
                                                                                    <textarea id="csr_code" rows="10" name="csr_code" required class='form-control' placeholder="-----BEGIN CERTIFICATE REQUEST-----                                    -----END CERTIFICATE REQUEST-----"></textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-actions text-center">
                                                                                <button type="submit" class='btn btn-primary paystripe'>Purchase</button>

                                                                                <input type="reset" class='btn' value="Reset">
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <!--  modal code for SSL certificate payment  -->


                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                            
                    <div class="domainpagination">
                        <nav class="pull-right">{!! $domains->render() !!}</nav>
                    </div>
                </div>   


            </div>
            
            
            
                                        <script>
                                        $(document).ready(function(){
                                            var string = '&ref=domains';
                                            var final;
                                            var above;
                                            $('.domainpagination ul.pagination li a').each(function(index){
                                                final = $(this).attr('href');
                                                above = $(this).attr('href',final+string);
                                            });
                                            
                                        });
                                        </script>
            
            

            <div id="menu5" class="tab-pane">

                <div class="right-content-space">



                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <div class="editor-domain-container-heading')}}">
                                <h3 class="Duplicate">Domains</h3>
                            </div>
                            <div class="Inner_Content">
                                <p class="helpinfotextarea">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    <strong>Important Note:</strong>
                                    SMTP settings are required to send mails if you didn't setup emails will not send.
                                <div class="form_wrap">
                                    <form id="smtp-form" class="form-horizontal form-validate" action="{{url('/admin/smtp')}}" method="POST" novalidate="novalidate">
                                        {{ csrf_field() }}

                                        <div class="form-group clearfix">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="email" class="control-label">From Name</label>
                                                    <input class="form-control" name="from_name" placeholder="Send From Name" id="" type="text" aria-required="true" data-rule-required="true" value="{!!@$smtp->from_name!!}">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="phone" class=" control-label"> From Email</label>
                                                    <input class="form-control" name="from_email" placeholder="Send From Email Address" value="{!!@$smtp->from_email!!}" type="email" aria-required="true" data-rule-required="true" data-rule-email="true">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8 text-right">
                                                <button type="submit" class="btn btn-default">Create Smtp integration</button>
                                            </div>
                                        </div>
                                        <div class="clear20"></div>
                                    </form>
                                </div>
                                </p>
                            </div>
                        </div> 
                    </div>                                      


                </div>   


            </div>                                            

            <div id="menu10" class="tab-pane">
                <div class="right-content-space fix-width">

                    <div id="buy_modal" class="modal fade buy" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="popup-top-buy">Buy Domain</div>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#strip" data-toggle="tab"><button>Stripe</button></a>
                                        </li>
                                        <li class="">
                                            <a href="#paypal" data-toggle="tab"><button>PayPal</button></a>
                                        </li>
                                    </ul>
                                    <div class="clear20"></div>
                                    <div class="tab-content modal_tb_content">
                                        <div class="tab-pane active" id="strip">
                                            <div class="credits_img text-center">
                                                <img width="150" src="{{asset('frontend/images/cclogo.png')}}" alt="">
                                            </div>
                                            <div class="clear20"></div>
                                            

                                            <form id="stripe-form" name="stripe-form" class="form-horizontal form-validate offset-3" action="{{url('/admin/domains/buy')}}" method="POST">

                                                {{ csrf_field() }}

                                                <input type="hidden" name="amount" class="paymentprice" value="">
                                                <input type="hidden" name="domain" class="paymentdomain" value="">

                                                <div id="stripformerrorcontainer" style="display: none;" class="alert-form alert-box">
                                                    <ul id="stripformerrors"></ul>
                                                </div>


                                                <div class="form-group clearfix">
                                                    <label for="name_on_card" class="col-sm-4 control-label">Name on Card</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="cc_name" name="cc_name" required class='form-control' placeholder="" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="cc_number" class="col-sm-4 control-label">Credit Card No</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="cc_number" name="cc_number" minlength="16" maxlength="16" required class='form-control' placeholder="" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-sm-4 control-label" for="number">Credit Card Expiration month/year</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <select class="form-control" id="cc_exp_month" name="cc_exp_month" class="text-field" required>
                                                                    <option value="">Month</option>
                                                                    @for($i = 1; $i <= 12; $i++)

                                                                    <option  value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                                                                    @endfor 
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select class="form-control" id="cc_exp_year" name="cc_exp_year" class="text-field" required>
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
                                                        <input type="number" class="form-control" id="cc_cvv" minlength="3" maxlength="3" name="cc_cvv" min="1" max="9999" required />
                                                        <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                                    </div>
                                                </div>

                                                <div class="form-actions text-center">
                                                    <span class='btn btn-primary paystripe'>Purchase</span>
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


                                            <form id="stripe-form" name="stripe-form" class="form-horizontal form-validate offset-3" action="{{url('admin/domains/paywithpaypal')}}" method="POST">

                                                {{ csrf_field() }}
                                                

                                                <input type="hidden" name="amount" class="paymentprice" value="">
                                                <input type="hidden" name="domain" class="paymentdomain" value="">                           

                                                <div class="form-actions text-center">
                                                    <input type="submit" class='btn btn-primary' value="Checkout">
                                                    <input type="reset" class='btn' value="Discard changes">
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>




                    <!--                                <div class="editor-domain-container-heading')}}">
                                                        <h3 class="Duplicate">Buy Domain</h3>
                                                    </div>-->


                    <form id="new_domain-form" class="form-horizontal form-validate" action="{{url('/admin/domains/buy')}}" method="POST" novalidate="novalidate">
                        <div class="form_wrap my_d_box">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-12" for="new_domain_name">Search available domains</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input type="search" class="form-control" name="new_domain_name" id="new_domain_name" placeholder="Search Domains" />
                                    <span class="input-group-btn">
                                        <button class="new_domain_name" style="height: 52px;border-radius: unset;margin: 9px 0 0 0;width: 75px;" type="button">Find</button>
                                    </span>
                                    </div>
                                    <ul class="suggestions"></ul>
                                    <div class="price-panel"></div>
                                </div>
                            </div>

                            <input type="hidden" id="selected_domain" name="selected_domain">
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-sm-offset-4 col-sm-12 text-center">

                                        <!--                                    <button id="buy_btn" disabled="disabled" type="submit" class="btn btn-default header-btn">Buy</button>-->
                                        
                                        <!-- Modal -->

                                    </div>






                                </div>    
                            </div>
                        </div>    
                    </form>
                    <center>
                        <span id="buy_btn1" data-toggle="modal" data-price="" data-domain="" style="margin:10px; display:none;"  data-target="#buy_modal" class="btn btn-default hide">Buy</span>
                    </center>

                    <form class="form-horizontal">
                        <div class="form_wrap">
                            <div class="form-group" style="margin-top: 15px;"><label class="col-sm-12">Or</label></div>
                        </div>
                    </form>
                    <form id="old_domain-form" class="form-horizontal form-validate" action="{{url('/admin/domains')}}" method="POST" novalidate="novalidate">
                        <div class="form_wrap my_d_box">
                            <div class="form-group">
                                <label class="col-sm-12" for="old_domain_name">Add your own domain</br><small>Enter the domain name you already own below and we'll take care of the rest.</small></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" id="old_domain_name" placeholder="Enter Domain Name" data-rule-required="true" aria-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="old_domain_name">IP Address</br><small>You can add this IP Address in your A records.</small></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="ip" id="old_domain_name" placeholder="" disabled="disabled" value="34.217.146.254" data-rule-required="true" aria-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="project_id">Project</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="project_id" id="project_id" data-rule-required="true" aria-required="true">
                                        @foreach($Projects as $project)
                                        <option value="{!!$project->id!!}">{!!$project->template!!} | {!!$project->ind_name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-12" for="renew_date">Renew Date</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control datepick" name="renew_date" id="renew_date" placeholder="Renew Date"/>
                                </div>
                            </div>
                            {{ csrf_field() }}

                            <div class="form-actions">
                                <div class="">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default header-btn">Add Domain</button>
                                    </div>
                                </div>    
                            </div>
                        </div>    
                    </form>        


                </div>
            </div>     
    </section>
</div>

                                        
                                       
        
        
<script>



    $(".new_domain_name").click(function () {
        
        $("#buy_btn1").hide();
        
        var form_data = $("#new_domain-form").serializeArray();
        
        if ($("#new_domain_name").val() != '') {
            $('#loaderdiv').show();
            $('.suggestions').html('');
            $.ajax({
                url: site_url + "/admin/domains/get-domains",
                type: 'post',
                data: form_data,
                success: function (data) {
                    
                    $('#loaderdiv').hide();
                    if (data !== '0' ) {
                        $("#buy_btn1").show();
                        var html = '';
                        var domains = $.parseJSON(data);
                        $.each(domains, function (index, value) {
                            var class_ = '';
                            if (value.dt_assoc.item[1] == 'available') {
                                class_ = 'check-domain';
                            }
                            html += '<li><a class="' + class_ + '" data-val="' + value.dt_assoc.item[0] + '" href="javascript:void(0);">' + value.dt_assoc.item[0] + '<span>' + value.dt_assoc.item[1] + '</span></a></li>';
                        });
                        $('.suggestions').show();
                        $('.suggestions').html(html);
                    }else{
                    $('.suggestions').html('<li style="color:red;">Sorry! No result found</li>');
                    $('#loaderdiv').hide();
                    }
                }
            });
        }else{
            swal({
                title: "Please enter a domain name first",
                type: "error"
            });
        }
    });



    $(document).on("click", "#buy_btn1", function (e) {
    if (e.keyCode === 13) { 
    e.preventDefault();
    return false;
  }
        var domainprice = $(this).data('price');
        var domainname = $(this).data('domain');
        $(".modal-body .paymentprice").val(domainprice);
        $(".modal-body .paymentdomain").val(domainname);

    });


$(document).ready(function(){
   $(document).keypress(
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }
});
});
    $(document).on('click', '.paystripe', function (e) {
       
        var domain_price = $('.paymentprice').val();
        var domain_name = $('.paymentdomain').val();
        var cc_name = $('#cc_name').val();
        var cc_number = $('#cc_number').val();
        var cc_exp_month = $('#cc_exp_month').val();
        var cc_exp_year = $('#cc_exp_year').val();
        var cc_cvv = $('#cc_cvv').val();
        if (cc_name != "" && cc_number != "" && cc_exp_month != "" && cc_exp_year != "" && cc_cvv != "") {
            $('#loaderdiv').show();
            $('#stripe-form').css("display", "none");
            $.ajax({
                url: site_url + "/admin/domains/buy",
                type: 'post',
                data: {'domain_price': domain_price, 'cc_name': cc_name, 'cc_number': cc_number, 'cc_exp_month': cc_exp_month, 'cc_exp_year': cc_exp_year, 'cc_cvv': cc_cvv, 'domain_name': domain_name, '_token': CSRF_TOKEN},
                success: function (datas) {
                    if (datas != '') {
                        $('#loaderdiv').hide();
                        $('#stripe-form').css("display", "block");
                        $("#stripformerrorcontainer").show();
                        $("#stripformerrors").show();
                        $("#stripformerrors").empty();
                        $("#stripformerrors").html(datas);
                        var locations = site_url + "/admin/domains";
                        window.setTimeout(function () {
                            window.location.href = locations;
                        }, 4000);

                    }
                }
            });
        } else {
//            swal({
//                title: "Please Fill all values",
//                type: "error"
//            });
        }
    });


    $(document).on('click', '.clickpaypal', function () {

        var domain_price = $('.paymentprice').val();
        var domain_name = $('.paymentdomain').val();
        var paypal_email = $('#paypal_email').val();
        if (paypal_email != "") {
            $('#loaderdiv').show();
            $('#paypal-form').css("display", "none");
            $.ajax({
                url: site_url + "/admin/domains/paywithpaypal",
                type: 'post',
                data: {'domain_price': domain_price, 'paypal_email': paypal_email, 'domain_name': domain_name, '_token': CSRF_TOKEN},
                success: function (datas) {
                    if (datas != '') {
                        $('#loaderdiv').hide();
                        $('#paypal-form').css("display", "block");
                        $(".stripformerrorcontainer").show();
                        $(".stripformerrors1").show();
                        $(".stripformerrors1").empty();
                        $(".stripformerrors1").html(datas);
                        //var locations = site_url + "/admin/domains";
                        window.setTimeout(function () {
                            window.location.href = datas;
                        }, 0);

                    }
                }
            });
        } else {
//            swal({
//                title: "Please Fill all values",
//                type: "error"
//            });
        }
    });

    $(document).on('click', '.check-domain', function () {
        $("#buy_btn1").hide();
        $('.suggestions').show();
        var domain_name = $(this).attr('data-val');
        $.ajax({
            url: site_url + "/admin/domains/get-domain-price",
            type: 'post',
            data: {'domain_name': domain_name, '_token': CSRF_TOKEN},
            success: function (datas) {
                if (datas != '') {
                    $("#buy_btn1").show();
                    $('.suggestions').hide();
                    $('.price-panel').show();

                    var html = '<div class="ui card"><div class="content"><div class="header">$' + datas + '</div><div>' + domain_name + '</div></div>';
                    $('.price-panel').html(html);
                    $("#selected_domain").val(domain_name);
                    $('#buy_btn1').data('price', datas);
                    $('#buy_btn1').data('domain', domain_name);


                }
            }
        });
    });

    $('#project_id').change(function () {
        var project_id = $(this).val();
        $.ajax({
            url: site_url + "/admin/domains/get-pages",
            type: 'post',
            data: {'project_id': project_id, '_token': CSRF_TOKEN},
            success: function (data) {
                if (data != '') {
                    $('#root_page').html(data);
                    $('#error_page').html(data);
                }
            }
        });
    });
//$('#project_id').change();
</script>

@endsection