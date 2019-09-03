import React from 'react';
import { Link } from 'react-router-dom';
import Modal from 'react-responsive-modal';
import { ADDPROJECTDETAIL} from '../constants/actionTypes';
import Logo_Background from '../images/logo_curve.png';
import Preview_Background from '../images/header_right_shape.png';
import { connect } from 'react-redux';
import $ from 'jquery';
import 'rc-slider/assets/index.css';
import Tooltip from 'rc-tooltip';
import Slider from 'rc-slider';

const createSliderWithTooltip = Slider.createSliderWithTooltip;
const Handle = Slider.Handle;

const handle = (props) => {
  const { value, dragging, index, ...restProps } = props;
  return (
    <Tooltip
      prefixCls="rc-slider-tooltip"
      overlay={value}
      visible={dragging}
      placement="top"
      key={index}
    >
      <Handle value={value} {...restProps} />
    </Tooltip>
  );
};

const styles = {
    fontFamily: 'sans-serif',
    textAlign: 'center'
}

const logo_bg = {
    backgroundImage: 'url(' + Logo_Background + ')'
}

const preview_bg = {
    backgroundImage: 'url(' + Preview_Background + ')'
}

var stopPreview = 0;
const mapStateToProps = state => {
    return {
        common: state.common
    }};
  
  const mapDispatchToProps = dispatch => ({
    addProjectDetail: (data) => dispatch({ type: ADDPROJECTDETAIL , payload:{projectDetail:data}})
  });

class Header extends React.Component {

    constructor(props) {
        super(props);
        
        this.handleMouseHoverUndo = this.handleMouseHoverUndo.bind(this);
        this.handleMouseHoverRedo = this.handleMouseHoverRedo.bind(this);
        this.previewWindow = this.previewWindow.bind(this);
        this.handleMouseHoverSave = this.handleMouseHoverSave.bind(this);
        this.handleMouseHoverPreview = this.handleMouseHoverPreview.bind(this);
        this.handleMouseHoverPublish = this.handleMouseHoverPublish.bind(this);

        //     Hover Under Site Hover
        this.escFunction = this.escFunction.bind(this);
        this.state = {
            //  Hover Icons
            isHoveringUndo: false,
            isHoveringRedo: false,

            isHoveringSave: false,
            isHoveringPreview: false,
            isHoveringPublish: false,
            isHoveringImageSharpening: false,

            //  Click Function States
            showPageMenu: false,
            showHeader: true,
            showMobileMenu: false,

            //  Modal Function
            openSaveModal: false,
            openPublishModal: false,
            openImageSharpeningModal: false,
            openDomainModal: false,
            zoomInIcon: require('./../images/zoom-in.svg'),
            zoomOutIcon: require('./../images/zoom-out.svg'),

            domains: [],
            selectedDomain:0,
            siteName:''
        };
        
        this.showPageMenu = this.showPageMenu.bind(this);
        this.closePageMenu = this.closePageMenu.bind(this);
        this.showHeader = this.showHeader.bind(this);
        this.showMobileMenu = this.showMobileMenu.bind(this);
        this.hideMobileMenu = this.hideMobileMenu.bind(this);
        this.onOpenSaveModal = this.onOpenSaveModal.bind(this);
        this.onCloseSaveModal = this.onCloseSaveModal.bind(this);
        this.onOpenPublishModal = this.onOpenPublishModal.bind(this);
        this.onClosePublishModal = this.onClosePublishModal.bind(this);
        this.onOpenImageSharpeningModal = this.onOpenImageSharpeningModal.bind(this);
        this.onCloseImageSharpeningModal = this.onCloseImageSharpeningModal.bind(this);
        this.savePage=this.savePage.bind(this);
        this.savePageFrequentUnload=this.savePageFrequentUnload.bind(this);
        this.savePageFrequent=this.savePageFrequent.bind(this);
        

    }

    zoomItCaller(check)
    {
        var thisThis = this;
        setTimeout(function()
        {
            thisThis.zoomIt();
        },200)
    }
    zoomIt(check){
        var current_value = $('.rc-slider-handle').attr("aria-valuenow");
        current_value = parseInt(current_value);
        if(check == '+' && current_value<200){
            current_value = current_value+10;
            $(".rc-slider-track").css("width",(current_value-100)+"%");
            $('.rc-slider-handle').attr("aria-valuenow",current_value);
            $('.rc-slider-handle').css("left",current_value-100+"%");
        }else if(check == '-' && current_value>100){
            current_value = current_value-10;
            $(".rc-slider-track").css("width",(current_value-100)+"%");
            $('.rc-slider-handle').attr("aria-valuenow",current_value);
            $('.rc-slider-handle').css("left",current_value-100+"%");
        }
        $("#playground-editor").find('iframe').contents().find('body').css('zoom',current_value+'%');
       
    }
  
connectDomainSubmit(){
    var domainId = document.getElementById("domains_list").value;
    var projectId = this.props.common.projectDetail.projectId;
    fetch(window.baseURL+"/api/projects/set-domain", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: 'include',
        body: JSON.stringify({
            projectId:projectId,
            domainId:domainId
        })
        }).then(res => res.json())
        .then(
          (result) => {
            swal({
                title: "Success!",
                text: "Domain connected successfully!",
                type: "success",
                showConfirmButton: false,
                buttons: false,
                timer: 3000,
              });
            this.setState({
                domains:result,
                openDomainModal: false
            });
        });
}
setSitePublish(){
    
    var published = $("#setSitePublish:checked").length;
    var projectId = this.props.common.projectDetail.projectId;
    fetch(window.baseURL+"/api/projects/setPublish", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: 'include',
        body: JSON.stringify({
            projectId:projectId,
            published:published
        })
        }).then(res => res.json())
        .then(
          (result) => {
            swal({
                title: "Success!",
                text: "Publish setting submitted successfully!",
                type: "success",
                showConfirmButton: false,
                buttons: false,
                timer: 3000,
              });
        });
}

    
    savePage(){
        var allElems=$("#playground-editor").find('iframe').contents().find('*');
        allElems.each(function(){
            var $elm=$(this);
            
            if($elm["0"].nodeName != 'HTML' && $elm["0"].nodeName != 'BODY' && $elm["0"].nodeName != 'HEAD'){
                var attributer = $elm.attr('data-item');
                if(typeof attributer == "undefined"){
                    if($elm.find("[data-item]").length > 0){
                        var current_element = $elm.find("[data-item]").first();
                        while (typeof current_element.parent().attr('data-item') == "undefined") {
                            current_element.unwrap();
                        }
                    }else{
                        $elm.remove();
                    }
                }
            }
        });
        var mainEditorFrameWindow = $('#mainEditorFrame').get(0).contentWindow;
        var have_dashes = false;
        if($(mainEditorFrameWindow.document).find('body').hasClass('framework-dashes')){
            $(mainEditorFrameWindow.document).find('body').removeClass('framework-dashes');
            have_dashes = true;
        }
        var have_scale = false;
        if($(mainEditorFrameWindow.document).find('html').hasClass('framework-scale')){
            $(mainEditorFrameWindow.document).find('html').removeClass('framework-scale');
            have_scale = true;
        }
        var have_mainContainer = false;
        if($(mainEditorFrameWindow.document).find('body').hasClass('framework-main-container')){
            $(mainEditorFrameWindow.document).find('body').removeClass('framework-main-container');
            have_mainContainer = true;
        }
        $(mainEditorFrameWindow.document).find('html').removeClass('desktop');
        $(mainEditorFrameWindow.document).find('html').removeClass('rd-navbar-static-linked');
        $(mainEditorFrameWindow.document).find('html').removeClass('portrait');
        $(mainEditorFrameWindow.document).find('body').removeClass('jquery-notebook');
        $(mainEditorFrameWindow.document).find('body').removeClass('editor');
        $(mainEditorFrameWindow.document).find('body').prop('data-jquery-notebook-id',false);
        $(mainEditorFrameWindow.document).find('body').prop('editor-mode',false);
        $(mainEditorFrameWindow.document).find('body').prop('editor-placeholder',false);
        $(mainEditorFrameWindow.document).find('body').prop('contenteditable',false);

        $(mainEditorFrameWindow.document).find('.rd-navbar').removeClass('rd-navbar-static');
        $(mainEditorFrameWindow.document).find('.rd-input-label').removeClass('rd-input-label');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-theme');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-loaded');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-text-select-on');
        $(mainEditorFrameWindow.document).find('.rd-parallax').prop('style',false);
       
       
        var current_this = this;
        setTimeout(function(){
        var html = $("#playground-editor").find('iframe').contents().find('html')[0].innerHTML;
        var html_classes = $("#playground-editor").find('iframe').contents().find('html').attr("class");
        if(typeof html_classes === "undefined")
        {
            html_classes = " ";
        }
        var html_lang = $("#playground-editor").find('iframe').contents().find('html').attr("lang");
        if(typeof html_lang === "undefined")
        {
            html_lang = " ";
        }
        var currentPage = current_this.props.common.projectDetail.currentPage;
        var projectId = current_this.props.common.projectDetail.projectId;
        
        fetch(window.baseURL+"/api/projects/update-page", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: 'include',
        body: JSON.stringify({
            pagehtml: html,
            html_classes: html_classes,
            html_lang: html_lang,
            currentPage: currentPage,
            device: current_this.props.common.projectDetail.device,
            projectId:projectId,
            zIndex:window.zIndex,
            incrementalValueForAttribute: window.incrementalValueForAttribute
        })
        }).then(res => res.json()).then((result) => {
            var project = result.project;
            $("#mainEditorFrame").attr("src", window.baseURL+"/storage/temp_projects/"+project.model.users["0"].id+"/"+project.model.uuid+"/"+current_this.props.common.projectDetail.device+"/"+project.pages[current_this.props.common.projectDetail.currentPageIndex]+".html");
            if(have_dashes){
                $(mainEditorFrameWindow.document).find('body').addClass('framework-dashes');  
            }
            if(have_scale){
                $(mainEditorFrameWindow.document).find('html').addClass('framework-scale');  
            }
            if(have_mainContainer){
                $(mainEditorFrameWindow.document).find('body').addClass('framework-main-container');  
            }
            window.ProjectPages = project.pages;
            current_this.props.addProjectDetail(
                {
                    project: project,
                    currentPage: currentPage,
                    projectId:projectId,
                    currentPageIndex: current_this.props.common.projectDetail.currentPageIndex,
                    device: current_this.props.common.projectDetail.device,
                    has_blog:current_this.props.common.projectDetail.has_blog
                }
            );
            swal({
                title: "Success!",
                text: "Project saved successfully!",
                type: "success",
                showConfirmButton: false,
                buttons: false,
                timer: 3000,
              });
            current_this.setState({
                openSaveModal: false
            });
        });
        },3000);
    }

    savePageFrequent(pageIndexToSwitch){
        var awareNotificaton = new Noty(
        {
            text: 'Switching Page, Please Wait...',
            theme:'metroui',
            type:'info',
            timeout: 3000
        }).show();
        var allElems=$("#playground-editor").find('iframe').contents().find('*');
        allElems.each(function(){
            var $elm=$(this);
            
            if($elm["0"].nodeName != 'HTML' && $elm["0"].nodeName != 'BODY' && $elm["0"].nodeName != 'HEAD'){
                var attributer = $elm.attr('data-item');
                if(typeof attributer == "undefined"){
                    if($elm.find("[data-item]").length > 0){
                        var current_element = $elm.find("[data-item]").first();
                        while (typeof current_element.parent().attr('data-item') == "undefined") {
                            current_element.unwrap();
                        }
                    }else{
                        $elm.remove();
                    }
                }
            }
        });
        var mainEditorFrameWindow = $('#mainEditorFrame').get(0).contentWindow;
        var have_dashes = false;
        if($(mainEditorFrameWindow.document).find('body').hasClass('framework-dashes')){
            $(mainEditorFrameWindow.document).find('body').removeClass('framework-dashes');
            have_dashes = true;
        }
        var have_scale = false;
        if($(mainEditorFrameWindow.document).find('html').hasClass('framework-scale')){
            $(mainEditorFrameWindow.document).find('html').removeClass('framework-scale');
            have_scale = true;
        }
        var have_mainContainer = false;
        if($(mainEditorFrameWindow.document).find('body').hasClass('framework-main-container')){
            $(mainEditorFrameWindow.document).find('body').removeClass('framework-main-container');
            have_mainContainer = true;
        }
        $(mainEditorFrameWindow.document).find('html').removeClass('desktop');
        $(mainEditorFrameWindow.document).find('html').removeClass('rd-navbar-static-linked');
        $(mainEditorFrameWindow.document).find('html').removeClass('portrait');
        $(mainEditorFrameWindow.document).find('body').removeClass('jquery-notebook');
        $(mainEditorFrameWindow.document).find('body').removeClass('editor');
        $(mainEditorFrameWindow.document).find('body').prop('data-jquery-notebook-id',false);
        $(mainEditorFrameWindow.document).find('body').prop('editor-mode',false);
        $(mainEditorFrameWindow.document).find('body').prop('editor-placeholder',false);
        $(mainEditorFrameWindow.document).find('body').prop('contenteditable',false);

        $(mainEditorFrameWindow.document).find('.rd-navbar').removeClass('rd-navbar-static');
        $(mainEditorFrameWindow.document).find('.rd-input-label').removeClass('rd-input-label');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-theme');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-loaded');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-text-select-on');
        $(mainEditorFrameWindow.document).find('.rd-parallax').prop('style',false);
       
       
        var current_this = this;
        setTimeout(function(){
        var html = $("#playground-editor").find('iframe').contents().find('html')[0].innerHTML;
        var html_classes = $("#playground-editor").find('iframe').contents().find('html').attr("class");
        if(typeof html_classes === "undefined")
        {
            html_classes = " ";
        }
        var html_lang = $("#playground-editor").find('iframe').contents().find('html').attr("lang");
        if(typeof html_lang === "undefined")
        {
            html_lang = " ";
        }
        var currentPage = current_this.props.common.projectDetail.currentPage;
        var projectId = current_this.props.common.projectDetail.projectId;
        
        fetch(window.baseURL+"/api/projects/update-page", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: 'include',
        body: JSON.stringify({
            pagehtml: html,
            html_classes: html_classes,
            html_lang: html_lang,
            currentPage: currentPage,
            device: current_this.props.common.projectDetail.device,
            projectId:projectId,
            zIndex:window.zIndex,
            incrementalValueForAttribute: window.incrementalValueForAttribute
        })
        }).then(res => res.json()).then((result) => {
            var project = result.project;
            window.ProjectPages = project.pages;
            
            current_this.props.addProjectDetail(
            {
                project: project,
                currentPage: currentPage,
                projectId:projectId,
                currentPageIndex: current_this.props.common.projectDetail.currentPageIndex,
                device: current_this.props.common.projectDetail.device,
                //has_blog:this.props.common.projectDetail.has_blog
            });
            current_this.switchPage(pageIndexToSwitch);
            
            // current_this.setState({
            //     openSaveModal: false
            // });
        });
        },3000);
    }


    savePageFrequentUnload(){
        var allElems=$("#playground-editor").find('iframe').contents().find('*');
        allElems.each(function(){
            var $elm=$(this);
            
            if($elm["0"].nodeName != 'HTML' && $elm["0"].nodeName != 'BODY' && $elm["0"].nodeName != 'HEAD'){
                var attributer = $elm.attr('data-item');
                if(typeof attributer == "undefined"){
                    if($elm.find("[data-item]").length > 0){
                        var current_element = $elm.find("[data-item]").first();
                        while (typeof current_element.parent().attr('data-item') == "undefined") {
                            current_element.unwrap();
                        }
                    }else{
                        $elm.remove();
                    }
                }
            }
        });
        var mainEditorFrameWindow = $('#mainEditorFrame').get(0).contentWindow;
        var have_dashes = false;
        if($(mainEditorFrameWindow.document).find('body').hasClass('framework-dashes')){
            $(mainEditorFrameWindow.document).find('body').removeClass('framework-dashes');
            have_dashes = true;
        }
        var have_scale = false;
        if($(mainEditorFrameWindow.document).find('html').hasClass('framework-scale')){
            $(mainEditorFrameWindow.document).find('html').removeClass('framework-scale');
            have_scale = true;
        }
        var have_mainContainer = false;
        if($(mainEditorFrameWindow.document).find('body').hasClass('framework-main-container')){
            $(mainEditorFrameWindow.document).find('body').removeClass('framework-main-container');
            have_mainContainer = true;
        }
        $(mainEditorFrameWindow.document).find('html').removeClass('desktop');
        $(mainEditorFrameWindow.document).find('html').removeClass('rd-navbar-static-linked');
        $(mainEditorFrameWindow.document).find('html').removeClass('portrait');
        $(mainEditorFrameWindow.document).find('body').removeClass('jquery-notebook');
        $(mainEditorFrameWindow.document).find('body').removeClass('editor');
        $(mainEditorFrameWindow.document).find('body').prop('data-jquery-notebook-id',false);
        $(mainEditorFrameWindow.document).find('body').prop('editor-mode',false);
        $(mainEditorFrameWindow.document).find('body').prop('editor-placeholder',false);
        $(mainEditorFrameWindow.document).find('body').prop('contenteditable',false);

        $(mainEditorFrameWindow.document).find('.rd-navbar').removeClass('rd-navbar-static');
        $(mainEditorFrameWindow.document).find('.rd-input-label').removeClass('rd-input-label');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-theme');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-loaded');
        $(mainEditorFrameWindow.document).find('.owl-carousel').removeClass('owl-text-select-on');
        $(mainEditorFrameWindow.document).find('.rd-parallax').prop('style',false);
       
       
        var current_this = this;
        setTimeout(function(){
        var html = $("#playground-editor").find('iframe').contents().find('html')[0].innerHTML;
        var html_classes = $("#playground-editor").find('iframe').contents().find('html').attr("class");
        if(typeof html_classes === "undefined")
        {
            html_classes = " ";
        }
        var html_lang = $("#playground-editor").find('iframe').contents().find('html').attr("lang");
        if(typeof html_lang === "undefined")
        {
            html_lang = " ";
        }
        var currentPage = current_this.props.common.projectDetail.currentPage;
        var projectId = current_this.props.common.projectDetail.projectId;
        
        fetch(window.baseURL+"/api/projects/update-page", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: 'include',
        body: JSON.stringify({
            pagehtml: html,
            html_classes: html_classes,
            html_lang: html_lang,
            currentPage: currentPage,
            device: current_this.props.common.projectDetail.device,
            projectId:projectId,
            zIndex:window.zIndex,
            incrementalValueForAttribute: window.incrementalValueForAttribute
        })
        }).then(res => res.json()).then((result) => {
            var project = result.project;
            $("#mainEditorFrame").attr("src", window.baseURL+"/storage/temp_projects/"+project.model.users["0"].id+"/"+project.model.uuid+"/"+current_this.props.common.projectDetail.device+"/"+project.pages[current_this.props.common.projectDetail.currentPageIndex]+".html");
            if(have_dashes){
                $(mainEditorFrameWindow.document).find('body').addClass('framework-dashes');  
            }
            if(have_scale){
                $(mainEditorFrameWindow.document).find('html').addClass('framework-scale');  
            }
            if(have_mainContainer){
                $(mainEditorFrameWindow.document).find('body').addClass('framework-main-container');  
            }
            window.ProjectPages = project.pages;
            current_this.props.addProjectDetail(
                {
                    project: project,
                    currentPage: currentPage,
                    projectId:projectId,
                    currentPageIndex: current_this.props.common.projectDetail.currentPageIndex,
                    device: current_this.props.common.projectDetail.device,
                    has_blog:this.props.common.projectDetail.has_blog
                }
            );
        });
        },3000);
    }

    goToDashboard(){
        var projectId = this.props.common.projectDetail.projectId;
        window.location.href = window.baseURL+'/admin/panda-pages/'+projectId+'/edit';
    }
    switchPage(index){
        
       var project = this.props.common.projectDetail.project;
       var current_this = this;
       current_this.props.addProjectDetail(
            {
                project: project,
                currentPage: project.pages[index],
                projectId:this.props.common.projectDetail.projectId,
                currentPageIndex: index,
                device:this.props.common.projectDetail.device,
                has_blog:this.props.common.projectDetail.has_blog
            }
        );
        window.projectId = this.props.common.projectDetail.projectId;
        window.currentPage = project.pages[index];
        window.CurrentPages = index;
        $("#mainEditorFrame").attr("src", window.baseURL+"/storage/temp_projects/"+project.model.users["0"].id+"/"+project.model.uuid+"/"+this.props.common.projectDetail.device+"/"+project.pages[index]+".html");
        setTimeout(function(){
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
                simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a class='componentElement' href=\""+key+".html\" data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
                anchor_html += "<div class=\"checkbox\" data-item=\""+(window.zIndex++)+"\"> <input class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\" data-item=\""+(window.zIndex++)+"\"> <label class='componentElement' for=\"check-"+index+"\" data-item=\""+(window.zIndex++)+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
                }
            });
            $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
            $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
        },1000);
    }

    onOpenSaveModal(){
        var projectId = this.props.common.projectDetail.projectId;
        fetch(window.baseURL+"/api/projects/get-domains", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            credentials: 'include',
            body: JSON.stringify({
                projectId:projectId
            })
            }).then(res => res.json())
            .then(
              (result) => {
                var selectedDomain = 0;
                var isPublished = result.projectData.published;
                if(isPublished == 1){
                    isPublished = true;
                }else{
                    isPublished = false;
                }
                var siteName = result.projectData.name;
                result.domainsData.forEach(function(key,index){
                    if(projectId == key.project_id){
                        selectedDomain = key.id;
                    }
                });
                this.setState({
                    openSaveModal: true,
                    siteName:siteName,
                    domains:result.domainsData,
                    selectedDomain:selectedDomain
                });
                setTimeout(function(){
                    $("#setSitePublish").prop("checked",isPublished);
                },300);
        });
    };

    onCloseSaveModal(){
        this.setState({
            openSaveModal: false
        });
    };

    onOpenPublishModal(){
        this.setState({
            openPublishModal: true
        });
    };

    onClosePublishModal(){
        this.setState({
            openPublishModal: false
        });
    };

    onOpenImageSharpeningModal(){
        this.setState({ 
            openImageSharpeningModal: true
        });
    };

    onCloseImageSharpeningModal(){
        this.setState({
            openImageSharpeningModal: false
        });
    };

    //      %%  Top Image to hide and Show Header  %%

    showHeader () {
        this.setState(prev => ({ 
            showHeader: !prev.showHeader 
        }));
    };
    
    
    handleMouseHoverUndo() {
        this.setState(this.toggleHoverStateUndo);
    }

    toggleHoverStateUndo(state) {
        return {
            isHoveringUndo: !state.isHoveringUndo,
        };
    }
    
    handleMouseHoverRedo() {
        this.setState(this.toggleHoverStateRedo);
    }

    toggleHoverStateRedo(state) {
        return {
            isHoveringRedo: !state.isHoveringRedo,
        };
    }

    previewWindow(){
        $("#headerNavigation nav").hide();
        $("#exitPreviewMode").show();
        $("#configurationElementsContainer").hide();
        $("#inspectorTabs").hide();
        $(".home-page").css("padding-top",0);
        $(".playground").css("padding-top",0);
        $('#playground-editor iframe').contents().find('body').prepend('<div id="layoutCover"></div>');
        $('#playground-editor iframe').contents().find('.selectedElementEditor').removeClass('selectedElementEditor');
        $('#playground-editor iframe').contents().find('#bottomResizer').remove();
        stopPreview = 1;
    }

    escFunction(event){
        if(event.keyCode === 27 && stopPreview === 1)
        {
            $("#headerNavigation nav").show();
            $("#inspectorTabs").show();
            $(".home-page").removeAttr("style");
            $(".playground").removeAttr("style");
            $('#playground-editor iframe').contents().find('#layoutCover').remove();
          stopPreview = 0;
          $("#exitPreviewMode").hide();
        }
    }

    escFunctionButton()
    {
        $("#headerNavigation nav").show();
        $("#inspectorTabs").show();
        $(".home-page").removeAttr("style");
        $(".playground").removeAttr("style");
        $('#playground-editor iframe').contents().find('#layoutCover').remove();
        stopPreview = 0;
        $("#exitPreviewMode").hide();
    }

    componentDidMount(){
        document.addEventListener("keydown", this.escFunction, false);
        var currentThisComp = this;
        var mouseYForUnload = 0;
        var topValueForUnload = 0;
        window.addEventListener("mouseout",function(e){
            //console.log('mouse outed');
            mouseYForUnload = e.clientY;
            if(mouseYForUnload<topValueForUnload) {
                //console.log("outed again");
                //currentThisComp.savePageFrequentUnload();
            }
        },
        false);
        
    }
    componentWillUnmount(){
        document.removeEventListener("keydown", this.escFunction, false);
    }
    handleMouseHoverSave() {
        this.setState(this.toggleHoverStateSave);
    }
    toggleHoverStateSave(state) {
        return {
            isHoveringSave: !state.isHoveringSave,
        };
    }
    handleMouseHoverPreview() {
        this.setState(this.toggleHoverStatePreview);
    }

    toggleHoverStatePreview(state) {
        return {
            isHoveringPreview: !state.isHoveringPreview,
        };
    }
    handleMouseHoverPublish() {
        this.setState(this.toggleHoverStatePublish);
    }

    toggleHoverStatePublish(state) {
        return {
            isHoveringPublish: !state.isHoveringPublish,
        };
    }

    showPageMenu(event) {
        event.preventDefault();
        var project = this.props.common.projectDetail.project;
        
        var pages = project.pages;
      
        this.setState({ showPageMenu: true, pages:pages }, () => {
            document.addEventListener('click', this.closePageMenu);
        });
    }

    closePageMenu() {
        this.setState({ showPageMenu: false }, () => {
            document.removeEventListener('click', this.closePageMenu);
        });
    }
    // ## Page Click End ##


    // ## Mobile Click Start ##
    showMobileMenu(event) {
        event.preventDefault();
        this.setState({ showMobileMenu: true }, () => {
            document.addEventListener('click', this.hideMobileMenu);
        });
    }

    hideMobileMenu() {
        this.setState({ showMobileMenu: false }, () => {
            document.removeEventListener('click', this.hideMobileMenu);
        });
    }
    // ## Mobile Click End ##

    // ############  Click Function End   #############

    render() {
        return (
            <div id="headerNavigation" className={this.props.common.projectDetail.currentPage}>
                {/*<div className="top-img"
                    onClick={this.showHeader}
                >
                    <i className={this.state.showHeader ? 'fa fa-chevron-up' : 'fa fa-chevron-down'}></i>
                </div>*/}
                <div id="exitPreviewMode" onClick={this.escFunctionButton} style={{'display':'none'}}>Go back to editor</div>
                {
                    this.state.showHeader
                        ? (
                            <nav className="navbar navbar-light">
                                <div>
                                    <div className="logo_bg_curve" style={logo_bg}>
                                        <Link to="/" onClick={()=>this.goToDashboard()} className="navbar-brand"><img alt="" src={require('./../images/filter-logo.png')} /></Link>
                                    </div>
                                    <ul className="nav navbar-nav pull-xs-left">
                                        <li className="nav-item"
                                            onMouseEnter={this.handleMouseHoverPage}
                                            onMouseLeave={this.handleMouseHoverPage}
                                            onClick={this.showPageMenu} >
                                            <span>{this.props.common.projectDetail.currentPage} <i className="flaticon-down-arrow"></i></span>
                                            {
                                                this.state.isHoveringPage && !this.state.showPageMenu &&
                                                <div className="dropdown_menu">
                                                    <h6><b>Switch Page</b></h6>
                                                    <p>
                                                        see all the pages
                                                    </p>
                                                </div>
                                            }
                                            {
                                                this.state.showPageMenu
                                                ? (
                                                    <div className="dropdown_menu home_drop">
                                                        <div className="home_drop_inner">
                                                            <ul>
                                                            {
                                                            this.props.common.projectDetail.project.pages.map((page, key) => (
                                                            <li onClick={() => { this.savePageFrequent(key) }} key={'pages'+key}>{page}</li>
                                                            ))
                                                            }
                                                            </ul>
                                                        </div>    
                                                    </div>
                                                )
                                                : (
                                                    null
                                                )
                                            }
                                        </li>
                                    </ul>
                                    <div className="zoom-in-out-slider">
                                    <span className="zoom-out-icon" onClick={()=>this.zoomIt("-")}><img alt="" src={this.state.zoomOutIcon} /> </span>
                                    <Slider step={10} defaultValue={100}  min={100} max={200} handle={handle} onChange={()=>this.zoomItCaller()}/>
                                    <span className="zoom-in-icon" onClick={()=>this.zoomIt("+")}><img alt="" src={this.state.zoomInIcon} /> </span>
                                    </div>
                                    <ul className="nav navbar-nav view_editing">
                                        
                                        <li className="nav-item"
                                            onMouseEnter={this.handleMouseHoverUndo}
                                            onMouseLeave={this.handleMouseHoverUndo}
                                        >
                                            <span className="navbar-brand" id="undoChanges"><img alt="" src={require('./../images/undo.svg')} /> </span>
                                            {
                                                this.state.isHoveringUndo && !this.state.showPageMenu &&
                                                <div className="dropdown_menu">
                                                    <h6>Undo</h6>
                                                </div>
                                            }
                                        </li>
                                        <li className="nav-item"
                                            onMouseEnter={this.handleMouseHoverRedo}
                                            onMouseLeave={this.handleMouseHoverRedo}
                                        >
                                            <span to="/" className="navbar-brand"  id="redoChanges"><img alt="" src={require('./../images/redo.svg')} /> </span>
                                            {
                                                this.state.isHoveringRedo && !this.state.showPageMenu &&
                                                <div className="dropdown_menu">
                                                    <h6>Redo</h6>
                                                </div>
                                            }
                                        </li>
                                        <li className="nav-item"
                                            onMouseEnter={this.handleMouseHoverSave}
                                            onMouseLeave={this.handleMouseHoverSave}
                                            onClick={this.onOpenSaveModal}
                                        >
                                            <i className="flaticon-tick-inside-circle"></i>
                                            {
                                                this.state.isHoveringSave && !this.state.showPageMenu &&
                                                <div className="dropdown_menu">
                                                    <h6>Save</h6>
                                                    <p>Save your website.</p>
                                                </div>
                                            }
                                        </li>
                                    </ul>
                                    <ul className="nav nav-right-item">
                                    <li className="nav-item"
                                            onMouseEnter={this.handleMouseHoverPreview}
                                            onMouseLeave={this.handleMouseHoverPreview}
                                            onClick={this.previewWindow}
                                        >
                                            <button type="button" className="navPreview_btn">Preview</button>
                                            {
                                                this.state.isHoveringPreview && !this.state.showPageMenu &&
                                                <div className="dropdown_menu">
                                                    <h6>Preview</h6>
                                                    <p>
                                                        See how your site looks like.
                                                    </p>
                                                </div>
                                            }
                                        </li>
                                        <li className="nav-item"
                                            onMouseEnter={this.handleMouseHoverPublish}
                                            onMouseLeave={this.handleMouseHoverPublish}
                                            onClick={this.onOpenSaveModal}
                                        >
                                            <div className="preview_bg_curve" style={preview_bg}>
                                                <span>Publish</span>
                                            </div>
                                            {
                                                this.state.isHoveringPublish && !this.state.showPageMenu &&
                                                <div className="dropdown_menu">
                                                    <h6>Publish</h6>
                                                    <p>
                                                        After Publish your site will be accessable.
                                                    </p>
                                                </div>
                                            }
                                        </li>
                                    </ul>
                                </div>
                            </nav>) : (null)}

                <Modal
                    style={styles}
                    open={this.state.openSaveModal}
                    onClose={this.onCloseSaveModal}
                    contentLabel="Example Modal"
                    overlayClassName="overLay-publish_modal"
                >
                    <div className="modal-header">
                        <div className="center-data">
                            <h4>Save your changes</h4>
                        </div>
                        <div className="col-md-12 center-data">
                            <p>Save your changes, make your site accessable and connect premium domain with your website.</p>
                        </div>
                    </div>

                    <div className="domain_modal_inner">
                        <div className="clear20"></div>
                        <div className="row">
                            <label className="col-md-4">Publish Site</label>
                            <div className="col-md-8">
                                <label className="switch">
                                    <input type="checkbox" id="setSitePublish" onChange={() => { this.setSitePublish() }} />
                                    <span className="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div className="clear20"></div>
                        <div className="row">
                            <div className="col-md-12">
                                <input className="form-control" type="text" value={window.baseURL+'/sites/'+this.state.siteName}  readOnly />
                            </div>
                        </div> 
                        <div className="clear20"></div>   
                        <div className="row">
                            <label className="col-md-12">Connect premium domain</label>
                            <div className="col-md-12">
                            <select defaultValue={this.state.selectedDomain} className="form-control" id="domains_list" onChange={() => { this.connectDomainSubmit() }}>
                                    { (this.state.domains.length) ?
                                    this.state.domains.map((domain) => (
                                        <option key={'domainOption'+domain.id} value={domain.id}>{domain.name}</option>
                                    )) : ''
                                    }
                                </select>
                            </div>
                        </div>
                        <div className="clear20"></div>
                    </div>
                    <div className="publish_modal_bottom">
                        <button type="button" onClick={this.savePage} className="btn theme_btn">Save Site</button>
                    </div>
                </Modal>
            </div>
        );
    }
}
export default connect(mapStateToProps, mapDispatchToProps)(Header);