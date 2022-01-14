<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-mountain"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Outdoor</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($this->uri->segment(2) == "dashboard")echo "active"?>">
                <a class="nav-link mt-2" href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading mt-2">
                Data & Transaksi
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php if($this->uri->segment(2) == "data_barang")echo "active"?>">
                <a class="nav-link" href="<?php echo base_url('admin/data_barang') ?>">
                    <i class="fas fa-fw fa-campground"></i>
                    <span>Data Barang</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "data_customer")echo "active"?>">
                <a class="nav-link" href="<?php echo base_url('admin/data_customer') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Customer</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(3) == "pesanan_sewa")echo "active"?>">
                <a class="nav-link" href="<?php echo base_url('admin/transaksi/pesanan_sewa') ?>">
                    <i class="fas fa-fw fa-random"></i>
                    <span>Permintaan Sewa</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "transaksi" && $this->uri->segment(3) == null)echo "active"?>">
                <a class="nav-link" href="<?php echo base_url('admin/transaksi') ?>">
                    <i class="fas fa-fw fa-coins"></i>
                    <span>Transaksi</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "laporan")echo "active"?>">
                <a class="nav-link" href="<?php echo base_url('admin/laporan') ?>">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Laporan</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(3) == "feedback")echo "active"?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard/feedback') ?>">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Umpan Balik</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600">Hallo <?php echo $this->session->userdata('nama') ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('admin/dashboard/profile') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="<?php echo base_url('auth/ganti_password') ?>">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->