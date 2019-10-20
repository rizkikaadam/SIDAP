
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          <?= form_error('name_kontingen', '<div class="alert alert-danger" role="alert">', '</div>')?>
          <?= $this->session->flashdata('message'); ?>  
          <div class="row">

            <div class="col-lg-4 mb-3">

                <!-- Example single danger button -->
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addKontingen"> Add Kontingen</a>
            </div>

          </div>
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file"></i> Data <?= $title;?></h6>
                </div>
                <div class="card-body">

                    

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php 
                            $no=1;
                            foreach ($kontingen as $k) { ?>
                                
                                <td><?= $no++; ?></td>
                                <td>
                                    <img src="<?= base_url('assets/img/kontingen/'.$k['logo']);?>" alt="" class="img-thumbnail" style="width:50px;">
                                </td>
                                <td><?= $k['name_kontingen']; ?></td>
                                <td><?= $k['address']; ?></td>
                                <td>
                                    <h5>
                                    <a href="<?= base_url('kontingen/detail/'.$k['id']);?>" class="badge badge-info" > <i class="fas fa-folder"></i> Detail</a>
                                    <a href="<?= base_url('kontingen/tampilEdit/'.$k['id']);?>" class="badge badge-success" > <i class="fas fa-edit"></i> edit</a>
                                    <a href="<?= base_url('kontingen/delete/'.$k['id']);?>" class="badge badge-danger" > <i class="fas fa-trash-alt"></i> delete</a></h5>
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
       <!-- Modal -->
<div class="modal fade" id="addKontingen" tabindex="-1" role="dialog" aria-labelledby="addKontingenLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addKontingenLabel">Add New Kontingen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('kontingen/addKontingen');?>
            <div class="modal-body">
                
                <div class="form-group">
                    <input type="text" class="form-control" id="name_kontingen" name="name_kontingen" placeholder="Nama Kontingen">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Kontingen">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Alamat Kontingen">
                </div>
                <div class="form-group row">
                        <div class="col-sm-2">Logo</div>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>

                        </div>
                    
                    
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