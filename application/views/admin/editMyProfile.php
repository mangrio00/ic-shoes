<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">List Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <a class="btn btn-outline-primary" href="<?= base_url('admin/formAddBarang') ?>">+ Add Barang</a>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h2 class="text-center">Edit My Profile</h2>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <form method="POST" action="<?= base_url('admin/updateProfile/' . $admin['id_user']) ?>" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username" value="<?= $admin['username'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email User" value="<?= $admin['email'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Masukan Nama User" value="<?= $admin['fullname'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat User" value="<?= $admin['alamat'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan Nomor HP User" value="<?= $admin['no_hp'] ?>">
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
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->