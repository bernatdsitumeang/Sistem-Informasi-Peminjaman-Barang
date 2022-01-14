<div class="container-fluid">
    <div class="section-class">
        <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>

        <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($barang as $brg) : ?>

                    <tr class="mt-5">
                        <td><?php echo $no++ ?></td>
                        <td>
                            <img class="rounded-pill" width="50px" src="<?php echo base_url() . 'uploads/' . $brg->gambar ?>">
                        </td>
                        <td><?php echo $brg->nama_brg ?></td>
                        <td><?php echo $brg->kategori ?></td>
                        <td>Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></td>
                        <td><?php
                            if ($brg->status == "0") {
                                echo "<h5><span class='badge badge-pill badge-danger'> Tidak Tersedia </span></h5>";
                            } else {
                                echo "<h5><span class='badge badge-pill badge-primary'> Tersedia </span></h5>";
                            }
                            ?> </td>
                        <td>

                            <?php echo anchor('admin/data_barang/detail_barang/' . $brg->id_brg, '<div class="btn btn-warning btn-md"><i class="fas fa-eye"></i></div>') ?>
                            <?php echo anchor('admin/data_barang/edit/' . $brg->id_brg, '<div class="btn btn-primary btn-md"><i class="fas fa-edit"></i></div>') ?>
                            <?php echo anchor('admin/data_barang/hapus/' . $brg->id_brg,  '<div class="btn btn-danger btn-md"><i class="fas fa-trash"></i></div>') ?>

                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>

            </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url() . 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_brg" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                        <option>-- Pilih Kategori --</option>
                        <option>Tenda Dome</option>
                        <option>Tas Punggung</option>
                        <option>Pakaian Hangat</option>
                        <option>Peralatan Masak</option>
                        <option>Perlengkapan Trecking</option>
                        <option>Aksesoris</option>
                        <option>Promo</option>
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Harga Promo</label>
                        <input type="text" name="promo" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Stok Barang</label>
                        <select name="status" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                        <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Gambar</label><br>
                        <input type="file" name="gambar" class="form-control">
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