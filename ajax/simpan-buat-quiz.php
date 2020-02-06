<?php
include "../vendor/config.php";
// $id_pembuat = $_POST['id_pembuat'];
// $judul = $_POST['judul'];
// // $gambar = $_POST['gambar'];
// $kategori = $_POST['kategori'];
// $tingkat = $_POST['tingkat'];
// $deskripsi = $_POST['deskripsi'];

// $soal = [$_POST['soal1'], $_POST['soal2'], $_POST['soal3'], $_POST['soal4'], $_POST['soal5'], $_POST['soal6'], $_POST['soal7'], $_POST['soal8'], $_POST['soal9'], $_POST['soal10']];

// $jawaban_soal = [$_POST['jawaban_soal1'], $_POST['jawaban_soal2'], $_POST['jawaban_soal3'], $_POST['jawaban_soal4'], $_POST['jawaban_soal5'], $_POST['jawaban_soal6'], $_POST['jawaban_soal7'], $_POST['jawaban_soal8'], $_POST['jawaban_soal9'], $_POST['jawaban_soal10']];
// $jawaban_a_soal = [$_POST['jawaban_a_soal1'], $_POST['jawaban_a_soal2'], $_POST['jawaban_a_soal3'], $_POST['jawaban_a_soal4'], $_POST['jawaban_a_soal5'], $_POST['jawaban_a_soal6'], $_POST['jawaban_a_soal7'], $_POST['jawaban_a_soal8'], $_POST['jawaban_a_soal9'], $_POST['jawaban_a_soal10']];
// $jawaban_b_soal = [$_POST['jawaban_b_soal1'], $_POST['jawaban_b_soal2'], $_POST['jawaban_b_soal3'], $_POST['jawaban_b_soal4'], $_POST['jawaban_b_soal5'], $_POST['jawaban_b_soal6'], $_POST['jawaban_b_soal7'], $_POST['jawaban_b_soal8'], $_POST['jawaban_b_soal9'], $_POST['jawaban_b_soal10']];
// $jawaban_c_soal = [$_POST['jawaban_c_soal1'], $_POST['jawaban_c_soal2'], $_POST['jawaban_c_soal3'], $_POST['jawaban_c_soal4'], $_POST['jawaban_c_soal5'], $_POST['jawaban_c_soal6'], $_POST['jawaban_c_soal7'], $_POST['jawaban_c_soal8'], $_POST['jawaban_c_soal9'], $_POST['jawaban_c_soal10']];
// $jawaban_d_soal = [$_POST['jawaban_d_soal1'], $_POST['jawaban_d_soal2'], $_POST['jawaban_d_soal3'], $_POST['jawaban_d_soal4'], $_POST['jawaban_d_soal5'], $_POST['jawaban_d_soal6'], $_POST['jawaban_d_soal7'], $_POST['jawaban_d_soal8'], $_POST['jawaban_d_soal9'], $_POST['jawaban_d_soal10']];

// $imp_soal = implode(";", $soal);
// $imp_gambar_soal = implode(";", $gambar_soal);
// $imp_jawaban_soal = implode(";", $jawaban_soal);
// $imp_jawaban_a_soal = implode(";", $jawaban_a_soal);
// $imp_jawaban_b_soal = implode(";", $jawaban_b_soal);
// $imp_jawaban_c_soal = implode(";", $jawaban_c_soal);
// $imp_jawaban_d_soal = implode(";", $jawaban_d_soal);


// $gambar = $_FILES['file']['gambar'];
// $xgambar = explode('.', $nama);
// $ekstensigambar = strtolower(end($x));
// $filetmpgambar = $_FILES['file']['tmp_name'];



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


$imp_gambar_soal = implode(";", $gambar_soal);
$ex_gambar_soal = explode(';', $imp_gambar_soal);
$imp_tmp_gambar_soal = implode(";", $tmp_gambar_soal);
$ex_tmp_gambar_soal = explode(';', $imp_tmp_gambar_soal);

if ($gambar_soal) {
    for ($i=0; $i < count($ex_gambar_soal); $i++) { 
        if(move_uploaded_file($ex_tmp_gambar_soal[$i], '../images/'.$ex_gambar_soal[$i])){
            echo "sukses ".$i;
        } else {
            // var_dump($ex_error_gambar_soal[$i]);
            // copy($uploaded, $folderpath);
            echo"gagal ".$i;
        }
        
    }
  }else {
      echo "tidak ada";
  }
// if(isset($_POST["simpan-soal"])) {
//     global $mysqli;
//     $query = $mysqli->query("INSERT INTO quiz
//         (
//             id_pembuat,
//             judul,
//             gambar,
//             kategori,
//             tingkat,
//             deskripsi,
//             soal,
//             gambar_soal,
//             jawaban_soal,
//             jawaban_a_soal,
//             jawaban_b_soal,
//             jawaban_c_soal,
//             jawaban_d_soal
//         )
//         VALUES
//         (
//             '$id_pembuat',
//             '$judul',
//             '$gambar',
//             '$kategori',
//             '$tingkat',
//             '$deskripsi',
//             '$imp_soal',
//             '$imp_gambar_soal',
//             '$imp_jawaban_soal',
//             '$imp_jawaban_a_soal',
//             '$imp_jawaban_b_soal',
//             '$imp_jawaban_c_soal',
//             '$imp_jawaban_d_soal'

//         )
//     ");

//     if ($query) {
//         // $asd = explode(";", $imp_gambar_soal);
//         // if ($asd[0] == null) {
//         //     echo "sukses 1 tapi null" ;
//         // }else {
//         //     echo "sukses 1 ada data";
//         // }

//         // if ($asd[1] == null) {
//         //     echo "sukses 2 tapi null" ;
//         // }else {
//         //     echo "sukses 2 ada data";
//         // }

//         header('location:'.url('dashboard/quizku'));
//     } else {
//         echo "gagal " .$mysqli->error;
//     }

// }
?>