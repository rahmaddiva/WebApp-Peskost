<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($kost as $k): ?>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <img src="<?= base_url('foto_kost/' . $k['foto_kost']) ?>" class="card-img-top"
                        alt="<?= esc($k['nama_kost']) ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($k['nama_kost']); ?></h5>
                        <p class="card-text"><strong>Alamat:</strong> <?= esc($k['alamat_kost']); ?></p>
                        <p class="card-text"><strong>Harga:</strong> Rp <?= number_format($k['harga'], 0, ',', '.'); ?></p>
                        <p><strong>Status:</strong>
                            <span class="badge bg-<?= $k['status'] == 'tersedia' ? 'success' : 'danger'; ?>">
                                <?= esc($k['status']); ?>
                            </span>
                        </p>
                        <a href="<?= base_url('pemesanan/form_pemesanan/' . $k['id_kost']) ?>"
                            class="btn btn-primary <?= $k['status'] == 'tersedia' ? '' : 'disabled'; ?>">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>