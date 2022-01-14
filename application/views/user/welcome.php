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

<!-- Start Main -->
<main id="main-site">

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="bg-primary" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li class="bg-primary" data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li class="bg-primary" data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url('assets/img/bnr1.png') ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('assets/img/bnr2.png') ?>" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- !Carousel -->

    <div class="container py-4 mt-5">
        <h4 class="font-rubik font-size-20 text-dark">Kategori</h4>
        <hr>
    </div>

    <section class="ml-4 mb-4" id="icon">
        <div class="kategori">
            <div class="row col-md-9 mx-auto text-center">
                <div class="col-md-2 mb-5">
                    <a href="<?php echo base_url('kategori/tenda_dome') ?>">
                        <span class="fa-stack fa-4x">
                            <img src="<?php echo base_url('assets/img/icon/dome.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                            <h4 class="my-3 font-rubik text-dark font-size-20 mr-3">Tenda Dome</h4>
                        </span>
                    </a>
                </div>

                <div class="col-md-2 mb-5">
                    <a href="<?php echo base_url('kategori/tas_punggung') ?>">
                        <span class="fa-stack fa-4x">
                            <img src="<?php echo base_url('assets/img/icon/tas.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                            <h4 class="my-3 font-rubik text-dark font-size-20 mr-3">Tas Punggung</h4>
                        </span>
                    </a>
                </div>

                <div class="col-md-2 mb-5">
                    <a href="<?php echo base_url('kategori/pakaian_hangat') ?>">
                        <span class="fa-stack fa-4x">
                            <img src="<?php echo base_url('assets/img/icon/pakaian.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                            <h4 class="my-3 font-rubik text-dark font-size-20 mr-3">Pakaian Hangat</h4>
                        </span>
                    </a>
                </div>

                <div class="col-md-2 mb-5">
                    <a href="<?php echo base_url('kategori/peralatan_masak') ?>">
                        <span class="fa-stack fa-4x">
                            <img src="<?php echo base_url('assets/img/icon/cook.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                            <h4 class="my-3 font-rubik text-dark font-size-20 mr-3">Peralatan Masak</h4>
                        </span>
                    </a>
                </div>

                <div class="col-md-2 mb-5">
                    <a href="<?php echo base_url('kategori/perlengkapan_trecking') ?>">
                        <span class="fa-stack fa-4x">
                            <img src="<?php echo base_url('assets/img/icon/hikewear.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                            <h4 class="my-3 font-rubik text-dark font-size-20 mr-3">Perlengkapan Trecking</h4>
                        </span>
                    </a>
                </div>

                <div class="col-md-2 mb-5">
                    <a href="<?php echo base_url('kategori/accesories') ?>">
                        <span class="fa-stack fa-4x">
                            <img src="<?php echo base_url('assets/img/icon/acc.png') ?>" alt="icon1" class="mr-5 ml-2" width="125px">
                            <h4 class="my-3 font-rubik text-dark font-size-20 mr-3">Aksesoris</h4>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <div class="container py-5">
        <div style="display: flex;">
            <div style="flex: 50%;"><h4 class="font-rubik font-size-20 text-dark">Produk</h4></div>
            <div>
                <form action="<?php echo site_url('cari');?>" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="search_query" class="form-control bg-light border-0 small" placeholder="Cari produk..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>

    <div id="produk">
        <div class="container">
            <div class="row text-center">

                <?php foreach ($barang as $brg) : ?>

                    <div class="card ml-4 mb-4" style="width: 196px;">
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
                            <?php echo anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm color-primary-bg text-light mt-3">Detail Peralatan</div>') ?>
                        </div>
                    </div>

                <?php endforeach; ?>
                <div class="col-md-2 mt-5 py-5 ml-4">
                    <a href="<?php echo base_url('dashboard/produk') ?>">
                        <img src="<?php echo base_url('assets/img/icon/jnextn.png') ?>" alt="icon3" class="mt-5 py-2 ml-5 mr-4 ml-2" width="50px" style="opacity: 0.4;">
                    </a>
                </div>
            </div>
        </div>
    </div>

 <!-- Promo -->
    <section id="top-sale">
        <div class="container py-5 mt-5">
            <h4 class="font-rubik font-size-20 text-dark">Promo</h4>
            <hr>
            <!-- Owl Carousel -->
            <div class="owl-carousel ml-3 mt-5 owl-theme ">
                <?php foreach ($promo as $brg) : ?>

                    <div class="item ml-" style="width: 194px;">
                        <div class="product">
                            <a href="<?php echo base_url('dashboard/detail_promo/' . $brg->id_brg) ?>"><img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" class="img-fluid" alt="..."></a>
                            <div class="text-center mt-2">
                                <h5 class="card-title"><?php echo $brg->nama_brg ?></h5>
                                <span class="badge text-danger"><small><del>Rp. <?php echo number_format($brg->harga, 0, ',', ',') ?> / Day</small></span><br>
                                <span class="badge badge-primary"><small>Rp. <?php echo number_format($brg->promo, 0, ',', ',') ?> / Day</small></span><br>
                                <small>
                                    <?php if ($brg->status == "0") {
                                        echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                    } else {
                                        echo "<span class='badge badge-success'> Tersedia </span>";
                                    } ?></small><br>
                                <?php echo anchor('dashboard/detail_promo/' . $brg->id_brg, '<div class="btn btn-sm color-primary-bg text-light mt-3">Detail Peralatan</div>') ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <!-- !Owl Carousel -->
        </div>
    </section>
    <!-- Promo -->