<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Owl Carousel CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom css-->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container py-5 mt-3">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 mt-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block mt-3"><img src="<?php echo base_url('assets/img/pass.jpg') ?>" alt="ok" class="mx-auto d-block mt-3" style="width: 400px;" height="400x;"></div>
                            <div class="col-lg-6 py-5 mt-1">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ganti Password !</h1>
                                    </div>
                                    <form class="user mt-3" method="POST" action="<?php echo base_url('auth/ganti_password_aksi') ?>">
                                        <div class="form-group">
                                            <input name="pass_baru" type="password" class="form-control form-control-user" id="exampleInputUsername" placeholder="Password Baru">
                                            <?php echo form_error('pass_baru', '<div class="ml-2 text-danger text-small">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input name="ulang_pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ulangi Password">
                                            <?php echo form_error('ulang_pass', '<div class="ml-2 text-danger text-small">', '</div>') ?>
                                        </div>
                                        <button type="submit" class="mt-4 btn-primary btn-user btn-block">
                                            Ganti Password
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>