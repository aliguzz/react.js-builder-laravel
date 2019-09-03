@extends('admin.layouts.app')

@section('content')
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>
<script src="{{ asset('js/plugins/validation/additional-methods.min.js')}}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js')}}"></script>

<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{url('/admin/template-categories')}}">Template Categories</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>{!!$action!!} Template Category</a>
            </li>
        </ul>
        <div class="close-bread">
            <a href="#"><i class="icon-remove"></i></a>
        </div>
    </div>
</div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="page-header"><h1>{!!$action!!} Category</h1></div>
        <div class="box">
            <div class="box-content">
                <form id="lg-form" class="form-horizontal form-validate" action="{{url('/admin/template-categories')}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                    <div class="form_wrap">

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Select Industry</label>
                            <div class="col-sm-8">
                                <select  class="form-control" name="industries[]" id="" multiple row="5" required aria-required="true" data-rule-required="true" >

                                    @if($industries)
                                    @foreach($industries as $ind)								
                                    <option <?php
                                    if (isset($sellected_cats) && in_array($ind->id, $sellected_cats)) {
                                        echo 'selected';
                                    } else {
                                        echo '';
                                    }
                                    ?> value="{{$ind->id}}">{{$ind->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="title">Category Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Category Name" data-rule-required="true" aria-required="true" value="{!!@$TemplateCategory['title']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="slug">Slug</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" readonly="readonly" name="slug" id="seo_url" value="{!!@$TemplateCategory['slug']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="timeItext">Time</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="timeItext" id="timeItext" placeholder="Enter Time" data-rule-required="true" aria-required="true" value="{!!@$TemplateCategory['timeItext']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="video_link">Youtube Video Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="video_link" id="video_link" placeholder="Enter Youtube Video Link" data-rule-required="true" aria-required="true" value="{!!@$TemplateCategory['video_link']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="type">Type</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="type" id="type" placeholder="Enter Type" data-rule-required="true" aria-required="true" value="{!!@$TemplateCategory['type']!!}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="type">Pages</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pages" id="pages" placeholder="Enter Pages" data-rule-required="true" aria-required="true" value="{!!@$TemplateCategory['pages']!!}"/>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$TemplateCategory['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="status">Status</label>
                            <div class="col-sm-8">
                                <input type="radio" name="status" value="1" @if(!isset($TemplateCategory['status']) || $TemplateCategory['status'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="status" value="0"  @if(isset($TemplateCategory['status']) && $TemplateCategory['status'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="type">Image</label>
                            <div class="fileupload fileupload-new col-md-8" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                    @if(!empty($TemplateCategory['thumbnail']))
                                    <img class="image-display" src="{{URL::to('uploads/template_categories/'.$TemplateCategory['thumbnail'])}}" />
                                    @else 
                                    <img class="image-display" src="{{URL::to('public/images/default.png')}}" />
                                    @endif
                                </div>
                                <div class=""></div>
                                <div>
                                    <input accept="image/*" class="image-input" type="file" name="thumbnail" id="image-upload"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description</label>
                        <div class="col-sm-9">                          
                            <textarea data-rule-required="true" aria-required="true" name="short_description" class='form-control ckeditor' rows="10">{!!@$TemplateCategory['short_description']!!}</textarea> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Directions</label>
                        <div class="col-sm-9">                          
                            <textarea data-rule-required="true" aria-required="true" name="directions" class='form-control ckeditor' rows="10">{!!@$TemplateCategory['directions']!!}</textarea>
                        </div>
                    </div>                  
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-9 text-right">
                                <a href="{{url('/admin/template-categories')}}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-success">Continue</button>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
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