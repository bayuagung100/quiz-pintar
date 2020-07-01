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
                        EndGame2(room);
                        EndGame3(room);
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
    var code = $('#isi_soal').attr('code');
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
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal1: jawabanSoal1.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal1').hide();
                        $('#nextSoal2').hide();
                
                        $('#kumpulan_soal2').show();
                        $('#nextSoal3').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("2/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false     
          }).then((result) => {

        })

        // InGameMuridUpdate(code, sesi, '1/10');

        // $('#kumpulan_soal1').hide();
        // $('#nextSoal2').hide();

        // $('#kumpulan_soal2').show();
        // $('#nextSoal3').show();
        // window.scrollTo(0, this.offsetTop)
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal2: jawabanSoal2.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal2').hide();
                        $('#nextSoal3').hide();
                
                        $('#kumpulan_soal3').show();
                        $('#nextSoal4').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("3/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false     
          }).then((result) => {
              
        })

        // InGameMuridUpdate(code, sesi, '2/10');

        // $('#kumpulan_soal2').hide();
        // $('#nextSoal3').hide();

        // $('#kumpulan_soal3').show();
        // $('#nextSoal4').show();
        // window.scrollTo(0, this.offsetTop)
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal3: jawabanSoal3.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal3').hide();
                        $('#nextSoal4').hide();
                
                        $('#kumpulan_soal4').show();
                        $('#nextSoal5').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("4/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false     
          }).then((result) => {

        })

        // InGameMuridUpdate(code, sesi, '3/10');

        // $('#kumpulan_soal3').hide();
        // $('#nextSoal4').hide();

        // $('#kumpulan_soal4').show();
        // $('#nextSoal5').show();
        // window.scrollTo(0, this.offsetTop)
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal4: jawabanSoal4.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal4').hide();
                        $('#nextSoal5').hide();
                
                        $('#kumpulan_soal5').show();
                        $('#nextSoal6').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("5/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false     
          }).then((result) => {

        })

        // InGameMuridUpdate(code, sesi, '4/10');

        // $('#kumpulan_soal4').hide();
        // $('#nextSoal5').hide();

        // $('#kumpulan_soal5').show();
        // $('#nextSoal6').show();
        // window.scrollTo(0, this.offsetTop)
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal5: jawabanSoal5.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal5').hide();
                        $('#nextSoal6').hide();
                
                        $('#kumpulan_soal6').show();
                        $('#nextSoal7').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("6/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false 
          }).then((result) => {
            
        })

        // InGameMuridUpdate(code, sesi, '5/10');

        // $('#kumpulan_soal5').hide();
        // $('#nextSoal6').hide();

        // $('#kumpulan_soal6').show();
        // $('#nextSoal7').show();
        // window.scrollTo(0, this.offsetTop)
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal6: jawabanSoal6.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal6').hide();
                        $('#nextSoal7').hide();
                
                        $('#kumpulan_soal7').show();
                        $('#nextSoal8').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("7/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false 
          }).then((result) => {
            
        })

        // InGameMuridUpdate(code, sesi, '6/10');

        // $('#kumpulan_soal6').hide();
        // $('#nextSoal7').hide();

        // $('#kumpulan_soal7').show();
        // $('#nextSoal8').show();
        // window.scrollTo(0, this.offsetTop)
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal7: jawabanSoal7.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal7').hide();
                        $('#nextSoal8').hide();
                
                        $('#kumpulan_soal8').show();
                        $('#nextSoal9').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("8/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false 
          }).then((result) => {
            
        })

        // InGameMuridUpdate(code, sesi, '7/10');

        // $('#kumpulan_soal7').hide();
        // $('#nextSoal8').hide();

        // $('#kumpulan_soal8').show();
        // $('#nextSoal9').show();
        // window.scrollTo(0, this.offsetTop)
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal8: jawabanSoal8.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal8').hide();
                        $('#nextSoal9').hide();
                
                        $('#kumpulan_soal9').show();
                        $('#nextSoal10').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("9/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false 
          }).then((result) => {
            
        })

        // InGameMuridUpdate(code, sesi, '8/10');

        // $('#kumpulan_soal8').hide();
        // $('#nextSoal9').hide();

        // $('#kumpulan_soal9').show();
        // $('#nextSoal10').show();
        // window.scrollTo(0, this.offsetTop)
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal9: jawabanSoal9.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal9').hide();
                        $('#nextSoal10').hide();
                
                        $('#kumpulan_soal10').show();
                        $('#simpan-jawaban').show();
                        window.scrollTo(0, this.offsetTop)
                        $('#texSoal').text("10/10");
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false 
          }).then((result) => {
            
        })

        // InGameMuridUpdate(code, sesi, '9/10');

        // $('#kumpulan_soal9').hide();
        // $('#nextSoal10').hide();

        // $('#kumpulan_soal10').show();
        // $('#simpan-jawaban').show();
        // window.scrollTo(0, this.offsetTop)
    })

    $("#simpan-jawaban").click(function (e) {
        e.preventDefault();
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
            confirmButtonText: 'Ya, lanjut!',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-jawaban.php',
                    type: 'POST',
                    data: {
                        id_user: sesi,
                        id_quiz: id_quiz,
                        room: code,
                        jawabanSoal10: jawabanSoal10.value,
                        sisaPoint: parseInt(point/ttl_soal)
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.data[0].jawaban == "benar") {
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Benar!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else if(response.data[0].jawaban == "salah"){
                            // console.log(response.data[0]);
                            Swal.fire({
                                title: 'Salah!',
                                text: response.data[0].motivasi,
                                imageUrl: 'https://unsplash.it/400/200',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Ads',
                              })
                        } else {
                            Swal.fire('Oops...', 'Something went wrong!', 'error');
                        }
                        InGameMuridUpdate(code, sesi, response.data[0].leaderboard[0].point, response.data[0].leaderboard[0].progress, response.data[0].leaderboard[0].ranked);

                        $('#kumpulan_soal10').hide();
                        $('#simpan-jawaban').hide();

                        $('#section_murid').hide();
                        $('#section_show_lederboard').show();
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Selesai...',
                            text: 'sudah selesai!',
                        });

                        ShowLeaderboardCount(code);
                        ShowLeaderboard(code);
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false 
          }).then((result) => {
            
        })

        // InGameMuridUpdate(code, sesi, '10/10');

        // $('#kumpulan_soal10').hide();
        // $('#simpan-jawaban').hide();


        // $('#section_murid').hide();
        // $('#section_show_lederboard').show();
        
        // Swal.fire({
        //     icon: 'success',
        //     title: 'Selesai...',
        //     text: 'sudah selesai!',
        // });

        // ShowLeaderboardCount(code);
        // ShowLeaderboard(code);
        
    })

    
});