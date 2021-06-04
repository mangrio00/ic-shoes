<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="container" style="min-height: 30vw !important; font-family: 'Montserrat';margin-top: 60px">
                        <div class="row">
                            <div class="col-md-3 pr-4">
                                <img class="img-thumbnail" src="<?= base_url('assets/img/profile/') . $admin['image'] ?>" alt="">
                                <a class="btn btn-outline-info w-100 mt-3" href="<?= base_url('admin/editImageProfile/' . $admin['id_user']) ?>">Change Photo</a>
                            </div>
                            <div class="col-md-9 pr-0">
                                <table>
                                    <tbody>
                                        <tr style="width: fit-content;height: 50px;">
                                            <th style="width: 150px;">Full Name</th>
                                            <td style="width: 150px;"><?= $admin['fullname'] ?></td>
                                        </tr>
                                        <tr style="width: fit-content;height: 50px;">
                                            <th style="width: 150px;">Username</th>
                                            <td style="width: 150px;"><?= $admin['username'] ?></td>
                                        </tr>
                                        <tr style="width: fit-content;height: 50px;">
                                            <th style="width: 150px;">Alamat</th>
                                            <td style="width: 150px;"><?= $admin['alamat'] ?></td>
                                        </tr>
                                        <tr style="width: fit-content;height: 50px;">
                                            <th style="width: 150px;">Nomor HP</th>
                                            <td style="width: 150px;"><?= $admin['no_hp'] ?></td>
                                        </tr>
                                        <tr style="width: fit-content;height: 50px;">
                                            <th style="width: 150px;">Email</th>
                                            <td style="width: 150px;"><?= $admin['email'] ?></td>
                                        </tr>
                                        <tr style="width: fit-content;height: 50px;">
                                            <th style="width: 150px;">Tanggal Bergabung</th>
                                            <td style="width: 150px;"><?= $admin['date_created'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="btn btn-success mt-5 w-100" href="<?= base_url('admin/formEditProfile/' . $admin['id_user']) ?>">Edit My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->