<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h2> <?= $title ?> </h2>
            <form class="mt-3" action="/buku/update/<?= $buku['id'] ?>" method="post">
                <!-- form yang hanya bisa diinput di halaman ini saja -->
                <?php csrf_field(); ?> 
                <input type="hidden" name="slug" value="<?= $buku['slug'] ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= (old('judul') ? old('judul') : $buku['judul']) ?>">
                        <?php if (session('validation') && session('validation')->hasError('judul')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('judul'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= (old('penulis') ? old('penulis') : $buku['penulis']) ?>">
                        <?php if (session('validation') && session('validation')->hasError('penulis')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('penulis'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (session('validation') && session('validation')->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= (old('penerbit') ? old('penerbit') : $buku['penerbit']) ?>">
                        <?php if (session('validation') && session('validation')->hasError('penerbit')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('penerbit'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= (session('validation') && session('validation')->hasError('tahun_terbit')) ? 'is-invalid' : ''; ?>" id="tahun_terbit" name="tahun_terbit" value="<?= (old('tahun_terbit') ? old('tahun_terbit') : $buku['tahun_terbit']) ?>">
                        <?php if (session('validation') && session('validation')->hasError('tahun_terbit')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('tahun_terbit'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/buku/<?= esc($buku['slug']) ?>" class="btn btn-secondary">&larr; Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-journal-plus"></i> Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>