<?php

/** --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('protostrap.php');


/**   --- I D I V I D U A L  A C T I V A T I O N S  ---

     These few lines are unique to every page.
     Here's where you define which elements are activated,
     be it tabs or navigation etc
**/
$tabClasses = Array('','active','','',''); // Do NOT remove line, only add and remove elements in the brackets.

$navbarClasses = Array('','active','','','','',''); // Do NOT remove line, only add and remove elements in the brackets.

/** END OF ACTIVATIONS **/

?><!DOCTYPE html>
<html lang="en">
  <head>

    <title>Protostrap - a prototyping framework based on Bootstrap</title>
    <meta name="description" content="">
    <meta name="author" content="">

<?php
// this includes all the markup that loads css files and similar stuff,
// if you have to add more css, that's the place to do it.
include('./headTag.php');?>
  </head>

  <body  data-target="#scrollspy" data-spy="scroll">
<?php
// this includes the markup for a static top navbar
include('./navBarStaticTop.php');

// this includes the markup for iOS a styled tabbar
// include('./iosTabbar.php');?>

    <div class="container">

<?php // this includes the footer
//include('./header.php');?>
        <div id="breadcrumbwrapper">
            <ul class="scroller breadcrumb">
                <li><a href="index.php">Mountains</a> <span class="divider">></span></li>
                <li><a href="8000.php">+8'000m</a> <span class="divider">></span></li>
                <li><a href="himalaya.php">Himalaya</a> <span class="divider">></span></li>
                <li class="active">Everest</li>
            </ul>
        </div>
        
        <div class="row">
            <span class="span3 hidden-phone" id="scrollspy">
                &nbsp; <!-- DO NOT REMOVE -->
                <!-- ADJUST DATA-OFFSET to the amount of bixels to scroll before halting -->
                
                   <ul data-spy="affix" data-offset-top="120" id="affix" class=" nav nav-tabs nav-stacked nav-wedge">
                        <li class="active"><a href="#accordion">Accordion</a></li>
                        <li><a href="#grid">Grid with 9 cols</a></li>
                        <li><a href="#stackedNav">Stacked Navigation</a></li>
                        <li><a href="#stacks">Stacks for Mobile</a></li>
                        <li><a href="#tabs">Tabs</a></li>
                        <li><a href="#carousel">Carousel</a></li>
                    </ul>
                
            </span>
            <span class="span9">
                <h1>Handy Snippets</h1>
                <h3 id="accordion">Accordion Using a Unique ID</h3>
                <div id="accordion1" class="accordion accordeon-wedge">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a href="#<?php echo getUniqueId();?>" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                 One
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="<?php echo $lastUniqueId;?>">
                            <div class="accordion-inner">
                                <b>One open</b><br>
                                Id: <?php echo $lastUniqueId;?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a href="#<?php echo getUniqueId();?>" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                 Two
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="<?php echo $lastUniqueId;?>">
                            <div class="accordion-inner">
                                <b>Two open</b><br>
                                Id: <?php echo $lastUniqueId;?>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>Markup</h4>
                <pre class="pre-scrollable">
&lt;div id="accordion1" class="accordion accordeon-wedge">
    &lt;div class="accordion-group">
        &lt;div class="accordion-heading">
            &lt;a href="#&lt;?php echo getUniqueId();?>" data-parent="#accordion1"
                  data-toggle="collapse" class="accordion-toggle">
                 One
            &lt;/a>
        &lt;/div>
        &lt;div class="accordion-body collapse" id="&lt;?php echo $lastUniqueId;?>">
            &lt;div class="accordion-inner">
                &lt;b>One open&lt;/b>
            &lt;/div>
        &lt;/div>
    &lt;/div>
    &lt;div class="accordion-group">
        &lt;div class="accordion-heading">
            &lt;a href="#&lt;?php echo getUniqueId();?>" data-parent="#accordion1"
                  data-toggle="collapse" class="accordion-toggle">
                 Two
            &lt;/a>
        &lt;/div>
        &lt;div class="accordion-body collapse" id="&lt;?php echo $lastUniqueId;?>">
            &lt;div class="accordion-inner">
                &lt;b>Two open&lt;/b>
            &lt;/div>
        &lt;/div>
    &lt;/div>
&lt;/div></pre>
                <hr/>
        
                <h3 id="grid">Grid Row 9 cols</h3>
                <div class="row">
                    <span class="span3 outline">
                        Span 3
                    </span>
                    <span class="span2 outline">
                        Span 2
                    </span>
                    <span class="span4 outline">
                        Span 4
                    </span>
                </div>
                <h4>Markup</h4>
                <pre class="pre-scrollable">
&lt;div class="row">
    &lt;span class="span3">
        Span 3
    &lt;/span>
    &lt;span class="span2">
        Span 2
    &lt;/span>
    &lt;span class="span4">
        Span 4
    &lt;/span>
&lt;/div></pre>
        
                <h3 id="stackedNav">Stacked Navigation with wedge</h3>
                <ul class="nav nav-tabs nav-stacked nav-wedge">
                    <li class="active"><a>foo</a></li>
                    <li><a>bar</a></li>
                    <li><a>baz</a></li>
                </ul>
                <h4>Markup</h4>
                <pre class="pre-scrollable">
&lt;ul class="nav nav-tabs nav-stacked nav-wedge">
    &lt;li class="active">&lt;a>foo&lt;/a>&lt;/li>
    &lt;li>&lt;a>bar&lt;/a>&lt;/li>
    &lt;li>&lt;a>baz&lt;/a>&lt;/li>
&lt;/ul></pre>
        
                <h3 id="stacks">Stacks ideal for mobile</h3>
                <ul class="stacks">
                    <li >
                        <a >
                            one
                        </a>
                    </li>
                    <li>
                        <a class="">
                            two
                        </a>
                    </li>
                </ul>
                <h4>Markup</h4>
                <pre class="pre-scrollable">
&lt;ul class="stacks">
    &lt;li >
        &lt;a >
            one
        &lt;/a>
    &lt;/li>
    &lt;li>
        &lt;a class="">
            two
        &lt;/a>
    &lt;/li>
&lt;/ul></pre>
        
                <h3 id="tabs">Tabs</h3>
                <!-- ** TABS ** -->
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">ONE</a></li>
                        <li><a href="#tab2" data-toggle="tab">TWO</a></li>
                        <li><a href="#tab3" data-toggle="tab">THREE</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            one
                        </div>
                        <div class="tab-pane " id="tab2">
                            two
                        </div>
                        <div class="tab-pane " id="tab3">
                            three
                        </div>
                    </div>
                </div>
                <!-- ** End of TABS **-->
                <h4>Markup</h4>
                <pre class="pre-scrollable">
&lt;!-- ** TABS ** -->
&lt;div class="tabbable">
    &lt;ul class="nav nav-tabs">
        &lt;li class="active">&lt;a href="#tab1" data-toggle="tab">ONE&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#tab2" data-toggle="tab">TWO&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#tab3" data-toggle="tab">THREE&lt;/a>&lt;/li>
    &lt;/ul>
    &lt;div class="tab-content">
        &lt;div class="tab-pane active" id="tab1">
            one
        &lt;/div>
        &lt;div class="tab-pane " id="tab2">
            two
        &lt;/div>
        &lt;div class="tab-pane " id="tab3">
            three
        &lt;/div>
    &lt;/div>
&lt;/div>
&lt;!-- ** End of TABS **--></pre>
                
                
                <h3 id="carousel">Carousel with touch support</h3>
                <div id="myCarousel" class="carousel slide" >
                    <!-- Carousel items -->
                    <div class="carousel-inner" >
                        <div class="active item">
                            <img width="100%" src="./assets/img/gallery1.jpg" />
                            <div class="carousel-caption">
                                <h4>Caption 1</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img width="100%" src="./assets/img/gallery2.jpg" />
                            <div class="carousel-caption">
                                <h4>Caption 2</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img width="100%" src="./assets/img/gallery3.jpg" />
                            <div class="carousel-caption">
                                <h4>Caption 3</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="left carousel-control" data-slide="prev" href="#myCarousel"><span class="entypo">&#59229;</span></a>
                    <a class="right carousel-control" data-slide="next" href="#myCarousel"><span class="entypo">&#59230;</span></a>
                </div>
                <h4>Markup</h4>
                <pre class="pre-scrollable">
&lt;div id="myCarousel" class="carousel slide" >
    &lt;!-- Carousel items -->
    &lt;div class="carousel-inner" >
        &lt;div class="active item">
            &lt;img width="100%" src="./assets/img/gallery1.jpg" />
            &lt;div class="carousel-caption">
                &lt;h4>Caption 1&lt;/h4>
                &lt;p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.&lt;/p>
            &lt;/div>
        &lt;/div>
        &lt;div class="item">
            &lt;img width="100%" src="./assets/img/gallery2.jpg" />
            &lt;div class="carousel-caption">
                &lt;h4>Caption 2&lt;/h4>
                &lt;p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.&lt;/p>
            &lt;/div>
        &lt;/div>
        &lt;div class="item">
            &lt;img width="100%" src="./assets/img/gallery3.jpg" />
            &lt;div class="carousel-caption">
                &lt;h4>Caption 3&lt;/h4>
                &lt;p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.&lt;/p>
            &lt;/div>
        &lt;/div>
    &lt;/div>
    &lt;!-- Carousel nav -->
    &lt;a class="left carousel-control" data-slide="prev" href="#myCarousel">‹&lt;/a>
    &lt;a class="right carousel-control" data-slide="next" href="#myCarousel">›&lt;/a>
&lt;/div></pre>
                <hr>
            </span>
        </div>
        
        
        
        
        
        
        

<?php // this includes the footer
include('./footer.php');?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php include ('protostrap_javascripts.php');?>
  </body>
</html>
