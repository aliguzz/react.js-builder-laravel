<div class="col-md-8">
    <div class="Inner_Content">
        <p class="helpinfotextarea">
            <i class="fa fa-exclamation-triangle"></i>
            <strong>Important Note:</strong>
            SMTP settings are required to send mails if you didn't setup emails will not send.
        <div class="form_wrap">
            <form id="smtp-form" class="form-horizontal form-validate" action="{{url('/admin/smtp')}}" method="POST" novalidate="novalidate">
                {{ csrf_field() }}

                <div class="form-group clearfix">
                    <label for="email" class="col-sm-4 control-label">From Name</label>
                    <div class="col-sm-8">
                        <input class="form-control" name="from_name" placeholder="Send From Name" id="" type="text" aria-required="true" data-rule-required="true" value="{!!@$smtp->from_name!!}">

                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="phone" class="col-sm-4 control-label"> From Email</label>
                    <div class="col-sm-8">
                        <input class="form-control" name="from_email" placeholder="Send From Email Address" value="{!!@$smtp->from_email!!}" type="email" aria-required="true" data-rule-required="true" data-rule-email="true">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8 text-right">
                        <button type="submit" class="btn btn-success">Create Smtp integration</button>
                    </div>
                </div>
                <div class="clear20"></div>
            </form>
        </div>
        </p>
    </div>
</div>