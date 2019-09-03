import React from 'react'
import ReactDOM from 'react-dom'
import Modal from 'react-modal'
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs'
import Dropdown from 'react-dropdown'
import 'react-dropdown/style.css'
import Dropzone from 'react-dropzone'


$("body").on('click', '.deleteableUploadedTrack', function()
{
  setTimeout(function()
  {
    if($('.deleteableUploadedTrack.imageSelector').length> 0)
    {
      $('.Delete_btn_track').prop('disabled', false);
    }
    else
    {
      $('.Delete_btn_track').prop('disabled', true);
    }
  },100)
});
$('body').on('click', '.Delete_btn_track', function()
{
  
  var trackIdsToDelete = [];
  $('.deleteableUploadedTrack.imageSelector').each(function()
  {
    trackIdsToDelete.push($(this).attr('data-id'));
  });
  new Noty(
    {
      timeout: 2500,
        text: 'Deleting the Audio(s).',
        theme:'metroui',
        type:'info'
    }).show();
  setTimeout(function(){
    $.ajax({
      url: window.baseURL+'/api/images/deleteUserTrack',
      type: 'POST',
      data: {'trackIds' : trackIdsToDelete},
      cache: false,
      dataType: 'json',
      success: function(response){
        new Noty(
          {
            timeout: 2500,
              text: 'Deleted the Audio(s).',
              theme:'metroui',
              type:'success'
          }).show();
        $('.deleteableUploadedTrack.imageSelector').remove();
      }
    });
},1000);
});

const customStyles = {
  content: {
    top: '62.2%',
    left: '50%',
    right: 'auto',
    bottom: 'auto',
    marginRight: '-50%',
    transform: 'translate(-50%, -50%)'
  }
}


var files;
var myAudios;
$(document).on('change','.audio-dropzone input[type=file]', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
  var data = new FormData();

  new Noty(
    {
      timeout: 2500,
        text: 'Uploading the Audio(s).',
        theme:'metroui',
        type:'info'
    }).show();
  $.each(files, function(key, value)
    {
        data.append(key, value);
    });
    $.ajax({
      url: window.baseURL+'/api/images/upload-audios',
      type: 'POST',
      data: data,
      cache: false,
      dataType: 'json',
      processData: false,
      contentType: false,
      success: function(data)
      {
        new Noty(
          {
            timeout: 2500,
              text: 'Uploaded the Audio(s).',
              theme:'metroui',
              type:'success'
          }).show();
        var html ='';
        $.each(data.all_audios,function(key,value){
          var file_name = value.file_name;
          var array_ext = file_name.split(".");
          var icon = array_ext[1]+'.png';
          html = html+ '<div class="audio-holder deleteableUploadedTrack" data-id="'+value.id+'" data-name="'+value.display_name+'" data-audio="'+data.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt=""src="/images/files_icon/'+icon+'" /> <span>'+value.display_name+'</span></div>';
        });
        $("#my_audios_container").html(html);
      }
  });
}

const addTracksToPage = (user, err) => {
  if(window.fromConfig)
  {
    var selectedComponent = $('iframe').contents().find('html').find('.selectedElementEditor');
    if(!selectedComponent.hasClass('componentElement'))
    {
      selectedComponent = selectedComponent.parents('.componentElement');
    }
    
    if(selectedComponent.attr('triggermusic'))
    {
      var thisComp = $('.imageSelector').first();
      var thisUrl = thisComp.attr("data-audio");
      console.log(thisUrl);
      selectedComponent.find('source').each(function()
      {
        $(this).attr('src', thisUrl);
      })
      var audioHTML = selectedComponent.find('audio.iru-tiny-player');
      selectedComponent.find('.iru-tiny-player').remove();
      selectedComponent.append(audioHTML);
      $('#playground-editor iframe')[0].contentWindow.pandaMusicPlayerTrigger();
    }
    else if(selectedComponent.attr('triggermusictheme'))
    {
      var htmlRendered = '<div class="cpandaaudioplayer"><ul class="playlist"> ';
      $('.imageSelector').each(function()
      {
        var thisUrl = $(this).attr("data-audio");
        htmlRendered = htmlRendered+'<li data-cover="http://digital.akauk.com/utils/musicPlayer/data/acousticbreeze.jpg" data-artist="Sam Doe"> <a href="'+thisUrl+'">MP3</a> </li>';
      });
      htmlRendered = htmlRendered+'<ul></div>';
      console.log(htmlRendered);
      selectedComponent.find('.cpandaaudioplayer').remove();
      selectedComponent.append(htmlRendered);
      $('#playground-editor iframe')[0].contentWindow.pandaMusicTriggerTheme();
      var musicElement = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor').parents('.componentElement');
      if(musicElement.find('.elementWrapper').length)
      {
        musicElement.find('.elementWrapper').remove();
      }
      setTimeout(function()
      {
          musicElement.append('<div class="elementWrapper" style="width:'+musicElement.width()+'px;height:'+musicElement.height()+'px;z-index:9999999999999999999;position: absolute;top: 0;"></div>');
      },1000);
    }
    console.log('nothing');
    window.fromConfig = false;
  }
  else
  {
    var scrollTop = $(window).scrollTop();
    var scrollLeft = $(window).scrollLeft();
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    var calculatedTop = Math.max(0, ((windowHeight - 500) / 2) + scrollTop);
    var calculatedLeft = Math.max(0, ((windowWidth - 500) / 2) + scrollLeft);
    var sizeAdditive = 0;
    
    $('.imageSelector').each(function(index, element)
    {
      var thisUrl = $(this).attr("data-audio");
      console.log(thisUrl);
      
      var addedComponent = $('<div deletable="1" musicelem="1"><audio controls><source src="'+thisUrl+'" type="audio/ogg"><source src="'+thisUrl+'" type="audio/mpeg">Your browser does not support the audio element.</audio></div>');
      
      $.undone("register",function (){
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
        sizeAdditive += 40;
        window.zIndex++;
        addedComponent.attr("data-item", window.zIndex);
        window.zIndex++;
        addedComponent.find('*').each(function()
        {
            $(this).attr("data-item", window.zIndex);
            window.zIndex++;
        });
      },function (){
        setTimeout(function(){addedComponent.remove();},1500);
      });
    });
    window.newElement =false;
  }
}

class ModalTracks extends React.Component {
    constructor() {
      super();
      this.state = {
        modalIsOpen: false
      };
      this.openModal = this.openModal.bind(this);
      this.afterOpenModal = this.afterOpenModal.bind(this);
      this.closeModal = this.closeModal.bind(this);
    }

    componentDidMount() {
      $.ajax({
        url: window.baseURL+'/api/images/users-audios',
        type: 'get',
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data){
          myAudios = data;
        }
    });
    
    this.setState({
      modalIsOpen : this.props.audiomodalState
    })
  }
    openModal() {
      this.setState({ modalIsOpen: true });
    }
    afterOpenModal() {
      this.subtitle.style.color = '#f00';
      setTimeout(function(){
        var html ='';
        $.each(myAudios.all_audios,function(key,value){
          var file_name = value.file_name;
          var array_ext = file_name.split(".");
          var icon = array_ext[1]+'.png';
          html = html+ '<div class="audio-holder deleteableUploadedTrack" data-id="'+value.id+'" data-name="'+value.display_name+'"  data-audio="'+myAudios.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="/images/files_icon/'+icon+'" /> <span>'+value.display_name+'</span></div>';
        });
        $("#my_audios_container").html(html);
      },500);
    }
    closeModal() {
      this.setState({ modalIsOpen: false });
      {this.props.audiomodalState ? this.props.audiomodalFalseState() : ""}
      /*window.fromConfig = false;*/
    }
    loadMyAudios(){
      setTimeout(function(){
        var html ='';
        $.each(myAudios.all_audios,function(key,value){
          var file_name = value.file_name;
          var array_ext = file_name.split(".");
          var icon = array_ext[1]+'.png';
          html = html+ '<div class="audio-holder deleteableUploadedTrack" data-id="'+value.id+'" data-name="'+value.display_name+'"  data-audio="'+myAudios.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="/images/files_icon/'+icon+'" /> <span>'+value.display_name+'</span></div>';
        });
        $("#my_audios_container").html(html);
      },500);
    }
  
    render() {
      return (
        <div onClick={this.openModal}>
          <h4 className="upload-h4s"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 480.058 480.058" xmlSpace="preserve"><g><g><path d="M458.509,140.744v-0.016C403.651,20.065,261.362-33.28,140.699,21.579c-52.812,24.01-95.139,66.338-119.15,119.15c-14.238,31.172-21.578,65.05-21.52,99.32v75.152c-0.038,14.859,5.87,29.116,16.408,39.592l32.336,32.344l4.392,12.112c13.553,35.926,48.233,59.448,86.624,58.752c1.68,0,3.384-0.208,5.08-0.288l0.4,1.104c6.048,16.714,24.501,25.361,41.215,19.313c0,0,0.001,0,0.001,0l1.312-0.472c16.709-6.024,25.37-24.453,19.346-41.161c-0.001-0.002-0.002-0.005-0.002-0.007l-63.368-175.2c-6.094-16.681-24.516-25.31-41.232-19.312l-1.296,0.472c-14.203,5.077-22.933,19.383-20.952,34.336c-13.759,10.017-24.596,23.525-31.392,39.128c-0.548-1.074-0.846-2.258-0.872-3.464v-72.4c0-106.039,85.961-192,192-192s192,85.961,192,192v72.4c-0.048,0.568-0.161,1.129-0.336,1.672c-6.853-14.858-17.392-27.716-30.616-37.352c1.975-14.943-6.745-29.238-20.936-34.32l-1.328-0.48c-16.703-5.99-35.107,2.64-41.184,19.312l-63.376,175.2c-6.03,16.705,2.623,35.136,19.328,41.168l1.312,0.48c16.716,6.029,35.157-2.615,41.216-19.32l0.4-1.104c1.688,0.08,3.4,0.288,5.08,0.288c38.389,0.697,73.069-22.821,86.624-58.744l5.128-14.176l30.28-30.288c10.536-10.474,16.444-24.728,16.408-39.584v-75.152C480.085,205.784,472.745,171.912,458.509,140.744z M97.525,265.825c1.81-3.896,5.111-6.9,9.16-8.336l1.296-0.472c8.41-3.044,17.696,1.303,20.744,9.712l63.368,175.2c3.026,8.382-1.316,17.63-9.698,20.656c-0.007,0.003-0.014,0.005-0.022,0.008l-1.312,0.472c-8.407,3.029-17.681-1.314-20.736-9.712l-2.4-6.696L96.965,278.12C95.505,274.111,95.706,269.685,97.525,265.825z M85.317,293.057v-0.032L139.229,442c-28.981,0.335-55.588-15.974-68.44-41.952c0.2,0,0.408,0,0.608,0c0.2,0,0.424,0,0.632,0c0.8,0,1.52-0.152,2.28-0.224c0.76-0.072,1.312-0.072,1.968-0.184c1.048-0.2,2.082-0.467,3.096-0.8c0.576-0.176,1.152-0.288,1.712-0.504c1.073-0.443,2.113-0.962,3.112-1.552c0.472-0.264,0.968-0.456,1.424-0.752c11.558-7.456,14.884-22.869,7.429-34.427c-0.969-1.502-2.097-2.896-3.365-4.157L61.021,328.76C65.632,314.827,74.048,302.46,85.317,293.057z M32.029,240.049v72.4c-0.018,6.369,2.514,12.479,7.032,16.968l39.312,39.32c3.504,3.504,3.504,9.184,0,12.688c-3.504,3.504-9.184,3.504-12.688,0l-37.936-37.952c-7.527-7.48-11.747-17.661-11.72-28.272v-75.152c-0.052-30.254,6.078-60.2,18.016-88h17.488C38.694,179.609,32.037,209.644,32.029,240.049z M240.029,32.049c-74.312,0.016-142.976,39.656-180.152,104H41.629C99.06,26.475,234.444-15.795,344.017,41.636c40.336,21.142,73.271,54.076,94.412,94.412h-18.248C383.005,71.704,314.341,32.065,240.029,32.049z M332.165,422.672l-8.68,24l-2.4,6.696c-3.044,8.413-12.332,12.766-20.745,9.723c-0.002-0.001-0.005-0.002-0.007-0.003l-1.312-0.48c-8.392-3.021-12.747-12.272-9.728-20.664l63.376-175.2c3.035-8.402,12.307-12.754,20.709-9.719c0.006,0.002,0.013,0.005,0.019,0.007l1.328,0.48c8.386,3.014,12.742,12.256,9.728,20.642c-0.003,0.007-0.005,0.014-0.008,0.022L332.165,422.672z M342.189,442l35.352-97.752l18.52-51.2c11.002,9.182,19.298,21.184,24,34.72l-29.648,29.656c-9.734,9.758-9.734,25.554,0,35.312c1.284,1.271,2.703,2.398,4.232,3.36c0.504,0.32,1.032,0.536,1.552,0.8c1.03,0.577,2.099,1.079,3.2,1.504c0.624,0.232,1.256,0.384,1.896,0.56c1.029,0.304,2.076,0.542,3.136,0.712c0.68,0.096,1.352,0.144,2.032,0.192c0.552,0,1.088,0.16,1.6,0.16c0.512,0,0.968-0.112,1.456-0.144c0.488-0.032,0.8,0.048,1.16,0C397.869,425.942,371.226,442.327,342.189,442z M464.029,315.201c0.026,10.613-4.194,20.796-11.72,28.28l-31.528,31.536l-6.4,6.4c-3.504,3.504-9.184,3.504-12.688,0c-3.504-3.504-3.504-9.184,0-12.688l39.312-39.32c4.51-4.49,7.039-10.596,7.024-16.96v-72.4c-0.008-30.405-6.664-60.44-19.504-88h17.488c11.938,27.8,18.068,57.746,18.016,88V315.201z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> <span>Audio<br/>Library</span></h4>
         
          <Modal
            isOpen={this.state.modalIsOpen}
            onAfterOpen={this.afterOpenModal}
            onRequestClose={this.closeModal}
            style={customStyles}
            contentLabel="Tracks Modal"
            overlayClassName="generic_modal"
          >
  
            <h2 ref={subtitle => this.subtitle = subtitle}>Audio Library
              <span className="modal_btn pull-right">
                <button className="btn clos-btn" onClick={this.closeModal}>X</button>
              </span>
            </h2>
  
            <div className="modal_inner">
              <div className="Upload_image">
                   <Dropzone accept=".mp3" className="dz-buttonshape audio-dropzone">
                            Upload Audio <i className="fa fa-upload"></i>
                   </Dropzone>
                    <div className="modal_search">
                        <i className="fa fa-search"></i> <input className="" type="text" placeholder="Search here ..." />
                    </div>
                    <button className="btn Delete_btn_track" disabled={true}><i className="fa fa-trash"></i></button>
                    <button className="addToPageBtn"  onClick={(event) => { this.closeModal(); addTracksToPage();}}>Add to Site <i className="fa fa-plus-circle"></i></button>
              </div>
              <div className="dropzone-loader">
                <div id="my_audios_container"></div>
              </div>
            </div>
          </Modal>
        </div>
      );
    }
  } export default ModalTracks;