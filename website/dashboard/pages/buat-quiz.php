<!-- <section class="content-header">
    <div class="container-fluid"> 
    </div>
</section> -->
<section class="content" style="padding:20px">
    <div class="container-fluid">
        <div class="buat-quiz">
            <div class="banner">
                <div class="image-wrapper">
                    <img src="<?php echo url("img/icons/createaquiz.png");?>">
                </div>
                <div class="title">Buat quiz</div>
            </div>
            <form>
                <p>
                <label>1. Berikan nama quiz ini (Wajib diisi)</label>
                <input type="text" name="judul" placeholder="Nama Quiz" required>
                </p>
                <p>
                <label>2. Berikan gambar pada quiz ini (Wajib diisi)</label>
                <input type="file" name="gambar" required>
                <span style="float: left;">Format yang didukung: .jpeg, .jpg, .png</span>
                <br>
                </p>
                <p>
                <label>3. Deskripsi untuk quiz ini (Wajib diisi)</label>
                <textarea name="deskripsi" placeholder="Deskripsi Quiz" required></textarea>
                    
                </p>
                <hr>
                <p>Catatan: Setiap quiz berisi 10 soal dengan total nilai 100</p>
                <div class="action-btns-wrapper">
                    <button class="cancel-btn" onclick="history.back()">Batal</button>
                    <button class="save-btn"><span class="">Selanjutnya</span></button>
                </div>
            </form>
        </div>
    </div>
</section>