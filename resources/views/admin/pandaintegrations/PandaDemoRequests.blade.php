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
                <a>Sms Packages</a>
            </li>
        </ul>
    </div>    
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
<div class="main_panel contentarea clearfix">
    <div class="white_box container-fluid clearfix">
        <div class="page-header"><h1>@if($type == 'crm') Panda CRM 
            @elseif($type == 'dial') Panda Dial  
            @elseif($type == 'flow') Panda Flow 
            @elseif($type == 'sms') Panda Sms 
               @endif
            </h1></div>
        <div class="row" >
            <div class="col-md-12">
                <div class="box">
                    <div class="box-content">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <thead>
                                <tr>
                                   <th>   <center>Sr</center>  </th>

                                    <th>First name</th>
                                  <th>Last_name</th>
                                    <th>Email</th>
                                     <th>Created_at</th>
                                 <!--   <th>Updated_at</th>  -->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php  $i = 1; ?>
                                @foreach($requests as $req) 
                                <tr>
                                  <td> <center>{!!$i!!}</center></td>
                                   <?php $i++; ?>
                                 
                                    
                                    <td> {{@$req->first_name}} </td>
                                    <td> {{@$req->last_name}} </td>
                                 <td> {{@$req->email}} </td>
                               <td>{{ date('d-M-Y',strtotime($req->created_at)) }}</td>
                            <!--   <td>{{ date('d-M-Y',strtotime($req->updated_at)) }}</td> -->

                               <td>@if($req->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                      
 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav class="pull-right">{!! $requests->render() !!}</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection