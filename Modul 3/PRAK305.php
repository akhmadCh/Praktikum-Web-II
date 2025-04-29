<?php 
    $kalimat = "";
    $length = "";

    if (isset($_POST["submit"])) {
        $kalimat = $_POST["kalimat"];
        $length = strlen($kalimat);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 5 Modul 3</title>
</head>

<body>
    <form action="PRAK305.php" method="POST">
        <input type="text" name="kalimat">
        <button type="submit" name="submit" value="submit">Submit</button>
    </form>

    <h2>Input: </h2>
    <?= $kalimat . "<br>"; ?>

    <h2>Output: </h2>
    <?php 
    if ($length > 0) {
        for ($i = 0; $i < $length; $i++) { 
            $char = $kalimat[$i];

            $hasil = strtoupper($char); // karakter pertama jadi kapital
            $hasil .= str_repeat(strtolower($char), $length - 1); // sisa karakter
            echo $hasil;
        }
    }

    ?>

</body>
</html>