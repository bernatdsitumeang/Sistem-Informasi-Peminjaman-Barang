<!-- Start Header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-16 text-black-50 m-0"> <a href="https://goo.gl/maps/qjqxEktXK4bcTyBFA?share"><i class="fas fa-map-marker-alt mr-1"></i></a> Jl. Bakti Husada No.68, RT.01/RW.01, Lkr. Barat, Kec. Gading Cemp., Kota Bengkulu  </p>
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

<div class="container py-4 mt-3">
    <h4 class="font-rubik font-size-20 text-dark">Kebijakan Pribadi</h4>
    <hr>
    <ul>
        <p class="font-rubik font-size-16 mt-5">
            <li>
                <p class="font-rubik text-justify">Segala konten, isi dan informasi dalam aplikasi DEAR OUTDOOR12 hanya diperuntukkan sebagai informasi atau penggunaan umum. Konten, isi dan informasi tersebut bukan merupakan nasihat dan tidak boleh diandalkan dalam membuat (atau tidak membuat) keputusan apapun.</p>
            <li>
                <P class="font-rubik text-justify">Informasi dari atau melalui aplikasi DEAR OUTDOOR12 disediakan atas asas “SEBAGAIMANA ADANYA”, dan seluruh jaminan, baik yang tersurat maupun tersirat, mengenai segala masalah yang berkaitan dengan informasi apapun termasuk namun tidak terbatas pada, jaminan tersirat tentang kemampuan jual beli (merchantability), kesesuaian untuk suatu tujuan tertentu, non-infringement, dan lain-lain, disangkal dan dikecualikan.</p>
            <li>
                <P class="font-rubik text-justify">DEAR OUTDOOR12, sejauh diperbolehkan berdasarkan hukum dan peraturan perundang-undangan yang berlaku, tidak bertanggung jawab dan tidak dapat dipertanggungjawabkan pada setiap saat untuk kerugian atau kerusakan secara langsung, tidak langsung, insidental atau tidak sengaja, khusus atau konsekuensial (termasuk namun tidak terbatas pada ganti rugi atas kehilangan proyek usaha atau kehilangan keuntungan) yang timbul dalam kontrak, kesalahan atau sebaliknya dari penggunaan atau ketidakmampuan untuk menggunakan aplikasi DEAR OUTDOOR12, atau isinya, atau dari Undang-Undang atau kelalaian yang timbul dari penggunaan konten situs atau segala kegagalan kinerja, kesalahan, gangguan, penghapusan, cacat, penundaan pengoperasian atau transmisi, virus komputer, kegagalan saluran komunikasi, pencurian atau perusahan atau akses yang tidak sah, perubahan, atau penggunaan informasi yang terdapat pada aplikasi DEAR OUTDOOR12.</p>
            <li>
                <P class="font-rubik text-justify">Tidak ada pernyataan dan/atau jaminan apapun yang dibuat untuk akurasi, kecukupan, kehandalan, kelengkapan, kesesuaian atau penerapan informasi untuk situasi tertentu.</p>
            <li>
                <P class="font-rubik text-justify">Tautan atau link tertentu pada aplikasi DEAR OUTDOOR12 dapat mengarahkan pada sumber daya yang terletak pada server yang dikelola oleh pihak ketiga yang terhadapnya DEAR OUTDOOR12 tidak memiliki kendali dan/atau hubungan, baik secara bisnis atau di luar itu, dan situs-situs tersebut adalah di luar dari DEAR OUTDOOR12. Pengguna setuju dan memahami bahwa dengan mengunjungi situs-situs tersebut dia berada di luar kendali dan/atau pengaruh situs CUMI. CUMI oleh karena itu, tidak mendukung maupun menawarkan penilaian atau garansi apapun, dan tidak bertanggungjawab atas keaslian, keabsahan, dan/atau ketersediaan informasi atau adanya kerusakan, kerugian atau kehilangan, baik secara lansgung atau konsekuensial yang melanggar hukum dalam negeri ataupun luar negeri yang mungkin ditimbulkan oleh kunjungan Pengguna dan/atau transaksi dalam situs tersebut.</p>
            <li>
                <P class="font-rubik text-justify mb-5">Keputusan untuk menyetujui atau menolak sewa menyewa adalah kebijaksanaan tunggal dari Pengguna. DEAR OUTDOOR12 tidak memiliki kewenangan untuk menerima atau menolak sewa menyewa, dan tidak bertanggung jawab atas penolakan, pembatalan, atau penundaan.</p>
        </p>
    </ul>
</div>