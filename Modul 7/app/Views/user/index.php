<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>Selamat Datang, <?= esc($username) ?>!</h3>
            <p>Email: <?= esc($email) ?> </p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>