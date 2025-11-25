<div class="header">
    <h1>Delete Category</h1>
</div>

<nav class="breadcrumbs">
    <ul>
        <li><a href="/">Categories</a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary"><?php echo htmlentities($recCategory->name()); ?></a></li>
        <li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/edit">Edit</a></li>
        <li>Delete</li>
    </ul>
</nav>

<div class="content">
    <form method="post" action="" id="frm" class="form-group main-form">
        <input type="hidden" id="category.id" name="category.id" value="<?php echo htmlentities($recCategory->id()); ?>" />
        <p>Are you sure you wish to delete this Category?</p>
        <div class="input-group">
            <label class="form-control">Name</label>
            <div><samp><?php echo htmlentities($recCategory->name()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Make</label>
            <div><samp><?php echo htmlentities($recCategory->make()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Model</label>
            <div><samp><?php echo htmlentities($recCategory->model()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Year</label>
            <div><samp><?php echo htmlentities($recCategory->year()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Color</label>
            <div><samp><?php echo htmlentities($recCategory->color()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Tank Capacity</label>
            <div><samp data-numberformatter><?php echo htmlentities($recCategory->tank_capacity()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Purchase Date</label>
            <div><samp data-dateonlyformatter><?php echo htmlentities($recCategory->purchase_date()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Purchase Price</label>
            <div><samp data-moneyformatter><?php echo htmlentities($recCategory->purchase_price()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Purchase Odometer</label>
            <div><samp data-numberformatter><?php echo htmlentities($recCategory->purchase_odometer()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Sell Date</label>
            <div><samp data-dateonlyformatter><?php echo htmlentities($recCategory->sell_date()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Sell Price</label>
            <div><samp data-moneyformatter><?php echo htmlentities($recCategory->sell_price()); ?></samp></div>
        </div>
        <div class="input-group">
            <label class="form-control">Sell Odometer</label>
            <div><samp data-numberformatter><?php echo htmlentities($recCategory->sell_odometer()); ?></samp></div>
        </div>
        <!--<div class="input-group">
            <label class="form-control">Bill Types</label>
            <div><samp><?php //echo htmlentities(count($recCategory->bill_types())); ?></samp></div>
        </div>-->
        <div class="button-group">
            <button type="submit" class="button remove"><i class="fa-solid fa-trash"></i>Confirm Delete</button>
            <a href="/category/<?php echo htmlentities($recCategory->id()); ?>/edit" class="button secondary"><i class="fa-solid fa-ban"></i>Cancel</a>
        </div>
    </form>
</div>