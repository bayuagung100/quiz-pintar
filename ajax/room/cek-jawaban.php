<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

$query_quiz = $mysqli->query("SELECT * FROM quiz WHERE id='$_POST[id_quiz]' ");
$data_quiz = $query_quiz->fetch_array();

$ex_jawaban = $data_quiz['jawaban_soal'];

$response = array();
$response["data"] = array();

if (isset($_POST['jawabanSoal1'])) {
    if($_POST['jawabanSoal1'] == $ex_jawaban[0] ){
        $res['jawaban']  = 'benar';
        $res['point']  = $_POST['sisaPoint'];
    } else {
        $res['jawaban']  = 'salah';
        $res['point']  = 0;
    }
    array_push($response["data"], $res);
}


echo json_encode($response);


?>