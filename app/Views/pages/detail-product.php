<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">
    <!-- Detail Product -->
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <img src="<?= base_url(); ?>/img/product/<?= $pro->img_product; ?>" style="height: auto; width: 100%;">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong><?= $pro->nm_product; ?></strong></h5>
                    <p class="card-text">Rp. <?= $pro->price; ?>,-</p>
                    <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#buyModal"><i class="fa-solid fa-dollar-sign"></i> Buy Product</a>
                    <p class="card-text"><?= $pro->desc_product; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Detail Product -->

<!-- Logout Modal-->
<div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/product/detail/save" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="adress">Adress</label>
                        <textarea class="form-control" id="adress" name="adress" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_handphone">No Handphone</label>
                        <input type="text" class="form-control" id="no_handphone" name="no_handphone">
                    </div>
                    <div class="form-group">
                        <label for="nm_product">Name Product</label>
                        <input type="text" class="form-control" id="product_id" name="product_id" value="<?= $pro->proid; ?>" hidden>
                        <input type="text" class="form-control" id="nm_product" name="nm_product" disabled value="<?= $pro->nm_product; ?>">
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" class="form-control" id="qty" name="qty">
                    </div>
                    <div class="form-group">
                        <label for="total_price">Total Price</label>
                        <input type="disabled" class="form-control" id="total_price" name="total_price" value="Rp. <?= $pro->price; ?>,-">
                    </div>
                    <div class="form-group">
                        <label for="payment">Payment</label>
                        <select class="form-control" id="payment" name="payment">
                            <option disabled selected>Choose Payment</option>
                            <option value="tf_bank">Transfer Bank (BRI, BNI, etc)</option>
                            <option value="e_wallet">E-Wallet (OVO, DANA, etc)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img_proof">Payment Proof</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="/img/category/default.png" class="img-thumbnail img-preview" style="height: 100px;">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_proof" name="img_proof" onchange="previewImgb()">
                                    <label for="img_proof" class="custom-file-label">Choose File</label>
                                    <div class="col-sm-10">
                                        <span>*Pictures must be filled in</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-info" type="submit">Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>