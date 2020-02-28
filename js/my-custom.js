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

    


    // setInterval(function() {
    //     default_player();
    // }, 1000);
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
    setInterval(function() {
        // function default_player() {
            $.ajax({
                url: "../ajax/room/joined-player.php",
                method: "post",
                // dataType: 'json',
                data: {
                    code: room,
                },
                success: function (data) {
                    // console.log(data.length);
                    // if (data.length != data.length) {
                        
                    
                    // document.getElementById('joined_player').innerHtml = data;
                    $("#player_joined").html(data);
                    // setTimeout(refresh, 10000);
                    
                    // } else {
                        // $("#player_joined").html(data);   
                        // $(".join-player .container").attr("style", "height:auto");
                        // clearInterval(refresh);                     
                    // }
                }
            });
        // }
    }, 1000);


    $("#player_joined").on('click', '#kick_player', function(e){
        var id = $(this).data('id');
        var name = $(this).data('name');
        console.log(id);
        
        Swal.fire({
            title: 'Kick '+name+' ?',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, kick!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                    url: '../ajax/delete.php',
                    type: 'POST',
                    data: {
                        id:id,
                        halaman: quizku
                    },
                    dataType: 'json'
                    })
                    .done(function(response){
                        Swal.fire('Deleted!', response.text, response.icon);
                        load_data();
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
                });
            },
            allowOutsideClick: false     
        }); 
        e.preventDefault();
    });

    

});