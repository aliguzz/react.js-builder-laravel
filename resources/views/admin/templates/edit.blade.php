
<?php
if (isset($Templates['features'])) {
    $arr = explode(',', $Templates['features']);
} else {
    $arr = null;
}
?>

@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader')  

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>

<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>
<script src="{{ asset('js/plugins/validation/additional-methods.min.js')}}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js')}}"></script>



<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content-space fix-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h3>{!!$action!!} Templates</h3></div>
                </div>

                 <div class="box-content">
                <?php //echo '<pre>'; print_r($Templates); exit;?>
                <form id="lg-form" class="form-horizontal form-validate" action="{{url('/admin/templates')}}" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="form_wrap border">
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="name">Select Industries</label>
                            <div class="col-sm-12 padding0">
                                <select class="form-control" style="height: 120px !important;" name="industries[]" id="" multiple  row="10" required aria-required="true" data-rule-required="true">
                                    @if($industries)
                                    @foreach($industries as $ind)								
                                    <option @if(isset($Templates['config']['industries']) && in_array($ind->id , $Templates['config']['industries'])) selected @endif value="{{$ind->id}}">{{$ind->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <!--added checkbox for features-->
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="name">Select Features</label>
                            <div class="col-sm-12 padding0">

                                <input type="checkbox" name="features[]" value="1" @if(isset($Templates['config']['features']) && in_array(1 , $Templates['config']['features'])) checked @endif /> Sale online
                                       <input type="checkbox" name="features[]" value="2" @if(isset($Templates['config']['features']) && in_array(2 , $Templates['config']['features'])) checked @endif /> Take bookings and appointments
                                       <input type="checkbox" name="features[]" value="3" @if(isset($Templates['config']['features']) && in_array(3 , $Templates['config']['features'])) checked @endif /> Get subscribers
                                       <input type="checkbox" name="features[]" value="4" @if(isset($Templates['config']['features']) && in_array(4 , $Templates['config']['features'])) checked @endif />  Create a blog 

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="name">Select Category</label>
                            <div class="col-sm-12 padding0">
                                <select style="height: 120px  !important;" class="form-control" name="t_cat_id[]" id="t_cat_id" multiple row="10" required aria-required="true" data-rule-required="true" >

                                    @if($TemplateCategory)
                                    @foreach($TemplateCategory as $cat)								
                                    <option <?php
                                    if (isset($Templates['config']['t_cat_id']) && in_array($cat->id, $Templates['config']['t_cat_id'])) {
                                        echo 'selected';
                                    } else {
                                        echo '';
                                    }
                                    ?> value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="framework">Framework</label>
                            <div class="col-sm-12 padding0">
                                <select id="framework" name="framework" class="form-control">
                                    <option value="bootstrap-3">Bootstrap 3</option>
                                    <option value="bootstrap-4">Bootstrap 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="theme" trans="">Theme</label>
                            <div class="col-sm-12 padding0">
                                <select id="theme" name="theme" class="form-control">
                                    @foreach($themes as $the)
                                    <option value="{!!$the['name']!!}">{!!$the['name']!!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="title">Display Name</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Enter Template Name" data-rule-required="true" aria-required="true" value="{!!@$Templates['config']['display_name']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="title">Forms</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" name="forms" id="forms" placeholder="Index Form1,Index Form2" data-rule-required="true" aria-required="true" value="{!!@$Templates['config']['forms']!!}"/>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$Templates['name']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="template" trans="">Template Zip</label>
                            <div class="col-sm-12 padding0">
                                <input id="template" name="template" type="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="type">Thumbnail</label>
                            <div class="fileupload fileupload-new col-md-8 padding0" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                    @if(!empty($Templates['thumbnail']))
                                    <img class="image-display pr_img_height" id="image_upload_preview" src="{!! asset($Templates['thumbnail'])!!}" />
                                    @else 
                                    <img class="image-display pr_img_height" id="image_upload_preview" src="{{URL::to('images/thumbnail.png')}}" />
                                    @endif
                                </div>
                                <div class="clear10"></div>
                                <div >
                                    <input accept="image/*" class="image-input" type="file" name="thumbnail" id="image-upload"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-12 text-right">
                                <a href="{{url('/admin/templates')}}" class="btn btn-default">Cancel</a>
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


<script>
$("#title").keyup(function () {
    var name = $(title).val();
    $("#seo_url").val(convertToSlug(name));
});
$("#title").blur(function () {
    var name = $("#title").val();
    $("#seo_url").val(convertToSlug(name));
});
function convertToSlug(Text)
{
    return Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
}
</script>

@endsection