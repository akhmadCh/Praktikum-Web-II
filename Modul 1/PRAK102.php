<html>
<head>
    <title>Praktikum Soal 2</title>
</head>
<body>
    <?php 
    const PHI = 3.14159;
    $r = 4.2;

    $volume = (4 / 3) * PHI * pow($r, 3);
    echo number_format($volume, 3) . " m3";

    ?>
</body>
</html>