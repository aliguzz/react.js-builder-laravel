import React from 'react';
import Modal from 'react-modal';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import Dropdown from 'react-dropdown';
import axios from 'axios';
import 'react-dropdown/style.css';
import InfiniteScroll from 'react-infinite-scroll-component';
import { OldSocialLogin as SocialLogin } from 'react-social-login';
import Dropzone from 'react-dropzone';
import FacebookLogin from 'react-facebook-login';


$("body").on('click', '.deleteableUploadedImage', function()
{
  setTimeout(function()
  {
    if($('.deleteableUploadedImage.imageSelector').length> 0)
    {
      $('.Delete_btn').prop('disabled', false);
    }
    else
    {
      $('.Delete_btn').prop('disabled', true);
    }
  },100)
});
$('body').on('click', '.Delete_btn', function()
{
  var imageIdsToDelete = [];
  $('.deleteableUploadedImage.imageSelector').each(function()
  {
    imageIdsToDelete.push($(this).attr('data-id'));
  });
    new Noty(
    {
        timeout: 2500,
        text: 'Deleting the Image(s).',
        theme:'metroui',
        type:'info'
    }).show();
    setTimeout(function(){
      $.ajax({
        url: window.baseURL+'/api/images/deleteUserImages',
        type: 'POST',
        data: {'imageIds' : imageIdsToDelete},
        cache: false,
        dataType: 'json',
        success: function(response){
          new Noty(
            {
              timeout: 2500,
                text: 'Deleted the Image(s).',
                theme:'metroui',
                type:'success'
            }).show();
          $('.deleteableUploadedImage.imageSelector').remove();
        }
      });
  },1000);
});



Object.size = function(obj) {
  var size = 0, key;
  for (key in obj) {
      if (obj.hasOwnProperty(key)) size++;
  }
  return size;
};

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

const addImagesToPage = (user, err) => {
  if(window.fromConfig)
  {
    var selectedComponent = $('#playground-editor iframe').contents().find('html').find('#componentElementImg');
    var previousUrl = selectedComponent.attr("src");
    var thisComp = $('.imageSelector').first();
    var splittedUlr = thisComp.find("img").attr("src").split("thumbnails/");
    var thisUrl = splittedUlr[0]+splittedUlr[1];
    $.undone("register",function (){
      selectedComponent.attr('src', thisUrl);
    },function (){
      selectedComponent.attr('src', previousUrl);
    });
    window.fromConfig = false;
  }
  else if(window.fromBG)
  {
    var splittedUlr = $('.imageSelector').first().find("img").attr("src").split("thumbnails/");
    var thisUrl = splittedUlr[0]+splittedUlr[1];
    $.undone("register",function (){
      $('#playground-editor iframe').contents().find('body').css("background-color", 'none');
      $('#playground-editor iframe').contents().find('body').css({'background-image':'url(' + thisUrl + ')'});
    },function (){
      $('#playground-editor iframe').contents().find('body').css({'background-image':'none'});
    });
    window.fromConfig = false;
  }
  else if(window.fromElementBGConfig)
  {
    var splittedUlr = $('.imageSelector').first().find("img").attr("src").split("thumbnails/");
    var thisUrl = splittedUlr[0]+splittedUlr[1];
    $.undone("register",function (){
      $('#playground-editor iframe').contents().find('.selectedElementEditor').css({'background-image':'url(' + thisUrl + ')'});

      $('.changeElementBgImage').replaceWith("<div class='elementStylerValue changeElementBgImage' ><img id='changeElementBgImage' style='cursor: pointer;' src='"+thisUrl+"'/><span id='removeElementBgImage' style='color:blue; cursor:pointer;'>remove</span></div>");

    },function (){
      $('#playground-editor iframe').contents().find('.selectedElementEditor').css({'background-image':'none'});
      $('.changeElementBgImage').replaceWith("<span id='changeElementBgImage' class='elementStylerValue changeElementBgImage' style='cursor: pointer;'>Select Image</span>");
    });
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
      var splittedUlr = $(this).find("img").attr("src").split("thumbnails/");
      var thisUrl = splittedUlr[0]+splittedUlr[1];
      var addedComponent = $('<div style="width:600px"><img style="width:100%" src="'+thisUrl+'"/></div>'); 

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

const handleSocialLogin = (user, err) => {
  if(user){
    console.log(user);
    var fb_tok = user.accessToken;
    var fb_id = user.id;
    localStorage.setItem("fb_token", fb_tok);
    
      $.ajax({
        url: window.baseURL+'/api/fb_token',
        type: 'POST',
        data: {'my_fb_tok' : fb_tok, 'my_fb_id' : fb_id },
        cache: false,
        dataType: 'json',
        success: function(response){
          console.log(response);
        }
      });
      var fb_folder_array = [];
      axios({
        method:'get',
        url:'https://graph.facebook.com/v3.1/'+user.id+'/albums',
        responseType:'stream',
        scope: 'user_photos',
        headers: { Authorization : 'Bearer ' +user.accessToken }
      })
        .then(function(response) {
          localStorage.setItem("fb_access_token", user.accessToken);
          var foldres_length = response.data.data.length;
          if(foldres_length > 0){
            fb_folder_array = response.data.data;
            modalImagesComponent.setState({
              fb_folder : fb_folder_array,
              has_fb_img : true,
              hasSocialImage : true
            })
          }
      }); 
  }else{
    alert("Request Failed");
  }
}

var files;
var myImages;
$(document).on('change','.image-dropzone input[type=file]', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event){
  files = event.target.files;
  var data = new FormData();
  new Noty(
    {
      timeout: 2500,
        text: 'Uploading the Image(s).',
        theme:'metroui',
        type:'info'
    }).show();
  $.each(files, function(key, value)
    {
        data.append(key, value);
    });
    $.ajax({
      url: window.baseURL+'/api/images/upload-images',
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
              text: 'Uploaded the Image(s).',
              theme:'metroui',
              type:'success'
          }).show();
        var html ='';
        $.each(data.all_images,function(key,value){
          html = html+ '<div class="image-holder testClass"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+data.destinationPath_thumb+'/'+value.file_name+'" /> </div>';
        });
        $("#my_images_container").html(html);
      }
  });
}

var modalImagesComponent;
class ModalImage extends React.Component {
    constructor() {
      super();
      modalImagesComponent = this;
      this.state = {
        modalIsOpen: false,
        freeImages: [],
        freeCatImages: [],
        freeImagesCat: [],
        freeImagesParts: [],
        freeCatImagesParts: [],
        startCatImg:[],
        endCatImg:[],
        hasMoreCatImg:[],
        insta_img: [],
        google_photo: [],
        google_photo_folder: [],
        google_photo_folder_images: [],
        show_google_photo_folder_images: false,
        google_drive: [],
        google_drive_folder: [],
        google_drive_folder_images: [],
        show_google_drive_folder_images: false,
        fb_img: [],
        fb_folder: [],
        fb_folder_images: [],
        show_fb_folder_images: false,
        dropbox_folder: [],
        dropbox_folder_images: [],
        show_dropbox_folder_images: false,
        dropbox_img: [],
        start: 0,
        end: 19,
        shutterPage: [],
        shutterPerPage: 20,
        shutterCats: [],
        shutterImagesParts: [],
        shutterCatLoaded: false,
        freeImagesLoaded: false,
        error: null,
        hasMore:true,
        hasMoreShutter: true,
        hasSocialImage: false,
        tabIndex: 0,
        has_fb_img: false,
        has_drive_img: false,
        has_photo_img: false,
        has_dropbox_img: false,
        has_insta_img: false,
        temp_dropbox_folder : [],

      };
      this.openModal = this.openModal.bind(this);
      this.afterOpenModal = this.afterOpenModal.bind(this);
      this.closeModal = this.closeModal.bind(this);
      this.fetchMoreData = this.fetchMoreData.bind(this);
      this.handleSocialLoginGooglePhotos = this.handleSocialLoginGooglePhotos.bind(this);
      this.handleSocialLoginGoogleDrive = this.handleSocialLoginGoogleDrive.bind(this);
      this.getFbImagesFromFolder = this.getFbImagesFromFolder.bind(this);
      this.getGooglePhotoImagesFromFolder = this.getGooglePhotoImagesFromFolder.bind(this);
      this.getGoogleDriveImagesFromFolder = this.getGoogleDriveImagesFromFolder.bind(this);
      this.getDropBoxImagesFromFolder = this.getDropBoxImagesFromFolder.bind(this);
    }

    // Get Images from Album Start
    getFbImagesFromFolder(album_id){
      console.log("FB Album id: "+album_id);
      var fb_token = localStorage.getItem("fb_token");
      if(album_id){
        axios({
          method:'get',
          url: 'https://graph.facebook.com/v3.1/'+album_id+'/photos?fields=height,width,picture',
          responseType:'stream',
          scope: 'user_photos',
          headers: { Authorization : 'Bearer ' +fb_token }
        })
        .then((response) => {
          console.log(response);
          var myFbImages = [];
          var fb_length = response.data.data.length;
          for(var i=0; i<fb_length; i++){
            myFbImages.push(response.data.data[i].picture);
            modalImagesComponent.setState({
              show_fb_folder_images : true,
              fb_folder_images : myFbImages
            });
          }
         
        });
      }else{
        console.log("No Google Access Token (Photos Library)")
      }
    }
    getGooglePhotoImagesFromFolder(album_id){
      console.log("Google Photos Album id: "+album_id);
      var gp_token = localStorage.getItem("gp_token");
      if(album_id){
        axios({
          method:'POST',
          url: 'https://photoslibrary.googleapis.com/v1/mediaItems:search',
          'Content-type': 'application/json',
          headers: { Authorization : 'Bearer ' +gp_token },
          data: { "albumId": album_id }
        })
        .then((response) => {
          console.log(response);
          var myGPImages = [];
          var gp_length = response.data.mediaItems.length;
          for(var i=0; i<gp_length; i++){
            myGPImages.push(response.data.mediaItems[i]);
            modalImagesComponent.setState({
              show_google_photo_folder_images : true,
              google_photo_folder_images : myGPImages
            });
          }
        });
      }
    }
    getGoogleDriveImagesFromFolder(album_id){
      var gd_token = localStorage.getItem("gd_token");
      var google_drive = [];
      var google_drive_folder = [];
      if(gd_token !== ""){
        axios({
          method:'get',
          url: 'https://www.googleapis.com/drive/v2/files/'+album_id+'/children',
          headers: { Authorization : 'Bearer ' +gd_token }
        })
          .then((response) => {
            console.log(response);
            var len = response.data.items.length;
            for(var i=0; i<len; i++ ){
              axios({
                method:'get',
                url: response.data.items[i].childLink,
                headers: { Authorization : 'Bearer ' +gd_token }
              })
              .then((response) => {
                console.log(response);
                if(response.data.mimeType.includes('image')){
                    google_drive.push(response.data.thumbnailLink); 
                }
                if(response.data.mimeType.includes('folder')){
                  google_drive_folder.push(response.data.title);
                }
              });
              var a = i+1;
              if( a == len){
                console.log(google_drive)
                setTimeout(function(){
                  modalImagesComponent.setState({
                    google_drive_folder_images: google_drive,
                    show_google_drive_folder_images: true,
                    hasSocialImage: true,
                  });
                }, 3000);
              }
            }
            });
           
          }else{
            console.log("No Google Access Token (Drive Library)")
          }
    }
    getDropBoxImagesFromFolder(path){
      var db_token = localStorage.getItem("db_token");
      // DropBox Start  ---------------------------------------
      var folders = [];
      var files_array = [];
      var folder_flag = 0;
      axios({
        method:'POST',
        url:'https://api.dropboxapi.com/2/files/list_folder',
        headers: { Authorization : 'Bearer '+db_token, 'Content-Type':'application/json'},
        data : { path: path, include_media_info : true }
      })
        .then(function(response) {
          console.log(response);
          for(var i = 0; i < response.data.entries.length; i++ ){
            if(response.data.entries[i][".tag"] == "folder"){ 
              folders.push(response.data.entries[i]);
              folder_flag = 1;
            }else if(response.data.entries[i][".tag"] == "file"){
              axios({
                method:'POST',
                url:'https://api.dropboxapi.com/2/sharing/get_file_metadata',
                headers: { Authorization : 'Bearer '+db_token, 'Content-Type':'application/json'}, 
                data : JSON.stringify({'file': response.data.entries[i].id}), 'include_media_info' : true
              })
              .then(function(response) {
                console.log("Farhan is here");
                console.log(response);
                var str = response.data.path_display;
                var url = response.data.preview_url;
                if(str.includes('.png') || str.includes('.jpg') || str.includes('.JPEG') || str.includes('.PNG') || str.includes('.JPG')){
                  url = url.replace('?dl=0', '?dl=1');
                  files_array.push(url);
                }
              });
            }
          }
          if(files_array){
            setTimeout(function(){
            modalImagesComponent.setState({
              dropbox_folder_images: files_array,
              show_dropbox_folder_images: true
            });
          }, 3000 );
            console.log(modalImagesComponent.state.dropbox_folder_images);
          }
          
          if(folder_flag == 1){
            modalImagesComponent.setState({
              temp_dropbox_folder: folders,
              show_dropbox_folder_images: true
            });
          }
      });
      // DropBox End  ---------------------------------------

    }
    // **********  End  **********

    setFbAlbum(){
      modalImagesComponent.setState({
        show_fb_folder_images : false
      })
    }
    setGPImages(){
      modalImagesComponent.setState({
        show_google_photo_folder_images : false
      })
    }
    setGDImages(){
      modalImagesComponent.setState({
        show_google_drive_folder_images : false
      })
    }
    setDropboxAlbum(){
      modalImagesComponent.setState({
        show_dropbox_folder_images : false
      })
    }

    handleSocialLoginGooglePhotos(){

      gapi.load('client:auth2', {
        callback: function() {
        // Initialize client library
        // clientId & scope is provided => automatically initializes auth2 library
        gapi.client.init({
          apiKey: 'AIzaSyAzUEX5_G8_lPeM4RQin65zoXh18KzUJxE',
          clientId: '248144998346-o6243tu25p2a9224knhg6qcgts3pllht.apps.googleusercontent.com',
          scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me https://www.googleapis.com/auth/photoslibrary.readonly.appcreateddata ',
          response_type: 'token'
        }).then(
            // On success
            function(success) {
              console.log("I am In Google Photos");
              console.log(success);
            }, 
            // On error
            function(error) {
            alert('Error : Failed to Load Library');
            }
          );
        },
        onerror: function() {
        // Failed to load libraries
        }
      });
      // API call for Google login
      gapi.auth2.getAuthInstance().signIn().then(
        // On success
        function(success) {
          console.log('Photos Instance');
          console.log(success);
          var google_tok = success.Zi.access_token;
          var google_id = success.El;
          localStorage.setItem("gp_token", google_tok);
            $.ajax({
              url: window.baseURL+'/api/google_photo_token',
              type: 'POST',
              data: {'my_google_tok' : google_tok, 'my_google_id' : google_id },
              cache: false,
              dataType: 'json',
              success: function(response){
                console.log(response);
              }
            });

          //  API call to get user information
          gapi.client.request({ path: 'https://photoslibrary.googleapis.com/v1/albums' }).then(
            // On success
            function(success) {
              console.log('Auth Instance of Google Photos');
              console.log(success);
              var photos_folder = [];
              for(var i = 0; i < success.result.albums.length; i++){
                photos_folder.push(success.result.albums[i]);
              }
              modalImagesComponent.setState({
                google_photo_folder: photos_folder,
                hasSocialImage: true,
                has_photo_img : true
              });
            },
            // On error
            function(error) {
              $("#login-button-google-photos").removeAttr('disabled');
              alert('Error : Failed to get user information');
            }
          );
        },
        // On error
        function(error) {
          $("#login-button-google-photos").removeAttr('disabled');
          alert('Error : Login Failed for Google Photos');
        }
      );
    }

    handleSocialLoginGoogleDrive(){
      gapi.load('client:auth2', {
        callback: function() {
        // Initialize client library
        // clientId & scope is provided => automatically initializes auth2 library
        gapi.client.init({
          apiKey: 'AIzaSyAzUEX5_G8_lPeM4RQin65zoXh18KzUJxE',
          clientId: '248144998346-o6243tu25p2a9224knhg6qcgts3pllht.apps.googleusercontent.com',
          scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me https://www.googleapis.com/auth/drive.photos.readonly https://www.googleapis.com/auth/drive.readonly  https://www.googleapis.com/auth/drive.file https://www.googleapis.com/auth/drive.metadata.readonly https://www.googleapis.com/auth/drive.appdata',

          response_type: 'token'
        }).then(
            // On success
            function(success) {
              console.log("I am In Google Drive");
              console.log(success);
              
            }, 
            // On error
            function(error) {
            alert('Error : Failed to Load Library');
            }
          );
        },
        onerror: function() {
        // Failed to load libraries
        }
    });
      // API call for Google login
      gapi.auth2.getAuthInstance().signIn().then(
        // On success
        function(success) {
          console.log("Drive Data");
          console.log(success);
          var google_tok = success.Zi.access_token;
          var google_id = success.El;
          localStorage.setItem("gd_token", google_tok);
            $.ajax({
              url: window.baseURL+'/api/google_drive_token',
              type: 'POST',
              data: {'my_google_tok' : google_tok, 'my_google_id' : google_id },
              cache: false,
              dataType: 'json',
              success: function(response){
                console.log(response);
              }
            });

          // API call to get user information
          gapi.client.request({ path: 'https://www.googleapis.com/drive/v2/files?spaces' }).then(
            // On success
            function(success) {
              console.log("I am In Google Drive Instance");
              console.log(success);
              var google_drive = [];
              var google_drive_folder = [];
              for(var i = 0; i < success.result.items.length; i++){
                 if(success.result.items[i].mimeType.includes('image')){
                    google_drive.push(success.result.items[i].thumbnailLink);
                 }
                 if(success.result.items[i].mimeType.includes('folder')){
                  google_drive_folder.push(success.result.items[i]);
               }
              }
              modalImagesComponent.setState({
                google_drive: google_drive,
                google_drive_folder: google_drive_folder,
                hasSocialImage: true,
                has_drive_img: true
              });
            },
            // On error
            function(error) {
              alert('Error : Failed to get user information');
            }
          );
        },
        // On error
        function(error) {
          alert('Error : Login Failed for Google Drive');
        }
      );
    }

    getCurrentURL(){
      var current_url = window.location.href;
      var splitForLashIndex = current_url.split('/');
      var project_id = splitForLashIndex[splitForLashIndex.length - 1];
      localStorage.setItem("project_id", project_id);
    }
  
    componentDidMount() {

      $.ajax({
        url: window.baseURL+'/api/images/users-images',
        type: 'get',
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
          success: function(data)
          {
            myImages = data;
          }
      });

      this.setState({
        modalIsOpen : this.props.modalState,
        modalIsOpen : this.props.imgmodalState,
        tabIndex: this.props.tabIndex,
      })
      this.props.bg ? window.fromBG = true : ""
//this.props.bg ? window.fromBG = true : ""
      // Request for User Tokens
      $.ajax({
        url: window.baseURL+'/api/getTokens',
        type: 'GET',
        cache: false,
        success: function(response){
          console.log(response);
          
          modalImagesComponent.setState({
            hasSocialImage : true
          });
          
          var fb_user_id =  response.response.fb_id
          var fb_access_token =  response.response.fb_token
          // Facebook Albums start
          var fb_folder_array = [];
          axios({
            method:'get',
            url:'https://graph.facebook.com/v3.1/'+fb_user_id+'/albums',
            responseType:'stream',
            scope: 'user_photos',
            headers: { Authorization : 'Bearer ' +fb_access_token }
          })
            .then(function(response) {
              localStorage.setItem("fb_token", fb_access_token);
              var foldres_length = response.data.data.length;
              if(foldres_length > 0){
                fb_folder_array = response.data.data;
                modalImagesComponent.setState({
                  fb_folder : fb_folder_array,
                  has_fb_img : true
                })
              }
          }); 
          // Facebook Albums end 
          // Instagram Images Start
          var insta_images = [];
          var insta_access_token = response.response.insta_token;
          localStorage.setItem("insta_token", insta_access_token);
          if(insta_access_token !== ""){
            axios({
              method:'get',
              url: 'https://api.instagram.com/v1/users/self/media/recent/?access_token='+insta_access_token
            })
              .then((response) => {
                console.log(response);
                for(var i = 0; i < response.data.data.length; i++){
                  insta_images.push(response.data.data[i].images.low_resolution.url);
                }
                modalImagesComponent.setState({
                  insta_img: insta_images,
                  has_insta_img : true,
                  hasSocialImage : true
                });
            });
          }else{
            console.log("No Access Token (Instagram)")
          }
          // Instagram Images End ------------------------------------
          // DropBox Start  ---------------------------------------
          var folders = [];
          var files_array = [];
          var folder_flag = 0;
          var dropbox_user_id =  response.response.dropbox_id
          var dropbox_access_token =  response.response.dropbox_token
          localStorage.setItem("db_token", dropbox_access_token);
          axios({
            method:'POST',
            url:'https://api.dropboxapi.com/2/files/list_folder',
            headers: { Authorization : 'Bearer '+dropbox_access_token, 'Content-Type':'application/json'},
            data : { path: "", include_media_info : true }
          })
            .then(function(response) {
              console.log(response);
              for(var i = 0; i < response.data.entries.length; i++ ){
                if(response.data.entries[i][".tag"] == "folder"){ 
                  folders.push(response.data.entries[i]);
                  folder_flag = 1;
                }else if(response.data.entries[i][".tag"] == "file"){
                  axios({
                    method:'POST',
                    url:'https://api.dropboxapi.com/2/sharing/get_file_metadata',
                    headers: { Authorization : 'Bearer '+dropbox_access_token, 'Content-Type':'application/json'}, 
                    data : JSON.stringify({'file': response.data.entries[i].id}), 'include_media_info' : true
                  })
                  .then(function(response) {
                    console.log(response);
                    var str = response.data.path_display;
                    var url = response.data.preview_url;
                    if(str.includes('.png') || str.includes('.jpg') || str.includes('.JPEG') || str.includes('.PNG') || str.includes('.JPG')){
                      url = url.replace('?dl=0', '?dl=1');
                      files_array.push(url);
                    }
                  });
                }
              }
              if(files_array){
                modalImagesComponent.setState({
                  dropbox_img: files_array,
                  hasSocialImage: true,
                  has_dropbox_img : true
                });
              }
              if(folder_flag == 1){
                modalImagesComponent.setState({
                  dropbox_folder: folders,
                  hasSocialImage: true,
                  has_dropbox_img : true
                });
              }
          });
          // DropBox End  ---------------------------------------

          // Google Photos Start
        var google_id =  response.response.google_id
        var google_photos_access_token =  response.response.google_photos_token
        if(google_photos_access_token !== ""){
          axios({
            method:'get',
            url: 'https://photoslibrary.googleapis.com/v1/albums',
            headers: { Authorization : 'Bearer ' +google_photos_access_token }
          })
            .then((response) => {
              var photos_folder = [];
              for(var i = 0; i < response.data.albums.length; i++){
                photos_folder.push(response.data.albums[i]);
              }
              modalImagesComponent.setState({
                google_photo_folder: photos_folder,
                hasSocialImage: true,
                has_photo_img: true
              });
          });
        }else{
          console.log("No Google Access Token (Photos Library)")
        }
        // Google Photos End  ---------------------------------------

        // Google Drive Start

        var google_id =  response.response.google_id;
        var google_drive_access_token =  response.response.google_drive_token;
        if(google_drive_access_token !== ""){
          axios({
            method:'get',
            url: 'https://www.googleapis.com/drive/v2/files:spaces',
            headers: { Authorization : 'Bearer ' +google_drive_access_token }
          })
            .then((response) => {
              console.log("Hi Farhan Ali here");
              console.log(response);
              var google_drive = [];
              var google_drive_folder = [];
                for(var i = 0; i < response.data.items.length; i++){
                  if(response.data.items[i].mimeType.includes('image')){
                      google_drive.push(response.data.items[i].thumbnailLink);
                  }
                  if(response.data.items[i].mimeType.includes('folder')){
                    google_drive_folder.push(response.data.items[i]);
                  }
                }
                modalImagesComponent.setState({
                  google_drive: google_drive,
                  google_drive_folder: google_drive_folder,
                  hasSocialImage: true,
                  has_drive_img: true
                });
              });
            }else{
              console.log("No Google Access Token (Drive Library)")
            }
            // Google Drive End  ---------------------------------------
          }
        });

      /* --------------------------   */


    }

    openModal() {
      this.setState({ modalIsOpen: true });
    }

    afterOpenModal() {
      this.subtitle.style.color = '#f00';
      setTimeout(function(){
        var html ='';
        $.each(myImages.all_images,function(key,value){
          html = html+ '<div class="image-holder deleteableUploadedImage" data-id="'+value.id+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+myImages.destinationPath_thumb+'/'+value.file_name+'" /> </div>';
        });
        $("#my_images_container").html(html);
      },500);
    }

    loadMyImages(){
      setTimeout(function(){
        var html ='';
        $.each(myImages.all_images,function(key,value){
          html = html+ '<div class="image-holder deleteableUploadedImage" data-id="'+value.id+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+myImages.destinationPath_thumb+'/'+value.file_name+'" /> </div>';
        });
        $("#my_images_container").html(html);
      },500);
    }

    closeModal() {
      this.setState({ modalIsOpen: false });
      {this.props.modalState ? this.props.modalFalseState() : ""}
      {this.props.imgmodalState ? this.props.imgmodalFalseState() : ""}
      
    }

    loadFreeImages() {  
      var currentState = this;
      if (!this.state.freeImagesLoaded) {
        fetch(window.baseURL+"/api/images/cp-all-image-categories",{credentials: 'include'})
          .then(res => res.json())
          .then(
            (result) => {
              var startCatImg =[],endCatImg=[],hasMoreCatImg=[];
              result.forEach(function(key,index){
                startCatImg[key.id] = 0;
                endCatImg[key.id] = 19;
                hasMoreCatImg[key.id] = true;
              });
              currentState.setState({
                freeImagesCat: result,
                startCatImg: startCatImg,
                endCatImg: endCatImg,
                hasMoreCatImg: hasMoreCatImg
              });
            },
            (error) => {
              currentState.setState({
                error
              });
            }
          )
        fetch(window.baseURL+"/api/images/cp-all-images",{credentials: 'include'})
          .then(res => res.json())
          .then(
            (result) => {
              var freeCatImagesParts= [];
              var freeCatImages=[];
              result.cat_images.forEach(function(key,index){
                freeCatImages[key.id] = key.images;
                freeCatImagesParts[key.id] = key.images.slice(currentState.state.startCatImg[key.id], currentState.state.endCatImg[key.id]);
              });
              currentState.setState({
                freeImagesLoaded: true,
                freeImages: result.all_images,
                freeCatImages: freeCatImages,
                freeImagesParts: result.all_images.slice(currentState.state.start, currentState.state.end),
                freeCatImagesParts: freeCatImagesParts
              });
            },
            (error) => {
              currentState.setState({
                freeImagesLoaded: true,
                error
              });
            }
          )
      }
    }

    loadShutterstockImages() {
      if (!this.state.shutterCatLoaded) {
      fetch(window.baseURL+"/api/images/shutterstock-images-categories",{credentials: 'include'})
      .then(res => res.json())
      .then(
        (result) => {
          var shutterPage =[];
          var shutterImagesParts = [];
          shutterPage['all'] = 1;
          shutterImagesParts['all'] = [];
              result.data.forEach(function(key,index){
              shutterPage[key.id] = 1;
              shutterImagesParts[key.id] = [];
              });
              this.setState({
                shutterCats: result.data,
                shutterPage: shutterPage,
                shutterImagesParts:shutterImagesParts,
                shutterCatLoaded:true
              });
        },
        (error) => {
          this.setState({
            error
          });
        }
      )
      }
      fetch(window.baseURL+"/api/images/shutterstock-images",{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: 'include',
        body: JSON.stringify({
            per_page: this.state.shutterPerPage,
            page: 1,
            category_id: ''
        })
      })
      .then(res => res.json())
      .then(
        (result) => {
          var shutterImagesParts = this.state.shutterImagesParts;
              shutterImagesParts['all'] = result.data;
              this.setState({
                shutterImagesParts: shutterImagesParts
              });
        },
        (error) => {
          this.setState({
            error
          });
        }
      )
    }

    fetchMoreData() {
      var old_end = this.state.end;
      this.setState({ end: old_end + 20 });
      this.setState({ freeImagesParts: this.state.freeImages.slice(this.state.start, this.state.end) });
      if(this.state.freeImages.length <= this.state.end){
        this.setState({ hasMore: false });
      }
    }

    fetchMoreCatData(id) {
      var old_end_cat = this.state.endCatImg;
      old_end_cat[id] = old_end_cat[id] +20;
      this.setState({ endCatImg: old_end_cat });
      if(typeof this.state.freeCatImages[id] == undefined)
      {
        var freeCatImagesParts = this.state.freeCatImagesParts;
        freeCatImagesParts[id] = this.state.freeCatImages[id].slice(this.state.startCatImg[id], this.state.endCatImg[id]);
        this.setState({ freeCatImagesParts: freeCatImagesParts});

        if(this.state.freeCatImages[id].length <= this.state.endCatImg[id]){
          var hasMoreCatImg = this.state.hasMoreCatImg;
          hasMoreCatImg[id] = false;
          this.setState({ hasMoreCatImg: hasMoreCatImg });
        }
      }
      else
      {
        console.log("coming in undefined else");
      }
    }

    fetchShutterData(id) {
      var shutterImagesParts = this.state.shutterImagesParts;
        fetch(window.baseURL+"/api/images/shutterstock-images",{
          method: 'POST',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
          },
          credentials: 'include',
          body: JSON.stringify({
              per_page: this.state.shutterPerPage,
              page: 1,
              category_id: id
          })
        })
        .then(res => res.json())
        .then(
          (result) => {
            shutterImagesParts[id] = result.data;
                this.setState({
                  shutterImagesParts: shutterImagesParts
                });
          },
          (error) => {
            this.setState({
              error
            });
          }
        )
    }

    fetchMoreShutterData(id) {
      var old_shutterPage = this.state.shutterPage;
      old_shutterPage[id] = parseInt(old_shutterPage[id]) + 1;
      this.setState({ shutterPage: old_shutterPage });
        var shutterImagesParts = this.state.shutterImagesParts;
        fetch(window.baseURL+"/api/images/shutterstock-images",{
          method: 'POST',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
          },
          credentials: 'include',
          body: JSON.stringify({
              per_page: this.state.shutterPerPage,
              page: this.state.shutterPage[id],
              category_id: id
          })
        })
        .then(res => res.json())
        .then(
          (result) => {
            shutterImagesParts[id] = shutterImagesParts[id].concat(result.data);
                this.setState({
                  shutterImagesParts: shutterImagesParts
                });
          },
          (error) => {
            this.setState({
              error
            });
          }
        )
    }

    render() {
      return (
        <div onClick={this.openModal}>
            <h4 className="upload-h4s"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" xmlSpace="preserve"> <g> <path d="M55.201,15.5h-8.524l-4-10H17.323l-4,10H12v-5H6v5H4.799C2.152,15.5,0,17.652,0,20.299v29.368 C0,52.332,2.168,54.5,4.833,54.5h50.334c2.665,0,4.833-2.168, 4.833-4.833V20.299C60,17.652,57.848,15.5,55.201,15.5z M8,12.5h2v3H8V12.5z M58,49.667c0,1.563-1.271,2.833-2.833,2.833H4.833C3.271,52.5,2,51.229,2,49.667V20.299C2,18.756,3.256,17.5,4.799,17.5H6h6h2.677l4-10h22.646l4,10h9.878c1.543,0,2.799,1.256,2.799,2.799V49.667z"/><path d="M30,14.5c-9.925,0-18,8.075-18,18s8.075,18,18,18s18-8.075,18-18S39.925,14.5,30,14.5z M30,48.5c-8.822,0-16-7.178-16-16s7.178-16,16-16s16,7.178,16,16S38.822,48.5,30,48.5z"/><path d="M30,20.5c-6.617,0-12,5.383-12,12s5.383,12,12,12s12-5.383,12-12S36.617,20.5,30,20.5z M30,42.5c-5.514,0-10-4.486-10-10s4.486-10,10-10s10,4.486,10,10S35.514,42.5,30,42.5z"/><path d="M52,19.5c-2.206,0-4,1.794-4,4s1.794,4,4,4s4-1.794,4-4S54.206,19.5,52,19.5z M52,25.5c-1.103,0-2-0.897-2-2s0.897-2,2-2s2,0.897,2,2S53.103,25.5,52,25.5z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> <span>{this.props.textContent ? this.props.textContent : 'Images\nLibrary'}</span></h4>
          <Modal
            isOpen={this.state.modalIsOpen}
            onAfterOpen={this.afterOpenModal}
            onRequestClose={this.closeModal}
            style={customStyles}
            contentLabel="Image Modal"
            overlayClassName="generic_modal"
          >
            <h2 ref={subtitle => this.subtitle = subtitle}>Images Library <span className="modal_btn pull-right"><button className="btn clos-btn" onClick={this.closeModal}>X</button></span></h2>
           
            <div className="modal_inner">
            <Tabs>
                <div className="Upload_image">
                   <Dropzone accept=".jpg,.png,jpeg" className="image-dropzone dz-buttonshape">
                            Upload Image <i className="fa fa-upload"></i>
                   </Dropzone>
                    <div className="modal_search">
                            <i className="fa fa-search"></i> <input className="" type="text" placeholder="Search here ..." />
                    </div>
                    <button className="btn Delete_btn" disabled={true}><i className="fa fa-trash"></i></button>
                    <button className="addToPageBtn" onClick={(event) => { this.closeModal(); addImagesToPage();}}>Add to Site <i className="fa fa-plus-circle"></i></button>
                    
                </div>
                
                <TabList className="modal_top_tabs">
                  <Tab className="my-images-modal" onClick={() => { this.loadMyImages(); $('.Delete_btn').prop('disabled', true); }} > My Images</Tab>
                  {this.props.yesSocial ? <Tab className="social-images-modal react-tabs__tab--selected" onClick={() => { $('.Delete_btn').prop('disabled', true); }}>Social Images</Tab>  : <Tab className="social-images-modal">Social Images</Tab>} 
                  <Tab onClick={() => { this.loadFreeImages();$('.Delete_btn').prop('disabled', true); }} className="free-from-controlpanda-modal">Free from ControlPanda</Tab>
                  <Tab className="shutterstock-images-modal" onClick={() => { this.loadShutterstockImages(); $('.Delete_btn').prop('disabled', true); }}>Shutterstock Images</Tab>
                </TabList>
                
                <TabPanel className="Right_Inner_Tabs">
                  <div className="dropzone-loader">
                    <div id="my_images_container"></div>
                  </div>
                </TabPanel>
                
                <TabPanel className="Right_Inner_Tabs">
                  { !this.state.hasSocialImage ? 
                    <div className="social_images">
                      <p>
                        Add iamges from your Facebook, Instagram, Google Drive, or Google Photo accounts at the click of a button.
                      </p>
                      <div className="social_images_inner">
                        <h2>
                          All your Images, Right Here
                        </h2>
                        <p>
                          Instantly add your images from any of these social networks to your site.
                        </p>
                        <div className="social_btns">
                          <FacebookLogin
                            appId="228173444723669"
                            fields="name,email,picture"
                            scope="public_profile, user_photos"
                            cssClass="social_connect social_connect_btn"
                            textButton="Facebook"
                            callback={handleSocialLogin}/>
                          <a href="https://api.instagram.com/oauth/authorize/?client_id=8ca7657418624494a2bdfa4bc4e1286d&redirect_uri=https://controlpanda.com/token_insta&response_type=token&scope=likes+comments+follower_list" > Instagram </a>  
                          <a href="https://www.dropbox.com/oauth2/authorize?client_id=jm2ua6ycwvwl1ik&response_type=token&redirect_uri=https://controlpanda.com/token_dropbox"> Dropbox </a>
                          <button onClick={this.handleSocialLoginGoogleDrive} >Google Drive</button>
                          <button onClick={this.handleSocialLoginGooglePhotos} >Google Photos</button>
                        </div>
                      </div>
                    </div> 
                    : 
                    <div className="side_socialIcon">
                      <Tabs>
                        <div>
                          <div className="leftInnerTab">
                            <div className="Left_Inner_Tabs_wrap">
                              <TabList className="Left_Inner_Tabs">
                                <Tab className="facebook"><i className="fa fa-facebook"></i> Facebook <span className="fa fa-ellipsis-h"></span></Tab>
                                <Tab className="instagram"><i className="fa fa-instagram"></i> Instagram <span className="fa fa-ellipsis-h"></span></Tab>
                                <Tab className="dropbox"><i className="fa fa-dropbox"></i> Dropbox <span className="fa fa-ellipsis-h"></span></Tab>
                                <Tab className="googleDrive"><i className="flaticon-google-drive-logo"></i> Google Drive <span className="fa fa-ellipsis-h"></span></Tab>
                                <Tab className="googlePhoto"><i className="flaticon-photo"></i> Google Photo <span className="fa fa-ellipsis-h"></span></Tab>
                              </TabList>
                            </div>
                          </div>
                          <div className="Right_Inner_Tabs">
                            <TabPanel>
                              <div className="social_content">
                                {this.state.has_fb_img && !this.state.show_fb_folder_images ?  
                                  <ul className="">
                                    {this.state.fb_folder.map((folder, index) => (
                                      <li key={index}>
                                       <div className="folder-wrap" onClick={() => this.getFbImagesFromFolder(folder.id)} >
                                          <p className="folder-title">{folder.name}</p>
                                          <i className="fa fa-folder folder-images" aria-hidden="true"></i>
                                        </div>
                                      </li>
                                    ))}
                                    {this.state.fb_img.map((img) => (
                                      <li>
                                        <div className="img-wrap" key={img.id}>
                                          <img alt="" src={img} />
                                        </div>
                                      </li>
                                    ))}
                                  </ul>
                                  : this.state.has_fb_img && this.state.show_fb_folder_images  ? 
                                    <div>
                                     <i onClick={this.setFbAlbum} className="fa fa-arrow-left left-arrow" aria-hidden="true"></i>
                                      <ul className="">
                                        {this.state.fb_folder_images.map((folder_images, index) => (
                                          <li>
                                            <div className="img-wrap"key={index} >
                                              <img alt="" src={folder_images}/>
                                            </div>
                                          </li>
                                        ))}
                                      </ul>
                                    </div>
                                  :
                                  <div className="align_H-V">
                                    <div className="align-center" onClick={this.getCurrentURL}>
                                      <img src={window.baseURL+'/images/social_picture.jpg'}/>
                                      <h2>Connect Facebook</h2>
                                      <p>Instantly add your images from Facebook to your site.</p>
                                      <FacebookLogin
                                      appId="228173444723669"
                                      fields="name,email,picture"
                                      scope="public_profile, user_photos"
                                      textButton="Facebook"
                                      cssClass="social_connect social_connect_btn"
                                      callback={handleSocialLogin}/>
                                    </div>
                                  </div>
                                }
                              </div>
                            </TabPanel>
                            <TabPanel>
                              <div className="social_content">
                                { this.state.has_insta_img ? 
                                  <ul className="">
                                    {this.state.insta_img.map((img) => (
                                      <li>
                                        <div className="img-wrap" key={img.id}>
                                          <img alt="" src={img} />
                                        </div>
                                      </li>
                                    ))}
                                  </ul> 
                                : 
                                <div className="align_H-V">
                                  <div className="align-center" onClick={this.getCurrentURL}>
                                    <img src={window.baseURL+'/images/social_picture.jpg'}/>
                                    <h2>Connect Instagram</h2>
                                    <p>Instantly add your images from Instagram to your site.</p>                                
                                    <a className="social_connect" href="https://api.instagram.com/oauth/authorize/?client_id=8ca7657418624494a2bdfa4bc4e1286d&redirect_uri=https://controlpanda.com/token_insta&response_type=token&scope=likes+comments+follower_list"> Connect Instagram</a>
                                  </div>
                                </div>
                                }
                              </div>
                            </TabPanel>
                            <TabPanel>
                              <div className="social_content">
                              { this.state.has_dropbox_img && !this.state.show_dropbox_folder_images ?  
                                  <ul className="">
                                    {this.state.dropbox_folder.map((folder, index) => (
                                      <li key={index}>
                                       <div className="folder-wrap" onClick={()=>this.getDropBoxImagesFromFolder(folder.path_lower)} >
                                       <p className="folder-title">{folder.name}</p>
                                          <i className="fa fa-folder folder-images" aria-hidden="true"></i>
                                        </div>
                                      </li>
                                    ))}
                                    {this.state.dropbox_img.map((img, index) => (
                                      <li key={index}>
                                        <div className="img-wrap">
                                          <img alt="" src={img} />
                                        </div>
                                      </li>
                                    ))}
                                </ul> 
                              
                                  :  this.state.has_dropbox_img && this.state.show_dropbox_folder_images  ? 
                                  <div>
                                    <i onClick={this.setDropboxAlbum} className="fa fa-arrow-left left-arrow" aria-hidden="true"></i>
                                    <ul className="">
                                        {this.state.dropbox_folder_images.map((folder_images, index) => (
                                          <li>
                                            {console.log("Hello World")}
                                          <div className="img-wrap" key={index} >
                                            <img alt="" src={folder_images}/>
                                          </div>
                                          </li>
                                        ))}
                                        {this.state.temp_dropbox_folder.map((folder, index) => (
                                          <li key={index}>
                                            <div className="folder-wrap" onClick={()=>this.getDropBoxImagesFromFolder(folder.path_lower)} >
                                              <p className="folder-title">{folder.name}</p>
                                              <i className="fa fa-folder folder-images" aria-hidden="true"></i>
                                            </div>
                                          </li>
                                        ))}
                                    </ul>
                                  </div> 
                                :  
                                <div className="align_H-V">
                                  <div className="align-center" onClick={this.getCurrentURL}>
                                    <img src={window.baseURL+'/images/social_picture.jpg'}/>
                                    <h2>Connect Dropbox</h2>
                                    <p>Instantly add your images from Dropbox to your site.</p>                                
                                    <a className="social_connect" href="https://www.dropbox.com/oauth2/authorize?client_id=jm2ua6ycwvwl1ik&response_type=token&redirect_uri=https://controlpanda.com/token_dropbox"> Connect Dropbox </a>
                                  </div> 
                                </div>
                                }
                              </div>
                            </TabPanel>
                            <TabPanel>
                              <div className="social_content">
                              { this.state.has_drive_img && !this.state.show_google_drive_folder_images ?  
                                  <ul className="">
                                  {this.state.google_drive_folder.map((folder, index) => (
                                     <li key={index}>
                                       <div className="folder-wrap" onClick={()=>this.getGoogleDriveImagesFromFolder(folder.id)} >
                                         <p className="folder-title">{folder.title}</p>
                                         <i className="fa fa-folder folder-images" aria-hidden="true"></i>
                                       </div>
                                     </li>
                                   ))}
                                    {this.state.google_drive.map((img) => (
                                        <li>
                                          <div className="img-wrap" key={img.id}>
                                            <img alt="" src={img} />
                                          </div>
                                        </li>
                                      ))}
                                  </ul>
                                  :  this.state.has_drive_img && this.state.show_google_drive_folder_images  ? 
                                  <div>
                                    <i onClick={this.setGDImages} className="fa fa-arrow-left left-arrow" aria-hidden="true"></i>
                                    <ul className="">
                                        {this.state.google_drive_folder_images.map((folder_images, index) => (
                                          <li>
                                            <div className="img-wrap" key={index} >
                                              <img alt="" src={folder_images}/>
                                            </div>
                                          </li>
                                        ))}
                                    </ul>
                                  </div>
                                
                                : 
                                <div className="align_H-V">
                                  <div className="align-center" onClick={this.getCurrentURL}>
                                    <img src={window.baseURL+'/images/social_picture.jpg'}/>
                                    <h2>Connect Google Drive</h2>
                                    <p>Instantly add your images from Google Drive to your site.</p>                                
                                    <a className="social_connect" onClick={this.handleSocialLoginGoogleDrive}> Google Drive</a>
                                  </div>
                                </div>
                               }
                              </div>
                            </TabPanel>
                            <TabPanel>
                              <div className="social_content">
                              { this.state.has_photo_img && !this.state.show_google_photo_folder_images ?  
                                  <ul className="">
                                  {this.state.google_photo_folder.map((folder, index) => (
                                     <li key={index}>
                                       <div className="folder-wrap" onClick={()=>this.getGooglePhotoImagesFromFolder(folder.id)} >
                                         <p className="folder-title">{folder.title}</p>
                                         <i className="fa fa-folder folder-images" aria-hidden="true"></i>
                                       </div>
                                     </li>
                                   ))}
                                   {this.state.google_photo.map((img) => (
                                     <li>
                                       <div className="img-wrap" key={img.id}>
                                         <img alt="" src={img} />
                                       </div>
                                     </li>
                                   ))} 
                                 </ul>
                                  :  this.state.has_photo_img && this.state.show_google_photo_folder_images  ? 
                                  <div>
                                    <i onClick={this.setGPImages} className="fa fa-arrow-left left-arrow" aria-hidden="true"></i>
                                    <ul className="">
                                        {this.state.google_photo_folder_images.map((folder_images, index) => (
                                          <li>
                                            <div className="img-wrap" key={index} >
                                              <img alt="" src={folder_images.baseUrl}/>
                                            </div>
                                          </li>
                                        ))}
                                    </ul>
                                  </div>
                                : 
                                <div className="align_H-V">
                                  <div className="align-center" onClick={this.getCurrentURL}>
                                    <img src={window.baseURL+'/images/social_picture.jpg'}/>
                                    <h2>Connect Google Photos</h2>
                                    <p>Instantly add your images from Google Photos to your site.</p>                                
                                    <a className="social_connect" onClick={this.handleSocialLoginGooglePhotos}> Google Photos </a>
                                  </div>
                                </div>
                              }
                              </div>
                            </TabPanel>
                          </div>
                        </div>
                      </Tabs>
                    </div>
                  }
                </TabPanel>
  
                <TabPanel className="Right_Inner_Tabs">
                  <Tabs>
                  <div>
                      <div className="leftInnerTab">
                        <div className="Left_Inner_Tabs_wrap">
                          <TabList className="Left_Inner_Tabs">
                            <Tab className="">All</Tab>
                            {this.state.freeImagesCat.map((cats) => (
                              typeof this.state.freeCatImagesParts[cats.id] == "undefined"  ? "" : 
                              <Tab key={'tab'+cats.id} className="">{cats.name}</Tab>
                            ))}
                          </TabList>
                        </div>
                      </div>
                      <div className="Right_Inner_Tabs">
                        <TabPanel>
                          <InfiniteScroll
                            dataLength={this.state.freeImagesParts.length}
                            next={() => this.fetchMoreData()}
                            hasMore={this.state.hasMore}
                            loader={<b>Loading...</b>}
                            height={500}
                          >
                            {this.state.freeImagesParts.map((img) => (
                              <div className="image-holder" key={img.id}>
                                <i className="fa fa-check imageChecked" aria-hidden="true"></i>
                                <img alt="" src={window.baseURL+'/uploads/images/thumbnails/'+img.file_name} />
                              </div>
                            ))}
                          </InfiniteScroll>
                        </TabPanel>
                       {
                        this.state.freeImagesCat.map((cats) => (
                          typeof this.state.freeCatImagesParts[cats.id] == "undefined"  ? "" : 
                              <TabPanel key={'tabpanel'+cats.id}>
                              <InfiniteScroll
                            dataLength={this.state.freeCatImagesParts[cats.id].length}
                            next={() => this.fetchMoreCatData(cats.id)}
                            hasMore={this.state.hasMoreCatImg[cats.id]}
                            loader={<b>Loading...</b>}
                            height={500}
                          >
                            {
                              typeof this.state.freeCatImagesParts[cats.id] == "undefined"  ? "" : this.state.freeCatImagesParts[cats.id].map((img) => (
                              <div className="image-holder" key={'cat-img'+img.id}>
                                <img alt="" src={window.baseURL+'/uploads/images/thumbnails/'+img.file_name} />
                              </div>
                            ))}
                          </InfiniteScroll>
                              </TabPanel>
                        ))
                      }
                      </div>
                    </div>
                  </Tabs>
                </TabPanel>
  
                <TabPanel className="Right_Inner_Tabs">
                  <Tabs>
                    <div>
                      <div className="leftInnerTab">
                        <div className="Left_Inner_Tabs_wrap">
                          <TabList className="Left_Inner_Tabs">
                          { 
                            (typeof this.state.shutterImagesParts['all'] == "undefined") ? "" : <Tab className="">All</Tab> 
                          }
                            { 
                              this.state.shutterCats.map((cats) => (
                              (typeof this.state.shutterImagesParts[cats.id] == "undefined") ? "" : <Tab onClick={() => this.fetchShutterData(cats.id)} key={'shutterTab'+cats.id} className="">{cats.name}</Tab>
                            ))
                            }
                          </TabList>
                        </div>
                      </div>
  
                      <div className="Right_Inner_Tabs">
                      { (typeof this.state.shutterImagesParts['all'] == "undefined") ? "" :
                      <TabPanel key={'shuttertabpanelall'}>
                            <InfiniteScroll
                            dataLength={this.state.shutterImagesParts['all'].length}
                            next={() => this.fetchMoreShutterData('all')}
                            hasMore={this.state.hasMoreShutter}
                            loader={<b>Loading...</b>}
                            height={500}
                          >
                            {
                              typeof this.state.shutterImagesParts['all'] == "undefined"  ? "" : this.state.shutterImagesParts['all'].map((img) => (
                              <div className="image-holder shutterimg" key={'shutter-img'+img.id}>
                              <i className="fa fa-check imageChecked" aria-hidden="true"></i>
                                <img alt="" src={img.assets.huge_thumb.url} />
                              </div>
                            ))}
                          </InfiniteScroll>
                        </TabPanel>
                      }
                      
                      { this.state.shutterCats.map((cats) => (
                        (typeof this.state.shutterImagesParts[cats.id] == "undefined") ? "" :
                        <TabPanel key={'shuttertabpanel'+cats.id}>
                            <InfiniteScroll
                            dataLength={this.state.shutterImagesParts[cats.id].length}
                            next={() => this.fetchMoreShutterData(cats.id)}
                            hasMore={this.state.hasMoreShutter}
                            loader={<b>Loading...</b>}
                            height={500}
                          >
                            {
                              typeof this.state.shutterImagesParts[cats.id] == "undefined"  ? "" : this.state.shutterImagesParts[cats.id].map((img) => (
                              <div className="image-holder shutterimg" key={'shutter-img'+img.id}>
                              <i className="fa fa-check imageChecked" aria-hidden="true"></i>
                                <img alt="" src={img.assets.huge_thumb.url} />
                              </div>
                            ))}
                          </InfiniteScroll>
                        </TabPanel>
                        ))}
                      </div>
                    </div>
                  </Tabs>
                </TabPanel>
              </Tabs>
            </div>
          </Modal>
        </div>
      );
    }
  } export default ModalImage;