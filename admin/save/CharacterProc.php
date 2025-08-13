<?php
$path = "../../";
include("../../include/include.php");
$proc = isset($_POST['proc']) ? $_POST['proc'] : '';
$playerId = isset($_POST['playerId']) ? $_POST['playerId'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
if ($proc == 'update' && $playerId != '' && $status != '') {
    $response = Character::updateStatus($playerId, $status);
    if ($response) {
        echo json_encode(array("Status" => true, "Message" => "Update status success"));
    } else {
        echo json_encode(array("Status" => false, "Message" => "Error updating status"));
    }
} else {
    echo json_encode(array("Status" => false, "Message" => "Invalid parameters"));
}
