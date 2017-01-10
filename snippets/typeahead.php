//TYPEAHEAD EXAMPLE in 3 Parts
    // Documentation: https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md
    // Doc-Passage on datasets: https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md#datasets

    // Part 1: the Matcher Function
    // LEAVE ALONE
    var substringMatcher=function(e){return function(t,s){var n;n=[],substrRegex=new RegExp(t,"i"),$.each(e,function(e,t){void 0!=t.name?substrRegex.test(t.name)&&n.push(t):substrRegex.test(t)&&n.push(t)}),s(n)}};

    // Part 2: the Source Data
    var sourcedata = {
        0: {name:'foo bar', price:'6.99'},
        1: {name:'foo fighters ticket', price:'12.49'},
        2: {name:'a fools errand', price:'18.00'},
        3: {name:'football', price:'26.49'}
    };


    // Part 3: the Typeahead itself

    // Typeahad options
    $('.typeahead').typeahead({
      highlight: true,
      minLength: 1
    },

    // Typeahead source and templates
    {
      source: substringMatcher(sourcedata),
      templates: {
        notFound: '<p class="tt-noentries" ><strong>No entries found</strong></p>',
        footer: '<p class="tt-footer" ><button class="btn btn-default">Show all results</button></p>',
        suggestion: function(data){
              return '<p class="topborder"><strong>' + data.name + '</strong>  <span class="pull-right">$' + data.price  + '</span></p>';
            }
        }
    })

    // Typeahead callback
    .on('typeahead:selected', function (event, selected) {
        console.log(selected.name);
    });

// END OF TYPEAHEAD EXAMPLE