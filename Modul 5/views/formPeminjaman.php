<?php 
require_once __DIR__ . '/../model/model.php';

$pinjam_message = "";

if (isset($_POST["tambahPeminjaman"])) {
    try {
        if (create($_POST, "peminjaman") > 0) {
            $pinjam_message = 
            "<script>
                alert('Data Peminjaman Berhasil Ditambahkan'); 
                document.location.href = '../controllers/peminjaman.php';
            </script>";
        } else {
            $pinjam_message = 
            "<script>
                alert('Data Peminjaman Gagal Ditambahkan!');
            </script>";
        }
    } catch (mysqli_sql_exception $err) {
        $pinjam_message = 
        "<script>
            alert('Terjadi Kesalahan: " . $err->getMessage() . "');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Tambah Data Peminjaman</h2>
            <a href="../controllers/peminjaman.php" class="btn btn-secondary fw-medium">&larr; Kembali</a>
        </div>

        <div class="bg-white p-4 shadow rounded">
            <?php if (!empty($pinjam_message)) echo $pinjam_message; ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="id_member" class="form-label">Pilih Member</label>
                    <select name="id_member" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Member --</option>
                        <?php 
                        $members = query("SELECT id_member, nama_member FROM member");
                        foreach ($members as $member) {
                            echo "<option value='{$member['id_member']}'>{$member['nama_member']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_buku" class="form-label">Pilih Buku</label>
                    <select name="id_buku" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Buku --</option>
                        <?php
                        $buku = query("SELECT id_buku, judul_buku FROM buku");
                        foreach ($buku as $bk) {
                            echo "<option value='{$bk['id_buku']}'>{$bk['judul_buku']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" name="tambahPeminjaman" class="btn btn-primary fw-medium">Tambah Peminjaman</button>
            </form>
        </div>
    </div>
</body>
</html>
