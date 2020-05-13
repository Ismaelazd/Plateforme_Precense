$(document).ready(function() {
  
    $(window).scroll(function () {
        //if you hard code, then use console
        //.log to determine when you want the 
        //nav bar to stick.  
   
   
        var header = document.getElementById("profilHeader");
  var nav = document.getElementById("header");
  
        
      if ($(window).scrollTop() > header.offsetHeight) {
        $('#header').addClass('navbar-fixed');
        
      }
      if ($(window).scrollTop() < header.offsetHeight) {
        $('#header').removeClass('navbar-fixed');
        
      }
    });
  });