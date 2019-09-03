@extends('admin.layouts.app')
@section('content')
@php
$segment3 = Request::segment(4);

@endphp
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<link href="{{asset('frontend/css/integration.css')}}" rel="stylesheet" media="screen">
<style type="text/css">
.copyright { padding:0}
.panda-flow-pricing .pricing-div ul {min-height: 150px;}
</style>
<div class="clear20"></div>
<section class="contentarea">
    <div class="container-fluid">
        
        <div class="col-sm-12">
        <div class="gap"></div>
                <div class="gap"></div>
          <form id="package-form" class="form-horizontal" action="{{url('/admin/make-package-payment')}}" method="POST" onsubmit="return check();" novalidate="novalidate">
          {{ csrf_field() }}
          <input type="hidden" name="package_id" value="{{$package->id}}" />
          <input type="hidden" name="package_type" value="{{$segment3}}" />
           <div class="col-sm-6 col-sm-offset-4">
            
          
            
            @if($segment3 == 'panda-flows')
               <div id="pandaflowpricing" class="panda-flow-pricing text-center col-md-3">
                 <div class="container">
            
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-div">
                    <h2><b>{{ucwords(str_replace('-', ' ', $segment3))}} Price</b></h2>
                        <h3>@if($package->price > 0) £ {!!$package->price!!} @else {{'Free'}}  @endif Per Month</h3>
                        
                          @if($package->page_views_per_m >= 1) <b>{!!$package->page_views_per_m!!} page views p/m</b> @elseif ($package->page_views_per_m == -1) <b>Unlimited page views p/m</b>  @endif
                        
                        <ul>
                            @if($package->snap_shots >= 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->snap_shots!!} Snap shots</li> @elseif ($package->snap_shots == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited Snap shots</li> @endif
                            
                            
                            @if($package->screen_recordings >= 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->screen_recordings!!} Screen recordings<br></li> @elseif ($package->screen_recordings == -1)  <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited Screen recordings<br></li> @endif
                            
                            
                            @if($package->months_of_recording ==1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->months_of_recording!!} Month of recording storage data<br></li> @elseif($package->months_of_recording >1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->months_of_recording!!} Months of recording storage data<br></li> @endif
                            
                             @if($package->split_tests == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited split tests <br></li>@elseif($package->split_tests >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp; {!!$package->split_tests!!} split tests <br></li>  @endif
                            
                            
                            @if($package->panda_sites == -1)<li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited panda sites <br></li> @elseif($package->panda_sites >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp; {!!$package->panda_sites!!} panda sites <br></li> @endif
                        </ul>
                          
                        
                    </div>
                </div>

               
               </div>
       	    </div>
            @elseif($segment3 == 'panda-sms')
               <section id="pandaflowpricing" class="panda-flow-pricing text-center">
                    <div class="container">
                        
                        <div class="col-md-4 col-sm-4 col-xs-12">
                        
                            <div class="pricing-div">
                            <h2><b>{{ucwords(str_replace('-', ' ', $segment3))}} Price</b></h2>
                                <h3>@if($package->price > 0) £ {!!$package->price!!} @else {{'Free'}}  @endif Per Month</h3>
                                @if($package->messages_per_m >= 1)<b>{!!$package->messages_per_m!!} SMS messages p/m</b> @elseif ($package->messages_per_m == -1)<b> Unlimited SMS messages p/m</b>@endif
                                <ul>
                             @if($package->messages_per_m >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->messages_per_m!!} SMS messages</li> @elseif ($package->messages_per_m == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited SMS messages</li> @endif
                                    
                @if($package->custom_link_integration == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Custom link integration<br></li> @endif
                @if($package->custom_sms_reporting == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Custom SMS reporting<br></li>@endif
                 @if($package->individual_business_number == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Individual business number<br></li>@endif
                                  
                                   @if($package->panda_sites == -1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited panda sites<br></li> @elseif($package->panda_sites >= 1)   <li><i class="fa fa-fw fa-check"></i>&nbsp;  {!!$package->panda_sites!!} panda sites<br></li> @endif
                                </ul>
                                
                            </div>
                        </div>
                        
                    </div>
                </section>            
            @elseif($segment3 == 'panda-crms')
               
               <section id="pandaflowpricing" class="panda-flow-pricing text-center">
                    <div class="container">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="pricing-div">
                                    <h2>{{ucwords(str_replace('-', ' ', $segment3))}} Price</h2>
                                        <h3>@if($package->price > 0) £ {!!$package->price!!} @else {{'Free'}}  @endif Per Month</h3>
                                        <b>{!!$package->segment_title!!}</b>
                                        <ul>
                 @if($package->instant_deployment_24h == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Instant Deployment-24/7 Support</li> @endif
                 @if($package->auto_attend == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Auto Attend<br></li>@endif
                  @if($package->call_queues == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Call Queues<br></li>@endif
                   @if($package->call_recording == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Call Recording<br></li>@endif
                   @if($package->fully_integrated_with_control_panda == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Fully Integrated with Control Panda<br></li>@endif
                   @if($package->virtual_business_number == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Virtual Business number<br></li>@endif
                   
                  @if($package->pay_as_you_go_features == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;All pay as you go features +</li> @endif
                          
                           @if($package->per_user_for_one_country == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;2000 Minute free outbound call package per user for one country<br></li> @endif
                           
                          @if($package->per_user_to_listed_countries == 1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;2000 Minute free outbound call package per user to all listed countries plus mobile phone numbers in these countries.<br></li> @endif
                            
                         @if($package->geographical_number == 1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;Inclusive geographical number for each user<br></li> @endif
                                       
                                       
                                        </ul>
                                        
                                    </div>
                                </div>
                              
                            </div>
                </section>
               
            @elseif($segment3 == 'panda-dials')
               
               <section id="pandaflowpricing" class="panda-flow-pricing text-center">
                    <div class="container">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="pricing-div">
                                <h2><b>{{ucwords(str_replace('-', ' ', $segment3))}} Price</b></h2>
                                <h3>@if($package->price > 0) £ {!!$package->price!!} @else {{'Free'}}  @endif Per Month/Per User</h3>
                                <b>{!!$package->segment_title!!}</b>
                                <ul>
                @if($package->instant_deployment_24h == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Instant Deployment-24/7 Support</li> @endif
                @if($package->auto_attend == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Auto Attend<br></li>@endif
                @if($package->call_queues == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Call Queues<br></li>@endif
                @if($package->call_recording == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Call Recording<br></li>@endif
                @if($package->fully_integrated_with_control_panda == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Fully Integrated with Control Panda<br></li>@endif
                @if($package->virtual_business_number == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Virtual Business number<br></li>@endif
                
                @if($package->pay_as_you_go_features == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;All pay as you go features +</li> @endif
                  
                   @if($package->per_user_for_one_country == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;2000 Minute free outbound call package per user for one country<br></li> @endif
                   
                  @if($package->per_user_to_listed_countries == 1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;2000 Minute free outbound call package per user to all listed countries plus mobile phone numbers in these countries.<br></li> @endif
                    
                 @if($package->geographical_number == 1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;Inclusive geographical number for each user<br></li> @endif
                               
                               
                                </ul>
                                
                            </div>
                        </div>
                       
                    </div>
                </section>
            @endif
                        
              
        <div class="clear10"></div>

          <p class="helpinfotextarea">
                <i class="fa fa-exclamation-triangle"></i>
                <strong>Important Note:</strong>
                Payment will be deduct from your default payment gateway.
              </p>
        
        
        
            
            </div>
            
            
            
            
            
                        
            <!--<div class="col-sm-6 col-sm-offset-4">
           <div class="form-group">
                <label class="col-sm-4 control-label" for="payment_type">Payment Method:</label>
                <div class="col-sm-8">
                    <input type="radio" name="payment_type" id="Stripe" class=" required" checked="checked"  value="Stripe"  > <label for="Stripe">Stripe &nbsp;&nbsp;</label>
                    
                    
                </div>
            </div>
            
            </div>-->
            
            
            
         <div class="col-sm-6 col-sm-offset-4">
          <div class="form-actions">
                <div class="row">
                    <div class=" col-sm-8 text-right">
                        <a href="{{URL::previous()}}" class="btn btn-default">Cancel</a>
                        <button type="submit" id="submit" class="btn btn-success">Confirm Payment</button>
                    </div>
                </div>    
            </div>
                        
           </div>
            
         </form> 
           
        </div>
        
        

    </div>
    
   
    
</section>

<style type="text/css">
.error { color:red;}
</style>



<script type="text/javascript">
$(function() {
	
   $('#package-form').validate();
   
   
   $('.price').text('$'+$('.package:checked').attr("price")+' Per Month');

   $('.package').click(function(){
   
         $('.price').text('$'+$(this).attr('price')+' Per Month');
   });
   
   	
    
});

function check()
{
	if(!confirm('Are you sure, you want to purchase this package ?'))
		 	return false;
	else
			return true;
}
</script>

@endsection
