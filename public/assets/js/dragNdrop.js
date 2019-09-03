$(function() {

    $(document).on("click",".instectorAll",function(){
        if(!$(this).hasClass("siteView_change")){
            $(".instectorAll").css("display","none");
            $(this).css("display","inline-block");
        }
    });
    var globalLeft = 0;
    var globalTop = 0;
    var top = 0;
    var left = 0;
    
    var mainEditorFrameWindow = $('#mainEditorFrame').get(0).contentWindow;
    $('#mainEditorFrame').load(function()
    {
        $('#mainEditorFrame').css("height",$(window).height())
        setTimeout(function()
        {
            $('#mainEditorFrame').css("height",mainEditorFrameWindow.document.body.scrollHeight+150);
            $(".se-pre-con").fadeOut("slow");
        },3000)
        
        $.undone();
        $(document).find('body').on('click', "#undoChanges",function (e) {
            $.undone("undo");
            mainEditorFrameWindow.document.execCommand('Undo','false',0);
        });
        $(document).find('body').on('click', "#redoChanges",function (e) {
            $.undone("redo"); 
            mainEditorFrameWindow.document.execCommand('Redo','false',0);
        });
        
     
        var total = 0;
        
        // $(mainEditorFrameWindow.document.body).find('*').on('dragenter',function(event)
        $(mainEditorFrameWindow.document).find('*').on('dragenter',function(event)
        {
            event.preventDefault();
            event.stopPropagation();
        }).on('dragover',function(event)
        {
            event.preventDefault();
            event.stopPropagation();
            
            globalLeft = event.pageX;
            globalTop = event.pageY;
            $(mainEditorFrameWindow.document).find('body').addClass("framework-main-container");
        });

        $(mainEditorFrameWindow.document).find('body,html').on('keydown',function(event)
        {
            if(event.keyCode === 27 && $(mainEditorFrameWindow.document).find('#layoutCover').length)
            {
                $("#headerNavigation nav").show();
                $("#inspectorTabs").show();
                $(".home-page").removeAttr("style");
                $(".playground").removeAttr("style");
                $('#playground-editor iframe').contents().find('#layoutCover').remove();
                $("#exitPreviewMode").hide();
            }
        });
        $(mainEditorFrameWindow.document).find('*').on('keydown',function(event)
        {
            event.stopPropagation(); 
            if(event.keyCode === 8){
                if (mainEditorFrameWindow.getSelection && mainEditorFrameWindow.getSelection().getRangeAt) {
                    var range = mainEditorFrameWindow.getSelection().getRangeAt(0);
                    var selectedObj = mainEditorFrameWindow.getSelection();
                    var parentNode = selectedObj.anchorNode.parentNode;
                    if(selectedObj.anchorNode.length===1){
                        parentNode.innerHTML = "&nbsp;";
                        r = mainEditorFrameWindow.document.createRange();
                        r.selectNodeContents(parentNode);
                        selectedObj.removeAllRanges();
                        selectedObj.addRange(r);
                        return false;
                    }
                  }
            }
        });
        $(mainEditorFrameWindow.document).find('body,html').on('drop',function(event)
        {
            event.preventDefault();
            event.stopPropagation();
            var currentDroppingLeft = event.pageX;
            var currentAddedElement = $(window.dataDragged);
            $("#mainEditorFrame").contents().find(".temprary-fade-drag").remove();
            if($("#mainEditorFrame").contents().find("#snap_object").length<1){
                $(mainEditorFrameWindow.document).find('body').removeClass("framework-main-container");
            }
            var elements_updated = [];
            $.undone("register",
                function ()
                {
                    $("#mainEditorFrame").contents().find("body").append(currentAddedElement);
                    setTimeout(function()
                    {
                        var projectId = window.projectId;
                        var currentPage = window.currentPage;
            
                        var thisClonedNow = currentAddedElement.clone().css(
                        {
                            "left": 0
                        });
                        var html = $("<div />").append(thisClonedNow).html();
                        var parentDataItem = $(mainEditorFrameWindow.document).find('body').attr("data-item");
                        var htmlDataToPass = JSON.stringify(
                        {
                            parentDataItem:parentDataItem,
                            html:html,
                            projectId:projectId,
                            PageName:currentPage
                        });
                        $.ajax(
                        {
                            url: window.baseURL+"/api/projects/add-element",
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            },
                            type:"POST",
                            data: htmlDataToPass
                        });
                    },3000);
                },
                function ()
                {
                    var projectId = window.projectId;
                    var currentPage = window.currentPage;

                    var currentDataItem = currentAddedElement.attr("data-item");
                    currentAddedElement.remove();
                    /*if(elements_updated.length){
                        $.each(elements_updated,function(e,value){
                            value.element.css("top",value.oldTop+'px');
                        });
                    }*/
                    var requestData = {
                        dataItem:currentDataItem,
                        projectId:projectId,
                        PageName:currentPage
                    }
                    $.ajax(
                    {
                        url: window.baseURL+"/api/projects/remove-element",
                        type:"POST",
                        data: requestData
                    });
                }
            );

            currentAddedElement.attr("componentUniqueAttribute", 'componentUniqueAttribute'+window.incrementalValueForAttribute);
            currentAddedElement.addClass('componentUniqueAttribute'+window.incrementalValueForAttribute);
            
            //only for panda slider video
            if(currentAddedElement[0].hasAttribute('menutype'))
            {
                var anchor_html = '';
                var simple_html = '';
                window.ProjectPages.forEach(function(key,index){
                    if(key != 'thankyou'){
                    if(index == window.CurrentPages){
                        var _class = "active";
                        var _class2 = "checked";
                    }else{
                        var _class = "";
                        var _class2 = "";
                    }
                    simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a data-item=\""+(window.zIndex++)+"\" class='componentElement' href=\""+key+".html\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
                    anchor_html += "<div data-item=\""+(window.zIndex++)+"\" class=\"checkbox\"> <input data-item=\""+(window.zIndex++)+"\" class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\"> <label data-item=\""+(window.zIndex++)+"\" class='componentElement' for=\"check-"+index+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
                }
                });
                $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
                $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
            }

            //only for panda slider video
            if(currentAddedElement[0].hasAttribute('slidervideo'))
            {
                $('#playground-editor iframe').contents().find('html').find(".componentUniqueAttribute"+(window.incrementalValueForAttribute)).attr('id', "ninja-slider");
                $('#playground-editor iframe')[0].contentWindow.pandaVideoTrigger();
            }
            
            //only for panda socialMedia icons
            if(currentAddedElement[0].hasAttribute('socialbarmain'))
            {
                currentAddedElement.find('[socialbar="1"]').each(function(index, element)
                {
                    if(element.hasAttribute('facebook'))
                    {
                        $(element).attr('href', window.userDetails.facebook)
                    }
                    else if(element.hasAttribute('twitter'))
                    {
                        $(element).attr('href', window.userDetails.twitter)
                    }
                    else if(element.hasAttribute('googleplus'))
                    {
                        $(element).attr('href', window.userDetails.googleplus)
                    }
                    else if(element.hasAttribute('youtube'))
                    {
                        $(element).attr('href', window.userDetails.youtube)
                    }
                    else if(element.hasAttribute('pinterest'))
                    {
                        $(element).attr('href', window.userDetails.pinterest)
                    }
                    else if(element.hasAttribute('instagram'))
                    {
                        $(element).attr('href', window.userDetails.instagram)
                    }
                    else if(element.hasAttribute('linkedin'))
                    {
                        $(element).attr('href', window.userDetails.linkedin)
                    }
                })
            }
            
            if(currentAddedElement[0].hasAttribute('fbmessenger'))
            {
                currentAddedElement.attr('href', 'http://m.me/'+window.userDetails.facebook_page_id)
            }
            
            //only for video elements
            if(currentAddedElement[0].hasAttribute('videoelem'))
            {
                if(currentAddedElement[0].hasAttribute('youtube'))
                {
                    var videoElement = $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute));
                    setTimeout(function()
                    {
                        videoElement.append('<div class="elementWrapper" style="width:'+videoElement.find('iframe').width()+'px;height:'+videoElement.find('iframe').height()+'px;z-index:9999999999999999999;position: absolute;top: 0;"></div>');
                    },2000);
                }
                else if(currentAddedElement[0].hasAttribute('dailymotion'))
                {
                    var videoElement = $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute));
                    setTimeout(function()
                    {
                        videoElement.append('<div class="elementWrapper" style="width:'+videoElement.width()+'px;height:'+videoElement.height()+'px;z-index:9999999999999999999;position: absolute;top: 0;"></div>');
                    },2000);
                }
                else if(currentAddedElement[0].hasAttribute('soundcloud'))
                {
                    var soundCloudElement = $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute));
                    setTimeout(function()
                    {
                        soundCloudElement.append('<div class="elementWrapper" style="width:'+soundCloudElement.width()+'px;height:'+soundCloudElement.height()+'px;z-index:9999999999999999999;position: absolute;top: 0;"></div>');
                    },2000);
                }
                else if(currentAddedElement[0].hasAttribute('vimoe'))
                {
                    var videoElement = $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute));
                    setTimeout(function()
                    {
                        videoElement.append('<div class="elementWrapper" style="width:'+videoElement.width()+'px;height:'+videoElement.height()+'px;z-index:9999999999999999999;position: absolute;top: 0;"></div>');
                    },2000);
                   
                }
            }
        
            //for full width elements
            if(currentAddedElement[0].hasAttribute('fullSizeElement'))
            {
                currentAddedElement.addClass('excludeNewElement');
                var draggedElementHeight = parseInt(currentAddedElement.attr('height'));
                var elementsAfterFullSizeElement = [];
                var beforeElementsEndsAt = 0;
                var afterElementsStartAt = 99999999;
                
                //$('iframe').contents().find('html').on('mousemove', function (e)
                {
                    $('#playground-editor iframe').contents().find('html').unbind( "mousemove" );
                    var currentElementsInDom = $('#playground-editor iframe').contents().find('html').find(".componentElement:not(.excludeNewElement)");
                    
                    var currentIteration = 0;
                    currentElementsInDom.each(function(index, element)
                    {
                        var currentElement = $(element);
                        var currentElementTop = currentElement.offset().top;
                        var currentElementHeight = currentElement.height();
                        var currentElementEndsAt = currentElementTop + currentElementHeight;
                        
                        if(((currentElementTop)+(currentElementHeight/2)) > globalTop)
                        {
                            elementsAfterFullSizeElement.push(currentElement);
                            if(currentElementTop < afterElementsStartAt)
                            {
                                afterElementsStartAt = currentElementTop;
                            }
                        }
                        else
                        {
                            if(currentElementEndsAt > beforeElementsEndsAt)
                            {
                                beforeElementsEndsAt = currentElementEndsAt;
                            }
                        }
                        currentIteration++;
                        if(currentIteration == currentElementsInDom.length)
                        {
                            // if there is not any after element
                            if(afterElementsStartAt == 99999999)
                            {
                                currentAddedElement.css(
                                {
                                    "z-index": window.zIndex,
                                    "top": (beforeElementsEndsAt),
                                        "position": "absolute",
                                    "left": 0
                                });
                                window.zIndex++;
                            }
                            //if there are both, before and after elements and the space is less than the height
                            else if(parseInt(afterElementsStartAt-beforeElementsEndsAt) < draggedElementHeight)
                            {
                                var updater = [];
                                for(var i=0;i<elementsAfterFullSizeElement.length; i++)
                                {
                                    if(elementsAfterFullSizeElement[i].width()>980 && (elementsAfterFullSizeElement[i].offset().top-elementsAfterFullSizeElement[i].parent().offset().top)>0){
                                        updater.push({element:elementsAfterFullSizeElement[i],top:(elementsAfterFullSizeElement[i].offset().top)+ (draggedElementHeight- (afterElementsStartAt-beforeElementsEndsAt))});
                                    }
                                }
                                setTimeout(function(){
                                    $.each(updater,function(e,value){
                                        value.element.css("top",(value.top-value.element.parent().offset().top)+'px');
                                    });
                                },1000);
                                currentAddedElement.css(
                                {
                                    "z-index": window.zIndex,
                                    "top": (beforeElementsEndsAt-currentAddedElement.parent().offset().top),
                                        "position": "absolute",
                                    "left": 0
                                });
                                window.zIndex++;
                            }
                            else if(parseInt(afterElementsStartAt-beforeElementsEndsAt) >= draggedElementHeight)
                            {
                                currentAddedElement.css(
                                {
                                    "z-index": window.zIndex,
                                    "top": (beforeElementsEndsAt),
                                        "position": "absolute",
                                    "left": 0
                                });
                                window.zIndex++;
                            }
                            else
                            {
                                //console.log("else iterations");
                            }
                        }
                    });
                    
                    $('#playground-editor iframe').contents().find('html').find(".excludeNewElement").removeClass('excludeNewElement');
                    
                }//);
            }
            else
            {
                var elementToFindParent = $('#playground-editor iframe').contents().find('html').find(".componentUniqueAttribute"+(window.incrementalValueForAttribute));
                var firstParent = elementToFindParent.parents().filter(function()
                {
                    // reduce to only relative position or "body" elements
                    var $this = $(this);
                    return $this.is('body') || $this.css('position') == 'relative';
                }).slice(0,1); // grab only the "first"
                
                var firstParentTop = firstParent.offset().top;
                var firstParentLeft = firstParent.offset().left;
                var position = '';
                
                if(firstParent[0].nodeName.toLowerCase()==='body')
                {
                    position = 1;
                }
                else
                {
                    position = 0;
                }
        
                var width = 0;
                var height = 0;
                if(currentAddedElement[0].hasAttribute('height'))
                {
                    height = parseInt(currentAddedElement.attr('height'));
                    top = (globalTop - firstParentTop - parseInt((window.elementSelectedPositionTopPercent * height) / 100));
                    //top = e.pageY;
                }
                else
                {
                    top = globalTop - firstParentTop;
                }
        
                if(currentAddedElement[0].hasAttribute('width'))
                {
                    width = parseInt(currentAddedElement.attr('width'));
                    // left = globalLeft - firstParentLeft -parseInt((window.elementSelectedPositionleftPercent * width) / 100);
                    left = currentDroppingLeft-50;
                }
                else
                {
                    // left = globalLeft - firstParentLeft;
                    left = currentDroppingLeft-50;
                }
                if(position)
                {
                    currentAddedElement.css(
                    {
                        "z-index": window.zIndex,
                        "top": top,
                        "position": "absolute",
                        "left": left
                    });
                }
                else
                {
                    //console.log("!position !position !position");
                }
                window.zIndex++;
                currentAddedElement.attr("data-item", window.zIndex);
                window.zIndex++;
                currentAddedElement.find('*').each(function(elem)
                {
                    $(this).attr("data-item", window.zIndex);
                    window.zIndex++;
                });

                $('#playground-editor iframe').contents().find('html').unbind( "mousemove" );
            }
            setTimeout(function(){
            $('#mainEditorFrame').css("height",mainEditorFrameWindow.document.body.scrollHeight+100);
            },1500);
            
            
            if(currentAddedElement[0].hasAttribute('slidervideoowl'))
            {
                //$('#playground-editor iframe').contents().find('html').find(".componentUniqueAttribute"+(window.incrementalValueForAttribute)).attr('id', "owl-slider"+(window.incrementalValueForAttribute));
                $('#playground-editor iframe')[0].contentWindow.pandaVideoTriggerOwl();
            }
        
            if(currentAddedElement[0].hasAttribute('triggermusictheme'))
            {
                $('#playground-editor iframe')[0].contentWindow.pandaMusicTriggerTheme();
                var musicElement = $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute));
                // setTimeout(function()
                // {
                //     musicElement.append('<div class="elementWrapper" style="width:'+musicElement.find('.cpandaaudioplayer').width()+'px;height:'+musicElement.find('.cpandaaudioplayer').height()+'px;z-index:9999999999999999999;position: absolute;top: 0;"></div>');
                // },2000);
            }
            
            if(currentAddedElement[0].hasAttribute('triggermusic'))
            {
                $('#playground-editor iframe').contents().find('html').find('div.iru-tiny-player').remove();
                $('#playground-editor iframe')[0].contentWindow.pandaMusicPlayerTrigger();
                var musicElement = $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute));
                // setTimeout(function()
                // {
                //     musicElement.append('<div class="elementWrapper" style="width:'+(musicElement.width()+10)+'px;height:'+(musicElement.height()+10)+'px;z-index:9999999999999999999;position: absolute;top: 0;"></div>');
                // },1000);
            }
        
            if(currentAddedElement[0].hasAttribute('mapelement'))
            {
                var mapElement = $('#playground-editor iframe').contents().find('html').find(".componentUniqueAttribute"+(window.incrementalValueForAttribute)).find('div');

                var currentIncrementalValue = window.incrementalValueForAttribute;
                setTimeout(function()
                {
                    $('#playground-editor iframe')[0].contentWindow.trigerMap(mapElement[0], currentAddedElement.attr("maptype"), currentIncrementalValue);
                },1000);
            }

            if(currentAddedElement[0].hasAttribute('bakgroundsrc'))
            {
                var currentBackground = currentAddedElement.attr('bakgroundsrc').replace("[BASEURL]", window.baseURL);
                currentAddedElement.css({"background" : "url('"+currentBackground+"') no-repeat center", "background-size": "cover"});
            }
            else
            {
                currentAddedElement.find('[bakgroundsrc]').each(function(index, elem)
                {
                    var currentBackground = $(elem).attr('bakgroundsrc').replace("[BASEURL]", window.baseURL);
                    $(elem).css({"background" : "url('"+currentBackground+"') no-repeat center", "background-size": "cover"});
                })
            }

            currentAddedElement.find('*').each(function()
            {
                //console.log($(this));
            })

            $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute)).find('img, a, source, video').each(function()
            {
                if(this.tagName.toLowerCase() === "a")
                {
                    $(this).attr('href', $(this).attr('href') ? $(this).attr('href').replace("[BASEURL]", window.baseURL):'');
                }
                else
                {
                    $(this).attr('src', $(this).attr('src') ? $(this).attr('src').replace("[BASEURL]", window.baseURL):'');
                }
            });
            
            $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute)).find('video').attr('src', $('#playground-editor iframe').contents().find('html').find('.componentUniqueAttribute'+(window.incrementalValueForAttribute)).find('source').attr('src'));



            window.incrementalValueForAttribute++;

        });

       
       
        
        $(mainEditorFrameWindow.document).find('body').on('click', function(e)
        {
            e.preventDefault();
            e.stopPropagation();
            if(!$(e.target).hasClass('resizerEelementHandle') && !$(e.target).parent().hasClass('resizerEelementHandle') && !$(e.target).parents('#avpw_holder').length)
            {
                setTimeout(function()
                {
                    if($(mainEditorFrameWindow.document).find('div.jquery-notebook').is(":visible"))
                    {
                        var currentSelectedElementInHere = $(mainEditorFrameWindow.document).find('.selectedElementEditor')
                        var positionNotebookWithRespectToViewport = $(mainEditorFrameWindow.document).find('div.jquery-notebook')[0].getBoundingClientRect();
                        setTimeout(function(){
                            if(positionNotebookWithRespectToViewport.y<0)
                            {
                                var currentSelectedHeight = currentSelectedElementInHere.height();
                                var currentSelectedAxis = currentSelectedElementInHere[0].getBoundingClientRect();
                                var currentDifference = currentSelectedAxis.y - positionNotebookWithRespectToViewport.y + currentSelectedHeight;
                                $(mainEditorFrameWindow.document).find('div.jquery-notebook').css("top", currentDifference)
                            }
                            else
                            {
                                $(mainEditorFrameWindow.document).find('div.jquery-notebook').css("top", 0)
                            }
                        },200)
                        
                        $("#configurationElementsContainer").hide();
                    }
                    else
                    {
                        //prevent every click in designer mod, to terminate the effect of clicking links
                        //console.log("this is clicked");
                        
                        if(window.devicetype === "mobile")
                        {
                            $("#configDeleteElement").hide();
                            $("#configCopyElement").hide();
                            $("#configureElement").hide();
                        }
                        else
                        {
                            $("#configDeleteElement").show();
                            $("#configCopyElement").show();
                            $("#configureElement").show();
                        }

                        $("#changeElementBackgroundColor").spectrum("destroy");
                        $("#changeElementColor").spectrum("destroy");
                        $(mainEditorFrameWindow.document).find('.resizerEelementHandle').remove();
                        var currentSelectedComponent = $(e.target);
                        $(mainEditorFrameWindow.document).find('.selectedElementEditor').removeClass('selectedElementEditor');
                        $(mainEditorFrameWindow.document).find('#componentElementImg').attr('id', '');
                        if(currentSelectedComponent[0].tagName.toLowerCase()=="circle" || currentSelectedComponent[0].tagName.toLowerCase()=="rect" ||currentSelectedComponent[0].tagName.toLowerCase()=="polygon" ||currentSelectedComponent[0].tagName.toLowerCase()=="path" || currentSelectedComponent[0].tagName.toLowerCase()=="svg"){
                            currentSelectedComponent = currentSelectedComponent.parents(".componentElement");
                        }
                        if(currentSelectedComponent.hasClass("rd-parallax-layer") || currentSelectedComponent.hasClass("rd-parallax")){
                            currentSelectedComponent = currentSelectedComponent.parents(".sec_wrap");
                        }
                        currentSelectedComponent.addClass('selectedElementEditor');
                    
                        var currentOffsets = currentSelectedComponent.offset();
                        var leftOffset = currentOffsets.left;
                        var topOffset = currentOffsets.top;
                        var iframeTop = $('#mainEditorFrame').offset().top;
                        $("#configurationElementsContainer").show();
                        

                        if(currentSelectedComponent[0].tagName.toLowerCase()=="img"){
                            $("#editPrvImage").show();
                            currentSelectedComponent.attr('id', "componentElementImg");
                        }
                        else
                        {
                            $("#editPrvImage").hide();
                        }
                        if(window.devicetype === "desktop")
                        {
                            var execSecondCond = 0;
                            if(!currentSelectedComponent[0].hasAttribute('videoelem')){
                                //const sel = window.editor.getSelected();
                                let parentComp = currentSelectedComponent.parent();
                                if(!parentComp[0].hasAttribute('videoelem')){
                                    execSecondCond = 1;
                                    $('#configureElement').hide();
                                }
                                else{
                                $('#configureElement').show();
                                }
                            }
                            else{
                                setTimeout(function(){
                                    $('#configureElement').show();
                                },300);
                            }
                            if(execSecondCond){
                                if(!currentSelectedComponent[0].hasAttribute('socialbar') && !currentSelectedComponent[0].hasAttribute('musicelem') && !currentSelectedComponent[0].hasAttribute('cpandavideo') && !currentSelectedComponent[0].hasAttribute('mapelement') && currentSelectedComponent[0].tagName.toLowerCase()!=="img" && currentSelectedComponent[0].tagName.toLowerCase()!=="form" && currentSelectedComponent[0].tagName.toLowerCase()!=="input" && currentSelectedComponent[0].tagName.toLowerCase()!=="select" && currentSelectedComponent[0].tagName.toLowerCase()!=="textarea" && !currentSelectedComponent[0].hasAttribute('lightbox'))
                                {
                                    let parentComp = currentSelectedComponent.parent();
                                    if(!parentComp[0].hasAttribute('socialbar') && !parentComp[0].hasAttribute('musicelem') && !parentComp[0].hasAttribute('cpandavideo') && !parentComp[0].hasAttribute('mapelement') && (currentSelectedComponent.parents('[lightbox="1"]').length<1) && (currentSelectedComponent.parents('[mapelement="1"]').length<1) && (currentSelectedComponent.parents('[triggermusictheme="1"]').length<1)){
                                        $('#configureElement').hide();
                                    }
                                    else{
                                        $('#configureElement').show();
                                    }
                                }
                                else{
                                    $('#configureElement').show();
                                }
                            }
                        }
                        var LeftForElem = leftOffset;
                        if(LeftForElem<0)
                        {
                            LeftForElem = 0;
                        }

                        $("#configurationElementsContainer").css({"position": "absolute", "top": (topOffset+iframeTop-40), "left": (LeftForElem)});
                        
                        var configPositionWithRespectToViewport = $("#configurationElementsContainer")[0].getBoundingClientRect();
                        if(configPositionWithRespectToViewport.x + $("#configurationElementsContainer").width() > $(window).width())
                        {
                            var newLeft = (configPositionWithRespectToViewport.x + $("#configurationElementsContainer").width()) - $(window).width();
                            $("#configurationElementsContainer").css({"left": (leftOffset-newLeft)});
                        }

                        var currentElemPositionTop = currentSelectedComponent.position().top-11;
                        var currentElemPositionLeft = currentSelectedComponent.position().left-11;
                        if(currentSelectedComponent[0].tagName.toLowerCase()==="img" || currentSelectedComponent[0].tagName.toLowerCase()==="audio" || currentSelectedComponent[0].tagName.toLowerCase()==="video")
                        {
                            if(!currentSelectedComponent.parents("[galleryelement='1']").length)
                            {
                                $('<span id="bottomResizer" class="resizerEelementHandle imageResizerHandle" style="background-image: url('+window.baseURL+'/images/resize-icon.png); width:15px;height:15px"></span>').insertAfter(currentSelectedComponent);
                                $(mainEditorFrameWindow.document).find("#bottomResizer").css(
                                {
                                    "position":"absolute",
                                    "top":currentElemPositionTop+currentSelectedComponent.height(),
                                    "left":currentElemPositionLeft+currentSelectedComponent.width()
                                });
                            }
                        }
                        else
                        {
                            currentSelectedComponent.append('<span id="bottomResizer" class="resizerEelementHandle" style="background-image: url('+window.baseURL+'/images/resize-icon.png); width:15px;height:15px"></span>');
                            $(mainEditorFrameWindow.document).find("#bottomResizer").css(
                            {
                                "position":"absolute",
                                "bottom":0,
                                "right":0
                            });
                        }
                    }
                },300);
            }
        })
        
        $(mainEditorFrameWindow.document).find('body').on('mousedown', ".componentElement", function(e)
        {
            if(e.which === 1)
            {
                var currentSelectedElement = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
                var currentSelectedElementParent;
                var resizer_triger = false;   
                if($(e.target).hasClass('resizerEelementHandle') || $(e.target).parent().hasClass('resizerEelementHandle'))
                {
                    resizer_triger = true;  
                    if(currentSelectedElement.parent().children().length === 2)
                    {
                        currentSelectedElementParent = currentSelectedElement.parent();
                    }

                    console.log(currentSelectedElement.width());
                    console.log(currentSelectedElement.parents('[bannerelem="1"]').width());
                    if((currentSelectedElement.parents('[bannerelem="1"]').length) &&  (Math.abs( parseInt(currentSelectedElement.width() ) - parseInt(currentSelectedElement.parents('[bannerelem="1"]').width()) ) < 20))
                    {
                        console.log("element is equal");
                        currentSelectedElement = currentSelectedElement.parents('[bannerelem="1"]');
                    }
                    
                    var currentTop = e.pageY;
                    var currentLeft = e.pageX;
                    var newTop = e.pageY;
                    var newLeft = e.pageX;
                    currentSelectedElementLeft = currentSelectedElement.position().left;
                    var currentSelectedWidth = currentSelectedElement.width();
                    var currentSelectedHeight = currentSelectedElement.height();
                    var newSelectedWidth = currentSelectedWidth;
                    var newSelectedHeight = currentSelectedHeight;
                    var resizerCurrentElement = $(mainEditorFrameWindow.document).find('.resizerEelementHandle');
                    var resizerCurrentTop = resizerCurrentElement.position().top;
                    var resizerCurrentLeft = resizerCurrentElement.position().left;
                    $(mainEditorFrameWindow.document).find('body').on('mousemove',function(event)
                    {
                        newSelectedWidth = currentSelectedWidth - (currentLeft-event.pageX);
                        newSelectedHeight = currentSelectedHeight - (currentTop-event.pageY);
                        currentSelectedElement.width(newSelectedWidth);
                        currentSelectedElement.height(newSelectedHeight);
                        if(currentSelectedElement.css('max-width') !== "none")
                        {
                            currentSelectedElement.css({'max-width':newSelectedWidth})
                        }
                        if(currentSelectedElement.css('max-height') !== "none")
                        {
                            currentSelectedElement.css({'max-height':newSelectedHeight})
                        }
                        resizerCurrentElement.css({"top":resizerCurrentTop - (currentTop-event.pageY), "left": resizerCurrentLeft - (currentLeft-event.pageX)});
                    });
                    $(mainEditorFrameWindow.document).find('body').on('mouseup', function()
                    {
                        if((currentSelectedWidth != newSelectedWidth || currentSelectedHeight != newSelectedHeight) &&  resizer_triger == true){
                            resizer_triger = false;
                            $.undone("register",function (){
                                currentSelectedElement.width(newSelectedWidth);
                                currentSelectedElement.height(newSelectedHeight);
                                if(currentSelectedElement.css('max-width') !== "none")
                                {
                                    currentSelectedElement.css({'max-width':newSelectedWidth})
                                }
                                if(currentSelectedElement.css('max-height') !== "none")
                                {
                                    currentSelectedElement.css({'max-height':newSelectedHeight})
                                }
                            },function (){
                                currentSelectedElement.width(currentSelectedWidth);
                                currentSelectedElement.height(currentSelectedHeight);
                                if(currentSelectedElement.css('max-width') !== "none")
                                {
                                    currentSelectedElement.css({'max-width':currentSelectedWidth})
                                }
                                if(currentSelectedElement.css('max-height') !== "none")
                                {
                                    currentSelectedElement.css({'max-height':currentSelectedHeight})
                                }
                                currentSelectedElement.width(currentSelectedWidth);
                                currentSelectedElement.height(currentSelectedHeight);
                            });
                        }
                        
                        $(this).unbind("mousemove");
                    });

                }else{
                    resizer_triger = false;
                }
            }
        })
        
        $('#dragMoveElement').on('mousedown', function(e)
        {
            if(e.which === 1)
            {
                /*For moving config container start*/
                var currentConfigTop = $('#configurationElementsContainer').offset().top;
                var currentConfigLeft = $('#configurationElementsContainer').offset().left;
                var differenceInGrabTop = e.pageY - currentConfigTop;
                var differenceInGrabLeft = e.pageX - currentConfigLeft;
                /*For moving config container end*/

                var currentSelectedElement = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
                var currentSelectedElementParent;
                var currentThisJQuery;
                if(!currentSelectedElement.hasClass('componentElement')){
                    currentThisJQuery = currentSelectedElement.parents('.componentElement').first();
                }
                else{
                    currentThisJQuery = currentSelectedElement;
                }
                if(currentThisJQuery.hasClass('componentElement'))
                {
                    var offset = currentThisJQuery.position();
                    var offsetLeft = offset.left;
                    var offsetTop = offset.top;
                    
                    var elementWidth = currentThisJQuery.outerWidth();
                    var currentTop = e.pageY;
                    var currentLeft = e.pageX;
                    var newTop = e.pageY;
                    var newLeft = e.pageX;
                    
                    var addedGuidlineSpan = false;
                    var currentSelectedWidth = currentSelectedElement.width();
                    var currentSelectedHeight = currentSelectedElement.height();

                    var awareNotificaton;
                    var positionWithRespectToViewport;
                    var screenMidArray = [];
                    screenMidArray.push(parseInt($(window).width()/2));
                    screenMidArray.push(parseInt(($(window).width()/2)-1));
                    screenMidArray.push(parseInt(($(window).width()/2)+1));
                    var iframe = document.getElementById('mainEditorFrame');
                    var innerDoc = iframe.contentDocument || iframe.contentWindow.document;
                    $("#dragMoveElement").on('mousemove', function(event)
                    {
                        positionWithRespectToViewport = innerDoc.getElementsByClassName('selectedElementEditor')[0].getBoundingClientRect();

                        if(!addedGuidlineSpan)
                        {
                            $(mainEditorFrameWindow.document).find('body').append('<div id="guideLinesContainer"><span id="leftGuidline" style="display:inline-block;background-color:red; position:absolute;z-index: 99999999999999999999999999999999"></span><span id="rightGuidline" style="display:inline-block;background-color:red; position:absolute;z-index: 99999999999999999999999999999999"></span><span id="topGuidline" style="display:inline-block;background-color:red; position:absolute;z-index: 99999999999999999999999999999999"></span><span id="bottomGuidline" style="display:inline-block;background-color:red; position:absolute;z-index: 99999999999999999999999999999999"></span><span id="middleGuidline" style="display:none;background-color:red; position:absolute;z-index: 99999999999999999999999999999999;"></span><div>');
                        }
                        $(mainEditorFrameWindow.document).find('body').addClass('framework-main-container');
                        
                        if(positionWithRespectToViewport.x<0 || positionWithRespectToViewport.x+currentSelectedWidth>$(window).width())
                        {
                            if(!$(".noty_bar").length)
                            {
                                awareNotificaton = new Noty(
                                {
                                    text: 'Please be-aware, your content is going off the screen.',
                                    theme:'metroui',
                                    type:'info'
                                }).show();
                            }
                        }
                        if(positionWithRespectToViewport.y>=0)
                        {
                            addedGuidlineSpan = true;
                            newTop = offsetTop -(currentTop-event.pageY);
                            newLeft = offsetLeft-(currentLeft-event.pageX);
                            if(currentThisJQuery.hasClass("fullSizeElement")){
                                newLeft = 0;
                            }
                            top = e.pageY;

                            var screenWidth = $(mainEditorFrameWindow.document).width();
                            var screenHeight = $(mainEditorFrameWindow.document).height();
                            $(mainEditorFrameWindow.document).find('#leftGuidline').css({'top':0,'left':positionWithRespectToViewport.x, 'width':'1px', 'height':screenHeight});
                            $(mainEditorFrameWindow.document).find('#rightGuidline').css({'top':0,'left':positionWithRespectToViewport.x+currentSelectedWidth, 'width':'1px', 'height':screenHeight});
                            $(mainEditorFrameWindow.document).find('#topGuidline').css({'top':positionWithRespectToViewport.y,'left':0, 'width':screenWidth, 'height':'1px'});
                            $(mainEditorFrameWindow.document).find('#bottomGuidline').css({'top':positionWithRespectToViewport.y+currentSelectedHeight,'left':0, 'width':screenWidth, 'height':'1px'});

                            $(mainEditorFrameWindow.document).find('#middleGuidline').css({'top':0,'left':$(window).width()/2+'px', 'width':'1px', 'height':screenHeight});

                            if($.inArray( parseInt(positionWithRespectToViewport.x + (currentSelectedWidth/2)), screenMidArray ) !== -1)
                            {
                                $(mainEditorFrameWindow.document).find('#middleGuidline').css("display", "inline-block");
                            }
                            else
                            {
                                $(mainEditorFrameWindow.document).find('#middleGuidline').hide();
                            }

                            currentThisJQuery.css({"top": newTop, "position": "absolute","left": newLeft});
                            $('#configurationElementsContainer').css({"top":event.pageY-differenceInGrabTop, "left":event.pageX-differenceInGrabLeft})
                        }
                    });
                    $('#dragMoveElement').on('mouseout', function()
                    {
                        console.log("mouseout called");
                        var differenceInPosition;
                        if(typeof positionWithRespectToViewport !=="undefined")
                        {
                            if(typeof positionWithRespectToViewport.y !=="undefined")
                            {
                                if(positionWithRespectToViewport.y < 0)
                                {
                                    differenceInPosition = 0 - positionWithRespectToViewport.y;
                                    newTop = newTop + differenceInPosition;
                                }
                                $(mainEditorFrameWindow.document).find('#guideLinesContainer').remove();
                                if(newTop !=currentTop){
                                    $.undone("register",
                                        function () { currentThisJQuery.css({"top": newTop, "position": "absolute","left": newLeft}); },
                                        function () { currentThisJQuery.css({"top": offsetTop, "position": "absolute","left": offsetLeft}); }
                                    );
                                }
                            }
                        }
                        if($("#mainEditorFrame").contents().find("#snap_object").length<1){
                            $(mainEditorFrameWindow.document).find('body').removeClass("framework-main-container");
                        }
                        $('#dragMoveElement').unbind('mousemove');
                    });
                    $('#dragMoveElement').on('mouseup',function()
                    {
                        console.log("mouseup called");
                        var differenceInPosition;
                        if(typeof positionWithRespectToViewport !=="undefined")
                        {
                            if(typeof positionWithRespectToViewport.y !=="undefined")
                            {
                                if(positionWithRespectToViewport.y < 0)
                                {
                                    differenceInPosition = 0 - positionWithRespectToViewport.y;
                                    newTop = newTop + differenceInPosition;
                                }
                                $(mainEditorFrameWindow.document).find('#guideLinesContainer').remove();
                                if(newTop !=currentTop){
                                    $.undone("register",
                                        function () { currentThisJQuery.css({"top": newTop, "position": "absolute","left": newLeft}); },
                                        function () { currentThisJQuery.css({"top": offsetTop, "position": "absolute","left": offsetLeft}); }
                                    );
                                }
                            }
                        }
                        if($("#mainEditorFrame").contents().find("#snap_object").length<1){
                            $(mainEditorFrameWindow.document).find('body').removeClass("framework-main-container");
                        }
                        $('#dragMoveElement').unbind('mousemove');
                    });
                }
            }
        });
        
        $(mainEditorFrameWindow.document).find('head').append("<style>.selectedElementEditor{border: 2px solid blue; box-sizing: border-box;}</style>");

        $('#configDeleteElement').click(function(e)
        {
            e.preventDefault();
            
            if($(mainEditorFrameWindow.document).find('.selectedElementEditor').hasClass('emptySpaceAdded'))
            {
                globalTop = $(mainEditorFrameWindow.document).find('.selectedElementEditor').offset().top;
                var draggedElementHeight = parseInt($(mainEditorFrameWindow.document).find('.selectedElementEditor').height());
                var elementsAfterFullSizeElement = [];
                var beforeElementsEndsAt = 0;
                var afterElementsStartAt = 9999999999;
                
                var currentElementsInDom = $('#playground-editor iframe').contents().find('html').find(".componentElement:not(.emptySpaceAdded)");
                
                var currentIteration = 0;
                currentElementsInDom.each(function(index, element)
                {
                    var currentElement = $(element);
                    var currentElementTop = currentElement.offset().top;
                    var currentElementHeight = currentElement.height();
                    var currentElementEndsAt = currentElementTop + currentElementHeight;
                    
                    if(currentElementTop > globalTop && currentElement[0].hasAttribute('fullSizeElement'))
                    {
                        elementsAfterFullSizeElement.push(currentElement);
                        if(currentElementTop < afterElementsStartAt)
                        {
                            afterElementsStartAt = currentElementTop;
                        }
                    }
                    else
                    {
                        if(currentElementEndsAt > beforeElementsEndsAt)
                        {
                            beforeElementsEndsAt = currentElementEndsAt;
                        }
                    }
                    currentIteration++;
                    if(currentIteration == currentElementsInDom.length)
                    {
                        for(var i=0;i<elementsAfterFullSizeElement.length; i++)
                        {
                            elementsAfterFullSizeElement[i].css('top', (parseInt(elementsAfterFullSizeElement[i].css("top"))-draggedElementHeight)+'px');
                        }
                    }
                });
                $(mainEditorFrameWindow.document).find('.selectedElementEditor').remove();
            }
            else
            {
                var elementToRemove;
                var elementToRemoveParent ;
                if($(mainEditorFrameWindow.document).find('.selectedElementEditor').hasClass('elementWrapper'))
                {
                    elementToRemove = $(mainEditorFrameWindow.document).find('.selectedElementEditor').parent();
                }
                else if($(mainEditorFrameWindow.document).find('.selectedElementEditor').parents('[triggermusictheme="1"]').length && $(mainEditorFrameWindow.document).find('.selectedElementEditor').hasClass('player'))
                {
                    elementToRemove = $(mainEditorFrameWindow.document).find('.selectedElementEditor').parents('[triggermusictheme="1"]')
                }
                else
                {
                    elementToRemove = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
                }
                if(elementToRemove.parent().children().length === 2)
                {
                    elementToRemove = elementToRemove.parent();
                }

                if(elementToRemove.parents('[socialbar="1"]').length)
                {
                    elementToRemove = elementToRemove.parents('[socialbar="1"]');
                }
                $("#configurationElementsContainer").hide();
                var data_attr = elementToRemove.attr("data-item");
            
                var previous = elementToRemove.prev();
                var parent = elementToRemove.parent();
                var oHTML = elementToRemove[0].outerHTML;
                var elements_updated = [];
                $.undone("register",function () {
                    var ell_to_rm = $(mainEditorFrameWindow.document).find('[data-item='+data_attr+']');
                    var dWidth = ell_to_rm.width();
                    
                    if(dWidth>980){
                        var dTop = ell_to_rm.position().top;
                        if(dTop == 0){
                            ell_to_rm = ell_to_rm.parent(".componentElement");
                            previous = ell_to_rm.prev();
                            parent = ell_to_rm.parent();
                            oHTML = ell_to_rm[0].outerHTML;
                            dTop = ell_to_rm.position().top; 
                        }
                        var dHeight = ell_to_rm.height();
                        var dBottom = parseInt(dTop)+parseInt(dHeight);
                        var allElems=$("#playground-editor").find('iframe').contents().find('*');
                        allElems.each(function(){
                            var $elm=$(this);
                            var ellTop = $elm.position().top;
                            if(ellTop>=dBottom){
                                elements_updated.push({element: $elm,newTop:ellTop-dHeight, oldTop:ellTop});
                            }
                        });
                    }
                    setTimeout(function(){
                        ell_to_rm.remove();
                        $.each(elements_updated,function(e,value){
                            value.element.css("top",value.newTop+'px');
                        });
                    },1500);
                },function () {
                    if(typeof previous.attr("data-item") == "undefined"){
                        parent.append(oHTML);
                    }else{
                        previous.after(oHTML);
                    }
                    if(elements_updated.length){
                        $.each(elements_updated,function(e,value){
                            value.element.css("top",value.oldTop+'px');
                        });
                    }
                });

                // var projectId = window.projectId;
                // var currentPage = window.currentPage;

                // var currentDataItem = elementToRemove.attr("data-item");
                // elementToRemove.remove();

                // var requestData = {
                //     dataItem:currentDataItem,
                //     projectId:projectId,
                //     PageName:currentPage
                // }
                // $.ajax(
                // {
                //     url: window.baseURL+"/api/projects/remove-element",
                //     type:"POST",
                //     data: requestData
                // });
                $('#mainEditorFrame').css("height",mainEditorFrameWindow.document.body.scrollHeight+150);
            }
            


            
        });
        $('#configCopyElement').click(function(e)
        {
            e.preventDefault();
            var currentElementAddedHere;
            $.undone("register",
                function ()
                {
                    var currentSelectedcomponent = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
                    var clonedElement = currentSelectedcomponent.clone();
                    clonedElement.removeClass('selectedElementEditor');
                    clonedElement.insertAfter(currentSelectedcomponent);
                    clonedElement.attr("data-item", window.zIndex);
                    currentElementAddedHere = $(mainEditorFrameWindow.document).find("[data-item="+window.zIndex+"]")
                    window.zIndex++;
                },
                function ()
                {
                    currentElementAddedHere.remove();
                }
            );
            
        });
        $('#addBlankSpace').click(function(e)
        {
            e.preventDefault();
            $("#addSpaceContainer").show();    
        });
        
        $('#addSpaceTrigger').click(function(event)
        {
            event.preventDefault();

            var selectedElementEditor = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
            if(selectedElementEditor[0].hasAttribute('fullSizeElement'))
            {
                globalTop = selectedElementEditor.offset().top-1;
            }
            else
            {
                globalTop = selectedElementEditor.parents('.fullSizeElement').offset().top-1;
            }
            
            var currentAddedElement = $('<div class="fullSizeElement componentElement emptySpaceAdded" fullSizeElement="1" style="height:'+parseInt($("#addSpaceHeight").val())+'px; width:100%;"></div>');
            
            var elements_updated = [];
            $.undone("register",
                function ()
                {
                    $("#mainEditorFrame").contents().find("body").append(currentAddedElement);
                    setTimeout(function()
                    {
                        var projectId = window.projectId;
                        var currentPage = window.currentPage;
            
                        var thisClonedNow = currentAddedElement.clone().css(
                        {
                            "left": 0
                        });
                        var html = $("<div />").append(thisClonedNow).html();
                        var parentDataItem = $(mainEditorFrameWindow.document).find('body').attr("data-item");
                        var htmlDataToPass = JSON.stringify(
                        {
                            parentDataItem:parentDataItem,
                            html:html,
                            projectId:projectId,
                            PageName:currentPage
                        });
                        $.ajax(
                        {
                            url: window.baseURL+"/api/projects/add-element",
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            },
                            type:"POST",
                            data: htmlDataToPass
                        });
                    },3000);
                },
                function ()
                {
                    var projectId = window.projectId;
                    var currentPage = window.currentPage;

                    var currentDataItem = currentAddedElement.attr("data-item");
                    currentAddedElement.remove();
                    var requestData = {
                        dataItem:currentDataItem,
                        projectId:projectId,
                        PageName:currentPage
                    }
                    $.ajax(
                    {
                        url: window.baseURL+"/api/projects/remove-element",
                        type:"POST",
                        data: requestData
                    });
                }
            );

            currentAddedElement.attr("componentUniqueAttribute", 'componentUniqueAttribute'+window.incrementalValueForAttribute);
            window.zIndex++;
            currentAddedElement.attr("data-item", window.zIndex);
            window.zIndex++;
            currentAddedElement.addClass('componentUniqueAttribute'+window.incrementalValueForAttribute);
            
            //for full width elements
            if(currentAddedElement[0].hasAttribute('fullSizeElement'))
            {
                currentAddedElement.addClass('excludeNewElement');
                var draggedElementHeight = parseInt($("#addSpaceHeight").val());
                var elementsAfterFullSizeElement = [];
                var beforeElementsEndsAt = 0;
                var afterElementsStartAt = 9999999999;
                
                var currentElementsInDom = $('#playground-editor iframe').contents().find('html').find(".componentElement:not(.excludeNewElement)");
                
                var currentIteration = 0;
                currentElementsInDom.each(function(index, element)
                {
                    var currentElement = $(element);
                    var currentElementTop = currentElement.offset().top;
                    var currentElementHeight = currentElement.height();
                    var currentElementEndsAt = currentElementTop + currentElementHeight;
                    
                    if(currentElementTop > globalTop && currentElement[0].hasAttribute('fullSizeElement'))
                    {
                        elementsAfterFullSizeElement.push(currentElement);
                        if(currentElementTop < afterElementsStartAt)
                        {
                            afterElementsStartAt = currentElementTop;
                        }
                    }
                    else
                    {
                        if(currentElementEndsAt > beforeElementsEndsAt)
                        {
                            beforeElementsEndsAt = currentElementEndsAt;
                        }
                    }
                    currentIteration++;
                    if(currentIteration == currentElementsInDom.length)
                    {
                        // if there is not any after element
                        if(afterElementsStartAt == 9999999999)
                        {
                            currentAddedElement.css(
                            {
                                "z-index": window.zIndex,
                                "top": (beforeElementsEndsAt),
                                    "position": "absolute",
                                "left": 0
                            });
                            window.zIndex++;
                        }
                        //if there are both, before and after elements and the space is less than the height
                        else if(parseInt(afterElementsStartAt-beforeElementsEndsAt) < draggedElementHeight)
                        {
                            for(var i=0;i<elementsAfterFullSizeElement.length; i++)
                            {
                                elementsAfterFullSizeElement[i].css('top', (parseInt(elementsAfterFullSizeElement[i].css("top"))+draggedElementHeight)+'px');
                            }
                            currentAddedElement.css(
                            {
                                "z-index": window.zIndex,
                                "top": globalTop,
                                    "position": "absolute",
                                "left": 0
                            });
                            window.zIndex++;
                        }
                        else if(parseInt(afterElementsStartAt-beforeElementsEndsAt) >= draggedElementHeight)
                        {
                            currentAddedElement.css(
                            {
                                "z-index": window.zIndex,
                                "top": (beforeElementsEndsAt),
                                    "position": "absolute",
                                "left": 0
                            });
                            window.zIndex++;
                        }
                        else
                        {
                            //console.log("else iterations");
                        }
                    }
                });
                $('#playground-editor iframe').contents().find('html').find(".excludeNewElement").removeClass('excludeNewElement');
            }
            
            setTimeout(function(){
            $('#mainEditorFrame').css("height",mainEditorFrameWindow.document.body.scrollHeight+100);
            },1500);
            
            
           
            window.incrementalValueForAttribute++;

























            
        });

        $("body").on('click', ".styleManagerSectionHeader", function()
        {
            var currentElementHeadingId = $(this).attr('id');
            setTimeout(function(){
                console.log("currentElementHeadingId settimeout");
                console.log("currentElementHeadingId");
                console.log(currentElementHeadingId);
                if($("[section-opener="+currentElementHeadingId+"]").is(":visible"))
                {
                    console.log("currentElementHeadingId is visible");
                    $('.elementStyleElementsContainer').hide();
                    $('.downArrow').show();
                    $('.upArrow').hide();
                }
                else if($("[section-opener="+currentElementHeadingId+"]").is(":hidden"))
                {
                    console.log("currentElementHeadingId is hidden");
                    $('.elementStyleElementsContainer').hide();
                    $("[section-opener="+currentElementHeadingId+"]").show();
                    $('.downArrow').show();
                    $('.upArrow').hide();
                    $("#"+currentElementHeadingId).find(".upArrow").show();
                    $("#"+currentElementHeadingId).find(".downArrow").hide();
                }
            },100)
        });
        $("#main_styleManagerHeader").on('mousedown', function(e)
        {
            e.preventDefault();
            //e.stopPropagation();
            var currentThisJQuery = $("#main_styleManagerMainElements");
            var offset = currentThisJQuery.position();
            var offsetLeft = offset.left;
            var offsetTop = offset.top;
            
            var elementWidth = currentThisJQuery.outerWidth();
            var currentTop = e.pageY;
            var currentLeft = e.pageX;
            var newTop = e.pageY;
            var newLeft = e.pageX;

            $('#main_styleManagerHeader').on('mousemove', function(event)
            {
                if(event.which===1 && event.target.tagName.toLocaleLowerCase() !=='input')
                {
                    newTop = offsetTop -(currentTop-event.pageY);
                newLeft = offsetLeft-(currentLeft-event.pageX);
                if(currentThisJQuery.hasClass("fullSizeElement")){
                    newLeft = 0;
                }
                top = e.pageY;
                currentThisJQuery.css({"top": newTop, "position": "absolute","left": newLeft});
                $('#main_styleManagerHeader').on('mouseout', function(ev)
                {
                    $('#main_styleManagerHeader').unbind( "mousemove" );
                });
                $('#main_styleManagerHeader').on('mouseup', function(ev)
                {
                    $('#main_styleManagerHeader').unbind( "mousemove" );
                });
                }
            });
        });
        
        
        $('body').on('click', '#removeElementBgImage', function(e)
        {
            $(mainEditorFrameWindow.document).find('.selectedElementEditor').css('background-image', 'none');
            $(this).parent().replaceWith("<span id='changeElementBgImage' class='elementStylerValue changeElementBgImage' style='cursor: pointer;'>Select Image</span>");
        });

        $('#styleManagerOpener').click(function(e)
        {
            var completeHTML = '';
            var selectedElementEditor = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
            var cssAttributes = {
                "Background Settings": {
                    'Image':'background-image',
                    "Colour":'background-color'
                },
                "Font Settings": {
                    "Colour":"color",
                    'Size':{
                        'font-size':['start-8','end-100']
                    },
                    "Style":{
                        'font-family':["Cookie", "DINNeuzeitGrotesk-BoldCond", "Helvetica", "Josefin Sans", "Lato", "Libre Baskerville", "Nunito", "Oswald", "Raleway", "Roboto", "Ropa Sans", "sans-serif"]
                    },
                    "Appearance":{
                        'font-style':["normal","italic","oblique"]
                    },
                    "Weight":{
                        'font-weight':['bold','normal']
                    },
                    "Alignment":{
                        "text-align":["center", "left", "right", "justify"],
                    },
                    "Letter Spacing":{
                        'letter-spacing':['start-0','end-100']
                    },
                    "Word Spacing":{
                        'word-spacing':['start-0','end-100']
                    },
                    "Line Height":{
                        'line-height':['start-0','end-100']
                    },
                },
                "Section Size Settings":{
                    "Width":"width",
                    "Height":"height",
                },
                "Padding Settings":{
                    "Padding Top":'padding-top',
                    "Padding Bottom":'padding-bottom',
                    "Padding Left":'padding-left',
                    "Padding Right":'padding-right',
                },
                "Border Settings":{
                    "Border":{
                        "border-at":["top","bottom","All Sides"],
                    },
                    "Colour":"border-color",
                    "Style":{
                        "border-style":["solid", "dashed",  "dotted"]
                    },
                    "Weight":
                        {"border-weight":['start-1','end-50']}
                },
                "SVG Colour Settings":{
                    "fill":'color',
                },
            }
            
            var colorPickerClass = '';
            
            var styleManagerHTML = "";
            if(!selectedElementEditor.children('svg').length)
            {
                for (var mainKey in cssAttributes)
                {
                    var re = new RegExp(' ', 'g');
                    thisSection = mainKey.replace(re, '-');
                    if(thisSection!=="SVG-Colour-Settings")
                    {
                        styleManagerHTML = styleManagerHTML + "<div id='"+thisSection+"' class='styleManagerSectionHeader'>"+mainKey+"<span class='fa fa-chevron-down downArrow'></span><span class='fa fa-chevron-up upArrow' style='display:none' ></span></div>";
                        styleManagerHTML = styleManagerHTML + "<div style='display:none' section-opener='"+thisSection+"' class='elementStyleElementsContainer'>";
                        var currentProperties = cssAttributes[mainKey];
                        for(var property in currentProperties)
                        {
                            if(property.indexOf("Colour") !== -1)
                            {
                                colorPickerClass='cpColorPicker';
                            }
                            else
                            {
                                colorPickerClass='';
                            }
                            
                            styleManagerHTML = styleManagerHTML + "<label>";
                            styleManagerHTML = styleManagerHTML + property;
                            styleManagerHTML = styleManagerHTML + "</label>";
                            
                            if(typeof currentProperties[property] === "object")
                            {
                                
                                for(var subProperty in currentProperties[property])
                                {
                                    var currentValue = typeof selectedElementEditor.css(subProperty) === "undefined" ? '' : selectedElementEditor.css(subProperty);

                                    styleManagerHTML = styleManagerHTML + "<select value='"+currentValue+"' class='elementStylerValue' data-style='"+subProperty+"'> ";
                                    if(currentProperties[property][subProperty][0].indexOf("start") !== -1)
                                    {
                                        var startingLimit = parseInt(currentProperties[property][subProperty][0].split("-")[1]);
                                        var endingLimit = parseInt(currentProperties[property][subProperty][1].split("-")[1]);
                                        for(var kk = startingLimit; kk <= endingLimit; kk++)
                                        {
                                            styleManagerHTML = styleManagerHTML + "<option vaule='"+kk+"px'>";
                                            styleManagerHTML = styleManagerHTML + kk;
                                            styleManagerHTML = styleManagerHTML + "</option>";
                                        }
                                    }
                                    else
                                    {
                                        for(var k = 0 ; k < currentProperties[property][subProperty].length; k++)
                                        {
                                            var fontFamily = '';
                                            if(subProperty==="font-family")
                                            {
                                                fontFamily = "style='font-family: "+currentProperties[property][subProperty][k]+"'";
                                            }
                                            styleManagerHTML = styleManagerHTML + "<option "+fontFamily+" value='"+currentProperties[property][subProperty][k]+"'>";
                                            styleManagerHTML = styleManagerHTML + currentProperties[property][subProperty][k];
                                            styleManagerHTML = styleManagerHTML + "</option>";
                                        }
                                    }
                                    styleManagerHTML = styleManagerHTML + "</select>";
                                }
                            }
                            else
                            {
                                if(property!=="Image")
                                {
                                    var currentValue = typeof selectedElementEditor.css(currentProperties[property]) === "undefined" ? '' : selectedElementEditor.css(currentProperties[property]);
                                
                                    styleManagerHTML = styleManagerHTML + '<input type="text" value="'+currentValue+'" class="elementStylerValue '+colorPickerClass+'" placeholder="'+property+'" data-style="'+currentProperties[property]+'"/>';
                                }
                                else
                                {
                                    var currentValue = selectedElementEditor.css('background-image') === "none" ? 'empty' : selectedElementEditor.css('background-image');

                                    if(currentValue==='empty')
                                    {
                                        styleManagerHTML = styleManagerHTML + "<span id='changeElementBgImage' class='elementStylerValue changeElementBgImage' style='cursor: pointer;'>Select Image</span>";
                                    }
                                    else
                                    {
                                        currentValue = currentValue.replace('url(','').replace(')','').replace(/\"/gi, "");
                                        styleManagerHTML = styleManagerHTML + "<div class='elementStylerValue changeElementBgImage' ><img id='changeElementBgImage' style='cursor: pointer;' src='"+currentValue+"'/><span id='removeElementBgImage' style='color:blue; cursor:pointer;'>remove</span></div>";
                                    }
                                    
                                }
                                
                            }
                        }
                        styleManagerHTML = styleManagerHTML + "</div>";
                    }
                }
            }
            else
            {
                for (var mainKey in cssAttributes)
                {
                    var re = new RegExp(' ', 'g');
                    thisSection = mainKey.replace(re, '-');
                    if(thisSection==="SVG-Colour-Settings")
                    {
                        styleManagerHTML = styleManagerHTML + "<div id='"+thisSection+"' class='styleManagerSectionHeader'>"+mainKey+"<span class='fa fa-chevron-down downArrow'></span><span class='fa fa-chevron-up upArrow' style='display:none' ></span></div>";
                        styleManagerHTML = styleManagerHTML + "<div style='display:none' section-opener='"+thisSection+"' class='elementStyleElementsContainer'>";
                        var i = 1;
                        var j = 0;
                        selectedElementEditor.find('svg path').each(function(){
                            selectedElementEditor = $(this);
                            
                            var currentValue = typeof selectedElementEditor.css('fill') === "undefined" ? '' : selectedElementEditor.css('fill') ;
                            
                        
                                styleManagerHTML = styleManagerHTML + "<label>";
                                styleManagerHTML += "Fill"+i+" ";
                                styleManagerHTML = styleManagerHTML + "</label>";
                                styleManagerHTML = styleManagerHTML + '<input type="text" value="'+currentValue+'" class="elementStylerValue cpColorPicker" placeholder="fill" data-path="'+j+'"/>';
                                i++;
                        
                            j++;
                        });
                        j = 0;
                        selectedElementEditor = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
                        selectedElementEditor.find('svg circle').each(function(){
                            selectedElementEditor = $(this);
                            
                            var currentValue = typeof selectedElementEditor.css('fill') === "undefined" ? '' : selectedElementEditor.css('fill') ;
                            
                        
                                styleManagerHTML = styleManagerHTML + "<label>";
                                styleManagerHTML += "Fill"+i+" ";
                                styleManagerHTML = styleManagerHTML + "</label>";
                                styleManagerHTML = styleManagerHTML + '<input type="text" value="'+currentValue+'" class="elementStylerValue cpColorPicker" placeholder="fill" data-path="'+j+'"/>';
                                i++;
                        
                            j++;
                        });
                        j = 0;
                        selectedElementEditor = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
                        selectedElementEditor.find('svg rect').each(function(){
                            selectedElementEditor = $(this);
                            
                            var currentValue = typeof selectedElementEditor.css('fill') === "undefined" ? '' : selectedElementEditor.css('fill') ;
                            
                        
                                styleManagerHTML = styleManagerHTML + "<label>";
                                styleManagerHTML += "Fill"+i+" ";
                                styleManagerHTML = styleManagerHTML + "</label>";
                                styleManagerHTML = styleManagerHTML + '<input type="text" value="'+currentValue+'" class="elementStylerValue cpColorPicker" placeholder="fill" data-path="'+j+'"/>';
                                i++;

                            j++;
                        });
                        j = 0;
                        selectedElementEditor = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
                        selectedElementEditor.find('svg polygon').each(function(){
                            selectedElementEditor = $(this);
                            
                            var currentValue = typeof selectedElementEditor.css('fill') === "undefined" ? '' : selectedElementEditor.css('fill') ;
                            
                                styleManagerHTML = styleManagerHTML + "<label>";
                                styleManagerHTML += "Fill"+i+" ";
                                styleManagerHTML = styleManagerHTML + "</label>";
                                styleManagerHTML = styleManagerHTML + '<input type="text" value="'+currentValue+'" class="elementStylerValue cpColorPicker" placeholder="fill" data-path="'+j+'"/>';
                                i++;
                        
                            j++;
                        });
                        styleManagerHTML = styleManagerHTML + "</div>";
                    }
                    else
                    {
                        styleManagerHTML = styleManagerHTML + "<div id='"+thisSection+"' class='styleManagerSectionHeader'>"+mainKey+"<span class='fa fa-chevron-down downArrow'></span><span class='fa fa-chevron-up upArrow' style='display:none' ></span></div>";
                        styleManagerHTML = styleManagerHTML + "<div style='display:none' section-opener='"+thisSection+"' class='elementStyleElementsContainer'>";
                        var currentProperties = cssAttributes[mainKey];
                        for(var property in currentProperties)
                        {
                            if(property.indexOf("Colour") !== -1)
                            {
                                colorPickerClass='cpColorPicker';
                            }
                            else
                            {
                                colorPickerClass='';
                            }
                            
                            styleManagerHTML = styleManagerHTML + "<label>";
                            styleManagerHTML = styleManagerHTML + property;
                            styleManagerHTML = styleManagerHTML + "</label>";

                            if(typeof currentProperties[property] === "object")
                            {
                                
                                for(var subProperty in currentProperties[property])
                                {
                                    var currentValue = typeof selectedElementEditor.css(subProperty) === "undefined" ? '' : selectedElementEditor.css(subProperty);

                                    styleManagerHTML = styleManagerHTML + "<select value='"+currentValue+"' class='elementStylerValue' data-style='"+subProperty+"'> ";
                                    if(currentProperties[property][subProperty][0].indexOf("start") !== -1)
                                    {
                                        var startingLimit = parseInt(currentProperties[property][subProperty][0].split("-")[1]);
                                        var endingLimit = parseInt(currentProperties[property][subProperty][1].split("-")[1]);
                                        for(var kk = startingLimit; kk <= endingLimit; kk++)
                                        {
                                            styleManagerHTML = styleManagerHTML + "<option vaule='"+kk+"px'>";
                                            styleManagerHTML = styleManagerHTML + kk;
                                            styleManagerHTML = styleManagerHTML + "</option>";
                                        }
                                    }
                                    else
                                    {
                                        for(var k = 0 ; k < currentProperties[property][subProperty].length; k++)
                                        {
                                            styleManagerHTML = styleManagerHTML + "<option value='"+currentProperties[property][subProperty][k]+"'>";
                                            styleManagerHTML = styleManagerHTML + currentProperties[property][subProperty][k];
                                            styleManagerHTML = styleManagerHTML + "</option>";
                                        }
                                    }
                                    styleManagerHTML = styleManagerHTML + "</select>";
                                }
                            }
                            else
                            {
                                var currentValue = typeof selectedElementEditor.css(currentProperties[property]) === "undefined" ? '' : selectedElementEditor.css(currentProperties[property]);
                                styleManagerHTML = styleManagerHTML + '<input type="text" value="'+currentValue+'" class="elementStylerValue '+colorPickerClass+'" placeholder="'+property+'" data-style="'+currentProperties[property]+'"/>';
                            }
                        }
                        styleManagerHTML = styleManagerHTML + "</div>";
                    }
                }
            }
            
            
            $('#styleManagerMainElements').empty();
            $('#styleManagerMainElements').append(styleManagerHTML);

            $("#main_styleManagerMainElements").show();
            // var iframe = document.getElementById('mainEditorFrame');
            // var innerDoc = iframe.contentDocument || iframe.contentWindow.document;
            // var positionWithRespectToViewport = innerDoc.getElementsByClassName('selectedElementEditor')[0].getBoundingClientRect();
            // $(mainEditorFrameWindow.document).find('.selectedElementEditor');

            
            $("#main_styleManagerMainElements").css({"position":"absolute","top" : $(window).scrollTop()});
            $('.cpColorPicker').spectrum(
            {
                preferredFormat: "hex",
                showPalette: true,
                showInput: true,
                showAlpha: true,
                palette: [
                    ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                    ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                    ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                    ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                    ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                    ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                    ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                    ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
                ],
                change: function(color)
                {
                    var thisStyleType = $(this).attr('data-style');
                    var previousStyleElement;
                    var elementToChangeStyle;

                    if(typeof $(this).attr('data-path') !== "undefined")
                    {
                        elementToChangeStyle = $(mainEditorFrameWindow.document).find('.selectedElementEditor svg path:eq('+$(this).attr('data-path')+')');
                        previousStyleElement = elementToChangeStyle.css(thisStyleType);
                    }
                    else if(typeof $(this).attr('data-circle') !== "undefined")
                    {
                        elementToChangeStyle = $(mainEditorFrameWindow.document).find('.selectedElementEditor svg circle:eq('+$(this).attr('data-circle')+')');
                        previousStyleElement = elementToChangeStyle.css(thisStyleType);
                    }
                    else if(typeof $(this).attr('data-rect') !== "undefined")
                    {
                        elementToChangeStyle = $(mainEditorFrameWindow.document).find('.selectedElementEditor svg rect:eq('+$(this).attr('data-rect')+')');
                        previousStyleElement = elementToChangeStyle.css(thisStyleType);
                    }
                    else if(typeof $(this).attr('data-polygon') !== "undefined")
                    {
                        elementToChangeStyle = $(mainEditorFrameWindow.document).find('.selectedElementEditor svg polygon:eq('+$(this).attr('data-polygon')+')');
                        previousStyleElement = elementToChangeStyle.css(thisStyleType);
                    }
                    else
                    {
                        elementToChangeStyle = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
                        previousStyleElement = elementToChangeStyle.css(thisStyleType);
                    }

                    $.undone("register",function ()
                    {
                        if(typeof $(this).attr('data-path') !== "undefined")
                        {
                            elementToChangeStyle.css(thisStyleType, color);
                        }
                        else if(typeof $(this).attr('data-circle') !== "undefined"){
                            elementToChangeStyle.css(thisStyleType, color);
                        }else if(typeof $(this).attr('data-rect') !== "undefined"){
                            elementToChangeStyle.css(thisStyleType, color);
                        }else if(typeof $(this).attr('data-polygon') !== "undefined"){
                            elementToChangeStyle.css(thisStyleType, color);
                        }else{
                            elementToChangeStyle.css(thisStyleType, color.toRgbString());
                        }
                    },function ()
                    {
                        if(typeof $(this).attr('data-path') !== "undefined")
                        {
                            elementToChangeStyle.css(thisStyleType, previousStyleElement);
                        }
                        else if(typeof $(this).attr('data-circle') !== "undefined")
                        {
                            elementToChangeStyle.css(thisStyleType, previousStyleElement);
                        }
                        else if(typeof $(this).attr('data-rect') !== "undefined")
                        {
                            elementToChangeStyle.css(thisStyleType, previousStyleElement);
                        }
                        else if(typeof $(this).attr('data-polygon') !== "undefined")
                        {
                            elementToChangeStyle.css(thisStyleType, previousStyleElement);
                        }
                        else
                        {
                            elementToChangeStyle.css(thisStyleType, previousStyleElement);
                        }
                    });


                    
                    
                }
            });
        });

        $('body').on('click', '.close_StyleManager',function()
        {
            $("#main_styleManagerMainElements").hide();
            $("#styleManagerMainElements").empty();
        });

        // $(mainEditorFrameWindow.document).find('body').on('dblclick', function()
        // {
        //     $("#configurationElementsContainer").hide();
        // });

        $('body').on('change', '.elementStylerValue',function()
        {
            var elementToChangeStyle = $(mainEditorFrameWindow.document).find('.selectedElementEditor');
            var styleType;
            var styleValue;
            var previousStyle;
            if($(this).attr('data-style').indexOf("border") !== -1)
            {
                var borderWeight = $('[data-style="border-weight"]').val() ? $('[data-style="border-weight"]').val() : '1px';
                borderWeight = parseInt(borderWeight)+"px";
                var borderAt = '';
                if($('[data-style="border-at"]').val()==="top")
                {
                    borderAt = 'border-top';
                }
                else if($('[data-style="border-at"]').val()==="bottom")
                {
                    borderAt = 'border-bottom';
                }
                else if($('[data-style="border-at"]').val()==="All Sides")
                {
                    borderAt = 'border';
                }
                
                $.undone("register",function (){
                    $(mainEditorFrameWindow.document).find('.selectedElementEditor').css('border', 'none');
                    $(mainEditorFrameWindow.document).find('.selectedElementEditor').css(borderAt, borderWeight+" "+$('[data-style="border-style"]').val()+" "+$('[data-style="border-color"]').val());
                
                  },function (){
                    $('#playground-editor iframe').contents().find('body').css({'background-image':'none'});
                  });
            }
            else
            {
                if(!$(this).hasClass('cpColorPicker'))
                {
                    if($(this).attr('data-style')==="font-size")
                    {
                        styleType = $(this).attr('data-style');
                        styleValue = parseInt($(this).val())+"px";
                        previousStyle = elementToChangeStyle.css(styleType);
                        $.undone("register",function ()
                        {
                            elementToChangeStyle.css(styleType, styleValue);
                        
                        },function ()
                        {
                            elementToChangeStyle.css(styleType, previousStyle);
                        });
                    }
                    else
                    {
                        styleType = $(this).attr('data-style');
                        styleValue = $(this).val();
                        if(styleType === "letter-spacing" || styleType === "word-spacing" || styleType === "line-height")
                        {
                            styleValue = parseInt(styleValue)+'px';
                        }

                        previousStyle = elementToChangeStyle.css(styleType);
                        $.undone("register",function ()
                        {
                            elementToChangeStyle.css(styleType, styleValue);
                        
                        },function ()
                        {
                            elementToChangeStyle.css(styleType, previousStyle);
                        });
                    }
                }
            }
            //if(!$(this).hasClass('cpColorPicker'))
            {
                var projectId = window.projectId;
                var currentPage = window.currentPage;
    
                var thisClonedNow = $(mainEditorFrameWindow.document).find('.selectedElementEditor').clone().css(
                {
                    "left": 0
                });
                var html = $("<div />").append(thisClonedNow).html();
                var dataItem = $(mainEditorFrameWindow.document).find('.selectedElementEditor').attr("data-item");
                var htmlDataToPass = JSON.stringify(
                {
                    dataItem:dataItem,
                    html:html,
                    projectId:projectId,
                    PageName:currentPage
                });
                $.ajax(
                {
                    url: window.baseURL+"/api/projects/update-element",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    type:"POST",
                    data: htmlDataToPass
                });
            }
        });
        $('#configChangeColor').click(function(e)
        {
            $("#changeElementColor").spectrum(
            {
                color: $(mainEditorFrameWindow.document).find('.selectedElementEditor').css('color'),
                change: function(color)
                {
                    $(mainEditorFrameWindow.document).find('.selectedElementEditor').css({"color": color.toHexString()});
                    $("#changeElementColor").spectrum("destroy");
                }
            });
        });

        $('#configChangeBackgroundColor').click(function(e)
        {
            var currentColor;
            var currentBackgrounOfElement = $(mainEditorFrameWindow.document).find('.selectedElementEditor').css('backgroundColor');
            if(currentBackgrounOfElement==="rgba(0, 0, 0, 0)")
            {
                currentColor = currentBackgrounOfElement;
            }
            else
            {
                currentColor = rgba2hex(currentBackgrounOfElement);
            }
            
            $("#changeElementBackgroundColor").spectrum(
            {
                color: currentColor,
                change: function(color)
                {
                    $(mainEditorFrameWindow.document).find('.selectedElementEditor').css({"background-color": color.toHexString()});
                    $("#changeElementBackgroundColor").spectrum("destroy");
                }
            });
        });
    });

    function rgba2hex( color_value )
    {
        if ( ! color_value ) return false;
        var parts = color_value.toLowerCase().match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/),
            length = color_value.indexOf('rgba') ? 3 : 2;
        delete(parts[0]);
        for ( var i = 1; i <= length; i++ )
        {
            parts[i] = parseInt( parts[i] ).toString(16);
            if ( parts[i].length == 1 ) parts[i] = '0' + parts[i];
        }
        return '#' + parts.join('').toUpperCase();
    }
});


//  ----------   Elements Script, Event no 4 by Mujtaba  ---------

$(document).on('click', '.title_head', function(event) {
    $(this).parent().siblings('p').slideToggle();
    $('i').toggleClass('fa-angle-down fa-angle-up')
});

//  ----------   Elements Script, Event no 4 by Mujtaba  ---------


//  ----------   Elements Script, HoverBox 20 by Zeshan  ---------

var myVideo=document.getElementById('video1'); 

function Pause(){ 
    myVideo.pause(); 
}
function Play(){
    if (myVideo.paused) 
        myVideo.play();     
}
$(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 1,
      loop: true,
      margin: 0,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      animateOut: 'fadeOut',
      touchDrag : false,
      mouseDrag  : false
    });
    
  });
//  ----------   Elements Script, hoverbox20 by Zeshan  ---------