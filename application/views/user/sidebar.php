<!-- Start Header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-16 text-black-50 m-0"> <a href="https://goo.gl/maps/qjqxEktXK4bcTyBFA?share"><i class="fas fa-map-marker-alt mr-1"></i></a> Jl. Bakti Husada No.68, RT.01/RW.01, Lkr. Barat, Kec. Gading Cemp., Kota Bengkulu</p>
        <div class="font-rale font-size-14 ">
            <?php if ($this->session->userdata('nama')) { ?>
                <a class="px-3 border-right border-left text-dark" href="<?php echo base_url() ?>dashboard/profile">Hallo <?php echo $this->session->userdata('nama') ?></a>
                <a href="<?php echo base_url() ?>/auth/logout" class="px-3 border-right text-dark">Keluar</a>
            <?php } else { ?>
                <a href="<?php echo base_url('register') ?>" class="px-3 border-right text-dark">Daftar</a>
                <a href="<?php echo base_url('auth/login') ?>" class="px-3 border-right text-dark">Masuk</a>
            <?php } ?>
        </div>
    </div>

    <!-- Primary Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark color-primary-bg">
        <div class="ml-5">
            <a class="navbar-brand" href="<?php echo base_url('dashboard/welcome') ?>">Dear Outdoor12</a>
        </div>

        <div class="container justify-content-center">
            <form class="form-inline">

            </form>
        </div>

        <div class="mr-3 font=size-10 border-right ">
           <a class="navbar-brand ml-5" href="<?php echo base_url('dashboard/produk') ?>">Produk</a>
        </div>

         <div class="mr-3 font=size-10 border-right ">
           <a class="navbar-brand" href="<?php echo base_url('dashboard/permintaan_sewa') ?>">Permintaan Sewa</a>
        </div>


        <div class="navbar">
            <ul class="nav navbar-nav navbar-right mr-3">
                <li>
                    <?php if ($this->session->userdata('nama')) { ?>
                        <?php $keranjang = '<span class="font=size-16 px-2 text-white"><i class="fas fa-shopping-cart fa-lg mt-1"></i>  ' . $this->cart->total_items() . '' ?>

                        <?php echo anchor('dashboard/detail_keranjang', $keranjang) ?>
                    <?php } else { ?>

                    <?php } ?>

                </li>
            </ul>
        </div>

    </nav>
    <!-- Primary Navigation-->

</header>
<!-- End Header -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div class="container font-rubik" id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion mt-5" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <span class="sidebar-brand d-flex align-items-center justify-content-center text-primary">
                <div class="sidebar-brand-icon">
                </div>
                <a href="<?php echo base_url('/dashboard/profile') ?>">
                    <div class="sidebar-brand-text mx-3">Hallo <?php echo $this->session->userdata('nama') ?></sup></div>
                </a>
            </span>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-primary mt-3">
                Akun Saya
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link text-primary" href="<?php echo base_url('/dashboard/permintaan_sewa') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Permintaan Sewa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="<?php echo base_url('/dashboard/riwayat_sewa') ?>">
                    <i class="fas fa-fw fa-random"></i>
                    <span>Data Transaksi Anda</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading text-primary mt-4">
                Lainnya
            </div>

            <li class="nav-item">
                <a class="nav-link text-primary" href="<?php echo base_url('auth/ganti_password') ?>">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Ganti Password</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="<?php echo base_url('auth/logout') ?>">
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