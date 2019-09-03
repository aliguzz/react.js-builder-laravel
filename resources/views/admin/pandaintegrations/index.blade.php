@extends('admin.layouts.app')
@section('content')
<div class="clear40"></div>
<link rel="stylesheet" href="{{asset('frontend/css/dataTables.bootstrap.min.css')}}">
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            <div class="left-navigation">
                
                <div class="menulinks-back">
                    <ul class="clearfix">
                        <li class="active">
                            <a href="{{url('/admin/contacts')}}">
                                <div class="icon"><i class="fa fa-envelope"></i></div> 
                                Contact Profiles
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/admin/contacts/lists')}}">
                                <div class="icon"><i class="fa fa fa-list-alt"></i></div>
                                 Email Lists
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"><i class="fa fa-dashboard"></i></div>
                                Email Broadcasts
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"><i class="fa fa-dashboard"></i></div>
                                Email Sequences
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-contentarea">
                <div class="header2">
                    <i class="fa fa-users"></i> Panda Mail
                    <div class="pull-right">
                        <a class="btn btn-default header-btn" href="#">Panda mail walkthrough</a>
                    </div>                            
                </div>
                <div class="clearfix"></div>
                <form class="form-inline">
                    <div class="col-lg-12 sortingdiv">
                        <p class="chooseDateTitle">
                            <i class="fa fa-calendar"></i>
                            Showing contacts for
                        </p>
                        <select name="stats_by_contacts" id="stats_by_contacts" class="form-control"><option value="last7days">Last 7 Days</option>
                            <option selected="selected" value="last30days">Last 30 Days</option>
                            <option value="last60days">Last 2 Months</option>
                            <option value="lastyear">This Year</option>
                            <option value="alltime">All Time</option></select>
                    </div>
                </form>
                <div class="clearfix"></div>
                <div class="inner-content">
                    <div class="well well-sm clearfix">
                        <div class="row">
                            <div class="col-md-9 col-sm-7 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-5 col-xs-12">
                                <a class="btn btn-default export-link" id="export_leads" style="cursor:pointer;" data-href="/funnels/contact_profiles/export" data-popup-title="Export Contacts" href="/funnels/contact_profiles/export?stats_by_contacts=last30days" title="Export Contacts">
                                    <i class="fa fa-download"></i>
                                    Download contacts
                                </a>
                            </div>
                        </div>
                        <div class="clear10"></div>
                        <p class="contacts_total">
                            Viewing All Contacts for
                            <b>Last 30 Days</b>
                            with
                            <span class="badge">3 Contacts</span>
                            Found
                        </p>
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
                                    <td>
                                        <img alt="" height="40" src="https://gravatar.com/avatar/dd1d058abebaa085a870e4d4941b0342.jpg?d=mm&amp;s=40" style="border-radius: 5px;margin-top: 5px;float: left;margin-right: 14px" width="40">
                                        <strong style="display: block;margin-top: 5px;">
                                            <a style="font-weight: bold" href="#">a@comlinksmb.com</a>
                                        </strong>
                                        <p>admin@arhamsoft.com</p>
                                    </td>
                                    <td>21 days ago</td>
                                    <td><a class="btn btn-default btn-edit add-m-10" href="/funnels/contact_profiles/233243346/edit">Edit</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="" height="40" src="https://gravatar.com/avatar/dd1d058abebaa085a870e4d4941b0342.jpg?d=mm&amp;s=40" style="border-radius: 5px;margin-top: 5px;float: left;margin-right: 14px" width="40">
                                        <strong style="display: block;margin-top: 5px;">
                                            <a style="font-weight: bold" href="#">jason@comlinksmb.com</a>
                                        </strong>
                                        <p>admin@arhamsoft.com</p>
                                    </td>
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
<script src="{{asset('frontend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('frontend/js/dataTables.bootstrap.min.js')}}"></script>
@endsection