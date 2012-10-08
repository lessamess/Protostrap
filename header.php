
<div class="row">
            <span class="pile200 left">
                <!-- The following generates a placeholder svg image -->
                <img data-ph="160:60:Logo:fixedsize" />
            </span>
            <span class="pile80 ">
                <?php if (!empty($loggedIn)){ ?>
                <!-- user is Logged in -->
                    <ul class="nav nav-pills pull-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user"></i> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu pull-right needsclick" style="right:0">
                                <li>
                                    <form action="" method="post">
                                        <input type="hidden" name="logout" value="logout">
                                        <button type="submit" name="" class="btn btn-primary ">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                 <?php } else {
                    ?>
                <!--  User is not logged in -->
                    <a href="./account.php" class="" >Login</a>
                <?php }?>
            </span>
</div>