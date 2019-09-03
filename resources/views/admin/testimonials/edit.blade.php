@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader') 
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui/jquery.ui.spinner.js')}}"></script>


<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content-space fix-width">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h3>{!!$action!!} Testimonial</h3></div>
                </div>
        
        <div class="box">
            <div class="box-content border">
                <form id="lg-form" enctype="multipart/form-data" class="form-horizontal form-validate" action="{{url('/admin/testimonials')}}" method="POST" novalidate="novalidate">
                    <div class="form_wrap">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <div class="">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" data-rule-required="true" aria-required="true" value="{!!@$Testimonial['name']!!}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="message">Message</label>
                            <div class="">
                                <textarea data-rule-required="true" aria-required="true" rows="5" class="form-control" name="message" id="message">{!!@$Testimonial['message']!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="rating">Rate</label>
                            <div class="">
                                <select class="form-control" name="rating" id="rating">
                                    @for($i=1; $i<=5; $i++)
                                    <option @if(isset($Testimonial['rating']) && $Testimonial['rating'] == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Image</label>
                            <div class="">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail">
                                        @if(isset($Testimonial['image']) && ($Testimonial['image'] != ''))
                                        <img class="image-display" id="image_upload_preview" height="115px" src="{{URL::to('uploads/testimonials/'.$Testimonial['image'])}}" />
                                        @else 
                                        <img class="image-display" id="image_upload_preview" height="115px" src="{{URL::to('public/frontend/images/default.png')}}" />
                                        @endif 
                                    </div>
                                    <div>
                                        <div class="clear5"></div>
                                        <input accept="image" class="image-input btn btn-info" type="file" id="inputFile" name='image'/>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <input type="hidden" name="action" value="{!!$action!!}">
                        <input type="hidden" name="id" value="{!!@$Testimonial['id']!!}">
                        {{ csrf_field() }}
                        @php 
                        $disabled = '';
                        if(isset($Testimonial['featured']) && $Testimonial['featured'] != 1 && $total_featured == 3){
                        $disabled = 'disabled';
                        }
                        if(!isset($Testimonial['featured']) && $total_featured == 3){
                        $disabled = 'disabled';
                        }
                        @endphp
                        <div class="form-group">
                            <label class="control-label pt_0" for="is_active">Featured</label>
                            <div class="">
                                <input {{$disabled}} type="radio" name="featured" value="1" @if(!isset($Testimonial['featured']) || $Testimonial['featured'] == 1) checked @endif /> Yes &nbsp;&nbsp;
                                    <input {{$disabled}} type="radio" name="featured" value="0"  @if(isset($Testimonial['featured']) && $Testimonial['featured'] == 0) checked @endif/> No
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label pt_0" for="is_active">Status</label>
                            <div class="">
                                <input type="radio" name="is_active" value="1" @if(!isset($Testimonial['is_active']) || $Testimonial['is_active'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="is_active" value="0"  @if(isset($Testimonial['is_active']) && $Testimonial['is_active'] == 0) checked @endif/> Inactive
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-12 text-right">
                                    <a href="{{url('/admin/testimonials')}}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-preview">Continue</button>
                                </div>
                            </div>    
                        </div>
                    </div>    
                </form>
            </div>
        </div>
            </div>
        </div>
    </section>
</div>
<script>
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });
</script>
@endsection
