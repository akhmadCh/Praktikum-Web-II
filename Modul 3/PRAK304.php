<?php 
$jmlBintang = "";
    if (isset($_POST["submit"])) {
        $jmlBintang = $_POST["jmlBintang"];
    } elseif (isset($_POST["tambah"])) {
        $jmlBintang = $_POST["jmlBintang"] + 1;
    } elseif (isset($_POST["kurang"])) {
        $jmlBintang = $_POST["jmlBintang"] - 1;
        if ($jmlBintang < 0) $jmlBintang = 0;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 4 Modul 3</title>
</head>

<body>
    <form action="PRAK304.php" method="POST">
        <label>Jumlah Bintang: </label>
        <input type="number" name="jmlBintang" value="<?= $jmlBintang ?>"> <br>

        <button type="submit" name="submit" value="submit">Cetak</button>
    </form>
    
    <br><br>
    
    <?php if ($jmlBintang > 0) : ?>
        <label>Jumlah Bintang </label>
        <?= $jmlBintang . "<br>"; ?>

        <?php 
        $i = 1; 
        while($i <= $jmlBintang) : ?>
            <img src="bintangSoal4.png" alt="gambar bintang" width="50px"> 
            
            <?php $i++ ?>
        <?php endwhile; ?>

        <br>
        <form action="PRAK304.php" method="POST">
            <!-- mengirim nilai bintang yang tersimpan -->
            <input type="hidden" name="jmlBintang" value="<?= $jmlBintang ?>">

            <button type="submit" name="tambah" value="tambah">Tambah</button>             
            <button type="submit" name="kurang" value="kurang">Kurang</button>
        </form>

    <?php endif ?>

</body>
</html>