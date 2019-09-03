@extends('admin.layouts.app')
@section('content')
<?php global $ids;?>
<section class="main_wrapper">
    <div class="left-panel-control" id="left-panel-open">
    <?php 
     if(isset($last_project[0])){
        $ids = $last_project[0]->id;
        ?>
        <div id="site-menu">
            <div class="left-panel-heading float-left w-100 left-panel-inner-space mb-10">
                <div class="pt-15 ft-16">Site Name: 
                    <small>
                        @if(!empty($last_project[0]->site_name))
                            {{$last_project[0]->site_name}} 
                        @else 
                            Not available 
                        @endif 
                    </small>
                </div>
                @if($last_project[0]->published == 1)
                    <span class="badge badge-success float-right">Published</span>
                @else 
                    <span class="badge badge-success float-right">Not Published</span>
                @endif 
            </div>
            <div class="left-panel-inner-space">
                <div class="avatar-web">
                    <img src="{!! asset('storage/projects/'.Auth::user()->id.'/'.$last_project[0]->uuid.'/thumbnail.png') !!}" />
                </div>
            </div>          
            <div class="left-panel-btn-control">
                <a href="{!!url('sites/'.$last_project[0]->name)!!}" class="left">             
                    <span class="icon float-right">
                        <img src="{{asset('assets/images/access.svg')}}" />
                    </span>
                    <span class="float-right">
                        View Website
                    </span>
                </a>
                <a href="{!!url('admin/panda-pages/'.$last_project[0]->id.'/edit')!!}" class="right">                
                    <span class="icon float-left">
                        <img src="{{asset('assets/images/setting.svg')}}" />
                    </span>
                    <span class="float-left">Edit Website</span>
                </a>
            </div>
            <div class="left-panel-heading mt-40 float-left w-100 left-panel-inner-space">
                <div><span class="color-red ft-16">Plan:</span> <small>{{$last_project[0]->package_title}}</small></div>
                <a href="{{url('admin/upgrade-account')}}" class="badge float-right color-purple ft-12">Compare</a>              
            </div>
            <div class="left-panel-heading mt-15  float-left w-100 left-panel-inner-space">             
                <div><span class="color-red ft-16">Domain:</span> 
					@if(!empty($last_project[0]->domain_name))
						<small>Connected: {{$last_project[0]->domain_name}}</small>
					@else 
						<small>Not Connected</small>
					@endif 
				</div>
				@if(empty($last_project[0]->domain_name))
					<a  href="#" class="badge float-right color-purple ft-12" data-toggle="modal" data-target="#connect_domains">Connect Domain</a>
				@endif 
            </div>
            <a class="fancy-btn btn-left-panel-btm" href="{{url('admin/upgrade-account')}}" title="">
                <svg class="fancy-btn-left" width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 C15,50 50,100 0,100z"/>
                </svg>
                Upgrade
                <svg class="fancy-btn-right" width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 C15,50 50,100 0,100z"/>
                </svg>
            </a>
        </div>
        <a href="#" class="toggle-nav btn btn-purple" style="float: right" id="big-sexy"><i class="fas fa-angle-right"></i></a>
    <?php }else{?>
        <div id="site-menu">
            <div class="left-panel-heading float-left w-100 left-panel-inner-space mb-10">
                <div class="new-sitebox">
                    <a href="{{asset('admin/panda-pages/create')}}" class="btn btn-newdefault"><i class="fas fa-plus-circle"></i> Create a new site</a>
                </div>
                <a href="{{asset('admin/panda-pages/create')}}" class="btn btn-newsite">Create a new site</a>
            </div>
            <a class="fancy-btn btn-left-panel-btm" href="{{url('admin/upgrade-account')}}" title="">
                <svg class="fancy-btn-left" width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 C15,50 50,100 0,100z"/></svg>
                    Upgrade
                <svg class="fancy-btn-right" width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 C15,50 50,100 0,100z"/></svg>
            </a>
        </div>
   <?php } ?>
    </div>

    <div class="right-panel">
        <h2>Account Dashboard</h2>
        <div class="row">
            @if(have_premission(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)))
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <a href="{{url('/admin/panda-pages')}}" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/website-icon.png')}}" />
                        <h4>Websites</h4>
                        <p>Manage your website</p>
                    </div>
                </a>
            </div>
            @endif
            @if(have_premission(array(40,41,48,49,53,78,147,50)))
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <a href="{{url('admin/domains')}}" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/domain-icon.png')}}" />
                        <h4>Domains</h4>
                        <p>Manage your domains</p>
                    </div>
                </a>
            </div>
            @endif
            @if(have_premission(array(89,90,148,149,150,151)))
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                 @if($ids != '')
                <a href="{{url('/admin/contacts')}}" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/contact-icon.png')}}" />
                        <h4>Contacts</h4>
                        <p>Manage your contacts</p>
                    </div>
                </a>
                  @else
                <span id='alertcontacts'>
                <a href="javascript:void(0)" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/contact-icon.png')}}" />
                        <h4>Contacts</h4>
                        <p>Manage your contacts</p>
                    </div>
                </a>
                </span>
                <script>
                    $(document).ready(function(){
                        $('#alertcontacts').click(function(){
                            swal({
                                title: "Please create a website first",
                                type: "error"
                            });
                        });
                    });
                
                </script>
                  @endif
            </div>
            @endif
            @if(have_premission(array(16,17,18,19,20,21,22,23,24,25,26)))
                
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                @if($ids != '')
                <a href="{{url('/admin/contacts/emails/'.$ids.'/lists')}}" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/email-icon.png')}}" />
                        <h4>Email</h4>
                        <p>Manage your customers</p>
                    </div>
                </a>
                @else
                <span id='alertsemails'>
                <a href="javascript:void(0)" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/email-icon.png')}}" />
                        <h4>Email</h4>
                        <p>Manage your customers</p>
                    </div>
                </a>
                </span>
                <script>
                    $(document).ready(function(){
                        $('#alertsemails').click(function(){
                            swal({
                                title: "Please create a website first",
                                type: "error"
                            });
                        });
                    });
                
                </script>
                @endif
            </div>
                
            @endif
            @if(have_premission(array(136,137,138,139,140,141,142,143,144,145,146)))
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                @if($ids != '')
                <a href="{{url('/admin/contacts/text/'.$ids.'/lists')}}" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/sms-icon.png')}}" />
                        <h4>SMS</h4>
                        <p>Text your customers</p>
                    </div>
                </a>
                @else
                <span id='alertssms'>
                <a href="javascript:void(0)" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/sms-icon.png')}}" />
                        <h4>SMS</h4>
                        <p>Text your customers</p>
                    </div>
                </a>
                </span>
                <script>
                    $(document).ready(function(){
                        $('#alertssms').click(function(){
                            swal({
                                title: "Please create a website first",
                                type: "error"
                            });
                        });
                    });
                
                </script>
                
                @endif
            </div>
            @endif    
            @if(have_premission(array(28)))
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <a href="{{url('/admin/account-details')}}" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/account_pic.jpg')}}" />
                        <h4>Account</h4>
                        <p>Manage Your Account</p>
                    </div>
                </a>
            </div>
            @endif
            @if(have_premission(array(79)))
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <a href="{{url('support')}}" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/support-icon.png')}}" />
                        <h4>Support</h4>
                        <p>Contact our support team</p>
                    </div>
                </a>
            </div>
            @endif
            @if(have_premission(array(104,105,106,107)))
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <a href="{{url('admin/upgrade-account')}}" class="dashboard-component-controll">
                    <div class="dashboard-component">
                        <img src="{{asset('assets/images/upgrade-icon.png')}}" />
                        <h4>Upgrade</h4>
                        <p>Upgrade & compare plans</p>
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- Modal -->
<div id="connect_domains" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose domain</h4>
      </div>
      <div class="modal-body">
        <p>
			<form method="" action="" class="">
				<div class="form-group">
					<select class="form-control" name="" required>
						<option value="" >Select Domain</option>
						@foreach($domains as $domain)
							<option value="{{$domain->id}}" >{{$domain->name}}</option>
						@endforeach
					</select>
				</div>
			</form>
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>    
<div id="welcome_message" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h1 class="text-center">Hi {!!$user->first_name!!}, welcome to controlpanda</h1>
        <h4>Please watch the welcome video where i will show you around</h4>
        <video width="666" height="380" controls>
        <source src="{!!asset('frontend/images/grow_business.mp4')!!}" type="video/mp4">
        </video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Skip Intro Video</button>
      </div>
    </div>
  </div>
</div>   
@if(Request::segment(2) == 'dashboard-login')
<script>$('#welcome_message').modal('show');</script>
@endif
@endsection