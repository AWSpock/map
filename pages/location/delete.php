<div class="header">
    <h1>Delete Location</h1>
</div>

<nav class="breadcrumbs">
    <ul>
        <li><a href="/">Vechiles</a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary"><?php echo htmlentities($recCategory->name()); ?></a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location">Locations</a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location/<?php echo htmlentities($recLocation->id()); ?>/edit">Edit: <span data-dateonlyformatter><?php echo htmlentities($recLocation->date()); ?></span> - <span data-numberformatter><?php echo htmlentities($recLocation->odometer()); ?></span></a></li>
        <li>Delete</li>
    </ul>
</nav>

<div class="content">
    <form method="post" action="" id="frm" class="form-group main-form">
        <input type="hidden" id="location.id" name="location.id" value="<?php echo htmlentities($recLocation->id()); ?>" />
        <p>Are you sure you wish to delete this Location?</p>
        <div class="input-group">
            <label class="form-control">Date</label>
            <div><samp><?php echo htmlentities($recLocation->date()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Odometer</label>
            <div><samp data-numberformatter><?php echo htmlentities($recLocation->odometer()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Garage</label>
            <div><samp><?php echo htmlentities($recLocation->garage()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Price</label>
            <div><samp data-moneyformatter><?php echo htmlentities($recLocation->price()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Description</label>
            <div><samp><?php echo htmlentities($recLocation->description()); ?></samp></div>
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