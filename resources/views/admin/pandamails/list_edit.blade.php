@extends('admin.layouts.app')
@section('content')
<br/>
<br/>
<br/>
<div class="clearfix"></div>
<div class="block no-space gray">
    <div class="container-fluid">
        <div class="selectors-bar">

            <section>
                <div class="block no-space gray">
                    <div class="container-fluid">
                        <div class="selectors-bar">							
                            <div class="scrollmenu selectors-container">										
                                <ul class="selectors nav nav-tabs">
                                    <li class="slide"><a href="{!!url('admin/contacts')!!}?el=1"><div class="curve"><div class="icon"><i class="fa fa-arrow-circle-left" style="font-size:24px;color:#b71111"></i></div></div> <span>Go back</span></a></li>
                                </ul>

                            </div>							
                        </div>				
                    </div>
                </div>
            </section>


        </div>

    </div>
</div>

<div class="container-fluid">

 <section class="inner-full-width-panel pr-30">
            <div class="tab-content">
        
            
            <div class="right-content right-content-space fixed-width">
                
                
                <div class="inner-content">
                    <form action="{{url('admin/contacts/lists/edit-submit')}}" method="POST" class="form-horizontal form-validate">
                        <div class="form_wrap">  
                            <input type="hidden" name="id" value="{!!@$email_list->id!!}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">List Name</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter List Name" data-rule-required="true" aria-required="true" value="{!!@$email_list->title!!}">
                                <small id="nameHelp" class="form-text text-muted">Name your email list.</small>
                            </div>
                            <div id="filters_div" @if($email_list->filter == '' || $email_list->filter == '[]') style="display:none;" @endif >
                                 @if($email_list->filter != '' && $email_list->filter != '[]')
                                 @php
                                 $filters = json_decode($email_list->filter);
                                 @endphp
                                 @foreach($filters as $fil)
                                 <div class="contentmenu-filter">
                                    <input type="hidden" class="search_key" name="search_key[]" value="{!!$fil->key!!}">
                                    <input type="hidden" name="comparison_op[]" class="comparison_op" value="{!!$fil->operator!!}">
                                    <input type="hidden" name="search_value[]" class="search_value" value="{!!$fil->value!!}">
                                    <a href="javascript:void(0)" class="contentmenu-filter-remove" title="Remove Filter"><i class="fa fa-times"></i></a>
                                    <a href="javascript:void(0)" class="contentmenu-filter-edit" title="Edit Filter">{!! ucfirst(str_replace('_',' ',$fil->key))!!} {!!$fil->operator!!} {!!$fil->value!!}</a></div>
                                @endforeach
                                @endif
                            </div>
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
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                            <div class="clear5"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        
    </div>
</section>
    </div>

<script>
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