@php
$segment2 = Request::segment(2);
$segment3 = Request::segment(3);
@endphp
<div class="col-md-4">
    <ul class="Left_Nav">
        <li @if($segment2 == "account-details") class="active" @endif>
             <i class="fa fa-user"></i>
            <a href="{{url('admin/account-details')}}">Account Details</a>
        </li>
        @if(have_premission(array(78)))
        <li @if($segment2 == "billing") class="active" @endif >
            <i class="fa fa-credit-card"></i>
            <a href="{{url('admin/billing')}}">Account Billing</a>
        </li>
        @endif
        @if(have_premission(array(40)))
        <li @if($segment2 == "my-packages") class="active" @endif  >
            <i class="fa fa-gift"></i>
            <a href="{{url('admin/my-packages')}}">My Packages</a>
        </li>
        @endif
		@if(have_premission(array(51)))
        <li  @if($segment2 == "assets") class="active" @endif >
            <i class="fa fa-download"></i>
            <a href="{{url('admin/assets')}}">Digital Assets</a>
        </li>
        @endif
        @if(have_premission(array(54)))
        <li @if($segment2 == "payment-gateways") class="active" @endif >
            <i class="fa fa-shopping-cart"></i>
            <a  href="{{url('admin/payment-gateways')}}">Payment Gateways</a>
        </li>
        @endif
        @if(have_premission(array(53)))
        <li @if($segment2 == "smtp") class="active" @endif>
            <i class="fa fa-plane"></i>
            <a  href="{{url('admin/smtp')}}">Outgoing SMTP</a>
        </li>
        @endif
        @if(have_premissionarray((50)))
        <li @if($segment2 == "domains") class="active" @endif >
            <i class="fa fa-globe"></i>
            <a href="{{url('admin/domains')}}">Domains</a>
        </li>
        @endif
        
    </ul>
</div>