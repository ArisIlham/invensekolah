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
                            <li class="breadcrumb-item"><a href="#">Saprasku</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Saprasku</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="dropdown">

                                <a class="btn btn-primary" href="<?php echo base_url() ?>saprasku/tambah" role="button">Tambah Saprasku</a>

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
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Satuan</th>
                                        <th>Kondisi</th>
                                        <th>Gambar</th>
                                        <th style="text-align:center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 0;
                                    if ($datasaprasku) {
                                        foreach ($datasaprasku as $u) {
                                    ?>
                                            <tr>
                                                <td width="5%" style="text-align:center"><?php echo ++$no ?></td>
                                                <td><?php echo $u['kode_barang'] ?></td>
                                                <td><?php echo $u['nama_barang'] ?></td>
                                                <td><?php echo $u['stok'] ?></td>
                                                <td><?php echo $u['satuan'] ?></td>
                                                <td><?php echo $u['kondisi'] ?></td>
                                                <td><img width="100" src="<?php echo base_url() ?>assets/gambar/<?php echo $u['gambar'] ?>"></td>

                                                <td style="text-align:center">
                                                    <a href="<?= base_url('saprasku/ubah/' . $u['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('saprasku/hapus/' . $u['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    <!-- <button class='btn btn-danger hapuscustomer' id='id' data-toggle='modal' data-id="<?= $u['id'] ?>">Hapus</button> -->
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
            var id = <?php echo $u['id']; ?>;
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
                            id: id
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