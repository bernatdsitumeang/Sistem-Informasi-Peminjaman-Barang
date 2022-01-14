<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- <script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script> -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // $("#tgl-selesai").on("change paste keyup", function() {
        //     // const selBayar = document.getElementById("jns_lap").selectedIndex;
        //     const kembali = new Date($("#kembali").val());
        //     const pengembalian = new Date($("#tgl-selesai").val());

        //     const due = parseInt((pengembalian - kembali) / (1000 * 60 * 60 * 24), 10);
        //     $('#terlambat').val(due);
        //     console.log(1);
        // });
        $("#btn-export").attr('disabled', true);
        $("#jns_lap").on("change paste keyup", function() {
            const selBayar = document.getElementById("jns_lap").selectedIndex;
            if (selBayar == 0) {
                $(".items").addClass('d-none');
                $(".tanggal").addClass('d-none');
                $(".bulan").addClass('d-none');
            } else if (selBayar == 1) {
                $(".items").removeClass('d-none');
                $(".tanggal").addClass('d-none');
                $(".bulan").addClass('d-none');
            } else if (selBayar == 2) {
                $(".items").addClass('d-none');
                $(".tanggal").removeClass('d-none');
                $(".bulan").addClass('d-none');
            }else if (selBayar == 3) {
                $(".items").addClass('d-none');
                $(".tanggal").addClass('d-none');
                $(".bulan").removeClass('d-none');
            } else {
                $(".items").addClass('d-none');
                $(".tanggal").addClass('d-none');
                $(".bulan").addClass('d-none');
            }
        });
        $("#btn-preview").click(function() {
            const type = $("#jns_lap").val();
            const item = $("#item").val();
            const tanggal = $("#tanggal").val();
            $.ajax({
                url: "<?= base_url('admin/laporan/preview_laporan') ?>",
                type: "POST",
                data: {
                    type: type,
                    item: item,
                    tanggal: tanggal
                },
                dataType: "JSON",
                success: function(data) {
                    $("#export-type").val(type);
                    $("#export-item").val(item);
                    $("#export-tanggal").val(tanggal);
                    $("#btn-export").attr('disabled', false);
                    let html = '';
                    let tgl_kembali;
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].tanggal_pengembalian == '0000-00-00') {
                            tgl_kembali = '-';
                        } else {
                            tgl_kembali = data[i].tanggal_pengembalian;
                        }
                        html += '<tr>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].nama_brg + '</td>' +
                            '<td>' + data[i].tanggal_sewa + '</td>' +
                            '<td>' + data[i].tanggal_kembali + '</td>' +
                            '<td> Tipe : ' + data[i].jns_pengambilan + '<hr> Tanggal Pengembalian :' +
                            tgl_kembali + '</td>' +
                            '<td> Tipe : ' + data[i].jns_pembayaran + '<hr>Total Harga: Rp.' +
                            data[i].total_bayar + '<br> Total Denda : Rp.' +
                            data[i].total_denda + '<br> Sudah Bayar : Rp.' +
                            data[i].sudah_bayar + '</td>' +
                            '</tr>';
                    }
                    $('#prev-lap').html(html);
                }
            });
        });
    });
</script>
</body>

</html>