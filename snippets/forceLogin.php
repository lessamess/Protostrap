<?php
$roles = $GLOBALS['roles'];
$livesearch = $GLOBALS['livesearch'];
$brand = $GLOBALS['brand'];
$application = $GLOBALS['application'];?>

<body>
        <div class="container">

            <br>
            <h1><?php echo $GLOBALS['brand'];?></h1>
            <div class="row">
                <span class="col-md-3">
                    <h3>Sign in</h3>

                    <form action='' method='post' id="loginform">
                        <input id="login" name='login' class='form-control' type='text' placeholder='Username'><br>

                        <button type='submit' class='btn-block btn btn-primary'>Sign in</button>

            </form>

                </span>
                <span class="col-md-3">

                </span>
                <span class="col-md-6">

                <h4>User-Roles</h4>
                    Click the following to log in as:<br>
                    <?php foreach($users as $key => $user){ ?>
                        <strong><a href="javascript:void(0);" class="loginUserselection" data-key="<?= $user['email'];?>"><?= $roles[$user['role']]['name']; ?></a></strong><br>

                        <?php }?>

                </span>


            </div>
            <br><br>
            <?php // this includes the footer
            include('./snippets/footer.php');?>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php

        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('meta_javascripts.php');?>
  </body>
</html>
<?php die(); ?>
