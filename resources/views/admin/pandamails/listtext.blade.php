@extends('admin.layouts.app')
@section('content')
@php 
$querystring = @$_GET['ref'];
@endphp

<section>
    <div id="loading" style="display: none;"></div>
            <div class="block shadow-sm">
                <div class="container-fluid">
                  <div class="main-wrap">
                    <div class="container">
                         @foreach(@$id_project as $idproj)
                                    <div class="flex-container">
                                    <div class="wrap-item-1">
                                    <div class="mail-envelope pr-0">
                                    <img src="{{asset('assets/images/sms-icon.png')}}">
                                    </div>
                                    </div>
                                    <div class="wrap-item-2"><img src="{{asset('assets/images/arrow-direction.png')}}"></div>
                                    <div class="wrap-item-3"><div class="intro-img-1">
                                    <img src="{{ asset('storage/projects/'.Auth::user()->id.'/'.$idproj->uuid.'/thumbnail.png') }}" alt="" />
                                    </div></div>  
                                    <div class="wrap-item"><ul class="info-list">
                                    <li>
                                        
                                       
                                        
                                        
                                        
                                    <strong>Website</strong> <span>: @if($idproj->site_name == '') {!! $idproj->t_cat_name !!} @else  {!! $idproj->site_name !!}  @endif</span>                 
                                    <div class="edit-detail">
                                    <input type="checkbox" id="checkbox_1">
                                    <label for="checkbox_1">
                                    <a href="#" title="" data-toggle="modal" data-target=".totalsites">Change <i class="fa fa-angle-down" style="color:#000"></i> </a>
                                    </label>
                                    
                                    
                                    <div class="dashboard-Contact-box">
                                                <div class="modal totalsites">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                                        <div class="popup-top-two">Load another site</div>
                                                        <div class="table-box">
                                                          
                                                            <div class="row" id="myaallwebsitetemplates">
                                                                @foreach(@$all_project as $proj)
                                                                <div class="col-lg-3 col-md-6 col-sm-12"><a href="{{url('admin/contacts/text/' . $proj->id . '/lists') }}"><div class="home-img-as"><img src="{{ asset('storage/projects/'.Auth::user()->id.'/'.$proj->uuid.'/thumbnail.png') }}" alt="img-01" class="img-fluid"><div class="footer-img-home"><div class="img-mane">{{$proj->template}}</div></div><div class="overlay"><a href="{{url('admin/contacts/text/' . $proj->id . '/lists') }}"><div class="text"><span><img src="{{url('assets/images/setting.svg')}}" class="svg-tool"></span> <i>Edit Site / Preview</i></div></a></div></div></a></div>
                                                                @endforeach
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                    </div>       
                                    
                                    
                                    </div>
                                    </li>
                                    <li>
                                    <strong>Status : </strong> <span>Live</span>                          
                                    </li>                       
                                    </ul></div>
                                  </div>
                        
                        @endforeach
                                </div>

                                <div class="text-small">
                                  <ul>
                                    <li><strong>Website</strong> <span>: Discover the world</span>  </li>
                                    <li><strong>Status : </strong> <span>Live</span> </li>
                                    <li><div class="edit-detail">
                                    <input type="checkbox" id="checkbox_1">
                                    <label for="checkbox_1">
                                    <a href="#" title="">Change <i class="fa fa-angle-down" style="color:#000"></i> </a>
                                    </label>
                                    </div></li>
                                  </ul>
                                </div>
                                    </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
        	<section>
                <div class="block no-space gray">
                 <div class="container-fluid">
                  <div class="selectors-bar">       
                    <div class="scrollmenu selectors-container">          
                     <ul class="selectors nav nav-tabs">
                      @if(have_premission(array(142,143)))
                      <li class="slide"><a @if($querystring == '') class="active"  @endif data-toggle="tab" href="#home"><div class="curve"><div class="icon"><img src="{{asset('assets/images/response.svg')}}" /> </div></div> <span>Response</span></a></li>
                      @endif
                        
                      @if(have_premission(array(141,144)))
                      <li class="slide"><a data-toggle="tab" href="#menu1"><div class="curve"><div class="icon"><img src="{{asset('assets/images/settings-web.svg')}}" /></div></div> <span>Settings</span></a></li>
                      @endif
                      
                      @if(have_premission(array(138,139,140)))
                      <li class="slide"><a @if($querystring == 'menu2') class="active"  @endif data-toggle="tab" href="#menu2"><div class="curve"><div class="icon"><img src="{{asset('assets/images/user.svg')}}" /></div></div> <span>Users</span></a></li>
                      @endif
                      
                      @if(have_premission(array(146)))
                      <li class="slide"><a data-toggle="tab" href="#menu3"><div class="curve"><div class="icon"><img src="{{asset('assets/images/icon1.svg')}}" /></div></div> <span>Support</span></a></li>
                      @endif
                      
                      @if(have_premission(array(136,137)))
                      <li class="slide"><a class="" data-toggle="tab" href="#menu4"><div class="curve"><div class="icon"><img src="{{asset('assets/images/contacts.svg')}}" /></div></div> <span>Contacts</span></a></li>          
                      @endif
                      <li class="slide"><a href="{!!url('admin/dashboard')!!}"><div class="curve"><div class="icon"><i class="fa fa-arrow-circle-left" style="font-size:24px;color:#b71111"></i></div></div> <span>Go back</span></a></li>
                     </ul>
                    </div>       
                  </div>    
                 </div>
                </div>
           </section>
        </section> 
<div class="container-fluid">
    <section class="inner-full-width-panel" style="padding-right:0px;">					
        <div class="tab-content">

            <div id="home" class="tab-pane @if($querystring == '') active in @endif">


                <div class="col-sm-12">
                    <div class="right-content right-content-space fix-width">
                        <h3 class="warning">This is your auto response,  If you want to change press edit button</h3>
                        
                            <div class="editor-container">
                                @foreach(@$sms_templates as $et)
                                {!!$et->content!!}
                                @endforeach
                            </div>

                            <div class="editor-footer w-100">      
                                @foreach(@$sms_templates as $et)
                                @if(have_premission(array(143)))
                                <button type="submit" id="submitssms" class="overbtnnone">
                                    <a href="{{url('/admin/sms-templates/'.$et->id.'/advance-builder-text?ref='.url()->current())}}" class="fancy-btn-reverse float-right" title="">
                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                    <span class="icon-white"><img src="{{asset('assets/images/edit.svg')}}"> </span> Edit
                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                </a>
                                </button>
                                @endif
                                @endforeach
                            </div>  
                        
                    </div>       
                </div>
            </div>
            
            <script>
                $(document).ready(function(){
                   $('#submitssms').click(function(){
                       $('#submittextform').submit();
                   });
                });
            </script>

            <div id="menu1" class="tab-pane fade">

                <!-- view email settings section -->

                <div class="right-content right-content-space fix-width" id="view_email_settings_section">
                    <h3 class="warning">Set your goals &amp; objectives for your business
<!--                        <span class="hidden-md-down"> See Video Tutorials 
                            <i class="far fa-play-circle"></i></span>-->
                    </h3>
                    <div class="editor-container">
                        <div class="objective-wrap">
                            <ul class="left-box">
                                <li>Status:</li>
                                <li>SMS Responses:</li>
                                <li>Linked to Website:</li>
                                <li>Forms:</li>
                            </ul>
                            <ul class="right-box">
                                <div class="select-box"></div> 
                                @if($project_text_status == 0)
                                <li id="view_email_toggle_section_status">Paused</li>
                                @else
                                <li id="view_email_toggle_section_status">Live</li>
                                @endif
                                <div class="select-box">
                                    @if($project_text_respose_status == 0)
                                    <li id="view_email_response_toggle_section_status"><img class="img-fluid" src="{{asset('assets/images/icon-2.jpg')}}"></li>
                                    @else
                                    <li id="view_email_response_toggle_section_status"><img class="img-fluid" src="{{asset('assets/images/icon-1.jpg')}}"></li>
                                    @endif


                                    @if($project_linked_website_text_status == 0)
                                    <li id="view_website_toggle_section_status"><img class="img-fluid" src="{{asset('assets/images/icon-2.jpg')}}"></li>
                                    @else
                                    <li id="view_website_toggle_section_status"><img class="img-fluid" src="{{asset('assets/images/icon-1.jpg')}}"></li>
                                    @endif




                                </div>    

                                <div class="select-box">
                                    <div id="form-box">
                                        <li>
                                            <input id="check01" type="checkbox" name="menu">
                                            <label for="check01">Working with website</label>
                                            <ul class="submenu">

                                                @foreach(@$all_forms_of_project as $key => $afop)
                                                @if(array_key_exists("1",$afop) && $afop[1] == 1)
                                                <li><a href="javascript:void(0)">{!!$afop[0]!!}: <i class="dropdownitem" data-formname="{!!$afop[0]!!}"><img class="img-fluid" src="{{asset('assets/images/icon-1.jpg')}}"></i></a></li>
                                                @else
                                                <li><a href="javascript:void(0)">{!!$afop[0]!!}: <i class="dropdownitem" data-formname="{!!$afop[0]!!}"><img class="img-fluid" src="{{asset('assets/images/icon-2.jpg')}}"></i></a></li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    @if(have_premission(array(144)))
                    <div class="editor-footer w-100"> 
                        <span id="editbtnsection"  class="overbtnnone">
                            <span class="fancy-btn-reverse float-right" title="" >
                                <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                </svg>
                                <span class="icon-white"><img src="{{asset('assets/images/edit.svg')}}"> </span> Edit
                                <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                </svg>
                            </span>
                        </span>
                    </div>                
                    @endif
                </div>
                


                <!-- view email settings section -->
                <!-- edit section email settings -->



                <div class="right-content right-content-space fix-width" id="edit_email_settings_section" style="display:none;">


                    <a class="fancy-btn fancy-btn-mob" href="javascript:void(0)" id="backbutton" style="margin: 0 0 0 5px;">
                        <svg class="fancy-btn-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none" >
                        <path d="M0,0 L100,0 C15,50 50,100 0,100z" ></path>
                        </svg>
                        <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back
                        <svg class="fancy-btn-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                        </svg>
                    </a>




<!--                        <a href="#"><span class="hidden-md-down"> See Video Tutorials 
<i class="far fa-play-circle"></i></span></a>-->
                    <div class="editor-container">
                        <div class="objective-wrap">
                            <div class="top-box">
                                @if($project_text_status == 0)
                                <li>Status:  <button type="button" class="btn btn-info switchstatus" data-btntype="statusbtn">Paused</button></li>
                                @else
                                <li>Status:  <button type="button" class="btn btn-primary switchstatus" data-btntype="statusbtn">Live</button></li>
                                @endif

                                @if($project_text_respose_status == 0)
                                <li>SMS Responses: <button type="button" class="btn btn-info switchtext" data-btntype="textbtn">Not set</button></li>
                                @else
                                <li>SMS Responses: <button type="button" class="btn btn-primary switchtext" data-btntype="textbtn">Set</button></li>
                                @endif

                                @if($project_linked_website_text_status == 0)
                                <li>Linked to Website: <button type="button" class="btn btn-info switchwebsite" data-btntype="websitebtn">Unlinked</button></li>
                                @else
                                <li>Linked to Website: <button type="button" class="btn btn-primary switchwebsite" data-btntype="websitebtn">Linked</button></li>
                                @endif
                            </div>
                            <div class="head-1"><span>Forms Working With Website</span></div>
                            <div class="top-box">
                                @foreach(@$all_forms_of_project as $key => $afop)
                                @if(array_key_exists("1",$afop) && $afop[1] == 1)
                                <li>{!!$afop[0]!!}: <button type="button" class="btn btn-primary formsstatus"  data-project_id="{!! $ProjectData->id !!}"  data-form_name="{!! $afop[0] !!}">Linked</button></li>
                                @else
                                <li>{!!$afop[0]!!}: <button type="button" class="btn btn-info formsstatus"  data-project_id="{!! $ProjectData->id !!}"  data-form_name="{!! $afop[0] !!}">Unlinked</button></li>
                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>




                <!-- edit section email settings -->






            </div>

            <div id="menu2" class="tab-pane fade @if($querystring == 'menu2') active show  @endif">
                <div class="right-content right-content-space fix-width">
                    <h3 class="user">Users</h3>




                    <div class="editor-container">
                        <div class="simplebar" id="myElement">
                            <div class="dashboard-Contact-box">
                                <div class="table-responsive">
                                    <table class="table min-width1">
                                        <tbody class="addnewusertr">
                                            @if(isset($emailsdata->phones) && $emailsdata->phones!= '')
                                            @php $emaillist = explode(',', $emailsdata->phones);@endphp
                                            @foreach(@$emaillist as $key=>$mail)
                                            @php 
                                            $countid = count($emaillist); 
                                            $nameemail = explode('?', $mail);
                                            @endphp
                                            <tr>
                                                <td class=""><div class="h6">{{$key+1}}</div></td>
                                                <td class="">{{$nameemail[0]}}</td>
                                                <td><span class="flex"><img class="img-fluid" src="{{asset('assets/images/phne-iconn.png')}}">{{$nameemail[1]}}</span></td>
                                                <td class="text-center text-primary">
                                                    @if(have_premission(array(145)))
                                                    <a href="javascript:void(0)" data-usernumber="{{$nameemail[1]}}" data-username="{{$nameemail[0]}}" data-project_id="{{$ProjectData->id}}" class="sendtesttextuser"> Send Test SMS > 
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div id="addmodel">
                        <div class="modal myModal-add" aria-hidden="true" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <div class="popup-top-two">Add New</div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mr-auto col-md-8 ml-auto">
                                                <form action="{{url('/admin/addnewownerusertext')}}" method="post" id="addnewuserform">
                                                    <input type="hidden" name="action" value="text">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="return_url" value="{{url()->current().'?ref=menu2'}}">
                                                    <input type="hidden" name="number" value="{{@$countid}}">
                                                    <input type="hidden" name="project_id" value="{{$ProjectData->id}}">
                                                    <div class=""><label for="owner_name" class="col-form-label">Full Name</label></div>
                                                    <div class=""><input type="text" name="owner_name" maxlength="50" class="form-control" placeholder="Name"></div>
                                                    <div class=""><label for="phones" class="col-form-label">Phone Number</label></div>
                                                    <div class=""><input type="text" name="phones" class="form-control form" id="emailid" placeholder="phone"></div>

                                                    <button type="submit" class="btn-preview float-right overbtnnone">Add</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if(have_premission(array(138)))
                    <div class="editor-footer w-100">                 
                        <a class="fancy-btn-reverse float-right" href="#" data-toggle="modal" data-target=".myModal-add">
                            <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                            </svg>
                            <span class="icon-white"><img src="{{asset('assets/images/add-user.png')}}"> </span> Add User
                            <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                            </svg>
                        </a>
                    </div> 
                    @endif
                </div>
            </div>

            <div id="menu3" class="tab-pane fade">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="left-panel-top-head-one">Related Videos</div>
                        <div id="video-box">
                            <div class="full-width">
                                <div class="thumbnail">
                                    <ul class="demo2">
                                        <li>
                                            <a href="http://www.youtube.com/watch?v=QBBWKvY-VDc"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-desc">
                                    <strong><a href="http://www.youtube.com/watch?v=QBBWKvY-VDc">The world booking scenario</a></strong>
                                    <p>Tommy handson</p>
                                    <p>39 views</p>
                                </div>
                            </div>
                            <div class="full-width">
                                <div class="thumbnail">
                                    <ul class="demo2">
                                        <li>
                                            <a href="https://www.youtube.com/watch?v=IoPx_rSicrM"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-desc">
                                    <strong><a href="https://www.youtube.com/watch?v=IoPx_rSicrM">Facebook Features</a></strong>
                                    <p>Tommy handson</p>
                                    <p>39 views</p>
                                </div>
                            </div>
                            <div class="full-width">
                                <div class="thumbnail">
                                    <ul class="demo2">
                                        <li>
                                            <a href="https://www.youtube.com/watch?v=z-OxzIC6pic"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-desc">
                                    <strong><a href="https://www.youtube.com/watch?v=z-OxzIC6pic">Computer Sciences</a></strong>
                                    <p>Tommy handson</p>
                                    <p>39 views</p>
                                </div>
                            </div>
                            <div class="full-width">
                                <div class="thumbnail">
                                    <ul class="demo2">
                                        <li>
                                            <a href="https://www.youtube.com/watch?v=5J5bDQHQR1g"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-desc">
                                    <strong><a href="https://www.youtube.com/watch?v=5J5bDQHQR1g">Artificial Intelligence</a></strong>
                                    <p>Tommy handson</p>
                                    <p>39 views</p>
                                </div>
                            </div>

                            <div class="full-width">
                                <div class="thumbnail">
                                    <ul class="demo2">
                                        <li>
                                            <a href="http://www.youtube.com/watch?v=QBBWKvY-VDc"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-desc">
                                    <strong><a href="http://www.youtube.com/watch?v=QBBWKvY-VDc">The world bok scenario</a></strong>
                                    <p>Tommy handson</p>
                                    <p>39 views</p>
                                </div>
                            </div>
                        </div>
                    </div>					

                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="right-content right-content-space-1">
                            <div id="video-box-one">
                                <h3 class="warning">Support</h3>
                                <div id="ytvideo2"></div>
                            </div>					
                        </div>
                    </div>
                </div>
            </div>


            <div id="menu4" class="tab-pane fade">
                <div class="right-content right-content-space fix-width">
                    <div class="header-title">
                        <h3 class="warning left-part">Contacts</h3>
                        @if(have_premission(array(137)))
                        <div class="right-part">
                            <span>Export Contacts</span>
                            <a href="#" class="icon-green" style="cursor:pointer;" class="icon-green" title="Export Contacts CSV">
                                <img src="{{asset('assets/images/print.svg')}}" />
                            </a>
                        </div>
                        @endif
                    </div>

                    <div class="editor-container">
                        <div class="simplebar" id="myElement">
                            <div class="dashboard-Contact-box">
                                <div class="table-responsive">
                                    <table class="table min-width1">
                                        <tbody>

                                            @foreach(@$contacts as $key => $cont)
                                            <tr>
                                                <td class=""><div class="h6">{{$key+1}}</div></td>
                                                <td class="">{{$cont->first_name ." ". $cont->last_name}}</td>
                                                <td><span class="flex"><img class="img-fluid" src="{{asset('assets/images/icon-4.jpg')}}"> {{$cont->email}}</span></td>
                                                <td><span class="flex"><img class="img-fluid" src="{{asset('assets/images/icon-7.jpg')}}"> &nbsp {{$cont->project_name}}</span></td>
                                                  <td class="text-center" width="12%">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$cont->id}}">View Detail</button>
                                            <div class="modal" id="myModal{{$cont->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <div class="popup-top-two">@if($cont->title){!!$cont->title!!}@endif @if($cont->full_name) {!!$cont->full_name!!} @else {!!$cont->first_name.' '.$cont->last_name!!} @endif</div>
                                                            <div class="table-box">
                                                                <table class="table table-striped table-nomargin no-margin">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Key</th>
                                                                            <th>Value</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                        $full_name = $cont->first_name.' '.$cont->last_name
                                                                        @endphp
                                                                        @foreach(json_decode(json_encode($cont)) as $k => $c)
                                                                        <tr>
                                                                            <td width="50%" height="30">{!!ucfirst(str_replace("_"," ",$k))!!}</td>
                                                                            <td width="50%" height="30">@if($k == "full_name" && $c == "") {!!$full_name!!} @else {!!$c!!} @endif </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                            </tr> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="pull-right">{!! $contacts->render() !!}</nav>
                    <div class="editor-footer w-100">

                    </div>        
                </div> 
            </div>


        </div>
    </section>
</div>












  <script type="text/javascript" src="{{asset('assets/js/jquery.youtubeplaylist.js')}}"></script>
  <script type="text/javascript">
    
        $(function() {
            $("ul.demo1").ytplaylist();
            $("ul.demo2").ytplaylist({addThumbs:true, autoPlay: false, holderId: 'ytvideo2'});
        });
    
</script>

<script>
    
    $(document).on('click', '#editbtnsection', function () {
    $("#edit_email_settings_section").toggle(500);
    $("#view_email_settings_section").hide(500);
    });
    
    $(document).on('click', '#backbutton', function () {
    $("#edit_email_settings_section").hide(500);
    $("#view_email_settings_section").toggle(500);
    });
    
   
    
      
$(document).on('click',"#submitadduser",function () {
    //var connectdomproid = $("#connectdomproid").val();
    var form_data = $("#addnewuserform").serializeArray();
    var _token = $('meta[name="csrf-token"]').attr('content');
     
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: site_url + "/admin/addnewownerusertext",
            type: 'post',
            //data: {domain_name:domain_name, project_id:connectdomproid, _token:_token},
            data: form_data,
            success: function (data) {
               
               if(data){
                   
                   
                   $('.addnewusertr').append(data);
                   $('.myModal-add').modal('hide');
                   
                   
                    swal({
                        title: "User added Successfully",
                        type: "success",
                        timer: 2000
                    });
                    setTimeout(function () { window.location.href = '{{url()->current().'?ref=menu2'}}'; }, 2000);
               }
        
            }
        });
    
}); 
    
    
    
    $(document).on('click', '.sendtesttextuser', function () {
        $("#loading").show();
            var project_id = $($(this)).attr('data-project_id');
            var username = $($(this)).attr('data-username');
            var usernumber = $($(this)).attr('data-usernumber');
            
//            var is_active = $($(this)).attr('data-is_active');
    
//    alert('useremail: '+useremail+" Project id: "+project_id+" username "+username);
//    throw new Error();
    element = $(this);
         $.ajax({
        url: site_url + "/admin/send_test_text_user_pm",
        type: 'post',
        data: {'username': username, 'usernumber': usernumber, 'project_id': project_id, '_token': CSRF_TOKEN},
        //data: {'id': id, 'form_name':form_name, '_token': CSRF_TOKEN},
        success: function (data) {
            $("#loading").hide(500);
            if(data == '1'){
                   swal({
                        title: "Test SMS Sent Successfully",
                        type: "success",
                        timer: 2000
                    });
                
            } else{
                
                swal({
                        title: "Sorry! SMS not sent",
                        type: "error",
                        timer: 2000
                    });
            } 
            
        }
       });
    
    
    });
    
    
    
    
   
    $(document).on('click', '.formsstatus', function () {
        $("#loading").show();
            var id = $($(this)).attr('data-project_id');
            var form_name = $($(this)).attr('data-form_name');
//            var is_active = $($(this)).attr('data-is_active');
    
    //alert('id: '+id+" Project id: "+project_id+" status "+is_active);
    //throw new Error();
    element = $(this);
         $.ajax({
        url: site_url + "/admin/changesiteformstatus",
        type: 'post',
//        data: {'id': id, 'is_active': is_active, 'project_id': project_id, '_token': CSRF_TOKEN},
        data: {'id': id, 'form_name':form_name, '_token': CSRF_TOKEN},
        success: function (data) {
            if(data === '1'){
                $(element).removeClass('btn btn-info');
                $(element).addClass('btn btn-primary');
                $(element).html('Linked');
                $(".dropdownitem").each(function(){
                    formname = $(this).attr('data-formname');
                    if(formname == form_name){
                       $(this).html('<img class="img-fluid" src="{{asset('assets/images/icon-1.jpg')}}">');
                    }
                });
                
                $("#loading").hide(500);
               
            }else{
                $(element).removeClass('btn btn-primary');
                $(element).addClass('btn btn-info');
                $(element).html('Unlinked');
                $(".dropdownitem").each(function(){
                   formname = $(this).attr('data-formname');
                   if(formname == form_name){
                       $(this).html('<img class="img-fluid" src="{{asset('assets/images/icon-2.jpg')}}">');
                   }
                });
                $("#loading").hide(500);
            } 
            
        }
       });
    
    
    });
    
    





 
    $(document).on('click', '.switchstatus, .switchtext, .switchwebsite', function () {
    var data_btntype = $($(this)).attr('data-btntype');
    $("#loading").show();
    dontknow = $(this);
         $.ajax({
        url: site_url + "/admin/chpastatustext",
        type: 'post',
        data: {'types': data_btntype, 'user_id': '{{Auth::user()->id}}', 'project_id': '{{@Session::get('session_last_project')[0]->id}}', '_token': CSRF_TOKEN},
        success: function (data) {
            if(data_btntype == 'statusbtn' && data === '1'){
                $(dontknow).removeClass('btn btn-info');
                $(dontknow).addClass('btn btn-primary');
                $(dontknow).html('Live');
                $("#view_email_toggle_section_status").html('Live');
                $("#loading").hide(500);
               
            }else if(data_btntype == 'statusbtn' && data === '0'){
                $(dontknow).removeClass('btn btn-primary');
                $(dontknow).addClass('btn btn-info');
                $(dontknow).html('Paused');
                $("#view_email_toggle_section_status").html('Paused');
                $("#loading").hide(500);
            } 
            
            if(data_btntype == 'textbtn' && data === '1'){
                $(dontknow).removeClass('btn btn-info');
                $(dontknow).addClass('btn btn-primary');
                $(dontknow).html('Set');
                $("#view_email_response_toggle_section_status").html('<img class="img-fluid" src="{{asset('assets/images/icon-1.jpg')}}">');
                $("#loading").hide(500);
               
            }else if(data_btntype == 'textbtn' && data === '0'){
                $(dontknow).removeClass('btn btn-primary');
                $(dontknow).addClass('btn btn-info');
                $(dontknow).html('Not set');
                $("#view_email_response_toggle_section_status").html('<img class="img-fluid" src="{{asset('assets/images/icon-2.jpg')}}">');
                $("#loading").hide(500);
            } 
            
            if(data_btntype == 'websitebtn' && data === '1'){
                $(dontknow).removeClass('btn btn-info');
                $(dontknow).addClass('btn btn-primary');
                $(dontknow).html('Linked');
                $("#view_website_toggle_section_status").html('<img class="img-fluid" src="{{asset('assets/images/icon-1.jpg')}}">');
                $("#loading").hide(500);
               
            }else if(data_btntype == 'websitebtn' && data === '0'){
                $(dontknow).removeClass('btn btn-primary');
                $(dontknow).addClass('btn btn-info');
                $(dontknow).html('Unlinked');
                $("#view_website_toggle_section_status").html('<img class="img-fluid" src="{{asset('assets/images/icon-2.jpg')}}">');
                $("#loading").hide(500);
            } 
          }
       });
    
    
    });







    
    
    $(document).on('change', '#keys_selecter', function () {
        var selected_value = $(this).val();
        if (selected_value != '') {
            $('#apply_custom_filter').removeClass('display_button');
        } else {
            $('#apply_custom_filter').addClass('display_button');
        }
        var text_comparisons = '<option value="is">is the value</option><option value="not">is not the value</option><option value="contains">contains the value</option><option value="notcontain">does not contain the value</option><option value="isempty">is empty</option><option value="isnotempty">is not empty</option>';
        var number_comparisons = '<option value="is">is the value</option><option value="not">is not the value</option><option value="greater">is greater than</option><option value="greatequal">is greater than or equal to</option><option value="lessequal">is less than or equal to</option><option value="less">is less than</option>';

        var date_comparisons = '<option value="is">is the value</option><option value="not">is not the value</option><option value="greater">is greater than</option><option value="greatequal">is greater than or equal to</option><option value="lessequal">is less than or equal to</option><option value="less">is less than</option>';

        var input_field = '<div class="input-group"><input type="text" class="form-control" id="search_value" placeholder="Enter Value"/><div class="input-group-btn"><button id="apply_custom_filter" class="btn btn-default" type="button">Add</button></div></div>';

        var data_type = $('#keys_selecter option[value="' + selected_value + '"]').attr('data-type');
        if (data_type == 'text') {
            $("#comparison_div").html('<select class="form-control" id="search_comparison">' + text_comparisons + '</select>');
            $("#value_div").html(input_field);
        } else if (data_type == 'date') {
            $("#comparison_div").html('<select class="form-control" id="search_comparison">' + date_comparisons + '</select>');
            $("#value_div").html(input_field);
        } else if (data_type == 'number') {
            $("#comparison_div").html('<select class="form-control" id="search_comparison">' + number_comparisons + '</select>');
            $("#value_div").html(input_field);
        }
    });
    $(document).on('click', '#apply_custom_filter', function () {
        if (($('#keys_selecter').val() != '' && $("#search_comparison").val() != '' && $("#search_value").val() != '') || ($('#keys_selecter').val() != '' && $("#search_comparison").val() == 'isempty') || ($('#keys_selecter').val() != '' && $("#search_comparison").val() == 'isnotempty')) {
            var keys_selecter = $('#keys_selecter').val();
            var keys_selecter_html = $('#keys_selecter option[value="' + keys_selecter + '"]').html();
            var compatison_operator = $("#search_comparison").val();
            var search_value = $("#search_value").val();
            var search_value_html = search_value;
            var search_key = keys_selecter;

            var hidden_fields = '<input type="hidden" class="search_key" name="search_key[]" value="' + search_key + '"><input type="hidden" name="comparison_op[]" class="comparison_op" value="' + compatison_operator + '"><input type="hidden" name="search_value[]" class="search_value" value="' + search_value + '">';

            var output_html = '<div class="contentmenu-filter">' + hidden_fields + '<a href="javascript:void(0)" class="contentmenu-filter-remove" title="Remove Filter"><i class="fa fa-times"></i></a><a href="javascript:void(0)" class="contentmenu-filter-edit" title="Edit Filter">' + keys_selecter_html + ' ' + compatison_operator + ' ' + search_value_html + '</a></div>';
            $("#filters_div").append(output_html);
            $('.editmode-open').remove();
            $("#filters_div").show();
            $("#comparison_div").html('');
            $("#value_div").html('');
            $('#keys_selecter').val('').trigger('change');
            $('.contentmenu-filter').removeClass('editmode-open');
        }
    });
    $("#add_new_email_list").on("hidden.bs.modal", function () {
        setTimeout(function () {
            $("#comparison_div").html('');
            $("#value_div").html('');
            $('#keys_selecter').val('').trigger('change');
            $('.contentmenu-filter').removeClass('editmode-open');
        }, 500);
    });
    $(document).on("click", ".contentmenu-filter-remove", function (e) {
        e.stopPropagation();
        $(this).parent('.contentmenu-filter').remove();
        if ($("#filters_div").html() == "") {
            $("#filters_div").hide();
        }
    });
    $(document).on("click", ".contentmenu-filter-edit", function () {
        var element = $(this).parent('.contentmenu-filter');
        var search_key = element.find('.search_key').val();
        var comparison_op = element.find('.comparison_op').val();
        var search_value = element.find('.search_value').val();
        setTimeout(function () {
            $('#keys_selecter').val(search_key).trigger('change');
            $("#search_comparison").val(comparison_op);
            $("#search_value").val(search_value);
            element.addClass('editmode-open');
        }, 200);
    });
</script>
@endsection