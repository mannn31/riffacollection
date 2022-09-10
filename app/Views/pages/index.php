<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Welcome To Riffa Collection</strong></h1>

    <!-- Categories -->
    
    <div class="row row-cols-2 row-cols-md-4">
        <?php foreach ($categories as $cat) : ?>
            <div class="col mb-4">
                <div class="card">
                    <a href="#" class="btn rounded">
                        <img src="<?= base_url(); ?>/img/category/<?= $cat['pic_cat']; ?>" class="card-img-top" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $cat['nm_cat']; ?></h5>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- End Categories -->

    <!-- Product -->
    <div class="row mt-5 justify-content-center">
        <div class="text-center">
            <h1 class="h2 text-gray-800 text-center"><strong>Product</strong></h1>
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
    <div class="row mt-2 justify-content-center">
        <div class="text-center">
            <a href="<?= base_url('/product'); ?>" class="btn btn-info">See All Product</a>
        </div>
    </div>
    <!-- End Product -->

</div>

<?= $this->endSection(); ?>