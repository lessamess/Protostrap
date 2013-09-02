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
        $(".dynForm").click(function(el) {
            $("." + $(this).attr("data-toggle-class")).toggle();
        });

        $("select.dynForm").change(function(el) {

            $(".dynFormGroup").hide();
            $("." + $("select option:selected").attr("data-toggle-class")).toggle();

        });

        $('.selectpicker').selectpicker();

        // Manage checkbox handling for session data
        $('.sessionCheckbox').click(function(){
            console.log(this);
            if(this.checked){
                console.log("c");
                $("#hidden" + this.id ).val($(this).attr('data-checked'));
            } else {

                console.log("u");
                $("#hidden" + this.id ).val($(this).attr('data-unchecked'));

            }
          });


        $("#filtersearch").keyup(function(){

            jQuery.expr[":"].Contains = jQuery.expr.createPseudo(function (arg) {
                return function (elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
            filtertable = "#filtertable";
            if ($(this).attr("data-filtertable")) {
                filtertable = $(this).attr("data-filtertable");
            }


            //hide all the rows
            $(filtertable).find("tr").hide();

            //split the current value of searchInput
            var data = this.value.split(" ");

            //create a jquery object of the rows
            var jo = $(filtertable).find("tr");

            //Recusively filter the jquery object to get results.
            $.each(data, function(i, v){
            jo = jo.filter("*:Contains('"+v+"')");
            });
            //show the rows that match.
            jo.show();
            //Removes the placeholder text
            });
    })