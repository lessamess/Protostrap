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

  <body>
<?php
        // *** STATIC TOP NAVBAR ***
        // This defines which navigation item is active. each pair of quotes corressponds to an item
        // DO NOT REMOVE
        $navbarClasses = Array('','','active','','','','','',''); 
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
<br><br>


        <h1><i class="icon-star"></i> Entypo Icons</h1>
        Protostrap uses the <a href="http://www.entypo.com">Entypo Pictogram Suite</a> by Daniel Bruce to have rich and scalable icons.<br>
        The basic rule is: Same markup as bootstrap, different and more flexible icons.<br><br>
        <div class="row">
            <span class="span6">
                <h3>Standard icons</h3>
                Uses the standard Boostrap Markup.<br><br>
                <i class="icon-search"></i> <i class="icon-user"></i><br><br>
                <pre>
&lt;i class="icon-search">&lt;/i> &lt;i class="icon-user">&lt;/i>
                </pre><br>
                <h3>Buttons</h3>
                Again same Syntax as Bootstrap, no need to specify icon-white though.<br><br>
                <a class="btn"><i class="icon-search"></i></a> 
                <a class="btn btn-danger"><i class="icon-mic"></i></a> <br><br>
                <pre>
&lt;a class="btn">&lt;i class="icon-search">&lt;/i>&lt;/a>
&lt;a class="btn btn-danger">&lt;i class="icon-mic">&lt;/i>&lt;/a>
                </pre><br>
                <div class="row">
                    <span class="span2">
                        Huge Buttons for prominent call to actions:
                    </span>
                    <span class="span4">
                        <a  class="btn btn-primary btn-huge">
                            <i class="icon-upload"></i> Upload Photos 
                        </a>
                        <br><br>
                    </span>
                    
                </div>
                <pre>
&lt;a class="btn btn-primary btn-huge">
    &lt;i class="icon-upload">&lt;/i> Upload Photos
&lt;/a></pre>
                
            </span>
            <span class="span6">
                <h3><i class="icon-check"></i>Icons in Headings</h3>
                <pre>
&lt;h3>&lt;i class="icon-check">&lt;/i>Icons in Headings&lt;/h3></pre>
                    <br>
                <h3>Icons for Feedback</h3>
                This will help you make your Feedback more accessible. Just use the Standard Control grup markup.<br><br>
                    <div class="control-group error">
                        <label class="control-label" for="tel"></label>
                        <div class="controls">
                            <input type="tel" class="input-medium" placeholder="Phone">
                            <span class="help-inline">This is a required field</span>
                        </div>
                    </div>
                    <pre>
&lt;div class="control-group error">
    &lt;label class="control-label" for="tel">&lt;/label>
    &lt;div class="controls">
        &lt;input type="tel" class="input-medium" placeholder="Phone">
        &lt;span class="help-inline">This is a required field&lt;/span>
    &lt;/div>
&lt;/div></pre>
                <br>
            </span>
        </div>
        
        
        
        
<h3>All Icons</h3>
<div class='row'>
    <span class='span2'><i class='icon-phone'></i> phone</span>
    <span class='span2'><i class='icon-mobile'></i> mobile</span>
    <span class='span2'><i class='icon-mouse'></i> mouse</span>
    <span class='span2'><i class='icon-address'></i> address</span>
    <span class='span2'><i class='icon-mail'></i> mail</span>
    <span class='span2'><i class='icon-paper-plane'></i> paper-plane</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-pencil'></i> pencil</span>
    <span class='span2'><i class='icon-feather'></i> feather</span>
    <span class='span2'><i class='icon-attach'></i> attach</span>
    <span class='span2'><i class='icon-inbox'></i> inbox</span>
    <span class='span2'><i class='icon-reply'></i> reply</span>
    <span class='span2'><i class='icon-reply-all'></i> reply-all</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-forward'></i> forward</span>
    <span class='span2'><i class='icon-user'></i> user</span>
    <span class='span2'><i class='icon-users'></i> users</span>
    <span class='span2'><i class='icon-add-user'></i> add-user</span>
    <span class='span2'><i class='icon-vcard'></i> vcard</span>
    <span class='span2'><i class='icon-export'></i> export</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-location'></i> location</span>
    <span class='span2'><i class='icon-map'></i> map</span>
    <span class='span2'><i class='icon-compass'></i> compass</span>
    <span class='span2'><i class='icon-direction'></i> direction</span>
    <span class='span2'><i class='icon-hair-cross'></i> hair-cross</span>
    <span class='span2'><i class='icon-share'></i> share</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-shareable'></i> shareable</span>
    <span class='span2'><i class='icon-heart'></i> heart</span>
    <span class='span2'><i class='icon-heart-empty'></i> heart-empty</span>
    <span class='span2'><i class='icon-star'></i> star</span>
    <span class='span2'><i class='icon-star-empty'></i> star-empty</span>
    <span class='span2'><i class='icon-thumbs-up'></i> thumbs-up</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-thumbs-down'></i> thumbs-down</span>
    <span class='span2'><i class='icon-chat'></i> chat</span>
    <span class='span2'><i class='icon-comment'></i> comment</span>
    <span class='span2'><i class='icon-quote'></i> quote</span>
    <span class='span2'><i class='icon-home'></i> home</span>
    <span class='span2'><i class='icon-popup'></i> popup</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-search'></i> search</span>
    <span class='span2'><i class='icon-flashlight'></i> flashlight</span>
    <span class='span2'><i class='icon-print'></i> print</span>
    <span class='span2'><i class='icon-bell'></i> bell</span>
    <span class='span2'><i class='icon-link'></i> link</span>
    <span class='span2'><i class='icon-flag'></i> flag</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-cog'></i> cog</span>
    <span class='span2'><i class='icon-tools'></i> tools</span>
    <span class='span2'><i class='icon-trophy'></i> trophy</span>
    <span class='span2'><i class='icon-tag'></i> tag</span>
    <span class='span2'><i class='icon-camera'></i> camera</span>
    <span class='span2'><i class='icon-megaphone'></i> megaphone</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-moon'></i> moon</span>
    <span class='span2'><i class='icon-palette'></i> palette</span>
    <span class='span2'><i class='icon-leaf'></i> leaf</span>
    <span class='span2'><i class='icon-note'></i> note</span>
    <span class='span2'><i class='icon-beamed-note'></i> beamed-note</span>
    <span class='span2'><i class='icon-new'></i> new</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-graduation-cap'></i> graduation-cap</span>
    <span class='span2'><i class='icon-book'></i> book</span>
    <span class='span2'><i class='icon-newspaper'></i> newspaper</span>
    <span class='span2'><i class='icon-bag'></i> bag</span>
    <span class='span2'><i class='icon-airplane'></i> airplane</span>
    <span class='span2'><i class='icon-lifebuoy'></i> lifebuoy</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-eye'></i> eye</span>
    <span class='span2'><i class='icon-clock'></i> clock</span>
    <span class='span2'><i class='icon-mic'></i> mic</span>
    <span class='span2'><i class='icon-calendar'></i> calendar</span>
    <span class='span2'><i class='icon-flash'></i> flash</span>
    <span class='span2'><i class='icon-thunder-cloud'></i> thunder-cloud</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-droplet'></i> droplet</span>
    <span class='span2'><i class='icon-cd'></i> cd</span>
    <span class='span2'><i class='icon-briefcase'></i> briefcase</span>
    <span class='span2'><i class='icon-air'></i> air</span>
    <span class='span2'><i class='icon-hourglass'></i> hourglass</span>
    <span class='span2'><i class='icon-gauge'></i> gauge</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-language'></i> language</span>
    <span class='span2'><i class='icon-network'></i> network</span>
    <span class='span2'><i class='icon-key'></i> key</span>
    <span class='span2'><i class='icon-battery'></i> battery</span>
    <span class='span2'><i class='icon-bucket'></i> bucket</span>
    <span class='span2'><i class='icon-magnet'></i> magnet</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-drive'></i> drive</span>
    <span class='span2'><i class='icon-cup'></i> cup</span>
    <span class='span2'><i class='icon-rocket'></i> rocket</span>
    <span class='span2'><i class='icon-brush'></i> brush</span>
    <span class='span2'><i class='icon-suitcase'></i> suitcase</span>
    <span class='span2'><i class='icon-traffic-cone'></i> traffic-cone</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-globe'></i> globe</span>
    <span class='span2'><i class='icon-keyboard'></i> keyboard</span>
    <span class='span2'><i class='icon-browser'></i> browser</span>
    <span class='span2'><i class='icon-publish'></i> publish</span>
    <span class='span2'><i class='icon-progress-3'></i> progress-3</span>
    <span class='span2'><i class='icon-progress-2'></i> progress-2</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-progress-1'></i> progress-1</span>
    <span class='span2'><i class='icon-progress-0'></i> progress-0</span>
    <span class='span2'><i class='icon-light-down'></i> light-down</span>
    <span class='span2'><i class='icon-light-up'></i> light-up</span>
    <span class='span2'><i class='icon-adjust'></i> adjust</span>
    <span class='span2'><i class='icon-code'></i> code</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-monitor'></i> monitor</span>
    <span class='span2'><i class='icon-infinity'></i> infinity</span>
    <span class='span2'><i class='icon-light-bulb'></i> light-bulb</span>
    <span class='span2'><i class='icon-credit-card'></i> credit-card</span>
    <span class='span2'><i class='icon-database'></i> database</span>
    <span class='span2'><i class='icon-voicemail'></i> voicemail</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-clipboard'></i> clipboard</span>
    <span class='span2'><i class='icon-cart'></i> cart</span>
    <span class='span2'><i class='icon-box'></i> box</span>
    <span class='span2'><i class='icon-ticket'></i> ticket</span>
    <span class='span2'><i class='icon-rss'></i> rss</span>
    <span class='span2'><i class='icon-signal'></i> signal</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-thermometer'></i> thermometer</span>
    <span class='span2'><i class='icon-water'></i> water</span>
    <span class='span2'><i class='icon-sweden'></i> sweden</span>
    <span class='span2'><i class='icon-line-graph'></i> line-graph</span>
    <span class='span2'><i class='icon-pie-chart'></i> pie-chart</span>
    <span class='span2'><i class='icon-bar-graph'></i> bar-graph</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-area-graph'></i> area-graph</span>
    <span class='span2'><i class='icon-lock'></i> lock</span>
    <span class='span2'><i class='icon-lock-open'></i> lock-open</span>
    <span class='span2'><i class='icon-logout'></i> logout</span>
    <span class='span2'><i class='icon-login'></i> login</span>
    <span class='span2'><i class='icon-check'></i> check</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-cross'></i> cross</span>
    <span class='span2'><i class='icon-squared-minus'></i> squared-minus</span>
    <span class='span2'><i class='icon-squared-plus'></i> squared-plus</span>
    <span class='span2'><i class='icon-squared-cross'></i> squared-cross</span>
    <span class='span2'><i class='icon-circled-minus'></i> circled-minus</span>
    <span class='span2'><i class='icon-circled-plus'></i> circled-plus</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-circled-cross'></i> circled-cross</span>
    <span class='span2'><i class='icon-minus'></i> minus</span>
    <span class='span2'><i class='icon-plus'></i> plus</span>
    <span class='span2'><i class='icon-erase'></i> erase</span>
    <span class='span2'><i class='icon-block'></i> block</span>
    <span class='span2'><i class='icon-info'></i> info</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-circled-info'></i> circled-info</span>
    <span class='span2'><i class='icon-help'></i> help</span>
    <span class='span2'><i class='icon-circled-help'></i> circled-help</span>
    <span class='span2'><i class='icon-warning'></i> warning</span>
    <span class='span2'><i class='icon-cycle'></i> cycle</span>
    <span class='span2'><i class='icon-cw'></i> cw</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-ccw'></i> ccw</span>
    <span class='span2'><i class='icon-shuffle'></i> shuffle</span>
    <span class='span2'><i class='icon-back'></i> back</span>
    <span class='span2'><i class='icon-level-down'></i> level-down</span>
    <span class='span2'><i class='icon-retweet'></i> retweet</span>
    <span class='span2'><i class='icon-loop'></i> loop</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-back-in-time'></i> back-in-time</span>
    <span class='span2'><i class='icon-level-up'></i> level-up</span>
    <span class='span2'><i class='icon-switch'></i> switch</span>
    <span class='span2'><i class='icon-numbered-list'></i> numbered-list</span>
    <span class='span2'><i class='icon-add-to-list'></i> add-to-list</span>
    <span class='span2'><i class='icon-layout'></i> layout</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-list'></i> list</span>
    <span class='span2'><i class='icon-text-doc'></i> text-doc</span>
    <span class='span2'><i class='icon-text-doc-inverted'></i> text-doc-inverted</span>
    <span class='span2'><i class='icon-doc'></i> doc</span>
    <span class='span2'><i class='icon-docs'></i> docs</span>
    <span class='span2'><i class='icon-landscape-doc'></i> landscape-doc</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-picture'></i> picture</span>
    <span class='span2'><i class='icon-video'></i> video</span>
    <span class='span2'><i class='icon-music'></i> music</span>
    <span class='span2'><i class='icon-folder'></i> folder</span>
    <span class='span2'><i class='icon-archive'></i> archive</span>
    <span class='span2'><i class='icon-trash'></i> trash</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-upload'></i> upload</span>
    <span class='span2'><i class='icon-download'></i> download</span>
    <span class='span2'><i class='icon-save'></i> save</span>
    <span class='span2'><i class='icon-install'></i> install</span>
    <span class='span2'><i class='icon-cloud'></i> cloud</span>
    <span class='span2'><i class='icon-upload-cloud'></i> upload-cloud</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-bookmark'></i> bookmark</span>
    <span class='span2'><i class='icon-bookmarks'></i> bookmarks</span>
    <span class='span2'><i class='icon-open-book'></i> open-book</span>
    <span class='span2'><i class='icon-play'></i> play</span>
    <span class='span2'><i class='icon-paus'></i> paus</span>
    <span class='span2'><i class='icon-record'></i> record</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-stop'></i> stop</span>
    <span class='span2'><i class='icon-ff'></i> ff</span>
    <span class='span2'><i class='icon-fb'></i> fb</span>
    <span class='span2'><i class='icon-to-start'></i> to-start</span>
    <span class='span2'><i class='icon-to-end'></i> to-end</span>
    <span class='span2'><i class='icon-resize-full'></i> resize-full</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-resize-small'></i> resize-small</span>
    <span class='span2'><i class='icon-volume'></i> volume</span>
    <span class='span2'><i class='icon-sound'></i> sound</span>
    <span class='span2'><i class='icon-mute'></i> mute</span>
    <span class='span2'><i class='icon-flow-cascade'></i> flow-cascade</span>
    <span class='span2'><i class='icon-flow-branch'></i> flow-branch</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-flow-tree'></i> flow-tree</span>
    <span class='span2'><i class='icon-flow-line'></i> flow-line</span>
    <span class='span2'><i class='icon-flow-parallel'></i> flow-parallel</span>
    <span class='span2'><i class='icon-left-bold'></i> left-bold</span>
    <span class='span2'><i class='icon-down-bold'></i> down-bold</span>
    <span class='span2'><i class='icon-up-bold'></i> up-bold</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-right-bold'></i> right-bold</span>
    <span class='span2'><i class='icon-left'></i> left</span>
    <span class='span2'><i class='icon-down'></i> down</span>
    <span class='span2'><i class='icon-up'></i> up</span>
    <span class='span2'><i class='icon-right'></i> right</span>
    <span class='span2'><i class='icon-circled-left'></i> circled-left</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-circled-down'></i> circled-down</span>
    <span class='span2'><i class='icon-circled-up'></i> circled-up</span>
    <span class='span2'><i class='icon-circled-right'></i> circled-right</span>
    <span class='span2'><i class='icon-triangle-left'></i> triangle-left</span>
    <span class='span2'><i class='icon-triangle-down'></i> triangle-down</span>
    <span class='span2'><i class='icon-triangle-up'></i> triangle-up</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-triangle-right'></i> triangle-right</span>
    <span class='span2'><i class='icon-chevron-left'></i> chevron-left</span>
    <span class='span2'><i class='icon-chevron-down'></i> chevron-down</span>
    <span class='span2'><i class='icon-chevron-up'></i> chevron-up</span>
    <span class='span2'><i class='icon-chevron-right'></i> chevron-right</span>
    <span class='span2'><i class='icon-chevron-small-left'></i> chevron-small-left</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-chevron-small-down'></i> chevron-small-down</span>
    <span class='span2'><i class='icon-chevron-small-up'></i> chevron-small-up</span>
    <span class='span2'><i class='icon-chevron-small-right'></i> chevron-small-right</span>
    <span class='span2'><i class='icon-chevron-thin-left'></i> chevron-thin-left</span>
    <span class='span2'><i class='icon-chevron-thin-down'></i> chevron-thin-down</span>
    <span class='span2'><i class='icon-chevron-thin-up'></i> chevron-thin-up</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-chevron-thin-right'></i> chevron-thin-right</span>
    <span class='span2'><i class='icon-left-thin'></i> left-thin</span>
    <span class='span2'><i class='icon-down-thin'></i> down-thin</span>
    <span class='span2'><i class='icon-up-thin'></i> up-thin</span>
    <span class='span2'><i class='icon-right-thin'></i> right-thin</span>
    <span class='span2'><i class='icon-arrow-combo'></i> arrow-combo</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-three-dots'></i> three-dots</span>
    <span class='span2'><i class='icon-two-dots'></i> two-dots</span>
    <span class='span2'><i class='icon-dot'></i> dot</span>
    <span class='span2'><i class='icon-cc'></i> cc</span>
    <span class='span2'><i class='icon-cc-by'></i> cc-by</span>
    <span class='span2'><i class='icon-cc-nc'></i> cc-nc</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-cc-nc-eu'></i> cc-nc-eu</span>
    <span class='span2'><i class='icon-cc-nc-jp'></i> cc-nc-jp</span>
    <span class='span2'><i class='icon-cc-sa'></i> cc-sa</span>
    <span class='span2'><i class='icon-cc-nd'></i> cc-nd</span>
    <span class='span2'><i class='icon-cc-pd'></i> cc-pd</span>
    <span class='span2'><i class='icon-cc-zero'></i> cc-zero</span>
</div>
<div class='row'>
    <span class='span2'><i class='icon-cc-share'></i> cc-share</span>
    <span class='span2'><i class='icon-cc-remix'></i> cc-remix</span>
    <span class='span2'><i class='icon-db-logo'></i> db-logo</span>
    <span class='span2'><i class='icon-db-shape'></i> db-shape</span>
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
