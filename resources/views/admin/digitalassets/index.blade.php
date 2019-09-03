@extends('admin.layouts.app')

@section('content')
<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>Digital Assets </a>
            </li>
        </ul>
        <div class="close-bread">
            <a href="#"><i class="icon-remove"></i></a>
        </div>
    </div>
</div>
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            <div class="left-navigation">
                <div class="menulinks-back">
                    <div class="mn_head_lf">
                        <i class="fa fa-cogs Headerlf_icon"></i>
                        <span class="Headerlf_name">Digital Assets</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('admin.account_nav')
                <div class="col-md-8">
                    <div class="Inner_Content">
                        <h2 class="ui header pull-left">Manage Digital Assets</h2>
                        <a class="cf-add-new-button" data-toggle="tooltip" title="New Asset" href="{{url('/admin/assets/create')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        
                        
                        <div class="clear20"></div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>Sent From</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($digitalassets as $da)
                                    <tr>
                                        <td>{!!$da->name!!}<br><a title="Edit" href="{{url('/admin/assets/'.$da->id.'/edit')}}">{!!$da->file!!}</a></td>
                                        <td>{!!$da->from_name!!}<br>{!!$da->from_email!!}</td>
                                        <td><a title="Copy path" href="{!!url('uploads/digital_assets/'.$da->file)!!}" class="copytoclipboard"><i class="fa fa-link fa-fw"></i></a><a href="{!!url('uploads/digital_assets/'.$da->file)!!}" class="downloadtomachine" title="Download" target="_blank"><i class="fa fa-download fa-fw"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection