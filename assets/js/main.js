
    $(function(){

        /* 
            This file initializes a few elements by default 
            Feel free to remove them if not needed
        */

        // Datepicker
        $('.input-group.date, .date').datepicker({
            language: "en",
            orientation: "auto left",
            format: "dd.mm.yyyy",
            autoclose: true,
            todayHighlight: true
        });

        // an example for a mask
        $("#socialsecurity").mask("99-99-9999",{placeholder:"__-__-____"});


        // initialise Popvers and let them close after 2 seconds if they have the class autoclose
        $('[data-toggle="popover"]').popover();

        $('.autoclose[data-toggle="popover"]').on('shown.bs.popover', function () {
          setTimeout(function () {
                $('.autoclose[data-toggle="popover"]').popover('hide');
            }, 2000);
        });

        // initialise tooltips and let them close after 2 seconds
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="tooltip"]').on('shown.bs.tooltip', function () {
          setTimeout(function () {
                $('[data-toggle="tooltip"]').tooltip('hide');
            }, 2000);
        });

        $(".htmlpopover").popover({
            container: 'body',
            html: true,
            template: '<div class="popover fullwidth" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="fullwidth popover-content"></div></div>',
            content: function () {
                var content = $("#"+$(this).data('content-div')).html();
                return content;
            }
        });


        // PUT YOUR JAVASCRIPT HERE BELOW






    })