/* edit Images using aviary */
var featherEditor = new Aviary.Feather({
                //DOCUMENTATION IS AVAILABLE HERE https://creativesdk.adobe.com/docs/web/#/articles/gettingstarted/index.html 
                apiKey: 'fd64249ae6ba4cb9a4c6a6fb49d2d651', // your api key , you can get one from http://developers.aviary.com/
                //THUTS MY API KEY U CUN USE THUT OR CREATE UR OWN..
                apiVersion: 3, // the api version .
                theme: 'dark', // 'light' or 'dark'
                tools: 'all',  // specify tools here.              
                appendTo: '',
                onSave: function(imageID, newURL) {
                    var img = document.getElementById(imageID);
                    img.src = newURL; // after save, replacs the image with the new one from aviary.com
                },
                // onError: function(errorObj) { 
                //     alert(errorObj.message);
                // },
            });
function launchEditor(id, src) {
    featherEditor.launch({
        image: id,
        url: src
    });
    return false;
}

/* replace the privew image with the new uploaded image, then send it to aviary javascript code */
window.parent.document.getElementById("editPrvImage").onclick = function() {
	console.log($('.selectedElementEditor').offset().top);
	$('.avpw.avpw_main_mode').css('top',$('.selectedElementEditor').offset().top)
    var url = $('#componentElementImg').attr("src");
    return launchEditor('componentElementImg', url);  
}
