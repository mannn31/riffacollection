<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Categories Of Product</strong></h1>

    <!-- Product -->
    <div class="row mt-2">
        <?php if (empty($capo)) : ?>
            <div class="col-12 mt-5">
                <div class="card text-center">
                    <h5 class="card-title">Belum Ada Product</h5>
                </div>
            </div>
            <div class="col-6 col-lg-2">
            <?php else : ?>
                <div class="card">
                    <img src="<?= base_url(); ?>/img/product/<?= $capo->img_product; ?>" class="card-header" style="height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $capo->nm_product; ?></h5>
                        <p class="card-text">Rp. <?= $capo->price; ?>,-</p>
                        <div class="text-center">
                            <a href="<?= base_url('/product-detail'); ?>" class="btn btn-info">See Product</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </div>
    </div>
    <!-- End Product -->

</div>

<?= $this->endSection(); ?>