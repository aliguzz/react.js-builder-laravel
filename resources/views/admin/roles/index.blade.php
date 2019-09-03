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
                        <h1>Roles <span class="badge txt-radius2">{{count($roles)}}</span>
                            @if(have_premission(array(61)))
                            <a href="{{url('/admin/roles/create')}}" class="btn btn-info pull-right">Add New Role</a>
                            @endif
                        </h1>
                    </div>
                </div>

                <div class="box-content">
                <div class="table-responsive">
                    <table class="table table-hover no-margin table-bordered table-striped" id="table_st">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Last Modified</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            
                            <tr>
                                <td>{!!$role->title!!}</td>
                                <td>
                                    {{date('M d, Y', strtotime($role->updated_at))}}
                                </td>
                                <td>@if($role->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                <td>
                                    
                                    @if(have_premission(array(58)))<a class="edite-btn" href="{{url('/admin/roles/'.$role->id.'/edit')}}"><i class="fa fa-edit"></i></a>@endif
                               
                                    @if($role->id > 0)
                               
                                @if(have_premission(array(66)))
                                {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['admin/roles/'.$role->id],
                                'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete Role"></i>', ['class' => 'delete-form-btn delete-style']) !!}
                                {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit delete']) !!}
                                {!! Form::close() !!}
                                @endif
                                    
                                    @endif
                                
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
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
