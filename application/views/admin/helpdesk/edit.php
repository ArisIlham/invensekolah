<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <!-- <h6 class="page-title">Data Ruangan</h6> -->
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#">Helpdesk</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Helpdesk</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <!-- <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-cog me-2"></i> Settings
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div> -->                                         

                                            <!-- <a class="btn btn-primary" href="<?php echo base_url()?>customer/tambah" role="button">Tambah Customer</a> -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Form Edit Helpdesk</h4>
                                        <form action="<?php echo base_url('helpdesk/ubahsimpan');?>" method="POST" enctype="multipart/form-data"> 
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        
                                                       

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Nama User</label>
                                                            <input id="input-mask" name="user_id" value="<?= $edit['nama_user'];?>" class="form-control input-mask">                                                            
                                                        </div>

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Nama Barang</label>
                                                            <select name="id_barang" id="id_barang" class="form-control">
                                                                        <option value="<?= $edit['id'];?>"><?= $edit['nama_barang'];?></option>
                                                                        <?php foreach ($databarang as $u): ?>
                                                                            <option value="<?= $u->id ?>"><?= $u->nama_barang ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>                                                                
                                                        </div>


                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Kendala</label>
                                                            <textarea id="input-mask" name="kendala" class="form-control input-mask"><?= $edit['kendala'];?></textarea>                                                            
                                                        </div>


                                                       
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Kondisi Gambar</label>
                                                            <img width="100" src="<?php echo base_url()?>assets/gambar/<?php echo $edit['gambar'] ?>">
                                                            <input type="file" id="input-mask" value="<?= $edit['gambar'];?>" name="gambar" class="form-control input-mask">                                                            
                                                        </div>                                                      

                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>





                                            <div class="col-md-2">
                                                <div class="float-end d-none d-md-block">
                                                    <div class="dropdown">  
                                                        <!-- <input type="hidden" name="user_id" value="<?php echo $userid ?>" >  -->
                                                        <input name="helpdesk_id" value="<?= $edit['helpdesk_id'];?>" type="hidden">
                                                        <button type="submit" class="btn btn-primary btn-mini">Ubah</button>
                                                        <button type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-warning btn-mini">Kembali</button>
                                                    </div>
                                                </div>
                                            </div>
                                            


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                               
      
