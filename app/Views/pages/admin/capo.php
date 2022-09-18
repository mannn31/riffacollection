<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Categories Of Product</strong></h1>

    <!-- Product -->
    <?php if (empty($capo)) : ?>
        <div class="col-12 mt-5">
            <div class="card text-center">
                <h5 class="card-title">Belum Ada Product</h5>
            </div>
        </div>
    <?php else : ?>
        <div class="row mt-2">
            <?php foreach ($capo as $cp) : ?>
                <div class="col-6 col-lg-2">
                    <div class="card">
                        <img src="<?= base_url(); ?>/img/product/<?= $cp->img_product; ?>" class="card-header" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $cp->nm_product; ?></h5>
                            <p class="card-text">Rp. <?= $cp->price; ?>,-</p>
                            <div class="text-center">
                                <a href="<?= base_url('/product/detail/' . $cp->proid); ?>" class="btn btn-info">See Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <!-- End Product -->

</div>

<?= $this->endSection(); ?>