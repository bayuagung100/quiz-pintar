<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

$update = $mysqli->query("UPDATE join_temp SET status='end' WHERE code_room='$_POST[code]' AND id_quiz='$_POST[quiz]' ");
if ($update) {
    $response = array();
    $response["data"] = array();
    $res['url']  = str_replace("ajax/room/","",url(""));

    $query_join_temp = $mysqli->query ("SELECT * FROM join_temp WHERE code_room='$_POST[code]' AND id_quiz='$_POST[quiz]' ");
    $data_query_join_temp = $query_join_temp->fetch_array();
    $id = $data_query_join_temp['id'];
    $cr = $data_query_join_temp['code_room'];
    $ir = $data_query_join_temp['id_rm'];
    $iq = $data_query_join_temp['id_quiz'];
    $ip = $data_query_join_temp['id_player'];
    
    $ex = array_filter(explode(";", $ip));
    $imp_ip = implode(',',$ex);

    $res['code_room'] = $cr;
    $res['id_rm'] = $ir;
    $res['id_quiz'] = $iq;
    $res['id_player'] = $imp_ip;

    $query_player = $mysqli->query ("SELECT * FROM user WHERE id IN ($imp_ip) ");
    while ($data_query_player = $query_player->fetch_array()) {
        $query_leaderboard = $mysqli->query ("SELECT * FROM leaderboard_temp WHERE id_player IN ($data_query_player[id]) ");
        while ($data_query_leaderboard = $query_leaderboard->fetch_array()) {
            $ranked[] = $data_query_leaderboard['ranked'];
            $progress[] = $data_query_leaderboard['progress'];
            $point[] = $data_query_leaderboard['point'];
        }
    }
    $imp_ranked = implode(',',$ranked);
    $imp_progress = implode(',',$progress);
    $imp_point = implode(',',$point);
    $res['ranked'] = $imp_ranked;
    $res['progress'] = $imp_progress;
    $res['point'] = $imp_point;

    $insert_aktivitas = $mysqli->query("INSERT INTO aktivitas 
    (
        code_room,
        id_rm,
        id_quiz,
        id_player,
        ranked,
        progress,
        point
    )
    VALUES
    (
        '$cr',
        '$ir',
        '$iq',
        '$imp_ip',
        '$imp_ranked',
        '$imp_progress',
        '$imp_point'
    )
    ");
    $response["points"] = array();
    
    $ex_imp_ip = explode(',',$imp_ip);
    $ex_imp_point = explode(',',$imp_point);

    foreach ($ex_imp_ip as $key => $value) {
        $cek_points = $mysqli->query ("SELECT * FROM points WHERE id_player='$value' ");
        if ($cek_points->num_rows>0) {
            $data_cek_points = $cek_points->fetch_array();
            $dataPoint = $ex_imp_point[$key]+$data_cek_points['point'];
        } else {
            $dataPoint = $ex_imp_point[$key];
            $insert_points = $mysqli->query("INSERT INTO points 
                (
                    id_player,
                    point
                )
                VALUES
                (
                    '$value',
                    '$dataPoint'
                )
            ");
        }
        
        $res2['id_player'] = $value;
        $res2['point'] = $dataPoint;
        array_push($response["points"], $res2);
        
    }

    $query_delete_leaderboard_temp = $mysqli->query("DELETE FROM leaderboard_temp WHERE id_player IN ($imp_ip) ");
    $query_delete_join_temp = $mysqli->query("DELETE FROM join_temp WHERE code_room='$_POST[code]' AND id_quiz='$_POST[quiz]'");


    array_push($response["data"], $res);
    
    echo json_encode($response);
}
?>