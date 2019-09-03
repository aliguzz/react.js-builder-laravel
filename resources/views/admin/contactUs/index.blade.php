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
            <a>Contact Us Log</a>
        </li>
    </ul>
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
</div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="page-header"><h1>Contact Us Log  <span class="badge">{{@$total}}</span></h1></div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-content">
                    <div class="table-responsive">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demos as $demo) 
                                <tr>
                                    <td>{!!$demo->name!!}</td>
                                    <td>{!!$demo->email!!}</td>
                                    <td>{!!$demo->phone!!}</td>
                                    <td>{!!$demo->message!!}</td>
                                    <td>{!!date('M d,Y', strtotime($demo->created_at))!!}</td>
                                    <td>
                                        @if(have_premission(array(90)))
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/contact-us-log', $demo->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete Contact Us"></i>', ['class' => 'delete-form-btn']) !!}
                                        {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit']) !!}
                                        {!! Form::close() !!}
                                        @endif
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
    </div>
   
</section>
 
@endsection