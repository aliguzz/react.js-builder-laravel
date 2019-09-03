@extends('admin.layouts.app')
@section('content')
		
<section>
    <div id="slider-wrap-Integration">
        <div class="container">
            <div class="caption-heading-Integration"></div>
            <h2>Integration Settings</h2>
        </div>
    </div>
</section>
			<section>
				<div class="container-fluid">
                	<div class="control-box-integration">
                    	<div class="container">
                        	<div class="content">
                                <form autocomplete="off" action="#" method="get" class="search" data-searching-for-phrase="Search results for:" data-search-failed-phrase="Looks like something went wrong. Try searching again.">
                                    <input type="text" autocomplete="off" class="search_input form" placeholder="Search Available Integrations" tabindex="1" name="q" value="">
                                    <button type="submit" class="hidden-btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="content-tabs">
                            	<div class="card">
					                <ul class="nav nav-tabs" role="tablist">
					                    <li role="presentation" class=""><a href="#tab-1" aria-controls="Show all" role="tab" data-toggle="tab">Show all</a></li>
					                    <li role="presentation"><a href="#tab-2" aria-controls="Zapier" role="tab" data-toggle="tab">Zapier</a></li>
					                    <li role="presentation"><a href="#tab-3" aria-controls="Webinar" role="tab" data-toggle="tab">Webinar</a></li>
					                    <li role="presentation"><a href="#tab-4" aria-controls="Email" role="tab" data-toggle="tab">Email</a></li>
					                    <li role="presentation"><a href="#tab-5" aria-controls="Messaging" role="tab" data-toggle="tab">Messaging</a></li>
					                    <li role="presentation"><a href="#tab-6" aria-controls="Delivery" role="tab" data-toggle="tab">Delivery</a></li>
					                    <li role="presentation"><a href="#tab-7" aria-controls="Actions" role="tab" data-toggle="tab">Actions</a></li>
					                </ul>
					                <div class="tab-content">
					                    <div role="tabpanel" class="tab-pane active" id="tab-1">
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-3.jpg')}}" /></figure>
														    <span>Constant Contact</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-4.jpg')}}" /></figure>
														    <span>ConvertKit</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-5.jpg')}}" /></figure>
														    <span>Drip</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-6.jpg')}}" /></figure>
														    <span>EverWebinar</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-7.jpg')}}" /></figure>
														    <span>Facebook With Pages</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-8.jpg')}}" /></figure>
														    <span>Facebook With Pages</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-9.jpg')}}" /></figure>
														    <span>GetRespose</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-10.jpg')}}" /></figure>
														    <span>GoToWebinar</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-11.jpg')}}" /></figure>
														    <span>GoToWebinar</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-12.jpg')}}" /></figure>
														    <span>Pure Leverage</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-13.jpg')}}" /></figure>
														    <span>Interspire</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-14.jpg')}}" /></figure>
														    <span>Kajabi</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-15.jpg')}}" /></figure>
														    <span>Mad Mimi</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-16.jpg')}}" /></figure>
														    <span>MailChimp</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    </div>
					                    <div role="tabpanel" class="tab-pane" id="tab-2">
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    </div>
					                    <div role="tabpanel" class="tab-pane" id="tab-3">
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    </div>
					                    <div role="tabpanel" class="tab-pane" id="tab-4">
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    </div>
					                    <div role="tabpanel" class="tab-pane" id="tab-5">
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    </div>
					                    <div role="tabpanel" class="tab-pane" id="tab-6">
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    </div>
					                    <div role="tabpanel" class="tab-pane" id="tab-7">
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    	<div class="row">
					                    		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-1.jpg')}}" /></figure>
														    <span>ActiveCampaign</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
						                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						                    		<div class="brand-box">
						                    			<div class="hover12 column">
														  <a href="javascript:void(0);"><div><figure><img src="{{asset('assets/images/brand-logo-2.jpg')}}" /></figure>
														    <span>AWeber</span>
														  </div></a>
														</div>
						                    		</div>
						                    	</div>
					                    	</div>
					                    </div>
					                </div>
					            </div>
                            </div>
                        </div>
                    </div>
                </div>
			</section>
@endsection