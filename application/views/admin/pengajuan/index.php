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
                                        <li class="breadcrumb-item active" aria-current="page">Data Pengajuan</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">                                                                

                                            <a class="btn btn-primary" href="<?php echo base_url()?>pengajuan/tambah" role="button">Tambah Pengajuan</a>

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
                                            <td>No Pengajuan</td>
                                            <td>Nama User</td>
                                            <td>Tanggal Pengajuan</td>
                                            <td>Total</td>
                                                <th style="text-align:center">Tindakan</th>                                            
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($all_pengajuan as $pengajuan): ?>
                                                <tr>
                                                    <td><?= $pengajuan->no_pengajuan ?></td>
                                                    <td><?= $pengajuan->nama_user ?></td>
                                                    <td><?= $pengajuan->tgl_pengajuan ?> Pukul <?= $pengajuan->jam_pengajuan ?></td>
                                                    <td>Rp <?= number_format($pengajuan->total, 0, ',', '.') ?></td>
                                                    <td>

                                                       


                                                    <?php if ($pengajuan->Is_Approve == "0" && $this->session->userdata('level') == '1' ){ ?>
                                                       
                                                    <button class='btn btn-warning btn-mini approve' id="no_pengajuan" data-no_pengajuan=".$pengajuan->no_pengajuan."> Approve</button>
                                                    <!-- <button class="btn btn-warning"> Belum Disetujui</button>  -->
                                                    <a href="<?= base_url('pengajuan/detail/' . $pengajuan->no_pengajuan) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>                                                        
                                                    <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('pengajuan/hapus/' . $pengajuan->no_pengajuan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                                                    <?php } else if ($pengajuan->Is_Approve == "0" ){ ?>
                                                    <button class="btn btn-warning"> Belum Disetujui</button> 
                                                    <a href="<?= base_url('pengajuan/detail/' . $pengajuan->no_pengajuan) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>                                                        
                                                    <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('pengajuan/hapus/' . $pengajuan->no_pengajuan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> 

                                                    <?php } else { ?>
                                                    <a class="btn btn-success"  title="Sudah Disetujui"><i class="icon-check icon-white"> </i>Sudah Disetujui</a>
                                                    <a href="<?= base_url('pengajuan/detail/' . $pengajuan->no_pengajuan) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> 
                                                    <?php } ?>




                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
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

$('#datatable').on('click','.approve', function () { 
          
          var no_pengajuan =  '<?php echo $pengajuan->no_pengajuan;?>'; 
           
          swal({
              title: 'Konfirmasi',
              text: "Anda ingin Setujui ",
              type: 'success',
              showCancelButton: true,
              confirmButtonText: 'Setujui',
              confirmButtonColor: '#0ac282',
              cancelButtonColor: '#3085d6',
              cancelButtonText: 'Tidak',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                $.ajax({
                  
                  url:"<?=base_url('pengajuan/approve')?>",  
                  method:"POST", 
                  beforeSend :function () {
                  swal({
                      title: 'Menunggu',
                      html: 'Memproses data',
                      onOpen: () => {
                        swal.showLoading()
                      }
                    })   
                  },
                  data:{no_pengajuan:no_pengajuan}, 
                  success:function(data){
                    swal(
                      'Setujui',
                      'Berhasil Disetujui',
                      'success'
                    )
                   
                    $("#refresh").fadeOut();
                     location.reload(true);
                     /*setTimeout(function(){// wait for 1.3 secs(2)
                          location.reload(); // then reload the page.(3)
                      }, 1300); */
                    
                  }
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal(
                  'Batal',
                  'Anda membatalkan persetujuan',
                  'error'
                )
              }
            })
          });
</script>