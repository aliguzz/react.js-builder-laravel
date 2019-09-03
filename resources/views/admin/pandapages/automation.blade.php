@extends('admin.layouts.app')
@section('content')
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            @include('admin.pandapages.nav')
            <div class="clear20"></div>
            <div class="right-contentarea">
                <div class="inner-content clearfix">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="min-height: 400px;">
                        <form id="search_form" action="" method="" class="segment_filter">

                            <div id="step1_contacting_leads" class="step_contacting_leads">
                                <h2>Step #1 of 2</h2>
                                <h1>What enquiry form did the user fill out?</h1>
                                <div class="clear30"></div>
                                <div class="col-xs-12">
                                    @php $atleast = 0; @endphp

                                    @php $forms = explode(",",$ProjectData->forms); @endphp
                                    @foreach($forms as $fo)
                                    @if($fo != "")
                                    <p class="text-left"><i class="fa fa-caret-right"></i> {!!$fo!!} 

                                        @php 

                                        $class = 'danger';
                                        $icon  = 'remove';
                                        $text  = 'Not Confirmed';
                                        $url   = url('admin/change-contacting-status/'.$ProjectData->id.'/'.str_replace(' ', '-', $fo).'/add');

                                        if(in_array($fo, $actions)) 
                                        {
                                        $class = 'success';
                                        $icon  = 'check';
                                        $text  = 'Confirmed';
                                        $status= '0';
                                        $atleast= 1;
                                        $url   = url('admin/change-contacting-status/'.$ProjectData->id.'/'.str_replace(' ', '-', $fo).'/del');
                                        }
                                        @endphp

                                        <a href="{{$url}}"><span class="btn btn-{{$class}} pull-right">{{$text}}  <i class="fa fa-{{$icon}}"></i></span></a>
                                    </p>
                                    <div class="clear5"></div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    <div class="clear20"></div>
                                    @if(count($forms) > 0 && $atleast > 0)
                                    <button type="button" class="btn btn-info next_from_step1 btn-lg"> Go to step #2 </button>
                                    @elseif(count($forms) == 0)
                                    <button type="button" disabled="disabled" class="btn btn-info btn-lg"> There is no forms </button>
                                    @elseif($atleast == 0)
                                    <button type="button" disabled="disabled" class="btn btn-info btn-lg"> Please confirm atleast one form to go next step </button>

                                    @endif
                                    <div class="clear30"></div>
                                </div>
                            </div>
                            <div id="step2_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2>Step #2 of 2</h2>
                                <h1>Where should we send the enquiries when they fill out the form?</h1>
                                <div class="clear30"></div>
                                <h2>Please enter the business contact details below so we can send you the details for your enquiries...</h2>



                                <div class="col-xs-4">
                                    <button type="button" data-toggle="modal" data-target="#email_modal" class="btn btn-{{(isset($emailsdata->emails) && $emailsdata->emails!= '')? 'success' : 'danger'}} col-md-12">Email</button>
                                    <div class="clear5"></div>
                                    <!--<a href="javascript:void(0)">Send test email</a>-->
                                </div>
                                <div class="col-xs-4">
                                    <button type="button" data-toggle="modal" data-target="#text_modal" class="btn btn-{{(isset($textdata->phones) && $textdata->phones!= '')? 'success' : 'danger'}} col-md-12">Text</button>
                                    <div class="clear5"></div>
                                    <!--<a href="javascript:void(0)">Send test text</a>-->
                                </div>
                                <div class="col-xs-4">
                                    <button type="button" data-toggle="modal" data-target="#call_modal" class="btn btn-danger col-md-12">Call</button>
                                    <div class="clear5"></div>
                                    <a href="javascript:void(0)">Make test call</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-info complete_setup btn-lg"> Complete setup</button>
                                    <div class="clear30"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<div id="email_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please enter the email address of all the people in your business that will receive the enquiries contact details...</h4>
            </div>
            <form action="{{url('admin/add-action-leads')}}" method="post">
                <div class="modal-body">
                    <div id="email_form_list">
                        <div class="clear10"></div>

                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                        <input type="hidden" name="action" value="email"  />

                        @if(isset($emailsdata->emails) && $emailsdata->emails!= '')
                        @php $emaillist = explode(',', $emailsdata->emails);@endphp
                        @foreach($emaillist as $key=>$mail)

                        <label class="col-md-1">#{{$key+1}}</label>
                        <div class="col-md-11">
                            <input name="email[]" type="email" value="{{$mail}}" id="email1" class="form-control" placeholder="Enter the email address"/>
                        </div>
                        <div class="clear5"></div>

                        @endforeach
                        @else

                        <label class="col-md-1">#1</label>
                        <div class="col-md-11">
                            <input name="email[]" type="email" id="email1" class="form-control" placeholder="Enter the email address"/>
                        </div>
                        <div class="clear5"></div>
                        <label class="col-md-1">#2</label>
                        <div class="col-md-11">
                            <input name="email[]" type="email" id="email2" class="form-control" placeholder="Enter the email address"/>
                        </div>
                        <div class="clear5"></div>
                        <label class="col-md-1">#3</label>
                        <div class="col-md-11">
                            <input name="email[]" type="email" id="email3" class="form-control" placeholder="Enter the email address"/>
                        </div>
                        @endif
                    </div>
                    <div class="clear5"></div>
                    <div class="col-md-12 text-center">
                        <a href="javascript:void(0)" class="add-email-address">Add email address +</a>
                    </div>

                    <div class="clear10"></div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="send_test_email" class="btn btn-success" >Confirm Email Addresses</button>
                </div>
            </form>
        </div>

    </div>
</div>
<div id="text_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please enter the mobile phone number of all the people in your business that will receive the enquiries contact details...</h4>
            </div>
            <form action="{{url('admin/add-action-leads')}}" method="post">
                <div class="modal-body">
                    <div id="text_form_list">
                        <div class="clear10"></div>
                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                        <input type="hidden" name="action" value="text"  />

                        @if(isset($textdata->phones) && $textdata->phones!= '')
                        @php $textlist = explode(',', $textdata->phones);@endphp
                        @foreach($textlist as $key=>$text)

                        <label class="col-md-1">#{{$key+1}}</label>
                        <div class="col-md-11">
                            <input name="text[]" type="text" value="{{$text}}" id="email1" class="form-control" placeholder="Enter the phone number"/>
                        </div>
                        <div class="clear5"></div>

                        @endforeach
                        @else


                        <label class="col-md-1">#1</label>
                        <div class="col-md-11">
                            <input name="text[]" id="text1" class="form-control" placeholder="Enter the phone number"/>
                        </div>
                        <div class="clear5"></div>
                        <label class="col-md-1">#2</label>
                        <div class="col-md-11">
                            <input name="text[]" id="text2" class="form-control" placeholder="Enter the phone number"/>
                        </div>
                        <div class="clear5"></div>
                        <label class="col-md-1">#3</label>
                        <div class="col-md-11">
                            <input name="text[]" id="text3" class="form-control" placeholder="Enter the phone number"/>
                        </div>
                        @endif
                    </div>
                    <div class="clear5"></div>
                    <div class="col-md-12 text-center">
                        <a href="javascript:void(0)" class="add-text-number">Add phone number +</a>
                    </div>

                    <div class="clear10"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="send_test_email" class="btn btn-success" >Conform Mobile Numbers</button>
                </div>
            </form>
        </div>

    </div>
</div>
<div id="call_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please enter the mobile phone number of all the people in your business that will will be calling the enquiries when they fill out the form...</h4>
            </div>
            <div class="modal-body">
                <div id="call_form_list">
                    <div class="clear10"></div>
                    <label class="col-md-1">#1</label>
                    <div class="col-md-11">
                        <input name="call[]" id="call1" class="form-control" placeholder="Enter the phone number"/>
                    </div>
                    <div class="clear5"></div>
                    <label class="col-md-1">#2</label>
                    <div class="col-md-11">
                        <input name="call[]" id="call2" class="form-control" placeholder="Enter the phone number"/>
                    </div>
                    <div class="clear5"></div>
                    <label class="col-md-1">#3</label>
                    <div class="col-md-11">
                        <input name="call[]" id="call3" class="form-control" placeholder="Enter the phone number"/>
                    </div>
                </div>
                <div class="clear5"></div>
                <div class="col-md-12 text-center">
                    <a href="javascript:void(0)" class="add-call-number">Add phone number +</a>
                </div>

                <div class="clear10"></div>
            </div>
            <div class="modal-footer">
                <button type="button" id="send_test_email" class="btn btn-success" data-dismiss="modal">Conform Mobile Numbers</button>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).on('click', ".next_from_step1", function () {
        $("#step1_contacting_leads").toggle('slide');
        $("#step2_contacting_leads").delay(500).toggle('slide');
    });
    var email_count = <?php
if (isset($emailsdata->emails) && $emailsdata->emails != '') {
    $emaillist = explode(',', $emailsdata->emails);
    echo count($emaillist);
} else
    echo 3;
?>;
    var text_count = <?php
if (isset($textdata->phones) && $textdata->phones != '') {
    $textlist = explode(',', $textdata->phones);
    echo count($textlist);
} else
    echo 3;
?>;
    var call_count = 3;
    $(document).on('click', '.add-email-address', function () {
        email_count = email_count + 1;
        $("#email_form_list").append('<div class="clear5"></div><label class="col-md-1">#' + email_count + '</label><div class="col-md-11"><input name="email[]" type="email" id="email' + email_count + '" class="form-control" placeholder="Enter the email address"/></div>');
    });
    $(document).on('click', '.add-text-number', function () {
        text_count = text_count + 1;
        $("#text_form_list").append('<div class="clear5"></div><label class="col-md-1">#' + text_count + '</label><div class="col-md-11"><input name="text[]" id="text3" class="form-control" placeholder="Enter the phone number"/></div>');
    });
</script>
@endsection