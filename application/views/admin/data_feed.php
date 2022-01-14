<div class="container-fluid">
    <div class="section-class">
        <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Umpan Balik</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;

                foreach ($feed as $cs) : ?>

                    <tr class="mt-5">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $cs->namauser ?></td>
                        <td><?php echo $cs->feedback ?></td>
                        <td>

                            <?php if($cs->id_customer != null)echo anchor('admin/data_customer/detail_customer/' . $cs->id_customer, '<div class="btn btn-warning btn-md"><i class="fas fa-eye"></i></div>') ?>
                            <?php echo anchor('admin/dashboard/hapusFeed/' . $cs->id_feed,  '<div class="btn btn-danger btn-md"><i class="fas fa-trash"></i></div>') ?>

                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>

            </table>
    </div>
</div>