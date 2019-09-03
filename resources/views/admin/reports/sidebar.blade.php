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
<form id="search-sidebarform" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Report  </label>
        <select class="form-control select2-me" name="select_report" id="select_report">
            <!-- <option value="">Select...</option> -->
            @if(have_premission(array(64)))
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 5) echo 'selected'; ?> value="5">Lead Total Summary Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 6) echo 'selected'; ?> value="6">Lead Daily Summary Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 7) echo 'selected'; ?> value="7">Lead Weekday Report   </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 8) echo 'selected'; ?> value="8">Lead Hourly Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 9) echo 'selected'; ?> value="9">Lead Introducer Report   </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 10) echo 'selected'; ?> value="10">Lead Referral Partner Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 11) echo 'selected'; ?> value="11">Lead Group Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 12) echo 'selected'; ?> value="12">Lead Type Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 13) echo 'selected'; ?> value="13">Lead Status Report   </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 14) echo 'selected'; ?> value="14">Lead Assigned User Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 15) echo 'selected'; ?> value="15">Lead Postcode Report </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 17) echo 'selected'; ?> value="17">Status Change Summary Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 18) echo 'selected'; ?> value="18">Status Change User Report </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 19) echo 'selected'; ?> value="19">Status Change Current Status Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 20) echo 'selected'; ?> value="20">Status Change Detail Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 27) echo 'selected'; ?> value="27">Marketing Summary Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 28) echo 'selected'; ?> value="28">Marketing Detail Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 29) echo 'selected'; ?> value="29">Marketing Site Report  </option>
            @endif
            @if(have_premission(array(65)))
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 21) echo 'selected'; ?> value="21">User Activity Report </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 23) echo 'selected'; ?> value="23">User Event Report </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 24) echo 'selected'; ?> value="24">Letter Detail Report   </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 25) echo 'selected'; ?> value="25">Email Detail Report  </option>
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 26) echo 'selected'; ?> value="26">Text Detail Report  </option>
            @endif
            @if(have_premission(array(66)))
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 31) echo 'selected'; ?> value="31">Partner Transaction Report </option>
            @endif
            @if(have_premission(array(67)))
            <option <?php if (Session::has('select_report') && Session::get('select_report') == 1) echo 'selected'; ?> value="1">ROI Summary Report </option>
            <!--  <option value="2">ROI Assigned User Report  </option>
             <option value="3">ROI Introducer Report  </option> -->
            @endif
        </select>
    </div>
    <hr>
    <div class="form-group">
        <label>Date Range</label>
        <select class="form-control select2-me" id="SelectDatePeriod">
            <option value="">All Time</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m/d/Y') . ' - ' . date('m/d/Y')) echo 'selected'; ?> value="{!!date('m/d/Y').' - '.date('m/d/Y')!!}">Today</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m/d/Y', strtotime('-1 Day')) . ' - ' . date('m/d/Y', strtotime('-1 Day'))) echo 'selected'; ?> value="{!!date('m/d/Y', strtotime('-1 Day')).' - '.date('m/d/Y', strtotime('-1 Day'))!!}">Yesterday</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == $start_date_tw . ' - ' . $end_date_tw) echo 'selected'; ?> value="{!!$start_date_tw.' - '.$end_date_tw!!}">This Week</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == $start_date_lw . ' - ' . $end_date_lw) echo 'selected'; ?> value="{!!$start_date_lw.' - '.$end_date_lw!!}">Last Week</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m/d/Y', strtotime('-14 Days')) . ' - ' . date('m/d/Y', strtotime('-7 Days'))) echo 'selected'; ?> value="{!!date('m/d/Y', strtotime('-14 Days')).' - '.date('m/d/Y', strtotime('-7 Days'))!!}">Last 7 Days</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m') . '/01/' . date('Y') . ' - ' . date('m/d/Y')) echo 'selected'; ?> value="{!!date('m') . '/01/' . date('Y').' - '.date('m/d/Y')!!}">This Month</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m/d/Y', strtotime('first day of last month')) . ' - ' . date('m/d/Y', strtotime('last day of last month'))) echo 'selected'; ?> value="{!!date('m/d/Y', strtotime('first day of last month')).' - '.date('m/d/Y', strtotime('last day of last month'))!!}">Last Month</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m/d/Y', strtotime('-30 Days')) . ' - ' . date('m/d/Y')) echo 'selected'; ?> value="{!!date('m/d/Y', strtotime('-30 Days')).' - '.date('m/d/Y')!!}">Last 30 Days</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == $start_date_tq . ' - ' . $end_date_tq) echo 'selected'; ?> value="{!!$start_date_tq.' - '.$end_date_tq!!}">This Quarter</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == $start_date_lq . ' - ' . $end_date_lq) echo 'selected'; ?> value="{!!$start_date_lq.' - '.$end_date_lq!!}">Last Quarter</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m/d/Y', strtotime('-90 Days')) . ' - ' . date('m/d/Y')) echo 'selected'; ?> value="{!!date('m/d/Y', strtotime('-90 Days')).' - '.date('m/d/Y')!!}">Last 90 Days</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m/d/Y', strtotime('-6 Months')) . ' - ' . date('m/d/Y')) echo 'selected'; ?> value="{!!date('m/d/Y', strtotime('-6 Months')).' - '.date('m/d/Y')!!}">Last 6 Months</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == '01/01/' . date('Y') . ' - ' . date('m/d/Y')) echo 'selected'; ?> value="{!!'01/01/' . date('Y').' - '.date('m/d/Y')!!}">This Year</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == '01/01/' . date('Y', strtotime('-1 year')) . ' - ' . '12/31/' . date('Y', strtotime('-1 year'))) echo 'selected'; ?> value="{!!'01/01/' . date('Y', strtotime('-1 year')).' - '.'12/31/' . date('Y', strtotime('-1 year'))!!}">Last Year</option>
            <option <?php if (Session::has('created_at') && Session::get('created_at') == date('m/d/Y', strtotime('-365 Days')) . ' - ' . date('m/d/Y')) echo 'selected'; ?> value="{!!date('m/d/Y', strtotime('-365 Days')).' - '.date('m/d/Y')!!}">Last 365 days</option>

        </select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control daterangepick" name="created_at" value="{{@Session::get('created_at')}}" id="search_range"/>
    </div>

    <hr>

    <div class="clearfix">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#moreoptions" id="add_filter" class="btn btn-info"><i class="fa fa-plus"></i> Add Filter</a>
        <a href="javascript:void(0)" onclick="perform_search(0, 0);" class="btn btn-info">Run Report</a>
    </div>
</form>  