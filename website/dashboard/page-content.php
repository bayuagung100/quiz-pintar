<?php

$content = isset($_GET['pages']) ? $_GET['pages'] : '';
$kosong = true;
//Menampilkan file sesuai nilai $content
$page = array('test','buat-quiz');
foreach($page as $pg){
	if($content == $pg and $kosong){
		include 'pages/'.$pg.'.php';
		$kosong = false;
	}
}

//Pesan jika kosong
if($kosong){
	echo '
	<section class="content-header">
        <div class="container-fluid"> 
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 dashboard text-center">
                <h2>Cari game quiz yang kamu inginkan!</h2>
                <form class="dashboard-form">
                    <input type="search" placeholder="Cari Quiz mengenai topik apa saja">
                    <button class="site-btn">Cari <img src="img/icons/double-arrow.png" alt="#"></button>
                </form>
                </div>
            </div>
        </div>
    </section>
	';
}	
?>