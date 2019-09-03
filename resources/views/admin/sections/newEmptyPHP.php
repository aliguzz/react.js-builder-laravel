
@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
@endphp
<div id="navigation" class="navbar-fixed-top">
    <div class="container-fluid">
        <a id="brand" href="{{ url('/') }}"><img src="{{ asset('images/logo-white.png') }}" alt="" class='retina-ready' width="200"></a>
        <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
        <ul class='main-nav'>
            <li class="@if ($segment2 == 'dashboard') active @endif ">
                <a href="{{ url('/admin/dashboard') }}">
                    <span>Dashboard</span>
                </a>
            </li>


            @if(have_premission(array(94)))
            <li class="@if ($segment2 == 'industries') active @endif ">
                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    <span>Industries</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    @if(have_premission(array(91)))
                    <li>
                        <a href="{{url('/admin/industries/create')}}">Add new Industry</a>
                    </li>
                    @endif
                    @if(have_premission(array(94)))
                    <li>
                        <a href="{{url('/admin/industries')}}">Industries </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            @if(have_premission(array(77)))
            <li class="@if ($segment2 == 'categories') active @endif ">
                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    <span>Categories</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    @if(have_premission(array(74)))
                    <li>
                        <a href="{{url('/admin/categories/create')}}">Add new Category</a>
                    </li>
                    @endif
                    @if(have_premission(array(77)))
                    <li>
                        <a href="{{url('/admin/categories')}}">Categories </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            <li class="@if ($segment2 == 'template-categories') active @endif ">
                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    <span>Templates</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    @if(have_premission(array(98)))
                    <li class='dropdown-submenu'>
                        <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Template Categories</a>
                        <ul class="dropdown-menu">
                            @if(have_premission(array(95)))
                            <li>
                                <a href="{{url('/admin/template-categories/create')}}">New Template Category</a>
                            </li>
                            @endif
                            @if(have_premission(array(98)))
                            <li>
                                <a href="{{url('/admin/template-categories')}}">Template Categories</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                </ul>
            </li>

            @if(have_premission(array(102)))
            <li class="@if ($segment2 == 'help-articles' || $segment2 == 'tickets') active @endif ">
                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    <span>Help Articles</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    @if(have_premission(array(99)))
                    <li>
                        <a href="{{url('/admin/help-articles/create')}}">Add New Help Article</a>
                    </li>
                    @endif
                    @if(have_premission(array(102)))
                    <li>
                        <a href="{{url('/admin/help-articles')}}">Help Articles </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{url('/admin/tickets')}}">Tickets </a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="@if ($segment2 == 'cms-pages' || $segment2 == 'blog' || $segment2 == 'blog-category' || $segment2 == 'settings' || $segment2 == 'roles' || $segment2 == 'templates' || $segment2 == 'users' ||  $segment2 == 'testimonials' || $segment2 == 'subscribers' || $segment2 == 'contact-us-log') active @endif ">
                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    <span>Settings</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    @if(have_premission(array(44)) || have_premission(array(45)))
                    <li class='dropdown-submenu'>
                        <a href="#" data-toggle="dropdown" class='dropdown-toggle'>CMS Pages</a>
                        <ul class="dropdown-menu">
                            @if(have_premission(array(45)))
                            <li>
                                <a href="{{url('/admin/cms-pages/create')}}">New CMS Page</a>
                            </li>
                            @endif
                            @if(have_premission(array(44)))
                            <li>
                                <a href="{{url('/admin/cms-pages')}}">CMS Pages</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if(have_premission(array(83)) || have_premission(array(73)))
                    <li class='dropdown-submenu'>
                        <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Blogs</a>
                        <ul class="dropdown-menu">
                            @if(have_premission(array(73)))
                            <li>
                                <a href="{{url('/admin/blog-category')}}">Blog Categories</a>
                            </li>
                            @endif
                            @if(have_premission(array(83)))
                            <li>
                                <a href="{{url('/admin/blogs')}}">Manage Blog</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if(have_premission(array(52)))
                    <li>
                        <a href="{{url('/admin/settings')}}">Site Settings</a>
                    </li>
                    @endif
                    @if(have_premission(array(58)))
                    <li>
                        <a href="{{url('/admin/roles')}}">Roles</a>
                    </li>
                    @endif
                    @if(have_premission(array(60)) || have_premission(array(61)))
                    <li class='dropdown-submenu'>
                        <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Templates</a>
                        <ul class="dropdown-menu">
                            @if(have_premission(array(61)))
                            <li>
                                <a href="{{url('/admin/templates/create')}}">New Template</a>
                            </li>
                            @endif
                            @if(have_premission(array(60)))
                            <li>
                                <a href="{{url('/admin/templates')}}">Templates</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if(have_premission(array(32))
                    <li class='dropdown-submenu'>
                        <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Users</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('/admin/users/create')}}">New User</a>
                            </li>
                            @if(have_premission(array(32)))
                            <li>
                                <a href="{{url('/admin/users')}}">Users</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if(have_premission(array(77)) || have_premission(array(74)))
                    <li class='dropdown-submenu'>
                        <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Testimonials</a>
                        <ul class="dropdown-menu">
                            @if(have_premission(array(74)))
                            <li>
                                <a href="{{url('/admin/testimonials/create')}}">New Testimonial</a>
                            </li>
                            @endif
                            @if(have_premission(array(77)))
                            <li>
                                <a href="{{url('/admin/testimonials')}}">Testimonials</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if(have_premission(array(87)))
                    <li>
                        <a href="{{url('/admin/subscribers')}}">Subscribers</a>
                    </li>
                    @endif
                    @if(have_premission(array(89)))
                    <li>
                        <a href="{{url('/admin/contact-us-log')}}">Contact Us Log</a>
                    </li>
                    @endif
                </ul>
            </li>
            @if(have_premission(array(64)) || have_premission(array(65)) || have_premission(array(66)) || have_premission(array(67)))
            <li class="@if ($segment2 == 'reports') active @endif ">
                <a href="{{ url('/admin/reports') }}">
                    <span>Reports</span>
                </a>
            </li>
            @endif

            <li class=" ">
                <a href="" data-toggle="modal" data-target="#exampleModal">
                    <span>Support</span>
                </a>
            </li>
        </ul>
        <div class="user">
            <ul class="icon-nav">

                <li class='dropdown colo'>
                    <a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-tint"></i></a>
                    <ul class="dropdown-menu pull-right theme-colors">
                        <li class="subtitle">
                            Predefined colors
                        </li>
                        <li>
                            <span class='red'></span>
                            <span class='orange'></span>
                            <span class='green'></span>
                            <span class="brown"></span>
                            <span class="blue"></span>
                            <span class='lime'></span>
                            <span class="teal"></span>
                            <span class="purple"></span>
                            <span class="pink"></span>
                            <span class="magenta"></span>
                            <span class="grey"></span>
                            <span class="darkblue"></span>
                            <span class="lightred"></span>
                            <span class="lightgrey"></span>
                            <span class="satblue"></span>
                            <span class="satgreen"></span>
                        </li>
                    </ul>
                </li>

                @php 
                $user_id = \Auth::user()->id;
                $unread_notfications = \App\DbModel::unread_notifications($user_id);
                @endphp
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-bell"></i><span class="label label-lightred">{!!$unread_notfications!!}</span></a>
                    <ul class="dropdown-menu pull-right message-ul">
                        @php
                        $header_nts = \App\DbModel::get_notifications($user_id);
                        $counter = 5;
                        @endphp
                        @if(count($header_nts) > 0)

                        @foreach($header_nts as $h_nt)
                        @if($counter > 0)
                        <li>
                            @if($h_nt->type == 'package_upgraded')
                            <a class="notification" data-id="{{$h_nt->id}}" href="{{URL::to('admin/package-upgrade')}}">
                                @elseif($h_nt->type == 'new_signup')
                                <a class="notification" data-id="{{$h_nt->id}}" href="{{URL::to('admin/package-orders')}}">
                                    @elseif($h_nt->type == 'lead_status_updated')
                                    <a class="notification" data-id="{{$h_nt->id}}" href="{{URL::to("admin/leads/$h_nt->lead_id/details")}}">
                                        @elseif($h_nt->type == 'account_expiration_in_week' || $h_nt->type == 'account_expiration_in_day')
                                        <a class="notification" data-id="{{$h_nt->id}}" href="{{URL::to('admin/package-upgrade')}}">    
                                            @else
                                            <a class="notification" data-id="{{$h_nt->id}}" href="{{URL::to("admin/leads/$h_nt->lead_id/details")}}">
                                                @endif
                                                <span>
                                                    @if($h_nt->type == 'package_upgraded')
                                                    <i class="fa fa-credit-card-alt"></i>
                                                    @elseif($h_nt->type == 'new_signup')
                                                    <i class="fa fa-user"></i>
                                                    @elseif($h_nt->type == 'lead_status_updated')
                                                    <i class="fa fa-info"></i>
                                                    @elseif($h_nt->type == 'account_expiration_in_week' || $h_nt->type == 'account_expiration_in_day')
                                                    <i class="fa fa-sign-out "></i>
                                                    @else
                                                    <i class="fa fa-calendar-o"></i>
                                                    @endif
                                                </span>
                                                <!-- <img src="{{ asset('images/demo/user-1.jpg')}}" alt=""> -->
                                                <div class="details">
                                                    <div class="name">
                                                        @php $type = ucwords(str_replace("_"," ",$h_nt->type)); @endphp
                                                        {!!$type!!}
                                                    </div>
                                                    <div class="message">
                                                        @if($h_nt->type == 'package_upgraded')
                                                        <b>Package:</b> {!!$h_nt->package_title!!}</td>
                                                        @elseif($h_nt->type == 'new_signup')
                                                        <b>Package Title:</b> {!!$h_nt->package_title!!} <br>
                                                        <b> Email:</b> {!!$h_nt->user_email!!}
                                                        @elseif($h_nt->type == 'lead_status_updated')  
                                                        <b>Lead Reference: </b> {!!$h_nt->lead_id!!} <br>
                                                        <b>Lead Status:</b> {!!$h_nt->lead_status!!}
                                                        @elseif($h_nt->type == 'event_created' || $h_nt->type == 'event_updated' || $h_nt->type == 'event_cancel' || $h_nt->type == 'event_reminder')
                                                        <b>Event:</b> {!!summary($h_nt->assignment_details,150,true)!!} <br>
                                                        <b>Event Start:</b> @php echo date('d F Y', strtotime($h_nt->event_start)); @endphp <br>
                                                        <b>Event End:</b> @php echo date('d F Y', strtotime($h_nt->event_end)); @endphp <br>
                                                        @elseif($h_nt->type == 'account_expiration_in_day' || $h_nt->type == 'account_expiration_in_week')
                                                        <b>Account Title:</b> {!!$h_nt->package_title!!}<br>
                                                        <b>Expired on:</b> @php echo date('d F Y', strtotime($h_nt->account_expired_on)); @endphp
                                                        @endif

                                                    </div>
                                                </div>
                                            </a>
                                            </li>
                                            @php $counter = $counter - 1; @endphp 
                                            @endif
                                            @endforeach
                                            <li>
                                                <a href="{{url('/admin/notifications')}}" class='more-messages'>View All Notifications <i class="icon-arrow-right"></i></a>
                                            </li>
                                            @else
                                            <li>
                                                <a class='more-messages'>No Notifications... </a>
                                            </li>
                                            @endif

                                            </ul>
                                            </li> 


                                            </ul>
                                            <div class="dropdown">
                                                <a href="#" class='dropdown-toggle' data-toggle="dropdown">{{ Auth::user()->first_name.' '.Auth::user()->last_name }} <img src="{{ checkImage('users/'.Auth::user()->profile_image) }}" alt="" width="30px"></a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="{{url('/admin/my-profile')}}">Edit profile</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('/logout')}}">Sign out</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </div>
                                            </div>
                                            </div>


                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-body" id="ques-div">		
                                                            <textarea style="width:100%" name="question" id="question"></textarea>

                                                        </div>



                                                        <div id="sols" style="display:none;">
                                                        </div>

                                                        <div class="modal-body" id="solution-div" style="display:none;">		
                                                            <form action="{{url('tickets')}}" method="POST" >
                                                                <textarea style="display:none;" name="question" id="questions"></textarea>
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="action" value="tickt">
                                                                <button type="submit">Submit Ticket</button>
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" onclick="checkSolutions();" >Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <script>
                                                function checkSolutions() {
                                                    URL = "{{URL::to('tickets')}}";
                                                    question = $("#question").val();
                                                    toke = $("input[name=_token]").val();


                                                    $.ajax({
                                                        type: "POST",
                                                        url: URL,
                                                        data: {
                                                            'question': question,
                                                            '_token': toke,
                                                            'action': 'ques',
                                                        },
                                                        success: function (response) {
                                                            response = JSON.parse(response);


                                                            if (response == 0) {
                                                                $("#ques-div").hide();
                                                                $("#solution-div").show();
                                                                $('#questions').val(question);
                                                            }
                                                            if (response != 0) {
                                                                $("#ques-div").hide();
                                                                $("#sols").html(response);
                                                                $("#sols").show();
                                                            }

                                                        },
                                                        error: function (ajax_alert) {

                                                            alert(ajax_alert);

                                                        }

                                                    });
                                                }
                                            </script>