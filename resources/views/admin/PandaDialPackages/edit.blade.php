@extends('admin.layouts.app')

@section('content')
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>

<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{url('/admin/panda-dial')}}">PandaDial Packages</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>{!!$action!!} PandaDial Package</a>
            </li>
        </ul>
    </div>    
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>

<div class="main_panel contentarea clearfix">
    <div class="white_box container-fluid clearfix">
        <div class="page-header"><h1>{!!$action!!} PandaDial Package</h1></div>
        <div class="box">
            <div class="box-content">
                <form id="dialpackages-form" class="form-horizontal form-validate" action="{{url('/admin/dial-packages')}}" method="POST" >
                    <div class="form_wrap">
                       <!-- <div class="form-group">
                            <label class="col-sm-4 control-label" for="title">Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Package Name" data-rule-required="true" data-rule-minlength="5" aria-required="true" value="{!!@$package['title']!!}"/>
                            </div>
                        </div>-->
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$package['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="segment_title">Title</label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="segment_title" id="no_of_funnels" value="@if (isset($package['segment_title'])) {!!$package['segment_title']!!} @else 0 @endif" class="form-control" data-rule-required="true" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="instant_deployment_24h">Instant Deployment</label>
                            <div class="col-sm-8">
                                <input type="radio" name="instant_deployment_24h" value="1" @if(!isset($package['instant_deployment_24h']) || $package['instant_deployment_24h'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="instant_deployment_24h" value="0"  @if(isset($package['instant_deployment_24h']) && $package['instant_deployment_24h'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="auto_attend">Auto Attend</label>
                            <div class="col-sm-8">
                                <input type="radio" name="auto_attend" value="1" @if(!isset($package['auto_attend']) || $package['auto_attend'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="auto_attend" value="0"  @if(isset($package['auto_attend']) && $package['auto_attend'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="call_queues">Call Queues</label>
                            <div class="col-sm-8">
                                <input type="radio" name="call_queues" value="1" @if(!isset($package['call_queues']) || $package['call_queues'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="call_queues" value="0"  @if(isset($package['call_queues']) && $package['call_queues'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="call_recording">Call Recording</label>
                            <div class="col-sm-8">
                                <input type="radio" name="call_recording" value="1" @if(!isset($package['call_recording']) || $package['call_recording'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="call_recording" value="0"  @if(isset($package['call_recording']) && $package['call_recording'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="fully_integrated_with_control_panda">Integrated with Control Panda</label>
                            <div class="col-sm-8">
                                <input type="radio" name="fully_integrated_with_control_panda" value="1" @if(!isset($package['fully_integrated_with_control_panda']) || $package['fully_integrated_with_control_panda'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="fully_integrated_with_control_panda" value="0"  @if(isset($package['fully_integrated_with_control_panda']) && $package['fully_integrated_with_control_panda'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="virtual_business_number">Virtual Business number</label>
                            <div class="col-sm-8">
                                <input type="radio" name="virtual_business_number" value="1" @if(!isset($package['virtual_business_number']) || $package['virtual_business_number'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="virtual_business_number" value="0"  @if(isset($package['virtual_business_number']) && $package['virtual_business_number'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="pay_as_you_go_features">Pay As You Go Features</label>
                            <div class="col-sm-8">
                                <input type="radio" name="pay_as_you_go_features" value="1" @if(!isset($package['pay_as_you_go_features']) || $package['pay_as_you_go_features'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="pay_as_you_go_features" value="0"  @if(isset($package['pay_as_you_go_features']) && $package['pay_as_you_go_features'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="per_user_for_one_country">call package per user for one country</label>
                            <div class="col-sm-8">
                                <input type="radio" name="per_user_for_one_country" value="1" @if(!isset($package['per_user_for_one_country']) || $package['per_user_for_one_country'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="per_user_for_one_country" value="0"  @if(isset($package['per_user_for_one_country']) && $package['per_user_for_one_country'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="geographical_number">Geographical number</label>
                            <div class="col-sm-8">
                                <input type="radio" name="geographical_number" value="1" @if(!isset($package['geographical_number']) || $package['geographical_number'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="geographical_number" value="0"  @if(isset($package['geographical_number']) && $package['geographical_number'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="per_user_to_listed_countries">Outbound call package per user to all listed countries</label>
                            <div class="col-sm-8">
                                <input type="radio" name="per_user_to_listed_countries" value="1" @if(!isset($package['per_user_to_listed_countries']) || $package['per_user_to_listed_countries'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="per_user_to_listed_countries" value="0"  @if(isset($package['per_user_to_listed_countries']) && $package['per_user_to_listed_countries'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                       <!--<div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="div_class">Div Class</label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="div_class" id="div_class" value="@if (isset($package['div_class'])) {!!$package['div_class']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="price">Price</label>
                                <div class="col-sm-8 error-container-custom">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input class="form-control ui-wizard-content" name="price" id="price" placeholder="00.00"  data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error"  value="{!!@$package['price']!!}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="col-sm-4 control-label" for="rating">Rate</label>
                            <div class="col-sm-4 error-container-custom">
                                <select class="form-control" name="rating" id="rating">
                                    <option value="">Select Rating</option>
                                    @for($i=1; $i<=5; $i++)
                                    <option @if(isset($package['rating']) && $package['rating'] == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="is_active">Status</label>
                            <div class="col-sm-8">
                                <input type="radio" name="is_active" value="1" @if(!isset($package['is_active']) || $package['is_active'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="is_active" value="0"  @if(isset($package['is_active']) && $package['is_active'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-8 text-right">
                                    <a href="{{url('/admin/dial-packages')}}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>    
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
