
<h1>Users <span class="badge">{{@$total}}</span>
    @if(have_premission(array(33)))
    <a href="{{url('/admin/users/create')}}" class="btn btn-info pull-right">Add New User</a>
    @endif
    <div class="clearfix"></div>
</h1>
<div class="col-md-12">
    <div class="box">
        <div class="box-content">
            <div class="table-responsive">
                <table class="table table-hover no-margin table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Signup Date</th>     
                            <th>Status</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                        <tr>
                            <td>{!! $item->first_name !!} {!! $item->last_name !!}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role_name }}</td>
                            <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>                                                     
                            <td>@if($item->is_active == 1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</td>
                            <td>     
                                @if($item->id != 1)
                                @if(have_premission(array(34)))
                                <a href="{{ url('/admin/users/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-fw"></i></a>
                                @endif
                                @if(have_premission(array(35)))
                                {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['admin/users', $item->id],
                                'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash fa-fw" title="Delete User"></i>', ['class' => 'delete-form-btn']) !!}
                                {!! Form::submit('Delete', ['class' => 'hidden deleteSubmit']) !!}
                                {!! Form::close() !!}
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach  
                        @if (count($users) == 0)
                        <tr><td colspan="6"><div class="no-record-found alert alert-warning">No user found!</div></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <nav class="pull-right">{!! $users->render() !!}</nav>
        </div>
    </div>
</div>

