$( document ).ready(function() {
    config();
    $(window).resize(function() {
        config();
    });
});
function config() {
     var marginTop=[];
     var heightArr=[];
     var topArr=[];
     var width_masonry=$('.masonry-layout').width();
     // alert(width_masonry);
     // alert($(window).width());
    if ($('.masonry-layout').width()<=750&&$(window).width()<994) {
        $('.masonry-layout .brick').each(function(index) {
            heightArr[index]=$(this).height();
            if (index==0) {
                $(this).css('top', '0px');
                topArr[index]=parseInt($(this).css('top'));
            }else{
                $(this).css('top', heightArr[index-1]+topArr[index-1]);
                topArr[index]=parseInt($(this).css('top'));
            }
            $('.masonry-layout .brick').css({
                left: '0px',
                width:width_masonry
            });
        });
    }else{
        $('.masonry-layout .brick').each(function(index) {
            heightArr[index]=$(this).height();
            var widthParent=$(this).parent().width();
            if (index%2==0) {
                $(this).css('left', '0px');
            }else{
                $(this).css('left', widthParent/2);
            }
            if (index<=1) {
                $(this).css('top', '0px');
                topArr[index]=parseInt($(this).css('top'));
            }else{
                marginTop[index]=heightArr[index-2]+topArr[index-2];
                $(this).css('top',marginTop[index]);
                topArr[index]=parseInt($(this).css('top'));
            }
        });
    }
    var last=parseInt($('.masonry-layout .brick').last().css('top'))+parseInt($('.masonry-layout .brick').last().css('height'));
    $('.masonry').css('height',last);
}
