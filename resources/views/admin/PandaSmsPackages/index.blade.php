@extends('admin.layouts.app')

@section('content')

<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>Sms Packages</a>
            </li>
        </ul>
    </div>    
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
<div class="main_panel contentarea clearfix">
    <div class="white_box container-fluid clearfix">
        <div class="page-header"><h1>Sms Packages 
                @if(have_premission(array(108)))
                <a href="{{url('/admin/sms-packages/create')}}" class="btn btn-info pull-right">Add New SMS Package</a>
                @endif
            </h1></div>
        <div class="row" >
            <div class="col-md-12">
                <div class="box">
                    <div class="box-content">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <thead>
                                <tr>
                                   <th>   <center>Sr</center>  </th>
                                    <th>Messages P/M </th>
                                  <th>Custom Link Integration</th>
                                    <th>Custom SMS Reporting</th>
                                    <th>Individual Business Number</th>
                                    <th>Panda Sites</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php  $i = 1; ?>
                                @foreach($SmsPackages as $package) 
                                <tr>
                                  <td>Panda SMS {!!$i!!}</td>
                                   <?php $i++; ?>
                                 
                                    
                                    <td>@if($package->messages_per_m == -1){{'Unlimited'}} @elseif($package->messages_per_m >= 1)  {{$package->messages_per_m}} @else {{'None'}} @endif</td>
                                    
                                    <td>@if($package->custom_link_integration == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    <td>@if($package->custom_sms_reporting == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    <td>@if($package->individual_business_number == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    
                                    <td>@if($package->panda_sites == -1){{'Unlimited'}} @elseif($package->panda_sites >= 1)  {{$package->panda_sites}} @else {{'None'}} @endif</td>
                                    
                                   
                                   
                                   
                                   <td>@if($package->price > 0){!!'$'.$package->price!!} @else {{'Free'}}  @endif </td>
                                    
                                    
                                    <td>@if($package->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                    <td>
                                        @if(have_premission(array(109)))
                                        <a href="{{ url('/admin/sms-packages/'.$package->id.'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                        @endif
                                        @if(have_premission(array(110)))
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/sms-packages', $package->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete Package"></i>', ['class' => 'delete-form-btn']) !!}
                                        {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit']) !!}
                                        {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav class="pull-right">{!! $SmsPackages->render() !!}</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection