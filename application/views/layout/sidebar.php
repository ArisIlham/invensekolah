<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- <li class="menu-title">Main</li> -->

                <li>
                    <a href="<?php echo base_url() ?>dashboard" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <?php if ($this->session->userdata('access') == 'Administrator') { ?>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Saprasku</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>user">Data User</a></li>
                            <li><a href="<?php echo base_url() ?>saprasku">Data Saprasku</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Peminjaman</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>peminjaman">Data Peminjaman</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Helpdesk</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>helpdesk">Data Helpdesk</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Approve Pengajuan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>pengajuan">Data Approve</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>laporan_peminjaman">Laporan Peminjaman</a></li>
                            <li><a href="<?php echo base_url() ?>laporan_helpdesk">Laporan Helpdesk</a></li>
                            <li><a href="<?php echo base_url() ?>laporan_pengajuan">Laporan Pengajuan</a></li>
                            <li><a href="<?php echo base_url() ?>laporan_user">Laporan User</a></li>
                        </ul>
                    </li>

                <?php
                }
                ?>























                <?php if ($this->session->userdata('access') == 'PJ') { ?>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Saprasku</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>saprasku">Data Saprasku</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Peminjaman</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>peminjaman">Data Peminjaman</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Pengajuan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>pengajuan">Data Pengajuan</a></li>
                        </ul>
                    </li>




                <?php
                }
                ?>






                <?php if ($this->session->userdata('level') == '2') { ?>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Peminjaman</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>peminjaman">Data Peminjaman</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Helpdesk</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>helpdesk">Data HelpDesk</a></li>
                        </ul>
                    </li>

                <?php
                }
                ?>




                <li>
                    <a href="<?php echo base_url() ?>home" class="waves-effect">
                        <i class="ti-new-window"></i>
                        <span>Website</span>
                    </a>
                </li>



                <li>
                    <a href="<?php echo base_url() ?>login/logout" class="waves-effect">
                        <i class="ti-new-window"></i>
                        <span>Keluar</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->