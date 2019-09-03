import React from 'react'
import ReactDOM from 'react-dom'
import Modal from 'react-responsive-modal';
import 'react-dropdown/style.css'
import $ from 'jquery';

const styles = {
    fontFamily: 'sans-serif',
    textAlign: 'center',
    display: 'inline'
}

class ModalFeedback extends React.Component {
    constructor() {
      super();
      this.state = {
        openFeedbackModal: false
      };
      this.openGetFeedbackModal = this.openGetFeedbackModal.bind(this);
      this.onCloseGetFeedbackModal= this.onCloseGetFeedbackModal.bind(this);
    }

    openGetFeedbackModal() {
      this.setState({ openFeedbackModal: true });
    }

    onCloseGetFeedbackModal(){
        this.setState({
            openFeedbackModal: false
        });
    }

    componentDidMount(){
        this.setState({
            openFeedbackModal : this.props.openModal,
        });
    }

    viewFeedbacks(){
        var projectDetail = this.props.pd;
        var link = window.baseURL+'/view-feedbacks/'+projectDetail.project.model.name;
        var win = window.open(link, '_blank');
        win.focus();
      }
    
      copyFeedbackLink(){
        var projectDetail = this.props.pd;
        var link = window.baseURL+'/get-feedback/'+projectDetail.project.model.name;
        const el = document.createElement('textarea');
        el.value = link;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        swal({
            title: "Success!",
            text: "Coppied to clipboard successfully!",
            type: "success",
            showConfirmButton: false,
            buttons: false,
            timer: 3000,
          });
      }
    
      
    render() {
      return (
        <div className="row">
        {this.state.openFeedbackModal ?  
         <Modal
         style={styles}
         open={this.state.openFeedbackModal}
         onClose={this.onCloseGetFeedbackModal}
         contentLabel="Example Modal"
         overlayClassName="overLay-publish_modal"
         >
           <div className="modal-header">
               <div className="center-data">
                   <h4>Get Feedback</h4>
               </div>
               <div className="col-md-12 center-data">
                   <p>See your latest comments. or share with more people</p>
               </div>
           </div>
           <div className="get_feedback_inner">
               <div className="get_feedback_tiles" onClick={() => { this.viewFeedbacks() }}>
                 <img alt="" width="25" src="/images/chat.png"/>
                 <span>Read your comments</span>                  
                 <i className="fa fa-chevron-right"></i>
                 <i className="fa fa-share-square-o"></i>
               </div> 
               <div className="get_feedback_tiles" onClick={() => { this.copyFeedbackLink() }}>
                 <img alt="" width="25" src="/images/share.png"/>
                 <span>Share your site</span>                  
                 <i className="fa fa-chevron-right"></i>
                 <i className="fa fa-share-square-o"></i>
               </div>                    
           </div>
           {/*<div className="get_feedback_bottom">
             <button className="btn theme_btn">Maybe Later</button>
        </div>*/}
         </Modal>
        : ""}
        </div>
      );
    }
  } export default ModalFeedback;