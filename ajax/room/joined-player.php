<?php
include "../../vendor/config.php";
$code = $_POST["code"];
// header('Refresh: 1;');

$query = $mysqli->query("SELECT id_player FROM join_temp WHERE code_room='$code' ");
$data = $query->fetch_array();

// $response = array();
// // $response["data"] = array();

//     $idp = $data['id_player'];
//     $ex = explode(";", $idp);
//     foreach ($ex as $key => $value) {
//         $response[$key] = $value;
//     }
    
   
//     // $response  = $ex;

//     // array_push($response, $res);

// echo json_encode($response);

    $idp = $data['id_player'];
    $ex = explode(";", $idp);
    $total = count(array_filter($ex));
    if ($idp!=null) {
        
        if ($total > 1) {
            foreach ($ex as $key => $value) {
                $query2 = $mysqli->query("SELECT * FROM user WHERE id='$value' ");
                $jmlquery2 = $query2->num_rows;
                $data2 = $query2->fetch_array();

                $id = isset($data2['id']) ? $data2['id'] : null;
                $nama = isset($data2['nama'])  ? $data2['nama'] : null;
                $avatar = isset($data2['avatar'])  ? $data2['avatar'] : null;

                if ($avatar == null) {
                    $gambar = '<div style="background-color:#737375;border-radius: 100%;width: 65px;height:65px"><span class="text-center" style="color:#fff;font-size:14px;line-height:65px;padding-left:4px">no image</span></div>';
                } else {
                    $gambar = '<img src="'.str_replace("ajax/room/","",url("img/avatar/")).$avatar.'" style="width:65px"/>';
                }

                if ($jmlquery2>0) {
                    echo'
                    <div class="col-sm-6 col-lg-3" style="padding:20px">
                        <div class="card-player">
                            <div class="delete-player">
                            <i id="kick_player" data-id="'.$id.'" data-name="'.$nama.'" href="javascript:void(0)" class="fa fa-close" style="color:red;cursor:pointer"></i>
                            </div>
                            <div>'.$gambar.'</div>
                            
                            <div class="name-player">
                                <h3>'.$nama.'</h3>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
        } else {
            foreach ($ex as $key => $value) {
                $query2 = $mysqli->query("SELECT * FROM user WHERE id='$value' ");
                $data2 = $query2->fetch_array();
                $jmlquery2 = $query2->num_rows;

                $id = isset($data2['id']) ? $data2['id'] : null;
                $nama = isset($data2['nama'])  ? $data2['nama'] : null;
                $avatar = isset($data2['avatar'])  ? $data2['avatar'] : null;

                if ($avatar == null) {
                    $gambar = '<div style="background-color:#737375;border-radius: 100%;width: 65px;height:65px"><span class="text-center" style="color:#fff;font-size:14px;line-height:65px;padding-left:4px">no image</span></div>';
                } else {
                    $gambar = '<img src="'.str_replace("ajax/room/","",url("img/avatar/")).$avatar.'" style="width:65px"/>';
                }

                if ($jmlquery2>0) {
                    echo'
                    <div class="col-sm-6 col-lg-3" style="padding:20px">
                        <div class="card-player">
                            <div class="delete-player">
                            <i id="kick_player" data-id="'.$id.'" data-name="'.$nama.'" href="javascript:void(0)"  class="fa fa-close" style="color:red;cursor:pointer"></i>
                            </div>
                            <div>'.$gambar.'</div>
                            
                            <div class="name-player">
                                <h3>'.$nama.'</h3>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
        }
    }
    


// echo'
// <div class="col-sm-3" style="padding:20px">
//     <div class="card-player">
//         <div class="delete-player">
//         <i class="fa fa-close" style="color:red;cursor:pointer"></i>
//         </div>
//         <div><img src="'.str_replace("ajax/room/","",url("img/avatar/monster.png")).'" style="width:65px"/></div>
        
//         <div class="name-player">
//             <h3>asdasdasdasdasdasdas</h3>
//         </div>
//     </div>
// </div>
// <div class="col-sm-3" style="padding:20px">
//     <div class="card-player">
//         <div class="delete-player">
//         <i class="fa fa-close" style="color:red;cursor:pointer"></i>
//         </div>
//         <div><img src="'.str_replace("ajax/room/","",url("img/avatar/monster.png")).'" style="width:65px"/></div>
        
//         <div class="name-player">
//             <h3>asdasdasdasdasdasdas</h3>
//         </div>
//     </div>
// </div>

// ';
// $query = $mysqli->query("SELECT id_player FROM join_temp WHERE code_room='858689' ");
// $data = $query->fetch_array();

// if ($data['id_player']==null) {
//     $total = 0;
// } else {
//     $ex = explode(";", $data['id_player']);
//     // $total = count($ex);
//     $total = $ex;
//     // $total = count(array_filter($ex));
// }

// // $response = array();
// // echo $total;
// // $response = array();
// //     $response["data"] = array();
// //         $res['title']  = 'Oops...';
// //         $res['icon']  = 'error';
    
//     // array_push($total["data"], $res);
//     echo json_encode($total);
?>