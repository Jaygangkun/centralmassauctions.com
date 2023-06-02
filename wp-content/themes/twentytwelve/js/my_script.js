// JavaScript Document

$.noConflict();
jQuery(document).ready(function($) {
	
   jQuery('ul.nav li.dropdown').hover(function() {
	  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
	  jQuery(this).addClass('hover');
	}, function() {
	  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp();
	  jQuery(this).removeClass('hover');
	});
   
   jQuery('#collapse').click(function(){
		jQuery(this).toggleClass('open')
	});

});