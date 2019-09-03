@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader')  


<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content right-content-space fixed-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header">
                        <h1>Blog Categories 
                            @if(have_premission(array(70)))
                            <a href="{{url('/admin/blog-category/create')}}" class="btn btn-info pull-right">Add New Category</a>
                            @endif
                            <span class="badge txt-radius2">{{$total}}</span>
                        </h1>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-content">
                                <div class="table-responsive">
                                    <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Blog Category ID</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($blogCategories as $bg) 
                                            <tr>
                                                <td>{!!$bg->id!!}</td>
                                                <td>{!!$bg->name!!}</td>
                                                <td>@if($bg->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                                <td>
                                                    @if(have_premission(array(71)))
                                                    <a class="edite-btn" href="{{ url('/admin/blog-category/'.$bg->id.'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                                    @endif
                                                    @if(have_premission(array(72)))
                                                    {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['admin/blog-category', $bg->id],
                                                    'style' => 'display:inline'
                                                    ]) !!}
                                                    {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete Blog Category"></i>', ['class' => 'delete-form-btn delete-style']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit delete']) !!}
                                                    {!! Form::close() !!}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            @if (count($blogCategories) == 0)
                                            <tr><td colspan="4"><div class="no-record-found alert alert-warning">No blog categories found!</div></td></tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <nav class="pull-right">{!! $blogCategories->render() !!}</nav>
                            </div>
                        </div>
                    </div>
                </div>
                </div>




                

            </div>
        </div>
    </section>
</div>
    @endsection