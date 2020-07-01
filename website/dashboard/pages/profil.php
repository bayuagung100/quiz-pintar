<?php
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "profil";
switch($show){
    default:
?>
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i>
                        Profile
                    </h3>
                </div>
                
                <form method="post" action="<?php echo $link;?>&show=action" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['nama'];?>" placeholder="Enter nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email'];?>" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Handphone</label>
                            <input type="tel" class="form-control" id="no_hp" name="no_hp" value="<?php echo $_SESSION['hp'];?>" placeholder="Enter no handphone" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Enter alamat lengkap" required><?php echo $_SESSION['alamat'];?></textarea>
                        </div>

                        <br>
                        <h4>Ubah Password</h4>
                        <hr>
                        <div class="alert alert-danger">
                            Isi form dibawah ini hanya bila Anda hendak mengubah password.
                        </div>
                        
                        <!-- <div class="alert alert-danger" role="alert"><b>Sorry!</b> Password tidak sama.</div> -->

                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter password baru">
                        </div>
                        <div class="form-group">
                            <label for="confirm_new_password">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Enter konfirmasi password baru">
                        </div>

                    </div>

                    <div class="card-footer">
                    <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
<?php
    break;

    case 'action':
        if(isset($_POST['update'])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
            $alamat = $_POST['alamat'];

            $newpassword = $_POST['new_password'];
            $confirmpassword = $_POST['confirm_new_password'];
            $passwordmd5 = md5($newpassword);

            if ($newpassword!=null) {
                if ($confirmpassword != $newpassword) {
                    echo"
                    <script type='text/javascript'>
                    $(document).ready(function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Password baru tidak sama.',
                            onAfterClose: () => {
                                window.location.href = '".$link."';
                            }
                        });
                    });
                    </script>
                    ";
                }else {
                    $insuser = $mysqli->query(" UPDATE user SET
                        password='$passwordmd5'
                        WHERE id='$_SESSION[id]' 
                    ");
                    if ($insuser) {
                        $_SESSION['password']  = $passwordmd5;
                        echo"
                        <script type='text/javascript'>
                        $(document).ready(function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Update password berhasil.',
                                onAfterClose: () => {
                                    window.location.href = '".$link."';
                                }
                            });
                        });
                        </script>
                        ";
                    } else {
                        echo"
                        <script type='text/javascript'>
                        $(document).ready(function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Update password gagal, ".$mysqli->error."',
                                onAfterClose: () => {
                                    window.location.href = '".$link."';
                                }
                            });
                        });
                        </script>
                        ";
                    }
                }
            } else {
                $query = $mysqli->query(" UPDATE user SET
                    nama='$nama',
                    email='$email',
                    hp='$no_hp',
                    alamat='$alamat'
                    WHERE id='$_SESSION[id]' 
                ");
               
                if ($query) {
                    $_SESSION['nama']     = $nama;
                    $_SESSION['email']    = $email;
                    $_SESSION['hp']       = $no_hp;
                    $_SESSION['alamat']   = $alamat;

                    echo"
                    <script type='text/javascript'>
                    $(document).ready(function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Update profil berhasil.',
                            onAfterClose: () => {
                                window.location.href = '".$link."';
                            }
                        });
                    });
                    </script>
                    ";
                } else {
                    echo"
                    <script type='text/javascript'>
                    $(document).ready(function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Update profil gagal, ".$mysqli->error."',
                            onAfterClose: () => {
                                window.location.href = '".$link."';
                            }
                        });
                    });
                    </script>
                    ";
                }
            }
           
        }
    break;


    
}
?>