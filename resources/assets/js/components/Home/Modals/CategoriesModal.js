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


class CategoriesModal extends React.Component {
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
        <span onClick={this.openModal}>
            <span>Blog <button className="btn"><i className="fa fa-chevron-down"></i></button></span>
          <Modal
            isOpen={this.state.modalIsOpen}
            onAfterOpen={this.afterOpenModal}
            onRequestClose={this.closeModal}
            style={customStyles}
            contentLabel="Tracks Modal"
            overlayClassName="find_appModal"
          >
            <div className="modal_head">
              <h2 ref={subtitle => this.subtitle = subtitle}>
                <span className="modal_btn pull-right">
                  <button className="btn" onClick={this.closeModal}>X</button>
                </span>
              </h2>
              <img src="/images/download.png"/>
            </div>  
              <div className="modal_inner">
                <h3>Find the Right Apps for Your Site</h3>
                <div>
                  <span>What kind of website do you have?</span>
                </div>
                <Dropdown className="docDisplay" options={categoryOptions} onChange={this._onSelect} value={defaultCategory} />
                <button className="btn theme_btn"> View Apps </button>
                <div className="close_btn">
                  <button onClick={this.closeModal}> Cancel </button>
                  </div>  
              </div>
          </Modal>
        </span>
      );
    }
  } export default CategoriesModal;