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
$recLocation = $locationData->getRecordById($location_id);
if ($recLocation->id() < 0) {
    header('Location: /category/' . $recCategory->id() . '/location');
    die();
}

// $recLocation->store_bills($data->bills($recCategory->id(), $recLocation->id())->getRecords());

//

if (!empty($_POST)) {
    $res = $locationData->deleteRecord($recLocation);
    $_SESSION['last_message_text'] = $locationData->actionDataMessage;
    if ($res == 1) {
        $_SESSION['last_message_type'] = "success";
        header('Location: /category/' . $recCategory->id() . '/location');
        die();
    } else {
        $_SESSION['last_message_type'] = "danger";
    }
}
?>