<?php

if(empty($tabledata)){
    echo("Missing Variable \$tabledata");
    return;
}
if(empty($tabledata['fields']) OR empty($tabledata['data'])){
    echo("Variable \$tabledata has the wrong format");
    return;
}

?>
    <table id="filtertable" class="simpleFilterTable table table-condensed table-striped table-hover draggable tablesorter">
        <thead>
            <tr>
                <?php
                foreach ($tabledata['fields']['labels'] as $key => $feld) {
                    switch ($feld) {
                        case 'Download': ?>
                            <th><i class="fa fa-file-pdf-o"></i></th>
                            <?php break;
                        default: ?>
                            <th class="noWrap"><?php echo $feld ;?></th>
                        <?php break;
                    }
                 } ?>

            </tr>
            <tr >

                <?php
                foreach ($tabledata['fields']['labels'] as $key => $feld) {
                    switch ($feld) {
                        case 'Download': ?>
                            <td>&nbsp;</td>
                            <?php break;
                        default:
                            if(isset($noField) && in_array($tabledata['fields']['keys'][$key], $noField)){
                                echo "<td></td>";
                            } else { ?>

                                 <td><input  type="text" class="simpleFilterSearch form-control" name="" placeholder=""></td>
                            <?php } ?>
                        <?php break;
                    }
                } ?>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($tabledata['data'] as $key => $filterrow) { ?>
                <tr class=" searchresults filterme ">
                    <?php foreach ($tabledata['fields']['keys'] as $key => $feld) { ?>
                            <td class="noWrap"><?php
                                switch ($feld) {
                                    case 'download':
                                        if ($filterrow[$feld] == 1) {?>
                                            <i class="fa fa-file-pdf-o"></i>
                                        <?php }
                                        break;
                                    case 'preis':
                                        echo figureFormat($filterrow[$feld],2);
                                        break;
                                    default:
                                        echo $filterrow[$feld];
                                        break;
                                }?>
                            </td>
                        <?php } ?>
                </tr>
                <?php } ?>
            </tbody>


    </table>
