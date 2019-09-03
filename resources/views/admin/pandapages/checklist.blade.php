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
                    <div class="checklist_step1">
                        <ul class="list-group active">
                            <li class="list-group-item checklistHeader">
                                <span class="stepNumber pull-left">1</span>
                                Customize the look of your Panda
                            </li>
                            <li class="list-group-item clearfix">
                                <div class="pull-left">
                                    <a class="btn btn-default" href="{{url('admin/panda-pages/'.$ProjectData->id.'/edit')}}">Customize Template</a>
                                </div>
                            </li>
                        </ul>
                        <form action="{{ url('/admin/connect-domain')}}" method="POST">
                            <ul class="list-group">
                                <li class="list-group-item checklistHeader">
                                    <span class="stepNumber pull-left">2</span>
                                    Register a Custom Web Address
                                </li>
                                {{ csrf_field() }}
                                <input type="hidden" name="project_id" value="{{$ProjectData->id}}"  />
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select class="form-control" name="domain_name" id="domain_name" required>
                                                    <option value="" disabled="" selected="" hidden="">Choose a domain</option>
                                                    @foreach($domains as $dom)
                                                    <option value="{!!$dom->id!!}">{!!$dom->name!!}</option>
                                                    @endforeach
                                                </select>
                                                <p class="help-block">The domain for the funnel — 
                                                    <a target="_blank" href="{{url('admin/domains')}}">Add/Edit Domains</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="submit" name="" value="Save" class="btn btn btn-success pull-right">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>

                        <ul class="list-group">
                            <li class="list-group-item checklistHeader">
                                <span class="stepNumber pull-left">3</span>
                                Decide where to store your Leads
                            </li>
                            <li class="list-group-item clearfix">
                                <div class="pull-right">
                                    <a class="btn btn-mini btn-primary" id="email_list" data-toggle="modal" data-target="#email_list_popup"  title="Email List" href="#">Add Email Integration (optional)</a>

                                </div>
                            </li>
                        </ul>

                        <ul class="list-group">
                            <li class="list-group-item checklistHeader">
                                <span class="stepNumber pull-left">6</span>
                                Launch and share with the world
                            </li>
                            <li class="list-group-item clearfix">
                                <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem ipsum dolor sit amet.</p>

                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_google_plus"></a>
                                    <a class="a2a_button_pinterest"></a>
                                    <a class="a2a_button_linkedin"></a>
                                </div>
                                <script>
                                    var a2a_config = a2a_config || {};
                                    a2a_config.linkurl = "<?php echo url('sites/' . $ProjectData->name) ?>";
                                    a2a_config.onclick = 1;
                                </script>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<div id="email_list_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Integrate Email List</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/integrate-email-list')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_name" value="{{$ProjectData->name}}"  />

                    <div class="form-group">
                        <label for="name">Pages</label>
                        <select name="page_name" class="form-control" id="page_name" required="required">
                            <option value="" disabled="" selected="" hidden="">Choose Page</option>
                            <?php
                            $directory = '../public/storage/projects/' . $user_id . '/' . $ProjectData->uuid . '/';
                            if (glob($directory . "*.html") != false) {
                                foreach (glob($directory . "*.html") as $pg) {
                                    $p = explode("/", $pg);
                                    $p = end($p);
                                    $p = explode(".", $p);
                                    echo '<option value="' . $p[0] . '">' . $p[0] . '</option>';
                                }
                            }
                            ?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Email List</label>
                        <select name="email_list_id" class="form-control" id="email_list_id" required="required">
                            <option value="" disabled="" selected="" hidden="">Choose an Email List</option>
                            @foreach($emaillists as $dom)
                            <option value="{!!$dom->id!!}">{!!$dom->title!!}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Action</label>
                        <select name="action" class="form-control" id="action" required="required">
                            <option value="" disabled="" selected="" hidden="">Choose an action</option>
                            <option value="add_to">Add To</option>
                            <option value="remove_from">Remove From</option>
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
@endsection