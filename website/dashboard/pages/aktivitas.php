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
                        $query = $mysqli->query("SELECT * FROM aktivitas WHERE id_rm = '$_SESSION[id]' ORDER BY id DESC");
                    } else {
                        $query = $mysqli->query("SELECT * FROM aktivitas WHERE id_player LIKE '%$_SESSION[id]%' ORDER BY id DESC");
                    }
                    
                    while($data = $query->fetch_array()){
                        $id_quiz = $data['id_quiz'];
                        $id_player = $data['id_player'];
                        $total_player = count(explode(',', $id_player));
                        $query_quiz = $mysqli->query("SELECT * FROM quiz WHERE id = '$id_quiz' ");
                        $data_query_quiz = $query_quiz->fetch_array();
                        $judul = $data_query_quiz['judul'];
                        detail_datatables($no, array($judul,$total_player), $link, $data['id']);
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
            $query 	= $mysqli->query ( "SELECT * FROM aktivitas WHERE id='$_GET[id]'");
            $data= $query->fetch_array();
            $aksi 	= "Lihat";
            $id_player = $data['id_player'];
            $ranked = $data['ranked'];
            $progress = $data['progress'];
            $point = $data['point'];
            $total_player = count(explode(',', $id_player));
            $ex_id_player = explode(',', $id_player);
            $ex_ranked = explode(',', $ranked);
            $ex_progress = explode(',', $progress);
            $ex_point = explode(',', $point);
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12  bg ">
                    <div class="text-center btn-leaderboard "><div class="leaderboard-text"><img src="<?php echo url("img/icons/medal.png");?>" style="max-width:42px"> Leaderboard</div></div>
                    <div class="container">
                        <div class="online">
                            <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (<span><?php echo $total_player;?></span>)</h4>
                        </div>
                        <div class="tingkat">
                            <h4><?php $query_tingkat = $mysqli->query("SELECT * FROM quiz WHERE id='$data[id_quiz]' "); $data_tingkat = $query_tingkat->fetch_array(); echo $data_tingkat['tingkat'];?></h4>
                        </div>

                        <div class="container-card" id="show_lederboard" class="row">
                            <div class="col-sm-12"> 
                                <?php 
                                    foreach ($ex_id_player as $key => $value) {
                                        $ex_value = explode('/', $ex_progress[$key]);
                                        $query_player = $mysqli->query ("SELECT * FROM user WHERE id='$value' ");
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
                                        <div class="col-rank">Rank <div class="rank"><?php echo $ex_ranked[$key];?></div></div>
                                        <div class="col-img"><img src="<?php echo $gambar;?>"/></div>
                                        <div class="col-name">
                                            <div class="name"><b><?php echo $nama;?></b></div>
                                        </div>
                                        <div class="col-progress">
                                            <div class="container-progressed">
                                            <div class="progressed"><?php echo $ex_progress[$key];?></div>
                                            </div>
                                            <progress value="<?php echo $ex_value[0];?>" max="10"></progress>
                                        </div>
                                        <div class="col-point">Point <div class="point"><?php echo $ex_point[$key];?></div></div>
                                    </div>
                                <?php } ?>
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