<?php
include "../../vendor/config.php";
session_start();

$code = $_POST["code"];

$query = $mysqli->query("SELECT id_player FROM join_temp WHERE code_room='$code' ");
$data = $query->fetch_array();

if ($data['id_player']==null) {
    $total = 0;
} else {
    $ex = explode(";", $data['id_player']);
    // $total = count($ex);
    $total = count(array_filter($ex));
}

echo $total;
// $dn = mysqli_fetch_assoc($dncart);

// echo $dn['total'];
?>