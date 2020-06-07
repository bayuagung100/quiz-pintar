<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');



$query_quiz = $mysqli->query("SELECT * FROM quiz WHERE id='$_POST[id_quiz]' ");
$data_quiz = $query_quiz->fetch_array();

$ex_jawaban = explode(";",$data_quiz['jawaban_soal']);

$query_motivasi = $mysqli->query("SELECT * FROM motivasi ORDER BY rand() limit 1 ");
$data_motivasi = $query_motivasi->fetch_array();

function update_leaderboard($progress, $point){
    global $mysqli;
    $query_semua = $mysqli->query("SELECT * FROM  leaderboard_temp ORDER BY point DESC LIMIT 1 ");
    $data_semua = $query_semua->fetch_array();
    $order_point = $data_semua['point'];
    $order_ranked = $data_semua['ranked'];
    
    $query_ambil = $mysqli->query("SELECT * FROM  leaderboard_temp WHERE id_player ='$_POST[id_user]' ");
    $data_ambil = $query_ambil->fetch_array();
    $ambil_point = $data_ambil['point'];
    $ambil_progress = $data_ambil['progress'];
    $ambil_ranked = $data_ambil['ranked'];
    $point_sekarang = $ambil_point+$point;

    if ($point_sekarang > $order_point) {
        if ($ambil_ranked == $order_ranked) {
            $ranked_sekarang = $order_ranked;
        } else {
            $ranked_sekarang = 1;
        }
    } elseif ($point_sekarang == $order_point) {
        if ($ambil_ranked == $order_ranked) {
            $ranked_sekarang = $order_ranked;
        } else {
            $ranked_sekarang = $ambil_ranked;
        }
        
    } else {
        if ($ambil_ranked == $order_ranked) {
            $ranked_sekarang = $order_ranked;
        } else {
            $ranked_sekarang = $ambil_ranked + 1;
        }
    }


    $update_point = $mysqli->query("UPDATE leaderboard_temp SET 
        ranked = '$ranked_sekarang',
        progress = '$progress',
        point = '$point_sekarang'

        WHERE 
        id_player ='$_POST[id_user]'
    ");

    if ($update_point) {
        $query_ambil2 = $mysqli->query("SELECT * FROM  leaderboard_temp WHERE id_player ='$_POST[id_user]' ");
        $data_ambil2 = $query_ambil2->fetch_array();
        $ambil_point2 = $data_ambil2['point'];
        $ambil_progress2 = $data_ambil2['progress'];
        $ambil_ranked2 = $data_ambil2['ranked'];
    }

    $arr = array();
    $res['point']  = $ambil_point2;
    $res['progress'] = $ambil_progress2;
    $res['ranked']  = $ambil_ranked2;
    array_push($arr, $res);
    return $arr;

   
}


$response = array();
$response["data"] = array();



if (isset($_POST['jawabanSoal1'])) {
    if($_POST['jawabanSoal1'] == $ex_jawaban[0] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("1/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("1/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal2'])) {
    if($_POST['jawabanSoal2'] == $ex_jawaban[1] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("2/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("2/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal3'])) {
    if($_POST['jawabanSoal3'] == $ex_jawaban[2] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("3/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("3/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal4'])) {
    if($_POST['jawabanSoal4'] == $ex_jawaban[3] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("4/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("4/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal5'])) {
    if($_POST['jawabanSoal5'] == $ex_jawaban[4] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("5/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("5/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal6'])) {
    if($_POST['jawabanSoal6'] == $ex_jawaban[5] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("6/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("6/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal7'])) {
    if($_POST['jawabanSoal7'] == $ex_jawaban[6] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("7/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("7/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal8'])) {
    if($_POST['jawabanSoal8'] == $ex_jawaban[7] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("8/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("8/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal9'])) {
    if($_POST['jawabanSoal9'] == $ex_jawaban[8] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("9/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("9/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
} elseif (isset($_POST['jawabanSoal10'])) {
    if($_POST['jawabanSoal10'] == $ex_jawaban[9] ){
        $res['jawaban']  = 'benar';
        $res['leaderboard'] = update_leaderboard("10/10", $_POST['sisaPoint']);
    } else {
        $res['jawaban']  = 'salah';
        $res['leaderboard'] = update_leaderboard("10/10", 0);
    }
    $res['motivasi']  = $data_motivasi['text'];
    array_push($response["data"], $res);
}


echo json_encode($response);


?>