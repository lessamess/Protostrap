<?php
$moduleVars = '
module:
  name: "Collapsing form"
  description: "A form with collapsing functionality"
  group: "Other"
  container: "md-4"
  data:
    mod_title: "Get our Newsletter"
    mod_mandatoryInfo: "All fields with a <b>*</b> are mandatory."
    mod_errorMessage: "This form is not complete, please fill in all the required fields"
';

// Handle the module data
// The first line handles the data, 
// the second avoids the card from being printed when the list of modules is generated

include("./core/snippets/handleModuleData.php");

if(isset($moduleList) && $moduleList == true){return;}


?>
<h2 id="formstart"><?php echo $mod_title ;?></h2>
<div class="collapse  collapseForm in" >
    <form id="testform" method="post" action="index.php">
    <br>
    <?php echo $mod_mandatoryInfo; ?>
    <br><br>
    <div class="feedback-error-message hide">
        <?php alert($mod_errorMessage, "danger", "inherit" , "boxid" , "dismiss" ); ?>
    </div>
    <div class="micropadding"></div>
    <div class="form-group">
            <label for="Name"><?php echo __("Name"); ?> *</label>
            <input type="text" class="form-control required" id="Name" name="Name" placeholder="">
            <span class="fa fa-times form-control-feedback" aria-hidden="true"></span>
            <small class="form-text form-control-feedback-message text-danger"><?php echo __("This field must not be empty"); ?></small>
        </div>

    <div class="form-group">
        <label for="email"><?php echo __("Email Address"); ?> *</label>
        <input type="email" class="form-control required" id="email" name="email" placeholder="">
        <span class="fa fa-times form-control-feedback" aria-hidden="true"></span>
        <small class="form-text form-control-feedback-message text-danger"><?php echo __("This field must not be empty"); ?></small>
    </div>

    <button type="button" data-submit="testform" class="btn btn-success checkform scrollTo"  data-scrollto="formstart"  data-offset="70"><?php echo __("Senden"); ?></button>
    </form>
</div>
<div class="collapse  collapseForm" >
        <?php
        $feedback_title = "Thank you";
        $feedback_text =  "Your request has been sent successfully";
        include("./snippets/submitfeedback.php");?>
</div>