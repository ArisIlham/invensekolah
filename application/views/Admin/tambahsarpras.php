<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Barang</h1>
                        </div>
                        <form class="user" action="<?php echo base_url() . "welcome/prosestambahsarpras" ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nama_barang" value="" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="no_barang" value="" placeholder="Nomor Barang">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" name="jml_barang" value="" placeholder="Jumlah">
                            </div>
                            <div class="form-group">
                                <label for="st_barang">Status</label>
                                <select name="st_barang" value="" class="form-control">
                                    <option value="">- Pilih Status</option>
                                    <option value="Ruangan dan Alat">Ruangan dan Alat</option>
                                    <option value="Sarana Olahraga">Sarana Olahraga</option>
                                    <option value="Sarana Lab Kimia/Fisika">Sarana Lab Kimia/Fisika</option>
                                    <option value="Sarana Komputer">Sarana Komputer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" name="fotopost">
                            </div>
                            <button type="submit" value="Submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>