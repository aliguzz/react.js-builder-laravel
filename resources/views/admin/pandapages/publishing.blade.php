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
                    <div class="automation_form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PANDA STEP NAME </label>
                                    <input class="form-control" name="" value="Lead Magnet" type="text">
                                    <p class="help-block">Note: Funnel Step Domains are now set at the Funnel level (Funnel Settings -> Domain)</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PATH</label>
                                    <input class="form-control" name="" value="lead-magnetils0ljkk" type="text">
                                    <p class="help-block">The path for this Funnel Step</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Update Panda step</button>
                    </div>

                    <div class="clear20"></div>

                    <div class="row">
                        <div class="col-sm-6">
                            <a class="Advanced_Options" href="#">
                                <h3><i class="fa fa-arrow-up"></i>Get ClickPop Code</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="Advanced_Options" href="#">
                                <h3><i class="fa fa-envelope"></i>Get ClickOptin Link</h3>
                                <p>There are many variations of passages of Lorem Ipsum available.</p>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="Advanced_Options" href="#">
                                <h3><i class="fa fa-wordpress"></i>WordPress Plugin</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="Advanced_Options" href="#">
                                <h3><i class="fa fa-facebook"></i>Add to Facebook</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="Advanced_Options" href="#">
                                <h3><i class="fa fa-globe"></i>Embed Code</h3>
                                <p>There are many variations of passages of Lorem Ipsum available.</p>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="Advanced_Options" href="#">
                                <h3><i class="fa fa-download"></i>Download HTML</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="textOptinsBlock clearfix">
                                <div class="products">
                                    <div class="automation_title clearfix">
                                        <h4 class="pull-left"><i class="fa fa-mobile"></i>Text Optins:</h4>
                                        <span class="pull-right">(Collect Leads Through TXT Message)</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a class="btn btn-default" href="#text_optin" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; Add Text Optin</a>
                                </div>
                                <div class="clear10"></div>
                                <div class="hintblock text-right">
                                    <strong>
                                        <i class="fa fa-question-circle"></i>
                                        Still new to TextOptins?
                                    </strong>
                                    Follow the helpful tutorial on our ClickFunnels Blog to become a master at TextOptins
                                    <a class="badge" href="#">Knowledge Base Article</a>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<!--Text_Optin-->
<div id="text_optin" class="modal fade generic_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">NEW TEXT OPTIN</h4>
            </div>
            <div class="TextOptin_body generic_modal_body clearfix">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <hr>
                <a href="#">Full article in the knowledgebase</a>
                <div class="clear10"></div>
                <div class="form-group text_optin_number clearfix">
                    <label class=""> Number</label>
                    <select class="form-control" required="required">
                        <option value=""></option>
                        <option value="">+16785067543</option>
                    </select>
                    <p class="help-block"><i class="fa fa-info-circle"></i> Note: Short-codes and more numbers coming soon</p>
                </div>
                <div class="form-group text_optin_number clearfix">
                    <label class=""> Unique</label>
                    <div class="longHint">
                        Must be Unique among all users of this phone number. Only Alpha-numeric characters.
                    </div>
                    <input type="text" class="form-control" placeholder="GETITNOW" name="">
                    <p class="help-block"><i class="fa fa-info-circle"></i> The code your customers will text to the number</p>
                </div>
                <div class="form-group text_optin_number clearfix">
                    <label class=""> Response Message</label>
                    <div class="longHint">
                        Ask for their email here and give them some details to remind them why they are opting in for your page.Maximum length: 160 symbols.
                    </div>
                    <input type="text" class="form-control" placeholder="Thanks! Reply with your Email address to get started" name="">
                    <p class="help-block"><i class="fa fa-info-circle"></i> message that will reply back to your customers after they send the code above</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default CreateOptin_btn">Create Text optin</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection