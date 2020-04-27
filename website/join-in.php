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
                        <button class="btn-mulai"><div class="mulai-text">Mulai</div></button>
                        <div class="container">
                            <div class="online">
                                <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (<span id="count_player" rc="<?php echo $code;?>"></span>)</h4>
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
                NotifIn();
                // function notif(){
                //     $.ajax({
                //         type: 'POST',
                //         url: '../ajax/room/notif-join.php',
                //         data: {
                //             code: room,
                //             last_id: lastid
                //         },
                //         dataType: 'json',
                //         success: function(response) {
                            
                //             if (response.data.length != 0) {
                //                 if (lastid == null) {
                //                     lastid = response.data[0].id_tables;
                //                     const Toast = Swal.mixin({
                //                         toast: true,
                //                         position: 'top-end',
                //                         showConfirmButton: false,
                //                         timer: 2000,
                //                         timerProgressBar: true,
                //                         onOpen: (toast) => {
                //                         toast.addEventListener('mouseenter', Swal.stopTimer)
                //                         toast.addEventListener('mouseleave', Swal.resumeTimer)
                //                         },
                //                     })
                //                     Toast.fire({
                //                         icon: response.data[0].icon,
                //                         title: response.data[0].title,
                //                     })
                //                 } else if (lastid < response.data[0].id_tables) {
                //                     lastid = response.data[0].id_tables;
                //                     const Toast = Swal.mixin({
                //                         toast: true,
                //                         position: 'top-end',
                //                         showConfirmButton: false,
                //                         timer: 2000,
                //                         timerProgressBar: true,
                //                         onOpen: (toast) => {
                //                         toast.addEventListener('mouseenter', Swal.stopTimer)
                //                         toast.addEventListener('mouseleave', Swal.resumeTimer)
                //                         },
                //                     })
                //                     Toast.fire({
                //                         icon: response.data[0].icon,
                //                         title: response.data[0].title,
                //                     })
                //                 }
                //             }
                                
                //         }
                //     });
                // }

            });
        </script>
        <?php
        } else {
            $cekarray = $data['id_player'];
            $ex = explode(";", $cekarray);

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
                            InsertNotif('$sesi','$time','$nama');
                            
                        });
                    </script>
                    ";
                    // $insertnotif = $mysqli->query("INSERT INTO notif_temp (join_temp_id, user_id) VALUES ('$code', '$sesi') ");
                    // if ($insertnotif) {
                    //     echo "
                    //     <script>
                    //     Swal.fire(
                    //         'Berhasil Gabung Game',
                    //         'Silahkan tunggu sampai game dimulai ...',
                    //         'success'
                    //     )
                    //     </script>
                    //     ";
                    // }
                }
                
                
            }
            echo "
            <script>
                $(document).ready(function () {
                    NotifOut();
                });
            </script>
            ";

            // if ($sesi) {
            //     echo "
            //     <script>
            //         $(document).ready(function () {
            //             NotifOut(false);
            //         });
            //     </script>
            //     ";
            // }else{
            //     echo "
            //     <script>
            //         $(document).ready(function () {
            //             NotifOut();
            //         });
            //     </script>
            //     ";
            // }
            
            // if(end($ex)!=$sesi){
            //     var_dump($ex);
            //     echo "
            //         <script>
            //         const Toast = Swal.mixin({
            //             toast: true,
            //             position: 'top-end',
            //             showConfirmButton: false,
            //             timer: 10000,
            //             timerProgressBar: true,
            //             onOpen: (toast) => {
            //             toast.addEventListener('mouseenter', Swal.stopTimer)
            //             toast.addEventListener('mouseleave', Swal.resumeTimer)
            //             }
            //         })
            //         Toast.fire({
            //             icon: 'success',
            //             title: 'Signed in successfully'
            //         })
                    
            //         </script>
            //         ";
            // }

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

                function notif2(){
                    $.ajax({
                        type: 'POST',
                        url: '".url('ajax/room/notif-join.php')."',
                        data: {
                            code: '".$code."',
                            last_id: lastid,
                            lastid_out: lastid_out
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(lastid);
                            console.log(response.data[0]);
                            if (response.data.length != 0) {
                                if (lastid == null) {
                                    lastid = response.data[0].id_tables;
                                    if(response.data[0].user_id != ".$sesi."){
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            timerProgressBar: true,
                                            onOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            
                                            },
                                        })
                                        Toast.fire({
                                            icon: response.data[0].icon,
                                            title: response.data[0].title,
                                            
                                        })
                                    }
                                } else if (lastid < response.data[0].id_tables) {
                                    lastid = response.data[0].id_tables;
                                    if(response.data[0].user_id != ".$sesi."){
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            timerProgressBar: true,
                                            onOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            
                                            },
                                        })
                                        Toast.fire({
                                            icon: response.data[0].icon,
                                            title: response.data[0].title,
                                            
                                        })
                                    }
                                }  else if (response.data[0].id_out != null) {
                                    lastid = response.data[0].id_tables;
                                    lastid_out = response.data[0].id_out;
                                    if(response.data[0].user_id != ".$sesi."){
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            timerProgressBar: true,
                                            onOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            
                                            },
                                        })
                                        Toast.fire({
                                            icon: response.data[0].icon,
                                            title: response.data[0].title,
                                            
                                        })
                                    }
                                }
                            }
                                
                        }
                    });
                }
                
                

                
            });
            </script>
            ";

                // echo"
                // <script>
                // $(document).ready(function () {
                //     var notif_join = setInterval(notif, 1000);
                //     function notif(){
                //         $.ajax({
                //             type: 'POST',
                //             url: '".url('ajax/room/notif-join.php')."',
                //             data: {
                //                 id : ".end($ex).",
                //                 id_quiz: ".$data['id_quiz'].",
                //                 code: ".$code.",
                //             },
                //             dataType: 'json',
                //             success: function(response) {
                //                 console.log(response);
                //                 clearInterval(notif_join);
                //                 const Toast = Swal.mixin({
                //                     toast: true,
                //                     position: 'top-end',
                //                     showConfirmButton: false,
                //                     timer: 10000,
                //                     timerProgressBar: true,
                //                     onOpen: (toast) => {
                //                     toast.addEventListener('mouseenter', Swal.stopTimer)
                //                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                //                     }
                //                 })
                //                 Toast.fire({
                //                     icon: 'success',
                //                     title: 'Signed in successfully'
                //                 })
                //             }
                //         });
                //     }
                // });
                // </script>
                // ";
            
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