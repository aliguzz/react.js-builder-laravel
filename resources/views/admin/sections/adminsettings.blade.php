@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);

@endphp

@if($segment2 != 'contacts')
<section>
    <div class="block shadow-sm">
        <div class="container-fluid">
            <div class="wrap">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-sm-12 mb-20-res">
                        <div class="site-intro">
                            <div class="flex-item-1">
                                <div class="intro-img">
                                    <img src="{{asset('frontend/images/site.jpg')}}" alt="" />
                                </div>
                            </div>
                            
                            <div class="flex-item-2">
                                <ul class="info-list">
                                    <li>
                                        <strong>Site Name : </strong> <span>{!!ucfirst($ProjectDatas->template)!!} | {!!$ProjectDatas->t_cat_name!!}</span>									
                                    </li>
                                    <li>
                                        <strong>Domain : </strong> <span>{!!$ProjectDatas->domain_names!!}</span>									
                                    </li>
                                    <li>
                                        <strong>Status : </strong> <span>Not connected</span>									
                                    </li>
                                    <li>
                                        <strong>Pages : </strong> <span> <?php
                                            $directory = '../public/storage/projects/' . $user_id . '/' . $ProjectData->uuid . '/';
                                            if (glob($directory . "*.html") != false) {
                                                $filecount = count(glob($directory . "*.html"));
                                                echo $filecount;
                                            } else {
                                                echo 0;
                                            }
                                            ?>	</span>								
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="flex-item-3">
                                <ul class="info-list">
                                    <li>
                                        <div class="edit-detail">
                                            <input type="checkbox" id="checkbox_1">
                                            <label for="checkbox_1"><a href="#" title="">Edit</a></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="edit-detail">
                                            <input type="checkbox" id="checkbox_1">
                                            <label for="checkbox_1"><a href="#" title="">Edit</a></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="edit-detail">
                                            <input type="checkbox" id="checkbox_1">
                                            <label for="checkbox_1"><a href="#" title="">Edit</a></label>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                        </div><!-- Site Intro -->
                    </div>

                    <div class="col-xl-3 col-lg-12 ml-auto col-sm-12">
                        <div class="links-list">
                            <svg width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none">
                            <path d="M0,0 L100,0 C25,40 80,100 0,100z"/>
                            </svg>								
                            <ul>
                                <li><a href="#" title=""><span><img src="{{asset('frontend/images/clipboard.svg')}}"  /> </span> Copy URL to clipboard</a></li>
                                <li><a href="#" title=""><span><img src="{{asset('frontend/images/url-panda.svg')}}"  /></span> Visit Live Website</a></li>
                                {{-- <li><a href="#" title=""><span><img src="{{asset('frontend/images/help.svg')}}" /></span> What is panda URL</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>


</section>

@endif

@if($segment2 == 'contacts')

<br/>
<br/>
<br/>
@endif
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
                                    <li class="slide"><a data-toggle="tab" href="#menu2"><div class="curve"><div class="icon"><i class="fa fa-envelope"></i></div></div> <span>Email List</span></a></li>

                                    <li class="slide"><a data-toggle="tab" @if($segment2 == 'contacts') class="active" @endif href="#menu9"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/contacts.svg')}}" /></div></div> <span>Contacts</span></a></li>	
                                    
                                    <li class="slide"><a href="javascript:history.back()"><div class="curve"><div class="icon"><i class="fa fa-arrow-circle-left" style="font-size:24px;color:#b71111"></i></div></div> <span>Go back</span></a></li>

                                </ul>

                            </div>							
                        </div>				
                    </div>
                </div>
            </section>


        </div>

    </div>
</div>