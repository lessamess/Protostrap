<?php
$moduleVars = '
module:
  name: "Simple Card"
  description: "A single card with an image, title and text"
  group: "Teaser"
  container: "md-3"
  data:
    card_title: "Title of card"
    card_text: "The text of the card."
    card_img: "assets/img/placeholderImage.svg"
';

// Handle the module data
// The first line handles the data, 
// the second avoids the card from being printed when the list of modules is generated

include("./core/snippets/handleModuleData.php");
if(isset($moduleList) && $moduleList == true){return;} ?>

<div class="card">
    <?php if(strlen($card_img) > 0): ?>
    <div class="btn btn-default btn-togglePrimary btn-circle-sm btn-onCard"><i class="fa fa-heart-o"></i></div>
    <img class="card-img-top" src="<?php echo $card_img ;?>" class="img-responsive" alt="Card image cap">
    <?php endif ?>
    <div class="card-block">
        <h4 class="card-title"><?php echo $card_title ;?></h4>
        <p class="card-text"><?php echo $card_text ;?></p>
    </div>
</div>
