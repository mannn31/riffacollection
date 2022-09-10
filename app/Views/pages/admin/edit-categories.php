<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Form Edit Categories</strong></h1>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card py-3 px-3">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form action="/admin/categories/update/<?= $categories['id']; ?>" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="nm_cat">Name Categories</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nm_cat')) ? 'is-invalid' : ''; ?>" id="nm_cat" name="nm_cat" autofocus value="<?= $categories['nm_cat']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nm_cat'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pic_cat">Pictures</label>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="/img/category/<?= $categories['pic_cat']; ?>" class="img-thumbnail img-preview" style="height: 100px;">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input <?= ($validation->hasError('pic_cat')) ? 'is-invalid' : ''; ?>" id="pic_cat" name="pic_cat" onchange="previewImg()">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('pic_cat'); ?>
                                                </div>
                                                <label for="pic_cat" class="custom-file-label"><?= $categories['pic_cat']; ?></label>
                                            </div>
                                        </div>
                                    </div>
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