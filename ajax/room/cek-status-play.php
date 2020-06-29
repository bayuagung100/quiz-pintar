<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

$response = array();
$response["data"] = array();

    $query = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$_POST[code_room]'");
    $cekdata = $query->num_rows;
    if ($cekdata>0) {
        $res['status'] = 'playing';
    } else {
        $res['status'] = 'end';
        $res['url']  = str_replace("ajax/room/","",url("dashboard/aktivitas"));
    }

    
    array_push($response["data"], $res);
echo json_encode($response);

?>