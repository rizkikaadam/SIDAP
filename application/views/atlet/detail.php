        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php foreach ($profile_atlet as $pa) {}?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Detail Atlet <?= $pa['name'];?></h1>
          
          <div class="row mb-3">

            <div class="col-lg-3">

                <div class="card">
                    <div class="card-header">
                        Profile
                    </div>
                    <img src="<?= base_url('assets/img/profile/'.$pa['foto']); ?>" class="card-img-top col-sm-12" alt="Foto Profile">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $pa['name']; ?></li>
                        <li class="list-group-item"><?= strtoupper($pa['tmp_lahir'])  . ", " . $pa['tgl_lahir']; ?></li>
                        <li class="list-group-item"><?= $pa['address_atlet']; ?></li>
                        <li class="list-group-item"><?= $pa['name_kontingen']; ?></li>
                        <li class="list-group-item">
                        <?php

                            if ($pa['status'] == 1 ) {
                                echo "<span class='badge badge-primary'>active</span>";
                            } else {
                                echo "<span class='badge badge-warning'>no active</span>";
                            }
                                                                        
                            ?>
                        </li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link"><i class="fas fa-edit"></i>Edit</a>
                        <a href="#" class="card-link">Non active</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <h3>Prestasi Atlet </h3>
                <div class="card" >
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kartu Tanda Pengenal</li>
                        <li class="list-group-item">Akte Kelahiran</li>
                        <li class="list-group-item">Kartu Keluarga</li>
                        <li class="list-group-item">Dokumen Pendukung Lainnya</li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-4">
                <h3>Dokumen Atlet </h3>
                <div class="card" >
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kartu Tanda Pengenal</li>
                        <li class="list-group-item">Akte Kelahiran</li>
                        <li class="list-group-item">Kartu Keluarga</li>
                        <li class="list-group-item">Dokumen Pendukung Lainnya</li>
                    </ul>
                </div>

            </div>

          </div>
          <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                       Document
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>         
                            
            </div>

          </div>

          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->