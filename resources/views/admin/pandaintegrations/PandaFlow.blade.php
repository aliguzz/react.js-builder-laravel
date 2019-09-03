<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{!!asset('frontend/images/fav.png')!!}" type="image/png" sizes="16x16">
        <title>Control Panda - Flow</title>

        <!-- CSS Files -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        
       <link href="{{asset('frontend/css/integration.css')}}" rel="stylesheet" media="screen">
    </head>
    <body>
        <section class="top-header text-center">
            <div class="container text-left logo"><a href="{!!url('/')!!}"><img src="{!!asset('frontend/images/logo.png')!!}" alt="Control Panda" /></a></div>
            <div class="container">
                <h1>See how users behave on your site.</h1>
                <p>Put your conversions on steroids with Panda Flow...</p>
                <div class="clear15"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#freepandaflow" class="btn btn-flow">GET YOUR FREE PANDA FLOW DEMO</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#pandaflowpricing" class="btn btn-control">ADD PANDA FLOW TO CONTROL PANDA</a>
                </div>
                <div class="clear20"></div>
            </div>
        </section>
        <section class="below-header">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Helping you optimise your site traffic</h2>
                    <p>Heat maps show you exactly what functions visitors are using on your website. This powerful insight enables you to make changes  that will keep visitors engaged and increase conversions.</p>
                    <p>Never before has this software been so easy to use. Once you add panda flow to your Control Panda dashboard, you simply select the panda site you want to record and press go. Panda Flow  then records the data  based on the parameters you set and gives you clear reports that allow you to make  calculated changes that will grow your bottom line.</p>
                    <div class="clear15"></div>
                    <a href="#pandaflowpricing" class="btn btn-flow">ADD PANDA FLOW TO CONTROL PANDA</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/optimize-img.png')!!}" alt="" />
                </div>
            </div>
        </section>
        <section class="panda-steps text-center">
            <div class="container">
                <h1>Optimise your Panda Site in 3 Steps</h1>
                <p>As soon as you add Panda Flow to your Control Panda Dashboard , set up the Panda Flow  heat map with the process below:</p>
                <div class="clear50"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>With the simple user interface, select what Panda Site you wish to record and how long for, then press GO!</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>Switch on your marketing channels and sit back. This is where Panda Flow goes to work recording the users  behaviour on your site.</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="img-responsive" src="{!!asset('frontend/images/laptop-heatmap.png')!!}" alt="" />
                    <div class="clear20"></div>
                    <p>Once Panda Flow has enough data it will highlight the current site usage and areas for improvement to increase conversions .</p>
                    <div class="clear20"></div>
                    <a href="#freepandaflow" class="btn btn-freedemo">FREE Demo <i class="fa fa-chevron-right"></i></a>
                    <div class="clear20"></div>
                </div>
                <div class="clear30"></div>
            </div>
        </section>
        <section id="freepandaflow" class="panda-flow-section text-center">
            <div class="container">
                <h1>Your FREE Panda Flow demo</h1>
                <p>Enter your website url below to receive a free Panda Flow demo on your own website.</p>
                <div class="clear30"></div>
                <div class="gray-div">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="business" placeholder="Your Website URL Here..." name="not-set" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <a data-toggle="modal" id="open_form" data-target="#heatmap" class="btn btn-heatmap">Show me my heat map</a>
                        <!-- Modal -->
                        <div id="heatmap" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <img src="{!!asset('frontend/images/logo.png')!!}" alt="Control Panda" />
                                        <div class="clear20"></div>
                                        <strong>Complete the form to start your Panda Flow Demo</strong>
                                    </div>
                                    <form action="{{url('admin/save-panda-demo-request')}}" id="panda_form" method="post">
                                    <div class="modal-body">
                                        <div class="modal-form">
                                            {{ csrf_field() }}
                                           <input type="hidden" name="action" value="flow" >
                                            <input type="text" name="first_name" placeholder="Your First Name Here..."  class="form-control" required>
                                            <input type="text" name="last_name" placeholder="Your Last Name Here..."  class="form-control" required>
                                            <input type="text" name="business_name" id="business_name" placeholder="Your Business Name Here..." class="form-control" required>
                                            <input type="url" name="website" placeholder="Your Website URL Here..."  class="form-control" required>
                                            <input type="email" name="email" placeholder="Your Email Address Here..."  class="form-control" required>
                                           
                                            <button type="submit"  class="btn btn-flow btn_panda_submit" id="btn_panda_submit">Start Panda Flow Demo</button>
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
                    <h1>Take Snap Shots...</h1>
                    <p>Take digital snap shots of your Panda Pages to create easy to understand reports that highlight users behaviour when they visit your site.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Heat map report.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Scroll map report
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/snapshot3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Confetti report
                    </div>
                    <div class="clear30"></div>
                    <hr>
                    <div class="clear10"></div>
                    <h1>Screen Recordings...</h1>
                    <p>Look over the shoulder of your users and see exactly how they navigate around your Panda Site.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Watch exactly where your visitors mouse goes and clicks on your page.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        See what parts of your site are not being used by your visitors.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/screen3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Discover how long users stay on your website and what they struggle using.
                    </div>
                    <div class="clear30"></div>
                    <hr>
                    <div class="clear10"></div>
                    <h1>Split Testing...</h1>
                    <p>Make strategic changes to your Panda Pages to identify what will convert best.</p>
                    <div class="clear30"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting1.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Identify specific areas of your Panda Site that will improve the users experience.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting2.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Test new ideas based off how visitors navigate around your Panda Pages.
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img class="img-responsive" src="{!!asset('frontend/images/splittesting3.png')!!}" alt="" />
                        <div class="clear10"></div>
                        Discover what ideas worked so you can continue improving conversions.
                    </div>
                    <div class="clear20"></div>
                </div>
            </div>
        </section>
        <div class="clear20"></div>
        <section id="pandaflowpricing" class="panda-flow-pricing text-center">
            <div class="container">
                <h1>Panda Flow Pricing</h1>
                <p>Select your  plan below. No card details required. The monthly fee will automatically be added to your Control Panda subscription. Panda Flow will appear in your Control Panda dashboard. Haven't got Control Panda? <a href="#">Click Here</a></p>
                <div class="clear30"></div>
                 @foreach($FlowPackages as $package) 
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-div">
                        <h1>@if($package->price > 0) £ {!!$package->price!!} @else {{'Free'}}  @endif</h1>
                        <p>Per Month</p>
                        <!--<b>{!!$package->page_views_per_m!!} page views p/m</b>-->
                        
                        
                        @if($package->page_views_per_m >= 1) <b>{!!$package->page_views_per_m!!} page views p/m</b> @elseif ($package->page_views_per_m == -1) <b>Unlimited page views p/m</b>  @endif
                        
                        <ul>
                            
                            @if($package->snap_shots >= 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->snap_shots!!} Snap shots</li> @elseif ($package->snap_shots == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited Snap shots</li> @endif
                            
                            @if($package->screen_recordings >= 1) <li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->screen_recordings!!} Screen recordings<br></li> @elseif ($package->screen_recordings == -1)  <li><i class="fa fa-fw fa-check"></i>&nbsp; Unlimited Screen recordings<br></li> @endif
                            
                            
                            @if($package->months_of_recording ==1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->months_of_recording!!} Month of recording storage data<br></li> @elseif($package->months_of_recording >1)<li><i class="fa fa-fw fa-check"></i>&nbsp;{!!$package->months_of_recording!!} Months of recording storage data<br></li> @endif
                            
                            
                             @if($package->split_tests == -1) <li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited split tests <br></li>@elseif($package->split_tests >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp; {!!$package->split_tests!!} split tests <br></li>  @endif
                            
                            
                            
                            @if($package->panda_sites == -1)<li><i class="fa fa-fw fa-check"></i>&nbsp;  Unlimited panda sites <br></li> @elseif($package->panda_sites >= 1)<li><i class="fa fa-fw fa-check"></i>&nbsp; {!!$package->panda_sites!!} panda sites <br></li> @endif
                        </ul>
                        @if($package->price != 0)
                        <a href="{{url('/admin/buy-package/'.$package->id.'/panda-flows')}}" class="btn btn-flow">add to control panda <i class="fa fa-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
                 @endforeach
                <!--<div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-div">
                        <h1>£79.95</h1>
                        <p>Per Month</p>
                        <b>100,000 page views p/m</b>
                        <ul>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;100 Snap shots</li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;500 Screen recordings<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;12 Months of recording storage data<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Unlimited split tests<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Unlimited panda sites<br></li>
                        </ul>
                        <a href="#" class="btn btn-flow">add to control panda <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-div">
                        <h1>£189.95</h1>
                        <p>Per Month</p>
                        <b>250,000 page views p/m</b>
                        <ul>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;100 Snap shots</li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;1000 Screen recordings<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;12 Months of recording storage data<br></li>
                            <li><i class="fa fa-fw fa-check"></i>&nbsp;Unlimited split tests<br></li>
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
                <h1>Getting more than 250,000 monthly site visits?</h1>
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
                    <h2>Do I have to have a Control Panda account to get Panda Flow?</h2>
                    <p>Yes. Panda  Flow has been specifically designed to seamlessly  integrate  with Control Panda. By keeping Panda Flow exclusive to Control Panda, we  can keep costs down and systems simple and easy to use.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda Flow <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>What if I have more than 250,000 monthly visitors?</h2>
                    <p>The Panda Flow team can set you up a custom package which will allow for unlimited site visits if needed. Prices will vary depending on the individual requirements of the client.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda Flow <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="clear60"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Can I cancel my Panda Flow Subscription any time?</h2>
                    <p>Yes, you're not tied into any contract terms and can cancel your Panda Flow monthly payments  at any time.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda Flow <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Is there a free trial period?</h2>
                    <p>We offer a free demo on your current site. You can enter your site url into our free demo section which will highlight how visitors are using your site . This will highlight the power of Panda Flow and how it will help you increase conversions.</p>
                    <a href="#pandaflowpricing" class="btn btn-freedemo">Get Panda Flow <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="clear60"></div>
                <div class="col-md-6 col-sm-6 col-xs-12 nofloat center-block">
                    <a href="#pandaflowpricing" class="btn btn-flow">Add Panda Flow to Control Panda <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <section class="conversion-section">
            <div class="container">
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <h1>Ready to increase conversions on your Panda Site?</h1>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="#pandaflowpricing" class="btn btn-flow">Get Panda Flow <i class="fa fa-arrow-right"></i></a>
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