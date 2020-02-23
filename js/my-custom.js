$(document).ready(function () {
    var copy = document.getElementById('copy');
    var clipboard = new ClipboardJS(copy);

    var copy2 = document.getElementById('copy-code');
    var clipboard2 = new ClipboardJS(copy2);
});

$(document).ready(function () {
    // e.preventDefault();
    var rc = $("#count_player").attr('rc');
    var room = $("#player_joined").attr('room');

    // load_player();
    // function load_player(page) {
    //     $.ajax({
    //         url: "../ajax/room/joined-player.php",
    //         method: "post",
    //         data: {
    //             code: room,
    //         },
    //         success: function (data) {
    //             // console.log(data);
                
    //             // document.getElementById('joined_player').innerHtml = data;
    //             $("#player_joined").append(data);
    //         }
    //     });
    // };
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
    // setInterval(function() {
        $.ajax({
            url: "../ajax/room/joined-player.php",
            method: "post",
            data: {
                code: room,
            },
            success: function (data) {
                // console.log(data);
                
                // document.getElementById('joined_player').innerHtml = data;
                $("#player_joined").append(data);
            }
        });
    // }, 1000);
});