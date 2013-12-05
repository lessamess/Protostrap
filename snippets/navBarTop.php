<!--<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -- >
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <!-- Be sure to leave the brand out there if you want it shown -- >
            <a class="brand" href="index.php">Protostrap</a>


            <!-- Everything you want hidden at 940px or less, place within here -- >
            <div class="nav-collapse">
                <!-- .nav, .navbar-search, .navbar-form, etc -- >
                <ul class="nav">
                    <li class="<?php echo $navbarClasses[0];?>"><a href="index.php">Home</a></li>
                    <li class="<?php echo $navbarClasses[1];?>"><a href="documentation_main.php">Documentation</a></li>
                    <li class="<?php echo $navbarClasses[2];?>"><a href="documentation_icons.php">Icons</a></li>
                    <li class="<?php echo $navbarClasses[3];?>"><a href="documentation_scrollspy.php">Scrollspy and Affix</a></li>
                    <li class="<?php echo $navbarClasses[4];?>"><a href="account.php">Fake Login</a></li>
                    <li class="<?php echo $navbarClasses[5];?>"><a href="documentation_data.php">Data</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br><br>


-->

<header role="banner" class="navbar navbar-inverse navbar-fixed-top ">
  <div class="container">
    <div class="navbar-header">
      <button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../">Brand</a>
    </div>
    <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="../getting-started">One</a>
        </li>
        <li>
          <a href="../css">Two</a>
        </li>
        <li class="active">
          <a href="../components">Three</a>
        </li>
        <li>
          <a href="../javascript">Four</a>
        </li>
        <li>
          <a href="../customize">Five</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="../about">Logout</a>
        </li>
      </ul>
    </nav>
  </div>
</header>



<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
          <li class="divider"></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>