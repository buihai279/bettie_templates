var mainslider;
var sliding = false;
$(document).ready(function(){

    var options = {
        slides: '.cameraContent', // The name of a slide in the slidesContainer
        swipe: false,    // Add possibility to Swipe > note that you have to include touchSwipe for this
        transition: "fade", // Accepts "slide" and "fade" for a slide or fade transition
        slideTracker: true, // Add a UL with list items to track the current slide
        slideTrackerID: 'slideposition', // The name of the UL that tracks the slides
        slideOnInterval: false, // Slide on interval
        interval: 2000, // Interval to slide on if slideOnInterval is enabled
        animateDuration: 1000, // Duration of an animation
        animationEasing: 'ease', // Accepts: linear ease in out in-out snap easeOutCubic easeInOutCubic easeInCirc easeOutCirc easeInOutCirc easeInExpo easeOutExpo easeInOutExpo easeInQuad easeOutQuad easeInOutQuad easeInQuart easeOutQuart easeInOutQuart easeInQuint easeOutQuint easeInOutQuint easeInSine easeOutSine easeInOutSine easeInBack easeOutBack easeInOutBack
        pauseOnHover: false, // Pause when user hovers the slide container
        magneticSwipe: true, // This will attach the slides to the mouse's position when swiping/dragging
        neverEnding: true // Enable this to create a 'neverending' effect.
    };
    $(".cameraContents").simpleSlider(options);
    mainslider = $(".cameraContents").data("simpleslider");
    $(".cameraContents").on("beforeSliding", function(event){
        var prevSlide = event.prevSlide;
        var newSlide = event.newSlide;
        $(".cameraContents .cameraContent[data-index='" + prevSlide + "'] .slidecontent").fadeOut();
        $(".cameraContents .cameraContent[data-index='" + newSlide + "'] .slidecontent").hide();
        sliding = true;
    });
    $(".cameraContents").on("afterSliding", function(event){
        var prevSlide = event.prevSlide;
        var newSlide = event.newSlide;
        $(".cameraContents .cameraContent[data-index='"+newSlide+"'] .slidecontent").fadeIn();
        sliding = true;
    });
    $('.cameraContent .backstretch img').on('dragstart', function(event) { event.preventDefault(); });
    $(".slidecontent").each(function(){
        $(this).css('margin-top', -$(this).height()/2);
    });
});
$(document).ready(function(){
    $(".cameraContents .cameraContent .img-responsive").css("width",$(window).width());
    $(".cameraContents .cameraContent .img-responsive").css("max-width",$(window).width());
    var tmp2=$( ".cameraContents .cameraContent li.cameracurrent").first().find('.img-responsive').height();
    $(".camera_container").css("height",tmp2);
    // alert(tmp2);
    // alert($(window).width());
    $(window).resize(function(){
        configsize();
    });
});
function configsize() {
    $(".img-responsive").css("width",$(window).width);
    $(".img-responsive").css("max-width",$(window).width);
    var tmp2=$( ".cameraContents .cameraContent").eq($("li.cameracurrent").index()).find('.img-responsive').height();
    $(".camera_container").css("height",tmp2);
}
$(document).ready(function() {
    var heightImg=$(window).height();
    $('.cameraContents').css('height',heightImg+30);
});
  $(document).ready(function() {
    $( ".cameraContent" ).each(function( index, element ) {
      var widthWindow=$(window).width();
      var heightEle=$(element).height();
      var heightWindow=$(window).height();
      var marginTop;
      if (heightEle>heightWindow) {
        marginTop=(heightEle-heightWindow)/2;
        $(element).children('.backstretch').children('img').css({'margin-top':-marginTop});
        $(element).children('.backstretch').children('img').css({'margin-bottom':-marginTop});
      }
    });
});

$(document).ready(function(){
    $( "div.camera_prev" ).click(function() {
        // alert(1);
        // obj.nextSlide(slide);
        // simpleslider.prevSlide();
    });
    $( "div.camera_next" ).click(function() {
        // alert(1);
      // simpleslider.nextSlide();
    });
    $( "#cameraContent1" ).css('display','block');
});
