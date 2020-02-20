<?php
include "../vendor/config.php";
session_start();
header('Content-type: application/json; charset=UTF-8');

 
if (isset($_POST['code']) && isset($_POST['id'])) {
    $code = $_POST['code'];
    $id_rm = $_SESSION['id'];
    $id_quiz = $_POST['id'];
    $url = str_replace("ajax/","",url("join/").$code);
    $code_room = $code;

    $cek = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$code' ");
    $jmlcek = $cek->num_rows;
    if ($jmlcek>0) {
        $code_room = rand(100000, 999999);
    }
        
        $query =  $mysqli->query("INSERT INTO join_temp
            (
                code_room,
                id_rm,
                id_quiz,
                status
            )
            VALUES
            (
                '$code_room',
                '$id_rm',
                '$id_quiz',
                'waiting'
            )
        ");

    $response = array();
    $response["data"] = array();
    if ($query) {
        $res['title']  = 'Success';
        $res['icon']  = 'success';
        $res['text'] = 'Berhasil buat room';
        $res['url']  = $url;
        
    } else {
        $res['title']  = 'Oops...';
        $res['icon']  = 'error';
        $res['text'] = $mysqli->error;
        $res['url']  = str_replace("ajax/","",url("dashboard/quizku"));
    }
    array_push($response["data"], $res);
    echo json_encode($response);
}