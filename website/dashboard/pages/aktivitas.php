<?php
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "aktivitas";
switch($show){
    default:
?>
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-file-alt"></i>
                        Aktivitas
                    </h3>
                </div>
                <?php
                buka_datatables(array("Nama Quiz", "Total Pemain"));
                    $no = 1;
                    if ($_SESSION['role'] == 'guru') {
                        $query = $mysqli->query("SELECT DISTINCT code_room,id_rm, id_quiz FROM aktivitas WHERE id_rm='$_SESSION[id]'");
                    } else {
                        $query = $mysqli->query("SELECT * FROM aktivitas WHERE id_player='$_SESSION[id]'");
                    }
                    
                    while($data = $query->fetch_array()){
                        $id_quiz = $data['id_quiz'];
                        $code_room = $data['code_room'];
                        $total_player = $mysqli->query("SELECT COUNT(code_room) AS total FROM aktivitas WHERE code_room='$code_room'");
                        $data_total_player = $total_player->fetch_array();
                        $total = $data_total_player['total'];
                        $query_quiz = $mysqli->query("SELECT * FROM quiz WHERE id = '$id_quiz' ");
                        $data_query_quiz = $query_quiz->fetch_array();
                        $judul = $data_query_quiz['judul'];
                        detail_datatables($no, array($judul,$total), $link, $code_room);
                        $no++;
                    }
                    
                tutup_datatables(array("Nama Quiz", "Total Pemain"));
                ?>

            </div>
        </div>
    </section>
<?php
    break;

    case "form":
        global $mysqli;
        if(isset($_GET['id'])){
            $query 	= $mysqli->query ( "SELECT * FROM aktivitas WHERE code_room='$_GET[id]' ORDER BY ranked ");
            $data= $query->fetch_array();
            $total_player = $mysqli->query("SELECT COUNT(code_room) AS total FROM aktivitas WHERE code_room='$_GET[id]' ");
            $data_total_player = $total_player->fetch_array();
            $total = $data_total_player['total'];
            // var_dump($data);
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12  bg ">
                    <div class="text-center btn-leaderboard "><div class="leaderboard-text"><img src="<?php echo url("img/icons/medal.png");?>" style="max-width:42px"> Leaderboard</div></div>
                    <div class="container">
                        <div class="online">
                            <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (<span><?php echo $total;?></span>)</h4>
                        </div>
                        <div class="tingkat">
                            <h4><?php $query_tingkat = $mysqli->query("SELECT * FROM quiz WHERE id='$data[id_quiz]' "); $data_tingkat = $query_tingkat->fetch_array(); echo $data_tingkat['tingkat'];?></h4>
                        </div>

                        <div class="container-card" id="show_lederboard" class="row">
                            <div class="col-sm-12"> 
                                    <?php
                                    $query2 	= $mysqli->query ( "SELECT * FROM aktivitas WHERE code_room='$_GET[id]' ORDER BY ranked ");
                                    while($data2 = $query2->fetch_array()){
                                        $id_player = $data2['id_player'];
                                        $ranked = $data2['ranked'];
                                        $progress = $data2['progress'];
                                        $ex_progress = explode('/', $progress);
                                        $point = $data2['point'];

                                        $query_player = $mysqli->query ("SELECT * FROM user WHERE id='$id_player' ");
                                        $data_query_player = $query_player->fetch_array();
                                        $nama = $data_query_player['nama'];
                                        $avatar = $data_query_player['avatar'];
                                        if ($avatar == null) {
                                            $gambar = url("img/avatar/no-image2.png");
                                        } else {
                                            $gambar = url("img/avatar/").$avatar;
                                        }
                                    ?>
                                    <div class="card-player-played">
                                        <div class="col-rank">Rank <div class="rank"><?php echo $ranked;?></div></div>
                                        <div class="col-img"><img src="<?php echo $gambar;?>"/></div>
                                        <div class="col-name">
                                            <div class="name"><b><?php echo $nama;?></b></div>
                                        </div>
                                        <div class="col-progress">
                                            <div class="container-progressed">
                                            <div class="progressed"><?php echo $progress;?></div>
                                            </div>
                                            <progress value="<?php echo $ex_progress[0];?>" max="10"></progress>
                                        </div>
                                        <div class="col-point">Point <div class="point"><?php echo $point;?></div></div>
                                    </div>
                                    <?php 
                                    } 
                                    ?>
                            </div>
                            <button class="text-center btn btn-block btn-warning btn-lg" onclick="history.back()">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    break;

    
}
?>