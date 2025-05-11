<?php 

require_once __DIR__ . '/../model/model.php';
$buku = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Perpustakaan</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Buku</h2>
            <a class="btn btn-success fw-medium" href="../views/formBuku.php">+ Tambah Buku</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No. </th>
                    <th>Aksi</th>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                </tr>
            </thead>

            <?php $no = 1; foreach ($buku as $bk) : ?>
                <tr>
                    <td> <?= $no ?> </td>
                    <td>
                        <a class="btn btn-warning btn-sm fw-medium" href="../views/ubah.php?tabel=buku&id=<?= $bk["id_buku"] ?>">Ubah</a>
                        <a class="btn btn-danger btn-sm fw-medium" href="../hapus.php?tabel=buku&id=<?= $bk["id_buku"] ?>" 
                        onclick="return confirm('Apakah data yakin dihapus?')">Hapus</a>
                    </td>
                    <td> <?= $bk["id_buku"] ?> </td>
                    <td> <?= $bk["judul_buku"] ?> </td>
                    <td> <?= $bk["penulis"] ?> </td>
                    <td> <?= $bk["penerbit"] ?> </td>
                    <td> <?= $bk["tahun_terbit"] ?> </td>
                </tr>    
                <?php $no++; ?>
            <?php endforeach; ?>
        </table>

        <a href="../index.php" class="btn btn-secondary mt-3 fw-medium"> ← Kembali ke Beranda </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>