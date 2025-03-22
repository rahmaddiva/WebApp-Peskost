<?php $this->extend('templates/main') ?>
<?php $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Tambah Data Kost</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Nama Kost -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_kost" class="form-label">Nama Kost</label>
                                <input type="text" name="nama_kost" id="nama_kost" class="form-control"
                                    value="<?= $kost['nama_kost'] ?>">
                                <input type="hidden" name="id_kost" id="id_kost" class="form-control"
                                    value="<?= $kost['id_kost'] ?>">
                            </div>
                        </div>

                        <!-- Alamat Kost -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat_kost" class="form-label">Alamat Kost</label>
                                <input type="text" name="alamat_kost" id="alamat_kost" class="form-control"
                                    value="<?= $kost['alamat_kost'] ?>">
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                    required><?= $kost['deskripsi'] ?></textarea>
                            </div>
                        </div>

                        <!-- Fasilitas -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                <textarea name="fasilitas" id="fasilitas" class="form-control" rows="3"
                                    required><?= $kost['fasilitas'] ?></textarea>
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="<?= $kost['harga'] ?>" required>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="<?= $kost['status'] ?>"><?= $kost['status'] ?></option>
                                    <option value="Tersedia" <?= ($kost['status'] == 'Tersedia') ? 'selected' : '' ?>>
                                        Tersedia</option>
                                    <option value="Penuh" <?= ($kost['status'] == 'Penuh') ? 'selected' : '' ?>>Penuh
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Upload Foto -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="foto_kost" class="form-label">Foto Kost</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img id="kostImage"
                                            src="<?= base_url('foto_kost/' . ($kost['foto_kost'] ?? 'default.jpg')) ?>"
                                            class="img-fluid img-thumbnail img-preview" alt="Foto Kost" width="500"
                                            onerror="handleImageError(this)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function handleImageError(img) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Gambar tidak ditemukan!',
                                });
                                img.src = "<?= base_url('foto_kost/default.jpg') ?>"; // Ganti dengan gambar default
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->endSection() ?>