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
                <a>PandaCRM Packages</a>
            </li>
        </ul>
    </div>    
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
<div class="main_panel contentarea clearfix">
    <div class="white_box container-fluid clearfix">
        <div class="page-header"><h1>PandaCRM Packages 
                @if(have_premission(array(112)))
                <a href="{{url('/admin/crm-packages/create')}}" class="btn btn-info pull-right">Add New PandaCRM Package</a>
                @endif
            </h1></div>
        <div class="row" >
            <div class="col-md-12">
                <div class="box">
                    <div class="box-content">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <thead>
                                <tr>
                                   <th>Title </th>
                                  <th>Instant Deployment-24/7 </th>
                                  <th>Auto Attend</th>
                                    <th>Call Queues</th>
                                    <th>Call Recording</th>
                                    <th>Integrated with Control Panda</th>
                                    <th>Virtual Business number</th>
                                    <th>Price</th>
                                    
                                   
                                    
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($CrmPackages as $package) 
                                <tr>
                                  <td>{!!$package->segment_title!!}</td>
                                    
                                    <td>@if($package->instant_deployment_24h == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    
                                   
                                    <td>@if($package->auto_attend == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    
                                    
                                    <td>@if($package->call_queues == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    
                                    
                                    <td>@if($package->call_recording == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    
                                    
                                    <td>@if($package->fully_integrated_with_control_panda == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    
                                   
                                    <td>@if($package->virtual_business_number == 1){{'Available'}} @else {{'Not Available'}} @endif</td>
                                    
                                    <td>@if($package->price > 0) $ {!!$package->price!!} @else {{'Free'}}  @endif</td>
                                    
                                  
                                   
                                    
                                    <td>@if($package->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                    <td>
                                        @if(have_premission(array(113)))
                                        <a href="{{ url('/admin/crm-packages/'.$package->id.'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                        @endif
                                        @if(have_premission(array(114)))
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/crm-packages', $package->id],
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
                        <nav class="pull-right">{!! $CrmPackages->render() !!}</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection