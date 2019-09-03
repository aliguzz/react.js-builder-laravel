var form_builder_objact;
jQuery(function ($) {
    var fields = [];

    var replaceFields = [];

    var actionButtons = [];

    var templates = {};

    var inputSets = [];

    var typeUserDisabledAttrs = {
        autocomplete: ['access']
    };

    var typeUserAttrs = {
        text: {
            className: {
                label: 'Class',
                options: {
                    'red form-control': 'Red',
                    'green form-control': 'Green',
                    'blue form-control': 'Blue'
                },
                style: 'border: 1px solid red'
            }
        }
    };

    var fbOptions = {
        subtypes: {
            text: ['datetime-local']
        },
        onSave: function (e, formData) {
            generate_form(formData);
        },

        stickyControls: {
            enable: true
        },
        sortableControls: true,
        fields: fields,
        templates: templates,
        inputSets: inputSets,
        typeUserDisabledAttrs: typeUserDisabledAttrs,
        typeUserAttrs: typeUserAttrs,
        disableInjectedStyle: false,
        actionButtons: actionButtons,
        disableFields: ['autocomplete', 'file'],
        replaceFields: replaceFields,
        disabledFieldButtons: {
            text: ['copy']
        }
    };
    form_builder_objact = $('.build-wrap').formBuilder(fbOptions);
    setTimeout(function () {
        var formData_ = $("#json-data").val();
        if (formData_) {
            form_builder_objact.actions.setData(formData_);
        }
    }, 500);
});


function generate_form(formData) {
    var json_data = JSON.parse(formData);
    var lead_group_id = $('#lead_group_id').val();
    var site_id = $('#site_id').val();
    var return_url = $('#return_url').val();
    var unique_code = $('#unique_code').val();

    if (return_url == '') {
        swal('Error Message', 'Return URL can not be null!');
        return false;
    }

    if (return_url != '') {
        var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;

        if (!regex.test(return_url)) {
            swal('Error Message', 'Enter correct return url!');
            return false;
        }
    }


    var output_html = '<form id="lead-generation-form" class="form-horizontal" action="' + site_url + '/lead-post-api" method="POST">';
    output_html += '<input type="hidden" name="lead_group_id" value="' + lead_group_id + '">';
    output_html += '<input type="hidden" name="site_id" value="' + site_id + '">';
    output_html += '<input type="hidden" name="return_url" value="' + return_url + '">';
    output_html += '<input type="hidden" name="unique_code" value="' + unique_code + '">';

    if ($('#have_title').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="title">Title <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required/></div></div>';
    }
    if ($('#have_first_name').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="first_name">First Name <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" required/></div></div>';
    }
    if ($('#have_last_name').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="last_name">Last Name <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" required/></div></div>';
    }
    if ($('#have_email').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="email">Email <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required/></div></div>';
    }
    if ($('#have_phone').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="phone">Phone <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Phone" required/></div></div>';
    }
    if ($('#have_fax').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="fax">Fax <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="tel" class="form-control" name="fax" id="fax" placeholder="Enter Fax" required/></div></div>';
    }
    if ($('#have_zip').is(":checked")) {
        output_html += '<div class="form-group "><label class="control-label" for="zip">Zip <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="text" class="form-control" name="zip" id="zip" placeholder="Enter Zip" required/></div></div>';
    }
    if ($('#have_address').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="address">Address <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required/></div></div>';
    }
    if ($('#have_city').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="city">City/Town <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="text" class="form-control" name="city" id="city" placeholder="Enter City" required/></div></div>';
    }
    if ($('#have_company').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="company">Company <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="text" class="form-control" name="company" id="company" placeholder="Enter Company" required/></div></div>';
    }
    if ($('#have_designation').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="designation">Designation <small class="text-danger">*</small></label><div class="col-sm-12 row"><input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation" required/></div></div>';
    }


    if ($('#have_dob').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label">DOB<small class="text-danger">*</small></label><div class="row"><div class="col-sm-3"><select class="form-control" name="dob_day" id="dob_day" required><option value="" disabled="" selected="" hidden="">Birth Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div><div class="col-sm-4"><select class="form-control" name="dob_month" id="dob_month" required><option value="" disabled="" selected="" hidden="">Birth Month</option><option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></div>';
        output_html += '<div class="col-sm-4"><select class="form-control" name="dob_year" id="dob_year" required><option value="" disabled="" selected="" hidden="">Birth Year</option>';
        for (var i = get_year() - 10; i >= get_year() - 100; i--) {
            output_html += '<option value="' + i + '">' + i + '</option>';
        }
        output_html += '</select></div></div></div>';
    }
    if ($('#have_contact_time').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="contact_time">Contact Time <small class="text-danger">*</small></label><div class="col-sm-12 row"><select class="form-control" name="contact_time" id="contact_time" required><option value="Anytime">Anytime</option><option value="Morning">Morning</option><option value="Noon">Noon</option><option value="Afternoon">Afternoon</option><option value="Evening">Evening</option></select></div></div>';
    }
    if ($('#have_contact_phone').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="allow_phone">Contact on Phone <small class="text-danger">*</small></label><div class="col-sm-12 row"><select class="form-control" name="allow_phone" id="allow_phone" required><option value="1">Yes</option><option value="0">No</option></select></div></div>';
    }
    if ($('#have_contact_email').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="allow_phone">Contact on Email <small class="text-danger">*</small></label><div class="col-sm-12 row"><select class="form-control" name="allow_email" id="allow_email" required><option value="1">Yes</option><option value="0">No</option></select></div></div>';
    }
    if ($('#have_contact_fax').is(":checked")) {
        output_html += '<div class="form-group"><label class="control-label" for="allow_phone">Contact on Fax <small class="text-danger">*</small></label><div class="col-sm-12 row"><select class="form-control" name="allow_fax" id="allow_fax" required><option value="1">Yes</option><option value="0">No</option></select></div></div>';
    }
    $.each(json_data, function (key, val) {
        if (val.label) {

        } else {
            val.label = val.name;
        }
        if (val.type == 'button') {
            output_html += '<div class="form-group"><button type="' + val.subtype + '" class="' + val.className + '" name="' + replace_underscores(val.label) + '" id="' + replace_underscores(val.label) + '" value="' + (val.value ? val.value : '') + '">';
            output_html += val.label;
            output_html += '</button></div>';
        } else if (val.type == 'checkbox-group') {
            var c_class = '';
            var extra = '';
            output_html += '<div class="form-group"><label class="control-label" for="' + replace_underscores(val.label) + '">' + converthtml(val.label) + '';
            if (val.required) {
                output_html += ' <small class="text-danger">*</small>';
            }
            if (val.description) {
                output_html += ' <a href="javascript:void(0)" data-toggle="tooltip" class="tooltip-element" title="' + val.description + '">?</a>';
            }
            if (val.inline) {
                c_class = 'checkbox-inline';
            }
            if (val.toggle) {
                extra = ' data-toggle="toggle" ';
            }
            output_html += '</label><div class="col-sm-12 row"><div class="checkbox-group">';
            $.each(val.values, function (key2, val2) {
                var selected = '';
                if (val2.selected) {
                    var selected = ' checked ';
                }
                output_html += '<div class="' + c_class + '"><input type="checkbox" name="' + replace_underscores(val.label) + '[]" value="' + val2.value + '" ' + extra + ' ' + selected + '> ' + val2.label + '</div>';
            });
            if (val.other) {
                output_html += '<div class="' + c_class + '"><input type="checkbox" name="' + replace_underscores(val.label) + '[]" value="Other" ' + extra + '> Other</div>';
            }
            output_html += '</div></div></div>';
        } else if (val.type == 'date' || val.type == 'number') {
            var extra = '';
            output_html += '<div class="form-group"><label class="control-label" for="' + replace_underscores(val.label) + '">' + converthtml(val.label) + '';
            if (val.required) {
                output_html += ' <small class="text-danger">*</small>';
                extra = ' required ';
            }
            if (val.description) {
                output_html += '<a href="javascript:void(0)" data-toggle="tooltip" class="tooltip-element" title="' + val.description + '">?</a>';
            }
            if (val.min) {
                extra = ' min="' + val.min + '" ';
            }
            if (val.max) {
                extra = ' max="' + val.max + '" ';
            }
            if (val.step) {
                extra = ' step="' + val.step + '" ';
            }
            output_html += '</label><div class="col-sm-12 row">';
            output_html += '<input class="form-control ' + val.className + '" type="' + val.type + '" placeholder="' + (val.placeholder ? converthtml(val.placeholder) : converthtml(val.label)) + '" name="' + replace_underscores(val.label) + '" id="' + replace_underscores(val.label) + '" value="' + (val.value ? val.value : '') + '" ' + extra + '/>';
            output_html += '</div></div>';
        } else if (val.type == 'header' || val.type == 'paragraph') {
            output_html += '<' + val.subtype + ' class="' + val.className + '">' + val.label + '</' + val.subtype + '>';
        } else if (val.type == 'hidden') {
            output_html += '<input type="hidden" name="' + replace_underscores(val.label) + '" value="' + (val.value ? val.value : '') + '" />';
        } else if (val.type == 'radio-group') {
            var c_class = '';
            var extra = '';
            output_html += '<div class="form-group"><label class="control-label" for="' + replace_underscores(val.label) + '">' + converthtml(val.label) + '';
            if (val.required) {
                output_html += ' <small class="text-danger">*</small>';
            }
            if (val.description) {
                output_html += ' <a href="javascript:void(0)" data-toggle="tooltip" class="tooltip-element" title="' + val.description + '">?</a>';
            }
            if (val.inline) {
                c_class = 'radio-inline';
            }
            if (val.toggle) {
                extra = ' data-toggle="toggle" ';
            }
            output_html += '</label><div class="col-sm-12 row"><div class="radio-group">';
            $.each(val.values, function (key2, val2) {
                var selected = '';
                if (val2.selected) {
                    var selected = ' checked ';
                }
                output_html += '<div class="' + c_class + '"><input type="radio" name="' + replace_underscores(val.label) + '" value="' + val2.value + '" ' + extra + ' ' + selected + '> ' + val2.label + '</div>';
            });
            if (val.other) {
                output_html += '<div class="' + c_class + '"><input type="radio" name="' + replace_underscores(val.label) + '" value="Other" ' + extra + '> Other</div>';
            }
            output_html += '</div></div></div>';
        } else if (val.type == 'select') {
            var extra = '';
            output_html += '<div class="form-group"><label class="control-label" for="' + replace_underscores(val.label) + '">' + converthtml(val.label) + '';
            if (val.required) {
                output_html += ' <small class="text-danger">*</small>';
                extra = ' required ';
            }
            if (val.description) {
                output_html += ' <a href="javascript:void(0)" data-toggle="tooltip" class="tooltip-element" title="' + val.description + '">?</a>';
            }
            output_html += '</label><div class="col-sm-12 row"><select name="' + replace_underscores(val.label) + '" id="' + replace_underscores(val.label) + '" class="form-control ' + val.className + '" ' + extra + '>';
            $.each(val.values, function (key2, val2) {
                var selected = '';
                if (val2.selected) {
                    var selected = ' selected ';
                }
                if (val.placeholder) {
                    output_html += '<option value="" disabled="" selected="" hidden="">' + converthtml(val.placeholder) + '</option>';
                }
                output_html += '<option value="' + val2.value + '" ' + selected + '>' + val2.label + '</option>';
            });
            output_html += '</select></div></div>';
        } else if (val.type == 'text') {
            var extra = '';
            output_html += '<div class="form-group"><label class="control-label" for="' + replace_underscores(val.label) + '">' + converthtml(val.label) + '';
            if (val.required) {
                output_html += ' <small class="text-danger">*</small>';
                extra = ' required ';
            }
            if (val.description) {
                output_html += ' <a href="javascript:void(0)" data-toggle="tooltip" class="tooltip-element" title="' + val.description + '">?</a>';
            }

            if (val.minlength) {
                extra = ' minlength="' + val.minlength + '" ';
            }
            if (val.maxlength) {
                extra = ' maxlength="' + val.maxlength + '" ';
            }
            if (val.min) {
                extra = ' min="' + val.min + '" ';
            }
            if (val.max) {
                extra = ' max="' + val.max + '" ';
            }
            if (val.step) {
                extra = ' step="' + val.step + '" ';
            }
            output_html += '</label><div class="col-sm-12 row">';
            output_html += '<input class="form-control ' + val.className + '" type="' + val.subtype + '" placeholder="' + (val.placeholder ? converthtml(val.placeholder) : converthtml(val.label)) + '" name="' + replace_underscores(val.label) + '" id="' + replace_underscores(val.label) + '" value="' + (val.value ? val.value : '') + '" ' + extra + '/>';
            output_html += '</div></div>';

        } else if (val.type == 'textarea') {
            var extra = '';
            output_html += '<div class="form-group"><label class="control-label" for="' + replace_underscores(val.label) + '">' + converthtml(val.label) + '';
            if (val.required) {
                output_html += ' <small class="text-danger">*</small>';
                extra = ' required ';
            }
            if (val.description) {
                output_html += ' <a href="javascript:void(0)" data-toggle="tooltip" class="tooltip-element" title="' + val.description + '">?</a>';
            }

            if (val.minlength) {
                extra = ' minlength="' + val.minlength + '" ';
            }
            if (val.maxlength) {
                extra = ' maxlength="' + val.maxlength + '" ';
            }
            if (val.rows) {
                extra = ' min="' + val.rows + '" ';
            }
            output_html += '</label><div class="col-sm-12 row">';
            output_html += '<textarea class="form-control ' + val.className + '" placeholder="' + (val.placeholder ? converthtml(val.placeholder) : converthtml(val.label)) + '" name="' + replace_underscores(val.label) + '" id="' + replace_underscores(val.label) + '" ' + extra + '>' + (val.value ? val.value : '') + '</textarea>';
            output_html += '</div></div>';
        }
    });

    output_html += '<div class="form-group">  <button type="submit" class="btn btn-success" id="submit" name="submit" >Submit</button> </div>';
    output_html += '</form><script src="' + site_url + '/logger.js"></script>';
    swal({
        title: "Form HTML",
        text: output_html,
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, copy it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: true
    },
            function (isConfirm) {
                if (isConfirm) {
                    copyToClipboard(document.getElementById("copyTarget"));
                    swal({title: "Copied", type: "success"});
                    $(".sweet-alert p").hide();
                }
            });
    setTimeout(function () {
        $(".sweet-alert p").attr('id', 'copyTarget');
    }, 100);
}
function copyToClipboard(elem) {
    // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);

    // copy the selection
    var succeed;
    try {
        succeed = document.execCommand("copy");
    } catch (e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }

    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}
function onsubmit_form() {
    var title = $('.form_title').val();
    var return_url = $('.return_url').val();

    if (title == '') {
        $('.form_check').addClass('form_error');
        $('.form_check').focus();
        $('.span_check').removeClass('display_button');
        return false;
    }

    if (return_url != '') {
        var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;

        if (!regex.test(return_url)) {
            $('.url_check').addClass('form_error');
            $('.url_check').focus();
            $('.span_url_check').removeClass('display_button');
            return false;
        }
    }

    $("#json-data").val(form_builder_objact.actions.getData('json', true));
    $("#stage1").remove();
    return true;
}
function get_year() {
    var d = new Date();
    return d.getFullYear();
}
function converthtml(content) {
    var r = /(<([^>]+)>)/ig;
    return content.replace(r, "");
}
function replace_underscores(stringval) {
    var r = /(<([^>]+)>)/ig;
    stringval = stringval.replace(r, "");
    return stringval.split(' ').join('_');
}
