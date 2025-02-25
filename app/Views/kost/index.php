<?php $this->extend('templates/main') ?>
<?php $this->section('content') ?>
<!-- card untuk menampilkan data kost -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <a href="<?= base_url('kost/tambah') ?>" class="btn btn-primary mb-3">Tambah Data Kost</a>
                    <!-- Membuat tabel responsif -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatables-basic">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kost</th>
                                    <th>Alamat Kost</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kost as $k): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $k['nama_kost'] ?></td>
                                        <td><?= $k['alamat_kost'] ?></td>
                                        <td><?= $k['harga'] ?></td>
                                        <td><?= $k['status'] ?></td>
                                        <td>
                                            <a href="<?= base_url('kost/edit/' . $k['id_kost']) ?>"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url('kost/hapus/' . $k['id_kost']) ?>"
                                                class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>