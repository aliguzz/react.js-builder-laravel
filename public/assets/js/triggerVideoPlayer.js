var mapOptions = {
    "bluehalf": {
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400),
        styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
    },
    "hhcbredhalf": {
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400), 
        styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2e0f0f"},{"lightness":17}]}]
    },
    "nightvisionhalf": {
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400),
        styles: [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":"-9"},{"lightness":"0"},{"visibility":"simplified"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"weight":"1.00"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"weight":"0.49"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"},{"weight":"0.01"},{"lightness":"-7"},{"saturation":"-35"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"}]}]
    },
    "naturehalf":{
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400),
        styles: [{"featureType":"landscape","stylers":[{"hue":"#FFA800"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#53FF00"},{				"saturation":-73},{"lightness":40},{"gamma":1}]	},{"featureType":"road.arterial","stylers":[{"hue":"#FBFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local",		"stylers":[{"hue":"#00FFFD"},{"saturation":0},{"lightness":30},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00BFFF"},{"saturation":6},{"lightness":8},{"gamma":1}]},{		"featureType":"poi","stylers":[{"hue":"#679714"},{"saturation":33.4},{"lightness":-25.4},{"gamma":1}]}]
    },
    "oldtimelyhalf":{
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400),
        styles: [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-77}]},{"featureType":"road"}]
    },
    "shadesofgreyhalf":{
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400), // New York
        styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
    }, 
    "lightgreybluefull":{
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400),
        styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
    },
    "mondrianfull":{
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400), 
        styles: [{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#0F0919"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#E4F7F7"}]},{"elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#002FA7"}]},{"featureType":"poi.attraction","elementType":"geometry.fill","stylers":[{"color":"#E60003"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#FBFCF4"}]},{"featureType":"poi.business","elementType":"geometry.fill","stylers":[{"color":"#FFED00"}]},{"featureType":"poi.government","elementType":"geometry.fill","stylers":[{"color":"#D41C1D"}]},{"featureType":"poi.school","elementType":"geometry.fill","stylers":[{"color":"#BF0000"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"saturation":-100}]}]
    },
    "propiafull":{
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400), 
        styles: [{"featureType":"landscape","stylers":[{"visibility":"simplified"},{"color":"#2b3f57"},{"weight":0.1}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"hue":"#ff0000"},{"weight":0.4},{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"weight":1.3},{"color":"#FFFFFF"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f55f77"},{"weight":3}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#f55f77"},{"weight":1.1}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#f55f77"},{"weight":0.4}]},{},{"featureType":"road.highway","elementType":"labels","stylers":[{"weight":0.8},{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"color":"#ffffff"},{"weight":0.7}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"color":"#6c5b7b"}]},{"featureType":"water","stylers":[{"color":"#f3b191"}]},{"featureType":"transit.line","stylers":[{"visibility":"on"}]}]
    },
    "simplelabelsfull":{
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400), 
        styles: [{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.text","stylers":[{"visibility":"off"}]}]
    },
    "vitaminfull":{
        zoom: 11,
        center: new google.maps.LatLng(40.6700, -73.9400),
        styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#004358"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#1f8a70"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#1f8a70"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#fd7400"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#1f8a70"},{"lightness":-20}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#1f8a70"},{"lightness":-17}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"},{"weight":0.9}]},{"elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#1f8a70"},{"lightness":-10}]},{},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#1f8a70"},{"weight":0.7}]}]
    }
}

function trigerMap(mapElement, mapstyle, currentIncrementalValue, lat=40.6700, lng=-73.9400)
{
    setTimeout(function()
    {
        var map = new google.maps.Map(mapElement, mapOptions[mapstyle]);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map: map,
            title: 'Snazzy!'
        });
        map.setCenter({lat:lat, lng:lng});
        var addedMapElement = $('.componentUniqueAttribute'+(currentIncrementalValue));
        setTimeout(function()
        {
            addedMapElement.append('<div class="elementWrapper" style="width:'+addedMapElement.width()+'px;height:'+addedMapElement.height()+'px;z-index:9999999999999999999;position: absolute;top: 0;"></div>');
        },2000);
    })
}

function pandaMusicPlayerTrigger()
{
    console.log("trigger all players")
    var player = irubataru.tinyPlayer.createPlayerFromTags();
}
function pandaAllMusicPlayerTrigger()
{
    $('div.iru-tiny-player').remove();
    var player = irubataru.tinyPlayer.createPlayerFromTags();
}

function pandaMusicTriggerTheme()
{
    $('.cpandaaudioplayer').musicPlayer(
    {
        //volume: 10,
        //elements: ['artwork', 'controls', 'progress', 'time', 'volume'],
        //playerAbovePlaylist: false,
        onLoad: function()
        {
            //Add Audio player
            plElem  = "<div class='pl'></div>";
            $('.cpandaaudioplayer').find('.player').append(plElem);
            // show playlist
            $('.pl').click(function (e)
            {
                e.preventDefault();
                $('.cpandaaudioplayer').find('.playlist').toggleClass("hidden");
            });
        },
    });
}

function pandaVideoTriggerOwl()
{
    console.log('owl carousal');
    var bigimage = document.getElementById("big");
    console.log("bigimage");
    console.log(bigimage);
    var thumbs = document.getElementById("thumbs");
    //var totalslides = 10;
    var syncedSecondary = true;

    bigimage
        .owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav:false,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: [
        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
        ]
    })
        .on("changed.owl.carousel", syncPosition);

    thumbs
        .on("initialized.owl.carousel", function() {
        thumbs
        .find(".owl-item")
        .eq(0)
        .addClass("current");
    })
        .owlCarousel({
        items: 4,
        dots: false,
        nav: true,
        margin:10,
        navText: [
        '<i class="fa fa-arrow-left" aria-hidden="true"></i> Prev',
        'Next <i class="fa fa-arrow-right" aria-hidden="true"></i>'
        ],
        smartSpeed: 200,
        slideSpeed: 500,
        slideBy: 4,
        responsiveRefreshRate: 100
    })
        .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        //if loop is set to false, then you have to uncomment the next line
        //var current = el.item.index;

        //to disable loop, comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

        if (current < 0) {
        current = count;
        }
        if (current > count) {
        current = 0;
        }
        //to this
        thumbs
        .find(".owl-item")
        .removeClass("current")
        .eq(current)
        .addClass("current");
        var onscreen = thumbs.find(".owl-item.active").length - 1;
        var start = thumbs
        .find(".owl-item.active")
        .first()
        .index();
        var end = thumbs
        .find(".owl-item.active")
        .last()
        .index();

        if (current > end) {
        thumbs.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
        thumbs.data("owl.carousel").to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
        var number = el.item.index;
        bigimage.data("owl.carousel").to(number, 100, true);
        }
    }

    thumbs.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        bigimage.data("owl.carousel").to(number, 300, true);
    });
}

function pandaVideoJsTrigger(elementId)
{
    var myPlayer = videojs(elementId);
}

function pandaVideoTrigger()
{
    console.log("going to call the function");
    var allElements = document.getElementsByClassName('cpandavideosliders')
    Array.prototype.forEach.call(allElements, function(element)
    {
        console.log('allElements[i].id');
        console.log(element.id);
        var nsOptions = {
            sliderId: element.id,
            transitionType: "fade",
            autoAdvance: true,
            rewind: true,
            delay: "default",
            transitionSpeed: 2000,
            aspectRatio: "2:1", // "?:100%" is for responsive scaling based on window height
            initSliderByCallingInitFunc: false,
            shuffle: false,
            startSlideIndex: 0, //0-based
            navigateByTap: false,
            pauseOnHover: false,
            keyboardNav: true,
            before: null,
            license: "mylicense"
        };
        var nslider = new NinjaSlider(nsOptions);
        var allInnerElementNodes = $('#'+element.id+' .slider-inner').childNodes;
        // allInnerElementNodes[3].className="cpandavideosliders-pager";
        // allInnerElementNodes[4].className="cpandavideosliders-prev";
        // allInnerElementNodes[5].className="cpandavideosliders-next";
        // allInnerElementNodes[6].className="cpandavideosliders-pause-play";
    })
}
function trigerAllMaps(mapElement, mapstyle, lat=40.6700, lng=-73.9400)
{
    var map = new google.maps.Map(mapElement, mapOptions[mapstyle]);
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lng),
        map: map,
        title: 'Snazzy!'
    });
    map.setCenter({lat:lat, lng:lng});
}
$(document).ready(function()
{
    $('[lightbox="1"]').hide();
    $('[openonpageload="1"]').show();
    setTimeout(function()
    {
        $('[mapelement="1"]').each(function(element)
        {
            trigerAllMaps($(this)[0], $(this).attr('maptype'))
        });
        pandaAllMusicPlayerTrigger();
        pandaMusicTriggerTheme();
    },3000);
});
$(document).on('click','body',function(event){
    if(!$(event.target).closest('[lightbox="1"]').length && !$(event.target).closest('.lightbox-trigger').length) {
        $('[lightbox="1"]').hide();
    }   
});