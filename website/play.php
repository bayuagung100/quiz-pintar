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
        if ($role == "guru" && $data['id_rm']==$sesi) {
?>
        <!-- sisi guru -->
        <section class="play-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 play-player">
                        <button class="btn-leaderboard"><div class="leaderboard-text"><i class='fas fa-medal'></i> Leaderboard</div></button>
                        <div class="container">
                            <div class="online">
                                <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (<span id="count_player_play" pc="<?php echo $code;?>"></span>)</h4>
                            </div>
                            <div class="container-card" id="player_played" class="row" quiz="<?php echo $data['id_quiz'];?>"  room="<?php echo $code;?>">
                                <div class="col-sm-12" >
                                    <div class="card-player-played">
                                        <div class="col-rank">Rank <div class="rank">1</div></div>
                                        
                                        <div class="col-img"><img src="http://localhost/quiz-pintar//img/quiz-pintar.png"/></div>
                                        
                                        <div class="col-name">
                                            <div class="name"><b>nama player asds asdsa asdsa</b></div>
                                        </div>

                                        <div class="col-progress">
                                            <div class="container-progressed">
                                                <div class="progressed">0/10</div>
                                            </div>
                                            <progress value="0" max="10"></progress>
                                        </div>

                                        <div class="col-point">Point <div class="point">1</div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn-endgame"><div class="endgame-text">End Game</div></button>
                    </div>
                </div> 
            </div>
        </section>
        <?php
        } else {
            
            
        ?>
            <!-- sisi murid -->
            <section class="play-section-murid">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center text-white">
                            <div><?php echo $gambar;?></div>
                            <h5>Menunggu game dimulai</h5>
                            <div class="spinner">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                            
                                <div class="card-waiting">
                                    <div class="name-player">
                                        <h3><?php echo $nama;?></h3>
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
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Silahkan login terlebih dahulu!',
            onAfterClose: () => {
                window.location.href = '".url('auth?login')."';
            }
          })
        
        </script>";
    }
} else {
    echo "tidak ada room";
}
include "footer-play.php"; 

?>