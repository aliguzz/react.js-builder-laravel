@extends('admin.layouts.app')
@section('content')
@php
$segment3 = Request::segment(3);
@endphp
<link rel="stylesheet" href="{{asset('frontend/css/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
<div class="clear20"></div>
<section class="contentarea">
    <div class="container-fluid">
        
        <div class="page-header">
            <h1>{{ucwords(str_replace('-', ' ', $segment3))}} Payment History</h1>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-content">
                        <div class="table-responsive">
                            <table class="table table-hover no-margin table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Payment Type</th>
                                        <th>Amount Paid</th>
                                        <th>Card #</th>
                                        <th>Payment Status</th> 
                                        <th>Payment Datetime</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $key=>$item)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td>{{ $item->payment_type}}</td>
                                        <td>£{{ number_format($item->payment_amount, 2) }}</td>
                                        <td>{{ $item->card_no }}</td>
                                                                                             
                                        <td a>@if($item->payment_status == 'success') <label class="label label-success">Success</label> @else <label class="label label-danger">Pending</label> @endif</td>
                                       <td>{{ date('d-M-Y h:i:s A',strtotime($item->payment_datetime)) }}</td>
                                        
                                    </tr>
                                    @endforeach  
                                    @if (count($rows) == 0)
                                    <tr><td colspan="6"><div class="no-record-found alert alert-warning">No Payments found!</div></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <a href="{{URL::previous()}}" class="btn btn-default">Go Back</a>
                        <nav class="pull-right">{!! $rows->render() !!}</nav>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>


@endsection