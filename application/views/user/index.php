
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

          <div class="col lg-6">
            <?= $this->session->flashdata('message');?>
          </div>

          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?= base_url('assets/img/profile/').$user['image'] ;?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $user['name'];?></h5>
                <p class="card-text"><?= $user['email'];?></p>
                <p class="card-text"><small class="text-muted">Member Since : <?= date('d F Y',$user['date_created']);?></small></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->