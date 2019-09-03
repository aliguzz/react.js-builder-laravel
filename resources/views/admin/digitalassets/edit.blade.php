@extends('admin.layouts.app')

@section('content')
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/validation/additional-methods.min.js')}}"></script>
<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{url('/admin/assets')}}">Digital Assets</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>{!!$action!!} Digital Asset</a>
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
                        <span class="Headerlf_name">{!!$action!!} Digital Asset</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('admin.account_nav')
                <div class="col-md-8">
                    <div class="Inner_Content">
                        <div class="form_wrap">
                            <h2 class="ui header">Add New Digital Asset</h2>
                            <div class="clear10"></div>
                            <form id="da-form" class="form-horizontal form-validate" action="{{url('/admin/assets')}}" method="POST" enctype="multipart/form-data" novalidate>
                                <input type="hidden" name="action" value="{!!$action!!}">
                                <input type="hidden" name="id" value="{!!@$DigitalAsset['id']!!}">
                                {{ csrf_field() }}
                                <div class="form-group clearfix">
                                    <label for="" class="control-label">Upload File (Max 3MB)</label>
                                    <input class="form-control choose_file" type="file" name="file">
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="control-label">Asset Name</label>
                                    <input data-rule-required="true" aria-required="true" class="form-control" type="text" name="name" placeholder="Asset Name" value="{!!@$DigitalAsset['name']!!}">
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="control-label">From Name</label>
                                    <input data-rule-required="true" aria-required="true" class="form-control" type="text" name="from_name" placeholder="From name" value="{!!@$DigitalAsset['from_name']!!}">
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="control-label">From Email</label>
                                    <input data-rule-required="true" aria-required="true" class="form-control" type="email" name="from_email" placeholder="From Email" value="{!!@$DigitalAsset['from_email']!!}">
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="control-label">Message</label>
                                    <textarea data-rule-required="true" aria-required="true" name="message" class="form-control" rows="4" placeholder="Here's the free PDF you requested" >{!!@$DigitalAsset['message']!!}</textarea>
                                </div>
                                <input type="submit" name="" value="Add" class="btn btn-success">
                            </form>    
                            <div class="clear10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
