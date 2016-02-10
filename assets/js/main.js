
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

        //LIVESEARCH EXAMPLE in 3 Parts
                // Documentation: https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md
                // Doc-Passage on datasets: https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md#datasets

            // Part 1: the Matcher Function
            // LEAVE ALONE
            var substringMatcher = function(strs) {
              return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                  if(str.name != undefined ){
                      if (substrRegex.test(str.name)) {
                        matches.push(str);
                      }
                  } else {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                      }
                  }
                });

                cb(matches);
              };
            };

            // Part 2: the Source Data
            var sourcedata = ['foo bar','foo fighters ticket','a fools errand','football'];


            // Part 3: the Livesearch itself

            //
            $('.typeahead').typeahead({
                      highlight: true,
                      minLength: 1
                    },
                    {
                      name: 'mytypeahead',
                      source: substringMatcher(sourcedata),
                      templates: {
                        notFound: '<p class="tt-noentries" ><strong>No entries found</strong></p>',
                        footer: '<p class="tt-footer" ><button class="btn btn-default">Show all results</button></p>',
                        suggestion: function(data){
                              return '<p class="topborder"><strong>' + data + '</strong>  <span class="pull-right">$' +  Math.floor((Math.random() * 100) + 1)  + '.99</span></p>';
                            }
                        }
                    });

        // END OF TYPEAHEAD EXAMPLE

        $(document).bind('keydown','alt+r', function(){
            var url = window.location.href;
            var get = "session_renew=true";
            var start = "?";
            if (url.indexOf("?") >= 0){
                start = "&";
            }
            window.location.href = url+start+get;
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