<?php 
require_once __DIR__ . '/../model/model.php';

$member_message = "";

if (isset($_POST["tambahMember"])) {
    try {
        date_default_timezone_set('Asia/Makassar');
        if (create($_POST, "member") > 0) {
            $member_message = 
            "<script>
                alert('Data Member Berhasil Ditambahkan'); 
                document.location.href = '../controllers/member.php';
            </script>";
        } else {
            $member_message = 
            "<script>
                alert('Data Member Gagal Ditambahkan!');
            </script>";
        }
    } catch (mysqli_sql_exception $err) {
        $member_message = 
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
    <title>Tambah Data Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Tambah Data Member</h2>
            <a href="../controllers/member.php" class="btn btn-secondary">&larr; Kembali</a>
        </div>

        <div class="bg-white p-4 shadow rounded">
            <?php if (!empty($member_message)) echo $member_message; ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_member" class="form-label">Nama</label>
                    <input type="text" name="nama_member" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nomor_member" class="form-label">Nomor</label>
                    <input type="text" name="nomor_member" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>

                <button type="submit" name="tambahMember" class="btn btn-primary">Tambah Member</button>
            </form>
        </div>
    </div>
</body>
</html>
