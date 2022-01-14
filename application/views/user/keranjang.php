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

<div class="container py-5 mb-5">
    <h4 class="font-rubik font-size-20 text-dark">Keranjang Belanja</h4>
    <hr>
</div>

<table class="container table table-bordered table-striped table-hover mb-5">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga /Hari</th>
        <th>Sub Total</th>
    </tr>

    <?php
    $no = 1;
    foreach ($this->cart->contents() as $items) : ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $items['name'] ?></td>
            <td><?php echo $items['qty'] ?></td>
            <td>Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
            <td>Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?> </td>
        </tr>

    <?php endforeach; ?>

    <tr>
        <th colspan="4">Total</th>
        <th align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></th>
    </tr>
</table>

<div align="right" class="container mb-5 px-1">
    <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
        <div class="btn btn-sm btn-danger ml-1 mb-5 mt-3">Hapus Semua</div>
    </a>
    <a href="<?php echo base_url('dashboard/welcome') ?>">
        <div class="btn btn-sm color-primary-bg text-white ml-1 mb-5 mt-3">Kembali Belanja</div>
    </a>
    <button class="btn btn-sm btn-success ml-1 mb-5 mt-3" id="btn-payment" data-toggle="modal" data-target="#bayar">Lanjut</button>
</div>
<div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container font-size-20 text-center font-baloo ml-4 text-primary">
                    <?php
                    $grand_total = 0;
                    if ($keranjang = $this->cart->contents()) {
                        foreach ($keranjang as $item) {
                            $grand_total = $grand_total + $item['subtotal'];
                        }

                        echo "Subtotal  Belanja Anda : Rp. " . number_format($grand_total, 0, ',', '.');
                    ?>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('dashboard/proses_pesanan') ?> " enctype="multipart/form-data">
                <?php foreach ($this->cart->contents() as $items) : ?>
                    <input type="hidden" name="brg[id_brg][]" value="<?php echo $items['id'] ?>">
                    <input type="hidden" name="brg[denda_perhari][]" value="<?php echo $items['price'] ?>">
                <?php endforeach; ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="alamat" placeholder="Nama Lengkap Anda" class="form-control" value="<?= $this->session->userdata('nama') ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" readonly>
                        <?= $this->session->userdata('alamat') ?>
                        </textarea>
                                <!-- <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control"> -->
                            </div>

                            <div class="form-group">
                                <label>Tanggal Sewa</label>
                                <input type="date" name="tanggal_sewa" id="rent-date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" id="return-date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pengambilan Peralatan</label>
                                <select class="form-control" name="jns_ambil">
                                    <option>-- Choose --</option>
                                    <option value="Ketoko">Datang Ketoko</option>
                                    <option value="Diantar">Diantar Kerumah (Khusus Semarang Timur)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pembayaran</label>
                                <select class="form-control" name="jns_bayar" id="jns_bayar">
                                    <option>-- Chose --</option>
                                    <option value="bayar penuh">Bayar Penuh</option>
                                    <option value="bayar 50%">Pembayaran Awal 50%</option>
                                    <option value="bayar 30%">Pembayaran Awal 30%</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="subtotal" name="subtotal" value="<?= $grand_total ?>">
                                <label>Total Belanja</label><br>
                                <input type="text" name="total" id="total" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <!-- <input type="hidden" id="subtotal" name="subtotal" value=""> -->
                                <label>Total Bayar</label><br>
                                <input type="text" name="bayar" id="harusbayar" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Upload Bukti Pembayaran</label><br>
                                <input type="file" name="bukti_bayar" id="bukti" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn color-primary-bg text-white btn-pay">Bayar</button>
                </div>
            </form>
        <?php
                    } else {
                        echo "Keranjang Belanja Anda Masih Kosong !!";
                    }
        ?>
        </div>
    </div>
</div>
</div>
</div>