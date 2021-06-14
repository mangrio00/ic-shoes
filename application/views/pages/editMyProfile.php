<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="text-center">Edit My Profile</h2>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <form method="POST" action="<?= base_url('main/updateProfile/' . $user['id_user']) ?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username" value="<?= $user['username'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email User" value="<?= $user['email'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Masukan Nama User" value="<?= $user['fullname'] ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat User" value="<?= $user['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan Nomor HP User" value="<?= $user['no_hp'] ?>">
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalUpdate">Update</button>
                <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="ModalUpdateLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Update?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>