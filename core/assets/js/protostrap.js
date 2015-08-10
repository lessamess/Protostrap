    /**
     *   PROTOSTRAP GOODIES - LEAVE ALONE
     */


    // Define Datepicker Languages
    $.fn.datepicker.dates['de'] = {
        days: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag"],
        daysShort: ["Son", "Mon", "Die", "Mit", "Don", "Fre", "Sam", "Son"],
        daysMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"],
        months: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
        monthsShort: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
        today: "Heute",
        clear: "Löschen",
        weekStart: 1,
        format: "dd.mm.yyyy"
    }
    $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"],
        daysMin: ["D", "L", "Ma", "Me", "J", "V", "S", "D"],
        months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        monthsShort: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jui", "Jul", "Aou", "Sep", "Oct", "Nov", "Déc"],
        today: "Aujourd'hui",
        clear: "Effacer",
        weekStart: 1,
        format: "dd.mm.yyyy"
    };
    $.fn.datepicker.dates['it'] = {
        days: ["Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato", "Domenica"],
        daysShort: ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab", "Dom"],
        daysMin: ["Do", "Lu", "Ma", "Me", "Gi", "Ve", "Sa", "Do"],
        months: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
        monthsShort: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"],
        today: "Oggi",
        clear: "Cancella",
        weekStart: 1,
        format: "dd.mm.yyyy"
    };
    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        clear: "Cancela",
        weekStart: 1,
        format: "dd.mm.yyyy"
    };

    // File input


    // Switch


    function updateSessionVar(type, varname, val){
        $.get('core/updateSessionVar.php?type=' + type + '&varname=' + varname + '&val=' + val, function(data){
            return;
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

        });

        // select Users to for easy Login
        $(".loginUser").click(function() {
            $('#login').val($(this).attr("data-key"));
            $('#loginform').submit();
        });

        $(".loginFirstUser").click(function() {
            if($('#login').val().length == 0 ){
                $('#login').val($(this).attr("data-key"));
            }
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


        $(".selectOnClick").focus(function() {
            $(this).select();
        });

        $(".stepper .btn-next").click(function() {
            var nextId = $(this).attr("data-nextid");
            var thisId = parseInt(nextId) - 1;

            // Tabs
            $("#step-tab-" + thisId).removeClass("active");
            $("#step-tab-" + thisId).addClass("complete");
            $("#step-tab-" + nextId).addClass("active");
            //Badge in Tabs
            $("#badge" + thisId).removeClass("label-info");
            $("#badge" + thisId).addClass("label-success");
            $("#badge" + nextId).removeClass("label-default");
            $("#badge" + nextId).addClass("label-info");
            // Panes
            $("#step" + thisId).removeClass("active");
            $("#step" + nextId).addClass("active");

       });

       $(".stepper .btn-prev").click(function() {
            var prevId = parseInt($(this).attr("data-previd"));
            var thisId = prevId + 1;
            console.log(prevId);
            console.log(thisId);

            if(prevId == 1){
                $(".complete").removeClass("complete");
                $(".label-success").removeClass("label-success");
                $("#step-tab-6" + thisId).removeClass("active");
                $("#step6").removeClass("active");

            }

            // Tabs
            $("#step-tab-" + thisId).removeClass("active");
            $("#step-tab-" + prevId).removeClass("complete");
            $("#step-tab-" + prevId).addClass("active");
            //Badge in Tabs
            $("#badge" + thisId).removeClass("label-info");
            $("#badge" + thisId).addClass("label-default");
            $("#badge" + prevId).removeClass("label-success");
            $("#badge" + prevId).addClass("label-info");
            // Panes
            $("#step" + thisId).removeClass("active");
            $("#step" + prevId).addClass("active");
       });


        $("body").on("click",".toggleSinglePrimary .btn", function() {
            var removePrimary = false;
            if($(this).hasClass("btn-primary")){
                removePrimary = true;
            }
            $(this).siblings().removeClass("btn-primary active");
            $(this).addClass("btn-primary active");
            if(removePrimary == true){
                $(this).removeClass("btn-primary active");
            }
        });

        $("body").on("click",".toggleMultiPrimary .btn", function() {
            $(this).toggleClass("btn-primary");
        });


    })