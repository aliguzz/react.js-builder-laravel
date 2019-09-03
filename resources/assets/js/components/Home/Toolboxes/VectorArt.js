import React from 'react';
import _ from 'lodash';

export default class VectorArt extends React.Component {
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
      window.VectorArtArray = container.boxes;
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
                var text = window.VectorArtArray[index].html;
                item.style['heigth'] = $(text).attr("height")+'px';
                item.style['width'] = $(text).attr("width")+'px';
                event.dataTransfer.setData("text", text);
                window.dataDragged = text;
            }} draggable="true" data-index={index} key={'tool' + index} style={itemStyle} onMouseOver={(e)=> {
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