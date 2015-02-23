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


    <!-- jQuery and Bootstrap -->
    <?php $csd = dirname(__FILE__);    ?>
    <script>
        <?php include($csd."/../assets/js/jquery.js");?>
        <?php include($csd."/../assets/js/bootstrap.min.js");?>
    </script>
    <!-- ADD 2 Home -->
    <script >
        <?php include($csd."/../assets/js/add2home.min.js");?>
    </script>

    <!-- Typeahead -->
    <script >
        <?php include($csd."/../assets/js/bootstrap-typeahead.min.js");?>
    </script>

    <!-- Datepicker -->
    <script >  <?php include($csd."/../assets/js/bootstrap-datepicker.min.js");?> </script>

    <!-- Bootstrap Select -->
    <script >  <?php include($csd."/../assets/js/bootstrap-select.min.js");?> </script>

    <!-- File Input -->
    <!-- http://gregpike.net/demos/bootstrap-file-input/demo.html -->
    <script >  <?php include($csd."/../assets/js/bootstrap-file-input.min.js");?> </script>

    <!-- Switch -->
    <!-- http://www.bootstrap-switch.org -->
    <script >  <?php include($csd."/../assets/js/bootstrap-switch.min.js");?> </script>

    <!-- Sortable -->
    <script >  <?php include($csd."/../assets/js/jquery-sortable.min.js");?> </script>

    <!-- Hotkeys -->
    <script >  <?php include($csd."/../assets/js/jquery.hotkeys.js");?> </script>

    <!-- Fastclick -->
    <script >  <?php include($csd."/../assets/js/fastclick.min.js");?> </script>






    <!-- Protostrap -->
    <script >  <?php include($csd."/../assets/js/protostrap.js");?> </script>
    <script>
        <!-- Inline Scripts that need PHP -->


    </script>
    <!-- ADD your other login to main.js -->
    <script src="<?php echo $pathToAssets ;?>assets/js/main.js?time=<?php time();?>"></script>