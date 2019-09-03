@php
$segment1 = Request::segment(1);
@endphp
<section class="copyright">
    <div class="container text-center">
            <ul class="navigation-links">
                <li><a href="{{url('blog')}}">Blog</a></li>
                <li><a href="@if($segment1 != '' ){{url('/')}}@endif#contact">Contact</a></li>
                <li><a href="{{url('privacy')}}">Privacy</a></li>
                <li><a href="{{url('terms')}}">Terms</a></li>
            </ul>
        <strong><span style="color: #fff">Copyright 2018 All Rights Reserved.Control Panda</span></strong>
    </div>
</section>


<script>
    $(".nvccb, #cc_number").keypress(function (evt) {
        // between 0 and 9   
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    });
    //------------------ Balance Page Functions -------------------------//
    function validatePaybyCredit(creditCardForm)
    {
        
        $('#stripe-form').validate({
            ignore: "input[type='text']:hidden",
            onfocusout: false,
            rules: {
                cc_name: {required: true},
                cc_number: {required: true, number: true, maxlength: 16, minlength: 16},
                cc_exp_month: {required: true},
                cc_exp_year: {required: true},
                cc_cvv: {required: true, maxlength: 4},
            },
            messages: {
                cc_name: {required: "Name on card is required"},
                cc_number: {required: "Valid Card Number is required", number: "Provide a valid card Number",
                    maxlength: "Length should be 16 characters", minlength: "Length should be 16 characters"},
                cc_exp_month: {required: "Expire Month is required"},
                cc_exp_year: {required: "Expire Year is required"},
                cc_cvv: {required: "CVV code is required", maxlength: "CVV code should be 4 characters"},
            },

            highlight: function (element) {
                $(element).parent().css("color", "red");
            },
            errorPlacement: function (error, element) {},
            invalidHandler: function (form, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                    $('#stripformerrorcontainer').fadeIn('slow');
                    $('#stripformerrors').html("<li class='alert-box-li' style='color:red; font-size:20px;'>" + validator.errorList[0].message + "</li>");
                    validator.errorList[0].element.focus(); //Set Focus
                }
            }

        });
    }

</script>


