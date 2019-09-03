@extends('admin.layouts.app')
@section('content')
<link href="{{url('frontend/css/frontend.css')}}" rel="stylesheet"/>
<link href="{{url('frontend/css/spectrum.css')}}" rel="stylesheet"/>
<style>
    .left-nav-btn input[type=checkbox], input[type=radio]{ opacity:0;}
    .modal{z-index: 9999999999;}
</style>


<style type="text/css">
    td{
        width:50%;
    }
    
    td.socialmedias i{
        font-size: 225%;
        cursor:pointer;
    }
video {
    border-radius: 5px;
    box-shadow: 0px 0px 30px #ccc;
    width: 100%;
    height: auto;
}
    convas{
        height: 215px !important;
    }
    #signatureparent {
        color:darkblue;
        margin-left: -3%;
        /*      background-color:darkgrey;*/
        /*max-width:600px;*/
        padding:20px;
    }
    #signature {
        /*      border: 2px dotted black;*/
        background-color:#fbfbfb;
    }


    #signature input[type=button]{
        padding: 8px !important;
        background: white !important;
    }
    .postcodeLookup{
        width: 100px !important;
        position: absolute;
        right: 0;
        top: 0;
        border: 1px solid #58a71a !important;
        background: #58a71a;
        color: #fff !important;
        font-size: 16px !important;
        padding: 13px !important;
        text-transform: uppercase;
        transition: all 0.3s;
    }
    .postcodeLookup:hover,.postcodeLookup:after,.postcodeLookup:active,.btn-warning{
        box-shadow: none;
        background: #58a71a;
        color: #fff !important;
    }
    .postcodeLookup:disabled{
        box-shadow: none;
        background: #58a71a;
        color: #fff !important;
    }
    #address_list_modal .modal-content{
        background-color: #ffffff;
        max-height: 395px;
        overflow-y: auto;
        border-top: 5px solid #da0d15;
    }
    #address_list_modal .modal-content #address_list{
        border:1px solid #da0d15;
        padding:0 0 7px 0;
    }
    #address_list_modal .modal-content #address_list a{
        display: inline-block;
        width: 100%;
        border-bottom: 1px solid #da0d15;
        color: #000;
        text-indent: 10px;
        text-decoration: none;
        transition: all 0.5s;
    }
    #address_list_modal .modal-content #address_list a:hover{
        background: #da0d15;
        color: #fff;
    }
    #address_list_modal .modal-content #address_list a span{
        padding-bottom: 5px;
        margin-bottom: 5px;
        display: inline-block;
        padding-top: 7px;
    }
    @media(max-width:480px){
        .model_open .bottom-content-model label{font-size: 12px;}
    }
    /*    #signature div:nth-child(2) {
            margin-top: -0.5em !important;
    }*/
</style>
<!-----MAIN CONTENT------>
<style>
    .checkbox_cl{text-align: left;float: none !important;}
    .remember{float: left;margin-right: 20px;}
    .mrg_rt{margin-right: 0 !important;}
    .remember input[type="radio"]:not(:checked), [type="radio"]:checked {
        position: absolute;
        left: -9999px;
        opacity: 0;
    }
    .remember input[type="radio"]+label {
        position: relative;
        padding-left: 35px;
        cursor: pointer;
        display: inline-block;
        height: 25px;
        line-height: 25px;
        font-weight: 400;
        font-size: 15px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -ms-user-select: none;
        font-weight: normal;
    }
    .remember input[type="radio"].filled-in:checked+label:before {
        top: 0;
        left: 1px;
        width: 8px;
        height: 16px;
        border-top: 2px solid transparent;
        border-left: 2px solid transparent;
        border-right: 2px solid #fff;
        border-bottom: 2px solid #fff;
        -webkit-transform: rotateZ(37deg);
        transform: rotateZ(37deg);
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
    }
    .remember input[type="radio"].filled-in+label:before, .remember radio[type="radio"].filled-in+label:after {
        content: '';
        left: 0;
        position: absolute;
        transition: border .25s, background-color .25s, width .20s .1s, height .20s .1s, top .20s .1s, left .20s .1s;
        z-index: 1;
    }
    .remember input[type="radio"].filled-in:not(:checked)+label:after {
        height: 24px;
        width: 24px;
        background-color: transparent;
        border: 2px solid #000;
        top: 0px;
        z-index: 0;
    }
    .remember input[type="radio"].filled-in:checked+label:after {
        top: 0;
        width: 24px;
        height: 24px;
        border: 2px solid #58a71a;
        background-color: #58a71a;
        z-index: 0;
    }
    .remember input[type="radio"].filled-in+label:before, [type="radio"].filled-in+label:after {
        content: '';
        left: 0;
        position: absolute;
        transition: border .25s, background-color .25s, width .20s .1s, height .20s .1s, top .20s .1s, left .20s .1s;
        z-index: 1;
    }
    .remember input[type="radio"].filled-in+label:after {
        border-radius: 2px;
    }

    /******checkbox*****/
    .mrg_rt{margin-right: 0 !important;}
    .remember input[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
        position: absolute;
        left: -9999px;
        opacity: 0;
    }
    .remember input[type="checkbox"]+label {
        position: relative;
        padding-left: 35px;
        cursor: pointer;
        display: inline-block;
        height: 25px;
        line-height: 25px;
        font-weight: 400;
        font-size: 15px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -ms-user-select: none;
        font-weight: normal;
    }
    .remember input[type="checkbox"].filled-in:checked+label:before {
        top: 0;
        left: 1px;
        width: 8px;
        height: 16px;
        border-top: 2px solid transparent;
        border-left: 2px solid transparent;
        border-right: 2px solid #fff;
        border-bottom: 2px solid #fff;
        -webkit-transform: rotateZ(37deg);
        transform: rotateZ(37deg);
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
    }
    .remember input[type="checkbox"].filled-in+label:before, .remember input[type="checkbox"].filled-in+label:after {
        content: '';
        left: 0;
        position: absolute;
        transition: border .25s, background-color .25s, width .20s .1s, height .20s .1s, top .20s .1s, left .20s .1s;
        z-index: 1;
    }
    .remember input[type="checkbox"].filled-in:not(:checked)+label:after {
        height: 24px;
        width: 24px;
        background-color: transparent;
        border: 2px solid #000;
        top: 0px;
        z-index: 0;
    }
    .remember input[type="checkbox"].filled-in:checked+label:after {
        top: 0;
        width: 24px;
        height: 24px;
        border: 2px solid #58a71a;
        background-color: #58a71a;
        z-index: 0;
    }
    .remember input[type="checkbox"].filled-in+label:before, [type="checkbox"].filled-in+label:after {
        content: '';
        left: 0;
        position: absolute;
        transition: border .25s, background-color .25s, width .20s .1s, height .20s .1s, top .20s .1s, left .20s .1s;
        z-index: 1;
    }
    .remember input[type="checkbox"].filled-in+label:after {
        border-radius: 2px;
    }

    
    #loading {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 99999999999;
    width: 100%;
    height: 100%;
    background-color: rgba(255,255,255,0.8);
    background-image: url("{{url('assets/images/spinner.svg')}}");
    background-repeat: no-repeat;
    background-position: center;
}
.postcode_field{
    display:flex;
}

</style>
<script>
    function remove_btn(div_id)
    {
        div_id.hide();
        div_id.find('input[type=text]').val('');
        div_id.find('input[type=date]').val('');
        div_id.find('input[type=date]').prop('type', 'text');
    }
</script>


<div id="loading" style="display: none;"></div>
<section>
    <div class="left-panel-control" id="left-panel-open">
        <div id="site-menu">
            <div class="left-panel-top-head">Select Category</div>
            <div class="left-panel-scroll">
                <ul class="row left-nav-btn" id="options_ul">
                    <li id="options_li"><a href="#" class="freethemebtn freethemes"> Free Themes <i class="fas fa-angle-down"></i>
                        <ul class="">
                            @foreach($industries as $k=>$ind)
                                <li class="">
                                    <label for="industries{!!$ind->id!!}" class="btn btn-primary">
                                        <input style="margin-left: 10px;" type="checkbox" id="industries{!!$ind->id!!}" value="{!!$ind->id!!}" data-value="{!!$ind->title!!}" class="badgebox industries" name="industry"> {!!$ind->title!!}<span>{{$ind->count}} Themes</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </a>
                    </li>
                    <li class=""><a href="{{url('/admin/create-project/blank/0')}}" class="freethemebtn blankthemes"> Blank Template</a></li>
                    <li class=""><a href="javascript:void(0)" class="freethemebtn premiumcustombuild"> Premium Custom Build</a></li>
                    
                </ul>
            </div>
            <a class="fancy-btn btn-left-panel-btm" href="{{url('/admin/panda-pages/create')}}" title="">
                <svg class="fancy-btn-left" width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"/>
                </svg>
                Upgrade
                <svg class="fancy-btn-right" width="466" height="603" viewbox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0,0 L100,0 C15,50 50,100 0,100z"/>
                </svg>
            </a><!-- Fancy Button -->
        </div>
        <a href="#" class="toggle-nav btn btn-purple" style="float: right" id="big-sexy"><i class="fas fa-angle-right"></i></a>
    </div>
    
    <div class="right-panel premiumpanel" style="display:none; margin-top: -30px;">  
        <form id="msform" method="post" action="{{url('admin/premium-build')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
                   
                    
      <fieldset id="start_form">
          <h3 align="">Premium Custom Site Build Request Form</h3> 
          <p>Get a custom web site built by one of our developers from $99.00. Please complete the form below to submit your request and get a free quote:</p>


          <br>

          <h4 align="left" class="fs-subtitle">Step 1: Your Company Outline:</h4>

          <table class="table">
              <tbody>
                  <tr>
                      <td>Company Name</td>
                      <td><input required type="text" id="company_name" class="form-control" name="company_name" value="" placeholder="Comapny Name"></td>
                  </tr>
                  <tr>
                      <td>What service does your company provide?</td>
                      <td><input required type="text" id="company_service" class="form-control" name="company_service" value="" placeholder="Short Description of Service"></td>
                  </tr>
                  <tr>
                      <td>Company Logo<br><span style="font-size:12px;">(please provide a .png file with a transparent background)</span></td>
                      <td><input accept=".png" id="files" type="file" name="logo" ></td>
                  </tr>
                  <tr>
                      <td>Company Colour Theme<br><span style="font-size:12px;">(if you have colour codes please provide them, if not <br> then select the colours from our pallet below)</span></td>
                      <td><input required type="text" id="colour_codes" class="form-control" name="colour_codes" value="" placeholder="Colour Codes (+Multiple Codes)"><br> <input id="full" style="display: none;"></td>
              </tr>

              <tr>
                  <td>Desired Website Domain Name <br><span style="font-size:12px;">(Website Address)</span></td>
                  <td><input required type="text" id="website_address" class="form-control" name="website_address" value="" placeholder="ex:http://yourcompanyname.com"></td>
              </tr>
              </tbody>
          </table>
          <div class="clearfix"></div>
          <center><input type="button" name="next" style="width:50%; display: block; color:#fff;" class="next_3 first-set btn btn-success" value="Step 2: Contact Details →"/> </center>
      </fieldset>


      <fieldset id="second_form" style="display:none;">
          <h3 align="">Premium Custom Site Build Request Form</h3> <i style="cursor:pointer; position: absolute;top: 20px;left: 20px;font-size: 200%;color: red;" class="fas fa-arrow-alt-circle-left secondformback"></i>
          <p>Get a custom web site built by one of our developers from $99.00. Please complete the form below to submit your request and get a free quote:</p>


          <br>

          <h4 align="left" class="fs-subtitle">Step 2: Your Company Contact Details:</h4>

          <table class="table">
              <tbody>
                  <tr>
                      <td>Company Address</td>
                      <td><textarea id="company_address" class="form-control" name="company_address" placeholder="Comapny Address"></textarea></td>
                  </tr>

                  <tr>
                      <td>Comapny Phone Number <br><span style="font-size:12px;">(Add more than 1 separated by a comma if needed)</span></td>
                      <td><input required type="text" id="phone_number" class="form-control" name="phone_number" value="" placeholder="Company Phone Number"></td>
                  </tr>

                  <tr>
                      <td>Company Email Address <br><span style="font-size:12px;">(Add more than 1 separated by a comma if needed)</span></td>
                      <td><input required type="text" id="email_address" class="form-control" name="email_address" value="" placeholder="Company Email Address"></td>
                  </tr>
                  <tr>
                      <td>Company Social Media Accounts</td>
                      <td class="socialmedias"><i style="color: #1c0888;" data-toggle="modal" data-target="#facebooklink" class="fab fa-facebook-square"></i>
                          &nbsp; <i style="color: #d2b105;" data-toggle="modal" data-target="#instagramlink" class="fab fa-instagram"></i>
                          &nbsp; <i style="color: #00e0b9;" data-toggle="modal" data-target="#twitterlink" class="fab fa-twitter-square"></i>
                          &nbsp;  <i style="color: #e00000;" data-toggle="modal" data-target="#pinterestlink" class="fab fa-pinterest-square"></i>
                          &nbsp; <i style="color: #e00032;" data-toggle="modal" data-target="#youtubelink" class="fab fa-youtube-square"></i>
                          &nbsp; <i style="color: #4335f7;" data-toggle="modal" data-target="#linkedinlink" class="fab fa-linkedin"></i>
                          &nbsp; <i style="color: #f73535;" data-toggle="modal" data-target="#googlepluslink" class="fab fa-google-plus-g"></i></td>
                      
                     
              <div id="facebooklink" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Your Facebook Page link</h4>
                          </div>
                          <div class="modal-body">
                              <input type="text" name="facebook_link" value="" class="form-control" placeholder="https://www.facebook.com/myownpage etc.">
                          </div>
                      </div>
                  </div>
              </div>
              
              <div id="instagramlink" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Your Instagram link</h4>
                          </div>
                          <div class="modal-body">
                              <input type="text" name="instagram_link" value="" class="form-control" placeholder="https://www.instagram.com/myownpage etc.">
                          </div>
                      </div>
                  </div>
              </div>
              
              <div id="twitterlink" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Your Twitter link</h4>
                          </div>
                          <div class="modal-body">
                              <input type="text" name="twitter_link" value="" class="form-control" placeholder="https://www.twitter.com/myownpage etc.">
                          </div>
                      </div>
                  </div>
              </div>
              
              <div id="pinterestlink" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Your Pinterest link</h4>
                          </div>
                          <div class="modal-body">
                              <input type="text" name="pinterest_link" value="" class="form-control" placeholder="https://www.pinterest.com/myownpage etc.">
                          </div>
                      </div>
                  </div>
              </div>
              
              <div id="youtubelink" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Your Youtube link</h4>
                          </div>
                          <div class="modal-body">
                              <input type="text" name="youtube_link" value="" class="form-control" placeholder="https://www.youtube.com/myownpage etc.">
                          </div>
                      </div>
                  </div>
              </div>
              
              <div id="linkedinlink" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Your LinkedIn link</h4>
                          </div>
                          <div class="modal-body">
                              <input type="text" name="linkedin_link" value="" class="form-control" placeholder="https://www.linkedin.com/myownpage etc.">
                          </div>
                      </div>
                  </div>
              </div>
              
              <div id="googlepluslink" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Your Googleplus link</h4>
                          </div>
                          <div class="modal-body">
                              <input type="text" name="googleplus_link" value="" class="form-control" placeholder="https://plus.google.com/discover etc.">
                          </div>
                      </div>
                  </div>
              </div>
                      
                      
                  </tr>


              </tbody>
          </table>
          <div class="clearfix"></div>
          <center><input type="button" name="next" style="width:50%; display: block; color:#fff;" class="next_4 second-set btn btn-success" value="Step 3: Site Requirements →"/> </center>
      </fieldset>


      <fieldset id="third_form" style="display:none;">
          <h3 align="">Premium Custom Site Build Request Form</h3> 
          <i style="cursor:pointer; position: absolute;top: 20px;left: 20px;font-size: 200%;color: red;" class="fas fa-arrow-alt-circle-left thirdformback"></i>
          <p>Get a custom web site built by one of our developers from $99.00. Please complete the form below to submit your request and get a free quote:</p>


          <br>

          <h4 align="left" class="fs-subtitle">Step 3: Your Website Requirements:</h4>

          <table class="table">
              <tbody>
                  <tr>
                      <td>Website Purpose</td>
                      <td><textarea id="website_purpose" class="form-control" name="website_purpose" placeholder="Please outline the main purpose of your website. Example: blog, lead generation."></textarea></td>
                  </tr>

                  <tr>
                      <td>Number of Pages Required</td>
                      <td>
                          <select name="no_of_pages" class="form-control">
                              <option value="1-5">1-5</option>
                              <option value="6-10">6-10</option>
                              <option value="11-15">11-15</option>
                              <option value="16-20">16-20</option>
                              <option value="21-25">21-25</option>
                              <option value="more">more</option>
                          </select>
                      </td>
                  </tr>

                  <tr>
                      <td>Page Titles</td>
                      <td><textarea id="page_titles" class="form-control" name="page_titles" placeholder="Please list the page titles here (example: Home, About, Contact)"></textarea></td>
                  </tr>

                  <tr>
                      <td>Examples of websites you like <br><span style="font-size:12px;">(NOTE: We will not copy websites directly. Only use them <br>as a reference to the style, layout and design. We do not <br>condone directly copying  other websites directly in any way)</span></td>
                      <td><textarea id="website_list" class="form-control" name="website_list" placeholder="Website List"></textarea></td>
                  </tr>



              </tbody>
          </table>
          <div class="clearfix"></div>
          <center><input type="submit" name="submit" style="width:50%; display: block; color:#fff;" class="next_5 third-set btn btn-success" value="Submit Request Form →"/> </center>
      </fieldset>
                    
                </form>
    </div>
    <div class="right-panel topwebsitesections">
        <h2>Pick the website template you like</h2>
        <div class="row" id="myaallwebsitetemplates"></div>
    </div>
    
    
</section>

<div id="premiumCustomBuild" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Premium Custom Build</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="{!!url('admin/premium-build')!!}" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="site_name">Site Name:</label>
                    <input required type="text" id="site_name" class="form-control" name="site_name" value="" placeholder="Site Name">
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <label for="refrence_site">Reference Site:</label>
                    <input required type="text" id="reference_site" class="form-control" name="refrence_site" value="" placeholder="Refrence Site">
                </div>
            </div>
            <div class="clear10"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="business_name">Business Name:</label>
                    <input required type="text" id="business_name" class="form-control" name="business_name" value="" placeholder="Business Name">
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <label for="business_type">Business Type:</label>
                    <input required type="text" id="business_type" class="form-control" name="business_type" value="" placeholder="Business Type">
                </div>
            </div>
            <div class="clear10"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="business_address">Business Address:</label>
                    <input required type="text" id="business_address" class="form-control" name="business_address" value="" placeholder="Business Address">
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <label for="industory">Industory:</label>
                    <select type="text" id="industory" class="form-control" name="industory">
                    <option value="" selected="" hidden="" disabled="">Industry</option>
                    @foreach($industries as $k=>$ind)
                    <option value="{!!$ind->title!!}">{!!$ind->title!!}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="clear10"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="business_phone">Business Phone:</label>
                    <input required type="phone" id="business_phone" class="form-control" name="business_phone" value="" placeholder="Business Phone">
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <label for="business_email">Business Email:</label>
                    <input required type="email" id="business_email" class="form-control" name="business_email" value="" placeholder="Business Email">
                </div>
            </div>
            <div class="clear10"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="features">Select Features</label>
                    <br>
                    <label for="features1">
                        <input id="features1" type="checkbox" name="features[]" value="Lead Generation"> Lead Generation 
                    </label>
                    &nbsp;&nbsp;
                    <label for="features2">
                        <input id="features2" type="checkbox" name="features[]" value="Contact Form"> Contact Form
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="business_phone">Logo</label>
                    <br>
                    <input type="file" name="logo" >
                </div>
            </div>
            <div class="clear10"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="business_phone">Pages</label>
                    <br>
                    <label for="pages1">
                        <input id="pages1" type="checkbox" name="pages[]" value="About Us"> About Us 
                    </label>
                    &nbsp;&nbsp;
                    <label for="pages2">
                        <input id="pages2" type="checkbox" name="pages[]" value="Contact Us"> Contact Us
                    </label>
                    <label for="pages3">
                        <input id="pages3" type="checkbox" name="pages[]" value="Terms and Conditions"> Terms and Conditions
                    </label>
                    &nbsp;&nbsp;
                    <label for="pages4">
                        <input id="pages4" type="checkbox" name="pages[]" value="Privacy Policy"> Privacy Policy
                    </label>
                    &nbsp;&nbsp;
                    <label for="pages5">
                        <input id="pages5" type="checkbox" name="pages[]" value="Team"> Team
                    </label>
                    &nbsp;&nbsp;
                    <label for="pages6">
                        <input id="pages6" type="checkbox" name="pages[]" value="Services"> Services
                    </label>
                    &nbsp;&nbsp;
                    <label for="pages7">
                        <input id="pages7" type="checkbox" name="pages[]" value="FAQ's"> FAQ's
                    </label>
                </div>
            </div>
        
            <div class="clear10"></div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-default" style="float:right">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    
    $(document).ready(function(){
        $('.premiumcustombuild').click(function(){
            $('.topwebsitesections').hide();
            $('.premiumpanel').show();
        });
        $('.blankthemes, .freethemes').click(function(){
            $('.topwebsitesections').show();
            $('.premiumpanel').hide();
        });
        
        $('.secondformback').click(function(){
            $('#loading').show();
            $('#start_form').show();
            $('#second_form').hide();
            $('#third_form').hide();
            $('#loading').hide(1000);
        });
        $('.thirdformback').click(function(){
            $('#loading').show();
            $('#start_form').hide();
            $('#second_form').show();
            $('#third_form').hide();
            $('#loading').hide(1000);
        });
       
    });
    
    
    
    
        $(".next_3").click(function () {
            $('#loading').show();
            company_name = $('#company_name').val();
            company_service = $('#company_service').val();
            colour_codes = $('#colour_codes').val();
            website_address = $('#website_address').val();
            //alert(company_name);
            if(company_name === '' || company_service === '' || colour_codes === '' || website_address === ''){
                swal({
                    title: "Please fill All the required fields to proceed to step 2",
                    type: "error"
                });
                $('#loading').hide(1000);
                throw new Error();
            }
                $('#start_form').hide();
                $('#second_form').show();
                $('#loading').hide(1000);
        });
        
        $(".next_4").click(function () {
            $('#loading').show();
            company_address = $('#company_address').val();
            phone_number = $('#phone_number').val();
            email_address = $('#email_address').val();
             if(company_address === '' || phone_number === '' || email_address === ''){
                swal({
                    title: "Please fill All the required fields to proceed to step 3",
                    type: "error"
                });
                $('#loading').hide(1000);
                throw new Error();
            }
                $('#start_form').hide();
                $('#second_form').hide();
                $('#third_form').show();
            $('#loading').hide(1000);
        });
    
    
    
    $("form").submit(function (e) {
        
        var ref = $(this).find("[required]");
        $(ref).each(function () {
            if ($(this).val() == '')
            {
                alert("Please fill in all the fields.");
                $(this).focus();
                e.preventDefault();
                return false;
            }
        });
        return true;
    });
    
    
    
    
    $("#full").spectrum({
    color: "#ECC",
    showInput: true,
    className: "full-spectrum",
    showInitial: true,
    showPalette: true,
    showSelectionPalette: true,
    maxSelectionSize: 10,
    preferredFormat: "hex",
    localStorageKey: "spectrum.demo",
    move: function (color) {
        
    },
    show: function () {
    
    },
    beforeShow: function () {
    
    },
    hide: function () {
    
    },
    change: function() {
        if($('#colour_codes').val() === ''){
            $('#colour_codes').val($(this).val());
        }else{
            values = $('#colour_codes').val();
            $('#colour_codes').val(values+' ,'+$(this).val());
        }
      
    },
    palette: [
        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
    ]
});
    
    
    
    
    
    
    
    
    
    var industry_id = 0;
    var category_id = 0;
    var featured_value = 0;
    var theme = '';
    $(document).on('change', ".industries", function () {
        $('ul.left-nav-btn label.btn-primary').css('background-color', '#fff');
        $('ul.left-nav-btn label.btn-primary').css('color', '#000');
        $("#step1_create_site").toggle('slide');
        $(this).parent().css('background-color', '#0056b3');
        $(this).parent().css('color', '#fff');
        $("#step2_create_site").delay(500).toggle('slide');
        industry_id = $(this).val();
        $.ajax({
            url: site_url + "/admin/get_industry_templates",
            type: 'post',
            data: {'industry_id': industry_id, '_token': CSRF_TOKEN, 'start': 0},
            success: function (data) {
                console.log(data);
                $("#myaallwebsitetemplates").html(data);
                $("#mycontentarea").css('position', 'relative');
                $("#mycontentarea").css('top', 0);
                $(".clear80").hide();
            }
        });

    });
    $(document).on('click', ".lets_go", function () {
        $("#step2_create_site").toggle('slide');
        $("#step4_create_site").delay(500).toggle('slide');
        $("#mycontentarea").css('position', 'absolute');
        $("#mycontentarea").css('top', "70px");
        $(".clear80").show();
        $.ajax({
            url: site_url + "/admin/get_industry_categories",
            type: 'post',
            data: {'industry_id': industry_id, '_token': CSRF_TOKEN},
            success: function (data) {
                $("#categories_based_on_industries").html(data);
                setTimeout(function () {
                    $("#category_id").select2();
                }, 500);
            }
        });
    });
    $(document).on("click", ".load_more_temp", function () {
        $.ajax({
            url: site_url + "/admin/get_industry_templates",
            type: 'post',
            data: {'industry_id': industry_id, '_token': CSRF_TOKEN, 'start': $(this).attr('data-start')},
            success: function (data) {
                console.log(data);
                $(".should_remove").remove();
                $("#templates_based_on_industries").append(data);
            }
        });
    });
    $(document).on("change", "#category_id", function () {
        $("#categories_based_on_industries").append('<div class="clear30 should_remove"></div><div class="col-md-12 text-center"><button type="button" class="btn btn-primary next_from_cat"> Next > </button></div>');
        category_id = $(this).val();
        $("#category_selected").html($("#category_id option:selected").text());
    });
    $(document).on('click', ".next_from_cat", function () {
        $("#step4_create_site").toggle('slide');
        $("#step5_create_site").delay(500).toggle('slide');
    });
    $(document).on('change', ".featurebox", function () {
        if ($(".featurebox:checked").length) {
            $(".next_from_feature").show();
            featured_value = $('.featurebox:checked').map(function () {
                return $(this).val();
            }).get().join();
        } else {
            $(".next_from_feature").hide();
        }
    });
    $(document).on("click", ".next_from_feature", function () {
        $("#step5_create_site").toggle('slide');
        $("#step6_create_site").delay(500).toggle('slide');
    });
    $(document).on('keyup', ".business_name", function () {
        if ($(".business_name").val() != '') {
            $("#business_name").html($(".business_name").val());
            $(".next_from_business_name").show();
        } else {
            $(".next_from_business_name").hide();
        }
    });
    $(document).on("click", ".next_from_business_name", function () {
        $("#step6_create_site").toggle('slide');
        $("#step7_create_site").delay(500).toggle('slide');
    });
    $(document).on('keyup', ".business_location", function () {
        if ($(".business_location").val() != '') {
            $("#business_location").html($(".business_location").val());
            $(".next_from_business_location").show();
        } else {
            $(".next_from_business_location").hide();
        }
    });
    $(document).on("click", ".next_from_business_location", function () {
        $("#step7_create_site").toggle('slide');
        $("#step8_create_site").delay(500).toggle('slide');
    });
    $(document).on("click", ".next_from_review", function () {
        $("#step8_create_site").toggle('slide');
        $("#step9_create_site").delay(500).toggle('slide');
    });
    $(document).on("click", ".next_from_clever", function () {
        $("#step9_create_site").toggle('slide');
        $("#step10_create_site").delay(500).toggle('slide');
        $.ajax({
            url: site_url + "/admin/get_themes",
            type: 'POST',
            data: {'_token': CSRF_TOKEN, 'start': 0},
            success: function (data) {
                $(".should_remove").remove();
                $("#themes_selection_area").append(data);
                $("#mycontentarea").css('position', 'relative');
                $("#mycontentarea").css('top', 0);
                $(".clear80").hide();
            }
        });
    });
    $(document).on("click", ".load_more_themes", function () {
        $.ajax({
            url: site_url + "/admin/get_themes",
            type: 'post',
            data: {'_token': CSRF_TOKEN, 'start': $(this).attr('data-start')},
            success: function (data) {
                $(".should_remove").remove();
                $("#themes_selection_area").append(data);
            }
        });
    });
    $(document).on("click", ".select-theme", function () {
        $("#step10_create_site").toggle('slide');
        $("#step11_create_site").delay(500).toggle('slide');
        $("#mycontentarea").css('position', 'absolute');
        $("#mycontentarea").css('top', "70px");
        $(".clear80").show();
        theme = $(this).attr('data-value');
    });
    $(document).on("click", ".next_from_create_my_site", function () {
        $("#step11_create_site").toggle('slide');
        $("#step12_create_site").delay(500).toggle('slide');
        setTimeout(function () {
            $(".progress-bar").css('width', "10%");
            $(".progress-bar").html("10% starting..");
            setTimeout(function () {
                $(".progress-bar").css('width', "20%");
                $(".progress-bar").html("20% searching by industry.");
            }, 300);
        }, 300);
        $.ajax({
            url: site_url + "/admin/build_site",
            type: 'post',
            data: {'industry_id': industry_id, '_token': CSRF_TOKEN, 'category_id': category_id, 'featured_value': featured_value, 'business_name': $(".business_name").val(), 'business_location': $(".business_location").val(), 'theme': theme},
            success: function (data) {
                if (data != '0') {
                    setTimeout(function () {
                        $(".progress-bar").css('width', "30%");
                        $(".progress-bar").html("30% searching by business.");
                        setTimeout(function () {
                            $(".progress-bar").css('width', "50%");
                            $(".progress-bar").html("50% setting up features.");
                            setTimeout(function () {
                                $(".progress-bar").css('width', "70%");
                                $(".progress-bar").html("70% setting up theme.");
                                setTimeout(function () {
                                    $(".progress-bar").css('width', "90%");
                                    $(".progress-bar").html("90% customizing.");
                                    setTimeout(function () {
                                        $(".progress-bar").css('width', "100%");
                                        $(".progress-bar").html("100% complete.");
                                        window.location.href = data;
                                    }, 800);
                                }, 800);
                            }, 800);
                        }, 800);
                    }, 800);
                } else {
                    $("#step12_create_site").toggle('slide');
                    $("#step1_create_site").delay(500).toggle('slide');
                    $("#not_found_option").show();
                }
            }
        });
    });
    $(document).ready(function(){
        setTimeout(function(){
            $(".industries:eq(0)").click();
        },500);
    }); 
    $(document).on('click','#options_li',  function(){
        $(this).find('ul li').toggle();
    });
</script>


@endsection
