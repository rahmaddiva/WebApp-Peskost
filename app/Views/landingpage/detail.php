<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PESKOST - Pemesanan Kost</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= base_url('') ?>landingpage/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('') ?>landingpage/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('') ?>landingpage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('') ?>landingpage/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('') ?>landingpage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url('') ?>landingpage/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: eStartup
  * Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
    <main class="main">
        <section id="detail-kost" class="detail section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php if (!empty($kost['foto_kost'])): ?>
                            <img src="<?= base_url('foto_kost/' . $kost['foto_kost']); ?>" alt="Foto Kost"
                                class="img-fluid rounded">
                        <?php else: ?>
                            <img src="<?= base_url('foto_kost/default.jpg'); ?>" alt="Default Kost"
                                class="img-fluid rounded">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <h2><?= esc($kost['nama_kost']); ?></h2>
                        <p><strong>Alamat:</strong> <?= esc($kost['alamat_kost']); ?></p>
                        <p><strong>Deskripsi:</strong> <?= esc($kost['deskripsi']); ?></p>
                        <p><strong>Fasilitas:</strong> <?= esc($kost['fasilitas']); ?></p>
                        <p><strong>Harga:</strong> Rp <?= number_format($kost['harga'], 0, ',', '.'); ?></p>
                        <p><strong>Status:</strong>
                            <span class="badge bg-<?= ($kost['status'] === 'tersedia') ? 'success' : 'danger'; ?>">
                                <?= esc(ucwords($kost['status'])); ?>
                            </span>
                        </p>
                        <a href="<?= base_url('/'); ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>
                            Kembali</a>
                        <!-- PESAN -->
                        <a href="<?= base_url('pesan/' . $kost['id_kost']); ?>" class="btn btn-primary"><i
                                class="bi bi-cart-plus"></i> Pesan</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">eStartup</strong> <span>All Rights
                        Reserved</span></p>
            </div>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script src="<?= base_url('') ?>landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('') ?>landingpage/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('') ?>landingpage/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('') ?>landingpage/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url('') ?>landingpage/assets/js/main.js"></script>

</body>

</html>