<?php 

require_once __DIR__ . '/../config/koneksi.php';
$allowed_tables = ['member', 'buku', 'peminjaman'];

// GET ALL DATA
function query ($query, $params = [], $return_result = true) {
    global $db;

    // jika ada parameter, gunakan prepared statement
    if (!empty($params)) {
        $statement = $db->prepare($query);
        if ($statement === false) {
            die("Prepare Failed: " . $db->error);
        }

        // tentukan tipe data dari tiap params
        $types = "";
        foreach ($params as $param) {
            $types .= match (gettype($param)) {
                'integer' => 'i',
                'double' => 'd',
                'string' => 's',
                default => 's'
            };
        }

        $statement->bind_param($types, ...$params);
        $statement->execute();

        // untuk SELECT: ambil hasil
        if ($return_result) {
            $result = $statement->get_result();
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return $statement->affected_rows; // untuk INSERT, UPDATE, DELETE
        }

    } else {
        $result = $db->query($query);
        if ($result === false) {
            die("Query Gagal: " . $db->error);
        }

        if ($return_result) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return $db->affected_rows;
        }
    }
}

// INSERT
function create ($data, $table) {
    global $allowed_tables;
    if (!in_array($table, $allowed_tables)) {
        die("Tabel tidak valid!");
    }

    if ($table === "member") {
        $sql = "INSERT INTO member 
        (nama_member, nomor_member, alamat, tgl_terakhir_bayar)
        VALUES (?, ?, ?, ?)";

        $nama_member = htmlspecialchars($data["nama_member"]);
        $nomor_member = htmlspecialchars($data["nomor_member"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $tgl_terakhir_bayar = date('Y-m-d', strtotime('+1 year')); // 1 tahun ke depan

        return query($sql, [$nama_member, $nomor_member, $alamat, $tgl_terakhir_bayar], false);
        
    } else if ($table === "buku") {
        $sql = "INSERT INTO buku 
        (judul_buku, penulis, penerbit, tahun_terbit)
        VALUES (?, ?, ?, ?)";

        $judul_buku = htmlspecialchars($data["judul_buku"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);

        return query($sql, [$judul_buku, $penulis, $penerbit, $tahun_terbit], false);
    
    } else if ($table === "peminjaman") {
        $sql = "INSERT INTO peminjaman 
        (tgl_kembali, id_buku, id_member)
        VALUES (?, ?, ?)";

        date_default_timezone_set('Asia/Makassar');
        
        $tgl_kembali = date('Y-m-d', strtotime('+7 days'));
        $id_buku = htmlspecialchars($data["id_buku"]);
        $id_member = htmlspecialchars($data["id_member"]);

        $params = [$tgl_kembali, $id_buku, $id_member];

        return query($sql, $params, false);
    }
}

// DELETE
function delete ($id, $table) {
    global $allowed_tables;
    if (!in_array($table, $allowed_tables)) {
        die("Tabel tidak valid!");
    }

    $sql = "DELETE FROM $table WHERE id_$table = ?";

    return query($sql, [$id], false);
}

function update ($id, $table) {
    global $allowed_tables;
    if (!in_array($table, $allowed_tables)) {
        die("Tabel tidak valid!");
    }

    $sql = "SELECT * FROM $table WHERE id_$table = ?";
    return query($sql, [$id])[0] ?? null;
}

?>