<!--<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/css/after-login.css')}}" media="screen">-->
@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
@endphp

<?php
if (check_package() && $segment2 != 'upgrade-account') {
    ?>
    <script>
        window.location.href = '{!!url("admin/upgrade-account")!!}';
    </script>
    <?php
}
?>
<header>
    <div class="header-left left-panel-width-control">
        <div class="logo">
            <a href="{{url('admin/dashboard')}}" title=""><img src="{{asset('assets/images/logo.png')}}" alt="" /></a>
            <svg width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0,0 L100,0 C15,50 50,100 0,100z"/>
            </svg>
        </div>
        <!-- Logo -->
        <div class="header-dropdown">
            <div class="dropdown">
                <span class="selected-value dropbtn" id="dropdownMenu2" data-toggle="dropdown">My Sites <i class="fas fa-angle-down"></i> </span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <div class="top-head">My Site </div>
                    <div id="custom-search-input" style="display: none; ">
                        <div class="input-group col-md-12" >
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button">
                                    <span class=" fas fa-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="selectsite">
                            @foreach(dashboard::getProjects() as $pro)
                            <article style="margin: 10px 10px;">
                                <div class="left-box"><img class="img-fluid" src="{!! asset('storage/projects/'.Auth::user()->id.'/'.$pro->uuid.'/thumbnail.png') !!}"></div>
                                <div class="right-box">
                                    <h1>{!!$pro->template!!} &nbsp;<span>| {!!$pro->t_cat_name!!}</span></h1>
                                    <p>last updated <span class="timeago" title="Fri, Jan 26 2018">{{{ $date = time_ago($pro->updated_at) }}}</span></p>
                                    <a href="{!!url('sites/'.$pro->name)!!}">
                                        <button type="button" class="btn btn-primary">Select Site</button>
                                    </a>
                                    <a href="{!!url('admin/panda-pages/'.$pro->id.'/edit')!!}">
                                        <button type="button" class="btn btn-info">Edit Site</button>
                                    </a>
                                </div>
                            </article>
                            @endforeach
                            @if(checkUserProjects())
                            <div class="site-button">
                                <a href="{{asset('admin/panda-pages/create')}}">
                                    <button type="button" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Create a new site</button></a>
                            </div>
                            @else  
                            <div class="site-button" id="create_site">
                                <a>
                                    <button type="button" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Create a new site</button></a>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    $('#create_site').click(function () {
                                        swal({
                                            title: "Site Limit Exceeded. Please Upgrade Your Account",
                                            type: "error"
                                        });
                                    });
                                });

                            </script>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Dropdown -->
    </div>
    @php $user = Auth::user();  @endphp
    <div class="" style="margin-left: 10px;">
        <div class="header-dropdown">
            <div class="dropdown">
                <span class="selected-value dropbtn" id="dropdownMenu2" data-toggle="dropdown">{{ $user->first_name .' '.$user->last_name }}<i class="fas fa-angle-down"></i> </span>
                <div class="dropdown-menu profile_DropMenu" aria-labelledby="dropdownMenu2">
                    <div class="top-head">Profile</div>
                    <div class="selectsite">
                        <article style="margin: 10px 10px;">
                            <div class="left-box">
                                <?php if ($user['profile_image']) { ?> <img class="img-fluid" src="{!! asset('uploads/users/'.$user['profile_image']) !!}">  <?php } else { ?> 
                                    <img class="img-fluid" src="https://forum.vietnam-expat.com/styles/BBOOTS/theme/images/no_avatar.gif">
                                <?php } ?>
                            </div>
                            <div class="right-box">
                                <a href="{!!url('logout')!!}">
                                    <span class="">Logout</span>
                                </a>
                                <a href="{!!url('my-profile')!!}">
                                    <span class="">Edit Profile</span>
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar fixed-top fixed-top-custom-icon navbar-expand-sm navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">☰</button> 
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav ml-auto header-icons">
                    <a class="icon tooltipp" href="{{url('/admin/account-details')}}" title="">
                        <span class="tooltiptext">Account</span><i class="fa fa-user"></i></a>  

                    @if(have_premission(array(29,30,31,32,33,34,35,36,37,38,39,44,45,46,47,57,58,59,60,61,62,63,66,67,70,71,72,73,83,84,85,86,87,88,91,92,93,94,99,100,101,102,103,124,125,126,127,128,129,130,131,132,133,134,135)) && Auth::user()->role == 1)
                    <a class="icon tooltipp" href="{{url('/admin/settings')}}" title="">
                        <span class="tooltiptext">Admin</span><img src="{{asset('assets/images/admincog.svg')}}" height="30" width="30" class="svg2" /></a>
                    @endif        
                    @if(have_premission(array(80)))
                    <a class="icon tooltipp" href="{{url('admin/tickets')}}" title="">
                        <span class="tooltiptext">Tickets</span><i class="fa fa-ticket-alt"></i></a>
                    @endif
                    @if(have_premission(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)))
                    <a class="icon tooltipp" href="{{url('/admin/panda-pages')}}" title="">
                        <span class="tooltiptext">Websites</span><img src="{{asset('assets/images/icon5.svg')}}" class="svg5"/></a>
                    @endif    

                    @if(have_premission(array(16,17,18,19,20,21,22,23,24,25,26)))
                    @if(@Session::get('session_last_project')[0]->id != '')
                    <a class="icon tooltipp" href="{{url('/admin/contacts/emails/'.@Session::get('session_last_project')[0]->id.'/lists')}}" title="">
                        <span class="tooltiptext">Email</span><img src="{{asset('assets/images/icon4.svg')}}" class="svg4" />
                    </a>
                    @endif
                    @endif
                    @if(have_premission(array(136,137,138,139,140,141,142,143,144,145,146)))
                    @if(@Session::get('session_last_project')[0]->id != '')
                    <a class="icon tooltipp" href="{{url('/admin/contacts/text/'.@Session::get('session_last_project')[0]->id.'/lists')}}" title="">
                        <span class="tooltiptext">SMS</span><svg class="sms_svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 78.666 78.666" style="enable-background:new 0 0 78.666 78.666;" xml:space="preserve"><g><path d="M9.49,73.833c-1.494,0-2.943-0.24-4.31-0.713l-3.113-1.077l2.392-2.265c3.166-2.998,3.965-6.456,4.017-9.046C3.004,54.665,0,47.096,0,39.333c-0.001-19.023,17.644-34.5,39.332-34.5s39.334,15.477,39.334,34.5c0,19.022-17.646,34.498-39.334,34.498c-6.457,0-12.827-1.399-18.504-4.057C18.689,71.289,14.368,73.833,9.49,73.833zM20.359,65.078l1.148,0.581c5.397,2.729,11.561,4.173,17.824,4.173c19.483,0,35.334-13.682,35.334-30.498c0-16.818-15.851-30.5-35.334-30.5S3.998,22.516,3.998,39.333c0,6.989,2.814,13.822,7.925,19.239l0.52,0.551l0.024,0.757c0.088,2.719-0.4,6.406-2.817,9.951c4.632-0.074,8.89-3.298,9.704-3.949L20.359,65.078z"/><path d="M20.254,48.769c-1.467,0-2.658-0.115-3.578-0.346c-0.918-0.229-1.553-0.465-1.902-0.705c-0.088-0.088-0.121-0.289-0.1-0.607c0.021-0.315,0.071-0.645,0.148-0.983c0.076-0.338,0.175-0.642,0.295-0.901c0.12-0.262,0.234-0.384,0.345-0.361c0.569,0.197,1.187,0.389,1.854,0.574s1.515,0.278,2.543,0.278c1.051,0,1.941-0.151,2.676-0.459c0.732-0.307,1.1-0.854,1.1-1.641c0-0.681-0.242-1.232-0.723-1.658s-1.346-0.881-2.593-1.36c-0.679-0.265-1.318-0.554-1.92-0.872c-0.603-0.316-1.132-0.689-1.592-1.116c-0.46-0.426-0.82-0.935-1.083-1.525c-0.263-0.59-0.395-1.291-0.395-2.101c0-0.656,0.127-1.28,0.378-1.871s0.64-1.1,1.165-1.526c0.525-0.426,1.198-0.766,2.019-1.017c0.821-0.252,1.8-0.378,2.938-0.378c0.743,0,1.362,0.017,1.854,0.049c0.492,0.033,0.896,0.077,1.215,0.132c0.316,0.055,0.574,0.115,0.771,0.181c0.197,0.066,0.383,0.12,0.558,0.164c0.153,0.065,0.23,0.257,0.23,0.574s-0.045,0.656-0.132,1.018c-0.087,0.36-0.208,0.678-0.36,0.951c-0.154,0.274-0.307,0.389-0.46,0.345c-0.372-0.109-0.881-0.229-1.526-0.36c-0.646-0.132-1.274-0.197-1.887-0.197c-1.248,0-2.106,0.176-2.576,0.525c-0.471,0.35-0.706,0.82-0.706,1.411c0,0.635,0.263,1.144,0.788,1.526c0.525,0.382,1.346,0.771,2.461,1.165c1.772,0.7,3.08,1.504,3.922,2.412c0.842,0.908,1.264,2.051,1.264,3.43c0,1.029-0.197,1.883-0.59,2.562c-0.395,0.678-0.92,1.215-1.576,1.606c-0.656,0.396-1.406,0.674-2.248,0.838C21.988,48.687,21.129,48.769,20.254,48.769z"/><path d="M43.917,48.605c-0.459,0-0.76-0.076-0.901-0.23c-0.144-0.152-0.213-0.447-0.213-0.887V36.001c-0.875,1.422-1.55,2.521-2.021,3.298c-0.472,0.778-0.813,1.347-1.033,1.708c-0.219,0.359-0.351,0.574-0.396,0.639c-0.043,0.066-0.063,0.111-0.063,0.133c-0.196,0.328-0.334,0.541-0.41,0.64c-0.078,0.101-0.237,0.147-0.477,0.147h-0.525c-0.284,0-0.471-0.049-0.558-0.147c-0.087-0.099-0.219-0.312-0.394-0.64l-3.348-5.71v11.619c0,0.285-0.049,0.51-0.148,0.674c-0.098,0.164-0.355,0.246-0.771,0.246h-1.377c-0.307,0-0.574-0.049-0.805-0.148c-0.229-0.098-0.345-0.42-0.345-0.969V31.736c0-0.438,0.082-0.728,0.246-0.87c0.164-0.142,0.399-0.213,0.706-0.213h1.641c0.24,0,0.443,0.032,0.607,0.098s0.333,0.23,0.509,0.492l4.364,6.958l4.365-6.892c0.132-0.241,0.289-0.41,0.478-0.509c0.187-0.099,0.365-0.147,0.541-0.147h1.806c0.416,0,0.655,0.087,0.723,0.262c0.066,0.176,0.098,0.46,0.098,0.854v15.883c0,0.328-0.043,0.57-0.131,0.724s-0.34,0.229-0.754,0.229H43.917L43.917,48.605z"/><path d="M54.848,48.769c-1.468,0-2.658-0.115-3.578-0.346c-0.918-0.229-1.554-0.465-1.902-0.705c-0.088-0.088-0.121-0.289-0.1-0.607c0.021-0.315,0.069-0.645,0.147-0.983c0.076-0.338,0.174-0.642,0.295-0.901c0.119-0.263,0.233-0.384,0.345-0.361c0.569,0.197,1.188,0.389,1.854,0.574c0.666,0.186,1.514,0.278,2.543,0.278c1.051,0,1.94-0.151,2.676-0.459c0.731-0.307,1.101-0.854,1.101-1.641c0-0.681-0.242-1.232-0.724-1.658s-1.346-0.881-2.594-1.36c-0.679-0.265-1.317-0.554-1.92-0.872c-0.603-0.316-1.132-0.689-1.593-1.116c-0.459-0.426-0.819-0.935-1.082-1.525c-0.264-0.591-0.395-1.291-0.395-2.101c0-0.656,0.127-1.28,0.377-1.871c0.252-0.591,0.641-1.1,1.166-1.526c0.525-0.426,1.197-0.766,2.018-1.017c0.822-0.252,1.802-0.378,2.938-0.378c0.744,0,1.363,0.017,1.854,0.049c0.492,0.033,0.896,0.077,1.216,0.132c0.315,0.055,0.573,0.115,0.771,0.181c0.196,0.065,0.383,0.12,0.559,0.164c0.152,0.065,0.229,0.257,0.229,0.574s-0.045,0.656-0.133,1.018c-0.086,0.36-0.207,0.678-0.358,0.951c-0.154,0.274-0.308,0.389-0.461,0.345c-0.371-0.109-0.882-0.229-1.525-0.36c-0.646-0.132-1.275-0.197-1.887-0.197c-1.248,0-2.107,0.176-2.576,0.525c-0.471,0.35-0.707,0.82-0.707,1.411c0,0.635,0.264,1.144,0.789,1.526c0.524,0.382,1.346,0.771,2.461,1.165c1.771,0.7,3.08,1.504,3.922,2.412c0.842,0.908,1.264,2.051,1.264,3.43c0,1.029-0.197,1.883-0.59,2.562c-0.395,0.678-0.92,1.215-1.576,1.606c-0.656,0.396-1.406,0.674-2.248,0.838C56.579,48.687,55.723,48.769,54.848,48.769z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    </a>
                    @endif
                    @endif
                    @if(have_premission(array(59,62,63,67)))
                    <a class="icon tooltipp" href="{{url('/admin/panda-pages/create')}}" title="Templates">
                        <span class="tooltiptext">Templates</span><img src="{{asset('assets/images/icon2.svg')}}" class="svg2" /></a>
                    @endif
                    @if(Auth::user()->role != 1)
                        <a class="icon tooltipp" href="#" data-toggle="modal" id="gethelpmodal" data-target="#myModal">
                        <span class="tooltiptext">Get Help</span><img src="{{asset('assets/images/icon1.svg')}}" class="svg1" /> </a>
                    @endif
                    @if(have_premission(array(104,105,106,107)))
                    <a class="fancy-btn fancy-btn-mob" href="{{url('admin/upgrade-account')}}" title="">
                        <svg class="fancy-btn-left" width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none">
                        <path d="M0,0 L100,0 C15,50 50,100 0,100z"/>
                        </svg>
                        Upgrade
                        <svg class="fancy-btn-right" width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none">
                        <path d="M0,0 L100,0 C15,50 50,100 0,100z"/>
                        </svg>
                    </a>
                    @endif
                    <!-- Fancy Button -->								
                </ul>
            </div>
        </nav>

    </div>
</header>
<!-- Header -->
<!--popup start-->
<div class="modal fade GetHelp" id="myModal" role="dialog">
    <div class="modal-dialog"> 
        <!-- Modal content-->
        <div class="modal-content help">
            <div class="modal-body">
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="col-md-12">
                            <h3>How Can We Help?</h3>
                            <p>Please tell us about the problem you're facing below. A member of our support team will respond as soon as they are available to help.</p>
                            {{ csrf_field() }}
                            <div class="form-group">


                                <div id="check_data"><p style="color: red;"> Field is empty </p></div>
                            
                            
                            
                                <textarea required minlength="10" maxlength="255" id="question" class="form-control text_area_style" placeholder="Please outline the problem you are facing here..." ></textarea>
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg float-right con_btn_clrr" id="sbmt-btn" type="button"  >Submit</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-md-12">
                        <h3> Thank You </h3>
                        <div class="" id="innerstep-2">
                            <p>A member of our support team will be in touch as soon as they come available. To save you waiting we can email you when someone is available to deal with your support query.</p>
                        </div> 
                        <div class="solutions-view-footer row">
                            <div class="col-sm-6">
                                <div class="notsolvedbtn" role="button" tabindex="0">
                                    <span>Email Me</span>
                                </div>    
                            </div>
                            <div class="col-sm-6">
                                <div class="solvedbtn" role="button" tabindex="0">
                                    <span>I'll wait here</span>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-10 col-md-offset-1">
                        <div class="col-md-12" id="innerstep-3">
                            <h2 style="color:#fff">Great...</h2>
                            <p class="" id="descriptions">Please wait for the next available advisor to deal with your request.</p>
                            <div><p>Position:</p></div>
                            <div id="position_time"></div>
                            <div class="col-sm-12">
                                <div class="notsolvedbtn" role="button" tabindex="0">
                                    <span>Please Email Me</span>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-4">
                    <div class="col-md-12">
                        <h3> Thank You </h3>
                        <div class="" id="innerstep-2">
                            <p>Our Advisor will email you shortly</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
<script>

    $(document).ready(function () {
        $('#step-1').css("display", "block");
        $('#check_data').css("display", "none");
        $('#step-2').css("display", "none");
        $('#step-3').css("display", "none");
        $(document).on('click', '#gethelpmodal', function () {
            $('#step-1').css("display", "block");
            $('#step-2').css("display", "none");
            $('#step-3').css("display", "none");
        });
    });

    $(document).on('click', '.notsolvedbtn', function () {
        $('#step-1').css("display", "none");
        $('#step-2').css("display", "none");
        $('#step-3').css("display", "none");
        $('#step-4').css("display", "block");
        setTimeout(function(){
            window.location.href = window.location;
        }, 2000);
    });

    $(document).on('click', '.solvedbtn', function () {
        $('#step-1').css("display", "none");
        $('#step-2').css("display", "none");
        $('#step-3').css("display", "block");
    });

    $("#question").keypress(function(){
        $('#check_data').css('display', 'none');
    });
    $(document).on('click', '#sbmt-btn', function(){
        question = $("#question").val();
        if(question == ''){
            $('#check_data').css('display', 'block');
        }else{
            URL = "{{url('admin/tickets/createticket')}}";
            toke = $("input[name=_token]").val();
            $.ajax({
                type: "POST",
                url: URL,
                data: {
                    'q': question,
                    '_token': toke
                },
                success: function (response) {
                    response = JSON.parse(response);
                    console.log(response);
                    var tickets = response.tickets_data;
                    var ticket_replies = response.ticket_replies_data;
                    var count = tickets.length - ticket_replies.length;
                    var cnt  = ordinal_suffix_of(count);
                    var tm = 0;
                    $("#step-1").css("display", "none");
                    $("#step-2").css("display", "block");
                    $("#position_time").append("<p class='postion_counter'> You are <span>" + cnt + "</span> in line</p> <p class='postion_counter'>Estimated wait time: <span id='countdown' class='timer'>  </span> </p>");

                    var seconds = count * 60 * 2;  // Suppose, Admin Needs 2 Mints for each ticket reply 
                    setInterval(function () {
                        var days = Math.floor(seconds / 24 / 60 / 60);
                        var hoursLeft = Math.floor((seconds) - (days * 86400));
                        var hours = Math.floor(hoursLeft / 3600);
                        var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
                        var minutes = Math.floor(minutesLeft / 60);
                        var remainingSeconds = seconds % 60;
                        if (remainingSeconds < 10) {
                            remainingSeconds = "0" + remainingSeconds;
                        }
                        console.log("Hours are: "+hours+" and Minutes are: "+ minutes);
                        if(hours>0){
                            console.log('1st');
                            tm = hours + " hour" + minutes + " minutes " + remainingSeconds + " seconds";
                        }else if(hours==0 && minutes > 0){
                            console.log('2nd');
                            tm = minutes + "minutes " + remainingSeconds + "seconds";
                        }else{
                            console.log('3rd');
                            tm = remainingSeconds + "seconds";
                        }
                        document.getElementById('countdown').innerHTML = tm;
                        if (seconds == 0) {
                            clearInterval();
                            document.getElementById('countdown').innerHTML = "Completed";
                        } else {
                            seconds--;
                        }
                    }, 1000);
                },
                error: function (ajax_alert) {
                    alert(ajax_alert);
                }
            });
        }
        
    });

    function ordinal_suffix_of(i) {
        var j = i % 10,
            k = i % 100;
        if (j == 1 && k != 11) {
            return i + "st";
        }
        if (j == 2 && k != 12) {
            return i + "nd";
        }
        if (j == 3 && k != 13) {
            return i + "rd";
        }
        return i + "th";
    }
    </script>