<div class="header">
    <h1>Edit Location</h1>
</div>

<nav class="breadcrumbs">
    <ul>
        <li><a href="/">Categories</a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary"><?php echo htmlentities($recCategory->name()); ?></a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location">Locations</a></li>
        <li>Edit: <span data-dateonlyformatter><?php echo htmlentities($recLocation->date()); ?></span> - <span data-numberformatter><?php echo htmlentities($recLocation->odometer()); ?></span></li>
    </ul>
</nav>

<div class="content">
    <form method="post" action="" id="frm" class="form-group main-form">
        <input type="hidden" id="location.id" name="location.id" value="<?php echo htmlentities($recLocation->id()); ?>" />
        <div class="input-group date">
            <label for="location.date" class="form-control">Date</label>
            <input type="date" id="location.date" name="location.date" class="form-control" required="required" value="<?php echo htmlentities($recLocation->date()); ?>" />
        </div>
        <div class="input-group odometer">
            <label for="location.odometer" class="form-control">Odometer</label>
            <input type="number" id="location.odometer" name="location.odometer" class="form-control" required="required" value="<?php echo htmlentities($recLocation->odometer()); ?>" min="1" step="1" />
        </div>
        <div class="input-group garage">
            <label for="location.garage" class="form-control">Garage</label>
            <input type="text" id="location.garage" name="location.garage" class="form-control" required="required" value="<?php echo htmlentities($recLocation->garage()); ?>" list="garage-list" />
            <datalist id="garage-list">
                <?php
                foreach ($garages as $garage) {
                ?>
                    <option value="<?php echo htmlentities($garage); ?>"></option>
                <?php
                }
                ?>
            </datalist>
        </div>
        <div class="input-group price">
            <label for="location.price" class="form-control">Price</label>
            <input type="number" id="location.price" name="location.price" class="form-control" required="required" value="<?php echo htmlentities($recLocation->price()); ?>" step=".01" min="0" />
        </div>
        <div class="input-group description">
            <label for="location.description" class="form-control">Description</label>
            <textarea id="location.description" name="location.description" class="form-control" required="required"><?php echo htmlentities($recLocation->description()); ?></textarea>
        </div>
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