    /**
     *   PROTOSTRAP GOODIES - LEAVE ALONE
     */


    var myscroll;

    function init_fastclick(){
        var $window = $(window)
        var totalWidth = 0;
        // initialize fastclick
        window.addEventListener('load', function() {
            new FastClick(document.body);
        }, false);

    }
    function init_datepicker(){
        $('.input-group.date, .date').datepicker({
            language: "de",
            orientation: "auto left",
            format: "dd.mm.yyyy",
            autoclose: true,
            todayHighlight: true
        });
    }

    function init_select(){
        $('.selectpicker').selectpicker();
    }

    function init_typeahead(){
        $('.typeahead').typeahead({
              source: ['foo bar','foo fighters','a fools errand','football'],
              limit: 10
        });
    }

    $(function(){


        // Tooltip if there is any
        $('.ps-tooltip').tooltip();
        $(".ps-tooltip").click(function() {
            setTimeout( function(){
                $('.ps-tooltip').tooltip('hide')}, 2000);
        });

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

        // $('.selectpicker').selectpicker();

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

        $(".filtersearch").focus(function() {
            $('html, body').animate({
                    scrollTop: $(this).offset().top - 10
                }, 500);
            $(".filtersearch-clear i").removeClass('icon-search');
            $(".filtersearch-clear i").addClass('icon-cross');

            $(".filtersearchCount").removeClass("hide");

        });

        $(".filtersearch").blur(function() {
            $(".filtersearch-clear i").removeClass('icon-cross');
            $(".filtersearch-clear i").addClass('icon-search');
        });
        $(".filtersearch-focus").click(function() {
            $(".filtersearch").focus();
        });
        $(".filtersearch-clear").click(function() {
            $(".filtersearch").val('');
            $(".filtersearch").trigger("keyup");
            $(".filtersearch").focus();
        });
        $(".filtersearch, .simpleFilterSearch").keyup(function(){

            jQuery.expr[":"].Contains = jQuery.expr.createPseudo(function (arg) {
                return function (elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
            filtertable = "#filtertable";
            if ($(this).attr("data-filtertable")) {
                //console.log($(this).attr("data-filtertable"));
                filtertable = "#"+ $(this).attr("data-filtertable");
            }


            //hide all the rows
            $(filtertable).find("tr.filterme").hide();

            // Concatenate all Searchterms
            var concat = "";
            $(".simpleFilterSearch").each(function (it, elem) {
                if($(elem).val().length > 0 ){
                    concat = $(elem).val() + " " + concat;
                }
            });

            //split the current value of searchInput
            var data = concat.split(" ");

            //create a jquery object of the rows
            var jo = $(filtertable).find("tr.filterme");

            //Recusively filter the jquery object to get results.
            anzahlRows = 0;
            $.each(data, function(i, v){
                jo = jo.filter("*:Contains('"+v+"')");
                anzahlRows = jo.length;
            });
            //show the rows that match.
            jo.show();
            $(".filtersearchCount").html(anzahlRows);
            //console.log(anzahlRows);

            //Removes the placeholder text
            });

        // select Users to for easy Login
        $(".loginUserselection").click(function() {
            console.log("foo");
            $('#login').val($(this).attr("data-key"));
            $('#loginform').submit();
        });

        //password show toggle
        $(".passwordToggle").click(function() {
            $(this).children('i').toggleClass('fa-square-o');
            $(this).children('i').toggleClass('fa-check-square-o');
            $(this).prev().attr('type', function(id, oldval){
                if (oldval == 'password') {
                    return 'text';
                } else {
                    return 'password';
                }
            })
        });

        $(".checkall").click(function() {
                $("." + $(this).data("class")).prop('checked',$(this).prop('checked'));
        });

    })