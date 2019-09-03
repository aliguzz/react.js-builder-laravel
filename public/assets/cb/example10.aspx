<%@ Page Language="VB" AutoEventWireup="false" ValidateRequest="false" %>
<%@ OutputCache Location="None" VaryByParam="none"%>
<%@ Import Namespace="System.Data" %>
<%@ Import Namespace="System" %>
<%@ Import Namespace="System.Web" %>
<%@ Import Namespace="System.IO" %>

<script runat="server">

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        
        If Not Page.IsPostBack Then
            'Load
            Dim sHeader As String = File.ReadAllText(Server.MapPath(".") & "\" & "content-header.html")
            litHeader.Text = sHeader
        
            Dim sContent As String = File.ReadAllText(Server.MapPath(".") & "\" & "content-body.html")
            litContent.Text = sContent
        End If
        
    End Sub

    Protected Sub btnPost_Click(sender As Object, e As System.EventArgs) Handles btnPost.Click

        'Save
        Dim sHeaderFile As String = "content-header.html"
        File.WriteAllText(Context.Server.MapPath(".") & "\" & sHeaderFile, System.Uri.UnescapeDataString(hidHeader.Value))
        
        Dim sContentFile As String = "content-body.html"
        File.WriteAllText(Context.Server.MapPath(".") & "\" & sContentFile, System.Uri.UnescapeDataString(hidContent.Value))
        
        'Load
        Dim sHeader As String = File.ReadAllText(Server.MapPath(".") & "\" & "content-header.html")
        litHeader.Text = sHeader
        
        Dim sContent As String = File.ReadAllText(Server.MapPath(".") & "\" & "content-body.html")
        litContent.Text = sContent
        
        Response.Redirect(Me.ResolveUrl("example10.aspx"))
        
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
    <link href="http://34.217.146.254/public/cb/assets/minimalist-basic/content.css" rel="stylesheet" type="text/css" />
    

    <link href="scripts/contentbuilder.css" rel="stylesheet" type="text/css" />
    <style>
		.header {position:relative;margin:0 0 50px;padding:0;box-sizing:border-box;background-size: cover;color:#fff !important}
		.headeroverlay {background-color: #000;opacity: 0.2;position:absolute;width:100%;height:100%;}
		#headerarea {padding:130px 0 110px;position: relative;}
		        
        body {margin:0 0 57px} /* give space 70px on the bottom for panel */
        #panelCms {width:100%;height:57px;border-top: #eee 1px solid;background:rgba(255,255,255,0.95);position:fixed;bottom:0;padding:10px;box-sizing:border-box;text-align:center;white-space:nowrap;z-index:10001;}
        #panelCms button {border-radius:4px;padding: 10px 15px;text-transform:uppercase;font-size: 11px;letter-spacing: 1px;line-height: 1;}
    </style>
</head>
<body>

<!-- HEADER AREA -->
<div class="header" style="background-image: url(assets/header.jpg);background-position:50% 60%">
	<div class="headeroverlay"></div>
    <div id="headerarea" class="container">

        <asp:Literal ID="litHeader" runat="server"></asp:Literal>

    </div>	
</div>

<!-- CONTENT AREA -->
<div id="contentarea" class="container">

    <asp:Literal ID="litContent" runat="server"></asp:Literal>

</div>

<br /><br />

<!-- Hidden Form Fields to post content -->
<form id="form1" runat="server" style="display:none">
    <asp:HiddenField ID="hidHeader" ClientIDMode="Static" runat="server" />
    <asp:HiddenField ID="hidContent" ClientIDMode="Static" runat="server" />
    <asp:Button ID="btnPost" runat="server" Text="Button" />
</form>

<!-- CUSTOM PANEL (can be used for "save" button or your own custom buttons) -->
<div id="panelCms">
    <button onclick="view()" class="btn btn-default"> View HTML </button> &nbsp;
    <button onclick="save()" class="btn btn-primary"> Save </button> &nbsp;
</div>

<script src="scripts/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui.min.js" type="text/javascript"></script>
<script src="scripts/contentbuilder.js" type="text/javascript"></script>
<script src="scripts/saveimages.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        //Run the builder
        $("#contentarea,#headerarea").contentbuilder({
            zoom: 0.85,
            snippetOpen: true,
            imageselect: 'images.html',
            fileselect: 'images.html',
            snippetFile: 'http://34.217.146.254/public/cb/assets/minimalist-basic/snippets.html',
            toolbar: 'left',
            axis: 'y'
        });

    });

    function save() {

        //Save Images
        $("body").saveimages({
            handler: 'saveimage.ashx',
            onComplete: function () {

                //Submit Content
                var sHeader = $('#headerarea').data('contentbuilder').html();
                $('#hidHeader').val(encodeURIComponent(sHeader))
                var sContent = $('#contentarea').data('contentbuilder').html();
                $('#hidContent').val(encodeURIComponent(sContent))

                $('#btnPost').click()   
 
            }
        });
        $("body").data('saveimages').save();

        return false;

    }

    function view() {
        $('#contentarea').data('contentbuilder').viewHtml(); //this is just a helper method to view/edit HTML source.
        return false;
    }
</script>


</body>
</html>



