@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader')
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.css') }}">
<script src="{{ asset('js/plugins/select2/select2.min.js')}}"></script>




<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content right-content-space fixed-width">

                <div class="editor-domain-container-heading generic_head">
                    <div class="page-header header_style"><h3><i class="fas fa-chevron-down"></i> Reply Ticket</h3></div>
                </div>
        <div class="box">
            <div class="box-content">
                <form id="lg-form" enctype="multipart/form-data" class="form-validate" action="{{url('/admin/tickets/replyticket')}}" method="POST" novalidate enctype="multipart/form-data"  >
                    <input type="hidden" name="ticket_id" value="{{$ticket_id}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-12 text-center"><h2>{{@$replay[0]->question}}</h2></label>
                    </div>
                        <div class="clear20"></div>
                    <div class="form-group">
                            @foreach ($replay as $rep)
                            <div class=" @if( $rep->user_id == Auth::user()->id ) right_allign_msg @else left_allign_msg @endif">
                                <div class="img-responsive chat_img pull-left">
                                    <img src="{!!checkImage('users/'.$rep->profile_image)!!}">
                                </div>
                                <div class="chat-body clearfix">
                                    <b>{!! $rep->first_name.' '.$rep->last_name  !!}</b> &nbsp;&nbsp;
                                    <span><i class="fa fa-clock-o"></i> {!!display_date_time($rep->created_at)!!}</span>
                                    <div class="descrip">
                                        {!! $rep->replay !!}
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            @endforeach       
                            <br>                            
                            <br>                            
                            <br>                            
                            <textarea data-rule-required="true" aria-required="true" name="reply" class='form-control' rows="10"></textarea> 
                    </div>

                    <div class="form-actions">
                        <div class="">
                            <div class="col-sm-12 text-right">
                                <div class="clearfix"></div>
                                <a href="{{url('/admin/tickets')}}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-preview">Continue</button>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
    </section>
     </div>

@endsection