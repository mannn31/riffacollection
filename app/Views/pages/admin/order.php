<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Manage Order</strong></h1>

    <!-- Product -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-succes" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Name Order</th>
                                    <th>Adress Order</th>
                                    <th>No Handphone</th>
                                    <th>Name Product</th>
                                    <th>Qty</th>
                                    <th>Total Price</th>
                                    <th>Payment</th>
                                    <th>Proof Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($ordr)) : ?>
                                    <tr>
                                        <td colspan="10" class="text-center">No Orders Yet</td>
                                    </tr>
                                <?php else : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($ordr as $o) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>O-<?= $o->orderid; ?></td>
                                            <td><?= $o->fullname; ?></td>
                                            <td><?= $o->adress; ?></td>
                                            <td><?= $o->no_hp; ?></td>
                                            <td><?= $o->nm_product; ?></td>
                                            <td><?= $o->qty; ?></td>
                                            <td>Rp. <?= $o->total_price; ?>,-</td>
                                            <td><?= $o->payment; ?></td>
                                            <td><img src="/img/payment/<?= $o->img_proof; ?>" style="height: 100px;"></td>
                                            <td>
                                                <form action="/admin/order/<?= $o->orderid; ?>" method="POST" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product -->

</div>

<?= $this->endSection(); ?>