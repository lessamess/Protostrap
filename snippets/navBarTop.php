<?php
// Define Navigation keys
$navigation = ["one","two","three","four","five"];

// LEAVE ALONE
$navbarClasses = Array('','','','','','','','','');
foreach ($navigation as $key => $item){
    if($item == $activeNavigation) {
        $navbarClasses[$key] = "active";
    }
 }
?>

<header role="banner" class="navbar navbar-inverse navbar-fixed-top ">
  <div class="container">
    <div class="navbar-header">
      <button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><?= $brand;?></a>
    </div>
    <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
      <ul class="nav navbar-nav">
        <li  class="<?php echo $navbarClasses[0];?>">
          <a href="#">One</a>
        </li>
        <li  class="<?php echo $navbarClasses[1];?>">
          <a href="#">Two</a>
        </li>
        <li  class="<?php echo $navbarClasses[2];?>">
          <a href="#">Three</a>
        </li>
        <li  class="<?php echo $navbarClasses[3];?>">
          <a href="#">Four</a>
        </li>
        <li  class="<?php echo $navbarClasses[4];?>">
          <a href="#">Five</a>
        </li>
      </ul>
      <?php if(!empty($loggedIn)) { ?>
          <ul class="nav navbar-nav navbar-right">
              <li class="" ><a href="" class="" ><i class="icon-user"></i> <?= $activeUser['fullName']; ?></a></li>
              <li>

                <a href="index.php?logout=true">Logout</a>
              </li>
          </ul>
        <?php } else { ?>

          <ul class="nav navbar-nav navbar-right">
              <li>

                <a href="login.php">Login</a>
              </li>
          </ul>
          <?php }?>
      
    </nav>
  </div>
</header>