<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

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

    <div class="container py-3">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="<?php echo base_url('assets/img/logins.jpg') ?>" alt="ok" class="mx-auto d-block mt-5" style="width: 525px;" height="565x;"></div>
                    <div class=" col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account !</h1>
                            </div>
                            <form class="user" method="POST" action="<?php echo base_url('register') ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" <?php echo set_value('nama'); ?>>
                                        <?php echo form_error('nama', '<div class="ml-2 text-small text-danger">', '</div>')  ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" <?php echo set_value('unsername'); ?>>
                                        <?php echo form_error('username', '<div class="ml-2 text-small text-danger">', '</div>')  ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" <?php echo set_value('alamat'); ?>>
                                    <?php echo form_error('alamat', '<div class="ml-2 text-small text-danger">', '</div>')  ?>
                                </div>
                                <div name="gender">
                                    <div class="custom-control custom-radio custom-control-inline mb-3 ml-2">
                                        <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="laki-laki">
                                        <label class="custom-control-label" for="customRadioInline1">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="perempuan">
                                        <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="no_telepon" name="no_telepon" placeholder="No Telepon" <?php echo set_value('no_telepon'); ?>>
                                        <?php echo form_error('no_telepon', '<div class="ml-2 text-small text-danger">', '</div>')  ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="no_ktp" name="no_ktp" placeholder="No KTP" <?php echo set_value('no_ktp'); ?>>
                                        <?php echo form_error('no_ktp', '<div class="ml-2 text-small text-danger">', '</div>')  ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="Password" class="form-control form-control-user" id="password" name="password" placeholder="Password" <?php echo set_value('password'); ?>>
                                    <?php echo form_error('password', '<div class="ml-2 text-small text-danger">', '</div>')  ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="mt-4 btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                </div>
                            </form><br>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/lupa_password');  ?>">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth/login') ?>">Already have an account? Login !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>