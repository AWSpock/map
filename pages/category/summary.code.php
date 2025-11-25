<?php

$categoryData = $data->categories($userAuth->user()->id());
$categories = $categoryData->getRecords();

$recCategory = $categoryData->getRecordById($category_id);
if ($recCategory->id() < 0) {
    header('Location: /');
    die();
}

//$recCategory->store_bill_types($data->bill_types($recCategory->id())->getRecords());

// foreach ($recCategory->bill_types() as $recBillType) {
//     $recBillType->store_bills($data->bills($recCategory->id(), $recBillType->id())->getRecords());
// }

//

if (!empty($_POST['category_favorite'])) {
    $res = 0;
    switch ($_POST['category_favorite']) {
        case "Yes":
            $res = $categoryData->setFavorite($recCategory->id());
            break;
        case "No":
            $res = $categoryData->removeFavorite($recCategory->id());
            break;
    }
    $_SESSION['last_message_text'] = $categoryData->actionDataMessage;
    if ($res === true) {
        $_SESSION['last_message_type'] = "success";
        header('Location: /category/' . $recCategory->id() . '/summary');
        die();
    } else {
        $_SESSION['last_message_type'] = "danger";
    }
}

// $fillups = $data->fillups($recCategory->id())->getRecords();

// // MILES PER DAY

// $firstDate = null;
// $firstOdom = null;
// $lastDate = null;
// $lastOdom = null;
// $startDate = null;
// $startOdom = null;
// $MPD = null;
// $MPDLife = null;

// foreach ($fillups as $fillup) {
//     if (!is_null($MPD)) {
//         $lastDate = $fillup->date();
//         $lastOdom = $fillup->odometer();
//         continue;
//     }
//     if (is_null($startDate)) {
//         $firstDate = $fillup->date();
//         $firstOdom = $fillup->odometer();
//         $startDate = $fillup->date();
//         $startOdom = $fillup->odometer();
//         continue;
//     }
//     if ($startDate == $fillup->date()) {
//         continue;
//     }

//     $dt1 = new DateTime($fillup->date());
//     $dt2 = new DateTime($startDate);
//     $interval = $dt1->diff($dt2);

//     $day = $interval->format('%a');
//     $MPD = ($startOdom - $fillup->odometer()) / $day;
// }
// if (!(is_null($firstDate) && is_null($lastDate) && is_null($firstOdom) && is_null($lastOodom))) {
//     $dt1 = new DateTime($lastDate);
//     $dt2 = new DateTime($firstDate);
//     $interval = $dt1->diff($dt2);

//     $day = $interval->format('%a');
//     $MPDLife = ($firstOdom - $lastOdom) / $day;
// }

// //

// usort($fillups, function ($a, $b) {
//     return $a->odometer() > $b->odometer();
// });

// // MPG, GALLON, PRICE, PPG

// $MPG = [];
// $GAL = [];
// $PRI = [];
// $PPG = [];

// foreach ($fillups as $fillup) {
//     if (!is_null($fillup->mpg()))
//         array_push($MPG, $fillup->mpg());

//     if ($fillup->gallon() > 0)
//         array_push($GAL, $fillup->gallon());

//     if ($fillup->price() > 0)
//         array_push($PRI, $fillup->price());

//     if ($fillup->ppg() > 0)
//         array_push($PPG, $fillup->ppg());
// }

// $AvgMPG = 0;
// $AvgGAL = 0;
// $AvgPRI = 0;
// $AvgPPG = 0;

// if (count($MPG) > 0)
//     $AvgMPG = array_sum($MPG) / count($MPG);

// if (count($GAL) > 0)
//     $AvgGAL = array_sum($GAL) / count($GAL);

// if (count($PRI) > 0)
//     $AvgPRI = array_sum($PRI) / count($PRI);

// if (count($PPG) > 0)
//     $AvgPPG = array_sum($PPG) / count($PPG);


// // DAYS and MILES

// $DAY = [];
// $MIL = [];

// foreach ($fillups as $fillup) {
//     // if ($fillup->missed()) {
//     //     continue;
//     // }

//     if (!is_null($fillup->days()))
//         array_push($DAY, $fillup->days());

//     if (!is_null($fillup->miles()))
//         array_push($MIL, $fillup->miles());
// }

// $AvgDAY = 0;
// $AvgMIL = 0;

// if (count($DAY) > 0)
//     $AvgDAY = array_sum($DAY) / count($DAY);

// if (count($MIL) > 0)
//     $AvgMIL = array_sum($MIL) / count($MIL);

// //

// function returnPercentage($value, $min = 0, $max = 100)
// {
//     if ($max - $min > 0) {
//         $interval = 100 / ($max - $min);
//         $percent = ($value - $min) * $interval;
//         return round($percent / 2, 2) / 100;
//     }
//     return 0;
// }
