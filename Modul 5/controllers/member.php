<?php 

require_once __DIR__ . '/../model/model.php';

$member = query("SELECT * FROM member");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member</title>
    <!-- Bootstrap CSS -->
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
            <h2>Daftar Member</h2>
            <a href="../views/formMember.php" class="btn btn-success fw-medium">+ Tambah Member</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>ID Member</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Alamat</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($member as $mbr) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <td>
                        <a href="../views/ubah.php?tabel=member&id=<?= $mbr["id_member"] ?>" class="btn btn-warning btn-sm fw-medium">Ubah</a>
                        <a href="../hapus.php?tabel=member&id=<?= $mbr["id_member"] ?>" class="btn btn-danger btn-sm fw-medium" 
                        onclick="return confirm('Apakah data yakin dihapus?')">Hapus</a>
                    </td>
                    <td><?= $mbr["id_member"] ?></td>
                    <td><?= $mbr["nama_member"] ?></td>
                    <td><?= $mbr["nomor_member"] ?></td>
                    <td><?= $mbr["alamat"] ?></td>
                    <td><?= $mbr["tgl_mendaftar"] ?></td>
                    <td><?= $mbr["tgl_terakhir_bayar"] ?></td>
                </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>

        <a href="../index.php" class="btn btn-secondary mt-3 fw-medium">← Kembali ke Beranda</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
