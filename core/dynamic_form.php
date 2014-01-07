<?php
function dynForm($dynForm, $id = false){

    if(empty($dynForm)){
        echo "Form-Data undefined";
        return;
    } else {
        $dynForm = $GLOBALS['forms'][$dynForm];
    }

    //VARS
        $tempId             = $dynForm['id'];
        $showList           = true;
        $formFieldStile     = "hide";
        $legend             = true;
        $fullForm           = true;
        $item               = false;
        $formSessionItem    = time();
        $fillVals           = true;
        $hiddenFields       = false;
        $saveButtonText     = "Save";
        $postAction         = "";
        $disableEdit        = false;


    // TODO
        // Cancel Action
        // th width

    // general settings
        // Only show formfields
        if(!$id OR !empty($dynForm['onlyShowForm'])){
            // This hides the list and edit link, only showing the form fields
            $showList = false;

            // No need to hide the form fields any moore
            $formFieldStile ="";
        }

        if(!$id && !empty($dynForm['addNewAction'])){
            $postAction = $dynForm['addNewAction'];
        }


        // hide form tags and buttons
        if(!empty($dynForm['partialForm'])){
            // this makes that only the <tr>'s with the fields are echoed.
            $fullForm = false;
        }

        // hide legend
        if(!empty($dynForm['noLegend'])){
            // this Hides fieldset and Legend
            $legend = false;
        }


        // hide EditLink
        if(!empty($dynForm['disableEdit'])){
            // this Hides fieldset and Legend
            $disableEdit = true;
        }

    // data
        if($id && $dynForm['sessionId']) {
            // this selects the item to be changed
            $item = $GLOBALS[$dynForm['sessionId']][$id];
            // this selects the session variable to be changed
            $formSessionItem = $id;
        } else {
            // This leaves the fields empty
            $fillVals = false;

            // This defines the next index for the array
            if($dynForm['sessionId']){
                $formSessionItem = count($GLOBALS[$dynForm['sessionId']]) + 1;
            }


        }

        if(!$fillVals && !empty($dynForm['hiddenFields'])){
            // This adds hidden fields
            $hiddenFields = $dynForm['hiddenFields'];
        }

        if($dynForm['sessionId'] == false){
            // This removes the session variable.
            $formSessionItem = "";
        }



// BUILD FORM

// form tag
        if($fullForm){?>
            <form method="post" action="<?= $postAction;?>" class="form-horizontal">
        <?php }

// Hidden fields (only for new entries)
        if($hiddenFields){
            foreach($hiddenFields as $key => $val){
                if($key == "snippet"){

                    if(is_array($val)){

                        foreach ($val as $v){
                            if(file_exists($v)){
                                include($v);
                            } else {
                                echo $v;
                            }
                        }
                    } else {
                        if(file_exists($v)){
                                include($v);
                            } else {
                                echo $v;
                            }
                    }

                } else {
                    $formSessionName ="session[" . $dynForm['sessionId']. "." . $formSessionItem. "." . $key ."]";
                    if(is_array($val)){
                         $val = "arrayUnserialize:" . serialize($val);
                    }?>
                    <input type="hidden" name="<?= $formSessionName;?>" value="<?= $val;?>">
                <?php
                }


             }
        }

// fieldset & Legend
        if($legend) {?>
                <fieldset>
                    <legend><?php echo $dynForm['formName'];

                        // show edit link
                        if($showList && $disableEdit == false){ ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="dynForm " data-toggle-class="<?= $dynForm['id'];?>Form "><small><i class="icon-pencil"></i>Edit</small></a>
                        <?php }?>
                    </legend>
        <?php } ?>
                    <table class="table ">


<?php

// *** F O R E A C H - F I E L D S *** //

        foreach($dynForm['fields'] as $field){


            if($id && $dynForm['sessionId']) {
                // this selects the item to be changed
                $item = $GLOBALS[$dynForm['sessionId']][$id];
            }

            $field['value'] = "None";
            $field['formSessionName'] = "";
            $field['formSessionItem'] = $formSessionItem;

            // if the session-variable has something in it:
            if(!empty ( $item[$field['name']] )){

                $field['value'] = $item[$field['name']];

                // Handle Foreign Key values
                if(!empty($field['isForeignKey']) && $field['isForeignKey'] == true){
                    $item = $GLOBALS[$field['isForeignKey']][$item[$field['name']]];
                    $field['value'] = $item['name'];
                }

            }


            if($id && !empty($field['isMultipleForeignKey'])){

                    $field['value'] = $GLOBALS[$item[$field['isMultipleForeignKey']['fkTypeField']]][$item[$field['isMultipleForeignKey']['fkValue']]]['name'];
                }

            // if there is a session variable
            if($dynForm['sessionId']){
                $field['formSessionName'] ="session[" . $dynForm['sessionId']. "." . $formSessionItem. "." . $field['name'] ."]";
            }

            // show <th> cell
                        ?>
                        <tr>
                            <th class="span3 align-left "><?= $field['label'];?>

                            </th>

                            <?php
            // show List value
                    if($showList){?>
                            <td class="<?= $tempId;?>Form"><?= $field['value'];?></td>

                            <?php

                            }

            // show form field
                            ?>
                            <td class="<?= $tempId;?>Form <?= $formFieldStile?>">


                                <?php

                                if($field['type'] == "snippet"){
                                    include($field['file']);
                                } else {
                                    getFieldMarkup($field, $fillVals, $dynForm, $item);
                                }


                                ?>

                            </td>
                        </tr>
<?php }
// Submit Buttons
                        if($fullForm){?>
                            <tr>
                                <th class="span3 align-left ">&nbsp;</th>
                                <?php if($showList){ ?>
                                <td class="<?= $tempId;?>Form "></td>
                                <?php } ?>
                                <td class="<?= $tempId;?>Form <?= $formFieldStile?>">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                    <a href="javascript:history.back();" class="btn ">Cancel</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
            <?php if($legend) {?>
                </fieldset>
            <?php }

        if($fullForm){?>
            </form >
        <?php }

    unset($dynForm);
}

function getFieldMarkup($field, $fillVals, $dynForm, $item ){
    if(!$fillVals or $field['type'] == "password"){
        $field['value'] = "";
    }
    $placeholder = "";
    if(!empty($field['placeholder'])){
        $placeholder = $field['placeholder'];
    }
    $fieldId = "";
    if(!empty($field['fieldId'])){
        $fieldId = $field['fieldId'];
    }

    switch($field['type']){
        case 'radio':
        case 'radios':
            // this expects
            // 1. the form element to be from a foreign key.
            // 2. the key of the foreign entry to be "name"
            $checked = "";
            if (empty($field['required'])) {
                if ($field['value'] == "None"){$checked = "checked=\"checked\"";} ?>
                    <label class="radio">
                        <input type="radio" name="<?= $field['formSessionName'] ;?>" id="optionsRadios1" value="" <?= $checked;?>>
                        None
                    </label>
            <?php }


            Foreach($GLOBALS[$field['isForeignKey']] as $radioKey => $radioVal ) {
                $checked = "";
                if ($field['value'] == $radioVal['name']){$checked = "checked=\"checked\"";} ?>
                    <label class="radio">
                        <input type="radio" name="<?= $field['formSessionName'] ;?>" id="optionsRadios1" value="<?= $radioKey;?>" <?= $checked;?>>
                        <?= $radioVal['name'];?>
                    </label>
              <?php }
              if (!empty($field['addOption'])) { ?>
              <label class="radio">
                    <input type="radio" name="<?= $field['formSessionName'] ;?>" id="optionsRadios1" value="<?= $radioKey;?>">
                    <input type="text" placeholder="Add new <?= $field['label']?>">
                </label>

            <?php }
            break;
        case 'checkboxes':
            // this expects
            // 1. the form element to be from a foreign key.
            // 2. the key of the foreign entry to be "name"
            $checked = "";
            Foreach($GLOBALS[$field['isForeignKey']] as $radioKey => $radioVal ) {
                $checked = "";
                if ($field['value'] == $radioVal['name']){$checked = "checked=\"checked\"";} ?>
                    <label class="checkbox">
                        <input type="checkbox" name="<?= $field['formSessionName'] ;?>" id="" value="<?= $radioKey;?>" <?= $checked;?>>
                        <?= $radioVal['name'];?>
                    </label>
              <?php }
              if (!empty($field['addOption'])) { ?>
              <label class="checkbox">
                    <input type="checkbox" name="<?= $field['formSessionName'] ;?>" id="" value="<?= $radioKey;?>">
                    <input type="text" placeholder="Add new <?= $field['label']?>">
                </label>

            <?php }
            break;
        case 'select':
            // this expects
            // 1. the form element has to be from a foreign key.
            // 2. the key of the foreign entry to be "name"
            echo "<select name=\"" . $field['formSessionName']  . "\">";
            $selected = "";
            if ($field['value'] == "None"){$selected = " selected";} ?>
                    <option <?= $selected;?>>None</option>
            <?php
            Foreach($GLOBALS[$field['isForeignKey']] as $selectKey => $selectVal ) {
                $selected = "";
                if ($field['value'] == $selectVal['name']){$selected = " selected";} ?>
                     <option value="<?= $selectKey; ?>"<?= $selected;?>><?= $selectVal['name'];?></option>
              <?php }
            echo "</select>";

            break;
        case 'textarea':?>
            <textarea name="<?= $field['formSessionName'] ;?>" rows="10" class="input-block-level" wrap="SOFT"><?= $field['value'];?></textarea>
           <?php
            break;
        case 'date':?>

            <input name="<?= $field['formSessionName'] ;?>" type="text" class="" value="<?= $field['value'];?>" id="dpd1" data-date-format="<?= $GLOBALS['config']['datepickerFormat'];?>" >
            <?php
            break;
        case 'date-dpd2':?>

            <input  name="<?= $field['formSessionName'] ;?>" type="text" class="" value="<?= $field['value'];?>" id="dpd2" data-date-format="<?= $GLOBALS['config']['datepickerFormat'];?>">
            <?php
            break;
        case 'typeahead':

          ?>

            <?php if(!empty($field['isMultipleForeignKey'])){
                $fktype ="session[" . $dynForm['sessionId']. "." . $field['formSessionItem']. "." . $field['isMultipleForeignKey']['fkTypeField'] ."]";
                $fkvalue ="session[" . $dynForm['sessionId']. "." . $field['formSessionItem']. "." . $field['isMultipleForeignKey']['fkValue'] ."]";
                $fktypevalue = "";
                $fkvaluevalue = "";
                if(!empty($item)){
                    $fktypevalue = $item[$field['isMultipleForeignKey']['fkTypeField']];
                    $fkvaluevalue = $item[$field['isMultipleForeignKey']['fkValue']];
                    //$field['value'] = $GLOBALS[ $fktypevalue][$fkvaluevalue ]['name'];

                }


                ?>
                <input type="hidden" id="<?= $field['name']?>-fkTypeField" name="<?= $fktype?>" value="<?= $fktypevalue?>"/>
                <input type="hidden" id="<?= $field['name']?>-fkValue" name="<?= $fkvalue;?>" value="<?= $fkvaluevalue?>"/>
            <?php } ?>

            <input type="text"
                   name="<?= $field['formSessionName'] ;?>"
                    data-provide="select<?= ucfirst($field['name']);?>"
                    class="input-medium select<?= ucfirst($field['name']);?> "
                    value="<?= $field['value'];?>"
                    placeholder="Search">
          <?php
            break;
        case 'password':?>
            <div class="input-append ">
                        <input name='pass' class='passwordWithToggle ' type='<?= $field['type'] ;?>' placeholder='Password'>
                        <span class="add-on passwordToggle"><i class="icon-check-empty"></i> Show</span>
                     </div>
            <?php
            break;
        default: ?>
            <input id="<?= $fieldId;?>" type="<?= $field['type'] ;?>" placeholder="<?= $placeholder;?>" name="<?= $field['formSessionName'] ;?>"value="<?= $field['value'];?>">
            <?php
             break;
        }

    }

?>