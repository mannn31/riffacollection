<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Manage Users</strong></h1>

    <!-- Users -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 text-right">
                            <a class="btn btn-info" href="/admin/manage-users/add">
                                <i class="fas fa-plus"></i>
                                Add Users
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><?= $user->name; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-info">Detail</a>
                                            <a href="<?= base_url('admin/manage-users/edit/' . $user->userid); ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="/admin/manage-users/<?= $user->userid; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('users', 'pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Users -->

</div>

<?= $this->endSection(); ?>