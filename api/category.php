<?php

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        if (isset($category_id)) {
            echo $data->categories($userAuth->user()->id())->getRecordById($category_id)->toString();
        } else {
            $recs = [];
            foreach ($data->categories($userAuth->user()->id())->getRecords() as $rec) {
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
