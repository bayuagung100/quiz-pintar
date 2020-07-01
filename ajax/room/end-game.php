<?php
include "../../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

$update = $mysqli->query("UPDATE join_temp SET status='end' WHERE code_room='$_POST[code]' AND id_quiz='$_POST[quiz]' ");
if ($update) {
    $response = array();
    $response["data"] = array();
    $res['url']  = str_replace("ajax/room/","",url("dashboard/aktivitas"));

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
    $res["player"] = array();

    foreach ($ex as $key => $value) {
        
        // array_push($res["player"], $res2);

        $query_leaderboard = $mysqli->query ("SELECT * FROM leaderboard_temp WHERE id_player='$value' ");
        $data_query_leaderboard = $query_leaderboard->fetch_array();
        $id_player_lead = $data_query_leaderboard['id_player'];
        $ranked_player_lead = $data_query_leaderboard['ranked'];
        $progress_player_lead = $data_query_leaderboard['progress'];
        $point_player_lead = $data_query_leaderboard['point'];

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
                '$value',
                '$ranked_player_lead',
                '$progress_player_lead',
                '$point_player_lead'
            )
        ");

        if ($insert_aktivitas) {
            $cek_points = $mysqli->query ("SELECT * FROM points WHERE id_player='$value' ");
            if ($cek_points->num_rows>0) {
                $data_cek_points = $cek_points->fetch_array();
                $dataPoint = $point_player_lead+$data_cek_points['point'];
                $update_points = $mysqli->query("UPDATE points SET 
                point='$dataPoint'
                WHERE id_player='$value' ");
            } else {
                $dataPoint = $point_player_lead;
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

            $query_delete_leaderboard_temp = $mysqli->query("DELETE FROM leaderboard_temp WHERE id_join='$id' AND  id_player='$value' ");
            
            $res2['id'] = $value;
            $res2['ranked'] = $ranked_player_lead;
            $res2['progress'] = $progress_player_lead;
            $res2['point'] = $dataPoint;

            array_push($res["player"], $res2);
        }
    }

    $query_delete_join_temp = $mysqli->query("DELETE FROM join_temp WHERE code_room='$_POST[code]' AND id_quiz='$_POST[quiz]'");

    if ($query_delete_join_temp) {
        array_push($response["data"], $res);
    
        echo json_encode($response);
    }

    // array_push($response["data"], $res);
    
    // echo json_encode($response);
}
?>