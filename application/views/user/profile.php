<!-- End of Sidebar -->
<div class="mt-4" style="width: 0px; height: 600px; border: 1px #f9f9f9 solid;"></div>
<!-- Content Row -->

<div class="ml-5 mt-5">


    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile Saya</h6>
        </div>
        <div class="card-body text-justify">
            <div class="px-4 py-2">
                <h4 class="font-rubik font-size-20 text-dark">
                    <?php foreach ($detail as $dt) : ?>
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-5 mt-5 ml-5" style="font-size: 18px;">
                                        <i class="fas fa-user fa-10x mt-3 ml-5"></i>
                                    </div>
                                    <div class="ml-2 mt-4 col-md-6" style="font-size: 14px;">
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


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        <?php endforeach ?></h4>
        <hr>

        </div>
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