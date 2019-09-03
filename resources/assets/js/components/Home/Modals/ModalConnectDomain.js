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

class ModalConnectDomain extends React.Component {
    constructor() {
      super();
      this.state = {
        openDomainModal: false,
        domains: [],
        selectedDomain:0,
      };
      this.openDomainModal = this.openDomainModal.bind(this);
      this.onCloseDomainModal= this.onCloseDomainModal.bind(this);
    }

    openDomainModal() {
      this.setState({ openDomainModal: true });
    }
    
    onCloseDomainModal(){
        this.setState({
            openDomainModal: false
        });
    }

    componentDidMount(){
        this.setState({
            openDomainModal : this.props.openModal,
            domains: this.props.dat
        });
    }
      
    render() {
      return (
        <div className="row">
        {this.state.openDomainModal ?  
          <Modal
            style={styles}
            open={this.state.openDomainModal}
            onClose={this.onCloseDomainModal}
            contentLabel="Connect Domain"
            overlayClassName="overLay-publish_modal"
          >
          <div className="modal-header">
              <div className="center-data">
                  <h4>Connect Domain</h4>
              </div>
          </div>
          <div className="domain_modal_inner">
              <div className="publish_site save_modal">
              {'hello world'+this.state.selectedDomain}
                  <select defaultValue={this.state.selectedDomain} className="form-control" id="domains_list">
                  { (this.state.domains.length) ?
                  this.state.domains.map((domain) => (
                      <option key={'domainOption'+domain.id} value={domain.id}>{domain.name}</option>
                  )) : ''
                  }
                  </select>
              </div>
          </div>
          <div className="publish_modal_bottom">
              <button type="submit" className="btn theme_btn" onClick={() => { this.connectDomainSubmit() }}>Done</button>
          </div>
        </Modal>
        : ""}
        </div>
      );
    }
  } export default ModalConnectDomain;