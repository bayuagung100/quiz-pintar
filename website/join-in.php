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
            if ($data['status']=='play') {
                header('location:'.url("play/").$code );
            } else {
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
                                    <i id="copy-code" data-clipboard-target="#clipboard-code" class="fa fa-clipboard icon"> copy</i>
                                </div>
                            </div>
                            <div class="col-sm-12 join-player">
                                <button class="btn-mulai"><div id="mulai_game" class="mulai-text" >Mulai</div></button>
                                <div class="container">
                                    <div class="online">
                                        <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (<span id="count_player" rc="<?php echo $code;?>"></span>)</h4>
                                    </div>
                                    <div class="tingkat">
                                        <h4><?php $query_tingkat = $mysqli->query("SELECT * FROM quiz WHERE id='$data[id_quiz]' "); $data_tingkat = $query_tingkat->fetch_array(); echo $data_tingkat['tingkat'];?></h4>
                                    </div>
                                    <div id="player_joined" class="row" style="padding-top:20px" quiz="<?php echo $data['id_quiz'];?>"  room="<?php echo $code;?>">
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </section>
                <script>
                    $(document).ready(function () {
                        NotifIn(<?php echo $code;?>);
                    });
                </script>
        <?php
            }
        } else {
            $cekarray = $data['id_player'];
            $ex = array_filter(explode(";", $cekarray));

            $time = date('h:i:s');
            
            if (!in_array($sesi, $ex)) {
                $cekarray = [$data['id_player'],$sesi];
                $imp = implode(";", $cekarray);
                var_dump($cekarray);
                $update = $mysqli->query("UPDATE join_temp SET id_player='$imp' WHERE code_room='$code' ");
                if ($update) {
                    echo "
                    <script>
                        $(document).ready(function () {
                            InsertNotif('$code','$sesi','$time','$nama');
                        });
                    </script>
                    ";
                }
                
                
            }
            echo "
            <script>
                $(document).ready(function () {
                    NotifOut($code);
                });
            </script>
            ";

            $query2 = $mysqli->query("SELECT * FROM user WHERE id='$sesi' ");
            $data2 = $query2->fetch_array();

            $id = $data2['id'];
            $nama = $data2['nama'];
            $avatar = $data2['avatar'];

            

            if ($avatar == null) {
                $gambar = '<img src="'.str_replace("ajax/room/","",url("img/avatar/no-image2.png")).'" style="width:125px"/>';
            } else {
                $gambar = '<img src="'.str_replace("ajax/room/","",url("img/avatar/")).$avatar.'" style="width:150px"/>';
            }

            echo"
            <script>
            $(document).ready(function () {
                var lastid = null;
                var lastid_out = null;
                var status_player = setInterval(status, 1000);
                

                function status(){
                    $.ajax({
                        type: 'POST',
                        url: '".url('ajax/room/cek-status-join.php')."',
                        data: {
                            id : ".$sesi.",
                            id_quiz: ".$data['id_quiz'].",
                            code: ".$code.",
                            name: '".$nama."',
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.data.length != 0) {
                                if(response.data[0].status_player=='kick'){
                                   
                                        clearInterval(status_player);
                                        Swal.fire({
                                            icon: response.data[0].icon,
                                            title: response.data[0].title,
                                            text: response.data[0].text,
                                            onAfterClose: () => {
                                                window.location.href = response.data[0].url;
                                            }
                                        });
                                    
                                    
                                } else if (response.data[0].status_room=='play'){
                                    clearInterval(status_player);
                                    let timerInterval
                                    Swal.fire({
                                        title: 'Game Dimulai!',
                                        html: 'Dalam waktu <b></b> detik.',
                                        timer: 5000,
                                        timerProgressBar: true,
                                        onBeforeOpen: () => {
                                            Swal.showLoading()
                                            timerInterval = setInterval(() => {
                                            const content = Swal.getContent()
                                            if (content) {
                                                const b = content.querySelector('b')
                                                if (b) {
                                                b.textContent = Math.ceil(swal.getTimerLeft() / 1000)
                                                }
                                            }
                                            }, 100)
                                        },
                                        onClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                        }).then((result) => {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            window.location.href = response.data[0].url;
                                        }
                                    });
                                } 
                            }
                        }
                    });
                }
                

                
            });
            </script>
            ";

        ?>
            <!-- sisi murid -->
            <section class="join-section-murid">
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
include "footer-join.php"; 

?>