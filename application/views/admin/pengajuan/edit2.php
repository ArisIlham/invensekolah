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
                                        <li class="breadcrumb-item"><a href="#">Customer</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Customer</li>
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
                                        <h4 class="card-title mb-4">Form Edit Customer</h4>
                                        <form action="<?php echo base_url('customer/editsimpan');?>" method="POST" enctype="multipart/form-data"> 
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-date1">NIK</label>
                                                            <input class="form-control" name="nik" value="<?= $edit->nik;?>"type="text" placeholder="NIK" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "dd/mm/yyyy"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-date2">Nama Customer</label>
                                                            <!-- <select class="form-select" aria-label="Default select example">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select> -->
                                                            <input class="form-control" name="nama_cust" value="<?= $edit->nama_cust;?>" type="text" placeholder="Nama Customer" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "mm/dd/yyyy"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-datetime">Tempat Lahir</label>
                                                            <input class="form-control" name="tmp_lahir" value="<?= $edit->tmp_lahir;?>" placeholder="Tempat Lahir" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "yyyy-mm-dd'T'HH:MM:ss"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Tgl Lahir</label>
                                                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $edit->tgl_lahir;?>" placeholder="Tgl Lahir" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "$ 0.00"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Sertifikasi</label>
                                                            <input class="form-control" name="sertifikasi" placeholder="Sertifikasi" value="<?= $edit->sertifikasi;?>" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "$ 0.00"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Bidang / Jenis Training</label>
                                                            <input class="form-control" name="bidang" value="<?= $edit->bidang;?>" placeholder="Bidang" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "$ 0.00"</span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-4 mt-lg-0">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-repeat">Email</label>
                                                            <input id="input-repeat" name="email" value="<?= $edit->email;?>" class="form-control input-mask" placeholder="Email">
                                                            <!-- <span class="text-muted">e.g "9999999999"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">No. HP</label>
                                                            <input id="input-mask" name="no_hp" value="<?= $edit->no_hp;?>" class="form-control input-mask" placeholder="No. HP">
                                                            
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-ip">Gol Darah</label>
                                                            <input id="input-ip" name="gol_darah" value="<?= $edit->gol_darah;?>" class="form-control input-mask" placeholder="Gol Darah">
                                                        
    
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-email">Tgl Expired Lisensi</label>
                                                            <input type="date" name="expired_date" value="<?= $edit->expired_date;?>" class="form-control input-mask" placeholder="Tgl Expired Lisensi">
                                                           
                                                        </div>

                                                        <div class="mb-4">
                                                            <input name="customer_id" type="hidden">
                                                            <label class="form-label" for="input-email">Keterangan</label>
                                                            <input id="input-email" name="keterangan" value="<?= $edit->keterangan;?>" class="form-control input-mask" placeholder="Keterangan">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>












                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <div class="mb-4">                                                                                                                    
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->sertifikat;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->sertifikat;?>"  width="145">
                                                            </a>      
                                                            <label class="form-label" for="input-date1">Sertifikat</label>                                                          
                                                            <input class="form-control" name="sertifikat" value="<?= $edit->sertifikat;?>" type="file" placeholder="Sertifikat" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "dd/mm/yyyy"</span> -->
                                                        </div>
                                                        <div class="mb-4">                                                            
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->ktp;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->ktp;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-date2">KTP</label>
                                                            <input class="form-control" name="ktp" type="file" value="<?= $edit->ktp;?>"placeholder="KTP" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "mm/dd/yyyy"</span> -->
                                                        </div>
                                                        <div class="mb-4">                                                           
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->ijasah;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->ijasah;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-datetime">Ijasah Terakhir</label>
                                                            <input class="form-control" name="ijasah" value="<?= $edit->ijasah;?>"type="file" placeholder="Ijasah Terakhir" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "yyyy-mm-dd'T'HH:MM:ss"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->surat_permohonan;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->surat_permohonan;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-currency">Surat Permohonan</label>
                                                            <input class="form-control" name="surat_permohonan" value="<?= $edit->surat_permohonan;?>"type="file" placeholder="Surat Permohonan" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "$ 0.00"</span> -->
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                
                                                <div class="col-lg-4">
                                                    <div class="mt-4 mt-lg-0">
                                                        <div class="mb-4">
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->surat_pernyataan;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->surat_pernyataan;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-currency">Surat Pernyataan Peserta</label>
                                                            <input class="form-control" name="surat_pernyataan" value="<?= $edit->surat_pernyataan;?>"type="file" placeholder="Surat Pernyataan Peserta" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "$ 0.00"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->surat_keterangan;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->surat_keterangan;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-repeat">Surat Keterangan</label>
                                                            <input class="form-control" name="surat_keterangan" value="<?= $edit->surat_keterangan;?>"type="file" placeholder="Surat Keterangan" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "9999999999"</span> -->
                                                        </div>
                                                        <div class="mb-4">
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->lisensi;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->lisensi;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-mask">Lisensi</label>
                                                            <input class="form-control" name="lisensi" value="<?= $edit->lisensi;?>"type="file" placeholder="Lisensi" id="example-text-input">
                                                            
                                                        </div>
                                                        <div class="mb-4">
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->skp;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->skp;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-ip">SKP</label>
                                                            <input class="form-control" name="skp" type="file" value="<?= $edit->skp;?>"placeholder="SKP" id="example-text-input">
                                                        
    
                                                        </div>                                                        

                                                        
                                                    </div>
                                                </div>



                                                <div class="col-lg-4">
                                                    <div class="mt-4 mt-lg-0">
                                                        <div class="mb-4">
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->laporan_kegiatan;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->laporan_kegiatan;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-email">Laporan Kegiatan 3 Bulanan ( Ahli )</label>
                                                            <input class="form-control" name="laporan_kegiatan" value="<?= $edit->laporan_kegiatan;?>"  type="file" placeholder="Laporan Kegiatan 3 Bulanan ( Ahli )" id="example-text-input">
                                                           
                                                        </div>
                                                        <div class="mb-4">
                                                         <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->paklaring;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->paklaring;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-email">Paklaring</label>
                                                            <input class="form-control" name="paklaring" value="<?= $edit->paklaring;?>"type="file" placeholder="Paklaring" id="example-text-input">
                                                           
                                                        </div>
                                                        <div class="mb-4">
                                                            <a class="image-popup-vertical-fit" href="<?php echo base_url()?>/foto/<?= $edit->pas_photo;?>">
                                                                <img class="img-fluid" alt="" src="<?php echo base_url()?>/foto/<?= $edit->pas_photo;?>"  width="145">
                                                            </a>
                                                            <label class="form-label" for="input-repeat">Pas Photo Background Merah</label>
                                                            <input class="form-control" name="pas_photo" value="<?= $edit->pas_photo;?>" type="file" placeholder="Pas Photo Background Merah" id="example-text-input">
                                                            <!-- <span class="text-muted">e.g "9999999999"</span> -->
                                                        </div>
                                                        <!-- <div class="mb-0">
                                                            <label class="form-label" for="input-mask">Pas Photo Background Putih</label>
                                                            <input class="form-control" type="file" placeholder="Artisanal kale" id="example-text-input">
                                                            
                                                        </div>-->
                                                    </div>                                                    
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="float-end d-none d-md-block">
                                                    <div class="dropdown">  
                                                        <input name="customer_id" type="hidden">
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

                               
      
