
    $(function(){
        // PUT YOUR JAVASCRIPT HERE BELOW
        
        //livesearch example
        $('.livesearch').typeahead({
            // note that "value" is the default setting for the property option
            source: [
                'Typography Guidelines And References',
                'Web Typography: Educational Resources, Tools and Techniques',
                'Vintage and Retro Typography Showcase',
                'Typography Is The Foundation Of Web Design',
                'When Typography Speaks Louder Than Words'
            ],
            items: 4,
            onselect: function(obj) { window.location.href = "bank_home.php?ort="+obj; }
        }
    );
        
         


    })