<footer class="footer-section">
    <div class="container">
        <div class="footer-left-pic">
            <img src="img/footer-left-pic.png" alt="">
        </div>
        <div class="footer-right-pic">
            <img src="img/footer-right-pic.png" alt="">
        </div>
        <a href="#" class="footer-logo">
            <img src="./img/quiz-pintar.png" alt="">
        </a>
        <ul class="main-menu footer-menu">
            <li><a href="home.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="review.html"><i class="fa fa-history"></i> Aktivitas</a></li>
        </ul>
        <div class="footer-social d-flex justify-content-center">
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
        </div>
        <div class="copyright"><a href="">Quiz Pintar</a> <?php echo date("Y"); ?> @ All rights reserved</div>
    </div>
</footer>

<script src="<?php echo $set['url'];?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo $set['url'];?>js/bootstrap.min.js"></script>
<script src="<?php echo $set['url'];?>js/jquery.slicknav.min.js"></script>
<script src="<?php echo $set['url'];?>js/owl.carousel.min.js"></script>
<script src="<?php echo $set['url'];?>js/jquery.sticky-sidebar.min.js"></script>
<script src="<?php echo $set['url'];?>js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo $set['url'];?>js/main.js"></script>

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

</body>

</html>