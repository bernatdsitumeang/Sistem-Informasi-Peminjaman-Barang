
<div class="container-fluid mt-5">
    <div class="section-class">

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th colspan="2">Transaksi</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php $no = 1;
            $a = array();
            foreach ($transaksi as $tr) :
                $d = date('Y-m-d');
                $today = date_create($d);
                $due = date_create($tr['tanggal_kembali']);
                $dueday = date_diff($due, $today);
                if ($dueday->format('%R%a') < 1) {
                    $terlambat = 0;
                    $hari = 0;
                } else {
                    $terlambat = $dueday->format('%a');
                    $hari = $dueday->format('%R%a');
                }
                foreach ($barang as $b) {
                    if ($tr['id_sewa'] == $b['id_sewa']) {
                        for ($i = 0; $i < sizeof(array($b['denda_perhari'])); $i++) {
                            $a[] = $b['denda_perhari'];
                        }
                    }
                }
                $denda = array_sum($a);
                $byr = $tr['total_bayar'] - $tr['sudah_bayar'];
                if ($byr == 0) {
                    $stsbyr = '<span class="badge badge-success p-2">Lunas</span>';
                } else {
                    $stsbyr = '<span class="badge badge-danger p-2">Belum Lunas</span>';
                }
                if ($tr['status_sewa'] == 'pending') {
                    $stssewa = '<span class="badge badge-primary p-2">Belum Diambil</span>';
                } else {
                    $stssewa = '<span class="badge badge-success p-2">Sudah Kembali</span>';
                }
            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td width="35%"><strong> Kode :</strong> <?php echo $tr['kode'] ?>
                        <hr><strong>Customer :</strong> <?php echo $tr['nama'] ?>
                        <br><strong>Pengambilan :</strong> <?php echo $tr['jns_pengambilan'] ?>
                        <br><strong>Tgl. Sewa : </strong> <?php echo date('d/m/Y', strtotime($tr['tanggal_sewa'])) . ' <strong>s/d </strong>' . date('d/m/Y', strtotime($tr['tanggal_kembali'])); ?>
                        <br><strong>Tgl. Pengembalian : </strong> <?php echo ($tr['tanggal_pengembalian'] == "0000-00-00" ? "-" : date('d/m/Y', strtotime($tr['tanggal_pengembalian']))); ?>
                        <hr><strong> Barang : </strong><button data-toggle="modal" data-target="#barang<?= $tr['id_sewa'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Detail</button>
                        <?php if ($tr['status_sewa'] == "0") : ?>
                            <span class="badge badge-secondary p-2">Belum Diambil</span>
                        <?php elseif ($tr['status_sewa'] == "1") : ?>
                            <span class="badge badge-primary p-2">Sudah Diambil</span>
                        <?php else : ?>
                            <span class="badge badge-success p-2">Sudah Kembali</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <strong>Tipe Bayar : </strong><?php echo $tr['jns_pembayaran'] ?>
                        <hr><strong>Pengambilan : </strong>Rp. <?php echo number_format($tr['total_bayar'], 0, ',', '.') ?>
                        <br><strong>Sudah Bayar : </strong>Rp. <?php echo number_format($tr['sudah_bayar'], 0, ',', '.') ?>
                        <br><strong>Kekurangan : </strong>Rp. <?php echo number_format($byr, 0, ',', '.') ?>
                        <br><strong>Denda : </strong> <?php echo ($tr['total_denda'] == "0" ? "-" : number_format($tr['total_denda'], 0, ',', '.')); ?>
                        <hr><strong> Status Sewa: </strong>
                        <?php if ($tr['status_pembayaran'] == "pending") : ?>
                            <span class="badge badge-secondary p-2">Pending</span>
                        <?php elseif ($tr['status_pembayaran'] == "confirm" && $tr['status_sewa'] == 0) : ?>
                            <span class="badge badge-primary p-2">Confirm</span>
                        <?php elseif ($tr['status_pembayaran'] == "confirm" && $tr['status_sewa'] == 1) : ?>
                            <span class="badge badge-primary p-2">Sedang Disewa</span>
                        <?php elseif ($tr['status_pembayaran'] == "paid" && $tr['status_sewa'] == 2) : ?>
                            <span class="badge badge-success p-2">Selesai</span>
                        <?php else : ?>
                            <span class="badge badge-danger p-2">Cancel</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($tr['status_sewa'] == 0 && $tr['status_pembayaran'] == 'confirm') : ?>
                            <a href="<?= base_url('admin/transaksi/konfirmasiAmbil?q=') . base64_encode($tr['id_sewa']) ?>" class="btn btn-info btn-md"><i class="fas fa-archive"></i> Ambil Barang</a>
                        <?php elseif ($tr['status_sewa'] == 1 && $tr['status_pembayaran'] == 'confirm') : ?>
                            <a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#kembali<?= $tr['id_sewa'] ?>"><i class="fas fa-check-circle"></i> Selesai Sewa</a>
                        <?php elseif ($tr['status_sewa'] == 0 && $tr['status_pembayaran'] == 'cancel') : ?>
                            <a href="<?= base_url('admin/transaksi/detail?q=') . base64_encode($tr['id_sewa']) ?>" class="btn btn-warning btn-md"><i class="fas fa-eye"></i> Lihat</a>
                        <?php else : ?>
                            <a href="<?= base_url('admin/transaksi/detail?q=') . base64_encode($tr['id_sewa']) ?>" class="btn btn-warning btn-md"><i class="fas fa-eye"></i> Lihat</a>
                            <?php echo anchor('admin/transaksi/hapusTransaksi/' . $tr['id_sewa'],  '<div class="btn btn-danger btn-md"><i class="fas fa-trash"></i></div>') ?>
                        <?php endif; ?>
                    </td>
                </tr>

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

                <div class="modal fade" id="kembali<?= $tr['id_sewa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pengembalian Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url() . 'admin/transaksi/kembali?q=' . base64_encode($tr['id_sewa']); ?>" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="col-xl-12 col-md-12 mb-4">
                                                <div class="card border-left-primary shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="h4 text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                    Info Customer</div>

                                                                <div class="mb-0 font-weight-bolder text-gray-800">Nama :
                                                                    <span class="mb-0 font-weight-light text-gray-800"><?= $tr['nama'] ?></span>
                                                                </div>
                                                                <div class="mb-0 font-weight-bolder text-gray-800">No.Telepon :
                                                                    <span class="mb-0 font-weight-light text-gray-800"><?= $tr['no_telepon'] ?></span>
                                                                </div>
                                                                <div class="mb-0 font-weight-bolder text-gray-800">Alamat :
                                                                    <span class="mb-0 font-weight-light text-gray-800"><?= $tr['alamat'] ?></span>
                                                                </div>

                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 mb-4">
                                                <div class="card border-left-primary shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="h4 text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                    Info Barang</div>
                                                                <?php
                                                                foreach ($barang as $b) : ?>
                                                                    <?php if ($tr['id_sewa'] === $b['id_sewa']) : ?>
                                                                        <div class="mb-0 font-weight-light text-gray-800"><?= '<strong>-</strong> ' . $b['nama_brg'] ?>
                                                                            <span class="mb-0 font-weight-light text-gray-800"><?= ' Rp.' . $b['harga'] . ' /Hari' ?></span>
                                                                        </div>
                                                                        <input type="hidden" name="barang[id_brg][]" value="<?php echo $b['id_brg'] ?>">

                                                                    <?php endif; ?>
                                                                <?php
                                                                endforeach; ?>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-box-open fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 mb-4">
                                                <div class="card border-left-primary shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="h4 text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                    Info Denda</div>
                                                                <?php
                                                                foreach ($barang as $b) : ?>
                                                                    <?php if ($tr['id_sewa'] === $b['id_sewa']) : ?>
                                                                        <div class="mb-0 font-weight-light text-gray-800"><?= '<strong>-</strong> ' . $b['nama_brg'] ?>
                                                                            <span class="mb-0 font-weight-light text-gray-800"><?= ' Rp.' . $b['harga'] . ' /Hari' ?></span>
                                                                        </div>


                                                                    <?php endif; ?>
                                                                <?php
                                                                endforeach; ?>
                                                                <div class="mb-0 font-weight-bolder text-gray-800">Subtotal Denda :
                                                                    <span class="mb-0 font-weight-light text-gray-800"><?= 'Rp.' . $denda . ' /Hari' ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">


                                            <input type="hidden" name="sudah_bayar" value="<?= $tr['sudah_bayar'] ?>">
                                            <div class="d-flex">
                                                <div class="form-group w-50 mr-1">
                                                    <label>Kode Transaksi</label>
                                                    <input type="text" class="form-control" value="<?= $tr['kode'] ?>" readonly>
                                                </div>
                                                <div class="form-group w-50 ml-1">
                                                    <label>Tanggal Pengembalian</label>
                                                    <input type="text" class="form-control" id="tgl-selesai" value="<?= date_format($today, 'Y-m-d') ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-group w-50 mr-1">
                                                    <label>Tanggal Sewa</label>
                                                    <input type="text" class="form-control" value="<?= $tr['tanggal_sewa'] ?>" readonly>
                                                </div>
                                                <div class="form-group w-50 ml-1">
                                                    <label>Tanggal Kembali</label>
                                                    <input type="text" class="form-control" name="kembali" value="<?= $tr['tanggal_kembali'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-group w-25 mr-1">
                                                    <label>Tipe Pembayaran</label>
                                                    <input type="text" class="form-control" value="<?= $tr['jns_pembayaran'] ?>" readonly>
                                                </div>
                                                <div class="form-group w-75 ml-1">
                                                    <label>Total DP</label>
                                                    <input type="text" class="form-control text-right" value="<?= 'Rp. ' . number_format($tr['sudah_bayar'], 0, ',', '.') ?>" readonly>
                                                    <input type="hidden" name="sudah_bayar" value="<?= $tr['sudah_bayar'] ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-group w-25 mr-1">
                                                    <label>Keterlambatan</label>
                                                    <input type="text" class="form-control" name="terlambat" id="terlambat" value="<?= $hari . ' Hari' ?>" readonly>
                                                    <input type="hidden" name="terlambat" value="<?= $hari ?>">
                                                </div>
                                                <div class="form-group w-75 ml-1">
                                                    <label>Total Denda</label>
                                                    <input type="text" name="total_bayar" class="form-control text-right" value="Rp. <?= number_format($denda * $terlambat, 0, ',', '.') ?>" readonly>
                                                    <input type="hidden" name="total_denda" value="<?= $denda * $terlambat ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-group w-25 mr-1"></div>
                                                <div class="form-group w-75">
                                                    <label>Total Items</label>
                                                    <input type="text" name="subtotal_bayar" class="form-control text-right" value="Rp. <?= number_format($tr['total_bayar'], 0, ',', '.') ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-group w-25 mr-1"></div>
                                                <div class="form-group w-75 float-left">
                                                    <label>Total Harga Sewa</label>
                                                    <input type="text" class="form-control text-right" value="Rp. <?= number_format($tr['total_bayar'] + ($denda * $terlambat), 0, ',', '.') ?>" readonly>
                                                    <input type="hidden" name="total_bayar" value="<?= $tr['total_bayar'] + ($denda * $terlambat) ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-group w-25 mr-1"></div>
                                                <div class="form-group w-75">
                                                    <label>Kekurangan</label>
                                                    <input type="text" name="kurang" class="form-control text-right" value="Rp. <?= number_format($byr + ($denda * $terlambat), 0, ',', '.') ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-group w-25 mr-1"></div>
                                                <div class="form-group w-75">
                                                    <label>Bayar</label>
                                                    <input type="text" name="bayar" class="form-control text-right">
                                                    <span class="text-info"><small>Isi dengan 0 jika tidak ada kekurangan pembayaran</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </table>
    </div>
</div>