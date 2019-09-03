import React from 'react'
import ReactDOM from 'react-dom'
import Modal from 'react-modal'
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs'
import Dropdown from 'react-dropdown'
import 'react-dropdown/style.css'
import InfiniteScroll from 'react-infinite-scroll-component'
import Dropzone from 'react-dropzone'


$("body").on('click', '.deleteableUploadedSvgs', function()
{
  setTimeout(function()
  {
    console.log("$('.deleteableUploadedSvgs.imageSelector').length");
    console.log($('.deleteableUploadedSvgs.imageSelector').length);
    if($('.deleteableUploadedSvgs.imageSelector').length> 0)
    {
      $('.Delete_btn_svg').prop('disabled', false);
    }
    else
    {
      $('.Delete_btn_svg').prop('disabled', true);
    }
  },100)
});
$('body').on('click', '.Delete_btn_svg', function()
{
  
  var vectorIdsToDelete = [];
  $('.deleteableUploadedSvgs.imageSelector').each(function()
  {
    vectorIdsToDelete.push($(this).attr('data-id'));
  });
  new Noty(
    {
      timeout: 2500,
        text: 'Deleting the SVG(s).',
        theme:'metroui',
        type:'info'
    }).show();
  setTimeout(function(){
    $.ajax({
      url: window.baseURL+'/api/images/deleteUserSvgs',
      type: 'POST',
      data: {'vectorIds' : vectorIdsToDelete},
      cache: false,
      dataType: 'json',
      success: function(response){
        new Noty(
          {
            timeout: 2500,
              text: 'Deleted the SVG(s).',
              theme:'metroui',
              type:'success'
          }).show();
        $('.deleteableUploadedSvgs.imageSelector').remove();
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
var mySvgs;
$(document).on('change','.svg-dropzone input[type=file]', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
  var data = new FormData();
  new Noty(
    {
      timeout: 2500,
        text: 'Uploading the SVG(s).',
        theme:'metroui',
        type:'info'
    }).show();
  $.each(files, function(key, value)
    {
        data.append(key, value);
    });
    $.ajax({
      url: window.baseURL+'/api/images/upload-svgs',
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
              text: 'Uploaded the SVG(s).',
              theme:'metroui',
              type:'success'
          }).show();
        var html ='';
        $.each(data.all_svgs,function(key,value){
          html = html+ '<div class="svg-holder deleteableUploadedSvgs" data-id="'+value.id+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+data.destinationPath+'/'+value.file_name+'" /> </div>';
        });
        $("#my_svgs_container").html(html);
      }
  });
}

const addVectorsToPage = (user, err) => {
  var scrollTop = $(window).scrollTop();
  var scrollLeft = $(window).scrollLeft();
  var windowWidth = $(window).width();
  var windowHeight = $(window).height();
  var calculatedTop = Math.max(0, ((windowHeight - 500) / 2) + scrollTop);
  var calculatedLeft = Math.max(0, ((windowWidth - 500) / 2) + scrollLeft);
  var sizeAdditive = 0;
  
  $('.imageSelector').each(function(index, element)
  {
    var thisUrl = $(this).find("img").attr("src");
    var ajax = new XMLHttpRequest();
    ajax.open("GET", thisUrl, true);
    ajax.send();
    ajax.onload = function(e) {
      var addedComponent = $('<div width="114px" height="200px" class="componentElement vectorArt-wrap yellow_lady">'+ajax.responseText+'</div>');

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
            "width":"250px"
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
    }
  });
  window.newElement =false;
}

class ModalVector extends React.Component {
    constructor() {
      super();
      this.state = {
        modalIsOpen: false,
        freeSvgs: [],
        freeCatSvgs: [],
        freeSvgsCat: [],
        freeSvgsParts: [],
        freeCatSvgsParts: [],
        startCatSvg:[],
        endCatSvg:[],
        hasMoreCatSvg:[],
        start: 0,
        limit: 40,
        freeSvgsLoaded: false,
        error: null,
        hasMore:true,
      };
      this.openModal = this.openModal.bind(this);
      this.afterOpenModal = this.afterOpenModal.bind(this);
      this.closeModal = this.closeModal.bind(this);
    }

    componentDidMount() {
      $.ajax({
        url: window.baseURL+'/api/images/users-svgs',
        type: 'get',
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data)
        {
          mySvgs = data;
        }
    });


      
    }
    loadFreeSvgs() {  
      var currentState = this;
      if (!this.state.freeSvgsLoaded) {
        fetch(window.baseURL+"/api/images/cp-all-svg-categories",{credentials: 'include'})
          .then(res => res.json())
          .then(
            (result) => {
              var startCatSvg =[],endCatSvg=[],hasMoreCatSvg=[];
              result.forEach(function(key,index){
                startCatSvg[key.id] = 0;
                endCatSvg[key.id] = 40;
                hasMoreCatSvg[key.id] = true;
              });
              currentState.setState({
                freeSvgsCat: result,
                startCatSvg: startCatSvg,
                endCatSvg: endCatSvg,
                hasMoreCatSvg: hasMoreCatSvg
              });
            },
            (error) => {
              currentState.setState({
                error
              });
            }
          )
        fetch(window.baseURL+"/api/images/cp-all-svgs",{credentials: 'include'})
          .then(res => res.json())
          .then(
            (result) => {
              var freeCatSvgsParts= [];
              var freeCatSvgs=[];
              result.cat_svgs.forEach(function(key,index){
                freeCatSvgs[key.id] = key.svgs;
                freeCatSvgsParts[key.id] = key.svgs.slice(currentState.state.startCatSvg[key.id], currentState.state.endCatSvg[key.id]);
              });
              currentState.setState({
                freeSvgsLoaded: true,
                freeSvgs: result.all_svgs,
                freeCatSvgs: freeCatSvgs,
                freeSvgsParts: result.all_svgs.slice(currentState.state.start, currentState.state.limit),
                freeCatSvgsParts: freeCatSvgsParts
              });
            },
            (error) => {
              currentState.setState({
                freeSvgsLoaded: true,
                error
              });
            }
          )
      }
    }

    fetchMoreData() {
      var old_end = this.state.limit;
      this.setState({ limit: old_end + 40 });
      this.setState({ freeSvgsParts: this.state.freeSvgs.slice(this.state.start, this.state.limit) });
      if(this.state.freeSvgs.length <= this.state.limit){
        this.setState({ hasMore: false });
      }
    }

    fetchMoreCatData(id) {
      var old_end_cat = this.state.endCatSvg;
      old_end_cat[id] = old_end_cat[id] +40;
      this.setState({ endCatSvg: old_end_cat });
      if(typeof this.state.freeCatSvgs[id] == undefined)
      {
        var freeCatSvgsParts = this.state.freeCatSvgsParts;
        freeCatSvgsParts[id] = this.state.freeCatSvgs[id].slice(this.state.startCatSvg[id], this.state.endCatSvg[id]);
        this.setState({ freeCatSvgsParts: freeCatSvgsParts});

        if(this.state.freeCatSvgs[id].length <= this.state.endCatSvg[id]){
          var hasMoreCatSvg = this.state.hasMoreCatSvg;
          hasMoreCatSvg[id] = false;
          this.setState({ hasMoreCatSvg: hasMoreCatSvg });
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
        $.each(mySvgs.all_svgs,function(key,value){
          html = html+ '<div class="svg-holder deleteableUploadedSvgs" data-id="'+value.id+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+mySvgs.destinationPath+'/'+value.file_name+'" /> </div>';
        });
        $("#my_svgs_container").html(html);
      },500);
    }

    loadMySvgs(){
      setTimeout(function(){
        var html ='';
        $.each(mySvgs.all_svgs,function(key,value){
          html = html+ '<div class="svg-holder deleteableUploadedSvgs" data-id="'+value.id+'"><i class="fa fa-check imageChecked" aria-hidden="true"></i><img alt="" src="'+mySvgs.destinationPath+'/'+value.file_name+'" /> </div>';
        });
        $("#my_svgs_container").html(html);
      },500);
    }



    closeModal() {
      this.setState({ modalIsOpen: false });
    }
  
    render() {
      return (
        <div onClick={this.openModal}>
          <h4 className="upload-h4s"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xmlSpace="preserve"><g><g><path d="M512,71.596c0-13.719-5.344-26.617-15.044-36.317c-20.025-20.025-52.608-20.024-72.634,0l-1.512,1.511c-0.001,0.002-0.003,0.003-0.005,0.005c-0.003,0.003-0.006,0.007-0.01,0.01l-44.12,44.12c-0.001,0.002-0.003,0.003-0.005,0.005c-0.003,0.003-0.006,0.007-0.01,0.01L255.388,204.213c-30.172-6-61.756,3.433-83.649,25.324c-28.553,28.553-26.538,55.759-24.59,82.069c1.551,20.939,3.154,42.592-8.937,69.176c-1.291,2.837-1.185,6.114,0.287,8.861c1.472,2.748,4.141,4.652,7.217,5.15c17.396,2.816,33.728,4.222,48.975,4.222c46.161,0,82.372-12.885,108.006-38.518c0.146-0.146,0.284-0.296,0.428-0.443c0.271-0.252,0.529-0.517,0.77-0.796c21.028-21.833,30.014-52.797,24.126-82.409l168.935-168.935C506.656,98.212,512,85.315,512,71.596z M161.296,376.828c8.83-25.735,7.23-47.336,5.798-66.699c-0.875-11.814-1.632-22.123-0.073-31.955c0.044-0.025,0.089-0.043,0.133-0.069c0.121-0.071,12.506-6.971,26.356-2.348c12.121,4.049,22.293,15.723,30.234,34.699c12.804,30.6,31.909,43.202,45.682,48.384c0.833,0.314,1.654,0.598,2.468,0.868C244.969,376.884,207.917,382.632,161.296,376.828z M291.675,343.029c-8.688,0.036-33.979-3.239-49.484-40.291c-10.265-24.533-24.513-39.992-42.348-45.949c-8.468-2.828-16.488-3.032-23.248-2.157c2.503-3.588,5.552-7.221,9.285-10.955c17.644-17.644,43.323-24.969,67.578-19.434l54.532,54.533C313.184,301.55,307.045,325.576,291.675,343.029z M317.042,259.545l-44.352-44.352l31.942-31.942l44.352,44.352L317.042,259.545z M363.125,213.461l-44.352-44.352l33.69-33.69c-0.366,3.336-0.57,6.706-0.57,10.109c0,21.491,7.391,41.853,20.96,58.204L363.125,213.461z M387.084,189.503c-9.838-12.512-15.191-27.832-15.191-43.975c0-19.047,7.428-36.965,20.917-50.455l3.789-3.789c-0.366,3.336-0.57,6.706-0.57,10.109c-0.001,21.491,7.39,41.853,20.959,58.205L387.084,189.503z M431.218,145.368c-9.838-12.512-15.191-27.832-15.191-43.975c0-19.048,7.429-36.968,20.92-50.458l1.517-1.517c0.705-0.705,1.439-1.37,2.197-1.998c-2.689,24.401,4.569,48.878,20.464,68.04L431.218,145.368z M482.815,93.771l-7.469,7.469c-13.538-17.223-18.406-39.573-13.142-60.968c7.789,0.38,15.058,3.594,20.61,9.147c5.924,5.924,9.187,13.799,9.187,22.175C492.001,79.971,488.739,87.848,482.815,93.771z"/></g></g><g><g><path d="M407.051,248.931c-1.859-1.86-4.439-2.93-7.068-2.93c-2.63,0-5.21,1.07-7.069,2.93s-2.93,4.44-2.93,7.069c0,2.63,1.069,5.21,2.93,7.069c1.861,1.86,4.44,2.93,7.069,2.93c2.63,0,5.21-1.07,7.068-2.93c1.86-1.86,2.931-4.44,2.931-7.069C409.982,253.37,408.912,250.79,407.051,248.931z"/></g></g><g><g><path d="M202.837,50.946c-1.86-1.86-4.44-2.93-7.069-2.93s-5.21,1.07-7.068,2.93c-1.861,1.86-2.931,4.44-2.931,7.069c0,2.63,1.071,5.21,2.931,7.069c1.859,1.86,4.439,2.93,7.068,2.93s5.209-1.07,7.069-2.93c1.861-1.86,2.93-4.44,2.93-7.069C205.766,55.385,204.696,52.806,202.837,50.946z"/></g></g><g><g><path d="M461.787,435.986h-51.806V296.997c0-5.523-4.478-9.999-9.999-9.999c-5.522,0-9.999,4.477-9.999,9.999v138.989H121.991c-5.522,0-9.999,4.477-9.999,9.999c0,25.362-20.634,45.996-45.996,45.996s-45.997-20.634-45.997-45.996V68.014h133.711c5.522,0,9.999-4.477,9.999-9.999s-4.478-9.999-9.999-9.999H19.998V20.018h369.995v10.217c0,5.523,4.478,9.999,9.999,9.999c5.522,0,9.999-4.477,9.999-9.999V10.019c0-5.523-4.478-9.999-9.999-9.999H9.999C4.478,0.02,0,4.496,0,10.019v435.967c0,35.266,27.804,64.16,62.642,65.911c0.427,0.055,0.861,0.084,1.303,0.084h341.846c36.39,0,65.995-29.605,65.995-65.995C471.786,440.463,467.309,435.986,461.787,435.986z M405.791,491.982H113.276c9.373-9.632,15.838-22.11,17.958-35.997h319.459C446.114,476.554,427.72,491.982,405.791,491.982z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> <span>SVG's<br/>Library</span></h4> 
          <Modal
            isOpen={this.state.modalIsOpen}
            onAfterOpen={this.afterOpenModal}
            onRequestClose={this.closeModal}
            style={customStyles}
            contentLabel="Vector Art Modal"
            overlayClassName="generic_modal"
          >
  
            <h2 ref={subtitle => this.subtitle = subtitle}>SVG's Library
            <span className="modal_btn pull-right">
                <button className="btn clos-btn" onClick={this.closeModal}>X</button>
              </span>
            </h2>
  
            <div className="modal_inner">
              <Tabs>
              <div className="Upload_image">
                <Dropzone  accept=".svg" className="svg-dropzone dz-buttonshape">
                          Upload SVG <i className="fa fa-upload"></i>
                </Dropzone>
                    <div className="modal_search">
                        <i className="fa fa-search"></i> <input className="" type="text" placeholder="Search here ..." />
                    </div>
                    <button className="btn Delete_btn_svg" disabled={true}><i className="fa fa-trash"></i></button>
                    <button className="addToPageBtn"  onClick={(event) => { this.closeModal(); addVectorsToPage();}}>Add to Site <i className="fa fa-plus-circle"></i></button>
                </div>
                <TabList className="modal_top_tabs">
                  <Tab onClick={() => { this.loadMySvgs(); $('.Delete_btn_svg').prop('disabled', true); }} className="my-images-modal">My SVG's</Tab>
                  <Tab onClick={() => { this.loadFreeSvgs(); $('.Delete_btn_svg').prop('disabled', true); }} className="free-from-controlpanda-vector-modal">Free SVG's</Tab>
                </TabList>
                <TabPanel>
                  <div className="dropzone-loader">
                    <div id="my_svgs_container"></div>
                  </div>
                </TabPanel>
  
                <TabPanel>
                  <Tabs>
                      <Tabs>
                        <div className="row">
                          <div className="col-md-3">
                            <div className="Left_Inner_Tabs_wrap">
                              <TabList className="Left_Inner_Tabs">
                                <Tab className="">All</Tab>
                                {this.state.freeSvgsCat.map((cats) => (
                              typeof this.state.freeCatSvgsParts[cats.id] == "undefined"  ? "" : 
                              <Tab key={'tabsvg'+cats.id} className="">{cats.name}</Tab>
                            ))}
                              </TabList>
                            </div>
                          </div>
  
                          <div className="col-md-9">
                          <TabPanel>
                          <InfiniteScroll
                            dataLength={this.state.freeSvgsParts.length}
                            next={() => this.fetchMoreData()}
                            hasMore={this.state.hasMore}
                            loader={<b>Loading...</b>}
                            height={500}
                          >
                            {this.state.freeSvgsParts.map((svg) => (
                              <div className="svg-holder" key={svg.id}>
                                <i className="fa fa-check imageChecked" aria-hidden="true"></i>
                                <img alt="" src={window.baseURL+'/uploads/svgs/'+svg.file_name} />
                              </div>
                            ))}
                          </InfiniteScroll>
                        </TabPanel>
                       {
                        this.state.freeSvgsCat.map((cats) => (
                          typeof this.state.freeCatSvgsParts[cats.id] == "undefined"  ? "" : 
                              <TabPanel key={'tabpanel'+cats.id}>
                              <InfiniteScroll
                            dataLength={this.state.freeCatSvgsParts[cats.id].length}
                            next={() => this.fetchMoreCatData(cats.id)}
                            hasMore={this.state.hasMoreCatSvg[cats.id]}
                            loader={<b>Loading...</b>}
                            height={500}
                          >
                            {
                              typeof this.state.freeCatSvgsParts[cats.id] == "undefined"  ? "" : this.state.freeCatSvgsParts[cats.id].map((svg) => (
                              <div className="svg-holder" key={'cat-svg'+svg.id}>
                                <img alt="" src={window.baseURL+'/uploads/svgs/'+svg.file_name} />
                              </div>
                            ))}
                          </InfiniteScroll>
                              </TabPanel>
                        ))
                      }
                          </div>
                        </div>
                      </Tabs>
                  </Tabs>
                </TabPanel>
              </Tabs>
            </div>
          </Modal>
        </div>
      );
    }
  } export default ModalVector;