<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Wishlist</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Product Wishlist</h2>
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <!-- CART TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Size</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                                <th class="border-0" scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalItems = 0; ?>
                            <?php foreach ($this->cart->contents() as $barang) : ?>
                                <tr>
                                    <th class="pl-0 border-0" scope="row">
                                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="#"><img src="<?= base_url('assets/img/barang/' . $barang['image']) ?>" alt="..." width="70" /></a>
                                            <div class="media-body ml-3" style="line-height: 15px;">
                                                <strong class="h6"><a class="reset-anchor animsition-link text-capitalize" href="#"><?= $barang['name'] ?></a></strong><br>
                                                <small class="text-primary"><?= $barang['warna'] ?></small>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small"><?= $barang['ukuran'] ?></p>
                                    </td>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small">Rp. <?= number_format($barang['price'], 0, ',', '.') ?></p>
                                    </td>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small"><?= $barang['qty'] ?> item(s)</p>
                                        <?php $totalItems = $totalItems + $barang['qty']; ?>
                                    </td>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small" onchange="sumTotal()">Rp. <?= number_format($barang['price'] * $barang['qty'], 0, ',', '.') ?> </p>
                                    </td>
                                    <td class="align-middle border-0"><a class="reset-anchor" href="<?= base_url('main/removeItemFromCart/' . $barang['rowid']) ?>"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- CART NAV-->
                <div class="bg-light px-4 py-3">
                    <div class="row align-items-center text-center">
                        <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="<?= base_url('main/shop') ?>"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                        <div class="col-md-6 text-md-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>