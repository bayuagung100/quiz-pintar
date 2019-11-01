<?php include "header.php"; ?>
<div class="header-warp">
    <div class="header-bar-warp d-flex">

        <a href="<?php echo $set['url']; ?>" class="site-logo">
            <img src="./img/quiz-pintar.png" alt="">
        </a>
        <nav class="top-nav-area w-100">
            <div class="user-panel">
                <a href="auth?login">Login</a> / <a href="auth?register">Register</a>
            </div>

            <ul class="main-menu primary-menu">
                <li><a href="<?php echo $set['url']; ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href=""><i class="fa fa-history"></i> Aktivitas</a></li>
            </ul>
        </nav>
    </div>
</div>
<section class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="intro-text-box text-box text-white">
                    <form class="join-form">
                        <input type="tel" placeholder="Enter 6 digit room code">
                        <button class="site-btn">Join <img src="img/icons/double-arrow.png" alt="#" /></button>
                    </form>
                </div>
            </div>
            <?php
            if (empty($_SESSION['email']) or $_SESSION['log'] == 0) { ?>
                <div class="col-md-6 hidden-xs">
                    <div class="intro-text-box text-box text-white text-center">
                        <img src="./img/author.jpg" alt="" class="avatar">
                        <h4>nama lengakap</h4>
                        <a href="" style="color: #b01ba5">Edit profil</a> | <a href="" style="color: #b01ba5">Lihat aktifitas</a>
                    </div>
                </div>
            <?php
            } else { ?>
                <div class="col-md-6 hidden-xs">
                    <div class="intro-text-box text-box text-white text-center">
                        <img src="./img/author.jpg" alt="" class="avatar">
                        <h4><?php echo $_SESSION['nama']; ?></h4>
                        <a href="" style="color: #b01ba5">Edit profil</a> | <a href="" style="color: #b01ba5">Lihat aktifitas</a>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>

<section class="newsletter-section">
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
</section>
<?php include "footer.php"; ?>