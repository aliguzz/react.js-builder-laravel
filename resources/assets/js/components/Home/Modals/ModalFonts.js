import React from 'react'
import ReactDOM from 'react-dom'
import Modal from 'react-modal'
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs'
import Dropdown from 'react-dropdown'
import 'react-dropdown/style.css'
import InfiniteScroll from 'react-infinite-scroll-component'

const sortOptions = [
  'A-Z', 'Z-A', 'Newest', 'Oldest'
]
const categoryOptions = [
  'Blog', 'Designer', 'Restaurants', 'Events', 'Portfolio & CV', 'Accommodation', 'Bussiness', 'Online Stroe', 'Photography', 'Music', 'Other'
]
const defaultCategory = categoryOptions[0]
const defaultSortOption = sortOptions[2]

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



class ModalFonts extends React.Component {
    constructor() {
      super();
      this.state = {
        modalIsOpen: false
      };
      this.openModal = this.openModal.bind(this);
      this.afterOpenModal = this.afterOpenModal.bind(this);
      this.closeModal = this.closeModal.bind(this);
    }
    openModal() {
      this.setState({ modalIsOpen: true });
    }
    afterOpenModal() {
      this.subtitle.style.color = '#f00';
    }
    closeModal() {
      this.setState({ modalIsOpen: false });
    }
  
    render() {
      return (
        <div className="row" onClick={this.openModal}>
          <div className="col-md-3 image-img">
            <img alt="" width="80" src="http://wfarm3.dataknet.com/static/resources/icons/set20/f02a62985fb4.png" />
          </div>
          <div className="col-md-6 image-txt">
            <h4>Fonts</h4>
          </div>
          <div className="col-md-3 image-icon">
            <button className="btn"><i className="fa fa-chevron-right"></i></button>
          </div>
          <Modal
            isOpen={this.state.modalIsOpen}
            onAfterOpen={this.afterOpenModal}
            onRequestClose={this.closeModal}
            style={customStyles}
            contentLabel="Fonts Modal"
            overlayClassName="generic_modal"
          >
  
            <h2 ref={subtitle => this.subtitle = subtitle}>Manage your Fonts
            <span className="modal_btn pull-right">
                <button className="btn clos-btn" onClick={this.closeModal}>X</button>
              </span>
            </h2>
  
            <div className="modal_inner">
              <div className="Upload_image Upload_font">
                <div className="row">
                  <div className="col-md-9">
                    <p>
                      Upload fornts inTTF, OTF, WOFF or WOFF2.
                    </p>
                  </div>
                  <div className="col-md-3">
                    <button className="btn upload_btn pull-right"><i className="fa fa-upload"></i> Upload Fonts</button>
                  </div>
                </div>
              </div>
              <div className="fonts_body">
                Upload Fonts
              </div>
              <div className="modal_bottom_btn">
                <button className="">Close</button>
              </div>
            </div>
          </Modal>
        </div>
      );
    }
  } export default ModalFonts;