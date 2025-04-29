<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1 Modul 2</title>
</head>
<body>
    <form action="PRAK201.php" method="POST">
        Nama: 1 <input type="text" name="nama1"> <br>
        Nama: 2 <input type="text" name="nama2"> <br>
        Nama: 3 <input type="text" name="nama3"> <br>
        <button type="submit" name="urut">Urutkan</button>
    </form>

    <?php 
    if (isset($_POST["urut"])) {
        $nama1 = $_POST["nama1"];
        $nama2 = $_POST["nama2"];
        $nama3 = $_POST["nama3"];

        $nama_arr = array($nama1, $nama2, $nama3);
        sort($nama_arr);

        echo "<br>";
        for ($i=0; $i < 3; $i++) { 
            echo $nama_arr[$i] . "<br>";
        }
    }

    ?>
</body>
</html>