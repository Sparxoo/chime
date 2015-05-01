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
	$('.services li a').circleType({radius: 170});
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
	
	$('ul.sub-menu').addClass('animated');
	$('.site-header ul.nav li a').mouseover(function(){
		$(this).parent().find('ul').stop().addClass('fadeInDown');
	});
	$('.site-header ul.nav li a').mouseover(function(){
		$(this).parent().siblings().find('ul').removeClass('fadeInDown');
	});
	/*$('.site-header ul.nav li a').mouseleave(function(){
		$(this).parent().find('ul').removeClass('fadeInDown');
	});*/
	 
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
	

	/* Mobile menu javascript */

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
	
	});
	