<?php
include "header.php"; 
if (isset($_SESSION['id'])){
    $sesi =  $_SESSION['id'];
    $role =  $_SESSION['role'];
    $nama = $_SESSION['nama'];
    $avatar = $_SESSION['avatar'];
} else {
    $sesi =  null;
    $role =  null;
}
$code = $_GET['code'];
$query = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$code' ");
$data =$query->fetch_array();
$cek = $query->num_rows;
if ($cek>0) {
    
?>
<div class="header-join">
    <div class="header-bar-join d-flex">
        <a href="#" class="site-logo">
            <img src="<?php echo url(""); ?>/img/quiz-pintar.png" alt="">
        </a>
    </div>
</div>

<?php
    if ($sesi) {
        if ($role == "guru") {
?>
        <!-- sisi guru -->
        <section class="join-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center text-white">
                        <h5>Untuk memainkan game ini</h5>
                    </div>
                    <div class="col-sm-12 join-step text-center text-white">
                        <p><h5>1. Gunakan perangkat apapun untuk membuka</h5></p>
                        <div class="form-group">
                            <input id="clipboard" class="input-step" type="text" value="<?php echo url("join/").$code;?>" readonly> 
                            <i id="copy" data-clipboard-target="#clipboard" class="fa fa-clipboard icon"> copy</i>
                        </div>
                        <p>atau</p>
                        <p><h5>2. Bagikan Room Code</h5></p>
                        <div class="form-group">
                            <input id="clipboard-code" class="input-step-code" type="text" value="<?php echo $code;?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 join-player">
                        <button class="btn-mulai"><div class="mulai-text">Mulai</div></button>
                        <div class="container">
                            <div class="online">
                                <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (<span id="count_player" rc="<?php echo $code;?>"></span>)</h4>
                            </div>
                            <div id="player_joined" class="row" style="padding-top:20px"  room="<?php echo $code;?>">
                                
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <?php
        } else {
            // if ($data['id_player']!=null) {
                $cekarray = $data['id_player'];
                $ex = explode(";", $cekarray);
                
                if (!in_array($sesi, $ex)) {
                    $cekarray = [$data['id_player'],$sesi];
                    $imp = implode(";", $cekarray);
                    var_dump($imp);
                }
                
                // $sesi = [$data['id_player'],$sesi];
                // $imp = implode(";", $cekarray);
                // $update = $mysqli->query("UPDATE join_temp SET id_player='$id_pembuat' WHERE code_room='$code' ");
            // }
        ?>
            <!-- sisi murid -->
            <section class="join-section-murid">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center text-white">
                            <div><img src="<?php echo url('img/avatar/monster.png');?>" style="width:150px"/></div>
                            <h5>Menunggu game dimulai ...</h5>
                                <div class="card-waiting">
                                    <div class="name-player">
                                        <h3>asdasdasdasdasdasdas</h3>
                                    </div>
                                </div>
                        </div>
                    </div> 
                </div>
            </section>
<?php
        }
    } else {
        echo "
        <script>
        alert('Silahkan login terlebih dahulu'); 
        window.location = '".url('auth?login')."';
        </script>";
    }
} else {
    echo "tidak ada room";
}
include "footer-join.php"; 

?>