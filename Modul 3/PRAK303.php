<?php 
    $batasBawah = "";
    $batasAtas = "";

    if (isset($_POST["cetak"])) {
        $batasBawah = $_POST["batasBawah"];
        $batasAtas = $_POST["batasAtas"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 3 Modul 3</title>
</head>

<body>
    <form action="PRAK303.php" method="POST">
        <label>Batas Bawah: </label>
        <input type="number" name="batasBawah" value="<?php echo $batasBawah ?>"> <br>
        <label>Batas Atas: </label>
        <input type="number" name="batasAtas" value="<?php echo $batasAtas ?>"> <br>

        <button type="submit" name="cetak" value="cetak">Cetak</button>
    </form>

    <br>
    <?php 
    if (is_numeric($batasBawah) && is_numeric($batasAtas)) {
        $batasBawah = (int)$batasBawah;
        $batasAtas = (int)$batasAtas;
        
        do {
            if (($batasBawah + 7) % 5 == 0) {
                echo "<img src='bintangSoal4.png' alt='gambar url dari pengguna' width='15px;'> ";
            } else {
                echo $batasBawah . " ";
            }
            
            $batasBawah++;
        } while ($batasBawah <= $batasAtas);
    }
    ?>
    
</body>
</html>