@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
@endphp
@php 
    $urisegment = @$_GET['ref'];
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
											<img src="{{ asset('storage/projects/'.$user_id.'/'.$ProjectData->uuid.'/thumbnail.png') }}" alt="" />
										</div>
									</div>
									<div class="flex-item-2">
										<ul class="info-list">
											<li>
												<strong>Site Name : </strong> <span>{!!ucfirst($ProjectData->template)!!} | {!!$ProjectData->t_cat_name!!}</span>									
											</li>
											<li>
												<strong>Domain : </strong> <span>{!!$ProjectData->domain_names!!}</span>									
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
                                            <input type="hidden" id="linkofsite" value="{!!url('sites/'.$ProjectData->name)!!}">
											<li><a href="#" onclick="myFunction1()" title=""><span><img src="{{asset('frontend/images/clipboard.svg')}}"  /> </span> Copy URL to clipboard</a></li>
                                            <li><a href="{!!url('sites/'.$ProjectData->name)!!}" target="_blank" title=""><span><img src="{{asset('frontend/images/url-panda.svg')}}"  /></span> Visit Live Website</a></li>
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
									@if(have_premission(array(9)))
										<li class="slide"><a target="_blank" href="{!!url('builder/'.$ProjectData->id)!!}"><div class="curve"><div class="icon"><i class="fa fa-edit"></i></div></div> <span>Edit Website</span></a></li>
									@endif
									@if(have_premission(array(4)))
<!--										<li class="slide"><a id="mneu1" data-toggle="tab" @if($segment2 != 'contacts'&& $segment2 == '') class="active" @endif  href="#menu1"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/domain.svg')}}" /> </div></div> <span>Domain</span></a></li>-->
									@endif
									@if(have_premission(array(5)))
										<li class="slide"><a data-toggle="tab" id="mneu2" @if($urisegment == 'menu2' || $urisegment == '') class="active" @endif href="#menu2"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/rename-site.svg')}}" /></div></div> <span>Rename Site</span></a></li>
									@endif
									@if(have_premission(array(6)))
										<li class="slide"><a data-toggle="tab" id="mneu3" href="#menu3"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/duplicate-site.svg')}}" /></div></div> <span>Duplicate Site</span></a></li>
									@endif
									@if(have_premission(array(11)))    
										<li class="slide"><a class="" data-toggle="tab" href="#menu4"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/statistics.svg')}}" /></div></div> <span>Statistics</span></a></li>
									@endif
									@if(have_premission(array(12)))    
										<li class="slide"><a data-toggle="tab" @if($segment2 == 'contacts') class="active" @endif href="#menu9"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/contacts.svg')}}" /></div></div> <span>Contacts</span></a></li>	
									@endif
									@if(have_premission(array(14)))    
										<li class="slide"><a data-toggle="tab" href="#menu5" @if($urisegment == 'menu5setting-tab-1' || $urisegment == 'menu5setting-tab-3' || $urisegment == 'menu5setting-tab-4') class="active show" @endif><div class="curve"><div class="icon"><img src="{{asset('frontend/images/settings-web.svg')}}"/></div></div> <span>Settings</span></a></li>
									@endif
									@if(have_premission(array(15)))    
										<li class="slide"><a data-toggle="tab" href="#menu6"><div class="curve"><div class="icon"><img src="{{asset('frontend/images/seo.svg')}}"/></div></div> <span>SEO</span></a></li>
									@endif
									@if(have_premission(array(8)))
										<li class="slide"><a class="delete-website-btn" href="javascript:void(0);" class="pd-0"><div class="curve pd-0"><div class="trash"><i class="far fa-trash-alt"></i></div></div> <span>Delete Site</span></a></li>
									@endif										
								</ul>
							</div>							
						</div>				
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

  <script>  
  function myFunction1() {
  var copyText = document.getElementById("linkofsite").value;
         const el = document.createElement('textarea');
        el.value = copyText;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
  swal({
            title: "Success!",
            text: "Coppied to clipboard successfully!",
            icon: "success",
            showConfirmButton: false,
            buttons: false,
            timer: 3000
          });
  
}

$('.delete-website-btn').click(function () {
        var link = "{!!url('api/delete-site/'.$ProjectData->id)!!}";
        swal({
            title: "Are you sure?",
            text: "You want to delete the website!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: true
        },
		function (isConfirm) {
			if (isConfirm) {
				window.location.href = link;
			}
		});
    });

	//  $(document).ready(function(){
    //     var timestamp = '<?php echo Session::get('act') ?>';
    //     if(timestamp == 'rename'){
	// 		$('#menu2').addClass('active');
	// 		$('#menu2').addClass('show');
	// 		$('#menu1').removeClass('active');
	// 		$('#menu1').removeClass('show');
			
	// 	}else if(timestamp == 'duplicate'){
	// 		$('#menu3').addClass('active');
	// 		$('#menu3').addClass('show');
	// 		$('#menu1').removeClass('active');
	// 		$('#menu1').removeClass('show');
	// 	}
    // });
  </script>