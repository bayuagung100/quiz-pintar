<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

$update = $mysqli->query("UPDATE join_temp SET status='end' WHERE code_room='$_POST[code]' AND id_quiz='$_POST[quiz]' ");
if ($update) {
    $response = array();
    $response["data"] = array();
    $res['url']  = str_replace("ajax/room/","",url(""));

    array_push($response["data"], $res);
    echo json_encode($response);
}
?>