<?php

/**   --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');


/**   --- I D I V I D U A L  A C T I V A T I O N S  ---

     These few lines are unique to every page.
     Here's where you define which elements are activated,
     be it tabs or navigation etc
**/
$tabClasses = Array('','active','','',''); // Do NOT remove line, only add and remove elements in the brackets.

$navbarClasses = Array('','','','','','active','','',''); // Do NOT remove line, only add and remove elements in the brackets.

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
        // this includes the markup for a static top navbar. Remove the // to include.
        include('./navBarStaticTop.php');
?>

    <div class="container">

<?php // this includes the footer
//include('./header.php');?>
        <div class="row">
            <span class="span3">
                                &nbsp;
            </span>
            <span class="span9">
                <h1>Prototstrap's Data Layer</h1>
                Protostrap makes it easy to have reusable data instead of hardcoded content inside pages.
            </span>
        </div>
        <div class="row">
            <span class="span3" id="scrollspy">
                                &nbsp; <!-- DO NOT REMOVE -->
                <ul data-spy="affix" data-offset-top="120" id="affix" class=" nav nav-tabs nav-stacked nav-wedge">
                    <li class="active"><a href="#one">How the data layer works</a></li>
                    <li><a href="#two">Changing data</a></li>
                    <li><a href="#three">Data and Typeahead</a></li>
                </ul>
            </span>
            <span class="span6">
                <h2 id="one">How it works</h2>
                Instead of having to have a Database in place Protostrap lets you have data sets in a very simple text file. The fomrat of the file is called YAML and the idea is to structure data by indetation. Here's a simple example:
                <br><br>
                <div class="row">
                    <span class="span3">
                        <pre>
application: Protostrap

fluids:
  1:
    name: Water
    color: transparent
  2:
    name: Wine
    color: red
</pre>

                    </span>
                    <span class="span3">
                        <ul>
                            <li>Each data set will be exposed as a PHP-variable and is available at any time in Protostrap. In this case the variables would be: <strong>$application, $fluids</strong>.<br><br></li>
                            <li class="">Each indentation must be <strong>exactly 2 spaces</strong>.</li>
                        </ul>
                    </span>
                </div>
                <br>
                <h3>data.yml</h3>
                <div class="row">
                    <span class="span3">
                        There is a file <strong>data.yml</strong> in the directory <strong>assets/data</strong>. You can add your data to that file or add any other file to that directory - any file in there will be used, as long as it has the correct indetation. <br><br>Note: Any data set that appears multiple times will overwrite its preceding twin.
                    </span>
                    <span class="span3">
                        <img src="assets/img/documentation_datafolder.png" class="img-polaroid">
                    </span>
                </div>

                <h3>Data Outputs</h3>

                <div class="row">
                    <span class="span3">
                        Every data set is a variable that can be accessed via PHP. Simple variables can be echoed with just the waraible name. <br><br>
                        Values in Arrays can be accessed by echoing each array key.
                    </span>
                    <span class="span3">
                        <pre class="">
echo $application;
// Output:
Protostrap

echo $fluids[1]['name'];
// Output
Water</pre>
                    </span>
                </div>

                <h2 id="two">Changing data</h2>
                Each data set you provide is stored inside a Session Variable. If there is no Session Variable PHP will read the data from the files, otherwise it will use the data that it wrote inside the Session.
                        <br><br>
                        This allows you to manipulate your data for the length of the session, allowing for example to test scenarios like "Change your Profile-Data".
                        <br><br>
                        <h3>How chnging data works</h3>
                        Protostrap has a set of dummy data for people, that can be accessed via the variable $people.
                        The first person in the list is Anna Alpha:
                        <br><br>
                <div class="row">
                    <span class="span3">
                        The data in data.yml:<br><br>
                       <pre>
people:
  1:
    name: Anna Alpha
    img: f_1
    function: Head of Sales
    email: anna.alpha@acme.com</pre><br>
                       This form actually works, <strong>Give it a try!</strong>
                    </span>
                    <span class="span3">
                        The Form:<br><br>
                        <div class="well">
                            <form class ="form"method="post" action="">
                               Name:<br>
                               <input type="text" name="session[people.1.name]" value="<?= $people[1]['name']?>">
                               <br>
                               Email:<br>
                               <input type="text" name="session[people.1.email]" class="input-medium" value="<?= $people[1]['email']?>">
                               <br>
                               <input type="submit" class="btn" value="Save">
                           </form>
                        </div>
                    </span>
                </div>

                <div class="row">
                    <span class="span6">
Here's the code of the "Name"-field:
                        <pre>&lt;input type="text"
  name="session[people.1.name]"
  value="&lt;?= $people[1]['name']?>"></pre>
                    </span>
                    <span class="span6">
                        This is how you make values changable:
                        <ul>
                            <li class="">When a form is submitted Protostrap checks if there are any fields with the name session.</li>
                            <li class="">You can add the attribute name with the value "session[item.you.want.changed]"</li>
                            <li class="">The part inside the brackets has to correspond to data set element you want to be altered. in this case it is "people.1.name"</li>
                            <li class="">Make sure to only use dots!</li>
                        </ul>
                    <br>
                    Note:<br>
                    The values are changed for the machine you are working on only. <br>
                    If you want to reset the Session data you can eiterh restart your browser or click on the link "Renew PHP Session" in the footer.
                    </span>
                </div>


                <br>
                <h2 id="three">Using data for the Typeahead search</h2>
                Protostrap allows to define specific data-sets as part of a data-based livesearch.
                If you want to make data accessible to the livesearch all you have to do is add one line to the corresponding data set, defining to which page the user should be sent to:
                <div class="row">
                    <span class="span3">
                        <br>
                        <pre>
people:
  livesearch: demo.php
  1:
    name: Anna Alpha
    img: f_1
    function: Head of Sales
    email: anna.alpha@acme.com</pre>
                    </span>
                    <span class="span3"><br>
                    The Typeahead Field:
                    <input type="text"
                        data-provide="data-typeahead" data-results=""
                        class="input-medium data-typeahead"
                        placeholder="Search..."><br>
                    Try:<br>

                     - searching for Anna Alpha<br>
                     - go up and rename Anna Alpha<br>
                     - search for Anna's new name.

                    </span>
                </div>

                    The Typeahed field's code, please note the attribute data-provide and the class having both <strong>data-typeahead</strong> as a value.<br>
                    <pre>
&lt;input type="text"
    data-provide="data-typeahead" data-results=""
    class="input-medium data-typeahead"
    placeholder="Search..."></pre>

            </span>
        </div>

      <hr>

<?php // this includes the footer

include('./footer.php');
?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php include ('protostrap_javascripts.php');?>
  </body>
</html>
