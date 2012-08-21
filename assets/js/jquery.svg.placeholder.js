/*
*   Themestore tsPlaceHold
*   Neil Charlton. Themesto.re
*   Requires jquery 1.7
*   tsPlaceHold is freely distributable under the MIT license.
*
*   Forked By Memi Beltrame to add responsiveness to images
*/

$.fn.tsPlaceHold = function(options) {

        var opts = $.extend({}, $.fn.tsPlaceHold.defaults, options);

        return this.each(function(){
            var $this = $(this);
            $this.hide();
            var parts = $this.attr('data-ph').split(':');

            /*
            *   Do we have an text to display?
            */
            var text = (parts[2]) ? parts[2] : parts[0] + ' X ' + parts[1];

            /*
            *   Calculate the vertical and horizonal position of text
            */
            var vert = (parts[1]/20)*11;
            var horiz = (parts[0]/20)*10;

            /*
            *   We can not dynamically create each element seperately as
            *   jQuery uses the innerHTML property and this doesnt work on SVG
            *   So we have to use this crude string instead
            *
            *   Also crude is the style="height: '+parts[1]+'". that is ony needed becuase safari is buggy
            */
            svg = $('<svg xmlns="http://www.w3.org/2000/svg" version="1.1"  baseProfile="tiny"  preserveAspectRatio="none" style="height: '+parts[1]+'"  viewbox="0 0 '+parts[0]+' '+parts[1]+'" ><rect width="'+parts[0]+'" height="'+parts[1]+'" fill="#ddd" vector-effect="non-scaling-stroke" /><text fill="#666" text-anchor="middle" x="'+horiz+'" y="'+vert+'" style="font-family: Arial; font-size:25px; ">'+text+'</text></svg>');

            /*
            *   Inject into markup with a wrapper to control size nicely
            *   The wrapper is flexible by default. If the tag gets the parameter "fixedsize" a max size is given
            */

            var divWidth = 'auto';
            var divHeight = 'auto';
            if(parts[3] == 'fixedsize'){
                divWidth = parts[0];
                divHeight = parts[1];
            }
            $('<div >').css({
                "width" : divWidth,
                "height" : divHeight,
                "max-width": parts[0] + "px",
                "max-height": parts[1] + "px"
            }).append(svg).insertAfter($this);

            $this.remove();
        });

};