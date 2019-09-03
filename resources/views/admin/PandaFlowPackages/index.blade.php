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
                <a>PandaFlow Packages</a>
            </li>
        </ul>
    </div>    
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
<div class="main_panel contentarea clearfix">
    <div class="white_box container-fluid clearfix">
        <div class="page-header"><h1>PandaFlow Packages 
                @if(have_premission(array(120)))
                <a href="{{url('/admin/flow-packages/create')}}" class="btn btn-info pull-right">Add New PandaFlow Package</a>
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
                                    <th>Page Views P/M </th>
                                  <th>Snap Shots</th>
                                    <th>Screen Recordings</th>
                                    <th>Months Of Recording</th>
                                    <th>Split Tests</th>
                                    <th>Panda Sites</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php  $i = 1; ?>
                                @foreach($FlowPackages as $package) 
                                <tr>
                                   <td>PandaFlow {!!$i!!}</td>
                                   <?php $i++; ?>

                                    <td>@if($package->page_views_per_m == -1){{'Unlimited'}} @elseif($package->page_views_per_m >= 1)  {{$package->page_views_per_m}} @else {{'None'}} @endif</td>
                                    
                                    
                                    
                                    <td>@if($package->snap_shots == -1){{'Unlimited'}} @elseif($package->snap_shots >= 1)  {{$package->snap_shots}} @else {{'None'}} @endif</td>
                                    
                                    
                                    
                                     <td>@if($package->screen_recordings == -1){{'Unlimited'}} @elseif($package->screen_recordings >= 1)  {{$package->screen_recordings}} @else {{'None'}} @endif</td>
                                    
                                    <td>{!!$package->months_of_recording!!}</td>
                                    
                                    
                                     <td>@if($package->split_tests == -1){{'Unlimited'}} @elseif($package->split_tests >= 1)  {{$package->split_tests}} @else {{'None'}} @endif</td>
                                     
                                   
                                     <td>@if($package->panda_sites == -1){{'Unlimited'}} @elseif($package->panda_sites >= 1)  {{$package->panda_sites}} @else {{'None'}} @endif</td>
                                     
                                   
                                    <td>@if($package->price > 0){!! '$'.$package->price!!} @else {{'Free'}}  @endif </td>
                                   
                                    
                                    <td>@if($package->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                    <td>
                                        @if(have_premission(array(121)))
                                        <a href="{{ url('/admin/flow-packages/'.$package->id.'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                        @endif
                                        @if(have_premission(array(122)))
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/flow-packages', $package->id],
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
                        <nav class="pull-right">{!! $FlowPackages->render() !!}</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection