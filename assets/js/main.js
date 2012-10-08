    var myscroll;
    $(function(){
        // Some Protostrap goodies
        // Generate Placeholder images
        $('img[data-ph]').tsPlaceHold();

        // initialize fastclick
        window.addEventListener('load', function() {
            new FastClick(document.body);
        }, false);

        if($('#breadcrumbwrapper').length > 0){
            var totalWidth = 0;
            $('#breadcrumbwrapper ul li').each(function (id, element) {
                totalWidth += $(element).outerWidth(true);
            });
            $('#breadcrumbwrapper ul').css('width', totalWidth + 'px');

            myScroll = new iScroll('breadcrumbwrapper', { hScrollbar: false, vScrollbar: false, hScroll: true, vScroll: false });
            myScroll.scrollToElement('li.active');
            console.log(myScroll);
        }

      // PUT YOUR JAVASCRIPT HERE BELOW
    })