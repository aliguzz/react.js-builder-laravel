@extends('admin.layouts.app')

@section('content')
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.css') }}">
<script src="{{ asset('js/plugins/select2/select2.min.js')}}"></script>

<div class="breadcrumbs contentarea">
    <div class="container-fluid">
    <ul>
        <li>
            <a href="{{url('/admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a>My Profile</a>
        </li>
    </ul>
    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>
</div>
</div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="page-header">
            <h1>
                <i class="icon-user"></i>
                Edit user profile
            </h1>
        </div>
        <div class="box-content nopadding">
            <div class="form_wrap">
                <ul class="tabs tabs-inline tabs-top">
                    <li class="@if((isset($_GET['action']) && $_GET['action'] == 'profile') || (!isset($_GET['action']))) active @endif">
                        <a href="#profile" data-toggle='tab'><i class="icon-user"></i> Profile</a>
                    </li>
                    <li class="@if(isset($_GET['action']) && $_GET['action'] == 'password') active @endif">
                        <a href="#passwords-tab" data-toggle='tab'><i class="icon-lock"></i> Password</a>
                    </li>
<!--                    @if(Auth::user()->role == 1)-->
                    <li class="@if(isset($_GET['action']) && $_GET['action'] == 'payment') active @endif">
                        <a href="#payment-tab" data-toggle='tab'><i class="fa fa-credit-card-alt"></i> Paypal Details</a>
                    </li>
                    <li class="@if(isset($_GET['action']) && $_GET['action'] == 'package') active @endif">
                        <a href="#package-tab" data-toggle='tab'><i class="fa fa-shopping-cart"></i> Package Purchased</a>
                    </li>
                    <li class="@if(isset($_GET['action']) && $_GET['action'] == 'authentication') active @endif">
                        <a href="#authentication-tab" data-toggle='tab'><i class="fa fa-key"></i> Auth Key</a>
                    </li>
<!--                    @endif-->
                </ul>
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'profile'  || (!isset($_GET['action']))) active @endif" id="profile">
                        <form id="profile-form" method="POST" action="{{url("/admin/update-profile")}}" class="form-horizontal form-validate" novalidate="novalidate" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-sm-offset-4 col-sm-4">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail">
                                        <img class="image-display" src="{{ checkImage('users/'.$user['profile_image']) }}" />
                                    </div>
                                    <div>
                                        <span class="btn btn-file col-sm-12 select_logo"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input accept="image/*" class="image-input" type="file" name='profile_image'/></span>
                                        <a href="#" class="btn fileupload-exists remove_btn" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-4 control-label">First Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="first_name" name="first_name" class='form-control' placeholder="Enter First Name" data-rule-required="true" aria-required="true" value="{!!@$user['first_name']!!}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="last_name" name="last_name" class='form-control' placeholder="Enter First Name" data-rule-required="true" aria-required="true" value="{!!@$user['last_name']!!}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class='form-control' value="{!!@$user['email']!!}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-sm-4 control-label">Phone</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="phone" name="phone" class='form-control' placeholder="Enter Phone" data-rule-required="true" data-rule-minlength="10" aria-required="true" value="{!!@$user['phone']!!}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-4 control-label">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="address" name="address" class='form-control' placeholder="Enter Address" data-rule-required="true" data-rule-minlength="5" aria-required="true" value="{!!@$user['address']!!}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="zipcode" class="col-sm-4 control-label">Zip</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="address" name="zipcode" class='form-control' placeholder="Enter Zip" data-rule-required="true" data-rule-minlength="5" aria-required="true" value="{!!@$user['zipcode']!!}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class="col-sm-4 control-label">Country</label>
                                        <div class="col-sm-8">
                                            <select name="country" id="country" class='select2-me form-control'>
                                                @foreach($countries as $country)
                                                <option @if($country->ccode == $user['country']) selected @endif value="{!!$country->ccode!!}">{!!$country->country!!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="col-sm-4 control-label">City</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="city" name="city" class='form-control' placeholder="Enter City" data-rule-required="true" aria-required="true" value="{!!@$user['city']!!}">
                                        </div>
                                    </div>
                                    <div class="form-actions text-right" style="padding: 0 0 20px;">
                                        <input type="submit" class='btn btn-primary' value="Save">
                                        <input type="reset" class='btn' value="Discard changes">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'password') active @endif" id="passwords-tab">
                        <form id="password-form" method="POST" action="{{url("/admin/update-password")}}" class="form-horizontal form-validate" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="current_password" class="col-sm-4 control-label">Current Password</label>
                                <div class="col-sm-8">
                                    <input type="password" id="current_password" name="current_password" class='form-control' placeholder="Enter current password" data-rule-minlength="6" data-rule-required="true" aria-required="true" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password" class="col-sm-4 control-label">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" id="new_password" name="new_password" class='form-control' placeholder="Enter new password" data-rule-required="true" data-rule-minlength="6" aria-required="true" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="col-sm-4 control-label">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input type="password" id="confirm_password" name="confirm_password" class='form-control' placeholder="Retype new password" data-rule-equalto="#new_password" data-rule-minlength="6" data-rule-required="true" aria-required="true" value=""/>
                                </div>
                            </div>

                            <div class="form-actions text-right" style="padding: 0 0 20px;">
                                <input type="submit" class='btn btn-primary' value="Save">
                                <input type="reset" class='btn' value="Discard changes">
                            </div>
                        </form>
                    </div>
                    @if(Auth::user()->role == 1)
                    <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'payment') active @endif" id="payment-tab">
                        <form id="payment-form" method="POST" action="{{url("/admin/update-paypal-details")}}" class="form-horizontal form-validate" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="number">Credit Card Type</label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="id" value={{$payment->id}} />
                                    <input type="hidden" id="process" name="process" value="payment" />
                                    <select class="form-control" id="creditcard_type" name="creditcard_type" required>
                                        <option value="">Select</option>
                                        <option @if($payment->creditcard_type == 'Visa') selected @endif value="Visa">Visa</option>
                                        <option @if($payment->creditcard_type == 'MasterCard') selected @endif value="MasterCard">MasterCard</option>
                                        <option @if($payment->creditcard_type == 'Discover') selected @endif value="Discover">Discover</option>
                                        <option @if($payment->creditcard_type == 'Amex') selected @endif value="Amex">AMEX</option>
                                    </select>    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="creditcard_no" class="col-sm-3 control-label">Credit Card No</label>
                                <div class="col-sm-4">
                                    <input type="password" id="creditcard_no" name="creditcard_no" class='form-control' autocomplete="off" maxlength="16" placeholder="" data-rule-required="true" aria-required="true" value="{{$payment->creditcard_no}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="number">Credit Card Expiration month/year</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="creditcard_expiry_month" name="creditcard_expiry_month" class="text-field" required>
                                        <option value="">Month</option>
                                        <?php
                                        for ($i = 1; $i <= 12; $i++):
                                            $selp = '';
                                            if ($i == $payment->creditcard_expiry_month) {
                                                $selp = 'selected';
                                            }
                                            ?>
                                            <option <?php echo $selp; ?> value="<?= sprintf('%02u', $i); ?>"><?= sprintf('%02u', $i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="number">Year</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="creditcard_expiry_year" name="creditcard_expiry_year" class="text-field" required>
                                        <option value="">Year</option>
                                        <?php
                                        for ($i = date('Y'); $i <= date('Y') + 50; $i++):
                                            $sel = '';
                                            if ($payment->creditcard_expiry_year == $i) {
                                                $sel = 'selected';
                                            }
                                            ?>
                                            <option <?php echo $sel; ?> value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>   
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="number">Credit Card CVV code</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="creditcard_security" id="creditcard_security" value="{{$payment->creditcard_security}}" creditcard required maxlength="4"/>
                                    <small>3 or 4 digits on the back of most cards. On the front of AMEX cards.</small>
                                </div>
                            </div>

                            <div class="form-actions" style="padding: 0 0 20px;">
                                <input type="submit" class='btn btn-primary' value="Save">
                                <input type="reset" class='btn' value="Discard changes">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'package') active @endif" id="package-tab">
                        <div><a href="{{url('/admin/package-upgrade')}}" class="pull-right btn btn-primary">Upgrade Package</a><div class="clear10"></div></div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nomargin no-margin">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Date</th>
                                        <th>Expiry Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($packages != '')
                                    @php $counter = 1 @endphp
                                    @foreach($packages as $package) 
                                    <tr>
                                        <td>{!!$counter!!}</td>
                                        <td>{!!$package->package_title!!}</td>
                                        <td>{!!$package->price!!} $</td>
                                        <td>{!!$package->duration_text!!}</td>
                                        <td> @php echo date('d F Y', strtotime($package->created_at)); @endphp</td>
                                        <td> @if($package->is_active == 1) <label class="label label-success">{!!date('d F Y', strtotime($package->expiry_date))!!}</label> @else <label class="label label-danger">Expired</label> @endif</td>
                                        <td>@if($package->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Expired</label> @endif</td>
                                    </tr>
                                    @php $counter = $counter + 1; @endphp    
                                    @endforeach  
                                    @endif      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'authentication') active @endif" id="authentication-tab">
                        <form id="auth-form" method="POST" action="{{url("/admin/update-authentication")}}" class="form-horizontal form-validate" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="unique_code" class="col-sm-3 control-label">Auth Key</label>
                                <div class="col-sm-4">
                                    <input type="text" id="unique_code" name="unique_code" class='form-control' placeholder="Please enter auth key" data-rule-minlength="20" data-rule-required="true" aria-required="true" value="{!!@$user['unique_code']!!}"/>
                                </div>
                                <div class="col-sm-4"><button id="generate_key" type="button" class="btn btn-warning">Generate Key</div>
                            </div>
                            <div class="form-actions" style="padding: 0 0 20px;">
                                <button id="process-auth-key" type="button" class='btn btn-primary'>Save</button>
                                <input class="hidden processSubmit" type="submit" value="Save"/>
                                <input type="reset" class='btn' value="Discard changes"/>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>    
        </div>
    </div>
</section>
<script>
$(document).on('click', '#generate_key', function () {
    var text = "";
    var possible = "ABCDEFGHIJKL-MNOPQRSTUVWXYZ-abcdefghij-klmnopqrstuv-wxyz0123456789";
    for (var i = 0; i < 31; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    $("#unique_code").val(text);
});
</script>
<script>
    $('#process-auth-key').click(function () {
        var submitBtn = $(this).next('.processSubmit');
        swal({
            title: "Are you sure?",
            text: "It will disabled the all existing intigrations!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: false,
            closeOnCancel: true
        },
                function (isConfirm) {
                    if (isConfirm) {
                        submitBtn.click();
                    }
                });
    });
</script>
@endsection

