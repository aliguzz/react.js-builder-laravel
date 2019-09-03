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
            @include('admin.pandamails.nav')
            <form id="dateForm" method="get" action="{{url('/admin/email-broadcast')}}" class="">
            <div class="right-contentarea">
                <div class="header2 clearfix">
                    <h2 class="pull-left"><i class="fa fa-calendar"></i> Showing Records For {{(isset($_GET['text']))? $_GET['text'] : ' All Time'}}</h2>
                    
                    <input type="hidden" name="text" value="" id="text"  />
                    
                      <div class="Report_Days pull-right">
                        <label>Show Stats for:</label>
                        <select name="date_period" id="SelectDatePeriod" class="form-control">
                            <option value="">All Time</option>
                            <option value="{!!date('m/d/Y').' - '.date('m/d/Y')!!}" {{(isset($_GET['text']) && $_GET['text'] == 'Today')? 'selected' : ''}}>Today</option>
                            <option value="{!!date('m/d/Y', strtotime('-1 Day')).' - '.date('m/d/Y', strtotime('-1 Day'))!!}" {{(isset($_GET['text']) && $_GET['text'] == 'Yesterday')? 'selected' : ''}}>Yesterday</option>
                            <option value="{!!$start_date_tw.' - '.$end_date_tw!!}" {{(isset($_GET['text']) && $_GET['text'] == 'This Week')? 'selected' : ''}}>This Week</option>
                            <option value="{!!$start_date_lw.' - '.$end_date_lw!!}" {{(isset($_GET['text']) && $_GET['text'] == 'Last Week')? 'selected' : ''}}>Last Week</option>
                            <option value="{!!date('m/d/Y', strtotime('-7 Days')).' - '.date('m/d/Y')!!}" {{(isset($_GET['text']) && $_GET['text'] == 'Last 7 Days')? 'selected' : ''}}>Last 7 Days</option>
                            <option value="{!!date('m') . '/01/' . date('Y').' - '.date('m/d/Y')!!}" {{(isset($_GET['text']) && $_GET['text'] == 'This Month')? 'selected' : ''}}>This Month</option>
                            <option value="{!!date('m/d/Y', strtotime('first day of last month')).' - '.date('m/d/Y', strtotime('last day of last month'))!!}" {{(isset($_GET['text']) && $_GET['text'] == 'Last Month')? 'selected' : ''}}>Last Month</option>
                            <option value="{!!date('m/d/Y', strtotime('-30 Days')).' - '.date('m/d/Y')!!}" {{(isset($_GET['text']) && $_GET['text'] == 'Last 30 Days')? 'selected' : ''}}>Last 30 Days</option>
                            
                            <option value="{!!'01/01/' . date('Y').' - '.date('m/d/Y')!!}" {{(isset($_GET['text']) && $_GET['text'] == 'This Year')? 'selected' : ''}}>This Year</option>
                            <option value="{!!'01/01/' . date('Y', strtotime('-1 year')).' - '.'12/31/' . date('Y', strtotime('-1 year'))!!}" {{(isset($_GET['text']) && $_GET['text'] == 'Last Year')? 'selected' : ''}}>Last Year</option>
                            <option value="{!!date('m/d/Y', strtotime('-365 Days')).' - '.date('m/d/Y')!!}" {{(isset($_GET['text']) && $_GET['text'] == 'Last 365 days')? 'selected' : ''}}>Last 365 days</option>
                        </select>
                    </div>	
                </div>
                <div class="clearfix"></div>
                <div class="inner-content clearfix">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="dash_column">
                                <div class="dash_statcolumn">
                                    <h3>
                                        Sent Emails<i class="fa fa-question-circle" data-placement="right" data-toggle="tooltip" title="all unique leads"></i>
                                    </h3>	
                                    <span class="numberFormat">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="dash_column">
                                <div class="dash_statcolumn">
                                    <h3>
                                        CLICKS<i class="fa fa-question-circle" data-placement="right" data-toggle="tooltip" title="all unique leads"></i>
                                    </h3>	
                                    <span class="numberFormat green">+ 0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="dash_column">
                                <div class="dash_statcolumn">
                                    <h3>
                                        UNSUBSCRIBERS<i class="fa fa-question-circle" data-placement="right" data-toggle="tooltip" title="all unique leads"></i>
                                    </h3>	
                                    <span class="numberFormat red">- 0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear20"></div>
                    <div class="panda_search">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                    <div id="custom-search-input">
                                        <input class="  search-query form-control" placeholder="Search Broadcasts by email and subject line..." type="text" name="keyword" value="{{(isset($_GET['keyword']))? $_GET['keyword'] : ''}}">
                                        <button class="btn btn-defalut" type="submit">
                                            <span class=" glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                                
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a class="btn ad_new" href="{{URL('admin/new-email-broadcast')}}" title="Add New">
                                    <i class="fa fa-plus-square"></i> New Email Broadcast
                                </a>
                            </div>	
                        </div>	
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Subject Line</th>
                                    <th>Email Template</th>
                                    <th>Email</th>
                                    <th>Delivery Status</th>
                                    <th>Delivery Datetime</th>
<!--                                    <th></th>
-->                                </tr>
                            </thead>
                            <tbody>
                             @foreach($emails as $item)
                              <tr>
                                <td>{{ $item->subject_line }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ ($item->is_send == 1)? 'Delivered' : 'Pending' }}</td>
                                <td>{{ date('d-M-Y h:i:s A',strtotime($item->sending_datetime)) }}</td>
                                <!--<td><a href="{{ url('/admin/email-sequence-steps/'.$item->id)}}"><i class="fa fa-edit fa-fw"></i></a></td>-->
                                </tr>
                              @endforeach  
                              
                              @if (count($emails) == 0)
                                    <tr>
                                    <td colspan="3" align="center">YOU CURRENTLY HAVE NO EMAIL SEQUENCE...</td>
                                </tr>
                                    @endif   
                            </tbody>
                        </table>
                    </div>
                    <nav class="pull-right">{!! $emails->appends(request()->query())->render() !!}</nav>
                    
                </div>
            </div>
            
            
            </form>
            
            
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
		
			$("#SelectDatePeriod").change(function(){
			   $("#text").val($('#SelectDatePeriod option:selected').text());
			   $('#dateForm').submit();
			});
			
			$("#dateForm").submit(function(){
			   
			   $("#text").val($('#SelectDatePeriod option:selected').text());
			
			});
    });
</script>
@endsection