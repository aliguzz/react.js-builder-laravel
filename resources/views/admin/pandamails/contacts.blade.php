@extends('admin.layouts.app')
@section('content')
@include('admin.sections.elconsubheader')
<div class="container-fluid">
        <section class="inner-full-width-panel pr-30">
            <div class="tab-content">
                <div id="menu2" class="tab-pane @if(isset($_GET['el'])) active @endif">
                    <div class="right-content right-content-space fixed-width">
                        <div class="header-title">
                            <h3 class="warning left-part">Email Lists</h3>
                             @if(have_premission(array(150)))
                             <div style="float:right;"> 
                                <a id="add_new_list" data-toggle="modal" data-target="#add_new_email_list" class="btn btn-default" title="Add new List" href="javascript:void(0)">
                                    <i class="fa fa-plus"></i>
                                    Add New List
                                </a> 
                            </div>
                            @endif
                        </div>
                        <div class="editor-dashboard-container">
                            <div class="dashboard-Contact-box">
                                <div class="table-responsive">
                                    <table class="table min-width">
                                        @foreach(@$email_lists as $key=>$el)
                                        <tr>
                                            <td><div class="h6">{{ $key+1}}</div></td>
                                            <td>{!!$el->title!!}</td>
                                            <td>{!!$el->sub_count!!}</td>
                                            <td>{!!$el->unsub_count!!}</td>
                                            <td>
                                                @if(have_premission(array(151)))
                                                <a href="{!!url('admin/contacts/lists/'.$el->id.'/edit')!!}"><i class="fa fa-edit fa-fw"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a style="opacity:0;" id="go-download" href=""></a>
                        <nav class="pull-right">{!! $email_lists->render() !!}</nav>
                    </div>
                </div>
                <div id="menu9" class="tab-pane @if(!isset($_GET['el'])) active @endif">
                    <div class="right-content right-content-space fixed-width">
                        <div class="header-title">
                            <h3 class="warning left-part">Contacts</h3>
                            @if(have_premission(array(148)))
                            <div class="right-part">
                                <span>Export Contacts</span>
                                <a id="export_leads" style="cursor:pointer;" class="icon-green" title="Export Contacts CSV">
                                    <img src="{{asset('frontend/images/print.svg')}}">
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="editor-dashboard-container">
                            <div class="dashboard-Contact-box">
                                <div class="table-responsive">
                                    <table id="contacts_data" class="table min-width">
                                        @foreach(@$contacts as $key => $cont)
                                        <tr>
                                            <td><div class="h6">{{ $key+1}}</div></td>
                                            <td>@if($cont->title){!!$cont->title!!}@endif @if($cont->full_name) {!!$cont->full_name!!} @else {!!$cont->first_name.' '.$cont->last_name!!} @endif</td>
                                            <td><span class="flex"><img class="img-fluid" src="{{asset('frontend/images/icon-4.jpg')}}">{!!$cont->email!!}</span></td>
                                            <td> <span class="flex"> <img class="img-fluid" src="{{asset('frontend/images/icon-5.jpg')}}"> {!!$cont->phone!!}</span></td>
                                            <td><span class="flex"> <img class="img-fluid" src="{{asset('frontend/images/icon-6.jpg')}}"> {!!$cont->ip_address!!}</span></td>
                                            <td> <span class="flex"><img class="img-fluid" src="{{asset('frontend/images/icon-7.jpg')}}"> {!!$cont->page!!}</span></td>
                                            
                                            <td>@if($cont->lead_status == 1) <img class="img-fluid" src="{{asset('frontend/images/icon-1.jpg')}}">@else <img class="img-fluid" src="{{asset('frontend/images/icon-3.jpg')}}"> @endif</td>
                                        
                                        <td class="text-center" width="12%">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$cont->id}}">View Detail</button>
                                            <div class="modal" id="myModal{{$cont->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <div class="popup-top-two">@if($cont->title){!!$cont->title!!}@endif @if($cont->full_name) {!!$cont->full_name!!} @else {!!$cont->first_name.' '.$cont->last_name!!} @endif</div>
                                                            <div class="table-box">
                                                                <table class="table table-striped table-nomargin no-margin">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Key</th>
                                                                            <th>Value</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                        $full_name = $cont->first_name.' '.$cont->last_name
                                                                        @endphp
                                                                        @foreach(@json_decode(json_encode($cont)) as $k => $c)
                                                                        <tr>
                                                                            <td width="50%" height="30">{!!ucfirst(str_replace("_"," ",$k))!!}</td>
                                                                            <td width="50%" height="30">@if($k == "full_name" && $c == "") {!!$full_name!!} @else {!!$c!!} @endif </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a style="opacity:0;" id="go-download" href=""></a>
                        <nav class="pull-right">{!! $contacts->render() !!}</nav>
                </div>
            </div>
        </section>
    </div>

<div id="add_new_email_list" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Email List</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin/contacts/create-email-list')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">List Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter List Name" required="required">
                        <small id="nameHelp" class="form-text text-muted">Name your email list.</small>
                    </div>
                    <div id="filters_div" style="display:none;"></div>
                    <div class="form-group">
                        <label>Set Filter</label>
                        <select id="keys_selecter" class="form-control" aria-describedby="keysHelp">
                            <option value="" disabled="" selected="" hidden="">Select filter parameter</option>
                            <option value="id" data-type="number">Id</option>
                            <option value="ip_address" data-type="text">IP Address</option>
                            <option value="created_at" data-type="date">Created At</option>
                            <option value="full_name" data-type="text">Full Name</option>
                            <option value="first_name" data-type="text">First Name</option>
                            <option value="last_name" data-type="text">Last Name</option>
                            <option value="company" data-type="text">Company</option>
                            <option value="designation" data-type="text">Designation</option>
                            <option value="email" data-type="text">Email</option>
                            <option value="phone" data-type="text">Phone</option>
                            <option value="fax" data-type="text">Fax</option>
                            <option value="city" data-type="text">City/District</option>
                            <option value="address" data-type="text">Address</option>
                            <option value="zip" data-type="text">Postal code</option>
                        </select>
                        <small id="keysHelp" class="form-text text-muted">Select filter parameter(key).</small>
                    </div>
                    <div class="form-group" id="comparison_div">

                    </div>
                    <div class="form-group" id="value_div">

                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div class="clear5"></div>
                </form>
            </div>
        </div>
    </div>
</div>

  <script>
  $(document).ready(function(){
     
$("#connectiondomain").click(function () {
    var connectdomproid = $("#connectdomproid").val();
    var form_data = $("#connectdomainfrmdata").serializeArray();
    var _token = $('meta[name="csrf-token"]').attr('content');
     
    if (domain_name != '') {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/admin/connect-domain')}}",
            type: 'post',
            data: {domain_name:domain_name, project_id:connectdomproid, _token:_token},
            //data: form_data,
            success: function (data) {
               if(data == "1"){
                    swal({
                        title: "Domain Connected Successfully",
                        type: "success",
                        timer: 2000
                    });
                    setTimeout(function () { location.reload(true); }, 2000);
               }
            }
        });
    }
}); 
  });
  
  </script>
  
  
  <script>
$(document).ready(function () {
    $(".filter_accordian, .start_date, .end_date").click(function (event) {
        $(".stats_content").slideToggle();
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
    
     $(document).on('click', '.add-email-address', function () {
        email_count = email_count + 1;
            $("#email_form_list").append('<tr><td width="5%"><div class="h6">' + email_count + '</div></td><td width="30%"><input name="email[]" type="email" value="" id="email' + email_count + '" placeholder="Enter the email address"/></td><td width="30%" class="text-right"><a href="javascript:void(0)" class="remove-email-address"><i class="fas fa-minus-circle"></i> Remove Email</a></td></tr>');
            });
            
            $(document).on('click', '.remove-email-address', function(){
         email_count1 = 0;
            $(this).parent().parent().remove();
            email_count = $("#email_form_list tr td .h6").length;
            $("#email_form_list tr td .h6").each(function(){
                email_count1 = email_count1 + 1;
                $(this).text(email_count1);
                
            });
     });
            
            

    $(document).on('click', '.add-text-address', function () {
        text_count = text_count + 1;
        $("#text_form_list").append('<tr><td width="5%"><div class="h6">' + text_count + '</div></td><td width="30%"><input name="text[]" type="text" value="" id="text' + text_count + '" placeholder="Enter the phone number"/></td><td width="30%" class="text-right"><a href="javascript:void(0)" class="remove-text-address"><i class="fas fa-minus-circle"></i> Remove Number</a></td></tr>');
    });
            
            
    $(document).on('click', '.remove-text-address', function(){
         text_count1 = 0;
            $(this).parent().parent().remove();
            text_count = $("#text_form_list tr td .h6").length;
            $("#text_form_list tr td .h6").each(function(){
                text_count1 = text_count1 + 1;
                $(this).text(text_count1);
                
            });
    });
});
$("#stats_form").submit(function () {
    var form_data = $("#stats_form").serializeArray();

    $("#ui-block-loader").show();

    $.ajax({
        url: site_url + "/admin/panda-pages/{!!$ProjectData->id!!}/stats_ajax",
        type: 'POST',
        data: form_data,
        success: function (data) {
            $("#stats_data").html(data);
            $("#ui-block-loader").hide();
        }
    });
    return false;
});


    $(document).on('change', '#keys_selecter', function () {
        var selected_value = $(this).val();
        if (selected_value != '') {
            $('#apply_custom_filter').removeClass('display_button');
        } else {
            $('#apply_custom_filter').addClass('display_button');
        }
        var text_comparisons = '<option value="is">is the value</option><option value="not">is not the value</option><option value="contains">contains the value</option><option value="notcontain">does not contain the value</option><option value="isempty">is empty</option><option value="isnotempty">is not empty</option>';
        var number_comparisons = '<option value="is">is the value</option><option value="not">is not the value</option><option value="greater">is greater than</option><option value="greatequal">is greater than or equal to</option><option value="lessequal">is less than or equal to</option><option value="less">is less than</option>';

        var date_comparisons = '<option value="is">is the value</option><option value="not">is not the value</option><option value="greater">is greater than</option><option value="greatequal">is greater than or equal to</option><option value="lessequal">is less than or equal to</option><option value="less">is less than</option>';

        var input_field = '<div class="input-group"><input type="text" class="form-control" id="search_value" placeholder="Enter Value"/><div class="input-group-btn"><button id="apply_custom_filter" class="btn btn-default" type="button">Add</button></div></div>';

        var data_type = $('#keys_selecter option[value="' + selected_value + '"]').attr('data-type');
        if (data_type == 'text') {
            $("#comparison_div").html('<select class="form-control" id="search_comparison">' + text_comparisons + '</select>');
            $("#value_div").html(input_field);
        } else if (data_type == 'date') {
            $("#comparison_div").html('<select class="form-control" id="search_comparison">' + date_comparisons + '</select>');
            $("#value_div").html(input_field);
        } else if (data_type == 'number') {
            $("#comparison_div").html('<select class="form-control" id="search_comparison">' + number_comparisons + '</select>');
            $("#value_div").html(input_field);
        }
    });
    $(document).on('click', '#apply_custom_filter', function () {
        if (($('#keys_selecter').val() != '' && $("#search_comparison").val() != '' && $("#search_value").val() != '') || ($('#keys_selecter').val() != '' && $("#search_comparison").val() == 'isempty') || ($('#keys_selecter').val() != '' && $("#search_comparison").val() == 'isnotempty')) {
            var keys_selecter = $('#keys_selecter').val();
            var keys_selecter_html = $('#keys_selecter option[value="' + keys_selecter + '"]').html();
            var compatison_operator = $("#search_comparison").val();
            var search_value = $("#search_value").val();
            var search_value_html = search_value;
            var search_key = keys_selecter;

            var hidden_fields = '<input type="hidden" class="search_key" name="search_key[]" value="' + search_key + '"><input type="hidden" name="comparison_op[]" class="comparison_op" value="' + compatison_operator + '"><input type="hidden" name="search_value[]" class="search_value" value="' + search_value + '">';

            var output_html = '<div class="contentmenu-filter">' + hidden_fields + '<a href="javascript:void(0)" class="contentmenu-filter-remove" title="Remove Filter"><i class="fa fa-times"></i></a><a href="javascript:void(0)" class="contentmenu-filter-edit" title="Edit Filter">' + keys_selecter_html + ' ' + compatison_operator + ' ' + search_value_html + '</a></div>';
            $("#filters_div").append(output_html);
            $('.editmode-open').remove();
            $("#filters_div").show();
            $("#comparison_div").html('');
            $("#value_div").html('');
            $('#keys_selecter').val('').trigger('change');
            $('.contentmenu-filter').removeClass('editmode-open');
        }
    });
    $("#add_new_email_list").on("hidden.bs.modal", function () {
        setTimeout(function () {
            $("#comparison_div").html('');
            $("#value_div").html('');
            $('#keys_selecter').val('').trigger('change');
            $('.contentmenu-filter').removeClass('editmode-open');
        }, 500);
    });
    $(document).on("click", ".contentmenu-filter-remove", function (e) {
        e.stopPropagation();
        $(this).parent('.contentmenu-filter').remove();
        if ($("#filters_div").html() == "") {
            $("#filters_div").hide();
        }
    });
    $(document).on("click", ".contentmenu-filter-edit", function () {
        var element = $(this).parent('.contentmenu-filter');
        var search_key = element.find('.search_key').val();
        var comparison_op = element.find('.comparison_op').val();
        var search_value = element.find('.search_value').val();
        setTimeout(function () {
            $('#keys_selecter').val(search_key).trigger('change');
            $("#search_comparison").val(comparison_op);
            $("#search_value").val(search_value);
            element.addClass('editmode-open');
        }, 200);
    });
</script>

@endsection