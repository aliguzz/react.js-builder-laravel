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
                <a>SMTP Settings </a>
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
            <div class="left-navigation clearfix">
                <div class="menulinks-back">
                    <div class="mn_head_lf pull-left">
                        <i class="fa fa-cogs Headerlf_icon"></i>
                        <span class="Headerlf_name">SETTINGS</span>
                    </div>
                    <div class="pull-left newtitle_subhead" style="font-size: 18px;text-transform: capitalize">
                        <i class="fa fa-paper-plane" style="margin-right: 5px;"></i>
                        Setup Email SMTP Settings
                    </div>
                </div>
            </div>
            <div class="row">
                @include('admin.account_nav')
                <div class="col-md-8">
                    <div class="Inner_Content">
                        <p class="helpinfotextarea">
                            <i class="fa fa-exclamation-triangle"></i>
                            <strong>Important Note:</strong>
                            SMTP settings are required to send mails if you didn't setup emails will not send.
                        <div class="form_wrap">
                            <form id="smtp-form" class="form-horizontal form-validate" action="{{url('/admin/smtp')}}" method="POST" novalidate="novalidate">
                                {{ csrf_field() }}
                                
                                <div class="form-group clearfix">
                                    <label for="email" class="col-sm-4 control-label">From Name</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="from_name" placeholder="Send From Name" id="" type="text" aria-required="true" data-rule-required="true" value="{!!@$smtp->from_name!!}">

                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="phone" class="col-sm-4 control-label"> From Email</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="from_email" placeholder="Send From Email Address" value="{!!@$smtp->from_email!!}" type="email" aria-required="true" data-rule-required="true" data-rule-email="true">

                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8 text-right">
                                        <button type="submit" class="btn btn-success">Create Smtp integration</button>
                                    </div>
                                </div>
                                <div class="clear20"></div>
                            </form>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection