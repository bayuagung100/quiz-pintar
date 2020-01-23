<?php

$content = isset($_GET['pages']) ? $_GET['pages'] : 'dashboard';
$kosong = true;
//Menampilkan file sesuai nilai $content
$page = array('dashboard','buat-quiz','quizku');
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
                <div class="alert alert-warning">
                    <strong>Warning!</strong> Page not found.
                </div>
            </div>
        </div>
    </section>
	';
}	
?>