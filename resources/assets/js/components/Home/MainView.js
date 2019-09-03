import React from 'react';
import { ADDPROJECTDETAIL} from '../../constants/actionTypes';
import $ from 'jquery';
import { connect } from 'react-redux';

const mapStateToProps = state => { 
    return {
        common: state.common
    }};

const mapDispatchToProps = dispatch => ({
 addProjectDetail: (data) => dispatch({ type: ADDPROJECTDETAIL , payload:{projectDetail:data}})
});

function removeParam(key, sourceURL)
{
    var rtn = sourceURL.split("?")[0],
    param, params_arr = [],
    queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "")
    {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1)
        {
            param = params_arr[i].split("=")[0];
            if (param === key)
            {
                params_arr.splice(i, 1);
            }
        }
        if(params_arr.length)
        {
            rtn = rtn + "?" + params_arr.join("&");
        }
    }
    return rtn;
}
var thisRef;
class MainView extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            showSettingPopup:true
        }
        thisRef = this;
    }

	componentDidMount()
	{
       var projectId = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
        fetch(window.baseURL+"/api/projects/"+projectId,{credentials: 'include'})
            .then(res => res.json())
            .then(
                (result) => {
                    var current_this = this;
                    var project = result.project;
                    var curerent_index = 0;
                    var not_found = true; 
                    window.ProjectPages = project.pages;
                    window.userDetails = project.model.users["0"];
                    project.pages.forEach(function(key,index){
                        if(key == 'index'){
                            current_this.props.addProjectDetail(
                                {
                                    project: project,
                                    currentPage: project.pages[index],
                                    projectId:projectId,
                                    currentPageIndex: index,
                                    device:'desktop',
                                    has_blog:project.model.has_blog
                                }
                            );
                            window.projectId = projectId;
                            window.currentPage = project.pages[index];
                            curerent_index = index;
                            not_found = false;
                        }
                    });
                    if(not_found){
                        current_this.props.addProjectDetail(
                            {
                                project: project,
                                currentPage: project.pages[0],
                                projectId:projectId,
                                currentPageIndex: 0,
                                device:'desktop',
                                has_blog:project.model.has_blog
                            }
                        );
                    }
                    window.devicetype = "desktop";
                    window.CurrentPages = curerent_index;
                    $("#mainEditorFrame").attr("src", window.baseURL+"/storage/temp_projects/"+project.model.users["0"].id+"/"+project.model.uuid+"/desktop/"+project.pages[curerent_index]+".html");
                   
                    setTimeout(function(){
                        var anchor_html = '';
                        var simple_html = '';
                        window.ProjectPages.forEach(function(key,index){
                            if(index == window.CurrentPages){
                                var _class = "active";
                                var _class2 = "checked";
                            }else{
                                var _class = "";
                                var _class2 = "";
                            }
                            if(key != 'thankyou'){
                            simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a data-item=\""+(window.zIndex++)+"\" class='componentElement' href=\""+key+".html\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
                            anchor_html += "<div data-item=\""+(window.zIndex++)+"\" class=\"checkbox\"> <input data-item=\""+(window.zIndex++)+"\" class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\"> <label data-item=\""+(window.zIndex++)+"\" class='componentElement' for=\"check-"+index+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
                            }
                        });
                        $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
                        $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
                    },1000);
                    /*************Umer Surkhail Code For Dragging Start**************/
                    var top = 0;
                    var left = 0;
                    window.elementSelectedPositionTopPercent = 0; 
                    window.elementSelectedPositionleftPercent = 0;
                    window.newElement = true; // no need to store in db
                    window.fromConfig = false; // no need to store in db
                    window.incrementalValueForAttribute = 0;
                    window.zIndex = 999999999;
                    var currentElementToDrag;
                    var mY = 0;
                    var upwordDirection = 0;
                    var globalLeft = 0;
                    var globalTop = 0;

                    $("body").on("click", ".audio-holder, .doc-holder, .image-holder, .svg-holder, .video-holder", function()
                    {
                        //if(window.fromConfig)
                        {
                            $(this).toggleClass("imageSelector");
                        }
                    });
                    
                    //check the percentage from where the handle was grabbed (left, top)
                    $("body").on("mousedown", ".singleElementDragger", function(evt)
                    {
                        var offset = $(this).offset();
                        var offsetLeft = parseInt(evt.pageX - offset.left);
                        var offsetTop = parseInt(evt.pageY - offset.top);
                        var elementWidth = parseInt($(this).width());
                        var elementHeight = parseInt($(this).height());
                        window.elementSelectedPositionleftPercent = parseInt((offsetLeft/elementWidth) * 100);
                        window.elementSelectedPositionTopPercent = parseInt((offsetTop/elementHeight) * 100);
                    });
                    $('body').on('focusout', '#socialVideoLink', function (e)
                    {
                        if($(this).val())
                        {
                            var currentUrlElement = $(this);
                            var currentVideo = $(this).val();
                            var currentSelectedComponent = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
                            console.log(currentSelectedComponent);                            
                            // if(currentSelectedComponent.hasClass('componentElement'))
                            // {
                            //     currentSelectedComponent = currentSelectedComponent;
                            // }
                            // else if(currentSelectedComponent.parents('.componentElement').length)
                            // {
                            //     currentSelectedComponent = currentSelectedComponent.parents('.componentElement').first();
                            // }

                            if(currentSelectedComponent[0].hasAttribute('socialbar'))
                            {
                                currentSelectedComponent = currentSelectedComponent;
                            }
                            else if(currentSelectedComponent.parents('[socialbar="1"]').length)
                            {
                                currentSelectedComponent = currentSelectedComponent.parents('[socialbar="1"]').first();
                            }
                            else
                            {
                                if(currentSelectedComponent.hasClass('componentElement'))
                                {
                                    currentSelectedComponent = currentSelectedComponent;
                                }
                                else if(currentSelectedComponent.parents('.componentElement').length)
                                {
                                    currentSelectedComponent = currentSelectedComponent.parents('.componentElement').first();
                                }
                            }


                            console.log(currentSelectedComponent);
                            if(currentSelectedComponent[0].hasAttribute('youtube'))
                            {
                                console.log('editing youtube src');
                                var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
                                var match = currentVideo.match(regExp);
                                var videoSrc = (match&&match[7].length==11)? match[7] : false;
                                if(videoSrc)
                                {
                                    currentSelectedComponent.find('iframe').attr('src', 'https://www.youtube.com/embed/'+videoSrc);
                                }
                                else
                                {
                                    alert("It doesn't look like a valid URL. Can you please verify again?");
                                    currentUrlElement.val('');
                                    
                                }
                            }
                            else if(currentSelectedComponent[0].hasAttribute('dailymotion'))
                            {
                                console.log('its dailymotion');
                                var videoSrc ;
                                var m = currentVideo.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
                                if (m !== null)
                                {
                                    if(m[4] !== undefined)
                                    {
                                        videoSrc = m[4];
                                    }
                                    else
                                    {
                                        videoSrc = m[2];
                                    }
                                    currentSelectedComponent.find('iframe').attr('src', '//www.dailymotion.com/embed/video/'+videoSrc);
                                }
                                else
                                {
                                    alert("It doesn't look like a valid URL. Can you please verify again?");
                                    currentUrlElement.val('');
                                }
                            }
                            else if(currentSelectedComponent[0].hasAttribute('vimoe'))
                            {
                                console.log('its vimeo');
                                console.log(currentVideo);
                                var url = currentVideo;
                                var regExp = /https:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
                                var match = url.match(regExp);

                                if (match)
                                {
                                    currentSelectedComponent.find('iframe').attr('src', 'https://player.vimeo.com/video/'+match[2]);
                                }
                                else
                                {
                                    alert("It doesn't look like a valid URL. Can you please verify again?");
                                    currentUrlElement.val('');
                                }
                            }
                            else if(currentSelectedComponent[0].hasAttribute('dailymotion'))
                            {
                                console.log('its dailymotion');
                                console.log(currentVideo);
                                var url = currentVideo;
                                var regExp = /https:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
                                var match = url.match(regExp);

                                if (match)
                                {
                                    currentSelectedComponent.find('iframe').attr('src', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'+match[2]);
                                }
                                else
                                {
                                    alert("It doesn't look like a valid URL. Can you please verify again?");
                                    currentUrlElement.val('');
                                }
                            }
                            else if(currentSelectedComponent[0].hasAttribute('socialbar'))
                            {
                                console.log('its social icon');
                                console.log(currentVideo);
                                var url = currentVideo;
                                currentSelectedComponent.attr('href', url);
                            }
                            else if(currentSelectedComponent[0].hasAttribute('musicelem'))
                            {
                                console.log('its music element');
                                console.log(currentVideo);
                                var url = currentVideo;
                                currentSelectedComponent.find('source').each(function()
                                {
                                    $(this).attr('src', url);
                                });
                                currentSelectedComponent.find('audio')[0].pause();
                                currentSelectedComponent.find('audio')[0].load();
                            }
                        }
                    })

                    $('body').on('blur','.inputeditable-div input',function(e){
                        var editable_element = $(this);
                        var selecter_attr = editable_element.attr('name');
                        var attr_val = editable_element.val();
                        var currentSelectedComponent = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
                        if(selecter_attr == 'required'){
                            if(attr_val){
                                currentSelectedComponent.prop("required","required");
                            }else{
                                currentSelectedComponent.prop("required",false);
                            }
                        }else{
                            currentSelectedComponent.attr(selecter_attr,attr_val);
                        }
                    });
                    $('body').on('click','#inputConfig .static-area button',function(e){
                        var editable_element = $(this);
                        var selecter_attr = editable_element.attr('data-type');
                        
                        var inputHtml = '<div class="formeditable-div"><label>Name</label><input type="text" name="name" value="" placeholder="Name of field"/></div><div class="formeditable-div"><label>Id</label><input type="text" name="id" value="" placeholder="Unique identifier"/></div><div class="formeditable-div"><label>Class</label><input type="text" name="class" value="" placeholder="Class name"/></div><div class="formeditable-div"><label>Required</label><select  name="required"><option value="false">No</option><option value="true">Yes</option></select></div><div class="formeditable-div"><label>Placeholder</label><input type="text" placeholder="Placeholder" name="placeholder" value=""/></div><input type="hidden" name="tag" value="'+selecter_attr+'"/>';
                        if(selecter_attr == 'select'){
                          
                        }else if(selecter_attr == 'textarea'){
                            inputHtml += '<div class="formeditable-div"><label>Rows</label><input type="text" name="rows" value="" placeholder="5"/></div>';
                        }else{
                            inputHtml += '<div class="formeditable-div"><label>Type</label><select name="type"><option value="number">Number</option><option value="email">Email</option><option value="text">Text</option><option value="radio">Radio</option><option value="checkbox">Checkbox</option><option value="hidden">Hidden</option></select></div>';
                        }
                        inputHtml += '<div class="formeditable-div"><button>Add</button></div>';
                        var top = $('#inputConfig').offset().top;
                        var left = $('#inputConfig').offset().left;
                        $('#inputConfig').hide();
                        $('#formConfig .dynamic-area').html(inputHtml);
                        $('#formConfig').css("top",top+'px');
                        $('#formConfig').css("left",left+'px');
                        $('#formConfig').show();
                    });
                    $('body').on('click','#formConfig .formeditable-div button',function(e){
                        var input_type = $('#formConfig .dynamic-area input[name=tag]').val();
                        var name = $('#formConfig .dynamic-area input[name=name]').val();
                        var id = $('#formConfig .dynamic-area input[name=id]').val();
                        var class_ = $('#formConfig .dynamic-area input[name=class]').val();
                        var placeholder = $('#formConfig .dynamic-area input[name=placeholder]').val();
                        var required = $('#formConfig .dynamic-area input[name=required]').val();
                        var required_code ='';
                        if(required){
                            required_code = ' required="required" ';
                        }
                        var currentSelectedComponent = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
                        var label_class = '';
                        if(currentSelectedComponent.find('.control-label').length){
                            label_class = 'control-label';
                        }
                        if(input_type == 'input'){
                            var type = $('#formConfig .dynamic-area input[name=type]').val();
                            if(type == 'checkbox' || type == 'radio'){
                                var outputHtml = '<label data-item="'+(window.zIndex++)+'"  data-highlightable="1" class="'+label_class+'"><input data-item="'+(window.zIndex++)+'" type="'+type+'"  data-highlightable="1" name="'+name+'" id="'+id+'" '+required_code+' class="'+class_+'"> '+placeholder+'</label>';
                            }else{
                                var outputHtml = '<input data-item="'+(window.zIndex++)+'"  data-highlightable="1" type="'+type+'" name="'+name+'" id="'+id+'" class="'+class_+'" '+required_code+' placeholder="'+placeholder+'">';
                                if(label_class !='' && type != 'hidden'){
                                    outputHtml = '<label data-item="'+(window.zIndex++)+'"  data-highlightable="1" class="'+label_class+'">'+placeholder+'</label>'+outputHtml;
                                }
                            }
                            if(currentSelectedComponent.find('.form-group').length){
                                if(type != 'hidden'){
                                outputHtml = '<div data-item="'+(window.zIndex++)+'"  data-highlightable="1" class="form-group">'+outputHtml+'</div>';
                                }
                            }
                            
                        }else if(input_type == 'select'){
                            var outputHtml = '<select data-item="'+(window.zIndex++)+'"  data-highlightable="1" name="'+name+'" id="'+id+'" class="'+class_+'" '+required_code+'><option value="" disabled="" selected="" hidden="" data-item="'+(window.zIndex++)+'">'+placeholder+'</option></select>';
                            if(label_class !=''){
                                outputHtml = '<label data-item="'+(window.zIndex++)+'"  data-highlightable="1" class="'+label_class+'">'+placeholder+'</label>'+outputHtml;
                            }
                            if(currentSelectedComponent.find('.form-group').length){
                                outputHtml = '<div data-item="'+(window.zIndex++)+'"  data-highlightable="1" class="form-group">'+outputHtml+'</div>';
                            }
                        }else{
                            var rows = $('#formConfig .dynamic-area input[name=rows]').val();
                            var outputHtml = '<textarea data-item="'+(window.zIndex++)+'" data-highlightable="1" name="'+name+'" id="'+id+'" class="'+class_+'" '+required_code+' rows="'+rows+'" placeholder="'+placeholder+'"></textarea>';
                            if(label_class !=''){
                                outputHtml = '<label data-item="'+(window.zIndex++)+'" data-highlightable="1" class="'+label_class+'">'+placeholder+'</label>'+outputHtml;
                            }
                            if(currentSelectedComponent.find('.form-group').length){
                                outputHtml = '<div data-item="'+(window.zIndex++)+'" data-highlightable="1" class="form-group">'+outputHtml+'</div>';
                            }
                        }
                        currentSelectedComponent.prepend(outputHtml);
                      
                    });

                    $('body').on('click','#inputConfig .add-more-options',function(e){
                       var key = $("#inputConfig .dynamic-area .options-select .optionlist").length;
                       key = parseInt(key)+1;
                        var options_html = "<div class='optionlist optionlist"+key+"'><span onclick=\"$('.optionlist"+key+"').remove();$('#playground-editor iframe').contents().find('html').find('.selectedElementEditor option:eq("+key+")').remove();\"><i class='fa fa-times'></i></span><div class='optionvalue optionvalue"+key+"'><label>Value</label><input type='text' value='Option"+key+"'></div><div class='optionplaceholder optionplaceholder"+key+"'><label>Placeholder</label><input type='text' value='Option"+key+"'></div></div>";
                        $("#inputConfig .dynamic-area .options-select").append(options_html);
                        var currentSelectedComponent = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
                        currentSelectedComponent.append('<option data-item="'+(window.zIndex++)+'" value="Option'+key+'">Option'+key+'</option>');
                    });

                    $('body').on('change', "#inputConfig .dynamic-area .options-select .optionvalue input", function (e)
                    {
                        var classes = $(this).parent(".optionvalue").attr("class");
                        classes = classes.replace(new RegExp('optionvalue', 'g'),"");
                        classes = classes.replace(new RegExp(' ', 'g'),"");
                        $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor option:eq('+classes+')').attr("value",$(this).val());
                        
                    });
                    $('body').on('change', "#inputConfig .dynamic-area .options-select .optionplaceholder input", function (e)
                    {
                        var classes = $(this).parent(".optionplaceholder").attr("class");
                        classes = classes.replace(new RegExp('optionplaceholder', 'g'),"");
                        classes = classes.replace(new RegExp(' ', 'g'),"");
                        $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor option:eq('+classes+')').html($(this).val());
                        
                    });

                    $('body').on('change', '#lightbox-on-page-open', function (e)
                    {
                        var currentSelectedComponent = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
                        if(currentSelectedComponent[0].hasAttribute('lightbox')){}else{
                            currentSelectedComponent = currentSelectedComponent.parents('[lightbox="1"]');
                        }
                        if(this.checked){
                            currentSelectedComponent.attr('openOnPageLoad',1);
                        }else{
                            currentSelectedComponent.removeAttr('openOnPageLoad');
                        }
                    });

                    $('body').on('click', '#lightbox_button', function (e)
                    {
                        var currentSelectedComponent = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
                        if(currentSelectedComponent[0].hasAttribute('lightbox')){}else{
                            currentSelectedComponent = currentSelectedComponent.parents('[lightbox="1"]');
                        }
                        var componentuniqueattribute = currentSelectedComponent.attr("componentuniqueattribute");
                        var addedComponent = $('<button data-item="'+(window.zIndex++)+'" class="btn btn-info lightbox-trigger" onClick="$(\'[componentuniqueattribute='+componentuniqueattribute+']\').show();">Show lightbox</button>');

                        var scrollTop = $(window).scrollTop();
                        var scrollLeft = $(window).scrollLeft();
                        var windowWidth = $(window).width();
                        var windowHeight = $(window).height();
                        var calculatedTop = Math.max(0, ((windowHeight - 500) / 2) + scrollTop);
                        var calculatedLeft = Math.max(0, ((windowWidth - 500) / 2) + scrollLeft);
                        var sizeAdditive = 0;

                        $("#mainEditorFrame").contents().find("body").append(addedComponent);
                        
                        addedComponent.addClass('componentElement');
                        addedComponent.attr("componentUniqueAttribute", 'componentUniqueAttribute'+window.incrementalValueForAttribute);
                        addedComponent.addClass('componentUniqueAttribute'+window.incrementalValueForAttribute);

                        window.incrementalValueForAttribute++;       
                        addedComponent.css(
                        {
                            "z-index": window.zIndex,
                            "top": (calculatedTop + sizeAdditive),
                            "position": "absolute",
                            "left": (calculatedLeft + sizeAdditive)
                        });
                        window.zIndex++;
                        addedComponent.attr("data-item", window.zIndex);
                        window.zIndex++;
                    });
                    
                    
                    $('body').on('change', '#autoplayVideo', function (e)
                    {
                        var currentSocialVideoPlayer = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor')
                        if(!currentSocialVideoPlayer.hasClass('componentElement'))
                        {
                            currentSocialVideoPlayer = currentSocialVideoPlayer.parents('.componentElement').find('iframe');
                        }
                        var currentSocialVideoPlayerSrc = currentSocialVideoPlayer.attr('src');
                        if(this.checked)
                        {
                            if(currentSocialVideoPlayerSrc.indexOf('?') != -1)
                            {
                                currentSocialVideoPlayer.attr('src', currentSocialVideoPlayerSrc+'&autoplay=1');
                            }
                            else
                            {
                                currentSocialVideoPlayer.attr('src', currentSocialVideoPlayerSrc+'?autoplay=1');
                            }
                        }
                        else
                        {
                            currentSocialVideoPlayer.attr('src', removeParam('autoplay',currentSocialVideoPlayerSrc));
                        }
                    });
                    
                    $('body').on('change', '#loopVideo', function (e)
                    {
                        var currentSocialVideoPlayer = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor')
                        if(!currentSocialVideoPlayer.hasClass('componentElement'))
                        {
                            currentSocialVideoPlayer = currentSocialVideoPlayer.parents('.componentElement').find('iframe');
                        }
                        var currentSocialVideoPlayerSrc = currentSocialVideoPlayer.attr('src');
                        if(this.checked)
                        {
                            if(currentSocialVideoPlayerSrc.indexOf('?') != -1)
                            {
                                currentSocialVideoPlayer.attr('src', currentSocialVideoPlayerSrc+'&loop=1');
                            }
                            else
                            {
                                currentSocialVideoPlayer.attr('src', currentSocialVideoPlayerSrc+'?loop=1');
                            }
                        }
                        else
                        {
                            currentSocialVideoPlayer.attr('src', removeParam('loop',currentSocialVideoPlayerSrc));
                        }
                    });
                    
                    $('body').on('change', 'input[name="showControl"]', function (e)
                    {
                        var currentSocialVideoPlayer = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor')
                        if(!currentSocialVideoPlayer.hasClass('componentElement'))
                        {
                            currentSocialVideoPlayer = currentSocialVideoPlayer.parents('.componentElement').find('iframe');
                        }
                        var currentSocialVideoPlayerSrc = currentSocialVideoPlayer.attr('src');

                        if(parseInt($(this).val()))
                        {
                            currentSocialVideoPlayerSrc = removeParam('controls',currentSocialVideoPlayerSrc);
                            if(currentSocialVideoPlayerSrc.indexOf('?') != -1)
                            {
                                currentSocialVideoPlayer.attr('src', currentSocialVideoPlayerSrc+'&controls=1');
                            }
                            else
                            {
                                currentSocialVideoPlayer.attr('src', currentSocialVideoPlayerSrc+'?controls=1');
                            }
                        }
                        else
                        {
                            currentSocialVideoPlayerSrc = removeParam('controls',currentSocialVideoPlayerSrc);
                            //currentSocialVideoPlayer.attr('src', );
                            console.log(currentSocialVideoPlayerSrc);
                            if(currentSocialVideoPlayerSrc.indexOf('?') != -1)
                            {
                                currentSocialVideoPlayer.attr('src', currentSocialVideoPlayerSrc+'&controls=0');
                            }
                            else
                            {
                                currentSocialVideoPlayer.attr('src', currentSocialVideoPlayerSrc+'?controls=0');
                            }
                        }
                    });
                },
                (error) => {
                   console.log(error);
                }
            )
    }
    render() {
        return ( <div className = "playground"> <div id = "playground-editor"><iframe id="mainEditorFrame"></iframe></div></div> )
    }
}
export default connect(mapStateToProps, mapDispatchToProps)(MainView);
