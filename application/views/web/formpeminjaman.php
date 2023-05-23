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
                    <form action="<?= base_url() ?>peminjaman/formpeminjaman" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" value="cari">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Fade In Utility -->
                        <div class="col-lg-12">
                            <div class="card position-relative">
                                <div class="row">
                                    <?php foreach ($barang as $b) : ?>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="card">
                                                <img src="<?= base_url() ?>upload/<?= $b->gmb_barang ?>" class="card-img-top" alt="..." style="width: 50% auto;">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h4><?php echo $b->nama_barang ?></h4>
                                                    </div>
                                                    status: <?php echo $b->st_barang ?>
                                                </div>

                                                <div class="card-footer">
                                                    <a href="https://www.malasngoding.com/card-bootstrap-4/" class="card-link">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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