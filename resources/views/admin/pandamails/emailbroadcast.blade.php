@extends('admin.layouts.app')
@section('content')


<style>

.temp_active {
    transform:scale(1.2);
    transition:all 0.7s;
}


</style>
<div class="clear40"></div>

<?php
function x_week_range($date) {
    $ts = strtotime($date);
    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
    return array(date('m/d/Y', $start),
        date('m/d/Y', strtotime('next saturday', $start)));
}

function this_quater_range() {
    $current_month = date('m');
    $current_year = date('Y');
    if ($current_month >= 1 && $current_month <= 3) {
        $start_date = strtotime('01-January-' . $current_year);
        $end_date = strtotime('01-April-' . $current_year);
    } else if ($current_month >= 4 && $current_month <= 6) {
        $start_date = strtotime('01-April-' . $current_year);
        $end_date = strtotime('01-July-' . $current_year);
    } else if ($current_month >= 7 && $current_month <= 9) {
        $start_date = strtotime('01-July-' . $current_year);
        $end_date = strtotime('01-October-' . $current_year);
    } else if ($current_month >= 10 && $current_month <= 12) {
        $start_date = strtotime('01-October-' . $current_year);
        $end_date = strtotime('01-January-' . ($current_year + 1));
    }
    return array(date('m/d/Y', $start_date), date('m/d/Y', $end_date));
}

function last_quater_range() {
    $current_month = date('m');
    $current_year = date('Y');

    if ($current_month >= 1 && $current_month <= 3) {
        $start_date = strtotime('01-October-' . ($current_year - 1));
        $end_date = strtotime('01-January-' . $current_year);
    } else if ($current_month >= 4 && $current_month <= 6) {
        $start_date = strtotime('01-January-' . $current_year);
        $end_date = strtotime('01-April-' . $current_year);
    } else if ($current_month >= 7 && $current_month <= 9) {
        $start_date = strtotime('01-April-' . $current_year);
        $end_date = strtotime('01-July-' . $current_year);
    } else if ($current_month >= 10 && $current_month <= 12) {
        $start_date = strtotime('01-July-' . $current_year);
        $end_date = strtotime('01-October-' . $current_year);
    }

    return array(date('m/d/Y', $start_date), date('m/d/Y', $end_date));
}

list($start_date_tw, $end_date_tw) = x_week_range(date('m/d/Y'));
list($start_date_lw, $end_date_lw) = x_week_range(date('m/d/Y', strtotime('-7 Days')));
list($start_date_tq, $end_date_tq) = this_quater_range();
list($start_date_lq, $end_date_lq) = last_quater_range();
?>

<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            @include('admin.pandamails.nav')
         <div class="clear20"></div>
            <div class="right-contentarea">
                <div class="inner-content clearfix">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="min-height: 400px;">
                        <form id="search_form" action="{{action('Admin\BroadcastController@broadcast_followup')}}" method="get" class="segment_filter">
                       
                        {!! Form::token() !!}

                       
                            <div id="step2_contacting_leads" class="step_contacting_leads" style="display:block;">
                                <h2>Step #1 of 4</h2>
                                <h1>Please click to confrim the email-list</h1>
                                <div class="clear30"></div>
                                <div class="error-messages" style="display:none;"></div>
                                <div class="col-xs-12" id="forms_based_on_project">
                                <input type="hidden" class="email_array_class" name="email_array" id="email_array_id" value="">
                                    @foreach($email_list as $e_list)
                                        @if($e_list->title != "")
                                            <p class="text-left"><i class="fa fa-caret-right"></i> {!!$e_list->title!!}<span data-id="{!!$e_list->id!!}" class="btn btn-danger pull-right btn-confirm confirm_span"> Confirm <i class="fa fa-close"></i></span>
                                            </p>
                                            <div class="clear5"></div>
                                        @endif
                                    @endforeach
                                    <div class="clear10"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-success next_from_step2 pull-right"> Go to step #2 </button>
                                    <div class="clear30"></div>
                                </div>
                            </div>
                            <div id="step3_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2>Step #2 of 4</h2>
                                <div class="col-xs-12">
                                    <h3>Are you sending the person who enquired an email?</h3>
                                    <div class="clear10"></div>
                                    <div class="error-messages" style="display:none;"></div>
                                    <select name="email_sequence"  id="email_sequence" class="form-control email_sequence">
                                        <option value="0" selected> Select Option </option>
                                        @if(isset($broadcast))
                                            @foreach($broadcast as $bd)
                                                <option value="{!!$bd->id!!}">{!!$bd->email_process_name!!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="clear10"></div>
                                    <div class="setup_email" id="setup" data-id="0">
                                        <p>Not set up any follow up process for this form yet? <a href="javascript:void(0)" onclick="fun()"; class="set_up_new_one_from_step3">Set up a new one here>></a></p>
                                    </div>
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-danger back_to_step2 pull-left"> Back to step#1 </button>
                                    <button type="button" class="btn btn-success go_to_step4 pull-right"> Go to step #3 </button>
                                </div>
                            </div>
                            <div id="step4_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <div class="alert alert-warning"><b>Important!</b> There must have a field on the form that takes the users phone number when they fill out their enquiry.</div>
                                <h2>Step #3 of 4</h2>
                                <div class="col-xs-12">
                                    <div class="clear20"></div>
                                    <h3>Are you sending the person who enquired a text message?</h3>
                                    
                                    <div class="clear10"></div>
                                    <div class="error-messages" style="display:none;"></div>
                                    <select name="text_sequence" id="text_sequence" class="form-control text_sequence">
                                        <option value="0" selected> Select Option </option>
                                        @if(isset($broadcast))
                                            @foreach($broadcast as $bd)
                                                <option value="{!!$bd->id!!}">{!!$bd->text_name!!}</option>
                                            @endforeach
                                        @endif
                                    </select>  
                                    <div class="clear10"></div>
                                    <div class="setup_text" data-id="0" id="text_setup">
                                        <p>Not set up any text follow up process for this form yet? <a href="javascript:void(0)" onclick="fun2()"; class="set_up_new_one_from_step4">Set up a new one here>></a></p>
                                    </div>
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-danger back_to_step3 pull-left"> Back to step#2 </button>
                                    <button type="button" class="btn btn-success go_to_step5 pull-right"> Go to step #4 </button>
                                </div>
                            </div>
                            <div id="step5_contacting_leads" class="step_contacting_leads"  
                                style="display:none;">
                                <div class="alert alert-warning"><b>Important!</b> There must have a field on the form that takes the users phone number when they fill out their enquiry.</div>
                                <h2>Step #4 of 4</h2>
                                <div class="col-xs-12">
                                    <div class="clear20"></div>
                                    <h3>Will you be ringing the person who completed the enquiry form?</h3>
                                    
                                    <div class="clear10"></div>
                                    <div class="error-messages" style="display:none;"></div>
                                    <select name="call_sequence" id="call_sequence" class="form-control call_sequence" >
                                        <option value="0">Select call follow up process</option>
                                    </select>
                                    <div class="clear10"></div>
                                    <div class="setup_call" id="call_setup" data-id="0">
                                        <p>Not set up call follow up process for this form yet? <a href="javascript:void(0)" onclick="fun3()" class="set_up_new_one_from_step5">Set up a new one here>></a></p>
                                    </div>
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-danger back_to_step4 pull-left"> Back to step#3 </button>
                                    <button type="button" class="btn btn-success go_to_step6 pull-right"> Test follow up process </button>
                                </div>
                            </div>
                            <div id="step6_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2>Congratulations</h2>
                                <h1>You have setup the following processes when someone fills out your enquiry form:</h1>
                                <div class="clear30"></div>
                                <div class="error-messages" style="display:none;"></div>
                                <div class="col-xs-12">
                                    <div class="process-list"><i class="fa fa-envelope"></i> <span class="name_of_email_fp">Name of email follow up process </span> <a data-toggle="modal" data-target="#test_email_modal" href="javascript:void(0)" class="btn btn-success pull-right test-email">Send test email</a></div>
                                    <div class="process-list"><i class="fa fa-comments"></i> <span class="name_of_text_fp">Name of text follow up process </span> <a data-toggle="modal" data-target="#test_text_modal" href="javascript:void(0)" class="btn btn-success pull-right test-text">Send test text</a></div>
                                    <div class="process-list"><i class="fa fa-headphones"></i> <span class="name_of_call_fp">Name of call follow up process </span> <a data-toggle="modal" data-target="#test_call_modal" href="javascript:void(0)" class="btn btn-success pull-right test-call">Make test call</a></div>
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-danger start_again pull-left"> Start Again </button>
                                    <button type="submit" class="btn btn-success complete_setup pull-right"> Complete setup </button>
                                </div>
                            </div>
                            <div id="step7_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2>Are you sending the person who enquired an email?</h2>
                                <h2><b>Step #1 of 3:</b> Email settings...</h2>
                                <div class="clear30"></div>
                                <div class="error-messages" style="display:none;"></div>
                                <div class="col-xs-12">
                                    <div class="followup-list">
                                        <label>Name of email follow up process:</label><input type="text" name="e_p_name" placeholder="Name of email follow up process" id="e_p_name" class="form-control e_p_name_class validate_input_email"/>
                                    </div>
                                    <div class="followup-list">
                                        <label>How many emails do you want to send?</label><input type="number"  name="e_p_email_count" placeholder="Number of emails" id="e_p_email_count" class="form-control validate_input_email"/>
                                    </div>
                                    <div class="followup-list">
                                        <label>Name of person/company sending the email:</label><input type="text"  name="e_p_name_pc" placeholder="Person/Company name" id="e_p_name_pc" class="form-control validate_input_email"/>
                                    </div>
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-success go_to_step8 pull-right validate_step1"> Go to step #2 </button>
                                </div>
                            </div>


                            <div id="step8_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2>Setup a new email follow up process for all website enquiries</h2>
                                <h2><b>Step #2 of 3:</b> Select your email template...</h2>
                                <div class="clear30"></div>
                                <div class="error-messages" style="display:none;"></div>
                                <div class="col-xs-12" id="#temp_id">
                                <input type="hidden" name="template_id_by_name" id="template_id_by_id" value="">
                                
                                @php  
                                    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $pin = mt_rand(100, 999)
                                        . mt_rand(1000, 9999)
                                        . $characters[rand(0, strlen($characters) - 1)];
                                    $string = str_shuffle($pin);
                                @endphp
                                <input type="hidden" name="rand_id" id="rand_id" value="<?php echo $string;  ?>">

                                    @foreach($templates as $temp)

                                        <div class="col-md-4 tiles-tc template" style="cursor: pointer;"  data-id="{!!$temp->id!!}">
                                            <div class="ui card">
                                                <div style="white-space: nowrap; overflow: hidden; overflow: ellipsis;" class="header">{{!!$temp->subject!!}}</div>
                                                <div class="dimmable image">
                                                    <div class="ui dimmer">
                                                        <div class="content">
                                                            <div class="center">
                                                                <a href="{{url('/admin/email-templates/'.$temp->id.'/edit_preview_email_template/'.$string)}}" target="_blank" class="ui inverted button " >Preview</a>
                                                                <a href="{{url('/admin/email-templates/'.$temp->id.'/edit_preview_email_template/'.$string)}}" target="_blank" class="ui inverted button">Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img src="{!!asset('frontend/images/tmp1.jpg')!!}" alt="#">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-success go_to_step9 pull-right append_email_data"> Go to step #3 </button>
                                </div>
                            </div>


                            <div id="step9_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2><b>Step #3 of 3:</b> Select your email template...</h2>
                                <div class="clear30"></div>
                                <div class="error-messages" style="display:none;"></div>
                                <div class="col-xs-12" id="append_after">



                                    <!--    Append Divs        -->



                                    <div class="clear20"></div>
                                    <h3 class="pull-left" style="margin-top:6px">Setup all your follow up emails?</h3>
                                    <button type="button" class="btn btn-success back_to_followup_from_step9 pull-right"> Back to follow up process setup </button>
                                </div>
                            </div>
                            <div id="step10_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2>Setup a new text follow up process for all website enquiries</h2>
                                <h2><b>Step #1 of 2:</b> Text settings...</h2>
                                <div class="clear30"></div>
                                <div class="error-messages" style="display:none;"></div>
                                <div class="col-xs-12">
                                    <div class="followup-list">
                                        <label>Name of text follow up process:</label><input type="text" name="t_p_name"  placeholder="Name of text follow up process" id="t_p_name" class="form-control validate_input"/>
                                    </div>
                                    <div class="followup-list">
                                        <label>How many texts do you want to send?</label><input type="text" name="t_p_text_count"  placeholder="Number of texts" id="t_p_text_count" class="form-control validate_input"/>
                                    </div> 
                                    <div class="followup-list">
                                        <label>Select phone number:</label><select name="t_p_number" id="t_p_number" class="form-control">  
                                        @if($contacts !="")
                                            @foreach($contacts as $info) 
                                                <option>{{$info}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-success go_to_step11 pull-right text_data_append"> Go to step #2 </button>
                                </div>
                            </div>

                            <div id="step11_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2><b>Step #2 of 2:</b> Enter your text ...</h2>
                                <div class="clear30"></div>
                                <div class="error-messages" style="display:none;"></div>
                                <div class="col-xs-12" id="text_append">
                                    

                                <!--                   Append Divs                          -->


                                    <div class="clear20"></div>
                                    <h3 class="pull-left" style="margin-top:6px">Setup all your follow up texts?</h3>
                                    <button type="button" class="btn btn-success back_to_followup_from_step11 pull-right"> Back to follow up process setup </button>
                                </div>
                            </div>

                            
                            <div id="step12_contacting_leads" class="step_contacting_leads" style="display:none;">
                                <h2>Setup a new call follow up process to ring people who fillout the enquiry form</h2>
                                <h2><b>Step #1 of 3:</b> Call settings...</h2>
                                <div class="clear30"></div>

                                <div class="error-messages" style="display:none;"></div>

                                <div class="col-xs-12">
                                    <div class="followup-list">
                                        <label>Name of the call follow up process:</label><input type="text" name="c_p_name"  placeholder="Name of call follow up process" id="c_p_name" class="form-control validate_input"/>
                                    </div>

                                    <div class="followup-list">
                                        <label>Are you auto or manual dailing people when they fill out the form?</label>
                                        <select name="dail_status" id="dail_status" class="form-control">  
                                            <option value="1">Auto</option>
                                            <option value="2">Manual</option>
                                        </select>
                                    </div>

                                    <div class="followup-list">
                                        <label>Are you using mobile or USB head set?</label>
                                        <select name="device" id="device" class="form-control">  
                                            <option value="1">Mobile</option>
                                            <option value="2">Head Set</option>
                                        </select>
                                    </div>
                                    
                                    <div class="followup-list">
                                        <label>Select Number</label>
                                        <select name="call_number" id="call_number" class="form-control">  
                                            @if($contacts !="")
                                                @foreach($contacts as $info) 
                                                    <option>{{$info}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="clear20"></div>
                                    <button type="button" class="btn btn-success go_to_step13 pull-right"> Go to step #2 </button>
                                </div>
                            </div>

                                

                                <div id="step13_contacting_leads" class="step_contacting_leads" style="display:none;">
                                    <h2>Setup a new call follow up process for all website enquiries</h2>
                                    <h2><b>Step #2 of 3:</b> Call settings...</h2>
                                    <div class="clear30"></div>
                                    <div class="error-messages" style="display:none;"></div>
                                    <div class="col-xs-12">

                                        <div class="followup-list">
                                            <label>How many calls do you want to send?</label><input type="text" name="call_count"  placeholder="Number of person receive calls" id="call_count" class="form-control validate_input"/>
                                        </div> 
                                                                            
                                        <div class="clear20"></div>
                                        <button type="button" class="btn btn-success go_to_step14 pull-right call_data_append"> Go to step #3 </button>
                                    </div>
                                </div>

                                <div id="step14_contacting_leads" class="step_contacting_leads" style="display:none;">
                                    <h2><b>Step #3 of 3:</b> Team Settings ...</h2>
                                    <div class="clear30"></div>
                                    <div class="error-messages" style="display:none;"></div>
                                    <div class="col-xs-12" id="call_append">
                                        
                                        
                                        

                                        <!--                   Append Divs                          -->


                                        <div class="clear20"></div>
                                        <h3 class="pull-left" style="margin-top:6px">Setup all your follow up texts?</h3>
                                        <button type="button" class="btn btn-success append_call_data back_to_followup_from_step12 pull-right"> Back to follow up process setup </button>
                                </div>
                                </div>
                                
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

<!--                Modal Start              -->

<div id="test_email_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send a test email for this enquiry follow up process</h4>
            </div>
            <div class="modal-body">
                <label>Enter the email address you want to send a test follow up process:</label>
                <input name="test_email" id="test_email" class="form-control" placeholder="Enter the email address validate_input_modal"/>
            </div>
            <div class="modal-footer">
                <button type="button" id="send_test_email" class="btn btn-success" data-dismiss="modal">Send test email NOW</button>
            </div>
        </div>
    </div>
</div>
<div id="test_text_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send a test text for this enquiry follow up process</h4>
            </div>
            <div class="modal-body">
                <label>Enter the mobile phone number you want to send a test follow up process:</label>
                <input name="test_text" id="test_text" class="form-control validate_input_modal" placeholder="Enter the email address"/>
            </div>
            <div class="modal-footer">
                <button type="button" id="send_test_text" class="btn btn-success" data-dismiss="modal">Send test text NOW</button>
            </div>
        </div>
    </div>
</div>
<div id="test_call_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Make a test call for this enquiry follow up process</h4>
            </div>
            <div class="modal-body">
                <label>Enter the email address you want to send a test follow up process:</label>
                <input name="test_email" id="test_email" class="form-control validate_input_modal" placeholder="Enter the email address"/>
            </div>
            <div class="modal-footer">
                <button type="button" id="send_test_email" class="btn btn-success" data-dismiss="modal">Make test call NOW</button>
            </div>
        </div>
    </div>
</div>


<script>



function fun()
{
    $('#setup').data('id', 1);
}
function fun2()
{
    $('#text_setup').data('id', 1);
}
function fun3()
{
    $('#call_setup').data('id', 1);
}

    $(document).ready(function () {
        $('.cnfrm').hide();
        $('[data-toggle="tooltip"]').tooltip();
		
			$("#SelectDatePeriod").change(function(){
			   $("#text").val($('#SelectDatePeriod option:selected').text());
			   $('#dateForm').submit();
			});
			
			$("#dateForm").submit(function(){
			   
			   $("#text").val($('#SelectDatePeriod option:selected').text());
			
			});
    });

     $(document).on('change', ".email_sequence", function () {
        var element = $(this);
        if(element.val() == 0){
            $('.setup_email').show();
        }else{
            $('.setup_email').hide();
        }
        
    });
    $(document).on('change', ".text_sequence", function () {
        var element = $(this);
        if(element.val() == 0){
            $('.setup_text').show();
        }else{
            $('.setup_text').hide();
        }
        
    });
    $(document).on('change', ".call_sequence", function () {
        var element = $(this);
        if(element.val() == 0){
            $('.setup_call').show();
        }else{
            $('.setup_call').hide();
        }
    });

    var list = [];
    $(document).on('click', ".btn-confirm", function () {
        var element = $(this);
        var elem = $(this);
        if(element.hasClass('btn-danger')){
            element.removeClass('btn-danger');
            element.addClass('btn-success');
            element.children('i').removeClass('fa-close');
            element.children('i').addClass('fa-check');
            list.push(element.data('id'));
            $('#email_array_id').val(list);
        }else{
            element.removeClass('btn-success');
            element.addClass('btn-danger');
            element.children('i').addClass('fa-close');
            element.children('i').removeClass('fa-check');
            if($.inArray(element.data('id'), list) !== -1){
                list = $.grep(list, function(value) {
                    return value != element.data('id');
                });
                $('#email_array_id').val(list);
            }
        }
    });

    $(document).on('click', ".template", function () {
        var element = $(this);
        $('#template_id_by_id').val(element.data('id'));

        $('.template').removeClass("temp_active");
        $(this).addClass("temp_active");

    });


    $(document).on('click', ".append_email_data", function () {
        var no_of_emails = $('#e_p_email_count').val();
        var template_id = 0;
        $(document).on('click', ".template", function () {
            var element = $(this);
            template_id = $('#template_id_by_id').val(element.data('id'));
        });
        
        var html = '<div class="tabable-area">';
        var html1 = '<div class="tab">';
        var html2 = '';
              
        for(var i=0; i<no_of_emails; i++)
        {
           cnt = i+1;
           var m_id = 'Email'+cnt;
            html1 += '<button type="button" id="emailbtn'+ cnt +'" class="tablinks" onclick="openCity(event,\''+m_id+'\')">Email '+cnt+'</button>';
            if(cnt == no_of_emails){
                html1 += '<button type="button" class="tablinks" id="addnewemailbtn" onclick="add_new('+no_of_emails+')">+</button>';
            }
            
            if(i!=0){
                var option = 'style="display:none"';
            }else{
                var option = '';
            }
            html2 += '<div id="Email'+cnt+'" class="tabcontent" '+option+'><div class="clear20"></div><div class="followup-setup"><label>When should we send the email?</label><input  type="text" name="days_after'+cnt+'" placeholder="Number of days" id="days_after'+cnt+'" class="form-control validate_input_append_email"/><label> days after enquiry is made</label> </div><div class="followup-setup"><label>Email subject line:</label><input  type="text" name="email_subject'+cnt+'" placeholder="Subject" id="email_subject'+cnt+'" class="form-control validate_input_append_email"/></div><div class="followup-setup"><input type="hidden" name="email_status_name'+cnt+'" id="email_status_id'+cnt+'" value="" ><label>Is the email live or paused?</label><a data-text="Paused" class="btn btn-danger email_status'+cnt+'" href="javascript:void(0)">Paused</a><a data-text="Live" class="btn btn-success email_status'+cnt+'" href="javascript:void(0)">Live</a></div><div class="col-md-offset-4 col-md-4 tiles-tc"><div class="ui card"><div class="header">Email Template</div><div class="dimmable image"><div class="ui dimmer"><div class="content"><div class="center"><a class="ui inverted button">Preview</a><a class="ui inverted button">Edit</a></div></div></div><img src="{!!asset("public/frontend/images/tmp2.jpg")!!}" alt="#"></div> </div></div><div class="clear10"></div><div class="col-md-12 text-center"><a type="button" class="btn btn-danger" onclick="del_elements('+cnt+','+cnt+')"> Delete Email </a></div><div class="clear20"></div></div>';



    


            $(document).on('click', ".email_status"+cnt, function () {
                var element = $(this);
                if(element.data('text') == "Paused"){
                    $('#email_status_id'+cnt).val("0");
                }else{
                    $('#email_status_id'+cnt).val("1");
                }
            });
            
             
            
        }

        html1 += '</div>';
        html = html+html1+html2;
        html += '</div>';
        $("#append_after").prepend(html);
    });
    
    

    $(document).on('click', ".text_data_append", function () {
        var no_of_texts = $('#t_p_text_count').val();
        
        var html = '<div class="tabable-area">';
        var html1 = '<div class="tab">';
        var html2 = '';
        for(var i=0; i<no_of_texts; i++)
        {
            cnt = i+1;
            var m_id = 'Text'+cnt;
            html1 += '<button type="button" class="tablinks" onclick="openCity(event,\''+m_id+'\')">Text '+cnt+'</button>';
            if(i!=0){
                var option = 'style="display:none"';
            }else{
                var option = '';
            }
            html2 += '<div id="Text'+cnt+'" class="tabcontent" '+option+'><div class="clear20"></div><div class="followup-setup"><label>When should we send the text?</label><input  type="text" name="days_text_after'+cnt+'" placeholder="Number of days" id="days_text_after'+cnt+'" class="form-control validate_input_text"/><label> days after enquiry is made</label></div><div class="followup-setup"><input  type="hidden" name="text_status_name'+cnt+'" id="text_status_id'+cnt+'" value=""><label>Is the text live or paused?</label><a data-text="Paused" class="btn btn-danger text_status'+cnt+'" href="javascript:void(0)">Paused</a><a data-text="Live" class="btn btn-success text_status'+cnt+'" href="javascript:void(0)">Live</a></div><div class="clear10"></div><div class="col-md-offset-2 col-md-8"><label>Enter the text message you want to send...</label><div class="clear5"></div><textarea rows="8" name="text_message'+cnt+'" placeholder="Text message" id="text_message'+cnt+'" class="form-control"></textarea></div><div class="clear10"></div><div class="col-md-12 text-center" id="delete_text"><a type="button" class="btn btn-danger"> Delete text </a></div><div class="clear20"></div></div></div>';

            $(document).on('click', ".text_status"+cnt, function () {
                var element2 = $(this);
                if(element2.data('text') == "Paused"){
                    $('#text_status_id'+cnt).val("0");
                }else{
                    $('#text_status_id'+cnt).val("1");
                }
            });

        }
        
        html1 += '</div>';
        html = html+html1+html2;
        html += '</div>';
        $("#text_append").prepend(html);
    });

        $(document).on('click', ".call_data_append", function () {
        var no_of_calls = $('#call_count').val();
        
        var html = '<div class="tabable-area">';
        var html1 = '<div class="tab">';
        var html2 = '';
        for(var i=0; i<no_of_calls; i++)
        {
           cnt = i+1;
           var m_id = 'Call'+cnt;
            html1 += '<button type="button" class="tablinks" onclick="openCity(event,\''+m_id+'\')">Call '+cnt+'</button>';
            if(i!=0){
                var option = 'style="display:none"';
            }else{
                var option = '';
            }
            html2 += '<div id="Call'+cnt+'" class="tabcontent Followup-Setup" '+option+' ><div class="clear20"></div><div class="form-group"><div class="row"><div class="col-md-4"><label> Team members name </label></div><div class="col-md-8"><input type="text" name="member_name'+cnt+'" placeholder="Member Name" id="member_name'+cnt+'" class="form-control member_info"/></div></div></div><div class="form-group"><div class="row"><div class="col-md-4"><label>Team members email</label> </div><div class="col-md-8"><input type="text" name="member_email'+cnt+'" placeholder="Member Email" id="member_email'+cnt+'" class="form-control member_info"/></div></div></div><div class="form-group"><div class="row"><div class="col-md-4"><label>Team members personal phone number</label></div><div class="col-md-8"><input type="text" name="member_phone'+cnt+'" placeholder="Member Phone Number" id="member_phone'+cnt+'" class="form-control member_info"/></div></div></div><div class="followup-setup"><label class="text-center">Team members available call answer times:</label></div><div class="table-responsive"><table class="table followup_tbl"><tbody><tr><td>Monday</td><td><input type="time" name="mon_time_from'+cnt+'" id="mon_time_from'+cnt+'" class="form-control member_info"/></td><td>To</td><td><input type="time" name="mon_time_to'+cnt+'" id="mon_time_to'+cnt+'" class="form-control member_info"/></td><td><a class="btn btn-success mon_live'+cnt+'" href="javascript:void(0)">Live</a></td><td><a class="btn btn-danger mon_paused'+cnt+'" href="javascript:void(0)">Paused</a></td></tr><tr><td>Tuesday</td><td><input type="time" name="tue_time_from'+cnt+'" id="tue_time_from'+cnt+'" class="form-control member_info"/></td><td>To</td><td><input type="time" name="tue_time_to'+cnt+'" id="tue_time_to'+cnt+'" class="form-control member_info"/></td><td><a class="btn btn-success tue_live'+cnt+'" href="javascript:void(0)">Live</a></td><td><a class="btn btn-danger tue_paused'+cnt+'" href="javascript:void(0)">Paused</a></td></tr><tr><td>Wednesday</td><td><input type="time" name="wed_time_from'+cnt+'" id="wed_time_from'+cnt+'" class="form-control member_info"/></td><td>To</td><td><input type="time" name="wed_time_to'+cnt+'" id="wed_time_to'+cnt+'" class="form-control member_info"/></td><td><a class="btn btn-success wed_live'+cnt+'" href="javascript:void(0)">Live</a></td><td><a class="btn btn-danger wed_paused'+cnt+'" href="javascript:void(0)">Paused</a></td></tr><tr><td>Thursday</td><td><input type="time" name="thu_time_from'+cnt+'" id="thu_time_from'+cnt+'" class="form-control member_info"/></td><td>To</td><td><input type="time" name="thu_time_to'+cnt+'" id="thu_time_to'+cnt+'" class="form-control member_info"/></td><td><a class="btn btn-success thu_live'+cnt+'" href="javascript:void(0)">Live</a></td><td><a class="btn btn-danger thu_paused'+cnt+'" href="javascript:void(0)">Paused</a></td></tr><tr><td>Friday</td><td><input type="time" name="fri_time_from'+cnt+'" id="fri_time_from'+cnt+'" class="form-control member_info"/></td><td>To</td><td><input type="time" name="fri_time_to'+cnt+'" id="fri_time_to'+cnt+'" class="form-control member_info"/></td><td><a class="btn btn-success fri_live'+cnt+'" href="javascript:void(0)">Live</a></td><td><a class="btn btn-danger fri_paused'+cnt+'" href="javascript:void(0)">Paused</a></td></tr><tr><td>Saturday</td><td><input type="time" name="sat_time_from'+cnt+'" id="sat_time_from'+cnt+'" class="form-control member_info"/></td><td>To</td><td><input type="time" name="sat_time_to'+cnt+'" id="sat_time_to'+cnt+'" class="form-control member_info"/></td><td><a class="btn btn-success sat_live'+cnt+'" href="javascript:void(0)">Live</a></td><td><a class="btn btn-danger sat_paused'+cnt+'" href="javascript:void(0)">Paused</a></td></tr><tr><td>Sunday</td><td><input type="time" name="sun_time_from'+cnt+'" id="sun_time_from'+cnt+'" class="form-control member_info"/></td><td>To</td><td><input type="time" name="sun_time_to'+cnt+'" id="sun_time_to'+cnt+'" class="form-control member_info"/></td><td><a class="btn btn-success sun_live'+cnt+'" href="javascript:void(0)">Live</a></td><td><a class="btn btn-danger sun_paused'+cnt+'" href="javascript:void(0)">Paused</a></td></tr></tbody></table></div><div class="table-responsive"><table class="table followup_tbl"><thead><th></th><th colspan="2" class="text-center">Break #1</th></thead><tbody><tr><td></td><td>Time</td><td>Duration</td></tr><tr><td>Monday</td><td><input type="time" name="mon_du_time_from'+cnt+'" id="mon_du_time_from'+cnt+'" class="form-control member_info"/></td><td><input type="time" name="mon_du_time_to'+cnt+'" id="mon_du_time_to'+cnt+'" class="form-control member_info"/></td></tr><tr><td>Tuesday</td><td><input type="time" name="tue_du_time_from'+cnt+'" id="tue_du_time_from'+cnt+'" class="form-control member_info"/></td><td><input type="time" name="tue_du_time_to'+cnt+'" id="tue_du_time_to'+cnt+'" class="form-control member_info"/></td> </tr><tr><td>Wednesday</td><td><input type="time" name="wed_du_time_from'+cnt+'" id="wed_du_time_from'+cnt+'" class="form-control member_info"/></td><td><input type="time" name="wed_du_time_to'+cnt+'" id="wed_du_time_to'+cnt+'" class="form-control member_info"/></td></tr><tr><td>Thursday</td><td><input type="time" name="thu_du_time_from'+cnt+'" id="thu_du_time_from'+cnt+'" class="form-control member_info"/></td><td><input type="time" name="thu_du_time_to'+cnt+'" id="thu_du_time_to'+cnt+'" class="form-control member_info"/></td> </tr><tr><td>Friday</td><td><input type="time" name="fri_su_time_from'+cnt+'" id="fri_du_time_from'+cnt+'" class="form-control member_info"/></td><td><input type="time" name="fir_du_time_to'+cnt+'" id="fri_du_time_to'+cnt+'" class="form-control member_info"/></td> </tr> <tr><td>Saturday</td><td><input type="time" name="sat_du_time_from'+cnt+'" id="sat_du_time_from'+cnt+'" class="form-control member_info"/></td><td><input type="time" name="sat_du_time_to'+cnt+'" id="sat_du_time_to'+cnt+'" class="form-control member_info"/></td></tr><tr><td>Sunday</td><td><input type="time" name="sun_du_time_from'+cnt+'" id="sun_du_time_from'+cnt+'" class="form-control member_info"/></td><td><input type="time" name="sun_du_time_to'+cnt+'" id="sun_du_time_to'+cnt+'" class="form-control  member_info "/></td></tr></tbody></table></div><div class="text-center "><a type="button" class="btn btn-danger"> Delete Team Member </a></div><div class="clear20"></div></div>'

        }
        html1 += '</div>';
        html = html+html1+html2;
        html += '</div>';
        $("#call_append").prepend(html);
    });





    

    $(document).on('click', ".next_from_step2", function () {
        if($('#email_array_id').val() == ""){
            $(".error-messages").text("Please Select atleast 1 from the List").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step2_contacting_leads").toggle('slide');
            $("#step3_contacting_leads").delay(500).toggle('slide');
        }
        
    });
    $(document).on('click', ".previous_from_step2", function () {
        $("#step2_contacting_leads").toggle('slide');
        $("#step1_contacting_leads").delay(500).toggle('slide');
    });
    $(document).on('click', ".back_to_step2", function () {
        $("#step3_contacting_leads").toggle('slide');
        $("#step2_contacting_leads").delay(500).toggle('slide');
    });
    $(document).on('click', ".go_to_step4", function () {
        if($('#email_sequence').val() == 0 && $('#setup').data('id') == 0){
            $(".error-messages").text("Please either Select any option or click on the link. ").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step3_contacting_leads").toggle('slide');
            $("#step4_contacting_leads").delay(500).toggle('slide');
        }
        
    });
    $(document).on('click', ".back_to_step3", function () {
        $("#step4_contacting_leads").toggle('slide');
        $("#step3_contacting_leads").delay(500).toggle('slide');
    });
    $(document).on('click', ".go_to_step5", function () {

        if($('#text_sequence').val() == 0 && $('#text_setup').data('id') == 0){
            $(".error-messages").text("Please either Select any option or click on the link. ").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step4_contacting_leads").toggle('slide');
            $("#step5_contacting_leads").delay(500).toggle('slide');
        }
    });
    $(document).on('click', ".back_to_step4", function () {
        $("#step5_contacting_leads").toggle('slide');
        $("#step4_contacting_leads").delay(500).toggle('slide');
    });
    $(document).on('click', ".go_to_step6", function () {
        // farhan
        if($('#call_sequence').val() == 0 && $('#call_setup').data('id') == 0){
            $(".error-messages").text("Please either Select any option or click on the link. ").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step5_contacting_leads").toggle('slide');
            $("#step6_contacting_leads").delay(500).toggle('slide');
        }
        
    });
    $(document).on('click', ".start_again", function () {
        $("#step6_contacting_leads").toggle('slide');
        $("#step2_contacting_leads").delay(500).toggle('slide');
    });
    $(document).on('click', ".set_up_new_one_from_step3", function () {
        $("#step3_contacting_leads").toggle('slide');
        $("#step7_contacting_leads").delay(500).toggle('slide');
    });

    $(document).on('click', ".go_to_step8", function () {
        var temp = 0;
        var numItems = $('.validate_input_email').length;
       $(".validate_input_email").each(function(){
            if($(this).val() != ""){
             temp+=1;
         }else{
             temp = 0;
         }
        });
        if(temp != numItems){
            $(".error-messages").text("Please fill all the fields first").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }
         else{
            $("#step7_contacting_leads").toggle('slide');
            $("#step8_contacting_leads").delay(500).toggle('slide');
        }
    });

    $(document).on('click', ".go_to_step9", function () {
        if($('#template_id_by_id').val() == ""){
            $(".error-messages").text("Please select the template first").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step8_contacting_leads").toggle('slide');
            $("#step9_contacting_leads").delay(500).toggle('slide');
        }
    });

    $(document).on('click', ".back_to_followup_from_step9", function () {

        var temp = 0;
        var numItems = $('.validate_input_append_email').length;
       $(".validate_input_append_email").each(function(){
            if($(this).val() != ""){
             temp+=1;
         }else{
             temp = 0;
         }
        });
        if(temp != numItems){
            $(".error-messages").text("Please fill all the fields first").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step9_contacting_leads").toggle('slide');
            $("#step3_contacting_leads").delay(500).toggle('slide');
        }
        
    });  
    $(document).on('click', ".back_to_followup_from_step11", function () {
        var temp = 0;
        var numItems = $('.validate_input_text').length;
       $(".validate_input_text").each(function(){
            if($(this).val() != ""){
             temp+=1;
         }else{
             temp = 0;
         }
        });
        if(temp != numItems){
            $(".error-messages").text("Please fill all the fields first").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step11_contacting_leads").toggle('slide');
            $("#step4_contacting_leads").delay(500).toggle('slide');
        }
    });

    $(document).on('click', ".back_to_followup_from_step12", function () {
        var temp = 0;
        var numItems = $('.member_info').length;
       $(".member_info").each(function(){
            if($(this).val() != ""){
             temp+=1;
         }else{
             temp = 0;
         }
        });
        if(temp != numItems){
            $(".error-messages").text("Please fill all the fields first").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step14_contacting_leads").toggle('slide');
            $("#step5_contacting_leads").delay(500).toggle('slide');
        }
    });

    $(document).on('click', ".set_up_new_one_from_step4", function () {
        $("#step4_contacting_leads").toggle('slide');
        $("#step10_contacting_leads").delay(500).toggle('slide');
    });
    $(document).on('click', ".go_to_step11", function () {
        if($('#t_p_number').val() == "" || $('#t_p_text_count').val() == "" ||$('#t_p_name').val() == ""){
            $(".error-messages").text("Please fill all the fields first").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step10_contacting_leads").toggle('slide');
            $("#step11_contacting_leads").delay(500).toggle('slide');
        }
    });
    $(document).on('click', ".go_to_step12", function () {
       
            $("#step11_contacting_leads").toggle('slide');
            $("#step12_contacting_leads").delay(500).toggle('slide');
        
    });
    $(document).on('click', ".set_up_new_one_from_step5", function () {
       
            $("#step5_contacting_leads").toggle('slide');
            $("#step12_contacting_leads").delay(500).toggle('slide');

    });

    // CAll processing

    $(document).on('click', ".go_to_step13", function () {
        if($('#call_number').val() == "" || $('#device').val() == "" || $('#dail_status').val() == "" || $('#c_p_name').val() == ""){
            $(".error-messages").text("Please fill all the fields first").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step12_contacting_leads").toggle('slide');
            $("#step13_contacting_leads").delay(500).toggle('slide');
        }
    });

        $(document).on('click', ".go_to_step14", function () {
            if($('#call_count').val() == ""){
            $(".error-messages").text("Please Enter the number of perons who receive the calls").fadeIn(800).delay(1000).fadeOut(800);
            $(".error-messages").css("color", "red");
            $(".error-messages").css("font-size", "28px");
        }else{
            $("#step13_contacting_leads").toggle('slide');
            $("#step14_contacting_leads").delay(500).toggle('slide');
        }
    });





    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function add_new(no_of_emails){
        
        var n = $("#append_after .tab button").length;
        
        $('<button type="button" id="emailbtn'+ n +'" class="tablinks" onclick="openCity(event,\'Email'+n+'\')">Email '+n+'</button>').insertBefore($('#addnewemailbtn'));
        
                var option = 'style="display:none"';
        
            var html2 = '<div id="Email'+n+'" class="tabcontent" '+option+'><div class="clear20"></div><div class="followup-setup"><label>When should we send the email?</label><input  type="text" name="days_after'+n+'" placeholder="Number of days" id="days_after'+n+'" class="form-control validate_input_append_email"/><label> days after enquiry is made</label> </div><div class="followup-setup"><label>Email subject line:</label><input  type="text" name="email_subject'+n+'" placeholder="Subject" id="email_subject'+n+'" class="form-control validate_input_append_email"/></div><div class="followup-setup"><input type="hidden" name="email_status_name'+n+'" id="email_status_id'+n+'" value="" ><label>Is the email live or paused?</label><a data-text="Paused" class="btn btn-danger email_status'+n+'" href="javascript:void(0)">Paused</a><a data-text="Live" class="btn btn-success email_status'+n+'" href="javascript:void(0)">Live</a></div><div class="col-md-offset-4 col-md-4 tiles-tc"><div class="ui card"><div class="header">Email Template</div><div class="dimmable image"><div class="ui dimmer"><div class="content"><div class="center"><a class="ui inverted button">Preview</a><a class="ui inverted button">Edit</a></div></div></div><img src="{!!asset("public/frontend/images/tmp2.jpg")!!}" alt="#"></div> </div></div><div class="clear10"></div><div class="col-md-12 text-center"><a type="button" class="btn btn-danger" onclick="del_elements('+n+','+n+')"> Delete Email </a></div><div class="clear20"></div></div>';
        
        $(html2).insertAfter($('#Email'+(n-1)+''));
        

}


function del_elements(emailtab,emailbtn){
    
        $('#Email'+emailtab+'').remove();
        $('#emailbtn'+emailbtn+'').remove();
}


</script>



@endsection