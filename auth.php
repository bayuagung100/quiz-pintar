<?php
session_start();
include "vendor/config.php";
include "website/header.php"; ?>
<div class="header-warp">
    <div class="header-bar-warp d-flex">

        <a href="<?php echo $set['url']; ?>" class="site-logo">
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

                    <button type="submit" class="site-btn">Daftar</button>

                </form>
                <hr>
                <p>Sudah punya akun? <a href="<?php echo $set['url']; ?>auth?login">Login Disini</a></p>
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
                        }elseif ($_GET['login'] == "gagal") {
                            echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Email yang Anda masukkan salah.</div>';
                        }
                        ?>
                    <p>
                        Masukkan email Anda untuk login
                    </p>
                </div>
                <form class="auth-form" action="auth" method="post">
                    <input type="hidden" name="oauth" value="login">
                    <p>
                        <input type="email" name="email" placeholder="Email(*)" required>
                    </p>
                    <button type="submit" class="site-btn">Login</button>

                </form>
                <hr>
                <p>Belum punya akun? <a href="<?php echo $set['url']; ?>auth?register">Daftar Disini</a></p>
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

    $cek = $mysqli->query("SELECT * FROM user WHERE email='$email' ");
    $jml = $cek->num_rows;

    if ($jml > 0) {
        echo '
        <script>
        window.location = "' . $set['url'] . 'auth?register=gagal";
        </script>
        ';
    } else {
        $query = $mysqli->query("INSERT INTO user
            (
                nama,
                email,
                hp,
                alamat
            )
            VALUES
            (
                '$nama',
                '$email',
                '$hp',
                '$alamat'
            )
        ");
        if ($query) {
            echo '
            <script>
            window.location = "' . $set['url'] . 'auth?login=new-user";
            </script>
            ';
        }
    }
} elseif ($_POST['oauth'] == "login") {
    $email = $_POST['email'];

    $query = $mysqli->query("SELECT * FROM user WHERE email='$email'");
    $jmluser = $query->num_rows;
    $data = $query->fetch_array();

    if ($jmluser > 0) {
        $_SESSION['id']       = $data['id'];
        $_SESSION['nama']     = $data['nama'];
        $_SESSION['email']    = $data['email'];
        $_SESSION['hp']       = $data['hp'];
        
        $_SESSION['log'] = 1;

        echo '
        <script>
        window.location = "' . $set['url'] . '";
        </script>
        ';
    } else {
        echo '
        <script>
        window.location = "' . $set['url'] . 'auth?login=gagal";
        </script>
        ';
    }
} else {
    echo '
        <script>
        window.location = "' . $set['url'] . 'auth?login";
        </script>
        ';
}
?>


<?php include "website/footer.php"; ?>