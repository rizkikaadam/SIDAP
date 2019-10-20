
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          <?= form_error('name_cabor', '<div class="alert alert-danger" role="alert">', '</div>')?>
          <?= $this->session->flashdata('message'); ?>  
          <div class="row">
          
            <div class="col-lg-4 mb-3">

                <!-- Example single danger button -->
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCabor" > Add Cabang Olahraga</a>
            </div>

          </div>

                <div class="row">

                    <div class="col-lg-12">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><?= $title;?></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
                                        $no=1;
                                        foreach ($cabor as $c) { ?>
                                            
                                            <td><?= $no++; ?></td>
                                            <td><?= $c['name_cabor']; ?></td>
                                            <td>
                                                <h5>
                                                <a href="<?= base_url('cabor/edit/'.$c['id']);?>" class="badge badge-success" > <i class="fas fa-edit"></i> edit</a>
                                                <a href="<?= base_url('cabor/delete/'.$c['id']);?>" class="badge badge-danger" > <i class="fas fa-trash-alt"></i> delete</a></h5>
                                            </td>

                                        
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- Akhir data -->

                    </div>

                </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Modal Tambah data -->
        <div class="modal fade" id="addCabor" tabindex="-1" role="dialog" aria-labelledby="addCaborLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCaborLabel">Add New Cabang Olahraga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="<?= base_url('cabor/addCabor/')?>" method="post">
                    <div class="modal-body">
                        
                    <div class="form-group">
                        <input type="text" class="form-control" id="name_cabor" name="name_cabor" placeholder="Nama Cabor">
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    <!-- Akhir Modal Tambah data -->
    
