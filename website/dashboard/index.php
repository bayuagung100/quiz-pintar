<?php
//Mengecek status login
if (empty($_SESSION['email']) AND $_SESSION['log'] == 0) {
    header('location: auth');
} else {
    include "header.php";
    include "nav.php";
    include "sidebar.php";
?>
        <div class="content-wrapper">
            <?php include "page-content.php";?>
        </div>

    </div>
<?php  
    include "footer.php";

} 
?>