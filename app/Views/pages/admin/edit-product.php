<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Form Edit Product</strong></h1>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card py-3 px-3">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form action="/admin/product/update/<?= $product['id']; ?>" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="nm_product">Name Product</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nm_product')) ? 'is-invalid' : ''; ?>" id="nm_product" name="nm_product" autofocus value="<?= $product['nm_product']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nm_product'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="desc_product">Description Product</label>
                                    <textarea name="desc_product" id="desc_product" class="<?= ($validation->hasError('desc_product')) ? 'is-invalid' : ''; ?>"><?= $product['desc_product']; ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('desc_product'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock Product</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('stock')) ? 'is-invalid' : ''; ?>" id="stock" name="stock" value="<?= $product['stock']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('stock'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price Product</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="price" name="price" value="<?= $product['price']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('price'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="img_product">Pictures</label>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="/img/product/<?= $product['img_product']; ?>" class="img-thumbnail img-preview" style="height: 100px;">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input <?= ($validation->hasError('img_product')) ? 'is-invalid' : ''; ?>" id="img_product" name="img_product" onchange="previewImgp()">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('img_product'); ?>
                                                </div>
                                                <label for="img_product" class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <span>*Pictures must be filled in</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="/admin/product" class="btn btn-secondary">Cancel</a>
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