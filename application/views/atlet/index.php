
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>')?>
          <?= $this->session->flashdata('message'); ?>  
          
          <div class="row">

            <div class="col-lg-4 mb-3">

                <!-- Example single danger button -->
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAtlet"> Add Data Atlet</a>
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
                                            <th>Foto</th>
                                            <th>Name</th>
                                            <th>Cabor</th>
                                            <th>Kontingen</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
                                        $no=1;
                                        foreach ($atlet as $a) { ?>
                                            
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <img src="<?= base_url('assets/img/profile/'.$a['foto']);?>" alt="" class="img-thumbnail" style="width:50px;">
                                            </td>
                                            <td><?= $a['name']; ?></td>
                                            <td><?= $a['name_cabor']; ?></td>
                                            <td><?= $a['name_kontingen']; ?></td>
                                            <td> 

                                                <?php

                                                    if ($a['status'] == 1 ) {
                                                        echo "<span class='badge badge-primary'>active</span>";
                                                    } else {
                                                        echo "<span class='badge badge-warning'>no active</span>";
                                                    }
                                                ?>
                                            
                                           </td>
                                            <td>
                                                <h5>
                                                <a href="<?= base_url('Atlet/detail/'.$a['id']);?>" class="badge badge-info" > <i class="fas fa-folder"></i> Detail</a>
                                                <a href="<?= base_url('Atlet/edit/'.$a['id']);?>" class="badge badge-success" > <i class="fas fa-edit"></i> edit</a>
                                                <a href="<?= base_url('Atlet/hapus/'.$a['id']);?>" class="badge badge-danger" > <i class="fas fa-trash-alt"></i> delete</a></h5>
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
<!-- Modal -->
<div class="modal fade" id="addAtlet" tabindex="-1" role="dialog" aria-labelledby="addAtletLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAtletLabel">Add New Atlet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('Atlet/addAtlet')?>" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
                
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Atlet">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="address_atlet" name="address_atlet" placeholder="Alamat Atlet">
                </div>
                <div class="form-group">
                    <select name="kontingen_id" id="kontingen_id" class="form-control">

                        <option value="">--Pilih Kontingen/Daerah--</option>
                        <?php 
                            foreach ($kontingen as $k) {?>
                                
                                <option value="<?= $k['id'];?>"><?= $k['name_kontingen'];?></option>
                        <?php    } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="cabor_id" id="cabor_id" class="form-control">

                        <option value="">--Pilih Cabor--</option>
                        <?php 
                            foreach ($cabor as $c) { ?>
                                
                                <option value="<?= $c['id'];?>"><?= $c['name_cabor'];?></option>
                        <?php    } ?>
                    </select>
                </div>
                <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/default.jpg');?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Foto Atlet</label>
                                    </div>
                                </div>
                            
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