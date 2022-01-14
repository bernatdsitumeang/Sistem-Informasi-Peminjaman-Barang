<!-- End of Sidebar -->
<div class="mt-4" style="width: 0px; height: 600px; border: 1px #f9f9f9 solid;"></div>
<!-- Content Row -->

<div class="container-fluid mt-5">
    <div class="section-class">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaksi</th>
                    <th>Pembayaran</th>
                </tr>
            </thead>

            <?php $no = 1;
            foreach ($transaksi as $tr) :
                $byr = $tr['total_bayar'] - $tr['sudah_bayar'];
                if ($byr == 0) {
                    $stsbyr = '<span class="badge badge-success p-2">Lunas</span>';
                } else {
                    $stsbyr = '<span class="badge badge-danger p-2">Belum Lunas</span>';
                }
            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><strong> Kode :</strong> <?php echo $tr['kode'] ?>
                        <hr><strong>Customer :</strong> <?php echo $tr['nama'] ?>
                        <br><strong>Pengambilan :</strong> <?php echo $tr['jns_pengambilan'] ?>
                        <br><strong>Tgl. Sewa : </strong> <?php echo date('d/m/Y', strtotime($tr['tanggal_sewa'])) . ' <strong>s/d </strong>' . date('d/m/Y', strtotime($tr['tanggal_kembali'])); ?>
                        <br><strong>Tgl. Pengembalian : </strong> <?php echo ($tr['tanggal_pengembalian'] == "0000-00-00" ? "-" : date('d/m/Y', strtotime($tr['tanggal_pengembalian']))); ?>
                        <hr><strong> Barang : </strong><button data-toggle="modal" data-target="#barang<?= $tr['id_sewa'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Detail</button><br>
                    </td>
                    <td>
                        <strong>Tipe Bayar : </strong><?php echo $tr['jns_pembayaran'] ?>
                        <hr><strong>Total Harga : </strong>Rp. <?php echo number_format($tr['total_bayar'], 0, ',', '.') ?>
                        <br><strong>Sudah Bayar : </strong>Rp. <?php echo number_format($tr['sudah_bayar'], 0, ',', '.') ?>
                        <br><strong>Kekurangan : </strong>Rp. <?php echo number_format($byr, 0, ',', '.') ?>
                        <br><strong>Denda : </strong> <?php echo ($tr['total_denda'] == "0" ? "-" : number_format($tr['total_denda'], 0, ',', '.')); ?>
                        <hr><strong> Status Sewa: </strong>
                        <?php if ($tr['status_pembayaran'] == "pending") : ?>
                            <span class="badge badge-secondary p-2">Pending</span>
                        <?php elseif ($tr['status_pembayaran'] == "confirm") : ?>
                            <span class="badge badge-success p-2">Confirm</span>
                        <?php elseif ($tr['status_pembayaran'] == "paid") : ?>
                            <span class="badge badge-success p-2">Selesai</span>
                        <?php else : ?>
                            <span class="badge badge-danger p-2">Cancel</span>
                        <?php endif; ?>
                    </td>
                </tr>

    </div>
    <!-- Modal Detail Barang -->
    <div class="modal fade" id="barang<?= $tr['id_sewa'] ?>" tabindex="-1" aria-labelledby="detailbarang" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailbarang">Detail Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($barang as $br) : ?>
                            <?php if ($br['id_sewa'] === $tr['id_sewa']) : ?>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img src="<?= base_url('/uploads/') . $br['gambar'] ?>" alt="Image" class="w-100">
                                        </div>
                                        <div class="col-lg-6">
                                            <p><strong>Nama Barang :</strong> <?= $br['nama_brg'] ?></p>
                                            <hr>
                                            <p><strong>Keterangan :</strong> <?= $br['keterangan'] ?></p>
                                            <hr>
                                            <p><strong>Kategori :</strong> <?= $br['kategori'] ?></p>
                                            <hr>
                                            <p><strong>Harga :</strong> Rp. <?= $br['harga'] ?>/Hari</p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Detail Barang -->
<?php endforeach ?>
</table>
</div>
</div>


</div>

<!-- Content Row -->
</div>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

    </div>
</div>
</div>