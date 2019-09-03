import React from 'react'
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs'
import Dropdown from 'react-dropdown'

const selectLanguage = [
    'English', 'German', 'Spanish', 'French', 'Italian', 'Korean', 'Japanese'
  ]
const defaultLanguage = selectLanguage[0]

class ExtraPanel extends React.Component {
  constructor(props) {
    super(props);
  }
    render() {
      return (
        <div>
          <Tabs>
            <div className="panel-header">
              Panel Header
              <span className="modal_btn pull-right">
                <button className="btn" ><i className="fa fa-question"></i></button>
                <button className="btn" onClick={this.props.onHideExtraPanel}><i className="fa fa-chevron-left"></i></button>
              </span>
            </div>
            <TabList>
              <Tab>Page Info</Tab>
              <Tab>Layouts</Tab>
              <Tab>Permissions</Tab>
              <Tab>SEO (Google)</Tab>
            </TabList>
            <TabPanel>
              <div className="">
                <h5>What is a Thank you page?</h5>
                <p>This is your thank you page.Your customers will see a personalized thank you message and their shipping details after they complete the checkout process.</p>
                <h5 className="mt_20">How does it behave?</h5>
                <p>This is page is displayed only after checkout and is not visible on your site menu.</p>
              </div>  
            </TabPanel>
            <TabPanel>
              <div className="layout_tiles">
                <ul>
                  <li>
                    <div className="custom_radio">
                      <input type="radio" name="layout_radio" id="layout_radio01"/>
                      <label htmlFor="layout_radio01"></label>
                    </div>
                    <div className="img_wrap">
                      <img width="140" src="/images/lcd01.png" />
                    </div>  
                    <div className="layout_device">
                      <div className="layout_device_decrip">
                          <h4>Standard</h4>
                          <p>Standard pages have a header at the top and a footer at the bottom</p>
                      </div>
                    </div>
                  </li>
                  <hr/>
                  <li>
                    <div className="custom_radio">
                      <input type="radio" name="layout_radio" id="layout_radio02"/>
                      <label htmlFor="layout_radio02"></label>
                    </div>
                    <div className="img_wrap">
                      <img width="140" src="/images/lcd02.png" />
                    </div>  
                    <div className="layout_device">
                      <div className="layout_device_decrip">
                          <h4>No Header & Footer</h4>
                          <p>This page is a little different. Headers, footers and element set to 'Show on All Pages' arn't displayed.<br/>
                          <a href="">Learn more</a>
                          </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </TabPanel>
            <TabPanel>
              <div className="permission_tabs">
                <p>Who can view this page?</p>
                <Tabs>
                  <TabList>
                    <Tab>
                      <img width="70" src="/images/globe_on_stand.png" />
                      <hr className="mrg_hr"/>
                      <p>Everyone</p>
                    </Tab>
                    <Tab>
                      <img width="70" src="/images/key.png" />
                      <hr className="mrg_hr"/>
                      <p>Password Holders</p>
                    </Tab>
                    <Tab>
                      <img width="70" src="/images/human_resource.png" />
                      <hr className="mrg_hr"/>
                      <p>Members Only</p>
                    </Tab>
                  </TabList>
                  <TabPanel>
                    <p className="mt_15">Everyone can view this page. <a href="#">Learn more</a></p>
                    <hr/>
                  </TabPanel>
                  <TabPanel>
                    <p className="mt_15">Visitors with a password can view this page. <a href="#">Learn more</a></p>
                    <hr/>
                    <p>What's the page's password?</p>
                    <div className="input-group input-group-sm mb-3">
                      <input type="text" className="form-control" placeholder="Set a passsword"/>
                      <div className="input-group-prepend">
                        <span className="input-group-text">!</span>
                      </div>
                    </div>
                    <hr/>
                    <p>What language is the login screen in?</p>
                    <Dropdown className="language_option" options={selectLanguage} onChange={this._onSelect} value={defaultLanguage} placeholder="Sort By" />
                  </TabPanel>
                  <TabPanel>
                    <p className="mt_15">Visitors need to sign up to see this page. <a href="#">Learn more</a></p>
                    <hr/>
                    <p>What language is the login screen in?</p>
                    <Dropdown className="language_option" options={selectLanguage} onChange={this._onSelect} value={defaultLanguage} placeholder="Sort By" />
                    <hr/>
                    <a href="#"><i className="fa fa-users"></i> Member signup settings</a>
                  </TabPanel>
                </Tabs>  
              </div>  
            </TabPanel>
            <TabPanel>
              <p>This page is not visible to Search Engines.</p>
              <p>Want to track visits to this page with a pixel? <a href="#">Learn how.</a></p>
            </TabPanel>
          </Tabs>
        </div>
      )
    }
  } export default ExtraPanel;