<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-5">
                <a class="btn btn-outline-primary" href="">+ Add Barang</a>
            </div>
        </div>
    </div> -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h2 class="text-center">Edit User</h2>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <form method="POST" action="<?= base_url('admin/updateUser/' . $user['id_user']) ?>" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Masukan Nama User" value="<?= $user['fullname'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username" value="<?= $user['username'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email User" value="<?= $user['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat User" value="<?= $user['alamat'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Nomor HP</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan Nomor HP User" value="<?= $user['no_hp'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status Aktif</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status1" value="1" <?= $user['is_active'] == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="status1">
                                                AKTIF
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status2" value="0" <?= $user['is_active'] == 0 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="status2">
                                                NON-AKTIF
                                            </label>
                                        </div><br>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
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
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside> -->
<!-- /.control-sidebar -->