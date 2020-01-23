<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <?php
            if ($_SESSION['role']=="guru") {
                echo '
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="'.url("dashboard/buat-quiz").'" class="nav-link"><i class="fas fa-plus-circle"></i> Buat Quiz Baru</a>
                </li>
                ';
            }
        ?>
        
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo url(""); ?>" target="_blank">
                <i class="fas fa-sign-in-alt"></i> Gabung Game
            </a>
        </li>
    </ul>
</nav>