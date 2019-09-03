@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker3.min.css')}}">
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            @include('admin.pandapages.nav')
            <div class="clear20"></div>
            <div class="right-contentarea">
                <div class="inner-content clearfix">
                    <div class="stats_information">
                        <div id="ui-block-loader" style="display: none;"><img src="{{asset('frontend/images/loader.svg')}}"></div>
                        <div class="stats_information_inner">
                            <div class="stats_accordian">
                                <button type="button" class="btn filter_accordian"><i class="fa fa-filter"></i></button>
                                <button class="btn start_date" type="button"><i class="fa fa-calendar"></i> <strong>Starting</strong> <span id="starting_date"> {!!date('d/m/Y',strtotime('-1 Months'))!!}</span></button>
                                <button class="btn end_date" type="button"><i class="fa fa-calendar"></i> <strong>Ending</strong> <span id="ending_date"> {!!date('d/m/Y')!!}</span></button>
                            </div>
                            <div class="stats_content" style="display: none;">
                                <hr class="mrg_0">
                                <div class="clear20"></div>
                                <form id="stats_form">
                                    {{ csrf_field() }}
                                    <ul class="fiels_wrap">
                                        <li>
                                            <label for="">Start</label>
                                            <input name="start_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy" value="{!!date('d/m/Y',strtotime('-1 Months'))!!}">
                                        </li>
                                        <li>
                                            <label for="">End</label>
                                            <input name="end_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy" value="{!!date('d/m/Y')!!}">
                                        </li>
                                        <li>
                                            <label for="">Device Category</label>
                                            <select name="device_category" class="form-control device_category">
                                                <option value="">All</option>
                                                <option value="desktop">Desktop</option>
                                                <option value="mobile">Mobile</option>
                                            </select>
                                        </li>

                                    </ul>
                                    <div class="clear20"></div>
                                    <div class="text-right">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                            <button type="submit" class="btn btn-success">Apply Filter</button>
                                        </div>
                                        <button type="reset" class="btn btn-default">Clear</button>
                                    </div>
                                </form>	
                            </div>
                            <hr>
                            <div class="table-responsive">

                                <div class="tbl_wrap">
                                    <table class="table table-bordered">
                                        <colgroup><col width="30%"></colgroup>
                                        <thead>
                                            <tr class="pandastep">
                                                <th class="opt_ins"></th>
                                                <th class="pageviews" colspan="2">Pageviews</th>
                                                <th class="opt_ins" colspan="2">Opt-ins</th>
                                            </tr>
                                            <tr class="headers">
                                                <th class="opt_ins"></th>
                                                <th class="pageviews">All</th>
                                                <th class="pageviews">Unique</th>
                                                <th class="opt_ins">All</th>
                                                <th class="opt_ins">Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody id="stats_data">
                                            @foreach($pages as $page)
                                            <tr class="funnelstep">
                                                <td class="opt_ins"><i class="fa fa-fw fa-envelope"></i> {!!$page!!}</td>
                                                <td class="pageviews">{!!$pages_views[$page]!!}</td>
                                                <td class="pageviews">{!!$pages_unique_views[$page]!!}</td>
                                                <td class="opt_ins">{!!$thankyou!!}</td>
                                                <td class="opt_ins">@if($index == 0) 0.00 @else {!!number_format(($thankyou/$index)*100,2) !!} @endif %</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>	
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('frontend/js/bootstrap-datepicker.min.js')}}"></script>
<script>
$(document).ready(function () {
    $(".filter_accordian, .start_date, .end_date").click(function (event) {
        $(".stats_content").slideToggle();
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