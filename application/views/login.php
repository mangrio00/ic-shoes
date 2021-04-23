<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewreport" content="width=device-width, initial-scale=1.0">
  <title>IC-Shoes</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styleLogin.css" />
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
            <li class="nav-item">
              <a class="nav-link" href="#">LOGIN</a>
            </li>
          </ul>
        </nav>
      </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="form-container">
                <form action="<?= site_url('login/login') ?>" method="post">
                  <label><h2>LOGIN</h2></label>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
                </form>
              </div>  
            </div>
        </div>
    </div>
</body>
</html>