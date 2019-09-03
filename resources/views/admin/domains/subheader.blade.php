@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
@endphp

<br/>
<br/>
<br/>

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
										@if(have_premission(array(50)))
											<li class="slide"><a data-toggle="tab"  class="active" href="#menu1"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/domain.svg')}}" /> </div></div> <span>Domains</span></a></li>
										@endif
										@if(have_premission(array(48)))
											<li class="slide"><a href="#menu10" data-toggle="tab"><div class="curve"><div class="icon"><i class="fa fa-plus"></i></div></div> <span>Add Domain</span></a></li>
										@endif
										
										@if(have_premission(array(53)))
										<li class="slide"><a data-toggle="tab" href="#menu5"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/settings-web.svg')}}"/></div></div> <span>Outgoing SMTP</span></a></li>
                                        @endif
										<li class="slide"><a href="{!!url('admin/dashboard')!!}"><div class="curve"><div class="icon"><i class="fa fa-arrow-circle-left" style="font-size:24px;color:#b71111"></i></div></div> <span>Go back</span></a></li>
									</ul>
									
								</div>							
						</div>				
					</div>
				</div>
			</section>
									
							
						</div>
						
					</div>
				</div>
