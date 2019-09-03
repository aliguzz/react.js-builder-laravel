@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/plugins/datetimepicker/bootstrap-datetimepicker.css') }}">
<script src="{{ asset('js/plugins/datetimepicker/bootstrap-datetimepicker.js')}}"></script>
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>

<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.css') }}">
<script src="{{ asset('js/plugins/select2/select2.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/plugins/daterangepicker/daterangepicker.css') }}">
<script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('js/plugins/daterangepicker/moment.min.js')}}"></script>

<div class="breadcrumbs">
    <ul>
        <li>
            <a href="{{url('/admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="{{url('/admin/leads')}}">Reports</a>
        </li>
    </ul>
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
<div class="main_panel search_mainPanel clearfix">
	<div class="col-md-3 col-sm-5 col-xs-12 white_box search_panel clearfix">
    @include('admin.reports.sidebar')
    </div>
	<div class="col-md-9 col-sm-7 col-xs-12 white_box main_content clearfix">
        <div class="page-header"><h1>Reports
             <a style="margin-right:4px" id="export" href="javascript:void(0);" class="btn btn-warning pull-right display"><i class="fa fa-download" aria-hidden="true"></i> Export</a>
             <a style="margin-right:4px" id="print" href="javascript:void(0);" class="btn btn-danger pull-right display"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
             <a style="margin-right:4px" data-toggle="modal" data-target="#saved_reports" id="save"  href="javascript:void(0);" class="btn btn-primary pull-right">Saved Report</a>
             <a style="margin-right:4px" onclick="perform_search(0,0);"  href="javascript:void(0);" class="btn btn-primary pull-right">Run Report</a>
        </h1>
        </div>
         <div id="ui-block-loader" class="over-lay-ui-block" style="display:none;"><i class="fa fa-spinner fa-spin spin-big"></i></div>
        <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-content" id="response-table">
                  <div class="table-responsive">
                    <table class="table table-hover table-nomargin no-margin">
                        <tbody>
                            <tr>
                                <div class="no-record-found alert alert-warning">Your report is ready to run ..... </div>
                            </tr>
                        </tbody>
                    </table>
                   </div>
                   
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
