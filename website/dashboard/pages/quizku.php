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
                        Quiz ku
                    </h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="quizku" class="card-body">
                
                </div>

            </div>
        </div>
    </section>
<?php
    break;

    case "form":
        global $mysqli;
        if(isset($_GET['id'])){
            $query 	= $mysqli->query ( "SELECT * FROM quiz WHERE id='$_GET[id]'");
            $data= $query->fetch_array();
            $aksi 	= "Edit";
        }else{
            $data = array("id"=>"", "id_pembuat"=>$_SESSION['id'], "judul"=>"", "gambar"=>"", "kategori"=>"", "tingkat"=>"", "deskripsi"=>"", 
            "soal1"=>"","gambar_soal1"=>"","jawaban_soal1"=>"","jawaban_a_soal1"=>"","jawaban_b_soal1"=>"","jawaban_c_soal1"=>"","jawaban_d_soal1"=>"",
            "soal2"=>"","gambar_soal2"=>"","jawaban_soal2"=>"","jawaban_a_soal2"=>"","jawaban_b_soal2"=>"","jawaban_c_soal2"=>"","jawaban_d_soal2"=>"",
            "soal3"=>"","gambar_soal3"=>"","jawaban_soal3"=>"","jawaban_a_soal3"=>"","jawaban_b_soal3"=>"","jawaban_c_soal3"=>"","jawaban_d_soal3"=>"",
            "soal4"=>"","gambar_soal4"=>"","jawaban_soal4"=>"","jawaban_a_soal4"=>"","jawaban_b_soal4"=>"","jawaban_c_soal4"=>"","jawaban_d_soal4"=>"",
            "soal5"=>"","gambar_soal5"=>"","jawaban_soal5"=>"","jawaban_a_soal5"=>"","jawaban_b_soal5"=>"","jawaban_c_soal5"=>"","jawaban_d_soal5"=>"",
            "soal6"=>"","gambar_soal6"=>"","jawaban_soal6"=>"","jawaban_a_soal6"=>"","jawaban_b_soal6"=>"","jawaban_c_soal6"=>"","jawaban_d_soal6"=>"",
            "soal7"=>"","gambar_soal7"=>"","jawaban_soal7"=>"","jawaban_a_soal7"=>"","jawaban_b_soal7"=>"","jawaban_c_soal7"=>"","jawaban_d_soal7"=>"",
            "soal8"=>"","gambar_soal8"=>"","jawaban_soal8"=>"","jawaban_a_soal8"=>"","jawaban_b_soal8"=>"","jawaban_c_soal8"=>"","jawaban_d_soal8"=>"",
            "soal9"=>"","gambar_soal9"=>"","jawaban_soal9"=>"","jawaban_a_soal9"=>"","jawaban_b_soal9"=>"","jawaban_c_soal9"=>"","jawaban_d_soal9"=>"",
            "soal10"=>"","gambar_soal10"=>"","jawaban_soal10"=>"","jawaban_a_soal10"=>"","jawaban_b_soal10"=>"","jawaban_c_soal10"=>"","jawaban_d_soal10"=>"",
            );
            $aksi 	= "Buat";
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
                        buka_form($link, $data['id'], strtolower($aksi), "buat_quiz");
                        buat_hidden("id_pembuat", $data['id_pembuat']);
                        echo'<div id="default">';
                        buat_textbox("1. Berikan nama quiz ini", "judul", $data['judul'], "Nama quiz", "required");
                        buat_fileimage("2. Berikan gambar pada quiz ini", "gambar", $data['gambar'], 1, "required");
                        $list = array();
                        $list[] = array('val'=>'', 'cap'=>'Pilih Kategori');
                        $list[] = array('val'=>'Pendidikan Agama', 'cap'=>' Pendidikan Agama');
                        $list[] = array('val'=>'Pendidikan Kewarganegaraan', 'cap'=>' Pendidikan Kewarganegaraan');
                        $list[] = array('val'=>'Bahasa Indonesia', 'cap'=>' Bahasa Indonesia');
                        $list[] = array('val'=>'Bahasa Inggris', 'cap'=>' Bahasa Inggris');
                        $list[] = array('val'=>'Matematika', 'cap'=>' Matematika');
                        $list[] = array('val'=>'Fisika', 'cap'=>' Fisika');
                        $list[] = array('val'=>'Kimia', 'cap'=>' Kimia');
                        $list[] = array('val'=>'Biologi', 'cap'=>' Biologi');
                        $list[] = array('val'=>'Sejarah', 'cap'=>' Sejarah');
                        $list[] = array('val'=>'Seni Budaya', 'cap'=>' Seni Budaya');
                        $list[] = array('val'=>'Penjaskes', 'cap'=>' Penjaskes');
                        $list[] = array('val'=>'Teknologi Informasi dan Komunikasi', 'cap'=>' Teknologi Informasi dan Komunikasi');
                        $list[] = array('val'=>'Keterampilan/Bahasa Asing', 'cap'=>' Keterampilan/Bahasa Asing');
                        $list[] = array('val'=>'Muatan Lokal', 'cap'=>' Muatan Lokal');
                        buat_select("3. Berikan kategori untuk quiz ini", "kategori", $list, $data['kategori'], "required");
                        $list2 = array();
                        $list2[] = array('val'=>'', 'cap'=>'Pilih Tingkat Kesulitan');
                        $list2[] = array('val'=>'Hard', 'cap'=>'Hard');
                        $list2[] = array('val'=>'Medium', 'cap'=>'Medium');
                        $list2[] = array('val'=>'Easy', 'cap'=>'Easy');
                        buat_select("4. Berikan tingkat kesulitan quiz ini", "tingkat", $list2, $data['tingkat'], "required");
                        buat_textarea("5. Deskripsi untuk quiz ini", "deskripsi", $data['deskripsi'], "Deskripsi Quiz", "required", "richtext");
                        buat_btnactiondefault(1);
                        echo'</div>';
                        

                        for ($i=1; $i <= 10; $i++) {
                            buat_bukadivpertanyaan($i);
                                echo '<div class="row">';
                                    buat_bukadivsoal($i);
                                        buat_textarea("Pertanyaan", "soal$i", $data['soal1'], "Soal pertanyaan", "required");
                                        buat_fileimagesoal("Gambar pertanyaan", $data['gambar_soal1'], $i);
                                        buat_radiojawaban($i);
                                    buat_tutupdivsoal();
                                    buat_bukadivpreview($i);
                                        buat_isipreview($i);
                                    buat_tutupdivpreview();

                                echo "
                                    </div>
                                    <hr>
                                    <div class='action-btns-wrapper'>
                                ";
                                    if ($i == 1) {
                                        $next = $i + 1;
                                        buat_btnactionprevdefault($next);
                                    } elseif ($i == 10) {
                                        $prev = $i - 1;
                                        buat_btnactionnextsubmit($prev);
                                    } else {
                                        $prev = $i - 1;
                                        $next = $i + 1;
                                        buat_btnactionprevnext($prev, $next);
                                    }
                                    echo"</div>";
                            buat_tutupdivpertanyaan();
                        }


                        
                        tutup_form();
                    ?>
                </div>
            </div>
        </section>
    <?php
    break;

    case 'action':
        if($_POST['aksi'] == "buat"){
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

            $gambar_soal = [
                isset($_FILES['gambar_soal1'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal1']['name'])):null, 
                isset($_FILES['gambar_soal2'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal2']['name'])):null, 
                isset($_FILES['gambar_soal3'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal3']['name'])):null, 
                isset($_FILES['gambar_soal4'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal4']['name'])):null, 
                isset($_FILES['gambar_soal5'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal5']['name'])):null, 
                isset($_FILES['gambar_soal6'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal6']['name'])):null, 
                isset($_FILES['gambar_soal7'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal7']['name'])):null, 
                isset($_FILES['gambar_soal8'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal8']['name'])):null, 
                isset($_FILES['gambar_soal9'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal9']['name'])):null, 
                isset($_FILES['gambar_soal10'])?strtolower(str_replace(" ","-",$_FILES['gambar_soal10']['name'])):null
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

            $gambar = isset($_FILES['gambar'])?strtolower(str_replace(" ","-",$_FILES['gambar']['name'])):null;
            $filetmpgambar = isset($_FILES['gambar'])?$_FILES['gambar']['tmp_name']:null;

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
                header('location:'.$link);
            } else {
                echo "gagal " .$mysqli->error;
            }

            

        }elseif($_POST['aksi'] == "edit"){
            echo "edit";
        }
        header('location:'.$link);
    break;


    
}
?>