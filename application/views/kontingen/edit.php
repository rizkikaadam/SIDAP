<?php foreach ($kontingen as $k) {}?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit <?= $title;?> <?= $k['name_kontingen']; ?></h1>
          <div class="row">
          
            <div class="col-lg-8">
            
            <?= form_open_multipart('Kontingen/edit');?>
                <div class="form-group">
                    <input type="text" class="form-control" id="name_kontingen" name="name_kontingen" placeholder="Nama Kontingen" value="<?= $k['name_kontingen']; ?>" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Kontingen" value="<?= $k['email']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Alamat Kontingen" value="<?= $k['address']; ?>">
                </div>
                <div class="form-group row">
                        <div class="col-sm-2">Logo Kontingen</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/kontingen/'. $k['logo']);?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            
                            </div>

                        </div>
                    
                    
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="ID" value="<?= $k['id']; ?>">
                    <div class="form-group row">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                
                </form>
            
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->