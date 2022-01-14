<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Data Customer</h3>

    <?php
    foreach ($customer as $cs) : ?>

        <form method="post" action="<?php echo base_url() . 'admin/data_customer/update' ?>">

            <div class="form-group"><br>
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $cs->nama ?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="hidden" name="id_customer" class="form-control" value="<?php echo $cs->id_customer ?>">
                <input type="text" name="username" class="form-control" value="<?php echo $cs->username ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $cs->alamat ?>">
            </div>
            <div class="form-group mt-2">
                <label>Gender</label>
                <select class="form-control" name="gender">
                    <option value="<?php echo $cs->gender ?>">-- Pilih --</option>
                    <option value="laki-laki">Laki - Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select><br>
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="<?php echo $cs->no_telepon ?>"><br>
            </div>
            <div class="form-group">
                <label>No. KTP</label>
                <input type="text" name="no_ktp" class="form-control" value="<?php echo $cs->no_ktp ?>"><br>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="<?php echo $cs->password ?>"><br>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3 ml-3 float-right mb-4">Save</button>
            <a href="<?php echo base_url('admin/data_customer') ?>">
                <div class="btn btn-sm btn-danger mt-3 float-right">Back</div>
            </a>

        </form>

    <?php endforeach; ?>
</div>