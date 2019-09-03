@extends('admin.layouts.app')
@section('content')


<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600,800' rel='stylesheet' type='text/css'>
        <style>
            section#contentarea {
                border: 3px solid #5588B5;
                padding: 10px;
                border-radius: 10px;
                box-shadow: 0px 0px 15px 2px #5588B5;
                margin: 0 0 0 20px;
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
        
        <section id="contentarea" style="background:#fff;" class="container">
            {!!@$template['content']!!}
        </section>
        
        
       
        <div class="clearfix"></div>
        
        <form id="update_content" action="{{url('/admin/email-templates')}}" method="POST">
            <input type="hidden" name="action" value="{!!$action!!}">
            <input type="hidden" id="temp_id" name="id" value="{!!@$template['id']!!}">
            <input type="hidden" id="refer" name="refer" value="{!!@$_GET['refer']!!}">
            <input type="hidden" id="return_url" name="return_url" value="{!!@$_GET['ref']!!}">
            {{ csrf_field() }}
            <textarea name="content" id="contentwithck" style="opacity: 0; height:0; width:0">{!!@$template['content']!!}</textarea>
        </form>
        
<!--        <script src="{{ asset('assets/cb/scripts/jquery-1.11.1.min.js')}}" type="text/javascript"></script>-->
        <script src="{{ asset('assets/cb/scripts/jquery-ui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/cb/scripts/contentbuilder.js')}}" type="text/javascript"></script>
        <script>
                jQuery(document).ready(function ($) {
                    $("#contentarea").contentbuilder({
                        snippetOpen: true,
                        zoom: 0.85,
                        snippetFile: "{!!url('assets/cb/assets/minimalist-basic/snippets.html')!!}"
                    });
                    

                });
                function save() {
                    var sHTML = $('#contentarea').data('contentbuilder').html();
                    $("#contentwithck").val(sHTML);
                    $("#update_content").submit();
                }
                
                
        </script>

@endsection