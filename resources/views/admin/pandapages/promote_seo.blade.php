@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
<style>
    .form-btn{ height: 50px; border-radius: 10px; border:1px solid #9e9e9e;}
</style>
<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">


        <div class="container-fluid">
            <section class="inner-full-width-panel" style="padding-right:0px; margin-top: 40px;">					
                <div class="tab-content">



                    <div class="tab-pane active in">
                        <form action="{{url('admin/panda-pages/promote-seo-submit')}}" method="post">

                            <input type="hidden" name="project_id" value="{{$project_id}}">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            {{ csrf_field() }}
                            <div class=" right-content right-content-space">

                                <div class="editor-setting-heading">
                                    <h3>Settings <strong>(Make any changes to your site info, keywords and more right here.)</strong></h3>
                                </div>
                                <div class="settings-info">
                                    <div class="pro-box">
                                        <p>Business or Site Name</p>
                                        <input type="text" name="site_name" class="btn-fild" placeholder="eg; Happy Life Hacks" value="{{@$site_seo_settings->site_name}}" required="" style="border-radius: 10px; margin-bottom: 0px; line-height: 50px; height: 50px; background-color: #fff; color: #000; border: solid 1px #9e9e9e; width: 80%; padding: 5px 20px;">

                                    </div>
                                    <div class="pro-box">
                                        <p>Location</p>
                                        <input type="text" style="border-radius: 10px; margin-bottom: 0px; line-height: 50px; height: 50px; background-color: #fff; color: #000; border: solid 1px #9e9e9e; width: 80%; padding: 5px 20px;" name="address" id="autocomplete" onFocus="geolocate()" class="btn-fild" placeholder="Fill in your local address, city or country" value="{{@$site_seo_settings->address}}">

                                        <span>Skip if you don't have a location</span>
                                    </div>
                                </div>
                                <div class="editor-setting-heading">
                                    <h3>Meta SEO Settings</h3>
                                </div>
                                <div class="settings-info">
                                    @foreach($paged as $key=>$page)
                                    <div class="pro-box">
                                        <h5>Seo Settings for {{$page['name'].'.html'}}</h5>
                                        <input type="hidden" name="page_name[]" value="{{$page['name']}}"/>
                                        <div class="row">
                                        <div class="col-md-6">
                                        <label for>Page title</label>
                                            <input type="text" name="title[]" id="title" class="btn-fild" placeholder="Add Title" required=""  value="{{@$page['tc']->title}}" style="border-radius: 10px; margin-bottom: 0px; line-height: 50px; height: 50px; background-color: #fff; color: #000; border: solid 1px #9e9e9e; width: 100%; padding: 5px 20px;">                                        
                                        </div>
                                        
                                        <div class="col-md-6">
                                        <label for>Keywords</label>
                                            <input type="text" name="keywords[]" id="keywords{{@$key}}" class=" btn-fild form" placeholder="+ Add Keyword" style="height:52px; border-color:#ab0000; color:#ab0000;" required=""  value="{{@$page['tc']->keywords}}">
                                        <span>Add at least one meta keyword</span>
                                        </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                        <label for>Description</label>
                                        <textarea name="description[]" id="description" placeholder="Add description" required="" rows="5" style="border-radius: 10px; margin-bottom: 0px; line-height: 25px; height: 50px; background-color: #fff; color: #000; border: solid 1px #9e9e9e; width: 100%; padding: 5px 20px;">{{@$page['tc']->description}}</textarea>                                        
                                        </div>
                                        <script>
                                        
                                        
                                    $(document).ready(function () {
                                        var keywordsarray = [];
                                        $('#keywords{{@$key}}').tagEditor({
//            initialTags: ['Hello', 'World'],
                                            sortable: true,
                                            delimiter: ',', /* space and comma */
                                            placeholder: '+ Add Keyword'
                                        });

                                        $("ul.tag-editor").on('change', function () {
                                            keywordsarray = [];
                                            $('ul.tag-editor li div.tag-editor-tag').each(function () {

                                                keywordsarray.push($(this).text());
                                            });
                                            $("#finalkeywords").val(keywordsarray);

                                        });

                                    });
                                        
                                        </script>
                                    </div>
                                    @endforeach
                                </div>
                                <script>

                                    $(document).ready(function () {

                                        var url = site_url + '/storage/projects/{!!$user_id!!}/{!!$ProjectData->uuid!!}/robot.txt';
                                        //                                            console.log(url);
                                        $.get(url).done(function () {
                                            $("#switch-sm").prop("checked", true);
                                        }).fail(function () {
                                            $("#switch-sm").prop("checked", false);
                                        });


                                        $("#switch-sm").change(function () {
                                            var _token = $('meta[name="csrf-token"]').attr('content');
                                            if ($("#switch-sm").prop("checked") === true) {
                                                $("#loading").show();
                                                var valuess = $("#switch-sm").prop("checked");
                                                $.ajax({
                                                    url: site_url + "/admin/panda-pages/panda-seo-satus",
                                                    type: 'POST',
                                                    data: {'project_id': '{!!$ProjectData->id!!}', 'seo_status': valuess, _token: _token},
                                                    success: function (data) {
                                                        $("#loading").hide();
                                                        swal({
                                                            title: "Seo enabled Successfully",
                                                            type: "success",
                                                            timer: 2000
                                                        });
                                                    }
                                                });
                                            } else {

                                                $("#loading").show();
                                                var valuess = $("#switch-sm").prop("checked");
                                                $.ajax({
                                                    url: site_url + "/admin/panda-pages/panda-seo-satus",
                                                    type: 'POST',
                                                    data: {'project_id': '{!!$ProjectData->id!!}', 'seo_status': valuess, _token: _token},
                                                    success: function (data) {
                                                        $("#loading").hide();
                                                        swal({
                                                            title: "Seo disabled Successfully",
                                                            type: "error",
                                                            timer: 2000
                                                        });
                                                    }
                                                });

                                            }
                                        });
                                    });

                                </script>


                                <div class="jumbotron-1">Allow Google to include your site in search results
                                    <span class="switch switch-sm float-right">
                                        <input type="checkbox" name="seoswitch" class="switch" id="switch-sm" value="">
                                        <label for="switch-sm" class="switch-toggle" data-on="On" data-off="Off"></label></span>
                                </div>

                                <div class="btn-group">
                                    <button type="submit" style="background-color:#733ca6;" class="btn btn-info">Save</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </section>
        </div>	




    </section>
</div>




<!-- Replace the value of the key parameter with your own API key. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKiLu9iyDIb38CNhkJjp-c0MFXhIJdfSk&libraries=places&callback=initAutocomplete"
async defer></script>

<script>


// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                                    var placeSearch, autocomplete;
                                    var componentForm = {
                                        street_number: 'short_name',
                                        route: 'long_name',
                                        locality: 'long_name',
                                        administrative_area_level_1: 'short_name',
                                        country: 'long_name',
                                        postal_code: 'short_name'
                                    };

                                    function initAutocomplete() {
                                        // Create the autocomplete object, restricting the search to geographical
                                        // location types.
                                        autocomplete = new google.maps.places.Autocomplete(
                                                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                                {types: ['geocode']});

                                        // When the user selects an address from the dropdown, populate the address
                                        // fields in the form.
                                        autocomplete.addListener('place_changed', fillInAddress);
                                    }

                                    function fillInAddress() {
                                        // Get the place details from the autocomplete object.
                                        var place = autocomplete.getPlace();

                                        for (var component in componentForm) {
                                            document.getElementById(component).value = '';
                                            document.getElementById(component).disabled = false;
                                        }

                                        // Get each component of the address from the place details
                                        // and fill the corresponding field on the form.
                                        for (var i = 0; i < place.address_components.length; i++) {
                                            var addressType = place.address_components[i].types[0];
                                            if (componentForm[addressType]) {
                                                var val = place.address_components[i][componentForm[addressType]];
                                                document.getElementById(addressType).value = val;
                                            }
                                        }
                                    }

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
                                    function geolocate() {
                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(function (position) {
                                                var geolocation = {
                                                    lat: position.coords.latitude,
                                                    lng: position.coords.longitude
                                                };
                                                var circle = new google.maps.Circle({
                                                    center: geolocation,
                                                    radius: position.coords.accuracy
                                                });
                                                autocomplete.setBounds(circle.getBounds());
                                            });
                                        }
                                    }


                                       


</script>








@endsection