var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

// JavaScript Document
$(document).ready(function(){

	var stirling = {
	  kbcontrol: function(e){
	    switch(e.keyCode){
	      case 13:
	      case 39:
	        e.preventDefault();
	        $(e.srcElement || e.target).click();
	        break;
	      default:
	        break;
	    }
	  },
	  tabs: {
		  groups: {},
		  useGroups: false
	  }
	};
	
	( function ( $ ) {
	
		$.fn.stirTabs = function() {
			$tabsWrapper = $('<div class="tabs"/>');
			this.addClass('clearfix').eq(0).before($tabsWrapper);
			$tabsWrapper.append(this);
			this.wrapAll('<div class="tabliner"/>');
			$buttons = $('<ul class="label"/>');
			$tabsWrapper.prepend($buttons);
			this.not(":first").hide();
			this.each(function(i) {
				var that = $(this);
				$tabsWrapper.addClass(that.data('class'));
				$button = $('<a href="#tab'+(i)+'"/>');
				$button.html(that.data('title'));
				$button.click(function(e) {
					e.preventDefault();
					that.show().siblings().hide();
					$(this).parent().parent().find('li').removeClass('current');
					$(this).parent().addClass('current');	
				});
				$buttons.append($('<li>').append($button));
			});
			$buttons.find('li').eq(0).addClass('current');
			return this;
		}

		$.fn.groupTabs = function() {
		
		this.each(function(){
			var g = $(this).data("group");
			if(!stirling.tabs.groups[g]){ stirling.tabs.groups[g] = true; stirling.tabs.useGroups = true; }
		});
	
		if(stirling.tabs.useGroups){
			for(x in stirling.tabs.groups){
				this.filter('[data-group="'+x+'"]').stirTabs();
			}
			this.filter(':not([data-group])').stirTabs();
		} else {
			this.stirTabs();
		}				
			return this;
		}
		
		$.fn.stirSwapClass = function(a,b){
		  if($(this).hasClass(a)){$(this).removeClass(a).addClass(b);}
		  else if($(this).hasClass(b)){$(this).removeClass(b).addClass(a);}
		  return $(this);
		}
	
	} ( jQuery ));

	//Login status
	$('<div id="portal-status"/>').prependTo($(".header"));
	checkLogin();
	
	//New window links
	$("a.newwindow").click(function(e){e.preventDefault();window.open(this.href);});

  	//Fancybox
	$(".jshideme").wrap('<div style="display:none" />');
	$(".lightbox:first").each(function(){ fancybox_auto(); });
 	$(".fancybox2:first").each(function(){ fancybox2_auto(); });

	//Tabs
	checkTabs($(".dynamic-tabs, .stir-tabs"));
	//new tabs 3/9/2013
	$('.tab').groupTabs();
	
	//Minislider
	checkMinislider();

	//Courses mini-browser
	$(".course-browser").attr('tabindex',0);	//Make focusable
	$(".course-browser a").focus(function(){$(this).parents("ol,ul").addClass('leftshow');});	//Parent selector
	$(".course-browser a").blur(function(){$(this).parents("ol,ul").removeClass('leftshow');});
	$(".course-browser").hover(
		function(){$(this).children("ul, ol").css({left:"1px"});},
		function(){$(this).children("ul, ol").css({left:"-2222px"});}
	);//IE's lack of support of :hover psuedo class
	$(".course-browser").focus(function(){$(this).children("ul, ol").css({left:"1px"});});
	$(".course-browser").blur(function(){$(this).children("ul, ol").css({left:"-2222px"});});
	//TODO Touch interface needs 'click' event
	
	//Tables
	$('table.zebra thead tr td:first-child').addClass("thead-frst-chld");
	$("table.zebra thead tr:nth-child(odd) th").addClass("thead-th-odd");
	$("table.zebra thead tr:nth-child(even) th").addClass("thead-th-even");
	$("table.zebra tbody tr:nth-child(odd) th").addClass("tbody-th-odd");
	$("table.zebra tbody tr:nth-child(even) th").addClass("tbody-th-even");
	$("table.zebra tbody tr:nth-child(even) td").addClass("tbody-td-even");
	
	//Module popups
	$('.module_timetable a').each(function(i, link){
		$(link).click(function(event) {
			event.preventDefault();
			$('.module_popup').css('display', 'none');
			$($(link).attr('href')).css("top", ( $(window).height() - $($(link).attr('href')).height() ) / 2+$(window).scrollTop() + "px");
			$($(link).attr('href')).css("left", ( $(window).width() - $($(link).attr('href')).width() ) / 2+$(window).scrollLeft() + "px");
			$($(link).attr('href')).css('display', 'block');
		});
	});
	
	//SideTabs
	$(".sidetab ol.tabs li:nth-child(2) a").css("background-position","0px -96px");
	$(".sidetab ol.tabs li:nth-child(3)").addClass("current").find("a").css("background-position","0px -192px");
	$(".sidetab ol.tabs li").hover(function(){activateTab($(this));},function(){});
	$(".sidetab .content a").attr('tabindex','-1');
	$(".sidetab ol.tabs li a").focus(function(){activateTab($(this).parent().parent());});

	//ACCORDION
	var accordion = $("<div />").addClass("stircordion");
	$("div.collapse").wrapAll(accordion).addClass('folded');
	$("div.collapse h2").attr('tabindex',0).click(function() { $(this).parent().toggleClass("folded"); });
	/*TODO: remove invisible links from tabbability*/
  
  	// Direct Edit Footer Link Code
	$('.direct-edit-temp').prepend($('.direct-edit-temp').attr("data-link"));
	$('.direct-edit').attr("href", $('#.direct-edit-temp > a').attr("href"));
	$('.direct-edit-temp').remove();
	


//END OF DOCUMENT.READY
});

function checkTabs($el){
	if(typeof $(this).tabs=="undefined"){
		$.getScript('https://web.archive.org/web/20200317011359/http://www.stir.ac.uk/media/wwwstiracuk/styleassets/javascript/jquery-ui-1.8.18.custom.min.js', function(){ $el.tabs(); });
	} else {
	    $el.tabs();
    }	
}

function checkMinislider(){
	if(typeof $(this).minislider=="undefined"){
		$.getScript('https://web.archive.org/web/20200317011359/http://www.stir.ac.uk/media/wwwstiracuk/styleassets/javascript/jquery.minislider.v22.js', function(){ $('.minislider').minislider(); });
	} else {
		$('.minislider').minislider();
    }	
}

function checkLogin(){ logged = getCookie('psessv0'); if (logged!=null && logged!=""){ b=logged.split("|"); $("#portal-status").html('<a href="https://web.archive.org/web/20200317011359/https://portal.stir.ac.uk/my-portal.jsp" class="portal00">My Portal</a> Welcome back <strong> '+b[2].split("_").join(" ") + '</strong>. You last logged on '+b[3].split("_").join(" ") + ' <a href=\"https://portal.stir.ac.uk/security/logout.jsp" class="portal01">Log out</a>');$(".header h1").html(' ');} else { $("#portal-status").html(''); } } 

function getCookie(c_name){
if (document.cookie.length>0){
  c_start=document.cookie.indexOf(c_name + "=");
  if (c_start!=-1){
    c_start=c_start + c_name.length+1;
    c_end=document.cookie.indexOf(";",c_start);
    if (c_end==-1) c_end=document.cookie.length;
    return unescape(document.cookie.substring(c_start,c_end));
    }
  }
return "";
}


function fancybox_auto(){
    if(typeof $(this).fancybox=="undefined"){
    	$.getScript('https://web.archive.org/web/20200317011359/http://www.stir.ac.uk/media/autoimport/javascript/jquery.fancybox-1.3.4.pack.js',function(){
            $('<link rel="stylesheet" type="text/css" href="https://web.archive.org/web/20200317011359/http://www.stir.ac.uk/media/wwwstiracuk/styleassets/css/fancybox.css" media="screen" />').appendTo('head');
            $(".lightbox").fancybox();
        });
    } else {
	    $(".lightbox").fancybox();
    }
}

function fancybox2_auto(){
    if(typeof $(this).fancybox=="undefined"){
    	$.getScript('https://web.archive.org/web/20200317011359/http://www.stir.ac.uk/media/wwwstiracuk/styleassets/fancybox2/jquery.fancybox.pack.js',function(){
            $('<link rel="stylesheet" type="text/css" href="https://web.archive.org/web/20200317011359/http://www.stir.ac.uk/media/wwwstiracuk/styleassets/fancybox2/jquery.fancybox.css" media="screen" />').appendTo('head');
            $(".fancybox2").fancybox();
        });
    } else {
	    $(".fancybox2").fancybox();
    }
}


}
/*
     FILE ARCHIVED ON 01:13:59 Mar 17, 2020 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 10:33:59 Dec 02, 2020.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  load_resource: 126.313 (2)
  CDXLines.iter: 24.555 (3)
  captures_list: 170.983
  PetaboxLoader3.resolve: 62.204 (2)
  exclusion.robots.policy: 0.214
  exclusion.robots: 0.229
  esindex: 0.014
  PetaboxLoader3.datanode: 132.761 (5)
  LoadShardBlock: 130.925 (3)
  RedisCDXSource: 9.256
*/