@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader') 
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.css') }}">
<script src="{{ asset('js/plugins/select2/select2.min.js')}}"></script>



<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content-space fix-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h3>{!!$action!!} Help Articles</h3></div>
                </div>
        
        <div class="box">
            <div class="box-content border">
                <form id="lg-form" enctype="multipart/form-data" class="form-horizontal form-validate" action="{{url('/admin/help-articles')}}" method="POST" novalidate="novalidate" enctype="multipart/form-data"  >
                <div class="form_wrap">  
                    <input type="hidden" name="action" value="{!!$action!!}">
                    <input type="hidden" name="id" value="{!!@$category['id']!!}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label" for="title">Question</label>
                        <div class="">
                            <input type="text" class="form-control" name="question" id="title" placeholder="Enter question" data-rule-required="true" aria-required="true" value="{!!@$category['question']!!}"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label" for="title">KeyWords</label>
                        <div class="">
                            <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Enter keywords " data-rule-required="true" aria-required="true" value="{!!@$category['keywords']!!}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="slug">Slug</label>
                        <div class="">
                            <input type="text" class="form-control" readonly="readonly" name="slug" id="seo_url" value="{!!@$category['slug']!!}"/>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="control-label pt_0" for="status">Status</label>
                        <div class="">
                            <input type="radio" name="status" value="1" @if(!isset($category['status']) || $category['status'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="status" value="0"  @if(isset($category['status']) && $category['status'] == 0) checked @endif/> Inactive
                        </div>
                    </div>
                    <div class="clear30"></div>
                    <div class="form-group">
                        <label class="control-label">Answer</label>
                        <div class="">                          
                        <textarea data-rule-required="true" aria-required="true" name="answer" class='form-control ckeditor' rows="10">{!!@$category['answer']!!}</textarea>
                            
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="">
                            <div class="col-sm-offset-2 col-sm-12 text-right">
                                <a href="{{url('/admin/help-articles')}}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-preview">Continue</button>
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
<script>
    $("#title").keyup(function () {
        var title = $("#title").val();
        $("#seo_url").val(convertToSlug(title));
    });
    $("#title").blur(function () {
        var name = $("#title").val();
        $("#seo_url").val(convertToSlug(title));
    });
    function convertToSlug(Text)
    {
        return Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image-upload").change(function () {
        readURL(this);
    });
</script>
@endsection
