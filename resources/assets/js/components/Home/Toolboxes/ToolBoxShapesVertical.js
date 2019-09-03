import React from 'react';
import _ from 'lodash';

const addImagesToPage = (event) => {
  var item = event.target;
  
  var index = item.getAttribute('data-index');
  var elementClickedHtml = window.shapesVerticalarray[index].html;
  var addedComponent = editor.getComponents().add(elementClickedHtml);
  addedComponent.addClass('componentElement');
  addedComponent.attributes.attributes.componentUniqueAttribute = 'componentUniqueAttribute'+window.incrementalValueForAttribute;
  addedComponent.addClass('componentUniqueAttribute'+window.incrementalValueForAttribute);
  var scrollTop = $(window).scrollTop();
  var scrollLeft = $(window).scrollLeft();
  var windowWidth = $(window).width();
  var windowHeight = $(window).height();
  var currentlyAddedElement = $('iframe').contents().find('html').find('body').find('.componentUniqueAttribute'+window.incrementalValueForAttribute);
  var currentlyAddedElementWidth = currentlyAddedElement.width();
  var currentlyAddedElementHeight = currentlyAddedElement.height();
  var calculatedTop = Math.max(0, ((windowHeight - currentlyAddedElementHeight) / 2) + scrollTop);
  var calculatedLeft = Math.max(0, ((windowWidth - currentlyAddedElementWidth) / 2) + scrollLeft);
  window.incrementalValueForAttribute++;
  addedComponent.setStyle(
  {
      "z-index": window.zIndex,
      "top": calculatedTop,
      "position": "absolute",
      "left": calculatedLeft
  });
  window.zIndex++;
  window.newElement =false;
}

export default class ToolBoxShapesVertical extends React.Component {
  render() {
    const {imgUrl, container} =  this.props;

    var divStyle = {
      position: 'relative',
      backgroundImage: 'url(' + imgUrl + ')',
      backgroundRepeat: 'no-repeat',
      backgroundSize:'contain',
      width: container.style.width,
      height: container.style.height
    };

    var containerWidth = container.style && container.style.width;
    window.shapesVerticalarray = container.boxes;
    return (
      <div style={divStyle}>
        {
          _.map(container.boxes, function (item, index) {
            var itemStyle = _.clone(item.style);
            itemStyle.borderWidth = 1;
            itemStyle.minWidth = item.style.width || containerWidth;
              itemStyle.minHeight = item.style.height;
            itemStyle.width = item.style.width || containerWidth;
            itemStyle.height = item.style.height;
            itemStyle.position = 'absolute';
            itemStyle[':hover'] = {
              backgroundColor: 'lightblue',
              opacity: 0.5
            };
         
            return (<div className="singleElementDragger" onDragStart={(event) => {
              var item = event.target;
              var index = item.getAttribute('data-index');
              var text = window.shapesVerticalarray[index].html;
             
                item.style['heigth'] = $(text).attr("height")+'px';
                item.style['width'] = $(text).attr("width")+'px';
              event.dataTransfer.setData("text", text);
              window.dataDragged = text;
          }} onClick={(event) => { addImagesToPage(event) }} draggable="true" data-index={index} key={'tool' + index} style={itemStyle} onMouseOver={(e)=> {
                      var item = e.target;
                      item.style['background-color'] = 'lightblue';
                      item.style['opacity'] = 0.5;
                      item.style['width'] =item.style['min-width'];
                      item.style['height'] = item.style['min-height'];
                      }}
                      onMouseOut={(e)=> {
                      var item = e.target;
                      item.style['background-color'] = 'transparent';
                      item.style['opacity'] = 1;
                      }}></div>)
          }, this)}
      </div>

    )
  }
}