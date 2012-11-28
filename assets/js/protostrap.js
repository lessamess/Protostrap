    var myscroll;
    $(function(){
        /**
         *   PROTOSTRAP GOODIES - LEAVE ALONE
         */

        var $window = $(window)

        var totalWidth = 0;

        // initialize fastclick
        window.addEventListener('load', function() {
            new FastClick(document.body);
        }, false);

        // Generate Placeholder images
        $('img[data-ph]').tsPlaceHold();

        // Carousel if there is any
        $('.carousel').carousel(
            {interval: 0}
        );

        // Affix if there is any
        if($('#breadcrumbwrapper').length > 0){
            $('#breadcrumbwrapper ul li').each(function (id, element) {
                totalWidth += $(element).outerWidth(true);
            });
            $('#breadcrumbwrapper ul').css('width', totalWidth + 'px');

            myScroll = new iScroll('breadcrumbwrapper', { hScrollbar: false, vScrollbar: false, hScroll: true, vScroll: false });
            myScroll.scrollToElement('li.active');
        }
    })