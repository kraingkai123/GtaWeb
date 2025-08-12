<?php
$path = "../../";
include("../../include/include.php");
$proc = $_POST['proc'];
$banId = $_POST['banId'];
if ($proc == 'delete') {
    unset($cond);
    $cond['banID'] = $banId;
    db::db_delete("bans", $cond);
    $status = true;
} else {
    $status = false;
}
$res = array(
    "Status" => $status,
);
echo json_encode($res);
exit;