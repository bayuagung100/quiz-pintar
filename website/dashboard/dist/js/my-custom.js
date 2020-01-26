function readImg(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+id)
                .show()
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function(){
    // var form = document.getElementById('buat_quiz');
    var judul = document.forms["buat_quiz"]["judul"];               
    var gambar = document.forms["buat_quiz"]["gambar"];    
    var kategori = document.forms["buat_quiz"]["kategori"];  
    var tingkat =  document.forms["buat_quiz"]["tingkat"];  
    var deskripsi = document.forms["buat_quiz"]["deskripsi"];
    $("#next_pertanyaan1").click(function(){
        // if(judul.value == "" && judul.hasAttribute('required')){
        //     alert("Nama quiz wajib diisi ");
        //     judul.focus();
        //     return false; 
        // }

        // if(gambar.value == "" && gambar.hasAttribute('required')){
        //     alert("Gambar quiz wajib diisi ");
        //     gambar.focus();
        //     return false; 
        // }

        // if(kategori.value == "" && kategori.hasAttribute('required')){
        //     alert("Kategori quiz wajib diisi ");
        //     kategori.focus();
        //     return false; 
        // }

        // if(tingkat.value == "" && tingkat.hasAttribute('required')){
        //     alert("Tingkat kesulitan quiz wajib diisi ");
        //     tingkat.focus();
        //     return false; 
        // }

        // if(deskripsi.value == "" && deskripsi.hasAttribute('required')){
        //     alert("Deskripsi quiz wajib diisi ");
        //     deskripsi.focus();
        //     return false; 
        // } 

        $('#banner').hide();
        $('#tanda').hide();
        $('#default').hide();
        $('#pertanyaan1').show();
    });

    $("#prev_default").click(function(){
        $('#banner').show();
        $('#tanda').show();
        $('#default').show();
        $('#pertanyaan1').hide();
    });

    $("#a_soal1").click(function(){
        $("#jawaban_a_soal1").prop('required', true);
        $("#jawaban_b_soal1").prop('required', false);
        $("#jawaban_c_soal1").prop('required', false);
        $("#jawaban_d_soal1").prop('required', false);
    });

    $("#b_soal1").click(function(){
        $("#jawaban_a_soal1").prop('required', false);
        $("#jawaban_b_soal1").prop('required', true);
        $("#jawaban_c_soal1").prop('required', false);
        $("#jawaban_d_soal1").prop('required', false);
    });

    $("#c_soal1").click(function(){
        $("#jawaban_a_soal1").prop('required', false);
        $("#jawaban_b_soal1").prop('required', false);
        $("#jawaban_c_soal1").prop('required', true);
        $("#jawaban_d_soal1").prop('required', false);
    });

    $("#d_soal1").click(function(){
        $("#jawaban_a_soal1").prop('required', false);
        $("#jawaban_b_soal1").prop('required', false);
        $("#jawaban_c_soal1").prop('required', false);
        $("#jawaban_d_soal1").prop('required', true);
    });


});

$(document).ready(function(){
    var soal1 = $('#soal1').keyup(function(){
        isi = this.value;
        $('#preview-container-soal1').text(isi);
    });
    
    // var gambar = $('#preview2').click(function(){
    //     console.log(gambar.load());
    // });
});

