<?php
    if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
        if(strpos($_SERVER['HTTP_HOST'], 'controlpanda') !== false)
        {
            $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $redirect);
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta itemprop="name" content="ControlPanda">
        <meta itemprop="image" content="{{URL::to('public/frontend/img/meta_img.png')}}">
        <meta itemprop="description" name="description" content="ControlPanda">
        <meta name="keywords" content="ControlPanda">
        <meta name="author" content="ArhamSoft (Pvt) Ltd - https://www.arhamsoft.com">
        <link rel="icon" href="{{ asset('frontend/images/fav.png')}}" type="image/png" sizes="16x16">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'ControlPanda') }}</title>

        <!-- LATEST CSS FILES START -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/infinite-slider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/domain-page.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-toggle.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pricetable.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/email-page.css') }}" />
         
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" media="screen" />
        <link rel="stylesheet" href="{{url('assets/css/jquery.tag-editor.css')}}">
        <!-- LATEST CSS FILES END -->

        <!-- LATEST JS FILES START -->
<!--        <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<!--        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>-->
        <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/js/slick.js') }}" type="text/javascript"></script> 
<!--        <script src="{{ asset('assets/js/jquery-1.8.3.min.js') }}" type="text/javascript"></script> -->
        
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.cs.js') }}" type="text/javascript"></script> 
        <!-- LATEST JS FILES END -->

        <link href="{{asset('frontend/css/bootstrap-dropdownhover.min.css')}}" rel="stylesheet">
<!--        <link href="{{asset('frontend/css/after-login.css')}}" rel="stylesheet" media="screen">-->
<!--        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/eakroko.min.js') }}"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script>var site_url = "{!!url('/')!!}"; var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');</script>
        <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
        <script src="{{ asset('assets/js/jquery.tag-editor.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/js/jquery.caret.min.js') }}" type="text/javascript"></script> 
        
<!--<script type="text/javascript" src="{{url('frontend/js/frontend.js')}}"></script> -->
<script src="{{url('frontend/js/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/js/spectrum.js')}}"></script> 
        <style>
html{ overflow-y:auto !important;}
</style>
    </head>
    <body class="home-bg">
        @include('admin.sections.header')
        @include('sweet::alert')
        
        @yield('content')
        
        @include('admin.sections.footer')
         <?php 
        // echo"Farhan"; 
            // if(check_package()){
            //     echo"Ali"; 
            //     return redirect('upgrade-account');
            //     exit;
            // } 
        ?> 
        <script src="{{ asset('frontend/js/bootstrap-dropdownhover.js')}}"></script>
        <script type="text/javascript">
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
$(document).on('mouseover', '.dropdown-submenu', function (e) {
    $(this).addClass('open');
});
$(".dropdown-submenu").mouseenter(function () {
    $(this).addClass("open");
}).mouseleave(function () {
    $(this).removeClass("open");
});

// LATEST JAVASCRIPT CODE //
$(function () {
    $('.toggle-nav').click(function () {
        // Calling a function in case you want to expand upon this.
        toggleNav();
        $(this).toggleClass("toggle-position");
    });
});


$(function () {
    $('.pagination').addClass('mt-15');
    $('.pagination').children('li').addClass('page-item');
    $('.pagination').children('li').children('span').addClass('page-link');
    $('.pagination').children('li').children('a').addClass('page-link');
});


/*========================================
 =            CUSTOM FUNCTIONS            =
 ========================================*/
function toggleNav() {
    if ($('#site-menu').hasClass('show-nav')) {
        // Do things on Nav Close
        $('#site-menu').removeClass('show-nav');
    } else {
        // Do things on Nav Open
        $('#site-menu').addClass('show-nav');
    }
}


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('close');
            }
        }
    }
}



        </script>
        
        
        
        <script type="text/javascript">
		$(document).ready(function(){
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

<script type="text/javascript">
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script> 


<script>
    	$(function() {
  
// Dropdown toggle
$('.dropdown-toggle').click(function(){
  $(this).next('.dropdown').toggle();
});

$(document).click(function(e) {
  var target = e.target;
  if (!$(target).is('.dropdown-toggle') && !$(target).parents().is('.dropdown-toggle')) {
   // $('.dropdown').close();
  }
});

});

   
     
$(document).on('click', '#export_leads', function () {
    $("#ui-block-loader").show();
    var search_data = {'date_period': $("#SelectDatePeriod").val(), 'search_keyword': $("#search_keyword").val(), '_token': CSRF_TOKEN};
    $.ajax({
        url: site_url + "/admin/contact-export",
        type: 'post',
        data: search_data,
        success: function (data) {
            $("#go-download").attr('href', data);
            $("#go-download").get(0).click();
            $("#ui-block-loader").hide();
        }
    });
});




    </script>
    <!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5tZnrZzKRzg8bp3xGI7a1ztCUHpwSUKI";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
        
    </body>
</html>