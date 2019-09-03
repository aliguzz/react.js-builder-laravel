@extends('admin.layouts.app')

@section('content')
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>

<div class="breadcrumbs contentarea">
    <div class="container-fluid">
        <ul>
            <li>
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{url('/admin/domains')}}">Domains</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a>{!!$action!!} Domain</a>
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
                        <span class="Headerlf_name">Edit domain</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('admin.account_nav')
                <div class="col-md-8">
                    <div class="clear20"></div>
                    <form id="package-form" class="form-horizontal" action="{{url('/admin/update_domain')}}" method="POST" novalidate="novalidate">
                        {{ csrf_field() }}
                        <input type="hidden" name="domain_id" value="{{$domain->id}}" />
                        <input type="hidden" name="domain_name" value="{{$domain->name}}" />
                        <input type="hidden" name="domain_project_id" value="{{(isset($domain_project_id->id) && $domain_project_id->id != '')? $domain_project_id->id : '' }}" />
                        <div class="col-sm-6 col-sm-offset-3">

                            <div class="form-group">
                                <label for="role" class="col-sm-6 control-label">Domain Name</label>
                                <div class="col-sm-6">
                                    {{$domain->name}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-6 control-label">IP Address</label>
                                <div class="col-sm-6">
                                    {{$domain->ip_address}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-6 control-label">Domain Status</label>
                                <div class="col-sm-6">
                                    <select name="status" id="role" class="form-control required" > 
                                        <option  value="1" {{($domain->status == 1)? 'selected' : ''}}>Activated</option>
                                        <option  value="0" {{($domain->status == 0)? 'selected' : ''}}>Deactivated</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-6 control-label">Assign Website</label>
                                <div class="col-sm-6">
                                    <select name="project_id" id="role" class="form-control required" > 
                                        <option value=""  >Select</option>
                                        @foreach($Projects as $item)
                                        <option  value="{!!$item->id!!}" {{($domain->project_id == $item->id)? 'selected' : ''}}>{{$item->template.' | '.$item->ind_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>




                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="form-actions">
                                <div class="row">
                                    <div class=" col-sm-12 text-right">
                                        <a href="{{URL::previous()}}" class="btn btn-default">Cancel</a>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>    
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    .error { color:red;}
</style>
<script type="text/javascript">
$(function () {
    $('#package-form').validate();
});
</script>
@endsection
