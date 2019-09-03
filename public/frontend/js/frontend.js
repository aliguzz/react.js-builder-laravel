
/* /web/static/src/js/watch.js defined in bundle 'website.assets_frontend' */
(function(){if(!Object.prototype.watch){Object.defineProperty(Object.prototype,"watch",{enumerable:false,configurable:true,writable:false,value:function(prop,handler){var
oldval=this[prop],newval=oldval,getter=function(){return newval;},setter=function(val){oldval=newval;return newval=handler.call(this,prop,oldval,val);};if(delete this[prop]){Object.defineProperty(this,prop,{get:getter,set:setter,enumerable:true,configurable:true});}}});}
if(!Object.prototype.unwatch){Object.defineProperty(Object.prototype,"unwatch",{enumerable:false,configurable:true,writable:false,value:function(prop){var val=this[prop];delete this[prop];this[prop]=val;}});}})();;

/* /website/static/src/js/website.js defined in bundle 'website.assets_frontend' */
(function(){"use strict";var browser;if($.browser.webkit)browser="webkit";else if($.browser.safari)browser="safari";else if($.browser.opera)browser="opera";else if($.browser.msie||($.browser.mozilla&&+$.browser.version.replace(/^([0-9]+\.[0-9]+).*/,'\$1')<20))browser="msie";else if($.browser.mozilla)browser="mozilla";browser+=","+$.browser.version;if(/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()))browser+=",mobile";document.documentElement.setAttribute('data-browser',browser);var website={};openerp.website=website;website.translatable=!!$('html').data('translatable');website.get_context=function(dict){var html=document.documentElement;return _.extend({lang:html.getAttribute('lang').replace('-','_'),website_id:html.getAttribute('data-website-id')|0},dict);};website.parseQS=function(qs){var match,params={},pl=/\+/g,search=/([^&=]+)=?([^&]*)/g;while((match=search.exec(qs))){var name=decodeURIComponent(match[1].replace(pl," "));var value=decodeURIComponent(match[2].replace(pl," "));params[name]=value;}
return params;};var parsedSearch;website.parseSearch=function(){if(!parsedSearch){parsedSearch=website.parseQS(window.location.search.substring(1));}
return parsedSearch;};website.parseHash=function(){return website.parseQS(window.location.hash.substring(1));};website.reload=function(){location.hash="scrollTop="+window.document.body.scrollTop;if(location.search.indexOf("enable_editor")>-1){window.location.href=window.location.href.replace(/enable_editor(=[^&]*)?/g,'');}else{window.location.reload();}};website.prompt=function(options){if(typeof options==='string'){options={text:options};}
options=_.extend({window_title:'',field_name:'','default':'',init:function(){}},options||{});var type=_.intersection(Object.keys(options),['input','textarea','select']);type=type.length?type[0]:'text';options.field_type=type;options.field_name=options.field_name||options[type];var def=$.Deferred();var dialog=$(openerp.qweb.render('website.prompt',options)).appendTo("body");options.$dialog=dialog;var field=dialog.find(options.field_type).first();field.val(options['default']);field.fillWith=function(data){if(field.is('select')){var select=field[0];data.forEach(function(item){select.options[select.options.length]=new Option(item[1],item[0]);});}else{field.val(data);}};var init=options.init(field,dialog);$.when(init).then(function(fill){if(fill){field.fillWith(fill);}
dialog.modal('show');field.focus();dialog.on('click','.btn-primary',function(){var backdrop=$('.modal-backdrop');def.resolve(field.val(),field,dialog);dialog.remove();backdrop.remove();});});dialog.on('hidden.bs.modal',function(){var backdrop=$('.modal-backdrop');def.reject();dialog.remove();backdrop.remove();});if(field.is('input[type="text"], select')){field.keypress(function(e){if(e.which==13){e.preventDefault();dialog.find('.btn-primary').trigger('click');}});}
return def;};website.error=function(data,url){var $error=$(openerp.qweb.render('website.error_dialog',{'title':data.data?data.data.arguments[0]:"",'message':data.data?data.data.arguments[1]:data.statusText,'backend_url':url}));$error.appendTo("body");$error.modal('show');};website.form=function(url,method,params){var form=document.createElement('form');form.setAttribute('action',url);form.setAttribute('method',method);_.each(params,function(v,k){var param=document.createElement('input');param.setAttribute('type','hidden');param.setAttribute('name',k);param.setAttribute('value',v);form.appendChild(param);});document.body.appendChild(form);form.submit();};website.init_kanban=function($kanban){$('.js_kanban_col',$kanban).each(function(){var $col=$(this);var $pagination=$('.pagination',$col);if(!$pagination.size()){return;}
var page_count=$col.data('page_count');var scope=$pagination.last().find("li").size()-2;var kanban_url_col=$pagination.find("li a:first").attr("href").replace(/[0-9]+$/,'');var data={'domain':$col.data('domain'),'model':$col.data('model'),'template':$col.data('template'),'step':$col.data('step'),'orderby':$col.data('orderby')};$pagination.on('click','a',function(ev){ev.preventDefault();var $a=$(ev.target);if($a.parent().hasClass('active')){return;}
var page=+$a.attr("href").split(",").pop().split('-')[1];data['page']=page;$.post('/website/kanban',data,function(col){$col.find("> .thumbnail").remove();$pagination.last().before(col);});var page_start=page-parseInt(Math.floor((scope-1)/2),10);if(page_start<1)page_start=1;var page_end=page_start+(scope-1);if(page_end>page_count)page_end=page_count;if(page_end-page_start<scope){page_start=page_end-scope>0?page_end-scope:1;}
$pagination.find('li.prev a').attr("href",kanban_url_col+(page-1>0?page-1:1));$pagination.find('li.next a').attr("href",kanban_url_col+(page<page_end?page+1:page_end));for(var i=0;i<scope;i++){$pagination.find('li:not(.prev):not(.next):eq('+i+') a').attr("href",kanban_url_col+(page_start+i)).html(page_start+i);}
$pagination.find('li.active').removeClass('active');$pagination.find('li:has(a[href="'+kanban_url_col+page+'"])').addClass('active');});});};var templates_def=$.Deferred().resolve();website.add_template_file=function(template){templates_def=templates_def.then(function(){var def=$.Deferred();openerp.qweb.add_template(template,function(err){if(err){def.reject(err);}else{def.resolve();}});return def;});};website.add_template_file('/website/static/src/xml/website.xml');website.dom_ready=$.Deferred();$(document).ready(function(){website.dom_ready.resolve();if($.fn.placeholder)$('input, textarea').placeholder();});website.if_dom_contains=function(selector,fn){website.dom_ready.then(function(){var elems=$(selector);if(elems.length){fn(elems);}});};var all_ready=null;website.ready=function(){if(!all_ready){all_ready=website.dom_ready.then(function(){return templates_def;}).then(function(){if(!!$('[data-oe-model]').size()){$("#oe_editzone").show();$("#oe_editzone button").show();}
if($('html').data('website-id')){website.id=$('html').data('website-id');website.session=new openerp.Session();return openerp.jsonRpc('/website/translations','call',{'lang':website.get_context().lang}).then(function(trans){openerp._t.database.set_bundle(trans);});}}).then(function(){var templates=openerp.qweb.templates;var keys=_.keys(templates);for(var i=0;i<keys.length;i++){treat_node(templates[keys[i]]);}}).promise();}
return all_ready;};function treat_node(node){if(node.nodeType===3){if(node.nodeValue.match(/\S/)){var text_value=$.trim(node.nodeValue);var spaces=node.nodeValue.split(text_value);node.nodeValue=spaces[0]+openerp._t(text_value)+spaces[1];}}
else if(node.nodeType===1&&node.hasChildNodes()){_.each(node.childNodes,function(subnode){treat_node(subnode);});}};website.inject_tour=function(){};website.dom_ready.then(function(){$(document).on('click','.js_publish_management .js_publish_btn',function(){var $data=$(this).parents(".js_publish_management:first");var self=this;openerp.jsonRpc($data.data('controller')||'/website/publish','call',{'id':+$data.data('id'),'object':$data.data('object')}).then(function(result){$data.toggleClass("css_unpublished css_published");$data.parents("[data-publish]").attr("data-publish",+result?'on':'off');}).fail(function(err,data){website.error(data,'/web#return_label=Website&model='+$data.data('object')+'&id='+$data.data('id'));});});if(!$('.js_change_lang').length){var links=$('ul.js_language_selector li a:not([data-oe-id])');var m=$(_.min(links,function(l){return $(l).attr('href').length;})).attr('href');links.each(function(){var t=$(this).attr('href');var l=(t===m)?"default":t.split('/')[1];$(this).data('lang',l).addClass('js_change_lang');});}
$(document).on('click','.js_change_lang',function(e){e.preventDefault();var self=$(this);var redirect={lang:self.data('lang'),url:encodeURIComponent(self.attr('href')),hash:encodeURIComponent(location.hash)};location.href=_.str.sprintf("/website/lang/%(lang)s?r=%(url)s%(hash)s",redirect);});$('.js_kanban').each(function(){website.init_kanban(this);});setTimeout(function(){if(window.location.hash.indexOf("scrollTop=")>-1){window.document.body.scrollTop=+location.hash.match(/scrollTop=([0-9]+)/)[1];}},0);var $collapse=$('#oe_applications ul.dropdown-menu').clone().attr("id","oe_applications_collapse").attr("class","nav navbar-nav navbar-left navbar-collapse collapse");$('#oe_applications').before($collapse);$collapse.wrap('<div class="visible-xs"/>');$('[data-target="#oe_applications"]').attr("data-target","#oe_applications_collapse");});openerp.Tour.autoRunning=false;website.ready().then(function(){setTimeout(openerp.Tour.running,0);});return website;})();;

/* /website/static/src/js/website.snippets.animation.js defined in bundle 'website.assets_frontend' */
(function(){'use strict';var website=openerp.website;if(!website.snippet)website.snippet={};website.snippet.readyAnimation=[];website.snippet.start_animation=function(editable_mode,$target){for(var k in website.snippet.animationRegistry){var Animation=website.snippet.animationRegistry[k];var selector="";if(Animation.prototype.selector){if(selector!="")selector+=", "
selector+=Animation.prototype.selector;}
if($target){if($target.is(selector))selector=$target;else continue;}
$(selector).each(function(){var $snipped_id=$(this);if(!$snipped_id.parents("#oe_snippets").length&&!$snipped_id.parent("body").length&&!$snipped_id.data("snippet-view")){website.snippet.readyAnimation.push($snipped_id);$snipped_id.data("snippet-view",new Animation($snipped_id,editable_mode));}});}};website.snippet.stop_animation=function(){$(website.snippet.readyAnimation).each(function(){var $snipped_id=$(this);if($snipped_id.data("snippet-view")){$snipped_id.data("snippet-view").stop();}});};$(document).ready(function(){website.snippet.start_animation();});website.snippet.animationRegistry={};website.snippet.Animation=openerp.Class.extend({selector:false,$:function(){return this.$el.find.apply(this.$el,arguments);},init:function(dom,editable_mode){this.$el=this.$target=$(dom);this.start(editable_mode);},start:function(){},stop:function(){},});website.snippet.animationRegistry.slider=website.snippet.Animation.extend({selector:".carousel",start:function(){this.$target.carousel({interval:10000});},stop:function(){this.$target.carousel('pause');this.$target.removeData("bs.carousel");},});website.snippet.animationRegistry.parallax=website.snippet.Animation.extend({selector:".parallax",start:function(){var self=this;setTimeout(function(){self.set_values();});this.on_scroll=function(){var speed=parseFloat(self.$target.attr("data-scroll-background-ratio")||0);if(speed==1)return;var offset=parseFloat(self.$target.attr("data-scroll-background-offset")||0);var top=offset+window.scrollY*speed;self.$target.css("background-position","0px "+top+"px");};this.on_resize=function(){self.set_values();};$(window).on("scroll",this.on_scroll);$(window).on("resize",this.on_resize);},stop:function(){$(window).off("scroll",this.on_scroll).off("resize",this.on_resize);},set_values:function(){var self=this;var speed=parseFloat(self.$target.attr("data-scroll-background-ratio")||0);if(speed===1||this.$target.css("background-image")==="none"){this.$target.css("background-attachment","fixed").css("background-position","0px 0px");return;}else{this.$target.css("background-attachment","scroll");}
this.$target.attr("data-scroll-background-offset",0);var img=new Image();img.onload=function(){var offset=0;var padding=parseInt($(document.body).css("padding-top"));if(speed>1){var inner_offset=-self.$target.outerHeight()+this.height/this.width*document.body.clientWidth;var outer_offset=self.$target.offset().top-(document.body.clientHeight-self.$target.outerHeight())-padding;offset=-outer_offset*speed+inner_offset;}else{offset=-self.$target.offset().top*speed;}
self.$target.attr("data-scroll-background-offset",offset>0?0:offset);$(window).scroll();};img.src=this.$target.css("background-image").replace(/url\(['"]*|['"]*\)/g,"");$(window).scroll();}});website.snippet.animationRegistry.share=website.snippet.Animation.extend({selector:".oe_share",start:function(){var url=encodeURIComponent(window.location.href);var title=encodeURIComponent($("title").text());this.$target.find("a").each(function(){var $a=$(this);var url_regex=/\{url\}|%7Burl%7D/,title_regex=/\{title\}|%7Btitle%7D/;$a.attr("href",$(this).attr("href").replace(url_regex,url).replace(title_regex,title));if($a.attr("target")&&$a.attr("target").match(/_blank/i)){$a.click(function(){window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=550,width=600');return false;});}});},});website.snippet.animationRegistry.media_video=website.snippet.Animation.extend({selector:".media_iframe_video",start:function(){this.$target.html('<div class="css_editable_mode_display">&nbsp;</div><iframe src="'+_.escape(this.$target.data("src"))+'" frameborder="0" allowfullscreen="allowfullscreen"></iframe>');},});})();;

/* /web/static/lib/bootstrap/js/bootstrap.js defined in bundle 'website.assets_frontend' */
if(typeof jQuery==='undefined'){throw new Error('Bootstrap\'s JavaScript requires jQuery')}
+function($){'use strict';function transitionEnd(){var el=document.createElement('bootstrap')
var transEndEventNames={WebkitTransition:'webkitTransitionEnd',MozTransition:'transitionend',OTransition:'oTransitionEnd otransitionend',transition:'transitionend'}
for(var name in transEndEventNames){if(el.style[name]!==undefined){return{end:transEndEventNames[name]}}}
return false}
$.fn.emulateTransitionEnd=function(duration){var called=false
var $el=this
$(this).one('bsTransitionEnd',function(){called=true})
var callback=function(){if(!called)$($el).trigger($.support.transition.end)}
setTimeout(callback,duration)
return this}
$(function(){$.support.transition=transitionEnd()
if(!$.support.transition)return
$.event.special.bsTransitionEnd={bindType:$.support.transition.end,delegateType:$.support.transition.end,handle:function(e){if($(e.target).is(this))return e.handleObj.handler.apply(this,arguments)}}})}(jQuery);+function($){'use strict';var dismiss='[data-dismiss="alert"]'
var Alert=function(el){$(el).on('click',dismiss,this.close)}
Alert.VERSION='3.2.0'
Alert.prototype.close=function(e){var $this=$(this)
var selector=$this.attr('data-target')
if(!selector){selector=$this.attr('href')
selector=selector&&selector.replace(/.*(?=#[^\s]*$)/,'')}
var $parent=$(selector)
if(e)e.preventDefault()
if(!$parent.length){$parent=$this.hasClass('alert')?$this:$this.parent()}
$parent.trigger(e=$.Event('close.bs.alert'))
if(e.isDefaultPrevented())return
$parent.removeClass('in')
function removeElement(){$parent.detach().trigger('closed.bs.alert').remove()}
$.support.transition&&$parent.hasClass('fade')?$parent.one('bsTransitionEnd',removeElement).emulateTransitionEnd(150):removeElement()}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.alert')
if(!data)$this.data('bs.alert',(data=new Alert(this)))
if(typeof option=='string')data[option].call($this)})}
var old=$.fn.alert
$.fn.alert=Plugin
$.fn.alert.Constructor=Alert
$.fn.alert.noConflict=function(){$.fn.alert=old
return this}
$(document).on('click.bs.alert.data-api',dismiss,Alert.prototype.close)}(jQuery);+function($){'use strict';var Button=function(element,options){this.$element=$(element)
this.options=$.extend({},Button.DEFAULTS,options)
this.isLoading=false}
Button.VERSION='3.2.0'
Button.DEFAULTS={loadingText:'loading...'}
Button.prototype.setState=function(state){var d='disabled'
var $el=this.$element
var val=$el.is('input')?'val':'html'
var data=$el.data()
state=state+'Text'
if(data.resetText==null)$el.data('resetText',$el[val]())
$el[val](data[state]==null?this.options[state]:data[state])
setTimeout($.proxy(function(){if(state=='loadingText'){this.isLoading=true
$el.addClass(d).attr(d,d)}else if(this.isLoading){this.isLoading=false
$el.removeClass(d).removeAttr(d)}},this),0)}
Button.prototype.toggle=function(){var changed=true
var $parent=this.$element.closest('[data-toggle="buttons"]')
if($parent.length){var $input=this.$element.find('input')
if($input.prop('type')=='radio'){if($input.prop('checked')&&this.$element.hasClass('active'))changed=false
else $parent.find('.active').removeClass('active')}
if(changed)$input.prop('checked',!this.$element.hasClass('active')).trigger('change')}
if(changed)this.$element.toggleClass('active')}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.button')
var options=typeof option=='object'&&option
if(!data)$this.data('bs.button',(data=new Button(this,options)))
if(option=='toggle')data.toggle()
else if(option)data.setState(option)})}
var old=$.fn.button
$.fn.button=Plugin
$.fn.button.Constructor=Button
$.fn.button.noConflict=function(){$.fn.button=old
return this}
$(document).on('click.bs.button.data-api','[data-toggle^="button"]',function(e){var $btn=$(e.target)
if(!$btn.hasClass('btn'))$btn=$btn.closest('.btn')
Plugin.call($btn,'toggle')
e.preventDefault()})}(jQuery);+function($){'use strict';var Carousel=function(element,options){this.$element=$(element).on('keydown.bs.carousel',$.proxy(this.keydown,this))
this.$indicators=this.$element.find('.carousel-indicators')
this.options=options
this.paused=this.sliding=this.interval=this.$active=this.$items=null
this.options.pause=='hover'&&this.$element.on('mouseenter.bs.carousel',$.proxy(this.pause,this)).on('mouseleave.bs.carousel',$.proxy(this.cycle,this))}
Carousel.VERSION='3.2.0'
Carousel.DEFAULTS={interval:5000,pause:'hover',wrap:true}
Carousel.prototype.keydown=function(e){switch(e.which){case 37:this.prev();break
case 39:this.next();break
default:return}
e.preventDefault()}
Carousel.prototype.cycle=function(e){e||(this.paused=false)
this.interval&&clearInterval(this.interval)
this.options.interval&&!this.paused&&(this.interval=setInterval($.proxy(this.next,this),this.options.interval))
return this}
Carousel.prototype.getItemIndex=function(item){this.$items=item.parent().children('.item')
return this.$items.index(item||this.$active)}
Carousel.prototype.to=function(pos){var that=this
var activeIndex=this.getItemIndex(this.$active=this.$element.find('.item.active'))
if(pos>(this.$items.length-1)||pos<0)return
if(this.sliding)return this.$element.one('slid.bs.carousel',function(){that.to(pos)})
if(activeIndex==pos)return this.pause().cycle()
return this.slide(pos>activeIndex?'next':'prev',$(this.$items[pos]))}
Carousel.prototype.pause=function(e){e||(this.paused=true)
if(this.$element.find('.next, .prev').length&&$.support.transition){this.$element.trigger($.support.transition.end)
this.cycle(true)}
this.interval=clearInterval(this.interval)
return this}
Carousel.prototype.next=function(){if(this.sliding)return
return this.slide('next')}
Carousel.prototype.prev=function(){if(this.sliding)return
return this.slide('prev')}
Carousel.prototype.slide=function(type,next){var $active=this.$element.find('.item.active')
var $next=next||$active[type]()
var isCycling=this.interval
var direction=type=='next'?'left':'right'
var fallback=type=='next'?'first':'last'
var that=this
if(!$next.length){if(!this.options.wrap)return
$next=this.$element.find('.item')[fallback]()}
if($next.hasClass('active'))return(this.sliding=false)
var relatedTarget=$next[0]
var slideEvent=$.Event('slide.bs.carousel',{relatedTarget:relatedTarget,direction:direction})
this.$element.trigger(slideEvent)
if(slideEvent.isDefaultPrevented())return
this.sliding=true
isCycling&&this.pause()
if(this.$indicators.length){this.$indicators.find('.active').removeClass('active')
var $nextIndicator=$(this.$indicators.children()[this.getItemIndex($next)])
$nextIndicator&&$nextIndicator.addClass('active')}
var slidEvent=$.Event('slid.bs.carousel',{relatedTarget:relatedTarget,direction:direction})
if($.support.transition&&this.$element.hasClass('slide')){$next.addClass(type)
$next[0].offsetWidth
$active.addClass(direction)
$next.addClass(direction)
$active.one('bsTransitionEnd',function(){$next.removeClass([type,direction].join(' ')).addClass('active')
$active.removeClass(['active',direction].join(' '))
that.sliding=false
setTimeout(function(){that.$element.trigger(slidEvent)},0)}).emulateTransitionEnd($active.css('transition-duration').slice(0,-1)*1000)}else{$active.removeClass('active')
$next.addClass('active')
this.sliding=false
this.$element.trigger(slidEvent)}
isCycling&&this.cycle()
return this}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.carousel')
var options=$.extend({},Carousel.DEFAULTS,$this.data(),typeof option=='object'&&option)
var action=typeof option=='string'?option:options.slide
if(!data)$this.data('bs.carousel',(data=new Carousel(this,options)))
if(typeof option=='number')data.to(option)
else if(action)data[action]()
else if(options.interval)data.pause().cycle()})}
var old=$.fn.carousel
$.fn.carousel=Plugin
$.fn.carousel.Constructor=Carousel
$.fn.carousel.noConflict=function(){$.fn.carousel=old
return this}
$(document).on('click.bs.carousel.data-api','[data-slide], [data-slide-to]',function(e){var href
var $this=$(this)
var $target=$($this.attr('data-target')||(href=$this.attr('href'))&&href.replace(/.*(?=#[^\s]+$)/,''))
if(!$target.hasClass('carousel'))return
var options=$.extend({},$target.data(),$this.data())
var slideIndex=$this.attr('data-slide-to')
if(slideIndex)options.interval=false
Plugin.call($target,options)
if(slideIndex){$target.data('bs.carousel').to(slideIndex)}
e.preventDefault()})
$(window).on('load',function(){$('[data-ride="carousel"]').each(function(){var $carousel=$(this)
Plugin.call($carousel,$carousel.data())})})}(jQuery);+function($){'use strict';var Collapse=function(element,options){this.$element=$(element)
this.options=$.extend({},Collapse.DEFAULTS,options)
this.transitioning=null
if(this.options.parent)this.$parent=$(this.options.parent)
if(this.options.toggle)this.toggle()}
Collapse.VERSION='3.2.0'
Collapse.DEFAULTS={toggle:true}
Collapse.prototype.dimension=function(){var hasWidth=this.$element.hasClass('width')
return hasWidth?'width':'height'}
Collapse.prototype.show=function(){if(this.transitioning||this.$element.hasClass('in'))return
var startEvent=$.Event('show.bs.collapse')
this.$element.trigger(startEvent)
if(startEvent.isDefaultPrevented())return
var actives=this.$parent&&this.$parent.find('> .panel > .in')
if(actives&&actives.length){var hasData=actives.data('bs.collapse')
if(hasData&&hasData.transitioning)return
Plugin.call(actives,'hide')
hasData||actives.data('bs.collapse',null)}
var dimension=this.dimension()
this.$element.removeClass('collapse').addClass('collapsing')[dimension](0)
this.transitioning=1
var complete=function(){this.$element.removeClass('collapsing').addClass('collapse in')[dimension]('')
this.transitioning=0
this.$element.trigger('shown.bs.collapse')}
if(!$.support.transition)return complete.call(this)
var scrollSize=$.camelCase(['scroll',dimension].join('-'))
this.$element.one('bsTransitionEnd',$.proxy(complete,this)).emulateTransitionEnd(350)[dimension](this.$element[0][scrollSize])}
Collapse.prototype.hide=function(){if(this.transitioning||!this.$element.hasClass('in'))return
var startEvent=$.Event('hide.bs.collapse')
this.$element.trigger(startEvent)
if(startEvent.isDefaultPrevented())return
var dimension=this.dimension()
this.$element[dimension](this.$element[dimension]())[0].offsetHeight
this.$element.addClass('collapsing').removeClass('collapse').removeClass('in')
this.transitioning=1
var complete=function(){this.transitioning=0
this.$element.trigger('hidden.bs.collapse').removeClass('collapsing').addClass('collapse')}
if(!$.support.transition)return complete.call(this)
this.$element
[dimension](0).one('bsTransitionEnd',$.proxy(complete,this)).emulateTransitionEnd(350)}
Collapse.prototype.toggle=function(){this[this.$element.hasClass('in')?'hide':'show']()}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.collapse')
var options=$.extend({},Collapse.DEFAULTS,$this.data(),typeof option=='object'&&option)
if(!data&&options.toggle&&option=='show')option=!option
if(!data)$this.data('bs.collapse',(data=new Collapse(this,options)))
if(typeof option=='string')data[option]()})}
var old=$.fn.collapse
$.fn.collapse=Plugin
$.fn.collapse.Constructor=Collapse
$.fn.collapse.noConflict=function(){$.fn.collapse=old
return this}
$(document).on('click.bs.collapse.data-api','[data-toggle="collapse"]',function(e){var href
var $this=$(this)
var target=$this.attr('data-target')||e.preventDefault()||(href=$this.attr('href'))&&href.replace(/.*(?=#[^\s]+$)/,'')
var $target=$(target)
var data=$target.data('bs.collapse')
var option=data?'toggle':$this.data()
var parent=$this.attr('data-parent')
var $parent=parent&&$(parent)
if(!data||!data.transitioning){if($parent)$parent.find('[data-toggle="collapse"][data-parent="'+parent+'"]').not($this).addClass('collapsed')
$this[$target.hasClass('in')?'addClass':'removeClass']('collapsed')}
Plugin.call($target,option)})}(jQuery);+function($){'use strict';var backdrop='.dropdown-backdrop'
var toggle='[data-toggle="dropdown"]'
var Dropdown=function(element){$(element).on('click.bs.dropdown',this.toggle)}
Dropdown.VERSION='3.2.0'
Dropdown.prototype.toggle=function(e){var $this=$(this)
if($this.is('.disabled, :disabled'))return
var $parent=getParent($this)
var isActive=$parent.hasClass('open')
clearMenus()
if(!isActive){if('ontouchstart'in document.documentElement&&!$parent.closest('.navbar-nav').length){$('<div class="dropdown-backdrop"/>').insertAfter($(this)).on('click',clearMenus)}
var relatedTarget={relatedTarget:this}
$parent.trigger(e=$.Event('show.bs.dropdown',relatedTarget))
if(e.isDefaultPrevented())return
$this.trigger('focus')
$parent.toggleClass('open').trigger('shown.bs.dropdown',relatedTarget)}
return false}
Dropdown.prototype.keydown=function(e){if(!/(38|40|27)/.test(e.keyCode))return
var $this=$(this)
e.preventDefault()
e.stopPropagation()
if($this.is('.disabled, :disabled'))return
var $parent=getParent($this)
var isActive=$parent.hasClass('open')
if(!isActive||(isActive&&e.keyCode==27)){if(e.which==27)$parent.find(toggle).trigger('focus')
return $this.trigger('click')}
var desc=' li:not(.divider):visible a'
var $items=$parent.find('[role="menu"]'+desc+', [role="listbox"]'+desc)
if(!$items.length)return
var index=$items.index($items.filter(':focus'))
if(e.keyCode==38&&index>0)index--
if(e.keyCode==40&&index<$items.length-1)index++
if(!~index)index=0
$items.eq(index).trigger('focus')}
function clearMenus(e){if(e&&e.which===3)return
$(backdrop).remove()
$(toggle).each(function(){var $parent=getParent($(this))
var relatedTarget={relatedTarget:this}
if(!$parent.hasClass('open'))return
$parent.trigger(e=$.Event('hide.bs.dropdown',relatedTarget))
if(e.isDefaultPrevented())return
$parent.removeClass('open').trigger('hidden.bs.dropdown',relatedTarget)})}
function getParent($this){var selector=$this.attr('data-target')
if(!selector){selector=$this.attr('href')
selector=selector&&/#[A-Za-z]/.test(selector)&&selector.replace(/.*(?=#[^\s]*$)/,'')}
var $parent=selector&&$(selector)
return $parent&&$parent.length?$parent:$this.parent()}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.dropdown')
if(!data)$this.data('bs.dropdown',(data=new Dropdown(this)))
if(typeof option=='string')data[option].call($this)})}
var old=$.fn.dropdown
$.fn.dropdown=Plugin
$.fn.dropdown.Constructor=Dropdown
$.fn.dropdown.noConflict=function(){$.fn.dropdown=old
return this}
$(document).on('click.bs.dropdown.data-api',clearMenus).on('click.bs.dropdown.data-api','.dropdown form',function(e){e.stopPropagation()}).on('click.bs.dropdown.data-api',toggle,Dropdown.prototype.toggle).on('keydown.bs.dropdown.data-api',toggle+', [role="menu"], [role="listbox"]',Dropdown.prototype.keydown)}(jQuery);+function($){'use strict';var Modal=function(element,options){this.options=options
this.$body=$(document.body)
this.$element=$(element)
this.$backdrop=this.isShown=null
this.scrollbarWidth=0
if(this.options.remote){this.$element.find('.modal-content').load(this.options.remote,$.proxy(function(){this.$element.trigger('loaded.bs.modal')},this))}}
Modal.VERSION='3.2.0'
Modal.DEFAULTS={backdrop:true,keyboard:true,show:true}
Modal.prototype.toggle=function(_relatedTarget){return this.isShown?this.hide():this.show(_relatedTarget)}
Modal.prototype.show=function(_relatedTarget){var that=this
var e=$.Event('show.bs.modal',{relatedTarget:_relatedTarget})
this.$element.trigger(e)
if(this.isShown||e.isDefaultPrevented())return
this.isShown=true
this.checkScrollbar()
this.$body.addClass('modal-open')
this.setScrollbar()
this.escape()
this.$element.on('click.dismiss.bs.modal','[data-dismiss="modal"]',$.proxy(this.hide,this))
this.backdrop(function(){var transition=$.support.transition&&that.$element.hasClass('fade')
if(!that.$element.parent().length){that.$element.appendTo(that.$body)}
that.$element.show().scrollTop(0)
if(transition){that.$element[0].offsetWidth}
that.$element.addClass('in').attr('aria-hidden',false)
that.enforceFocus()
var e=$.Event('shown.bs.modal',{relatedTarget:_relatedTarget})
transition?that.$element.find('.modal-dialog').one('bsTransitionEnd',function(){that.$element.trigger('focus').trigger(e)}).emulateTransitionEnd(300):that.$element.trigger('focus').trigger(e)})}
Modal.prototype.hide=function(e){if(e)e.preventDefault()
e=$.Event('hide.bs.modal')
this.$element.trigger(e)
if(!this.isShown||e.isDefaultPrevented())return
this.isShown=false
this.$body.removeClass('modal-open')
this.resetScrollbar()
this.escape()
$(document).off('focusin.bs.modal')
this.$element.removeClass('in').attr('aria-hidden',true).off('click.dismiss.bs.modal')
$.support.transition&&this.$element.hasClass('fade')?this.$element.one('bsTransitionEnd',$.proxy(this.hideModal,this)).emulateTransitionEnd(300):this.hideModal()}
Modal.prototype.enforceFocus=function(){$(document).off('focusin.bs.modal').on('focusin.bs.modal',$.proxy(function(e){if(this.$element[0]!==e.target&&!this.$element.has(e.target).length){this.$element.trigger('focus')}},this))}
Modal.prototype.escape=function(){if(this.isShown&&this.options.keyboard){this.$element.on('keyup.dismiss.bs.modal',$.proxy(function(e){e.which==27&&this.hide()},this))}else if(!this.isShown){this.$element.off('keyup.dismiss.bs.modal')}}
Modal.prototype.hideModal=function(){var that=this
this.$element.hide()
this.backdrop(function(){that.$element.trigger('hidden.bs.modal')})}
Modal.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove()
this.$backdrop=null}
Modal.prototype.backdrop=function(callback){var that=this
var animate=this.$element.hasClass('fade')?'fade':''
if(this.isShown&&this.options.backdrop){var doAnimate=$.support.transition&&animate
this.$backdrop=$('<div class="modal-backdrop '+animate+'" />').appendTo(this.$body)
this.$element.on('click.dismiss.bs.modal',$.proxy(function(e){if(e.target!==e.currentTarget)return
this.options.backdrop=='static'?this.$element[0].focus.call(this.$element[0]):this.hide.call(this)},this))
if(doAnimate)this.$backdrop[0].offsetWidth
this.$backdrop.addClass('in')
if(!callback)return
doAnimate?this.$backdrop.one('bsTransitionEnd',callback).emulateTransitionEnd(150):callback()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass('in')
var callbackRemove=function(){that.removeBackdrop()
callback&&callback()}
$.support.transition&&this.$element.hasClass('fade')?this.$backdrop.one('bsTransitionEnd',callbackRemove).emulateTransitionEnd(150):callbackRemove()}else if(callback){callback()}}
Modal.prototype.checkScrollbar=function(){if(document.body.clientWidth>=window.innerWidth)return
this.scrollbarWidth=this.scrollbarWidth||this.measureScrollbar()}
Modal.prototype.setScrollbar=function(){var bodyPad=parseInt((this.$body.css('padding-right')||0),10)
if(this.scrollbarWidth)this.$body.css('padding-right',bodyPad+this.scrollbarWidth)}
Modal.prototype.resetScrollbar=function(){this.$body.css('padding-right','')}
Modal.prototype.measureScrollbar=function(){var scrollDiv=document.createElement('div')
scrollDiv.className='modal-scrollbar-measure'
this.$body.append(scrollDiv)
var scrollbarWidth=scrollDiv.offsetWidth-scrollDiv.clientWidth
this.$body[0].removeChild(scrollDiv)
return scrollbarWidth}
function Plugin(option,_relatedTarget){return this.each(function(){var $this=$(this)
var data=$this.data('bs.modal')
var options=$.extend({},Modal.DEFAULTS,$this.data(),typeof option=='object'&&option)
if(!data)$this.data('bs.modal',(data=new Modal(this,options)))
if(typeof option=='string')data[option](_relatedTarget)
else if(options.show)data.show(_relatedTarget)})}
var old=$.fn.modal
$.fn.modal=Plugin
$.fn.modal.Constructor=Modal
$.fn.modal.noConflict=function(){$.fn.modal=old
return this}
$(document).on('click.bs.modal.data-api','[data-toggle="modal"]',function(e){var $this=$(this)
var href=$this.attr('href')
var $target=$($this.attr('data-target')||(href&&href.replace(/.*(?=#[^\s]+$)/,'')))
var option=$target.data('bs.modal')?'toggle':$.extend({remote:!/#/.test(href)&&href},$target.data(),$this.data())
if($this.is('a'))e.preventDefault()
$target.one('show.bs.modal',function(showEvent){if(showEvent.isDefaultPrevented())return
$target.one('hidden.bs.modal',function(){$this.is(':visible')&&$this.trigger('focus')})})
Plugin.call($target,option,this)})}(jQuery);+function($){'use strict';var Tooltip=function(element,options){this.type=this.options=this.enabled=this.timeout=this.hoverState=this.$element=null
this.init('tooltip',element,options)}
Tooltip.VERSION='3.2.0'
Tooltip.DEFAULTS={animation:true,placement:'top',selector:false,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:'hover focus',title:'',delay:0,html:false,container:false,viewport:{selector:'body',padding:0}}
Tooltip.prototype.init=function(type,element,options){this.enabled=true
this.type=type
this.$element=$(element)
this.options=this.getOptions(options)
this.$viewport=this.options.viewport&&$(this.options.viewport.selector||this.options.viewport)
var triggers=this.options.trigger.split(' ')
for(var i=triggers.length;i--;){var trigger=triggers[i]
if(trigger=='click'){this.$element.on('click.'+this.type,this.options.selector,$.proxy(this.toggle,this))}else if(trigger!='manual'){var eventIn=trigger=='hover'?'mouseenter':'focusin'
var eventOut=trigger=='hover'?'mouseleave':'focusout'
this.$element.on(eventIn+'.'+this.type,this.options.selector,$.proxy(this.enter,this))
this.$element.on(eventOut+'.'+this.type,this.options.selector,$.proxy(this.leave,this))}}
this.options.selector?(this._options=$.extend({},this.options,{trigger:'manual',selector:''})):this.fixTitle()}
Tooltip.prototype.getDefaults=function(){return Tooltip.DEFAULTS}
Tooltip.prototype.getOptions=function(options){options=$.extend({},this.getDefaults(),this.$element.data(),options)
if(options.delay&&typeof options.delay=='number'){options.delay={show:options.delay,hide:options.delay}}
return options}
Tooltip.prototype.getDelegateOptions=function(){var options={}
var defaults=this.getDefaults()
this._options&&$.each(this._options,function(key,value){if(defaults[key]!=value)options[key]=value})
return options}
Tooltip.prototype.enter=function(obj){var self=obj instanceof this.constructor?obj:$(obj.currentTarget).data('bs.'+this.type)
if(!self){self=new this.constructor(obj.currentTarget,this.getDelegateOptions())
$(obj.currentTarget).data('bs.'+this.type,self)}
clearTimeout(self.timeout)
self.hoverState='in'
if(!self.options.delay||!self.options.delay.show)return self.show()
self.timeout=setTimeout(function(){if(self.hoverState=='in')self.show()},self.options.delay.show)}
Tooltip.prototype.leave=function(obj){var self=obj instanceof this.constructor?obj:$(obj.currentTarget).data('bs.'+this.type)
if(!self){self=new this.constructor(obj.currentTarget,this.getDelegateOptions())
$(obj.currentTarget).data('bs.'+this.type,self)}
clearTimeout(self.timeout)
self.hoverState='out'
if(!self.options.delay||!self.options.delay.hide)return self.hide()
self.timeout=setTimeout(function(){if(self.hoverState=='out')self.hide()},self.options.delay.hide)}
Tooltip.prototype.show=function(){var e=$.Event('show.bs.'+this.type)
if(this.hasContent()&&this.enabled){this.$element.trigger(e)
var inDom=$.contains(document.documentElement,this.$element[0])
if(e.isDefaultPrevented()||!inDom)return
var that=this
var $tip=this.tip()
var tipId=this.getUID(this.type)
this.setContent()
$tip.attr('id',tipId)
this.$element.attr('aria-describedby',tipId)
if(this.options.animation)$tip.addClass('fade')
var placement=typeof this.options.placement=='function'?this.options.placement.call(this,$tip[0],this.$element[0]):this.options.placement
var autoToken=/\s?auto?\s?/i
var autoPlace=autoToken.test(placement)
if(autoPlace)placement=placement.replace(autoToken,'')||'top'
$tip.detach().css({top:0,left:0,display:'block'}).addClass(placement).data('bs.'+this.type,this)
this.options.container?$tip.appendTo(this.options.container):$tip.insertAfter(this.$element)
var pos=this.getPosition()
var actualWidth=$tip[0].offsetWidth
var actualHeight=$tip[0].offsetHeight
if(autoPlace){var orgPlacement=placement
var $parent=this.$element.parent()
var parentDim=this.getPosition($parent)
placement=placement=='bottom'&&pos.top+pos.height+actualHeight-parentDim.scroll>parentDim.height?'top':placement=='top'&&pos.top-parentDim.scroll-actualHeight<0?'bottom':placement=='right'&&pos.right+actualWidth>parentDim.width?'left':placement=='left'&&pos.left-actualWidth<parentDim.left?'right':placement
$tip.removeClass(orgPlacement).addClass(placement)}
var calculatedOffset=this.getCalculatedOffset(placement,pos,actualWidth,actualHeight)
this.applyPlacement(calculatedOffset,placement)
var complete=function(){that.$element.trigger('shown.bs.'+that.type)
that.hoverState=null}
$.support.transition&&this.$tip.hasClass('fade')?$tip.one('bsTransitionEnd',complete).emulateTransitionEnd(150):complete()}}
Tooltip.prototype.applyPlacement=function(offset,placement){var $tip=this.tip()
var width=$tip[0].offsetWidth
var height=$tip[0].offsetHeight
var marginTop=parseInt($tip.css('margin-top'),10)
var marginLeft=parseInt($tip.css('margin-left'),10)
if(isNaN(marginTop))marginTop=0
if(isNaN(marginLeft))marginLeft=0
offset.top=offset.top+marginTop
offset.left=offset.left+marginLeft
$.offset.setOffset($tip[0],$.extend({using:function(props){$tip.css({top:Math.round(props.top),left:Math.round(props.left)})}},offset),0)
$tip.addClass('in')
var actualWidth=$tip[0].offsetWidth
var actualHeight=$tip[0].offsetHeight
if(placement=='top'&&actualHeight!=height){offset.top=offset.top+height-actualHeight}
var delta=this.getViewportAdjustedDelta(placement,offset,actualWidth,actualHeight)
if(delta.left)offset.left+=delta.left
else offset.top+=delta.top
var arrowDelta=delta.left?delta.left*2-width+actualWidth:delta.top*2-height+actualHeight
var arrowPosition=delta.left?'left':'top'
var arrowOffsetPosition=delta.left?'offsetWidth':'offsetHeight'
$tip.offset(offset)
this.replaceArrow(arrowDelta,$tip[0][arrowOffsetPosition],arrowPosition)}
Tooltip.prototype.replaceArrow=function(delta,dimension,position){this.arrow().css(position,delta?(50*(1-delta/dimension)+'%'):'')}
Tooltip.prototype.setContent=function(){var $tip=this.tip()
var title=this.getTitle()
$tip.find('.tooltip-inner')[this.options.html?'html':'text'](title)
$tip.removeClass('fade in top bottom left right')}
Tooltip.prototype.hide=function(){var that=this
var $tip=this.tip()
var e=$.Event('hide.bs.'+this.type)
this.$element.removeAttr('aria-describedby')
function complete(){if(that.hoverState!='in')$tip.detach()
that.$element.trigger('hidden.bs.'+that.type)}
this.$element.trigger(e)
if(e.isDefaultPrevented())return
$tip.removeClass('in')
$.support.transition&&this.$tip.hasClass('fade')?$tip.one('bsTransitionEnd',complete).emulateTransitionEnd(150):complete()
this.hoverState=null
return this}
Tooltip.prototype.fixTitle=function(){var $e=this.$element
if($e.attr('title')||typeof($e.attr('data-original-title'))!='string'){$e.attr('data-original-title',$e.attr('title')||'').attr('title','')}}
Tooltip.prototype.hasContent=function(){return this.getTitle()}
Tooltip.prototype.getPosition=function($element){$element=$element||this.$element
var el=$element[0]
var isBody=el.tagName=='BODY'
return $.extend({},(typeof el.getBoundingClientRect=='function')?el.getBoundingClientRect():null,{scroll:isBody?document.documentElement.scrollTop||document.body.scrollTop:$element.scrollTop(),width:isBody?$(window).width():$element.outerWidth(),height:isBody?$(window).height():$element.outerHeight()},isBody?{top:0,left:0}:$element.offset())}
Tooltip.prototype.getCalculatedOffset=function(placement,pos,actualWidth,actualHeight){return placement=='bottom'?{top:pos.top+pos.height,left:pos.left+pos.width/2-actualWidth/2}:placement=='top'?{top:pos.top-actualHeight,left:pos.left+pos.width/2-actualWidth/2}:placement=='left'?{top:pos.top+pos.height/2-actualHeight/2,left:pos.left-actualWidth}:{top:pos.top+pos.height/2-actualHeight/2,left:pos.left+pos.width}}
Tooltip.prototype.getViewportAdjustedDelta=function(placement,pos,actualWidth,actualHeight){var delta={top:0,left:0}
if(!this.$viewport)return delta
var viewportPadding=this.options.viewport&&this.options.viewport.padding||0
var viewportDimensions=this.getPosition(this.$viewport)
if(/right|left/.test(placement)){var topEdgeOffset=pos.top-viewportPadding-viewportDimensions.scroll
var bottomEdgeOffset=pos.top+viewportPadding-viewportDimensions.scroll+actualHeight
if(topEdgeOffset<viewportDimensions.top){delta.top=viewportDimensions.top-topEdgeOffset}else if(bottomEdgeOffset>viewportDimensions.top+viewportDimensions.height){delta.top=viewportDimensions.top+viewportDimensions.height-bottomEdgeOffset}}else{var leftEdgeOffset=pos.left-viewportPadding
var rightEdgeOffset=pos.left+viewportPadding+actualWidth
if(leftEdgeOffset<viewportDimensions.left){delta.left=viewportDimensions.left-leftEdgeOffset}else if(rightEdgeOffset>viewportDimensions.width){delta.left=viewportDimensions.left+viewportDimensions.width-rightEdgeOffset}}
return delta}
Tooltip.prototype.getTitle=function(){var title
var $e=this.$element
var o=this.options
title=$e.attr('data-original-title')||(typeof o.title=='function'?o.title.call($e[0]):o.title)
return title}
Tooltip.prototype.getUID=function(prefix){do prefix+=~~(Math.random()*1000000)
while(document.getElementById(prefix))
return prefix}
Tooltip.prototype.tip=function(){return(this.$tip=this.$tip||$(this.options.template))}
Tooltip.prototype.arrow=function(){return(this.$arrow=this.$arrow||this.tip().find('.tooltip-arrow'))}
Tooltip.prototype.validate=function(){if(!this.$element[0].parentNode){this.hide()
this.$element=null
this.options=null}}
Tooltip.prototype.enable=function(){this.enabled=true}
Tooltip.prototype.disable=function(){this.enabled=false}
Tooltip.prototype.toggleEnabled=function(){this.enabled=!this.enabled}
Tooltip.prototype.toggle=function(e){var self=this
if(e){self=$(e.currentTarget).data('bs.'+this.type)
if(!self){self=new this.constructor(e.currentTarget,this.getDelegateOptions())
$(e.currentTarget).data('bs.'+this.type,self)}}
self.tip().hasClass('in')?self.leave(self):self.enter(self)}
Tooltip.prototype.destroy=function(){clearTimeout(this.timeout)
this.hide().$element.off('.'+this.type).removeData('bs.'+this.type)}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.tooltip')
var options=typeof option=='object'&&option
if(!data&&option=='destroy')return
if(!data)$this.data('bs.tooltip',(data=new Tooltip(this,options)))
if(typeof option=='string')data[option]()})}
var old=$.fn.tooltip
$.fn.tooltip=Plugin
$.fn.tooltip.Constructor=Tooltip
$.fn.tooltip.noConflict=function(){$.fn.tooltip=old
return this}}(jQuery);+function($){'use strict';var Popover=function(element,options){this.init('popover',element,options)}
if(!$.fn.tooltip)throw new Error('Popover requires tooltip.js')
Popover.VERSION='3.2.0'
Popover.DEFAULTS=$.extend({},$.fn.tooltip.Constructor.DEFAULTS,{placement:'right',trigger:'click',content:'',template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'})
Popover.prototype=$.extend({},$.fn.tooltip.Constructor.prototype)
Popover.prototype.constructor=Popover
Popover.prototype.getDefaults=function(){return Popover.DEFAULTS}
Popover.prototype.setContent=function(){var $tip=this.tip()
var title=this.getTitle()
var content=this.getContent()
$tip.find('.popover-title')[this.options.html?'html':'text'](title)
$tip.find('.popover-content').empty()[this.options.html?(typeof content=='string'?'html':'append'):'text'](content)
$tip.removeClass('fade top bottom left right in')
if(!$tip.find('.popover-title').html())$tip.find('.popover-title').hide()}
Popover.prototype.hasContent=function(){return this.getTitle()||this.getContent()}
Popover.prototype.getContent=function(){var $e=this.$element
var o=this.options
return $e.attr('data-content')||(typeof o.content=='function'?o.content.call($e[0]):o.content)}
Popover.prototype.arrow=function(){return(this.$arrow=this.$arrow||this.tip().find('.arrow'))}
Popover.prototype.tip=function(){if(!this.$tip)this.$tip=$(this.options.template)
return this.$tip}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.popover')
var options=typeof option=='object'&&option
if(!data&&option=='destroy')return
if(!data)$this.data('bs.popover',(data=new Popover(this,options)))
if(typeof option=='string')data[option]()})}
var old=$.fn.popover
$.fn.popover=Plugin
$.fn.popover.Constructor=Popover
$.fn.popover.noConflict=function(){$.fn.popover=old
return this}}(jQuery);+function($){'use strict';function ScrollSpy(element,options){var process=$.proxy(this.process,this)
this.$body=$('body')
this.$scrollElement=$(element).is('body')?$(window):$(element)
this.options=$.extend({},ScrollSpy.DEFAULTS,options)
this.selector=(this.options.target||'')+' .nav li > a'
this.offsets=[]
this.targets=[]
this.activeTarget=null
this.scrollHeight=0
this.$scrollElement.on('scroll.bs.scrollspy',process)
this.refresh()
this.process()}
ScrollSpy.VERSION='3.2.0'
ScrollSpy.DEFAULTS={offset:10}
ScrollSpy.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)}
ScrollSpy.prototype.refresh=function(){var offsetMethod='offset'
var offsetBase=0
if(!$.isWindow(this.$scrollElement[0])){offsetMethod='position'
offsetBase=this.$scrollElement.scrollTop()}
this.offsets=[]
this.targets=[]
this.scrollHeight=this.getScrollHeight()
var self=this
this.$body.find(this.selector).map(function(){var $el=$(this)
var href=$el.data('target')||$el.attr('href')
var $href=/^#./.test(href)&&$(href)
return($href&&$href.length&&$href.is(':visible')&&[[$href[offsetMethod]().top+offsetBase,href]])||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){self.offsets.push(this[0])
self.targets.push(this[1])})}
ScrollSpy.prototype.process=function(){var scrollTop=this.$scrollElement.scrollTop()+this.options.offset
var scrollHeight=this.getScrollHeight()
var maxScroll=this.options.offset+scrollHeight-this.$scrollElement.height()
var offsets=this.offsets
var targets=this.targets
var activeTarget=this.activeTarget
var i
if(this.scrollHeight!=scrollHeight){this.refresh()}
if(scrollTop>=maxScroll){return activeTarget!=(i=targets[targets.length-1])&&this.activate(i)}
if(activeTarget&&scrollTop<=offsets[0]){return activeTarget!=(i=targets[0])&&this.activate(i)}
for(i=offsets.length;i--;){activeTarget!=targets[i]&&scrollTop>=offsets[i]&&(!offsets[i+1]||scrollTop<=offsets[i+1])&&this.activate(targets[i])}}
ScrollSpy.prototype.activate=function(target){this.activeTarget=target
$(this.selector).parentsUntil(this.options.target,'.active').removeClass('active')
var selector=this.selector+'[data-target="'+target+'"],'+
this.selector+'[href="'+target+'"]'
var active=$(selector).parents('li').addClass('active')
if(active.parent('.dropdown-menu').length){active=active.closest('li.dropdown').addClass('active')}
active.trigger('activate.bs.scrollspy')}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.scrollspy')
var options=typeof option=='object'&&option
if(!data)$this.data('bs.scrollspy',(data=new ScrollSpy(this,options)))
if(typeof option=='string')data[option]()})}
var old=$.fn.scrollspy
$.fn.scrollspy=Plugin
$.fn.scrollspy.Constructor=ScrollSpy
$.fn.scrollspy.noConflict=function(){$.fn.scrollspy=old
return this}
$(window).on('load.bs.scrollspy.data-api',function(){$('[data-spy="scroll"]').each(function(){var $spy=$(this)
Plugin.call($spy,$spy.data())})})}(jQuery);+function($){'use strict';var Tab=function(element){this.element=$(element)}
Tab.VERSION='3.2.0'
Tab.prototype.show=function(){var $this=this.element
var $ul=$this.closest('ul:not(.dropdown-menu)')
var selector=$this.data('target')
if(!selector){selector=$this.attr('href')
selector=selector&&selector.replace(/.*(?=#[^\s]*$)/,'')}
if($this.parent('li').hasClass('active'))return
var previous=$ul.find('.active:last a')[0]
var e=$.Event('show.bs.tab',{relatedTarget:previous})
$this.trigger(e)
if(e.isDefaultPrevented())return
var $target=$(selector)
this.activate($this.closest('li'),$ul)
this.activate($target,$target.parent(),function(){$this.trigger({type:'shown.bs.tab',relatedTarget:previous})})}
Tab.prototype.activate=function(element,container,callback){var $active=container.find('> .active')
var transition=callback&&$.support.transition&&$active.hasClass('fade')
function next(){$active.removeClass('active').find('> .dropdown-menu > .active').removeClass('active')
element.addClass('active')
if(transition){element[0].offsetWidth
element.addClass('in')}else{element.removeClass('fade')}
if(element.parent('.dropdown-menu')){element.closest('li.dropdown').addClass('active')}
callback&&callback()}
transition?$active.one('bsTransitionEnd',next).emulateTransitionEnd(150):next()
$active.removeClass('in')}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.tab')
if(!data)$this.data('bs.tab',(data=new Tab(this)))
if(typeof option=='string')data[option]()})}
var old=$.fn.tab
$.fn.tab=Plugin
$.fn.tab.Constructor=Tab
$.fn.tab.noConflict=function(){$.fn.tab=old
return this}
$(document).on('click.bs.tab.data-api','[data-toggle="tab"], [data-toggle="pill"]',function(e){e.preventDefault()
Plugin.call($(this),'show')})}(jQuery);+function($){'use strict';var Affix=function(element,options){this.options=$.extend({},Affix.DEFAULTS,options)
this.$target=$(this.options.target).on('scroll.bs.affix.data-api',$.proxy(this.checkPosition,this)).on('click.bs.affix.data-api',$.proxy(this.checkPositionWithEventLoop,this))
this.$element=$(element)
this.affixed=this.unpin=this.pinnedOffset=null
this.checkPosition()}
Affix.VERSION='3.2.0'
Affix.RESET='affix affix-top affix-bottom'
Affix.DEFAULTS={offset:0,target:window}
Affix.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset
this.$element.removeClass(Affix.RESET).addClass('affix')
var scrollTop=this.$target.scrollTop()
var position=this.$element.offset()
return(this.pinnedOffset=position.top-scrollTop)}
Affix.prototype.checkPositionWithEventLoop=function(){setTimeout($.proxy(this.checkPosition,this),1)}
Affix.prototype.checkPosition=function(){if(!this.$element.is(':visible'))return
var scrollHeight=$(document).height()
var scrollTop=this.$target.scrollTop()
var position=this.$element.offset()
var offset=this.options.offset
var offsetTop=offset.top
var offsetBottom=offset.bottom
if(typeof offset!='object')offsetBottom=offsetTop=offset
if(typeof offsetTop=='function')offsetTop=offset.top(this.$element)
if(typeof offsetBottom=='function')offsetBottom=offset.bottom(this.$element)
var affix=this.unpin!=null&&(scrollTop+this.unpin<=position.top)?false:offsetBottom!=null&&(position.top+this.$element.height()>=scrollHeight-offsetBottom)?'bottom':offsetTop!=null&&(scrollTop<=offsetTop)?'top':false
if(this.affixed===affix)return
if(this.unpin!=null)this.$element.css('top','')
var affixType='affix'+(affix?'-'+affix:'')
var e=$.Event(affixType+'.bs.affix')
this.$element.trigger(e)
if(e.isDefaultPrevented())return
this.affixed=affix
this.unpin=affix=='bottom'?this.getPinnedOffset():null
this.$element.removeClass(Affix.RESET).addClass(affixType).trigger($.Event(affixType.replace('affix','affixed')))
if(affix=='bottom'){this.$element.offset({top:scrollHeight-this.$element.height()-offsetBottom})}}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.affix')
var options=typeof option=='object'&&option
if(!data)$this.data('bs.affix',(data=new Affix(this,options)))
if(typeof option=='string')data[option]()})}
var old=$.fn.affix
$.fn.affix=Plugin
$.fn.affix.Constructor=Affix
$.fn.affix.noConflict=function(){$.fn.affix=old
return this}
$(window).on('load',function(){$('[data-spy="affix"]').each(function(){var $spy=$(this)
var data=$spy.data()
data.offset=data.offset||{}
if(data.offsetBottom)data.offset.bottom=data.offsetBottom
if(data.offsetTop)data.offset.top=data.offsetTop
Plugin.call($spy,data)})})}(jQuery);;

/* /website_mail/static/src/js/follow.js defined in bundle 'website.assets_frontend' */
(function(){'use strict';var website=openerp.website;website.snippet.animationRegistry.follow=website.snippet.Animation.extend({selector:".js_follow",start:function(editable_mode){var self=this;this.is_user=false;openerp.jsonRpc('/website_mail/is_follower','call',{model:this.$target.data('object'),id:this.$target.data('id'),}).always(function(data){self.is_user=data.is_user;self.email=data.email;self.toggle_subscription(data.is_follower,data.email);self.$target.removeClass("hidden");});if(!editable_mode){$('.js_follow > .alert').addClass("hidden");$('.js_follow > .input-group-btn.hidden').removeClass("hidden");this.$target.find('.js_follow_btn, .js_unfollow_btn').on('click',function(event){event.preventDefault();self.on_click();});}
return;},on_click:function(){var self=this;var $email=this.$target.find(".js_follow_email");if($email.length&&!$email.val().match(/.+@.+/)){this.$target.addClass('has-error');return false;}
this.$target.removeClass('has-error');var email=$email.length?$email.val():false;if(email||this.is_user){openerp.jsonRpc('/website_mail/follow','call',{'id':+this.$target.data('id'),'object':this.$target.data('object'),'message_is_follower':this.$target.attr("data-follow")||"off",'email':email,}).then(function(follow){self.toggle_subscription(follow,email);});}},toggle_subscription:function(follow,email){follow=follow||(!email&&this.$target.attr('data-unsubscribe'));if(follow){this.$target.find(".js_follow_btn").addClass("hidden");this.$target.find(".js_unfollow_btn").removeClass("hidden");}
else{this.$target.find(".js_follow_btn").removeClass("hidden");this.$target.find(".js_unfollow_btn").addClass("hidden");}
this.$target.find('input.js_follow_email').val(email||"").attr("disabled",email&&(follow||this.is_user)?"disabled":false);this.$target.attr("data-follow",follow?'on':'off');},});})();;

/* /website_blog/static/src/js/website_blog.inline.discussion.js defined in bundle 'website.assets_frontend' */
(function(){'use strict';var website=openerp.website,qweb=openerp.qweb;website.add_template_file('/website_blog/static/src/xml/website_blog.inline.discussion.xml');website.blog_discussion=openerp.Class.extend({init:function(options){var self=this;self.discus_identifier;var defaults={position:'right',post_id:$('#blog_post_name').attr('data-blog-id'),content:false,public_user:false,};self.settings=$.extend({},defaults,options);self.do_render(self);},do_render:function(data){var self=this;if($('#discussions_wrapper').length===0&&self.settings.content.length>0){$('<div id="discussions_wrapper"></div>').insertAfter($('#blog_content'));}
self.discussions_handler(self.settings.content);$('html').click(function(event){if($(event.target).parents('#discussions_wrapper, .main-discussion-link-wrp').length===0){self.hide_discussion();}
if(!$(event.target).hasClass('discussion-link')&&!$(event.target).parents('.popover').length){if($('.move_discuss').length){$('[enable_chatter_discuss=True]').removeClass('move_discuss');$('[enable_chatter_discuss=True]').animate({'marginLeft':"+=40%"});$('#discussions_wrapper').animate({'marginLeft':"+=250px"});}}});},prepare_data:function(identifier,comment_count){var self=this;return openerp.jsonRpc("/blogpost/get_discussion/",'call',{'post_id':self.settings.post_id,'path':identifier,'count':comment_count,})},prepare_multi_data:function(identifiers,comment_count){var self=this;return openerp.jsonRpc("/blogpost/get_discussions/",'call',{'post_id':self.settings.post_id,'paths':identifiers,'count':comment_count,})},discussions_handler:function(){var self=this;var node_by_id={};$(self.settings.content).each(function(i){var node=$(this);var identifier=node.attr('data-chatter-id');if(identifier){node_by_id[identifier]=node;}});self.prepare_multi_data(_.keys(node_by_id),true).then(function(multi_data){_.forEach(multi_data,function(data){self.prepare_discuss_link(data.val,data.path,node_by_id[data.path]);});});},prepare_discuss_link:function(data,identifier,node){var self=this;var cls=data>0?'discussion-link has-comments':'discussion-link';var a=$('<a class="'+cls+' css_editable_mode_hidden" />').attr('data-discus-identifier',identifier).attr('data-discus-position',self.settings.position).text(data>0?data:'+').attr('data-contentwrapper','.mycontent').wrap('<div class="discussion" />').parent().appendTo('#discussions_wrapper');a.css({'top':node.offset().top,'left':self.settings.position=='right'?node.outerWidth()+node.offset().left:node.offset().left-a.outerWidth()});node.mouseover(function(){a.addClass("hovered");}).mouseout(function(){a.removeClass("hovered");});a.delegate('a.discussion-link',"click",function(e){e.preventDefault();if(!$('.move_discuss').length){$('[enable_chatter_discuss=True]').addClass('move_discuss');$('[enable_chatter_discuss=True]').animate({'marginLeft':"-=40%"});$('#discussions_wrapper').animate({'marginLeft':"-=250px"});}
if($(this).is('.active')){e.stopPropagation();self.hide_discussion();}
else{self.get_discussion($(this),function(source){});}});},get_discussion:function(source,callback){var self=this;var identifier=source.attr('data-discus-identifier');self.hide_discussion();self.discus_identifier=identifier;var elt=$('a[data-discus-identifier="'+identifier+'"]');elt.append(qweb.render("website.blog_discussion.popover",{'identifier':identifier,'options':self.settings}));var comment='';self.prepare_data(identifier,false).then(function(data){_.each(data,function(res){comment+=qweb.render("website.blog_discussion.comment",{'res':res});});$('.discussion_history').html('<ul class="media-list">'+comment+'</ul>');self.create_popover(elt,identifier);$('a.discussion-link, a.main-discussion-link').removeClass('active').filter(source).addClass('active');elt.popover('hide').filter(source).popover('show');callback(source);});},create_popover:function(elt,identifier){var self=this;elt.popover({placement:'right',trigger:'manual',html:true,content:function(){return $($(this).data('contentwrapper')).html();}}).parent().delegate(self).on('click','button#comment_post',function(e){e.stopImmediatePropagation();self.post_discussion(identifier);});},validate:function(public_user){var comment=$(".popover textarea#inline_comment").val();if(public_user){var author_name=$('.popover input#author_name').val();var author_email=$('.popover input#author_email').val();if(!comment||!author_name||!author_email){if(!author_name)
$('div#author_name').addClass('has-error');else
$('div#author_name').removeClass('has-error');if(!author_email)
$('div#author_email').addClass('has-error');else
$('div#author_email').removeClass('has-error');if(!comment)
$('div#inline_comment').addClass('has-error');else
$('div#inline_comment').removeClass('has-error');return false}}
else if(!comment){$('div#inline_comment').addClass('has-error');return false}
$("div#inline_comment").removeClass('has-error');$('div#author_name').removeClass('has-error');$('div#author_email').removeClass('has-error');$(".popover textarea#inline_comment").val('');$('.popover input#author_name').val('');$('.popover input#author_email').val('');return[comment,author_name,author_email]},post_discussion:function(identifier){var self=this;var val=self.validate(self.settings.public_user)
if(!val)return
openerp.jsonRpc("/blogpost/post_discussion",'call',{'blog_post_id':self.settings.post_id,'path':self.discus_identifier,'comment':val[0],'name':val[1],'email':val[2],}).then(function(res){$(".popover ul.media-list").prepend(qweb.render("website.blog_discussion.comment",{'res':res[0]}))
var ele=$('a[data-discus-identifier="'+self.discus_identifier+'"]');ele.text(_.isNaN(parseInt(ele.text()))?1:parseInt(ele.text())+1)
ele.addClass('has-comments');});},hide_discussion:function(){var self=this;$('a[data-discus-identifier="'+self.discus_identifier+'"]').popover('destroy');$('a.discussion-link').removeClass('active');}});})();;

/* /website_blog/static/src/js/website_blog.js defined in bundle 'website.assets_frontend' */
$(document).ready(function(){if($('.website_blog').length){function page_transist(event){event.preventDefault();newLocation=$('.js_next')[0].href;var top=$('.cover_footer').offset().top;$('.cover_footer').animate({height:$(window).height()+'px'},300);$('html, body').animate({scrollTop:top},300,'swing',function(){window.location.href=newLocation;});}
function animate(event){event.preventDefault();event.stopImmediatePropagation();var target=$(this.hash);$('html, body').stop().animate({'scrollTop':target.offset().top-32},500,'swing',function(){window.location.hash='blog_content';});}
var content=$("div[enable_chatter_discuss='True']").find('p[data-chatter-id]');if(content){openerp.jsonRpc("/blog/get_user/",'call',{}).then(function(data){$('#discussions_wrapper').empty();new openerp.website.blog_discussion({'content':content,'public_user':data[0]});});}
$('.js_fullheight').css('min-height',$(window).height());$(".js_tweet").share({'author_name':$('#blog_author').text()});$('.cover_footer').on('click',page_transist);$('a[href^="#blog_content"]').on('click',animate);}});;

/* /website_blog/static/lib/contentshare.js defined in bundle 'website.assets_frontend' */
(function(){$.fn.share=function(options){var option=$.extend($.fn.share.defaults,options);$.extend($.fn.share,{init:function(shareable){var self=this;$.fn.share.defaults.shareable=shareable;$.fn.share.defaults.shareable.on('mouseup',function(){self.popOver();});$.fn.share.defaults.shareable.on('mousedown',function(){self.destroy();});},getContent:function(){var current_url=window.location.href
var selected_text=this.getSelection('string').substring(0,option.maxLength-(current_url.length+option.author_name.length+7));var text=encodeURIComponent('\"'+selected_text+'\" '+'--@'+option.author_name+' '+current_url)
return'<a onclick="window.open(\''+option.shareLink+text+'\',\'_'+option.target+'\',\'location=yes,height=570,width=520,scrollbars=yes,status=yes\')"><i class="fa fa-twitter fa-lg"/></a>';},getSelection:function(share){if(window.getSelection){return(share=='string')?String(window.getSelection().getRangeAt(0)).replace(/\s{2,}/g,' '):window.getSelection().getRangeAt(0);}
else if(document.selection){return(share=='string')?document.selection.createRange().text.replace(/\s{2,}/g,' '):document.selection.createRange();}},popOver:function(){this.destroy();if(this.getSelection('string').length<option.minLength)
return;var data=this.getContent();var range=this.getSelection();var newNode=document.createElement("mark");range.surroundContents(newNode);$('mark').addClass(option.className);$('.'+option.className).popover({trigger:'manual',placement:option.placement,html:true,content:function(){return data;}});$('.'+option.className).popover('show');},destroy:function(){$('.'+option.className).popover('hide');$('mark').contents().unwrap();$('mark').remove();}});$.fn.share.init(this);};$.fn.share.defaults={shareLink:"http://twitter.com/intent/tweet?text=",minLength:5,maxLength:140,target:"blank",className:"share",placement:"top",};}());