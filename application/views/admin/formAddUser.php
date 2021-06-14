<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">User Section</li>
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

                    <ul class="nav nav-tabs justify-content-center mt-3 mx-5" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="view-tab" data-toggle="tab" href="#view" role="tab" aria-controls="view" aria-selected="true">View All Users</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Add User</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
                            <div class="row view-data mb-5">
                                <div class="col-md-12 mx-auto mt-5">
                                    <div class="container">
                                        <div class="row mt-5 mb-5">
                                            <div class="col-md-12">
                                                <h1 class="text-center">List Users</h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <!-- <th scope="col">No</th> -->
                                                            <th scope="col">User ID</th>
                                                            <th scope="col">Full Name</th>
                                                            <th scope="col">Userame</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">Phone Number</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php foreach ($users as $data) : ?>
                                                            <tr class="text-center">

                                                                <td>
                                                                    <?= $data['id_user'] ?>
                                                                </td>
                                                                <td style="text-transform: uppercase;">
                                                                    <?= $data['fullname'] ?>
                                                                </td>
                                                                <td style="text-transform: uppercase;">
                                                                    <?= $data['username'] ?>
                                                                </td>
                                                                <td style="text-transform: uppercase;">
                                                                    <?= $data['email'] ?>
                                                                </td>
                                                                <td style="text-transform: uppercase;">
                                                                    <?= $data['alamat'] ?>
                                                                </td>
                                                                <td style="text-transform: uppercase;">
                                                                    <?= $data['no_hp'] ?>
                                                                </td>
                                                                <td style="text-transform: uppercase;">
                                                                    <img class="border border-dark p-1" height="50px" src="<?= base_url('assets/img/profile/') . $data['image']  ?>">
                                                                    <a style="font-size: 10px;" class="btn btn-info mt-2 p-1" href="<?= base_url('admin/editImageUser/' . $data['id_user']) ?>">Change</a>
                                                                </td>
                                                                <td style="text-transform: uppercase;">
                                                                    <?php if ($data['is_active'] == true) : ?>
                                                                        <p class="badge badge-success"> ACTIVE </p>
                                                                    <?php else : ?>
                                                                        <p class="badge badge-danger"> NON-ACTIVE </p>
                                                                        <!-- <p class="text-muted">DEVELOPER</p> -->
                                                                    <?php endif ?>
                                                                </td>
                                                                <td style="text-transform: uppercase;width: 150px !important;">
                                                                    <a class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#Modal<?= $data['id_user'] ?>"><i class="far fa-trash-alt"></i></a>
                                                                    <a class="btn btn-sm btn-outline-info" href="<?= base_url('admin/formEditUser/') . $data['id_user'] ?>"><i class="far fa-edit"></i></a>
                                                                    <div class="modal fade" id="Modal<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="Modal<?= $data['id_user'] ?>Label" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Delete User?</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                            
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                    <button type="button" class="btn btn-sm btn-outline-primary"><a href="<?= base_url('admin/deleteUser/') . $data['id_user'] ?>">Delete</a></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                                <!-- <nav aria-label="Page navigation">
                                                    <!-- <//?php echo $this->pagination->create_links(); ?> -->
                                                <!-- </nav> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                            <div class="row add-data mb-5">
                                <div class="col-md-9 mx-auto mt-5">
                                    <div class="container">
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Add New User</h2>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <form method="POST" action="<?= base_url('auth/registration') ?>" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label for="fullname">Full Name</label>
                                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Masukan Nama User">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email User">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat User">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">Nomor HP</label>
                                                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan Nomor HP User">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password1">Password</label>
                                                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Tambahkan Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password2">Confirm Password</label>
                                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="is_active">Status Aktif</label>
                                                        <br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_active" id="status1" value="1">
                                                            <label class="form-check-label" for="status1">
                                                                AKTIF
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_active" id="status2" value="0">
                                                            <label class="form-check-label" for="status2">
                                                                NON-AKTIF
                                                            </label>
                                                        </div><br>
                                                    </div>

                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">Submit</button>
                                                    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalAdd" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Addition?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Back</button>
                                                                    <button type="submit" class="btn btn-sm btn-outline-primary">Add User</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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