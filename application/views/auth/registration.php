<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Lightbox-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/lightbox2/css/lightbox.min.css') ?>">
    <!-- Range slider-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/nouislider/nouislider.min.css') ?>">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css') ?>">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/owl.carousel2/assets/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/owl.carousel2/assets/owl.theme.default.css') ?>">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.default.css') ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fontawesome-free/css/all.min.css') ?>">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="page-holder">
        <!-- navbar-->
        <header class="header bg-white">
            <div class="container px-0 px-lg-3">
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="<?= base_url('main') ?>"><span class="font-weight-bold text-uppercase text-dark">IC-Shoes</span></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link" href="<?= base_url('main') ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link" href="<?= base_url('main/shop') ?>">Shop</a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </header>
        <!-- ----------------------------------- Content ----------------------------------- -->
        <div class="container mt-2 mb-5">
            <div class="row justify-content-center">
                <!-- <div class="col-md-12" style="min-height: 30vw;"> -->

                <div class="col-md-6 rounded-right" style="background-color: whitesmoke;height:752px">
                    <h3 class="text-center mt-3">Registration</h3>
                    <?php $this->session->flashdata('pesan'); ?>
                    <!-- <hr> -->
                    <form class="col-md-12" action="<?= base_url('auth/registration') ?>" method="POST">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="fullname" class="mt-0">Full Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?= set_value('fullname') ?>">
                                    </div>
                                    <small class="text-danger"><?= form_error('fullname') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="mt-0">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?= set_value('username') ?>">
                                    </div>
                                    <small class="text-danger"><?= form_error('username') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="mt-0">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-briefcase"></i></div>
                                        </div>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
                                    </div>
                                    <small class="text-danger"><?= form_error('email') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="mt-0">Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-briefcase"></i></div>
                                        </div>
                                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?= set_value('alamat') ?>">
                                    </div>
                                    <small class="text-danger"><?= form_error('alamat') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp" class="mt-0">Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-briefcase"></i></div>
                                        </div>
                                        <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan Nomor HP" value="<?= set_value('no_hp') ?>">
                                    </div>
                                    <small class="text-danger"><?= form_error('no_hp') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="password1" class="mt-0">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                        </div>
                                        <input type="password" name="password1" id="password1" class="form-control" placeholder="Masukkan Password">
                                    </div>
                                    <small class="text-danger"><?= form_error('password1') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="password2" class="mt-0">Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                        </div>
                                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password Anda">
                                    </div>
                                    <small class="text-danger"><?= form_error('password2') ?></small>
                                </div>
                                <div class="d-flex justify-content-around mt-0">
                                    <button type="submit" class="btn btn-success">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                        <a class="d-flex justify-content-center mt-3" href="<?= base_url('auth/login') ?>">Login?</a>
                    </form>
                </div>

                <!-- </div> -->
            </div>
        </div>
        <!-- ----------------------------------- Content ----------------------------------- -->