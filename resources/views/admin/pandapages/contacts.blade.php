@extends('admin.layouts.app')
@section('content')
<div class="clear40"></div>
<?php

function x_week_range($date) {
    $ts = strtotime($date);
    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
    return array(date('m/d/Y', $start),
        date('m/d/Y', strtotime('next saturday', $start)));
}

function this_quater_range() {
    $current_month = date('m');
    $current_year = date('Y');
    if ($current_month >= 1 && $current_month <= 3) {
        $start_date = strtotime('01-January-' . $current_year);
        $end_date = strtotime('01-April-' . $current_year);
    } else if ($current_month >= 4 && $current_month <= 6) {
        $start_date = strtotime('01-April-' . $current_year);
        $end_date = strtotime('01-July-' . $current_year);
    } else if ($current_month >= 7 && $current_month <= 9) {
        $start_date = strtotime('01-July-' . $current_year);
        $end_date = strtotime('01-October-' . $current_year);
    } else if ($current_month >= 10 && $current_month <= 12) {
        $start_date = strtotime('01-October-' . $current_year);
        $end_date = strtotime('01-January-' . ($current_year + 1));
    }
    return array(date('m/d/Y', $start_date), date('m/d/Y', $end_date));
}

function last_quater_range() {
    $current_month = date('m');
    $current_year = date('Y');

    if ($current_month >= 1 && $current_month <= 3) {
        $start_date = strtotime('01-October-' . ($current_year - 1));
        $end_date = strtotime('01-January-' . $current_year);
    } else if ($current_month >= 4 && $current_month <= 6) {
        $start_date = strtotime('01-January-' . $current_year);
        $end_date = strtotime('01-April-' . $current_year);
    } else if ($current_month >= 7 && $current_month <= 9) {
        $start_date = strtotime('01-April-' . $current_year);
        $end_date = strtotime('01-July-' . $current_year);
    } else if ($current_month >= 10 && $current_month <= 12) {
        $start_date = strtotime('01-July-' . $current_year);
        $end_date = strtotime('01-October-' . $current_year);
    }

    return array(date('m/d/Y', $start_date), date('m/d/Y', $end_date));
}

list($start_date_tw, $end_date_tw) = x_week_range(date('m/d/Y'));
list($start_date_lw, $end_date_lw) = x_week_range(date('m/d/Y', strtotime('-7 Days')));
list($start_date_tq, $end_date_tq) = this_quater_range();
list($start_date_lq, $end_date_lq) = last_quater_range();
?>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            @include('admin.pandapages.nav')
            <div class="clearfix"></div>
            <div class="right-contentarea">
                <div class="header2 clearfix">
                    <h2 class="pull-left"><i class="fa fa-calendar"></i> Showing Contacts For</h2>

                    <div class="contact_day_filter">
                        <select name="date_period" id="SelectDatePeriod" class="form-control">
                            <option value="">All Time</option>
                            <option value="{!!date('m/d/Y').' - '.date('m/d/Y')!!}">Today</option>
                            <option value="{!!date('m/d/Y', strtotime('-1 Day')).' - '.date('m/d/Y', strtotime('-1 Day'))!!}">Yesterday</option>
                            <option value="{!!$start_date_tw.' - '.$end_date_tw!!}">This Week</option>
                            <option value="{!!$start_date_lw.' - '.$end_date_lw!!}">Last Week</option>
                            <option value="{!!date('m/d/Y', strtotime('-7 Days')).' - '.date('m/d/Y')!!}">Last 7 Days</option>
                            <option value="{!!date('m') . '/01/' . date('Y').' - '.date('m/d/Y')!!}">This Month</option>
                            <option value="{!!date('m/d/Y', strtotime('first day of last month')).' - '.date('m/d/Y', strtotime('last day of last month'))!!}">Last Month</option>
                            <option value="{!!date('m/d/Y', strtotime('-30 Days')).' - '.date('m/d/Y')!!}">Last 30 Days</option>
                            <option value="{!!$start_date_tq.' - '.$end_date_tq!!}">This Quarter</option>
                            <option value="{!!$start_date_lq.' - '.$end_date_lq!!}">Last Quarter</option>
                            <option value="{!!date('m/d/Y', strtotime('-90 Days')).' - '.date('m/d/Y')!!}">Last 90 Days</option>
                            <option value="{!!date('m/d/Y', strtotime('-6 Months')).' - '.date('m/d/Y')!!}">Last 6 Months</option>
                            <option value="{!!'01/01/' . date('Y').' - '.date('m/d/Y')!!}">This Year</option>
                            <option value="{!!'01/01/' . date('Y', strtotime('-1 year')).' - '.'12/31/' . date('Y', strtotime('-1 year'))!!}">Last Year</option>
                            <option value="{!!date('m/d/Y', strtotime('-365 Days')).' - '.date('m/d/Y')!!}">Last 365 days</option>
                        </select>
                    </div>

                    <div class="contact_day_filter pull-right">
                        <select name="page" id="page" class="form-control">
                            <option value="" disabled="" selected="" hidden="">Choose Page</option>
                            <?php
                            $directory = '../public/storage/projects/' . $user_id . '/' . $ProjectData->uuid . '/';
                            if (glob($directory . "*.html") != false) {
                                foreach (glob($directory . "*.html") as $pg) {
                                    $p = explode("/", $pg);
                                    $p = end($p);
                                    $p = explode(".", $p);
                                    echo '<option value="' . $p[0] . '">' . $p[0] . '</option>';
                                }
                            }
                            ?> 
                        </select>
                    </div>	
                </div>
                <div class="clearfix"></div>
                <div class="inner-content clearfix">
                    <div class="col-sm-9">
                        <div class="input-group Traffic_InputBlock">
                            <span class="input-group-addon" style="border-right:0px;">
                                <span class="fa fa-search"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Search Contacts by name or email..." name="search_keyword" id="search_keyword">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <a style="cursor: pointer;" id="export_leads" class="btn export-link display" ><i class="fa fa-download"></i>Download contacts</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div id="ui-block-loader" style="display: none;"><img src="{{asset('frontend/images/loader.svg')}}"></div>
                        @if(count($contacts)<=0)
                        <div class="contact_cnt text-center">
                            <h3>No Contacts Found</h3>
                            <p>
                                <em>Looks like you haven't collected any contacts for this panda page in the selected date range.</em>
                                <br><br>
                                Start by sending traffic to the beginning of this panda page or any opt-in page within this panda page. All your contacts will appear here to manage and view.
                            </p>
                        </div>
                        @else

                        <div id="response-table">
                            <div class="clear40"></div>
                            <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>IP Address</th>
                                        <th>Page</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach($contacts as $cont)
                                    <tr>
                                        <td>@if($cont->title){!!$cont->title!!}@endif @if($cont->full_name) {!!$cont->full_name!!} @else {!!$cont->first_name.' '.$cont->last_name!!} @endif</td>
                                        <td>{!!$cont->email!!}</td>
                                        <td>{!!$cont->phone!!}</td>
                                        <td>{!!$cont->ip_address!!}</td>
                                        <td>{!!$cont->page_name!!}</td>
                                        <td>@if($cont->lead_status == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                        <td>
                                            <a href="{{ url('admin/contacts/'.$cont->id)}}"><i class="fa fa-edit fa-fw"></i></a>
                                            <a target="_blank" href="{{ url('page/'.$cont->project_name)}}"><i class="fa fa-eye fa-fw"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav class="pull-right">{!! $contacts->render() !!}</nav>
                        </div>
                        @endif
                    </div>    
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<a style="opacity:0;" id="go-download" href=""></a>
<script>
    var search_link = site_url + "/admin/panda-pages/{!!$ProjectData->id!!}/contact-ajax";
    $(document).on('change', '#SelectDatePeriod', function () {
        search_link = site_url + "/admin/panda-pages/{!!$ProjectData->id!!}/contact-ajax";
        perform_search();
    });
    $(document).on('change', '#page_id', function () {
        search_link = site_url + "/admin/panda-pages/{!!$ProjectData->id!!}/contact-ajax";
        perform_search();
    });
    $(document).on('change', '#search_keyword', function () {
        search_link = site_url + "/admin/panda-pages/{!!$ProjectData->id!!}/contact-ajax";
        perform_search();
    });
    function perform_search() {
        $("#ui-block-loader").show();
        var search_data = {'date_period': $("#SelectDatePeriod").val(), 'page': $("#page").val(), 'search_keyword': $("#search_keyword").val(), '_token': CSRF_TOKEN};
        $.ajax({
            url: search_link,
            type: 'post',
            data: search_data,
            success: function (data) {
                $("#response-table").html(data);
                $("#ui-block-loader").hide();
                setTimeout(function () {
                    if ($('div.no-record-found').length > 0) {
                        $('.display').addClass('display_button');
                    } else {
                        $('.display').removeClass('display_button');
                    }
                }, 100);
            }
        });
    }
    $(document).on('click', '.pagination a', function () {
        search_link = $(this).attr('href');
        search_link = search_link.replace('contacts', 'contact-ajax');
        perform_search();
        return false;
    });
    $(document).on('click', '#export_leads', function () {
        $("#ui-block-loader").show();
        var search_data = {'date_period': $("#SelectDatePeriod").val(), 'search_keyword': $("#search_keyword").val(), '_token': CSRF_TOKEN};
        $.ajax({
            url: site_url + "/admin/panda-pages/{!!$ProjectData->id!!}/contact-export",
            type: 'post',
            data: search_data,
            success: function (data) {
                $("#go-download").attr('href', data);
                $("#go-download").get(0).click();
                $("#ui-block-loader").hide();
            }
        });
    });
</script>
@endsection