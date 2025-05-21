<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="container mt-3 ">
    <div class="row">
        <div class="col-md-10">
            <div class="d-flex justify-content-between">
                <h2>Daftar Buku Perpustakaan</h2>
                <a href="/buku/create" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Tambah Data Buku</a>
            </div>
            <div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success text-center fw-bold" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>
            </div>
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($buku) == 0) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger text-center fw-bold" role="alert">
                                    Data buku masih kosong...
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $no = 1; foreach ($buku as $b) : ?>
                        <tr>
                            <td> <?= $no ?>. </td>
                            <td> <?= esc($b['judul']) ?> </td>
                            <td> <?= esc($b['penulis']) ?> </td>
                            <td> <?= esc($b['penerbit']) ?> </td>
                            <td> <?= esc($b['tahun_terbit']) ?> </td>
                            <td> 
                                <a href="/buku/<?= esc($b['slug']) ?>" class="btn btn-success btn-sm"> 
                                    <i class="bi bi-info-circle-fill"></i> Detail 
                                </a>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>