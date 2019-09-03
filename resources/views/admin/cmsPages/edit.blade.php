<?php
if (isset($cmsPage['is_static']) && $cmsPage['is_static'] == 1) {
    $url = $cmsPage['description'];
    $text = file_get_contents($url);
    $text = str_replace('textarea', 'textbox', $text);
}
?>
<!-- Validation -->


@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader')  

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>

<script src="{{ asset('js/plugins/validation/additional-methods.min.js')}}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js')}}"></script>
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
            <div id="menu1" class="right-content-space fix-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h3>{!!$action!!} CMS Page</h3></div>
                </div>

                <div class="box-content">
                <form  id="cms-form" class="form-horizontal form-validate" action="{{url('/admin/cms-pages')}}" method="POST" novalidate="novalidate">
                    <div class="form_wrap border">
                        <div class="form-group">
                            <label class="col-sm-12 padding control-label">Title</label>
                            <div class="col-sm-12 padding">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" data-rule-required="true" aria-required="true" value="{!!@$cmsPage['title']!!}"/>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$cmsPage['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-12 padding control-label">Slug</label>
                            <div class="col-sm-12 padding">
                                <input type="text" class="form-control" name="seo_url" id="seo_url" readonly="readonly" value="{!!@$cmsPage['seo_url']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding control-label">Meta Title</label>
                            <div class="col-sm-12 padding">
                                <input placeholder="Enter Meta Title"  type="text" class="form-control" id="meta_title" name="meta_title" value="{!!@$cmsPage['meta_title']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding control-label">Meta Keywords</label>
                            <div class="col-sm-12 padding">
                                <input placeholder="Enter Meta Keywords"  type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{!!@$cmsPage['meta_keywords']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding control-label">Meta Description</label>
                            <div class="col-sm-12 padding">
                                <textarea placeholder="Enter Meta Description"  class="form-control" style="height:100px;" id="meta_title" name="meta_description">{!!@$cmsPage['meta_description']!!}</textarea>
                            </div>
                        </div>
                       
                        <div class="form-group">
                        <label class="col-sm-12 padding control-label">Description</label>
                        <div class="col-sm-12 padding">
                            @if(isset($cmsPage['is_static']) && $cmsPage['is_static'])
                            <textarea data-rule-required="true" aria-required="true" name="file_content" class="form-control" style="min-height: 500px">{!!$text!!}</textarea>
                            <input type="hidden" name="description" value="{!!$cmsPage['description']!!}">
                            @else
                            <textarea data-rule-required="true" aria-required="true" name="description" class='form-control ckeditor' rows="10">{!!@$cmsPage['description']!!}</textarea>
                            @endif

                        </div>
                    </div><div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-12 text-right">
                                <a href="{{url('/admin/cms-pages')}}" class="btn btn-default">Cancel</a>
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


<script type="text/javascript">
$(document).ready(function () {
    $("#title").keyup(function () {
    var title = $("#title").val();
    $("#seo_url").val(convertToSlug(title));
});
$("#title").blur(function () {
    var title = $("#title").val();
    $("#seo_url").val(convertToSlug(title));
});

});
function convertToSlug(Text)
{
    var text = Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    return text.replace('--', '-');
}
</script>
@endsection
