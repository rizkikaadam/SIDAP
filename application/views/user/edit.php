
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
          <div class="row">
          
            <div class="col-lg-6">
            
                <?= form_open_multipart('User/edit');?>
            
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?= $user['email'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="name" value="<?= $user['name'];?>" class="form-control">
                        </div>
                        <?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/'. $user['image']);?>" class="img-thumbnail">
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
                    <div class="form-group row justify-content-end">
                    
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" >Edit</button>
                        </div>

                    </div>
                
                
                </form>
            
            </div>
          
          
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->