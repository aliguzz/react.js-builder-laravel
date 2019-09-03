jQuery(document).ready(function ($) {
    $("#contentarea").contentbuilder({
        zoom: 0.85, 
        // snippetFile: 'http://127.0.0.1/public/cb/assets/default/snippets.html'
    });

    $( ".view-html").on( 'click', function(e) {
    	var sHTML = $('#contentarea').data('contentbuilder').viewHtml();
    });

	$( ".save-html").on( 'click', function(e) {
		alert( " You can add custom code here " );
    });    
});