<?php
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "quizku";
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
                    $query = $mysqli->query("SELECT a.id, COUNT(l.id) AS total_pemain, q.judul FROM aktivitas a
                    JOIN join_temp j ON a.id_join = j.id
                    JOIN leaderboard_temp l ON j.id = l.id_join
                    JOIN quiz q ON a.id = q.id
                    WHERE j.id_rm = '$_SESSION[id]'
                    ");

                    while($data = $query->fetch_array()){
                        detail_datatables($no, array($data['judul'],$data['total_pemain']), $link, $data['id']);
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
        }
        ?>
        <section  id="sec-buat-quiz"  class="content" style="padding:20px">
            <div class="container-fluid">
                <div class="buat-quiz">
                    <div id="banner" class="banner">
                        <div class="image-wrapper">
                            <img src="<?php echo url("img/icons/createaquiz.png");?>">
                        </div>
                        <div class="title"><?php echo $aksi;?> quiz</div>
                    </div>
                    <div id="tanda" class="container">
                        <p>Tanda (<span style="color:red">*</span>) wajib diisi.</p>
                    </div>
                    <?php 
                        buka_form($link, $data['id'], strtolower($aksi), "aktivitas");

                        tutup_form();
                    ?>
                </div>
            </div>
        </section>
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
        $ex_gambar_soal = explode(';', $imp_gambar_soal);
        $imp_tmp_gambar_soal = implode(";", $tmp_gambar_soal);
        $ex_tmp_gambar_soal = explode(';', $imp_tmp_gambar_soal);

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
                            window.location.href = '".$link."';
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
                            window.location.href = '".$link."';
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