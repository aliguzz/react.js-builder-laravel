import React from 'react';
import Popup from './Popup';
import { ADDPROJECTDETAIL} from '../../constants/actionTypes';
import { connect } from 'react-redux';
import ConfirmationModal from './Modals/ConfirmationModal';

const mapStateToProps = state => {
  return {
      common: state.common
  }};

const mapDispatchToProps = dispatch => ({
  addProjectDetail: (data) => dispatch({ type: ADDPROJECTDETAIL , payload:{projectDetail:data}})
});

class AppendMenu extends React.Component{

    constructor(props) {
      super(props);
      this.enterFunction = this.enterFunction.bind(this);
      this.OnHideMenu = this.OnHideMenu.bind(this);
      this.OnDeleteMenu = this.OnDeleteMenu.bind(this);
      this.ConfirmDelete = this.ConfirmDelete.bind(this);
      this.onBlurInput = this.onBlurInput.bind(this);
      this.onAddSubMenu = this.onAddSubMenu.bind(this);

      this.state = {
        del : true,
        modal_state : false,
        hideMenu : false,
        myid:'',
        showPopup : false
      }
    }
  
    OnRenameMenu(readOnly,id) {
      this.props.renameMenu(readOnly, id)
    }  
    
    enterFunction(event){
      if(event.keyCode === 13) {
        this.props.pressEnterAfterRename(event.target.placeholder,event.target.value);
        event.target.value = "";
      }
    }
  
    OnHideMenu(id){
      this.props.onhideMenu(id);
    }
  
    OnDeleteMenu(id){
      this.setState({
        modal_state : true
      });
    }

    ConfirmDelete(data){
      this.props.deletePage(data);
    }

    onAddFolder(tname, cname){
      this.props.addFolder(tname, cname);
    }

    onAddSubMenu(id,name, item){
      this.props.addSubpage(id, name, item);
    }

    onAddMainMenu(id,name, item){
      this.props.addToMainMenu(id, name, item);
    }

    onBlurInput(event){
      this.props.blurInput(event.target.placeholder,event.target.value);
      event.target.value = "";
    }

    showPopup(){
      this.setState({
        showPopup : true
      });
    }
    loadPage(index){
      if(this.props.readOnly){
        var project = this.props.common.projectDetail.project;
       var current_this = this;
       current_this.props.addProjectDetail(
            {
                project: project,
                currentPage: project.pages[index],
                projectId:this.props.common.projectDetail.projectId,
                currentPageIndex: index,
                device:this.props.common.projectDetail.device,
                has_blog:this.props.common.projectDetail.has_blog
            }
        );
        window.projectId = this.props.common.projectDetail.projectId;
        window.currentPage = project.pages[index];
        window.CurrentPages = index;
        $("#mainEditorFrame").attr("src", window.baseURL+"/storage/temp_projects/"+project.model.users["0"].id+"/"+project.model.uuid+"/"+this.props.common.projectDetail.device+"/"+project.pages[index]+".html");
        setTimeout(function(){
            var anchor_html = '';
            var simple_html = '';
            window.ProjectPages.forEach(function(key,index){
                if(index == window.CurrentPages){
                    var _class = "active";
                    var _class2 = "checked";
                }else{
                    var _class = "";
                    var _class2 = "";
                }
                simple_html += "<li data-item=\""+(window.zIndex++)+"\" class=\""+_class+"\"><a class='componentElement' href=\""+key+".html\" data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/a><\/li>";
                anchor_html += "<div class=\"checkbox\" data-item=\""+(window.zIndex++)+"\"> <input class='componentElement' type=\"checkbox\" "+_class2+" value=\""+key+"\" id=\"check-"+index+"\" data-item=\""+(window.zIndex++)+"\"> <label class='componentElement' for=\"check-"+index+"\" data-item=\""+(window.zIndex++)+"\"><span data-item=\""+(window.zIndex++)+"\">"+key.replace(new RegExp("_", 'g'), " ")+"<\/span><\/label><\/div>";
            });
            $('#playground-editor iframe').contents().find('html').find(".dynamic-menu").html(simple_html);
            $('#playground-editor iframe').contents().find('html').find(".dynamic-menu-anchor").html(anchor_html);
        },1000);
      }
    }
    render(){
      return(        
          
            <li className="SubMenu_wrap" style={{ display: this.state.del ? 'block' : 'none' }}>
              <div className="pages-tiles">
                <input type="text" 
                  id={this.props.id}
                  className={this.props.className} 
                  placeholder={this.props.placeholder} 
                  onKeyDown={this.enterFunction} 
                  onBlur={this.onBlurInput} 
                  onClick={() => { this.loadPage(this.props.dataIndex) }}
                  readOnly={this.props.readOnly === false && this.props.id === this.props.myid ? false  : true} 
                />
                <div className="page_right_btn" >
                
                  <Popup 
                    hideMenuCallBack={()=>this.OnHideMenu(id)} 
                    deleteMenu={(id)=>this.OnDeleteMenu(id)} 
                    tabName={this.props.tabName} 
                    className={this.props.className}
                    id={this.props.id}
                    isMain={this.props.isMain}
                    isSub={this.props.isSub}
                    mainMenu={this.props.mainMenu}
                    renameMenu={(readOnly, id)=>this.OnRenameMenu(readOnly, id)} 
                    duplicateMenu={(tname, cname)=>this.props.duplicatePage(tname, cname)} 
                    val_hide={this.props.hideMenu} 
                    addsubmenu={(id, name, item)=>this.onAddSubMenu(id, name, item)} 
                    onHideExtraPanel={this.props.onHideExtraPanel}
                  /> 
                </div>
              </div>
              {this.state.modal_state ? <ConfirmationModal confirmDel={(data)=>this.ConfirmDelete(this.props.placeholder)} /> : ""}
            </li>
      )
    }
  }
  export default connect(mapStateToProps, mapDispatchToProps)(AppendMenu);