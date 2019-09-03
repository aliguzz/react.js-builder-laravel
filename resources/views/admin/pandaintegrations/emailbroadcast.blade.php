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
                        <span class="Headerlf_name">ACTIONETICS</span>
                    </div>
					<div class="pull-left newtitle_subhead">
						<i class="fa fa-bullhorn"></i>
						Manage Email Broadcasts
					</div>

					<div class="pull-right">
						<a class="btn btn-default_outline" href="#">Welcome Video</a>
						<a class="btn btn-default_outline" href="#">What is Actionetics?</a>
					</div>
                    
                    <div class="clearfix"></div>
                    <ul class="panda_list">
                        <li>
                            <a href="#">
	                            <div class="icon"><i class="fa fa-envelope-o"></i></div>
	                            Contact Profiles
	                        </a>
                        </li>
                        <li class="">
                            <a href="#"> 
	                            <div class="icon"><i class="fa fa-list-alt"></i></div>
	                            Email Lists
	                        </a>
                        </li>
                        <li class="optional_link active">
                            <a href="#"> 
	                            <div class="icon"><i class="fa fa-bullhorn"></i></div>
	                            Email Broadcasts
                            </a>
                        </li>
                        <li class="optional_link">
                            <a href="#">
	                            <div class="icon"><i class="fa fa-history"></i></div>
	                            Action Funnels
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-contentarea">
                <div class="header2 clearfix">
                    <h2 class="pull-left"><i class="fa fa-calendar"></i> Showing Stats For The Last 30 Days</h2>
					<div class="Report_Days pull-right">
						<label>Show Stats for:</label>
	                    <select name="" id="" class="form-control">
	                    	<option value="">Last 7 Days</option>
							<option value="">Last 30 Days</option>
							<option value="">Last 2 Months</option>
							<option value="">This Year</option>
							<option value="">All Time</option>
						</select>
					</div>	
                </div>
                <div class="clearfix"></div>
                <div class="inner-content clearfix">
                    <div class="row">
                    	<div class="col-sm-4">
	                    	<div class="dash_column">
                    			<div class="dash_statcolumn">
                    				<h3>
                    					Sent Emails<i class="fa fa-question-circle" data-placement="right" data-toggle="tooltip" title="all unique leads"></i>
                    				</h3>	
                					<span class="numberFormat">0</span>
                    			</div>
	                    	</div>
                    	</div>
                    	<div class="col-sm-4">
	                    	<div class="dash_column">
                    			<div class="dash_statcolumn">
                    				<h3>
                    					CLICKS<i class="fa fa-question-circle" data-placement="right" data-toggle="tooltip" title="all unique leads"></i>
                    				</h3>	
                					<span class="numberFormat green">+ 0</span>
                    			</div>
	                    	</div>
                    	</div>
                    	<div class="col-sm-4">
	                    	<div class="dash_column">
                    			<div class="dash_statcolumn">
                    				<h3>
                    					UNSUBSCRIBERS<i class="fa fa-question-circle" data-placement="right" data-toggle="tooltip" title="all unique leads"></i>
                    				</h3>	
                					<span class="numberFormat red">- 0</span>
                    			</div>
	                    	</div>
                    	</div>
                    </div>
					<div class="clear20"></div>
                    <div class="panda_search">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <form>
                                    <div id="custom-search-input">
                                        <input class="  search-query form-control" placeholder="Search Broadcasts..." type="text">
                                        <button class="btn btn-defalut" type="button">
                                            <span class=" glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a class="btn ad_new" href="#" title="Add New">
                                    <i class="fa fa-plus-square"></i> New Email Broadcast
                                </a>
                            </div>	
                        </div>	
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