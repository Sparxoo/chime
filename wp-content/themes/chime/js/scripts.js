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
	$('.services li a').circleType({radius: 130});
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