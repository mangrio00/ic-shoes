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
                                <h2 class="text-center">Edit Product</h2>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <form method="POST" action="<?= base_url('admin/updateBarang/') . $barang['id_barang'] ?>" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="nama_barang">Foto Barang</label>

                                        <a class="btn btn-outline-info ml-3 mb-3" href="<?= base_url('admin/editImageBarang/') . $barang['id_barang'] ?>">Ubah Foto</a>
                                        <br>
                                        <img src="<?= base_url('assets/img/barang/') . $barang['image'] ?>" height="280px">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukan Nama Barang" value="<?= $barang['nama_barang'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="brand">brand</label>
                                        <input type="text" name="brand" class="form-control" id="brand" placeholder="Masukan Brand" value="<?= $barang['brand'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="warna_barang">Warna Barang</label>
                                        <input type="text" name="warna_barang" class="form-control" id="warna_barang" placeholder="Masukan Warna" value="<?= $barang['warna_barang'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="int" name="harga" class="form-control" id="harga" placeholder="Masukan Harga (IDR)" value="<?= $barang['harga'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stock</label>
                                        <input type="int" name="stok" class="form-control" id="stok" placeholder="Masukan Stock" value="<?= $barang['stok'] ?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
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