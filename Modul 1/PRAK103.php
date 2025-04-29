<html>
<head>
    <title>Praktikum Soal 3</title>
</head>
<body>
    <?php 
    $celcius = 37.841;
    $fahrenheit = ($celcius * 9 / 5) + 32;
    $reamur = (4 / 5) * $celcius;
    $kelvin = $celcius + 273.15;

    echo "Fahrenheit (F) = " . number_format($fahrenheit, 4) . "<br>";
    echo "Reamur (R) = " . number_format($reamur, 4) . "<br>";
    echo "Kelvin (K) = " . number_format($kelvin, 4) . "<br>";
    
    ?>
</body>
</html>