<?php
session_start();
include "vendor/config.php";
include "website/header.php"; ?>
<div class="header-warp">
    <div class="header-bar-warp d-flex">

        <a href="<?php echo url(""); ?>" class="site-logo">
            <img src="./img/quiz-pintar.png" alt="">
        </a>
    </div>
</div>
<?php
if (isset($_GET['register'])) {
    ?>
    <section class="auth-section">
        <div class="container">
            <div class="card-auth">
                <div class="text-center">
                    <h2>Pendaftaran Quis Pintar</h2>
                    <p>
                        Lengkapi data berikut untuk registrasi<br>
                        Tanda (*) wajib diisi.
                    </p>
                    <?php
                        if ($_GET['register'] == "gagal") {
                            echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Email yang Anda masukkan sudah terdaftar.</div>';
                        } elseif ($_GET['register'] == "password") {
                            echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password yang Anda masukkan tidak sama.</div>';
                        }
                        ?>
                </div>
                <form class="auth-form" action="auth" method="post">
                    <input type="hidden" name="oauth" value="daftar">
                    <p>

                        <input type="text" name="nama" placeholder="Nama lengkap(*)" required>
                    </p>
                    <p>
                        <input type="email" name="email" placeholder="Email(*)" required>
                    </p>
                    <p>
                        <input type="tel" name="hp" placeholder="No.Handphone(*)" required>
                    </p>
                    <p>
                        <input type="text" name="alamat" placeholder="Alamat Lengkap(*)" required>
                    </p>
                    <p>Role(*)</p>
                    <div class="row text-center">
                        <div class="col-md-6">
                        <label>
                            <input type="radio" name="role" value="guru" required>
                            <img src="./img/guru.png" style="max-width:120px">
                            <p>Guru</p>
                        </label>
                        </div>
                        <div class="col-md-6">
                        <label>
                            <input type="radio" name="role" value="pelajar" required>
                            <img src="./img/pelajar.png" style="max-width:120px">
                            <p>Pelajar</p>
                        </label>
                        </div>
                        <!-- <div class="col-md-4">
                        <label>
                            <input type="radio" name="role" value="umum" required>
                            <img src="./img/umum.png" style="max-width:120px">
                            <p>Orang tua / Umum</p>
                        </label>
                        </div> -->
                    </div>

                    <p>
                        <input type="password" name="password" placeholder="Password(*)" required>
                    </p>
                    <p>
                        <input type="password" name="ulangi_password" placeholder="Ulangi Password(*)" required>
                    </p>

                    <button type="submit" class="site-btn">Daftar</button>

                </form>

                <hr>
                <p>Sudah punya akun? <a href="<?php echo url("auth?login"); ?>">Login Disini</a></p>
            </div>

        </div>
        </div>
    </section>
<?php
} elseif (isset($_GET['login'])) {
    ?>
    <section class="auth-section">
        <div class="container">
            <div class="card-auth">
                <div class="text-center">
                    <h2>Login User</h2>
                    <?php
                        if ($_GET['login'] == "new-user") {
                            echo '<div class="alert alert-success" role="alert">Pendaftaran berhasil. Silahkan login!</div>';
                        } elseif ($_GET['login'] == "gagal") {
                            echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Email yang Anda masukkan salah.</div>';
                        }
                        ?>
                    <p>
                        Masukkan email dan password Anda untuk login
                    </p>
                </div>
                <form class="auth-form" action="auth" method="post">
                    <input type="hidden" name="oauth" value="login">
                    <p>
                        <input type="email" name="email" placeholder="Email(*)" required>
                    </p>
                    <p>
                        <input type="password" name="password" placeholder="Password(*)" required>
                    </p>
                    <button type="submit" class="site-btn">Login</button>

                </form>
                <hr>
                <p>Belum punya akun? <a href="<?php echo url("auth?register"); ?>">Daftar Disini</a></p>
            </div>

        </div>
        </div>
    </section>
<?php
} elseif ($_POST['oauth'] == "daftar") {
    $nama = ucwords($_POST['nama']);
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $ulangi_password = $_POST['ulangi_password'];
    $md5 = md5($_POST['password']);

    $cek = $mysqli->query("SELECT * FROM user WHERE email='$email' ");
    $jml = $cek->num_rows;

    if ($jml > 0) {
        echo '
        <script>
        window.location = "' . url("auth?register=gagal") . '";
        </script>
        ';
    } elseif ($password != $ulangi_password) {
        echo '
        <script>
        window.location = "' . url("auth?register=password") . '";
        </script>
        ';
    } else {
        $query = $mysqli->query("INSERT INTO user
            (
                nama,
                email,
                hp,
                alamat,
                role,
                password
            )
            VALUES
            (
                '$nama',
                '$email',
                '$hp',
                '$alamat',
                '$role',
                '$md5'
            )
        ");
        if ($query) {
            echo '
            <script>
            window.location = "' . url("auth?login=new-user") . '";
            </script>
            ';
        }
    }
} elseif ($_POST['oauth'] == "login") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = $mysqli->query("SELECT * FROM user WHERE email='$email' AND password='$password' ");
    $jmluser = $query->num_rows;
    $data = $query->fetch_array();

    if ($jmluser > 0) {
        $_SESSION['id']       = $data['id'];
        $_SESSION['nama']     = $data['nama'];
        $_SESSION['email']    = $data['email'];
        $_SESSION['hp']       = $data['hp'];
        $_SESSION['avatar']       = $data['avatar'];

        $_SESSION['log'] = 1;

        echo '
        <script>
        window.location = "' . url("") . '";
        </script>
        ';
    } else {
        echo '
        <script>
        window.location = "' . url("auth?login=gagal") . '";
        </script>
        ';
    }
} else {
    echo '
        <script>
        window.location = "' . url("auth?login") . '";
        </script>
        ';
}
?>


<?php include "website/footer.php"; ?>