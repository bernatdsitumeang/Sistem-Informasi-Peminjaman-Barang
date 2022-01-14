<div class="container-fluid mt-5">
    <div class="section-class">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaksi</th>
                    <th>Pembayaran</th>
                    <th>Action</th>
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
                // if ($tr['status_sewa'] == 1) {
                //     $stssewa = '<span class="badge badge-primary p-2">Sedang Sewa</span>';
                // } else {
                //     $stssewa = '<span class="badge badge-success p-2">Sudah Kembali</span>';
                // }
            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td width="35%"><strong> Kode :</strong> <?php echo $tr['kode'] ?>
                        <hr><strong>Customer :</strong> <?php echo $tr['nama'] ?>
                        <br><strong>Pengambilan :</strong> <?php echo $tr['jns_pengambilan'] ?>
                        <br><strong>Tgl. Sewa : </strong> <?php echo date('d/m/Y', strtotime($tr['tanggal_sewa'])) . ' <strong>s/d </strong>' . date('d/m/Y', strtotime($tr['tanggal_kembali'])); ?>
                        <hr><strong> Barang : </strong><button data-toggle="modal" data-target="#barang<?= $tr['id_sewa'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Detail</button><br>
                    </td>
                    <td>
                        <strong>Tipe Bayar : </strong><?php echo $tr['jns_pembayaran'] ?>
                        <hr><strong>Total Harga : </strong>Rp. <?php echo number_format($tr['total_bayar'], 0, ',', '.') ?>
                        <br><strong>Sudah Bayar : </strong>Rp. <?php echo number_format($tr['sudah_bayar'], 0, ',', '.') ?>
                        <br><strong>Kekurangan : </strong>Rp. <?php echo number_format($byr, 0, ',', '.') ?>
                        <hr><strong> Status Sewa: </strong>
                        <?php if ($tr['status_pembayaran'] == "pending") : ?>
                            <span class="badge badge-secondary p-2">Pending</span>
                        <?php elseif ($tr['status_pembayaran'] == "confirm") : ?>
                            <span class="badge badge-success p-2">Confirm</span>
                        <?php else : ?>
                            <span class="badge badge-danger p-2">Cancel</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($tr['status_pembayaran'] == 'pending') : ?>
                            <a href="" class="btn btn-info btn-md d-inline" data-toggle="modal" data-target="#kembali<?= $tr['id_sewa'] ?>"><i class="fas fa-hand-holding-usd"></i> Konfirmasi</a>
                            <form action="<?= base_url('admin/transaksi/batalSewa?q=') . base64_encode($tr['id_sewa']) ?>" method="post">
                                <?php foreach ($barang as $br) : ?>
                                    <?php if ($br['id_sewa'] === $tr['id_sewa']) : ?>
                                        <input type="hidden" name="barang[id_brg][]" value="<?= $tr['id_brg'] ?>">
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <button type="submit" class="btn btn-danger btn-md mt-3"><i class="fas fa-times-circle"></i> Batalkan</button>
                            </form>
                        <?php elseif ($tr['status_pembayaran'] == 'confirm') : ?>
                            <a href="<?= base_url('admin/transaksi/detail?q=') . base64_encode($tr['id_sewa']) ?>" class="btn btn-warning btn-md"><i class="fas fa-eye"></i> Lihat</a>
                            <form action="<?= base_url('admin/transaksi/batalSewa?q=') . base64_encode($tr['id_sewa']) ?>" method="post">
                                <?php foreach ($barang as $br) : ?>
                                    <?php if ($br['id_sewa'] === $tr['id_sewa']) : ?>
                                        <input type="hidden" name="barang[id_brg][]" value="<?= $tr['id_brg'] ?>">
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <button type="submit" class="btn btn-danger btn-md mt-3"><i class="fas fa-times-circle"></i> Batalkan</button>
                            </form>
                        <?php else : ?>
                            <a href="<?= base_url('admin/transaksi/detail?q=') . base64_encode($tr['id_sewa']) ?>" class="btn btn-warning btn-md"><i class="fas fa-eye"></i> Lihat</a>
                        <?php endif; ?>
                    </td>
                </tr>

    </div>

    <div class="modal fade" id="kembali<?= $tr['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="<?php echo base_url() . 'admin/transaksi/konfirmasiBayar?q=' . base64_encode($tr['id_sewa']); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengembalian Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="<?= base_url('/uploads/payment/') . $tr['bukti_bayar'] ?>" alt="Image" class="w-100"><br>
                                <h5 class="text-center">Foto Bukti Pembayaran</h5>
                            </div>
                            <div class="col-lg-6">
                                <input type="hidden" name="sudah_bayar" value="<?= $tr['sudah_bayar'] ?>">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" value="<?= $tr['nama_brg'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan Pembayaran</label>
                                    <input type="text" class="form-control" value="<?= $tr['jns_pembayaran'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Total Bayar</label>
                                    <input type="text" name="total_bayar" class="form-control" value="Rp. <?= number_format($tr['total_bayar'], 0, ',', '.') ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Kekurangan</label>
                                    <input type="text" name="kurang" class="form-control" value="Rp. <?= number_format($byr, 0, ',', '.') ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
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