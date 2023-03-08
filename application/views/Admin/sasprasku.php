<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
        <a href="<?php echo base_url('Welcome/tambahsarpras/') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50">
            </i>
            Tambah Barang
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Nomor Barang</th>
                            <th>Jumlah</th>
                            <th>Status Barang</th>
                            <th>Gambar</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($barang as $b) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $b->nama_barang ?></td>
                                <td><?php echo $b->no_barang ?></td>
                                <td><?php echo $b->jml_barang ?></td>
                                <td><?php echo $b->st_barang ?></td>
                                <td><Img Style="Width: 200px" Src="<?Php echo $b->gmb_barang; ?>"></td>
                            </tr>
                        <?php } ?>

                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>