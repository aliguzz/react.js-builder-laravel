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

function formatDate(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + " " + strTime;
  }

class ModalSiteHistory extends React.Component {
    constructor() {
      super();
      this.state = {
        openSiteHistoryModal: false,
        siteHistory:[]
      };
      this.openSiteHistoryModal = this.openSiteHistoryModal.bind(this);
      this.onCloseSiteHistoryModal = this.onCloseSiteHistoryModal.bind(this);
    }

    openSiteHistoryModal(){
        this.setState({
            openSiteHistoryModal : true,
        });
    }

    onCloseSiteHistoryModal(){
        this.setState({
            openSiteHistoryModal : false,
        });
    }

    componentDidMount(){
        this.setState({
            openSiteHistoryModal : this.props.openModal,
        });
        fetch(window.baseURL+"/api/projects/getHistory", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            credentials: 'include',
            body: JSON.stringify({
                projectId:window.projectId
            })
            }).then(res => res.json())
            .then(
              (result) => {
                this.setState({
                    siteHistory : result.log,
                });
            },
            (error) => {
               console.log(error);
            });
    }
    handleClick(){
        this.setState({
            openSiteHistoryModal : false,
        });
    }
      
    render() {
      return (
        <div className="row">
            {this.state.openSiteHistoryModal ?  
                <Modal
                    style={styles}
                    open={this.state.openSiteHistoryModal}
                    onClose={this.onCloseSiteHistoryModal}
                    contentLabel="Example Modal"
                    overlayClassName="overLay-publish_modal"
                >
                    <div className="modal-header">
                        <div className="center-data">
                            <h4>Site Change log</h4>
                        </div>
                    </div>
                    <div className="site_history">
                        <div className="img_wrap">
                            <img alt="" width="200" src="/images/clock.png"/>
                        </div>
                        <div className="dtl">
                            { (this.state.siteHistory.length) ?
                                this.state.siteHistory.map((data, key) => (
                                    <div className="row" key={'his'+key}>
                                        <div className="col-md-8" key={'his1'+key}>
                                        {data.user_name} {data.message}
                                        </div>
                                        <div className="col-md-4" key={'his2'+key}>
                                        <i className="fa fa-clock-o"></i> {formatDate(new Date(data.updated_at))}
                                        </div>
                                    </div>
                                )) : ''
                            }
                            
                        </div>                          
                    </div>
                    <div className="text-right pad_15">
                        <button className="btn theme_btn" onClick={() => {this.handleClick()}}>Close</button>
                    </div>
                </Modal>
            : ""}
        </div>
      );
    }
  } export default ModalSiteHistory;