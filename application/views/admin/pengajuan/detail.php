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
                                        <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Pengajuan</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">                                                                

										<button type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-warning btn-mini">Kembali</button> 

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


									 

								



                                      <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <td><strong>No</strong></td>
                                          <td><strong>Nama Barang</strong></td>
                                          <td><strong>Harga Barang</strong></td>
                                          <td><strong>Jumlah</strong></td>
                                          <td><strong>Sub Total</strong></td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($all_detail_pengajuan as $detail_pengajuan): ?>
                                          <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $detail_pengajuan->nama_barang ?></td>
                                            <td>Rp <?= number_format($detail_pengajuan->harga_barang, 0, ',', '.') ?></td>
                                            <td><?= $detail_pengajuan->jumlah_barang ?> <?= strtoupper($detail_pengajuan->satuan) ?></td>
                                            <td>Rp <?= number_format($detail_pengajuan->sub_total, 0, ',', '.') ?></td>
                                          </tr>
                                        <?php endforeach ?>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <td colspan="4" align="right"><strong>Total : </strong></td>
                                          <td>Rp <?= number_format($pengajuan->total, 0, ',', '.') ?></td>
                                        </tr>
                                      </tfoot>
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
          $('#datatable').on('click','.hapuscustomer', function () {
            var jurnalmasuk_id  =   <?php echo $u['jurnalmasuk_id'];?>;
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
                    url:"<?=base_url('customer/hapus')?>",  
                    method:"post",
                    beforeSend :function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                          swal.showLoading()
                        }
                      })      
                    },    
                    data:{jurnalmasuk_id:jurnalmasuk_id},
                    success:function(data){
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



