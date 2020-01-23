<aside class="main-sidebar sidebar-dark-primary elevation-4" style="top:15px">
    <a href="<?php echo url("dashboard");?>" class="brand-link">
        <img src="<?php echo url("img/quiz-pintar.png");?>" alt="Logo Quiz Pintar" style="max-height: 50px;opacity: .8">
        <!-- <span class="brand-text font-weight-light">Adminisitrator</span> -->
    </a>
    
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <?php
                if($_SESSION['avatar']==""){
                echo '
                    <img src="https://ui-avatars.com/api/?name='.$_SESSION['nama'].'&rounded=true" class="img-circle elevation-2" alt="User Image">
                ';
            } else {
                echo '
                    <img src="'.url("img/avatar/").$_SESSION['avatar'].'" class="img-circle elevation-2" alt="User Image">
                ';
            }
            ?>
            </div>
            <?php
                if ($_SESSION['role']=="guru") {
                    echo '
                    <div class="info">
                        <a href="'.url("dashboard/profil").'" class="d-block">'.$_SESSION['nama'].'</a>
                        <a href="'.url("dashboard/buat-quiz").'" class="buat-quiz-btn" ><i class="fas fa-plus-circle"></i> Buat Quiz Baru</a>
                    </div>
                    ';
                } else {
                    echo '
                    <div class="info">
                        <a href="'.url("dashboard/profil").'" class="d-block">'.$_SESSION['nama'].'</a>
                        <h6 style="color:white">Point: 0</h6>
                    </div>
                    ';
                }
            ?>
            
            
        </div>
        <nav class="mt-2" style="border-bottom: 1px solid #4f5962;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo url("dashboard");?>" class="nav-link">
                        <?php
                            if (path()==false or path()=="buat-quiz") {
                                echo'
                                <span class="active"></span>
                                ';
                            }
                        ?>
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Temukan Quiz
                        </p>
                    </a>
                </li>
                <?php
                if ($_SESSION['role']=="guru") {
                    echo '
                    <li class="nav-item">
                        <a href="'.url("dashboard/quizku").'" class="nav-link">';
                        if (path()=="quizku") {
                            echo'
                            <span class="active"></span>
                            ';
                        }
                    echo '
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Quiz Ku
                            </p>
                        </a>
                    </li>
                    ';
                }
                ?>
                
                <li class="nav-item">
                    <a href="<?php echo url("dashboard/aktivitas");?>" class="nav-link">
                    <?php
                        if (path()=="aktivitas") {
                            echo'
                            <span class="active"></span>
                            ';
                        }
                    ?>
                        <i class="nav-icon fas fa-chart-bar	"></i>
                        <p>
                            Aktivitas
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <nav class="mt-2" style="border-bottom: 1px solid #4f5962;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo url("dashboard/profil");?>" class="nav-link">
                    <?php
                        if (path()=="profil") {
                            echo'
                            <span class="active"></span>
                            ';
                        }
                    ?>
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?php echo url("logout");?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt	"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>

