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
        <div class="col-6 col-lg-3">
            <div class="card text-center">
                <img src="<?= base_url(); ?>/img/product/wraps.jpg" class="card-header" style="height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="<?= base_url('/product-detail'); ?>" class="btn btn-info">See Product</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product -->

</div>

<?= $this->endSection(); ?>