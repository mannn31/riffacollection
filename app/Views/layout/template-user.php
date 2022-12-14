<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Riffa Collection | <?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/style/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?= base_url(); ?>/style/icon/css/all.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php if (in_groups('admin')) : ?>
            <!-- Sidebar -->
            <?= $this->include('layout/sidebar'); ?>
            <!-- End of Sidebar -->
        <?php endif; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('layout/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('user-content'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('layout/footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-info" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/style/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/style/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/style/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url(); ?>/style/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({

            selector: "textarea",

            plugins: [

                "advlist autolink lists link image charmap print preview anchor",

                "searchreplace visualblocks code fullscreen",

                "insertdatetime media table contextmenu paste"

            ],

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

        });
    </script>

    <script>
        function previewImg() {
            const pict = document.querySelector('#pic_cat');
            const pictLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            pictLabel.textContent = pic_cat.files[0].name;

            const filePic = new FileReader();
            filePic.readAsDataURL(pic_cat.files[0]);

            filePic.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgs() {
            const pict = document.querySelector('#user_img');
            const pictLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            pictLabel.textContent = user_img.files[0].name;

            const filePic = new FileReader();
            filePic.readAsDataURL(user_img.files[0]);

            filePic.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgp() {
            const pict = document.querySelector('#img_product');
            const pictLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            pictLabel.textContent = img_product.files[0].name;

            const filePic = new FileReader();
            filePic.readAsDataURL(img_product.files[0]);

            filePic.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgb() {
            const pict = document.querySelector('#img_proof');
            const pictLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            pictLabel.textContent = img_proof.files[0].name;

            const filePic = new FileReader();
            filePic.readAsDataURL(img_proof.files[0]);

            filePic.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

</body>

</html>