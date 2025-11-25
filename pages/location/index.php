<div class="header">
	<h1>Category Locations</h1>
</div>

<nav class="breadcrumbs">
	<ul>
		<li><a href="/">Categories</a></li>
		<li><a href="/category/<?php echo htmlentities($recCategory->id()); ?>/summary"><?php echo htmlentities($recCategory->name()); ?></a></li>
		<li>Locations</li>
	</ul>
</nav>

<div class="content">
	<div class="row">
		<a href="/category/<?php echo htmlentities($recCategory->id()); ?>/location/create" class="button primary"><i class="fa-solid fa-plus"></i>Add Location</a>
	</div>
	<div class="row">
		<p>Record Count: <span id="data-table-count">?</span></p>
		<div class="data-table" id="data-table">
			<div class="data-table-row header-row">
				<div class="data-table-cell header-cell" data-id="name">
					<div class="data-table-cell-label">Name</div>
				</div>
				<div class="data-table-cell header-cell" data-id="latitude">
					<div class="data-table-cell-label">Latitude</div>
				</div>
				<div class="data-table-cell header-cell" data-id="longitude">
					<div class="data-table-cell-label">Longitude</div>
				</div>
				<!-- <div class="data-table-cell header-cell" data-id="created">
					<div class="data-table-cell-label">Created</div>
				</div> -->
				<div class="data-table-cell header-cell" data-id="updated">
					<div class="data-table-cell-label">Updated</div>
				</div>
			</div>
		</div>
	</div>
</div>

<template id="template">
	<a href="/category/CATEGORY_ID/location/LOCATION_ID/edit" class="data-table-row">
		<div class="data-table-cell" data-id="name">
			<div class="data-table-cell-label">Name</div>
			<div class="data-table-cell-content"></div>
		</div>
		<div class="data-table-cell" data-id="latitude">
			<div class="data-table-cell-label">Latitude</div>
			<div class="data-table-cell-content"></div>
		</div>
		<div class="data-table-cell header-cell" data-id="longitude">
			<div class="data-table-cell-label">Longitude</div>
			<div class="data-table-cell-content"></div>
		</div>
		<!-- <div class="data-table-cell" data-id="created">
			<div class="data-table-cell-label">Create</div>
			<div class="data-table-cell-content" data-dateformatter></div>
		</div> -->
		<div class="data-table-cell" data-id="updated">
			<div class="data-table-cell-label">Updated</div>
			<div class="data-table-cell-content" data-dateformatter></div>
		</div>
	</a>
</template>