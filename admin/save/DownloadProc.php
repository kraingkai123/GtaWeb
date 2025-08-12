<?php
$path = "../../";
include("../../include/include.php");
$proc = $_POST['proc'];
$download_name = $_POST['download_name'];
$download_detail = $_POST['download_detail'];
$download_link = $_POST['download_link'];
if ($proc == 'add') {
    $fields['download_name'] = $download_name;
    $fields['download_detail'] = $download_detail;
    $fields['download_link'] = $download_link;
    db::db_insert("download", $fields);
    $status = true;
} else if ($proc == 'edit') {
    $download_id = $_POST['download_id'];
    $fields['download_name'] = $download_name;
    $fields['download_detail'] = $download_detail;
    $fields['download_link'] = $download_link;
    unset($cond);
    $cond['download_id'] = $download_id;
    db::db_update("download", $fields, $cond);
    $status = true;
}else if ($proc == 'delete') {
    $download_id = $_POST['download_id'];
    unset($cond);
    $cond['download_id'] = $download_id;
    db::db_delete("download", $cond);
    $status = true;
}
$res = array(
    "Status" => $status,
);
echo json_encode($res);
exit;
