@extends('admin.layouts.app')
@section('content')
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/validation/additional-methods.min.js')}}"></script>
<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>Payment Gateways</a>
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
                        <span class="Headerlf_name">Payment Gateways</span>
                    </div>
                </div>
            </div>
            <div class="row">
                 @include('admin.account_nav')
                <div class="col-md-8">
                    <div class="Inner_Content">
                        <div class="form_wrap">
                            <div class="clear20"></div>
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
                            <div class="tab-content">
                                <div class="tab-pane active" id="strip">
                                    <div class="credits_img text-center">
                                        <img width="150" src="{{asset('frontend/images/cclogo.png')}}" alt="">
                                    </div>
                                    <div class="clear20"></div>
                                    <form id="stripe-form" class="form-validate" action="{{url('/admin/payment-gateways')}}" method="POST" novalidate="novalidate">
                                        <input type="hidden" name="gateway" value="stripe">
                                        {{ csrf_field() }}
                                        <div class="form-group clearfix">
                                            <label class="col-sm-4 control-label" for="number">Credit Card Type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="creditcard_type" name="creditcard_type" required>
                                                    <option value="" disabled="" selected="" hidden="">Select</option>
                                                    <option @if(@$stripe->creditcard_type == 'Visa') selected @endif value="Visa">Visa</option>
                                                    <option @if(@$stripe->creditcard_type == 'MasterCard') selected @endif value="MasterCard">MasterCard</option>
                                                    <option @if(@$stripe->creditcard_type == 'Discover') selected @endif value="Discover">Discover</option>
                                                    <option @if(@$stripe->creditcard_type == 'Amex') selected @endif value="Amex">AMEX</option>
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="creditcard_holder" class="col-sm-4 control-label">Name on Card Holder</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="creditcard_holder" name="creditcard_holder" class='form-control' placeholder="" value="{!!@$stripe->creditcard_holder!!}"/>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="creditcard_no" class="col-sm-4 control-label">Credit Card No</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="creditcard_no" name="creditcard_no" class='form-control' placeholder="" value="{!!@$stripe->creditcard_no!!}"/>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label class="col-sm-4 control-label" for="number">Credit Card Expiration month/year</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <select class="form-control month" id="creditcard_expiry_month" name="creditcard_expiry_month"  required>
                                                            <option value="" >Month</option>
                                                            <?php
                                                            for ($i = 1; $i <= 12; $i++):
                                                                $selp = '';
                                                            if ($i == @$stripe->creditcard_expiry_month) {
                                                                $selp = 'selected';
                                                            }
															
															
                                                            ?>
                                                            <option <?php echo $selp; ?> value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control year" id="creditcard_expiry_year" name="creditcard_expiry_year"  required>
                                                            <option value="" >Year</option>
                                                            <?php
                                                            for ($i = date('Y'); $i <= date('Y') + 50; $i++):
                                                                $sel = '';
                                                            if (@$stripe->creditcard_expiry_year == $i) {
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
                                                <input type="number" class="form-control" name="creditcard_cvv" min="1" max="9999" value="{!!@$stripe->creditcard_cvv!!}"/>
                                                <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                            </div>
                                        </div>

                                        <div class="form-actions text-right col-md-12">
                                            <input type="submit" class='btn btn-primary' value="Save">
                                            <input type="reset" class='btn' value="Discard changes">
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="paypal">
                                    <div class="credits_img text-center">
                                        <img width="130" src="{{asset('frontend/images/paypallogo.png')}}" alt="">
                                    </div>
                                    <div class="clear20"></div>
                                    <form id="stripe-form" class="form-validate" action="{{url('/admin/payment-gateways')}}" method="POST" novalidate="novalidate">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="gateway" value="paypal">                
                                        <div class="form-group clearfix">
                                            <label for="" class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" id="paypal_email" name="paypal_email" class='form-control' value="{!!@$paypal->paypal_email!!}"/>
                                            </div>
                                        </div>
                                        <div class="form-actions text-right col-md-12">
                                            <input type="submit" class='btn btn-primary' value="Save">
                                            <input type="reset" class='btn' value="Discard changes">
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="apple_pay">
                                    <div class="credits_img text-center">
                                        <img width="130" src="{{asset('frontend/images/applepaylogo.png')}}" alt="">
                                    </div>
                                    <div class="clear20"></div>
                                    <form id="stripe-form" class="form-validate" action="{{url('/admin/payment-gateways')}}" method="POST" novalidate="novalidate">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="gateway" value="applepay">
                                        <div class="form-group clearfix">
                                            <label class="col-sm-4 control-label" for="number">Credit Card Type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="creditcard_type" name="creditcard_type" required>
                                                    <option value="" disabled="" selected="" hidden="">Select</option>
                                                    <option @if(@$applepay->creditcard_type == 'Visa') selected @endif value="Visa">Visa</option>
                                                    <option @if(@$applepay->creditcard_type == 'MasterCard') selected @endif value="MasterCard">MasterCard</option>
                                                    <option @if(@$applepay->creditcard_type == 'Discover') selected @endif value="Discover">Discover</option>
                                                    <option @if(@$applepay->creditcard_type == 'Amex') selected @endif value="Amex">AMEX</option>
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="creditcard_holder" class="col-sm-4 control-label">Name on Card Holder</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="creditcard_holder" name="creditcard_holder" class='form-control' placeholder="" value="{!!@$applepay->creditcard_holder!!}"/>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="creditcard_no" class="col-sm-4 control-label">Credit Card No</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="creditcard_no" name="creditcard_no" class='form-control' placeholder="" value="{!!@$applepay->creditcard_no!!}"/>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label class="col-sm-4 control-label" for="number">Credit Card Expiration month/year</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <select class="form-control month" id="creditcard_expiry_month" name="creditcard_expiry_month"  required>
                                                            <option value="" >Month</option>
                                                            <?php
                                                            for ($i = 1; $i <= 12; $i++):
                                                                $selp = '';
                                                            if ($i == @$applepay->creditcard_expiry_month) {
                                                                $selp = 'selected';
                                                            }
                                                            ?>
                                                            <option <?php echo $selp; ?> value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control year" id="creditcard_expiry_year" name="creditcard_expiry_year"  required>
                                                            <option value="" >Year</option>
                                                            <?php
                                                            for ($i = date('Y'); $i <= date('Y') + 50; $i++):
                                                                $sel = '';
                                                            if (@$applepay->creditcard_expiry_year == $i) {
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
                                                <input type="number" class="form-control" name="creditcard_cvv" min="1" max="9999" value="{!!@$applepay->creditcard_cvv!!}"/>
                                                <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                            </div>
                                        </div>

                                        <div class="form-actions text-right col-md-12">
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
                                    <form id="stripe-form" class="form-validate" action="{{url('/admin/payment-gateways')}}" method="POST" novalidate="novalidate">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="gateway" value="gplay">
                                        <div class="form-group clearfix">
                                            <label class="col-sm-4 control-label" for="number">Credit Card Type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="creditcard_type" name="creditcard_type" required>
                                                    <option value="" disabled="" selected="" hidden="">Select</option>
                                                    <option @if(@$gplay->creditcard_type == 'Visa') selected @endif value="Visa">Visa</option>
                                                    <option @if(@$gplay->creditcard_type == 'MasterCard') selected @endif value="MasterCard">MasterCard</option>
                                                    <option @if(@$gplay->creditcard_type == 'Discover') selected @endif value="Discover">Discover</option>
                                                    <option @if(@$gplay->creditcard_type == 'Amex') selected @endif value="Amex">AMEX</option>
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="creditcard_holder" class="col-sm-4 control-label">Name on Card Holder</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="creditcard_holder" name="creditcard_holder" class='form-control' placeholder="" value="{!!@$gplay->creditcard_holder!!}"/>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="creditcard_no" class="col-sm-4 control-label">Credit Card No</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="creditcard_no" name="creditcard_no" class='form-control' placeholder="" value="{!!@$gplay->creditcard_no!!}"/>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label class="col-sm-4 control-label" for="number">Credit Card Expiration month/year</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <select class="form-control month" id="creditcard_expiry_month" name="creditcard_expiry_month"  required>
                                                            <option value="" >Month</option>
                                                            <?php
                                                            for ($i = 1; $i <= 12; $i++):
                                                                $selp = '';
                                                            if ($i == @$gplay->creditcard_expiry_month) {
                                                                $selp = 'selected';
                                                            }
                                                            ?>
                                                            <option <?php echo $selp; ?> value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control year" id="creditcard_expiry_year" name="creditcard_expiry_year"  required>
                                                            <option value="" >Year</option>
                                                            <?php
                                                            for ($i = date('Y'); $i <= date('Y') + 50; $i++):
                                                                $sel = '';
                                                            if (@$gplay->creditcard_expiry_year == $i) {
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
                                                <input type="number" class="form-control" name="creditcard_cvv" min="1" max="9999" value="{!!@$gplay->creditcard_cvv!!}"/>
                                                <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                            </div>
                                        </div>

                                        <div class="form-actions text-right col-md-12">
                                            <input type="submit" class='btn btn-primary' value="Save">
                                            <input type="reset" class='btn' value="Discard changes">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear20"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
  $(function(){
	 
	 $(document).on("change", "select.year", function(){
	
	     if(this.value == new Date().getFullYear())
		 {
			$(this).parent().prev().find('select.month').val('<?php echo date('m') ?>');
			
			for(var i=<?php echo (date('m') -1) ?>; i>0; i-- )
			$(this).parent().prev().find('select.month option:nth('+i+')').prop('disabled', true);
			
		 }
		 else
		 {
			$(this).parent().prev().find('select.month option').prop('disabled', false);
		 }
		 	
	   
	 });
  
  });
</script>
@endsection