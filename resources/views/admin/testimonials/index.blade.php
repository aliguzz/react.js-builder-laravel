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
            <div id="menu1" class="right-content right-content-space fixed-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header">
                        <h1>Testimonials  <span class="badge txt-radius2">{{@$total}}</span>
                            @if(have_premission(array(36)))
                            <a href="{{url('/admin/testimonials/create')}}" class="btn btn-info pull-right">Add New Testimonial</a>
                            @endif
                        </h1>
                    </div>
                    <div class="box-content">
                        <div class="table-responsive">
                            <table class="table table-hover table-nomargin no-margin table-bordered table-striped" id="table_st">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="width">Name</th>
                                        <th>Message</th>
                                        <th>Rating</th>
                                        <th>Featured</th>
                                        <th class="width">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testimonials as $testimonial) 
                                    <tr>
                                        <td>{!!$testimonial->id!!}</td>
                                        <td>{!!$testimonial->name!!}</td>
                                        <td>{!!$testimonial->message!!}</td>
                                        <td>{!!$testimonial->rating!!}</td>
                                        <td>@if($testimonial->featured == 1) <label class="label label-success">Yes</label> @else <label class="label label-danger">No</label> @endif</td>
                                        <td>
                                            @if(have_premission(array(37)))
                                            <a class="edite-btn" href="{{ url('/admin/testimonials/'.$testimonial->id.'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                            @endif
                                            @if(have_premission(array(38)))
                                            {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['admin/testimonials', $testimonial->id],
                                            'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete Testimonial"></i>', ['class' => 'delete-form-btn delete-style']) !!}
                                            {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit delete']) !!}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if (count($testimonials) == 0)
                                    <tr><td colspan="6"><div class="no-record-found alert alert-warning">No testimonial found!</div></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <nav class="pull-right">{!! $testimonials->render() !!}</nav>
                    </div>
                </div>

                

            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
$(document).ready(function () {
    $('.remove_btn').click(function () {

        $("#image-upload").val('');

    });

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
@endsection
