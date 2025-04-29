<?php 
    $nama = $nim = $jenisKelamin = "";
    $namaErr = $nimErr = $jenisKelaminErr = "";
    
    if (isset($_POST["submit"])) {
        if (empty($_POST["nama"])) {
            $namaErr = "nama tidak boleh kosong";
        } else {
            $nama = test_input($_POST["nama"]);
        }
        if (empty($_POST["nim"])) {
            $nimErr = "nim tidak boleh kosong";
        } else {
            $nim = test_input($_POST["nim"]);
        }
        if (empty($_POST["jenisKelamin"])) {
            $jenisKelaminErr = "jenis kelamin tidak boleh kosong";
        } else {
            $jenisKelamin = test_input($_POST["jenisKelamin"]);
        }
    }

    function test_input ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2 Modul 2</title>
</head>
<style>
    .error {
        color: red;
    }
</style>
<body>
    <form action="PRAK202.php" method="POST">
        Nama: <input type="text" name="nama" value="<?php echo $nama ?>"> 
        <span class="error">* <?php echo $namaErr ?> </span> 
        <br>
        
        Nim: <input type="text" name="nim" value="<?php echo $nim ?>"> 
        <span class="error">* <?php echo $nimErr ?> </span> 
        <br>
        
        Jenis Kelamin: 
        <span class="error">* <?php echo $jenisKelaminErr ?> </span> <br>
        <input type="radio" id="lakiLaki" name="jenisKelamin" value="Laki-laki"
            <?php if ($jenisKelamin == "Laki-laki") echo "checked"; ?>> 
        <label for="lakiLaki">Laki-laki</label> <br>
        <input type="radio" id="perempuan" name="jenisKelamin" value="Perempuan"
            <?php if ($jenisKelamin == "Perempuan") echo "checked"; ?>> 
        <label for="perempuan">Perempuan</label> <br>
        
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php 
    echo "<br>";
    echo $nama . "<br>";
    echo $nim . "<br>";
    echo $jenisKelamin . "<br>";
    ?>
</body>
</html>