<?php
    // set an Item Title if none is set
    if(!isset($thisItem)){
        $thisItem = "List item";
    }

    // Set a default active item if none is set
    if(!isset($activeItems)){
        $activeItems = array("fave");
    }

    // list all possible items (throughout the app)
    $dropdownItems = array("fave","removefave","compare");

    $dropdownItemClasses = array();

    // show active Items by
    foreach ($dropdownItems as $dropdownItem) {
        if(in_array($dropdownItem, $activeItems)){
            $dropdownItemClasses[$dropdownItem] = "";
        } else {
            $dropdownItemClasses[$dropdownItem] = "hide";
        }
    }

     ?>
<div class="btn-group">
    <button class="btn btn-text dropdown-toggle optionsDropdown" type="button" id="dropdownMenu<?php echo getUniqueId(); ;?>" data-toggle="dropdown" aria-expanded="true">
        <span class="icon ion-ios-more"></span>
    </button>
    <ul class="dropdown-menu  dropdown-menu-right" role="menu">
        <li class="<?php echo $dropdownItemClasses['fave'] ;?>"><a href="javascript:void(0);"><i class="fa fa-star"></i> Add to favorites</a></li>
        <li class="<?php echo $dropdownItemClasses['removefave'] ;?>"><a href="javascript:void(0);"><i class="fa fa-star-o"></i> Remove from Favorites</a></li>
        <li role="presentation" class="<?php echo $dropdownItemClasses['compare'] ;?> divider"></li> <!-- Only show the divider if you show the next item -->
        <li class="<?php echo $dropdownItemClasses['compare'] ;?>"><a href="javascript:void(0);"><i class="fa fa-columns"></i> Compare</a></li>

    </ul>
</div>