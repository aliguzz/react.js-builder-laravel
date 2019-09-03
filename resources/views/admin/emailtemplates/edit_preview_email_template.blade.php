<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Default Example</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">  

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,800' rel='stylesheet' type='text/css'>
        <style>
            div#contentarea {
                border: 3px solid #5588B5;
                padding: 10px;
                border-radius: 10px;
                box-shadow: 0px 0px 15px 2px #5588B5;
            }
        </style>
        <!-- Validation -->
        <link href="{{ asset('cb/assets/minimalist-basic/content.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('cb/scripts/contentbuilder.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <br />
        <br />
        <br />

        <div id="contentarea" class="container">
            {!!@$template['content']!!}
        </div>
        <div id="panelCms" style="width:220px;margin:0 0 0 -110px;left:50%;height:38px;background:rgba(255,255,255,0.8);position:fixed;top:0;padding:10px;text-align:center;white-space:nowrap;">
            <button onclick="save()" class="btn btn-primary" style="padding: 12px 20px;font-size: 1em;line-height: 1;"> Save </button>
        </div>
        <form id="update_content" action="{{url('/admin/update_email_template')}}" method="POST">
            <input type="hidden" name="action" value="{!!$action!!}">
            <input type="hidden" id="temp_id" name="id" value="{!!@$template['id']!!}">
            <input type="hidden" id="rand_id" name="rand_id" value="{!!$rand_id!!}">
            {{ csrf_field() }}
            <textarea name="content" id="contentwithck" style="opacity: 0; height:0; width:0">{!!@$template['content']!!}</textarea>
        </form>
        <script src="{{ asset('cb/scripts/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('cb/scripts/jquery-ui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('cb/scripts/contentbuilder.js')}}" type="text/javascript"></script>
        <script>
                jQuery(document).ready(function ($) {

                    $("#contentarea").contentbuilder({
                        snippetOpen: true,
                        zoom: 0.85,
                        snippetFile: "{!!asset('cb/assets/minimalist-basic/snippets.html')!!}"
                    });

                });
                function save() {
                    var sHTML = $('#contentarea').data('contentbuilder').html();
                    $("#contentwithck").val(sHTML);
                    $("#update_content").submit();
                }
        </script>


    </body>
</html>
