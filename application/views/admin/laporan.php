<div class="container-fluid mt-5">
    <div class="section-class">
        <div class="row">
            <div class="col-lg-8">
                <!-- Overflow Hidden -->
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group"><br>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="jns_lap">Jenis Laporan</label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="jns_laporan" id="jns_lap" class=" w-50">
                                        <option value="">-- Pilih --</option>
                                        <option value="items">Per Item</option>
                                        <option value="tanggal">Per Tanggal</option>
                                        <option value="bulan">Per Bulan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group items d-none"><br>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="item">Pilih Item</label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="item" id="item" class=" w-50">
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($items as $i) : ?>
                                            <option value="<?= $i['id_brg'] ?>"><?= $i['nama_brg'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group tanggal d-none"><br>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="tanggal">Pilih Tanggal</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="date" name="tanggal" id="tanggal" class="form-control w-50">
                                </div>
                            </div>
                        </div>
                        <div class="form-group bulan d-none"><br>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="bulan">Pilih Bulan</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="month" id="bulan" name="tanggal" class="form-control w-50">
                                </div>
                            </div>
                        </div>
                        <div><br>
                            <div class="row">
                                <div class="col-lg-2">
                                    <a type="button" class="btn btn-block btn-primary btn-sm mt-3 ml-3 mb-4 float-right" id="btn-preview">Preview</a>
                                </div>
                                <div class="col-lg-10">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row m-0">
                            <div class="col-lg-6 my-auto">
                                <h5 class="font-weight-bold text-primary">Preview Laporan</h5>
                            </div>
                            <div class="col-lg-6 my-auto">
                                <form action="<?= base_url('admin/laporan/export') ?>" method="post" target="_blank">
                                    <input type="hidden" name="type" id="export-type">
                                    <input type="hidden" name="item" id="export-item">
                                    <input type="hidden" name="tanggal" id="export-tanggal">
                                    <button type="submit" class="btn btn-success btn-sm float-right" id="btn-export">Export PDF</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Barang</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Pengambilan</th>
                                        <th width="25%">Pembayaran</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Barang</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Pengambilan</th>
                                        <th width="25%">Pembayaran</th>
                                    </tr>
                                </tfoot>
                                <tbody id='prev-lap'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>