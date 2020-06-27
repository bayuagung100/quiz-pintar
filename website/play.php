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
            if ($data['status']=='waiting') {
                header('location:'.url("join/").$code );
            } elseif ($data['status']=='end') {
                header('location:'.url(""));
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
            if ($data['status']=='waiting') {
                header('location:'.url("join/").$code );
            } elseif ($data['status']=='end') {
                header('location:'.url(""));
            } else {
        ?>
                <!-- sisi murid -->
                <section id="section_murid" class="play-section-murid" >
                    <div class="menu-bar">
                        <div class="soal"><h3><span style="margin-right: 5px;">Soal: <span><span id="texSoal">1/10</span></h3></div>
                        <div class="rank"><h3><img src="<?php echo url("img/icons/medal.png");?>" style="max-width:24px;margin-right:5px"><span id="InGameMuridRank">0</span></h3></div>
                        <div class="point"><h3><i class='fas fa-coins' style='font-size:24px;margin-right:10px;color:yellow'></i><span id="InGameMuridPoint">0</span></h3></div>
                    </div>
                    <div class="menu-time">
                        <div id="timeLeft" class="progress"></div>
                        <h3><span>Sisa waktu: </span><span id="time">01:00</span></h3>
                    </div>

                    <form id="isi_soal" method="post" action="" sesi="<?php echo $sesi;?>" id_quiz="<?php echo $data['id_quiz'];?>"  code="<?php echo $code;?>">
                    <?php
                        $cek_state = $mysqli->query("SELECT * FROM leaderboard_temp WHERE id_player='$sesi' ");
                        $data_cek = $cek_state->fetch_array();
                        $cek_progress = $data_cek['progress'];
                        $ex_cek_progress = explode('/', $cek_progress);
                        $cekState = $ex_cek_progress[0];
                        $cekState = $cekState+1;

                        $queryquiz = $mysqli->query("SELECT * FROM quiz WHERE id='$data[id_quiz]' ");
                        $dataquiz = $queryquiz->fetch_array();

                        $soal = $dataquiz['soal'];
                        $gambar_soal = $dataquiz['gambar_soal'];
                        $jawaban_soal = $dataquiz['jawaban_soal'];
                        $jawaban_a_soal = $dataquiz['jawaban_a_soal'];
                        $jawaban_b_soal = $dataquiz['jawaban_b_soal'];
                        $jawaban_c_soal = $dataquiz['jawaban_c_soal'];
                        $jawaban_d_soal = $dataquiz['jawaban_d_soal'];

                        $ex_gambar_soal = explode(';', $gambar_soal);
                        $ex_soal = explode(';', $soal);
                        $ex_jawaban_soal = explode(';', $jawaban_soal);
                        $ex_jawaban_a_soal = explode(';', $jawaban_a_soal);
                        $ex_jawaban_b_soal = explode(';', $jawaban_b_soal);
                        $ex_jawaban_c_soal = explode(';', $jawaban_c_soal);
                        $ex_jawaban_d_soal = explode(';', $jawaban_d_soal);
                        $count_soal = count($ex_soal);
                        // 
                        echo $cekState;
                        if ($cekState == 1) {
                            $i = $cekState;
                            $state="";
                        } elseif ($cekState == 2) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal2').show();
                            $('#nextSoal3').show();
                            $('#texSoal').text('2/10');
                            ";
                        } elseif ($cekState == 3) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal3').show();
                            $('#nextSoal4').show();
                            $('#texSoal').text('3/10');
                            ";
                        } elseif ($cekState == 4) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal4').show();
                            $('#nextSoal5').show();
                            $('#texSoal').text('4/10');
                            ";
                        } elseif ($cekState == 5) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal5').show();
                            $('#nextSoal6').show();
                            $('#texSoal').text('5/10');
                            ";
                        } elseif ($cekState == 6) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal6').show();
                            $('#nextSoal7').show();
                            $('#texSoal').text('6/10');
                            ";
                        } elseif ($cekState == 7) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal7').show();
                            $('#nextSoal8').show();
                            $('#texSoal').text('7/10');
                            ";
                        } elseif ($cekState == 8) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal8').show();
                            $('#nextSoal9').show();
                            $('#texSoal').text('8/10');
                            ";
                        } elseif ($cekState == 9) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal9').show();
                            $('#nextSoal10').show();
                            $('#texSoal').text('9/10');
                            ";
                        } elseif ($cekState == 10) {
                            $i = $cekState;
                            $state="
                            $('#kumpulan_soal10').show();
                            $('#simpan-jawaban').show();
                            $('#texSoal').text('10/10');
                            ";
                        }
                        for ($i; $i <= $count_soal; $i++) { 
                            
                            $s = $i-1;
                            echo"
                            <script>
                            $(document).ready(function () {
                                $state
                            })
                            </script>
                            ";
                            
                        echo'
                            <div id="kumpulan_soal'.$i.'">
                                <div class="container-soal">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        ';
                                        if ($ex_gambar_soal[$s]!=null) {
                                            echo '
                                            <div class="text-center">
                                                <img src="'.url("images").'/'.$ex_gambar_soal[$s].'" style="width: 100%;max-width: 600px;height: auto;">
                                            </div>
                                            ';
                                        }
                                        echo '
                                            <h3>'.$ex_soal[$s].'</h3>
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
                <section id="section_show_lederboard" class="play-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 play-player">
                                <button class="btn-leaderboard"><div class="leaderboard-text"><img src="<?php echo url("img/icons/medal.png");?>" style="max-width:42px"> Leaderboard</div></button>
                                <div class="container">
                                    <div class="online">
                                        <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (<span id="show_lederboard_count"></span>)</h4>
                                    </div>
                                    <div class="tingkat">
                                        <h4><?php $query_tingkat = $mysqli->query("SELECT * FROM quiz WHERE id='$data[id_quiz]' "); $data_tingkat = $query_tingkat->fetch_array(); echo $data_tingkat['tingkat'];?></h4>
                                    </div>

                                    <div class="container-card" id="show_lederboard" class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    $(document).ready(function () {
                        InGameMurid(<?php echo $code;?>, <?php echo $sesi;?>);

                        // var interval = setInterval(function() {
                        //     var timer = val.batas.split(':');
                        //     //by parsing integer, I avoid all extra string processing
                        //     var minutes = parseInt(timer[0], 10);
                        //     var seconds = parseInt(timer[1], 10);
                        //     --seconds;
                            
                        //     minutes = (seconds < 0) ? --minutes : minutes;
                        //     // if (minutes < 0) clearInterval(interval);
                        //     seconds = (seconds < 0) ? 59 : seconds;
                        //     seconds = (seconds < 10) ? '0' + seconds : seconds;
                        //     //minutes = (minutes < 10) ?  minutes : minutes;
                        //     ref.update(
                        //         {
                        //             batas: minutes+":"+seconds,
                        //             // panjang: width
                        //         }
                        //     )
                        //     $('#time').html(minutes + ':' + seconds);
                        //     // time = minutes + ':' + seconds;
                        // }, 1000);
                        var ref = firebase.database().ref('timer/' + 386605);
                        ref.once('value', function(snapshot) {
                            static_val = snapshot.val(); 
                            staic_batas = static_val.batas;
                            
                            
                            
                            
                        })
                         
                         
                        var elem = document.getElementById("timeLeft");
                        

                        var interval = setInterval(function() {
                            ref.once('value', function(snapshot) {
                                var key = snapshot.key;
                                val = snapshot.val(); 
                                batas = val.batas;
                                panjang = val.panjang;
                                var timer = batas.split(':');
                                var minutes = parseInt(timer[0], 10);
                                var seconds = parseInt(timer[1], 10);
                                --seconds;
                                minutes = (seconds < 0) ? --minutes : minutes;
                                if (minutes < 0) clearInterval(interval);
                                seconds = (seconds < 0) ? 59 : seconds;
                                seconds = (seconds < 10) ? '0' + seconds : seconds;
                                //minutes = (minutes < 10) ?  minutes : minutes;
                                $('#time').html(minutes + ':' + seconds);
                                // console.log(val);
                                // console.log(minutes);
                                // console.log(seconds);
                                // console.log(val);
                                // console.log(" waktu: "+batas);
                                // console.log(" width: "+panjang);
                                pisah = staic_batas.split(':');
                                min = pisah[0];
                                sec = pisah[1];
                                detik = min*60;
                                j = 100/detik;
                                k = 250/detik;
                                width = panjang;
                                point = 2500;
                                ttl_soal = 10;
                                // var id = setInterval(frame, 1000);
                                // function frame() {
                                    if (width <= 0) {
                                        clearInterval(id);
                                        Swal.fire({
                                            title: 'Waktu Sudah Habis!',
                                        });
                                        $('#section_murid').hide();
                                        $('#section_show_lederboard').show();
                                        ShowLeaderboardCount(<?php echo $code;?>);
                                        ShowLeaderboard(<?php echo $code;?>);
                                    } else {
                                        width=width-j;
                                        point=point-k;
                                        console.log("sisa width: "+width);
                                        // console.log("sisa point (bulat): "+parseInt(point));
                                        // console.log("sisa point: "+point);
                                        elem.style.width = width + "%";
                                    }
                                // }

                                // ref.update(
                                //     {
                                //         batas: minutes+":"+seconds,
                                //         panjang: width
                                //     }
                                // )
                                // ref.once('value', function(snapshot) {
                                //     var key = snapshot.key;
                                //     value = snapshot.val(); 
                                //     console.log(value);
                                //     console.log("sisa waktu: "+batas);
                                //     console.log("sisa width: "+width);
                                // })
                                
                            });
                        },1000);

                        // var time = $('#time').text(val.batas);
                        
                        
                        
                        
                        // ttl_soal = 10;
                        // var id = setInterval(frame, 1000);
                        // function frame() {
                        //     ref.once('value', function(snapshot) {
                        //         var key = snapshot.key;
                        //         val2 = snapshot.val(); 
                        //         batas2 = val2.batas;
                                

                               
                                
                        //         ref.update(
                        //             {
                        //                 // batas: minutes+":"+seconds,
                        //                 panjang: width
                        //             }
                        //         )
                        //         ref.once('value', function(snapshot) {
                        //             var key2 = snapshot.key;
                        //             value2 = snapshot.val(); 
                        //             console.log(value2);
                        //         })
                        //     });
                        // }

                        // ref.on('value', function(snapshot) {
                        //     var key = snapshot.key;
                        //     val = snapshot.val(); 
                        //     console.log(val) ;
                        // })
                        // var elem = document.getElementById("timeLeft");
                        // // width = asd;
                        // point = 2500;
                        // //countdown id time
                        // var interval = setInterval(frame, 1000);

                        // function frame() {
                            // var timer = val.batas.split(':');
                            
                        //     //by parsing integer, I avoid all extra string processing
                        //     var minutes = parseInt(timer[0], 10);
                        //     var seconds = parseInt(timer[1], 10);
                        //     --seconds;
                            
                        //     minutes = (seconds < 0) ? --minutes : minutes;
                        //     if (minutes < 0) clearInterval(interval);
                        //     seconds = (seconds < 0) ? 59 : seconds;
                        //     seconds = (seconds < 10) ? '0' + seconds : seconds;
                        //     //minutes = (minutes < 10) ?  minutes : minutes;
                        //     $('#time').html(minutes + ':' + seconds);
                            
                        //     // time = minutes + ':' + seconds;
                        //     var min = timer[0];
                        //     var sec = timer[1];
                        //     var detik = min*60;
                        //     var j = 100/detik;
                        //     var k = 250/detik;
                        //     console.log(detik+":"+j+":"+k);
                        //     if (width <= 0) {
                        //         clearInterval(interval);
                        //         Swal.fire({
                        //             title: 'Waktu Sudah Habis!',
                        //         });
                        //         $('#section_murid').hide();
                        //         $('#section_show_lederboard').show();
                        //         ShowLeaderboardCount(<?php echo $code;?>);
                        //         ShowLeaderboard(<?php echo $code;?>);
                        //     } else {
                        //         width=width-j;
                        //         point=point-k;
                        //         // console.log("sisa waktu: "+width);
                        //         // console.log("sisa point (bulat): "+parseInt(point));
                        //         // console.log("sisa point: "+point);
                        //         elem.style.width = width + "%";
                        //     }
                        //     ref.update(
                        //         {
                        //             batas: minutes+":"+seconds,
                        //             panjang: width
                        //         }
                        //     )
                        //     console.log(val.batas);
                        //     console.log(width);
                        // }


                        // var time = $('#time').text();
                        // var pisah = time.split(':');
                        // var min = pisah[0];
                        // console.log(min);
                        // var sec = pisah[1];
                        // var detik = min*60;
                        // var j = 100/detik;
                        // var k = 250/detik;
                        // var elem = document.getElementById("timeLeft");
                        // width = 100;
                        // point = 2500;
                        // ttl_soal = 10;
                        // var id = setInterval(frame, 1000);
                        // function frame() {
                        //     if (width <= 0) {
                        //         clearInterval(id);
                        //         Swal.fire({
                        //             title: 'Waktu Sudah Habis!',
                        //         });
                        //         $('#section_murid').hide();
                        //         $('#section_show_lederboard').show();
                        //         ShowLeaderboardCount(<?php echo $code;?>);
                        //         ShowLeaderboard(<?php echo $code;?>);
                        //     } else {
                        //         width=width-j;
                        //         point=point-k;
                        //         console.log("sisa waktu: "+width);
                        //         // console.log("sisa point (bulat): "+parseInt(point));
                        //         // console.log("sisa point: "+point);
                        //         elem.style.width = width + "%";
                        //     }
                        // }
                        // var interval = setInterval(function() {
                        //     var timer = time.split(':');
                        //     //by parsing integer, I avoid all extra string processing
                        //     var minutes = parseInt(timer[0], 10);
                        //     var seconds = parseInt(timer[1], 10);
                        //     --seconds;
                            
                        //     minutes = (seconds < 0) ? --minutes : minutes;
                        //     if (minutes < 0) clearInterval(interval);
                        //     seconds = (seconds < 0) ? 59 : seconds;
                        //     seconds = (seconds < 10) ? '0' + seconds : seconds;
                        //     //minutes = (minutes < 10) ?  minutes : minutes;
                        //     $('#time').html(minutes + ':' + seconds);
                        //     time = minutes + ':' + seconds;
                        // }, 1000);

                    });
                </script>
<?php
            }
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