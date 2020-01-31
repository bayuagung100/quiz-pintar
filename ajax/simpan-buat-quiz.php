<?php
include "../vendor/config.php";
$id_pembuat = $_POST['id_pembuat'];
$judul = $_POST['judul'];
$gambar = $_POST['gambar'];
$kategori = $_POST['kategori'];
$tingkat = $_POST['tingkat'];
$deskripsi = $_POST['deskripsi'];

$soal1 = $_POST['soal1'];
// $gambar_soal1 = $_POST['gambar_soal1'];
$jawaban_soal1 = $_POST['jawaban_soal1'];
$jawaban_a_soal1 = $_POST['jawaban_a_soal1'];
$jawaban_b_soal1 = $_POST['jawaban_b_soal1'];
$jawaban_c_soal1 = $_POST['jawaban_c_soal1'];
$jawaban_d_soal1 = $_POST['jawaban_d_soal1'];

$soal2 = $_POST['soal2'];
// $gambar_soal2 = $_POST['gambar_soal2'];
$jawaban_soal2 = $_POST['jawaban_soal2'];
$jawaban_a_soal2 = $_POST['jawaban_a_soal2'];
$jawaban_b_soal2 = $_POST['jawaban_b_soal2'];
$jawaban_c_soal2 = $_POST['jawaban_c_soal2'];
$jawaban_d_soal2 = $_POST['jawaban_d_soal2'];

$soal3 = $_POST['soal3'];
// $gambar_soal3 = $_POST['gambar_soal3'];
$jawaban_soal3 = $_POST['jawaban_soal3'];
$jawaban_a_soal3 = $_POST['jawaban_a_soal3'];
$jawaban_b_soal3 = $_POST['jawaban_b_soal3'];
$jawaban_c_soal3 = $_POST['jawaban_c_soal3'];
$jawaban_d_soal3 = $_POST['jawaban_d_soal3'];

$soal4 = $_POST['soal4'];
// $gambar_soal4 = $_POST['gambar_soal4'];
$jawaban_soal4 = $_POST['jawaban_soal4'];
$jawaban_a_soal4 = $_POST['jawaban_a_soal4'];
$jawaban_b_soal4 = $_POST['jawaban_b_soal4'];
$jawaban_c_soal4 = $_POST['jawaban_c_soal4'];
$jawaban_d_soal4 = $_POST['jawaban_d_soal4'];

$soal5 = $_POST['soal5'];
// $gambar_soal5 = $_POST['gambar_soal5'];
$jawaban_soal5 = $_POST['jawaban_soal5'];
$jawaban_a_soal5 = $_POST['jawaban_a_soal5'];
$jawaban_b_soal5 = $_POST['jawaban_b_soal5'];
$jawaban_c_soal5 = $_POST['jawaban_c_soal5'];
$jawaban_d_soal5 = $_POST['jawaban_d_soal5'];

$soal6 = $_POST['soal6'];
// $gambar_soal6 = $_POST['gambar_soal6'];
$jawaban_soal6 = $_POST['jawaban_soal6'];
$jawaban_a_soal6 = $_POST['jawaban_a_soal6'];
$jawaban_b_soal6 = $_POST['jawaban_b_soal6'];
$jawaban_c_soal6 = $_POST['jawaban_c_soal6'];
$jawaban_d_soal6 = $_POST['jawaban_d_soal6'];

$soal7 = $_POST['soal7'];
// $gambar_soal7 = $_POST['gambar_soal7'];
$jawaban_soal7 = $_POST['jawaban_soal7'];
$jawaban_a_soal7 = $_POST['jawaban_a_soal7'];
$jawaban_b_soal7 = $_POST['jawaban_b_soal7'];
$jawaban_c_soal7 = $_POST['jawaban_c_soal7'];
$jawaban_d_soal7 = $_POST['jawaban_d_soal7'];

$soal8 = $_POST['soal8'];
// $gambar_soal8 = $_POST['gambar_soal8'];
$jawaban_soal8 = $_POST['jawaban_soal8'];
$jawaban_a_soal8 = $_POST['jawaban_a_soal8'];
$jawaban_b_soal8 = $_POST['jawaban_b_soal8'];
$jawaban_c_soal8 = $_POST['jawaban_c_soal8'];
$jawaban_d_soal8 = $_POST['jawaban_d_soal8'];

$soal9 = $_POST['soal9'];
// $gambar_soal9 = $_POST['gambar_soal9'];
$jawaban_soal9 = $_POST['jawaban_soal9'];
$jawaban_a_soal9 = $_POST['jawaban_a_soal9'];
$jawaban_b_soal9 = $_POST['jawaban_b_soal9'];
$jawaban_c_soal9 = $_POST['jawaban_c_soal9'];
$jawaban_d_soal9 = $_POST['jawaban_d_soal9'];

$soal10 = $_POST['soal10'];
// $gambar_soal10 = $_POST['gambar_soal10'];
$jawaban_soal10 = $_POST['jawaban_soal10'];
$jawaban_a_soal10 = $_POST['jawaban_a_soal10'];
$jawaban_b_soal10 = $_POST['jawaban_b_soal10'];
$jawaban_c_soal10 = $_POST['jawaban_c_soal10'];
$jawaban_d_soal10 = $_POST['jawaban_d_soal10'];


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
            soal1,
            jawaban_soal1,
            jawaban_a_soal1,
            jawaban_b_soal1,
            jawaban_c_soal1,
            jawaban_d_soal1
        )
        VALUES
        (
            '$id_pembuat',
            '$judul',
            '$gambar',
            '$kategori',
            '$tingkat',
            '$deskripsi',
            '$soal1',
            '$jawaban_soal1',
            '$jawaban_a_soal1',
            '$jawaban_b_soal1',
            '$jawaban_c_soal1',
            '$jawaban_d_soal1'

        )
    ");

    if ($query) {
        echo "sukses";
    } else {
        echo "gagal";
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