import MainView from './MainView';
import React from 'react';
import Inspector from './Inspector';
import agent from '../../agent';
import { connect } from 'react-redux';
import {
HOME_PAGE_LOADED,
        HOME_PAGE_UNLOADED,
        APPLY_TAG_FILTER
} from '../../constants/actionTypes';

class Home extends React.Component {
    
    render() {
        return (
                <div className="home-page">
                    <div className="page">
                        <Inspector />
                        <MainView />
                    </div>
                </div>
                );
    }
}

export default (Home);
