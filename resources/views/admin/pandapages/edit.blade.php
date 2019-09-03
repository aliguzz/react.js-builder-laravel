@extends('admin.layouts.app')
@section('content')
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            @include('admin.pandapages.nav')
            <div class="clear20"></div>
            <div class="right-contentarea">
                <div class="inner-content clearfix">
                    <div class="col-sm-12">
                        <div class="input-group Traffic_InputBlock">
                            <span class="input-group-addon" style="border-right:0px;">
                                <a href="#" data-toggle="tooltip" title="Edit Panda Step Settings">
                                    <span class="fa fa-gear"></span>
                                </a>
                            </span>
                            <input type="url" class="form-control edit-url" value="{!!url('sites/'.$ProjectData->name)!!}" />
                            <span class="input-group-addon">
                                <a class="perview-url" href="{!!url('sites/'.$ProjectData->name)!!}" target="_blank">
                                    <span class="fa fa-external-link"></span>
                                </a>
                            </span>

                        </div>
                    </div>
                    <div class="panda_step_pages">
                        <div class="col-md-3">
                            <div class="step_pages_bx">
                                <div class="attached message">
                                    <i class="fa fa-flag"></i>
                                    <span>Control</span>
                                </div>
                                <div class="step_page_img">
                                    <img src="{{asset('storage/projects/'.$user_id.'/'.$ProjectData->uuid.'/thumbnail.png')}}" alt="">
                                </div>
                                <div class="step_page_edit">
                                    <a class="btn btn-warning openPageInEditor" href="{!!url('builder/'.$ProjectData->id)!!}">
                                        <i class="fa fa-edit"></i>
                                        edit page
                                    </a>
                                    <a class="btn btn-primary perview-url" href="{!!url('sites/'.$ProjectData->name)!!}" data-toggle="tooltip" target="_blank" title="Preview Page Split Test Version">
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                    <a class="btn btn-default" href="#EditPage" data-toggle="modal">
                                        <i class="fa fa-cog" data-toggle="tooltip" title="Edit Page Split Test Settings"></i>
                                    </a>
                                </div>
                                <hr>
                                <div class="col-sm-12">
                                    <div class="media-body media-left text-left">
                                        <h4>{!!ucfirst($ProjectData->template)!!} | {!!$ProjectData->t_cat_name!!}</h4>
                                        <p>last updated <span class="timeago" title="Fri, Jan 26 2018">Just now</span></p>
                                    </div>
                                    <div class="media-right align-self-center mr_10">
                                        <h4><?php
                                            $directory = '../public/storage/projects/' . $user_id . '/' . $ProjectData->uuid . '/';
                                            if (glob($directory . "*.html") != false) {
                                                $filecount = count(glob($directory . "*.html"));
                                                echo $filecount;
                                            } else {
                                                echo 0;
                                            }
                                            ?> Steps</h4>
                                    </div>                                    
                                </div>
                                <div class="clear10"></div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="siteactions">
                                @if(have_premission(array(5)))
                                <li><a href="{!!url('page/'.$ProjectData->name)!!}"><i class="fa fa-eye"></i> View Site</a></li>
                                @endif
                                @if(have_premission(array(1)))
                                <li><a id="connect_domain" data-toggle="modal" data-target="#connect_domain_popup"  title="Connect Domain" href="#"><i class="fa fa-globe"></i> Connect Domain</a></li>
                                @endif
                                @if(have_premission(array(6)))
                                <li><a id="rename_site" data-toggle="modal" data-target="#rename_site_popup"  title="Rename site" href="#"><i class="fa fa-code"></i> Rename Site</a></li>
                                @endif
                                @if(have_premission(array(7)))
                                <li><a id="duplicate_site" data-toggle="modal" data-target="#duplicate_site_popup" title="duplicate" href="#"><i class="fa fa-clone"></i> Duplicate Site</a></li>
                                @endif
                                @if(have_premission(array(1)))
                                <li><a id="transfer_site" data-toggle="modal" data-target="#transfer_site_popup"  title="Transfer site" href="#"><i class="fa fa-television"></i> Transfer Ownership</a></li>
                                @endif
                                @if(have_premission(array(4)))
                                <li>
                                    {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['admin/delete-site', $ProjectData->id],
                                    'style' => ''
                                    ]) !!}
                                    <a href="#" class="delete-form-btn"><i class="fa fa-trash-o" title="Delete User"></i> Delete Site</a>
                                    {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit']) !!}
                                    {!! Form::close() !!}

                                </li>
                                @endif
                                @if(have_premission(array(1)))
                                <li><a  data-toggle="modal" data-target="#site_history_popup"  title="Site History" ><i class="fa fa-clock-o"></i> Site History</a></li>
                                @endif
                            </ul>
                            <h3>Site Basics</h3>
                            <div class="table-responsive siteactions-table">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td><strong>Site Name</strong></td>
                                            <td>{{$ProjectData->site_name}}</td>
                                            <td class="text-center"><i class="fa fa-check-circle-o green-text-icon"></i></td>
                                            <td>
                                                @if(have_premission(array(6)))
                                                <a id="rename_site" data-toggle="modal" data-target="#rename_site_popup" href="#" title="Rename site">Edit <i class="fa fa-angle-right"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Site Address</strong></td>
                                            <td>{!!url('sites/'.$ProjectData->name)!!}</td>
                                            <td class="text-center"><i class="fa fa-check-circle-o green-text-icon"></i></td>
                                            <td><a href="{!!url('builder/'.$ProjectData->id)!!}">Manage <i class="fa fa-angle-right"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Domain</strong></td>
                                            <td>{!!$ProjectData->domain_names!!}</td>
                                            <td class="text-center"><i class="fa fa-check-circle-o green-text-icon"></i></td>
                                            <td>
                                                @if(have_premission(array(1)))
                                                <a data-toggle="modal" data-target="#connect_domain_popup"  title="Connect Domain" href="#">Edit <i class="fa fa-angle-right"></i></a>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<div id="site_history_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Site History</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label class="col-md-12">Created Date: {!!time_ago($ProjectData->created_at)!!}</label>
                    <label class="col-md-12">Updated Date: {!!time_ago($ProjectData->updated_at)!!}</label>
                    <label class="col-md-12">Pages: <?php
                        $directory = '../public/storage/projects/' . $user_id . '/' . $ProjectData->uuid . '/';
                        if (glob($directory . "*.html") != false) {
                            $filecount = count(glob($directory . "*.html"));
                            echo $filecount;
                        } else {
                            echo 0;
                        }
                        ?></label>
                    <label class="col-md-12">Forms: {!!count(explode(",",@$ProjectData->forms))!!}</label>
                    <label class="col-md-12">Leads: {!!$project_leads!!}</label>
                    <label class="col-md-12">Email Lists: {!!$email_lists!!}</label>
                    <label class="col-md-12">SEO Settings: @if($seo) YES @else NO @endif</label>
                    <label class="col-md-12">Tracking Codes: @if($tracking_codes) YES @else NO @endif</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="rename_site_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rename Site Name</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/update-site-info')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="action" value="rename"  />
                    <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                    <div class="form-group">
                        <label for="name">Site Name</label>
                        <input type="text" name="site_name" value="{{$ProjectData->site_name}}" class="form-control" id="site_name" aria-describedby="site_name" placeholder="Site Name" required="required">
                    </div>


                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <div class="clear5"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="connect_domain_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Connect Domain</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/connect-domain')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                    <div class="form-group">
                        <label for="name">Domain</label>
                        <select name="domain_name" class="form-control" id="domain_name" required="required">
                            <option value="" disabled="" selected="" hidden="">Choose a domain</option>
                            @foreach($domains as $dom)
                            <option value="{!!$dom->id!!}">{!!$dom->name!!}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <div class="clear5"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="duplicate_site_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Duplicate Site</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/update-site-info')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="action" value="duplicate"  />
                    <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                    <input type="hidden" name="template" value="{{$ProjectData->template}}"  />
                    <input type="hidden" name="ind_id" value="{{$ProjectData->ind_id}}"  />
                    <div class="form-group">
                        <label for="name">Enter Duplicate Site Name</label>
                        <input type="text" name="site_name" value="" class="form-control" id="site_name" aria-describedby="site_name" placeholder="Site Name" required="required">
                    </div>


                    <button type="submit" class="btn btn-primary pull-right">Confirm Duplication</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                    <div class="clear5"></div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="transfer_site_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Transfer Site</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/update-site-info')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="action" value="transfer"  />
                    <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />

                    <div class="form-group">
                        <label for="name">Transfer to:</label>
                        <select name="user_id" id="user_id" class='form-control ' required="required">
                            <option value="">Select User</option>
                            @foreach($users as $list)
                            <option value="{{$list->id.'|-|'.$list->first_name.' '.$list->last_name}}">{{$list->first_name.' '.$list->last_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary pull-right hidden" id="btnTransfer">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                    <div class="clear5"></div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="EditPage" class="modal fade generic_modal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">EDIT PAGE</h4>
            </div>
            <div class="infoModal_body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label pull-left">Name</label> <h6 class="pull-right">name of the page <i class="fa fa-info-circle"></i></h6>
                            <input class="form-control" value="Lead Magnet" type="text">
                            <h6>Note: Page Domains are now set at the Panda level (Panda Settings -> Domain)</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label pull-left">Path</label> <h6 class="pull-right">ending path of the url <i class="fa fa-info-circle"></i></h6>
                            <input class="form-control" value="lead-magnet18926346" type="text">
                        </div>
                    </div>
                </div>
                <div class="">
                    <label class="control-label text-left">VERSION HISTORY (LAST 5 SAVES IN PAST 30 DAYS)</label>
                    <div class="clear10"></div>
                    <p class="pull-left">Thu, Feb 15 at 6:12AM UTC (1 day ago)</p>
                    <div class="pull-right">
                        <a class="btn btn-default" href=""><span class="fa fa-external-link"></span> Preview</a>
                        <a class="btn btn-primary" href=""><span class="fa fa fa-refresh"></span> Restore</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="CreateVariation" class="modal fade generic_modal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">CREATE A NEW SPLIT TEST</h4>
            </div>
            <div class="infoModal_body">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-block btn-lg btn-primary" href="">
                            <i class="fa fa-copy"></i>
                            Create Duplicate Page from "Lead Magnet"
                        </a>
                    </div>
                    <div class="clear10"></div>
                    <div class="col-md-12">
                        <button class="btn btn-block btn-lg btn-primary" data-target="#splitTemplate" data-toggle="modal">
                            <i class="fa fa-edit"></i>
                            Create from Template
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $(document).on('change', '#user_id', function () {
            if (this.value != '')
                $('#btnTransfer').text('Confirm transfer to ' + $('#user_id option:selected').text().toUpperCase()).removeClass('hidden');
            else
                $('#btnTransfer').addClass('hidden');
        });
    });

   
</script>
@endsection