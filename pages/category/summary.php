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
            ?>
        </div>
    </div>

    <div class="row">
        <?php /*
        <h2><?php echo $recCategory->name(); ?></h2>
        <div class="category-info">
            <div class="info">
                <label class="form-control">Make</label>
                <div><samp><?php echo htmlentities($recCategory->make()); ?></samp></div>
            </div>
            <div class="info">
                <label class="form-control">Model</label>
                <div><samp><?php echo htmlentities($recCategory->model()); ?></samp></div>
            </div>
            <div class="info">
                <label class="form-control">Color</label>
                <div><samp><?php echo htmlentities($recCategory->color()); ?></samp></div>
            </div>
            <div class="info">
                <label class="form-control">Tank Capacity</label>
                <div><samp data-number1formatter><?php echo htmlentities($recCategory->tank_capacity()); ?></samp></div>
            </div>
        </div>
        <h3>Purchase Information</h3>
        <div class="category-purchase">
            <div class="info date">
                <label class="form-control">Date</label>
                <div><samp data-dateonlyformatter><?php echo htmlentities($recCategory->purchase_date()); ?></samp></div>
            </div>
            <div class="info">
                <label class="form-control">Price</label>
                <div><samp data-moneyformatter><?php echo htmlentities($recCategory->purchase_price()); ?></samp></div>
            </div>
            <div class="info">
                <label class="form-control">Odometer</label>
                <div><samp data-numberformatter><?php echo htmlentities($recCategory->purchase_odometer()); ?></samp></div>
            </div>
        </div>
        <?php
        if ($recCategory->sell_odometer() != null) {
        ?>
            <h3>Sell Information</h3>
            <div class="category-sell">
                <div class="info date">
                    <label class="form-control">Date</label>
                    <div><samp data-dateonlyformatter><?php echo htmlentities($recCategory->sell_date()); ?></samp></div>
                </div>
                <div class="info">
                    <label class="form-control">Price</label>
                    <div><samp data-moneyformatter><?php echo htmlentities($recCategory->sell_price()); ?></samp></div>
                </div>
                <div class="info">
                    <label class="form-control">Odometer</label>
                    <div><samp data-numberformatter><?php echo htmlentities($recCategory->sell_odometer()); ?></samp></div>
                </div>
            </div>
        <?php
        }
        ?>

        <h2>Fillup Stats</h2>
        <div class="fillup-stats">
            <div class="mpg stats">
                <h3>MPG</h3>
                <div class="gauges">
                    <div class="info__block selected" data-id="last">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage(end($MPG), min($MPG), max($MPG)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-number3formatter><?php echo end($MPG); ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Last</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-number3formatter><?php echo min($MPG); ?></span></div>
                            <div><span data-number3formatter><?php echo max($MPG); ?></span></div>
                        </div>
                    </div>
                    <div class="info__block selected" data-id="avg">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage($AvgMPG, min($MPG), max($MPG)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-number3formatter><?php echo $AvgMPG; ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Avg</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-number3formatter><?php echo min($MPG); ?></span></div>
                            <div><span data-number3formatter><?php echo max($MPG); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallon stats">
                <h3>Price</h3>
                <div class="gauges">
                    <div class="info__block selected" data-id="last">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage(end($PRI), min($PRI), max($PRI)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-moneyformatter><?php echo end($PRI); ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Last</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-moneyformatter><?php echo min($PRI); ?></span></div>
                            <div><span data-moneyformatter><?php echo max($PRI); ?></span></div>
                        </div>
                    </div>
                    <div class="info__block selected" data-id="avg">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage($AvgPRI, min($PRI), max($PRI)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-moneyformatter><?php echo $AvgPRI; ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Avg</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-moneyformatter><?php echo min($PRI); ?></span></div>
                            <div><span data-moneyformatter><?php echo max($PRI); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallon stats">
                <h3>Gallons</h3>
                <div class="gauges">
                    <div class="info__block selected" data-id="last">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage(end($GAL), min($GAL), max($GAL)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-number3formatter><?php echo end($GAL); ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Last</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-number3formatter><?php echo min($GAL); ?></span></div>
                            <div><span data-number3formatter><?php echo max($GAL); ?></span></div>
                        </div>
                    </div>
                    <div class="info__block selected" data-id="avg">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage($AvgGAL, min($GAL), max($GAL)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-number3formatter><?php echo $AvgGAL; ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Avg</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-number3formatter><?php echo min($GAL); ?></span></div>
                            <div><span data-number3formatter><?php echo max($GAL); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ppg stats">
                <h3>PPG</h3>
                <div class="gauges">
                    <div class="info__block selected" data-id="last">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage(end($PPG), min($PPG), max($PPG)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-money3formatter><?php echo end($PPG); ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Last</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-money3formatter><?php echo min($PPG); ?></span></div>
                            <div><span data-money3formatter><?php echo max($PPG); ?></span></div>
                        </div>
                    </div>
                    <div class="info__block selected" data-id="avg">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage($AvgPPG, min($PPG), max($PPG)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-money3formatter><?php echo $AvgPPG; ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Avg</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-money3formatter><?php echo min($PPG); ?></span></div>
                            <div><span data-money3formatter><?php echo max($PPG); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="day stats">
                <h3>Days Between Fills</h3>
                <div class="gauges">
                    <div class="info__block selected" data-id="last">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage(end($DAY), min($DAY), max($DAY)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-numberformatter><?php echo end($DAY); ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Last</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-numberformatter><?php echo min($DAY); ?></span></div>
                            <div><span data-numberformatter><?php echo max($DAY); ?></span></div>
                        </div>
                    </div>
                    <div class="info__block selected" data-id="avg">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage($AvgDAY, min($DAY), max($DAY)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-numberformatter><?php echo $AvgDAY; ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Avg</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-numberformatter><?php echo min($DAY); ?></span></div>
                            <div><span data-numberformatter><?php echo max($DAY); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mile stats">
                <h3>Miles Between Fills</h3>
                <div class="gauges">
                    <div class="info__block selected" data-id="last">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage(end($MIL), min($MIL), max($MIL)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-numberformatter><?php echo end($MIL); ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Last</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-numberformatter><?php echo min($MIL); ?></span></div>
                            <div><span data-numberformatter><?php echo max($MIL); ?></span></div>
                        </div>
                    </div>
                    <div class="info__block selected" data-id="avg">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill" style="transform: rotate(<?php echo returnPercentage($AvgMIL, min($MIL), max($MIL)); ?>turn);"></div>
                                <div class="gauge__cover primary">
                                    <div class="gauge__mid"><span data-numberformatter><?php echo $AvgMIL; ?></span></div>
                                </div>
                            </div>
                            <div class="gauge__title">Avg</div>
                        </div>
                        <div class="gaugeLabelBottom">
                            <div><span data-numberformatter><?php echo min($MIL); ?></span></div>
                            <div><span data-numberformatter><?php echo max($MIL); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mileperday stats">
                <h3>Miles Per Day</h3>
                <div class="mileperday-stats">
                    <div class="info">
                        <label class="form-control">Last</label>
                        <div><samp data-numberformatter><?php echo htmlentities($MPD); ?></samp></div>
                    </div>
                    <div class="info">
                        <label class="form-control">Lifetime</label>
                        <div><samp data-numberformatter><?php echo htmlentities($MPDLife); ?></samp></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    */
    ?>
</div>