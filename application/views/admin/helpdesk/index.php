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
                            <li class="breadcrumb-item"><a href="#">Helpdesk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Helpdesk</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="col">

                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#helpdesk" role="button">Tambah Helpdesk</a>

                            </div>
                        </div>
                    </div>
                    <div class="modal" id="helpdesk">
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
                                        <th>Kendala</th>
                                        <th>Kondisi Gambar</th>
                                        <th style="text-align:center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 0;
                                    if ($datahelpdesk) {
                                        foreach ($datahelpdesk as $u) {
                                    ?>
                                            <tr>
                                                <td width="5%" style="text-align:center"><?php echo ++$no ?></td>
                                                <td><?php echo $u['nama_user'] ?></td>
                                                <td><?php echo $u['nama_barang'] ?></td>
                                                <td><?php echo $u['kendala'] ?></td>
                                                <td><img width="100" src="<?php echo base_url() ?>assets/gambar/<?php echo $u['gambar_helpdesk'] ?>"></td>

                                                <td style="text-align:center">
                                                    <a href="<?= base_url('helpdesk/ubah/' . $u['helpdesk_id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('helpdesk/hapus/' . $u['helpdesk_id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    <!-- <button class='btn btn-danger hapuscustomer' id='helpdesk_id' data-toggle='modal' data-helpdesk_id="<?= $u['helpdesk_id'] ?>">Hapus</button> -->
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
            var helpdesk_id = <?php echo $u['helpdesk_id']; ?>;
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
                            helpdesk_id: helpdesk_id
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