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
            <?php if ($this->session->userdata('nama')) { ?>
                <a class="navbar-brand" href="<?php echo base_url('dashboard/welcome') ?>"> Outdoor</a>
            <?php } else { ?>
                <a class="navbar-brand" href="<?php echo base_url('dashboard') ?>"> Outdoor</a>
            <?php } ?>
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
    <h4 class="font-rubik font-size-20 text-dark">Cara Sewa</h4>
    <hr>
</div>

<div class="container mb-5 font-rubik" id="accordion">
    <div class="card">
        <div class="card-header color-primary-bg" id="headingOne">
            <h5 class="mb-0">
                <button class="btn text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    How To Renting
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body font-size-14">
                <img src="<?php echo base_url('assets/img/howto/how2n.jpg') ?>" alt="howto1" class="mx-auto d-block mt-4 mb-4 " style="width: 620px;"><br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 1 </p>
                Login atau Register (jika belum memiliki akun) terlebih dahulu pada halaman awal website. <br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 2 </p>
                Pilih peralatan camping yang ingin disewa, tombol detail untuk melihat detail peralatan dan tombol add cart untuk memasukan ke keranjang belanja. <br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 3 </p>
                Pastikan semua peralatan camping yang ingin di sewa telah masuk semua ke keranjang belanja. <br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 4 </p>
                Klik tombol clear untuk menghapus semua item di keranjang belanja dan Klik cekout pada keranjang belanja untuk melanjutkan pembayaran. <br>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header color-primary-bg" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn collapsed text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How To Pay
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body font-size-14">
                <img src="<?php echo base_url('assets/img/howto/how3.jpg') ?>" alt="howto2" class="mx-auto d-block mt-4 mb-4" style="width: 500px;"><br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 1 </p>
                Pastikan semua perlalatan yang ingin di sewa telah sesuai dengan kebutuhan. <br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 2 </p>
                Jika telah sesuai, lanjut ke halaman cekout untuk mengisi data seperti jasa pengambilan peralatan, pengisian alamat , jenis dan metode pembayaran. <br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 3 </p>
                Tunggu hingga admin mengkonfirmasi, jika terdapat pesan berhasil berarti pembayaran telah terkonfirmasi dan berhasil.<br>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header color-primary-bg" id="headingThree">
            <h5 class="mb-0">
                <button class="btn collapsed text-light" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    How To Return Rental Items
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body font-size-14">
                <img src="<?php echo base_url('assets/img/howto/how1n.jpg') ?>" alt="howto3" class="mx-auto d-block mt-4 mb-4" style="width: 500px;"><br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 1 </p>
                Pastikan tanggal pengembalian tidak lebih dari waktu yang ditentukan diawal sewa, jika melebihi batas yang ditentukan akan dikenakan denda keterlambatan. <br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 2 </p>
                Bawa semua peralatan yang ingin di kembalikan ke tempat penyewaan dan pastikan lengkap / hubungi admin untuk pengambilan peralatan sewa. <br>
                <p class="badge badge-primary rounded-pill text-light mr-2"> 3 </p>
                Admin melakukan cek pada perlengkapan sewa terkait kelengkapan barang, kerusakan pada barang (jika terjadi kerusakan saat disewakan). <br>
            </div>
        </div>
    </div><br>
</div>