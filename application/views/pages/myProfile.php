<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">MY PROFILE</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>
<div class="container" style="min-height: 30vw !important; font-family: 'Montserrat';margin-top: 60px">
    <div class="row">
        <div class="col-md-3 pr-4">
            <img class="img-thumbnail" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="">
            <a class="btn btn-outline-info w-100 mt-3" href="<?= base_url('main/editImageProfile/' . $user['id_user']) ?>">Change Photo</a>
        </div>
        <div class="col-md-9 pr-0">
            <table>
                <tbody>
                    <tr style="width: fit-content;height: 50px;">
                        <th style="width: 150px;">Full Name</th>
                        <td style="width: 150px;"><?= $user['fullname'] ?></td>
                    </tr>
                    <tr style="width: fit-content;height: 50px;">
                        <th style="width: 150px;">Username</th>
                        <td style="width: 150px;"><?= $user['username'] ?></td>
                    </tr>
                    <tr style="width: fit-content;height: 50px;">
                        <th style="width: 150px;">Alamat</th>
                        <td style="width: 150px;"><?= $user['alamat'] ?></td>
                    </tr>
                    <tr style="width: fit-content;height: 50px;">
                        <th style="width: 150px;">Nomor HP</th>
                        <td style="width: 150px;"><?= $user['no_hp'] ?></td>
                    </tr>
                    <tr style="width: fit-content;height: 50px;">
                        <th style="width: 150px;">Email</th>
                        <td style="width: 150px;"><?= $user['email'] ?></td>
                    </tr>
                    <tr style="width: fit-content;height: 50px;">
                        <th style="width: 150px;">Tanggal Bergabung</th>
                        <td style="width: 150px;"><?= $user['date_created'] ?></td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-success mt-5 w-100" href="<?= base_url('main/formEditProfile/' . $user['id_user']) ?>">Edit My Profile</a>
        </div>
    </div>
</div>