
    $(function(){
        // PUT YOUR JAVASCRIPT HERE BELOW

        //livesearch example
        $('.typeahead').typeahead({
              source: ['foo bar','foo fighters','a fools errand','football'],
              limit: 10
        });

        $('.ps-tooltip').tooltip();
        $(".ps-tooltip").click(function() {
            setTimeout( function(){
                $('.ps-tooltip').tooltip('hide')}, 2000);
        });
    })