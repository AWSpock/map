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