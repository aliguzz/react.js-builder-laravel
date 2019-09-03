@extends('admin.layouts.app')

@section('content')
@if(have_premission(array(3)))
@include('admin.sections.subheader')
@endif

@php 
$urisegment = @$_GET['ref'];
@endphp
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.highcharts.com/highcharts.js"></script>
<style>
    .dropdown-menu {
        min-width: auto; 
    }
    #feedback { font-size: 1.4em; }
    #selectable .ui-selecting { background: none; }
    #selectable .ui-selected { background: none; color: #7ab428; }
    #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #selectable tr { cursor:pointer; margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
    table tr td{ color: rgb(207, 206, 206);}
    svg.highcharts-root {
        height: auto;
    }

</style>
<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu4" class="tab-pane in">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="left-menu">
                            <div class="heading-title">Website Statistics</div>
                            <ul class="nav nav-tabs left-panel-menu">
                                @foreach($pages as $page)
                                <li><a data-toggle="tab" href="#{!!$page!!}">{!!$page!!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8">
                        <div class="tab-content">

                            @foreach($pages as $page)

                            <div id="{!!$page!!}" class="analytics-tabs tab-pane">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div id="container{!!$page!!}" style="height: 500px"></div>
                                        <script>
                                            var page_views{!!preg_replace("/[^ \w]+/", "", $page)!!} = [<?php foreach ($analytics[$page] as $an) { ?>{!! '[Date.UTC('.heighchart_date($an[0]).'), '.$an[1].'],'!!} <?php } ?>];
                                            var page_u_views{!!preg_replace("/[^ \w]+/", "", $page)!!} = [<?php foreach ($analytics[$page] as $an) { ?>{!! '[Date.UTC('.heighchart_date($an[0]).'), '.$an[2].'],'!!} <?php } ?>];
                                            $(function () {
                                            $('#container{!!$page!!}').highcharts({
                                            title: {
                                            text: '{!!ucfirst($page)!!} Page Analytics'
                                            },
                                                    xAxis: {
                                                    type: 'datetime',
                                                            dateTimeLabelFormats: {
                                                            day: '%e %b %y',
                                                            },
                                                            min:Date.UTC({!!heighchart_date(date("Ymd", strtotime("-1 Month")))!!}),
                                                            max:Date.UTC({!!heighchart_date(date("Ymd"))!!})
                                                    },
                                                    series: [{
                                                    name: 'Page Views',
                                                            data: page_views{!!preg_replace("/[^ \w]+/", "", $page)!!}
                                                    }, {
                                                    name: 'Page Unique Views',
                                                            data: page_u_views{!!preg_replace("/[^ \w]+/", "", $page)!!}
                                                    }]

                                            });
                                            });
                                        </script>
                                    </div>						
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
            <div id="menu9" class="tab-pane">
                <div class="right-content right-content-space fixed-width">
                    <div class="header-title">
                        <h3 class="warning left-part">Contacts</h3>
                        @if(have_premission(array(13)))
                        <div class="right-part">
                            <span>Export Contacts</span>
                            <a href="#" class="icon-green" style="cursor:pointer;" class="icon-green" title="Export Contacts CSV">
                                <img src="{{asset('frontend/images/print.svg')}}">
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="editor-dashboard-container">
                        <div class="dashboard-Contact-box">
                            <div class="table-responsive">
                                <table class="table min-width">
                                    @foreach($contacts as $key => $cont)
                                    <tr>
                                        <td><div class="h6">{{$key+1}}</div></td>
                                        <td>@if($cont->title){!!$cont->title!!}@endif @if($cont->full_name) {!!$cont->full_name!!} @else {!!$cont->first_name.' '.$cont->last_name!!} @endif</td>
                                        <td>
                                            <img class="img-fluid" src="{{asset('frontend/images/icon-4.jpg')}}">
                                            <span> {!!$cont->email!!}</span></td>
                                        <td> <img class="img-fluid" src="{{asset('frontend/images/icon-5.jpg')}}"> <span>{!!$cont->phone!!}</span></td>
                                        <td> <img class="img-fluid" src="{{asset('frontend/images/icon-6.jpg')}}"> <span>{!!$cont->ip_address!!}</span></td>
                                        <td> <img class="img-fluid" src="{{asset('frontend/images/icon-7.jpg')}}"> <span>{!!$cont->page_name!!}</span></td>
                                        <td>@if($cont->lead_status == 1)<img class="img-fluid" src="{{asset('frontend/images/icon-1.jpg')}}">  @else <img class="img-fluid" src="{{asset('frontend/images/icon-1.jpg')}}"> @endif</td>
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
                                                                        $full_name = $cont->first_name.' '.$cont->last_name;
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
                                </table>
                            </div>
                        </div>
                    </div>
                    <nav class="pull-right">{!! $contacts->render() !!}</nav>
                </div>
            </div>
            <div id="menu1" class="tab-pane @if($urisegment == '') @endif">

                <form action="{{ url('/admin/connect-domain')}}" id="connectdomainfrmdata" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" id="connectdomproid" value="{{$ProjectData->id}}"  />
                    <div class="right-content-space fix-width">
                        <div class="editor-domain-container-heading')}}">
                            <h3 class="Duplicate">Connect Domain</h3>
                        </div>


                        <div class="editor-domain-container">
                            <div class="domain-box">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody id="selectable">
                                            @foreach($domains as $key => $dom)
                                            <tr data-id="{!!$dom->id!!}" id="checkedd{!!$dom->id!!}">
                                                <td><div class="h6">{!!$key+1!!}</div></td>
                                                <td style="width:80%;">{!!$dom->name!!}</td>
                                                <td class="text-center" style="width:15%;">
                                                    <i class="far fa-check-circle" style="background-color:none;"></i>
                                                </td>
                                            </tr>


                                        <script>
                                            $(document).ready(function () {

                                            $('#checkedd{!!$dom->id!!}').click(function () {

                                            $('tr').children().css("color", "rgb(207, 206, 206) !important");
                                            $("#checkedd{!!$dom->id!!} td").css("color", "#7ab428");
                                            domain_name = $("tr#checkedd{!!$dom->id!!}").attr("data-id");
                                            //alert(varss);
                                            });
                                            });
                                        </script>                               


                                        @endforeach
                                        </tbody></table>
                                </div>

                            </div>
                        </div>                                            
                        <div class="editor-footer w-100 editor-domain-container-btn">
                            <button type="button" class="overbtnnone" id="connectiondomain">
                                <span class="fancy-btn-reverse float-right" title="">
                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                    Use Domain
                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                </span>
                            </button>
                            <a href="{{url('builder/'.$ProjectData->id)}}" class="btn-preview float-right">Preview</a>
                            <div class="domainpagination">
                                <nav class="pull-right">{!! $domains->render() !!}</nav>
                            </div>
                        </div> 
                    </div> 
                </form>
                <script>
                    $(document).ready(function(){
                    var string = '&ref=domains';
                    var final;
                    var above;
                    $('.domainpagination ul.pagination li a').each(function(index){
                    final = $(this).attr('href');
                    above = $(this).attr('href', final + string);
                    });
                    });
                </script>
            </div>
            <div id="menu2" class="tab-pane fade @if($urisegment == 'menu2' || $urisegment == '') active show @endif">
                <div class="right-content-space fix-width">
                    <form action="{{ url('/admin/update-site-info?ref=menu2')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="return_url" value="{{url('/admin/panda-pages/'.$ProjectData->id.'/edit?ref=menu2')}}"/>
                        <div class="editor-rename-container-heading')}}">
                            <h3 class="Duplicate">Rename Site</h3></div>
                        <div class="editor-rename-container">
                            <div class="objective-wrap">
                                <div class="Rename-box">

                                    <input type="hidden" name="action" value="rename"  />
                                    <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                                    Current Name<br>
                                    <input type="text" name="firstname" class="bg-primary" disabled="" placeholder="{{$ProjectData->site_name}}"><br>
                                    New Site Name
                                    <input type="text" name="site_name" placeholder="Example" value="" required="">

                                </div>
                            </div>
                        </div>
                        <div class="editor-footer w-100 editor-rename-container-btn">       
                            <button type="submit" class="overbtnnone">
                                <span class="fancy-btn-reverse float-right" title="">
                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                    Save
                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>                 
                </div>
            </div>

            <div id="menu3" class="tab-pane fade">
                <form action="{{ url('/admin/update-site-info')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="action" value="duplicate"  />
                    <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                    <input type="hidden" name="template" value="{{$ProjectData->template}}"  />
                    <input type="hidden" name="ind_id" value="{{$ProjectData->ind_id}}"  />
                    <div class="right-content-space fix-width">
                        <div class="editor-duplicate-container-heading')}}"><h3 class="Duplicate">Duplicate Site</h3></div>
                        <div class="editor-duplicate-container">
                            <div class="objective-wrap">
                                <div class="duplicate-box">
                                    Enter Duplicate Site Name<br>
                                    <input type="text" name="site_name" value="" id="site_name" placeholder="Happy Life Hacks" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="editor-footer w-100 editor-duplicate-container-btn">
                            @if(checkUserProjects())
                            <button type="submit" class="overbtnnone">
                                <span class="fancy-btn-reverse float-right" href="#" title="">
                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                    Confirm
                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                </span>
                            </button>
                            @else
                                <button type="button" id="dup_btn" class="overbtnnone">
                                <span class="fancy-btn-reverse float-right" href="#" title="">
                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                    Confirm
                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                    </svg>
                                </span>
                            </button>
                            <script>
                                $(document).ready(function () {
                                $('#dup_btn').click(function () {
                                swal({
                                title: "Site Limit Exceeded. Please Upgrade Your Account",
                                        type: "error"
                                });
                                });
                                });
                            </script>
                            @endif
                        </div>
                    </div>
                </form>     

            </div>

            <div id="menu5" class="tab-pane fade @if($urisegment == 'menu5setting-tab-1' || $urisegment == 'menu5setting-tab-3' || $urisegment == 'menu5setting-tab-4') active show @endif">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="left-menu">
                            <div class="heading-title">Settings</div>
                            <ul class="nav nav-tabs left-panel-menu">
                                <li><a data-toggle="tab" href="#setting-tab-1" @if($urisegment == 'menu5setting-tab-1')  class="active show" @endif>Email Settings</a></li>
                                <li><a data-toggle="tab" href="#setting-tab-2" id="email_list_integrations" class="">Email List Integrations</a></li>
                                <li><a data-toggle="tab" href="#setting-tab-3" @if($urisegment == 'menu5setting-tab-3')  class="active show" @endif>SMS Settings</a></li>
                                <li><a data-toggle="tab" href="#setting-tab-4" @if($urisegment == 'menu5setting-tab-4')  class="active show" @endif>Domain Settings</a></li>
                                <li><a data-toggle="tab" href="#setting-tab-5" class="">Tracking Codes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8">
                        <div class="tab-content">
                            <div id="setting-tab-1" class="tab-pane @if($urisegment == 'menu5setting-tab-1')  active show @endif in">
                                <div class="email-setting">
                                    <form action="{{url('admin/add-action-leads')}}" method="post">

                                        {{csrf_field()}}
                                        <input type="hidden" name="return_url" value="{{url('admin/panda-pages/'.$ProjectData->id.'/edit?ref=menu5setting-tab-1')}}"  />
                                        <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                                        <input type="hidden" name="action" value="email"  />
                                        <div class="email-setting-head">Email Settings <p>(Enter the email address of all that will receive the enquiriess contact details.)</p></div>
                                        <div class="editor-dashboard-container dashboard-Contact-box">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody id="email_form_list">
                                                        
                                                        @if(isset($emailsdata->emails) && !empty($emailsdata->emails))
                                                        @php $emaillist = explode(',', $emailsdata->emails);@endphp
                                                        @foreach($emaillist as $key=>$mail)

                                                        <tr>
                                                            <td width="5%"><div class="h6">{{$key+1}}</div></td>
                                                            <td width="30%">
                                                                <input name="email[]" type="email" value="{{$mail}}" id="email1" placeholder="Enter the email address"/>
                                                            </td>
                                                            <td width="30%">
                                                                @if(have_premission(array(25)))
                                                                        <a href="javascript:void(0)" data-useremail="{{@$mail}}" data-username="{{$ProjectData->site_name}}" data-project_id="{{$ProjectData->id}}" data-return_url="{{url('admin/panda-pages/'.$ProjectData->id.'/edit?ref=menu5setting-tab-1')}}" class="sendtestemailuser"> Send Test Email > 
                                                                        </a>
                                                                        @endif
                                                            </td>
                                                            @if($key > 0)
                                                            <td width="30%" class="text-right"><a href="javascript:void(0)" class="remove-email-address"><i class="fas fa-minus-circle "></i> Remove Email</a></td>
                                                            @endif

<!--                                                              <td width="30%" class="text-right"></td>-->
                                                        </tr>

                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>

                                                <a href="javascript:void(0)" class="add-email-address">
                                                    <button type="button" class="btn btn-primary">
                                                        <i class="fas fa-plus-circle"></i> Add Email Address 
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="editor-footer w-100 editor-duplicate-container-btn">                 
                                            <button type="submit" class="overbtnnone">
                                                <span class="fancy-btn-reverse float-right" href="#" title="">
                                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                    Confirm Email Address
                                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div id="setting-tab-2" class="tab-pane fade">
                                <form>

                                    <div class="integrations-code">
                                        <h3 class="">Email List Integrations</h3>
                                        <div class="editor-duplicate-container">



                                            <div id="alreadyaddedintegrations">




                                                @foreach($pages_email_lists as $pel)

                                                <ul class="tag-editor btn-fild ui-sortable"> 
                                                    <li class="ui-sortable-handle contentmenu-filter"><div class="tag-editor-spacer">&nbsp;</div><div class="tag-editor-tag">{{$pel->action}} {{$pel->list_title}} - {{$pel->page_name}}</div><div class="tag-editor-delete contentmenu-filter-remove"><a data-id="{{$pel->id}}" href="javascript:void(0)"  title="Remove Filter"><i data-id="{{$pel->id}}" class="fa fa-times"></i></a></div></li>
                                                </ul>
                                                @endforeach
                                            </div>

                                            <div class="integrations-wrap">
                                                <div class="integrations-head">Action</div>
                                                <select id="action_list" name="action">
                                                    <option value="add_to">Add to List</option>
                                                    <option value="remove_from">Remove from list</option>
                                                </select>
                                                <div class="integrations-head">Select List</div>
                                                <select name="email_list_id" id="email_lists">
                                                    <option value="">-</option>
                                                </select>
                                                <div class="integrations-head">Pages</div>
                                                <select id="page_name" name="page_name">
                                                    @foreach($paged as $page)
                                                    <option value="{!!$page['name']!!}">{!!$page['name']!!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="editor-footer w-100 editor-duplicate-container-btn">                 
                                            <button type="submit" class="overbtnnone">
                                                <span class="fancy-btn-reverse float-right" href="#" title="">
                                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                    Save
                                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <script>
                                $(document).on('click', '#email_list_integrations', function () {
                                var project_id = '{!!$ProjectData->id!!}';
                                $.ajax({
                                type: 'GET',
                                        url: site_url + '/admin/get_email_lists',
                                        success: function (data) {
                                        $("#email_lists").html(data);
                                        }
                                });
                                $.ajax({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                        type: 'POST',
                                        url: site_url + '/admin/get_integrations',
                                        data: {'project_id': project_id},
                                        success: function (data) {
                                        var html = '';
                                        var data_obj = jQuery.parseJSON(data);
                                        $.each(data_obj, function (e, v) {

                                        html += '<ul class="tag-editor btn-fild ui-sortable"><li class="ui-sortable-handle contentmenu-filter"><div class="tag-editor-spacer">&nbsp;</div><div class="tag-editor-tag">' + v.action.replace("_", " ") + ' ' + v.list_title + ' - ' + v.page_name + '</div><div class="tag-editor-delete contentmenu-filter-remove"><a data-id="' + v.id + '" href="javascript:void(0)" title="Remove Filter"><i data-id="' + v.id + '" class="fa fa-times"></i></a></div></li></ul>';
                                        });
                                        $("#alreadyaddedintegrations").html(html);
                                        }
                                });
                                });
                                $(document).on('submit', '#setting-tab-2 form', function (e) {
                                var project_id = '{!!$ProjectData->id!!}';
                                var page_name = $("#page_name").val();
                                var email_list_id = $("#email_lists").val();
                                var action = $("#action_list").val();
                                $.ajax({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                        type: 'POST',
                                        url: site_url + '/admin/add_integrations',
                                        data: {project_id: project_id, page_name: page_name, email_list_id: email_list_id, action: action},
                                        success: function (data) {
                                        swal({
                                        title: "Email list integrated successfully",
                                                type: "success",
                                                timer: 2000
                                        });
                                        $.ajax({
                                        headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                                type: 'POST',
                                                url: site_url + '/admin/get_integrations',
                                                data: {'project_id': project_id},
                                                success: function (data) {
                                                var html = '';
                                                var data_obj = jQuery.parseJSON(data);
                                                $.each(data_obj, function (e, v) {
                                                html += '<ul class="tag-editor btn-fild ui-sortable"><li class="ui-sortable-handle contentmenu-filter"><div class="tag-editor-spacer">&nbsp;</div><div class="tag-editor-tag">' + v.action.replace("_", " ") + ' ' + v.list_title + ' - ' + v.page_name + '</div><div class="tag-editor-delete contentmenu-filter-remove"><a data-id="' + v.id + '" href="javascript:void(0)" title="Remove Filter"><i data-id="' + v.id + '" class="fa fa-times"></i></a></div></li></ul>';
                                                });
                                                $("#alreadyaddedintegrations").html(html);
                                                }
                                        });
                                        }
                                });
                                //$('#integrations-modal').modal('hide');
                                return false;
                                });
                                $(document).on("click", ".contentmenu-filter-remove", function (e) {
                                e.stopPropagation();
                                var element = $(this);
                                var id = $(".tag-editor-delete a").attr('data-id');
                                $.ajax({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                        type: 'POST',
                                        url: site_url + '/admin/remove_integrations',
                                        data: {'id': id},
                                        success: function (data) {
                                        element.parent('.contentmenu-filter').remove();
                                        }
                                });
                                });
                            </script>                                                    




                            <div id="setting-tab-3" class="tab-pane fade @if($urisegment == 'menu5setting-tab-3') active show @endif">
                                <div class="sms-settings">
                                    <form action="{{url('admin/add-action-leads')}}" method="post">

                                        {{csrf_field()}}
                                        <input type="hidden" name="return_url" value="{{url('admin/panda-pages/'.$ProjectData->id.'/edit?ref=menu5setting-tab-3')}}"  />
                                        <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                                        <input type="hidden" name="action" value="text"  />
                                        <div class="email-setting-head">SMS Settings <p>(Enter the mobile phone number of all that will receive the enquiries contact details.)</p></div>
                                        <div class="editor-dashboard-container dashboard-Contact-box">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody id="text_form_list">

                                                        @if(isset($textdata->phones) && $textdata->phones!= '')
                                                        @php $textlist = explode(',', $textdata->phones);@endphp
                                                        @foreach($textlist as $key=>$text)
                                                        <tr>
                                                            <td width="5%"><div class="h6">{{$key+1}}</div></td>
                                                            <td width="30%">
                                                                <input name="text[]" type="text" value="{{$text}}" id="text1" placeholder="Enter the phone number"/>
                                                            </td>
                                                            <td width="30%">
                                                                 @if(have_premission(array(145)))
                                                                        <a href="javascript:void(0)" data-usernumber="{{@$text}}" data-username="{{$ProjectData->site_name}}" data-project_id="{{$ProjectData->id}}" class="sendtesttextuser"> Send Test SMS > 
                                                                        </a>
                                                                        @endif
                                                            </td>
                                                            @if($key > 0)
                                                            <td width="30%" class="text-right"><a href="javascript:void(0)" class="remove-text-address"><i class="fas fa-minus-circle "></i> Remove Number</a></td>
                                                            @endif
                                                        </tr>

                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                                <a href="javascript:void(0)" class="add-text-address">
                                                    <button type="button" class="btn btn-primary">
                                                        <i class="fas fa-plus-circle"></i> Add Mobile Number </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="editor-footer w-100 editor-duplicate-container-btn">                 
                                            <button type="submit" class="overbtnnone">
                                                <span class="fancy-btn-reverse float-right" href="#" title="">
                                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                    Confirm Mobile Number
                                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div id="setting-tab-4" class="tab-pane fade @if($urisegment == 'menu5setting-tab-4') active show @endif">

                                <div class="domain-code">
                                    <form method="post" action="" id="formdatadomaction" >  
                                        {{csrf_field()}}
                                        <input type="hidden" id="returnurl" name="return_url" value="{{url('admin/panda-pages/'.$ProjectData->id.'/edit?ref=menu5setting-tab-4')}}"  />
                                        <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                                        <input type="hidden" name="action" value="settings" />
                                        <h3 class="">Domain Settings</h3>
                                        <div class="editor-duplicate-container">
                                            <div class="domain-wrap">
                                                <div class="domain-head">Domain</div>
                                                <select name="domain_id">
                                                    <option value="">Choose a domain</option>
                                                    @foreach($domains as $key => $dom)
                                                    <option value="{!!$dom->id!!}">{!!$dom->name!!}</option>
                                                    @endforeach
                                                </select>
                                                <div class="domain-head">Domain Status</div>
                                                <select name="domain_status">
                                                    <option value="0">Deactive</option>
                                                    <option value="1">Active</option>
                                                </select>
                                                <!--                                                <div class="domain-head">Assign Website</div>
                                                                                                <select name="project_id">
                                                                                                    <option value="{{$ProjectData->id}}">{!!ucfirst($ProjectData->template)!!} | {!!$ProjectData->t_cat_name!!}</option>
                                                                                                </select>-->
                                            </div>
                                        </div>
                                        <div class="editor-footer w-100 editor-duplicate-container-btn">
                                            <button type="button" class="overbtnnone">
                                                <span class="fancy-btn-reverse float-right" href="javascript:void(0)" id="clickdomsettings">
                                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                    Update
                                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>



                            <script>
                                $(document).ready(function () {

                                $("#clickdomsettings").click(function () {
                                //var connectdomproid = $("#connectdomproid").val();
                                var form_data = $("#formdatadomaction").serializeArray();
                                var _token = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                        url: "{{ url('/admin/settings-domain')}}",
                                        type: 'post',
                                        //data: {domain_name:domain_name, project_id:connectdomproid, _token:_token},
                                        data: form_data,
                                        success: function (data) {
                                        if (data == "1") {
                                        swal({
                                        title: "Domain Setting Saved Successfully",
                                                type: "success",
                                                timer: 2000
                                        });
                                        setTimeout(function () {
                                        window.location.href = $('#returnurl').val();
                                        }, 2000);
                                        }
                                        }
                                });
                                });
                                });
                            </script>





                            <div id="setting-tab-5" class="tab-pane fade">
                                <form action="{{url('admin/panda-pages/save-trackingcode')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="project_name" value="{{@$ProjectData->name}}">
                                    <div class="tracking-code">

                                        @foreach($paged as $page)    
                                        <h3 class="">Tracking Codes of {{ucfirst($page['name'])}} Page</h3>
                                        <div class="editor-duplicate-container">
                                            <input type="hidden" name="page_name[]" value="{{$page['name']}}"  />
                                            <div class="tracking-wrap">
                                                <h2>Head Tracking Code</h2>

                                                <textarea name="header_code[]" class="form-control" rows="3">{!!@$page['tc']->header_code!!}</textarea>

                                                <h6>Control Panda wide tracking code for the head tag</h6>
                                                <h2>Footer Tracking Code</h2>

                                                <textarea name="footer_code[]" class="form-control" rows="3">{!!@$page['tc']->footer_code!!}</textarea>

                                                <h6>Control Panda wide tracking codes for the body tag</h6>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="editor-footer w-100 editor-duplicate-container-btn">                 
                                            <button type="submit" class="overbtnnone">
                                                <span class="fancy-btn-reverse float-right" href="javascript:void(0)" id="clickdomsettings">
                                                    <svg class="fancy-btn-reverse-left" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                    Save
                                                    <svg class="fancy-btn-reverse-right" width="466" height="603" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu6" class="tab-pane fade">
                <div class="right-content-space">
                    <div class="editor-seo-container-heading">
                        <h3 class="">SEO <p>(How you optimize your site so that it can be easily found and ranked by search engines like Google and more.)</p></h3></div>
                    <div class="editor-seo-container">
                        <div class="seo-box">
                            <h4>SEO Status</h4>
                            <span>To get traffic from search engines to your site, this feature must be on.</span>
                            <div class="switch-buttons">
                                <div class="form-group">  
                                    <span class="switch switch-sm">
                                        <input type="checkbox" name="seoswitch" class="switch" id="switch-sm" value="">
                                        <label for="switch-sm" class="switch-toggle" data-on="On" data-off="Off"></label>
                                        <p>Allow search engines to include your site in search results</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>

                        $(document).ready(function () {

                        var url = site_url + '/storage/projects/{!!$user_id!!}/{!!$ProjectData->uuid!!}/robot.txt';
//                                            console.log(url);
                        $.get(url).done(function () {
                        $("#switch-sm").prop("checked", true);
                        }).fail(function () {
                        $("#switch-sm").prop("checked", false);
                        });
                        $("#switch-sm").change(function () {
                        var _token = $('meta[name="csrf-token"]').attr('content');
                        if ($("#switch-sm").prop("checked") === true) {
                        $("#loading").show();
                        var valuess = $("#switch-sm").prop("checked");
                        $.ajax({
                        url: site_url + "/admin/panda-pages/panda-seo-satus",
                                type: 'POST',
                                data: {'project_id': '{!!$ProjectData->id!!}', 'seo_status': valuess, _token: _token},
                                success: function (data) {
                                $("#loading").hide();
                                swal({
                                title: "Seo enabled Successfully",
                                        type: "success",
                                        timer: 2000
                                });
                                }
                        });
                        } else {

                        $("#loading").show();
                        var valuess = $("#switch-sm").prop("checked");
                        $.ajax({
                        url: site_url + "/admin/panda-pages/panda-seo-satus",
                                type: 'POST',
                                data: {'project_id': '{!!$ProjectData->id!!}', 'seo_status': valuess, _token: _token},
                                success: function (data) {
                                $("#loading").hide();
                                swal({
                                title: "Seo disabled Successfully",
                                        type: "error",
                                        timer: 2000
                                });
                                }
                        });
                        }
                        });
                        });
                    </script>
                    <div class="editor-seo-container-two">
                        <div class="row">
                            <div class="col-sm-7">
                                <h4>Get Found on Google</h4><br>
                                <span style="color:#fff">Boost your sites SEO with our step by step guide.</span>
                            </div>
                            <div class="col-sm-5">
                                <div class="trans-line-img">
                                    <img class="img-responsive img-trans" src="{{asset('assets/images/trans-line.png')}}" >
                                    <a class="btn btn-primary manage_button" href="{!!url('admin/panda-pages/'.$ProjectData->id.'/promote-seo')!!}" target="_blank">Get Found Online</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="editor-seo-container-heading">
                        <h3 class="">Manage 301 Redirects</h3></div>
                    <div class="editor-seo-container-three">
                        <div class="jumbotron"><h3>A 301 redirect is how visitors and search engines automatically find your new websites and pages.</h3></div>
                        <div class="inner-box">
                            <div class="left-side">
                                <h3>What is 301 Redirect?</h3>
                                <span>A 301 redirect simply tells search engines, “we’ve moved to a new location.�? Old site links get automatically forwarded to your new Panda pages, (e.g., the link to your old About page will lead to your new About page.</span>
                                <div style="margin-top:20px;">
                                    <h3>How does it work?</h3>
                                    <span>When a visitor or search engine goes to your old address, they’ll automatically be sent to your new page. Visitors will find your new pages and search engines will keep your ranking.</span>
                                </div>
                            </div>
                            <div class="right-side text-center">
                                <img class="img-fluid" src="{{asset('frontend/images/save-icon-1.jpg')}}"></div>
                        </div>
                    </div>
                    <div class="editor-seo-container-four">
                        <div class="row"> 
                            <div class="col-sm-7">
                                <h4 class="pages-text">Redirect pages from your old website to your new Control Panda site</h4>
                            </div>
                            <div class="col-sm-5 text-center">
                                <div class="trans-line-img">
                                    <img class="img-responsive img-trans" src="{{asset('assets/images/trans-line.png')}}" >
                                    <a class="btn btn-primary manage_button2 dropdown-toggle" href="{!!url('admin/panda-pages/'.$ProjectData->id.'/promote-seo')!!}" target="_blank">Manage Redirects Now</a>
                                </div>
                            </div>
                        </div>
                        <ul class="dropdown">
                            <div class="jumbotron"><h4>Create a 301 redirect: Add the old page address on the left and choose your new control panda page on the right.</h4></div>
                            <div class="page-info">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        <h6>Old Page:</h6>
                                        <form action="#">
                                            <input type="text" name="firstname" class="btn-fild" placeholder="/about-us">
                                        </form>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        <h6>Redirect to:</h6>
                                        <form action="#">
                                            <input type="text" name="firstname" class="btn-fild" placeholder="Select Page">
                                        </form>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <button type="button" class="btn btn-info">Save</button></div>
                                </div>
                                <span>Don’t see your page?
                                    <strong><a href="#" data-toggle="modal" data-target=".myModal-pop">Add it manually</a>
                                        <div class="modal myModal-pop">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <div class="popup-top">Enter Page URL</div>
                                                        <div class="popup-bottom">
                                                            <div class="jumbotron">
                                                                <h3>Add the URL of your old site and redirect it to the URL of your new ControlPanda site</h3>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                        <h6>Old Page:</h6>
                                                                        <form action="#">
                                                                            <input type="text" name="firstname" class="btn-fild" placeholder="/about-us">
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                        <h6>Redirect to:</h6>
                                                                        <form action="#">
                                                                            <input type="text" name="firstname" class="btn-fild" placeholder="Select Page">
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary">Save</button>
                                                                    <button type="button" class="btn btn-info">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </strong></span>
                            </div>
                            <div class="text-note">Note: Your 301 redirects will not work until you connect a domain.
                                <q>Connect Domain</q></div>
                    </div>
                    </ul>

                    </h4>
                </div>
            </div>
        </div>



    </section>
</div>


<script>
    $(document).ready(function () {

    $("#connectiondomain").click(function () {
    var connectdomproid = $("#connectdomproid").val();
    var form_data = $("#connectdomainfrmdata").serializeArray();
    var _token = $('meta[name="csrf-token"]').attr('content');
    if (domain_name != '') {
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{ url('/admin/connect-domain')}}",
            type: 'post',
            data: {domain_name: domain_name, project_id: connectdomproid, _token: _token},
            //data: form_data,
            success: function (data) {
            if (data == "1") {
            swal({
            title: "Domain Connected Successfully",
                    type: "success",
                    timer: 2000
            });
            setTimeout(function () {
            location.reload(true);
            }, 2000);
            }
            }
    });
    }
    });
    });</script>





<script>
    $(document).ready(function () {
        
        
        
        
    $(document).on('click', '.sendtestemailuser', function () {
        $("#loading").show();
            var project_id = $($(this)).attr('data-project_id');
            var username = $($(this)).attr('data-username');
            var useremail = $($(this)).attr('data-useremail');
            var return_url = $($(this)).attr('data-return_url');
            
//            var is_active = $($(this)).attr('data-is_active');
    
//    alert('useremail: '+useremail+" Project id: "+project_id+" username "+username);
//    throw new Error();
    element = $(this);
         $.ajax({
        url: site_url + "/admin/send_test_email_user_pp",
        type: 'post',
        data: {'username': username, 'return_url': return_url, 'useremail': useremail, 'project_id': project_id, '_token': CSRF_TOKEN},
        //data: {'id': id, 'form_name':form_name, '_token': CSRF_TOKEN},
        success: function (data) {
           if(data){
                   swal({
                        title: "Test Email Sent Successfully",
                        type: "success",
                        timer: 2000
                    });
                $("#loading").hide(500);
            } 
            
        }
       });
    
    
    });
    
    
       $(document).on('click', '.sendtesttextuser', function () {
        $("#loading").show();
            var project_id = $($(this)).attr('data-project_id');
            var username = $($(this)).attr('data-username');
            var usernumber = $($(this)).attr('data-usernumber');
            

    element = $(this);
         $.ajax({
        url: site_url + "/admin/send_test_text_user_pp",
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
        
        
        
        
    $(".filter_accordian, .start_date, .end_date").click(function (event) {
    $(".stats_content").slideToggle();
    });
    var email_count = <?php
if (isset($emailsdata->emails) && $emailsdata->emails != '') {
    $emaillist = explode(',', $emailsdata->emails);
    echo count($emaillist);
} else
    echo 0;
?>;
    var text_count = <?php
if (isset($textdata->phones) && $textdata->phones != '') {
    $textlist = explode(',', $textdata->phones);
    echo count($textlist);
} else
    echo 0;
?>;
    $(document).on('click', '.add-email-address', function () {
    email_count = email_count + 1;
    $("#email_form_list").append('<tr><td width="5%"><div class="h6">' + email_count + '</div></td><td width="30%"><input name="email[]" type="email" value="" id="email' + email_count + '" placeholder="Enter the email address"/></td><td width="30%">Submit form to send test email</td><td width="30%" class="text-right"><a href="javascript:void(0)" class="remove-email-address"><i class="fas fa-minus-circle"></i> Remove Email</a></td></tr>');
    });
    $(document).on('click', '.remove-email-address', function () {
    email_count1 = 0;
    $(this).parent().parent().remove();
    email_count = $("#email_form_list tr td .h6").length;
    $("#email_form_list tr td .h6").each(function () {
    email_count1 = email_count1 + 1;
    $(this).text(email_count1);
    });
    });
    $(document).on('click', '.add-text-address', function () {
    text_count = text_count + 1;
    $("#text_form_list").append('<tr><td width="5%"><div class="h6">' + text_count + '</div></td><td width="30%"><input name="text[]" type="text" value="" id="text' + text_count + '" placeholder="Enter the phone number"/></td><td width="30%">Submit form to send test SMS</td><td width="30%" class="text-right"><a href="javascript:void(0)" class="remove-text-address"><i class="fas fa-minus-circle"></i> Remove Number</a></td></tr>');
    });
    $(document).on('click', '.remove-text-address', function () {
    text_count1 = 0;
    $(this).parent().parent().remove();
    text_count = $("#text_form_list tr td .h6").length;
    $("#text_form_list tr td .h6").each(function () {
    text_count1 = text_count1 + 1;
    $(this).text(text_count1);
    });
    });
    });
    $("#stats_form").submit(function () {
    var form_data = $("#stats_form").serializeArray();
    $("#ui-block-loader").show();
    $.ajax({
    url: site_url + "/admin/panda-pages/{!!$ProjectData->id!!}/stats_ajax",
            type: 'POST',
            data: form_data,
            success: function (data) {
            $("#stats_data").html(data);
            $("#ui-block-loader").hide();
            }
    });
    return false;
    });
</script>


@endsection