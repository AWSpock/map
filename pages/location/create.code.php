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

$recLocation = new Location();

// 

if (!empty($_POST)) {
    $locationData = $data->locations($recCategory->id());
    $recLocation = Location::fromPost($_POST);
    $location_id = $locationData->insertRecord($recLocation);
    $_SESSION['last_message_text'] = $locationData->actionDataMessage;
    if ($location_id > 0) {
        $_SESSION['last_message_type'] = "success";
        header('Location: /category/' . $recCategory->id() . '/location');
        die();
    } else {
        $_SESSION['last_message_type'] = "danger";
    }
}

$lat_lon = "";

if (! (is_null($recLocation->latitude()) && is_null($recLocation->longitude()))) {
    $lat_lon = $recLocation->latitude() . ", " . $recLocation->longitude();
}
