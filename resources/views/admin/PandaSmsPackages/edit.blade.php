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
                <a href="{{url('/admin/packages')}}">Packages</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>{!!$action!!} Package</a>
            </li>
        </ul>
    </div>    
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>

<div class="main_panel contentarea clearfix">
    <div class="white_box container-fluid clearfix">
        <div class="page-header"><h1>{!!$action!!} Sms Package</h1></div>
        <div class="box">
            <div class="box-content">
                <form id="smspackages-form" class="form-horizontal form-validate" action="{{url('/admin/sms-packages')}}" method="POST" novalidate="novalidate">
                    <div class="form_wrap">
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$package['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="messages_per_m">SMS messages p/m</label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="messages_per_m" id="no_of_funnels" value="@if(isset($package['messages_per_m'])){!!$package['messages_per_m']!!}@else{{0}}@endif" class="form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="custom_link_integration">link integration</label>
                            <div class="col-sm-8">
                                <input type="radio" name="custom_link_integration" value="1" @if(!isset($package['custom_link_integration']) || $package['custom_link_integration'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="custom_link_integration" value="0"  @if(isset($package['custom_link_integration']) && $package['custom_link_integration'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="custom_sms_reporting">SMS reporting</label>
                            <div class="col-sm-8">
                                <input type="radio" name="custom_sms_reporting" value="1" @if(!isset($package['custom_sms_reporting']) || $package['custom_sms_reporting'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="custom_sms_reporting" value="0"  @if(isset($package['custom_sms_reporting']) && $package['custom_sms_reporting'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="individual_business_number">Individual business number</label>
                            <div class="col-sm-8">
                                <input type="radio" name="individual_business_number" value="1" @if(!isset($package['individual_business_number']) || $package['individual_business_number'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="individual_business_number" value="0"  @if(isset($package['individual_business_number']) && $package['individual_business_number'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="panda_sites">panda sites</label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="panda_sites" id="connect_domains" value="@if(isset($package['panda_sites'])){!!$package['panda_sites']!!}@else{{0}}@endif" class="form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="price">Price</label>
                                <div class="col-sm-8 error-container-custom">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input class="form-control ui-wizard-content" name="price" id="price" placeholder="00.00"  data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error"  
                                        value="{!!@$package['price']!!}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="is_active">Status</label>
                            <div class="col-sm-8">
                                <input type="radio" name="is_active" value="1" @if(!isset($package['is_active']) || $package['is_active'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="is_active" value="0"  @if(isset($package['is_active']) && $package['is_active'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-8 text-right">
                                    <a href="{{url('/admin/sms-packages')}}" class="btn btn-default">Cancel</a>
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
