    <!-- ADD ADDITIONAL FILES AT THE BOTTOM OF THE PAGE -->

    <script type="text/javascript">
        (function(document,navigator,standalone) {
            // prevents links from apps from oppening in mobile safari
            // this javascript must be the first script in your <head>
            if ((standalone in navigator) && navigator[standalone]) {
                var curnode, location=document.location, stop=/^(a|html)$/i;
                document.addEventListener('click', function(e) {
                    curnode=e.target;
                    while (!(stop).test(curnode.nodeName)) {
                        curnode=curnode.parentNode;
                    }
                    // Condidions to do this only on links to your own app
                    // if you want all links, use if('href' in curnode) instead.
                    // if('href' in curnode && ( curnode.href.indexOf('http') || ~curnode.href.indexOf(location.host) ) ) {
                    // Note by Memi Beltrame: I added the part after && to make sure this is only executed when the actual page is changed
                    if('href' in curnode && curnode.host+curnode.pathname != location.host+location.pathname)  {
                        e.preventDefault();
                        location.href = curnode.href;
                    }
                },false);
            }
        })(document,window.navigator,'standalone');
    </script>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/angular.min.js"></script>
    <script src="./assets/js/bootstrap-carousel.js"></script>
    <script src="./assets/js/bootstrap3-typeahead.min.js"></script>
    <script src="./assets/js/jquery.svg.placeholder.js"></script>
    <script src="./assets/js/add2home.js"></script>
    <script type='application/javascript' src='./assets/js/fastclick.js'></script>
    <script type='application/javascript' src='./assets/js/iscroll.js'></script>
    <script src="./assets/js/bootstrap-datepicker.js"></script>
    <script src="./assets/js/bootstrap-fileupload.min.js"></script>
    <script src="./assets/js/bootstrapSwitch.js"></script>
    <script src="./assets/js/jquery.sortable.min.js"></script>
    <script src="./assets/js/protostrap.js?time=<?php time();?>"></script>
    <script>
        

    </script>

    <!-- ADD ADDITIONAL FILES AT THE BOTTOM -->
    <script src="./assets/js/main.js?time=<?php time();?>"></script>