@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader')  

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>

<style>
    .dropdown-menu {
        min-width: auto;
    }
    #feedback { font-size: 1.4em; }
    #selectable .ui-selecting { background: none; }
    #selectable .ui-selected { background: none; color: #7ab428; }
    #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #selectable tr { cursor:pointer; margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
    table tr td{ color: rgb(207, 206, 206);}
   
</style>




<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
            <div class="tab-content">
            <div id="menu1" class="tab-pane active">

                        <div class="editor-domain-container-heading">
                            <h3 class="Duplicate">Site Settings</h3>
                        </div>

<div class="box-content">
                {!! Form::open(['url' => '/admin/settings/update', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
                <div class="form_wrap">
                    <div class="form-group {{ $errors->has('site_name') ? 'has-error' : ''}}">
                        {!! Form::label('site_name', 'Site Name', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('site_name', settingValue('site_name'), ['class' => 'form-control']) !!}
                            {!! $errors->first('site_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Form::label('email', 'Email Address', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::email('email', settingValue('email'), ['class' => 'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('site_logo') ? 'has-error' : ''}}">
                        {!! Form::label('site_logo', 'Logo ', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                    @if (settingValue('site_logo') != '')
                                    <img class="image-display" src="{{URL::to('uploads/settings/'.settingValue('site_logo'))}}" />
                                    @else 
                                    <img class="image-display" src="{{URL::to('public/frontend/img/default.png')}}" />
                                    @endif 
                                </div>
                                <div>
                                    <span class="btn btn-file col-sm-12 select_logo"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                    <input accept="image/*" class="image-input" type="file" name="site_logo" id="image-upload"/></span>
                                    <a href="javascript:void(0);" class="btn fileupload-exists remove_btn" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                            {!! $errors->first('site_logo', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div> 
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        {!! Form::label('phone', 'Phone', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('phone', settingValue('phone'), ['class' => 'form-control']) !!}
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
                        {!! Form::label('fax', 'Fax', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('fax', settingValue('fax'), ['class' => 'form-control']) !!}
                            {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('facebook') ? 'has-error' : ''}}">
                        {!! Form::label('facebook', 'Facebook', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('facebook', settingValue('facebook'), ['class' => 'form-control']) !!}
                            {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('twitter') ? 'has-error' : ''}}">
                        {!! Form::label('twitter', 'Twitter', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('twitter', settingValue('twitter'), ['class' => 'form-control']) !!}
                            {!! $errors->first('twitter', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('youtube') ? 'has-error' : ''}}">
                        {!! Form::label('youtube', 'Youtube', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('youtube', settingValue('youtube'), ['class' => 'form-control']) !!}
                            {!! $errors->first('youtube', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('linkedin') ? 'has-error' : ''}}">
                        {!! Form::label('linkedin', 'Linkedin', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('linkedin', settingValue('linkedin'), ['class' => 'form-control']) !!}
                            {!! $errors->first('linkedin', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('google_plus') ? 'has-error' : ''}}">
                        {!! Form::label('google_plus', 'Google Plus', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('google_plus', settingValue('google_plus'), ['class' => 'form-control']) !!}
                            {!! $errors->first('google_plus', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                    <hr>
                    <div class="clearfix"></div>
                    <h2>Payment Settings</h2>
                    
                    <div class="form-group {{ $errors->has('domain_commissions') ? 'has-error' : ''}}">
                        {!! Form::label('domain_commissions', 'Commission on Buy Domain (USD)', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            
                            {!! Form::text('domain_commissions', settingValue('domain_commissions'), ['class' => 'form-control','placeholder' => '0']) !!}
                            {!! $errors->first('domain_commissions', '<p class="help-block">:message</p>') !!}
                        
                        </div>
                    </div>
                    
                    <hr>
                    <h3>Stripe</h3>
                    <div class="clearfix"></div>
                    
                     <div class="form-group {{ $errors->has('stripe_test_mode') ? 'has-error' : ''}}">
                        {!! Form::label('stripe_mode', 'Stripe Mode', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            <input name="stripe_test_mode" type="radio" value="0" id="stripe_mode" @if(settingValue('stripe_test_mode') == 0) checked @endif>
                            Test Mode
                            <input name="stripe_test_mode" type="radio" value="1" id="stripe_mode" @if(settingValue('stripe_test_mode') == 1) checked @endif>
                            Live Mode
                            {!! $errors->first('stripe_test_mode', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                    <div class="form-group {{ $errors->has('stripe_verify_ssl') ? 'has-error' : ''}}">
                        {!! Form::label('stripe_verify_ssl', 'Stripe SSL', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            <input name="stripe_verify_ssl" type="radio" value="0" id="stripe_mode" @if(settingValue('stripe_verify_ssl') == 0) checked @endif>
                            No
                            <input name="stripe_verify_ssl" type="radio" value="1" id="stripe_mode" @if(settingValue('stripe_verify_ssl') == 1) checked @endif>
                            Yes
                            {!! $errors->first('stripe_verify_ssl', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                     <div class="form-group {{ $errors->has('stripe_key_test_secret') ? 'has-error' : ''}}">
                        {!! Form::label('stripe_key_test_secret', 'Stripe Key Test Secret', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('stripe_key_test_secret', settingValue('stripe_key_test_secret'), ['class' => 'form-control']) !!}
                            {!! $errors->first('stripe_key_test_secret', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                     <div class="form-group {{ $errors->has('stripe_key_test_public') ? 'has-error' : ''}}">
                        {!! Form::label('stripe_key_test_public', 'Stripe Key Test Public', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('stripe_key_test_public', settingValue('stripe_key_test_public'), ['class' => 'form-control']) !!}
                            {!! $errors->first('stripe_key_test_public', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                     <div class="form-group {{ $errors->has('stripe_key_live_secret') ? 'has-error' : ''}}">
                        {!! Form::label('stripe_key_live_secret', 'Stripe Key Live Secret', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('stripe_key_live_secret', settingValue('stripe_key_live_secret'), ['class' => 'form-control']) !!}
                            {!! $errors->first('stripe_key_live_secret', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                     <div class="form-group {{ $errors->has('stripe_key_live_public') ? 'has-error' : ''}}">
                        {!! Form::label('stripe_key_live_public', 'Stripe Key Live Public', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('stripe_key_live_public', settingValue('stripe_key_live_public'), ['class' => 'form-control']) !!}
                            {!! $errors->first('stripe_key_live_public', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                    <hr>
                    <h3>SMTP Settings</h3>
                    <div class="clearfix"></div>
                    
                     <div class="form-group {{ $errors->has('from_name') ? 'has-error' : ''}}">
                        {!! Form::label('from_name', 'From Name', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                           {!! Form::text('from_name', settingValue('from_name'), ['class' => 'form-control']) !!}
                            {!! $errors->first('from_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                    <div class="form-group {{ $errors->has('from_email') ? 'has-error' : ''}}">
                        {!! Form::label('from_email', 'From Email', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                           {!! Form::text('from_email', settingValue('from_email'), ['class' => 'form-control']) !!}
                            {!! $errors->first('from_email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                     
                     <div class="form-group {{ $errors->has('smtp_server') ? 'has-error' : ''}}">
                        {!! Form::label('smtp_server', 'SMTP Server', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                           {!! Form::text('smtp_server', settingValue('smtp_server'), ['class' => 'form-control']) !!}
                            {!! $errors->first('smtp_server', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                    <div class="form-group {{ $errors->has('smtp_port') ? 'has-error' : ''}}">
                        {!! Form::label('smtp_port', 'SMTP Port', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                           {!! Form::text('smtp_port', settingValue('smtp_port'), ['class' => 'form-control']) !!}
                            {!! $errors->first('smtp_port', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                     <div class="form-group {{ $errors->has('smtp_user') ? 'has-error' : ''}}">
                        {!! Form::label('smtp_user', 'SMTP User', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('smtp_user', settingValue('smtp_user'), ['class' => 'form-control']) !!}
                            {!! $errors->first('smtp_user', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('smtp_password') ? 'has-error' : ''}}">
                        {!! Form::label('smtp_password', 'SMTP Password', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('smtp_password', settingValue('smtp_password'), ['class' => 'form-control']) !!}
                            {!! $errors->first('smtp_password', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8 text-right">
                            <button type="submit" class="btn btn-success">Update Settings</button>
                        </div>
                    </div>
                </div>    
                {!! Form::close() !!}
            </div>
                
            </div>
            </div>
    </section>
</div>


<script type="text/javascript">
$(document).ready(function () {
	$('.remove_btn').click(function(){
		  
		  $("#image-upload").val('');
		
		});

});
</script>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function () {

    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose Logo", // Default: Choose File
        label_selected: "Change Logo", // Default: Change File
        no_label: false                 // Default: false
    });
	
	

});
</script>
@endsection
