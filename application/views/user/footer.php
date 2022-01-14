<!-- Start Footer -->
<footer id="footer" class="color-primary-bg text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 ml-5">
                <h4 class="font-rubik font-size-20">Dear Outdoor12</h4>
                <p class="font-size-14 font-rale text-white-50 text-justify"> Aplikasi penyewaan peralatan outdoor untuk area Bengkulu khususnya Kota Bengkulu, yang dapat digunakan siapapun, kapanpun dan dimanapun.</p>
            </div>
            <div class="col-lg-4 col-12 ml-4" id="feed">
                <h4 class="font-rubik font-size-20">Umpan Balik</h4>
                <form class="form-row" action="<?= base_url('dashboard/feedback') ?>" method="post">
                    <div class="col">
                        <textarea class="rounded" name="feed" style="outline: none;" cols="25" rows="2" placeholder=""></textarea>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn color-secondary-bg mt-3 text-white">Kirim</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Informasi</h4>
                <div class="d-flex flex-coloumn flex-wrap">
                    <a href="<?php echo base_url('dashboard/about_us') ?>" class="font-rale font-size-14 text-white-50 pb-1">Tentang Kami</a>
                    <a href="<?php echo base_url('dashboard/about_renting') ?>" class="font-rale font-size-14 text-white-50 pb-1 mr-5">Cara Penyewaan</a>
                    <a href="<?php echo base_url('dashboard/privacy_policy') ?>" class="font-rale font-size-14 text-white-50 pb-1">Kebijakan Pribadi</a>
                    <a href="<?php echo base_url('dashboard/terms_condition') ?>" class="font-rale font-size-14 text-white-50 pb-1">Syarat & Ketentuan</a>
                </div>
            </div>
            <div class="col-lg-2 col-12 ml-2">
                <h4 class="font-rubik font-size-20">Tentang Akun</h4>
                <div class="d-flex flex-coloumn flex-wrap">
                    <?php if ($this->session->userdata('nama')) { ?>
                        <a class="font-rale font-size-14 text-white-50 pb-1" href="<?php echo base_url() ?>dashboard/profile">Akun Saya</a>
                        <a href="<?php echo base_url('dashboard/permintaan_sewa') ?>" class="font-rale font-size-14 text-white-50 pb-1 mr-5">Permintaan Sewa</a>
                        <a href="<?php echo base_url('dashboard/riwayat_sewa') ?>" class="font-rale font-size-14 text-white-50 pb-1 mr-5">Riwayat Sewa</a>
                        <a href="<?php echo base_url('dashboard/detail_keranjang') ?>" class="font-rale font-size-14 text-white-50 pb-1 mr-5">Keranjang</a>
                    <?php } else { ?>
                        <a class="font-rale font-size-14 text-white-50 pb-1" href="<?php echo base_url('auth/login') ?>">Akun Saya</a>
                        <a href="<?php echo base_url('auth/login') ?>" class="font-rale font-size-14 text-white-50 pb-1 mr-5">Permintaan Sewa</a>
                        <a href="<?php echo base_url('auth/login') ?>" class="font-rale font-size-14 text-white-50 pb-1 mr-5">Riwayat Sewa</a>
                        <a href="<?php echo base_url('auth/login') ?>" class="font-rale font-size-14 text-white-50 pb-1 mr-5">Keranjang</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright text-center color-primary-bg text-white py-2 mx-auto d-block">
    <a href="https://www.instagram.com/pandanaran_outdoor/"><img src="<?php echo base_url('assets/img/foticon/instagram.png') ?>" class="ml-3 mb-2" style="width: 20px;"></a>
    <a href="https://api.whatsapp.com/send?phone=6282133929543&text=Saya ingin bertanya sesuatu"><img src="<?php echo base_url('assets/img/foticon/whatsapp.png') ?>" class="ml-3 mb-2" style="width: 20px;"></a>
    <a href="https://www.youtube.com/channel/UCgHd3Ike3ZrkJiHyuFf0_WA"><img src="<?php echo base_url('assets/img/foticon/youtube.png') ?>" class="ml-3 mb-2" style="width: 25px;"></a>
    <a href="https://g.page/pandanaranoutdoortravelling?share"><img src="<?php echo base_url('assets/img/foticon/maps.png') ?>" class="ml-3 mb-2" style="width: 20px;"></a>
    <p class="font-rale font-size-14">&copy; Copyrights 2021. Design By <a href="https://www.instagram.com/adrianawn_/" class="color-secondary"> Berlin&Doli </a></p>
</div>
<!-- !End Footer -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<!-- Isotope Plugin CDN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>

<!-- Custom Javascript -->
<script src="<?php echo base_url() ?>assets/js/index.js"></script>
<script type="text/javascript">
    // function previewBukti() {
    //     const img = document.querySelector('#bukti');
    //     const imgPreview = document.querySelector('#preview');
    //     const img = new FileReader();
    //     img.readAsDataURL(img.files[0]);
    //     img.onload = function(e) {
    //         imgPreview.src = e.target.result;
    //     }
    // }
    $(document).ready(function() {
        $("#btn-payment").click(function() {
            const r = new Date().toISOString().split('T')[0];
            // const d_date = new Date(new Date(l_date).getTime() + days * 24 * 60 * 60 * 1000).toISOString().split('T')[0]
            $("#rent-date").val(r);
            $(".btn-pay").attr('disabled', true);
        });
        $("#return-date").on("change paste keyup", function() {
            const rentdate = new Date($("#rent-date").val());
            const returndate = new Date($("#return-date").val());

            const countdays = parseInt((returndate - rentdate) / (1000 * 60 * 60 * 24), 10);
            // console.log(countdays);
            if (countdays < 1) {
                $(".total").val("Rp. 0");
                $(".btn-pay").attr('disabled', true);
            } else {
                $(".btn-pay").attr('disabled', false);
                const subtotal = $("#subtotal").val();
                let total = subtotal * countdays;
                // console.log(subtotal)
                $("#total").val("Rp. " + total);
            }
        });
        $("#jns_bayar").on("change paste keyup", function() {
            const selBayar = document.getElementById("jns_bayar").selectedIndex;
            const total = $("#total").val().substring(3);
            if (selBayar == 0) {
                $("#bayar").val();
            } else if (selBayar == 1) {
                $("#harusbayar").val('Rp. ' + total);
            } else if (selBayar == 2) {
                $("#harusbayar").val('Rp. ' + total * 0.5);
            } else if (selBayar == 3) {
                $("#harusbayar").val('Rp. ' + total * 0.3);
            } else {
                $("#harusbayar").val();
            }
        });
    });
</script>

</body>

</html>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

</body>

</html>