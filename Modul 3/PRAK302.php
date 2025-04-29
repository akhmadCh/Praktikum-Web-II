<?php 
    $tinggi = "";
    $urlGambar = "";
    $error = "";

    if (isset($_POST["cetak"])) {
        $tinggi = $_POST["tinggi"];
        $urlGambar = $_POST["urlGambar"];
        
        if (!filter_var($urlGambar, FILTER_VALIDATE_URL)) {
            $error = "URL Tidak Valid!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2 Modul 3</title>
</head>
<body>
    <form action="PRAK302.php" method="POST">
        <label>Tinggi: </label>
        <input type="number" name="tinggi" value="<?= $tinggi ?>"> <br>
        <label>Alamat Gambar: </label>
        <!-- Input gambar Lewat link gambar  -->
        <input type="text" name="urlGambar" value="<?= $urlGambar ?>"> <br>

        <button type="submit" name="cetak" value="cetak">Cetak</button>
    </form>

    <br>
    <?php 
    if (isset($_POST["cetak"]) && empty($error)) {
        $i = 0;

        while ($i < $tinggi) {
            // cetak spasi
            $j = 0;
            while ($j < $i) {
                echo "<span style='display: inline-block; width: 30px;'> &nbsp; </span>";
                $j++;
            }
        
            // cetak bintang
            $k = $tinggi - $i;
            while ($k > 0) {
                echo "<img src='$urlGambar' alt='gambar url dari pengguna' width='30px;'>";
                $k--;
            }
        
            echo "<br>";
            $i++;
        }
    } else {
        echo "<p style='color: red;'> $error </p>";
    }
    
    ?>

</body>
</html>