<?php
include "header.php"; 
$code = $_GET['code'];
?>
<div class="header-join">
    <div class="header-bar-join d-flex">
        <a href="#" class="site-logo">
            <img src="<?php echo url(""); ?>/img/quiz-pintar.png" alt="">
        </a>
    </div>
</div>
<section class="join-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center text-white">
                <h5>Untuk memainkan game ini</h5>
            </div>
            <div class="col-sm-12 join-step text-center text-white">
                <p><h5>1. Gunakan perangkat apapun untuk membuka</h5></p>
                <div class="form-group">
                    <input id="clipboard" class="input-step" type="text" value="<?php echo url("join/").$code;?>" readonly> 
                    <i id="copy" data-clipboard-target="#clipboard" class="fa fa-clipboard icon"> copy</i>
                </div>
                <p>atau</p>
                <p><h5>2. Bagikan Room Code</h5></p>
                <div class="form-group">
                    <input id="clipboard-code" class="input-step-code" type="text" value="<?php echo $code;?>" readonly>
                </div>
            </div>
            <div class="col-sm-12 join-player">
                <button class="btn-mulai"><div class="mulai-text">Mulai</div></button>
                <div class="container">
                    <div class="online">
                        <h4><i class="fa fa-dot-circle-o" style="color: #00C985;" ></i> Player (0)</h4>
                    </div>
                    <div class="row" style="padding-top:20px">
                        <div class="col-sm-3" style="padding:20px">
                            <div class="card-player">
                                <div class="delete-player">
                                <i class="fa fa-close" style="color:red;cursor:pointer"></i>
                                </div>
                                <div><img src="<?php echo url('img/avatar/monster.png');?>" style="width:65px"/></div>
                                
                                <div class="name-player">
                                    <h3>asdasdasdasdasdasdas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" style="padding:20px">
                            <div class="card-player">
                                <div class="delete-player">
                                <i class="fa fa-close" style="color:red;cursor:pointer"></i>
                                </div>
                                <div><img src="<?php echo url('img/avatar/monster.png');?>" style="width:65px"/></div>
                                
                                <div class="name-player">
                                    <h3>asdasdasdasdasdasdas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" style="padding:20px">
                            <div class="card-player">
                                <div class="delete-player">
                                <i class="fa fa-close" style="color:red;cursor:pointer"></i>
                                </div>
                                <div><img src="<?php echo url('img/avatar/monster.png');?>" style="width:65px"/></div>
                                
                                <div class="name-player">
                                    <h3>asdasdasdasdasdasdas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" style="padding:20px">
                            <div class="card-player">
                                <div class="delete-player">
                                <i class="fa fa-close" style="color:red;cursor:pointer"></i>
                                </div>
                                <div><img src="<?php echo url('img/avatar/monster.png');?>" style="width:65px"/></div>
                                
                                <div class="name-player">
                                    <h3>asdasdasdasdasdasdas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" style="padding:20px">
                            <div class="card-player">
                                <div class="delete-player">
                                <i class="fa fa-close" style="color:red;cursor:pointer"></i>
                                </div>
                                <div><img src="<?php echo url('img/avatar/monster.png');?>" style="width:65px"/></div>
                                
                                <div class="name-player">
                                    <h3>asdasdasdasdasdasdas</h3>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section>
<?php
include "footer-join.php"; 

?>