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
                    <div class="page-header">
                        
                        <h1>Videos 
                            @if(have_premission(array(132)))
                            <a href="{{url('/admin/videos/create')}}" class="btn btn-info pull-right">Add New Video</a>
                            @endif
                        </h1>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_images as $bg)
                            
                            <tr>
                                <td><img style="width: 100px;" src="{!! asset($destinationPath_thumb.'/'.$bg['thumb'])!!}"></td>
                                <td>{!!$bg['display_name']!!}</td>

                                <td>{!!$bg['name']!!}</td>
                                <td>
                                    @if(have_premission(array(133)))
                                    <a class="edite-btn" href="{{ url('/admin/videos/'.$bg['id'].'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                    @endif
                                    
                                    @if(have_premission(array(134)))
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/videos', $bg['id']],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete videos"></i>', ['class' => 'delete-form-btn delete-style']) !!}
                                        {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit delete']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                                    
                                </td>
                            </tr>
                            @endforeach
                            @if (count($all_images) == 0)
                            <tr><td colspan="4"><div class="no-record-found alert alert-warning">No Images found!</div></td></tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="pull-right">{!! $all_images->render() !!}</div>
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
