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
            <a>Notifications</a>
        </li>
    </ul>
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
</div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="page-header">
        <h1>View All Notifications <span class="badge">{{$count}}</span></h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-content">
                        <div class="table-responsive">
                            <table class="table table-hover table-user table-nomargin no-margin">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET['page'])){
                                            $page = $_GET['page'];
                                            $counter = ($page * 20) - 20 + 1;
                                        }else{
                                            $page = 0;   
                                            $counter = 1;
                                        }
                                    ?>
                                    @foreach($notifications as $nt) 
                                    @if($nt->type == 'package_upgraded')
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td class='img'>
                                          <span>  <i class="fa fa-credit-card-alt"></i> </span>
                                        </td>
                                        <td> <a href="{{URL::to('admin/package-upgrade')}}">{!!$nt->title!!}</a></td>
                                        <td><b>Package Title:</b> {!!$nt->package_title!!}</td>
                                        <td>@php echo date('d F Y H:i:s', strtotime($nt->updated_at)); @endphp</td>
                                    </tr>
                                    
                                    @elseif($nt->type == 'new_signup')
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td class='img'>
                                          <span>   <i class="fa fa-user"></i> </span>
                                        </td>
                                        <td> <a href="{{URL::to('admin/package-orders')}}">{!!$nt->title!!}</a></td>
                                        <td><b>Package Title:</b> {!!$nt->package_title!!} <br>
                                           <b> Email:</b> {!!$nt->user_email!!} 
                                        </td>
                                        <td>@php echo date('d F Y H:i:s', strtotime($nt->updated_at)); @endphp</td>
                                    </tr>

                                    @elseif($nt->type == 'lead_status_updated')  
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td class='img'>
                                          <span>  <i class="fa fa-info"></i></span>
                                        </td>
                                        <td> <a href="{{URL::to("admin/leads/$nt->lead_id/details")}}">{!!$nt->title!!}</a></td>
                                        <td>
                                        <b>Lead Reference: </b> {!!$nt->lead_id!!} <br>
                                        <b>Lead Status:</b> {!!$nt->lead_status!!}
                                        </td>
                                        <td> @php echo date('d F Y H:i:s', strtotime($nt->updated_at)); @endphp</td>
                                    </tr>

                                    @elseif($nt->type == 'event_created' || $nt->type == 'event_updated' || $nt->type == 'event_cancel' || $nt->type == 'event_reminder')
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td class='img'>
                                          <span>  <i class="fa fa-calendar-o"></i> </span>
                                        </td>
                                        <td> <a href="{{URL::to("admin/leads/$nt->lead_id/details")}}">{!!$nt->title!!}</a></td>
                                        <td>
                                        <b>Event:</b> {!!summary($nt->assignment_details,150,true)!!} <br>
                                        <b>Event Start:</b> @php echo date('d F Y', strtotime($nt->event_start)); @endphp <br>
                                        <b>Event End:</b> @php echo date('d F Y', strtotime($nt->event_end)); @endphp <br>
                                        </td>
                                        <td>@php echo date('d F Y H:i:s', strtotime($nt->updated_at)); @endphp</td>
                                    </tr>
                                    
                                    @elseif($nt->type == 'account_expiration_in_day' || $nt->type == 'account_expiration_in_week')
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td class='img'>
                                          <span>  <i class="fa fa-sign-out "></i> </span>
                                        </td>
                                        <td> <a href="{{URL::to('admin/package-upgrade')}}">{!!$nt->title!!}</a></td>
                                        <td><b>Account Title:</b> {!!$nt->package_title!!}<br>
                                        <b>Expired on:</b> @php echo date('d F Y', strtotime($nt->account_expired_on)); @endphp
                                        </td>
                                        <td>@php echo date('d F Y H:i:s', strtotime($nt->updated_at)); @endphp</td>
                                    </tr>
                                    @endif
                                    @php $counter = $counter + 1; @endphp
                                    @endforeach
                                    @if (count($notifications) == 0)
                                    <tr><td colspan="4"><div class="no-record-found alert alert-warning">No Notifications found!</div></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <nav class="pull-right">{!! $notifications->render() !!}</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection