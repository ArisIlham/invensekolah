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

                                <!-- <a class="btn btn-primary" href="<?php echo base_url() ?>customer/tambah" role="button">Tambah Customer</a> -->

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
                            <h4 class="card-title mb-4">Form Tambah Peminjaman</h4>
                            <form action="<?php echo base_url('peminjaman/simpan'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div>



                                            <div class="mb-4">
                                                <label class="form-label" for="input-currency">Nama Barang</label>
                                                <select name="id_barang" id="id_barang" class="form-control" required>
                                                    <option>Silahkan Pilih</option>
                                                    <?php foreach ($databarang as $u) : ?>
                                                        <option value="<?= $u['id'] ?>"><?= $u['nama_barang'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>


                                            <div class="mb-4">
                                                <label class="form-label" for="input-mask">Jumlah Pinjam</label>
                                                <input id="input-mask" name="jumlah_pinjam" class="form-control input-mask">
                                            </div>


                                            <div class="mb-4">
                                                <label class="form-label" for="input-mask">Tgl Pinjam</label>
                                                <input type="date" id="input-mask" name="tgl_pinjam" class="form-control input-mask">
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label" for="input-mask">Tgl Kembali</label>
                                                <input type="date" id="input-mask" name="tgl_kembali" class="form-control input-mask">
                                            </div>




                                        </div>
                                    </div>

                                </div>





                                <div class="col-md-2">
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