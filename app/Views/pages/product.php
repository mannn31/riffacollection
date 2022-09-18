<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">
    <!-- Product -->
    <div class="row justify-content-center">
        <div class="text-center">
            <h1 class="text-gray-800 text-center"><strong>Product</strong></h1>
            <p class="text-muted">Please choose the product according to what you need.</p>
        </div>
    </div>
    <div class="row mt-2">
        <?php foreach ($product as $pro) : ?>
            <div class="col-6 col-lg-2">
                <div class="card">
                    <img src="<?= base_url(); ?>/img/product/<?= $pro['img_product']; ?>" class="card-header" style="height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $pro['nm_product']; ?></h5>
                        <p class="card-text">Rp. <?= $pro['price']; ?>,-</p>
                        <div class="text-center">
                            <a href="<?= base_url('/product/detail/' . $pro['id']); ?>" class="btn btn-info">See Product</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- End Product -->

</div>

<?= $this->endSection(); ?>