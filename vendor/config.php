
 <?php

//localpc
$servername = "localhost";
$username = "root";
$password = "";
$database = "quispintar";
 
// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);


//Menentukan timezone //
date_default_timezone_set('Asia/Jakarta'); 

//Membuat variabel yang menyimpan nilai waktu //
$nama_hari 	= array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari		= date("w");
$hari_ini 	= $nama_hari[$hari];

$tgl_sekarang = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");

$tanggal 	= date("Y-m-d");  
$jam 		= date("H:i:s");

$query = $mysqli->query("SELECT * FROM setting");
$set = $query->fetch_array();

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit)).' ...';
}	
function convert_seo($kata) {
    $simbol = array ('-','/','\\',',','.','#',':',';','\',','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	
	//Menghilangkan simbol pada array $simbol
    $kata = str_replace($simbol, '', $kata); 
	//Ubah ke huruf kecil dan mengganti spasi dengan (-)
    $kata = strtolower(str_replace(' ', '-', $kata)); 
    
	return $kata;
}

?> 
