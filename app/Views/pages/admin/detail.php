<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>User Detail</strong></h1>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card py-3 px-3">
                <div class="row no-gutters">
                    <div class="col-md-4 my-auto">
                        <img src="<?= base_url('/img/' . $user->user_img); ?>" class="card-img" alt="<?= $user->fullname; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h5><?= $user->fullname; ?></h5>
                                </li>
                                <li class="list-group-item"><?= $user->username; ?></li>
                                <li class="list-group-item"><?= $user->email; ?></li>
                                <li class="list-group-item"><span class="badge badge-<?= ($user->name == 'admin') ? 'info' : 'warning' ?>"><?= $user->name; ?></span></li>
                                <li class="list-group-item"><small class="text-muted">Created at <?= $user->created_at; ?></small></li>
                                <li class="list-group-item"><small><a href="<?= base_url('/admin/manage-users'); ?>">&laquo; Back to Manage Users</a></small></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>