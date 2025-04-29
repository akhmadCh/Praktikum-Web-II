<?php 

$data_mhs = [
    [
        "nama" => "Ridho",
        "mata_kuliah" => [
            "Pemrograman I", 
            "Praktikum Pemrograman I",
            "Pengantar Lingkungan Lahan Basah",
            "Arsitektur Komputer"
        ],
        "sks" => [2, 1, 2, 3]
    ],
    [
        "nama" => "Ratna",
        "mata_kuliah" => [
            "Basis Data I", 
            "Praktikum Basis Data I",
            "Kalkulus"
        ],
        "sks" => [2, 1, 3]
    ],
    [
        "nama" => "Tono",
        "mata_kuliah" => [
            "Rekayasa Perangkat Lunak",
            "Analisis dan Perancangan Sistem", 
            "Komputasi Awan",
            "Kecerdasan Bisnis"
        ],
        "sks" => [3, 3, 3, 3]
    ],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 3 Modul 4</title>
</head>
<style>
    tr, th {
        background-color: lightgrey;
    }
    td {
        background-color: white;
    }
</style>
<body>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>

        <?php $nomor = 1; foreach ($data_mhs as &$mhs) : ?>
            <?php 
            $jumlahMataKuliah = count($mhs["mata_kuliah"]);
            $totalSks = array_sum($mhs["sks"]);
            ?>

            <?php for ($i = 0; $i < $jumlahMataKuliah; $i++) : ?>
                <tr>
                    <?php if ($i == 0) : ?>
                        <td rowspan="<?= $jumlahMataKuliah ?>"> <?= $nomor ?> </td>
                        <td rowspan="<?= $jumlahMataKuliah ?>"> <?= $mhs["nama"] ?> </td>
                    <?php endif; ?>

                    <td> <?= $mhs["mata_kuliah"][$i] ?> </td>
                    <td> <?= $mhs["sks"][$i] ?> </td>

                    <?php if ($i == 0) : ?>
                        <td rowspan="<?= $jumlahMataKuliah ?>"> <?= $totalSks ?> </td>
                        <?php 
                            if ($totalSks < 7) {
                                echo "<td rowspan='$jumlahMataKuliah' style='background-color: red;'> Revisi KRS </td>";
                            } else {
                                echo "<td rowspan='$jumlahMataKuliah' style='background-color: green;'> Tidak Revisi </td>";
                            }
                        ?>
                    <?php endif; ?>
                </tr>
            <?php endfor; ?>
            <?php $nomor++; ?>
        <?php endforeach; ?>
    </table>

</body>
</html>