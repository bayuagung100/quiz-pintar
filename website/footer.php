<footer class="footer-section">
    <div class="container">
        <div class="footer-left-pic">
            <img src="<?php echo url("");?>/img/footer-left.png" alt="" style="max-height: 200px;">
        </div>
        <div class="footer-right-pic">
            <img src="<?php echo url("");?>/img/footer-right-new.png" alt="" style="max-height: 200px;">
        </div>
        <a href="#" class="footer-logo">
            <img src="<?php echo url("");?>/img/quiz-pintar.png" alt="">
        </a>
        <!-- <ul class="main-menu footer-menu">
            <li><a href="<?php echo url("");?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo url("dashboard/aktivitas");?>"><i class="fa fa-history"></i> Aktivitas</a></li>
        </ul> -->
        <!-- <div class="footer-social d-flex justify-content-center">
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
        </div> -->
        <div class="copyright"><a href="">Quiz Pintar</a> <?php echo date("Y"); ?> @ All rights reserved</div>
    </div>
</footer>

<!-- <script src="<?php echo url("js/jquery-3.2.1.min.js");?>"></script> -->
<script src="<?php echo url("js/bootstrap.min.js");?>"></script>
<script src="<?php echo url("js/jquery.slicknav.min.js");?>"></script>
<script src="<?php echo url("js/owl.carousel.min.js");?>"></script>
<script src="<?php echo url("js/jquery.sticky-sidebar.min.js");?>"></script>
<script src="<?php echo url("js/jquery.magnific-popup.min.js");?>"></script>
<script src="<?php echo url("js/main.js");?>"></script>

<script>
window.onscroll = function() {
    myFunction()
};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
function join_room(){
        var cdr = $('#code').val();
        if (cdr == null) {
            alert("harus isi");
        }
        window.location.href = "<?php echo url("join");?>/"+cdr;
    }
</script>

<script>
// Get the modal
var modal = document.getElementById("avatar_modal");

// Get the button that opens the modal
var btn = document.getElementById("avatar");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>

</html>