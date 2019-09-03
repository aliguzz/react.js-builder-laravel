@extends('admin.layouts.app')
@section('content')
<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>Page Templates</a>
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
                        <span class="Headerlf_name">Page Templates</span>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                @include('admin.account_nav')
                <div class="col-md-8">
                    <div class="Inner_Content">
                        <h2 class="ui header">Manage Custom Page Templates</h2>
                        <div class="clear20"></div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="Page_Templates">
                                <ul class="pageListing_items">
                                    <li>
                                        <div class="media">
                                            <div class="media-left align-self-center">
                                                <img src="{{asset('builder/frontend/images/envelop.png')}}" alt="">
                                            </div>
                                            <div class="media-body">
                                                <h4>Agency | My Templates</h4>

                                                <p>last updated <span class="timeago" title="Fri, Jan 26 2018">Fri, Jan 26 2018</span></p>

                                            </div>
                                            <div class="media-right align-self-center mr_10">
                                                <h4>2<br>steps</h4>
                                            </div>
                                            <div class="media-right align-self-center">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="media-right align-self-center">
                                                <a class="btn btn-default btn-edit" href="#">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection