<section class="content-header">
    <div class="container-fluid">
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-default color-palette-box">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-bar"></i>
                    Aktivitas
                </h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- jika tidak ada data -->
                <div class="text-center">
                    <h3>Buat Quiz Anda Sendiri</h3>
                    <a href="<?php echo url("dashboard/buat-quiz"); ?>" class="buat-quiz-btn"><i
                            class="fas fa-plus-circle"></i> Buat</a>
                    <br>
                    <br>
                    <img src="<?php echo url("img/empty_myquiz.png");?>" />
                </div>

                <!-- jika ada data -->
                <!-- <div class="card card-default color-palette-box">
              <div class="card-body">
                <div class="row">
                  jika image kosong
                  <div class="col-sm-3 text-center" style="background:#C4C4C4">
                    <h3 style="line-height:250px;color:white">Image</h3>
                  </div>
                  <div class="col-sm-3 text-center" >
                    <img class="img-responsive" src="<?php echo url("img/empty_myquiz.png");?>"/>
                  </div>
                  <div class="col-sm-6">
                    <br>
                    <h3>Belajar Matematika</h3>
                    <br>
                    <p>Belajar matematika itu menyenangkan ...</p>
                    <button class="btn btn-success">Matematika</button>
                  </div>
                  <div class="col-sm-3 text-center">
                    <a href="#">
                      <i class='fas fa-play' style='font-size:100px;color:pink;line-height:250px'></i>
                    </a>
                  </div>
                </div>
              </div>
            </div> -->

            </div>

        </div>
    </div>
</section>