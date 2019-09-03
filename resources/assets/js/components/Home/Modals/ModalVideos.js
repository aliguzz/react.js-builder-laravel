import React from 'react'
import ReactDOM from 'react-dom'
import Modal from 'react-modal'
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs'
import Dropdown from 'react-dropdown'
import 'react-dropdown/style.css'
import InfiniteScroll from 'react-infinite-scroll-component'
import Dropzone from 'react-dropzone'


$("body").on('click', '.deleteableUploadedVideo', function()
{
  setTimeout(function()
  {
    console.log("$('.deleteableUploadedVideo.imageSelector').length");
    console.log($('.deleteableUploadedVideo.imageSelector').length);
    if($('.deleteableUploadedVideo.imageSelector').length> 0)
    {
      $('.Delete_btn_video').prop('disabled', false);
    }
    else
    {
      $('.Delete_btn_video').prop('disabled', true);
    }
  },100)
});
$('body').on('click', '.Delete_btn_video', function()
{
  
  var videoIdsToDelete = [];
  $('.deleteableUploadedVideo.imageSelector').each(function()
  {
    videoIdsToDelete.push($(this).attr('data-id'));
  });
  new Noty(
    {
      timeout: 2500,
        text: 'Deleting the Video(s).',
        theme:'metroui',
        type:'info'
    }).show();
  setTimeout(function(){
  $.ajax({
    url: window.baseURL+'/api/images/deleteUserVideos',
    type: 'POST',
    data: {'videoIds' : videoIdsToDelete},
    cache: false,
    dataType: 'json',
    success: function(response){
      new Noty(
        {
          timeout: 2500,
            text: 'Deleting the Video(s).',
            theme:'metroui',
            type:'success'
        }).show();
      $('.deleteableUploadedVideo.imageSelector').remove();
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
var myVideos;
$(document).on('change','.video-dropzone input[type=file]', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
  var data = new FormData();
  new Noty(
    {
      timeout: 2500,
        text: 'Uploading the Video(s).',
        theme:'metroui',
        type:'info'
    }).show();
  $.each(files, function(key, value)
    {
        data.append(key, value);
    });
    $.ajax({
      url: window.baseURL+'/api/images/upload-videos',
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
              text: 'Uploaded the Video(s).',
              theme:'metroui',
              type:'success'
          }).show();
        var html ='';
        $.each(data.all_videos,function(key,value){
          html = html+ '<div class="video-holder deleteableUploadedVideo" data-id="'+value.id+'" data-video="'+data.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+data.destinationPath+'/thumbnails/'+value.thumb+'" /> </div>';
        });
        $("#my_videos_container").html(html);
      }
  });
}

const addVideosToPage = (user, err) => {
  if(window.fromConfig)
  {
    var selectedComponent = $('#playground-editor iframe').contents().find('html').find('.selectedElementEditor');
    if(!selectedComponent.hasClass('componentElement'))
    {
      selectedComponent = selectedComponent.parents('.componentElement');
    }    
    if(selectedComponent.attr('ninjaslider'))
    {
      var htmlRendered = "<div class='slider-inner'> <ul>";
      var htmlRenderedThumbs = "<div id='thumbs' class='thumbs'>";
      var indexer = 0;
      $('.imageSelector').each(function(index, element)
      {
        var thisUrl = $(this).attr("data-video");
        var thisThum = $(this).find('img').attr('src');
        htmlRendered = htmlRendered+"<li> <div class='video'> <video controls src='"+thisUrl+"'> <source src='"+thisUrl+"'></source> </video> </div> </li>";
        htmlRenderedThumbs = htmlRenderedThumbs + "<span onclick='nslider.displaySlide(\""+indexer+"\")'><img src='"+thisThum+"' /><span class='playvideo'>AUTO</span></span>";
        indexer++;
      });
      htmlRendered = htmlRendered+'</ul></div>';
      htmlRenderedThumbs = htmlRenderedThumbs+'</div>';
      selectedComponent.empty();
      selectedComponent.append(htmlRendered);
      selectedComponent.append(htmlRenderedThumbs);
      $('#playground-editor iframe')[0].contentWindow.pandaVideoTrigger();
    }
    else if(selectedComponent.attr('videojsslider'))
    {
      var thisComp = $('.imageSelector').first();
      var thisUrl = thisComp.attr("data-video");
      selectedComponent.find('video').attr('src', thisUrl);
    }
    window.fromConfig = false;
  }
  else if(window.fromBG)
  {
    var thisUrl = $('.imageSelector').first().attr("data-video");
    $('#playground-editor iframe').contents().find('#pageBackgroundVideo').remove();
    var addedComponent = $('<video style="position: fixed; top: 50%; left: 50%; min-width: 100%;min-height: 100%;width: auto; height: auto; z-index: -100; transform: translate(-50%, -50%);" id="pageBackgroundVideo" controls><source src="'+thisUrl+'" type="video/mp4"><source src="'+thisUrl+'" type="video/ogg">Your browser does not support the video tag.</video>');
    $("#mainEditorFrame").contents().find("body").append(addedComponent);
    window.fromBG = false;
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
      var thisUrl = $(this).attr("data-video");
      console.log(thisUrl);
      
      var addedComponent = $('<div style="width:600px"><video style="width:100%" cpandavideo="1" width="320" height="240" controls><source src="'+thisUrl+'" type="video/mp4"><source src="'+thisUrl+'" type="video/ogg">Your browser does not support the video tag.</video></div>');
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
            "left": (calculatedLeft + sizeAdditive),
            "width":"500px"
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

class ModalVideos extends React.Component {
    constructor() {
      super();
      this.state = {
        freeVideos: [],
        freeCatVideos: [],
        freeVideosCat: [],
        freeVideosParts: [],
        freeCatVideosParts: [],
        startCatVideo:[],
        endCatVideo:[],
        hasMoreCatVideo:[],
        start: 0,
        limit: 25,
        freeVideosLoaded: false,
        error: null,
        hasMore:true,
      };
      this.openModal = this.openModal.bind(this);
      this.afterOpenModal = this.afterOpenModal.bind(this);
      this.closeModal = this.closeModal.bind(this);
    }
    componentDidMount() {
      this.setState({
        modalIsOpen : this.props.modalState
      })
      this.props.bg ? window.fromBG = true : ""
      $.ajax({
        url: window.baseURL+'/api/images/users-videos',
        type: 'get',
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data)
        {
          myVideos = data;
        }
      });
      
    }
    loadFreeVideos() {
      var currentState = this;
      if (!this.state.freeVideosLoaded) {
        fetch(window.baseURL+"/api/images/cp-all-video-categories",{credentials: 'include'})
          .then(res => res.json())
          .then(
            (result) => {
              var startCatVideo =[],endCatVideo=[],hasMoreCatVideo=[];
              result.forEach(function(key,index){
                startCatVideo[key.id] = 0;
                endCatVideo[key.id] = 25;
                hasMoreCatVideo[key.id] = true;
              });
              currentState.setState({
                freeVideosCat: result,
                startCatVideo: startCatVideo,
                endCatVideo: endCatVideo,
                hasMoreCatVideo: hasMoreCatVideo
              });
            },
            (error) => {
              currentState.setState({
                error
              });
            }
          )
        fetch(window.baseURL+"/api/images/cp-all-videos",{credentials: 'include'})
          .then(res => res.json())
          .then(
            (result) => {
              var freeCatVideosParts= [];
              var freeCatVideos=[];
              result.cat_videos.forEach(function(key,index){
                freeCatVideos[key.id] = key.videos;
                freeCatVideosParts[key.id] = key.videos.slice(currentState.state.startCatVideo[key.id], currentState.state.endCatVideo[key.id]);
              });
              currentState.setState({
                freeVideosLoaded: true,
                freeVideos: result.all_videos,
                freeCatVideos: freeCatVideos,
                freeVideosParts: result.all_videos.slice(currentState.state.start, currentState.state.limit),
                freeCatVideosParts: freeCatVideosParts
              });
            },
            (error) => {
              currentState.setState({
                freeVideosLoaded: true,
                error
              });
            }
          )
      }
    }

    fetchMoreData() {
      var old_end = this.state.limit;
      this.setState({ limit: old_end + 25 });
      this.setState({ freeVideosParts: this.state.freeVideos.slice(this.state.start, this.state.limit) });
      if(this.state.freeVideos.length <= this.state.limit){
        this.setState({ hasMore: false });
      }
    }

    fetchMoreCatData(id) {
      var old_end_cat = this.state.endCatVideo;
      old_end_cat[id] = old_end_cat[id] +25;
      this.setState({ endCatVideo: old_end_cat });
      if(typeof this.state.freeCatVideos[id] == undefined)
      {
        var freeCatVideosParts = this.state.freeCatVideosParts;
        freeCatVideosParts[id] = this.state.freeCatVideos[id].slice(this.state.startCatVideo[id], this.state.endCatVideo[id]);
        this.setState({ freeCatVideosParts: freeCatVideosParts});

        if(this.state.freeCatVideos[id].length <= this.state.endCatVideo[id]){
          var hasMoreCatVideo = this.state.hasMoreCatVideo;
          hasMoreCatVideo[id] = false;
          this.setState({ hasMoreCatVideo: hasMoreCatVideo });
        }
      }
      else
      {
        console.log("coming in undefined else");
      }
    }
    openModal() {
      this.setState({ modalIsOpen: true });
    }
    afterOpenModal() {
      this.subtitle.style.color = '#f00';
      setTimeout(function(){
        var html ='';
        $.each(myVideos.all_videos,function(key,value){
          html = html+ '<div class="video-holder deleteableUploadedVideo" data-id="'+value.id+'" data-video="'+myVideos.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+myVideos.destinationPath+'/thumbnails/'+value.thumb+'" /> </div>';
        });
        $("#my_videos_container").html(html);
      },500);
    }
    closeModal() {
      this.setState({ modalIsOpen: false});
      {this.props.modalState ? this.props.videomodalFalseState() : ""}
      //window.fromConfig = false;
    }

    loadMyVideos(){
      setTimeout(function(){
        var html ='';
        $.each(myVideos.all_videos,function(key,value){
          html = html+ '<div class="video-holder deleteableUploadedVideo" data-id="'+value.id+'" data-video="'+myVideos.destinationPath+'/'+value.file_name+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+myVideos.destinationPath+'/thumbnails/'+value.thumb+'" /> </div>';
        });
        $("#my_videos_container").html(html);
      },500);
    }
  
    render() {
      return (
        <div onClick={this.openModal}>
          <h4 className="upload-h4s"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.998 511.998" xmlSpace="preserve"><g><g><path d="M487.528,381.492c4.162,0,7.534-3.373,7.534-7.534V171.58c-0.001-9.694-7.887-17.58-17.581-17.58h-2.076h-55.62h-60.318h-55.62h-60.319h-55.619h-50.936l29.298-4.411c0.001,0,0.001,0,0.001,0l55.001-8.282l59.645-8.981h0.001l54.999-8.282c0.001,0,0.002-0.001,0.003-0.001l59.638-8.98c0.001,0,0.003,0,0.004,0l55-8.282c0.001,0,0.001,0,0.002-0.001l23.112-3.48c4.644-0.699,8.738-3.164,11.528-6.943s3.94-8.416,3.24-13.06l-10.289-68.332c-0.698-4.644-3.163-8.737-6.942-11.526c-3.778-2.789-8.417-3.939-13.06-3.241l-2.05,0.308c-0.001,0-0.002,0-0.003,0l-54.999,8.282c-0.001,0-0.002,0.001-0.004,0.001l-59.638,8.98c-0.001,0-0.003,0-0.005,0l-55,8.282h-0.001l-59.644,8.981h-0.001l-14.027,2.113L54.553,60.972l-3.809,0.574l-18.842,2.837c-4.643,0.699-8.736,3.164-11.526,6.943s-3.94,8.415-3.241,13.06l11.706,77.744v332.289c0,9.693,7.887,17.58,17.58,17.58h431.059c9.693,0,17.58-7.887,17.58-17.58v-78.639c0-4.161-3.372-7.534-7.534-7.534c-4.162,0-7.534,3.373-7.534,7.534v78.639c0,1.384-1.126,2.511-2.511,2.511H46.423c-1.385,0-2.511-1.127-2.511-2.511V275.697h436.082v98.261C479.994,378.119,483.366,381.492,487.528,381.492z M463.729,20.352l9.817,65.189c0.135,0.895-0.232,1.552-0.463,1.865c-0.23,0.313-0.751,0.857-1.648,0.992l-13.676,2.059L463.729,20.352z M409.227,22.804l39.68-5.974l-6.467,75.934l-0.029,0.004l-39.651,5.97L409.227,22.804z M349.58,31.787l44.327-6.674l-6.468,75.934l-44.327,6.674L349.58,31.787z M294.582,40.068l39.679-5.975l-6.468,75.934l-39.679,5.975L294.582,40.068z M234.934,49.049l44.327-6.674l-6.467,75.934l-44.327,6.674L234.934,49.049z M179.935,57.332l13.035-1.963l26.646-4.012l-6.468,75.934l-12.808,1.929l-26.872,4.046L179.935,57.332z M39.158,129.432l-7.122-47.291c-0.135-0.895,0.233-1.553,0.463-1.865c0.231-0.313,0.751-0.858,1.648-0.992l9.403-1.415L39.158,129.432z M479.993,172.896v55.593h-15.897L479.993,172.896z M425.468,169.068h39.947l-16.992,59.42h-39.947L425.468,169.068z M365.149,169.068h44.646l-16.992,59.42h-44.646L365.149,169.068z M309.529,169.068h39.947l-16.992,59.42h-39.947L309.529,169.068z M249.21,169.068h44.647l-16.992,59.42h-44.646L249.21,169.068z M193.59,169.068h39.946l-16.991,59.42h-39.947L193.59,169.068z M177.918,169.068l-16.992,59.42h-51.14l16.992-59.42H177.918z M94.115,228.489H54.166l16.993-59.42h39.947L94.115,228.489z M113.867,67.28l50.748-7.642l-6.467,75.934l-50.748,7.642L113.867,67.28z M58.868,75.561l7.818-1.177l31.862-4.798L92.08,145.52l-25.407,3.825L52.4,151.494L58.868,75.561z M43.912,169.068h11.574l-11.574,40.477V169.068z M43.912,260.628v-17.071h0.265h55.62h66.812h55.62h60.318h55.62h60.318h55.62h25.888v17.071H43.912z"/></g></g><g><g><path d="M295.278,371.85l-36.848-27.675c-5.359-4.026-12.417-4.667-18.414-1.671c-5.998,2.996-9.724,9.022-9.724,15.727v55.354c0,6.705,3.726,12.73,9.723,15.727c2.507,1.253,5.2,1.87,7.875,1.87c3.726,0,7.421-1.196,10.54-3.54l36.848-27.676c4.462-3.351,7.022-8.476,7.023-14.056C302.301,380.327,299.742,375.203,295.278,371.85z M286.229,387.917l-36.848,27.676c-1.079,0.812-2.113,0.498-2.631,0.239c-0.518-0.259-1.389-0.896-1.389-2.246v-55.354c0-1.351,0.87-1.988,1.389-2.246c0.268-0.135,0.674-0.282,1.151-0.282c0.447,0,0.957,0.13,1.48,0.521l36.848,27.676c0.874,0.654,1.004,1.538,1.004,2.007C287.232,386.377,287.102,387.261,286.229,387.917z"/></g></g><g><g><path d="M260.948,298.007c-48.469,0-87.901,39.432-87.901,87.901s39.432,87.901,87.901,87.901c48.469,0,87.901-39.432,87.901-87.901S309.417,298.007,260.948,298.007z M260.948,458.741c-40.16,0-72.833-32.672-72.833-72.833s32.672-72.833,72.833-72.833s72.833,32.672,72.833,72.833S301.108,458.741,260.948,458.741z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> <span>{this.props.textContent ? this.props.textContent : 'Videos\nLibrary'}</span></h4>
          
          <Modal
            isOpen={this.state.modalIsOpen}
            onAfterOpen={this.afterOpenModal}
            onRequestClose={this.closeModal}
            style={customStyles}
            contentLabel="Videos Modal"
            overlayClassName="generic_modal"
          >
  
            <h2 ref={subtitle => this.subtitle = subtitle}>Videos Library
            <span className="modal_btn pull-right">
                <button className="btn clos-btn" onClick={this.closeModal}>X</button>
              </span>
            </h2>
            <div className="modal_inner">
              <Tabs>
              <div className="Upload_image">
                <Dropzone accept=".mp4,.ogv,.webm,.ogg,.mov" className="video-dropzone dz-buttonshape">Upload Videos <i className="fa fa-upload"></i></Dropzone>
                <div className="modal_search">
                        <i className="fa fa-search"></i> <input className="" type="text" placeholder="Search here ..." />
                </div>
                <button className="btn Delete_btn_video" disabled={true}><i className="fa fa-trash"></i></button>
                <button className="addToPageBtn"  onClick={(event) => { this.closeModal(); addVideosToPage();}}>Add to Site <i className="fa fa-plus-circle"></i></button>
                   
              </div>
                <TabList className="modal_top_tabs">
                  <Tab onClick={() => { this.loadMyVideos(); $('.Delete_btn_video').prop('disabled', true);}} className="my-videos-modal">My Videos</Tab>
                  <Tab onClick={() => { this.loadFreeVideos(); $('.Delete_btn_video').prop('disabled', true); }} className="free-from-controlpanda-video-modal">Free Videos</Tab>
                 
                </TabList>
                <TabPanel>
                  <div className="dropzone-loader">
                      <div id="my_videos_container"></div>
                  </div>
                </TabPanel>
                <TabPanel>
                  <Tabs>
                    <div className="row">
                      <div className="col-md-3">
                        <div className="Left_Inner_Tabs_wrap">
                        <TabList className="Left_Inner_Tabs">
                            <Tab className="">All</Tab>
                            {this.state.freeVideosCat.map((cats) => (
                        typeof this.state.freeCatVideosParts[cats.id] == "undefined"  ? "" : 
                        <Tab key={'tabvideo'+cats.id} className="">{cats.name}</Tab>
                        ))}
                        </TabList>
                        </div>
                      </div>
                      <div className="col-md-9">
                        <TabPanel>
                            <InfiniteScroll
                                dataLength={this.state.freeVideosParts.length}
                                next={() => this.fetchMoreData()}
                                hasMore={this.state.hasMore}
                                loader={<b>Loading...</b>}
                                height={500}
                            >
                                {this.state.freeVideosParts.map((video) => (
                                <div className="video-holder" data-video={window.baseURL+'/uploads/videos/'+video.file_name} key={video.id}>
                                    <i className="fa fa-check imageChecked" aria-hidden="true"></i>
                                    <img alt="" src={window.baseURL+'/uploads/videos/thumbnails/'+video.thumb} />
                                </div>
                                ))}
                            </InfiniteScroll>
                        </TabPanel>
                       {
                        this.state.freeVideosCat.map((cats) => (
                          typeof this.state.freeCatVideosParts[cats.id] == "undefined"  ? "" : 
                            <TabPanel key={'tabpanel'+cats.id}>
                                <InfiniteScroll
                                dataLength={this.state.freeCatVideosParts[cats.id].length}
                                next={() => this.fetchMoreCatData(cats.id)}
                                hasMore={this.state.hasMoreCatVideo[cats.id]}
                                loader={<b>Loading...</b>}
                                height={500}
                            >
                                {
                                typeof this.state.freeCatVideosParts[cats.id] == "undefined"  ? "" : this.state.freeCatVideosParts[cats.id].map((video) => (
                                <div data-video={window.baseURL+'/uploads/videos/'+video.file_name} className="video-holder" key={'cat-video'+video.id}>
                                    <img alt="" src={window.baseURL+'/uploads/videos/thumbnails/'+video.thumb} />
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
              </Tabs>
                 
            </div>
          </Modal>
        </div>
      );
    }
  } export default ModalVideos;