import React from 'react'
import ReactDOM from 'react-dom'
import Modal from 'react-modal'
import 'react-dropdown/style.css'

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

class ConfirmationModal extends React.Component {
    constructor() {
      super();
      this.state = {
        modalIsOpen: true
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
          <Modal
            isOpen={this.state.modalIsOpen}
            onAfterOpen={this.afterOpenModal}
            onRequestClose={this.closeModal}
            style={customStyles}
            contentLabel="Delete Modal"
            overlayClassName="delete_modal"
          >
            <h2 ref={subtitle => this.subtitle = subtitle}>Delete Page
              <span className="modal_btn pull-right">
                <button className="btn" onClick={this.closeModal}>X</button>
              </span>
            </h2>
            <div className="modal_inner">
              <div className="Upload_image Upload_font">
                <div className="row">
                  <div className="col-md-4">
                    <img src="/images/delete_modal_img.png" />
                  </div>
                  <div className="col-md-9">
                    <p>Are you sure you want to delete this page?</p>
                  </div>
                </div>
              </div>
              <div className="modal_bottom_btn">
                <button className="btn" onClick={this.closeModal} >Cancel</button>
                <button className="btn" onClick={()=>{this.props.confirmDel(this.props.placeholder); this.closeModal();}}>Delete</button>
              </div>
            </div>
          </Modal>
      );
    }
  } export default ConfirmationModal;