
    $(function(){
        // PUT YOUR JAVASCRIPT HERE BELOW

        //livesearch example
        $('.typeahead').typeahead({
              name: 'kunden',
              local: ['boo','bar','bazinga','barrabing'],
              limit: 10
        });

        $('.ps-tooltip').tooltip();
        $(".ps-tooltip").click(function() {
            setTimeout( function(){
                $('.ps-tooltip').tooltip('hide')}, 2000);
        });
    })