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

    function countDown(target){
        var number = Number($("#"+target).html());
        number = Math.ceil(number*0.89);
        $("#"+target).html(number);
    }

    function showTooltip(target, text){
         $(target).attr('data-toggle','tooltip');
         $(target).attr('data-placement','top');
         $(target).attr('data-trigger','click');
         $(target).attr('title', text);


        //and finally show the popover
        $(target).tooltip('show');
        var that = target;
        setTimeout( function(){
                 $(that).tooltip('hide')}, 1500);
    }

    function getUrlParameter(parameter){
        var parameter = parameter;
        var value = false;
        var pageURL = window.location.search.substring(1);
        var variables = pageURL.split('&');
        $.each( variables, function( key, val ) {
            var parameterName = val.split('=');
            if(parameterName[0] == parameter){
                value = parameterName[1];
            }
        });
        return(value);
    }

    // Read a page's GET URL variables and return them as an associative array.
    function getAllUrlParameters()
    {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        if(hashes ==  window.location.href){
            return false;
        }
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }


    $(function(){

        // Carousel if there is any
        $('.carousel').carousel(
            {interval: 0}
        );

        $('.btn-spinner').on('click', function() {
          // keep width of button
          var width = $(this).outerWidth();
          $(this).css("width", width+"px");
          // spinner markup
          var spinner = "<i class=\"fa fa-spinner fa-spin\"></i>";
          // original button label
          var tmpContent = $(this).html();
          // show spinner
          $(this).html(spinner);
          // make scope for timeout function
          var that = $(this);
            setTimeout(function() {
               // rollback
               $(that).html(tmpContent);
           }, 1000);
        });

        $(".fakeReload").click(function() {
            var spinnerMarkup = "<div class=\" align-center\">";
            spinnerMarkup += "    ";
            spinnerMarkup += "    <i class=\"fa fa-spinner fa-spin fa-3x\"></i>";
            spinnerMarkup += "    <br><br><br>";
            spinnerMarkup += "</div>";
            var target = $(this).data("target");
            var tmpContent = $("#"+target).html();
            $("#"+target).html(spinnerMarkup);
            setTimeout(function(){
                $("#"+target).html(tmpContent);
            },1000);
        });

        $('.tooltiptrigger').tooltip({trigger: "click"});
        $(".tooltiptrigger").click(function() {
            if($(this).data("hide") != undefined){
                var delay = $(this).data("hide");
                var that = this;
                setTimeout( function(){
                    $(that).tooltip('hide')}, delay);
            }
        });

        $(".trigger").click(function() {
            var group = $(this).data("group");
            var item = $(this).data("item");
            $("."+group).addClass("hide");
            $("."+group+"-" + item).removeClass("hide");
        });



        $(".copyToClipboard").click(function() {
            var target = $(this).data("target");
            var text = $("#"+target).html();
            $('<div style="opacity:0"><textarea id="textarea'+target+'">'+text+'</textarea></div>').appendTo("body");
            $("#textarea"+target).select();
            document.execCommand('copy');
            $("#textarea"+target).remove();
            showTooltip(this, "Copied to Clipboard");
        });

        $(".showHide").click(function() {
            if($("#"+$(this).data("show")).hasClass("hide")){
                $("#"+$(this).data("show")).css("display", "none").removeClass("hide");
            }
            $("#"+$(this).data("show")).toggle("slow");
            $("#"+$(this).data("hide")).toggle("slow");
        });


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

            if(this.checked){

                $("#hidden" + this.id ).val($(this).attr('data-checked'));
            } else {


                $("#hidden" + this.id ).val($(this).attr('data-unchecked'));

            }
          });

        $(".filterSearch").keyup(function(){

            jQuery.expr[":"].Contains = jQuery.expr.createPseudo(function (arg) {
                return function (elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });


            filtertable = false;
            tmpTable = $(this).parent();
            while(filtertable == false){
                if($(tmpTable).hasClass("filterTable")){
                    filtertable = tmpTable;
                }
                tmpTable = $(tmpTable).parent();
            }

            //hide all the rows
            $(filtertable).find("tr.filterme").hide();

            // Concatenate all Searchterms
            var concat = "";
            $(".filterSearch").each(function (it, elem) {
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
            //

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


        $(".selectOnFocus").focus(function() {
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


        var getToggleSinglePrimaryParent = function(el){
            tpmParent = $(el).parent();
            while(!$(tpmParent).hasClass("toggleSinglePrimary")){
                tpmParent = $(tpmParent).parent();
            }
            return tpmParent;
        }

        $("body").on("click",".toggleSinglePrimary .btn", function() {
            var removePrimary = false;
            if($(this).hasClass("btn-primary")){
                removePrimary = true;
            }


            var parent = getToggleSinglePrimaryParent($(this));
            $(parent).find(".btn-primary").removeClass("btn-primary");
            $(this).addClass("btn-primary");
            if(removePrimary == true){
                $(this).removeClass("btn-primary");
            }
        });

        $("body").on("click",".toggleMultiPrimary .btn", function() {
            $(this).toggleClass("btn-primary");
        });

        $(".btn-togglePrimary").click(function() {

            $(this).toggleClass("btn-primary");
            var icon = $(this).find("i").first();
            if($(icon).hasClass("fa-heart-o")){
                $(icon).removeClass("fa-heart-o");
                $(icon).addClass("fa-heart");
                return;
            }
            if($(icon).hasClass("fa-heart")){
                $(icon).removeClass("fa-heart");
                $(icon).addClass("fa-heart-o");
                return;
            }
            if($(icon).hasClass("fa-star-o")){
                $(icon).removeClass("fa-star-o");
                $(icon).addClass("fa-star");
                return;
            }
            if($(icon).hasClass("fa-star")){
                $(icon).removeClass("fa-star");
                $(icon).addClass("fa-star-o");
                return;
            }
            if($(icon).hasClass("fa-user-o")){
                $(icon).removeClass("fa-user-o");
                $(icon).addClass("fa-user");
                return;
            }
            if($(icon).hasClass("fa-user")){
                $(icon).removeClass("fa-user");
                $(icon).addClass("fa-user-o");
                return;
            }
        });

        $(".btn-onCard.bottomRight, .btn-onCard.bottomLeft").each(function (it, elem) {
            var imgheight = $(elem).siblings("img").first().height();
            var top = imgheight -  10 - $(elem).outerHeight();
            $(elem).css("top", top);
        });


        $(document).bind('keydown','alt+r', function(){
            var url = window.location.href;
            var get = "session_renew=true";
            var start = "?";
            if (url.indexOf("?") >= 0){
                start = "&";
            }
            window.location.href = url+start+get;
        });

        $(".showpopover").click(function() {

            $('#popoversuccess').popover('show')
            setTimeout(function(){
                $("#popoversuccess").popover("hide");
            },2000);
        });



        $(".countDown").click(function() {
            var target = $(this).data("target");
            countDown(target);
        });


        $(".scrollTo").click(function() {
            var scrollTo = $(this);
            var offset = 10;

            if($(this).data("scrollto") != undefined){
                scrollTo = $("#"+$(this).data("scrollto"));
            }
            if($(this).data("offset") != undefined){
                offset = $(this).data("offset")
            }
            $('html, body').animate({
                scrollTop: $(scrollTo).offset().top-offset
            }, 600);
            event.preventDefault();
        });

    })