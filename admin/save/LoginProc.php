<?php
$path = "../../";
include("../../include/include.php");
$CharName = isset($_POST['CharName']) ? $_POST['CharName'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$password = strtoupper(hash('whirlpool', $password));
if ($CharName == "" || $password == "") {
    echo json_encode(array("Status" => false, "Message" => "Please fill in all fields."));
    exit;
}
$response = db::db_query("SELECT * FROM playeraccounts WHERE playerName = '".$CharName."' and playerPassword = '".$password."'");
if (count($response) > 0) {
    $user = $response[0];
    $_SESSION['user'] = array(
        'playerID' => $user['playerID'],
        'playerName' => $user['playerName'],
        'email' => $user['email'],
        'playerAdminLevel' => $user['playerAdminLevel'],
    );
    if ($user['playerAdminLevel'] == 0) {
        $url = "member.php";
    } else {
        $url = "admin/index.php";
    }
    echo json_encode(array("Status" => true, "Message" => "Login successful.","url" => $url));
} else {
    echo json_encode(array("Status" => false, "Message" => "Invalid username or password."));
}