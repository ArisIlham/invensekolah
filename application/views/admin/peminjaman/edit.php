



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
                                        <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Peminjaman</li>
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
                                        <h4 class="card-title mb-4">Form Edit Peminjaman</h4>
                                        <form action="<?php echo base_url('peminjaman/ubahsimpan');?>" method="POST" enctype="multipart/form-data"> 
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        
                                                       
                                                       
                                                        
                                                        
                                                        <?php                          
                                                        if($this->session->userdata('level') == '2'){ // Jika role-nya user  
                                                        ?>  

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Nama Barang</label>
                                                            <select name="id_barang" id="id_barang" class="form-control" required>
                                                                <option><?= $edit['nama_barang'];?></option>
                                                                    <?php foreach ($databarang as $u): ?>
                                                                        <option value="<?= $u['id'] ?>"><?= $u['nama_barang'] ?></option>
                                                                    <?php endforeach ?>
                                                            </select> 
                                                        </div> 
                                                      

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Jumlah Pinjam</label>
                                                            <input id="input-mask" value="<?= $edit['jumlah_pinjam'];?>" name="jumlah_pinjam" class="form-control input-mask">                                                            
                                                        </div>


                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Tgl Pinjam</label>
                                                            <input type="date" id="input-mask" value="<?= $edit['tgl_pinjam'];?>"name="tgl_pinjam" class="form-control input-mask">                                                            
                                                        </div>    
                                                        
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Tgl Kembali</label>
                                                            <input type="date" id="input-mask" value="<?= $edit['tgl_kembali'];?>" name="tgl_kembali" class="form-control input-mask">                                                            
                                                        </div>   

                                                        <?php
                                                        }
                                                        ?>




                                                        <?php                          
                                                        if($this->session->userdata('level') == '1'){ // Jika role-nya admin  
                                                        ?>  
                                                        
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Nama Barang</label>
                                                            <select name="id_barang" id="id_barang" class="form-control" required>
                                                                <option><?= $edit['nama_barang'];?></option>
                                                                    <?php foreach ($databarang as $u): ?>
                                                                        <option value="<?= $u['id'] ?>"><?= $u['nama_barang'] ?></option>
                                                                    <?php endforeach ?>
                                                            </select> 
                                                        </div> 
                                                      

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Jumlah Pinjam</label>
                                                            <input id="input-mask" value="<?= $edit['jumlah_pinjam'];?>" name="jumlah_pinjam" class="form-control input-mask">                                                            
                                                        </div>


                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Tgl Pinjam</label>
                                                            <input type="date" id="input-mask" value="<?= $edit['tgl_pinjam'];?>"name="tgl_pinjam" class="form-control input-mask">                                                            
                                                        </div>    
                                                        
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Tgl Kembali</label>
                                                            <input type="date" id="input-mask" value="<?= $edit['tgl_kembali'];?>" name="tgl_kembali" class="form-control input-mask">                                                            
                                                        </div>   

                                                        
                                                        <div class="mb-4">
                                                        <label class="form-label">Status</label>
                                                        <select name="status" class="form-control select2">
                                                                <option value="0" ><?=$edit['statuspinjam']?></option>
                                                                <option value="1" <?=$edit['statuspinjam'] == '1' ? ' selected="selected"' : '';?>>Sedang Dipinjam</option> 
                                                                <option value="2" <?=$edit['statuspinjam'] == '2' ? ' selected="selected"' : '';?>>Sudah Dikembalikan</option>
                                                                
                                                        </select>
                                                        </div>  


                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>





                                            <div class="col-md-2">
                                                <div class="float-end d-none d-md-block">
                                                    <div class="dropdown">         
                                                        <input type="hidden" name="peminjaman_id" value="<?= $edit['peminjaman_id'];?>">  
                                                        <input type="hidden" name="id_barang" value="<?= $edit['id_barang'];?>"> 
                                                        <!-- <input type="hidden" name="user_id" value="<?php echo $userid ?> ">                                                 -->
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

                               
      
        <link href="<?php echo base_url()?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">    
        <!-- Bootstrap Css -->
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="<?php echo base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?php echo base_url()?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">



        <script src="<?php echo base_url()?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/select2/js/select2.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>    
        <script src="<?php echo base_url()?>assets/js/pages/form-advanced.init.js"></script>
        <script src="<?php echo base_url()?>assets/js/app.js"></script>