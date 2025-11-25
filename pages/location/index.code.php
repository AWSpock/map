<?php

$categoryData = $data->categories($userAuth->user()->id());

$recCategory = $categoryData->getRecordById($category_id);
if ($recCategory->id() < 0) {
    header('Location: /');
    die();
}
if (!$recCategory->isOwner()) {
    header('Location: /category/' . $recCategory->id() . '/summary');
    die();
}

// $recCategory->store_bill_types($data->bill_types($recCategory->id())->getRecords());
