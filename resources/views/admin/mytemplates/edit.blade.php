
@extends('admin.layouts.app')
@section('content')

<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            <div class="left-navigation">
                <div class="menulinks-back">
                    <div class="mn_head_lf pull-left">
                        <i class="fa fa-cog Headerlf_icon"></i>
                        <span class="Headerlf_name">JASON | Lead Magnet Panda</span>
                    </div>
                    <div class="Header_url pull-left">
                        <span class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-link"></i>
                            </div>
                            <div class="input-group-addon">
                                <a class="copy_URL" data-toggle="tooltip" href="#" title="Copy URL to Clipboard">
                                    <i class="fa fa-copy"></i>
                                </a>
                            </div>
                            <div class="input-group-addon">
                                <a data-toggle="tooltip" href="" target="_blank" title="Visit Live Website">
                                    <i class="fa fa-external-link"></i>
                                </a>
                            </div>
                            <div class="input-group-addon">
                                <a class="" data-toggle="tooltip" href="#" title="What is the Panda URL?">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                            </div>
                        </span>
                    </div>

                    <div class="Header_action_item pull-right">
                        <a class="show_ContactsActive" href="#"><span class="fa fa-bars"></span>Steps</a>
                        <a class="" href="{!!url('admin/panda-pages/'.@$ProjectData->id.'/stats')!!}"><span class="fa fa-bar-chart"></span>Stats</a>
                        <a class="" href="{!!url('admin/panda-pages/'.@$ProjectData->id.'/contacts')!!}"><span class="fa fa-users"></span>Contacts</a>
                        <a class="" href="{!!url('admin/panda-pages/'.@$ProjectData->id.'/settings')!!}"><span class="fa fa-gear"></span>Settings</a>
                    </div>
                    <div class="clearfix"></div>
                    <ul>
                        <li>
                            <div class="icon"><i class="fa fa-check-square-o"></i></div>
                            <a href="{!!url('admin/panda-pages/'.@$ProjectData->id.'/checklist')!!}"> Launch Checklist</a></li>
                        <li class="active">
                            <div class="icon"><i class="fa fa-bars"></i></div>
                            <a href="#"> Panda Steps</a></li>
                        <li class="optional_link">
                            <div class="icon"><i class="fa fa-envelope-o"></i></div>
                            <a href="#"> Lead Magnet <span>(optin)</span></a></li>
                        <li class="optional_link">
                            <div class="icon"><i class="fa fa-download"></i></div>
                            <a href="#"> Thank you Page</a></li>
                        <div class="text-center add_nw_step">
                            <a href="#"><i class="fa fa-plus"></i> add new step</a>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="right-contentarea">
                <div class="header2 clearfix">
                    <h2 class="pull-left">Lead Magnet</h2>
                     <div class="Header_action_item pull-right">
                        <a class="show_ContactsActive" href="#"><span class="fa fa-th-large"></span>Overview</a>
                        <a class="" href="{!!url('admin/panda-pages/'.$ProjectData->id.'/automation')!!}"><span class="fa fa-flash"></span>Automation</a>
                        <a class="" href="{!!url('admin/panda-pages/'.$ProjectData->id.'/publishing')!!}"><span class="fa fa-wrench"></span>Publishing</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="inner-content clearfix">
                    <div class="col-sm-12">
                        <div class="input-group Traffic_InputBlock">
                            <span class="input-group-addon" style="border-right:0px;">
                                <a href="#" data-toggle="tooltip" title="Edit Panda Step Settings">
                                    <span class="fa fa-gear"></span>
                                </a>
                            </span>
                            <span class="form-control edit-url">https://umair-afzal.clickfunnels.com/</span>
                            <span class="input-group-addon">
                                <a class="perview-url" href="#" target="_blank">
                                    <span class="fa fa-external-link"></span>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="panda_step_pages">
                        <div class="col-md-4">
                            <div class="step_pages_bx">
                                <div class="attached message">
                                    <i class="fa fa-flag"></i>
                                    <span>Control</span>
                                </div>
                                <div class="step_page_img">
                                    <img src="{{asset('builder/'.$ProjectData->temp_thumbnail)}}" alt="">
                                    
                                </div>
                                <div class="step_page_edit">
                                    <a class="btn btn-warning openPageInEditor" href="{!!url('builder/#/builder/'.$ProjectData->name)!!}">
                                        <i class="fa fa-edit"></i>
                                        edit page
                                    </a>
                                    <a class="btn btn-default perview-url" href="#" data-toggle="tooltip" target="_blank" title="Preview Page Split Test Version">
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                    <a class="btn btn-default" href="#" data-toggle="tooltip" title="Edit Page Split Test Settings">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                    <a class="openPage_InEditor" href="#">
                                    edit page in classic editor
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="step_pages_bx text-center">
                                <div class="attached message">
                                    <i class="fa fa-flask"></i>
                                </div>
                                <div class="spilt_test">
                                    <h2>Start Split Test</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                    <a class="btn btn-default create_variation" href="#">
                                        <i class="fa fa-plus"></i>
                                        Create Variation
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="footer_action_btn text-right">
                        <a class="btn btn-sm btn-default"><i class="fa fa-times"></i>Remove From Panda</a>
                        <a class="btn btn-sm btn-default"><i class="fa fa-trash"></i> Delete Panda Step</a>
                        <a class="btn btn-sm btn-default"><i class="fa fa-copy"></i>Clone Panda Step</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endsection
