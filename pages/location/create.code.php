<?php

$categoryData = $data->categories($userAuth->user()->id());

$recCategory = $categoryData->getRecordById($category_id);
if ($recCategory->id() < 0) {
    header('Location: /');
    die();
}
if (!($recCategory->isOwner() || $recCategory->isManager())) {
    header('Location: /category/' . $recCategory->id() . '/summary');
    die();
}

$locationData = $data->locations($recCategory->id());

$recLocation = new Location();

$garages = [];

// 

if (!empty($_POST)) {
    $recLocation = Location::fromPost($_POST);
    $record_id = $locationData->insertRecord($recLocation);
    $_SESSION['last_message_text'] = $locationData->actionDataMessage;
    if ($record_id > 0) {
        $_SESSION['last_message_type'] = "success";
        header('Location: /category/' . $recCategory->id() . '/location');
        die();
    } else {
        $_SESSION['last_message_type'] = "danger";
    }
} else {
    foreach ($locationData->getRecords() as $location) {
        if (!in_array($location->garage(), $garages))
            array_push($garages, $location->garage());
    }
    sort($garages);
}
