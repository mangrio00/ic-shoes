<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique | Ecommerce bootstrap template</title>
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
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="<?= base_url('main') ?>"><span class="font-weight-bold text-uppercase text-dark">IC SHOES</span></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <?php if ($this->uri->segment(2) == "") : ?>
                                <li class="nav-item">
                                    <!-- Link--><a class="nav-link active" href="<?= base_url('main') ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <!-- Link--><a class="nav-link" href="<?= base_url('main/shop') ?>">Shop</a>
                                </li>
                            <?php elseif ($this->uri->segment(2) == "shop") : ?>
                                <li class="nav-item">
                                    <!-- Link--><a class="nav-link" href="<?= base_url('main') ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <!-- Link--><a class="nav-link active" href="<?= base_url('main/shop') ?>">Shop</a>
                                </li>
                            <?php endif ?>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <?php if ($this->session->has_userdata('email')) : ?>
                                <li class="nav-item"><a class="nav-link active" href="<?= base_url('main/cart') ?>"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">
                                            <?php $count = 0 ?>
                                            <?php foreach ($this->cart->contents() as $barang) : ?>
                                                <?php $count = $count + $barang['qty']; ?>
                                            <?php endforeach ?>
                                            <?php echo "( $count )"; ?>
                                        </small></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $user['username'] ?>
                                        <img class='img-profile rounded-circle' width="25px" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                                    </a>
                                    <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown">
                                        <a class="dropdown-item border-0 transition-link" href="<?= base_url('main/myProfile') ?>">My Profile</a>
                                        <a class="dropdown-item border-0 transition-link" href="<?= base_url('main/cart') ?>">Shopping cart</a>
                                        <a class="dropdown-item border-0 transition-link" href="<?= base_url('auth/logout') ?>">Log Out</a>
                                    </div>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <span style="color: white;text-align: center;"><?= $user['username'] ?></span>
                                    <a style="margin-top: -25px !important;" class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class='img-profile rounded-circle' width="40px" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="<?= base_url('user/editProfile') ?>">Edit Profile</a></li>
                                        <li><a class="dropdown-item" href=" <?= base_url('user/myTransactions') ?>">My Transaction</a></li>
                                        <li><a class="dropdown-item" href="<?= base_url('user/myGame') ?>">My Game</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?> ">Logout</a></li>
                                    </ul>
                                </li> -->
                            <?php else : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('auth') ?>"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/registration') ?>"> <i class="fas fa-user-alt mr-1 text-gray"></i>Sign Up</a></li>
                            <?php endif ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>