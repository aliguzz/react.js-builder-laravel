@extends('admin.layouts.app')

@section('content')

<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.css') }}">
<script src="{{ asset('js/plugins/select2/select2.min.js')}}"></script>

<div class="breadcrumbs generic_breadcrums">
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
<section class="contentarea mt-60">
    <div class="container-fluid">
        <div class="page-header">
            <h1>
                <i class="icon-user"></i>
                Edit Profile
            </h1>
        </div>
        <div class="box-content nopadding">
            <div class="form_wrap" style="max-width: 670px;">
                <ul class="nav nav-pills">
                    <li  class="nav-item @if((isset($_GET['action']) && $_GET['action'] == 'profile') || (!isset($_GET['action']))) active @endif">
                        <a class="nav-link active" href="#profile" data-toggle='tab'><i class="icon-user"></i> Profile</a>
                    </li>
                    <li class="nav-item @if(isset($_GET['action']) && $_GET['action'] == 'password') active @endif">
                        <a class="nav-link" href="#passwords-tab" data-toggle='tab'><i class="icon-lock"></i>Password</a>
                    </li>
                    <!--media link-->
                    <li class="nav-item @if(isset($_GET['action']) && $_GET['action'] == 'media') active @endif">
                        <a class="nav-link" href="#media" data-toggle='tab'><i class="icon-lock"></i>Social Media Links</a>
                    </li>
                    <li class="nav-item @if(isset($_GET['action']) && $_GET['action'] == 'media') active @endif">
                        <a class="nav-link" href="#fbmessenger" data-toggle='tab'><i class="icon-lock"></i>Facebook Messenger Setup</a>
                    </li>
                    
                </ul>
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'profile'  || (!isset($_GET['action']))) active @endif" id="profile">
                        <form id="profile-form" method="POST" action="{{url('/admin/update-profile')}}" class="form-horizontal form-validate profile_form" novalidate="novalidate" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="offset-sm-4 col-sm-4">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail">
                                        <?php if($user['profile_image']) { ?> 
                                            <img style="width:  200px !important;max-width:  200px !important;" class="image-display" src="{{ checkImage('users/'.$user['profile_image']) }}" />
                                        <?php  }else{  ?>
                                            <img style="width:  200px !important;max-width:  200px !important;" class="image-display" src="https://forum.vietnam-expat.com/styles/BBOOTS/theme/images/no_avatar.gif" />
                                        <?php  } ?>
                                    </div>
                                    <div>
                                        <input accept="image/*" class="image-input" type="file" name='profile_image'/>
                                    </div>
                                </div>
                            </div> 
                            <div class="clear20"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="first_name" class="control-label">First Name</label>
                                            </div>    
                                            <div class="col-sm-9">
                                                <input type="text" id="first_name" name="first_name" class='form-control' placeholder="Enter First Name" data-rule-required="true" aria-required="true" value="{!!@$user['first_name']!!}"/>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                            <label for="last_name" class="control-label">Last Name</label>
                                            </div>    
                                            <div class="col-sm-9">
                                            <input type="text" id="last_name" name="last_name" class='form-control' placeholder="Enter First Name" data-rule-required="true" aria-required="true" value="{!!@$user['last_name']!!}">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="email" class="control-label">Email</label>
                                            </div>    
                                            <div class="col-sm-9">
                                                <input type="text" readonly class='form-control' value="{!!@$user['email']!!}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="phone" class="control-label">Phone</label>
                                            </div>    
                                            <div class="col-sm-9">
                                                <input type="text" id="phone" name="phone" class='form-control' placeholder="Enter Phone" data-rule-required="true" data-rule-minlength="10" aria-required="true" value="{!!@$user['phone']!!}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="address" class="control-label">Address</label>
                                            </div>    
                                            <div class="col-sm-9">
                                                <input type="text" id="address" name="address" class='form-control' placeholder="Enter Address" data-rule-required="true" data-rule-minlength="5" aria-required="true" value="{!!@$user['address']!!}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="zipcode" class="control-label">Zip</label>
                                            </div>    
                                            <div class="col-sm-9">
                                                <input type="text" id="address" name="zipcode" class='form-control' placeholder="Enter Zip" data-rule-required="true" data-rule-minlength="5" aria-required="true" value="{!!@$user['zipcode']!!}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="country" class="control-label">Country</label>
                                            </div>    
                                            <div class="col-sm-9">
                                                <select name="country" id="country" class='select2-me'>
                                                    @foreach($countries as $country)
                                                    <option @if($country->ccode == $user['country']) selected @endif value="{!!$country->ccode!!}">{!!$country->country!!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="city" class="control-label">City</label>
                                            </div>    
                                            <div class="col-sm-9">
                                                <input type="text" id="city" name="city" class='form-control' placeholder="Enter City" data-rule-required="true" aria-required="true" value="{!!@$user['city']!!}">
                                            </div>
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
                    <?php if($user['password']){ ?> 
                    <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'password') active @endif" id="passwords-tab">
                        <form id="password-form" method="POST" action="{{url('/admin/update-password')}}" class="form-horizontal form-validate profile_form" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="current_password" class="control-label">Current Password</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" id="current_password" name="current_password" class='form-control' placeholder="Enter current password" data-rule-minlength="6" data-rule-required="true" aria-required="true" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="new_password" class="control-label">New Password</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" id="new_password" name="new_password" class='form-control' placeholder="Enter new password" data-rule-required="true" data-rule-minlength="6" aria-required="true" value=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="confirm_password" class="control-label">Confirm Password</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" id="confirm_password" name="confirm_password" class='form-control' placeholder="Retype new password" data-rule-equalto="#new_password" data-rule-minlength="6" data-rule-required="true" aria-required="true" value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions text-right" style="padding: 0 0 20px;">
                                <input type="submit" class='btn btn-primary' value="Save">
                                <input type="reset" class='btn' value="Discard changes">
                            </div>
                        </form>
                    </div>  <?php  } ?>
                    <!--new tabb-->
                    <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'media') active @endif" id="media">
                        <form id="socialmedia" method="POST" action="{{url('/admin/update-profile')}}" class="form-horizontal form-validate profile_form social_form_st" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="facebook" class="control-label">Facebook</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" data-rule-url=�?true�? name="facebook" class='form-control' value="{!!@$user['facebook']!!}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="twitter" class="control-label">Twitter</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" data-rule-url=�?true�? name="twitter" class='form-control' value="{!!@$user['twitter']!!}">    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="linkedin" class="control-label">Linkedin</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" data-rule-url=�?true�? name="linkedin" class='form-control' value="{!!@$user['linkedin']!!}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="googleplus" class="control-label">Google Plus</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" data-rule-url=�?true�? name="googleplus" class='form-control' value="{!!@$user['googleplus']!!}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="youtube" class="control-label">You Tube</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="youtube" data-rule-url=�?true�? class='form-control' value="{!!@$user['youtube']!!}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="pinterest" class="control-label">Pinterest</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="pinterest" data-rule-url=�?true�? class='form-control' value="{!!@$user['pinterest']!!}">
                                    </div>
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="pinterest" class="control-label">Instagram</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="instagram" data-rule-url=�?true�? class='form-control' value="{!!@$user['instagram']!!}">
                                    </div>
                                </div>
                            </div>
                            <div class="social_box">
                            <p>
                            We will automatically link any social media icons to the links entered on the form. Please enter the social media links of the profiles you wish to use on your website. If you do not wish to add any social media profile links, please leave the entry fields empty.
                            </p>
                            </div>


                            <div class="form-actions text-right" style="padding: 0 0 20px;">
                                <input type="submit" class='btn btn-primary' value="Save">
                                <input type="reset" class='btn' value="Discard changes">
                            </div>
                        </form>
                    </div>
                     <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'fbmessenger') active @endif" id="fbmessenger">
                        <form id="fbmessenger" method="POST" action="{{url('/admin/update-profile')}}" class="form-horizontal form-validate profile_form" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">Facebook page ID</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" data-rule-url="true" name="facebook_page_id" class='form-control' value="{!!@$user['facebook_page_id']!!}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info">Please provide facebook page id if you want to enable facebook messenger contact button on your all newly created web sites</div>
                            
                            <div class="form-actions text-right" style="padding: 0 0 20px;">
                                <input type="submit" class='btn btn-primary' value="Save">
                                <input type="reset" class='btn' value="Discard changes">
                            </div>
                        </form>
                    </div>
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

    $('.tab-pane').click(function(){
        $('.tab-pane').removeClass('active');
        $(this).addClass('active');
    });

</script>
@endsection

