// JavaScript Document
$(document).ready(function() {
    $('#autoWidth').lightslider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });