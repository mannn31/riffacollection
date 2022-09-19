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
                        <div class="card mb-4 py-3 border-left-info">
                            <div class="card-body">
                                <strong><i class="fa-solid fa-circle-check"></i> <?= session()->getFlashdata('pesan'); ?></strong>
                            </div>
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
                                    <th>Description</th>
                                    <th>Stock Product</th>
                                    <th>Price</th>
                                    <th>Pictures</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                <?php foreach ($product as $p) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td>P-<?= $p['id']; ?></td>
                                        <td><?= $p['nm_product']; ?></td>
                                        <td><?= $p['desc_product']; ?></td>
                                        <td><?= $p['stock']; ?></td>
                                        <td>Rp. <?= $p['price']; ?>,-</td>
                                        <td><img src="/img/product/<?= $p['img_product']; ?>" style="height: 100px;"></td>
                                        <td>
                                            <a href="/admin/product/edit/<?= $p['id']; ?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <form action="/admin/product/<?= $p['id']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('product', 'pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product -->

</div>

<?= $this->endSection(); ?>