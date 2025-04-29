<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 4 Modul 2</title>
</head>
<body>
    <form action="PRAK204.php" method="POST">
        Nilai: <input type="number" name="nilai"> <br>
        <button type="submit" name="konversi">Konversi</button>
    </form>

    <?php 
    $hasil = "";
    if (isset($_POST["konversi"])) {
        $nilai = $_POST["nilai"];
        echo $nilai . "<br>";

        if ($nilai == "" || !is_numeric($nilai)) {
            $hasil = "Inputkan Nilai!";
        } elseif ($nilai <= 0) {
            $hasil = "Nol";
        } elseif ($nilai > 0 && $nilai <= 10) {
            $hasil = "Satuan";
        } elseif ($nilai > 10 && $nilai < 20) {
            $hasil = "Belasan";
        } elseif ($nilai >= 20 && $nilai < 100) {
            $hasil = "Puluhan";
        } elseif ($nilai >= 100 && $nilai < 1000) {
            $hasil = "Ratusan";
        } elseif ($nilai >= 1000) {
            $hasil = "Anda Menginput Melebihi Limit Bilangan";
        }
    }
    echo $hasil . "<br>";

    ?>
</body>
</html>