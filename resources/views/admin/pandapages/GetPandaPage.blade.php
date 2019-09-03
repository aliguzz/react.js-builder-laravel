@extends('admin.layouts.app')
@section('content')

<div class="clear80"></div>
<section>
    <div>        
        <div class="rt_getPanda row">
            <div class="col-md-6 col-sm-4 col-xs-12">
                <div class="ui grid">
                    <h2 class="ui header">{!!@$display_name!!} &nbsp;&nbsp;&nbsp;<div class="btn-group change-device-btn" style="display: inline;">
                        <button class="btn btn-info desktop-view-triger active"><i class="fa fa-desktop"></i></button>
                        <button class="btn btn-info mobile-view-triger"><i class="fa fa-mobile"></i></button>
                    </div>
                </h2>
                </div>
            </div>
           
            <div class="text-center col-md-3 col-sm-4 col-xs-12">
                <div class="GetPanda_btn">
                    <a class="btn" href="{{url('/admin/panda-pages/create')}}">Choose Another Template</a>
                </div>
            </div>

            <div class="text-center col-md-3 col-sm-4 col-xs-12">
                <div class="GetPanda_btn_green">
                    <a class="btn" href="{!!$create_project_link!!}">Select This Template</a>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="row desktop-view" style="opacity:0">
            <div class="col-md-12">
                <div class="inner" width="100%">
                    <iframe scrolling="yes" frameborder="0" width="101%" style="width:101%" height="100%" src="{!!$project_link!!}"></iframe>
                </div>
            </div>
        </div>
        <div class="row mobile-view" style="opacity:0">
            <div class="col-md-12">
                <div class="inner">
                    <iframe scrolling="yes" frameborder="0" height="100%"  src="{!!$project_link!!}?mobile=1"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(".desktop-view-triger").click(function(){
        $(".desktop-view-triger").addClass("active");
        $(".mobile-view-triger").removeClass("active");
        $(".mobile-view").hide();
        $(".desktop-view").show();
        $(".desktop-view iframe")[0].style.height = $( window ).height() + 'px';
       

    });
     $(".mobile-view-triger").click(function(){
        $(".desktop-view-triger").removeClass("active");
        $(".mobile-view-triger").addClass("active");
        $(".desktop-view").hide();
        $(".mobile-view").show();
        $(".mobile-view iframe")[0].style.height = $( window ).height() + 'px';
       
    });
</script>
<script>
    $('.desktop-view iframe').on('load',function(){
        setTimeout(function(){
            $(".mobile-view").css("opacity",1);
            $(".desktop-view").css("opacity",1);
            $(".mobile-view").hide();
            $(".desktop-view-triger").click();
        },1000);
    });
</script>
@endsection