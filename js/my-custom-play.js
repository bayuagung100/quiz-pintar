$(document).ready(function () {
    var pc = $("#count_player_play").attr('pc');
    var room = $("#player_played").attr('room');
    var quiz = $("#player_played").attr('quiz');


    setInterval(function() {
        $.ajax({
            type: 'POST',
            url: '../ajax/room/count-player-play.php',
            data: {
                code:pc,
            },
            success: function(html) {
                document.getElementById('count_player_play').innerText = html;
            }
        });
        
    }, 1000);
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

});