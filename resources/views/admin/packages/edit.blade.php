@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader') 
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<!--<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>-->


<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content-space fix-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h1>{!!$action!!} Package</h1></div>
                </div>

                <div class="box-content">
                    <form id="packages-form" class="form-horizontal form-validate" action="{{url('/admin/packages')}}" method="POST" novalidate="novalidate">
                    <div class="form_wrap border">
                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="title">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Package Name" data-rule-required="true" data-rule-minlength="2" aria-required="true" value="{!!@$package['title']!!}" required=""/>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$package['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="no_of_sites">Websites</label>
                            <div class="col-sm-12 error-container-custom">
                                <input type="text" name="no_of_sites" id="no_of_sites" value="@if (isset($package['no_of_sites'])) {!!$package['no_of_sites']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="cp_page_builder">CP Page Builder</label>
                            <div class="col-sm-12">
                                <input type="text" name="cp_page_builder" id="cp_page_builder" placeholder="# Of Pages" class="form-control" data-rule-required="true" data-rule-minlength="1" data-rule-number="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error" value="<?php if(isset($package['cp_page_builder'])){ echo $package['cp_page_builder'];}else{ echo 0; } ?>" required=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="free_premium_domain">Free Premium Domains</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="free_premium_domain" id="free_premium_domain"  class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error" value="@if (isset($package['free_premium_domain'])) {!!$package['free_premium_domain']!!} @else 0 @endif" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="connect_domains">Connect Domains</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="connect_domains" id="connect_domains" value="@if (isset($package['connect_domains'])) {!!$package['connect_domains']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="ssl_certificate">SSL Certificate</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="ssl_certificate" id="ssl_certificate" value="@if (isset($package['ssl_certificate'])) {!!$package['ssl_certificate']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="cp_forms">CP Forms</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="cp_forms" id="cp_forms" value="@if (isset($package['cp_forms'])) {!!$package['cp_forms']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="cp_lead_db">CP Lead Database</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="cp_lead_db" id="cp_lead_db" value="@if (isset($package['cp_lead_db'])) {!!$package['cp_lead_db']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="remove_cp_ads">Remove CP Sponsored Ads</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="remove_cp_ads" id="remove_cp_ads" value="@if (isset($package['remove_cp_ads'])) {!!$package['remove_cp_ads']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="storage">Storage</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="storage" id="storage" value="@if (isset($package['storage'])) {!!$package['storage']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="false" data-rule-required="false" aria-required="false" aria-invalid="false" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="bandwidth">Bandwidth</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="bandwidth" id="bandwidth" value="@if (isset($package['bandwidth'])) {!!$package['bandwidth']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="false" data-rule-required="false" aria-required="false" aria-invalid="false" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="zapier_integration">Zapier Integration</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="zapier_integration" id="zapier_integration" value="@if (isset($package['zapier_integration'])) {!!$package['zapier_integration']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="premium_templates">Premium Templates</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="premium_templates" id="premium_templates" value="@if (isset($package['premium_templates'])) {!!$package['premium_templates']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="leads_per_email">Leads per Cuctomer Email Response</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="leads_per_email" id="leads_per_email" value="@if (isset($package['leads_per_email'])) {!!$package['leads_per_email']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="leads_per_sms">Leads per Cuctomer SMS Response</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="leads_per_sms" id="leads_per_sms" value="@if (isset($package['leads_per_sms'])) {!!$package['leads_per_sms']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="site_analytics">Site Analytics</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="site_analytics" id="site_analytics" value="@if (isset($package['site_analytics'])) {!!$package['site_analytics']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="custom_email_templates">Custom Email Templates</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="custom_email_templates" id="custom_email_templates" value="@if (isset($package['custom_email_templates'])) {!!$package['custom_email_templates']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="support">Support 24/7</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="support" id="support" value="@if (isset($package['support'])) {!!$package['support']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="screen_recording_pf">Screen Recording Panda Flow</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="screen_recording_pf" id="screen_recording_pf" value="@if (isset($package['screen_recording_pf'])) {!!$package['screen_recording_pf']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="price">Monthly Price </label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="price" id="price" value="@if (isset($package['price'])) {!!$package['price']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="one_year_price">1 year price</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="one_year_price" id="one_year_price" value="@if (isset($package['one_year_price'])) {!!$package['one_year_price']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-12 control-label" for="two_year_price">2 year price</label>
                                <div class="col-sm-12 error-container-custom">
                                    <input type="text" name="two_year_price" id="two_year_price" value="@if (isset($package['two_year_price'])) {!!$package['two_year_price']!!} @else 0 @endif" class="spinner input-mini form-control" data-rule-number="true" data-rule-required="true" aria-required="true" aria-invalid="true" aria-describedby="numberfield-error">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label pt_0" for="is_active">Status</label>
                            <div class="col-sm-12">
                                <input type="radio" name="is_active" value="1" @if(!isset($package['is_active']) || $package['is_active'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="is_active" value="0"  @if(isset($package['is_active']) && $package['is_active'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-sm-offset-2 col-sm-12 text-right">
                                    <a href="{{url('/admin/packages')}}" class="btn btn-default">Cancel</a>
                                    <button class="btn btn-preview" type="submit">Save</button>
                                </div>
                            </div>    
                        </div>
                    </div>    
                </form>
                </div>

            </div>
        </div>
    </section>
</div>


@endsection
