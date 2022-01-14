<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Data Barang</h3>

    <?php
    foreach ($barang as $brg) : ?>

        <form method="post" action="<?php echo base_url() . 'admin/data_barang/update' ?>">

            <div class="for-group"><br>
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
            </div>
            <div class="for-group"><br>
                <label>Keterangan</label>
                <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
                <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
            </div>
            <div class="for-group"><br>
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori ?>">
            </div>
            <div class="for-group"><br>
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
            </div>
            <div class="for-group"><br>
                <label>Promo</label>
                <input type="text" name="promo" class="form-control" value="<?php echo $brg->promo ?>">
            </div>
            <div class="for-group"><br>
                <label>Status</label>
                <input type="text" name="status" class="form-control" value="<?php echo $brg->status ?>"><br>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3 ml-3 mb-4 float-right">Save</button>
            <a href="<?php echo base_url('admin/data_barang') ?>">
                <div class="btn btn-sm btn-danger mt-3 mb-4 float-right">Back</div>
            </a>

        </form>

    <?php endforeach; ?>
</div>