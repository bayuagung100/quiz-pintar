<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

 
// if (isset($_POST['code']) && isset($_POST['id']) && isset($_POST['id_quiz'])) {
    $code = $_POST['code'];
    $id = $_POST['id'];
    $id_quiz = $_POST['id_quiz'];

    $query = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$code' AND id_quiz='$id_quiz' ");
    $data = $query->fetch_array();

    $idp = $data['id_player'];
    $ex = explode(";", $idp);

    

    $response = array();
    $response["data"] = array();

    if ($data['status']=="waiting") {
        if (!in_array($id, $ex)) {
            $res['status_room']  = 'waiting';
            $res['status_player']  = 'kick';
            $res['title']  = 'Oops...';
            $res['icon']  = 'error';
            $res['text'] = 'Kamu telah dikeluarkan dari game';
            $res['url']  = str_replace("ajax/room/","",url(""));
        } 
    } elseif ($data['status']=="play") {
        $res['status_room']  = 'play';
        $res['url']  = str_replace("ajax/room/","",url("play/").$code);
    }
    array_push($response["data"], $res);
    echo json_encode($response);
// }