@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
@endphp
<div class="left-navigation">
    <div class="menulinks-back">
        <ul>
            @if(have_premission(array(16)))
            <li @if($segment2 == 'contacts' && $segment3 != 'lists') class="active" @endif>
                <div class="icon"><i class="fa fa-envelope"></i></div>
                <a href="{{url('admin/contacts')}}"> Contact Profiles</a></li>
            @endif
            @if(have_premission(array(20)))
            <li @if($segment2 == 'contacts' && $segment3 == 'lists') class="active" @endif>
                <div class="icon"><i class="fa fa-list-alt"></i></div>
                <a href="{{url('admin/contacts/lists')}}"> Email Lists</a></li>
            @endif
            @if(have_premission(array(21)))
            <li @if($segment2 == 'email-broadcast' || $segment2 == 'new-email-broadcast') class="active" @endif>
                <div class="icon"><i class="fa fa-dashboard"></i></div>
                <a href="{{url('admin/email-broadcast')}}"> Email Broadcasts</a></li>
            @endif
            @if(have_premission(array(22)))
            <li @if($segment2 == 'email-sequences' || $segment2 == 'new-email-sequence' || $segment2 == 'email-sequence-steps' ) class="active" @endif>
                <div class="icon"><i class="fa fa-dashboard"></i></div>
                <a href="{{url('admin/email-sequences')}}"> Email Sequences</a></li>
            @endif
        </ul>
    </div>
</div>