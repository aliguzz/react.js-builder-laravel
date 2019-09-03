@extends('admin.layouts.app')
@section('content')

<!-- Validation -->
<link href="{{ asset('css/plugins/datepicker/datepicker.css')}}" rel="stylesheet">
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>Domains</a>
            </li>
        </ul>
    </div>    
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
 <div class="clear30"></div>
 <div class="main_panel contentarea clearfix">
    <div class="white_box container-fluid clearfix">
 <a href="{{url('/admin/domains/create')}}" class="btn btn-info pull-right">Add Domain</a>
    </div>
 </div>
 <div class="clear20"></div>
<div class="main_panel contentarea clearfix">
    <div class="white_box container-fluid clearfix">
        <div class="inner">
            <div class="left-navigation">
                <div class="menulinks-back">
                    <div class="mn_head_lf">
                        <i class="fa fa-cogs Headerlf_icon"></i>
                        <span class="Headerlf_name">Domains</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- @include('admin.account_nav')  -->
                 @include('admin.domains.subheader')  
                 
                 
                <div class="col-md-8">
                    <div class="clear20"></div>
                    <div class="box">
                        <div class="box-content">
                            <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Renew Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($domains as $domain) 
                                    <tr>
                                        <td>{!!$domain->name!!}</td>
                                        <td>{!!display_date($domain->renew_date)!!}</td>
                                        <td>@if($domain->status == 1) <label class="label label-success">Verified</label> @else <label class="label label-danger">Unverified</label> @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/domains/'.$domain->id.'/edit')}}"><i class="fa fa-edit fa-fw" style="font-size:30px"></i></a>
                                            @if($domain->ssl_enabled == 0 && $domain->price > 0 && $domain->payment_gateway <> '' )
                                            <span title="Purchase SSL" class="buy_btn1" data-toggle="modal" data-target="#buy_modal{{ $domain->id }}"><img style="width: 30px;height: 30px;margin-top: -15px; cursor: pointer; " src="{!!asset('frontend/images/ssl-img.png')!!}"/></span>
                                            
                                            
<!--                                            <a id="purchase_ssl" title="Purchase SSL" href="{{ url('/admin/domains/'.$domain->id.'/ssl-purchase')}}"><img style="width: 30px;height: 30px;margin-top: -15px;" src="{!!asset('frontend/images/ssl-img.png')!!}"/></a>-->
                                            @elseif($domain->price <= 0 && $domain->payment_gateway == '' )
                                            <span title="ssl can not be enabled"></span>
                                            @else
                                            <img style="width: 30px;height: 30px;margin-top: -15px;" src="{!!asset('frontend/images/ssl-on-img.ico')!!}"/>
                                            @endif
                                            
                                            <!--  modal code for SSL certificate payment  -->
                                            
                                            <div id="buy_modal{{ $domain->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                    <ul class="tabs tabs-inline tabs-top">
                                        <li class="active">
                                            <a href="https://knowledge.symantec.com/support/ssl-certificates-support/index?page=content&actp=CROSSLINK&id=INFO198" target="_blank">CSR Instructions here</a>
                                        </li>
                                        <li>
                                            <a href="https://csrgenerator.com/" target="_blank">Generate Online CSR here</a>
                                        </li>
                                        
                                    </ul>
                                                            <div class="clear20"></div>
                                                            <div class="tab-content modal_tb_content">
                                                                
                                                                <div class="tab-pane active" id="strip{{ $domain->id }}">

                                                                    <div class="clear20"></div>
                                                                    <div class="hide" id="loaderdiv">
                                                                        <img src="{{asset('frontend/images/loader.svg')}}" id="loadersvgimage" class="center" style="display: inline-block !important; margin-top: 50px; margin-left: 200px; text-align: center;">
                                                                    </div>

                                                                    <form id="stripe-form" name="stripe-form" class="form-horizontal form-validate" action="{{ url('/admin/domains/ssl-purchase')}}" method="POST">

                                                                        {{ csrf_field() }}
                                                                        
                                                                        
                                                                        <input type="hidden" name="domain_id" value="{{ $domain->id }}">
                                                                        <input type="hidden" name="domain_name" value="{{ $domain->name }}">

                                                                        <div class="form-group clearfix">
                                                                            <label for="csr_code" class="col-sm-4 control-label">Paste CSR Code</label>
                                                                            <div class="col-sm-8">
                                                                                <textarea id="csr_code" rows="10" name="csr_code" required class='form-control' placeholder="-----BEGIN CERTIFICATE REQUEST-----                                    -----END CERTIFICATE REQUEST-----"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-actions text-right">
                                                                            <button type="submit" class='btn btn-primary paystripe'>Purchase</button>
                                                                            
                                                                            <input type="reset" class='btn' value="Reset">
                                                                        </div>
                                                                    </form>
                                                                </div>






                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>




                                            <!--  modal code for SSL certificate payment  -->

                                            
                                            
                                            
                                            
                                            
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav class="pull-right">{!! $domains->render() !!}</nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
