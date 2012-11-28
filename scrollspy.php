<?php

/**   --- B A S E F U N C T I O N S ---

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

$navbarClasses = Array('','','','active','','','','',''); // Do NOT remove line, only add and remove elements in the brackets.

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

  <body data-target="#scrollspy" data-spy="scroll">
<?php
// this includes the markup for iOS a styled tabbar
// include('./iosTabbar.php');

// this includes the markup for a static top navbar
include('./navBarStaticTop.php');?>

    <div class="container">

<?php // this includes the footer
//include('./header.php');?>
        <div class="row">
            <span class="span3">&nbsp;</span>
            <span class="span9">
                <h1> Handy Snippets</h1>
                <h3>Scrollspy and Affix Example</h3>
            </span>
        </div>

        <!-- SCROLLSPY AFFIX -->
        <div class="row">

            <span class="span3" id="scrollspy">
                &nbsp; <!-- DO NOT REMOVE -->
                <ul data-spy="affix" data-offset-top="120" id="affix" class=" nav nav-tabs nav-stacked nav-wedge">
                    <li class="active"><a href="#one">ONE</a></li>
                    <li><a href="#two">TWO</a></li>
                    <li><a href="#three">THREE</a></li>
                </ul>
            </span>
            <span class="span4" >

                <h4 id="one">ONE: Styled Navbar</h4>
                The Navigation to the left does not look like the standard Bootstrap navigation. Ironically the Bootstrap demopage does not use the standard navigation either. It uses a much clearer Navigation where the active element is highlighted with white text on a blue background. You guessed right: this looks more like the navigation on the Bootstrap demo page.

                <h4  id="two" >TWO: Affix - the fixed navigation</h4>
                This is a tricky one to make sure it works alright you have to do the following
                <ul>
                    <li>Use the Navigation Code from this Navigation</li>
                    <li>Define the Attribute <strong>data-offset-top</strong>. The Attribute describes how much the users scrolls until the affix happens
                    <li>Adapt - if necessary - the <strong>top</strong> value in the <strong>.affix</strong> class in the file <strong>main.js</strong>. </li>
                </ul>

                
            </span>
            <span class="span5">

            </span>
        </div>
        <div class="row">
            <span class="span3">
                &nbsp;
            </span>
            <span class="span6">
                <h4 id="code">Markup</h4>
                <pre>
&lt;body data-target="#scrollspy" data-spy="scroll">
...
&lt;span class="span3" id="scrollspy">
    &nbsp; &lt;!-- DO NOT REMOVE -->
    &lt;ul data-spy="affix" data-offset-top="120" id="affix" class=" nav nav-tabs nav-stacked nav-wedge">
        &lt;li class="active">&lt;a href="#one">ONE&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#two">TWO&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#three">THREE&lt;/a>&lt;/li>
    &lt;/ul>
&lt;/span></pre>
            </span>
            <span class="span3">
                        
            </span>
        </div>

      <hr>

<?php // this includes the footer
include('./footer.php');?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php include ('protostrap_javascripts.php');?>
  </body>
</html>
