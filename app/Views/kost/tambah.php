<?php $this->extend('templates/main') ?>
<?php $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Tambah Data Kost</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('kost/simpan_kost') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <!-- Nama Kost -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_kost" class="form-label">Nama Kost</label>
                                    <input type="text" name="nama_kost" id="nama_kost" class="form-control" required>
                                </div>
                            </div>

                            <!-- Alamat Kost -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamat_kost" class="form-label">Alamat Kost</label>
                                    <input type="text" name="alamat_kost" id="alamat_kost" class="form-control"
                                        required>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                        required></textarea>
                                </div>
                            </div>

                            <!-- Fasilitas -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="fasilitas" class="form-label">Fasilitas</label>
                                    <textarea name="fasilitas" id="fasilitas" class="form-control" rows="3"
                                        required></textarea>
                                </div>
                            </div>

                            <!-- Harga -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" name="harga" id="harga" class="form-control" required>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Penuh">Penuh</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Upload Foto -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="foto_kost" class="form-label">Upload Foto Kost</label>
                                    <input type="file" name="foto_kost" id="foto_kost" class="form-control"
                                        accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('kost') ?>" class="btn btn-secondary ms-2">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->endSection() ?>