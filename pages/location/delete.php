<div class="header">
    <h1>Delete Location</h1>
</div>

<nav class="breadcrumbs">
    <ul>
        <li><a href="/">Vechiles</a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary"><?php echo htmlentities($recCategory->name()); ?></a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location">Locations</a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location/<?php echo htmlentities($recLocation->id()); ?>/edit">Edit: <span><?php echo htmlentities($recLocation->name()); ?></span></a></li>
        <li>Delete</li>
    </ul>
</nav>

<div class="content">
    <form method="post" action="" id="frm" class="form-group main-form">
        <input type="hidden" id="location.id" name="location.id" value="<?php echo htmlentities($recLocation->id()); ?>" />
        <p>Are you sure you wish to delete this Location?</p>
        <div class="input-group">
            <label class="form-control">Name</label>
            <div><samp><?php echo htmlentities($recLocation->name()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Latitude</label>
            <div><samp><?php echo htmlentities($recLocation->latitude()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Longitude</label>
            <div><samp><?php echo htmlentities($recLocation->longitude()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Updated</label>
            <div><samp data-dateformatter><?php echo htmlentities($recLocation->updated()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Created</label>
            <div><samp data-dateformatter><?php echo htmlentities($recLocation->created()); ?></samp></div>
        </div>
        <div class="button-group">
            <button type="submit" class="button remove"><i class="fa-solid fa-trash"></i>Confirm Delete</button>
            <a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location/<?php echo htmlentities($recLocation->id()); ?>/edit" class="button secondary"><i class="fa-solid fa-ban"></i>Cancel</a>
        </div>
    </form>
</div>