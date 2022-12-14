<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Detail Categories</strong></h1>

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
                                <?php if (empty($capo)) : ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No Products Yet</td>
                                    </tr>
                                <?php else : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($capo as $cp) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>P-<?= $cp->proid; ?></td>
                                            <td><?= $cp->nm_product; ?></td>
                                            <td><?= $cp->desc_product; ?></td>
                                            <td><?= $cp->stock; ?></td>
                                            <td>Rp. <?= $cp->price; ?>,-</td>
                                            <td><img src="/img/product/<?= $cp->img_product; ?>" style="height: 100px;"></td>
                                            <td>
                                                <form action="/admin/product/<?= $cp->proid; ?>" method="POST" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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