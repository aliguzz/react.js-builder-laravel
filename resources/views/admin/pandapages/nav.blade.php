@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
$segment4 = Request::segment(4);
@endphp
<div class="left-navigation clearfix">
    <div class="menulinks-back">

        <div class="mn_head_lf pull-left">
            <i class="fa fa-cog Headerlf_icon"></i>
            <span class="Headerlf_name">{!!ucfirst($ProjectData->template)!!} | {!!$ProjectData->t_cat_name!!}</span>
        </div>
        <div class="Header_url input_group_wrapper pull-right">
            <span class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-link"></i>
                </div>
                <div class="input-group-addon">
                    <a class="copy_URL copytoclipboard" data-toggle="tooltip" href="{!!url('sites/'.$ProjectData->name)!!}" title="Copy URL to Clipboard">
                        <i class="fa fa-copy"></i>
                    </a>
                </div>
                <div class="input-group-addon">
                    <a data-toggle="tooltip" href="{!!url('sites/'.$ProjectData->name)!!}" target="_blank" title="Visit Live Website">
                        <i class="fa fa-external-link"></i>
                    </a>
                </div>
                <div class="input-group-addon">
                    <a class="" data-toggle="modal" href="#infoModal">
                        <i class="fa fa-question-circle" data-toggle="tooltip" title="What is the Panda URL?"></i>
                    </a>
                </div>
            </span>
        </div>
        <div class="clearfix clear20"></div>
        <div class="Header_action_item">
            @if(have_premission(array(1)))
            <a @if($segment2 == 'panda-pages' && $segment4 == 'edit') class="show_ContactsActive" @endif href="{!!url('admin/panda-pages/'.$ProjectData->id.'/edit')!!}"><span class="fa fa-th-large"></span>Overview</a>
            @endif
            @if(have_premission(array(1)))
            <a @if($segment2 == 'panda-pages' && $segment4 == 'checklist') class="show_ContactsActive" @endif href="{!!url('admin/panda-pages/'.$ProjectData->id.'/checklist')!!}"><span class="fa fa-check-square-o"></span>Checklist</a>
            @endif
            @if(have_premission(array(8)))
            <a @if($segment2 == 'panda-pages' && $segment4 == 'stats') class="show_ContactsActive" @endif href="{!!url('admin/panda-pages/'.$ProjectData->id.'/stats')!!}"><span class="fa fa-bar-chart"></span>Stats</a>
            @endif
            @if(have_premission(array(9)))
            <a @if($segment2 == 'panda-pages' && $segment4 == 'contacts') class="show_ContactsActive" @endif href="{!!url('admin/panda-pages/'.$ProjectData->id.'/contacts')!!}"><span class="fa fa-users"></span>Contacts</a>
            @endif
            @if(have_premission(array(10)))
            <a @if($segment2 == 'panda-pages' && $segment4 == 'settings') class="show_ContactsActive" @endif href="{!!url('admin/panda-pages/'.$ProjectData->id.'/settings')!!}"><span class="fa fa-gear"></span>Settings</a>
            @endif
            @if(have_premission(array(10)))
            <a @if($segment2 == 'panda-pages' && $segment4 == 'automation') class="show_ContactsActive" @endif href="{!!url('admin/panda-pages/'.$ProjectData->id.'/automation')!!}"><span class="fa fa-flash"></span>Contacting Your Leads</a>
            @endif
        </div>
    </div>
</div>
<!--INFO MODAL-->   
<div id="infoModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">WHAT IS THE PANDA PAGE URL?</h4>
            </div>
            <div class="infoModal_body">
                <h3>Send Traffic to Panda Page URL</h3>
                <p>Use the Panda Page URL below to send traffic to your panda page. This URL will always take visitors to the first page in your panda page.</p>
                <div class="row">
                    <div class="col-sm-8">
                        <input class="form-control" type="text" value="{!!url('sites/'.$ProjectData->name)!!}">
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-block btn-success pull-right" href="{!!url('sites/'.$ProjectData->name)!!}" target="_blank">
                            View Panda Page
                        </a>
                    </div>
                </div>  
                <small>
                    <i class="fa fa-question-circle"></i>
                    You can change the domain name or path in the Panda Page Settings.
                </small>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>