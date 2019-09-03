<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{!!asset('frontend/images/fav.png')!!}" type="image/png" sizes="16x16">
        <title>Control Panda - Dial</title>

        <!-- CSS Files -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link href="{{asset('frontend/css/integration.css')}}" rel="stylesheet" media="screen">
        
        
    </head>
    <body>
        <section class="top-header text-center">
            <div class="container text-left logo"><a href="index.html"><img src="{!!asset('frontend/images/logo.png')!!}" alt="Control Panda" /></a></div>
            <div class="container">
                <h1>The call centre that can be set with one click.</h1>
                <p>Increase conversions with a dedicated business pone number from your laptop, tablet or smart phone with Panda Dial.</p>
                <div class="clear15"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#freepandaflow" class="btn btn-flow">GET YOUR FREE PANDA DIAL DEMO</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#pandaflowpricing" class="btn btn-control">ADD PANDA DIAL TO CONTROL PANDA</a>
                </div>
                <div class="clear20"></div>
            </div>
        </section>
        <section class="below-header">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Helping you contact your leads with your own dedicated business phone line</h2>
                    <p>The worlds first fully integrated voip platform that can be setup and switched on with 1 click.</p>
                    <p>Contact your leads and customers directly from your Control Panda account with a dedicated business line. With a flat rate for national and International calls, its never been more affordable to secure clients for your business no matter where you are in the world.</p>
                    <p>With no 3rd party integrations, Panda Dial can be setup and switched on with the click of a button within your Control Panda dashboard.</p>
                    <div class="clear15"></div>
                    <a href="#pandaflowpricing" class="btn btn-flow">ADD PANDA DIAL TO CONTROL PANDA</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/dial.png')!!}" alt="" />
                </div>
            </div>
        </section>
        <section class="panda-steps text-center">
            <div class="container">
                <h1>Increase Your Conversions in 3 Steps</h1>
                <p>As soon as you add Panda Dial to your Control Panda Dashboard , set up the Panda Dial with the process below:</p>
                <div class="clear50"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>With the simple user interface, set up your dedicated phone line with 1 click. No third party integrations.</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>Switch on your marketing channels then contact your leads in real time  as they come in.</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop-heatmap.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>Panda Dial can be set to auto dial new leads as they come in or call out individually  as you please.</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="clear30"></div>
            </div>
        </section>
        <section id="freepandaflow" class="panda-flow-section text-center">
            <div class="container">
                <h1>Your FREE Panda Dial demo</h1>
                <p>Enter your business name below to start your free Panda Dial demo.</p>
                <div class="clear30"></div>
                <div class="gray-div">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="business" placeholder="Your Business Name Here..." name="not-set" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <a data-toggle="modal" id="open_form" data-target="#heatmap" class="btn btn-heatmap">Show me my free demo</a>
                        <!-- Modal -->
                        <div id="heatmap" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <img src="{!!asset('frontend/images/logo.png')!!}" alt="Control Panda" />
                                        <div class="clear20"></div>
                                        <strong>Complete the form to start your Panda Dial Demo</strong>
                                    </div>
                                    <form action="{{url('admin/save-panda-demo-request')}}" id="panda_form" method="post">
                                    <div class="modal-body">
                                        <div class="modal-form">
                                            {{ csrf_field() }}
                                           <input type="hidden" name="action" value="dial" >
                                            <input type="text" name="first_name" placeholder="Your First Name Here..."  class="form-control" required>
                                            <input type="text" name="last_name" placeholder="Your Last Name Here..."  class="form-control" required>
                                            <input type="text" name="business_name" id="business_name" placeholder="Your Business Name Here..." class="form-control" required>
                                            <input type="url" name="website" placeholder="Your Website URL Here..."  class="form-control" required>
                                            <input type="email" name="email" placeholder="Your Email Address Here..."  class="form-control" required>
                                           
                                            <button type="submit"  class="btn btn-flow btn_panda_submit" id="btn_panda_submit">Start Panda Dial Demo</button>
                                            <p>Your Information is 100% Secure & Safe</p>
                                        </div>
                                        
                                    </div>
                                    
                                   </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clear30"></div>
                <div class="snapshots-div text-center">
                    <h1>No 3rd Party Integrations...</h1>
                    <p>The world first fully integrated voip Dialer that can be plugged into multiple landing pages, websites and forms with the click of a button.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Select your landing page or website.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Turn on the Dialer function on your opt in forms.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Start making calls as the leads come in, in real time.
                    </div>
                    <div class="clear30"></div>
                    <hr>
                    <div class="clear10"></div>
                    <h1>No Contracts...</h1>
                    <p>All rates are available to everyone, no matter how long they use the service. With no minimum term contracts its never been more affordable to have a dedicated business line.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        No minimum term contracts.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Cancel any time.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Same low rate no matter the term.
                    </div>
                    <div class="clear30"></div>
                    <hr>
                    <div class="clear10"></div>
                    <h1>Instant Set Up...</h1>
                    <p>With no hardware to install, you can be dialling your customers and leads within 10 minutes of setting up Panda Dial.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Select your package based on your needs.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Activate the Panda Dial integration on your opt in forms.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Start speaking with your customers and leads instantly.
                    </div>
                    <div class="clear30"></div>
                    <hr>
                    <div class="clear10"></div>
                    <h1>Simple to use...</h1>
                    <p>Our experts have designed the easy to use interface which allows you to setup your business line within minutes.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Don't wast time trying to figure out how to use your Panda Dial line.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Simple start/stop activation buttons allow you to get the phone dialling with ease.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Spend more time on the phone selling and less time figuring out how to use the tech!
                    </div>
                    <div class="clear20"></div>
                </div>
            </div>
        </section>
        <div class="clear20"></div>
        <section id="pandaflowpricing" class="panda-flow-pricing text-center">
            <div class="container">
                <h1>Panda Dial Pricing</h1>
                <p>Select your  plan below. No card details required. The monthly fee will automatically be added to your Control Panda subscription.   Panda Dial will appear in your Control Panda dashboard. Haven't got Control Panda? <a href="#">Click Here</a></p>
                <div class="clear30"></div>
                
                @foreach($DialPackages as $package) 
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-div">
                        <h1>@if($package->price > 0) £ {!!$package->price!!} @else {{'Free'}}  @endif</h1>
                        <p>Per Month/Per User</p>
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
                        @if($package->price != 0)
                        <a href="{{url('/admin/buy-package/'.$package->id.'/panda-dials')}}" class="btn btn-flow">add to control panda <i class="fa fa-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
                  @endforeach
               
                <div class="clear20"></div>
            </div>
        </section>
        <section class="sitevisits-section">
            <div class="container text-center">
                <h1>Need a more bespoke package for your business?</h1>
                <p>Contact the Panda Flow team to set up a custom solution for your business.</p>
                <div class="clear30"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" placeholder="Name..." name="name" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="email" placeholder="Email..." name="email" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a href="#" class="btn btn-flow">get custom solutions</a>
                </div>
            </div>
        </section>
        <section class="faq-section">
            <div class="container">
                <h1 class="text-center">FAQ</h1>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Do I have to have a Control Panda account to get Panda Dial?</h2>
                    <p>Yes. Panda  Dial has been specifically designed to seamlessly  integrate  with Control Panda. By keeping Panda Dial exclusive to Control Panda, we  can keep costs down and systems simple and easy to use.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda Dial <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>What if I use more than 2000 minutes per month?</h2>
                    <p>The Panda Flow team can set you up a custom package which will allow for unlimited minutes if needed. Prices will vary depending on the individual requirements of the client.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda Dial <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="clear60"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Can I cancel my Panda Dial Subscription any time?</h2>
                    <p>Yes, you're not tied into any contract terms and can cancel your Panda Dial monthly payments  at any time.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda Dial <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Is there a free trial period?</h2>
                    <p>We offer a 30 day money back guarantee  on all packages. In each national and international package you get allocated 2000 free minutes. If you decide Panda Dial is not for you, you may ask for a full refund within the 30 day period.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda Dial <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="clear60"></div>
                <div class="col-md-6 col-sm-6 col-xs-12 nofloat center-block">
                    <a href="#pandaflowpricing" class="btn btn-flow">Add Panda Dial to Control Panda <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <section class="conversion-section">
            <div class="container">
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <h1>Ready to increase conversions on your Panda Site?</h1>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="#pandaflowpricing" class="btn btn-flow">Get Panda Dial <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <section class="footer">
            <div class="container">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <h2>About</h2>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Pricing</a></li>
                        <li><a href="#">How we Work</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Core Fundamentals</a></li>
                    </ul>
                    <div class="clear10"></div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <h2>Condition</h2>
                    <ul>
                        <li><a href="#">Terms and Condition</a></li>
                        <li><a href="#">Guideline</a></li>
                        <li><a href="#">Copyright Issue</a></li>
                        <li><a href="#">Supports</a></li>
                        <li><a href="#">Effects and Affects</a></li>
                    </ul>
                    <div class="clear10"></div>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <h1>Contact</h1>
                    <div class="row contactform">
                        <div class="col-md-6 col-sm-6 col-xs-12"><input type="text" placeholder="Name..." name="name" class="form-control"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12"><input type="email" placeholder="Email..." name="email" class="form-control"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12"><textarea placeholder="Your Message" class="form-control" name="custom_type" ></textarea></div>
                    </div>
                    <div class="clear10"></div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 socialicons"><a href="#" class="facebook"><i class="fa fa-facebook-square"></i> Facebook</a> <a href="#" class="twitter"><i class="fa fa-twitter"></i> Twitter</a> <a href="#" class="google"><i class="fa fa-google-plus"></i> Google+</a></div>
                <div class="col-md-6 col-sm-6 col-xs-12"><a href="#" class="btn btn-send">Send Message <i class="fa fa-arrow-right"></i></a></div>
            </div>
        </section>
        <section class="copyright">
            <div class="container text-center">
                Copyright © 2018 All rights reserved. <span>Creative work by <a href="http://www.arhamsoft.com" target="_blank">ArhamSoft.com</a></span>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
        <script src="{{asset('js/sweetalert.min.js')}}"></script>

        
        <script>
		
		$(function(){
			
			$('#open_form').click(function(){
			  
				  if($('#business').val()!= '')
					 $('#panda_form #business_name').val($('#business').val());
				  else
				  {
					  alert('Please enter Business Name');
					  return false;
				  }
			 
			});
		  
			
		 });
		
            $('a[href*="#"]')
                    // Remove links that don't actually link to anything
                    .not('[href="javascript:void(0);"]')
                    .not('[href="#0"]')
                    .click(function (event) {
                        // On-page links
                        if (
                                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                                &&
                                location.hostname == this.hostname
                                ) {
                            // Figure out element to scroll to
                            var target = $(this.hash);
                            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                            // Does a scroll target exist?
                            if (target.length) {
                                // Only prevent default if animation is actually gonna happen
                                event.preventDefault();
                                $('html, body').animate({
                                    scrollTop: target.offset().top
                                }, 1000, function () {
                                    // Callback after animation
                                    // Must change focus!
                                    var $target = $(target);
                                    $target.focus();
                                    if ($target.is(":focus")) { // Checking if the target was focused
                                        return false;
                                    }
                                    ;
                                });
                            }
                        }
                    });
        </script>
    </body>
</html>