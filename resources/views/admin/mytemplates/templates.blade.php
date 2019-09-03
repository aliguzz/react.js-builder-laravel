@extends('admin.layouts.app')

@section('content')
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
          <div class="left-navigation">
                <div class="menulinks-back">
                    <div class="mn_head_lf">
                        <i class="fa fa-cogs Headerlf_icon"></i>
                        <span class="Headerlf_name">SETTINGS</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <ul class="Left_Nav">
                        <li>
                            <i class="fa fa-folder-o"></i>
                            <span>MANAGEMENT</span>
                        </li>
                        <li>
                            <i class="fa fa-user"></i>
                            <a href="#">Account Details</a>
                        </li>
                        <li>
                            <i class="fa fa-credit-card"></i>
                            <a href="#">Account Billing</a>
                        </li>
                        <li>
                            <i class="fa fa-file"></i>
                            <a href="#">Personal Page Templates</a>
                        </li>
                        <li>
                            <i class="fa fa-download"></i>
                            <a href="#">Digital Assets</a>
                        </li>
                        <li>
                            <i class="fa fa-cog"></i>
                            <span>Setup</span>
                        </li>
                        <li>
                            <i class="fa fa-plug"></i>
                            <a href="#">Integrations</a>
                        </li>
                        <li>
                            <i class="fa fa-shopping-cart"></i>
                            <a href="#">Payment Gateways</a>
                        </li>
                        <li>
                            <i class="fa fa-plane"></i>
                            <a href="#">Outgoing SMTP</a>
                        </li>
                        <li>
                            <i class="fa fa-globe"></i>
                            <a href="#">Domains</a>
                        </li>
                        <li>
                            <i class="fa fa-user-times"></i>
                            <a href="#">Global Unsubscribes</a>
                        </li>
                        <li>
                            <i class="fa fa-share"></i>
                            <span>Account Sharing</span>
                        </li>
                        <li>
                            <i class="fa fa-briefcase"></i>
                            <a href="#">Managers</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="Inner_Content">
                        <div class="form_wrap">
                            <h2 class="ui header">New Email Design</h2>
                            <div class="clear10"></div>
                            <form action="" method="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="preview_template">
                                                <img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1403295/300/200/m1/fpnw/wm0/img-.png?1467046836&s=a5d8c3bd61c9ce1435429e424bd49494" alt="">
                                                <a href="#"><i class="fa fa-share"></i> Preview</a>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="control-label">Name</label>
                                    <input class="form-control" type="text" name="" placeholder="Give your template a name">
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="control-label">Tags</label>
                                    <textarea name="" class="form-control" rows="4" placeholder="Tag Template ex: optin, sales, video, etc"></textarea>
                                </div>
                                <div class="inline field">
                                    <label>Enable?</label> &nbsp;&nbsp;
                                    <input type="checkbox" name="">
                                </div>
                                <input type="submit" name="" value="Create Email design" class="btn btn-success">
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
