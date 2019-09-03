@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader') 

<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
            <div class="tab-content">
            <div id="menu1" class="right-content-space">

                <div class="editor-domain-container-heading MaxWidth">
                    <div class="page-header">
                        <h1>Packages
                            @if(have_premission(array(104)))
                            <a href="{{url('/admin/packages/create')}}" class="btn btn-info pull-right">Add New Package</a>
                            @endif
                        </h1>
                    </div>
                </div>
                
                

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12 padding0">
                <div class="box">
                    <div class="box-content">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Websites</th>
                                    <th>CP Page Builder</th>
                                    <th>Free Premium Domain</th>
                                    <th>Connect Domains</th>
                                    <th>Monthly Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($packages as $package) 
                                <tr>
                                    <td>{!!$package->title!!}</td>
                                    <td>{!!$package->no_of_sites!!}</td>
                                    <td>{!!$package->cp_page_builder!!}</td>
                                    <td>{!!$package->free_premium_domain!!}</td>
                                    <td>{!!$package->connect_domains!!}</td>
                                    <td>${!!$package->price!!}</td>
                                    
                                    <td>@if($package->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                                    <td>
                                        @if(have_premission(array(105)))
                                        <a class="edite-btn" href="{{ url('/admin/packages/'.$package->id.'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                        @endif
                                        @if(have_premission(array(106)))
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['admin/packages', $package->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete Package"></i>', ['class' => 'delete-form-btn delete-style']) !!}
                                        {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit delete']) !!}
                                        {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav class="pull-right">{!! $packages->render() !!}</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
            </div>
            </div>
    </section>
</div>
@endsection





