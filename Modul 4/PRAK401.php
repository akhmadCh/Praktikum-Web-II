<?php 
$panjang = "";
$lebar = "";
$nilai = "";

if (isset($_POST["cetak"])) {
    $panjang = $_POST["panjang"];
    $lebar = $_POST["lebar"];
    $nilai = $_POST["nilai"];
}

function buatMatriks ($num, $row, $col) {
    $matriks = [];
    $index = 0;

    for ($i = 0; $i < $row; $i++) {
        $baris = [];
        for ($j = 0; $j < $col; $j++) {
            $baris[] = (int)$num[$index]; // mengubah ke int
            $index++;
        }
        // memasukkan array menjadi multi-dimensi
        $matriks[] = $baris;
    }
    return $matriks;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1 Modul 4</title>
</head>
<body>
    <form action="PRAK401.php" method="POST">
        <label>Panjang : </label>
        <input type="number" name="panjang" value="<?= $panjang ?>"> <br>
        
        <label>Lebar : </label>
        <input type="number" name="lebar" value="<?= $lebar ?>"> <br>
        
        <label>Nilai : </label>
        <input type="text" name="nilai" value="<?= $nilai ?>"> <br>

        <button type="submit" name="cetak" value="cetak">Cetak</button>
    </form>

    <br>
    
    <?php 
    if (isset($_POST["cetak"]) ) :?>
        <?php 
        $nilai = explode(" ", trim($_POST["nilai"]));

        if (count($nilai) != ($panjang * $lebar)) {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
            die;
        } else {
            $matriks = buatMatriks($nilai, $panjang, $lebar);
        }
        ?>

        <table border="1" cellpadding="10" cellspacing="0">
            <?php for ($row = 0; $row < $panjang; $row++) : ?>
                <tr>
                    <?php for ($col = 0; $col < $lebar; $col++) : ?>
                        <td>
                            <?= $matriks[$row][$col] ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
            <br>
        </table>
    <?php endif; ?>

</body>
</html>