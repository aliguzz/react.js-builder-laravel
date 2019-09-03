@extends('admin.layouts.app')

@section('content')
<!-- Validation -->
<link href="{{ asset('css/plugins/datepicker\datepicker.css')}}" rel="stylesheet">
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<style>
    .my_d_box{
        background-color: #5588B5;
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
        /*defining background image as a search symbol*/
        background-image:url(data:image/png;base64,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);
        background-repeat:no-repeat;
        /*background-size*/
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
    .price-panel .header{
        font-size: 50px !important;
    }
</style>
<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{url('/admin/domains')}}">Domains</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>{!!$action!!} Domain</a>
            </li>
        </ul>
        <div class="close-bread">
            <a href="#"><i class="icon-remove"></i></a>
        </div>
    </div>
</div>
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            <div class="left-navigation">
                <div class="menulinks-back">
                    <div class="mn_head_lf">
                        <i class="fa fa-cogs Headerlf_icon"></i>
                        <span class="Headerlf_name">Add new domain</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('admin.account_nav')
                <div class="col-md-8">
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
                                        <li class="">
                                            <a href="#apple_pay" data-toggle="tab">Apple Pay</a>
                                        </li>
                                        <li class="">
                                            <a href="#google_pay" data-toggle="tab">Google Pay</a>
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

                                            <form id="stripe-form" name="stripe-form" class="form-horizontal form-validate" action="{{url('/admin/domains/buy')}}" method="POST">

                                                {{ csrf_field() }}

                                                <input type="hidden" name="amount" class="paymentprice" value="">
                                                <input type="hidden" name="domain" class="paymentdomain" value="">
                                                <!--                                                        <div class="form-group clearfix">
                                                                                                            <label class="col-sm-4 control-label" for="number">Credit Card Type</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <select class="form-control" id="creditcard_type" name="creditcard_type" required>
                                                                                                                    <option value="">Select</option>
                                                                                                                    <option @if(@$payment->creditcard_type == 'Visa') selected @endif value="Visa">Visa</option>
                                                                                                                    <option @if(@$payment->creditcard_type == 'MasterCard') selected @endif value="MasterCard">MasterCard</option>
                                                                                                                    <option @if(@$payment->creditcard_type == 'Discover') selected @endif value="Discover">Discover</option>
                                                                                                                    <option @if(@$payment->creditcard_type == 'Amex') selected @endif value="Amex">AMEX</option>
                                                                                                                </select>    
                                                                                                            </div>
                                                                                                        </div>-->
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

                                                <div class="form-actions text-right">
                                                    <span class='btn btn-primary paystripe'>Save</span>
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


                                            <form id="stripe-form" name="stripe-form" class="form-horizontal form-validate" action="{{url('/admin/domains/paywithpaypal')}}" method="POST">

                                                {{ csrf_field() }}

                                                <input type="hidden" name="amount" class="paymentprice" value="">
                                                <input type="hidden" name="domain" class="paymentdomain" value="">                           

                                                <div class="form-actions text-right">
                                                    <input type="submit" class='btn btn-primary' value="Checkout">
                                                    <input type="reset" class='btn' value="Discard changes">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane" id="apple_pay">
                                            <div class="credits_img text-center">
                                                <img width="130" src="{{asset('frontend/images/applepaylogo.png')}}" alt="">
                                            </div>
                                            <div class="clear20"></div>
                                            <form class="">
                                                <div class="form-group clearfix">
                                                    <label class="col-sm-4 control-label" for="number">Credit Card Type</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="creditcard_type" name="creditcard_type" required>
                                                            <option value="">Select</option>
                                                            <option @if(@$payment->creditcard_type == 'Visa') selected @endif value="Visa">Visa</option>
                                                            <option @if(@$payment->creditcard_type == 'MasterCard') selected @endif value="MasterCard">MasterCard</option>
                                                            <option @if(@$payment->creditcard_type == 'Discover') selected @endif value="Discover">Discover</option>
                                                            <option @if(@$payment->creditcard_type == 'Amex') selected @endif value="Amex">AMEX</option>
                                                        </select>    
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="creditcard_no" class="col-sm-4 control-label">Name on Card</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="creditcard_no" name="creditcard_no" class='form-control' placeholder="" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="creditcard_no" class="col-sm-4 control-label">Credit Card No</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="creditcard_no" name="creditcard_no" class='form-control' placeholder="" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-sm-4 control-label" for="number">Credit Card Expiration month/year</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <select class="form-control" id="creditcard_expiry_month" name="creditcard_expiry_month" class="text-field" required>
                                                                    <option value="">Month</option>
                                                                    <?php
                                                                    for ($i = 1; $i <= 12; $i++):
                                                                        $selp = '';
                                                                        if ($i == @$payment->creditcard_expiry_month) {
                                                                            $selp = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option <?php echo $selp; ?> value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select class="form-control" id="creditcard_expiry_year" name="creditcard_expiry_year" class="text-field" required>
                                                                    <option value="">Year</option>
                                                                    <?php
                                                                    for ($i = date('Y'); $i <= date('Y') + 50; $i++):
                                                                        $sel = '';
                                                                        if (@$payment->creditcard_expiry_year == $i) {
                                                                            $sel = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option <?php echo $sel; ?> value="<?= $i; ?>"><?= $i; ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>    
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-sm-4 control-label" for="number">Credit Card CVV code</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control" min="1" max="9999"/>
                                                        <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                                    </div>
                                                </div>

                                                <div class="form-actions text-right">
                                                    <input type="submit" class='btn btn-primary' value="Save">
                                                    <input type="reset" class='btn' value="Discard changes">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane" id="google_pay">
                                            <div class="credits_img text-center">
                                                <img width="130" src="{{asset('frontend/images/gpaylogo.png')}}" alt="">
                                            </div>
                                            <div class="clear20"></div>
                                            <form class="">
                                                <div class="form-group clearfix">
                                                    <label class="col-sm-4 control-label" for="number">Credit Card Type</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="creditcard_type" name="creditcard_type" required>
                                                            <option value="">Select</option>
                                                            <option @if(@$payment->creditcard_type == 'Visa') selected @endif value="Visa">Visa</option>
                                                            <option @if(@$payment->creditcard_type == 'MasterCard') selected @endif value="MasterCard">MasterCard</option>
                                                            <option @if(@$payment->creditcard_type == 'Discover') selected @endif value="Discover">Discover</option>
                                                            <option @if(@$payment->creditcard_type == 'Amex') selected @endif value="Amex">AMEX</option>
                                                        </select>    
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="creditcard_no" class="col-sm-4 control-label">Name on Card</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="creditcard_no" name="creditcard_no" class='form-control' placeholder="" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="creditcard_no" class="col-sm-4 control-label">Credit Card No</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="creditcard_no" name="creditcard_no" class='form-control' placeholder="" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-sm-4 control-label" for="number">Credit Card Expiration month/year</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <select class="form-control" id="creditcard_expiry_month" name="creditcard_expiry_month" class="text-field" required>
                                                                    <option value="">Month</option>
                                                                    <?php
                                                                    for ($i = 1; $i <= 12; $i++):
                                                                        $selp = '';
                                                                        if ($i == @$payment->creditcard_expiry_month) {
                                                                            $selp = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option <?php echo $selp; ?> value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select class="form-control" id="creditcard_expiry_year" name="creditcard_expiry_year" class="text-field" required>
                                                                    <option value="">Year</option>
                                                                    <?php
                                                                    for ($i = date('Y'); $i <= date('Y') + 50; $i++):
                                                                        $sel = '';
                                                                        if (@$payment->creditcard_expiry_year == $i) {
                                                                            $sel = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option <?php echo $sel; ?> value="<?= $i; ?>"><?= $i; ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>    
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-sm-4 control-label" for="number">Credit Card CVV code</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control" min="1" max="9999"/>
                                                        <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                                    </div>
                                                </div>

                                                <div class="form-actions text-right">
                                                    <input type="submit" class='btn btn-primary' value="Save">
                                                    <input type="reset" class='btn' value="Discard changes">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="clear20"></div>
                    <form id="new_domain-form" class="form-horizontal form-validate" action="{{url('/admin/domains/buy')}}" method="POST" novalidate="novalidate">
                        <div class="form_wrap my_d_box">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-12" for="new_domain_name">Search available domains</label>
                                <div class="col-sm-12">
                                    <input type="search" class="form-control" name="new_domain_name" id="new_domain_name" placeholder="Search Domains" data-rule-required="true" aria-required="true" />
                                    <ul class="suggestions"></ul>
                                    <div class="price-panel"></div>
                                </div>
                            </div>

                            <input type="hidden" id="selected_domain" name="selected_domain">
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-sm-offset-4 col-sm-8 text-right">

                                        <!--                                    <button id="buy_btn" disabled="disabled" type="submit" class="btn btn-default header-btn">Buy</button>-->
                                        <span id="buy_btn1" data-toggle="modal" data-price="" data-domain=""  data-target="#buy_modal" class="btn btn-default header-btn hide">Buy</span>
                                        <!-- Modal -->

                                    </div>






                                </div>    
                            </div>
                        </div>    
                    </form>



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
                                <label class="col-sm-12" for="root_page">Root Page</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="root_page" id="root_page" data-rule-required="true" aria-required="true">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="error_page">Error Page</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="error_page" id="error_page" data-rule-required="true" aria-required="true">

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
                                <div class="row">
                                    <div class="col-sm-offset-4 col-sm-8 text-right">
                                        <button type="submit" class="btn btn-default header-btn">Add Domain</button>
                                    </div>
                                </div>    
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>



$("#new_domain_name").keyup(function () {
    var form_data = $("#new_domain-form").serializeArray();
    if ($("#new_domain_name") != '') {
        $.ajax({
            url: site_url + "/admin/domains/get-domains",
            type: 'post',
            data: form_data,
            success: function (data) {
                if (data != '') {
                    var html = '';
                    var domains = $.parseJSON(data);
                    $.each(domains, function (index, value) {
                        var class_ = '';
                        if (value.dt_assoc.item[1] == 'available') {
                            class_ = 'check-domain';
                        }
                        html += '<li><a class="' + class_ + '" data-val="' + value.dt_assoc.item[0] + '" href="javascript:void(0);">' + value.dt_assoc.item[0] + '<span>' + value.dt_assoc.item[1] + '</span></a></li>';
                    });

                    $('.suggestions').html(html);
                }
            }
        });
    }
});



$(document).on("click", "#buy_btn1", function () {
    var domainprice = $(this).data('price');
    var domainname = $(this).data('domain');
    $(".modal-body .paymentprice").val(domainprice);
    $(".modal-body .paymentdomain").val(domainname);

});



$(document).on('click', '.paystripe', function () {

    var domain_price = $('.paymentprice').val();
    var domain_name = $('.paymentdomain').val();
    var cc_name = $('#cc_name').val();
    var cc_number = $('#cc_number').val();
    var cc_exp_month = $('#cc_exp_month').val();
    var cc_exp_year = $('#cc_exp_year').val();
    var cc_cvv = $('#cc_cvv').val();
    if (cc_name != "" && cc_number != "" && cc_exp_month != "" && cc_exp_year != "" && cc_cvv != "") {
        $('#loaderdiv').removeClass("hide");
        $('#loaderdiv').addClass("show");
        $('#stripe-form').css("display", "none");
        $.ajax({
            url: site_url + "/admin/domains/buy",
            type: 'post',
            data: {'domain_price': domain_price, 'cc_name': cc_name, 'cc_number': cc_number, 'cc_exp_month': cc_exp_month, 'cc_exp_year': cc_exp_year, 'cc_cvv': cc_cvv, 'domain_name': domain_name, '_token': CSRF_TOKEN},
            success: function (datas) {
                if (datas != '') {
                    $('#loaderdiv').removeClass("show");
                    $('#loaderdiv').addClass("hide");
                    $('#stripe-form').css("display", "block");
                    $("#stripformerrorcontainer").show();
                    $("#stripformerrors").show();
                    $("#stripformerrors").empty();
                    $("#stripformerrors").html(datas);
                    var locations = site_url + "/admin/domains";
                    window.setTimeout(function () {
                       // window.location.href = locations;
                    }, 4000);

                }
            }
        });
    } else {
        swal({
            title: "Please Fill all values",
            type: "error"
        });
    }
});


$(document).on('click', '.clickpaypal', function () {

    var domain_price = $('.paymentprice').val();
    var domain_name = $('.paymentdomain').val();
    var paypal_email = $('#paypal_email').val();
    if (paypal_email != "") {
        $('#loaderdivpp').removeClass("hide");
        $('#loaderdivpp').addClass("show");
        $('#paypal-form').css("display", "none");
        $.ajax({
            url: site_url + "/admin/domains/paywithpaypal",
            type: 'post',
            data: {'domain_price': domain_price, 'paypal_email': paypal_email, 'domain_name': domain_name, '_token': CSRF_TOKEN},
            success: function (datas) {
                if (datas != '') {
                    $('#loaderdivpp').removeClass("show");
                    $('#loaderdivpp').addClass("hide");
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
        swal({
            title: "Please Fill all values",
            type: "error"
        });
    }
});

$(document).on('click', '.check-domain', function () {
    var domain_name = $(this).attr('data-val');
    $.ajax({
        url: site_url + "/admin/domains/get-domain-price",
        type: 'post',
        data: {'domain_name': domain_name, '_token': CSRF_TOKEN},
        success: function (datas) {
            if (datas != '') {
                $("#buy_btn1").removeClass('hide');
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
$('#project_id').change();
</script>

<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
Stripe.setPublishableKey('pk_test_WOreTgwlt8d6iKBlpmygGpiZ');
</script>

@endsection
