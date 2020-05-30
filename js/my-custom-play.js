$(document).ready(function () {
    var room = $("#player_played").attr('room');
    var quiz = $("#player_played").attr('quiz');

    $("#end_game").on("click", function(e) {
        Swal.fire({
            title: 'End Game ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/end-game.php',
                    type: 'POST',
                    data: {
                        quiz: quiz,
                        code: room,
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        EndGame(room);
                        window.location.href = response.data[0].url;
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false     
        }).then((result) => {
            
        }); 
        e.preventDefault();
    });
});

$(document).ready(function () {
    var sesi = $('#isi_soal').attr('sesi');
    var id_quiz = $('#isi_soal').attr('id_quiz');
    console.log(id_quiz);
    var jawabanSoal1 = document.forms["isi_soal"]["jawabanSoal1"];
    var jawabanSoal2 = document.forms["isi_soal"]["jawabanSoal2"];
    var jawabanSoal3 = document.forms["isi_soal"]["jawabanSoal3"];
    var jawabanSoal4 = document.forms["isi_soal"]["jawabanSoal4"];
    var jawabanSoal5 = document.forms["isi_soal"]["jawabanSoal5"];
    var jawabanSoal6 = document.forms["isi_soal"]["jawabanSoal6"];
    var jawabanSoal7 = document.forms["isi_soal"]["jawabanSoal7"];
    var jawabanSoal8 = document.forms["isi_soal"]["jawabanSoal8"];
    var jawabanSoal9 = document.forms["isi_soal"]["jawabanSoal9"];
    var jawabanSoal10 = document.forms["isi_soal"]["jawabanSoal10"];

    $("#nextSoal2").click(function () {
        if ($('input[name=jawabanSoal1]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!',
            showLoaderOnConfirm: true,
            // preConfirm: function() {
            //     return new Promise(function(resolve) {
            //         $.ajax({
            //         url: '../ajax/room/cek-status-join.php',
            //         type: 'POST',
            //         data: {
            //             id_user: sesi,
            //             id_quiz: id_quiz,
            //             jawabanSoal1: jawabanSoal1
            //         },
            //         dataType: 'json'
            //         })
            //         .done(function(response){
            //             Swal.fire({
            //                 title: 'Sweet!',
            //                 text: 'Modal with a custom image.',
            //                 imageUrl: 'https://unsplash.it/400/200',
            //                 imageWidth: 400,
            //                 imageHeight: 200,
            //                 imageAlt: 'Custom image',
            //               })
            //         })
            //         .fail(function(){
            //             Swal.fire('Oops...', 'Something went wrong!', 'error');
            //         });
            //     });
            // },
            // allowOutsideClick: false     
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal1').hide();
                $('#nextSoal2').hide();
        
                $('#kumpulan_soal2').show();
                $('#nextSoal3').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#nextSoal3").click(function () {
        if ($('input[name=jawabanSoal2]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal2').hide();
                $('#nextSoal3').hide();
        
                $('#kumpulan_soal3').show();
                $('#nextSoal4').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#nextSoal4").click(function () {
        if ($('input[name=jawabanSoal3]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal3').hide();
                $('#nextSoal4').hide();
        
                $('#kumpulan_soal4').show();
                $('#nextSoal5').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#nextSoal5").click(function () {
        if ($('input[name=jawabanSoal4]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal4').hide();
                $('#nextSoal5').hide();
        
                $('#kumpulan_soal5').show();
                $('#nextSoal6').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#nextSoal6").click(function () {
        if ($('input[name=jawabanSoal5]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal5').hide();
                $('#nextSoal6').hide();
        
                $('#kumpulan_soal6').show();
                $('#nextSoal7').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#nextSoal7").click(function () {
        if ($('input[name=jawabanSoal6]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal6').hide();
                $('#nextSoal7').hide();
        
                $('#kumpulan_soal7').show();
                $('#nextSoal8').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#nextSoal8").click(function () {
        if ($('input[name=jawabanSoal7]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal7').hide();
                $('#nextSoal8').hide();
        
                $('#kumpulan_soal8').show();
                $('#nextSoal9').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#nextSoal9").click(function () {
        if ($('input[name=jawabanSoal8]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal8').hide();
                $('#nextSoal9').hide();
        
                $('#kumpulan_soal9').show();
                $('#nextSoal10').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#nextSoal10").click(function () {
        if ($('input[name=jawabanSoal9]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                $('#kumpulan_soal9').hide();
                $('#nextSoal10').hide();
        
                $('#kumpulan_soal10').show();
                $('#simpan-jawaban').show();
                window.scrollTo(0, this.offsetTop)
            }
        })
    })

    $("#simpan-jawaban").click(function () {
        if ($('input[name=jawabanSoal10]').is(':checked')) {} else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih jawaban yang benar!',
            });
            return false;
        }

        

        Swal.fire({
            title: 'Sudah Yakin?',
            text: "Kamu tidak bisa kembali ke soal ini lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut!'
          }).then((result) => {
            if (result.value) {
                
                $('#kumpulan_soal10').hide();
                $('#simpan-jawaban').hide();
                
                Swal.fire({
                    icon: 'success',
                    title: 'Selesai...',
                    text: 'sudah selesai!',
                });
            }
        })
    })

    
});