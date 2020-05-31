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
            if ($data['status']!='play') {
                header('location:'.url("join/").$code );
            } else {
?>
                <!-- sisi guru -->
                <section class="play-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 play-player">
                                <button class="btn-leaderboard"><div class="leaderboard-text"><img src="<?php echo url("img/icons/medal.png");?>" style="max-width:42px"> Leaderboard</div></button>
                                <div class="container">
                                    <div class="online">
                                        <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (<span id="count_player_play"></span>)</h4>
                                    </div>
                                    <div class="tingkat">
                                        <h4><?php $query_tingkat = $mysqli->query("SELECT * FROM quiz WHERE id='$data[id_quiz]' "); $data_tingkat = $query_tingkat->fetch_array(); echo $data_tingkat['tingkat'];?></h4>
                                    </div>
                                    <div class="container-card" id="player_played" class="row" quiz="<?php echo $data['id_quiz'];?>"  room="<?php echo $code;?>">
                                    <script>
                                        $(document).ready(function () {
                                            CountInGame(<?php echo $code;?>);
                                            InGame(<?php echo $code;?>);
                                        });
                                    </script>
                                        <!-- <div class="col-sm-12" >
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
                                        </div> -->
                                    </div>
                                </div>
                                <button class="btn-endgame"><div id="end_game" class="endgame-text">End Game</div></button>
                            </div>
                        </div> 
                    </div>
                </section>
        <?php
            }
        } else {
            
            
        ?>
            <!-- sisi murid -->
            <section class="play-section-murid" >
                <div class="menu-bar">
                    <div class="soal"><h3>Soal: 1/10</h3></div>
                    <div class="rank"><h3><img src="<?php echo url("img/icons/medal.png");?>" style="max-width:24px;margin-right:5px"><span id="InGameMuridRank">0</span></h3></div>
                    <div class="point"><h3><i class='fas fa-coins' style='font-size:24px;margin-right:10px;color:yellow'></i><span id="InGameMuridPoint">0</span></h3></div>
                </div>
                <div class="menu-time">
                    <div id="timeLeft" class="progress"></div>
                    <h3><span>Sisa waktu: </span><span id="time">60:00</span></h3>
                </div>

                <form id="isi_soal" method="post" action="" sesi="<?php echo $sesi;?>" id_quiz="<?php echo $data['id_quiz'];?>" >
                <?php
                    $queryquiz = $mysqli->query("SELECT * FROM quiz WHERE id='$data[id_quiz]' ");
                    $dataquiz = $queryquiz->fetch_array();

                    $soal = $dataquiz['soal'];
                    $gambar_soal = $dataquiz['gambar_soal'];
                    $jawaban_soal = $dataquiz['jawaban_soal'];
                    $jawaban_a_soal = $dataquiz['jawaban_a_soal'];
                    $jawaban_b_soal = $dataquiz['jawaban_b_soal'];
                    $jawaban_c_soal = $dataquiz['jawaban_c_soal'];
                    $jawaban_d_soal = $dataquiz['jawaban_d_soal'];

                    $ex_soal = explode(';', $soal);
                    $ex_jawaban_soal = explode(';', $jawaban_soal);
                    $ex_jawaban_a_soal = explode(';', $jawaban_a_soal);
                    $ex_jawaban_b_soal = explode(';', $jawaban_b_soal);
                    $ex_jawaban_c_soal = explode(';', $jawaban_c_soal);
                    $ex_jawaban_d_soal = explode(';', $jawaban_d_soal);
                    $count_soal = count($ex_soal);
                    for ($i=1; $i <= $count_soal; $i++) { 
                        $s = $i-1;
                    echo'
                        <div id="kumpulan_soal'.$i.'">
                            <div class="container-soal">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>'.$ex_soal["$s"].'</h3>
                                    </div>
                                </div> 
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>
                                            <input type="radio" name="jawabanSoal'.$i.'" value="A" required>
                                            <div class="container-jawabanA">
                                                <div class="jawabanA"><h3>A</h3></div>
                                                <h4>'.$ex_jawaban_a_soal["$s"].'</h4>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <input type="radio" name="jawabanSoal'.$i.'" value="B" required>
                                            <div class="container-jawabanB">
                                                <div class="jawabanB"><h3>B</h3></div>
                                                <h4>'.$ex_jawaban_b_soal["$s"].'</h4>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <input type="radio" name="jawabanSoal'.$i.'" value="C" required>
                                            <div class="container-jawabanC">
                                                <div class="jawabanC"><h3>C</h3></div>
                                                <h4>'.$ex_jawaban_c_soal["$s"].'</h4>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <input type="radio" name="jawabanSoal'.$i.'" value="D" required>
                                            <div class="container-jawabanD">
                                                <div class="jawabanD"><h3>D</h3></div>
                                                <h4>'.$ex_jawaban_d_soal["$s"].'</h4>
                                            </div>
                                        </label>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    ';

                        if ($i == 1) {
                            echo '
                            <button type="button" id="nextSoal2" class="btn-soal-next"><div class="btn-soal-next-text">Next</div></button>
                            ';
                        } elseif ($i == 10) {
                            echo '
                            <button type="submit" id="simpan-jawaban" class="btn-soal-next" name="simpan-jawaban"><div class="btn-soal-next-text">Simpan</div></button>
                            ';
                        } else {
                            $next = $i + 1;
                            echo '
                            <button type="button" id="nextSoal'.$next.'" class="btn-soal-next"><div class="btn-soal-next-text">Next</div></button>
                            ';
                        }

                    }
                ?>
                
                </form>
            </section>
            <script>
                $(document).ready(function () {
                    InGameMurid(<?php echo $code;?>, <?php echo $sesi;?>);

                    var time = $('#time').text();
                    var pisah = time.split(':');
                    var min = pisah[0];
                    var sec = pisah[1];
                    var detik = min*60;
                    var j = 100/detik;
                    var k = 250/detik;
                    var elem = document.getElementById("timeLeft");
                     width = 100;
                     point = 2500;
                     ttl_soal = 10;
                    var id = setInterval(frame, 1000);
                    function frame() {
                        if (width <= 0) {
                            clearInterval(id);
                            alert("next");
                            InGameMuridUpdate(<?php echo $code;?>, <?php echo $sesi;?>, '1/10');
                        } else {
                            width=width-j;
                            point=point-k;
                            // console.log("sisa waktu: "+width);
                            // console.log("sisa point (bulat): "+parseInt(point));
                            // console.log("sisa point: "+point);
                            elem.style.width = width + "%";
                        }
                    }

                    //countdown id time
                    var interval = setInterval(function() {
                        var timer = time.split(':');
                        //by parsing integer, I avoid all extra string processing
                        var minutes = parseInt(timer[0], 10);
                        var seconds = parseInt(timer[1], 10);
                        --seconds;
                        minutes = (seconds < 0) ? --minutes : minutes;
                        if (minutes < 0) clearInterval(interval);
                        seconds = (seconds < 0) ? 59 : seconds;
                        seconds = (seconds < 10) ? '0' + seconds : seconds;
                        //minutes = (minutes < 10) ?  minutes : minutes;
                        $('#time').html(minutes + ':' + seconds);
                        time = minutes + ':' + seconds;
                    }, 1000);
                });
            </script>
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