<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Perpustakaan</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="controllers/member.php">Member</a></li>
                    <li class="nav-item"><a class="nav-link" href="controllers/buku.php">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="controllers/peminjaman.php">Peminjaman</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main -->
    <div class="container mt-5 text-center">
        <h1 class="mb-4">Selamat Datang di Sistem Perpustakaan</h1>
        <p class="lead">Kelola data member, buku, dan transaksi peminjaman dengan mudah.</p>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Kelola Member</h5>
                        <p class="card-text">Lihat, tambahkan, ubah, dan hapus data member.</p>
                        <a href="controllers/member.php" class="btn btn-primary fw-medium">Buka</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Kelola Buku</h5>
                        <p class="card-text">Manajemen koleksi buku perpustakaan.</p>
                        <a href="controllers/buku.php" class="btn btn-success fw-medium">Buka</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Peminjaman</h5>
                        <p class="card-text">Catat transaksi peminjaman dan pengembalian buku.</p>
                        <a href="controllers/peminjaman.php" class="btn btn-warning text-white fw-medium">Buka</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
