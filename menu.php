<?php

if ($userAuth->checkToken()) {
    $favorite = null;
    foreach ($data->categories($userAuth->user()->id())->getRecords() as $category) {
        if (is_null($favorite)) {
            $favorite = true;
?>
            <div class="menu-title">Favorites</div>
        <?php
        }
        if ($category->favorite() === "No" && $favorite) {
            $favorite = false;
        ?>
            <div class="menu-title">Others</div>
        <?php
        }
        ?>
        <li>
            <a href="/category/<?php echo $category->id(); ?>/summary"><i class="fa-solid fa-layer-group"></i><?php echo htmlentities($category->name()); ?></a>
        </li>
        <?php
            if (isset($category_id) && $category->id() == $category_id) {
            ?>
                <!-- <ul> -->
                    <li class="menu-sub"><a href="/category/<?php echo $category->id(); ?>/location"><i class="fa-solid fa-location-dot"></i>Locations</a></li>
                <!-- </ul> -->
            <?php
            }
            ?>
<?php
    }
}
