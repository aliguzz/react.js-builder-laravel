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
                    <div class="page-header"><h1>Premium Build Requests</h1></div>
                    <div class="box-content">
                    <div class="table-responsive">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <tbody>
                                @foreach($demo as $key=>$d) 
                                @if($key != 'user_id') 
                                @if($key == 'logo')
                                @if($d !='')
                                @php $d = '<img alt="no logo" width="100px" src="'.url('uploads/premium/'.$d).'">'; @endphp
                                @else
                                @php $d = 'N/A';  @endphp
                                @endif
                                @elseif($key == 'created_at' || $key == 'updated_at')
                                @php $d = date('M d, Y', strtotime($d)); @endphp
                                @endif
                                <tr>
                                    <th>{!!ucfirst(str_replace("_"," ",$key))!!}</th>
                                    <td>
                                    @if($key == 'status')
                                    <form id="statusChange" action="{!!url('admin/premium/change-statue')!!}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{!!$demo->id!!}">
                                        <select id="status" name="status" class="form-control">
                                        @if($d==0)
                                            <option value="0" selected="">Pending</option>
                                            <option value="1">In Process</option>
                                            <option value="2" >Completed</option>
                                            <option value="3" >Rejected</option>
                                        @elseif($d==1)
                                            <option value="0" >Pending</option>
                                            <option value="1" selected="">In Process</option>
                                            <option value="2" >Completed</option>
                                            <option value="3" >Rejected</option>
                                        @elseif($d==2)
                                            <option value="0" >Pending</option>
                                            <option value="1" >In Process</option>
                                            <option value="2" selected="">Completed</option>
                                            <option value="3" >Rejected</option>
                                        @else
                                            <option value="0" >Pending</option>
                                            <option value="1" >In Process</option>
                                            <option value="2" >Completed</option>
                                            <option value="3" selected="">Rejected</option>
                                        @endif
                                    @else
                                    {!!$d!!}
                                    @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$("#status").change(function(){
    $("#statusChange").submit();
});
</script>
@endsection