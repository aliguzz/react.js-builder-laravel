@extends('admin.layouts.app')

@section('content')
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.css') }}">
<script src="{{ asset('js/plugins/select2/select2.min.js')}}"></script>

<div class="breadcrumbs contentarea">
    <div class="container-fluid">
    <ul>
        <li>
            <a href="{{url('/admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="{{url('/admin/categories')}}">Categories</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a>{!!$action!!} Category</a>
        </li>
    </ul>
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
</div>

<section class="contentarea">
    <div class="container-fluid">
        <div class="page-header"><h1>{!!$action!!} Categories</h1></div>
        <div class="box">
            <div class="box-content">
                <form id="lg-form" enctype="multipart/form-data" class="form-horizontal form-validate" action="{{url('/admin/categories')}}" method="POST" novalidate="novalidate">
                    <div class="form_wrap">
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$category['id']!!}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="title"> Category Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Category Title" data-rule-required="true" aria-required="true" value="{!!@$category['title']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="slug">Slug</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" readonly="readonly" name="slug" id="seo_url" value="{!!@$category['slug']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="status">Status</label>
                            <div class="col-sm-8">
                                <input type="radio" name="status" value="1" @if(!isset($category['status']) || $category['status'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="status" value="0"  @if(isset($category['status']) && $category['status'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-actions text-right">
                            <div class="col-sm-3 control-label"></div>
                            <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-success">Continue</button>
                        </div>
                    </div>    
            </form>
            </div>
        </div>
    </div>
</section>
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
</script>
@endsection
