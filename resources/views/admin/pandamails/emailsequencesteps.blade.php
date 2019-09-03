@extends('admin.layouts.app')
@section('content')
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            @include('admin.pandamails.nav')
            <div class="right-contentarea">
                <div class="inner-content clearfix">
                    <div class="panda_search">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <form>
                                    <div id="custom-search-input">
                                        <input class="  search-query form-control" placeholder="Search Your Email Sequence..." type="text">
                                        <button class="btn btn-defalut" type="button">
                                            <span class=" glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a id="add_new_list" data-toggle="modal" data-target="#add_new_email_sequence_steps" class="btn btn-default" title="Add new List" href="javascript:void(0)">
                                    <i class="fa fa-plus-square"></i>  Add New Step
                                </a>
                            </div>	
                        </div>	
                    </div>
					
                    <div class="row">
                      <div class="col-sm-12">
                      <h3> <a id="edit_sequence" data-toggle="modal" data-target="#edit_email_sequence" class="" title="Edit Email Sequence" href="javascript:void(0)" ><i class="fa fa-edit fa-fw"></i></a>{{$funnel->title}} </h3>
                      </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Duration</th>
                                    <th>Trigger</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach($steps as $item)
                             <tr>
                                <td>{{ $item->step_name }}</td>
                                <td>{{ ($item->duration != 0)? $item->duration.' '.$item->action : 'Immediately' }} after users sign up.</td>
                                <td>{{($item->is_email == 1)? 'Send email' : 'Send message'}}</td>
                                <td>{{ ($item->is_active == 1)? 'Active' : 'Inactive' }}</td>
                                <td><a  class="edit_email_sequence_step" id="{{$item->id}}" name="{{ $item->step_name }}" duration="{{ $item->duration}}" action="{{$item->action }}" status="{{$item->is_active}}" trigger="{{($item->is_email == 1)? 'email' : 'message'}}" template_id="{{$item->email_template_id}}" title="Edit Email Sequence Step" href="javascript:void(0)"><i class="fa fa-edit fa-fw"></i></a>
                                
                                
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['admin/delete-email-sequence-step', $item->id, $funnel_id],
                                    'style' => 'display: inline;'
                                    ]) !!}
                                    <a href="javascript:void(0)" title="Delete Email Sequence Step" class="delete-form-btn"><i class="fa fa-trash fa-fw" title="Delete Email Sequence Step"></i></a>
                                    {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit']) !!}
                                    {!! Form::close() !!}
                                
                                </td>
                            </tr>
                              @endforeach  
                              
                              @if (count($steps) == 0)
                                    <tr>
                                    <td colspan="3" align="center">YOU CURRENTLY HAVE NO EMAIL SEQUENCE STEPS...</td>
                                </tr>
                              @endif   
                            </tbody>
                        </table>
                    </div>
                    <nav class="pull-right">{!! $steps->render() !!}</nav>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>


<div id="edit_email_sequence" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Email Sequence</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/update-email-sequence')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="funnel_id" value="{{$funnel_id}}"  />
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="name" value="{{$funnel->title}}" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Title" required="required">
                    </div>
                    
                    <div class="form-group">
                        <label for="country" class="col-sm-4 control-label">Email Lists:</label>
                            <select name="list_id" id="list_id" class="form-control required">
                                @foreach($emaillist as $list)
                                <option value="{{$list->id}}" {{($funnel->email_list_id == $list->id)? 'selected': ''}}>{{$list->title}}</option>
                                @endforeach
                            </select>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    
                    <div class="clear5"></div>
                </form>
                
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/delete-email-sequence', $funnel_id],
                    'style' => 'display: inline;'
                    ]) !!}
                    <a href="javascript:void(0)" title="Delete email sequence" class="delete-form-btn">Delete This Email Sequence</a>
                    {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<div id="edit_email_sequence_step" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Email Step</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin/update-email-sequence-step')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="funnel_id" id="funnel_id" value="{{$funnel_id}}"  />
                    <input type="hidden" name="funnel_step_id" id="funnel_step_id" value=""  />
                    <input type="hidden" name="template_id" id="template_id" value=""  />
                    <p class="helpinfotextarea">
                        <i class="fa fa-exclamation-triangle"></i>
                        <strong>Important:</strong>
                        SMTP settings are required to send mails if you didn't setup emails will not send.
                    </p>
                    <div class="form-group">
                        <label for="name">Step Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Step Name" required="required">
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">
                        <label for="name">When To Trigger Action</label>
                    </div>
                    
                    <div class="col-sm-2">
                        <input type="number" min="0" name="duration"  size="5" class="form-control " id="duration" aria-describedby="nameHelp" placeholder="" required="required">
                    </div>
                    
                    <div class="col-sm-2">
                            <input type="radio" name="action" required value="days" checked="" aria-invalid="false" class="valid days"> Days &nbsp;&nbsp; <input type="radio"  name="action" value="hours" class="valid hours"> Hours
                    </div>
                    </div>
                    
                    <div class="row">
                     <div class="col-sm-3">
                      <label for="name">Choose Trigger</label>
                     </div>
                     <div class="col-sm-8">
                      <input type="radio" name="trigger" value="email" checked="" aria-invalid="false" class="valid trigger_email trigger_input"> Send Email &nbsp;&nbsp; <input type="radio" name="trigger" value="txt" class="valid trigger_message trigger_input"> TXT Message
                      </div>
                    </div>
                    <br />

                    <div class="row">
                        <label for="country" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-8">
                            <select name="is_active" id="is_active" class='form-control required'>
                                <option value="1" class="active">Active</option>
								<option value="0" class="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    
                    <div class="row" id="emailDiv">
                        <div class="col-sm-3">
                        <label for="country" class="">Email Template:</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="email_template_id" id="email_template_id"  required class=' form-control required'>
                                @foreach($emailTemplates as $template)
                                <option value="{{$template->id}}">{{$template->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" id="smsDiv">
                        <div class="col-sm-3">
                        <label for="country" class="">SMS Template:</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="sms_template_id" id="sms_template_id"  required class=' form-control required'>
                                @foreach($smsTemplates as $template)
                                <option value="{{$template->id}}">{{$template->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br />

                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div class="clear5"></div>
                </form>
            </div>
        </div>
    </div>
</div>



<div id="add_new_email_sequence_steps" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Email Step</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin/save-email-sequence-step')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="funnel_id" value="{{$funnel_id}}"  />
                    
                    <p class="helpinfotextarea">
                        <i class="fa fa-exclamation-triangle"></i>
                        <strong>Important:</strong>
                        SMTP settings are required to send mails if you didn't setup emails will not send.
                    </p>
                    
                    <div class="form-group">
                        <label for="name">Step Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Step Name" required="required">
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">
                        <label for="name">When To Trigger Action</label>
                    </div>
                    
                    <div class="col-sm-2">
                        <input type="number" min="0" value="0" name="duration"  size="5" class="form-control " id="duration" aria-describedby="nameHelp" placeholder="" required="required">
                    </div>
                    
                    <div class="col-sm-2">
                            <input type="radio" name="action" required value="days" checked="" aria-invalid="false" class="valid"> Days &nbsp;&nbsp; <input type="radio"  name="action" value="hours" class="valid"> Hours
                    </div>
                    </div>
                    
                    <div class="row">
                     <div class="col-sm-3">
                      <label for="name">Choose Trigger</label>
                     </div>
                     <div class="col-sm-8">
                      <input type="radio" name="trigger" value="email" checked="" aria-invalid="false" class="valid trigger_input"> Send Email &nbsp;&nbsp; <input type="radio" name="trigger" value="txt" class="valid trigger_input"> TXT Message
                      </div>
                    </div>
                    
                    
                    <div class="row" id="emailDiv">
                        <div class="col-sm-3">
                        <label for="country" class="">Email Template:</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="email_template_id" id="email_template_id"  required class=' form-control required'>
                                @foreach($emailTemplates as $template)
                                <option value="{{$template->id}}">{{$template->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br />

                    <div class="row hidden" id="smsDiv">
                        <div class="col-sm-3">
                        <label for="country" class="">SMS Template:</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="sms_template_id" id="sms_template_id"   class=' form-control required'>
                                @foreach($smsTemplates as $template)
                                <option value="{{$template->id}}">{{$template->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <br />
                    
                    

                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div class="clear5"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
		
		$(".del_sequence").click(function(){
		  
		  if(!confirm('Are you sure to delete this Email Sequence ?'))
		  	return false;
		
		});
		
		$(".del_sequence_step").click(function(){
		  
		  if(!confirm('Are you sure to delete this Email Sequence Step?'))
		  	return false;
		
		});
		
		$(document).on("click", "#add_new_email_sequence_steps .trigger_input", function(){

		 if($(this).attr('value') == 'email')
		 {
			 $("#add_new_email_sequence_steps #email_template_id").val($("#edit_email_sequence_step #template_id").val()); 
			 $("#add_new_email_sequence_steps #emailDiv").removeClass('hidden'); 
			 $("#add_new_email_sequence_steps #smsDiv").addClass('hidden');
			 $("#add_new_email_sequence_steps #sms_template_id").removeAttr('required'); 
			 $("#add_new_email_sequence_steps #email_template_id").attr('required', true); 
		  }
		  else
		  {
			 $("#add_new_email_sequence_steps #sms_template_id").val($("#edit_email_sequence_step #template_id").val()); 
			 $("#add_new_email_sequence_steps #emailDiv").addClass('hidden');
			 $("#add_new_email_sequence_steps #smsDiv").removeClass('hidden'); 
			 $("#add_new_email_sequence_steps #email_template_id").removeAttr('required'); 
			 $("#add_new_email_sequence_steps #sms_template_id").attr('required', true); 
		  }	
		
		
		});
		
		
		$(document).on("click", "#edit_email_sequence_step .trigger_input", function(){

		 if($(this).attr('value') == 'email')
		 {
			 $("#edit_email_sequence_step #email_template_id").val($("#edit_email_sequence_step #template_id").val()); 
			 $("#edit_email_sequence_step #emailDiv").show(); 
			 $("#edit_email_sequence_step #smsDiv").hide(); 
			 $("#edit_email_sequence_step #sms_template_id").removeAttr('required'); 
		  }
		  else
		  {
			 $("#edit_email_sequence_step #sms_template_id").val($("#edit_email_sequence_step #template_id").val()); 
			 $("#edit_email_sequence_step #emailDiv").hide(); 
			 $("#edit_email_sequence_step #smsDiv").show();
			 $("#edit_email_sequence_step #email_template_id").removeAttr('required');  
		  }	
		
		
		});
		
		$(".edit_email_sequence_step").click(function(){
		  
		  $("#edit_email_sequence_step #funnel_step_id").val(this.id);
		  $("#edit_email_sequence_step #name").val($(this).attr("name"));
		  $("#edit_email_sequence_step #duration").val($(this).attr("duration"));
		  $("#edit_email_sequence_step #template_id").val($(this).attr("template_id")); 
		  
		  if($(this).attr("trigger") == 'email')
		  {
			 $("#edit_email_sequence_step #email_template_id").val($(this).attr("template_id")); 
			 $("#edit_email_sequence_step #emailDiv").show(); 
			 $("#edit_email_sequence_step #smsDiv").hide(); 
		  }
		  else
		  {
			 $("#edit_email_sequence_step #sms_template_id").val($(this).attr("template_id")); 
			 $("#edit_email_sequence_step #emailDiv").hide(); 
			 $("#edit_email_sequence_step #smsDiv").show(); 
		  }
		  
		  
		  
		  if($(this).attr("action") == 'days')
		  	 $("#edit_email_sequence_step .days").prop("checked", true);
		  else
		  	$("#edit_email_sequence_step .hours").prop("checked", true);
		  
		  if($(this).attr("trigger") == 'email')
		  	 $("#edit_email_sequence_step .trigger_email").prop("checked", true);
		  else
		  	$("#edit_email_sequence_step .trigger_message").prop("checked", true);
			
		  if($(this).attr("status") == 1)
		  	 $("#edit_email_sequence_step #is_active .active").prop("selected", true);
		  else
		  	$("#edit_email_sequence_step #is_active .inactive").prop("selected", true);
		
		  
		  
		  $('#edit_email_sequence_step').modal({
				show: 'true'
			});
		  
		  
		});
    });
</script>
@endsection