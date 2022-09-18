<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Manage Product</strong></h1>

    <!-- Product -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-succes" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="row mb-3">
                        <div class="col-12 text-right">
                            <a class="btn btn-info" href="/admin/product/add">
                                <i class="fas fa-plus"></i>
                                Add Product
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product ID</th>
                                    <th>Name Product</th>
                                    <th>Categories</th>
                                    <th>Description</th>
                                    <th>Stock Product</th>
                                    <th>Price</th>
                                    <th>Pictures</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($product as $pro) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td>P-<?= $pro->productid; ?></td>
                                        <td><?= $pro->nm_product; ?></td>
                                        <td><?= $pro->nm_cat; ?></td>
                                        <!-- <td>
                                            <?php if ($pro->nm_cat == null) : ?>
                                                Belum Memilih Category
                                            <?php else : ?>
                                                <?= $pro->nm_cat; ?>
                                            <?php endif; ?>
                                        </td> -->
                                        <td><?= $pro->desc_product; ?></td>
                                        <td><?= $pro->stock; ?></td>
                                        <td>Rp. <?= $pro->price; ?>,-</td>
                                        <td><img src="/img/product/<?= $pro->img_product; ?>" style="height: 100px;"></td>
                                        <td>
                                            <a href="/admin/product/edit/<?= $pro->productid; ?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <form action="/admin/product/<?= $pro->productid; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product -->

</div>

<?= $this->endSection(); ?>