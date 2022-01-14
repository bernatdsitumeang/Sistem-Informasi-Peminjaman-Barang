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
                <a class="navbar-brand" href="<?php echo base_url('dashboard/welcome') ?>">Dear Outdoor12</a>
            <?php } else { ?>
                <a class="navbar-brand" href="<?php echo base_url('dashboard') ?>">Dear Outdoor12</a>
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
    <h4 class="font-rubik font-size-20 text-dark">Tentang Kami</h4>
    <hr>
    <p class="font-rubik font-size-16 text-justify mt-5">
    <p class="font-rubik text-content text-justify">Dear Outdoor12 merupakan perusahaan mikro yang bergerak di bidang jasa persewaan alat camping. Perusahaan tersebut didirikan oleh Ariance Sanaky dan Deny Saputra pada 01 November 2019. Berawal dari hoby naik gunung dan masih duduk dibangku kuliah, saat itu harga peralatan terbilang cukup mahal dikalangan mahasiswa. Dengan melakukan penyewaan biaya saat melakukan kegiatan mendaki atau camping menjadi lebih terjangkau. Selain itu kelebihan menyewa peralatan adalah kita tidak perlu melakukan perawatan, selain itu peralatan yang kita gunakan pun bisa berganti-ganti model sesuai selera. Saat itu persewaan alat camping di Semarang masih sangat jarang ditemui. Pandanaran Outdoor Travelling hadir untuk memenuhi setiap kebutuhan masyarakat dengan harga yang kompetitif.</p>
    <br>
    <P class="font-rubik text-content text-justify">Nama Dear diambil dari tempat biasa berkumpul Ariance Sanaky dan Deny Saputra bersama teman-temannya, sedangkan Outdoor Travelling merupakan kegiatan yang mereka gemari.</p>
    <br>
    <P class="font-rubik text-content text-justify">Hingga saat ini persewaan alat camping “Dear Outdoor12” masih beroperasi di Bhakti Husada, Lingkar Barat, RT 01, RW 01, No 68 Samping Kantor Pos, Kota Bengkulu.</p>
    </p>
</div>

<div class="container py-4">
    <h4 class="font-rubik font-size-20 text-dark">Visi</h4>
    <hr>
    <ul>
        <p class="font-rubik font-size-16 text-justify mt-5">
            <li>
                <p class="font-rubik text_content text-justify mb-2">Menjadi penyedia jasa terbaik dalam bidang persewaan alat camping dan hiking.</p>
        </p>
    </ul>
</div>

<div class="container py-4 mt-3">
    <h4 class="font-rubik font-size-20 text-dark">Misi</h4>
    <hr>
    <ul>
        <p class="font-rubik font-size-16 text-justify mt-5">
            <li>
                <p class="font-rubik text_content text-justify">Menjaga kualitas produk sewa melalui pemeliharaan yang rutin dan konsisten.</p>
            <li>
                <P class="font-rubik text_content text-justify">Memahami kebutuhan masyarakat dengan menambah variasi produk yang beragam.</p>
            <li>
                <P class="font-rubik text_content text-justify mb-5">Menjaga kepercayaan melalui sikap jujur, konsisten dan disiplin.</p>
        </p>
    </ul>
</div>