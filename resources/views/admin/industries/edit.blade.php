<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.css') }}">
<script src="{{ asset('js/plugins/select2/select2.min.js')}}"></script>

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
            <div id="menu1" class="right-content-space fix-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h3>{!!$action!!} Industries</h3></div>
                </div>

                 <div class="box-content">
                <form id="lg-form" enctype="multipart/form-data" class="form-horizontal form-validate" action="{{url('/admin/industries')}}" method="POST" novalidate="novalidate">
                    <div class="form_wrap border">
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$industry['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="title"> Industry Title</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Industry Title" data-rule-required="true" aria-required="true" value="{!!@$industry['title']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label" for="slug">Slug</label>
                            <div class="col-sm-12 padding0">
                                <input type="text" class="form-control" readonly="readonly" name="slug" id="seo_url" value="{!!@$industry['slug']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 padding0 control-label pt_0" for="status">Status</label>
                            <div class="col-sm-12 padding0">
                                <input type="radio" name="status" value="1" @if(!isset($industry['status']) || $industry['status'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="status" value="0"  @if(isset($industry['status']) && $industry['status'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-actions text-right">
                            <div class="col-sm-3 control-label"></div>
                            <a href="{{url('/admin/industries')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-preview">Continue</button>
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
        var name = $("#name").val();
        $("#seo_url").val(convertToSlug(title));
    });

});

 function convertToSlug(Text)
    {
        return Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    }

</script>
@endsection
