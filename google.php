<?php
$forceLoadData = true;
include('core/protostrap.php');

$template = "searchfield";
if(!empty($_GET['q'])){
    // Project variables from file assets/data/fakeGoogle.yml
    $urls = $google['urlsToReplace'];
    $replacements = $google['replacements'];


    // Routine Vars
    $template = "results";
    $start = 0;
    $startParam = "";

    // Manage Paging
    if(!empty($_GET['start'])) {
        $startParam = "&start=".$_GET['start'];
        $start = $_GET['start'];
    }


    // build URL

    $apiurl = "https://www.googleapis.com/customsearch/v1?&q=". urlencode($_GET['q']);
    $apiurl .= $startParam;
    foreach ($google['callParameters'] as $key => $value) {
        $apiurl .= "&" . $key . "=" . $value;
    }

    $json = file_get_contents($apiurl);

    foreach ($urls as $key => $val) {
        $json =  str_replace($val, $replacements[$key], $json);
    }
    $data = json_decode($json, TRUE);
    // var_dump($apiurl);
}
 ?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $application . " - " . $brand ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include('./snippets/meta_headTag.php');?>

    </head>
<?php

// uncomment the following function to force user to be logged in
// forceLogin(); ?>

    <body style="background-color:#fff;">
            <?php switch($template){
                case 'searchfield'; ?>
                    <div class="container">
                        <div class="row">
                            <span class="col-md-3">&nbsp;</span>
                            <span class="col-md-6 align-center">
                                <br><br><br><br>
                                <img src="assets/img/google.png"><br><br>
                                <form action="google.php" method="get">
                                    <input type="text" class="form-control googleSearchfield"  name="q" value=""> <br>
                                    <input type="submit"  name="submit" class="btn googleBtn" value="Google-Suche">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="submit"  name="submit" class="btn googleBtn" value="Auf gut Glück!">
                                </form>
                                </div>
                            </span>
                            <span class="col-md-3">&nbsp;</span>
                        </div>
                    </div>
                    <?php break;
                case 'results'; ?>
                <div style="padding: 15px; background-color:#f1f1f1">
                        <div class="row">
                            <div class="col-md-1">
                                <a href="google.php"><img width="92"src="assets/img/googleMini.png"></a>
                            </div>
                            <div class="col-md-8 col-lg-4">
                                <form action="google.php" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control googleSearchfield"  name="q" value="<?php echo $_GET['q'] ;?>">

                                      <span class="input-group-btn">
                                        <button class="btn btn-primary googleprimaryBtn" type="submit"><i class="fa fa-search"></i></button>
                                      </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-1 col-lg-5">
                            <br>
                            <div class="googleResultStats">Ungefähr <?php echo figureFormat($data['searchInformation']['totalResults'],0) ;?> Ergebnisse<nobr> (<?php echo figureFormat($data['searchInformation']['searchTime'],2) ;?> Sekunden)&nbsp;</nobr></div>
                            <?php foreach ($data['items'] as $key => $res) { ?>
                                <div class="googleResult">
                                    <a href="<?php echo $res['link'] ;?>" class="googleTitle"><?php echo $res['htmlTitle'] ;?></a><br>
                                    <a class="googleLink" href="<?php echo $res['link'] ;?>"><?php echo $res['htmlFormattedUrl'] ;?></a><br>
                                    <span class="googleDescription"><?php echo $res['htmlSnippet'] ;?></span>
                                </div>
                            <?php } ?>
                            <!-- Navigation -->
                            <table style="border-collapse:collapse;text-align:left;margin:30px auto 30px" id="nav">
                                <tbody>
                                    <tr valign="top">
                                        <?php
                                        $i = 1;

                                        while ($i <= 10) {
                                            if($i == 1){
                                                if(empty($_GET['start']) OR $_GET['start'] == 0){ ?>
                                                    <td class="b navend">
                                                            <span style="background:url(./assets/img/google_nav_logo195.png) no-repeat;background-position:-24px 0;width:28px" class="csb gbil"></span>
                                                    </td>
                                                    <td class="cur">
                                                            <span style="background:url(./assets/img/google_nav_logo195.png) no-repeat;background-position:-53px 0;width:20px" class="csb gbil ch"></span>
                                                            1
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="b navend">
                                                        <a id="pnprev" href="/google.php?q=<?php echo $_GET['q'] ;?>&amp;start=<?php echo $start-10 ;?>&amp;sa=N" class="pn">
                                                            <span style="background:url(./assets/img/google_nav_logo195.png) no-repeat;background-position:0 0;width:53px;float:right" class="csb gbil ch"></span>
                                                            <span style="display:block;margin-right:35px;clear:right;color: #1a0dab;font-size:small">Zurück</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="/google.php?q=<?php echo $_GET['q'] ;?>&amp;start=<?php echo ($i-1)*10 ;?>&amp;sa=N" class="fl">
                                                            <span style="background:url(./assets/img/google_nav_logo195.png) no-repeat;background-position:-74px 0;width:20px" class="csb gbil ch"></span>
                                                            1
                                                        </a>
                                                    </td>
                                                <?php }
                                            } else {
                                                if(!empty($_GET['start']) and ($_GET['start'])/10 + 1 == $i){ ?>
                                                    <td class="cur">
                                                        <span style="background:url(./assets/img/google_nav_logo195.png) no-repeat;background-position:-53px 0;width:20px" class="csb gbil"></span>
                                                        <?php echo $i ;?>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <a href="/google.php?q=<?php echo $_GET['q'] ;?>&amp;start=<?php echo ($i-1)*10  ;?>&amp;sa=N" class="fl">
                                                            <span style="background:url(./assets/img/google_nav_logo195.png) no-repeat;background-position:-74px 0;width:20px" class="csb gbil ch"></span>
                                                            <?php echo $i ;?>
                                                        </a>
                                                    </td>
                                                <?php }
                                            }
                                            $i++;
                                        } ?>
                                        <td class="b navend">
                                            <a style="text-align:left" id="pnnext" href="/google.php?q=<?php echo $_GET['q'] ;?>&amp;start=<?php echo $start+10 ;?>&amp;sa=N" class="pn">
                                                <span style="background:url(./assets/img/google_nav_logo195.png) no-repeat;background-position:-96px 0;width:71px" class="csb gbil ch"></span>
                                                <span style="display:block;margin-left:53px;color: #1a0dab;font-size:small">Weiter</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                </div>

                    <?php break;
                } ?>





        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('./snippets/meta_javascripts.php');?>
  </body>
</html>




