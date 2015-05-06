/*
 * Sparxoo BP Scripts File
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
*/

/*
 * Put all your regular jQuery in here.
 * Within this funtion you can use the namespace $ instead of jQuery
 * ex. use this $('#id') ... NOT jQuery('#id')
*/
jQuery(document).ready(function($) {
	
    /** Play and Stop Controls for the page block video **/
    $('#video-play-button').click(function(){
  	  $('#banner-video-container').removeClass('hide');
    });
  
    $('#video-close-button').click(function(){
  	  $('#banner-video-container').addClass('hide');
	  
    });
	$(function() {
	    var iframe = $('#video-player')[0];
	    var player = $f(iframe);
		
	    // Call the API when a button is pressed
	    $('#video-play-button.vimeo').bind('click', function() {
	        player.api('play');
	    });
		
	    // Call the API when a button is pressed
	    $('#video-close-button.vimeo').bind('click', function() {
	        player.api('unload');
	    });
	});
	
	/*$('ul.sub-menu').addClass('animated');
	$('.site-header ul.nav li a').mouseover(function(){
		$(this).parent().find('ul').stop().addClass('fadeInDown');
	});
	$('.site-header ul.nav li a').mouseover(function(){
		$(this).parent().siblings().find('ul').removeClass('fadeInDown');
	});
	$('.site-header ul.nav li a').mouseleave(function(){
		$(this).parent().find('ul').removeClass('fadeInDown');
	});*/
	$('.site-header ul li').mouseover(function(){
		$(this).find('.sub-menu').stop().slideDown(500);
	});
	
	$('.site-header ul li').mouseleave(function(){
		$(this).find('.sub-menu').stop().slideUp(500);
	});		
	
	$('.services-left area').mouseover(function(){
		//alert($(this).attr('href'));
		$('.services-right .service').removeClass('displayService');
		$('.services-right .service').removeClass('slideInLeft');
		$('.services-right .service' + $(this).attr('href')).addClass('slideInLeft');
		$('.services-right .service' + $(this).attr('href')).addClass('displayService');		
		return false;
	});
	/*
	$('.services-left area').mouseleave(function(){
		//alert($(this).attr('href'));
		$('.services-right .service').removeClass('displayService');
		$('.services-right .service').removeClass('slideInLeft');		
		return false;
	});*/
	
	/* Hover effect for service icon on services page */
	$('.service-icon').mouseover(function(){
		$(this).siblings().find('a').addClass('hover');
	});
	$('.service-icon').mouseleave(function(){
		$(this).siblings().find('a').removeClass('hover');
	});
	
	/* Mobile menu Javascript */
	function toggleMobileNavigation() {
		if(!$('.mobile-menu-wrap').hasClass('mobile-toggled')) {
			$(".mobile-menu-wrap").addClass('mobile-toggled').animate({
				marginRight: '0'
			}, {duration: 500, queue: false});
		} else {
			$(".mobile-menu-wrap").removeClass('mobile-toggled').animate({
				marginRight: '-70%'
			}, {duration: 500, queue: false});
		}
		
		if (!$(".mobile-slide").hasClass('mobile-toggled')) {
			$(".mobile-slide").addClass('mobile-toggled').animate({
				marginLeft: '-70%',
				marginRight: '70%'
			}, {duration: 500, queue: false});
		} else {
			$(".mobile-slide").removeClass('mobile-toggled').animate({
				margin: '0'
			}, {duration: 500, queue: false});
		}
	}

	$('#mobile-toggle').on('click', function(e){
		$(this).toggleClass("orange");
		toggleMobileNavigation();
		e.preventDefault();
	});

	$(".mobile-menu-wrap").on("swipe", function(e){
		toggleMobileNavigation();
		if($('#mobile-toggle').hasClass("orange")) {
			$('#mobile-toggle').removeClass("orange");
		}
		e.preventDefault();
	});

	$('#mobile-menu > li.menu-item-has-children > a').on("click", function(e){
		$(this).parent('li').children('ul').slideToggle();
		e.preventDefault();
	});

	$('#mobile-menu > li.menu-item-has-children > ul > li.menu-item-has-children > a').on("click", function(e){
		$(this).parent('li').children('ul').slideToggle();
		e.preventDefault();
	});

	$('#mobile-secondary-menu > li > a').on("click", function(e){
		$(this).parent('li').children('ul').slideToggle();
	});

	var linksArr = $("#mobile-menu li.menu-item-has-children");
	
	for(var i=0; i < linksArr.length; i++) {
		var link = linksArr[i].firstChild.href;
		var linkTitle = linksArr[i].firstChild.innerHTML;
		//alert(linkTitle);
		$(linksArr[i]).children('ul').prepend('<li><a href="' + link + '">' + linkTitle + '</a></li>');
	}	
	
	/* Services Section on Homepage */
	var siteURL = $('a#logo').attr('href');
	var ImageURL = siteURL+'/wp-content/themes/chime/images/service-icon.gif'
	var Image1URL = siteURL+'/wp-content/themes/chime/images/customer-care-animation.png'
	var Image2URL = siteURL+'/wp-content/themes/chime/images/seasonal-support-animation.png'
	var Image3URL = siteURL+'/wp-content/themes/chime/images/bpo-animation.png'
	
	$('.services-left area[href=#customer-care]').mouseenter(function(){
		$('.services-left img').attr('src',Image1URL);
	});
	$('.services-left area[href=#seasonal-support]').mouseenter(function(){
		$('.services-left img').attr('src',Image2URL);
	});
	$('.services-left area[href=#bpo]').mouseenter(function(){
		$('.services-left img').attr('src',Image3URL);
	});
	
	var clickCheck = 0;
	/*
	$('.services-left area[href=#customer-care]').mouseover(function(){
		clickCheck = 1;
		$('.services-left img').attr('src',Image4URL);
	});
	$('.services-left area[href=#seasonal-support]').mouseover(function(){
		clickCheck = 1;
		$('.services-left img').attr('src',Image2URL);
	});
	$('.services-left area[href=#bpo]').mouseover(function(){
		clickCheck = 1;
		$('.services-left img').attr('src',Image3URL);
	});*/	
	$('.services-left area').mouseleave(function(){
		if(clickCheck==0){
			$('.services-left img').attr('src',ImageURL);
		}
	});
	 
}); /* end of as page load scripts */



/*
 * If jquery needs to be called after the page has loaded completely put your jquery in this funciton. 
 * Within this funtion you can use the namespace $ instead of jQuery
 * ex. use this $('#id') ... NOT jQuery('#id')
*/
(function($){
    $(window).load(function() {
		//parallax scrolling - Skrollr initiate.  need to initiate this once the page loads to make sure all the image heights have been set.
		if(!$("html").hasClass('touch'))
		{		
		  var s = skrollr.init({
		        forceHeight: false,
				render: function(data) {
				      //Debugging - Log the current scroll position.
				      // console.log(data.curTop);
				 }
		  });
		}
    });
})(jQuery);