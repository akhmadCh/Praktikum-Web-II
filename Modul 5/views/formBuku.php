<?php 
require_once __DIR__ . '/../model/model.php';

$buku_message = "";

if (isset($_POST["tambahBuku"])) {
    try {
        date_default_timezone_set('Asia/Makassar');
        if (create($_POST, "buku") > 0) {
            $buku_message = 
            "<script>
                alert('Data Buku Berhasil Ditambahkan'); 
                document.location.href = '../controllers/buku.php';
                </script>";
        } else {
            $buku_message = 
            "<script>
                alert('Data Buku Gagal Ditambahkan!');
            </script>";
        }
    } catch (mysqli_sql_exception $err) {
        $buku_message = 
        "<script> 
            alert('Terjadi Kesalahan: ')" . $err->getMessage() . "'; 
        </script>" ;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">
    
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Tambah Data Buku</h2>
            <a href="../controllers/buku.php" class="btn btn-secondary">&larr; Kembali</a>
        </div>

        <div class="bg-white p-4 shadow rounded">
            <?php if (!empty($buku_message)) echo $buku_message; ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" required>
                </div>
        
                <button type="submit" name="tambahBuku" class="btn btn-primary">Tambah Buku</button>
            </form>
        </div>
    </div>
</body>
</html>