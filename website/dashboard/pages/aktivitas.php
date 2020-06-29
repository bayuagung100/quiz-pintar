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
                        $query = $mysqli->query("SELECT * FROM aktivitas WHERE id_player IN ($_SESSION[id]) ORDER BY id DESC");
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

    case 'action':
        $id_pembuat = $_POST['id_pembuat'];
        $judul = ucwords($_POST['judul']);
        $kategori = $_POST['kategori'];
        $tingkat = $_POST['tingkat'];
        $deskripsi = addslashes($_POST['deskripsi']);

        $soal = [$_POST['soal1'], $_POST['soal2'], $_POST['soal3'], $_POST['soal4'], $_POST['soal5'], $_POST['soal6'], $_POST['soal7'], $_POST['soal8'], $_POST['soal9'], $_POST['soal10']];

        $jawaban_soal = [$_POST['jawaban_soal1'], $_POST['jawaban_soal2'], $_POST['jawaban_soal3'], $_POST['jawaban_soal4'], $_POST['jawaban_soal5'], $_POST['jawaban_soal6'], $_POST['jawaban_soal7'], $_POST['jawaban_soal8'], $_POST['jawaban_soal9'], $_POST['jawaban_soal10']];
        $jawaban_a_soal = [$_POST['jawaban_a_soal1'], $_POST['jawaban_a_soal2'], $_POST['jawaban_a_soal3'], $_POST['jawaban_a_soal4'], $_POST['jawaban_a_soal5'], $_POST['jawaban_a_soal6'], $_POST['jawaban_a_soal7'], $_POST['jawaban_a_soal8'], $_POST['jawaban_a_soal9'], $_POST['jawaban_a_soal10']];
        $jawaban_b_soal = [$_POST['jawaban_b_soal1'], $_POST['jawaban_b_soal2'], $_POST['jawaban_b_soal3'], $_POST['jawaban_b_soal4'], $_POST['jawaban_b_soal5'], $_POST['jawaban_b_soal6'], $_POST['jawaban_b_soal7'], $_POST['jawaban_b_soal8'], $_POST['jawaban_b_soal9'], $_POST['jawaban_b_soal10']];
        $jawaban_c_soal = [$_POST['jawaban_c_soal1'], $_POST['jawaban_c_soal2'], $_POST['jawaban_c_soal3'], $_POST['jawaban_c_soal4'], $_POST['jawaban_c_soal5'], $_POST['jawaban_c_soal6'], $_POST['jawaban_c_soal7'], $_POST['jawaban_c_soal8'], $_POST['jawaban_c_soal9'], $_POST['jawaban_c_soal10']];
        $jawaban_d_soal = [$_POST['jawaban_d_soal1'], $_POST['jawaban_d_soal2'], $_POST['jawaban_d_soal3'], $_POST['jawaban_d_soal4'], $_POST['jawaban_d_soal5'], $_POST['jawaban_d_soal6'], $_POST['jawaban_d_soal7'], $_POST['jawaban_d_soal8'], $_POST['jawaban_d_soal9'], $_POST['jawaban_d_soal10']];

        if (isset($_FILES['gambar_soal1'])){
            $gambar_soal1 = isset($_FILES['gambar_soal1'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal1']['name'])):null;
        } else {
            $gambar_soal1 = isset($_POST['gambar_soal1'])?$_POST['gambar_soal1']:null;
        }
        if (isset($_FILES['gambar_soal2'])){
            $gambar_soal2 = isset($_FILES['gambar_soal2'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal2']['name'])):null;
        } else {
            $gambar_soal2 = isset($_POST['gambar_soal2'])?$_POST['gambar_soal2']:null;
        }
        if (isset($_FILES['gambar_soal3'])){
            $gambar_soal3 = isset($_FILES['gambar_soal3'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal3']['name'])):null;
        } else {
            $gambar_soal3 = isset($_POST['gambar_soal3'])?$_POST['gambar_soal3']:null;
        }
        if (isset($_FILES['gambar_soal4'])){
            $gambar_soal4 = isset($_FILES['gambar_soal4'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal4']['name'])):null;
        } else {
            $gambar_soal4 = isset($_POST['gambar_soal4'])?$_POST['gambar_soal4']:null;
        }
        if (isset($_FILES['gambar_soal5'])){
            $gambar_soal5 = isset($_FILES['gambar_soal5'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal5']['name'])):null;
        } else {
            $gambar_soal5 = isset($_POST['gambar_soal5'])?$_POST['gambar_soal5']:null;
        }
        if (isset($_FILES['gambar_soal6'])){
            $gambar_soal6 = isset($_FILES['gambar_soal6'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal6']['name'])):null;
        } else {
            $gambar_soal6 = isset($_POST['gambar_soal6'])?$_POST['gambar_soal6']:null;
        }
        if (isset($_FILES['gambar_soal7'])){
            $gambar_soal7 = isset($_FILES['gambar_soal7'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal7']['name'])):null;
        } else {
            $gambar_soal7 = isset($_POST['gambar_soal7'])?$_POST['gambar_soal7']:null;
        }
        if (isset($_FILES['gambar_soal8'])){
            $gambar_soal8 = isset($_FILES['gambar_soal8'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal8']['name'])):null;
        } else {
            $gambar_soal8 = isset($_POST['gambar_soal8'])?$_POST['gambar_soal8']:null;
        }
        if (isset($_FILES['gambar_soal9'])){
            $gambar_soal9 = isset($_FILES['gambar_soal9'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal9']['name'])):null;
        } else {
            $gambar_soal9 = isset($_POST['gambar_soal9'])?$_POST['gambar_soal9']:null;
        }
        if (isset($_FILES['gambar_soal10'])){
            $gambar_soal10 = isset($_FILES['gambar_soal10'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal10']['name'])):null;
        } else {
            $gambar_soal10 = isset($_POST['gambar_soal10'])?$_POST['gambar_soal10']:null;
        }

        $gambar_soal = [
            $gambar_soal1,
            $gambar_soal2,
            $gambar_soal3,
            $gambar_soal4,
            $gambar_soal5,
            $gambar_soal6,
            $gambar_soal7,
            $gambar_soal8,
            $gambar_soal9,
            $gambar_soal10,
        ];

        $tmp_gambar_soal = [
            isset($_FILES['gambar_soal1'])?$_FILES['gambar_soal1']['tmp_name']:null, 
            isset($_FILES['gambar_soal2'])?$_FILES['gambar_soal2']['tmp_name']:null, 
            isset($_FILES['gambar_soal3'])?$_FILES['gambar_soal3']['tmp_name']:null, 
            isset($_FILES['gambar_soal4'])?$_FILES['gambar_soal4']['tmp_name']:null, 
            isset($_FILES['gambar_soal5'])?$_FILES['gambar_soal5']['tmp_name']:null, 
            isset($_FILES['gambar_soal6'])?$_FILES['gambar_soal6']['tmp_name']:null, 
            isset($_FILES['gambar_soal7'])?$_FILES['gambar_soal7']['tmp_name']:null, 
            isset($_FILES['gambar_soal8'])?$_FILES['gambar_soal8']['tmp_name']:null, 
            isset($_FILES['gambar_soal9'])?$_FILES['gambar_soal9']['tmp_name']:null, 
            isset($_FILES['gambar_soal10'])?$_FILES['gambar_soal10']['tmp_name']:null
        ];

        
        if(isset($_FILES['gambar'])){
            $gambar = isset($_FILES['gambar'])?strtolower(str_replace(" ","-",$_FILES['gambar']['name'])):null;
        }else {
            $gambar =  isset($_POST['gambar'])?$_POST['gambar']:null;
        }
            
        $filetmpgambar = isset($_FILES['gambar'])?$_FILES['gambar']['tmp_name']:null;

        // } else {
        //     $gambar = isset($_POST['gambar'])?$_POST['gambar']:null;

        //     $gambar_soal = [
        //         isset($_POST['gambar_soal1'])?$_POST['gambar_soal1']:null, 
        //         isset($_POST['gambar_soal2'])?$_POST['gambar_soal2']:null, 
        //         isset($_POST['gambar_soal3'])?$_POST['gambar_soal3']:null, 
        //         isset($_POST['gambar_soal4'])?$_POST['gambar_soal4']:null, 
        //         isset($_POST['gambar_soal5'])?$_POST['gambar_soal5']:null, 
        //         isset($_POST['gambar_soal6'])?$_POST['gambar_soal6']:null, 
        //         isset($_POST['gambar_soal7'])?$_POST['gambar_soal7']:null, 
        //         isset($_POST['gambar_soal8'])?$_POST['gambar_soal8']:null, 
        //         isset($_POST['gambar_soal9'])?$_POST['gambar_soal9']:null, 
        //         isset($_POST['gambar_soal10'])?$_POST['gambar_soal10']:null
        //     ];
        // }

        $imp_soal = implode(";", $soal);
        $imp_jawaban_soal = implode(";", $jawaban_soal);
        $imp_jawaban_a_soal = implode(";", $jawaban_a_soal);
        $imp_jawaban_b_soal = implode(";", $jawaban_b_soal);
        $imp_jawaban_c_soal = implode(";", $jawaban_c_soal);
        $imp_jawaban_d_soal = implode(";", $jawaban_d_soal);

        $imp_gambar_soal = implode(";", $gambar_soal);
        $ex_gambar_soal = explode(', $imp_gambar_soal);
        $imp_tmp_gambar_soal = implode(";", $tmp_gambar_soal);
        $ex_tmp_gambar_soal = explode(', $imp_tmp_gambar_soal);

        global $mysqli;

        if($_POST['aksi'] == "buat"){
            // var_dump($gambar);
            // var_dump($imp_gambar_soal);
            move_uploaded_file($filetmpgambar, 'images/'.strtolower(str_replace(" ","-",$gambar)));
            if ($gambar_soal) {
                for ($i=0; $i < count($ex_gambar_soal); $i++) {
                    move_uploaded_file($ex_tmp_gambar_soal[$i], 'images/'.$ex_gambar_soal[$i]);
                }
            }
            $query = $mysqli->query("INSERT INTO quiz
                (
                    id_pembuat,
                    judul,
                    gambar,
                    kategori,
                    tingkat,
                    deskripsi,
                    soal,
                    gambar_soal,
                    jawaban_soal,
                    jawaban_a_soal,
                    jawaban_b_soal,
                    jawaban_c_soal,
                    jawaban_d_soal
                )
                VALUES
                (
                    '$id_pembuat',
                    '$judul',
                    '$gambar',
                    '$kategori',
                    '$tingkat',
                    '$deskripsi',
                    '$imp_soal',
                    '$imp_gambar_soal',
                    '$imp_jawaban_soal',
                    '$imp_jawaban_a_soal',
                    '$imp_jawaban_b_soal',
                    '$imp_jawaban_c_soal',
                    '$imp_jawaban_d_soal'

                )
            ");
            if ($query) {
                echo"
                <script type='text/javascript'>
                $(document).ready(function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Soal berhasil disimpan',
                        onAfterClose: () => {
                            window.location.href = '".$link."
                        }
                    });
                });
                </script>
                ";
                // header('location:'.$link);
            } else {
                echo "gagal " .$mysqli->error;
            }
        }elseif($_POST['aksi'] == "edit"){
            // var_dump($gambar);
            // var_dump($imp_gambar_soal);
            move_uploaded_file($filetmpgambar, 'images/'.strtolower(str_replace(" ","-",$gambar)));
            if ($gambar_soal) {
                for ($i=0; $i < count($ex_gambar_soal); $i++) {
                    move_uploaded_file($ex_tmp_gambar_soal[$i], 'images/'.$ex_gambar_soal[$i]);
                }
            }
            $query 	= $mysqli->query ( "UPDATE quiz SET
                id_pembuat      =   '$id_pembuat',
                judul           =   '$judul',
                gambar          =   '$gambar',
                kategori        =   '$kategori',
                tingkat         =   '$tingkat',
                deskripsi       =   '$deskripsi',
                soal            =   '$imp_soal',
                gambar_soal     =   '$imp_gambar_soal',
                jawaban_soal    =   '$imp_jawaban_soal',
                jawaban_a_soal  =   '$imp_jawaban_a_soal',
                jawaban_b_soal  =   '$imp_jawaban_b_soal',
                jawaban_c_soal  =   '$imp_jawaban_c_soal',
                jawaban_d_soal  =   '$imp_jawaban_d_soal'

                WHERE id='$_POST[id]'
                ");
            if ($query) {
                echo"
                <script type='text/javascript'>
                $(document).ready(function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Soal berhasil disimpan',
                        onAfterClose: () => {
                            window.location.href = '".$link."
                        }
                    });
                });
                </script>
                ";
                // header('location:'.$link);
            } else {
                echo "gagal " .$mysqli->error;
            }
        }
        // header('location:'.$link);
    break;


    
}
?>