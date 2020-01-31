function readImg(input, id, name) {
    if (input.files && input.files[0]) {
        var fileTypes = ['jpg', 'jpeg', 'png'];

        var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types
        // var reader = new FileReader();

        if (isSuccess) { //yes
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#' + id)
                    .show()
                    .attr('src', e.target.result)
                    .width(300)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
        else {
            alert("Format gambar tidak didukung.\nFormat yang didukung: .jpeg, .jpg, .png");
            $('#'+id).hide();
            $('#'+name).val('');
        }
    }
}

function readImgPreview(input, id) {
    if (input.files && input.files[0]) {
        var fileTypes = ['jpg', 'jpeg', 'png'];

        var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types
        // var reader = new FileReader();

        if (isSuccess) { //yes
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview_soal' + id)
                    .show()
                    .attr('src', e.target.result)
                    .width(300)
                    .height(200);
                
                $('#preview-container-gambar-soal' + id)
                    .show()
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
        else {
            alert("Format gambar tidak didukung.\nFormat yang didukung: .jpeg, .jpg, .png");
            $('#preview_soal' + id).hide();
            $('#gambar_soal'+id).val('');
            $('#preview-container-gambar-soal' + id).hide();
        }
    }
}


$(document).ready(function () {
    // var form = document.getElementById('buat_quiz');
    var judul = document.forms["buat_quiz"]["judul"];
    var gambar = document.forms["buat_quiz"]["gambar"];
    var kategori = document.forms["buat_quiz"]["kategori"];
    var tingkat = document.forms["buat_quiz"]["tingkat"];
    var deskripsi = document.forms["buat_quiz"]["deskripsi"];
    

    var soal1 = $('#soal1');
    var jawaban_a_soal1 = document.forms["buat_quiz"]["jawaban_a_soal1"];
    var jawaban_b_soal1 = document.forms["buat_quiz"]["jawaban_b_soal1"];
    var jawaban_c_soal1 = document.forms["buat_quiz"]["jawaban_c_soal1"];
    var jawaban_d_soal1 = document.forms["buat_quiz"]["jawaban_d_soal1"];
    
    var soal2 = $('#soal2');
    var jawaban_a_soal2 = document.forms["buat_quiz"]["jawaban_a_soal2"];
    var jawaban_b_soal2 = document.forms["buat_quiz"]["jawaban_b_soal2"];
    var jawaban_c_soal2 = document.forms["buat_quiz"]["jawaban_c_soal2"];
    var jawaban_d_soal2 = document.forms["buat_quiz"]["jawaban_d_soal2"];

    var soal3 = $('#soal3');
    var jawaban_a_soal3 = document.forms["buat_quiz"]["jawaban_a_soal3"];
    var jawaban_b_soal3 = document.forms["buat_quiz"]["jawaban_b_soal3"];
    var jawaban_c_soal3 = document.forms["buat_quiz"]["jawaban_c_soal3"];
    var jawaban_d_soal3 = document.forms["buat_quiz"]["jawaban_d_soal3"];

    var soal4 = $('#soal4');
    var jawaban_a_soal4 = document.forms["buat_quiz"]["jawaban_a_soal4"];
    var jawaban_b_soal4 = document.forms["buat_quiz"]["jawaban_b_soal4"];
    var jawaban_c_soal4 = document.forms["buat_quiz"]["jawaban_c_soal4"];
    var jawaban_d_soal4 = document.forms["buat_quiz"]["jawaban_d_soal4"];

    var soal5 = $('#soal5');
    var jawaban_a_soal5 = document.forms["buat_quiz"]["jawaban_a_soal5"];
    var jawaban_b_soal5 = document.forms["buat_quiz"]["jawaban_b_soal5"];
    var jawaban_c_soal5 = document.forms["buat_quiz"]["jawaban_c_soal5"];
    var jawaban_d_soal5 = document.forms["buat_quiz"]["jawaban_d_soal5"];

    var soal6 = $('#soal6');
    var jawaban_a_soal6 = document.forms["buat_quiz"]["jawaban_a_soal6"];
    var jawaban_b_soal6 = document.forms["buat_quiz"]["jawaban_b_soal6"];
    var jawaban_c_soal6 = document.forms["buat_quiz"]["jawaban_c_soal6"];
    var jawaban_d_soal6 = document.forms["buat_quiz"]["jawaban_d_soal6"];

    var soal7 = $('#soal7');
    var jawaban_a_soal7 = document.forms["buat_quiz"]["jawaban_a_soal7"];
    var jawaban_b_soal7 = document.forms["buat_quiz"]["jawaban_b_soal7"];
    var jawaban_c_soal7 = document.forms["buat_quiz"]["jawaban_c_soal7"];
    var jawaban_d_soal7 = document.forms["buat_quiz"]["jawaban_d_soal7"];

    var soal8 = $('#soal8');
    var jawaban_a_soal8 = document.forms["buat_quiz"]["jawaban_a_soal8"];
    var jawaban_b_soal8 = document.forms["buat_quiz"]["jawaban_b_soal8"];
    var jawaban_c_soal8 = document.forms["buat_quiz"]["jawaban_c_soal8"];
    var jawaban_d_soal8 = document.forms["buat_quiz"]["jawaban_d_soal8"];

    var soal9 = $('#soal9');
    var jawaban_a_soal9 = document.forms["buat_quiz"]["jawaban_a_soal9"];
    var jawaban_b_soal9 = document.forms["buat_quiz"]["jawaban_b_soal9"];
    var jawaban_c_soal9 = document.forms["buat_quiz"]["jawaban_c_soal9"];
    var jawaban_d_soal9 = document.forms["buat_quiz"]["jawaban_d_soal9"];


    var soal10 = $('#soal10');
    var jawaban_a_soal10 = document.forms["buat_quiz"]["jawaban_a_soal10"];
    var jawaban_b_soal10 = document.forms["buat_quiz"]["jawaban_b_soal10"];
    var jawaban_c_soal10 = document.forms["buat_quiz"]["jawaban_c_soal10"];
    var jawaban_d_soal10 = document.forms["buat_quiz"]["jawaban_d_soal10"];
    

    $("#next_pertanyaan1").click(function () {
        // if(judul.value == "" && judul.hasAttribute('required')){
        //     alert("Nama quiz wajib diisi ");
        //     location.href = "#sec-buat-quiz";
        //     // judul.focus();
        //     return false; 
        // }

        // if(gambar.value == "" && gambar.hasAttribute('required')){
        //     alert("Gambar quiz wajib diisi ");
        //     location.href = "#judul";
        //     // gambar.focus();
        //     return false; 
        // }

        // if(kategori.value == "" && kategori.hasAttribute('required')){
        //     alert("Kategori quiz wajib diisi ");
        //     location.href = "#gambar";
        //     // kategori.focus();
        //     return false; 
        // }

        // if(tingkat.value == "" && tingkat.hasAttribute('required')){
        //     alert("Tingkat kesulitan quiz wajib diisi ");
        //     location.href = "#kategori";
        //     // tingkat.focus();
        //     return false; 
        // }

        // if(deskripsi.value == "" && deskripsi.hasAttribute('required')){
        //     alert("Deskripsi quiz wajib diisi ");
        //     location.href = "#tingkat";
        //     // deskripsi.focus();
        //     return false; 
        // } 

        $('#banner').hide();
        $('#tanda').hide();
        $('#default').hide();
        $('#pertanyaan1').show();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_default").click(function () {
        $('#banner').show();
        $('#tanda').show();
        $('#default').show();
        $('#pertanyaan1').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan2").click(function () {
        
        if(soal1.val() == "" && soal1.prop('required')){
            alert("Soal pertanyaan 1 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal1]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal1";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal1.value == "" && jawaban_a_soal1.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal1";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal1.value == "" && jawaban_b_soal1.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal1";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal1.value == "" && jawaban_c_soal1.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal1";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal1.value == "" && jawaban_d_soal1.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal1";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan2').show();
        $('#pertanyaan1').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan1").click(function () {
        $('#pertanyaan1').show();
        $('#pertanyaan2').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan3").click(function () {
        
        if(soal2.val() == "" && soal2.prop('required')){
            alert("Soal pertanyaan 2 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal2]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal2";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal2.value == "" && jawaban_a_soal2.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal2";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal2.value == "" && jawaban_b_soal2.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal2";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal2.value == "" && jawaban_c_soal2.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal2";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal2.value == "" && jawaban_d_soal2.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal2";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan3').show();
        $('#pertanyaan2').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan2").click(function () {
        $('#pertanyaan2').show();
        $('#pertanyaan3').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan4").click(function () {
        
        if(soal3.val() == "" && soal3.prop('required')){
            alert("Soal pertanyaan 3 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal3]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal3";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal3.value == "" && jawaban_a_soal3.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal3";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal3.value == "" && jawaban_b_soal3.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal3";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal3.value == "" && jawaban_c_soal3.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal3";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal3.value == "" && jawaban_d_soal3.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal3";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan4').show();
        $('#pertanyaan3').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan3").click(function () {
        $('#pertanyaan3').show();
        $('#pertanyaan4').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan5").click(function () {
        
        if(soal4.val() == "" && soal4.prop('required')){
            alert("Soal pertanyaan 4 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal4]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal4";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal4.value == "" && jawaban_a_soal4.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal4";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal4.value == "" && jawaban_b_soal4.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal4";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal4.value == "" && jawaban_c_soal4.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal4";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal4.value == "" && jawaban_d_soal4.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal4";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan5').show();
        $('#pertanyaan4').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan4").click(function () {
        $('#pertanyaan4').show();
        $('#pertanyaan5').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan6").click(function () {
        
        if(soal5.val() == "" && soal5.prop('required')){
            alert("Soal pertanyaan 5 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal5]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal5";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal5.value == "" && jawaban_a_soal5.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal5";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal5.value == "" && jawaban_b_soal5.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal5";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal5.value == "" && jawaban_c_soal5.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal5";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal5.value == "" && jawaban_d_soal5.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal5";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan6').show();
        $('#pertanyaan5').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan5").click(function () {
        $('#pertanyaan5').show();
        $('#pertanyaan6').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan7").click(function () {
        
        if(soal6.val() == "" && soal6.prop('required')){
            alert("Soal pertanyaan 6 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal6]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal6";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal6.value == "" && jawaban_a_soal6.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal6";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal6.value == "" && jawaban_b_soal6.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal6";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal6.value == "" && jawaban_c_soal6.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal6";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal6.value == "" && jawaban_d_soal6.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal6";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan7').show();
        $('#pertanyaan6').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan6").click(function () {
        $('#pertanyaan6').show();
        $('#pertanyaan7').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan8").click(function () {
        
        if(soal7.val() == "" && soal7.prop('required')){
            alert("Soal pertanyaan 7 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal7]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal7";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal7.value == "" && jawaban_a_soal7.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal7";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal7.value == "" && jawaban_b_soal7.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal7";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal7.value == "" && jawaban_c_soal7.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal7";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal7.value == "" && jawaban_d_soal7.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal7";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan8').show();
        $('#pertanyaan7').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan7").click(function () {
        $('#pertanyaan7').show();
        $('#pertanyaan8').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan9").click(function () {
        
        if(soal8.val() == "" && soal8.prop('required')){
            alert("Soal pertanyaan 8 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal8]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal8";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal8.value == "" && jawaban_a_soal8.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal8";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal8.value == "" && jawaban_b_soal8.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal8";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal8.value == "" && jawaban_c_soal8.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal8";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal8.value == "" && jawaban_d_soal8.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal8";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan9').show();
        $('#pertanyaan8').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan8").click(function () {
        $('#pertanyaan8').show();
        $('#pertanyaan9').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#next_pertanyaan10").click(function () {
        
        if(soal9.val() == "" && soal9.prop('required')){
            alert("Soal pertanyaan 9 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal9]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal9";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal9.value == "" && jawaban_a_soal9.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal8";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal9.value == "" && jawaban_b_soal9.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal9";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal9.value == "" && jawaban_c_soal9.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal9";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal9.value == "" && jawaban_d_soal9.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal9";
            // deskripsi.focus();
            return false; 
        } 

        $('#pertanyaan10').show();
        $('#pertanyaan9').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#prev_pertanyaan9").click(function () {
        $('#pertanyaan9').show();
        $('#pertanyaan10').hide();
        location.href = "#sec-buat-quiz";
    });

    $("#simpan-soal").click(function () {
        
        if(soal10.val() == "" && soal10.prop('required')){
            alert("Soal pertanyaan 10 wajib diisi");
            location.href = "#sec-buat-quiz";
            // tingkat.focus();
            return false; 
        } 

        if($('input[name=jawaban_soal10]').is(':checked')){
        }else{
            alert("Silahkan ceklis jawaban yang benar");
            location.href = "#soal10";
            // tingkat.focus();
            return false; 
        }

        if(jawaban_a_soal10.value == "" && jawaban_a_soal10.hasAttribute('required')){
            alert("Pilihan jawaban 1 wajib diisi");
            location.href = "#soal10";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_b_soal10.value == "" && jawaban_b_soal10.hasAttribute('required')){
            alert("Pilihan jawaban 2 wajib diisi");
            location.href = "#soal10";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_c_soal10.value == "" && jawaban_c_soal10.hasAttribute('required')){
            alert("Pilihan jawaban 3 wajib diisi");
            location.href = "#soal10";
            // deskripsi.focus();
            return false; 
        } 

        if(jawaban_d_soal10.value == "" && jawaban_d_soal10.hasAttribute('required')){
            alert("Pilihan jawaban 4 wajib diisi");
            location.href = "#soal10";
            // deskripsi.focus();
            return false; 
        } 

        // $('#buat_quiz').submit(function(e) {

        //     e.preventDefault(); // avoid to execute the actual submit of the form.
        
        //     var form = $(this);
        //     var url = form.attr('action');
        
        //     $.ajax({
        //            type: "POST",
        //            url: url,
        //            data: form.serialize(), // serializes the form's elements.
        //            success: function (data) {
        //                 console.log('Submission was successful.');
        //                 console.log(data);
        //             },
        //             error: function (data) {
        //                 console.log('An error occurred.');
        //                 console.log(data);
        //             },
     
        //          });
        
        
        // });
    });




    
    // fungsi preview pertanyaan //
    function buat_soal_pertanyaan(soal){
        $('#soal'+soal).keyup(function () {
            $('#preview-container-soal'+soal).text(this.value);
        });
    }

    function buat_jawaban_a(soal) {
        $('#jawaban_a_soal'+soal).keyup(function () {
            $('#preview-container-jawaban-a-soal'+soal).text(this.value);
        });
    }
    
    function buat_jawaban_b(soal) {
        $('#jawaban_b_soal'+soal).keyup(function () {
            $('#preview-container-jawaban-b-soal'+soal).text(this.value);
        });
    }

    function buat_jawaban_c(soal) {
        $('#jawaban_c_soal'+soal).keyup(function () {
            $('#preview-container-jawaban-c-soal'+soal).text(this.value);
        });
    }

    function buat_jawaban_d(soal) {
        $('#jawaban_d_soal'+soal).keyup(function () {
            $('#preview-container-jawaban-d-soal'+soal).text(this.value);
        });
    }

    function buat_pilih_jawaban_a(soal) {
        $("#a_soal"+soal).click(function () {
            $('#check-a-soal'+soal).show();
            $('#check-b-soal'+soal).hide();
            $('#check-c-soal'+soal).hide();
            $('#check-d-soal'+soal).hide();
        });
    }

    function buat_pilih_jawaban_b(soal) {
        $("#b_soal"+soal).click(function () {
            $('#check-a-soal'+soal).hide();
            $('#check-b-soal'+soal).show();
            $('#check-c-soal'+soal).hide();
            $('#check-d-soal'+soal).hide();
        });
    }

    function buat_pilih_jawaban_c(soal) {
        $("#c_soal"+soal).click(function () {
            $('#check-a-soal'+soal).hide();
            $('#check-b-soal'+soal).hide();
            $('#check-c-soal'+soal).show();
            $('#check-d-soal'+soal).hide();
        });
    }

    function buat_pilih_jawaban_d(soal) {
        $("#d_soal"+soal).click(function () {
            $('#check-a-soal'+soal).hide();
            $('#check-b-soal'+soal).hide();
            $('#check-c-soal'+soal).hide();
            $('#check-d-soal'+soal).show();
        });
    }

    for (i = 1; i <= 10; i++) {
        buat_soal_pertanyaan(i);
        buat_pilih_jawaban_a(i);
        buat_pilih_jawaban_b(i);
        buat_pilih_jawaban_c(i);
        buat_pilih_jawaban_d(i);
        buat_jawaban_a(i);
        buat_jawaban_b(i);
        buat_jawaban_c(i);
        buat_jawaban_d(i);
    }
    // batas fungsi preview pertanyaan //

    

});
