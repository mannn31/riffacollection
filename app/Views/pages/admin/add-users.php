<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Form Add Categories</strong></h1>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card py-3 px-3">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form action="/admin/manage-users/save" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="email"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="username"><?= lang('Auth.username') ?></label>
                                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                </div>

                                <!-- <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role" id="role">
                                        <option disabled selected> Choose Role </option>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password"><?= lang('Auth.password') ?></label>
                                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="/admin/manage-users" class="btn btn-secondary">Cancel</a>
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