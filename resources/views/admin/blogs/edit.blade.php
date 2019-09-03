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
                    <div class="page-header"><h3>{!!$action!!} Blog</h3></div>
                </div>        


                <div class="box-content border">
                    <form id="lg-form" enctype="multipart/form-data" class="form-horizontal form-validate" action="{{url('/admin/blogs')}}" method="POST" novalidate="novalidate">
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="name">Blog Category</label>
                            <div class="col-sm-12 padding0">
                                <select class="form-control" name="blog_category_id" id="blog_category_id" data-rule-required="true" aria-required="true">
                                    <option value="">Select category</option>
                                    @if($categories)
                                    @foreach($categories as $cat)
                                    <option @if(isset($Blog['blog_category_id']) && $Blog['blog_category_id'] == $cat->id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$Blog['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="title">Title</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Blog Title" data-rule-required="true" aria-required="true" value="{!!@$Blog['title']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="slug">Slug</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" readonly="readonly" name="slug" id="seo_url" value="{!!@$Blog['slug']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="name">Short Description</label>
                            <div class="col-sm-12 padding0">
                                <textarea rows="5"  placeholder="Enter Short description" type="text" class="form-control" name="short_description" id="short_description">{!!@$Blog['short_description']!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="name">Image</label>
                            <div class="col-sm-12">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                        @if(isset($Blog['image']) && ($Blog['image'] != ''))
                                        <img class="image-display pr_img_height" id="image_upload_preview" src="{{URL::to('uploads/blogs/'.$Blog['image'])}}" />
                                        @else 
                                        <img id="image_upload_preview" class="image-display pr_img_height" src="{{URL::to('public/frontend/images/default.png')}}" />
                                        @endif 
                                    </div>
                                    <div>
                                        <div class="clear5  padding0"></div>
                                        <input accept="image/*" class="image-input" id="inputFile"  type="file" name='image'/>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="name">Description</label>
                            <div class="col-sm-12 padding0">
                                <textarea data-rule-required="true" aria-required="true" name="description" class='form-control ckeditor' rows="10">{!!@$Blog['description']!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label">Meta Title</label>
                            <div class="col-sm-12 padding0">
                                <input placeholder="Enter Meta Title"  type="text" class="form-control" id="meta_title" name="meta_title" value="{!!@$Blog['meta_title']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label">Meta Keywords</label>
                            <div class="col-sm-12 padding0">
                                <input placeholder="Enter Meta Keywords"  type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{!!@$Blog['meta_keywords']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label">Meta Description</label>
                            <div class="col-sm-12 padding0">
                                <textarea placeholder="Enter Meta Description"  class="form-control" style="height:100px;" id="meta_description" name="meta_description">{!!@$Blog['meta_description']!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="is_active">Status</label>
                            <div class="col-sm-12 padding0">
                                <input type="radio" name="is_active" value="1" @if(!isset($Blog['is_active']) || $Blog['is_active'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="is_active" value="0"  @if(isset($Blog['is_active']) && $Blog['is_active'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="col-sm-12 padding0 control-label"></div>
                            <a href="{{url('/admin/blog')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-preview">Continue</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function () {
    $("#title").keyup(function () {
        var title = $("#title").val();
        $("#seo_url").val(convertToSlug(title));
    });
    $("#title").blur(function () {
        var name = $("#name").val();
        $("#seo_url").val(convertToSlug(title));
    });
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

    $("#inputFile").change(function () {
        readURL(this);
    });
</script>
@endsection


