<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

$update = $mysqli->query("UPDATE join_temp SET status='play' WHERE code_room='$_POST[code]' AND id_quiz='$_POST[quiz]' ");
if ($update) {
    $query_join_temp = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$_POST[code]' AND id_quiz='$_POST[quiz]' ");
    $data1 = $query_join_temp->fetch_array();

    $idp = $data1['id_player'];
    $ex = array_filter(explode(";", $idp));

    $response = array();
    $response["data"] = array();
    $res['url']  = str_replace("ajax/room/","",url("play/").$_POST['code']);
    $res['room']  = $_POST['code'];
    $res['id_quiz']  = $_POST['quiz'];

        $rank = 1;
        foreach ($ex as $key => $value) {
            $insert_leaderboard = $mysqli->query("INSERT INTO leaderboard_temp 
            (
                id_join,
                id_player,
                ranked,
                progress,
                point
            )
            VALUES
            (
                '$data1[id]',
                '$value',
                '$rank',
                '0/10',
                '0'
            )
            ");
            $rank++;
        }

    $res['player']  = array();

        $imp_idp = implode(',',$ex);
        
        $query_player = $mysqli->query ("SELECT * FROM user WHERE id IN ($imp_idp) ");
        while ($data2 = $query_player->fetch_array()) {
            $avatar = $data2['avatar'];
            if ($avatar == null) {
                $gambar = str_replace("ajax/room/","",url("img/avatar/no-image2.png"));
            } else {
                $gambar = str_replace("ajax/room/","",url("img/avatar/")).$avatar;
            }

            $resp['id'] = $data2['id'];
            $resp['nama'] = $data2['nama'];
            $resp['avatar'] = $gambar;

            $query_leaderboard = $mysqli->query ("SELECT * FROM leaderboard_temp WHERE id_player IN ($data2[id]) ");
            while ($data3 = $query_leaderboard->fetch_array()) {
                $resp['ranked'] = $data3['ranked'];
                $resp['progress'] = $data3['progress'];
                $resp['point'] = $data3['point'];
                
                array_push($res["player"], $resp);
            }
        }
        
        

    array_push($response["data"], $res);

    echo json_encode($response);
}

?>