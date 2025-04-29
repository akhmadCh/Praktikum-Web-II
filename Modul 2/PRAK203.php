<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 3 Modul 2</title>
</head>
<body>
    <form action="PRAK203.php" method="POST">
        <label>Nilai : </label>
        <input type="number" step="any" name="nilai" 
        value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>" required> <br>

        <label>Dari : </label> <br>
        <input type="radio" name="dari" value="celcius" 
        <?php echo (isset($_POST['dari']) && $_POST['dari'] == 'celcius' ) ? 'checked' : ''; ?>> Celcius <br>
        
        <input type="radio" name="dari" value="fahrenheit" 
        <?php echo (isset($_POST['dari']) && $_POST['dari'] == 'fahrenheit' ) ? 'checked' : ''; ?>> Fahrenheit <br>
        
        <input type="radio" name="dari" value="rheamur" 
        <?php echo (isset($_POST['dari']) && $_POST['dari'] == 'rheamur' ) ? 'checked' : ''; ?>> Rheamur <br>
        
        <input type="radio" name="dari" value="kelvin" 
        <?php echo (isset($_POST['dari']) && $_POST['dari'] == 'kelvin' ) ? 'checked' : ''; ?>> Kelvin <br>
        
        <label>Ke : </label> <br>
        
        <input type="radio" name="ke" value="celcius" 
        <?php echo (isset($_POST['ke']) && $_POST['ke'] == 'celcius' ) ? 'checked' : ''; ?>> Celcius <br>
        
        <input type="radio" name="ke" value="fahrenheit" 
        <?php echo (isset($_POST['ke']) && $_POST['ke'] == 'fahrenheit' ) ? 'checked' : ''; ?>> Fahrenheit <br>
        
        <input type="radio" name="ke" value="rheamur" 
        <?php echo (isset($_POST['ke']) && $_POST['ke'] == 'rheamur' ) ? 'checked' : ''; ?>> Rheamur <br>
        
        <input type="radio" name="ke" value="kelvin" 
        <?php echo (isset($_POST['ke']) && $_POST['ke'] == 'kelvin' ) ? 'checked' : ''; ?>> Kelvin <br>
        <button type="submit" name="konversi" value="konversi">Konversi</button>
    </form>

    <?php 
    if (isset($_POST["konversi"])) {
        $nilai = $_POST["nilai"];
        $dari = $_POST["dari"];
        $ke = $_POST["ke"];
        $hasil = 0;

        switch ($dari) {
            case 'celcius':
                $celcius = $nilai;
                break;
            case 'fahrenheit':
                $celcius = ($nilai * 9 / 5) + 32;
                break;
            case 'rheamur':
                $celcius = (4 / 5) * $nilai;
                break;
            case 'kelvin':
                $celcius = $nilai + 273.15;
                break;
        }

        switch ($ke) {
            case 'celcius':
                $hasil = $celcius;
                $satuan = "°C";
                break;
            case 'fahrenheit':
                $hasil = ($celcius * 9 / 5) + 32;
                $satuan = "°F";
                break;
            case 'rheamur':
                $hasil = (4 / 5) * $celcius;
                $satuan = "°R";
                break;
            case 'kelvin':
                $hasil = $celcius + 273.15;
                $satuan = "°K";
                break;
        }

        echo number_format($hasil, 1) . " " . $satuan . "<br>";
    }

    ?>
</body>
</html>