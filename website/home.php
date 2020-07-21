<?php include "header.php"; ?>
<div class="header-warp">
    <div class="header-bar-warp d-flex">

        <a href="<?php echo url(""); ?>" class="site-logo">
            <img src="./img/quiz-pintar.png" alt="">
        </a>

        <nav class="top-nav-area w-100">
            <?php
            if (empty($_SESSION['email']) or $_SESSION['log'] == 0) { ?>
            <div class="user-panel">
                <a href="auth?login">Masuk</a> / <a href="auth?register">Daftar</a>
            </div>
            <?php } else { ?>
            <div class="user-panel">
                <?php
                if ($_SESSION['role'] == "guru") {
                    echo  '<a href="dashboard/quizku">Dashboard</a>';
                } else {
                    echo  '<a href="dashboard/aktivitas">Dashboard</a>';
                }
                ?>
            </div>
            <?php } ?>
            <!-- <ul class="main-menu primary-menu">
                <li><a href="<?php echo url(""); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo url("dashboard/aktivitas"); ?>"><i class="fa fa-history"></i> Aktivitas</a></li>
            </ul> -->
        </nav>

    </div>
</div>
<section class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="intro-text-box text-box text-white">
                    <div class="join-form">
                        <input  id="code" type="tel" name="code" placeholder="Enter 6 digit room code">
                        <button onclick="join_room()" class="site-btn">Join <img src="img/icons/double-arrow.png" alt="#" /></button>
                    </div>
                </div>
            </div>
            <?php
            if (empty($_SESSION['email']) or $_SESSION['log'] == 0) { ?>
            <div class="col-md-6 hidden-xs">
                <div class="intro-text-box text-box text-white text-center">
                    <i class="fa fa-user"
                        style="font-size: 90px;background-color:#737375;border-radius: 100%;height: 100px;width: 100px;"></i>
                    <p>
                        <a href="auth?register" style="color: #b01ba5">Daftar</a> sekarang dan kumpulkan pointnya</a>
                    </p>

                </div>
            </div>
            <?php
            } else { ?>
            <div class="col-md-6 hidden-xs">

                <div class="intro-text-box text-box text-white text-center">
                    <?php
                            if ($_SESSION['avatar'] == "") {
                                ?>
                    <button id="avatar"
                        style="font-size: 70px;background-color:#737375;border-radius: 100%;height: 100px;width: 100px;"><i
                            class="fa fa-plus"></i></button>
                    <!-- <img src="./img/author.jpg" alt="" class="avatar"> -->


                    <?php } else { ?>

                    <img id="avatar" src="./img/avatar/<?php echo $_SESSION['avatar']; ?>" alt="avatar" class="avatar">
                    <?php } ?>
                    <!-- The Modal -->
                    <div id="avatar_modal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <p class="modal-heading">Pilih Avatar</p>
                            <span class="close" style="color: #ec0b43;">x</span>
                            <?php
                                    if (isset($_POST['change_avatar'])) {
                                        $avatar = $_POST['avatar'];
                                        $query = $mysqli->query("UPDATE user SET
                                            avatar='$avatar'
                                            WHERE id='$_SESSION[id]'
                                        ");
                                        if ($query) {
                                            $_SESSION['avatar'] = $avatar;
                                            echo '
                                            <script>
                                            window.location = "' . url("") . '";
                                            </script>
                                            ';
                                        }
                                    }
                                    ?>
                            <form action="" method="post">
                                <input type="hidden" name="change_avatar">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster.png" required>
                                            <img src="./img/avatar/monster.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster1.png" required>
                                            <img src="./img/avatar/monster1.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster2.png" required>
                                            <img src="./img/avatar/monster2.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster3.png" required>
                                            <img src="./img/avatar/monster3.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster4.png" required>
                                            <img src="./img/avatar/monster4.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster5.png" required>
                                            <img src="./img/avatar/monster5.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster6.png" required>
                                            <img src="./img/avatar/monster6.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster7.png" required>
                                            <img src="./img/avatar/monster7.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster8.png" required>
                                            <img src="./img/avatar/monster8.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster9.png" required>
                                            <img src="./img/avatar/monster9.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster10.png" required>
                                            <img src="./img/avatar/monster10.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster11.png" required>
                                            <img src="./img/avatar/monster11.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster12.png" required>
                                            <img src="./img/avatar/monster12.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster13.png" required>
                                            <img src="./img/avatar/monster13.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster14.png" required>
                                            <img src="./img/avatar/monster14.png" style="max-width:90px">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="avatar" value="monster15.png" required>
                                            <img src="./img/avatar/monster15.png" style="max-width:90px">
                                        </label>
                                    </div>

                                </div>

                                <button type="submit" class="site-btn">Pilih</button>

                            </form>
                        </div>

                    </div>
                    <h4><?php echo $_SESSION['nama']; ?></h4>
                    <?php
                        if ($_SESSION['role']=="pelajar") {
                            $query_point = $mysqli->query ("SELECT * FROM points WHERE id_player='$_SESSION[id]' ");
                            $cek_query_point = $query_point->num_rows;
                            $data_query_point = $query_point->fetch_array();
                            if ($cek_query_point>0) {
                                $point = $data_query_point['point'];
                            } else {
                                $point = "0";
                            }
                            
                            echo '
                                <h5>Point: '.$point.'</h5>
                            ';
                        }
                    ?>
                    <a href="<?php echo url("dashboard/profil");?>" style="color: #b01ba5">Edit profil</a> | <a href="<?php echo url("dashboard/aktivitas");?>" style="color: #b01ba5">Lihat
                        aktifitas</a>
                    <br>
                    <a href="<?php echo url("logout");?>" style="color: #b01ba5"><i class="fa fa-sign-out"></i>
                        Keluar</a>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>

<!-- <section class="newsletter-section">
    <div class="container">
        <h2>Cari game quiz yang kamu inginkan!</h2>
        <form class="newsletter-form">
            <input type="search" placeholder="Cari quiz">
            <button class="site-btn">Cari <img src="img/icons/double-arrow.png" alt="#" /></button>
        </form>
    </div>
</section>

<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin:20px 0 20px 0">
                <div class="section-title text-white">
                    <h2>Judul Kategori Game</h2>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./img/blog/1.jpg" alt="">
                            <hr>
                            <h5>The best online game is out now!</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./img/blog/1.jpg" alt="">
                            <hr>
                            <h5>The best online game is out now!</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./img/blog/1.jpg" alt="">
                            <hr>
                            <h5>The best online game is out now!</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./img/blog/1.jpg" alt="">
                            <hr>
                            <h5>The best online game is out now!</h5>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button class="site-btn">See more <img src="img/icons/arrow-down-color.png" alt="#" /></button>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin:20px 0 20px 0">
                <div class="section-title text-white">
                    <h2>Judul Kategori Game</h2>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./img/blog/1.jpg" alt="">
                            <hr>
                            <h5>The best online game is out now!</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./img/blog/1.jpg" alt="">
                            <hr>
                            <h5>The best online game is out now!</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./img/blog/1.jpg" alt="">
                            <hr>
                            <h5>The best online game is out now!</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./img/blog/1.jpg" alt="">
                            <hr>
                            <h5>The best online game is out now!</h5>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button class="site-btn">See more <img src="img/icons/arrow-down-color.png" alt="#" /></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<?php include "footer.php"; ?>