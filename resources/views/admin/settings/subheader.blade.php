@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
@endphp

<br/>
<br/>
<br/>
<style>.hidden.deleteSubmit{display:none;}</style>

<div class="clearfix"></div>
<div class="block no-space gray">
	<div class="container-fluid">
		<div class="selectors-bar">					
			<section>
				<div class="block no-space gray">
					<div class="container-fluid">
						<div class="selectors-bar">							
							<div class="scrollmenu selectors-container">							<ul class="selectors nav nav-tabs">
                                                                            @if(have_premission(array(14)))
                                                                            <li class="slide"><a  @if($segment2 == 'settings') class="active" @endif  href="{{url('admin/settings')}}"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/domain.svg')}}" /> </div></div> <span>Site Settings</span></a></li>
                                                                            @endif
                                                                            
                                                                            
                            @if(have_premission(array(104)))
                                <li class="slide"><a  @if($segment2 == 'packages') class="active" @endif  href="{{url('admin/packages')}}"><div class="curve"><div class="icon"><i class="fa fa-cubes"></i></div></div> <span>Packages</span></a></li>
                            @endif
                                                                            
                                                                            @if(have_premission(array(44,45,46,47)))
										<li class="slide"><a  @if($segment2 == 'cms-pages') class="active" @endif  href="{{url('admin/cms-pages')}}"><div class="curve"><div class="icon"><i class="fa fa-plus"></i></div></div> <span>CMS Pages</span></a></li>
										@endif
                                                                                @if(have_premission(array(91,92,93,94)))
										<li class="slide"><a  @if($segment2 == 'industries') class="active" @endif  href="{{url('admin/industries')}}"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/rename-site.svg')}}" /></div></div> <span>Industries</span></a></li>
                                                                                @endif
                                                                                @if(have_premission(array(59,62,63,67)))
										<li class="slide"><a  @if($segment2 == 'templates') class="active" @endif  href="{{url('admin/templates')}}"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/duplicate-site.svg')}}" /></div></div> <span>Templates</span></a></li>
                                                                                @endif
                                                                                @if(have_premission(array(124,125,126,127)))
										<li class="slide"><a  @if($segment2 == 'images') class="active" @endif  href="{{url('admin/images')}}"><div class="curve"><div class="icon"><i class="fa fa-images"></i></div></div> <span>Images</span></a></li>
                                                                                @endif
                                                                                
                                                                                @if(have_premission(array(128,129,130,131)))
                                                                                <li class="slide"><a  @if($segment2 == 'vector') class="active" @endif  href="{{url('admin/vector')}}"><div class="curve"><div class="icon"><i class="fa fa-paint-brush"></i></div></div> <span>Vector Art</span></a></li>
                                                                                @endif
                                                                                
                                                                                @if(have_premission(array(132,133,134,135)))
                                                                                
                                                                                <li class="slide"><a  @if($segment2 == 'videos') class="active" @endif  href="{{url('admin/videos')}}"><div class="curve"><div class="icon"><i class="fa fa-video"></i></div></div> <span>Videos</span></a></li>
                                                                                @endif
                                                                                
                                                                                @if(have_premission(array(70,71,72,73,83,84,85,86)))
                                                                                <li class="slide"><a  @if($segment2 == 'blog-category') class="active" @endif  href="{{url('admin/blog-category')}}"><div class="curve"><div class="icon"><i class="fa fa-tag"></i></div></div> <span>Blog Categories</span></a></li>
                                                                                @endif
                                                                                
                                                                                @if(have_premission(array(70,71,72,73,83,84,85,86)))
                                                                                <li class="slide"><a  @if($segment2 == 'blogs') class="active" @endif  href="{{url('admin/blogs')}}"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/statistics.svg')}}" /></div></div> <span>Blogs</span></a></li>
                                                                                @endif
                                                                                
                                                                                @if(have_premission(array(58,60,61,66)))
										<li class="slide"><a  @if($segment2 == 'roles') class="active" @endif  href="{{url('admin/roles')}}"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/contacts.svg')}}" /></div></div> <span>Roles</span></a></li>
                                                                                @endif
                                                                                @if(have_premission(array(29,30,31,103)))
										<li class="slide"><a  @if($segment2 == 'email-templates') class="active" @endif  href="{{url('admin/email-templates')}}"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/settings-web.svg')}}"/></div></div> <span>Email Templates</span></a></li>
                                                                                @endif
                                                                                @if(have_premission(array(32,33,34,35)))
										<li class="slide"><a  @if($segment2 == 'users') class="active" @endif  href="{{url('admin/users')}}"><div class="curve"><div class="icon"><i class="fa fa-users"></i></div></div> <span>Users</span></a></li>
                                                                                @endif
                                                                                
                                                                                @if(have_premission(array(36,37,38,39)))
	<li class="slide"><a  @if($segment2 == 'testimonials') class="active" @endif  href="{{url('admin/testimonials')}}"><div class="curve"><div class="icon"><i class="fa fa-quote-left"></i></div></div> <span>Testimonials</span></a></li>
                                                                                @endif
                                                                                @if(have_premission(array(57,87,88)))
										<li class="slide"><a  @if($segment2 == 'subscribers') class="active" @endif  href="{{url('admin/subscribers')}}"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/seo.svg')}}"/></div></div> <span>Subscribers</span></a></li>
                                                                                @endif
                                                                                @if(have_premission(array(99,100,101,102)))
										<li class="slide"><a  @if($segment2 == 'help-articles') class="active" @endif  href="{{url('admin/help-articles')}}"><div class="curve"><div class="icon"><i class="fa fa-question-circle"></i></div></div> <span>Help Articles</span></a></li>
                                                                                @endif
                                                                           
      <li class="slide"><a  @if($segment2 == 'premium-build-requests') class="active" @endif  href="{{url('admin/premium-build-requests')}}"><div class="curve"><div class="icon"><i class="fa fa-umbrella"></i></div></div> <span>Premium Build's</span></a></li>			
								</ul>
									
							</div>	
						</div>				
					</div>
				</div>
			</section>
									
							
                </div>
                
        </div>
</div>
