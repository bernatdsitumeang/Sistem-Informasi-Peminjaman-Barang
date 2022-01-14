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

<div class="container">

    <div class="card mt-4">
        <div class="card-header">
            Detil Produk
        </div>
        <div class="card-body py-5">

            <?php foreach ($barang as $brg) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Product</td>
                                <td> <strong> <?php echo $brg->nama_brg ?></strong></td>
                            </tr>

                            <tr>
                                <td>Keterangan</td>
                                <td> <strong> <?php echo $brg->keterangan ?></strong></td>
                            </tr>

                            <tr>
                                <td>Stok Barang</td>
                                <td> <?php if ($brg->status == "0") {
                                            echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                        } else {
                                            echo "<span class='badge badge-success'> Tersedia </span>";
                                        } ?></strong></td>
                            </tr>

                            <tr>
                                <td>Harga Awal</td>
                                <td><strong>
                                        <div class="badge text-danger"><del> Rp. <?php echo number_format($brg->harga, 0, ',', '.')  ?> / Day</div>
                                    </strong></td>
                            </tr>

                            <tr>
                                <td>Harga Promo</td>
                                <td><strong>
                                        <div class="btn brn-sm btn-primary">Rp. <?php echo number_format($brg->promo, 0, ',', '.') ?> / Day</div>
                                    </strong></td>
                            </tr>
                            <form action="<?php echo base_url() . 'dashboard/tambah_ke_promo'; ?>" method="post" enctype="multipart/form-data">
                        </table>
                        <input type="hidden" name="id" value="<?php echo $brg->id_brg ?>">

                        <?php
                        if ($brg->status == "1") { ?>
                            <button type="submit" class="btn btn-sm color-primary-bg text-light mt-3 float-right">Add to Cart</button>
                        <?php } else {
                            echo '<div class="btn btn-sm color-primary-bg text-light mt-3 float-right">Add to Cart</div>';
                        }
                        ?>
                        <?php echo anchor('dashboard/welcome', '<div class="btn btn-sm btn-danger mt-3 mr-2 float-right">Back</div>') ?>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </div>

   