@extends('admin.layouts.app')
@section('content')

<style>
html{ overflow-y:auto !important;}
body{ background-color: #fff; }
</style>
<section style="background-color:#fff;margin-top: 40px;">
      <div id="trusted" style="background-color: #fff;">
        <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="trusted-box">
                  <div><img src="{{asset('assets/images/icon-15.png')}}"></div>
                  <h5>SSL SECURE PAYMENT<br><span>Your information is protected by 256-bit SSL encryption</span></h5>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="trusted-box">
                  <div><img src="{{asset('assets/images/icon-16.png')}}"></div>
                  <h5>14 Day Money Back Guarantee<br><span>On ALL Plans</span></h5>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="trusted-box p-m-1">
                  <h5>We accept all of the following credit cards<br><br></h5>
                  <div><img src="{{asset('assets/images/cradit.png')}}"></div>
                </div>
             </div>
          </div>
         </div>
        </div>
      </section>
    <section id="unlimited">
      <div class="container">
        <h3>Select your Unlimited Plan Subscription & Payment Method</h3>
        <form method="post" action="{{url('admin/upgrade-account/checkout')}}" name="subscriptionform">
        
            {{ csrf_field() }}
        <div class="clearfix"></div>
            <ul class="row">
                @if(have_premission(array(106)))
                <li class="col-md-6">
                    <strong><input type="radio" name="payment_method" value="stripe" data-toggle="tooltip" data-placement="left" title="STRIPE payment" required="">
                    <img src="{{asset('assets/images/cradit.png')}}" height="50" width="300" class="img-responsive"  alt=""></strong>
                </li>
                @endif
                @if(have_premission(array(107)))
                <li class="col-md-6">
                    <strong><input type="radio" name="payment_method" value="paypal" data-toggle="tooltip" data-placement="left" title="PAYPAL payment" required="">
                    <img src="{{asset('assets/images/paypal.png')}}" height="50" width="150" class="img-responsive" alt=""></strong>
                </li>
                @endif
            </ul>
        
        <div class="clearfix"></div>
        
        
        <input type="hidden" name="payment_time" value="" id="paymenttenure">
        <input type="hidden" name="package_id" value="{{$package_id}}">
        <ul>
            <li><strong><input type="radio" name="packagetotal" data-toggle="tooltip" data-placement="left" value="{{($packagedata->two_year_price ) * 24}}" required="" title="SAVE 40% TODAY" class="selectpackagebtn" data-tenure="24"> 2 Years Subscription: US$ {{$packagedata->two_year_price}} x 24 months</strong></li>
          <li><i class="fas fa-check"></i> Free Domain for 1 Year</li>
          <li><i class="fas fa-check"></i>24/7 Support</li><br><br>
          <li><strong><input type="radio" name="packagetotal" data-toggle="tooltip" value="{{($packagedata->one_year_price ) * 12}}" data-placement="left" required="" title="SAVE 30% TODAY" class="selectpackagebtn" data-tenure="12">Yearly Subscription: US$ {{$packagedata->one_year_price}} x 12 months</strong></li>
          <li><i class="fas fa-check"></i> Free Domain for 1 Year</li>
          <li><i class="fas fa-check"></i>24/7 Support</li><br><br>
          <li><strong><input type="radio" name="packagetotal" data-toggle="tooltip" data-placement="left" value="{{($packagedata->price) * 1}}" required="" title="" class="selectpackagebtn" data-tenure="1"> Yearly Subscription: US$ {{$packagedata->price}} month to month</strong></li>
          <li><i class="fas fa-check"></i> Free Domain for 1 Year</li>
          <li><i class="fas fa-check"></i>24/7 Support</li>
          <div class="btn-group float-right">
            <a href="{{url('admin/upgrade-account')}}"><button type="button" style="margin-right: 10px;" class="btn btn-primary">Back</button></a>
            <button type="submit" class="btn btn-info">Select</button>
          </div>
        </ul>
            </form>
      </div>
    </section>



<script src="{{ asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/script.js')}}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/slick.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scrollbar.js')}}" type="text/javascript"></script>



	<script type="text/javascript">
		$(document).ready(function(){
                    
                    
                    $(document).on('click',".selectpackagebtn",function(){
                       tenure =  $(this).attr('data-tenure'); 
                       $("#paymenttenure").val(tenure);
                    });
                    
                    
                    
                    
			$('.customer-logos').slick({
				slidesToShow: 8,
				slidesToScroll: 1,
				autoplay: false,
				autoplaySpeed: 1000,
				arrows: false,			
				dots: false,
					pauseOnHover: false,
					responsive: [{
					breakpoint: 768,
					settings: {
						slidesToShow: 4
					}
				}, {
					breakpoint: 520,
					settings: {
						slidesToShow: 3
					}
				}]
			});
		});
	</script>

 <script type="text/javascript" src="{{ asset('assets/js/jquery.youtubeplaylist.js')}}"></script>
  <script type="text/javascript">
    
        $(function() {
            $("ul.demo1").ytplaylist();
            $("ul.demo2").ytplaylist({addThumbs:true, autoPlay: false, holderId: 'ytvideo2'});
        });
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script type="text/javascript">
    $(function () {

        $('body').addClass('dashboard-container');

    });
</script>

@endsection