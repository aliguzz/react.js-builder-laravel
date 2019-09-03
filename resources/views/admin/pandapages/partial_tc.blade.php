@foreach($template_categories as $tc)
<div class="col-md-4 tiles-tc">
    <div class="ui card">
        <div class="header">{!!$tc->title!!}</div>
        <div class="dimmable image">
            <div class="ui dimmer">
                <div class="content">
                    <div class="center">
                        <a class="ui inverted button" href="{{url('admin/panda-pages/choose-templates/'.$tc->id)}}">
                            Select Panda
                        </a>
                    </div>
                </div>
            </div>
            <img src="{{asset('uploads/template_categories/'.$tc->thumbnail)}}" alt="#">
        </div>
        <div class="content">
            <div class="description">{!!$tc->short_description!!}</div>
        </div>
    </div>
</div>
@endforeach