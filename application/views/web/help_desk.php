<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav style="text-align: center;" class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h2>Sistem Peminjaman Online</h2>
                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Fade In Utility -->
                        <div class="col-lg-12">
                            <div class="card position-relative">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Masukkan NISN dan Bagian</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="text-center">
                                            <img style="max-height: 200px;" src="<?php echo base_url('/asset/gambar/'); ?>logo_yadika.png" class="rounded" alt="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">NISN</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="12345..">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Bagian</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Ruangan dan Alat</option>
                                                <option>Sarana Olahraga</option>
                                                <option>Sarana Lab Kimia/Fisika</option>
                                                <option>Sarana Komputer</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="<?= base_url('helpdesk/formhelpdesk') ?>" class="btn btn-danger" id="cancel-btn">Batal</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

</body>