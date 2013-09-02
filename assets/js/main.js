
    $(function(){
        // PUT YOUR JAVASCRIPT HERE BELOW

        //livesearch example
        $('.typeahead').typeahead({
            // note that "value" is the default setting for the property option
            source: [
                'Typography Guidelines And References',
                'Web Typography: Educational Resources, Tools and Techniques',
                'Vintage and Retro Typography Showcase',
                'Typography Is The Foundation Of Web Designn',
                'When Typography Speaks Louder Than Words'
            ],
            items: 4,
            onselect: function(obj) { window.location.href = "documentation_main.php?choice="+obj; }
        }
    );

        $('.ps-tooltip').tooltip();
        $(".ps-tooltip").click(function() {
            setTimeout( function(){
                $('.ps-tooltip').tooltip('hide')}, 2000);
        });
    })