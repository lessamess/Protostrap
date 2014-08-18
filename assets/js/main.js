
    $(function(){
        // PUT YOUR JAVASCRIPT HERE BELOW

        //livesearch example
        $('.typeahead').typeahead({
              source: ['foo bar','foo fighters','a fools errand','football'],
              limit: 10,
              updater: function(item){
                // Do things when selected
                // console.log(item);
                return item;
              }
        });

        // $( ".typeahead" ).change(function() {
        //     console.log($(this).val());
        // });


        // Datepicker
        $('.input-group.date, .date').datepicker({
            language: "en",
            orientation: "auto left",
            format: "dd.mm.yyyy",
            autoclose: true,
            todayHighlight: true
        });

    })