<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewreport" content="width=device-width, initial-scale=1.0">
  <title>IC-Shoes</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styleHomepage.css" />
</head>
<body>
  <div class="container-fluid banner">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-md">
          <div class="navbar-brand">IC-Shoes</div>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">MAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">WOMAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">REGISTER</a>
            </li>
            <?php if ($_SESSION['username']!="Guest") { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('profile') ?>"><?= $_SESSION['username'] ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Welcome/logout') ?>">LOGOUT</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('login') ?>">LOGIN</a>
              </li>
            <?php } ?>
          </ul>
        </nav>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="dashboard-wrapper dashboard-user-profile">
              <div class="media">
                <div class="media-body">
                  <ul class="user-profile-list">
                    <li><span>Nama:</span><?= $result['namaUser'] ?></li>
                    <li><span>Country:</span>USA</li>
                    <li><span>Email:</span>mail@gmail.com</li>
                    <li><span>Phone:</span>+880123123</li>
                    <li><span>Date of Birth:</span>Dec , 22 ,1991</li>
                  </ul>
                </div>
                <div class="pull-right align-bottom" href="#!">
                    <button type="button" class="btn btn-dark">Edit Profile</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>