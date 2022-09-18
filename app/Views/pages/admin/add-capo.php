<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Form Add Categories Of Product</strong></h1>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card py-3 px-3">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form action="/admin/categories/capo/save" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="cat_id">Name Categories</label>
                                    <select class="form-control" name="cat_id" id="cat_id">
                                        <option disabled selected> Pilih </option>
                                        <?php foreach ($categories as $cat) : ?>
                                            <option value="<?= $cat['id']; ?>"><?= $cat['nm_cat']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pro_id">Name Product</label>
                                    <select class="form-control" name="pro_id" id="pro_id">
                                        <option disabled selected> Pilih </option>
                                        <?php foreach ($product as $pro) : ?>
                                            <option value="<?= $pro['id']; ?>"><?= $pro['nm_product']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <a href="/admin/categories" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>