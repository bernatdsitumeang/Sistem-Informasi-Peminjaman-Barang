<div class="px-4 py-2">
    <h4 class="font-rubik font-size-20 text-dark">Detail Customer</h4>
    <hr>

    <?php foreach ($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5 mt-5 ml-5" style="font-size: 30px;">
                        <i class="fas fa-user fa-10x mt-3 ml-5"></i>
                    </div>
                    <div class="ml-2 mt-5 col-md-6">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $dt->nama ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><?php echo $dt->username ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?php echo $dt->alamat ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $dt->gender ?></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td><?php echo $dt->no_telepon ?></td>
                            </tr>
                            <tr>
                                <td>No. KTP</td>
                                <td><?php echo $dt->no_ktp ?></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><?php echo $dt->password ?></td>
                            </tr>


                        </table>
                        <?php echo anchor('admin/data_barang/edit/' . $dt->id_customer, '<div class="btn btn-sm btn-primary mt-3 ml-3 float-right">Edit</div>') ?>
                        <a href="<?php echo base_url('admin/data_customer') ?>">
                            <div class="btn btn-sm btn-danger mt-3 float-right">Back</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endforeach ?>