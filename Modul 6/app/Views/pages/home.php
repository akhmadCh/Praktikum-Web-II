<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="container mx-auto mt-5 px-4">
    <h1>Daftar Mahasiswa</h1>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIM</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1. </td>
                    <td> <?= $user['nama'] ?> </td>
                    <td> <?= $user['nim'] ?> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>