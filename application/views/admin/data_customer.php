<div class="container-fluid">
    <div class="section-class">
        <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;

                foreach ($customer as $cs) : ?>

                    <tr class="mt-5">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $cs->nama ?></td>
                        <td><?php echo $cs->username ?></td>
                        <td><?php echo $cs->gender ?></td>
                        <td><?php echo $cs->no_telepon ?></td>

                        <td>

                            <?php echo anchor('admin/data_customer/detail_customer/' . $cs->id_customer, '<div class="btn btn-warning btn-md"><i class="fas fa-eye"></i></div>') ?>
                            <?php echo anchor('admin/data_customer/edit/' . $cs->id_customer, '<div class="btn btn-primary btn-md"><i class="fas fa-edit"></i></div>') ?>
                            <?php echo anchor('admin/data_customer/hapus/' . $cs->id_customer,  '<div class="btn btn-danger btn-md"><i class="fas fa-trash"></i></div>') ?>

                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>

            </table>
    </div>
</div>