<!-- Start Header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-16 text-black-50 m-0"> <a href="https://goo.gl/maps/qjqxEktXK4bcTyBFA?share"><i class="fas fa-map-marker-alt mr-1"></i></a> Jl. Bakti Husada No.68, RT.01/RW.01, Lkr. Barat, Kec. Gading Cemp., Kota Bengkulu </p>
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

<!-- Start Main -->
<main id="main-site">

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url('assets/img/banner1.png') ?>" alt="First slide">
            </div>
        </div>
    </div>
    <!-- !Carousel -->

    <div class="container py-4 mt-3 mb-5 font-rubik text-center">
        <h3 class="my-4 text-dark text-center">Apa itu Dear Outdoor12 ?</h3>
        <hr>
        <p class="text-content text-center mt-4">Dear Outdoor12  merupakan perusahaan mikro yang bergerak di bidang jasa persewaan alat camping. Perusahaan tersebut didirikan oleh Ariance Sanaky dan Deni Saputra pada Tanggal 1 November 2019. Berawal dari hoby naik gunung dan masih duduk dibangku kuliah, saat itu harga peralatan terbilang cukup mahal dikalangan mahasiswa. Dengan melakukan penyewaan biaya saat melakukan kegiatan mendaki atau camping menjadi lebih terjangkau. Selain itu kelebihan menyewa peralatan adalah kita tidak perlu melakukan perawatan, selain itu peralatan yang kita gunakan pun bisa berganti-ganti model sesuai selera. Saat itu persewaan alat camping di Semarang masih sangat jarang ditemui. Dear Outdoor12 hadir untuk memenuhi setiap kebutuhan masyarakat dengan harga yang kompetitif</p>
        <a class="btn btn-lg btn-primary rounded-pill mt-2" href="<?php echo base_url('auth/login') ?>" role="button">SEWA SEKARANG !</a>
    </div>

    <section class="page-section" id="services">
        <div class="container text-dark py-4 mt-3 mb-5 font-rubik text-center">
            <div class="container">
                <h3 class="my-4 text-dark text-center">Apa Yang Disewakan Oleh Dear Outdoor12 ?</h3>
                <hr>
            </div>
            <div class="row text-center font-rubik mt-3">
                <div class="col-md-4 font-rubik">
                    <span class="fa-stack fa-4x">
                        <img src="<?php echo base_url('assets/img/icon/dome.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                    </span>
                    <h4 class="my-3">Perlengkapan Kemah</h4>
                    <p class="text-muted">Peralatan yang dibawa sewaktu akan berkemah. Berbagai peralatan harus disiapkan terlebih dulu agar kegiatan kemah tersebut berjalan dengaan baik.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="<?php echo base_url('assets/img/icon/cook.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                    </span>
                    <h4 class="my-3">Peralatan Outdoor</h4>
                    <p class="text-muted">Peralatan untuk menunjang kita di segala aktivitas kegiatan dialam terbuka seperti kemah, makrab, maupun outbond.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="<?php echo base_url('assets/img/icon/hikewear.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                    </span>
                    <h4 class="my-3">Perlengkapan Mendaki</h4>
                    <p class="text-muted">Peralatan wajib yang harus dibawa sewaktu akan mendaki gunung dan digunakan untuk membantu memudahkan saat sedang melakukan pendakian agar pendakian.</p>
                </div>
            </div>
        </div>
    </section>