@extends('admin.layouts.app')

@section('content')

<!--@include('admin.settings.subheader')-->  




<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30" style=" margin-top: 100px;">
        <div class="tab-content">
            <div id="menu1" class="right-content right-content-space fixed-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h1>Tickets <span class="badge txt-radius3">{{count($cats)}}</span></h1>
                </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-content">
                        <div class="table-responsive">
                            <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Question</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($cats as $bg) 
                                   
                                    <tr>
                                        <td>{!!$bg->id!!}</td>
                                        <td>{!!$bg->question!!}</td>
                                        <td>@if($bg->status == 1) <label class="label label-success ">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                        <td>
                                            <a class="edite-btn" href="{{url('/admin/tickets/view-ticket/'.$bg->id.'')}}">Reply</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                    @if (count($cats) == 0)
                                    <tr><td colspan="7"><div class="no-record-found alert alert-warning">No Tickets found!</div></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <nav class="pull-right">{{$cats->render()}}</nav>
                    </div>
                </div>
            </div>
        </div>
        
        
              </div>
        </div>
    </section>
     </div>
@endsection