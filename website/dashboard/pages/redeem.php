<?php
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "redeem";
switch($show){
    default:
?>
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 redeem ">
                    <h2 class="text-center">Tukarkan pointmu!</h2>
                    <img src="<?php echo url("img/banner-redeem.png");?>" alt="banner_redeem" style="width: 100%;max-height: 356px;"/>
                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">Redeem Point</h3> -->
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#rp" data-toggle="tab">Redeem Point</a></li>
                                <li class="nav-item"><a class="nav-link" href="#rr" data-toggle="tab">Riwayat Redeem</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="rp">
                                    <!-- <form class="redeem-container" id="redeem_form" method="post" > -->
                                    <form id="redeem_form"  method="post" action="<?php echo $link;?>&show=action" class="redeem-container" enctype="multipart/form-data">
                                        <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id'];?>">
                                        <div class="alert alert-warning">
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> Info!</h5>
                                            (-) 1 point = 1 rupiah.<br>
                                            (-) tanda <span style="color:red">(*)</span> wajib diisi.<br>
                                            (-) pastikan pointmu cukup untuk melakukan redeem.<br>
                                            (-) proses redeem akan diproses dalam 1x24 jam.
                                        </div>
                                        <div class="form-group">
                                        <?php  
                                        $query_point = $mysqli->query ("SELECT * FROM points WHERE id_player='$_SESSION[id]' ");
                                        $cek_query_point = $query_point->num_rows;
                                        $data_query_point = $query_point->fetch_array();
                                        if ($cek_query_point>0) {
                                            $point = $data_query_point['point'];
                                        } else {
                                            $point = "0";
                                        }
                                        ?>
                                            <label>Point tersedia: <?php echo $point;?></label>
                                            <input type="hidden" id="point" name="point" value="<?php echo $point;?>">
                                            <!-- <input type="hidden" id="point" name="point" value="100000"> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Hadiah: <span style="color:red">(*)</span></label>   
                                            <div class="row text-center">
                                                <div class="col-sm-4">
                                                <label>
                                                    <input type="radio" name="redeem_hadiah" value="pulsa" required>
                                                    <div class="position-relative p-3 " >
                                                        <div class="ribbon-wrapper ribbon-lg">
                                                            <div class="ribbon bg-success ">
                                                            Pulsa
                                                            </div>
                                                        </div>
                                                        <img src="<?php echo url('/img/redeem-pulsa.png');?>" style="max-width:120px">
                                                    </div>
                                                </label>
                                                </div>
                                                <div class="col-sm-4">
                                                <label>
                                                    <input type="radio" name="redeem_hadiah" value="uang" disabled>
                                                    <div class="position-relative p-3 " >
                                                        <div class="ribbon-wrapper ribbon-lg">
                                                            <div class="ribbon bg-success ">
                                                            Cooming Soon
                                                            </div>
                                                        </div>
                                                        <img src="<?php echo url('/img/redeem-uang.png');?>" style="max-width:120px">
                                                    </div>
                                                </label>
                                                </div>
                                                <div class="col-sm-4">
                                                <label>
                                                    <input type="radio" name="redeem_hadiah" value="barang" disabled>
                                                    <div class="position-relative p-3 " >
                                                        <div class="ribbon-wrapper ribbon-lg">
                                                            <div class="ribbon bg-success ">
                                                            Cooming Soon
                                                            </div>
                                                        </div>
                                                        <img src="<?php echo url('/img/redeem-barang.png');?>" style="max-width:120px">
                                                    </div>
                                                </label>
                                                </div>
                                            </div>                         
                                        </div>

                                        <div id="no_hp" class="form-group" style='display:none'>
                                            <label>Nomor Handphone: <span style="color:red">(*)</span></label><br>
                                            <input type="tel" id="phone" name="phone" placeholder="08xx-xxxx-xxxx" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" value="<?php echo wordwrap($_SESSION['hp'], 4, '-', true);?>">
                                            <small>Format: 08xx-xxxx-xxxx</small>
                                        </div>
                                        <div id="pulsa" class="form-group" style='display:none'>
                                            <label>All Operator: <span style="color:red">(*)</span></label>
                                            <select id="isi_pulsa" name="isi_pulsa" class="form-control select2" style="width: 100%;">
                                                <option value="">Pilih nominal pulsa</option>
                                                <option value="pulsa5000-7000">Pulsa 5rb (7000 Point)</option>
                                                <option value="pulsa10000-12000">Pulsa 10rb (12000 Point)</option>
                                                <option value="pulsa20000-22000">Pulsa 20rb (22000 Point)</option>
                                                <option value="pulsa25000-27000">Pulsa 25rb (27000 Point)</option>
                                                <option value="pulsa50000-52000">Pulsa 50rb (52000 Point)</option>
                                                <option value="pulsa100000-102000">Pulsa 100rb (102000 Point)</option>
                                            </select>
                                        </div>

                                        <div id="nominalUang" class="form-group" style='display:none'>
                                            <label>Nominal Uang: <span style="color:red">(*)</span></label><br>
                                            <select id="nominal_uang" name="nominal_uang" class="form-control select2" style="width: 100%;">
                                                <option value="">Pilih nominal uang</option>
                                                <option value="uang10000-12000">Uang 10rb (12000 Point)</option>
                                                <option value="uang20000-22000">Uang 20rb (22000 Point)</option>
                                                <option value="uang30000-32000">Uang 30rb (32000 Point)</option>
                                                <option value="uang40000-42000">Uang 40rb (42000 Point)</option>
                                                <option value="uang50000-52000">Uang 50rb (52000 Point)</option>
                                                <option value="uang100000-102000">Uang 100rb (102000 Point)</option>
                                            </select>
                                        </div>
                                        <div id="namaRekening" class="form-group" style='display:none'>
                                            <label>Nama Rekening: <span style="color:red">(*)</span></label><br>
                                            <input type="text" id="nama_rekening" name="nama_rekening" class="form-control" placeholder="Nama Rekening Penerima">
                                        </div>
                                        <div id="Rekening" class="form-group" style='display:none'>
                                            <label>Bank - Nomor Rekening: <span style="color:red">(*)</span></label><br>
                                            <input type="text" id="rekening" name="rekening" class="form-control" placeholder="BCA-xxxxxxxxxxxxx">
                                            <small>Format: Nama Bank-xxxxxxxxxxxxx</small><br>
                                            <small>Contoh: BCA-1234567891023</small>
                                        </div>

                                        <div id="nominalHarga" class="form-group" style='display:none'>
                                            <label>Jenis Barang: <span style="color:red">(*)</span></label><br>
                                            <select id="nominal_harga" name="nominal_harga" class="form-control select2" style="width: 100%;">
                                                <option value="">Pilih jenis barang</option>
                                                <option value="atk50000-52000">Alat Tulis (52000 Point)</option>
                                                <option value="bukugramedia100000-102000">Buku Gramedia (102000 Point)</option>
                                                <option value="tas150000-152000">Tas (152000 Point)</option>
                                            </select>
                                        </div>
                                        <div id="namaPenerima" class="form-group" style='display:none'>
                                            <label>Nama Penerima: <span style="color:red">(*)</span></label><br>
                                            <input type="text" id="nama_penerima" name="nama_penerima" class="form-control" placeholder="Nama Penerima" value="<?php echo $_SESSION['nama'];?>">
                                        </div>
                                        <div id="Alamat" class="form-group" style='display:none'>
                                            <label>Alamat Lengkap: <span style="color:red">(*)</span></label><br>
                                            <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control" placeholder="Alamat Lengkap"><?php echo $_SESSION['alamat'];?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Catatan:</label>
                                            <textarea id="note" name="note" class="form-control" placeholder="Enter ..."></textarea>
                                        </div>
                                        <button type='submit' id='submit_redeem' name='submit_redeem' class='btn btn-block btn-success'><span>Kirim</span></button>
                                    </form>
                                </div>
                                
                                <div class="tab-pane" id="rr">
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        $query = $mysqli->query("SELECT * FROM redeem WHERE id_user = '$_SESSION[id]' ORDER BY id DESC");
                                        
                                        
                                        while($data = $query->fetch_array()){
                                            $tanggal = $data['tanggal'];
                                            $jenis_hadiah = $data['jenis_hadiah'];
                                            $status = $data['status'];
                                            $no_hp = $data['no_hp'];
                                            $nominal_pulsa = $data['nominal_pulsa'];
                                            $ex_nominal_pulsa = explode("-",$nominal_pulsa);
                                            $nama_rekening = $data['nama_rekening'];
                                            $rekening = $data['rekening'];
                                            $nominal_uang = $data['nominal_uang'];
                                            $ex_nominal_uang = explode("-",$nominal_uang);
                                            $bukti_tf = $data['bukti_tf'];
                                            $nama_penerima = $data['nama_penerima'];
                                            $alamat_lengkap = $data['alamat_lengkap'];
                                            $nominal_harga = $data['nominal_harga'];
                                            $ex_nominal_harga = explode("-",$nominal_harga);

                                            if ($jenis_hadiah == "pulsa") {
                                               $jenis = $jenis_hadiah."<br>".$ex_nominal_pulsa[0]." dikirim ke (".$no_hp.")";
                                            } elseif ($jenis_hadiah == "uang") {
                                                $jenis = $jenis_hadiah."<br>".$ex_nominal_uang[0]." dikirim ke (".$rekening.")";
                                            } elseif ($jenis_hadiah == "barang") {
                                                $jenis = $jenis_hadiah."<br>".$ex_nominal_harga[0]." dikirim ke (".$alamat_lengkap.")";
                                            }
                                            echo'
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$tanggal.'</td>
                                                <td>'.$jenis.'</td>
                                                <td>'.$status.'</td>
                                            </tr>
                                            ';
                                            $no++;
                                        }
                                        ?>
                                        </tbody>	
                                        <tfoot>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

<?php
    break;

    case 'action':
        $id_user = $_POST['id_user'];
        $tanggal = date("Y-m-d");
        $point = $_POST['point'];
        $jenis_hadiah =  $_POST['redeem_hadiah'];

        $phone =  $_POST['phone'];
        $isi_pulsa =  $_POST['isi_pulsa'];
        $ex_isi_pulsa = explode("-", $isi_pulsa);

        $nominal_uang =  $_POST['nominal_uang'];
        $nama_rekening =  $_POST['nama_rekening'];
        $rekening =  $_POST['rekening'];
        $ex_nominal_uang = explode("-", $nominal_uang);

        $nominal_harga =  $_POST['nominal_harga'];
        $nama_penerima  =  $_POST['nama_penerima'];
        $alamat_lengkap  =  $_POST['alamat_lengkap'];
        $ex_nominal_harga = explode("-", $nominal_harga);

        $note  =  $_POST['note'];

        if ($jenis_hadiah == "pulsa") {
            $dataPoint = $point-$ex_isi_pulsa[1];

            $query = $mysqli->query("INSERT INTO redeem
                (
                    id_user,
                    tanggal,
                    jenis_hadiah,
                    status,
                    no_hp,
                    nominal_pulsa,
                    catatan
                )
                VALUES
                (
                    '$id_user',
                    '$tanggal',
                    '$jenis_hadiah',
                    'pending',
                    '$phone',
                    '$isi_pulsa',
                    '$note'
                )
            ");
            
            $update_points = $mysqli->query("UPDATE points SET 
            point='$dataPoint'
            WHERE id_player='$id_user' ");

            if ($update_points) {
                echo"
                <script type='text/javascript'>
                $(document).ready(function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Redeem berhasil, akan diproses dalam 1x24 jam.',
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
                        text: 'Redeem gagal, ".$mysqli->error."',
                        onAfterClose: () => {
                            window.location.href = '".$link."';
                        }
                    });
                });
                </script>
                ";
            }
        } elseif ($jenis_hadiah == "uang") {
            $dataPoint = $point-$ex_nominal_uang[1];

            $query = $mysqli->query("INSERT INTO redeem
                (
                    id_user,
                    tanggal,
                    jenis_hadiah,
                    status,
                    nama_rekening,
                    rekening,
                    nominal_uang,
                    catatan
                )
                VALUES
                (
                    '$id_user',
                    '$tanggal',
                    '$jenis_hadiah',
                    'pending',
                    '$nama_rekening',
                    '$rekening',
                    '$nominal_uang',
                    '$note'
                )
            ");

            $update_points = $mysqli->query("UPDATE points SET 
            point='$dataPoint'
            WHERE id_player='$id_user' ");

            if ($update_points) {
                echo"
                <script type='text/javascript'>
                $(document).ready(function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Redeem berhasil, akan diproses dalam 1x24 jam.',
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
                        text: 'Redeem gagal, ".$mysqli->error."',
                        onAfterClose: () => {
                            window.location.href = '".$link."';
                        }
                    });
                });
                </script>
                ";
            }
        } elseif ($jenis_hadiah == "barang") {
            $dataPoint = $point-$ex_nominal_harga[1];

            $query = $mysqli->query("INSERT INTO redeem
                (
                    id_user,
                    tanggal,
                    jenis_hadiah,
                    status,
                    nama_penerima,
                    alamat_lengkap,
                    nominal_harga,
                    catatan
                )
                VALUES
                (
                    '$id_user',
                    '$tanggal',
                    '$jenis_hadiah',
                    'pending',
                    '$nama_penerima',
                    '$alamat_lengkap',
                    '$nominal_harga',
                    '$note'
                )
            ");

            $update_points = $mysqli->query("UPDATE points SET 
            point='$dataPoint'
            WHERE id_player='$id_user' ");

            if ($update_points) {
                echo"
                <script type='text/javascript'>
                $(document).ready(function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Redeem berhasil, akan diproses dalam 1x24 jam.',
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
                        text: 'Redeem gagal, ".$mysqli->error."',
                        onAfterClose: () => {
                            window.location.href = '".$link."';
                        }
                    });
                });
                </script>
                ";
            }
        }
    break;
}
?>