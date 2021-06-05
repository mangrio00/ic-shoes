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
                        <section class="py-5">
                            <div class="container p-0">
                                <div class="row">
                                    <!-- SHOP LISTING-->
                                    <div class="col-lg-12 order-1 order-lg-2 mb-5 mb-lg-0">
                                        <!-- <div class="row mb-3 align-items-center">
                                            <div class="col-lg-6 mb-2 mb-lg-0">
                                                <p class="text-small text-muted mb-0">Showing 1–12 of 53 results</p>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                                    <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                                                    <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                                                    <li class="list-inline-item">
                                                        <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                                                            <option value="default">Default sorting</option>
                                                            <option value="popularity">Popularity</option>
                                                            <option value="low-high">Price: Low to High</option>
                                                            <option value="high-low">Price: High to Low</option>
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <!-- PRODUCT-->
                                            <?php foreach ($barangs as $barang) : ?>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="product text-center">
                                                        <div class="mb-3 position-relative">
                                                            <div class="badge text-white badge-"></div><a class="d-block" href="#"><img style="height: 260px;" class="img-fluid w-100" src="<?= base_url('assets/img/barang/') . $barang['image'] ?>" alt="..."></a>
                                                            <div class="product-overlay">
                                                                <ul class="mb-0 list-inline mt-3">
                                                                    <li class="list-inline-item m-0 p-0"><b class="btn btn-sm btn-outline-dark" href="#">Stock : <?= $barang['stok'] ?></b></li>
                                                                    <!-- <li class="list-inline-item m-0 p-0"><b class="btn btn-sm btn-dark" href="cart.html">Details</b></li> -->
                                                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-danger" href="<?= base_url('admin/deleteBarang/' . $barang['id_barang']) ?>"><i class="far fa-trash-alt"></i></a></li>
                                                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-primary" href="<?= base_url('admin/formEditBarang/' . $barang['id_barang']) ?>"><i class="far fa-edit"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <h5>
                                                            <p class="reset-anchor"><?= $barang['nama_barang'] ?></p>
                                                            <small class="text-muted"><?= $barang['brand'] ?></small>
                                                        </h5>
                                                        <p class="small text-muted">Rp.<?= number_format($barang['harga'], 0, ',', '.') ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>

                                        </div>
                                        <!-- PAGINATION-->
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center justify-content-lg-end">
                                                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </section>
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