@extends('admin.layouts.app')

@section('content')
<!-- Validation -->
<script src="{{ asset('public/js/plugins/validation/jquery.validate.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('public/css/plugins/select2/select2.css') }}">
<script src="{{ asset('public/js/plugins/select2/select2.min.js')}}"></script>

<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>My Account Details </a>
            </li>
        </ul>
        <div class="close-bread">
            <a href="#"><i class="icon-remove"></i></a>
        </div>
    </div>
</div>
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            <div class="left-navigation">
                <div class="menulinks-back">
                    <div class="mn_head_lf">
                        <i class="fa fa-cogs Headerlf_icon"></i>
                        <span class="Headerlf_name">Account Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('admin.account_nav')
                <div class="col-md-8">
                    <div class="clear20"></div>
                    <ul class="tabs tabs-inline tabs-top">
                        <li class="@if((isset($_GET['action']) && $_GET['action'] == 'clickfunnelssubdomain') || (!isset($_GET['action']))) active @endif">
                            <a href="#ClickFunnelsSubdomain" data-toggle='tab'><i class="icon-user"></i>  Subdomain</a>
                        </li>
                        <li class="@if(isset($_GET['action']) && $_GET['action'] == 'TimezoneandLanguageSettings') active @endif">
                            <a href="#TimezoneandLanguageSettings" data-toggle='tab'><i class="icon-lock"></i> Timezone and Language Settings</a>
                        </li>
                        <li class="@if(isset($_GET['action']) && $_GET['action'] == 'wordpressapikey') active @endif">
                            <a href="#wordpressapikey-tab" data-toggle='tab'><i class="fa fa-key"></i> Wordpress API</a>
                        </li>

                    </ul>
                    <div class="tab-content padding tab-content-inline tab-content-bottom">
                        <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'clickfunnelssubdomain'  || (!isset($_GET['action']))) active @endif" id="ClickFunnelsSubdomain">
                            <form id="profile-form" method="POST" action="{{url("/admin/update-clickfunneldomain")}}" class="form-horizontal form-validate" novalidate="novalidate" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-sm-12">


                                        <div class="form-group">
                                            <label for="email" class="col-sm-4 control-label">Edit subdomain</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input type="text" class='form-control nvcbb' name="user_sub_domain" id="user_sub_domain" data-rule-required="true" aria-required="true"  onkeyup="validSubdomain()" value="{!!@$user_sub_domain!!}"><span class="input-group-addon">.controlpanda.com</span></div>
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

                        <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'TimezoneandLanguageSettings') active @endif" id="TimezoneandLanguageSettings">
                            <form id="password-form" method="POST" action="{{url("/admin/update-timezonelocale")}}" class="form-horizontal form-validate" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="user_time_zone" class="col-sm-4 control-label">Time Zone</label>
                                    <div class="col-sm-8">
                                        <select name="user_time_zone" id="user_time_zone" required="" class='select2-me form-control'>
                                            <option value="American Samoa">(GMT-11:00) American Samoa</option>
                                            <option value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                            <option value="Midway Island">(GMT-11:00) Midway Island</option>
                                            <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                            <option value="Alaska">(GMT-09:00) Alaska</option>
                                            <option value="America/Los_Angeles">(GMT-08:00) America/Los_Angeles</option>
                                            <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                            <option value="Tijuana">(GMT-08:00) Tijuana</option>
                                            <option value="America/Boise">(GMT-07:00) America/Boise</option>
                                            <option value="America/Denver">(GMT-07:00) America/Denver</option>
                                            <option value="Arizona">(GMT-07:00) Arizona</option>
                                            <option value="Chihuahua">(GMT-07:00) Chihuahua</option>
                                            <option value="Mazatlan">(GMT-07:00) Mazatlan</option>
                                            <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                            <option value="America/Chicago">(GMT-06:00) America/Chicago</option>
                                            <option value="Central America">(GMT-06:00) Central America</option>
                                            <option value="Central Time (US &amp; Canada)">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                            <option value="Guadalajara">(GMT-06:00) Guadalajara</option>
                                            <option value="Mexico City">(GMT-06:00) Mexico City</option>
                                            <option value="Monterrey">(GMT-06:00) Monterrey</option>
                                            <option value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                            <option value="America/Detroit">(GMT-05:00) America/Detroit</option>
                                            <option value="America/New_York">(GMT-05:00) America/New_York</option>
                                            <option value="Bogota">(GMT-05:00) Bogota</option>
                                            <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                            <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                            <option value="Lima">(GMT-05:00) Lima</option>
                                            <option value="Quito">(GMT-05:00) Quito</option>
                                            <option value="Atlantic Time (Canada)">(GMT-04:00) Atlantic Time (Canada)</option>
                                            <option value="Caracas">(GMT-04:00) Caracas</option>
                                            <option value="Georgetown">(GMT-04:00) Georgetown</option>
                                            <option value="La Paz">(GMT-04:00) La Paz</option>
                                            <option value="Santiago">(GMT-04:00) Santiago</option>
                                            <option value="Newfoundland">(GMT-03:30) Newfoundland</option>
                                            <option value="Brasilia">(GMT-03:00) Brasilia</option>
                                            <option value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                                            <option value="Greenland">(GMT-03:00) Greenland</option>
                                            <option value="Montevideo">(GMT-03:00) Montevideo</option>
                                            <option value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                                            <option value="Azores">(GMT-01:00) Azores</option>
                                            <option value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                                            <option value="Casablanca">(GMT+00:00) Casablanca</option>
                                            <option value="Dublin">(GMT+00:00) Dublin</option>
                                            <option value="Edinburgh">(GMT+00:00) Edinburgh</option>
                                            <option value="Lisbon">(GMT+00:00) Lisbon</option>
                                            <option value="London">(GMT+00:00) London</option>
                                            <option value="Monrovia">(GMT+00:00) Monrovia</option>
                                            <option value="UTC">(GMT+00:00) UTC</option>
                                            <option value="Amsterdam">(GMT+01:00) Amsterdam</option>
                                            <option value="Belgrade">(GMT+01:00) Belgrade</option>
                                            <option value="Berlin">(GMT+01:00) Berlin</option>
                                            <option value="Bern">(GMT+01:00) Bern</option>
                                            <option value="Bratislava">(GMT+01:00) Bratislava</option>
                                            <option value="Brussels">(GMT+01:00) Brussels</option>
                                            <option value="Budapest">(GMT+01:00) Budapest</option>
                                            <option value="Copenhagen">(GMT+01:00) Copenhagen</option>
                                            <option value="Ljubljana">(GMT+01:00) Ljubljana</option>
                                            <option value="Madrid">(GMT+01:00) Madrid</option>
                                            <option value="Paris">(GMT+01:00) Paris</option>
                                            <option value="Prague">(GMT+01:00) Prague</option>
                                            <option value="Rome">(GMT+01:00) Rome</option>
                                            <option value="Sarajevo">(GMT+01:00) Sarajevo</option>
                                            <option value="Skopje">(GMT+01:00) Skopje</option>
                                            <option value="Stockholm">(GMT+01:00) Stockholm</option>
                                            <option value="Vienna">(GMT+01:00) Vienna</option>
                                            <option value="Warsaw">(GMT+01:00) Warsaw</option>
                                            <option value="West Central Africa">(GMT+01:00) West Central Africa</option>
                                            <option value="Zagreb">(GMT+01:00) Zagreb</option>
                                            <option value="Athens">(GMT+02:00) Athens</option>
                                            <option value="Bucharest">(GMT+02:00) Bucharest</option>
                                            <option value="Cairo">(GMT+02:00) Cairo</option>
                                            <option value="Harare">(GMT+02:00) Harare</option>
                                            <option value="Helsinki">(GMT+02:00) Helsinki</option>
                                            <option value="Jerusalem">(GMT+02:00) Jerusalem</option>
                                            <option value="Kaliningrad">(GMT+02:00) Kaliningrad</option>
                                            <option value="Kyiv">(GMT+02:00) Kyiv</option>
                                            <option value="Pretoria">(GMT+02:00) Pretoria</option>
                                            <option value="Riga">(GMT+02:00) Riga</option>
                                            <option value="Sofia">(GMT+02:00) Sofia</option>
                                            <option value="Tallinn">(GMT+02:00) Tallinn</option>
                                            <option value="Vilnius">(GMT+02:00) Vilnius</option>
                                            <option value="Baghdad">(GMT+03:00) Baghdad</option>
                                            <option value="Istanbul">(GMT+03:00) Istanbul</option>
                                            <option value="Kuwait">(GMT+03:00) Kuwait</option>
                                            <option value="Minsk">(GMT+03:00) Minsk</option>
                                            <option value="Moscow">(GMT+03:00) Moscow</option>
                                            <option value="Nairobi">(GMT+03:00) Nairobi</option>
                                            <option value="Riyadh">(GMT+03:00) Riyadh</option>
                                            <option value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                                            <option value="Volgograd">(GMT+03:00) Volgograd</option>
                                            <option value="Tehran">(GMT+03:30) Tehran</option>
                                            <option value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                                            <option value="Baku">(GMT+04:00) Baku</option>
                                            <option value="Muscat">(GMT+04:00) Muscat</option>
                                            <option value="Samara">(GMT+04:00) Samara</option>
                                            <option value="Tbilisi">(GMT+04:00) Tbilisi</option>
                                            <option value="Yerevan">(GMT+04:00) Yerevan</option>
                                            <option value="Kabul">(GMT+04:30) Kabul</option>
                                            <option value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                            <option value="Islamabad">(GMT+05:00) Islamabad</option>
                                            <option value="Karachi">(GMT+05:00) Karachi</option>
                                            <option value="Tashkent">(GMT+05:00) Tashkent</option>
                                            <option value="Chennai">(GMT+05:30) Chennai</option>
                                            <option value="Kolkata">(GMT+05:30) Kolkata</option>
                                            <option value="Mumbai">(GMT+05:30) Mumbai</option>
                                            <option value="New Delhi">(GMT+05:30) New Delhi</option>
                                            <option value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                                            <option value="Kathmandu">(GMT+05:45) Kathmandu</option>
                                            <option value="Almaty">(GMT+06:00) Almaty</option>
                                            <option value="Astana">(GMT+06:00) Astana</option>
                                            <option value="Dhaka">(GMT+06:00) Dhaka</option>
                                            <option value="Urumqi">(GMT+06:00) Urumqi</option>
                                            <option value="Rangoon">(GMT+06:30) Rangoon</option>
                                            <option value="Bangkok">(GMT+07:00) Bangkok</option>
                                            <option value="Hanoi">(GMT+07:00) Hanoi</option>
                                            <option value="Jakarta">(GMT+07:00) Jakarta</option>
                                            <option value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                            <option value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                                            <option value="Beijing">(GMT+08:00) Beijing</option>
                                            <option value="Chongqing">(GMT+08:00) Chongqing</option>
                                            <option value="Hong Kong">(GMT+08:00) Hong Kong</option>
                                            <option value="Irkutsk">(GMT+08:00) Irkutsk</option>
                                            <option value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                            <option value="Perth">(GMT+08:00) Perth</option>
                                            <option value="Singapore">(GMT+08:00) Singapore</option>
                                            <option value="Taipei">(GMT+08:00) Taipei</option>
                                            <option value="Ulaanbaatar">(GMT+08:00) Ulaanbaatar</option>
                                            <option value="Osaka">(GMT+09:00) Osaka</option>
                                            <option value="Sapporo">(GMT+09:00) Sapporo</option>
                                            <option value="Seoul">(GMT+09:00) Seoul</option>
                                            <option value="Tokyo">(GMT+09:00) Tokyo</option>
                                            <option value="Yakutsk">(GMT+09:00) Yakutsk</option>
                                            <option value="Adelaide">(GMT+09:30) Adelaide</option>
                                            <option value="Darwin">(GMT+09:30) Darwin</option>
                                            <option value="Brisbane">(GMT+10:00) Brisbane</option>
                                            <option value="Canberra">(GMT+10:00) Canberra</option>
                                            <option value="Guam">(GMT+10:00) Guam</option>
                                            <option value="Hobart">(GMT+10:00) Hobart</option>
                                            <option value="Melbourne">(GMT+10:00) Melbourne</option>
                                            <option value="Port Moresby">(GMT+10:00) Port Moresby</option>
                                            <option value="Sydney">(GMT+10:00) Sydney</option>
                                            <option value="Vladivostok">(GMT+10:00) Vladivostok</option>
                                            <option value="Magadan">(GMT+11:00) Magadan</option>
                                            <option value="New Caledonia">(GMT+11:00) New Caledonia</option>
                                            <option value="Solomon Is.">(GMT+11:00) Solomon Is.</option>
                                            <option value="Srednekolymsk">(GMT+11:00) Srednekolymsk</option>
                                            <option value="Auckland">(GMT+12:00) Auckland</option>
                                            <option value="Fiji">(GMT+12:00) Fiji</option>
                                            <option value="Kamchatka">(GMT+12:00) Kamchatka</option>
                                            <option value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                                            <option value="Wellington">(GMT+12:00) Wellington</option>
                                            <option value="Chatham Is.">(GMT+12:45) Chatham Is.</option>
                                            <option value="Nuku&#39;alofa">(GMT+13:00) Nuku&#39;alofa</option>
                                            <option value="Samoa">(GMT+13:00) Samoa</option>
                                            <option value="Tokelau Is.">(GMT+13:00) Tokelau Is.</option>
                                        </select>
                                    </div>
                                </div>

                                <script>
                                    $('#user_time_zone').val('{!! @$user_time_zone; !!}');
                                </script>


                                <div class="form-group">
                                    <label for="user_locale" class="col-sm-4 control-label">User Locale</label>
                                    <div class="col-sm-8">
                                        <select name="user_locale" id="user_locale" required="" class='select2-me form-control'>

                                            <option value="en">en</option>
                                            <option value="de">de</option>
                                            <option value="nl">nl</option>
                                            <option value="es">es</option>
                                            <option value="zh">zh</option>
                                            <option value="fr">fr</option>
                                            <option value="ro">ro</option>
                                            <option value="hu">hu</option>
                                            <option value="cs">cs</option>
                                            <option value="tr">tr</option>
                                            <option value="ja">ja</option>
                                            <option value="lo">lo</option>
                                            <option value="es-AR">es-AR</option>
                                            <option value="pt">pt</option>
                                            <option value="hr">hr</option>
                                            <option value="es-EC">es-EC</option>
                                            <option value="hi">hi</option>
                                            <option value="tl">tl</option>
                                            <option value="ug">ug</option>
                                            <option value="da">da</option>
                                            <option value="uz">uz</option>
                                            <option value="es-MX">es-MX</option>
                                            <option value="mk">mk</option>
                                            <option value="ca">ca</option>
                                            <option value="eo">eo</option>
                                            <option value="sr">sr</option>
                                            <option value="th">th</option>
                                            <option value="pa">pa</option>
                                            <option value="ne">ne</option>
                                            <option value="uk">uk</option>
                                            <option value="af">af</option>
                                            <option value="es-PE">es-PE</option>
                                            <option value="es-CO">es-CO</option>
                                            <option value="de-CH">de-CH</option>
                                            <option value="it">it</option>
                                            <option value="sw">sw</option>
                                            <option value="is">is</option>
                                            <option value="zh-CN">zh-CN</option>
                                            <option value="es-419">es-419</option>
                                            <option value="gl">gl</option>
                                            <option value="et">et</option>
                                            <option value="fr-CA">fr-CA</option>
                                            <option value="pl">pl</option>
                                            <option value="de-AT">de-AT</option>
                                            <option value="es-CR">es-CR</option>
                                            <option value="sv">sv</option>
                                            <option value="or">or</option>
                                            <option value="fr-CH">fr-CH</option>
                                            <option value="eu">eu</option>
                                            <option value="tt">tt</option>
                                            <option value="mr-IN">mr-IN</option>
                                            <option value="lt">lt</option>
                                            <option value="en-CA">en-CA</option>
                                            <option value="sk">sk</option>
                                            <option value="rm">rm</option>
                                            <option value="lb">lb</option>
                                            <option value="en-GB">en-GB</option>
                                            <option value="en-AU">en-AU</option>
                                            <option value="nn">nn</option>
                                            <option value="fa">fa</option>
                                            <option value="ar">ar</option>
                                            <option value="es-VE">es-VE</option>
                                            <option value="pt-BR">pt-BR</option>
                                            <option value="ur">ur</option>
                                            <option value="it-CH">it-CH</option>
                                            <option value="be">be</option>
                                            <option value="en-IN">en-IN</option>
                                            <option value="ms">ms</option>
                                            <option value="bg">bg</option>
                                            <option value="nb">nb</option>
                                            <option value="ko">ko</option>
                                            <option value="bn">bn</option>
                                            <option value="es-US">es-US</option>
                                            <option value="ru">ru</option>
                                            <option value="en-ZA">en-ZA</option>
                                            <option value="hi-IN">hi-IN</option>
                                            <option value="bs">bs</option>
                                            <option value="fi">fi</option>
                                            <option value="kn">kn</option>
                                            <option value="vi">vi</option>
                                            <option value="en-NZ">en-NZ</option>
                                            <option value="sl">sl</option>
                                            <option value="zh-TW">zh-TW</option>
                                            <option value="id">id</option>
                                            <option value="zh-YUE">zh-YUE</option>
                                            <option value="en-IE">en-IE</option>
                                            <option value="es-PA">es-PA</option>
                                            <option value="cy">cy</option>
                                            <option value="km">km</option>
                                            <option value="el">el</option>
                                            <option value="wo">wo</option>
                                            <option value="es-CL">es-CL</option>
                                            <option value="mn">mn</option>
                                            <option value="lv">lv</option>
                                            <option value="he">he</option>
                                            <option value="en-US">en-US</option>
                                            <option value="ta">ta</option>
                                            <option value="az">az</option>
                                            <option value="zh-HK">zh-HK</option>
                                            <option value="pt-PT">pt-PT</option>
                                            <option value="sv-SE">sv-SE</option>

                                        </select>
                                    </div>
                                </div>

                                <script>
                                    $('#user_locale').val('{!! @$user_locale !!}');
                                </script>

                                <div class="form-actions text-right" style="padding: 0 0 20px;">
                                    <input type="submit" class='btn btn-primary' value="Save">
                                    <input type="reset" class='btn' value="Discard changes">
                                </div>
                            </form>
                        </div>



                        <div class="tab-pane @if(isset($_GET['action']) && $_GET['action'] == 'wordpressapikey') active @endif" id="wordpressapikey-tab">
                            <form id="auth-form" method="POST" action="{{url("/admin/update-wordpressapikey")}}" class="form-horizontal form-validate" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="unique_code" class="col-sm-3 control-label">WordPress API key</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="wordpress_api_key" name="wordpress_api_key" class='form-control' placeholder="Please enter wordpress API key" data-rule-minlength="20" data-rule-required="true" aria-required="true" value="{!!@$user_wordpress_api_key!!}"/>
                                    </div>

                                </div>
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



    function validSubdomain() {
        var re = /[^a-zA-Z0-9\-]/;
        var vals = document.getElementById("user_sub_domain").value;
        if (re.test(vals)) {
            alert("only Alphabets, Numbers and Hyphens(-) are allowed");
            $('#user_sub_domain').val(vals.substr(0, vals.length - 1));
        }
    }


</script>
@endsection

