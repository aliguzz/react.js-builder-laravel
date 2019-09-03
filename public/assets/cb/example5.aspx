<%@ Page Language="VB"%>
<%@ OutputCache Location="None" VaryByParam="none"%>
<%@ Import Namespace="System.Data" %>
<%@ Import Namespace="System" %>
<%@ Import Namespace="System.Web" %>
<%@ Import Namespace="System.IO" %>

<script runat="server">

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim sContent As String = File.ReadAllText(Server.MapPath(".") & "\" & "content.html")
        litContent.Text = sContent
    End Sub
  
</script>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">  

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,800' rel='stylesheet' type='text/css'>
    <link href="http://34.217.146.254/public/cb/assets/default/content.css" rel="stylesheet" type="text/css" />

    <link href="scripts/contentbuilder.css" rel="stylesheet" type="text/css" />
</head>
<body>


<div class="container">
    <div class="row clearfix">
        <div class="column full center">
            <br /><br /><br />
            <button onclick="save()" class="btn btn-primary"> Save </button>
            <br /><br />
        </div>
    </div>
</div>

<div id="contentarea" class="container">
    <asp:Literal ID="litContent" runat="server"></asp:Literal>
</div>

<script src="scripts/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui.min.js" type="text/javascript"></script>
<script src="scripts/contentbuilder.js" type="text/javascript"></script>
<script src="scripts/saveimages.js" type="text/javascript"></script>

<script type="text/javascript">

    jQuery(document).ready(function ($) {

        $("#contentarea").contentbuilder({
            zoom: 0.85,
            snippetFile: 'http://34.217.146.254/public/cb/assets/default/snippets.html'
        });

    });


    function save() {
        
        //Save Images
        $("#contentarea").saveimages({
            handler: 'saveimage.ashx',
            onComplete: function () {

                //Get Content
                var sHTML = $('#contentarea').data('contentbuilder').html();

                //Save Content
                $.ajax({
                    url: "savecontent.ashx",
                    type: "post",
                    data: {
                        content: encodeURIComponent(sHTML)
                    },
                    success: function (result) {
                        alert('Success');
                    },
                    error: function () {
                        alert('Failure');
                    }
                }); 

            }
        });
        $("#contentarea").data('saveimages').save();

    }

</script>

</body>
</html>
