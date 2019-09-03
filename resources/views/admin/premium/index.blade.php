@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader')  

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>

<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content right-content-space fixed-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h1>Premium Build Requests  <span class="badge txt-radius2">{{@$total}}</span></h1></div>
                    <div class="box-content">
                    <div class="table-responsive">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Company Services</th>
                                    <th>Colour Codes</th>
                                    <th>Website Address</th>
                                    <th>Logo</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demos as $demo) 
                                <tr>
                                    <td>{!!$demo->company_name!!}</td>
                                    <td>{!!$demo->company_service!!}</td>
                                    <td>{!!$demo->colour_codes!!}</td>
                                    <td>{!!$demo->website_address!!}</td>
                                    <td>
                                    @if($demo->logo)
                                    <img width="100px" alt="no logo" src="{!!url('uploads/premium/'.$demo->logo)!!}">
                                    @else
                                    N/A
                                    @endif
                                    </td>
                                    <td>{!!date('M d, Y', strtotime($demo->created_at))!!}</td>
                                    <td>
                                    @if($demo->status==0)
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif($demo->status==1)
                                    <label class="badge badge-info">In Process</label>
                                    @elseif($demo->status==2)
                                    <label class="badge badge-success">Completed</label>
                                    @else
                                    <label class="badge badge-danger">Rejected</label>
                                    @endif
                                    </td>
                                    <td>
                                    <a class="edite-btn" href="{{url('admin/premium-build-requests/'.$demo->id)}}"><i class="fa fa-eye fa-fw"></i></a>

                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/premium-build-requests', $demo->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete Subscriber"></i>', ['class' => 'delete-form-btn delete-style']) !!}
                                        {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit']) !!}
                                        {!! Form::close() !!}
                                       
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <nav class="pull-right">{!! $demos->render() !!}</nav>
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
