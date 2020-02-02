<?php
include "../vendor/config.php";
$id_pembuat = $_POST['id_pembuat'];
$judul = $_POST['judul'];
$gambar = $_POST['gambar'];
$kategori = $_POST['kategori'];
$tingkat = $_POST['tingkat'];
$deskripsi = $_POST['deskripsi'];

$soal = [$_POST['soal1'], $_POST['soal2'], $_POST['soal3'], $_POST['soal4'], $_POST['soal5'], $_POST['soal6'], $_POST['soal7'], $_POST['soal8'], $_POST['soal9'], $_POST['soal10']];
$gambar_soal = [isset($_POST['gambar_soal1'])?$_POST['gambar_soal1']:null, isset($_POST['gambar_soal2'])?$_POST['gambar_soal2']:null, isset($_POST['gambar_soal3'])?$_POST['gambar_soal3']:null, isset($_POST['gambar_soal4'])?$_POST['gambar_soal4']:null, isset($_POST['gambar_soal5'])?$_POST['gambar_soal5']:null, isset($_POST['gambar_soal6'])?$_POST['gambar_soal6']:null, isset($_POST['gambar_soal7'])?$_POST['gambar_soal7']:null, isset($_POST['gambar_soal8'])?$_POST['gambar_soal8']:null, isset($_POST['gambar_soal9'])?$_POST['gambar_soal9']:null, isset($_POST['gambar_soal10'])?$_POST['gambar_soal10']:null];
$jawaban_soal = [$_POST['jawaban_soal1'], $_POST['jawaban_soal2'], $_POST['jawaban_soal3'], $_POST['jawaban_soal4'], $_POST['jawaban_soal5'], $_POST['jawaban_soal6'], $_POST['jawaban_soal7'], $_POST['jawaban_soal8'], $_POST['jawaban_soal9'], $_POST['jawaban_soal10']];
$jawaban_a_soal = [$_POST['jawaban_a_soal1'], $_POST['jawaban_a_soal2'], $_POST['jawaban_a_soal3'], $_POST['jawaban_a_soal4'], $_POST['jawaban_a_soal5'], $_POST['jawaban_a_soal6'], $_POST['jawaban_a_soal7'], $_POST['jawaban_a_soal8'], $_POST['jawaban_a_soal9'], $_POST['jawaban_a_soal10']];
$jawaban_b_soal = [$_POST['jawaban_b_soal1'], $_POST['jawaban_b_soal2'], $_POST['jawaban_b_soal3'], $_POST['jawaban_b_soal4'], $_POST['jawaban_b_soal5'], $_POST['jawaban_b_soal6'], $_POST['jawaban_b_soal7'], $_POST['jawaban_b_soal8'], $_POST['jawaban_b_soal9'], $_POST['jawaban_b_soal10']];
$jawaban_c_soal = [$_POST['jawaban_c_soal1'], $_POST['jawaban_c_soal2'], $_POST['jawaban_c_soal3'], $_POST['jawaban_c_soal4'], $_POST['jawaban_c_soal5'], $_POST['jawaban_c_soal6'], $_POST['jawaban_c_soal7'], $_POST['jawaban_c_soal8'], $_POST['jawaban_c_soal9'], $_POST['jawaban_c_soal10']];
$jawaban_d_soal = [$_POST['jawaban_d_soal1'], $_POST['jawaban_d_soal2'], $_POST['jawaban_d_soal3'], $_POST['jawaban_d_soal4'], $_POST['jawaban_d_soal5'], $_POST['jawaban_d_soal6'], $_POST['jawaban_d_soal7'], $_POST['jawaban_d_soal8'], $_POST['jawaban_d_soal9'], $_POST['jawaban_d_soal10']];

$imp_soal = implode(";", $soal);
$imp_gambar_soal = implode(";", $gambar_soal);
$imp_jawaban_soal = implode(";", $jawaban_soal);
$imp_jawaban_a_soal = implode(";", $jawaban_a_soal);
$imp_jawaban_b_soal = implode(";", $jawaban_b_soal);
$imp_jawaban_c_soal = implode(";", $jawaban_c_soal);
$imp_jawaban_d_soal = implode(";", $jawaban_d_soal);

// $soal1 = $_POST['soal1'];
// // $gambar_soal1 = $_POST['gambar_soal1'];
// $jawaban_soal1 = $_POST['jawaban_soal1'];
// $jawaban_a_soal1 = $_POST['jawaban_a_soal1'];
// $jawaban_b_soal1 = $_POST['jawaban_b_soal1'];
// $jawaban_c_soal1 = $_POST['jawaban_c_soal1'];
// $jawaban_d_soal1 = $_POST['jawaban_d_soal1'];

// $soal2 = $_POST['soal2'];
// // $gambar_soal2 = $_POST['gambar_soal2'];
// $jawaban_soal2 = $_POST['jawaban_soal2'];
// $jawaban_a_soal2 = $_POST['jawaban_a_soal2'];
// $jawaban_b_soal2 = $_POST['jawaban_b_soal2'];
// $jawaban_c_soal2 = $_POST['jawaban_c_soal2'];
// $jawaban_d_soal2 = $_POST['jawaban_d_soal2'];

// $soal3 = $_POST['soal3'];
// // $gambar_soal3 = $_POST['gambar_soal3'];
// $jawaban_soal3 = $_POST['jawaban_soal3'];
// $jawaban_a_soal3 = $_POST['jawaban_a_soal3'];
// $jawaban_b_soal3 = $_POST['jawaban_b_soal3'];
// $jawaban_c_soal3 = $_POST['jawaban_c_soal3'];
// $jawaban_d_soal3 = $_POST['jawaban_d_soal3'];

// $soal4 = $_POST['soal4'];
// // $gambar_soal4 = $_POST['gambar_soal4'];
// $jawaban_soal4 = $_POST['jawaban_soal4'];
// $jawaban_a_soal4 = $_POST['jawaban_a_soal4'];
// $jawaban_b_soal4 = $_POST['jawaban_b_soal4'];
// $jawaban_c_soal4 = $_POST['jawaban_c_soal4'];
// $jawaban_d_soal4 = $_POST['jawaban_d_soal4'];

// $soal5 = $_POST['soal5'];
// // $gambar_soal5 = $_POST['gambar_soal5'];
// $jawaban_soal5 = $_POST['jawaban_soal5'];
// $jawaban_a_soal5 = $_POST['jawaban_a_soal5'];
// $jawaban_b_soal5 = $_POST['jawaban_b_soal5'];
// $jawaban_c_soal5 = $_POST['jawaban_c_soal5'];
// $jawaban_d_soal5 = $_POST['jawaban_d_soal5'];

// $soal6 = $_POST['soal6'];
// // $gambar_soal6 = $_POST['gambar_soal6'];
// $jawaban_soal6 = $_POST['jawaban_soal6'];
// $jawaban_a_soal6 = $_POST['jawaban_a_soal6'];
// $jawaban_b_soal6 = $_POST['jawaban_b_soal6'];
// $jawaban_c_soal6 = $_POST['jawaban_c_soal6'];
// $jawaban_d_soal6 = $_POST['jawaban_d_soal6'];

// $soal7 = $_POST['soal7'];
// // $gambar_soal7 = $_POST['gambar_soal7'];
// $jawaban_soal7 = $_POST['jawaban_soal7'];
// $jawaban_a_soal7 = $_POST['jawaban_a_soal7'];
// $jawaban_b_soal7 = $_POST['jawaban_b_soal7'];
// $jawaban_c_soal7 = $_POST['jawaban_c_soal7'];
// $jawaban_d_soal7 = $_POST['jawaban_d_soal7'];

// $soal8 = $_POST['soal8'];
// // $gambar_soal8 = $_POST['gambar_soal8'];
// $jawaban_soal8 = $_POST['jawaban_soal8'];
// $jawaban_a_soal8 = $_POST['jawaban_a_soal8'];
// $jawaban_b_soal8 = $_POST['jawaban_b_soal8'];
// $jawaban_c_soal8 = $_POST['jawaban_c_soal8'];
// $jawaban_d_soal8 = $_POST['jawaban_d_soal8'];

// $soal9 = $_POST['soal9'];
// // $gambar_soal9 = $_POST['gambar_soal9'];
// $jawaban_soal9 = $_POST['jawaban_soal9'];
// $jawaban_a_soal9 = $_POST['jawaban_a_soal9'];
// $jawaban_b_soal9 = $_POST['jawaban_b_soal9'];
// $jawaban_c_soal9 = $_POST['jawaban_c_soal9'];
// $jawaban_d_soal9 = $_POST['jawaban_d_soal9'];

// $soal10 = $_POST['soal10'];
// // $gambar_soal10 = $_POST['gambar_soal10'];
// $jawaban_soal10 = $_POST['jawaban_soal10'];
// $jawaban_a_soal10 = $_POST['jawaban_a_soal10'];
// $jawaban_b_soal10 = $_POST['jawaban_b_soal10'];
// $jawaban_c_soal10 = $_POST['jawaban_c_soal10'];
// $jawaban_d_soal10 = $_POST['jawaban_d_soal10'];


if(isset($_POST["simpan-soal"])) {
    global $mysqli;
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
        $asd = explode(";", $imp_gambar_soal);
        if ($asd[0] == null) {
            echo "sukses 1 tapi null" ;
        }else {
            echo "sukses 1 ada data";
        }

        if ($asd[1] == null) {
            echo "sukses 2 tapi null" ;
        }else {
            echo "sukses 2 ada data";
        }

        header('location:'.url('dashboard/quizku'));
    } else {
        echo "gagal " .$mysqli->error;
    }
    // echo $judul."<br>";
    // echo $gambar."<br>";
    // echo $kategori."<br>";
    // echo $tingkat."<br>";
    // echo $deskripsi."<br>";

    // echo $soal1."<br>";
    // // echo $gambar_soal1."<br>";
    // echo $jawaban_soal1."<br>";
    // echo $jawaban_a_soal1."<br>";
    // echo $jawaban_b_soal1."<br>";
    // echo $jawaban_c_soal1."<br>";
    // echo $jawaban_c_soal1."<br>";

    // echo $soal2."<br>";
    // // echo $gambar_soal2."<br>";
    // echo $jawaban_soal2."<br>";
    // echo $jawaban_a_soal2."<br>";
    // echo $jawaban_b_soal2."<br>";
    // echo $jawaban_c_soal2."<br>";
    // echo $jawaban_c_soal2."<br>";

    // echo $soal3."<br>";
    // // echo $gambar_soal3."<br>";
    // echo $jawaban_soal3."<br>";
    // echo $jawaban_a_soal3."<br>";
    // echo $jawaban_b_soal3."<br>";
    // echo $jawaban_c_soal3."<br>";
    // echo $jawaban_c_soal3."<br>";

    // echo $soal4."<br>";
    // // echo $gambar_soal4."<br>";
    // echo $jawaban_soal4."<br>";
    // echo $jawaban_a_soal4."<br>";
    // echo $jawaban_b_soal4."<br>";
    // echo $jawaban_c_soal4."<br>";
    // echo $jawaban_c_soal4."<br>";

    // echo $soal5."<br>";
    // // echo $gambar_soal5."<br>";
    // echo $jawaban_soal5."<br>";
    // echo $jawaban_a_soal5."<br>";
    // echo $jawaban_b_soal5."<br>";
    // echo $jawaban_c_soal5."<br>";
    // echo $jawaban_c_soal5."<br>";

    // echo $soal6."<br>";
    // // echo $gambar_soal6."<br>";
    // echo $jawaban_soal6."<br>";
    // echo $jawaban_a_soal6."<br>";
    // echo $jawaban_b_soal6."<br>";
    // echo $jawaban_c_soal6."<br>";
    // echo $jawaban_c_soal6."<br>";

    // echo $soal7."<br>";
    // // echo $gambar_soal7."<br>";
    // echo $jawaban_soal7."<br>";
    // echo $jawaban_a_soal7."<br>";
    // echo $jawaban_b_soal7."<br>";
    // echo $jawaban_c_soal7."<br>";
    // echo $jawaban_c_soal7."<br>";

    // echo $soal8."<br>";
    // // echo $gambar_soal8."<br>";
    // echo $jawaban_soal8."<br>";
    // echo $jawaban_a_soal8."<br>";
    // echo $jawaban_b_soal8."<br>";
    // echo $jawaban_c_soal8."<br>";
    // echo $jawaban_c_soal8."<br>";

    // echo $soal9."<br>";
    // // echo $gambar_soal9."<br>";
    // echo $jawaban_soal9."<br>";
    // echo $jawaban_a_soal9."<br>";
    // echo $jawaban_b_soal9."<br>";
    // echo $jawaban_c_soal9."<br>";
    // echo $jawaban_c_soal9."<br>";

    // echo $soal10."<br>";
    // // echo $gambar_soal10."<br>";
    // echo $jawaban_soal10."<br>";
    // echo $jawaban_a_soal10."<br>";
    // echo $jawaban_b_soal10."<br>";
    // echo $jawaban_c_soal10."<br>";
    // echo $jawaban_c_soal10."<br>";

}
?>