@extends('admin.layouts.app')
@section('content')
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            <div class="left-navigation">
                <!-- <div class="header"> <img src="{{asset('frontend/images/email-icon.png')}}"> Actionetics </div> -->
                <div class="menulinks-back">
                    <ul>
                        <li>
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <a href="{{url('admin/contacts')}}"> Contact Profiles</a></li>
                        <li class="active">
                            <div class="icon"><i class="fa fa-list-alt"></i></div>
                            <a href="{{url('admin/contacts/lists')}}"> Email Lists</a></li>
                        <li>
                            <div class="icon"><i class="fa fa-dashboard"></i></div>
                            <a href="#"> Email Broadcasts</a></li>
                        <li>
                            <div class="icon"><i class="fa fa-dashboard"></i></div>
                            <a href="#"> Email Sequences</a></li>
                    </ul>
                </div>
            </div>
            <div class="right-contentarea">
                <div class="header2"> <i class="fa fa-list-alt"></i> Manage Email Lists
                    <div class="pull-right"> <a class="btn btn-default header-btn" href="#">What is actionetics?</a> <a class="btn btn-default header-btn" href="#">Welcome video</a> </div>
                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <div class="inner-content">
                    <div class="well well-sm clearfix">
                        <div class="row">
                            <div class="col-md-9 col-sm-7 col-xs-12">
                                <div id="imaginary_container"> 
                                    <div class="input-group stylish-input-group">
                                        <input type="text" class="form-control" placeholder="Search" >
                                        <span class="input-group-addon">
                                            <button type="submit">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>  
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-5 col-xs-12"> <a class="btn btn-default export-link" data-href="/funnels/contact_profiles/export" id="export_leads" style="cursor:pointer;" data-popup-title="Export Contacts" href="/funnels/contact_profiles/export?stats_by_contacts=last30days" title="Export Contacts"> <i class="fa fa-download"></i> Download contacts </a> </div>
                        </div>
                        <div class="clear10"></div>
                        <p class="contacts_total"> Viewing All Contacts for <b>Last 30 Days</b> with <span class="badge">3 Contacts</span> Found </p>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Contacts</th>
                                    <th>Signed up</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img alt="" height="40" src="https://gravatar.com/avatar/dd1d058abebaa085a870e4d4941b0342.jpg?d=mm&amp;s=40" style="border-radius: 5px;margin-top: 5px;float: left;margin-right: 14px" width="40"> <strong style="display: block;margin-top: 5px;"> <a style="font-weight: bold" href="#">a@comlinksmb.com</a> </strong>
                                        <p>admin@arhamsoft.com</p></td>
                                    <td>21 days ago</td>
                                    <td><a class="btn btn-default btn-edit add-m-10" href="/funnels/contact_profiles/233243346/edit">Edit</a></td>
                                </tr>
                                <tr>
                                    <td><img alt="" height="40" src="https://gravatar.com/avatar/dd1d058abebaa085a870e4d4941b0342.jpg?d=mm&amp;s=40" style="border-radius: 5px;margin-top: 5px;float: left;margin-right: 14px" width="40"> <strong style="display: block;margin-top: 5px;"> <a style="font-weight: bold" href="#">jason@comlinksmb.com</a> </strong>
                                        <p>admin@arhamsoft.com</p></td>
                                    <td>21 days ago</td>
                                    <td><a class="btn btn-default btn-edit add-m-10" href="/funnels/contact_profiles/233243346/edit">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
@endsection