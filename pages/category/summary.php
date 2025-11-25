<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<div class="header">
    <h1>Category Summary</h1>
</div>

<nav class="breadcrumbs">
    <ul>
        <li><a href="/">Categories</a></li>
        <li><?php echo htmlentities($recCategory->name()); ?></li>
    </ul>
</nav>

<div class="content">
    <div class="row">
        <div class="options">
            <form method="post" action="" id="frm" class="inline">
                <?php
                if ($recCategory->favorite() == "No") {
                ?>
                    <button type="submit" name="category.favorite" value="Yes" class="link secondary" title="Add Favorite"><i class="fa-regular fa-star"></i></button>
                <?php
                } else {
                ?>
                    <button type="submit" name="category.favorite" value="No" class="link secondary" title="Remove Favorite"><i class="fa-solid fa-star"></i></button>
                <?php
                }
                ?>
            </form>
            <?php
            if ($recCategory->isOwner()) {
            ?>
                <a href="/category/<?php echo htmlentities($category_id); ?>/edit" class="button secondary"><i class="fa-solid fa-pencil"></i>Edit Category</a>
            <?php
            }
            if ($recCategory->isOwner() || $recCategory->isManager()) {
            ?>
                <a href="/category/<?php echo htmlentities($category_id); ?>/location/create" class="button secondary"><i class="fa-solid fa-plus"></i>Create Location</a>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="row">
        <div id="map"></div>
    </div>
</div>

<script
    src="https://unpkg.com/leaflet/dist/leaflet.js"
    defer></script>