<?php
function buka_form($link, $id, $aksi, $form_id){
    echo'
    <form id="'.$form_id.'"  method="post" action="'.$link.'&show=action" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="id" value="'.$id.'">
        <input type="hidden" name="aksi" value="'.$aksi.'">
    ';
}
function buat_hidden($name, $value)
{
    echo '
        <input type="hidden" name="'.$name.'" value="'.$value.'">
    ';
}
function buat_textbox($label, $name, $value, $place, $required="", $type="text")
{
    if ($required=="required") {
        $span = '<span style="color:red">*</span>';
    } else {
        $span = '(opsional)';
    }
    echo'
        <div class="form-group">
            <label for="'.$name.'">'.$label.' '.$span.'</label>
            <input type="'.$type.'" id="'.$name.'" name="'.$name.'" placeholder="'.$place.'" '.$required.'>
        </div>
    ';
}
function buat_fileimage($label, $name, $value, $idimg, $required="", $type="file")
{
    if ($required=="required") {
        $span = '<span style="color:red">*</span>';
    } else {
        $span = '(opsional)';
    }
    echo'
        <div class="form-group">
            <label for="'.$name.'">'.$label.' '.$span.'</label>
            <br>
            <img id="preview'.$idimg.'" style="display:none" src="#" alt="your image" />
            <input style="margin-top:10px" type="'.$type.'" id="gambar'.$idimg.'" name="'.$name.'" value="'.$value.'" onchange="readImg(this, '.$idimg.');" '.$required.'>
            <span style="float: left;">Format yang didukung: .jpeg, .jpg, .png</span>
        </div>
        <br>
    ';
}

function buat_select($label, $nama, $list, $nilai, $required="")
{
    if ($required=="required") {
        $span = '<span style="color:red">*</span>';
    } else {
        $span = '(opsional)';
    }
    echo'
        <div class="form-group">
			<label for="'.$nama.'">'.$label.' '.$span.'</label>
                <select id="'.$nama.'" name="'.$nama.'" class="form-control select2" '.$required.'>
    ';
		foreach($list as $ls){
			$select = $ls['val']==$nilai ? 'selected' : '';
            echo'
                <option value="'.$ls['val'].'" '.$select.'>'.$ls['cap'].'</option>
            ';
		}
	echo'       </select>
        </div>
    ';
}
function buat_textarea($label, $name, $value, $place, $required="", $class='')
{
    if ($required=="required") {
        $span = '<span style="color:red">*</span>';
    } else {
        $span = '(opsional)';
    }
    echo'
        <div class="form-group">
            <label for="'.$name.'">'.$label.' '.$span.'</label>
            <textarea id="'.$name.'" name="'.$name.'" class="form-control '.$class.'" placeholder="'.$place.'" '.$required.'>'.$value.'</textarea>
        </div>
    ';
}
function buat_btnactiondefault($next)
{
    echo'
        <hr>
        <p>Catatan: Setiap quiz berisi 10 soal dengan total nilai 100</p>
        <div class="action-btns-wrapper">
            <button type="button" class="cancel-btn" onclick="history.back()">Batal</button>
            <button type="button" id="next_pertanyaan'.$next.'" name="next_pertanyaan'.$next.'"
                class="save-btn"><span>Selanjutnya</span></button>
        </div>
    ';
}

function buat_bukadivpertanyaan($pertanyaan)
{
    echo '
        <div id="pertanyaan'.$pertanyaan.'">
    ';
}
function buat_bukadivsoal($pertanyaan)
{
    echo'
        <div class="col-sm-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                    <img style="width:25px" src="'.url("img/icons/conversation.png").'">
                    Pertanyaan '.$pertanyaan.'
                    </h3>
                </div>
                <div class="card-body"> 
    ';
}
function buat_fileimagesoal($label, $value, $idimg, $required="", $type="file")
{
    if ($required=="required") {
        $span = '<span style="color:red">*</span>';
    } else {
        $span = '(opsional)';
    }
    echo'
        <div class="form-group">
            <label for="preview_soal'.$idimg.'">'.$label.' '.$span.'</label>
            <br>
            <img id="preview_soal'.$idimg.'" style="display:none" src="#" alt="your image" />
            <input style="margin-top:10px" type="'.$type.'" id="gambar_soal'.$idimg.'" name="gambar_soal'.$idimg.'" value="'.$value.'"  onchange="readImgPreview(this, '.$idimg.')">
            <span style="float: left;">Format yang didukung: .jpeg, .jpg, .png</span>
        </div>
        <br>
    ';
}
function buat_radiojawaban($i)
{
    echo "
        <div class='form-group'>
            <label>Ceklis jawaban yang benar <i class='fa fa-check-circle' style='color: #2FDA40'></i> <span
                    style='color:red'>*</span></label>
            <div class='form-group'>
                <div class='jawaban-container'>
                    <input type='radio' id='a_soal".$i."' name='jawaban_soal".$i."' value='A' class='jawaban-radio' required>
                    <label for='a_soal".$i."' class='jawaban-radio-label'></label>
                    <input class='jawaban-radio-input' type='text' id='jawaban_a_soal".$i."' name='jawaban_a_soal".$i."'
                        placeholder='Pilihan jawaban 1' required>
                </div>
            </div>
            <div class='form-group'>
                <div class='jawaban-container'>
                    <input type='radio' id='b_soal".$i."' name='jawaban_soal".$i."' value='B' class='jawaban-radio' required>
                    <label for='b_soal".$i."' class='jawaban-radio-label'></label>
                    <input class='jawaban-radio-input' type='text' id='jawaban_b_soal".$i."' name='jawaban_b_soal".$i."'
                        placeholder='Pilihan jawaban 2' required>
                </div>
            </div>
            <div class='form-group'>
                <div class='jawaban-container'>
                    <input type='radio' id='c_soal".$i."' name='jawaban_soal".$i."' value='C' class='jawaban-radio' required>
                    <label for='c_soal".$i."' class='jawaban-radio-label'></label>
                    <input class='jawaban-radio-input' type='text' id='jawaban_c_soal".$i."' name='jawaban_c_soal".$i."'
                        placeholder='Pilihan jawaban 3' required>
                </div>
            </div>
            <div class='form-group'>
                <div class='jawaban-container'>
                    <input type='radio' id='d_soal".$i."' name='jawaban_soal".$i."' value='D' class='jawaban-radio' required>
                    <label for='d_soal".$i."' class='jawaban-radio-label'></label>
                    <input class='jawaban-radio-input' type='text' id='jawaban_d_soal".$i."' name='jawaban_d_soal".$i."'
                        placeholder='Pilihan jawaban 4' required>
                </div>
            </div>
        </div>
    ";
}
function buat_tutupdivsoal()
{
    echo '
                </div>
            </div>
        </div>
    ';
}
function buat_bukadivpreview($i)
{
    echo "
        <div class='col-sm-4'>
            <div class='sticky-top mb-3'>
                <div class='card'>
                    <div class='card-header'>
                        <h4 class='card-title'><i class='fa fa-eye'></i> Preview pertanyaan ".$i."</h4>
                    </div>
                    <div class='card-body' style='background: #390F3D;overflow:scroll;height:450px'>
    ";
}
function buat_isipreview($i)
{
    echo "
                        <div class='preview-soal text-center'>
                            <img id='preview-container-gambar-soal".$i."' style='display:none' src='#' alt='your image' />
                            <br>
                            <h3 id='preview-container-soal".$i."'></h3>
                        </div>
                        <br>
                        <div class='card bg-gradient-danger'>
                            <div class='card-header border-0 ui-sortable-handle'>
                                <h3 class='card-title text-center'
                                    style='border: 2px solid #FFFFFF;border-radius: 10px;width:30px'>
                                    A
                                </h3>
                                <i id='check-a-soal".$i."' class='fa fa-check-circle'
                                    style='margin-left:10px;color: #2FDA40; display:none;'></i>
                            </div>
                            <div id='preview-container-jawaban-a-soal".$i."' class='card-body'></div>
                        </div>
                        <div class='card bg-gradient-warning'>
                            <div class='card-header border-0 ui-sortable-handle'>
                                <h3 class='card-title text-center'
                                    style='border: 2px solid #000;border-radius: 10px;width:30px'>
                                    B
                                </h3>
                                <i id='check-b-soal".$i."' class='fa fa-check-circle'
                                    style='margin-left:10px;color: #000; display:none'></i>
                            </div>
                            <div id='preview-container-jawaban-b-soal".$i."' class='card-body'></div>
                        </div>
                        <div class='card bg-gradient-success'>
                            <div class='card-header border-0 ui-sortable-handle'>
                                <h3 class='card-title text-center'
                                    style='border: 2px solid #FFFFFF;border-radius: 10px;width:30px'>
                                    C
                                </h3>
                                <i id='check-c-soal".$i."' class='fa fa-check-circle'
                                    style='margin-left:10px;color: #fff; display:none'></i>
                            </div>
                            <div id='preview-container-jawaban-c-soal".$i."' class='card-body'></div>
                        </div>
                        <div class='card bg-gradient-primary'>
                            <div class='card-header border-0 ui-sortable-handle'>
                                <h3 class='card-title text-center'
                                    style='border: 2px solid #FFFFFF;border-radius: 10px;width:30px'>
                                    D
                                </h3>
                                <i id='check-d-soal".$i."' class='fa fa-check-circle'
                                    style='margin-left:10px;color: #2FDA40; display:none'></i>
                            </div>
                            <div id='preview-container-jawaban-d-soal".$i."' class='card-body'></div>
                        </div>
    ";
}
function buat_tutupdivpreview()
{
    echo '
                    </div>
                </div>
            </div>
        </div>            
    ';
}
function buat_tutupdivpertanyaan()
{
    echo '
        </div>
    ';
}
function buat_btnactionprevdefault($next)
{
    echo'
            <button type="button" id="prev_default" class="cancel-btn">Kembali</button>
            <button type="button" id="next_pertanyaan'.$next.'" class="save-btn"><span>Selanjutnya</span></button>
    ';
}
function buat_btnactionnextsubmit($prev)
{
    echo'
            <button type="button" id="prev_pertanyaan'.$prev.'" class="cancel-btn">Kembali</button>
            <button type="submit" id="simpan-soal" class="save-btn"><span>Simpan</span></button>
    ';
}
function buat_btnactionprevnext($prev, $next)
{
    echo'
            <button type="button" id="prev_pertanyaan'.$prev.'" class="cancel-btn">Kembali</button>
            <button type="button" id="next_pertanyaan'.$next.'" class="save-btn"><span>Selanjutnya</span></button>
    ';
}




function tutup_form(){
    echo'
    </form>
    ';
}

?>