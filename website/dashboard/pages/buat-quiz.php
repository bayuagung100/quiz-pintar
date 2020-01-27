<section class="content" style="padding:20px">
    <div class="container-fluid">
        <div class="buat-quiz">
            <div id="banner" class="banner">
                <div class="image-wrapper">
                    <img src="<?php echo url("img/icons/createaquiz.png");?>">
                </div>
                <div class="title">Buat quiz</div>
            </div>
            <div id="tanda" class="container">
                <p>Tanda (<span style="color:red">*</span>) wajib diisi.</p>
            </div>
            <form id="buat_quiz">
                <div id="default">
                    <div class="form-group">
                        <label for="judul">1. Berikan nama quiz ini <span style="color:red">*</span></label>
                        <input type="text" id="judul" name="judul" placeholder="Nama Quiz" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">2. Berikan gambar pada quiz ini <span style="color:red">*</span></label>
                        <br>
                        <img id="preview" style="display:none" src="#" alt="your image" />
                        <input style="margin-top:10px" type="file" id="gambar" name="gambar"
                            onchange="readImg(this, 'preview');" required>
                        <span style="float: left;">Format yang didukung: .jpeg, .jpg, .png</span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="kategori">3. Berikan kategori untuk quiz ini <span
                                style="color:red">*</span></label>
                        <select id="kategori" name="kategori" class="form-control select2" style="width: 100%;"
                            required>
                            <option value="">Pilih Kategori</option>
                            <option value="Pendidikan Agama">Pendidikan Agama</option>
                            <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Sejarah">Sejarah</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="Penjaskes">Penjaskes</option>
                            <option value="Teknologi Informasi dan Komunikasi">Teknologi Informasi dan Komunikasi
                            </option>
                            <option value="Keterampilan/Bahasa Asing">Keterampilan/Bahasa Asing</option>
                            <option value="Muatan Lokal">Muatan Lokal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tingkat">4. Berikan tingkat kesulitan quiz ini <span
                                style="color:red">*</span></label>
                        <select id="tingkat" name="tingkat" class="form-control select2" style="width: 100%;" required>
                            <option value="">Pilih Tingkat Kesulitan</option>
                            <option value="Hard">Hard</option>
                            <option value="Medium">Medium</option>
                            <option value="Easy">Easy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">5. Deskripsi untuk quiz ini <span style="color:red">*</span></label>
                        <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi Quiz" required></textarea>
                    </div>
                    <hr>
                    <p>Catatan: Setiap quiz berisi 10 soal dengan total nilai 100</p>
                    <div class="action-btns-wrapper">
                        <button type="button" class="cancel-btn" onclick="history.back()">Batal</button>
                        <button type="button" id="next_pertanyaan1" name="next_pertanyaan1"
                            class="save-btn"><span>Selanjutnya</span></button>
                    </div>
                </div>
                <div id="pertanyaan1">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <img style="width:25px" src="<?php echo url("img/icons/conversation.png");?>">
                                        Pertanyaan 1
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="soal1">Pertanyaan<span style="color:red">*</span></label>
                                        <textarea id="soal1" name="soal1" placeholder="Soal pertanyaan"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar_soal1">Gambar pertanyaan (opsional)</label>
                                        <br>
                                        <img id="preview2" style="display:none" src="#" alt="your image" />
                                        <input style="margin-top:10px" type="file" id="gambar_soal1" name="gambar_soal1"
                                            onchange="readImg(this, 'preview2');readImg(this, 'preview-container-gambar-soal1');">
                                        <span style="float: left;">Format yang didukung: .jpeg, .jpg, .png</span>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label>Ceklis jawaban yang benar <i class="fa fa-check-circle"
                                                style="color: #2FDA40"></i> <span style="color:red">*</span></label>
                                        <div class="form-group">
                                            <div class="jawaban-container">
                                                <input type="radio" id="a_soal1" name="jawaban_soal1" value="A"
                                                    class="jawaban-radio">
                                                <label for="a_soal1" class="jawaban-radio-label"></label>
                                                <input class="jawaban-radio-input" type="text" id="jawaban_a_soal1"
                                                    name="jawaban_a_soal1" placeholder="Pilihan jawaban 1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="jawaban-container">
                                                <input type="radio" id="b_soal1" name="jawaban_soal1" value="B"
                                                    class="jawaban-radio">
                                                <label for="b_soal1" class="jawaban-radio-label"></label>
                                                <input class="jawaban-radio-input" type="text" id="jawaban_b_soal1"
                                                    name="jawaban_b_soal1" placeholder="Pilihan jawaban 2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="jawaban-container">
                                                <input type="radio" id="c_soal1" name="jawaban_soal1" value="C"
                                                    class="jawaban-radio">
                                                <label for="c_soal1" class="jawaban-radio-label"></label>
                                                <input class="jawaban-radio-input" type="text" id="jawaban_c_soal1"
                                                    name="jawaban_c_soal1" placeholder="Pilihan jawaban 3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="jawaban-container">
                                                <input type="radio" id="d_soal1" name="jawaban_soal1" value="D"
                                                    class="jawaban-radio">
                                                <label for="d_soal1" class="jawaban-radio-label"></label>
                                                <input class="jawaban-radio-input" type="text" id="jawaban_d_soal1"
                                                    name="jawaban_d_soal1" placeholder="Pilihan jawaban 4">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><i class="fa fa-eye"></i> Preview pertanyaan 1</h4>
                                        <!-- <div class="card-tools">
                                            <button id="lihat-preview" type="button" class="btn btn-tool">
                                                <i class="fa">&#xf021;</i> Refresh
                                            </button>
                                        </div> -->
                                    </div>
                                    <div id="preview-container" class="card-body"
                                        style="background: #390F3D;overflow:scroll;height:450px">
                                        <div class="preview-soal text-center">
                                            <!-- <img src="<?php echo url("img/icons/createaquiz.png");?>"/> -->
                                            <img id="preview-container-gambar-soal1" style="display:none" src="#"
                                                alt="your image" />
                                            <br>
                                            <h3 id="preview-container-soal1"></h3>
                                        </div>
                                        <br>
                                        <div class="card bg-gradient-danger">
                                            <div class="card-header border-0 ui-sortable-handle">
                                                <h3 class="card-title text-center"
                                                    style="border: 2px solid #FFFFFF;border-radius: 10px;width:30px">
                                                    A
                                                </h3>
                                                <i class="fa fa-check-circle"
                                                    style="margin-left:10px;color: #2FDA40"></i>
                                            </div>
                                            <div class="card-body">
                                                pilihan jawaban 1
                                            </div>
                                        </div>
                                        <div class="card bg-gradient-warning">
                                            <div class="card-header border-0 ui-sortable-handle">
                                                <h3 class="card-title text-center"
                                                    style="border: 2px solid #000;border-radius: 10px;width:30px">
                                                    B
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                pilihan jawaban 1
                                            </div>
                                        </div>
                                        <div class="card bg-gradient-success">
                                            <div class="card-header border-0 ui-sortable-handle">
                                                <h3 class="card-title text-center"
                                                    style="border: 2px solid #FFFFFF;border-radius: 10px;width:30px">
                                                    C
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                pilihan jawaban 1
                                            </div>
                                        </div>
                                        <div class="card bg-gradient-primary">
                                            <div class="card-header border-0 ui-sortable-handle">
                                                <h3 class="card-title text-center"
                                                    style="border: 2px solid #FFFFFF;border-radius: 10px;width:30px">
                                                    D
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                pilihan jawaban 1
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="action-btns-wrapper">
                        <button type="button" id="prev_default" class="cancel-btn">Kembali</button>
                        <button type="button" id="next_pertanyaan" class="save-btn"><span>Selanjutnya</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>