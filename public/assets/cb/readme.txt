ContentBuilder.js ver. 1.8.2


*** USAGE ***

1. Includes:

	<link href="scripts/contentbuilder.css" rel="stylesheet" type="text/css" />

	<script src="scripts/contentbuilder.js" type="text/javascript"></script>

2. Run:

	$("#contentarea").contentbuilder({
		  zoom: 0.85,
		  snippetFile: 'snippets.html'
		  });

	The zoom parameter allows you to make the editing area smaller, to give you overall look of the content. Values can be 0.8 to 1.
	Content zoom can also be set from the slider under the content blocks.

	The snippetFile parameter refers to a html file containing snippets collection. You can add your own snippets in this file (snippets.html).

3. To get HTML:

    var sHTML = $('#contentarea').data('contentbuilder').html();
    alert(sHTML);




*** ADDITIONAL ***


To load HTML at runtime:

	$("#contentarea").data('contentbuilder').loadHTML('<h1>Heading text</h1>');

To view HTML:

	$('#contentarea').data('contentbuilder').viewHtml();

To set the editing mode to "SAFE MODE":

	$("#contentarea").contentbuilder({
            editMode: 'safe',
            .....
            });

	Safe mode will make each text element fixed.
	In Safe mode, you can specify text elements that can be edited using "selectable" parameter: (this is optional)

	$("#contentarea").contentbuilder({
			editMode: 'safe',
            selectable: 'h1,h2,h3,h4,h5,h6,p,ul,ol,small,.edit',
            .....
            });

To make the snippet tool slide from left, use 'snippetTool' property, for example:

	$("#contentarea").contentbuilder({
            snippetTool: 'left',
            .....
            });

To enable custom image or file select dialog:

	$("#contentarea").contentbuilder({
            imageselect: 'images.html',
            fileselect: 'images.html',
            .....
            });


	- imageselect specifies custom page to open from the image dialog.
	- fileselect specifies custom page to open from the link dialog.
	
	Please see images.html (included in this package) as a simple example. 
	Use selectAsset() function as shown in the images.html to return a value to the dialog.

To disable zoom feature:

	$("#contentarea").contentbuilder({
            enableZoom: false,
            .....
            });

To disable/destroy the plugin at runtime:

    if ($('#contentarea').data('contentbuilder')) $('#contentarea').data('contentbuilder').destroy();

To specify custom colors:

	$("#contentarea").contentbuilder({
            colors: ["#ffffc5","#e9d4a7","#ffd5d5","#ffd4df","#c5efff","#b4fdff","#c6f5c6","#fcd1fe","#ececec",                            
                "#f7e97a","#d09f5e","#ff8d8d","#ff80aa","#63d3ff","#7eeaed","#94dd95","#ef97f3","#d4d4d4",                         
                "#fed229","#cc7f18","#ff0e0e","#fa4273","#00b8ff","#0edce2","#35d037","#d24fd7","#888888",                         
                "#ff9c26","#955705","#c31313","#f51f58","#1b83df","#0bbfc5","#1aa71b","#ae19b4","#333333"],
            .....
            });

To open snippet panel on first load:

	$("#contentarea").contentbuilder({
            snippetOpen: true,
            .....
            });

To run custom script when a block is dropped (added) to the content:

    $("#contentarea").contentbuilder({
        onDrop: function (event, ui) {
            alert(ui.item.html());  //custom script here
        },
        .....
    });

To run custom script when content renders/updated:

    $("#contentarea").contentbuilder({
        onRender: function () {
            //custom script here
        },
        .....
    });

To disable Direct Image Embed:

    $("#contentarea").contentbuilder({
        imageEmbed: false,
        .....
    });

To disable HTML source editing:

    $("#contentarea").contentbuilder({
        sourceEditor: false,
        .....
    });

To have left editor toolbar:

    $("#contentarea,#headerarea").contentbuilder({
        toolbar: 'left',
		.....
    });

If you have multiple DIVs (drop area) which are vertically positioned (ex. top/middle/bottom DIVs, and not left/center/right DIVs), this option will make sorting blocks more easy (see example7.html):
    
	$("#contentarea,#headerarea").contentbuilder({
        axis: 'y',
		.....
    });

Now it's possible to make an image not replaceable. Just add data-fixed="1" to the <img> element on the snippet file (snippets.html), for example:

	<img data-fixed="1" src=".." />

If you want to develop your own panel, and don't want to use the sliding side panel for the snippets, 
you can use "snippetList" parameter. Please set this parameter with the ID of your custom DIV where you want to place all the snippets.
Important Note: 
Your must have your custom panel or DIV ready before using this feature. 
Developing custom panel is beyond of our support scope. 

    $("#contentarea").contentbuilder({
        snippetList: '#MyDivId',
        snippetFile: 'http://34.217.146.254/public/cb/assets/default/snippets.html'
    });

To make a snippet not editable, add data-mode="readonly" on the snippet's DIV, for example:

	<div data-thumb="..../01.png">
		<div class="row clearfix" data-mode="readonly"> 
			......
		</div>
	</div>

To have the editing toolbar always displayed (after cursor is placed on text):

    $("#contentarea").contentbuilder({
        toolbarDisplay: 'always',
        .....
    });

Now you can put assets folder not on its default location. Path adjustment will be needed using snippetPathReplace parameter, for example:

    $("#contentarea").contentbuilder({
        snippetPathReplace: ['http://34.217.146.254/public/cb/assets/minimalist-basic/', 'mycustomfolder/http://34.217.146.254/public/cb/assets/minimalist-basic/'],
        .....
    });

*** EXAMPLES ***


Content Builder provides you with collection of snippets to drag & drop. 
You can customize the snippets (adding more, etc) by modifying the snippets file and its css.
The package contains 3 example of snippets that you can use:

- http://34.217.146.254/public/cb/assets/default/snippets.html
  See example1.html

- assets/simple/snippets.html
  See example2.html

- http://34.217.146.254/public/cb/assets/classic/snippets.html
  See example3.html



*** ADDITIONAL EXAMPLES ***


- example4.html (with Save button for saving into browser's localStorage)

	Step 1: Here is how to save into browser's localStorage:

		var sHTML = $('#contentarea').data('contentbuilder').html();
        localStorage.setItem('mycontent', sHTML);

	Step 2: Here is how to read content from browser's localStorage:

		$("#contentarea").html(localStorage.getItem('mycontent'));


- example5.php and example5.aspx (shows how to save embedded images into files and then save content to the server)

	Step 1: Include SaveImages.js plugin:

		<script src="scripts/saveimages.js" type="text/javascript"></script>

	Step 2: Implement Saving as follows:

		function save() {
        
			//Save Images
			$("#contentarea").saveimages({
				handler: 'saveimage.php',
				onComplete: function () {

					//Get Content
					var sHTML = $('#contentarea').data('contentbuilder').html();

					//Save Content
					.....

				}
			});
			$("#contentarea").data('saveimages').save();

		}

	Step 3: Specify folder on the server for storing images on saveimage.php (or saveimage.ashx if you're using .NET).

	Step 4: In this example, we use AJAX to post content to the server.
		
		In this example, we post content to savecontent.php (or savecontent.ashx) which save the content to content.html file

		var sHTML = $('#contentarea').data('contentbuilder').html();
		$.ajax({
            url: "savecontent.php",
            type: "post",
            data: {
                content: sHTML
            }
        }); 

- example6.html (example of multiple instance editable area)

- example7.html (example of custom CMS interface, to edit page with WIDE layout)

- example8.html (example of custom CMS interface, to edit page with BOXED layout)

- example9 (example of custom image & file select dialog and example of Print button)

- example10.php and example10.aspx (THIS IS A COMPLETE EXAMPLE)

	This example show how to save content using NORMAL FORM - not AJAX as in example5. 
	
	Also shows how to submit multiple instance of content area.

	This example use a new snippets collection "minimalist-basic", which is available at:
	
		http://34.217.146.254/public/cb/assets/minimalist-basic/snippets.html

	This collection is a basic version of our large snippets collection which is available at:

	http://innovastudio.com/content-builder/never-write-boring-content-again.aspx

	This collection uses snippets' CATEGORIES.

	Snippets' Categories setting is as follows:

		$("#contentarea").contentbuilder({
				 ...
				 snippetCategories: [
					 [0,"Default"],
					 [-1,"All"],
					 [1,"Title"],
					 [2,"Title, Subtitle"],
					 [3,"Info, Title"],
					 [4,"Info, Title, Subtitle"],
					 [5,"Heading, Paragraph"],
					 [6,"Paragraph"],
					 [7,"Paragraph, Images + Caption"],
					 [8,"Heading, Paragraph, Images + Caption"],
					 [9,"Images + Caption"],
					 [10,"Images + Long Caption"],
					 [11,"Images"],
					 [12,"Single Image"],
					 [13,"Call to Action"],
					 [14,"List"],
					 [15,"Quotes"],
					 [16,"Profile"],
					 [17,"Map"],
					 [20,"Video"],
					 [18,"Social Links"],
					 [19,"Separator"]
					 ]
			 });

	On the snippets file, you can add, for example, data-cat="0,6" means it will be displayed on "Default" and "Paragraph" category.

	For example:
 
		<div data-thumb="assets/minimalist/thumbnails/g01.png" data-cat="0,6">
			.....HTML snippet here....
		</div>
