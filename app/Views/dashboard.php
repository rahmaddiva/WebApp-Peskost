<?php $this->extend('templates/main') ?>
<?php $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <script>
                // toast error message
                <?php if (session()->getFlashdata('error')): ?>
                    $(document).ready(function () {
                        toastr.error('<?= session()->getFlashdata('error') ?>');
                    });
                <?php endif; ?>
                // toast success message
                <?php if (session()->getFlashdata('success')): ?>
                    $(document).ready(function () {
                        toastr.success('<?= session()->getFlashdata('success') ?>');
                    });
                <?php endif; ?>
            </script>

        </div>

    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">


            </div>
        </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
<?php $this->endSection() ?>