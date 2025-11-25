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
    <form method="post" action="" id="frm" class="form-group main-form">
        <input type="hidden" id="category.id" name="category.id" value="<?php echo htmlentities($recCategory->id()); ?>" />
        <div class="input-group">
            <label for="category.name" class="form-control">Name</label>
            <input type="text" id="category.name" name="category.name" class="form-control" required="required" value="<?php echo htmlentities($recCategory->name()); ?>" />
        </div>
        <div class="button-group">
            <button type="submit" class="button primary"><i class="fa-solid fa-save"></i>Save</button>
            <a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary" class="button secondary"><i class="fa-solid fa-ban"></i>Cancel</a>
            <a href="/category/<?php echo htmlentities($recCategory->id()); ?>/delete" class="button remove"><i class="fa-solid fa-trash"></i>Delete?</a>
        </div>
    </form>
</div>