<?php foreach ($cabor as $c) {}?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit <?= $title;?></h1>
          <div class="row">
          
            <div class="col-lg-2">
            
                <form action="<?= base_url('cabor/editCabor/')?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name_cabor" name="name_cabor" placeholder="Nama Cabor" value="<?= $c['name_cabor']; ?>">
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Nama Cabor" value="<?= $c['id']; ?>">

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->