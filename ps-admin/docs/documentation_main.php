<?php

/** --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

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
        // *** STATIC TOP NAVBAR ***
        // This defines which navigation item is active. each pair of quotes corressponds to an item
        // DO NOT REMOVE
        $navbarClasses = Array('','active','','','','','','','');
        // this includes the markup for a static top navbar. Remove the // to include.
        include('./navBarStaticTop.php');


        // *** iOS TAB-BAR ***
        // This defines which tab is active. each pair of quotes corressponds to a tab
        // DO NOT REMOVE
        $tabClasses = Array('active','','','','');
        // this includes the markup for iOS a styled tab-bar. Remove the // to include
        //include('./iosTabbar.php');
?>

    <div class="container">

<?php // this includes the footer
//include('./header.php');?>


        <div class="row">
            <span class="span3 hidden-phone" id="scrollspy">
                &nbsp; <!-- DO NOT REMOVE -->
                <!-- ADJUST DATA-OFFSET to the amount of bixels to scroll before halting -->

                   <ul data-spy="affix" data-offset-top="120" id="affix" class=" nav nav-tabs nav-stacked nav-wedge">
                        <li class="active"><a href="#aWordOfCaution">A word of caution</a></li>
                        <li><a href="#requirements">Requirements</a></li>
                        <li><a href="#Installation">Installation</a></li>
                        <li><a href="#ff">Files & Folders</a></li>
                        <li><a href="#accordion">Accordion</a></li>
                        <li><a href="#collapse">Collapse</a></li>
                        <li><a href="#grid">Grid with 9 cols</a></li>
                        <li><a href="#stackedNav">Stacked Navigation</a></li>
                        <li><a href="#stacks">Stacks for Mobile</a></li>
                        <li><a href="#tabs">Tabs</a></li>
                        <li><a href="#carousel">Carousel</a></li>
                        <li><a href="#scrollspyAffix">Scrollspy & Affix</a></li>
                        <li><a href="#typeahead">Typeahead</a></li>
                        <li><a href="#iostabbar">iOS Tabbar</a></li>
                    </ul>

            </span>
            <span class="span9">
                <h1>Documentation</h1>
                <h3 id="aWordOfCaution">A word of caution</h3>
                Protostrap is prototyping software and therefore lacks all security features needed for production:<br>
                <br>

                <div class="alert alert-warning">
                  <strong><i class="icon-warning"></i> Do NOT use this in a production environment</strong><br>
                </div>
                <h3 id="requirements">Requirements</h3>
                A local webserver with any version of PHP. <br><br>
                <strong>Mac Users with OS X Lion or older</strong><br>
                Macs come shipped with a webserver enabled by default, it is situated under /Library/WebServer/Documents <br>
                To open that directory click on "Go To" in the Finder and select "Go To Directory" in the dropdown. Then enter the path in the dialogue that has opened.
                <br><br>
                <strong>Mac users with OS X Mountain Lion</strong><br>
                The default webserver has been disabled.<br>
                Read on <a href="http://reviews.cnet.com/8301-13727_7-57481978-263/how-to-enable-web-sharing-in-os-x-mountain-lion/" class="">how to enable web sharing on mountain lion</a>
                <br>Then follow the instructions above.
                <br><br>
                <strong>Windows Users</strong><br>
                If you haven't already, get <a href="http://www.wampserver.com/en/">WAMP Server</a>.
                <h3 id="Installation">Installation</h3>
                <ul>
                    <li>Download Protostrap and unzip it.</li>
                    <li>
                        Put it on your local server, if you have a MAC /Library/WebServer/Documents is the folder you're looking for.<br>
                        To open that directory click on "Go To" in the Finder and select "Go To Directory" in the dropdown. Then enter the path in the dialogue that has opened.
                    </li>
                    <li>You're done! You can access Protostrap in the browser via: <a href="http://localhost/protostrap" class="">http://localhost/protostrap</a><br>(assuming you have named the folder protostrap and put it into the above directory.
</li>
                </ul>


                <h3 id="ff">Files and Folders</h3>
                The structure is this
                <pre>assets
    - css
    - ico
    - img
    - js
    - webfonts
core
.htaccess
account.php
blank.php
documentation_icons.php
documentation_main.php
documentation_scrollspy.php
footer.php
headTag.php
header.php
index.php
iosTabbar.php
missing.php
navBarStaticTop.php
protostrap_javascripts.php
                </pre>
                <a  data-toggle="collapse" data-target="#<?php echo getUniqueId();?>">Show more infos on each file</a>
                <div id="<?php echo $lastUniqueId;?>" class="collapse">
                    <br>
                    <strong>Assets folder</strong><br>
                    Contains all assets. Most importantly the CSS and JS files:<br>
                     - Add your CSS rules in the file assets/css/main.css<br>
                     - Add your JS code in the file assets/js/main.js<br><br>

                    <strong>Core folder</strong><br>
                    Contains the file protostrap.php. DO NOT CHANGE THIS FILE.<br><br>
                    <strong>.htaccess</strong><br>
                    Handles "End of Prototype" situations when users click on links that have no corresponding page in the prototype. For this the module "mod_rewrite" has to be enabled on the server, which should be the case by default. If a file does not exists, Protostrap will show the file missing.php displaying the "End of Prototype" page.
                    <br><br>
                    <strong>account.php</strong><br>
                    Contains the blueprint for the fake login.
                    <br><br>
                    <strong>blank.php</strong><br>
                    is an excellent starting point whenever you add a new file to your prototype.
                    <br><br>
                    <strong>documentation_....php</strong><br>
                    The documentation files like this page.
                    <br><br>
                    <strong>footer.php</strong><br>
                    A standard footer that is included on every page.
                    <br><br>
                    <strong>headTag.php</strong><br>
                    A file containing everything that belongs inside the &lt;head&gt; tag and is needed on every page, like references to css and js files.
                    <br><br>
                    <strong>header.php</strong><br>
                    A standard header that is included on every page.
                    <br><br>
                    <strong>index.php</strong><br>
                    The main file called when protostrap is opened.
                    <br><br>
                    <strong>iosTabbar.php</strong><br>
                    This file contains the IOS Tabbar for prototyping IOS applications. If you are not prototyping an iOS application you do not need this file.

                    <br><br>
                    <strong>missing.php</strong><br>
                    This file is called by .htaccess whenever a file is not found.
                    <br><br>
                    <strong>navBarStaticTop.php</strong><br>
                    This contains a static navigation bar positioned at the top of the page. It is responsive.
                    <br><br>
                    <strong>protostrap_javascripts.php</strong><br>
                    All references to javacript-files are in here. This file makes sure that you don't have caching problems whenever you change something in the js files by adding a timestamp to the file requested.
                    <br><br>
                </div>
                <br><br>
                <h2 id="gettingStarted">Handy Snippets</h2>
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
                <h3 id="collapse">Collapse Using a Unique ID</h3>
                Similar to the accordeon, one element that shows/hides another element. Also using the Unique ID to make copy paste easier and less eror prone.
                <br><br><a  data-toggle="collapse" data-target="#<?php echo getUniqueId();?>">Collapse trigger</a>
                <div id="<?php echo $lastUniqueId;?>" class="collapse in">
                    This will toggle
                </div>
                <br>
                <h4>Markup</h4>
                <pre class="pre-scrollable">&lt;a  data-toggle="collapse" data-target="#&lt;?php echo getUniqueId();?&gt;"&gt;
    Collapse trigger
&lt;/a&gt;
&lt;div id="&lt;?php echo $lastUniqueId;?&gt;" class="collapse in"&gt;
    This will toggle
&lt;/div&gt;
                </pre>

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


                <h3 id="carousel">Carousel for touch</h3>
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
                    <a class="left carousel-control" data-slide="prev" href="#myCarousel"><span class="entypo">&#59237;</span></a>
                    <a class="right carousel-control" data-slide="next" href="#myCarousel"><span class="entypo">&#59238;</span></a>
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
    &lt;a class="left carousel-control" data-slide="prev" href="#myCarousel">&lt;span class="entypo">&amp;#59237;&lt/span>&lt/a>
    &lt;a class="right carousel-control" data-slide="next" href="#myCarousel"&lt;span class="entypo">&amp;#59238;&lt/span>>&lt;/a>
&lt;/div></pre>
                <br>
                <h3 id="scrollspyAffix">Scrollspy & Affix</h3>
                The documentation of the Scrollspy and Affix patterns have been <a href="documentation_scrollspy.php" class="">moved to a separate page</a> to provide more clarity.
                <br>
                <h3 id="typeahead">Typeahead</h3>
                <input type="text"  data-provide="typeahead" data-results="77" class="input-medium typeahead showResults" placeholder="Book Title, Topic...">
                <br><
                 Protostraps Typeahead is slightly more evolved than Bootstraps version:
                 <ul>
                    <li>
                        The "onselect" event-handler allows you to pass the selected item to a function
                    </li>
                    <li>Adding class <strong>showResults</strong> to the input field allows you to display a fake amount of results.</li>
                    <li>Adding the attribute <strong>data-results</strong> to the input field allows you define the number of the fake results.</li>
                 </ul>
                <h4>Markup </h4>
                <pre class="pre-scrollable">&lt;input type="text"
data-provide="typeahead" data-results="77"
class="input-medium typeahead showResults"
placeholder="Book Title, Topic..."&gt;
                </pre>
                <br>
                The typeahead items are defined in the main.js file:

                <h4>Code </h4>
                <pre class="pre-scrollable">$('.typeahead').typeahead({
    // note that "value" is the default setting for the property option
    source: [
        'Typography Guidelines And References',
        'Web Typography: Educational Resources, Tools and Techniques',
        'Vintage and Retro Typography Showcase',
        'Typography Is The Foundation Of Web Designn',
        'When Typography Speaks Louder Than Words'
    ],
    items: 4,
    onselect: function(obj) {
        window.location.href = "documentation_main.php?choice="+obj;
    }
}
                </pre>
                <br><br>
                <h3 id="iostabbar">iOS Tabbar</h3>


                <div class="row">
                    <span class="span4">
                        In order to allow HTML based prototyping of iOS Apps (to some extent at least) Protstrap has a ready to use iOS tabbar.
                        Simply include the iOS Tabbar file.<br><br>
                        <pre>include('./iosTabbar.php');</pre>
                        <br>
                        The bar can be customized in the file iosTabbar.php.<br>
                        The file has two sections:
                        <ul>
                            <li>One for the Tabs</li>
                            <li>One for the Badges on each tab. You can add the classes <strong>badge-1</strong> or <strong>badge-2</strong> to each tab to simulate badges. since this is done by adding a class, this could also happen over javascript.</li>
                        </ul>

                        <span class="visible-phone">
                            <a href="mobiledemo.php" class="">Show demopage</a>
                        </span>
                    </span>
                    <span class="span5 hidden-phone">
                        <iframe width="320" height="480" src="mobiledemo.php"></iframe>
                    </span>
                </div>

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
