<?php

$categoryData = $data->categories($userAuth->user()->id());

$recCategory = $categoryData->getRecordById($category_id);
if ($recCategory->id() < 0) {
    echo "Category Not Found";
    http_response_code(404);
    die();
}

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        if (isset($location_id)) {
            echo $data->locations($recCategory->id())->getRecordById($location_id)->toString();
        } else {
            $recs = [];
            foreach ($data->locations($recCategory->id())->getRecords() as $rec) {
                array_push($recs, json_decode($rec->toString()));
            }
            echo json_encode($recs);
        }
        break;
    case "POST":
        break;
    default:
        echo "Unknown Method";
        http_response_code(405);
        break;
}
