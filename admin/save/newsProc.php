<?php
$path = "../../";
include("../../include/include.php");
$proc = $_POST['proc'];
$news_title = $_POST['news_title'];
$detail_news = $_POST['detail_news'];
if ($proc == 'add') {
    $folderName = FileAttach::createFolder(2);
    if (!empty($_FILES['news_image']['name'])) {
        $str = $_FILES['news_image']['name'];
        $arrDir = explode(".", $str);
        unlink($_POST['fullPath']);
        $fileName = date('YmdHis') . rand(0, 9999) . "." . end($arrDir);
        $fields['news_image'] = $fileName;
        $fields['full_path'] = $folderName . $fileName;
        move_uploaded_file($_FILES['news_image']['tmp_name'],  $folderName . $fileName);
    }
    $fields['news_title'] = $news_title;
    $fields['detail_news'] = $detail_news;
    db::db_insert("news", $fields);
    $status = true;
} else if ($proc == 'edit') {
    $news_id = $_POST['news_id'];
    $fields['news_title'] = $news_title;
    $fields['detail_news'] = $detail_news;
    if (!empty($_FILES['news_image']['name'])) {
        $str = $_FILES['news_image']['name'];
        $arrDir = explode(".", $str);
        unlink($_POST['fullPath']);
        $fileName = date('YmdHis') . rand(0, 9999) . "." . end($arrDir);
        $fields['news_image'] = $fileName;
        $fields['full_path'] = FileAttach::createFolder(2) . $fileName;
        move_uploaded_file($_FILES['news_image']['tmp_name'],  $fields['full_path']);
    }
    unset($cond);
    $cond['news_id'] = $news_id;
    db::db_update("news", $fields, $cond);
    $status = true;
}else if ($proc == 'delete') {
    $news_id = $_POST['news_id'];
    unset($cond);
    $cond['news_id'] = $news_id;
    db::db_delete("news", $cond);
    $status = true;
}
$res = array(
    "Status" => $status,
);
echo json_encode($res);
exit;
