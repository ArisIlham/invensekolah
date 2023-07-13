

            

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
                                    <h6 class="page-title">Dashboard</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Hai, <?php echo $this->session->userdata('nama_user'); ?> Selamat Datang di Sistem Informasi Manajemen Inventaris Sekolah</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-home me-0"></i>
                                            </button>
                                            <!-- <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            





                        <?php                          
                             if($this->session->userdata('level') == '1'){ // Jika role-nya admin                                                                    
                        ?>  


                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/02.png" alt="">
                                            </div>
                                            <h5 class="font-size-13 text-uppercase text-white-50">Total Dipinjam</h5>
                                            <h4 class="fw-medium font-size-24"><?php echo $totalpinjam['jumlah']; ?> </h4>
                                            <!-- <div class="mini-stat-label bg-danger">
                                                <p class="mb-0">- 28%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-end">
                                                <a href="<?php echo base_url()?>peminjaman" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <a href="<?php echo base_url()?>peminjaman" class="text-white-50"><p class="text-white-50 mb-0 mt-1">Selengkapnya</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/01.png" alt="">
                                            </div>
                                            <h5 class="font-size-13 text-uppercase text-white-50">Total Helpdesk</h5>
                                            <h4 class="fw-medium font-size-24"><?php echo $totalhelpdesk['jumlah']; ?> <i
                                                    class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                            <!-- <div class="mini-stat-label bg-success">
                                                <p class="mb-0">+ 12%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-end">
                                                <a href="<?php echo base_url()?>helpdesk" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>
                                            <a href="<?php echo base_url()?>helpdesk" class="text-white-50"><p class="text-white-50 mb-0 mt-1">Selengkapnya</p></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/03.png" alt="">
                                            </div>
                                            <h5 class="font-size-13 text-uppercase text-white-50">Total Pengajuan</h5>
                                            <h4 class="fw-medium font-size-24"><?php echo $totalpengajuan['jumlah']; ?> <i
                                                    class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                            <!-- <div class="mini-stat-label bg-info">
                                                <p class="mb-0"> 00%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-end">
                                                <a href="<?php echo base_url()?>pengajuan" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <a href="<?php echo base_url()?>pengajuan" class="text-white-50"><p class="text-white-50 mb-0 mt-1">Selengkapnya</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-13 text-uppercase text-white-50">Total Barang</h5>
                                            <h4 class="fw-medium font-size-24"><?php echo $totalbarang['jumlah']; ?><i
                                                    class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-end">
                                                <a href="<?php echo base_url()?>saprasku" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <a href="<?php echo base_url()?>saprasku" class="text-white-50"><p class="text-white-50 mb-0 mt-1">Selengkapnya</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php
                              }
                            ?>















                        <?php                          
                             if($this->session->userdata('level') == '3'){ // Jika role-nya admin                                                                    
                        ?>  


                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/02.png" alt="">
                                            </div>
                                            <h5 class="font-size-13 text-uppercase text-white-50">Total Pengajuan</h5>
                                            <h4 class="fw-medium font-size-24"><?php echo $totalpengajuan['jumlah']; ?> </h4>
                                           
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-end">
                                                <a href="<?php echo base_url()?>pengajuan" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <a href="<?php echo base_url()?>pengajuan" class="text-white-50"><p class="text-white-50 mb-0 mt-1">Selengkapnya</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


                            <?php
                              }
                            ?>














                        <?php                          
                             if($this->session->userdata('level') == '2'){ // Jika role-nya admin                                                                    
                        ?>  


                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/02.png" alt="">
                                            </div>
                                            <h5 class="font-size-13 text-uppercase text-white-50">Total Dipinjam</h5>
                                            <h4 class="fw-medium font-size-24"><?php echo $totalpinjam['jumlah']; ?> </h4>
                                            <!-- <div class="mini-stat-label bg-danger">
                                                <p class="mb-0">- 28%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-end">
                                                <a href="<?php echo base_url()?>peminjaman" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <a href="<?php echo base_url()?>peminjaman" class="text-white-50"><p class="text-white-50 mb-0 mt-1">Selengkapnya</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="assets/images/services-icon/03.png" alt="">
                                            </div>
                                            <h5 class="font-size-13 text-uppercase text-white-50">Total Helpdesk</h5>
                                            <h4 class="fw-medium font-size-24"><?php echo $totalhelpdesk['jumlah']; ?> </h4>
                                            <!-- <div class="mini-stat-label bg-info">
                                                <p class="mb-0"> 00%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-end">
                                                <a href="<?php echo base_url()?>helpdesk" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <a href="<?php echo base_url()?>helpdesk" class="text-white-50"><p class="text-white-50 mb-0 mt-1">Selengkapnya</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                              }
                            ?>
                            
                        </div>
                        <!-- end row -->

                        <!-- <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Grafik Data Verifikasi Dokumen Perbulan Tahun 2023</h4>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-6">
                                                <div class="text-center">
                                                    <h5 class="mb-0 font-size-20">1</h5>
                                                <p class="text-muted">Diproses</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="text-center">
                                                    <h5 class="mb-0 font-size-20">1</h5>
                                                    <p class="text-muted">Disetujui</p>
                                                </div>
                                            </div>                                            
                                        </div>
        
                                        <div id="overlapping-bars" class="ct-chart ct-golden-section" dir="ltr"></div>
        
                                    </div>
                                </div>
                            </div> 



                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="card-title mb-4">Daftar Grafik</h4>
                                        </div>
                                        <div class="wid-peity mb-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <p class="text-muted">User</p>
                                                        <h5 class="mb-4">8</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-4">
                                                        <span class="peity-line" data-width="100%"
                                                            data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                            data-height="60">1,2,2,3,3,4,4,4,5,5,5,6,6,7,7,8,8,9,9,9</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wid-peity mb-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <p class="text-muted">Karyawan</p>
                                                        <h5 class="mb-4">10</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-4">
                                                        <span class="peity-line" data-width="100%"
                                                            data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                            data-height="60">1,1,1,2,2,2,3,3,3,4,4,4,5,5,5,5,6,6,6,6</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <p class="text-muted">Dokumen</p>
                                                        <h5>1</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-4">
                                                        <span class="peity-line" data-width="100%"
                                                            data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                            data-height="60">1,1,1,1,1,1,2,2,2,2,2,3,3,3,3,3,4,4,4,4</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div> -->

                        



                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->