<aside class="main-sidebar sidebar-dark-primary elevation-4" style="top:15px">
    <a href="<?php echo url("dashboard");?>" class="brand-link">
        <img src="<?php echo url("img/quiz-pintar.png");?>" alt="Logo Quiz Pintar" style="max-height: 50px;opacity: .8">
        <!-- <span class="brand-text font-weight-light">Adminisitrator</span> -->
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo url("img/avatar/").$_SESSION['avatar'];?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['nama'];?></a>
                <a href="<?php echo url("dashboard/buat-quiz");?>" class="buat-quiz-btn" ><i class="fas fa-plus-circle"></i> Buat Quiz Baru</a>
            </div>
            
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo url("dashboard");?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo url("dashboard/test");?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            test
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo url("logout");?>" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>

