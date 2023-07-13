<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.css">

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

                                <a class="btn btn-primary" href="<?php echo base_url() ?>peminjaman/tambah" role="button">Tambah Peminjaman</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Tgl Kembali</th>
                                        <th>Status</th>
                                        <th style="text-align:center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 0;
                                    if ($datapeminjaman) {
                                        foreach ($datapeminjaman as $u) {
                                    ?>
                                            <tr>
                                                <td width="5%" style="text-align:center"><?php echo ++$no ?></td>
                                                <td><?php echo $u['nama_user'] ?></td>
                                                <td><?php echo $u['nama_barang'] ?></td>
                                                <td><?php echo $u['jumlah_pinjam'] ?></td>
                                                <td><?php echo $u['tgl_pinjam'] ?></td>
                                                <td><?php echo $u['tgl_kembali'] ?></td>
                                                <td><?php if ($u['status'] == "1") { ?>
                                                        <a class="btn btn-primary" title="Sedang Dipinjam"><i class="icon-remove icon-white"> </i> Sedang Dipinjam</a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-success" title="Sudah Dikembalikan"><i class="icon-check icon-white"> </i>Sudah Dikembalikan</a>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align:center">

                                                    <?php if ($u['status'] == "1") { ?>
                                                        <a href="<?= base_url('peminjaman/ubah/' . $u['peminjaman_id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('peminjaman/hapus/' . $u['peminjaman_id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    <?php } else { ?>
                                                        <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('peminjaman/hapus/' . $u['peminjaman_id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>

                                                </td>


                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->












    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>






    <script type="text/javascript">
        // fungsi untuk hapus data
        //pilih selector dari table id datacustomer dengan class .hapuscustomer
        $('#datatable').on('click', '.hapuscustomer', function() {
            var peminjaman_id = <?php echo $u['peminjaman_id']; ?>;
            swal({
                title: 'Konfirmasi',
                text: "Anda ingin menghapus ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('customer/hapus') ?>",
                        method: "post",
                        beforeSend: function() {
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                onOpen: () => {
                                    swal.showLoading()
                                }
                            })
                        },
                        data: {
                            peminjaman_id: peminjaman_id
                        },
                        success: function(data) {
                            swal(
                                'Hapus',
                                'Berhasil Terhapus',
                                'success'
                            )
                            location.reload(true);
                            //datatable.ajax.reload(null, false)
                        }
                    })
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Batal',
                        'Anda membatalkan penghapusan',
                        'error'
                    )
                }
            })
        });
    </script>