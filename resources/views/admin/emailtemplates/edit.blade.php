@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader') 
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js')}}"></script>


<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content-space fix-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h3>Email Templates</h3></div>
                </div>
        
        <div class="box">
            <div class="box-content border">
                <form id="template-form" class='form-horizontal form-wysiwyg form-validate'  action="{{url('/admin/email-templates')}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="form_wrap">
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label">Template Type</label>
                            <div class="col-sm-12 padding0">
                                <select class="form-control" name="template_type" id="template_type">
                                    <option @if(isset($template['template_type']) && $template['template_type'] == 1) selected @endif value="1">Email</option>
                                    <option @if(isset($template['template_type']) && $template['template_type'] == 2) selected @endif value="2">Text Message</option>
                                    <option @if(isset($template['template_type']) && $template['template_type'] == 3) selected @endif value="3">Letter</option>
                                </select>
                            </div>
                        </div> 
                        <input type="hidden" name="refer" value="1">
                        <div class="form-group email_subject">
                            <label class="col-sm-12 padding0 control-label">Email Type</label>
                            <div class="col-sm-12 padding0">
                                <select class="form-control" name="email_type" id="email_type">
                                    <option value="other">Other</option>
                                    <option @if(isset($template['email_type']) && $template['email_type'] == 'contact_us') selected @endif value="contact_us">Contact Us</option>
                                    <option @if(isset($template['email_type']) && $template['email_type'] == 'signup') selected @endif value="signup">Sign Up</option>
                                    <option @if(isset($template['email_type']) && $template['email_type'] == 'package_upgraded') selected @endif value="package_upgraded">Package Upgraded</option>
                                    <option @if(isset($template['email_type']) && $template['email_type'] == 'account_expiration_details') selected @endif value="account_expired">Account Expiration Details</option>
                                    <option @if(isset($template['email_type']) && $template['email_type'] == 'subscribed') selected @endif value="subscribed">Subscribed</option>
                                    <option @if(isset($template['email_type']) && $template['email_type'] == 'demo_requested') selected @endif value="demo_requested">Demo Rquested</option>
                                    <option @if(isset($template['email_type']) && $template['email_type'] == 'demo_schduled') selected @endif value="demo_schduled">Demo Scheduled</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label">Template Description</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Template Description" data-rule-required="true" aria-required="true" value="{!!@$template['title']!!}"/>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label">Is Active</label>
                            <div class="col-sm-12 padding0">
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="1" @if(isset($template['is_active']) && $template['is_active'] == 1) selected @endif>Yes</option>
                                    <option value="0" @if(isset($template['is_active']) && $template['is_active'] == 0) selected @endif>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label">Is Public</label>
                            <div class="col-sm-12 padding0">
                                <select class="form-control" name="is_public" id="is_public">
                                    <option value="1" @if(isset($template['is_public']) && $template['is_public'] == 1) selected @endif>Yes</option>
                                    <option value="0" @if(isset($template['is_public']) && $template['is_public'] == 0) selected @endif>No</option>
                                </select>
                            </div>
                        </div>
                       
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" id="temp_id" name="id" value="{!!@$template['id']!!}">
                        {{ csrf_field() }}
                        <input type="hidden" name="old_attachment" value="{!!@$template['attachment']!!}">
                        @if(isset($template['attachment']) && $template['attachment'] != '')
                        <div class="form-group old_file_attachment">
                            <label class="col-sm-12 padding0 control-label">Previous Thumbnail</label>
                            <div class="col-sm-12 padding0">
                                <b> <a href="{{url("/uploads/templates")}}/{!!@$template['attachment']!!}" download > {!!@$template['attachment']!!} </a>
                                    <span id="del_file"> <i class="fa fa-trash" style="color: #2c5e7b;"></i> </span>
                                </b>
                            </div>
                        </div>
                        @endif
                        <div class="form-group email_subject">
                            <label class="col-sm-12 padding0 control-label">Thumbnail</label>
                            <div class="col-sm-12 padding0">
                                <input name="attachment" type="file" class="btn btn-primary bg"/>
                            </div>
                        </div>

                        <div class="form-group email_subject">
                            <label class="col-sm-12 padding0 control-label">Subject</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" value="{!!@$template['subject']!!}" id="subject" name="subject"/>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-12 padding0 control-label">Content</label>
                        <div class="col-sm-12 padding0">
                            @if(isset($template['id']))
                            <div class="text-center" id="advance-builder">
                                <a href="{!!url('admin/email-templates/'.$template['id'].'/advance-builder')!!}?refer=1" class="btn btn-primary">Use Advance Builder</a>
                                <div class="clear10"></div>
                            </div>
                            @endif
                            <textarea name="content" id="contentwithck" class='form-control ckeditor' rows="5">{!!@$template['content']!!}</textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-12 text-right">
                                <a href="{{url('/admin/templates')}}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-preview">Save</button>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
    </section>
</div>
<script>
$("#template_type").change(function () {
    var element = $(this);
    if (element.val() == 1) {
        $("#contentwithck").hide();
        $("#contentwithck").css("visibility", "hidden");
        $("#cke_contentwithck").show();
        $(".email_subject").show();
        $("#advance-builder").show();
    } else if (element.val() == 2) {
        $("#contentwithck").show();
        $("#contentwithck").css("visibility", "visible");
        $("#cke_contentwithck").hide();
        $(".email_subject").hide();
        $("#advance-builder").hide();
    } else {
        $("#contentwithck").hide();
        $("#contentwithck").css("visibility", "hidden");
        $("#cke_contentwithck").show();
        $(".email_subject").hide();
        $("#advance-builder").show();
    }
});

$('#template_type').trigger('change');

$('#del_file').click(function () {
    var id = $('#temp_id').val();

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{URL::to('admin/template/del-file')}}",
                        type: 'POST',
                        data: {id: id, _token: "{{csrf_token()}}"},
                        success: function (response) {
                            $('.old_file_attachment').hide();
                            setTimeout(function () {
                                location.reload()
                            }, 100);
                        }
                    });
                }
            });

});
</script>
@endsection