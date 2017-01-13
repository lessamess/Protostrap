
    $(function(){
        // PUT YOUR JAVASCRIPT HERE BELOW

        // Datepicker
        $('.input-group.date, .date').datepicker({
            language: "en",
            orientation: "auto left",
            format: "dd.mm.yyyy",
            autoclose: true,
            todayHighlight: true
        });


        $("#socialsecurity").mask("99-99-9999",{placeholder:"__-__-____"});

        $(".mypopover").popover();

        $(".htmlpopover").popover({
            container: 'body',
            html: true,
            template: '<div class="popover fullwidth" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="fullwidth popover-content"></div></div>',
            content: function () {
                var content = $("#"+$(this).data('content-div')).html();
                return content;
            }
        });



    })