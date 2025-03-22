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
                                        <td>
                                            <?php if ($k['status'] == 'tersedia'): ?>
                                                <span class="badge bg-success"><?= $k['status'] ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-danger"><?= $k['status'] ?></span>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item"
                                                            href="<?= base_url('kost/detail_kost/' . $k['id_kost']) ?>">Detail</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="<?= base_url('kost/edit/' . $k['id_kost']) ?>">Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="<?= base_url('kost/hapus/' . $k['id_kost']) ?>">Hapus</a>
                                                    </li>
                                                </ul>
                                            </div>
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
</div>

</script>

<?php $this->endSection() ?>