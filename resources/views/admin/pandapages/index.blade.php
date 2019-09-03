@extends('admin.layouts.app')
@section('content')
<style>
html{ overflow-y:auto !important;}
</style>
<section>
    <div id="slider-wrap">
        <div class="container">
                <div class="caption-heading">
            <img src="{{asset('assets/images/lcd.png')}}">
        </div>
            <h2>Websites</h2>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="main-container mt-0">
            <div class="clearfix mt-20 mb-20"><span class="mb-10 ft-big">Your Websites</span> 
                @if(have_premission(array(107)))
                    <a href="{{url('admin/upgrade-account')}}">
                        <button type="btn" class="btn btn-primary res-bt">Upgrade</button>
                    </a>
                @endif
            </div>
            <div class="scroll-horizontal-1">
                <div class="row scroll-horizontal-1">
                    <ul class="scrollmenu mb-20">
                        @if(isset($Projects) && count(array($Projects)) > 0 && isset($Projects[0]->id) )
                            @foreach($Projects as $pro)
                            <li>
                                <div class="home-img-as">
                                    <img src="{!! asset('storage/projects/'.$user_id.'/'.$pro->uuid.'/thumbnail.png') !!}" alt="" class="img-fluid">
                                    <div class="footer-img-home">
                                        <div class="img-mane">{!!$pro->template!!} | {!!$pro->t_cat_name!!}</div>
                                        <div class="page-number">last updated <span class="timeago" title="Fri, Jan 26 2018">{{{ $date = time_ago($pro->updated_at) }}}</span></div>
                                    </div>
                                    <div class="overlay1">
                                        <a target="_blank" href="{!!url('sites/'.$pro->name)!!}">
                                            <div class="text"><span><img src="{{asset('assets/images/vision-icon.png')}}" class="svg-tool"></span> <i>Preview</i></div>
                                        </a>
                                    </div>
                                    <div class="overlay">
                                        @if(have_premission(array(3)))
                                        <a href="{!!url('admin/panda-pages/'.$pro->id.'/edit')!!}">
                                            <div class="text"><span><img src="{{asset('assets/images/setting.svg')}}" class="svg-tool"></span> <i>Edit Site</i></div>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        @else
                        <li>
                            <div class="home-create-as">
                                <div class="site-create create">
                                    <a  class="btn-create btn-primary" href="{{asset('admin/panda-pages/create')}}"><i class="fas fa-plus-circle"></i> Create a new site </a>
                                </div>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                <nav class="pull-right">{!! $Projects->render() !!}</nav>
            </div>
        </div>
    </div>
</section>
<div class="row" style="height: 200px; "></div>

@endsection
