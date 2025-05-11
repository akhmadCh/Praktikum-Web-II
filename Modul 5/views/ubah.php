<?php
require_once __DIR__ . '/../model/model.php';

$table = $_GET['tabel'] ?? null;
$id = $_GET['id'] ?? null;

$allowed_tables = ['member', 'buku', 'peminjaman'];

if (!in_array($table, $allowed_tables) || !is_numeric($id)) {
    die('Permintaan Tidak Valid');
}

$data = update($id, $table);

if (isset($_POST['submit'])) {
    try {
        if ($table === 'member') {
            $nama_member = $_POST['nama_member'];
            $nomor_member = $_POST['nomor_member'];
            $alamat = $_POST['alamat'];

            $sql = "UPDATE member
            SET nama_member = ?, nomor_member = ?, alamat = ?
            WHERE id_$table = ?";

            $affected = query($sql, [$nama_member, $nomor_member, $alamat, $id], false);

            if ($affected > 0) {
                echo "
                <script> 
                    alert('Data berhasil diubah'); 
                    document.location.href='../controllers/member.php'; 
                </script>";
            }
        } else if ($table === 'buku') {
            $judul_buku = $_POST['judul_buku'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun_terbit = $_POST['tahun_terbit'];

            $sql = "UPDATE buku
            SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ?
            WHERE id_$table = ?";

            $affected = query($sql, [$judul_buku, $penulis, $penerbit, $tahun_terbit, $id], false);

            if ($affected > 0) {
                echo "
                <script> 
                    alert('Data berhasil diubah'); 
                    document.location.href='../controllers/buku.php'; 
                </script>";
            }
        } else if ($table === 'peminjaman') {
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];

            $sql = "UPDATE peminjaman
            SET tgl_pinjam = ?, tgl_kembali = ?
            WHERE id_$table = ?";

            $affected = query($sql, [$tgl_pinjam, $tgl_kembali, $id], false);

            if ($affected > 0) {
                echo "
                <script> 
                    alert('Data {$table} berhasil diubah'); 
                    document.location.href='../controllers/peminjaman.php'; 
                </script>";
            }
        }
    } catch (mysqli_sql_exception $err) {
        die("Kesalahan: " . $err->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data <?= htmlspecialchars($table) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Ubah Data <?= htmlspecialchars(ucfirst($table)) ?></h2>
            <a href="../controllers/<?= $table ?>.php" class="btn btn-secondary fw-medium">&larr; Kembali</a>
        </div>

        <form action="" method="post" class="bg-white p-4 shadow rounded">
            <?php if ($table === 'member'): ?>
                <div class="mb-3">
                    <label class="form-label">Nama Member</label>
                    <input type="text" class="form-control" name="nama_member" 
                    value="<?= htmlspecialchars($data['nama_member']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Member</label>
                    <input type="text" class="form-control" name="nomor_member" 
                    value="<?= htmlspecialchars($data['nomor_member']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" 
                    value="<?= htmlspecialchars($data['alamat']) ?>" required>
                </div>

                <input type="hidden" name="id_member" value="<?= $data['id_member'] ?>">

            <?php elseif ($table === 'buku'): ?>
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" 
                    value="<?= htmlspecialchars($data['judul_buku']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" 
                    value="<?= htmlspecialchars($data['penulis']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" 
                    value="<?= htmlspecialchars($data['penerbit']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" class="form-control" name="tahun_terbit" 
                    value="<?= $data['tahun_terbit'] ?>" required>
                </div>
                <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">
            
            <?php elseif ($table === 'peminjaman'): ?>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam" 
                    value="<?= htmlspecialchars($data['tgl_pinjam']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" name="tgl_kembali" 
                    value="<?= htmlspecialchars($data['tgl_kembali']) ?>" required>
                </div>
                
                <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman'] ?>">
                
            <?php endif; ?>
            <button type="submit" name="submit" class="btn btn-primary fw-medium">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>