<?php 
require_once __DIR__ . '/model/model.php';

// ambil parameter dari URL
$table = $_GET["tabel"] ?? null;
$id = $_GET["id"] ?? null;

try {
    // validasi nama tabel yang diizinkan
    $allowed_tables = ["member", "buku", "peminjaman"];
    if (!in_array($table, $allowed_tables)) {
        throw new Exception("Tabel tidak valid!");
    }

    if ($id !== null && is_numeric($id)) {
        $affected = delete($id, $table);

        if ($affected > 0) {
            echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'controllers/{$table}.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'controllers/{$table}.php';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('ID Tidak Valid!');
            document.location.href = 'controllers/{$table}.php';
        </script>";
    }
} catch (Exception $err) {
    echo "
    <script>
        alert('Terjadi Kesalahan: " . addslashes($err->getMessage()) . "');
        document.location.href = 'index.php';
    </script>";
}
?>
