import React from 'react'
import ReactDOM from 'react-dom'
import Modal from 'react-modal'
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs'
import Dropdown from 'react-dropdown'
import 'react-dropdown/style.css'
import Dropzone from 'react-dropzone'


$("body").on('click', '.deleteableUploadedDoc', function()
{
  setTimeout(function()
  {
    console.log("$('.deleteableUploadedDoc.imageSelector').length");
    console.log($('.deleteableUploadedDoc.imageSelector').length);
    if($('.deleteableUploadedDoc.imageSelector').length> 0)
    {
      $('.Delete_btn_doc').prop('disabled', false);
    }
    else
    {
      $('.Delete_btn_doc').prop('disabled', true);
    }
  },100)
});
$('body').on('click', '.Delete_btn_doc', function()
{
  var docIdsToDelete = [];
  $('.deleteableUploadedDoc.imageSelector').each(function()
  {
    docIdsToDelete.push($(this).attr('data-id'));
  });
  new Noty(
  {
      text: 'Deleting the Document(s).',
      theme:'metroui',
      type:'info'
  }).show();
  setTimeout(function(){
    $.ajax({
      url: window.baseURL+'/api/images/deleteUserDocs',
      type: 'POST',
      data: {'docIds' : docIdsToDelete},
      cache: false,
      dataType: 'json',
      success: function(response){
        $('.deleteableUploadedDoc.imageSelector').remove();
        new Noty(
          {
              text: 'Deleted the Document(s).',
              theme:'metroui',
              type:'success'
          }).show();
      }
    });
  },1000);
});



const gridLayout = [
  { value: '3x3', label: <i className="fa fa-th"></i> },
  { value: '2x2', label: <i className="fa fa-th-large"></i> },
  { value: '1x1', label: <i className="fa fa-list"></i> },
]
const defaultgridLayout = gridLayout[0]
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
var myDocs;
$(document).on('change','.doc-dropzone input[type=file]', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
  var data = new FormData();
  new Noty(
    {
        text: 'Uploading the Document(s).',
        theme:'metroui',
        type:'info'
    }).show();
  $.each(files, function(key, value)
    {
        data.append(key, value);
    });
    $.ajax({
      url: window.baseURL+'/api/images/upload-docs',
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
              text: 'Uploaded the Document(s).',
              theme:'metroui',
              type:'success'
          }).show();
        var html ='';
        $.each(data.all_docs,function(key,value){
          var file_name = value.file_name;
          var array_ext = file_name.split(".");
          var icon = array_ext[1]+'.png';
          html = html+ '<div class="doc-holder deleteableUploadedDoc" data-id="'+value.id+'" data-doc="'+data.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt=""src="/images/files_icon/'+icon+'" /> <span>'+value.display_name+'</span></div>';
        });
        $("#my_docs_container").html(html);
      }
  });
}

const addDocsToPage = (user, err) => {
  var scrollTop = $(window).scrollTop();
  var scrollLeft = $(window).scrollLeft();
  var windowWidth = $(window).width();
  var windowHeight = $(window).height();
  var calculatedTop = Math.max(0, ((windowHeight - 500) / 2) + scrollTop);
  var calculatedLeft = Math.max(0, ((windowWidth - 500) / 2) + scrollLeft);
  var sizeAdditive = 0;
  
  $('.imageSelector').each(function(index, element)
  {
    var thisUrl = $(this).attr("data-doc");
    var splittedUlr = thisUrl.split("/");
    var fileType = splittedUlr[splittedUlr.length-1];
    var fileTypeName = fileType.split('.')[1];
    
    var addedComponent = $('<a href="'+thisUrl+'" target="_blank"><img src="/images/files_icon/'+fileTypeName+'.png"/></a>');

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

class ModalDocs extends React.Component {
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
          url: window.baseURL+'/api/images/users-docs',
          type: 'get',
          cache: false,
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function(data)
          {
            myDocs = data;
          }
      });
     
    }
    openModal() {
      this.setState({ modalIsOpen: true });
    }
    afterOpenModal() {
      this.subtitle.style.color = '#f00';
      setTimeout(function(){
        var html ='';
        $.each(myDocs.all_docs,function(key,value){
          var file_name = value.file_name;
          var array_ext = file_name.split(".");
          var icon = array_ext[1]+'.png';
          html = html+ '<div class="doc-holder deleteableUploadedDoc" data-id="'+value.id+'" data-doc="'+myDocs.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="/images/files_icon/'+icon+'" /> <span>'+value.display_name+'</span></div>';
        });
        $("#my_docs_container").html(html);
      },500);
    }
    closeModal() {
      this.setState({ modalIsOpen: false });
    }
    loadMyDocs(){
      setTimeout(function(){
        var html ='';
        $.each(myDocs.all_docs,function(key,value){
          var file_name = value.file_name;
          var array_ext = file_name.split(".");
          var icon = array_ext[1]+'.png';
          html = html+ '<div class="doc-holder deleteableUploadedDoc" data-id="'+value.id+'" data-doc="'+myDocs.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="/images/files_icon/'+icon+'" /> <span>'+value.display_name+'</span></div>';
        });
        $("#my_docs_container").html(html);
      },500);
    }

  
    render() {
      return (
        <div onClick={this.openModal}>
          <h4 className="upload-h4s"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="484.178px" height="484.179px" viewBox="0 0 484.178 484.179" xmlSpace="preserve"><g><g><path d="M408.792,0H141.352c-19.038,0-34.531,15.498-34.531,34.531v22.053H75.386c-19.038,0-34.53,15.498-34.53,34.531v358.533c0,19.033,15.492,34.531,34.53,34.531h267.449c19.039,0,34.531-15.498,34.531-34.531v-22.053h31.426c19.041,0,34.531-15.498,34.531-34.53V34.531C443.323,15.498,427.833,0,408.792,0z M349.743,449.648c0,3.804-3.105,6.907-6.908,6.907H75.386c-3.802,0-6.907-3.104-6.907-6.907V91.115c0-3.807,3.105-6.907,6.907-6.907h31.435v308.856c0,19.032,15.493,34.53,34.531,34.53h208.391V449.648L349.743,449.648z M415.7,393.065c0,3.803-3.098,6.907-6.908,6.907H141.352c-3.811,0-6.906-3.104-6.906-6.907V34.531c0-3.806,3.096-6.907,6.906-6.907h267.439c3.811,0,6.908,3.102,6.908,6.907V393.065z"/><path d="M376.36,85.786H173.785c-7.628,0-13.813,6.19-13.813,13.811c0,7.636,6.186,13.813,13.813,13.813h202.573c7.629,0,13.812-6.178,13.812-13.813C390.172,91.977,383.987,85.786,376.36,85.786z"/><path d="M376.36,151.529H173.785c-7.628,0-13.813,6.188-13.813,13.811c0,7.634,6.186,13.813,13.813,13.813h202.573c7.629,0,13.812-6.18,13.812-13.813C390.172,157.718,383.987,151.529,376.36,151.529z"/><path d="M376.36,217.27H173.785c-7.628,0-13.813,6.191-13.813,13.814c0,7.633,6.186,13.811,13.813,13.811h202.573c7.629,0,13.812-6.178,13.812-13.811C390.172,223.461,383.987,217.27,376.36,217.27z"/><path d="M376.36,283.014H173.785c-7.628,0-13.813,6.191-13.813,13.811c0,7.638,6.186,13.813,13.813,13.813h202.573c7.629,0,13.812-6.177,13.812-13.813C390.172,289.205,383.987,283.014,376.36,283.014z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>  <span>Documents<br/>Library</span></h4>
          <Modal
            isOpen={this.state.modalIsOpen}
            onAfterOpen={this.afterOpenModal}
            onRequestClose={this.closeModal}
            style={customStyles}
            contentLabel="Docs Modal"
            overlayClassName="generic_modal"
          >
  
            <h2 ref={subtitle => this.subtitle = subtitle}>Documents Library
            <span className="modal_btn pull-right">
                <button className="btn clos-btn" onClick={this.closeModal}>X</button>
              </span>
            </h2>
  
            <div className="modal_inner">
            <div className="Upload_image">
                   <Dropzone accept=".doc,.pdf,.docx,.ppt,.pptx,.ppsx,.xls,.xlsx,.odp,.odt,.epub" className="doc-dropzone dz-buttonshape">
                            Upload Docs <i className="fa fa-upload"></i>
                   </Dropzone>
                    <div className="modal_search">
                            <i className="fa fa-search"></i> <input className="" type="text" placeholder="Search here ..." />
                    </div>
                    <button className="btn Delete_btn_doc" disabled={true}><i className="fa fa-trash"></i></button>
                    <button className="addToPageBtn"  onClick={(event) => { this.closeModal(); addDocsToPage();}}>Add to Site <i className="fa fa-plus-circle"></i></button>
              </div>
              <div className="dropzone-loader">
                <div id="my_docs_container"></div>
              </div>
            </div>
          </Modal>
        </div>
      );
    }
  } export default ModalDocs;