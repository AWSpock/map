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

//

if (!empty($_POST)) {
    $recCategory = Category::fromPost($_POST);
    $res = $categoryData->updateRecord($recCategory);
    $_SESSION['last_message_text'] = $categoryData->actionDataMessage;
    if ($res == 1 || $res == 2) {
        $_SESSION['last_message_type'] = "success";
        header('Location: /category/' . $recCategory->id() . '/summary');
        die();
    } else {
        $_SESSION['last_message_type'] = "danger";
    }
}
