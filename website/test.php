<?php
include "header.php"; 
?>
<button class="btn-mulai"><div id="mulai_test" class="mulai-text" >Mulai</div></button>
<h3><span>Sisa waktu: </span><span id="time" style="">60:00</span></h3>

<p id="demo"></p>
<script>
$(document).ready(function () {
    
    $("#mulai_test").on("click", function() {
        
        // firebase.database().ref('timer/' + 123).set(
        //     {
        //         time: "60:00"
        //     }
        // );
        timer();
        // // $('#time').text("60:00");
        
        // console.log(asd);
    });
    function timer() {
        var ref = firebase.database().ref('timer/' + 123);
        ref.on('value', function(snapshot) {
            var key = snapshot.key;
            var val = snapshot.val();
            // sp = val.time.split(':');
            
            // var interval = setInterval(function() {
            //     // console.log(val);
            //     var timer = val.time.split(':');
            //     //by parsing integer, I avoid all extra string processing
            //     var minutes = parseInt(timer[0], 10);
            //     var seconds = parseInt(timer[1], 10);
            //     --seconds;
            //     minutes = (seconds < 0) ? --minutes : minutes;
            //     if (minutes < 0) clearInterval(interval);
            //     seconds = (seconds < 0) ? 59 : seconds;
            //     seconds = (seconds < 10) ? '0' + seconds : seconds;
            //     //minutes = (minutes < 10) ?  minutes : minutes;
            //     // $('#time').html(minutes + ':' + seconds);
            //     //  
            //     // time = minutes + ':' + seconds;
            //     ref.update(
            //         {
            //             time: minutes+":"+seconds
            //         }
            //     )
            //     console.log(seconds);
            // }, 1000);
        })
    }
    
    
    // first = 1;
    // last = 2;
    // $i = first;
    // if (data == null) {
    //     $i = last+1;
    // }

    timer();
   
    
    var time = $('#time').text();
    var pisah = time.split(':');
    var min = pisah[0];
    var sec = pisah[1];
    var detik = min*60;
    var j = 100/detik;
    var k = 250/detik;
    // var elem = document.getElementById("timeLeft");
    // width = 100;
    // point = 2500;
    // ttl_soal = 10;
    // var id = setInterval(frame, 1000);
    // function frame() {
    //     if (width <= 0) {
    //         clearInterval(id);
            
    //     } else {
    //         width=width-j;
    //         point=point-k;
    //         // console.log("sisa waktu: "+width);
    //         // console.log("sisa point (bulat): "+parseInt(point));
    //         // console.log("sisa point: "+point);
    //         elem.style.width = width + "%";
    //     }
    // }

    //countdown id time
    
})
</script>
<?php
include "footer-play.php"; 
?>