<?php
header("X-XSS-Protection: 0");

if ($_POST['hidContent']) {

    $myFile = "content-header.html";
    $stringData = $_POST['hidHeader'];
    file_put_contents($myFile,$stringData);

    $myFile = "content-body.html";
    $stringData = $_POST['hidContent'];
    file_put_contents($myFile,$stringData);

	header("Location: example10.php");
	exit;
}
?>
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
		<?php
		$myFile = "content-header.html";
		$fh = fopen($myFile, 'r');
		$theData = fread($fh, filesize($myFile));
		fclose($fh);
		echo $theData;
		?>
	</div>	
</div>

<!-- CONTENT AREA -->
<div id="contentarea" class="container">

    <?php
    $myFile = "content-body.html";
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, filesize($myFile));
    fclose($fh);
    echo $theData;
    ?>

</div>

<br /><br />

<!-- Hidden Form Fields to post content -->
<form id="frmContent" method="post">
	<input id="hidHeader" name="hidHeader" type="hidden" />
	<input id="hidContent" name="hidContent" type="hidden" />
</form>

<!-- CUSTOM PANEL (can be used for "save" button or your own custom buttons) -->
<div id="panelCms">
    <button onclick="alert('Sample of custom button')" class="btn btn-default"> Custom Button </button> &nbsp;
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
            handler: 'saveimage.php',
            onComplete: function () {

				//Submit Content
                var sHeader = $('#headerarea').data('contentbuilder').html();
				var sContent = $('#contentarea').data('contentbuilder').html();
				$('#hidHeader').val(sHeader);
				$('#hidContent').val(sContent);			
				$('#frmContent').submit(); 
 
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
