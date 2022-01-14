<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 600px;
            border-radius: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
            font-size: 12px;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5
        }

        h2 {
            color: #5E5B5C;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="outtable">
        <h2><?= $judul ?></h2>
        <table class="table table-striped table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="short">#</th>
                    <th>Customer</th>
                    <th>Barang</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Pengambilan</th>
                    <th>Pembayaran</th>
                </tr>
            </thead>
            <tbody id='prev-lap'>
                <?php $no = 1;
                foreach ($laporan as $l) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $l['nama'] ?></td>
                        <td><?= $l['nama_brg'] ?></td>
                        <td><?= $l['tanggal_sewa'] ?></td>
                        <td><?= $l['tanggal_kembali'] ?></td>
                        <td>
                            Tipe : <?= $l['jns_pengambilan'] ?>
                            <hr>
                            Tgl. Pengembalian : <?= $l['tanggal_pengembalian'] ?>
                        </td>
                        <td>
                            Tipe :<?= $l['jns_pembayaran'] ?>
                            <hr>
                            Total Harga :<?= $l['total_bayar'] ?>
                            <br>
                            Total Denda :<?= $l['total_denda'] ?>
                            <br>
                            Sudah Bayar :<?= $l['sudah_bayar'] ?>
                            <br>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>