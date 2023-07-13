<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK YADIKA</title>

    <!-- CSS FILES -->
    <link href="<?php echo base_url() ?>assets/website/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/website/css/bootstrap-icons.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/website/css/templatemo-kind-heart-charity.css" rel="stylesheet">





    <!-- MODAL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- MODAL -->




</head>

<body id="section_1">

    <header class="site-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-geo-alt me-2"></i>
                        Soreang Bandung
                    </p>

                    <p class="d-flex mb-0">
                        <i class="bi-envelope me-2"></i>

                        <a href="<?php echo base_url() ?>assets/website/mailto:info@company.com">
                            info@smkyadikasoreang.sch.id
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url() ?>home">
                <img src="<?php echo base_url() ?>assets/website/images/logo.png" class="logo img-fluid" alt="Kind Heart Charity">
                <span>
                    SMK YADIKA
                    <small>Sekolah Berbasis Digital</small>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="<?php echo base_url() ?>home">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#">Profil Sekolah</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#">Visi & Misi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#">Info PSB</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                            <a class="nav-link click-scroll dropdown-toggle" href="<?php echo base_url() ?>assets/website/#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url() ?>assets/website/news.html">News Listing</a></li>

                                <li><a class="dropdown-item" href="<?php echo base_url() ?>assets/website/news-detail.html">News Detail</a></li>
                            </ul>
                        </li> -->

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#">Hubungi Kami</a>
                    </li>

                    <?php if ($this->session->userdata('name')) { ?>



                        <li class="nav-item dropdown">
                            <a class="nav-link custom-btn custom-border-btn btn click-scroll dropdown-toggle" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hai, <span class="font-bold"> <?php echo $this->session->userdata('name') ?></span></a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url() ?>dashboard">Profil</a></li>

                                <li><a class="dropdown-item" href="<?php echo base_url() ?>login/logout">Logout</a></li>
                            </ul>
                        </li>




                    <?php } else { ?>

                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="<?php echo base_url() ?>login">Login</a>
                        </li>

                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>

    <main>

        <section class="hero-section hero-section-full-height">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-12 p-0">
                        <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo base_url() ?>assets/website/images/slide/1.jpg" class="carousel-image img-fluid" alt="...">

                                    <!-- <div class="carousel-caption d-flex flex-column justify-content-end">
                                            <h1>SMK YADIKA</h1>
                                            
                                            <p>Soreang Bandung</p>
                                        </div> -->
                                </div>

                                <div class="carousel-item">
                                    <img src="<?php echo base_url() ?>assets/website/images/slide/2.jpg" class="carousel-image img-fluid" alt="...">

                                    <!-- <div class="carousel-caption d-flex flex-column justify-content-end">
                                            <h1>SMK YADIKA</h1>
                                            
                                            <p>Soreang Bandung</p>
                                        </div> -->
                                </div>


                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>




        <?php if ($this->session->userdata('level') == 2) { ?>

            <section class="testimonial-section section-padding section-bg">
                <div class="container">


                    <div class="row">
                        <div class="col">
                            <!-- <a href="<?php echo base_url() ?>peminjaman/tambah" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Pinjam Barang</a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pinjam Barang</button>

                        </div>
                        <div class="col">
                            <!-- <a href="<?php echo base_url() ?>helpdesk/tambah" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Help Desk</a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Help Desk</button>
                        </div>
                        <div class="w-100"></div>
                    </div>





                </div>
            </section>


        <?php } else { ?>



        <?php } ?>
















        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h4 class="modal-title">Pinjam Barang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">











                        <form action="<?php echo base_url() ?>home" method="get" id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                            <h3>Step-1</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">NISN/NIP</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" value="<?php echo $nisn ?>" name="nisn" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                                        <div class="row mb-3">
                                                            <label for="txtLastNameBilling" class="col-lg-3 col-form-label">Mobile No.</label>
                                                            <div class="col-lg-9">
                                                                <input id="txtLastNameBilling" name="txtLastNameBilling" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Bagian</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <select name="id_bagian" id="id_bagian" class="form-control" required>
                                                    <option value="">Silahkan Pilih</option>
                                                    <?php foreach ($databagian as $u) : ?>
                                                        <option value="<?= $u['id'] ?>"><?= $u['nama_bagian'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h3>Step-2</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Nama Barang</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" value="<?php echo $id_bagian ?>" name="jumlah_pinjam" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Kode Barang</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" value="<?php echo $nisn ?>" name="jumlah_pinjam" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Ketersediaan</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" value="<?php echo $nisn ?>" name="jumlah_pinjam" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Jadwal</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" value="<?php echo $nisn ?>" name="jumlah_pinjam" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Gambar</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" value="<?php echo $nisn ?>" name="jumlah_pinjam" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </fieldset>
                            <h3>Finish</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Nama</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" value="<?php echo $nisn ?>" name="jumlah_pinjam" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">NIP/NISN</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" value="<?php echo $nisn ?>" name="jumlah_pinjam" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Jadwal Pinjam</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" type="date" name="jumlah_pinjam" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-4">
                                            <!-- <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label> -->
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label" for="input-mask">Jadwal Kembali</label>
                                            <div class="col-lg-8">
                                                <!-- <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control"> -->

                                                <input id="input-mask" type="date" name="jumlah_pinjam" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                                        <div class="row mb-3">
                                                            <label for="ddlCreditCardType" class="col-lg-3 col-form-label">Credit Card Type</label>
                                                            <div class="col-lg-9">
                                                                <select id="ddlCreditCardType" name="ddlCreditCardType" class="form-select">
                                                                    <option value="">--Please Select--</option>
                                                                    <option value="AE">American Express</option>
                                                                    <option value="VI">Visa</option>
                                                                    <option value="MC">MasterCard</option>
                                                                    <option value="DI">Discover</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> -->


                            </fieldset>
                            <!-- <h3>Confirm Detail</h3>
                                            <fieldset>
                                                <div class="p-3">
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input me-2" id="customCheck1">
                                                        <label class="form-label" for="customCheck1">I agree with the Terms and Conditions.</label>
                                                    </div>
                                                </div>
                                            </fieldset> -->
                        </form>





                        <!-- <div class="mb-4">
            <label class="form-label" for="input-mask">NISN/NIP</label>
                <input id="input-mask" value="<?php echo $nisn ?>" name="jumlah_pinjam" class="form-control input-mask" readonly>                                                            
            </div>
        
            <div class="mb-4">
                <label class="form-label" for="input-currency">Bagian</label>
                <select name="id_bagian" id="id_bagian" class="form-control" required>
                    <option value="">Silahkan Pilih</option>
                    <?php foreach ($databagian as $u) : ?>
                        <option value="<?= $u['id'] ?>"><?= $u['nama_bagian'] ?></option>
                    <?php endforeach ?>
                </select> 
            </div>


        </div> -->



                        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Lanjut</button>
        </div> -->

                    </div>
                </div>
            </div>





            <div class="modal" id="myModal2">
                <div class="modal-dialog">
                    <div class="modal-content">


                        <div class="modal-header">
                            <h4 class="modal-title">Helpdesk</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>


                        <div class="modal-body">
                            <div class="mb-4">
                                <label class="form-label" for="input-mask">Jumlah Pinjam</label>
                                <input id="input-mask" name="jumlah_pinjam" class="form-control input-mask">
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>









































    </main>

    <footer class="site-footer">


        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <p class="copyright-text mb-0" style="text-align:center">Copyright © 2023</p>
                    </div>



                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="<?php echo base_url() ?>assets/website/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/website/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/website/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url() ?>assets/website/js/click-scroll.js"></script>
    <script src="<?php echo base_url() ?>assets/website/js/counter.js"></script>
    <script src="<?php echo base_url() ?>assets/website/js/custom.js"></script>

</body>

</html>












<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="<?php echo base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
<script src="<?php echo base_url() ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/node-waves/waves.min.js"></script>

<!-- form wizard -->
<script src="<?php echo base_url() ?>assets/libs/jquery-steps/build/jquery.steps.min.js"></script>

<!-- form wizard init -->
<script src="<?php echo base_url() ?>assets/js/pages/form-wizard.init.js"></script>

<script src="<?php echo base_url() ?>assets/js/app.js"></script>