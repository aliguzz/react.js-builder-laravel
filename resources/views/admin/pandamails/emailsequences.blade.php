@extends('admin.layouts.app')
@section('content')
<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            @include('admin.pandamails.nav')
            <div class="right-contentarea">
                <div class="inner-content clearfix">
                    <div class="panda_search">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <form>
                                    <div id="custom-search-input">
                                        <input class="  search-query form-control" placeholder="Search Your Email Sequence..." type="text">
                                        <button class="btn btn-defalut" type="button">
                                            <span class=" glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a class="btn ad_new" href="{{URL('admin/new-email-sequence')}}" title="Add New">
                                    <i class="fa fa-plus-square"></i>  New Email Sequence
                                </a>
                            </div>	
                        </div>	
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sequence Name</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($funnels as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>
                                        <td><a href="{{ url('/admin/email-sequence-steps/'.$item->id)}}"><i class="fa fa-edit fa-fw"></i></a></td>
                                    </tr>
                                @endforeach  
                              
                                @if (count($funnels) == 0)
                                    <tr>
                                        <td colspan="3" align="center">YOU CURRENTLY HAVE NO EMAIL SEQUENCE...</td>
                                    </tr>
                                @endif   
                            </tbody>
                        </table>
                    </div>
                    <nav class="pull-right">{!! $funnels->render() !!}</nav>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection