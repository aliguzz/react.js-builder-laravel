@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader')  

<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>


<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content-space fix-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h1>{!!$action!!} Blog Category</h1></div>
                </div>
                
        <div class="box border">
            <div class="box-content">
                <form id="lg-form" class="form-horizontal form-validate" action="{{url('/admin/blog-category')}}" method="POST" novalidate="novalidate">
                    <div class="form-group">
                        <label class="col-sm-12 padding0 control-label" for="name">Category Name</label>
                        <div class="col-sm-12 padding0">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name" data-rule-required="true" aria-required="true" value="{!!@$BlogCategories['name']!!}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 padding0 control-label" for="slug">Slug</label>
                        <div class="col-sm-12 padding0">
                            <input type="text" class="form-control" readonly="readonly" name="slug" id="seo_url" value="{!!@$BlogCategories['slug']!!}"/>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="{!!$action!!}">
                    <input type="hidden" name="id" value="{!!@$BlogCategories['id']!!}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-12 padding0 control-label" for="is_active">Status</label>
                        <div class="col-sm-12 padding0">
                            <input type="radio" name="is_active" value="1" @if(!isset($BlogCategories['is_active']) || $BlogCategories['is_active'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="is_active" value="0"  @if(isset($BlogCategories['is_active']) && $BlogCategories['is_active'] == 0) checked @endif/> Inactive
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="col-sm-12 padding0 control-label"></div>
                        <a href="{{url('/admin/blog-category')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-preview">Continue</button>
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
    </section>
</div>
<script>
$("#name").keyup(function(){
    var name = $("#name").val();
    $("#seo_url").val(convertToSlug(name));
});
$("#name").blur(function(){
    var name = $("#name").val();
    $("#seo_url").val(convertToSlug(name));
});
function convertToSlug(Text)
{
    return Text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
}
</script>
@endsection
