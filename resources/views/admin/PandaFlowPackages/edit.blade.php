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
        <div class="page-header"><h1>{!!$action!!} PandaFlow Package</h1></div>
        <div class="box">
            <div class="box-content">
                <form id="flowpackages-form" class="form-horizontal form-validate" action="{{url('/admin/flow-packages')}}" method="POST" novalidate="novalidate">
                    <div class="form_wrap">
                      
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$package['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="page_views_per_m">Page Views P/M </label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="page_views_per_m" id="no_of_funnels" value="@if (isset($package['page_views_per_m'])){!!$package['page_views_per_m']!!}@else{{0}}@endif" class=" form-control" data-rule-number="true" data-rule-required="true" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="snap_shots">Snap Shots</label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="snap_shots" id="no_of_funnels" value="@if(isset($package['snap_shots'])){!!$package['snap_shots']!!}@else{{0}}@endif" class=" form-control" data-rule-number="true" data-rule-required="true" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="screen_recordings">Screen recordings</label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="screen_recordings" id="no_of_funnels" value="@if(isset($package['screen_recordings'])){!!$package['screen_recordings']!!}@else{{0}}@endif" class=" form-control" data-rule-number="true" data-rule-required="true" aria-required="true">
                                </div>
                            </div>
                        </div>
                        

                       <div class="form-group">
                            <label for="months_of_recording" class="col-sm-4 control-label">months_of_recording</label>
                            <div class="col-sm-8">
                                <select name="months_of_recording"  class='form-control'>
                                   <option value="{!!0!!}">{{ 'Select a month'}}</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                    <option @if(isset($package['months_of_recording']) && $i == @$package['months_of_recording']) selected @endif value="{!!$i!!}">{!!$i!!}</option>
                                   @endfor
                                </select>
                            </div>
                        </div>

                       <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="split_tests">Split Tests</label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="split_tests" id="no_of_funnels" value="@if(isset($package['split_tests'])){!!$package['split_tests']!!}@else{{0}}@endif" class="form-control" data-rule-number="true" data-rule-required="true" aria-required="true" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="panda_sites">Panda Sites</label>
                                <div class="col-sm-8 error-container-custom">
                                    <input type="text" name="panda_sites" id="no_of_funnels" value="@if(isset($package['panda_sites'])){!!$package['panda_sites']!!}@else{{0}}@endif" class=" form-control" data-rule-number="true" data-rule-required="true" aria-required="true" >
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-4 control-label" for="price">Price</label>
                                <div class="col-sm-8 error-container-custom">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input class="form-control ui-wizard-content" name="price" id="price" placeholder="00.00"  data-rule-number="true" data-rule-required="true" aria-required="true" value="@if(isset($package['price'])){!!$package['price']!!}@else{{0}}@endif">
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
                                    <a href="{{url('/admin/flow-packages')}}" class="btn btn-default">Cancel</a>
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
