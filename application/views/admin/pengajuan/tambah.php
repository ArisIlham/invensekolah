
<!-- Select2 -->
<link rel="stylesheet" href="https://act.webseitama.com/assets/bower_components/select2/dist/css/select2.min.css">

<!-- Pace style -->
<link rel="stylesheet" href="https://act.webseitama.com/assets/plugins/pace/pace.min.css">
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" href="https://act.webseitama.com/assets/dist/autocomplite/jquery-ui.css">
<style>
  /* Menghilangkan arrow di input type number */
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>



<!-- ============================================================== -->
          <!-- Start right Content here -->
          <!-- ============================================================== -->
          <div class="main-content">

              <div class="page-content">
                  <div class="container-fluid">
                    
                  

                    <!-- Untuk keperluan script dibawah -->
                    <div id="content" data-url="<?= base_url('pengajuan') ?>">
                    <!-- Untuk keperluan script dibawah -->



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

                                          <!-- <a class="btn btn-primary" href="<?php echo base_url()?>customer/tambah" role="button">Tambah Customer</a>
                                         <input name="customer_id" type="hidden">
                                          <button type="submit" class="btn btn-info btn-mini" id='BarisBaru'><i class='fa fa-plus fa-fw'></i> Tambah Baris</button>
                                          <button type="submit" class="btn btn-primary btn-mini">Simpan</button>-->
                                          
                                          <!-- <button disabled type="button" class="btn btn-info btn-block" id="tambah">Tambah Baris</button>  -->
                                          <button type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-warning btn-mini">Kembali</button> 

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- end page title -->

                      
                      <div class="row">
					<div class="col">
						<div class="card">
							<div class="card-header"><strong>Isi Form Pengajuan Dibawah Ini!</strong></div>
							<div class="card-body">

















								<form action="<?= base_url('pengajuan/proses_tambah') ?>" id="form-tambah" method="POST">
									
									<hr>

									<div data-repeater-list="group-a">
                                        <div data-repeater-item class="row">

                                            <div  class="mb-2 col-lg-4">
											<label class="form-label" for="name">No. Pengajuan</label>
												<input type="text" name="no_pengajuan" value="PJ<?= time() ?>" readonly class="form-control">
											</div>
											

											<div  class="mb-2 col-lg-4">
											<label class="form-label" for="name">Tanggal pengajuan</label>
												<input type="text" name="tgl_pengajuan" value="<?= date('d/m/Y') ?>" readonly class="form-control">
											</div>

											<div  class="mb-2 col-lg-4">
											<label class="form-label" for="name">Jam</label>
												<input type="text" name="jam_pengajuan" value="<?= date('H:i:s') ?>" readonly class="form-control">
											</div>
											
										</div>
									</div>







									<br>
									<div data-repeater-list="group-a">
                                        <div data-repeater-item class="row">

                                            <div  class="mb-2 col-lg-2">
																<label class="form-label" for="name">Nama Barang</label>
																	<select name="nama_barang" id="nama_barang" class="form-control">
                                                                        <option value="">Pilih Barang</option>
                                                                        <?php foreach ($databarang as $u): ?>
                                                                            <option value="<?= $u->nama_barang ?>"><?= $u->nama_barang ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
											</div>


											<div  class="mb-2 col-lg-2">
												<label class="form-label" for="name">Kode Barang</label>
												<input type="text" name="kode_barang" value="" readonly class="form-control">
											</div>

											<div  class="mb-2 col-lg-2">
												<label class="form-label" for="name">Harga Barang</label>
												<input type="text" name="harga_barang" value="" readonly class="form-control">
											</div>

											<div  class="mb-2 col-lg-2">
												<label class="form-label" for="name">Stok</label>
												<input type="text" name="stok" value="" class="form-control" readonly>
											</div>

											<div  class="mb-2 col-lg-2">
												<label class="form-label" for="name">Jumlah</label>
												<input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
											</div>

											<div  class="mb-2 col-lg-2">
												<label class="form-label" for="name">Sub Total</label>
												<input type="number" name="sub_total" value="" class="form-control" readonly>
											</div>
											<div  class="mb-2 col-lg-2">
												<label class="form-label" for="name"></label>
												<button disabled type="button" class="btn btn-primary btn-block" id="tambah">Tambah Barang</button>
											</div>
											<input type="hidden" name="satuan" value="">

											<input type="hidden" name="user_id" value="<?php echo $userid?>">


												<div class="keranjang">
													<br>
													<h6>Detail Pembelian</h6>
													<hr>
														<table class="table table-bordered" id="keranjang">
															<thead>
																<tr>
																	<td width="35%">Nama Barang</td>
																	<td width="15%">Harga</td>
																	<td width="15%">Jumlah</td>
																	<td width="10%">Satuan</td>
																	<td width="10%">Sub Total</td>
																	<td width="15%">Aksi</td>
																</tr>
															</thead>
															<tbody>
																
															</tbody>
															<tfoot>
																<tr>
																	<td colspan="4" align="right"><strong>Total : </strong></td>
																	<td id="total"></td>
																	
																	<td>
																		<input type="hidden" name="total_hidden" value="">
																		<input type="hidden" name="max_hidden" value="">
																		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
																	</td>
																</tr>
															</tfoot>
														</table>
												</div>
										</div>							
									</div>	



								</form>
							</div>				
						</div>
					</div>
				</div>





                      <!-- end row -->
                  </div> <!-- container-fluid -->
              </div>
              <!-- End Page-content -->






<!-- jQuery 3 -->
<script src="https://act.webseitama.com/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://act.webseitama.com/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Select2 -->
<script src="https://act.webseitama.com/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- maskmoney -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="https://act.webseitama.com/assets/dist/autocomplite/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="https://act.webseitama.com/assets/plugins/PrayTimes/PrayTimes.js"></script>

<script type="text/javascript">
    const url_getakun = "<?= site_url('jurnal_masuk/getakun') ?>";

    $('tfoot').hide();  
</script>
<script src="<?=base_url()?>/assets/js/crud.js"></script>



<script>
		$(document).ready(function(){
			$('tfoot').hide()

			$(document).keypress(function(event){
		    	if (event.which == '13') {
		      		event.preventDefault();
			   	}
			})

			$('#nama_barang').on('change', function(){

				if($(this).val() == '') reset()
				else {
					const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
					$.ajax({
						url: url_get_all_barang,
						type: 'POST',
						dataType: 'json',
						data: {nama_barang: $(this).val()},
						success: function(data){
							$('input[name="kode_barang"]').val(data.kode_barang)
							$('input[name="harga_barang"]').val(data.harga_jual)
							$('input[name="jumlah"]').val(1)
							$('input[name="satuan"]').val(data.satuan)
							$('input[name="stok"]').val(data.stok)
							$('input[name="max_hidden"]').val(data.stok)
							$('input[name="jumlah"]').prop('readonly', false)
							$('button#tambah').prop('disabled', false)

							$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							
							$('input[name="jumlah"]').on('keydown keyup change blur', function(){
								$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							})
						}
					})
				}
			})

			$(document).on('click', '#tambah', function(e){
				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
				const data_keranjang = {
					nama_barang: $('select[name="nama_barang"]').val(),
					harga_barang: $('input[name="harga_barang"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
					satuan: $('input[name="satuan"]').val(),
					sub_total: $('input[name="sub_total"]').val(),
				}

				if(parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
					alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))	
				} else {
					$.ajax({
						url: url_keranjang_barang,
						type: 'POST',
						data: data_keranjang,
						success: function(data){
							if($('select[name="nama_barang"]').val() == data_keranjang.nama_barang) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
							reset()

							$('table#keranjang tbody').append(data)
							$('tfoot').show()

							$('#total').html('<strong>' + hitung_total() + '</strong>')
							$('input[name="total_hidden"]').val(hitung_total())
						}
					})
				}

			})


			$(document).on('click', '#tombol-hapus', function(){
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-barang') + '"]').show()

				if($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function(){
				$('input[name="kode_barang"]').prop('disabled', true)
				$('select[name="nama_barang"]').prop('disabled', true)
				$('input[name="harga_barang"]').prop('disabled', true)
				$('input[name="jumlah"]').prop('disabled', true)
				$('input[name="sub_total"]').prop('disabled', true)
			})

			function hitung_total(){
				let total = 0;
				$('.sub_total').each(function(){
					total += parseInt($(this).text())
				})

				return total;
			}

			function reset(){
				$('#nama_barang').val('')
				$('input[name="kode_barang"]').val('')
				$('input[name="harga_barang"]').val('')
				$('input[name="jumlah"]').val('')
				$('input[name="sub_total"]').val('')
				$('input[name="jumlah"]').prop('readonly', true)
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>