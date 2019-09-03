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
                    <div class="page-header"><h3>{!!$action!!} Videos</h3></div>
                </div>

                 <div class="box-content">
                <?php //echo '<pre>'; print_r($ImagesCategories); exit;?>
                <form id="lg-form" class="form-horizontal form-validate" action="{{url('/admin/videos')}}" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="form_wrap border">
                        

                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="name">Select Video Category</label>
                            <div class="col-sm-12 padding0">
                                <select  class="form-control" name="cat_id" id="cat_id" row="15" required aria-required="true" data-rule-required="true" >

                                    @if($VideosCategories)
                                    @foreach($VideosCategories as $cat)								
                                    <option @if(@$image->name == $cat->name) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="title">Display Name</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Enter Video Name" data-rule-required="true" aria-required="true" value="{!!@$image->display_name!!}"/>
                            </div>
                        </div>
                        
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$image->id!!}">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="type">Video</label>
                            <div class="fileupload fileupload-new col-md-8 padding0" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                    @if(!empty($image->file_name))
                                    <img class="image-display" src="{{asset('uploads/videos/'.$image->file_name)}}" />
                                    @else 
                                    <img class="image-display" src="{{asset('images/default.png')}}" />
                                    @endif
                                </div>
                                <div >
                                    <input accept="video/*" class="image-input" type="file" name="thumbnail" id="image-upload"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-12 text-right">
                                <a href="{{url('/admin/videos')}}" class="btn btn-default">Cancel</a>
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