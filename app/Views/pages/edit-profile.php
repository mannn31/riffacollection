<?= $this->extend('layout/template-user'); ?>

<?= $this->section('user-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mb-4 text-gray-800 text-center"><strong>Form Edit Profile</strong></h1>

    <div class="row justify-content-center mb-4">
        <div class="col-lg-6">
            <div class="card py-3 px-3">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form action="/profile/edit/update/<?= $users['id']; ?>" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="fullname">Fullname</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" autofocus value="<?= $users['fullname']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $users['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $users['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="user_img">Pictures Profile</label>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="/img/user/<?= $users['user_img']; ?>" class="img-thumbnail img-preview" style="height: 150px;">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="user_img" name="user_img" onchange="previewImgs()">
                                                <label for="user_img" class="custom-file-label"><?= $users['user_img']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?= base_url('profile/' . user()->id); ?>" class="btn btn-secondary">Cancel</a>
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