<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <?php foreach ($kost as $k): ?>
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mt-3 shadow-sm"
                    style="width: 100%; max-width: 300px; min-height: 500px; display: flex; flex-direction: column;">
                    <img src="<?= base_url('foto_kost/' . $k['foto_kost']); ?>" class="card-img-top" alt="Foto Kost"
                        style="height: 200px; object-fit: cover;">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($k['nama_kost']); ?></h5>
                        <p class="card-text"><?= esc($k['alamat_kost']); ?></p>
                        <p><strong>Harga:</strong> Rp<?= number_format($k['harga'], 0, ',', '.'); ?>/bulan</p>
                        <p><strong>Status:</strong>
                            <span class="badge bg-<?= $k['status'] == 'tersedia' ? 'success' : 'danger'; ?>">
                                <?= esc($k['status']); ?>
                            </span>
                        </p>

                        <!-- Pilihan durasi -->
                        <label for="durasi_<?= $k['id_kost']; ?>"><strong>Pilih Durasi:</strong></label>
                        <select class="form-control mb-2" id="durasi_<?= $k['id_kost']; ?>"
                            onchange="updateTanggal(<?= $k['id_kost']; ?>)">
                            <option value="1">1 Bulan</option>
                            <option value="3">3 Bulan</option>
                            <option value="6">6 Bulan</option>
                        </select>

                        <!-- Form pemesanan -->
                        <form action="<?= base_url('pemesanan/proses') ?>" method="post" class="mt-auto">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_kost" value="<?= $k['id_kost']; ?>">
                            <input type="hidden" name="tanggal_mulai" id="tanggal_mulai_<?= $k['id_kost']; ?>"
                                value="<?= date('Y-m-d'); ?>">
                            <input type="hidden" name="tanggal_selesai" id="tanggal_selesai_<?= $k['id_kost']; ?>"
                                value="<?= date('Y-m-d', strtotime('+1 month')); ?>">

                            <button type="submit"
                                class="btn btn-primary w-100 <?= $k['status'] == 'tersedia' ? '' : 'disabled'; ?>">
                                Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function updateTanggal(idKost) {
        let durasi = document.getElementById("durasi_" + idKost).value;
        let tanggalMulai = new Date();
        let tanggalSelesai = new Date();
        tanggalSelesai.setMonth(tanggalSelesai.getMonth() + parseInt(durasi));

        document.getElementById("tanggal_mulai_" + idKost).value = tanggalMulai.toISOString().split('T')[0];
        document.getElementById("tanggal_selesai_" + idKost).value = tanggalSelesai.toISOString().split('T')[0];
    }
</script>

<?= $this->endSection() ?>