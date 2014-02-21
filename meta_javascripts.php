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
    <!-- TO DO :
        Minify iscroll, datepicker, bootstrap-switch
        -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>


    <?php 
    // Extentions defined in config

    foreach ($config['extentions'] as $key => $val) { 
        if(is_array($val) == true){?>
        <script src="./assets/js/<?php echo $key ;?>.min.js"></script>
        <script>
            <?php if(!empty($val[1]) && strpos($val[1], "init") == 0){?>
            $(function(){
                init_<?php echo substr($val[1], 5) ;?>();
            })
            <?php } ?>
        </script>
    <?php 
        }
    } ?>
    <!-- Protostrap -->
    <script src="./assets/js/protostrap.js?time=<?php time();?>"></script>
    <script>
        <!-- Inline Scripts that need PHP --> 
        

    </script>
    <!-- ADD your other login to main.js -->
    <script src="./assets/js/main.js?time=<?php time();?>"></script>