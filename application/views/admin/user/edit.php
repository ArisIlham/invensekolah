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
                                        <li class="breadcrumb-item"><a href="#">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data User</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <!-- <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-cog me-2"></i> Settings
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div> -->                                         

                                            <!-- <a class="btn btn-primary" href="<?php echo base_url()?>customer/tambah" role="button">Tambah Customer</a> -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Form Edit User</h4>
                                        <form action="<?php echo base_url('user/ubahsimpan');?>" method="POST" enctype="multipart/form-data"> 
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        
                                                       
                                                       
                                                        <!-- <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Kode Rek</label>
                                                            <select name="mastercoa_id" id="mastercoa_id" class="form-control" required>
                                                                <option value="<?= $edit['kode'];?>"><?= $edit['kode'];?></option>
                                                                    <?php foreach ($datacoa as $u): ?>
                                                                        <option value="<?= $u['mastercoa_id'] ?>"><?= $u['kode'] ?> - <?= $u['nama'] ?></option>
                                                                    <?php endforeach ?>
                                                            </select> 
                                                        </div> -->

                                                        

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Nama User</label>
                                                            <input id="input-mask" name="nama_user" value="<?= $edit['nama_user'];?>" class="form-control input-mask">                                                            
                                                        </div>    

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">NISN</label>
                                                            <input type="text" id="input-mask" value="<?= $edit['nisn'];?>" name="nisn" class="form-control input-mask">                                                            
                                                        </div>   

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Username</label>
                                                            <input id="input-mask" name="username" value="<?= $edit['username'];?>" class="form-control input-mask">                                                            
                                                        </div>

                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-mask">Password</label>
                                                            <input type="password" id="input-mask" value="<?= $edit['password'];?>" name="password" class="form-control input-mask">                                                            
                                                        </div>
                                                        
                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Level</label>
                                                            <select name="level" id="level" class="form-control" required>
                                                                        <option>
                                                                        <?php if($edit['level']==1){echo 'Admin';}elseif($edit['level']==2){echo 'User';}else{echo 'PJ';}?>
                                                                        </option>
                                                                        <option value="1">Admin</option>
                                                                        <option value="2">User</option>
                                                                        <option value="3">PJ</option>
                                                            </select> 
                                                        </div> 

                                                        <div class="mb-4" id="hidden_div">
                                                            <label class="form-label" for="input-currency">Bagian</label>
                                                            <select name="id_bagian" id="id_bagian" class="form-control">
                                                                <option value=""><?= $edit['nama_bagian'];?></option>
                                                                <?php foreach ($databagian as $u): ?>
                                                                        <option value="<?= $u['id'] ?>"><?= $u['nama_bagian'] ?></option>
                                                                    <?php endforeach ?>
                                                            </select> 
                                                        </div>


                                                        <div class="mb-4">
                                                            <label class="form-label" for="input-currency">Status</label>
                                                            <select name="user_status" id="user_status" class="form-control" required>
                                                                        <option value="<?php if($edit['user_status']==2){echo 'Tidak Aktif';}else{echo 'Aktif';}?>">
                                                                        <?php if($edit['user_status']==2){echo 'Tidak Aktif';}else{echo 'Aktif';}?>
                                                                    </option>
                                                                        <option value="1">Aktif</option>
                                                                        <option value="2">Tidak Aktif</option>
                                                            </select> 
                                                        </div> 
                                                       

                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>





                                            <div class="col-md-3">
                                                <div class="float-end d-none d-md-block">
                                                    <div class="dropdown">       
                                                    <input type="hidden" name="id" value="<?= $edit['id'];?>">                                                  
                                                        <button type="submit" class="btn btn-primary btn-mini">Ubah</button>
                                                        <button type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-warning btn-mini">Kembali</button>
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

                               
      
<script type="text/javascript">                     

document.getElementById('level').addEventListener('change', function () {
var style = this.value == 3 ? 'block' : 'none';
document.getElementById('hidden_div').style.display = style;
});

</script>