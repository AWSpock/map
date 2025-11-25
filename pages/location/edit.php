<div class="header">
    <h1>Edit Location</h1>
</div>

<nav class="breadcrumbs">
    <ul>
        <li><a href="/">Categories</a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary"><?php echo htmlentities($recCategory->name()); ?></a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location">Locations</a></li>
        <li>Edit: <span><?php echo htmlentities($recLocation->name()); ?></span></li>
    </ul>
</nav>

<div class="content">
    <form method="post" action="" id="frm" class="form-group main-form">
        <input type="hidden" id="location.id" name="location.id" value="<?php echo htmlentities($recLocation->id()); ?>" />
        <div class="input-group name">
            <label for="location.name" class="form-control">Name</label>
            <input type="text" id="location.name" name="location.name" class="form-control" required="required" value="<?php echo htmlentities($recLocation->name()); ?>" />
        </div>
        <div class="input-group latitude_longitude">
            <label for="location.latitude_longitude" class="form-control">Latitude, Longitude</label>
            <input type="text" id="location.latitude_longitude" name="location.latitude_longitude" class="form-control" required="required" value="<?php echo htmlentities($recLocation->lat_lon()); ?>" />
        </div>
        <!-- <div class="input-group latitude">
            <label for="location.latitude" class="form-control">Latitude</label>
            <input type="number" id="location.latitude" name="location.latitude" class="form-control" required="required" value="<?php //echo htmlentities($recLocation->latitude()); 
                                                                                                                                    ?>" min="-90" max="90" step=".00000000000001" />
        </div>
        <div class="input-group longitude">
            <label for="location.longitude" class="form-control">Longitude</label>
            <input type="number" id="location.longitude" name="location.longitude" class="form-control" required="required" value="<?php //echo htmlentities($recLocation->longitude()); 
                                                                                                                                    ?>" min="-180" max="180" step=".00000000000001" />
        </div> -->
        <div class="button-group">
            <button type="submit" class="button primary"><i class="fa-solid fa-save"></i>Save</button>
            <a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location" class="button secondary"><i class="fa-solid fa-ban"></i>Cancel</a>
            <a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location/<?php echo htmlentities($recLocation->id()); ?>/delete" class="button remove"><i class="fa-solid fa-trash"></i>Delete?</a>
        </div>
        <div class="input-group updated">
            <label class="form-control">Updated</label>
            <div><samp data-dateformatter><?php echo htmlentities($recLocation->updated()); ?></samp></div>
        </div>
        <div class="input-group created">
            <label class="form-control">Created</label>
            <div><samp data-dateformatter><?php echo htmlentities($recLocation->created()); ?></samp></div>
        </div>
    </form>
</div>