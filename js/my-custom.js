$(document).ready(function () {
    var copy = document.getElementById('copy');
    var clipboard = new ClipboardJS(copy);

    var copy2 = document.getElementById('copy-code');
    var clipboard2 = new ClipboardJS(copy2);

    
});

$(document).ready(function () {
    var rc = $("#count_player").attr('rc');
    var room = $("#player_joined").attr('room');
    var quiz = $("#player_joined").attr('quiz');

    var test_id = $("#kick_player").data('id');

    var lastid = null;
    // var status_notif = setInterval(notif,1000);

    setInterval(function() {
        $.ajax({
            type: 'POST',
            url: '../ajax/room/count-player.php',
            data: {
                code:rc,
            },
            success: function(html) {
                document.getElementById('count_player').innerText = html;
            }
        });
        
    }, 1000);
    setInterval(function() {
            $.ajax({
                url: "../ajax/room/joined-player.php",
                method: "post",
                data: {
                    code: room,
                },
                success: function (data) {
                    $("#player_joined").html(data);
                }
            });
    }, 1000);

    // function mulai_game(room) {
    //     $.ajax({
    //         url: '../ajax/room/cek-status-join.php',
    //         method: "post",
    //         data: {
    //             action: 'play',
    //             code: room,
    //         },
    //         success: function (data) {
    //             console.log(data);
    //         }
    //     });
    // }
    $("#mulai_game").on("click", function() {
        var cek = document.getElementById('count_player').textContent;
        if (cek == 0) {
            Swal.fire('Oops...', 'Tidak ada player di dalam room!', 'error');
        } else {
            $.ajax({
                url: '../ajax/room/mulai-game.php',
                method: "post",
                data: {
                    quiz: quiz,
                    code: room,
                },
                success: function (response) {
                    // let data_player = [];
                    
                    // let timerInterval
                    
                    // response.player[0].forEach(e => {
                    //     data_player.push(
                    //         {
                    //             id_player: e.id,
                    //             nama: e.nama,
                    //             avatar: e.avatar,
                    //             ranked: e.ranked,
                    //             progress: e.progress,
                    //             point: e.point
                    //         }
                            
                    //         );
                    // });
                    // console.log(response.player[0]);

                    // MulaiGame(room, response.player[0]);
                    
                    Swal.fire({
                        title: 'Game Dimulai!',
                        html: 'Dalam waktu <b></b> detik.',
                        timer: 5000,
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            MulaiGame(room, response.player[0]);
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                b.textContent = Math.ceil(swal.getTimerLeft() / 1000)
                                }
                            }
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location.href = response.data[0].url;
                        }
                    });
                }
            });
        }
    });

    $("#player_joined").on('click', '#kick_player', function(e){
        var id = $(this).data('id');
        var name = $(this).data('name');
        
        Swal.fire({
            title: 'Kick '+name+' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, kick!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/room/cek-status-join.php',
                    type: 'POST',
                    data: {
                        action: 'kick',
                        id: id,
                        name: name,
                        code: room,
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        DeleteNotif(room, id);
                        Swal.fire({
                            icon: response.data[0].icon,
                            title: 'Kicked!',
                            text: response.data[0].text,
                            // onAfterClose: () => {
                            //     NotifOut();
                            // }
                        });
                        // Swal.fire('Kicked!', response.data[0].text, response.data[0].icon);
                        // if (response.data[0].id_tables == "") {
                        //     lastid = null;
                        // } else {
                        //     lastid = response.data[0].id_tables;
                        // }
                        // console.log(lastid);
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false     
        }).then((result) => {
            NotifOut(room);
        }); 
        e.preventDefault();
    });

    
    

});