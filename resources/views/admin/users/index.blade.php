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
    table tr td{ color: #565151}
    table tr th{ color: black}

</style>

<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content right-content-space fixed-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header">
                        <h1>Users <span class="badge txt-radius2">{{@$total}}</span>
                            @if(have_premission(array(33)))
                            <a href="{{url('/admin/users/create')}}" class="btn btn-info pull-right">Add New User</a>
                            @endif
                            <div class="clearfix"></div>
                        </h1>
                    </div>
                    <div class="box-content">
                        <div class="table-responsive">
                            <table class="table table-hover no-margin table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Signup Date</th>     
                                        <th>Status</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $item)
                                    <tr>
                                        <td>{!! $item->first_name !!} {!! $item->last_name !!}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role_name }}</td>
                                        <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>                                                     
                                        <td>@if($item->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                        <td>     
                                            @if($item->id != 1)
                                            @if(have_premission(array(34)))
                                            <a class="edite-btn" href="{{ url('/admin/users/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                            @endif
                                            @if(have_premission(array(35)))
                                            {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['admin/users', $item->id],
                                            'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete User"></i>', ['class' => 'delete-form-btn delete-style']) !!}
                                            {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit delete']) !!}
                                            {!! Form::close() !!}
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach  
                                    @if (count($users) == 0)
                                    <tr><td colspan="6"><div class="no-record-found alert alert-warning">No user found!</div></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <nav class="pull-right">{!! $users->render() !!}</nav>
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
