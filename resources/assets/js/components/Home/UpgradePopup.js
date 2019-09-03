import React from 'react'
import { PopupMenu } from 'react-rectangle-popup-menu'

const upgrade_popup = ("Upgrade to Accept Payments");
class UpgradePopup extends React.Component {
    render() {
      return (
        <PopupMenu width={300} direction="down" button={upgrade_popup}>
            <div className="upgrade_accept_popover">
              <div className="row">
                <div className="col-md-7">
                  <h4>Upgrade to Accept Online Payment </h4>
                  <p> When you're ready to start taking payment on your site,upgrade to a Control Panda Bookings Premium Plan.</p>
                  <button className="btn theme_btn">Upgrade</button>
                </div>  
                <div className="col-md-5">
                  <img src="/images/open-giftBox.png"/>
                </div>
              </div>  
            </div>  
        </PopupMenu>
      )
    }
  } export default UpgradePopup;