<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Manage Categories</strong></h1>

    <!-- Categories -->
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
                            <a class="btn btn-info" href="/admin/categories/add">
                                <i class="fas fa-plus"></i>
                                Add Categories
                            </a>
                            <a class="btn btn-warning" href="/admin/categories/add-capo">
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
                                    <th>Categories ID</th>
                                    <th>Name Categories</th>
                                    <th>Pictures</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 + (2 * ($currentPage - 1)); ?>
                                <?php foreach ($categories as $cat) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td>CAT-<?= $cat['id']; ?></td>
                                        <td><?= $cat['nm_cat']; ?></td>
                                        <td><img src="/img/category/<?= $cat['pic_cat']; ?>" style="height: 100px;"></td>
                                        <td>
                                            <a href="<?= base_url('admin/categories/detail/' . $cat['id']); ?>" class="btn btn-info">See Product</a>

                                            <a href="/admin/categories/edit/<?= $cat['id']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <form action="/admin/categories/<?= $cat['id']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                            <!-- <a href="/admin/categories/delete/<?= $cat['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('categories', 'pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

</div>

<?= $this->endSection(); ?>