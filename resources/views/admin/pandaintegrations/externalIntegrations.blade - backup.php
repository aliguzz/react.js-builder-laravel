@extends('admin.layouts.app')
@section('content')
<div class="clear40"></div>
<!--<script src='https://zapier.com/zapbook/embed/widget.js?services=Control Panda&amp;container=&amp;limit=10'></script>
<script src="https://zapier.com/apps/embed/widget.js?services=mailchimp"></script>-->
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            <div class="left-navigation">
                <div class="menulinks-back">
                    <div class="mn_head_lf">
                        <i class="fa fa-cogs Headerlf_icon"></i>
                        <span class="Headerlf_name">SETTINGS</span>
                    </div>
                </div>
            </div>
            <div class="integarte">
                <h2 class="ui header text-center">Manage Custom Page Templates</h2>
                <p class="text-center">Please select an integration from the list below to get started.</p>
                <div class="row">
                    <div class="col-md-7 col-md-offset-3 col-sm-offset-3 col-sm-7 col-xs-12">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i></div>
                            <input class="form-control" id="" placeholder="Search Available Integrations" type="text">
                        </div>
                    </div>
                </div>    
                <div class="clear20"></div>
                <ul class="tabs tabs-inline tabs-top">
                    <li class="active"><a href="#show_all" data-toggle="tab">Show all</a></li>
                    <li class=""><a href="#zapier" data-toggle="tab">Zapier</a></li>
                    <li class=""><a href="#webinar" data-toggle="tab">Webinar</a></li>
                    <li class=""><a href="#email" data-toggle="tab">Email</a></li>
                    <li class=""><a href="#messaging" data-toggle="tab">Messaging</a></li>
                    <li class=""><a href="#delivery" data-toggle="tab">Delivery</a></li>
                    <li class=""><a href="#actions" data-toggle="tab">Actions</a></li>
                </ul>
                <div class="tab-content">
                    <div class="clear10"></div>
                    <div class="tab-pane active" id="show_all">                        
                       
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/02.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>ActiveCampaign</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/03.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Aweber</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/04.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Constant Contact API</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/05.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>ConvertKit API</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/06.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Drip</p>
                                </div>
                            </a>
                        </div>	
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/07.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>EverWebinar</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/08.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Facebook</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/08.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Facebook With Pages</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/09.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GetResponse</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/10.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GoToWebinar</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/10.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GoToWebinar Form</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/11.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GVO Pure Leverage</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/12.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>HTML Form</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/13.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>HubSpot</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/14.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Infusionsoft API</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/14.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Infusionsoft API V2</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/15.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Interspire</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/16.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Kajabi</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/17.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Mad Mimi API</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/18.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>MailChimp</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/19.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Market Hero</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/20.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Maropost</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/21.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>OfficeAutopilotTagging</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/22.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Ontraport</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/21.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>PageNotifier</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/23.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>PushCrew</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/24.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Salesforce</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/25.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Sendlane</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/26.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>ShipStation</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/27.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Shopify</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/28.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>SlyBroadcast</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/29.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Twilio SMS</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/30.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>WebinarJam</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/30.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>WebinarJamRedirect</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/30.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>WebinarJamStudio</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/31.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>YouZign</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/21.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>ZenDirect</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/32.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Zoom</p>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane" id="zapier">
                        <div class="col-sm-3 stripeImage">
                            <img src="{{asset('frontend/images/set_img2.png')}}" alt="">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>
                        <div class="col-sm-9">
                            <div class="">
                                
                                
                                
                              <script src="https://zapier.com/apps/embed/widget.js?services=mailchimp">
							  </script>	
                                
                                
                                
                                
                                
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane" id="webinar">                        
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/07.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>EverWebinar</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/10.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GoToWebinar</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/10.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GoToWebinar Form</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/30.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>WebinarJam</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/30.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>WebinarJamRedirect</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/30.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>WebinarJamStudio</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/30.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>WebinarJamStudio</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/32.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Zoom</p>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane" id="email">
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/04.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Constant Contact API</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/05.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>ConvertKit API</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/06.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Drip</p>
                                </div>
                            </a>
                        </div>	
                        
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/02.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>ActiveCampaign</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/03.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Aweber</p>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane" id="messaging">
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/16.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Kajabi</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/17.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Mad Mimi API</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/18.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>MailChimp</p>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                    <div class="tab-pane" id="delivery">
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/09.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GetResponse</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/10.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GoToWebinar</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/10.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>GoToWebinar Form</p>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                    <div class="tab-pane" id="actions">
                        <div class="col-md-3">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/03.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>Aweber</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="integ_bx" href="#">
                                <div class="cf-flex-image">
                                    <img src="{{asset('frontend/images/intergration/02.png')}}" alt="">
                                </div>
                                <div class="cf-content">
                                    <p>ActiveCampaign</p>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection