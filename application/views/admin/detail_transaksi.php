<div class="px-4 py-2">
    <h4 class="font-rubik font-size-20 text-dark">Detail Transaksi</h4>
    <hr>


    <?php foreach ($detail as $dt) : ?>
        <div class="card mt-5 mb-5">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5">
                        <img src="<?php echo base_url() . 'uploads/' . $dt['gambar'] ?>" width="500" height="500">
                    </div>
                    <div class="ml-4 mt-5 col-md-6">
                        <h3>Info Customer</h3>
                        <table class="table">
                            <tr>
                                <td>KTP</td>
                                <td><?php echo $dt['no_ktp'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Customer</td>
                                <td><?php echo $dt['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td><?php echo $dt['no_telepon'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Customer</td>
                                <td><?php echo $dt['alamat'] ?></td>
                            </tr>
                        </table>

                        <h3>Info Barang</h3>
                        <table class="table">
                            <tr>
                                <td>Nama Barang</td>
                                <td><?php echo $dt['nama_brg'] ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><?php echo $dt['keterangan'] ?></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><?php echo $dt['kategori'] ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><?php echo $dt['harga'] ?></td>
                            </tr>
                            <tr>
                                <td>Waktu Sewa</td>
                                <td><?php echo $dt['tanggal_sewa'] ?> s/d <?php echo $dt['tanggal_kembali'] ?> </td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengembalian</td>
                                <td><?php echo $dt['tanggal_pengembalian'] ?></td>
                            </tr>

                        </table>
                        <a href="<?php echo base_url('admin/transaksi') ?>">
                            <div class="btn btn-sm btn-danger mt-3 float-right">Back</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>