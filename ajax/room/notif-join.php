<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');
// header('Refresh: 1;');

$query = $mysqli->query("SELECT * FROM notif_temp WHERE join_temp_id='$_POST[code]' ORDER BY id DESC LIMIT 1 ");
$data = $query->fetch_array();
$jmldata = $query->num_rows;

// $query2 = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$_POST[code]' ");
// $data2 = $query2->fetch_array();

// $cekarray = $data2['id_player'];
// $ex = explode(";", $cekarray);

$response = array();
$response["data"] = array();

    $query3 = $mysqli->query("SELECT * FROM user WHERE id='$data[user_id]' ");
    $data3 = $query3->fetch_array();

    if ($jmldata > 0) {
        
        if (isset($_POST['last_id'])!=null) {
            if ($_POST['last_id'] > $data['id']) {
                // $query4 = $mysqli->query("SELECT * FROM notif_temp WHERE join_temp_id='$_POST[code]' AND user_id='$_POST[last_id]' ORDER BY id DESC LIMIT 1 ");
                // $data4 = $query4->fetch_array();

                $query5 = $mysqli->query("SELECT * FROM user WHERE id='$_POST[lastid_out]' ");
                $data5 = $query5->fetch_array();

                $res['id_tables']  = $data['id'];
                $res['id_out']  = $_POST['lastid_out'];
                $res['icon']  = 'error';
                $res['title'] = $data5['nama'].' telah dikeluarkan dari game.';
            } else {
                $res['id_tables']  = $data['id'];
                $res['user_id']  = $data['user_id'];
                $res['icon']  = 'success';
                $res['title'] = $data3['nama'].' bergabung dalam game.';
            }

            array_push($response["data"], $res);
        } 
    }
    // else {
    //     if(in_array($data['user_id'], $ex)){
    //         if (end($ex)==$data['user_id']) {
    //             $res['lastid']  = $data['user_id'];
    //             $res['icon']  = 'success';
    //             $res['title'] = $data3['nama'].' bergabung dalam game.';
    //         } 
    //     }
    // }
        

    
    
    

echo json_encode($response);

?>