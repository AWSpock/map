<?php

$recCategory = new Category();

// 

if (!empty($_POST)) {
    $data = new DataAccess();
    $categoryData = $data->categories($userAuth->user()->id());

    $recCategory = Category::fromPost($_POST);
    $category_id = $categoryData->insertRecord($recCategory);
    $_SESSION['last_message_text'] = $categoryData->actionDataMessage;
    if ($category_id > 0) {
        $_SESSION['last_message_type'] = "success";
        header('Location: /category/' . $category_id . '/summary');
        die();
    } else {
        $_SESSION['last_message_type'] = "danger";
    }
}
