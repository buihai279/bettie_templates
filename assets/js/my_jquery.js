$( document ).ready(function() {
  	$("#menu-main-menu>.menu-item-has-children").hover(
  		  function () {
  		    $(this).addClass('sfHover');
  		    $(".sfHover > ul.sub-menu") .css( "display", "block" );
  		  }, 
  		  function () {
  		    $(".sfHover > ul.sub-menu") .css( "display", "none" );
  		    $(this).removeClass('sfHover');
  		  }
    	);
  	$(".menu-item-has-children> ul.sub-menu > .menu-item-has-children").hover(
  		  function () {
  		    $(this).addClass('sfHover');
  		    $(".menu-item-has-children> ul.sub-menu>.sfHover > ul.sub-menu").css( "display", "block" );
  		  }, 
  		  function () {
  		    $(".menu-item-has-children> ul.sub-menu>.sfHover > ul.sub-menu").css( "display", "none" );
  		    $(this).removeClass('sfHover');
  		  }
    	);
});
$( document ).ready(function() {
  $('#hamburger-button').click(function() {
    $('.hamburger-area').addClass('opened');
    $('.hamburger-area').slideToggle();
    $("ul.sub-menu").css( "display", "block" );
  });
});
// .menu
$(document).ready(function(){
        $(window).scroll(function(){
          if ($(this).scrollTop() > 100) {
            $('#back-top').fadeIn();
          } else {
            $('#back-top').fadeOut();
          }
        });
        $('#back-top').click(function(){
          $('html, body').animate({scrollTop : 0},600);
          return false;
        });
});
$( document ).ready(function() {
    $(window).on('scroll', function() {
        if ( $(this).scrollTop() >= 100) {
           $('body').addClass('menu_fixed');
        }else{
           $('body').removeClass('menu_fixed');
        }
    });
});
$( document ).ready(function() {
   $('.loader-wrapper').css('display', 'none');
});
$("a[href!='#']").click(function() {
  $('.loader-wrapper').css('display', 'block');
});