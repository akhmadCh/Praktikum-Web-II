<?php 

$data_mhs = [
    [
        "nama" => "Andi", 
        "nim" => "2101001",
        "nilai_uts" => 87,
        "nilai_uas" => 65,
        "nilai_akhir" => null,
        "huruf" => null
    ],
    [
        "nama" => "Budi", 
        "nim" => "2101002",
        "nilai_uts" => 76,
        "nilai_uas" => 79,
        "nilai_akhir" => null,
        "huruf" => null
    ],
    [
        "nama" => "Tono", 
        "nim" => "2101003",
        "nilai_uts" => 50,
        "nilai_uas" => 41,
        "nilai_akhir" => null,
        "huruf" => null
    ],
    [
        "nama" => "Jessica", 
        "nim" => "2101004",
        "nilai_uts" => 60,
        "nilai_uas" => 75,
        "nilai_akhir" => null,
        "huruf" => null
    ]
];

function hitung_nilai_akhir ($nilaiUts, $nilaiUas) {
    return ($nilaiUts * 0.4) + ($nilaiUas * 0.6);
}

function setHuruf ($nilai_akhir) {
    return match (true) {
        $nilai_akhir >= 80 => 'A',
        $nilai_akhir >= 70 && $nilai_akhir <= 79 => 'B',
        $nilai_akhir >= 60 && $nilai_akhir <= 69 => 'C',
        $nilai_akhir >= 50 && $nilai_akhir <= 59 => 'D',
        default => 'E'
    };
}

function grade_huruf () {
    global $data_mhs;
    $i = 0;
    foreach ($data_mhs as &$mhs) {
        $mhs["nilai_akhir"] = hitung_nilai_akhir($mhs["nilai_uts"], $mhs["nilai_uas"]);
        $mhs["huruf"] = setHuruf($mhs["nilai_akhir"]);
        $i++;
    }
}
grade_huruf();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1 Modul 4</title>
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
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>

        <?php foreach ($data_mhs as &$mhs) : ?>
            <tr>
                <td> <?= $mhs["nama"] ?> </td>
                <td> <?= $mhs["nim"] ?> </td>
                <td> <?= $mhs["nilai_uts"] ?> </td>
                <td> <?= $mhs["nilai_uas"] ?> </td>
                <td> <?= $mhs["nilai_akhir"] ?> </td>
                <td> <?= $mhs["huruf"] ?> </td>
            </tr>    
        <?php endforeach; ?>
    </table>

</body>
</html>