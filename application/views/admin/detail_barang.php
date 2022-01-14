<div class="px-4 py-2">
    <h4 class="font-rubik font-size-20 text-dark">Detail Barang</h4>
    <hr>


    <?php foreach ($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5">
                        <img src="<?php echo base_url() . 'uploads/' . $dt->gambar ?>" width="500" height="500">
                    </div>
                    <div class="ml-4 mt-5 col-md-6">
                        <table class="table">
                            <tr>
                                <td>Nama Barang</td>
                                <td><?php echo $dt->nama_brg ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><?php echo $dt->keterangan ?></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><?php echo $dt->kategori ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><?php echo $dt->harga ?></td>
                            </tr>
                            <tr>
                                <td>Harga Promo</td>
                                <td><?php
                                    if ($dt->promo == "0") {
                                        echo "<h5><span class='badge text-danger'> Tidak Ada Promo </span></h5>";
                                    } else {
                                        echo "<h5><span class='badge text-primary'>$dt->promo </span></h5>";
                                    }
                                    ?></td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php
                                    if ($dt->status == "0") {
                                        echo "<h5><span class='badge badge-pill badge-danger'> Tidak Tersedia </span></h5>";
                                    } else {
                                        echo "<h5><span class='badge badge-pill badge-primary'> Tersedia </span></h5>";
                                    }
                                    ?></td>
                            </tr>
                        </table>
                        <?php echo anchor('admin/data_barang/edit/' . $dt->id_brg, '<div class="btn btn-sm btn-primary mt-3 ml-3 float-right">Edit</div>') ?>
                        <a href="<?php echo base_url('admin/data_barang') ?>">
                            <div class="btn btn-sm btn-danger mt-3 float-right">Back</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endforeach ?>