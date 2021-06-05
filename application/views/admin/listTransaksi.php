<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaksi Section</h1>
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row view-data mb-5">
                            <div class="col-md-12 mx-auto mt-5">
                                <div class="container">
                                    <div class="row mt-5 mb-5">
                                        <div class="col-md-12">
                                            <h1 class="text-center">List Transaksi</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <!-- <th scope="col">No</th> -->
                                                        <th scope="col">Transaksi ID</th>
                                                        <th scope="col">User ID</th>
                                                        <th scope="col">Banyak Items</th>
                                                        <th scope="col">Total Harga</th>
                                                        <th scope="col">Metode Pembayaran</th>
                                                        <th scope="col">Pengiriman</th>
                                                        <th scope="col">Waktu Pembelian</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($transaksis as $data) : ?>
                                                        <tr class="text-center">

                                                            <td>
                                                                <?= $data['id_transaksi'] ?>
                                                            </td>
                                                            <td style="text-transform: uppercase;">
                                                                <?= $data['id_user'] ?>
                                                            </td>
                                                            <td style="text-transform: uppercase;">
                                                                <?= $data['total_items'] ?> Items
                                                            </td>
                                                            <td style="text-transform: uppercase;">
                                                                Rp. <?= number_format($data['total_price'], 0, ',', '.') ?>
                                                            </td>
                                                            <td style="text-transform: uppercase;">
                                                                <?= $data['metode_bayar'] ?>
                                                            </td>
                                                            <td style="text-transform: uppercase;">
                                                                <?= $data['pengiriman'] ?>
                                                            </td>
                                                            <td style="text-transform: uppercase;">
                                                                <?= $data['date'] ?>
                                                            </td>

                                                            <td style="text-transform: uppercase;">
                                                                <?php if ($data['status'] == 0) : ?>
                                                                    <p class="badge badge-danger">CANCEL</p>
                                                                <?php elseif ($data['status'] == 1) : ?>
                                                                    <p class="badge badge-success">SUCCESS</p>
                                                                <?php elseif ($data['status'] == 2) : ?>
                                                                    <p class="badge badge-warning">WAITING</p>
                                                                <?php endif ?>
                                                            </td>
                                                            <td style="text-transform: uppercase;width: 150px !important;">
                                                                <button data-toggle="modal" data-target="#detailTransaksi<?= $data['id_transaksi'] ?>" class="btn btn-sm btn-outline-info"><i class="fas fa-info-circle"></i></button>
                                                                <a class="btn btn-sm btn-outline-danger" href="<?= base_url('admin/deleteTransaksi/') . $data['id_transaksi'] ?>"><i class="far fa-trash-alt"></i></a>

                                                                <!-- Modal Transaksi -->
                                                                <div class="modal fade" id="detailTransaksi<?= $data['id_transaksi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content justify-content-center" style="width: 50vw;left: -100px;">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Data Checkout Transaksi ID <?= $data['id_transaksi'] ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-hover" style="width: 700px;">
                                                                                    <thead>
                                                                                        <tr class="text-center">
                                                                                            <th scope="col">ID Pembeli</th>
                                                                                            <th scope="col">ID Checkout</th>
                                                                                            <th scope="col">ID Barang</th>
                                                                                            <th scope="col">Nama Barang</th>
                                                                                            <th scope="col">Total Belanja</th>

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php foreach ($checkouts as $ck) : ?>
                                                                                            <?php if ($ck['id_transaksi'] == $data['id_transaksi']) : ?>
                                                                                                <tr class="text-center">
                                                                                                    <td scope="col"><?= $ck['id_pembeli'] ?></td>
                                                                                                    <td scope="col"><?= $ck['id_checkout'] ?></td>
                                                                                                    <td scope="col"><?= $ck['id_barang'] ?></td>
                                                                                                    <td scope="col"><?= $ck['nama_barang'] ?></td>
                                                                                                    <td scope="col"><?= $ck['total_items'] ?> Items</td>
                                                                                                </tr>
                                                                                            <?php endif ?>
                                                                                        <?php endforeach ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form action="<?= base_url('admin/editStatusTransaksi/' . $data['id_transaksi']) ?>" method="POST">
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="status" id="status1" value="0" <?= $data['status'] == 0 ? 'checked' : '' ?>>
                                                                                        <label class="form-check-label" for="status1">
                                                                                            CANCEL
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="status" id="status2" value="1" <?= $data['status'] == 1 ? 'checked' : '' ?>>
                                                                                        <label class="form-check-label" for="status2">
                                                                                            SUCCESS
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="status" id="status2" value="2" <?= $data['status'] == 2 ? 'checked' : '' ?>>
                                                                                        <label class="form-check-label" for="status2">
                                                                                            WAITING
                                                                                        </label>
                                                                                    </div><br>
                                                                                    <button type="submit" class="btn btn-primary">Set Status</button>
                                                                                </form>

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

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>