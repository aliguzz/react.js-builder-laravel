import React from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import Modal from 'react-modal';
import { ADDPROJECTDETAIL} from '../../constants/actionTypes';
import 'react-dropdown/style.css';
import { SketchPicker } from 'react-color';
import { connect } from 'react-redux';
import $ from 'jquery';
import ModalSiteHistory from './Modals/ModalSiteHistory.js';
import ModalFeedback from './Modals/ModalFeedback.js';

  // Our Own Imported Files

/************ JS Imported Files for Drag Drop Featues Start ************/
import ToolBoxItem from './Toolboxes/ToolBoxItem.js';
import ToolBoxGallery from './Toolboxes/ToolBoxGallery.js';
import ToolBoxButton from './Toolboxes/ToolBoxButton.js';
import ToolBoxHoverInteractive from './Toolboxes/ToolBoxHoverInteractive.js';
import ToolBoxSliderInteractive from './Toolboxes/ToolBoxSliderInteractive.js';
import ToolBoxStripAbout from './Toolboxes/ToolBoxStripAbout.js';
import ToolBoxStripContactUs from './Toolboxes/ToolBoxStripContactUs.js';
import ToolBoxStripWelcome from './Toolboxes/ToolBoxStripWelcome.js';
import ToolBoxStripServices from './Toolboxes/ToolBoxStripServices.js';
import ToolBoxStripTestimonial from './Toolboxes/ToolBoxStripTestimonial.js'
import ToolBoxStripTeam from './Toolboxes/ToolBoxStripTeam.js'
import SocialIconsBar from './Toolboxes/SocialIconsBar.js';  
import Contact from './Toolboxes/Contact.js';  
import ContactGetSubcribers from './Toolboxes/ContactGetSubcribers.js';
import ToolBoxThemedMenu from './Toolboxes/ToolBoxThemedMenu.js'

import ToolBoxVideosSocial from './Toolboxes/ToolBoxVideosSocial.js'
import ContactGoogleMaps from './Toolboxes/ContactGoogleMaps.js'
import ContactFullGoogleMaps from './Toolboxes/ContactFullGoogleMaps.js'
import LightBoxWelcome from './Toolboxes/LightBoxWelcome.js'
import LightBoxContact from './Toolboxes/LightBoxContact.js'
import LightBoxSubcribe from './Toolboxes/LightBoxSubcribe.js'
import LightBoxPromotion from './Toolboxes/LightBoxPromotion.js'
import MusicPanda from './Toolboxes/MusicPanda.js'
import ToolBoxAudiosSocial from './Toolboxes/ToolBoxAudiosSocial.js'
import InputForm from './Toolboxes/InputForm.js'

   
/************ JS Imported Files  for Drag Drop Featues End ************/
import UpgradePopup from './UpgradePopup.js';
import ExtraPanel from './ExtraPanel.js';
import AppendMenu from './AppendMenu.js';
import ModalImage from './Modals/ModalImage.js';
import ModalVector from './Modals/ModalVector.js';
import ModalVideos from './Modals/ModalVideos.js';
import ModalDocs from './Modals/ModalDocs.js';
import ModalTracks from './Modals/ModalTracks.js';
import CategoriesModal from './Modals/CategoriesModal.js';
import PandaVideos from './Toolboxes/PandaVideos.js';

Modal.setAppElement('#root');

var maincount = 0;
var newPageCount = 1;

const mapStateToProps = state => {
  return {
      common: state.common
  }};

  const mapDispatchToProps = dispatch => ({
    addProjectDetail: (data) => dispatch({ type: ADDPROJECTDETAIL , payload:{projectDetail:data}})
  });
var thisRef;
  class InspectorTab extends React.Component {
    constructor(props) {
    super(props);
    this.handleMouseHoverTools = this.handleMouseHoverTools.bind(this);
    this.OnClickShowPanel = this.OnClickShowPanel.bind(this);
    this.onhideMenu = this.onhideMenu.bind(this);
    this.OnRenameMenu = this.OnRenameMenu.bind(this);
    this.pressEnterAfterRename = this.pressEnterAfterRename.bind(this);
    this.closeModalImages = this.closeModalImages.bind(this);
    this.closeAudioModalFunc = this.closeAudioModalFunc.bind(this);
    this.closeVideoModalFunc = this.closeVideoModalFunc.bind(this);
    this.closeImageModalFunc = this.closeImageModalFunc.bind(this);
    this.openAudioModalFunc = this.openAudioModalFunc.bind(this);
    this.openVideoModalFunc = this.openVideoModalFunc.bind(this);
    this.openImageModalFunc = this.openImageModalFunc.bind(this);
    
    this.onExitEditor=this.onExitEditor.bind(this);
    this.onOpenGetFeedbackModal = this.onOpenGetFeedbackModal.bind(this);

    this.switchToMobile = this.switchToMobile.bind(this);
    this.switchToDesktop = this.switchToDesktop.bind(this);
    this.openNewTab = this.openNewTab.bind(this);
    this.savePageFrequent = this.savePageFrequent.bind(this);

    this.state = {
      isHoveringTools: false,
      showGridLines: false,
      showScales:false,
      showMainContainer:false,
      showPanel: false,
      hideMenu: false,
      readOnly: true,
      id:'',
      itsSocial: false,
      myMainClass: 'home-page-menu',
      mySubClass: 'sub-page-menu',
      projectDetail: [],
      mainMenu:[],
      openAudioModal: false,
      openVideoModal: false,
      openImgModal: false,
      imgSrc: require('./../../images/filter-logo.png'),

      // Header Things
      openGetFeedbackModal: false,
      openSiteHistoryModal: false,
      openImageSharpeningModal: false,
      openDomainModal: false,
      openGetFeedbackModal : false
    }
    thisRef = this;
  }

  handleChangeComplete(color)
  {
    $('#playground-editor iframe').contents().find('body').css("background-image", 'none');
    $('#playground-editor iframe').contents().find('body').css("background-color", color.hex);
  };

  savePageFrequent(switchTo){
    var awareNotificaton = new Noty(
    {
        text: 'Switching Device, Please Wait...',
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
    $(mainEditorFrameWindow.document).find('body').removeClass('framework-dashes');
    $(mainEditorFrameWindow.document).find('html').removeClass('framework-scale');
    $(mainEditorFrameWindow.document).find('body').removeClass('framework-main-container');
    
    
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
        if(switchTo==="mobile")
        {
          current_this.switchToMobile();
        }
        else if(switchTo==="desktop")
        {
          current_this.switchToDesktop();
        }

    });
    },3000);
}




  switchToMobile(){
    console.log("switch to mobile called");
    document.getElementById("react-tabs-0").click();
    $('.instectorAll').css('display', 'inline-block');
    $("#playground-editor").addClass("mobile-device");
    var project = this.props.common.projectDetail.project;
    var current_this = this;
    window.devicetype = "mobile";
    current_this.props.addProjectDetail(
        {
            project: project,
            currentPage: this.props.common.projectDetail.currentPage,
            projectId:this.props.common.projectDetail.projectId,
            currentPageIndex: this.props.common.projectDetail.currentPageIndex,
            device:'mobile',
            has_blog:this.props.common.projectDetail.has_blog
        }
    );
    $("#mainEditorFrame").attr("src", window.baseURL+"/storage/temp_projects/"+project.model.users["0"].id+"/"+project.model.uuid+"/mobile/"+project.pages[this.props.common.projectDetail.currentPageIndex]+".html");
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
            simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a data-item=\""+(window.zIndex++)+"\" class='componentElement' href=\""+key+".html\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";

            anchor_html += "<div data-item=\""+(window.zIndex++)+"\" class=\"checkbox\"> <input data-item=\""+(window.zIndex++)+"\" class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\"> <label data-item=\""+(window.zIndex++)+"\" class='componentElement' for=\"check-"+index+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
          }
        });
        $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
        $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
    },1000);
    $("#react-tabs-6").hide();
    $("#react-tabs-10").hide();
    $("#react-tabs-2").hide();
    $(".desktop-tab").removeClass("active");
    $(".mobile-tab").addClass("active");
  }
  startBloging(){
    var project = this.props.common.projectDetail.project;
    var current_this = this;
    current_this.props.addProjectDetail(
        {
            project: project,
            currentPage: this.props.common.projectDetail.currentPage,
            projectId:this.props.common.projectDetail.projectId,
            currentPageIndex: this.props.common.projectDetail.currentPageIndex,
            device:'mobile',
            has_blog:1
        }
    );
  }

  switchToDesktop(){
    document.getElementById("react-tabs-0").click();
    $('.instectorAll').css('display', 'inline-block');
    $("#playground-editor").removeClass("mobile-device");
    var project = this.props.common.projectDetail.project;
    var current_this = this;
    window.devicetype = "desktop";
    current_this.props.addProjectDetail(
        {
            project: project,
            currentPage: this.props.common.projectDetail.currentPage,
            projectId:this.props.common.projectDetail.projectId,
            currentPageIndex: this.props.common.projectDetail.currentPageIndex,
            device:'desktop',
            has_blog:this.props.common.projectDetail.has_blog
        }
    );
    $("#mainEditorFrame").attr("src", window.baseURL+"/storage/temp_projects/"+project.model.users["0"].id+"/"+project.model.uuid+"/desktop/"+project.pages[this.props.common.projectDetail.currentPageIndex]+".html");
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
            simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a data-item=\""+(window.zIndex++)+"\" class='componentElement' href=\""+key+".html\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
            anchor_html += "<div data-item=\""+(window.zIndex++)+"\" class=\"checkbox\"> <input data-item=\""+(window.zIndex++)+"\" class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\"> <label data-item=\""+(window.zIndex++)+"\" class='componentElement' for=\"check-"+index+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
          }
        });
        $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
        $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
    },1000);
    $("#react-tabs-6").show();
    $("#react-tabs-10").show();
    $("#react-tabs-2").show();
    $(".desktop-tab").addClass("active");
    $(".mobile-tab").removeClass("active");
  }

  
  
  onOpenSiteHistoryModal(){
    this.setState({
      openSiteHistoryModal: true
    });
  }

  onExitEditor(){
    var projectId = this.props.common.projectDetail.projectId;
    window.location.href = window.baseURL+'/admin/panda-pages/'+projectId+'/edit';
  }

  openSEOSettings(){
    var projectId = this.props.common.projectDetail.projectId;
    var link  =  window.baseURL+'/admin/panda-pages/'+projectId+'/promote-seo';
    var win = window.open(link, '_blank');
    win.focus();
  }

  onOpenGetFeedbackModal(){
    this.setState({
        openGetFeedbackModal: true
    });
  };

  viewPublishSite(){
    var projectDetail = this.props.common.projectDetail;
    var link = window.baseURL+'/sites/'+projectDetail.project.model.name;
    var win = window.open(link, '_blank');
    win.focus();
  }

  openNewTab(page){
    var win = window.open(window.baseURL+'/'+page, '_blank');
    win.focus();
  }

  // Header Functions End  ----------------------------------------------

  componentDidMount(){
    var mainEditorFrameWindow = $('#mainEditorFrame').get(0).contentWindow;
    if (this.state.showGridLines) {
      $(mainEditorFrameWindow.document).find('body').removeClass('framework-dashes');
    } else {
      $(mainEditorFrameWindow.document).find('body').addClass('framework-dashes');
    }
    if (this.state.showScales) {
      $(mainEditorFrameWindow.document).find('html').removeClass('framework-scale');
    } else {
      $(mainEditorFrameWindow.document).find('html').addClass('framework-scale');
    }
    if (this.state.showMainContainer) {
      $(mainEditorFrameWindow.document).find('body').removeClass('framework-main-container');
    } else {
      $(mainEditorFrameWindow.document).find('body').addClass('framework-main-container');
    }

    $('body').on('click', '#changeElementBgImage', function ()
    {
      window.fromElementBGConfig = true;
      thisRef.openImageModalFunc();
      $("#main_styleManagerMainElements").hide();
    })
    $('body').on('click', '#configureElement', function ()
    {
      var currentSelectedComponent = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
      var currentSelectedComponentimg = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
      if(currentSelectedComponent.prop("tagName") == 'INPUT' || currentSelectedComponent.prop("tagName") == 'TEXTAREA' || currentSelectedComponent.prop("tagName") == 'SELECT'){
        
        var configModal = $('#inputConfig');
        var inputHtml = '';
        var attrs = currentSelectedComponent["0"].attributes;
        var required_already = 0;
        for (var i = 0; i < attrs.length; i++) {
          var attrib = attrs[i];
          if(attrib.name.substr(0,4) != 'data' && attrib.name != 'class' && attrib.name != 'type'){
            if(attrib.name == 'required'){
              attrib.value = true;
              required_already = 1;
            }
            inputHtml += '<div class="inputeditable-div"><label>'+attrib.name.charAt(0).toUpperCase() + attrib.name.slice(1)+'</label><input type="text" name="'+attrib.name+'" value="'+attrib.value+'"/></div>';
          }
        }
        if(required_already == 0){
          inputHtml += '<div class="inputeditable-div"><label>Required</label><select name="required"><option value="false">No</option><option value="true">Yes</option></select></div>';
        }
        if(currentSelectedComponent.prop("tagName") == 'SELECT'){
          var options_html = "<div class='options-select'><label>Options</label>";
          currentSelectedComponent.children('option').each(function(key,val){
            if($(this).attr("value")){
              options_html += "<div class='optionlist optionlist"+key+"'><span class=' config close_popup' onclick=\"$('.optionlist"+key+"').remove();$('#playground-editor iframe').contents().find('html').find('.selectedElementEditor option:eq("+key+")').remove();\"><i class='fa fa-times'></i></span><div class='optionvalue optionvalue"+key+"'><label>Value</label><input type='text' value='"+$(this).attr("value")+"'></div><div class='optionplaceholder optionplaceholder"+key+"'><label>Placeholder</label><input type='text' value='"+$(this).html()+"'></div></div>";
            }
          });
          options_html += "</div><button class='add-more-options btn btn-warning'>Add More</button>";
          inputHtml = inputHtml+options_html;
        }

        configModal.children(".dynamic-area").html(inputHtml);
        configModal.children(".static-area").html("");
      }else if(currentSelectedComponent.prop("tagName") == 'FORM'){
        var configModal = $('#inputConfig');
        var inputHtml = '';
        var attrs = currentSelectedComponent["0"].attributes;
        var required_already = 0;
        for (var i = 0; i < attrs.length; i++) {
          var attrib = attrs[i];
          if(attrib.name.substr(0,4) != 'data' && attrib.name != 'class' && attrib.name != 'type'){
            if(attrib.name == 'method'){
              inputHtml += '<div class="inputeditable-div"><label>'+attrib.name.charAt(0).toUpperCase() + attrib.name.slice(1)+'</label><select name="'+attrib.name+'">';
              if(attrib.value == 'GET'){
                inputHtml += '<option value="POST">POST</option><option value="GET" selected="">GET</option>';
              }else{
                inputHtml += '<option value="POST" selected="">POST</option><option value="GET" >GET</option>';
              }
              inputHtml +='</select></div>';
            }else{
              inputHtml += '<div class="inputeditable-div"><label>'+attrib.name.charAt(0).toUpperCase() + attrib.name.slice(1)+'</label><input type="text" name="'+attrib.name+'" value="'+attrib.value+'"/></div>';
            }
          }
        }
        var staticHtml = '<button data-type="input">Add New Input</button><button data-type="textarea">Add New Textarea</button><button data-type="select">Add New Select</button>';
        configModal.children(".dynamic-area").html(inputHtml);
        configModal.children(".static-area").html(staticHtml);
      }else if(currentSelectedComponent[0].hasAttribute('lightbox') || currentSelectedComponent.parents('[lightbox="1"]').length>0){
        var configModal = $('#lightboxConfig');
        if(currentSelectedComponent[0].hasAttribute('lightbox')){}else{
          currentSelectedComponent = currentSelectedComponent.parents('[lightbox="1"]');
        }
        if(currentSelectedComponent[0].hasAttribute('openOnPageLoad')){
          currentSelectedComponent.find("lightbox-on-page-open").prop("checked",true);
        }else{
          currentSelectedComponent.find("lightbox-on-page-open").prop("checked",false);
        }
      }else{
        var configModal = $('#socialVideoLinkConfig');
      }
      configModal.show();
      var currentOffsets = currentSelectedComponent.offset();
      var leftOffset = currentOffsets.left+300;
      var topOffset = currentOffsets.top;
      console.log("currentSelectedComponent");
      console.log(currentSelectedComponent);

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
      if(currentSelectedComponent[0].hasAttribute('vimoe')){
          $('#socialLinksContainer').show();
          $('#socialVideoControls').show();
          $('#mapsLinksContainer').hide();
          $('#autoLoopSocialVideo').show();
          $('#autoPlaySocialVideo').show();
      }
      else if(currentSelectedComponent[0].hasAttribute('youtube')){
          $('#socialVideoControls').show();
          $('#socialLinksContainer').show();
          $('#autoLoopSocialVideo').show();
          $('#autoPlaySocialVideo').show();
          $('#mapsLinksContainer').hide();
      }
      else if(currentSelectedComponent[0].hasAttribute('dailymotion')){
          $('#socialLinksContainer').show();
          $('#socialVideoControls').show();
          $('#autoLoopSocialVideo').hide();
          $('#autoPlaySocialVideo').show();
          $('#mapsLinksContainer').hide();
      }
      else if(currentSelectedComponent[0].hasAttribute('socialbar')){
          $('#socialLinksContainer').show();
          $('#socialVideoControls').hide();
          $('#autoLoopSocialVideo').hide();
          $('#autoPlaySocialVideo').hide();
          $('#mapsLinksContainer').hide();
      }
      else if(currentSelectedComponent[0].hasAttribute('cpandavideo')){
        console.log('add videos config clicked');
          window.fromConfig = true;
          $('#socialVideoLinkConfig').hide();
          thisRef.openVideoModalFunc();
      } 
      else if(currentSelectedComponent[0].hasAttribute('musicelem')){
          window.fromConfig = true;
          $('#socialVideoLinkConfig').hide();
          thisRef.openAudioModalFunc();
      }
      else if(currentSelectedComponentimg[0].tagName.toLowerCase() == 'img'){
        window.fromConfig = true;
        $('#socialVideoLinkConfig').hide();
        thisRef.openImageModalFunc();
      }
      else if(currentSelectedComponent[0].hasAttribute('mapelement'))
      {
          $('#mapsLinksContainer').show();
          $('#socialLinksContainer').hide();
          $('#socialVideoControls').hide();
          $('#autoLoopSocialVideo').hide();
          $('#autoPlaySocialVideo').hide();
          var inputAutocomplete = document.getElementById('mapAutoCompleteLink')
          var autocomplete = new google.maps.places.Autocomplete(inputAutocomplete);
          autocomplete.addListener('place_changed', function()
          {
              var place = autocomplete.getPlace();
              if (!place.geometry)
              {
                  window.alert("No details available for input: '" + place.name + "'");
                  return;
              }
              var currentSelectedComp = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor').parents('.componentElement');
              var lat = place.geometry.location.lat();
              var lng = place.geometry.location.lng();
              currentSelectedComp.attr('lat', lat);
              currentSelectedComp.attr('lng', lng);
              var mapElement = currentSelectedComp.find('div').first()[0];
              var maptype = currentSelectedComp.attr('maptype');
              console.log(mapElement);
              console.log(maptype);
              $('#playground-editor iframe')[0].contentWindow.trigerMap(mapElement, maptype, lat, lng);
            });
      }
      var iframeTop = $('#playground-editor iframe').offset().top;
      configModal.css({"top": (topOffset+iframeTop), "left": (leftOffset-configModal.width()-10)});
    })


    var current_this = this;
    var mainMenu = [];
    setTimeout(function(){
      current_this.setState({
        projectDetail: current_this.props.common.projectDetail
      });
      current_this.props.common.projectDetail.project.pages.forEach(function(key,index){
        maincount = index;
        if(key.substr(0, 9) === 'new_page_'){
          newPageCount = key.replace('new_page_','').replace('(copy)','');
          newPageCount = parseInt(newPageCount) + 1;
        }
        mainMenu.push({
          className:key+'-page-menu',
          placeholder:key,
          tabName:key,
          id:'main'+maincount
        });
      });
      current_this.setState({
        mainMenu: mainMenu
      });
    },2000);

  }

  OnClickShowPanel() {
    this.setState({showPanel: !this.state.showPanel});
  }

  //  ** Tools Hover Start **
  handleMouseHoverTools() {
    this.setState(this.toggleHoverStateTools);
  }

  toggleHoverStateTools(state) {
    return {
      isHoveringTools: !state.isHoveringTools
    }
  }

  hideTabsMain() {
    document.getElementById("react-tabs-0").click();
    $('.instectorAll').css('display', 'inline-block');
  }
  //  ** Tools Hover End **

  showHideGridLines() {
    this.setState({ showGridLines: !this.state.showGridLines });
    var mainEditorFrameWindow = $('#mainEditorFrame').get(0).contentWindow;
    if (this.state.showGridLines) {
      $(mainEditorFrameWindow.document).find('body').removeClass('framework-dashes');
    } else {
      $(mainEditorFrameWindow.document).find('body').addClass('framework-dashes');
    }
  }

  showHideMainContainer() {
    this.setState({ showMainContainer: !this.state.showMainContainer });
    var mainEditorFrameWindow = $('#mainEditorFrame').get(0).contentWindow;
    if (this.state.showMainContainer) {
      $(mainEditorFrameWindow.document).find('body').removeClass('framework-main-container');
    } else {
      $(mainEditorFrameWindow.document).find('body').addClass('framework-main-container');
    }
  }

  showHideScales() {
    this.setState({ showScales: !this.state.showScales });
    var mainEditorFrameWindow = $('#mainEditorFrame').get(0).contentWindow;
    if (this.state.showScales) {
      $(mainEditorFrameWindow.document).find('html').removeClass('framework-scale');
    } else {
      $(mainEditorFrameWindow.document).find('html').addClass('framework-scale');
    }
  }

  handleDrag(event) {
    event.dataTransfer.setData("text", event.target.outerHTML);
  }
  
  addPage(){
    //let arr = Object.assign(this.state.mainMenu);
    maincount = maincount + 1;
    var projectId = this.props.common.projectDetail.projectId;
    var newPageName = 'New Page '+newPageCount;
    fetch(window.baseURL+"/api/projects/add-page", {
      method: 'POST',
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
      },
      credentials: 'include',
      body: JSON.stringify({
        newPageName: newPageName,
          projectId:projectId
      })
      }).then(res => res.json())
      .then(
        (result) => {
          var project = result.project;
          window.ProjectPages = project.pages;
          this.props.addProjectDetail(
            {
              project: project,
              currentPage: this.props.common.projectDetail.currentPage,
              projectId:projectId,
              currentPageIndex: this.props.common.projectDetail.currentPageIndex,
              device: this.props.common.projectDetail.device,
              has_blog:this.props.common.projectDetail.has_blog
            }
          );
          swal({
            title: "Success!",
            text: "Page added successfully!",
            type: "success",
            showConfirmButton: false,
            buttons: false,
            timer: 3000,
        });
        newPageCount++;
        var mainMenu = [];
        result.project.pages.forEach(function(key,index){
          maincount = index;
          mainMenu.push({
            className:key+'-page-menu',
            placeholder:key,
            tabName:key,
            id:'main'+maincount
          });
        });
        var current_this = this;
        setTimeout(function(){
          current_this.setState({
            mainMenu: mainMenu
          });
        },500);
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
              simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a data-item=\""+(window.zIndex++)+"\" class='componentElement' href=\""+key+".html\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
              anchor_html += "<div data-item=\""+(window.zIndex++)+"\" class=\"checkbox\"> <input data-item=\""+(window.zIndex++)+"\" class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\"> <label data-item=\""+(window.zIndex++)+"\" class='componentElement' for=\"check-"+index+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
            }
          });
          $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
          $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
      },1000);
      });
  }

  duplicatePage(tname, cname){
    var projectId = this.props.common.projectDetail.projectId;
    var PageName = tname;
    fetch(window.baseURL+"/api/projects/clone-page", {
      method: 'POST',
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
      },
      credentials: 'include',
      body: JSON.stringify({
          PageName: PageName,
          projectId:projectId
      })
      }).then(res => res.json())
      .then(
        (result) => {
          var project = result.project;
          window.ProjectPages = project.pages;
          this.props.addProjectDetail(
            {
              project: project,
              currentPage: this.props.common.projectDetail.currentPage,
              projectId:projectId,
              currentPageIndex: this.props.common.projectDetail.currentPageIndex,
              device: this.props.common.projectDetail.device,
              has_blog:this.props.common.projectDetail.has_blog
            }
          );
            swal({
                title: "Success!",
                text: "Page cloned successfully!",
                type: "success",
                showConfirmButton: false,
                buttons: false,
                timer: 3000,
            });
            var mainMenu = [];
            result.project.pages.forEach(function(key,index){
              maincount = index;
              mainMenu.push({
                className:key+'-page-menu',
                placeholder:key,
                tabName:key,
                id:'main'+maincount
              });
            });
            var current_this = this;
            setTimeout(function(){
              current_this.setState({
                mainMenu: mainMenu
              });
            },1000);
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
                  simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a data-item=\""+(window.zIndex++)+"\" class='componentElement' href=\""+key+".html\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
                  anchor_html += "<div data-item=\""+(window.zIndex++)+"\" class=\"checkbox\"> <input data-item=\""+(window.zIndex++)+"\" class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\"> <label data-item=\""+(window.zIndex++)+"\" class='componentElement' for=\"check-"+index+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
                }
              });
              $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
              $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
          },1000);
      });
  }

  onhideMenu(id){
    this.setState({hideMenu: !this.state.hideMenu});
  }

  OnRenameMenu(readOnly, id) {
    this.setState({
      readOnly: false,
      id: id
    });
  }

  changePageName(placeholder,value){
    if(!this.state.readOnly){
      this.setState({
        readOnly:true
      });
    var projectId = this.props.common.projectDetail.projectId;
    var newPageName = value;
    var oldPageName = placeholder;
    fetch(window.baseURL+"/api/projects/rename-page", {
      method: 'POST',
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
      },
      credentials: 'include',
      body: JSON.stringify({
        newPageName: newPageName,
          projectId:projectId,
          oldPageName:oldPageName
      })
      }).then(res => res.json())
      .then(
        (result) => {
          if(result.error){
            swal({
                title: "Error!",
                text: result.message,
                type: "error",
                showConfirmButton: false,
                buttons: false,
                timer: 3000,
            });
          }else{
            var project = result.project;
            if(oldPageName == this.props.common.projectDetail.currentPage){
               var current_this = this;
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
            }
            
            window.ProjectPages = project.pages;
            this.props.addProjectDetail(
              {
                project: project,
                currentPage: this.props.common.projectDetail.currentPage,projectId:projectId,
                currentPageIndex: this.props.common.projectDetail.currentPageIndex,
                device: this.props.common.projectDetail.device,
                has_blog:this.props.common.projectDetail.has_blog
              }
            );
            swal({
                title: "Success!",
                text: "Page retitled successfully!",
                type: "success",
                showConfirmButton: false,
                buttons: false,
                timer: 3000,
            });
            var mainMenu = [];
            result.project.pages.forEach(function(key,index){
              maincount = index;
              mainMenu.push({
                className:key+'-page-menu',
                placeholder:key,
                tabName:key,
                id:'main'+maincount
              });
            });
            var current_this = this;
            setTimeout(function(){
              current_this.setState({
                mainMenu: mainMenu
              });
            },1000);
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
                  simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a data-item=\""+(window.zIndex++)+"\" class='componentElement' href=\""+key+".html\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
                  anchor_html += "<div data-item=\""+(window.zIndex++)+"\" class=\"checkbox\"> <input data-item=\""+(window.zIndex++)+"\" class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\"> <label data-item=\""+(window.zIndex++)+"\" class='componentElement' for=\"check-"+index+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
                }
              });
              $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
              $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
          },1000);
          }
      });
    }
  }

  onBlurInput(placeholder,value){
    this.changePageName(placeholder,value);
  }

  pressEnterAfterRename(placeholder,value){
    this.changePageName(placeholder,value);
  }

  openModalImages(issocial){
    this.setState({
      openImgModal: true
    });
    if(issocial){
      setTimeout(function(){
        $(".social-images-modal").click();
      },500);
    }
  }

  deletePage(page){
    var projectId = this.props.common.projectDetail.projectId;
    var PageName = page;
    fetch(window.baseURL+"/api/projects/delete-page", {
      method: 'POST',
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
      },
      credentials: 'include',
      body: JSON.stringify({
          PageName: PageName,
          projectId:projectId
      })
      }).then(res => res.json())
      .then(
        (result) => {
          var project = result.project;
          window.ProjectPages = project.pages;
          this.props.addProjectDetail(
            {
              project: project,
              currentPage: this.props.common.projectDetail.currentPage,
              projectId:projectId,
              currentPageIndex: this.props.common.projectDetail.currentPageIndex,
              device: this.props.common.projectDetail.device,
              has_blog:this.props.common.projectDetail.has_blog
            }
          );
            swal({
                title: "Success!",
                text: "Page deleted successfully!",
                type: "success",
                showConfirmButton: false,
                buttons: false,
                timer: 3000,
            });
            var mainMenu = [];
            result.project.pages.forEach(function(key,index){
              maincount = index;
              mainMenu.push({
                className:key+'-page-menu',
                placeholder:key,
                tabName:key,
                id:'main'+maincount
              });
            });
            var current_this = this;
            setTimeout(function(){
              current_this.setState({
                mainMenu: mainMenu
              });
            },1000);
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
                  simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a data-item=\""+(window.zIndex++)+"\" class='componentElement' href=\""+key+".html\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
                  anchor_html += "<div data-item=\""+(window.zIndex++)+"\" class=\"checkbox\"> <input data-item=\""+(window.zIndex++)+"\" class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\"> <label data-item=\""+(window.zIndex++)+"\" class='componentElement' for=\"check-"+index+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
                }
              });
              $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
              $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
          },1000);
      });
  }

  closeModalImages(){
    this.setState({
      openImageModal: false
    });
  }

  saveSite(){  
    var win = window.open(window.baseURL+'/admin/upgrade-account', '_blank');
    win.focus();
  }

  closeAudioModalFunc(){
    this.setState({
      openAudioModal: false
    });
  }

  openAudioModalFunc(){
    this.setState({
      openAudioModal: true
    });
  }

  closeImageModalFunc(){
    this.setState({
      openImgModal: false
    });
  }

  openImageModalFunc(){
    this.setState({
      openImgModal: true
    });
  }

  closeVideoModalFunc(){
    this.setState({
      openVideoModal: false
    });
  }

  openVideoModalFunc(){
    this.setState({
      openVideoModal : true
    });
  }
  openHelpCenter(){
    $zopim.livechat.window.show();
  }


  render() {
    var toolBoxItem = require('./templates/ToolBoxItem.json').containers[0];
    var gallaryTitles = require('./templates/gallaryTitles.json').containers[0];
    var buttonTitles = require('./templates/ButtonTitles.json').containers[0];
    var interactiveTitles = require('./templates/InteractiveHoverBoxTitles.json').containers[0];
    var interactiveSliderTitles = require('./templates/InteractiveSliderTitles.json').containers[0];
    var stripAbout = require('./templates/StripAbout.json').containers[0];
    var stripContactUs = require('./templates/StripContactUs.json').containers[0];
    var stripWelcome = require('./templates/StripWelcome.json').containers[0];
    var stripServices = require('./templates/StripServices.json').containers[0];
    var stripTeam = require('./templates/StripTeam.json').containers[0];  
    var stripTestimonial = require('./templates/StripTestimonial.json').containers[0];
    var socialIconsBar = require('./templates/SocialIconsBar.json').containers[0];
    var contact = require('./templates/Contact.json').containers[0];
    var contactGetSubcribers = require('./templates/ContactGetSubcribers.json').containers[0];
    var menuThemedTitles = require('./templates/MenuThemedTitles.json').containers[0];
    var contactGoogleMaps = require('./templates/ContactGoogleMaps.json').containers[0];
    var contactFullGoogleMaps = require('./templates/ContactFullGoogleMaps.json').containers[0];
    var videoSocial = require('./templates/VideoSocial.json').containers[0];
    var audioSocial = require('./templates/AudioSocial.json').containers[0];
    var lightBoxContact = require('./templates/LightBoxContact.json').containers[0];
    var lightBoxPromotion = require('./templates/LightBoxPromotion.json').containers[0];
    var lightBoxSubcribe = require('./templates/LightBoxSubcribe.json').containers[0];
    var lightBoxWelcome = require('./templates/LightBoxWelcome.json').containers[0];
    var musicPanda = require('./templates/MusicPanda.json').containers[0];
    var pandaVideos = require('./templates/PandaVideos.json').containers[0];
    var inputForm = require('./templates/InputForm.json').containers[0];

    return (
      <div>
        <Tabs id="inspectorTabs">
          <TabList>
            <Tab className="dummy-tab"></Tab>
            <Tab className="instectorAll menu-pages"><i className="flaticon-menu-button-of-three-horizontal-lines"></i><span> Pages & Nav</span></Tab>
            <Tab className="instectorAll my-uploads"><i className="flaticon-background"></i><span>Background</span></Tab>
            <Tab className="instectorAll add"><i className="flaticon-mathematical-addition-sign"></i> <span>Add Element</span></Tab>
            <Tab className="add-apps"><i className="flaticon-add"></i> <span>Select CP Apps</span></Tab>
            <Tab className="instectorAll background"><i className="flaticon-upload"></i><span>My Uploads</span></Tab>
            <Tab className="schedule"><i className="flaticon-time-left"></i> <span>Schedule</span></Tab>
            <Tab className="instectorAll start-bloging"><i className="flaticon-blogger-logo"></i> <span>Blog</span></Tab>
            <Tab className="instectorAll tools"><i className="flaticon-settings"></i> <span>Tools</span></Tab>
            <Tab className="instectorAll settings_drop"><i className="fa fa-cogs"></i> <span>Settings</span></Tab>
            <li className="instectorAll siteView_change desktop-tab active" onClick={() => this.savePageFrequent("desktop")}>
              <div className="nav_icon"><i className="flaticon-desktop"></i></div>
              <span>Desktop</span>
            </li>
            <li className="instectorAll siteView_change mobile-tab" onClick={() => this.savePageFrequent("mobile")}>
              <div className="nav_icon"><i className="flaticon-technology"></i></div>
              <span>Mobile</span>
            </li>
          </TabList>
          
          <TabPanel className="dummy-tab-pannel"></TabPanel>
          <TabPanel className="left_panel_wrap menu_panel_wrap">
            <Tabs>
              <TabList>
                <Tab className="site-menu">Navigations</Tab>
              </TabList>
              <TabPanel>
                <div className="tab-panel-head"> Navigations
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body">
                  <div className="menu_panel_inner">
                  <ul>
                    {this.state.mainMenu.map((item, index)=>{
                      return <AppendMenu key={name+index}
                        duplicatePage={(tname, cname)=>this.duplicatePage(tname, cname)} 
                        addSubpage={(id,name,item)=>this.addToSubPage(id,name,item)} 
                        subMenu={item.subMenu}
                        mainMenu={item} 
                        className={item.className} 
                        id={item.id} 
                        dataIndex={index}
                        tabName={item.tabName} 
                        placeholder={item.placeholder}
                        readOnly={this.state.readOnly}
                        addToMainMenu={(id,name, item)=>this.addToMainMenu(id,name, item)} 
                        onhideMenu={(name)=>this.onhideMenu(name)}
                        hideMenu={this.state.hideMenu}
                        isMain={this.state.myMainClass}
                        isSub={this.state.mySubClass}
                        blurInput={(placeholder,value)=>this.onBlurInput(placeholder,value)}
                        deletePage={(page)=>this.deletePage(page)}
                        renameMenu={(readOnly,id)=>this.OnRenameMenu(readOnly,id)}
                        pressEnterAfterRename={(placeholder,value)=>this.pressEnterAfterRename(placeholder,value)}
                        myid={this.state.id}
                        onHideExtraPanel={this.OnClickShowPanel}
                        />
                      })
                    }
                    </ul>
                  </div> 
                  {this.state.showPanel ? <ExtraPanel onHideExtraPanel={this.OnClickShowPanel} /> : null} 
                </div>
                <div className="tab-panel-footer">
                  <button className="btn theme_btn" onClick={()=>this.addPage()}>Add Page</button>
                </div>
              </TabPanel>
            </Tabs>
          </TabPanel>
          <TabPanel className="left_panel_wrap page_bg_panel">
            <div className="tab-panel-head">Page Background
              <div className="modal_btn pull-right">
                
                <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
              </div>
            </div>
            <Tabs>
              <div className="tab-panel-body">
                <div className="generic_tabs">
                  <TabList>
                    <Tab className="flaticon-painter-palette">Background Color </Tab>
                    <div className="background-images-modal">
                    <ModalImage textContent="Background Image" modalFalseState={this.closeModalImages} bg={true} modalState={true}/>
                    <ModalVideos textContent="Background Video" videomodalFalseState={this.closeVideoModalFunc} bg={true} modalState={false}/>
                    </div>
                  </TabList>
                </div>
                <div className="background-tiles-wrap">
                  <div className="page_bg_tabs_inner">
                    <div className="row">
                      <TabPanel>
                        <SketchPicker onChangeComplete={ this.handleChangeComplete } />
                      </TabPanel>
                    </div>
                  </div>
                </div>
              </div>
            </Tabs>
          </TabPanel>
          <TabPanel className="left_panel_wrap add_data_wrap">
            <Tabs>
              <TabList id="content-m">
                <Tab className="text">Text</Tab>
                <Tab className="image">Image</Tab>
                <Tab className="gallery">Galleries</Tab>
                <Tab className="button">Button</Tab>
                <Tab className="strip">Banners</Tab>
                <Tab className="video">Video</Tab>
                <Tab className="music">Music</Tab>
                <Tab className="social">Social Links</Tab>
                <Tab className="contact">Forms</Tab>
                <Tab className="menu">Menu</Tab>
                <Tab className="lightbox">Popup</Tab>
              </TabList>
              <TabPanel>
                <div className="tab-panel-head">Select Text
                  <div className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </div>
                </div>
                <div className="tab-panel-body" id="text-panel-body">
                  <div>
                    <ToolBoxItem imgUrl={require('./../../images/text.jpg')} container={toolBoxItem}/>
                  </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Image
                  <div className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </div>
                </div>
                <div className="tab-panel-body" id="image-panel-body">
                    <div className="add_data_social">
                      <div className="mb_20" onClick={() => { this.openModalImages(false) }}>
                        <h4 className="user_image"><i className="fa fa-user"></i> Image Uploads</h4>
                      </div>
                      <div className="mb_20" onClick={() => { this.openModalImages(true) }} >
                        <h4 className="facebook_image"><i className="fa fa-facebook"></i> Facebook Images</h4>
                      </div>
                      <div className="mb_20" onClick={() => { this.openModalImages(true) }}>
                        <h4 className="instagram_image"><i className="fa fa-instagram"></i> Instagram Images</h4>
                      </div>
                      <div className="mb_20" onClick={() => { this.openModalImages(true) }}>
                       <h4 className="dropbox_image"> <i className="fa fa-dropbox"></i> DropBox Images</h4>
                      </div>
                      <div className="mb_20" onClick={() => { this.openModalImages(true) }}>
                        <h4 className="google_image"> <i className="fa fa-google-plus"></i> Google Images</h4>
                      </div>
                      <div className="mb_20" onClick={() => { this.openModalImages(true) }}>
                        <h4 className="googleD_image"><i className="fa fa-google"></i> Google Drive Images</h4>
                        </div>
                    </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Galleries
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body col-md-12" id="gallery-panel-body">
                  <div>
                    <ToolBoxGallery imgUrl={require('./../../images/gallary.jpg')} container={gallaryTitles}/>
                  </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Button
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body col-md-12" id="button-panel-body">
                    <div className="row themed-buttons-cont">
                    <ToolBoxButton imgUrl={require('./../../images/themed-buttons.jpg')} container={buttonTitles}/>
                    </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Banners
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body col-md-12" id="strip-panel-body">
                  <div>
                    <ToolBoxHoverInteractive imgUrl={require('./../../images/hover-boxes.jpg')} container={interactiveTitles}/>
                  </div>
                  <div>
                    <ToolBoxStripAbout imgUrl={require('./../../images/about-strip.jpg')} container={stripAbout}/>
                  </div>
                  <div>
                    <ToolBoxStripContactUs imgUrl={require('./../../images/contact-strip.jpg')} container={stripContactUs}/>
                  </div>
                  <div>
                    <ToolBoxStripWelcome imgUrl={require('./../../images/welcome-strip.jpg')} container={stripWelcome}/>
                  </div>
                  <div>
                    <ToolBoxStripServices imgUrl={require('./../../images/services-strip.jpg')} container={stripServices}/>
                  </div>
                  <div>
                    <ToolBoxStripTeam imgUrl={require('./../../images/team-strip.jpg')} container={stripTeam}/>
                  </div>  
                  <div>
                    <ToolBoxStripTestimonial imgUrl={require('./../../images/testimonials-strip.jpg')} container={stripTestimonial}/>
                  </div>   
                  {/* <div>
                    <ToolBoxSliderInteractive imgUrl={require('./../../images/interactive.jpg')} container={interactiveSliderTitles}/>
                  </div> */}
                  
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Video
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body col-md-12" id="video-panel-body">
                    <div>
                      <ToolBoxVideosSocial imgUrl={require('./../../images/social_video_plyaers.jpg')} container={videoSocial}/>
                    </div>
                    <div>
                      <PandaVideos imgUrl={require('./../../images/panda-videos.jpg')} container={pandaVideos}/>
                    </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Music
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body" id="music-panel-body">
                  <div>
                    <MusicPanda imgUrl={require('./../../images/panda-music.jpg')} container={musicPanda}/>
                  </div>
                  <div>
                    <ToolBoxAudiosSocial imgUrl={require('./../../images/soundcloud-player.png')} container={audioSocial}/>
                  </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Social Links <span className="modal_btn pull-right">
                  <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                </span>
                </div>
                <div className="tab-panel-body" id="social-panel-body">
                  <SocialIconsBar imgUrl={require('./../../images/social-bars.jpg')} container={socialIconsBar}/>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">
                  Select Forms
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                  <div className="tab-panel-body col-md-12" id="contact-panel-body">
                    <div>
                      <Contact imgUrl={require('./../../images/contact-forms.jpg')} container={contact}/>
                    </div>
                    <div>
                      <ContactGetSubcribers imgUrl={require('./../../images/contact-events.jpg')} container={contactGetSubcribers}/>
                    </div>
                    <div className="" id="menu-panel-body">
                      <InputForm imgUrl={require('./../../images/input-forms.jpg')} container={inputForm} />
                    </div>
                    <div>
                      <ContactGoogleMaps imgUrl={require('./../../images/google_map.jpg')} container={contactGoogleMaps}/>
                    </div>
                    <div>
                      <ContactFullGoogleMaps imgUrl={require('./../../images/full-wdith-goole-map.jpg')} container={contactFullGoogleMaps}/>
                    </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Menu
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body col-md-12" id="menu-panel-body">
                    <div>
                      <ToolBoxThemedMenu imgUrl={require('./../../images/menu.jpg')} container={menuThemedTitles}/>
                    </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Select Popup
                  <span className="modal_btn pull-right">
                    
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body col-md-12" id="lightbox-panel-body">
                    <div>
                      <LightBoxWelcome imgUrl={require('./../../images/welcome-lightbox.jpg')} container={lightBoxWelcome}/>
                    </div>
                    <div>
                      <LightBoxSubcribe imgUrl={require('./../../images/subscribe-lightbox.jpg')} container={lightBoxSubcribe}/>
                    </div>
                    <div>
                      <LightBoxPromotion imgUrl={require('./../../images/promotion-lightbox.jpg')} container={lightBoxPromotion}/>
                    </div>
                    <div>
                      <LightBoxContact imgUrl={require('./../../images/contact-lightbox.jpg')} container={lightBoxContact}/>
                    </div>
                </div>
              </TabPanel>
            </Tabs >
          </TabPanel >
          <TabPanel className="left_panel_wrap panda_app_wrap">
            <div className="tab-panel-head">Panda App Market
              <div className="modal_btn pull-right">
                
                <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
              </div>
            </div>
            <div className="tab-panel-body col-md-12">
              <button className="btn theme_btn pull-left">Categories</button>
              <div className="modal_search">
                <button className="btn" type="submit">
                  <i className="fa fa-search"></i>
                </button>
                <input type="text" className="form-control pull-right search-app" placeholder="What do you want to add to your site?" />
              </div>
            </div>
            <div className="appstore">
              <h2 className="appstore_head">5 Powerful Apps for Your <CategoriesModal/> </h2> 
              <div className="panda_booking_wrap">
                <div className="panda_booking">
                  <img width="45" src="/images/calendar-icon.png" />
                  <p className="panda_booking_descrip">Grow your bussiness with easy online scheduling</p>
                  <h4>Panda Booking</h4>
                  <div className="pnada_booking_pricing">
                    <a href="!#">Free/Premium</a>
                  </div>
                  <button className="btn theme_btn"><i className="fa fa-plus"></i> Add to Site</button>
                  <hr />
                  <div className="booking_rating">
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <span>(832)</span>
                  </div>
                  <div className="show_download">
                    <i className="fa fa-download"></i>
                    <span>1,789,957</span>
                  </div>
                </div>
              </div>
            </div>
            <div className="panda_booking_wrap panda_booking_wrap02">
            <div className="panda_booking">
                  <img width="45" src="/images/calendar-icon.png" />
                  <p className="panda_booking_descrip">Grow your bussiness with easy online scheduling</p>
                  <h4>Panda Booking</h4>
                  <div className="pnada_booking_pricing">
                    <a href="!#">Free/Premium</a>
                  </div>
                  <button className="btn theme_btn"><i className="fa fa-plus"></i> Add to Site</button>
                  <hr />
                  <div className="booking_rating">
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <span>(832)</span>
                  </div>
                  <div className="show_download">
                    <i className="fa fa-download"></i>
                    <span>1,789,957</span>
                  </div>
                </div>
                <div className="panda_booking">
                  <img width="45" src="/images/calendar-icon.png" />
                  <p className="panda_booking_descrip">Grow your bussiness with easy online scheduling</p>
                  <h4>Panda Booking</h4>
                  <div className="pnada_booking_pricing">
                    <a href="!#">Free/Premium</a>
                  </div>
                  <button className="btn theme_btn"><i className="fa fa-plus"></i> Add to Site</button>
                  <hr />
                  <div className="booking_rating">
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <span>(832)</span>
                  </div>
                  <div className="show_download">
                    <i className="fa fa-download"></i>
                    <span>1,789,957</span>
                  </div>
                </div>
                <div className="panda_booking">
                  <img width="45" src="/images/calendar-icon.png" />
                  <p className="panda_booking_descrip">Grow your bussiness with easy online scheduling</p>
                  <h4>Panda Booking</h4>
                  <div className="pnada_booking_pricing">
                    <a href="!#">Free/Premium</a>
                  </div>
                  <button className="btn theme_btn"><i className="fa fa-plus"></i> Add to Site</button>
                  <hr />
                  <div className="booking_rating">
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <span>(832)</span>
                  </div>
                  <div className="show_download">
                    <i className="fa fa-download"></i>
                    <span>1,789,957</span>
                  </div>
                </div>
                <div className="panda_booking">
                  <img width="45" src="/images/calendar-icon.png" />
                  <p className="panda_booking_descrip">Grow your bussiness with easy online scheduling</p>
                  <h4>Panda Booking</h4>
                  <div className="pnada_booking_pricing">
                    <a href="!#">Free/Premium</a>
                  </div>
                  <button className="btn theme_btn"><i className="fa fa-plus"></i> Add to Site</button>
                  <hr />
                  <div className="booking_rating">
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <i className="fa fa-star"></i>
                    <span>(832)</span>
                  </div>
                  <div className="show_download">
                    <i className="fa fa-download"></i>
                    <span>1,789,957</span>
                  </div>
                </div>
            </div>
          </TabPanel>
          {this.state.openAudioModal ?  <ModalTracks audiomodalState={true} audiomodalFalseState={this.closeAudioModalFunc} /> : ""}
          {this.state.openVideoModal ?  <ModalVideos modalState={true} videomodalFalseState={this.closeVideoModalFunc} /> : ""} 
          {this.state.openImgModal ?  <ModalImage imgmodalState={true} imgmodalFalseState={this.closeImageModalFunc} /> : ""} 
          <TabPanel className="My_Upload">
            <div className="tab-panel-head">My Uploads
                <span className="modal_btn pull-right">
                
                <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
              </span>
            </div>
            
            <div className="tab-panel-body col-md-12">
              <ModalImage  />
              <ModalVector />
              <ModalVideos />
              <ModalDocs />
              <ModalTracks />
            </div>
          </TabPanel>
          <TabPanel className="left_panel_wrap booking_panel_wrap">
            <Tabs>
              <TabList>
                <Tab> Bookings Manager </Tab>
                <Tab> Add Booking Elements </Tab>
                <Tab> Learn More </Tab>
                <div className="upgrade_accept"><a href="" > <UpgradePopup/> </a>  </div>
              </TabList>

              <TabPanel>
                <div className="tab-panel-head">
                  Bookings Manager
                  <span className="modal_btn pull-right"><button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button></span>
                </div>
                <div className="tab-panel-body">
                  <div className="booking_manager_inner">
                    <img src="/images/manageBookings_01.png"/>
                    <p className="mt_20">Get booked. Get paid.It's that easy!</p>
                    <button className="btn theme_btn">Manager Services</button>
                  </div>
                </div>  
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">
                  Add Booking Elements
                  <span className="modal_btn pull-right"><button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button></span>
                </div>
                <div className="tab-panel-body">
                  <h5 className="inner-heading">
                    Service Widget
                    <button className="btn info_btn pull-right"><i className="fa fa-info"></i></button>
                  </h5>
                  <div className="service_widget_box">
                    <div className="img_wrap">
                      <img src="/images/service_widget.jpg"/>
                    </div>
                    <div className="service_widget_text">
                      <h6>Service Name</h6>
                      <p>1 hr | $62.00</p>
                      <button className="btn">Book It</button>
                    </div>
                  </div>
                </div>  
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">
                  Learn More
                  <span className="modal_btn pull-right">
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body">
                  <a href="#" className="booking_leanMore">
                    <img src="/images/booking_learn01.jpg"/>
                    <div className="booking_leanMore_title">
                      Control Pnada Bookings Support Froum <i className="fa fa-chevron-right"></i>
                    </div>
                  </a>
                  <a href="#" className="booking_leanMore">
                    <img src="/images/booking_learn02.jpg"/>
                    <div className="booking_leanMore_title">
                      More Tips from the Blog <i className="fa fa-chevron-right"></i>
                    </div>
                  </a>
                </div>
              </TabPanel>

            </Tabs>


          </TabPanel>
          <TabPanel className="left_panel_wrap blog_panel_wrap">
                <div className="tab-panel-head">Blog Manager
                  <span className="modal_btn pull-right">
                    
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body col-md-12 text-center">
                <img src={require('./../../images/coming-soon.png')}/>
                  {/*<div className="blog_manager_body">
                    {(this.props.common.projectDetail.has_blog == 0) ?
                    <div className="start-bloging">
                      <div className=""><h3>What do you want to do?</h3></div>
                      <div className=""><button onClick={() => { this.startBloging() }} className="btn startbloging">Get Started With Blog</button></div>
                    </div>
                    :
                    <div className="manage-bloging">
                      
                    </div>
                    }
                  </div>*/}
                </div>
          </TabPanel>
          
          <TabPanel className="left_panel_wrap tool_panel_wrap">

            <div className="tab-panel-head">
              Tools
              <span className="modal_btn pull-right">
                
                <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
              </span>
            </div>
            <div className="tool_pane_inner">
              <div className="row">
                <div className="col-md-12">
                  <ul>
                    <li>
                      <input id="ruler" type="checkbox" checked={this.state.showScales ? "checked" : ""} onChange={() => { this.showHideScales() }} className="" />
                      <label htmlFor="ruler">Scales</label>
                    </li>
                    <li>
                      <input id="gridline" type="checkbox" checked={this.state.showGridLines ? "checked" : ""} onChange={() => { this.showHideGridLines() }} />
                      <label htmlFor="gridline">Elements</label>
                    </li>
                    <li style={{display: window.devicetype ==='mobile'?'none':''}}>
                      <input id="snap_object" type="checkbox" checked={this.state.showMainContainer ? "checked" : ""} onChange={() => { this.showHideMainContainer() }} className="" />
                      <label htmlFor="snap_object">Main Container</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </TabPanel>
          <TabPanel className="left_panel_wrap menu_panel_wrap">
            <Tabs>
              <TabList>
                <Tab className="site-menu">Site</Tab>
                <Tab className="page-transations">Help</Tab>
              </TabList>
              <TabPanel>
                <div className="tab-panel-head"> Site
                  <span className="modal_btn pull-right">
                    
                    <button className="btn clos-btn" onClick={() => { this.hideTabsMain() }}>X</button>
                  </span>
                </div>
                <div className="tab-panel-body siteDropdown_wrap">
                  <div className="dropdown_menu site_dropdown">
                    <ul className="generic_drop">
                      <li onClick={this.onOpenGetFeedbackModal} >Edit Suggestions</li>
                      <li onClick={() => { this.viewPublishSite()}} >View Live Website</li>
                      <li onClick={() => {this.onOpenSiteHistoryModal()}} >Site Change Log</li>
                      <li onClick={this.onExitEditor}>Exit Page Builder</li>
                    </ul>
                  </div>
                </div>
              </TabPanel>
              <TabPanel>
                <div className="tab-panel-head">Help
                    <span className="modal_btn pull-right">
                    <button onClick={() => { this.hideTabsMain() }} className="btn clos-btn">X</button>
                  </span>
                </div>
                <div className="tab-panel-body siteDropdown_wrap">
                  <div className="dropdown_menu help_drop">
                    <ul className="generic_drop">
                      <li onClick={() => { this.openHelpCenter() }}>Help Centre</li>
                      <li onClick={() => { this.openSEOSettings() }}>SEO Settings</li>
                      <li onClick={() => { this.openNewTab('terms') }}>Terms of Use</li>
                      <li onClick={() => { this.openNewTab('privacy') }}>Privacy Policy</li>
                    </ul>
                  </div>
                </div>
              </TabPanel>
            </Tabs>
          </TabPanel>
        </Tabs>
        {this.state.openGetFeedbackModal ? <ModalFeedback pd={this.props.common.projectDetail} openModal={true}/> : ""} 
        {this.state.openSiteHistoryModal ? <ModalSiteHistory openModal={true}/> : ""} 
        {this.state.openDomainModal ? <ModalConnectDomain dat={this.state.domains} openModal={true}/> : ""} 
      </div>
    );
  }
}

const Inspector = props => {
  return (
    <div className="inspictor">
      <InspectorTab />

    </div>
  );
};

export default connect(mapStateToProps, mapDispatchToProps)(InspectorTab);


