<?php
include "../../vendor/config.php";
$code = $_POST["code"];
// header('Refresh: 1;');

$query = $mysqli->query("SELECT id_player FROM join_temp WHERE code_room='$code' ");
$data = $query->fetch_array();

$idp = $data['id_player'];
$ex = explode(";", $idp);

?>