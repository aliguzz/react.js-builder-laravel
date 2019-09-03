<div class="col-md-8">
    <div class="Inner_Content">
        <h2 class="ui header pull-left">Manage Digital Assets</h2>
        <a class="cf-add-new-button" data-toggle="tooltip" title="New Asset" href="{{url('/admin/assets/create')}}">
            <i class="fa fa-plus"></i>
        </a>


        <div class="clear20"></div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Sent From</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($digitalassets as $da)
                    <tr>
                        <td>{!!$da->name!!}<br><a title="Edit" href="{{url('/admin/assets/'.$da->id.'/edit')}}">{!!$da->file!!}</a></td>
                        <td>{!!$da->from_name!!}<br>{!!$da->from_email!!}</td>
                        <td><a title="Copy path" href="{!!url('uploads/digital_assets/'.$da->file)!!}" class="copytoclipboard"><i class="fa fa-link fa-fw"></i></a><a href="{!!url('uploads/digital_assets/'.$da->file)!!}" class="downloadtomachine" title="Download" target="_blank"><i class="fa fa-download fa-fw"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>