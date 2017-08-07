jQuery(document).ready(function($){
    // now you can use jQuery code here with $ shortcut formatting
    // this will execute after the document is fully loaded
    // anything that interacts with your html should go here
    wrapperResizer = function() {
        $('.wrapper').each(function(index) {
            var clientWidth = document.documentElement.clientWidth;
            // 35 for sidebar
            $(this).children('img').width(clientWidth/2 - 35);
            var childHeight = $(this).children('img').height();
            $(this).height(childHeight+'px');
        });
    };

    alignElementToContainer = function() {
        $('.pushed__left').each(function(index) {
            var marginToApply = $($('.container').get(0)).css('marginLeft');
            $(this).css('marginLeft', marginToApply)
        });
    };


    $(window).on('load', wrapperResizer);
    $(window).on('resize', wrapperResizer);
    $(window).on('load', alignElementToContainer);
    $(window).on('resize', alignElementToContainer);

    $(window).on('load', function() {
        var c = document.createElement('canvas'),
            ctx = c.getContext('2d'),
            cw = c.width = window.innerWidth,
            ch = c.height = window.innerHeight;

        ctx.lineWidth = 1;
        ctx.strokeStyle = '#929292';

        function drawShape(ctx) {
            ctx.beginPath();
            ctx.moveTo(0, ch/10);
            ctx.bezierCurveTo(0, ch/4, 500, 400, cw*0.8, 1);
            ctx.stroke();
        }

        drawShape(ctx);

        document.body.style.background = 'url(' + c.toDataURL() + ')';
    });
});