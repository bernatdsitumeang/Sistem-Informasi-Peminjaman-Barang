<!-- Start Header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-16 text-black-50 m-0"> <a href="https://goo.gl/maps/qjqxEktXK4bcTyBFA?share"><i class="fas fa-map-marker-alt mr-1"></i></a>Jl. Bakti Husada No.68, RT.01/RW.01, Lkr. Barat, Kec. Gading Cemp., Kota Bengkulu </p>
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

<div class="py">
    <div class="container py-5">
        <div class="col-md-2"></div>
        <div class="inp">
            <div class="container rounded-pill alert alert-info font-size-20 text-center">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }

                    echo "Your Total Shopping : Rp. " . number_format($grand_total, 0, ',', '.');
                ?>
            </div>

            <h3>Input Shipping Address and Payment</h3><br>

            <form method="POST" action="<?php echo base_url('dashboard/proses_pesanan') ?> ">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>No. KTP</label>
                    <input type="text" name="no_telp" placeholder="Nomor KTP Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>Pengambilan Peralatan</label>
                    <select class="form-control">
                        <option>-- Chose --</option>
                        <option>Come to Store</option>
                        <option>Cash On Delivery</option>
                        <option>Go Send / Grab</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pembayaran</label>
                    <select class="form-control">
                        <option>-- Chose --</option>
                        <option>Full Payment</option>
                        <option>Down Payment 50%</option>
                        <option>Down Payment 30%</option>
                    </select>
                </div>


                <div class="mb-5">
                    <button type="submit" class="btn btn-sm btn-primary mt-3 mb-5 ml-2 float-right">Pay</button>
                    <a href="<?php echo base_url('dashboard/detail_keranjang') ?>">
                        <div class="btn btn-sm btn-danger mt-3 ml-1 float-right">Back</div>
                    </a>
                </div>
            </form>

        <?php
                } else {
                    echo "Keranjang Belanja Anda Masih Kosong !!";
                }
        ?>
        </div><img src="<?php echo base_url('assets/img/emp.jpg') ?>" alt="ok" class="mx-auto d-block mt-4" style="width: 600px;"><br> <br><br><br>

        <div class="col-md-2"></div>
    </div>
</div>