@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
<div class="clear40"></div>
<section class="contentarea">
    <form method="post" action="{{url('admin/panda-pages/save-settings')}}" >  
        <div class="container-fluid">
            <div class="inner">
                @include('admin.pandapages.nav')
                <div class="clear20"></div>
                <div class="right-contentarea">
                    <div class="inner-content clearfix">
                        <div class="setting_content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="hidden" name="project_name" value="{!!$ProjectData->name!!}"  />
                                        {{csrf_field()}}
                                        <label>NAME</label>
                                        <input type="text" class="form-control" name="site_name" value="{!!$ProjectData->site_name!!}">
                                        <p class="help-block">Name of this website</p>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>DOMAIN</label>
                                        <select class="form-control" name="domain_id">
                                            <option value="" disabled="" selected="" hidden="">Choose a domain</option>

                                            @foreach($domains as $dom)
                                            <option value="{!!$dom->id!!}">{!!$dom->name!!}</option>
                                            @endforeach

                                        </select>
                                        <p class="help-block">The domain for the funnel —  <a target="_blank" href="{!!url('admin/domains/create')!!}">Add/Edit Domains</a></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>PATH</label>
                                        <input type="text" class="form-control" name="" value="{!!url('sites/'.$ProjectData->name)!!}">
                                        <p class="help-block">The path of this funnels starting page</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>SMTP CONFIGURATION</label>
                                        <p>Provide your <a href="{!!url('admin/smtp')!!}">Account SMTP Settings</a> to customize outgoing emails from Controlpanda</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email List Integrations</label>
                                        <p><a id="intrgrations" href="javascript:void(0);">Integrate</a> your panda pages with email list.</p>
                                    </div>
                                </div>	
                                <div class="clearfix"></div>
                                @foreach($pages as $page)
                                <div class="col-sm-4">
                                    <h3>{{ucfirst($page['name'])}} Page Code</h3>
                                </div>
                                <input type="hidden" name="page_name[]" value="{{$page['name']}}"  />
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>HEAD TRACKING CODE</label>
                                        <textarea name="header_code[]" class="form-control" rows="3">{!!@$page['tc']->header_code!!}</textarea>
                                        <p class="help-block">Control Panda wide tracking code for the head tag</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>FOOTER TRACKING CODE</label>
                                        <textarea name="footer_code[]" class="form-control" rows="3">{!!@$page['tc']->footer_code!!}</textarea>
                                        <p class="help-block">Control Panda wide tracking codes for the body tag</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="share_Block clearfix">
                                <div class="pull-left">
                                    <i class="fa fa-external-link" style="font-size: 40px;margin-top: 5px;margin-left: 5px;"></i>
                                </div>
                                <div class="share_block_txt">
                                    <h4>Share This Control Panda URL</h4>
                                    <p>Share this code with any Control Panda's user to give them a cloned copy of your Control Panda.</p>
                                </div>
                                <div class="share_code">
                                    <input style="border:0px !important; background-color: white; box-shadow: 0 0 0;" type="text" readonly class="form-control" name="" value="{!!url('page/'.$ProjectData->name)!!}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3 stripeImage">
                                    <img src="{{asset('frontend/images/set_img1.png')}}" alt="">
                                </div>
                                <div class="col-sm-9">
                                    <h4><strong>Affiliate Commission Plans</strong></h4>
                                    <p>You must <a class="" href="#">Add an Affiliate Access and Affiliate Area page</a> to this Control Panda before Affiliate system can be enabled.</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3 stripeImage text-center">
                                    <img src="{{asset('frontend/images/set_img2.png')}}" alt="">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                                <div class="col-sm-9"><div class="zap-widget">
                                        <div class="zap-row">
                                            <div class="zap-inner-container">
                                                <div class="zap-services">
                                                    <div class="zap-service" style="background-image: url('{{asset('frontend/images/fav.png')}}')"></div>
                                                    <div class="zap-arrow" style="background-image: url('{{asset('frontend/images/arrow_icon.svg')}}')"></div>
                                                    <div class="zap-service" style="background-image: url('{{asset('frontend/images/mail_img.png')}}')"></div>
                                                </div>
                                                <div class="zap-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </div>
                                                <div class="zap-cta"><a class="zap-button" href="">Use this Zap</a></div>
                                            </div>
                                        </div>
                                        <div class="zap-row">
                                            <div class="zap-inner-container">
                                                <div class="zap-services">
                                                    <div class="zap-service" style="background-image: url('{{asset('frontend/images/fav.png')}}')"></div>
                                                    <div class="zap-arrow" style="background-image: url('{{asset('frontend/images/arrow_icon.svg')}}')"></div>
                                                    <div class="zap-service" style="background-image: url('{{asset('frontend/images/mail_img.png')}}')"></div>
                                                </div>
                                                <div class="zap-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </div>
                                                <div class="zap-cta"><a class="zap-button" href="">Use this Zap</a></div>
                                            </div>
                                        </div>
                                        <div class="zap-row">
                                            <div class="zap-inner-container">
                                                <div class="zap-services">
                                                    <div class="zap-service" style="background-image: url('{{asset('frontend/images/fav.png')}}')"></div>
                                                    <div class="zap-arrow" style="background-image: url('{{asset('frontend/images/arrow_icon.svg')}}')"></div>
                                                    <div class="zap-service" style="background-image: url('{{asset('frontend/images/mail_img.png')}}')"></div>
                                                </div>
                                                <div class="zap-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </div>
                                                <div class="zap-cta"><a class="zap-button" href="">Use this Zap</a></div>
                                            </div>
                                        </div>
                                        <div class="zap-row">
                                            <div class="zap-inner-container">
                                                <div class="zap-services">
                                                    <div class="zap-service" style="background-image: url('{{asset('frontend/images/fav.png')}}')"></div>
                                                    <div class="zap-arrow" style="background-image: url('{{asset('frontend/images/arrow_icon.svg')}}')"></div>
                                                    <div class="zap-service" style="background-image: url('{{asset('frontend/images/mail_img.png')}}')"></div>
                                                </div>
                                                <div class="zap-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </div>
                                                <div class="zap-cta"><a class="zap-button" href="">Use this Zap</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <hr>
                            <div class="row">
                                <div class="col-sm-3 stripeImage text-center">
                                    <img src="{{asset('frontend/images/set_img3.png')}}" alt="">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                                <div class="col-sm-9">
                                    <p>For more information see <a href="#" target="_blank">our webhook documentation <span class="fa fa-external-link"></span></a></p>
                                    <hr>
                                    <a class="btn btn-default" href="#">Manage Your Control Panda Webhooks</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3 stripeImage text-center">
                                    <img src="{{asset('frontend/images/set_img1.png')}}" alt="">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                                <div class="col-sm-9">
                                    <h4><strong>3rd Party Membership Access </strong> (Non-Order Form Purchase Tracking)</h4>
                                    <hr>
                                    <div class="text-left">
                                        <a class="btn btn-default" href="#">Add Product</a>
                                    </div>

                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-right">
                                        <a class="btn btn-default btn-md" href="#"><i class="fa fa-archive"></i>
                                            Archive Control Panda
                                        </a> &nbsp;&nbsp;&nbsp;
                                        <input type="submit" name="" value="Save and Update Settings" class="btn btn btn-success btn-md pull-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--SHARE PANDA-->
                    <div id="shareModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="shareModal_body">
                                    <div class="share_Block clearfix">
                                        <div class="pull-left">
                                            <i class="fa fa-external-link" style="font-size: 40px;margin-top: 5px;margin-left: 5px;"></i>
                                        </div>
                                        <div class="share_block_txt">
                                            <h4>Share This Control Panda URL</h4>
                                            <p>Share this code with any ClickFunnels user to give them a cloned copy of your Control Panda.</p>
                                        </div>
                                        <div class="share_code">
                                            <input style="border:0px !important; background-color: white; box-shadow: 0 0 0;" type="text" readonly class="form-control" name="" value="{!!url('sites/'.$ProjectData->name)!!}">
                                        </div>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
    </form>
</section>
<div class="modal fade" id="integrations-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content Modal_Content">
            <div class="modal-header clearfix">
                <div title="Close Modal" class="close-modal" data-dismiss="modal">
                    <i class="icon icon-cancel-circled"></i>
                    <span class="modal-title">Email Integration Settings</span>
                </div>
            </div>
            <div class="modal-body">
                <form>
                    <div id="alreadyaddedintegrations">

                    </div>
                    <div class="form-group">
                        <label class="control-label">Action</label>
                        <select class="form-control" name="action" id="action_list">
                            <option value="add_to">Add to list</option>
                            <option value="remove_from">Remove from list</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Select List</label>
                        <select class="form-control" id="email_lists" name="email_list_id">
                            <option value="">-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Page</label>
                        <select class="form-control" id="page_name" name="page_name">
                            @foreach($pages as $page)
                            <option value="{!!$page['name']!!}">{!!$page['name']!!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right form-group">
                        <button type="submit" class="btn btn-success submit-btn"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#intrgrations', function () {
        var project_name = '{!!$ProjectData->name!!}';
        $.ajax({
            type: 'GET',
            url: site_url + '/admin/get_email_lists',
            success: function (data) {
                $("#email_lists").html(data);
            }
        });
        $.ajax({
            type: 'POST',
            url: site_url + '/admin/get_integrations',
            data: {'project_name': project_name},
            success: function (data) {
                var html = '';
                var data_obj = jQuery.parseJSON(data);
                $.each(data_obj, function (e, v) {
                    html += '<div class="contentmenu-filter"><a data-id="' + v.id + '" href="javascript:void(0)" class="contentmenu-filter-remove" title="Remove Filter"><i class="fa fa-times"></i></a>' + v.action.replace("_", " ") + ' ' + v.list_title + ' - ' + v.page_name + '</div>';
                });
                $("#alreadyaddedintegrations").html(html);
            }
        });
        $('#integrations-modal').modal('show');
    });

    $(document).on('submit', '#integrations-modal form', function (e) {
        var project_name = '{!!$ProjectData->name!!}';
        var page_name = $("#page_name").val();
        var email_list_id = $("#email_lists").val();
        var action = $("#action_list").val();
        $.ajax({
            type: 'POST',
                url: site_url + '/admin/add_integrations',
            data: {project_name: project_name, page_name: page_name, email_list_id: email_list_id, action: action},
            success: function (data) {

            }
        });
        $('#integrations-modal').modal('hide');
        return false;
    });
    $(document).on("click", ".contentmenu-filter-remove", function (e) {
        e.stopPropagation();
        var element = $(this);
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: site_url + '/admin/remove_integrations',
            data: {'id': id},
            success: function (data) {
                element.parent('.contentmenu-filter').remove();
            }
        });
    });
</script>

@endsection