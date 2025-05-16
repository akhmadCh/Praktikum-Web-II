<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="container mx-auto mt-5 px-4">
    <div class="card w-80 bg-base-100 shadow-xl mx-auto">
        <figure class="px-10 pt-10">
            <div class="avatar">
                <div class="w-24 rounded-full">
                    <img src="<?= base_url('image/profile.jpg') ?>" alt="User Profile" />
                </div>
            </div>
        </figure>
        <div class="card-body text-start">
            <h2 class="card-title text-text-center">Nama: <?= $user['nama'] ?></h2>
            <p>NIM: <?= $user['nim'] ?></p>
            <p>Email: <?= $user['email'] ?></p>
            <p>Jurusan: <?= $user['jurusan'] ?></p>
            <p>Hobby: <?= $user['hobby'] ?></p>
            <button class="btn btn-soft"> <a href="https://instagram.com/akhmdch" target="_blank">Contact</a> </button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>