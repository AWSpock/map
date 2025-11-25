<div class="header">
    <h1>Edit Category</h1>
</div>

<nav class="breadcrumbs">
    <ul>
        <li><a href="/">Categories</a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary"><?php echo htmlentities($recCategory->name()); ?></a></li>
        <li>Edit</li>
    </ul>
</nav>

<div class="content">
    <form method="post" action="" id="frm" class="form-group full-form">
        <input type="hidden" id="category.id" name="category.id" value="<?php echo htmlentities($recCategory->id()); ?>" />
        <div class="group-one">
            <h2>Category Info</h2>
            <div class="input-group">
                <label for="category.name" class="form-control">Name</label>
                <input type="text" id="category.name" name="category.name" class="form-control" required="required" value="<?php echo htmlentities($recCategory->name()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.make" class="form-control">Make</label>
                <input type="text" id="category.make" name="category.make" class="form-control" required="required" value="<?php echo htmlentities($recCategory->make()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.model" class="form-control">Model</label>
                <input type="text" id="category.model" name="category.model" class="form-control" required="required" value="<?php echo htmlentities($recCategory->model()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.year" class="form-control">Year</label>
                <input type="text" id="category.year" name="category.year" class="form-control" required="required" value="<?php echo htmlentities($recCategory->year()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.color" class="form-control">Color</label>
                <input type="text" id="category.color" name="category.color" class="form-control" value="<?php echo htmlentities($recCategory->color()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.tank_capacity" class="form-control">Tank Capacity</label>
                <input type="text" id="category.tank_capacity" name="category.tank_capacity" class="form-control" required="required" value="<?php echo htmlentities($recCategory->tank_capacity()); ?>" />
            </div>
        </div>
        <div class="group-two">
            <h2>Purchase Info</h2>
            <div class="input-group">
                <label for="category.purchase_date" class="form-control">Purchase Date</label>
                <input type="date" id="category.purchase_date" name="category.purchase_date" class="form-control" value="<?php echo htmlentities($recCategory->purchase_date()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.purchase_price" class="form-control">Purchase Price</label>
                <input type="number" id="category.purchase_price" name="category.purchase_price" class="form-control" min="0" step=".01" value="<?php echo htmlentities($recCategory->purchase_price()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.purchase_odometer" class="form-control">Purchase Odometer</label>
                <input type="number" id="category.purchase_odometer" name="category.purchase_odometer" class="form-control" min="0" step="1" value="<?php echo htmlentities($recCategory->purchase_odometer()); ?>" />
            </div>
        </div>
        <div class="group-three">
            <h2>Sell Info</h2>
            <div class="input-group">
                <label for="category.sell_date" class="form-control">Sell Date</label>
                <input type="date" id="category.sell_date" name="category.sell_date" class="form-control" value="<?php echo htmlentities($recCategory->sell_date()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.sell_price" class="form-control">Sell Price</label>
                <input type="number" id="category.sell_price" name="category.sell_price" class="form-control" min="0" step=".01" value="<?php echo htmlentities($recCategory->sell_price()); ?>" />
            </div>
            <div class="input-group">
                <label for="category.sell_odometer" class="form-control">Sell Odometer</label>
                <input type="number" id="category.sell_odometer" name="category.sell_odometer" class="form-control" min="0" step="1" value="<?php echo htmlentities($recCategory->sell_odometer()); ?>" />
            </div>
        </div>
        <div class="button-group">
            <button type="submit" class="button primary"><i class="fa-solid fa-save"></i>Save</button>
            <a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary" class="button secondary"><i class="fa-solid fa-ban"></i>Cancel</a>
            <a href="/category/<?php echo htmlentities($recCategory->id()); ?>/delete" class="button remove"><i class="fa-solid fa-trash"></i>Delete?</a>
        </div>
    </form>
</div>