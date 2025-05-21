<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2>Judul Buku</h2>
            <div class="card mb-2" style="max-width: 350px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold"> <?= $buku['judul'] ?> </h5>
                            <p class="card-text">Penulis: <?= $buku['penulis'] ?> </p>
                            <p class="card-text">Penerbit: <?= $buku['penerbit'] ?> </p>
                            <p class="card-text"><small class="text-body-secondary">Tahun Terbit: <?= $buku['tahun_terbit'] ?> </small></p>
                            
                            <a href="/buku/edit/<?= $buku['slug'] ?>" class="btn btn-warning btn-sm"> 
                                <i class="bi bi-pencil-fill"></i> Ubah 
                            </a> 
                            <form action="/buku/<?= $buku['id'] ?>" method="post" class="d-inline">
                                <?php csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus buku ini?')">
                                    <i class="bi bi-trash3-fill"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <a href="/buku" class="btn btn-secondary">&larr; Kembali</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>