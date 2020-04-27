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


    $("#player_joined").on('click', '#kick_player', function(e){
        var id = $(this).data('id');
        var name = $(this).data('name');
        DeleteNotif(id);
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
            NotifOut();
        }); 
        e.preventDefault();
    });

    
    

});