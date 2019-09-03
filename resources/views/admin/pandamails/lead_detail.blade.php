@extends('admin.layouts.app')
@section('content')
@include('admin.sections.elconsubheader')

<div class="clear40"></div>
<div class="container-fluid">

 <section class="inner-full-width-panel pr-30">
            <div class="tab-content">
        
            
            <div class="right-content right-content-space fixed-width">
                
                
                <div class="clearfix"></div>
                <div class="inner-content">
                    <div id="response-table">
                        <table class="table table-hover table-nomargin no-margin table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>key</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Title</td>
                                    <td>{!!$contacts->title!!}</td>
                                </tr>
                                <tr>
                                    <td>Full Name</td>
                                    <td>{!!$contacts->full_name!!}</td>
                                </tr>
                                <tr>
                                    <td>First Name</td>
                                    <td>{!!$contacts->first_name!!}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>{!!$contacts->last_name!!}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{!!$contacts->email!!}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{!!$contacts->phone!!}</td>
                                </tr>
                                <tr>
                                    <td>Fax</td>
                                    <td>{!!$contacts->fax!!}</td>
                                </tr>
                                <tr>
                                    <td>Zip</td>
                                    <td>{!!$contacts->Zip!!}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{!!$contacts->address!!}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{!!$contacts->city!!}</td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td>{!!$contacts->company!!}</td>
                                </tr>
                                <tr>
                                    <td>Designation</td>
                                    <td>{!!$contacts->designation!!}</td>
                                </tr>
                                <tr>
                                    <td>Date oF Birth</td>
                                    @if ( $contacts->dob_day == '' || $contacts->dob_month == ''|| $contacts->dob_year== '' )
                                    <td>Not Provided </td>
                                    @else
                                    <td>{!!display_date($contacts->dob_day.'/'.$contacts->dob_month.'/'.$contacts->dob_year)!!}</td>
                                    @endif
                                </tr>

                                <tr>
                                    <td>Ip Address</td>
                                    <td>{!!$contacts->ip_address!!}</td>
                                </tr>
                                <tr>
                                    <td>Lead Status</td>
                                    <td>{!!$contacts->lead_status!!}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{!!display_date_time($contacts->created_at)!!}</td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>{!!display_date_time($contacts->updated_at)  !!}</td>
                                </tr>
                                @if($contacts->other_fields_values != '')
                                @php
                                $other_fields = json_decode($contacts->other_fields_values);
                                @endphp
                                @foreach($other_fields as $key=>$of)

                                <tr>
                                    <td>{!!ucfirst(str_replace('_',' ',str_replace('-',' ',$key)))!!}</td>
                                    <td>{!!$of!!}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
     </section>
    </div>


@endsection