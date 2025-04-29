<?php 
    if (isset($_POST["cetak"])) {
        $nilai = $_POST["nilai"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1 Modul 3</title>
</head>
<style>
    .red {
        color: red;
    }
    .green {
        color: green;
    }
</style>
<body>
    <form action="PRAK301.php" method="POST">
        <label>Jumlah Peserta: </label>
        <input type="number" name="nilai" value="<?php echo $nilai ?>"> <br>

        <button type="submit" name="cetak" value="cetak">Cetak</button>
    </form>

    <?php if (isset($_POST["cetak"])) : ?>
        <?php 
        $i = 1;
        while($i <= $nilai) : ?>
            <?php if ($i % 2 == 0): ?>
                <h2 class="green"> <?= "Peserta ke-" . $i . "<br>"; ?> </h2>
            <?php endif; ?>
            <?php if ($i % 2 != 0): ?>
                <h2 class="red"> <?= "Peserta ke-" . $i . "<br>"; ?> </h2>
            <?php endif; ?>
            <?php $i++ ?>
        <?php endwhile; ?>
    <?php endif; ?>
    

</body>
</html>