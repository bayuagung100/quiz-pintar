<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

if (isset($_POST['action'])=="kick") {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $query = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$code' ");
    $data =$query->fetch_array();

    $cekarray = $data['id_player'];
    $ex = explode(";", $cekarray);

    $response = array();
    $response["data"] = array();

    if (in_array($_POST['id'], $ex)) {
        $remove=array($_POST['id']);
        $new_array=array_diff($ex,$remove);

        $imp = implode(";", $new_array);

        $update = $mysqli->query("UPDATE join_temp SET id_player='$imp' WHERE code_room='$code' ");
        if ($update) {
            $updatenotif = $mysqli->query("DELETE FROM notif_temp WHERE user_id='$_POST[id]' ");
            if ($updatenotif) {
                // $selectnotif = $mysqli->query("SELECT * FROM notif_temp ORDER BY id DESC LIMIT 1");
                // $sdata = $selectnotif->fetch_array();
                $res['user_id']  = $id;
                $res['user_name']  = $name;
                $res['icon']  = 'success';
                $res['text'] = $_POST['name'].' telah dikeluarkan dari game';
            }
        }
    }
    array_push($response["data"], $res);
    // echo json_encode($response);
} else {
    $code = $_POST['code'];
    $id = $_POST['id'];
    $id_quiz = $_POST['id_quiz'];
    

    $query = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$code' AND id_quiz='$id_quiz' ");
    $data = $query->fetch_array();

    $idp = $data['id_player'];
    $ex = explode(";", $idp);

    // $filter = array_filter($ex);
    // $impfilter = implode(",",$filter);

    // $query2 = $mysqli->query("SELECT * FROM user WHERE id IN ($impfilter) ");
    // $data2= $query2->fetch_array();

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
            
            // $res['lastout_id']  = $id;
            // $res['lastout_name']  = $name;
            
            array_push($response["data"], $res);
        } 
        // else {
        //     // if (isset($lastout)!=null) {
        //         // if(!in_array($lastout, $ex)){
        //             $res['status_notif']  = 'out';
        //             $res['icon']  = 'error';
        //             $res['title']  = $data2['nama'].' telah dikeluarkan dari game';
        //             array_push($response["data"], $res);
        //         // }
        //     // }
            
        // }
        
    } elseif ($data['status']=="play") {
        $res['status_room']  = 'play';
        $res['url']  = str_replace("ajax/room/","",url("play/").$code);
        array_push($response["data"], $res);
    }
    
    
}

echo json_encode($response);
