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

    <script src="<?php echo $pathToAssets ;?>core/assets/js/combined.js?time=<?php time();?>"></script>
    <script>
        <!-- Inline Scripts that need PHP -->
        $(function(){
        <?php
        foreach ($config['assets'] as $key => $asset) {
            if($asset['load'] != 1){continue;}
            if($asset['init'] != ""){
                echo $asset['init']. ";\n";
            }
        } ?>

        })

    </script>
    <!-- ADD your other login to main.js -->
    <script src="<?php echo $pathToAssets ;?>assets/js/main.js?time=<?php time();?>"></script>