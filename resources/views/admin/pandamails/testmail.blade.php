@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
@endphp
<div class="left-navigation">
    <div class="menulinks-back">
        <ul>
            <li @if($segment2 == 'contacts' && $segment3 != 'lists') class="active" @endif>
                <div class="icon"><i class="fa fa-envelope"></i></div>
                <a href="{{url('admin/contacts')}}"> Contact Profiles</a></li>
            <li @if($segment2 == 'contacts' && $segment3 == 'lists') class="active" @endif>
                <div class="icon"><i class="fa fa-list-alt"></i></div>
                <a href="{{url('admin/contacts/lists')}}"> Email Lists</a></li>
            <li @if($segment2 == 'email-broadcast') class="active" @endif>
                <div class="icon"><i class="fa fa-dashboard"></i></div>
                <a href="{{url('admin/email-broadcast')}}"> Email Broadcasts</a></li>
            <li @if($segment2 == 'email-sequences') class="active" @endif>
                <div class="icon"><i class="fa fa-dashboard"></i></div>
                <a href="{{url('admin/email-sequences')}}"> Email Sequences</a></li>
        </ul>
    </div>
</div>