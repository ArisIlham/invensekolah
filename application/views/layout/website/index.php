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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                    <!-- <li class="nav-item dropdown">
                            <a class="nav-link click-scroll dropdown-toggle" href="<?php echo base_url() ?>assets/website/#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url() ?>assets/website/news.html">News Listing</a></li>

                                <li><a class="dropdown-item" href="<?php echo base_url() ?>assets/website/news-detail.html">News Detail</a></li>
                            </ul>
                        </li> -->
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

        <?php }  ?>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pinjam Barang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="mb-4">
                                        <label class="form-label" for="input-currency">Nama Barang</label>
                                        <select name="id_barang" id="id_barang" class="form-control">
                                            <option>Silahkan Pilih</option>
                                            <?php foreach ($databarang as $u) : ?>
                                                <option value="<?= $u['id'] ?>"><?= $u['nama_barang'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label" for="jumlah_pinjam">Jumlah Pinjam</label>
                                        <input type="number" id="jumlah_pinjam" name="jumlah_pinjam" class="form-control input-mask">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label" for="tgl_pinjam">Tgl Pinjam</label>
                                        <input min="<?= date('Y-m-d'); ?>" type="date" id="tgl_pinjam" name="tgl_pinjam" class="form-control input-mask">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label" for="tgl_kembali">Tgl Kembali</label>
                                        <input min="<?= date('Y-m-d'); ?>" type="date" id="tgl_kembali" name="tgl_kembali" class="form-control input-mask">
                                    </div>

                                    <div class="mb-4">
                                        <input type="hidden" name="user_id" id="user_id" value="<?= $userid ?> ">
                                        <button onclick="tambah_peminjaman()" class="btn btn-primary btn-mini">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function tambah_peminjaman() {
                                let id_barang = document.getElementById('id_barang').value,
                                    jumlah_pinjam = document.getElementById('jumlah_pinjam').value,
                                    tgl_pinjam = document.getElementById('tgl_pinjam').value,
                                    tgl_kembali = document.getElementById('tgl_kembali').value,
                                    user_id = document.getElementById('user_id').value,
                                    data = {
                                        'id_barang': id_barang,
                                        'jumlah_pinjam': jumlah_pinjam,
                                        'tgl_pinjam': tgl_pinjam,
                                        'tgl_kembali': tgl_kembali,
                                        'user_id': user_id,
                                        'method': 'tambah_peminjaman',
                                    }
                                if (id_barang.length == 0 || jumlah_pinjam.length == 0 || tgl_pinjam.length == 0 || tgl_kembali.length == 0 || user_id.length == 0) {
                                    alert('periksa kembali isian mu!')
                                } else {
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?= base_url('home/simpan_peminjaman') ?>',
                                        data: data,
                                        cache: false,
                                        dataType: 'JSON',
                                        success: function(data) {
                                            if (data.message) {
                                                alert(data.message)
                                            }
                                            window.setTimeout(function() {
                                                $("#myModal").modal('hide')
                                                location.reload()
                                            }, 1000)
                                        }
                                    })
                                }
                            }
                        </script>
                    </div>
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
                        <form action="<?= base_url('helpdesk/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="form-label" for="input-mask">Nama Barang</label>
                                <select name="id_barang" id="id_barang" class="form-control">
                                    <option>Silahkan Pilih</option>
                                    <?php foreach ($databarang as $u) : ?>
                                        <option value="<?= $u['id'] ?>"><?= $u['nama_barang'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="input-mask">Kendala</label>
                                <textarea id="kendala" name="kendala" class="form-control input-mask"> </textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="input-mask">Kondisi Gambar</label>
                                <input type="file" id="input-mask" name="gambar_helpdesk" class="form-control input-mask">
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="user_id" value="<?php echo $userid ?>">
                                <button type="submit" class="btn btn-primary btn-mini">Tambah</button>
                            </div>
                            <!-- <script>
                            function tambah_helpdesk() {
                                let id_barang = document.getElementById('id_barang').value,
                                    kendala = document.getElementById('kendala').value,
                                    gambar_helpdesk = document.getElementById('gambar_helpdesk').files[0],
                                    user_id = document.getElementById('user_id').value,
                                    data = {
                                        'id_barang': id_barang,
                                        'kendala': kendala,
                                        'gambar_helpdesk': gambar_helpdesk,
                                        'user_id': user_id,
                                        'method': 'tambah_helpdesk',
                                    }
                                if (id_barang.length == 0 || kendala.length == 0 || !gambar_helpdesk || user_id.length == 0) {
                                    alert('periksa kembali isian mu!')
                                } else {
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?= base_url('home/simpan_helpdesk') ?>',
                                        data: data,
                                        cache: false,
                                        dataType: 'JSON',
                                        success: function(data) {
                                            if (data.message) {
                                                alert(data.message)
                                            }
                                            window.setTimeout(function() {
                                                $("#myModal2").modal('hide')
                                                location.reload()
                                            }, 1000)
                                        }
                                    })
                                }
                            }
                        </script> -->
                        </form>
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