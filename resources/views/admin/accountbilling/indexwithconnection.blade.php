<style>

    .invioce_popup .row div:nth-child(even){
        background-color: #dddada;
    }
    .invioce_popup .row div:nth-child(odd){
        background-color: #dddada;
    }

</style>

<style type="text/css">
    @media print
    {
        body * { visibility: hidden; }
        .firsttd { display: none; }
        .img-rounded { background:#8750b4 !important; }
        .copyright { display: none; }
        #sutmib { visibility: hidden; }
        .invoice_popups * { visibility: visible; }
        .invoice_popups { position: absolute; margin-top: -200px; top:0px; left: 0px; }

    }
</style>
<link href="{{asset('frontend/css/smart_wizard.css')}}" rel="stylesheet">
<script src="{{ asset('js/plugins/validation/additional-methods.min.js')}}"></script>




<div class="col-md-8">
    <div class="Inner_Content">
        <h2>Account Billing & Subscription</h2>
        <div class="">
            <div class="clear20"></div>
            <ul class="tabs tabs-inline tabs-top">
                <li class="active">
                    <a href="#subscription" data-toggle="tab">Subscription Plan</a>
                </li>
                <li class="">
                    <a href="#payment" data-toggle="tab">Payment Information</a>
                </li>
                <li class="">
                    <a href="#invoice" id="history" data-toggle="tab">Invoice History</a>
                </li>
                <li class="">
                    <a href="#cancel_account" data-toggle="tab">Cancel Account</a>
                </li>
            </ul>
            <div class="clear20"></div>
            <div class="tab-content">
                <div class="tab-pane active" id="subscription">
                    <div class="subscription-box">
                        <div class="top-box">
                            <div class="side-box left">
                                <div class="status">Current Subscription Plan</div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="side-box left">
                            <div class="amount">
                                ${{number_format($package->price, 2)}} USD <span class="interval">
                                    /month </span>
                            </div>
                            <div class="name">
                                Control Panda {{$package->title}} </div>
                        </div>
                    </div>
                    <div class="clear20"></div>
                    <p>You're subscribed to the <b> {{$package->title}} (${{number_format($package->price, 2)}}/mo )</b>  plan at <b>${{number_format($package->price, 2)}}/month</b> Your next billing will be on <b>{{date('M d, Y', strtotime(Auth::User()->pkg_renew_date))}}</b></p>
                    <div class="clear20"></div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="center">
                                <td>
                                    <div class="cf-uppercase">Visits</div>
                                    <b>0</b> of 9999999
                                </td>
                                <td>
                                    <div class="cf-uppercase">Pages</div>
                                    <b>33</b> of 9999
                                </td>
                                <td>
                                    <div class="cf-uppercase">Web Sites</div>
                                    <b>{{$domains}}</b> of {{$package->connect_domains}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane" id="payment">
                    <?php /* ?><form id="" method="post" action="{{url('/admin/update-card-info')}}" class="form_wrap">    
                      {{ csrf_field() }}
                      <p>The card on file for your account ends with  {{substr(Auth::User()->cc_number,  -4)}}</p>
                      <div class="form-group clearfix">
                      <label class="control-label" for="number">Card Number</label>
                      <div class="Int_Field">
                      <i class="fa fa-credit-card"></i>
                      <input type="text" maxlength="16" minlength="14" pattern="\d{1,16}" value="{{Auth::User()->cc_number}}" name="cc_number" class="form-control" required>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group clearfix">
                      <label class="control-label" for="number">Expiry Year </label> <span> (YYYY)</span>
                      <div class="Int_Field">


                      <select  id="cc_exp_year" name="cc_exp_year" class="form-control expiry" required>
                      <option value="" disabled="" selected="" hidden="">Year</option>
                      <?php
                      for ($i = date('Y'); $i <= date('Y') + 50; $i++):
                      $sel = '';
                      if (Auth::User()->cc_exp_year == $i) {
                      $sel = 'selected';
                      }
                      ?>
                      <option <?php echo $sel; ?> value="<?= $i; ?>"><?= $i; ?></option>
                      <?php endfor; ?>
                      </select>

                      </div>

                      </div>
                      </div>
                      <div class="col-sm-6">
                      <div class="form-group clearfix">
                      <label class="control-label" for="number">Expiry Month </label> <span> (MM)</span>
                      <div class="Int_Field">

                      <select class="form-control" id="cc_exp_month" name="cc_exp_month"  required>
                      <option value=""  selected="" hidden="">Month</option>
                      <?php
                      for ($i = 1; $i <= 12; $i++):
                      $selp = '';
                      if ($i == Auth::User()->cc_exp_month) {
                      $selp = 'selected';
                      }
                      ?>
                      <option <?php echo $selp; ?> value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                      <?php endfor; ?>
                      </select>

                      </div>
                      </div>
                      </div>
                      </div>

                      <div class="row">

                      <div class="col-sm-6">
                      <div class="form-group clearfix">
                      <label class="control-label" for="number">CVC</label>
                      <div class="Int_Field">
                      <i class="icon fa fa-lock"></i>
                      <input name="cc_cvv" type="text" value="{{Auth::User()->cc_cvv}}" class="form-control "placeholder="123"  pattern="\d{1,3}" required>
                      </div>
                      </div>
                      </div>
                      </div>

                      <div class="text-right">
                      <input type="submit" class="btn btn-success" value="Update Payment Information">
                      </div>
                      </form><?php */ ?>

                    <form id="" method="post" action="{{url('/admin/set-default-gateway')}}" class="form_wrap">    
                        {{ csrf_field() }}                       


                        <div class="form-group">
                            <label class="col-sm-4 control-label pt_0" for="is_active">Default Gateway</label>
                            <div class="col-sm-8">
                                <input type="radio" name="payment_gateway" value="stripe" {{($gateway == 'stripe')? 'checked' : ''}}  aria-invalid="false" class="valid"> Stripe &nbsp;&nbsp; <input type="radio" name="payment_gateway" {{($gateway == 'paypal')? 'checked' : ''}} value="paypal" class="valid"> Paypal 
                                &nbsp;&nbsp; <input type="radio" name="payment_gateway" value="applepay" {{($gateway == 'applepay')? 'checked' : ''}} class="valid"> Apply Pay
                                &nbsp;&nbsp; <input type="radio" name="payment_gateway" value="gplay" {{($gateway == 'gpay')? 'checked' : ''}} class="valid"> Google Pay
                            </div>
                        </div>

                        <div class="clear20"></div>

                        <div class="text-right">
                            <input type="submit" class="btn btn-success" value="Update Payment Gateway">
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="invoice">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr # </th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $key=>$item)
                                <tr>
                                    <td class="firsttd">{{($key+1)}}</td>
                                    <td class="firsttd">{{time_ago($item->payment_datetime)}}<br />
                                    </td>
                                    <td class="firsttd">${{number_format($item->amount_paid, 2)}}</td>
                                    <td class="firsttd"><a href="#" data-toggle="modal" data-target="#invoice_popup{{$item->id}}">{{$item->payment_status}} </a> <i class="fa fa-info-circle" data-toggle="tooltip" title="Your card payment is {{$item->payment_status}}"></i></td>

                                    <td class="secondtd"><a href="#" data-toggle="modal" data-target="#invoice_popup{{$item->id}}" title="Print invoice"><i class="fa fa-file-pdf-o"></i></a>




                                        <div id="invoice_popup{{$item->id}}" class="modal fade invoice_popups" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Account Billing Invoice # {{$item->id}} </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center><img src="{{url('/public/frontend/images/logo.png')}}" class="img-rounded logo" style="background:#8750b4;" ></center>
                                                        <div class="row">
                                                            <div class="clear20"></div>
                                                            <div class="col col-md-2"></div>
                                                            <div class="col col-md-10">

                                                                <address>
                                                                    <h4><b>Development Center</b></h4>
                                                                    <p>Office # 17 / California, Santa Cruz 1156 High Street Santa Cruz, CA 95064</p>

                                                                    <h4><b>Office</b></h4>
                                                                    <p>Santa Cruz 1156 High Street Santa Cruz, CA 95064</p>
                                                                </address>
                                                            </div>
                                                            <div class="clear20"></div>
                                                            <div class="col col-md-2"></div>
                                                            <div class="col col-md-8">

                                                                <div class="table invioce_popup">

                                                                    <div class="row">
                                                                        <div class="col col-md-6"><strong>Invoice #</strong></div>
                                                                        <div class="col col-md-6">{{$item->id}}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col col-md-6"><strong>Date</strong></div>
                                                                        <div class="col col-md-6">{{$item->payment_datetime}}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col col-md-6"><strong>Amount</strong></div>
                                                                        <div class="col col-md-6">${{number_format($item->amount_paid, 2)}}</div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="clear5"></div>
                                                            <center>
                                                                <button id="sutmib" class="btn btn-primary" onclick="window.print();">Print Invoice</button>
                                                            </center>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- invoice for  -->



                                    </td>       






                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <nav class="pull-right">{!! $invoices->render() !!}</nav>
                </div>

                <div class="tab-pane" id="cancel_account">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>This is step description</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>This is step description</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>This is step description</small></a></li>
                        </ul>

                        <div>
                            <div id="step-1" class="">
                                Reason to cancel
                            </div>
                            <div id="step-2" class="">
                                Promotional offers or discounts
                            </div>
                            <div id="step-3" class="">
                                Leave us Permanently 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="cancel_account_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Account Billing & Subscription</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/delete-account')}}"  method="POST" id="Form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-4 control-label " for="is_active"> Please choose action:</label>
                        <div class="col-sm-8">
                            <input type="radio" name="action" class="action" value="pause" required  /> Pause Account &nbsp;&nbsp; <input type="radio" name="action" class="action" value="cancel" required /> Cancel Account
                        </div>
                    </div>
                    <div class="clear20"></div>

                    <div class="col-sm-12">
                        ** If you Cancel your account you'll lose your subdomain, all your customers, all your leads, all your pages, and all your websites... If you pause, your pages will not display live, you won't be able to use the ControlPanda App... but we'll keep your subdomain reserved and all your pages and funnels waiting so you can resume your account anytime.
                    </div>

                    <div class="clear5"></div>
                    <button type="submit" id="submit" class="btn btn-primary pull-right">Submit</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <div class="clear5"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('frontend/js/jquery.smartWizard.min.js')}}"></script>
<script>
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#submit").click(function () {

            if (!$('.action').is(":checked"))
            {
                alert('Please choose action to confirm');
                return false;
            }

            if (!confirm('Are you sure to perform this action ?'))
                return false;

        });



<?php if (isset($_GET['page'])) { ?>
            $('li a#history').click();
<?php } ?>

        // Step show event 
        $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
            $('.sw-toolbar #cancel_account').addClass('disabled');

            //alert("You are on step "+stepNumber+" now");
            if (stepPosition === 'first') {
                $("#prev-btn").addClass('disabled');
            } else if (stepPosition === 'final') {
                $("#next-btn").addClass('disabled');
                $('.sw-toolbar #cancel_account').removeClass('disabled');
            } else {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
            }
        });

        // Toolbar extra buttons
        var btnFinish = $('<a id="cancel_account" data-toggle="modal" data-target="#cancel_account_popup"></a>').text('Finish')
                .addClass('btn btn-info ')
                .on('click', function () {




                });
        var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function () {
                    $('#smartwizard').smartWizard("reset");
                });


        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'default',
            transitionEffect: 'fade',
            showStepURLhash: true,
            toolbarSettings: {toolbarPosition: 'both',
                toolbarExtraButtons: [btnFinish, btnCancel]
            }
        });


        // External Button Events
        $("#reset-btn").on("click", function () {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");
            return true;
        });

        $("#prev-btn").on("click", function () {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            return true;
        });

        $("#next-btn").on("click", function () {
            // Navigate next
            $('#smartwizard').smartWizard("next");
            return true;
        });

        $("#theme_selector").on("change", function () {
            // Change theme
            $('#smartwizard').smartWizard("theme", $(this).val());
            return true;
        });

        // Set selected theme on page refresh
        $("#theme_selector").change();
    });
</script>  
