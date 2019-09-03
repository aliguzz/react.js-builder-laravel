@extends('admin.layouts.app')
@section('content')
<div class="contentarea">
    <div class="container-fluid">
        <div class="mn_segment">
            <div class="row">
                <h1 class="ui_header text-center">{!!$template_category->title!!}</h1><br>
                <div class="col-md-6">
                    <div class="recipe-header-row">                        
                        <div class="three_column">
                            <div class="column">
                                <div class="icon_left">
                                    <img src="{{asset('frontend/images/filter-logo.png')}}">
                                </div>
                                <div class="text">
                                    <span>TYPE</span>
                                    <h4 class="data">{!!$template_category->type!!}</h4>
                                </div>
                            </div>
                            <div class="column">
                                <div class="icon_left">
                                    <i class="fa fa-files-o"></i>
                                </div>
                                <div class="text">
                                    <span>PAGES</span>
                                    <h4 class="data">{!!$template_category->pages!!}</h4>
                                </div>
                            </div>
                            <div class="column mr_0">
                                <div class="icon_left">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="text">
                                    <span>TIME</span>
                                    <h4 class="data">{!!$template_category->timeItext!!}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video_decription">
                        <h4>Directions</h4>
                        {!!$template_category->directions!!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video">
                        <iframe width="100%" height="315" src="{!!$template_category->video_link!!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="cookbook-step-header">
            <div class="step-number">
                Step 1 of 2
            </div>
            <div class="step-description">
                Select a template.
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#all"> All</a></li>
            <li><a data-toggle="tab" href="#free"> Free</a></li>
            <li><a data-toggle="tab" href="#premium"> Premium</a></li>
        </ul>
        <div class="clear20"></div>
        <div class="tab-content">
            <div id="all" class="tab-pane fade in active">
                <div class="row">
                    @foreach($templates as $temp)
                    <div class="mn_tmp_wrap clearfix">    
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-9">
                                    <a href="{!!url('admin/panda-pages/'.$temp->id.'/'.$template_category->id.'/get-pandapage')!!}" class="">
                                        <div class="tmp_img tmp_box">
                                            <img src="{!!asset('builder/'.$temp->thumbnail)!!}">
                                        </div>
                                    </a>     
                                    <div class="tmp_box_head clearfix">
                                        <a href="{!!url('admin/panda-pages/'.$temp->id.'/'.$template_category->id.'/get-pandapage')!!}" class=""><span>{!!$temp->name!!}</span></a>
                                        <div class="template_descrip">
                                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="box1">
                                        <span>@if($temp->price <= 0) free @else ${!!$temp->price!!}@endif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    @endforeach
                </div>
            </div>
            <div id="free" class="tab-pane fade">
                <div class="row">
                    @foreach($templates_free as $temp)
                    <div class="mn_tmp_wrap clearfix">    
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-9">
                                    <a href="{!!url('admin/panda-pages/'.$temp->id.'/'.$template_category->id.'/get-pandapage')!!}" class="">
                                        <div class="tmp_img tmp_box">
                                            <img src="{!!asset('builder/'.$temp->thumbnail)!!}">
                                        </div>   
                                    </a>
                                    <div class="tmp_box_head clearfix">
                                        <a href="{!!url('admin/panda-pages/'.$temp->id.'/'.$template_category->id.'/get-pandapage')!!}" class="">
                                            <span>{!!$temp->name!!}</span>
                                        </a>
                                        <div class="template_descrip">
                                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="box1">
                                        <span>@if($temp->price <= 0) free @else ${!!$temp->price!!}@endif</span> 
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="premium" class="tab-pane fade">
                <div class="row">
                    @foreach($templates_paid as $temp)
                    <div class="mn_tmp_wrap clearfix">    
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-9">
                                    <a href="{!!url('admin/panda-pages/'.$temp->id.'/'.$template_category->id.'/get-pandapage')!!}" class="">
                                        <div class="tmp_img tmp_box">
                                            <img src="{!!asset('builder/'.$temp->thumbnail)!!}">
                                        </div>
                                    </a>     
                                    <div class="tmp_box_head clearfix">
                                        <a href="{!!url('admin/panda-pages/'.$temp->id.'/'.$template_category->id.'/get-pandapage')!!}" class=""><span>{!!$temp->name!!}</span></a>
                                        <div class="template_descrip">
                                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="box1">
                                        <span>@if($temp->price <= 0) free @else ${!!$temp->price!!}@endif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection