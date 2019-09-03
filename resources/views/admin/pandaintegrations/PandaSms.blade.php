<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('frontend/images/fav.png')}}" type="image/png" sizes="16x16">
        <title>Control Panda - SMS</title>

        <!-- CSS Files -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link href="{{asset('frontend/css/integration.css')}}" rel="stylesheet" media="screen">
    </head>
    <body>
        <section class="top-header text-center">
            <div class="container text-left logo"><a href="{!!url('/')!!}"><img src="{!!asset('frontend/images/logo.png')!!}" alt="Control Panda" /></a></div>
            <div class="container">
                <h1>Panda SMS.Text marketing made simple.</h1>
                <p>Unbeatable rates guaranteed.Start today with 1000 FREE sms's</p>
                <div class="clear15"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#freepandaflow" class="btn btn-flow">GET YOUR FREE PANDA SMS DEMO</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#pandaflowpricing" class="btn btn-control">ADD PANDA SMS TO CONTROL PANDA</a>
                </div>
                <div class="clear20"></div>
            </div>
        </section>
        <section class="below-header">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Helping you increase conversions from your site traffic</h2>
                    <p>Put your marketing message into the pockets of your subscribers in seconds! Get people back to your offer with automated sms messages in individual bulk broadcasts or automated follow up sequences.</p>
                    <p>With 90% of sms’s read within 3 minutes, your can get higher engagement with your potential customers with market leading rates. This affordable, effective means of marketing is a crucial part of your armoury that can be turned on with the switch of a button within your Control Panda dashboard.</p>
                    <div class="clear15"></div>
                    <a href="#pandaflowpricing" class="btn btn-flow">ADD PANDA SMS TO CONTROL PANDA</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/smsimg.png')!!}" alt="" />
                </div>
            </div>
        </section>
        <section class="panda-steps text-center">
            <div class="container">
                <h1>Increase Your Conversions in 3 Steps</h1>
                <p>As soon as you add Panda SMS to your Control Panda Dashboard , set up the Panda SMS with the process below:</p>
                <div class="clear50"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>With the simple user interface, set up your automated or SMS broadcasts, then press GO!</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>Switch on your marketing channels and sit back. This is where Panda SMS goes to work automating your lead follow up systems.</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop-heatmap.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>Panda SMS will automatically send your pre set marketing messages  to all leads, increasing conversions.</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="clear30"></div>
            </div>
        </section>
        <section id="freepandaflow" class="panda-flow-section text-center">
            <div class="container">
                <h1>Your FREE Panda SMS demo</h1>
                <p>Enter your business name below to start your free Panda SMS demo.</p>
                <div class="clear30"></div>
                <div class="gray-div">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" placeholder="Your Business Name Here..." id="business" name="not-set" class="form-control">
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
                                        <strong>Complete the form to start your Panda SMS Demo</strong>
                                    </div>
                                    
                                   <form action="{{url('admin/save-panda-demo-request')}}" id="panda_form" method="post">
                                    <div class="modal-body">
                                        <div class="modal-form">
                                            {{ csrf_field() }}
                                           <input type="hidden" name="action" value="sms" >
                                            <input type="text" name="first_name" placeholder="Your First Name Here..."  class="form-control" required>
                                            <input type="text" name="last_name" placeholder="Your Last Name Here..."  class="form-control" required>
                                            <input type="text" name="business_name" id="business_name" placeholder="Your Business Name Here..." class="form-control" required>
                                            <input type="url" name="website" placeholder="Your Website URL Here..."  class="form-control" required>
                                            <input type="email" name="email" placeholder="Your Email Address Here..."  class="form-control" required>
                                           
                                            <button type="submit"  class="btn btn-flow btn_panda_submit" id="btn_panda_submit">Start Panda SMS Demo</button>
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
                    <h1>No Code Required...</h1>
                    <p>Chose your auto responses, insert your messages, set your response schedules and press go. All within your Control Panda dashboard.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Set up responses
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Insert SMS messages
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Schedule & GO!
                    </div>
                    <div class="clear30"></div>
                    <hr>
                    <div class="clear10"></div>
                    <h1>Delivery Reports...</h1>
                    <p>Gauge how your SMS marketing is performing based off real time data with easy to understand reports within your Control Panda dashboard.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Monitor open rates.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Record clickthrough rates on your links.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Track conversions from your offers.
                    </div>
                    <div class="clear30"></div>
                    <hr>
                    <div class="clear10"></div>
                    <h1>Auto SMS Sequences...</h1>
                    <p>Set up automated SMS sequences based off the users interaction with your site.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Pre populate your auto response sequence messages.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Set the time line of the SMS sequence with one click.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Press GO and let Panda SMS do the work.
                    </div>
                    <div class="clear30"></div>
                    <hr>
                    <div class="clear10"></div>
                    <h1>Mass SMS Broadcasts...</h1>
                    <p>Set up mass SMS broadcasts to your entire contact list with special offers and promotions.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Pre populate your auto broadcast messages.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Schedule the SMS or send it instantly.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Press GO and let Panda SMS do the work.
                    </div>
                    <div class="clear20"></div>
                </div>
            </div>
        </section>
        <div class="clear20"></div>
        <section id="pandaflowpricing" class="panda-flow-pricing text-center">
            <div class="container">
                <h1>Panda SMS Pricing</h1>
                <p>Select your  plan below. No card details required. The monthly fee will automatically be added to your Control Panda subscription. Panda SMS will appear in your Control Panda dashboard. Haven't got Control Panda? <a href="#">Click Here</a></p>
                <div class="clear30"></div>
                @foreach($SmsPackages as $package) 
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-div">
                        <h1>@if($package->price > 0) £ {!!$package->price!!} @else {{'Free'}}  @endif</h1>
                        <p>Per Month</p>
                        @if($package->messages_per_m >= 1)<b>{!!$package->messages_per_m!!} SMS messages p/m</b> @elseif ($package->messages_per_m == -1)<b> Unlimited SMS messages p/m</b>@endif
                        <ul>
                     @if($package->messages_per_m >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->messages_per_m!!} SMS messages</li> @elseif ($package->messages_per_m == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited SMS messages</li> @endif
                            
    @if($package->custom_link_integration == 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;Custom link integration<br></li> @endif
       @if($package->custom_sms_reporting == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Custom SMS reporting<br></li>@endif
         @if($package->individual_business_number == 1)<li><i class="fa fa-fw fa-check"></i>&nbsp;Individual business number<br></li>@endif
                          
                           @if($package->panda_sites == -1)  <li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited panda sites<br></li> @elseif($package->panda_sites >= 1)   <li><i class="fa fa-fw fa-check"></i>&nbsp;  {!!$package->panda_sites!!} panda sites<br></li> @endif
                        </ul>
                        @if($package->price != 0)
                        <a href="{{url('/admin/buy-package/'.$package->id.'/panda-sms')}}" class="btn btn-flow">add to control panda <i class="fa fa-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
                @endforeach
                <!--<div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-div">
                        <h1>£399.99</h1>
                        <p>Per Month</p>
                        <b>25,000 SMS messages p/m</b>
                        <ul>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;25,000 SMS messages </li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Custom link integration<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Custom SMS reporting<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Individual business number<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Unlimited panda sites<br></li>
                        </ul>
                        <a href="#" class="btn btn-flow">add to control panda <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-div">
                        <h1>£749.99</h1>
                        <p>Per Month</p>
                        <b>50,000 SMS messages p/m</b>
                        <ul>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;50,000 SMS messages</li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Custom link integration<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Custom SMS reporting<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Individual business number<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Unlimited panda sites<br></li>
                        </ul>
                        <a href="#" class="btn btn-flow">add to control panda <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>-->
                <div class="clear20"></div>
            </div>
        </section>
        <section class="sitevisits-section">
            <div class="container text-center">
                <h1>Sending more than 50,000 SMS's every month?</h1>
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
                    <h2>Do I have to have a Control Panda account to get Panda SMS?</h2>
                    <p>Yes. Panda  SMS has been specifically designed to seamlessly  integrate  with Control Panda. By keeping Panda SMS exclusive to Control Panda, we  can keep costs down and systems simple and easy to use.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda SMS <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>What if I send  more than 50,000 SMS's per month?</h2>
                    <p>The Panda Flow team can set you up a custom package which will allow for unlimited site visits if needed. Prices will vary depending on the individual requirements of the client.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda SMS <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="clear60"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Can I cancel my Panda SMS Subscription any time?</h2>
                    <p>Yes, you're not tied into any contract terms and can cancel your Panda SMS monthly payments  at any time.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda SMS <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Is there a free trial period?</h2>
                    <p>We offer 1000 free SMS's when you set up a monthly subscription to Panda SMS. If you decide Panda SMS isn't for you after that, you're welcome to cancel your subscription.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda SMS <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="clear60"></div>
                <div class="col-md-6 col-sm-6 col-xs-12 nofloat center-block">
                    <a href="#pandaflowpricing" class="btn btn-flow">Add Panda SMS to Control Panda <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <section class="conversion-section">
            <div class="container">
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <h1>Ready to increase conversions on your Panda Site?</h1>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="#pandaflowpricing" class="btn btn-flow">Get Panda SMS <i class="fa fa-arrow-right"></i></a>
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