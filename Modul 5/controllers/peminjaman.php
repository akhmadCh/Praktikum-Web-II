<?php 

require_once __DIR__ . '/../model/model.php';

$peminjaman = query("SELECT * FROM peminjaman");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Perpustakaan</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Peminjaman</h2>
            <a class="btn btn-success fw-medium" href="../views/formPeminjaman.php">+ Tambah Peminjaman</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No. </th>
                    <th>Aksi</th>
                    <th>ID Buku</th>
                    <th>ID Member</th>
                    <th>Tanggal Pengembalian</th>
                </tr>
            </thead>
    
            <?php $no = 1; foreach ($peminjaman as $pinjam) : ?>
                <tr>
                    <td> <?= $no ?> </td>
                    <td>
                        <a href="../views/ubah.php?tabel=peminjaman&id=<?= $pinjam["id_peminjaman"] ?>" class="btn btn-warning btn-sm fw-medium">Ubah</a>
                        <a href="../hapus.php?tabel=peminjaman&id=<?= $pinjam["id_peminjaman"] ?>" 
                        onclick="return confirm('Apakah data yakin dihapus?')" class="btn btn-danger btn-sm fw-medium">Hapus</a>
                    </td>
                    <td> <?= $pinjam["id_buku"] ?> </td>
                    <td> <?= $pinjam["id_member"] ?> </td>
                    <td> <?= $pinjam["tgl_kembali"] ?> </td>
                </tr>    
                <?php $no++; ?>
            <?php endforeach; ?>
        </table>

        <a href="../index.php" class="btn btn-secondary mt-3 fw-medium">← Kembali ke Beranda</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>