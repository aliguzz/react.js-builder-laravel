@extends('admin.layouts.app')
@section('content')


<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600,800' rel='stylesheet' type='text/css'>
        <style>
            textarea#contentarea {
                border: 3px solid #5588B5;
                padding: 10px;
                border-radius: 10px;
                box-shadow: 0px 0px 15px 2px #5588B5;
                margin: 0 0 0 20px;
            }
            #lnkToolOpen{
                display:none !important;
                
            }
            .tagsname{
                font-size: 12px !important;
                padding: 5px !important;
            }
        </style>
        <!-- Validation -->
        <link href="{{ asset('assets/cb/assets/minimalist-basic/content.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/cb/scripts/contentbuilder.css')}}" rel="stylesheet" type="text/css" />
    

        <br />
        <br />
        <br />
<center>
            <button onclick="save()" class="btn btn-primary" style="padding: 12px 20px;font-size: 1em;line-height: 1;"> Save </button>
        </center>
        <br />
        
       
        
        
       
        <div class="clearfix"></div>
        
        <form id="update_content" action="{{url('/admin/sms-templates')}}" method="POST">
            <input type="hidden" name="action" value="{!!$action!!}">
            <input type="hidden" id="temp_id" name="id" value="{!!@$template['id']!!}">
            <input type="hidden" id="refer" name="refer" value="{!!@$_GET['refer']!!}">
            <input type="hidden" id="return_url" name="return_url" value="{!!@$_GET['ref']!!}">
            {{ csrf_field() }}
             <textarea name="content" id="contentarea" rows="15" style="background:#fff; height:200px; zoom:1; margin: 0 10% 0 15%;" class="container">{!!@$template['content']!!}</textarea>
<!--            <textarea name="content" id="contentwithck" style="opacity: 0; height:0; width:0">{!!@$template['content']!!}</textarea>-->
        </form>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button class="btn btn-success tagsname">[FIRST_NAME]</button> 
                <button class="btn btn-success tagsname">[LAST_NAME]</button>
            </div>
            <div class="col-md-2"></div>
        </div>
<!--        <script src="{{ asset('assets/cb/scripts/jquery-1.11.1.min.js')}}" type="text/javascript"></script>-->
        <script src="{{ asset('assets/cb/scripts/jquery-ui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/cb/scripts/contentbuilder.js')}}" type="text/javascript"></script>
        <script>
                jQuery(document).ready(function ($) {

                    $("#contentarea").contentbuilder({
                        snippetOpen: false,
                        snippetFile: "{!!url('assets/cb/assets/minimalist-basic/snippets.html')!!}"
                    });
                    
                    $('.tagsname').click(function(){    
                       valuess = $(this).html(); 
                       realvalue = $('#contentarea').val();
                       $('#contentarea').val(realvalue +''+ valuess);
                    });

                });
                function save() {
                    var sHTML = $('#contentarea').data('contentbuilder').html();
                    $("#contentwithck").val(sHTML);
                    //alert($("#contentwithck").val());
                    $("#update_content").submit();
                }
        </script>

@endsection