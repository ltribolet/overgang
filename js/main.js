jQuery(document).ready(function($){
    var wrapperResizer = function() {
        $('.wrapper').each(function(index) {
            var $this = $(this);
            if ($this.hasClass('wrapper_intro')) {
                var parentLeft = $this.offset().left;
                $this.children('img').width($('#secondary').offset().left - parentLeft );
                var childHeight = $this.children('img').height();
                $this.height(childHeight+'px');
            } else {
                // 35 for sidebar
                var clientWidth = document.documentElement.clientWidth;
                $this.children('img').width(clientWidth/2 - 35);
                var childHeight = $this.children('img').height();
                $this.height(childHeight+'px');
            }
        });

        $('.vcard_resize').each(function(index) {
            var $this = $(this);
            $this.width($('#secondary').offset().left - $this.offset().left );
        });
    };

    var alignElementToContainer = function() {
        $('.pushed__left').each(function(index) {
            var marginToApply = $($('.container').get(0)).css('marginLeft');
            $(this).css('marginLeft', marginToApply)
        });
    };

    var computeProgress = function () {
        $(window).scroll(function () {
           var s = $(window).scrollTop(),
            w = $(window).height(),
            $root = $('.root'),
            c = $root.height();
        
            $('#secondary').toggleClass('locked', s + w > c);
            var latesth1 = getLatestH1Visible(s+w);
            updateSidebar(latesth1);
        });
    };

    var h1positions = [];

    var computeh1positions = function() {
        $('.post_content h1').each(function(index) {
            var $this = $(this);

            h1positions[$this.attr('id')] = $this.offset().top;
        });
    };

    var getLatestH1Visible = function (windowScrollTop) {
        var latesth1visible = null;
        for (var h1id in h1positions) {
            if (h1positions[h1id] < windowScrollTop) {
                latesth1visible = h1id;
            }
        }

        return latesth1visible;
    };

    var updateSidebar = function (availableh1) {
        var $chapter = $('.chapter-sidebar'),
            $default = $('.default-sidebar');

        if (availableh1 === null) {
            $chapter.hide();
            $default.show();
            return true;
        }

        $default.hide();
        $chapter.show();

        $('.chapter-sidebar__current > div').html($('#'+availableh1).html());
    };

    var loaderScreen = function () {
        setTimeout(function(){
            $('body').addClass('loaded');
        }, 3000);
    };

    $(window).on('load', wrapperResizer);
    $(window).on('resize', wrapperResizer);
    $(window).on('load', alignElementToContainer);
    $(window).on('resize', alignElementToContainer);
    $(window).on('load', computeProgress);
    $(window).on('resize', computeProgress);
    $(window).on('load', computeh1positions);
    $(window).on('resize', computeh1positions);
    $(window).on('load', loaderScreen);

    $('#drop_menu').on('click', function() {
        $('#drop_menu_list').toggleClass('invisible');
    });

    $('.archive_item').hover(function () {
        var bgcolor_begin = $(this).data('bgcolor-begin'),
            bgcolor_end = $(this).data('bgcolor-end'),
            $this = $(this);

        $this.removeClass('inactive_item');

        $('.inactive_item').each(function() {
            $(this).css('opacity', '0.7');
        });

        bgcolor = 'linear-gradient(to left top, '+bgcolor_end+',  '+bgcolor_begin+')'
        $('.site-content').css('background', bgcolor);
    }, function () {
        var $this = $(this);

        $('.inactive_item').each(function() {
            $(this).css('opacity', '1');
        });
        $this.addClass('inactive_item');

        $('.site-content').css('background', '#fff');
    });

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

    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
                &&
                location.hostname === this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                    });
                }
            }
        });
});