<?php foreach ($kontingen as $k) {} ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Detail <?= $title;?> <?= $k['name_kontingen'];  ?> </h1>
            <div class="card mb-3 " style="max-width: 540px;">
                <div class="card-header">
                    Profile
                </div>
                <div class="row no-gutters ">
                    <div class="col-md-4">
                         <img src="<?= base_url('assets/img/kontingen/'.$k['logo']); ?>" class="card-img-top col-sm-12 m-3" alt="Foto Profile">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $k['name_kontingen']; ?></h5>
                        <p class="card-text"><?= $k['address']; ?></p>
                        <p class="card-text"><h4><span class="badge badge-secondary">Jumlah Atlet</span></h4></p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <p class="card-text"><a href="<?= base_url('kontingen/tampilEdit/'. $k['id']); ?>" class="card-link"><i class="fas fa-edit"></i>Edit</a></p>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->