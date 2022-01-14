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

<div class="container py-5">
    <h4 class="font-rubik font-size-20 text-dark">Aksesoris</h4>
    <hr>
</div>

<div class="container">
    <div class="row text-center mb-5">

        <?php foreach ($accesories as $brg) : ?>

            <div class="card ml-4 mb-4" style="width: 194px;">
                <a href="<?php echo base_url('dashboard/detail/' . $brg->id_brg) ?>"><img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" class="img-fluid" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $brg->nama_brg ?></h5>
                    <span class="badge badge-secondary"><small>Rp. <?php echo number_format($brg->harga, 0, ',', ',') ?> / Day</small></span><br>
                    <small>
                        <?php if ($brg->status == "0") {
                            echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                        } else {
                            echo "<span class='badge badge-success'> Tersedia </span>";
                        } ?></small><br>
                    <?php echo anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm btn-primary mt-3">Detail Peralatan</div>') ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<!-- !Iklan -->
<section id="banner-adds py-2">
    <div class="container py-4 text-center">
        <img src="<?php echo base_url('assets/img/adds/adds01.jpg') ?>" alt="adds1" class="img-fluid mr-5">
        <img src="<?php echo base_url('assets/img/adds/adds002.jpg') ?>" alt="adds2" class="img-fluid ">
    </div><br>
</section>
<!-- !Iklan -->