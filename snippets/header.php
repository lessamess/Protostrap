<?php
    // Define Navigation keys
    // You can use one of these keys on the pages that include the navigation
    // to specify which item should be active by setting $activeNavigation

    $navKeys = ["one","two"];

    // Leave next line alone
    $navClasses = getNavclasses($navKeys, $activeNavigation);
?>
<div class="row">
    <div class="col-md-12">
        <header role="banner" class="navbar navbar-default navbar-fixed-top ">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#headernav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/"><?= $brand;?></a>
            </div>
            <nav role="navigation" class="collapse navbar-collapse " id="headernav" >
              <ul class="nav navbar-nav">
                <li  class="<?php echo $navClasses[0];?>">
                  <a href="javascript:void(0);">One</a>
                </li>
                <li  class="<?php echo $navClasses[1];?>">
                  <a href="javascript:void(0);">Two</a>
                </li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:void(0)">Action</a></li>
                    <li><a href="javascript:void(0)">Another action</a></li>
                    <li><a href="javascript:void(0)">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)">Separated link</a></li>
                  </ul>
                </li>
                <li  class="">
                    <span class="form">
                        <!--
                        Typeahead
                        Change Data in assets/js/main.js
                        Documentation: https://github.com/bassjobsen/Bootstrap-3-Typeahead -->
                        <input type="text" class="form-control typeahead" name="mytypeahead" placeholder="Typeahead (Try: foo)">
                    </span>
                </li>
                <li  class="">
                    <span>
                        Unlinked Text
                    </span>
                </li>
              </ul>
              <?php if(!empty($loggedIn)) { ?>
                  <ul class="nav navbar-nav navbar-right">
                      <li class="" ><a href="" class="" ><i class="fa fa-user"></i> <?= $activeUser['fullName'] ." - ". $roles[$activeUser['role']]['name']; ?> </a></li>
                      <li>
                        <a href="index.php?logout=true">Sign out</a>
                      </li>
                  </ul>
                <?php } else { ?>
                  <ul class="nav navbar-nav navbar-right">
                      <li>
                        <a href="login.php">Sign in</a>
                      </li>
                  </ul>
                  <?php }?>
            </nav>
          </div>
        </header>
    </div>
</div>