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
                                        <li class="breadcrumb-item"><a href="#">Saprasku</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Saprasku</li>
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
                                        <h4 class="card-title mb-4">Form Tambah Saprasku</h4>
                                        <form action="<?php echo base_url('saprasku/simpan');?>" method="POST" enctype="multipart/form-data"> 
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        
                                                       
                                                       
                                                        <!-- <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Kode Rek</label>
                                                            <select name="mastercoa_id" id="mastercoa_id" class="form-control" required>
                                                                <option value="<?= $edit['kode'];?>"><?= $edit['kode'];?></option>
                                                                    <?php foreach ($datacoa as $u): ?>
                                                                        <option value="<?= $u['mastercoa_id'] ?>"><?= $u['kode'] ?> - <?= $u['nama'] ?></option>
                                                                    <?php endforeach ?>
                                                            </select> 
                                                        </div> -->

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Kode Barang</label>
                                                            <input id="input-mask" name="kode_barang" class="form-control input-mask">                                                            
                                                        </div>

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Nama Barang</label>
                                                            <input id="input-mask" name="nama_barang" class="form-control input-mask">                                                            
                                                        </div>

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Harga Beli</label>
                                                            <input id="input-mask" name="harga_beli" class="form-control input-mask">                                                            
                                                        </div>                                                         
                                                        
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Jumlah</label>
                                                            <input id="input-mask" name="stok" class="form-control input-mask">                                                            
                                                        </div>   

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Satuan</label>
                                                            <input id="input-mask" name="satuan" class="form-control input-mask">                                                            
                                                        </div> 

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Kondisi</label>
                                                            <input id="input-mask" name="kondisi" class="form-control input-mask">                                                            
                                                        </div>   
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask"> Gambar</label>
                                                            <input type="file" id="input-mask" name="gambar" class="form-control input-mask">                                                            
                                                        </div>   

                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>





                                            <div class="col-md-3">
                                                <div class="float-end d-none d-md-block">
                                                    <div class="dropdown">                    
                                                        <input type="hidden" name="user_id" value="<?php echo $userid ?> ">                                      
                                                        <button type="submit" class="btn btn-primary btn-mini">Tambah</button>
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

                               
      
