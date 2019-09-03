@extends('admin.layouts.app')
@section('content')
  <section>
    <div class="plan-bg ">
      <div class="container">
        <h2>Select a Plan To Suit Your Needs<br><span>Scroll from left to right on the plan outlines below to see all available plans </span></h2>
      </div>
    </div>
  </section>
  <section>
    <div id="price-table" class="pricing-tab-sty">
      <div class="container">
        <div class="col-md-4">
          <div class="pricing-plans">
            <div class="pricing-grids">
              <div class="pricing-grid1 pricing-gridprice">
                <div class="price-value">
                  <h2 style="margin:19px 0px;">Plan Name</h2>
                </div>
                <div class="price-bg">
                  <ul>
                    <li class="whyt"><a href="#">Monthly Plan</a> </li>
                    <li class="whyt"> <a href="#"> 1 Year Plan </a></li>
                    <li class="whyt"><a href="#"> 2 Year Plan</a></li>
                    <li class="whyt"><a href="#"> &nbsp;</a> </li>
                    <li class="whyt web-top"><a href="#">Websites</a></li>
                    <li class="whyt"><a href="#">Premium Templates</a></li>
                    <li class="whyt"><a href="#">CP Page Builder</a></li>
                    <li class="whyt"><a href="#"> 1 x Free Premium Domain</a></li>
                    <li class="whyt"><a href="#">SSL Certificate</a></li>
                    <li class="whyt"><a href="#">Connect Domain</a></li>
                    <li class="whyt"><a href="#">CP Forms</a> </li>
                    <li class="whyt"><a href="#"> CP Lead Database</a> </li>
                    <li class="whyt"><a href="#"> Removed Sponsored CP Ads</a></li>
                    <li class="whyt"><a href="#">Storage</a></li>
                    <li class="whyt"><a href="#">Band Width</a></li>
                    <li class="whyt"><a href="#">Customer Email Responses</a></li>
                    <li class="whyt"><a href="#"  >Customer SMS Responses</a></li>
                    <li class="whyt"><a href="#"> Site Analytics</a></li>
                    <li class="whyt"><a href="#">Custom Email Response Tempates</a></li>
                    <li class="whyt"><a href="#"> 24/7 Support</a></li>
                    <li class="whyt"><a href="#">100 FREE Screen Recordings Panda Flow</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="pricing_overrflow ">
          <div class="row" style=" margin-left: 0px;width: 65%;float: right;min-height: 1270px;">
            @foreach($packages as $key=>$pack)
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="pricing-plans">
                  <div class="pricing-grids">
                      <div class="pricing-grid1" style="min-height:1270px;">
                        <div class="price-value">
                          <h2 style="margin:19px 0px;"><a href="#"> {{$pack->title}}</a></h2>
                        </div>
                        <div class="price-bg">
                          <ul>
                            <li class="whyt">
                              <a href="#" @if($pack->price) class="" @else class="gray-color" @endif >
                                  ${!! number_format((float)$pack->price, 2, '.', '') !!} P/M
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->one_year_price) class="" @else class="gray-color" @endif >
                                  ${!! number_format((float)$pack->one_year_price, 2, '.', '') !!} P/M
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->two_year_price) class="" @else class="gray-color" @endif >
                                  ${!! number_format((float)$pack->two_year_price, 2, '.', '') !!} P/M
                              </a>
                            </li>
                            <div class="cart1">
                              @if(isset($package_id) && !empty($package_id))
                                @if($package_id->package_id < $pack->id)
                                  <a class="popup-with-zoom-anim" href="{{url('admin/upgrade-account/payment-method/'.$pack->id)}}"> Select </a>
                                @else
                                  <a class="popup-with-zoom-anim" style="cursor: no-drop !important" href="javascript:void(0)"> Select </a>
                                @endif
                              @else
                                <a class="popup-with-zoom-anim" href="{{url('admin/upgrade-account/payment-method/'.$pack->id)}}"> Select </a>
                              @endif
                          </div>
                            <li class="whyt">
                              <a href="#" @if($pack->no_of_sites) class="" @else class="gray-color" @endif >
                                
                                  {!! $pack->no_of_sites !!}
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->premium_templates) class="" @else class="gray-color" @endif >
                              @if ($pack->premium_templates)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->cp_page_builder) class="" @else class="gray-color" @endif >
                              @if ($pack->cp_page_builder)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->free_premium_domain) class="" @else class="gray-color" @endif >
                              @if ($pack->free_premium_domain)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->ssl_certificate) class="" @else class="gray-color" @endif >
                              @if ($pack->ssl_certificate)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->connect_domains) class="" @else class="gray-color" @endif >
                              @if ($pack->connect_domains)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                        
                            <li class="whyt">
                              <a href="#" @if($pack->cp_forms) class="" @else class="gray-color" @endif >
                              @if ($pack->cp_forms)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->cp_lead_db) class="" @else class="gray-color" @endif >
                              @if ($pack->cp_lead_db)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->remove_cp_ads) class="" @else class="gray-color" @endif >
                              @if ($pack->remove_cp_ads)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->storage) class="" @else class="gray-color" @endif >
                                
                                {!! $pack->storage !!}
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->bandwidth) class="" @else class="gray-color" @endif >
                               
                                {!! $pack->bandwidth !!}
                              </a>
                            </li>
                    
                            <li class="whyt">
                              <a href="#" @if($pack->leads_per_email) class="" @else class="gray-color" @endif >
                               
                                  {!! $pack->leads_per_email !!}
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->leads_per_sms) class="" @else class="gray-color" @endif >
                                
                                  {!! $pack->leads_per_sms !!}
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->site_analytics) class="" @else class="gray-color" @endif >
                              @if ($pack->site_analytics)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->custom_email_templates) class="" @else class="gray-color" @endif >
                              @if ($pack->custom_email_templates)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->support) class="" @else class="gray-color" @endif >
                              @if ($pack->support)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                            <li class="whyt">
                              <a href="#" @if($pack->screen_recording_pf) class="" @else class="gray-color" @endif>
                              @if ($pack->screen_recording_pf)
                                    <span><img src="{{asset('frontend/images/ok.png')}}" alt=""></span>
                                @else 
                                    <span><img src="{{asset('frontend/images/close.png')}}" alt=""></span>
                                @endif
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
            </div>
        </div>
         
      </div>
    </div>
  </section>
  <section>
    <div id="Include">
      <div class="container">
        <h3>All Premium Plans Include</h3>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 offset-xs-10">
            <div class="iner-box"><div><a href="javascript:void(0)"><img src="{{asset('assets/images/icon-9.jpg')}}"></a></div><h2>FREE Hosting</h2></div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 offset-xs-10">
            <div class="iner-box"><div><a href="javascript:void(0)"><img src="{{asset('assets/images/icon-10.jpg')}}"></a></div><h2>Domain Connection</h2></div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 offset-xs-10">
            <div class="iner-box"><div><a href="javascript:void(0)"><img src="{{asset('assets/images/icon-11.jpg')}}"></a></div><h2>500MB+ Storage</h2></div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 offset-xs-10">
            <div class="iner-box"><div><a href="javascript:void(0)"><img src="{{asset('assets/images/icon-12.jpg')}}"></a></div><h2>Google Analytics</h2></div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 offset-xs-10">
            <div class="iner-box"><div><a href="javascript:void(0)"><img src="{{asset('assets/images/icon-13.jpg')}}"></a></div><h2>Premium Support</h2></div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 offset-xs-10">
            <div class="iner-box"><div><a href="javascript:void(0)"><img src="{{asset('assets/images/icon-14.jpg')}}"></a></div><h2>No Set-up Fee</h2></div>
          </div>
            <div class="col-lg-3 col-md-6 col-sm-6 offset-xs-10">
            <div class="iner-box"><div><a href="javascript:void(0)"><img src="{{asset('assets/images/maill_icon.jpg')}}"></a></div><h2>25 Email Credits</h2></div>
          </div>
            <div class="col-lg-3 col-md-6 col-sm-6 offset-xs-10">
            <div class="iner-box"><div><a href="javascript:void(0)"><img src="{{asset('assets/images/mobile_iconnn.jpg')}}"></a></div><h2>25 SMS Credits</h2></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div id="trusted">
      <div class="container">
        <h4>Trusted By Millions</h4>
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
            <div class="trusted-box" style="padding:38px 60px; height: 100% ">
              <h5>We accept all of the following credit cards<br><br></h5>
              <div><img src="{{asset('assets/images/cradit.png')}}"></div>
            </div>
          </div>
        </div>
        </div>
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
</script>

@endsection