$(document).ready(function () {
    var room = $("#player_played").attr('room');
    var quiz = $("#player_played").attr('quiz');

    // setInterval(function() {
    //     $.ajax({
    //         type: 'POST',
    //         url: '../ajax/room/count-player-play.php',
    //         data: {
    //             code:pc,
    //         },
    //         success: function(html) {
    //             document.getElementById('count_player_play').innerText = html;
    //         }
    //     });
        
    // }, 1000);
    // setInterval(function() {
    //         $.ajax({
    //             url: "../ajax/room/played-player.php",
    //             method: "post",
    //             data: {
    //                 code: room,
    //             },
    //             success: function (data) {
    //                 $("#player_played").html(data);
    //             }
    //         });
    // }, 1000);

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