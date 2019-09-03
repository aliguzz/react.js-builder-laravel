
import React from 'react'
import FontAwesome from 'react-fontawesome'
import { PopupMenu, PopupTable } from 'react-rectangle-popup-menu'

const showPopupButton = (<FontAwesome name="ellipsis-h" />);

class Popup extends React.Component {
    constructor(props) {
      super(props);
    }

  render() {
    return (
      <div>
        <PopupMenu width={190} direction="right" button={showPopupButton}>
          <PopupTable rowItems={1}>
            <div className="PopupTable_item_inner rename">
              <FontAwesome name="text-width" />
              <span onClick={()=>this.props.renameMenu(false, this.props.id)} >Retitle</span>
            </div>
            <div className="PopupTable_item_inner duplicate" >
              <FontAwesome name="files-o" />
              <span onClick={()=>this.props.duplicateMenu(this.props.tabName, this.props.className)} >Clone</span>
            </div>
            <div className="PopupTable_item_inner menu-del">
              <FontAwesome name="trash" />
              <span onClick={()=>this.props.deleteMenu(this.props.id)} >Remove</span>
            </div>  
           
          </PopupTable>
        </PopupMenu>
      </div>
    )
  }
} export default Popup;