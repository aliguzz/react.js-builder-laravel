@extends('admin.layouts.app')
@section('content')

<style>
    html{ overflow-y:auto !important;}
    body{ background-color: #fff !important; }

    .payment-form-icon {
        line-height: 46px;
        margin-right: 10px;
        color: #dddddd !important;
    }
</style>

<div class="clear70"></div>
<section style="background-color:#fff;" id="left-row">
    <div class="container">
        <div class="row text-left">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <form method="post" action="{{url('admin/update_membership')}}" name="subscriptionform">
                    {{ csrf_field() }}
                    <div class="left-row" id="payment-stripe">
                        <h4>Purchase your Unlimited Plan for Mysite<br> <img src="{{ asset('assets/images/cradit-cards.jpg')}}"></h4>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="cc-number" class="control-label">Credit Card Number <small class="text-muted">[<span data-payment="cc-brand"></span>]</small></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="cc-number" type="tel" name="creditcard_no" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="Card Number" data-payment='cc-number' required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="cc-exp" type="tel"  name="creditcard_expiry_date" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="MM/YYYY" data-payment='cc-exp' required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="cc-cvc" type="tel" name="creditcard_cvv" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="CVV" data-payment='cc-cvc' required>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-page"><input type="text" name="first_name" class="page-fld" placeholder="First Name" required></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-page"><input type="text" name="last_name" class="page-fld" placeholder="Last Name" required></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-page"><input type="tel" name="phone" class="page-fld" placeholder="Phone" maxlength="16" required></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-page"><input type="text" name="company_name" class="page-fld" placeholder="Company Name"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-page"><input type="text" name="address" class="page-fld" placeholder="Address" required></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-page"><input type="text" name="city" class="page-fld" placeholder="City" required></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-page"><input type="text" name="zip" class="page-fld" placeholder="Postal Code" required></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="select-page">
                                    <select name="country" required>
                                        @foreach($countries as $cont)
                                        <option value="{{$cont->id}}">{{$cont->country}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 display-align"><input type="checkbox" name="saveinfo" value="1">&nbsp Save my credit card information for other purchases</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 display-align"><input type="checkbox" name="auto_renew" checked="checked" value="1">&nbsp Auto Renew</div>
                        </div>
                        <ul>
                            <li>Yearly Unlimited Plan <span>(US${{$post_data['packagetotal']/$post_data['payment_time']}} x {{$post_data['payment_time']}} months)  US${{$post_data['packagetotal']}}</span></li>
                            <li>Sale <a href="#"><b>Remove</b></a><strong>US${{$post_data['packagetotal']}}</strong></li>
                        </ul>
                        <div class="total">Total <strong>US${{$post_data['packagetotal']}}</strong></div>
                        <div class="perchase"><img src="{{ asset('assets/images/icon-15.jpg')}}"> Safe & Secure Payment <button type="submit" class="btn btn-primary">Submit Purchase</button></div>
                    </div>
                    <input type="hidden" name="payment_time" value="{{$post_data['payment_time']}}">
                    <input type="hidden" name="package_id" value="{{$post_data['package_id']}}">
                    <input type="hidden" name="packagetotal" value="{{$post_data['packagetotal']}}">
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="right-row">
                    <h5>Yearly Unlimited Plan</h5>
                    <li><i class="fas fa-check"></i> 1 Year Free Domain</li>
                    <li><i class="fas fa-check"></i> 50GB Storage</li>
                    <li><i class="fas fa-check"></i> Connect Your Domain</li>
                    <li><i class="fas fa-check"></i> Unlimited Bandwidth</li>
                    <li><i class="fas fa-check"></i> Panda Flow Recording</li>
                    <li><i class="fas fa-check"></i> Remove Ads</li>
                    <div class="secure-box"><img src="{{ asset('assets/images/icon-8.jpg')}}"> <span>Secure Checkout</span></div>
                    <div class="guaranty-box"><div class="img-box"><img src="{{ asset('assets/images/icon-8.jpg')}}"></div> 14 Day Money Back Guarantee <span>On ALL Plans</span></div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div id="footer">
        <div class="container">
            <p>Your Subscription will automatically renew on {{date("M d,Y", strtotime(" +".$post_data['payment_time']." months"))}}, for US$ {{$post_data['packagetotal']}}. This will help us In providing you uninterrupted services. Using your account you can cancel your subscription at any time. You will get a reminder from us before you're charged.<br> 
                You agree with our <strong><a href="{{url('terms')}}"> Terms of use</a></strong> and <strong> <a href="{{url('privacy')}}">privacy policy </a></strong> by clicking submit Purchase.<br>
                All your payment will be processed by <a href="{{url('')}}">ControlPanda.com</a></p>
        </div>
    </div>
</footer>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/script.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/slick.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scrollbar.js')}}" type="text/javascript"></script>

<script src="{{ asset('js/plugins/validation/jquery.payment.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function () {

    $(document).on('click', ".selectpackagebtn", function () {
        tenure = $(this).attr('data-tenure');
        $("#paymenttenure").val(tenure);
    });

    $('.customer-logos').slick({
        slidesToShow: 8,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
    });
});
</script>

<script type="text/javascript" src="{{ asset('assets/js/jquery.youtubeplaylist.js')}}"></script>
<script type="text/javascript">

$(function () {
    $("ul.demo1").ytplaylist();
    $("ul.demo2").ytplaylist({addThumbs: true, autoPlay: false, holderId: 'ytvideo2'});
});
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script type="text/javascript">
    $(function () {

        $('body').addClass('dashboard-container');

    });
</script>

<script type="text/javascript">
    /**
     * paymentForm
     *
     * A plugin that validates a group of payment fields.  See jquery.payment.js
     * Adapted from https://gist.github.com/Air-Craft/1300890
     */

// if (!window.L) { window.L = function () { console.log(arguments);} } // optional EZ quick logging for debugging

    (function ($) {

        /**
         * The plugin namespace, ie for $('.selector').paymentForm(options)
         * 
         * Also the id for storing the object state via $('.selector').data()  
         */
        var PLUGIN_NS = 'paymentForm';

        var Plugin = function (target, options) {
            this.$T = $(target);
            this._init(target, options);

            /** #### OPTIONS #### */
            this.options = $.extend(
                    true, // deep extend
                    {
                        DEBUG: false
                    },
                    options
                    );

//        this._cardIcons = {
//            "visa"          : "fa fa-cc-visa",
//            "mastercard"    : "fa fa-cc-mastercard",
//            "amex"          : "fa fa-cc-amex",
//            "dinersclub"    : "fa fa-cc-diners-club",
//            "discover"      : "fa fa-cc-discover",
//            "jcb"           : "fa fa-cc-jcb",
//            "default"       : "fa fa-credit-card-alt"
//        };

            return this;
        }

        /** #### INITIALISER #### */
        Plugin.prototype._init = function (target, options) {
            var base = this;

            base.number = this.$T.find("[data-payment='cc-number']");
            base.exp = this.$T.find("[data-payment='cc-exp']");
            base.cvc = this.$T.find("[data-payment='cc-cvc']");
            base.brand = this.$T.find("[data-payment='cc-brand']");

            // Set up all payment fields inside the payment form
            base.number.payment('formatCardNumber').data('payment-error-message', 'Please enter a valid credit card number.');
            base.exp.payment('formatCardExpiry').data('payment-error-message', 'Please enter a valid expiration date.');
            base.cvc.payment('formatCardCVC').data('payment-error-message', 'Please enter a valid CVC.');

            // Update card type on input
            base.number.on('input', function () {
                base.cardType = $.payment.cardType(base.number.val());
                var fg = base.number.closest('.form-group');
                fg.toggleClass('has-feedback', true);
                fg.find('.form-control-feedback').remove();
                if (base.cardType) {
                    base.brand.text(base.cardType);
                    // Also set an icon
                    var icon = base._cardIcons[base.cardType] ? base._cardIcons[base.cardType] : base._cardIcons["default"];
                    fg.append("<i class='" + icon + " fa-lg payment-form-icon form-control-feedback'></i>");
                } else {
                    $("[data-payment='cc-brand']").text("");
                }
            });

            // Validate card number on change
            base.number.on('change', function () {
                base._setValidationState($(this), !$.payment.validateCardNumber($(this).val()));
            });

            // Validate card expiry on change
            base.exp.on('change', function () {
                base._setValidationState($(this), !$.payment.validateCardExpiry($(this).payment('cardExpiryVal')));
            });

            // Validate card cvc on change
            base.cvc.on('change', function () {
                base._setValidationState($(this), !$.payment.validateCardCVC($(this).val(), base.cardType));
            });
        };

        /** #### PUBLIC API (see notes) #### */
        Plugin.prototype.valid = function () {
            var base = this;

            var num_valid = $.payment.validateCardNumber(base.number.val());
            var exp_valid = $.payment.validateCardExpiry(base.exp.payment('cardExpiryVal'));
            var cvc_valid = $.payment.validateCardCVC(base.cvc.val(), base.cardType);

            base._setValidationState(base.number, !num_valid);
            base._setValidationState(base.exp, !exp_valid);
            base._setValidationState(base.cvc, !cvc_valid);

            return num_valid && exp_valid && cvc_valid;
        }

        /** #### PRIVATE METHODS #### */
        Plugin.prototype._setValidationState = function (el, erred) {
            var fg = el.closest('.form-group');
            fg.toggleClass('has-error', erred).toggleClass('has-success', !erred);
            fg.find('.payment-error-message').remove();
            if (erred) {
                fg.append("<span class='text-danger payment-error-message'>" + el.data('payment-error-message') + "</span>");
            }
            return this;
        }

        /**
         * EZ Logging/Warning (technically private but saving an '_' is worth it imo)
         */
        Plugin.prototype.DLOG = function ()
        {
            if (!this.DEBUG)
                return;
            for (var i in arguments) {
                console.log(PLUGIN_NS + ': ', arguments[i]);
            }
        }
        Plugin.prototype.DWARN = function ()
        {
            this.DEBUG && console.warn(arguments);
        }


        /*###################################################################################
         * JQUERY HOOK
         ###################################################################################*/

        /**
         * Generic jQuery plugin instantiation method call logic 
         * 
         * Method options are stored via jQuery's data() method in the relevant element(s)
         * Notice, myActionMethod mustn't start with an underscore (_) as this is used to
         * indicate private methods on the PLUGIN class.   
         */
        $.fn[ PLUGIN_NS ] = function (methodOrOptions) {
            if (!$(this).length) {
                return $(this);
            }
            var instance = $(this).data(PLUGIN_NS);

            // CASE: action method (public method on PLUGIN class)        
            if (instance
                    && methodOrOptions.indexOf('_') != 0
                    && instance[ methodOrOptions ]
                    && typeof (instance[ methodOrOptions ]) == 'function') {

                return instance[ methodOrOptions ](Array.prototype.slice.call(arguments, 1));


                // CASE: argument is options object or empty = initialise            
            } else if (typeof methodOrOptions === 'object' || !methodOrOptions) {

                instance = new Plugin($(this), methodOrOptions);    // ok to overwrite if this is a re-init
                $(this).data(PLUGIN_NS, instance);
                return $(this);

                // CASE: method called before init
            } else if (!instance) {
                $.error('Plugin must be initialised before using method: ' + methodOrOptions);

                // CASE: invalid method
            } else if (methodOrOptions.indexOf('_') == 0) {
                $.error('Method ' + methodOrOptions + ' is private!');
            } else {
                $.error('Method ' + methodOrOptions + ' does not exist.');
            }
        };
    })(jQuery);

    /* Initialize validation */
    var payment_form = $('#payment-stripe').paymentForm();

    $('#validate').on('click', function () {
        var valid = $('#payment-stripe').paymentForm('valid');
        if (valid)
            alert('CC info is good!');
        else
            alert('Badman Cardfaker');
    });

</script>



@endsection